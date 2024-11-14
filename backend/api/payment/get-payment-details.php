<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);
  include ('../config.php');
  
  // Allow CORS requests (optional, based on your setup)
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-Methods: POST");
  
  $errorMsg = "";
  // Get the raw POST data and decode it
  $input = file_get_contents("php://input");
  // Get data sent from FE
  $data = json_decode($input, true);
  if ($data) {
    $payment_id = mysqli_real_escape_string($conn, $data['payment_id']);
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "WITH 
      pres_data AS (
      SELECT
          pres.med_hist_id,
          meds.item_name,
          meds.item_unit,
          pres.amount,
          pres.price,
          pres.amount * pres.price AS total_value,
          'prescription' AS item_type
      FROM `fact_prescription` pres
          LEFT JOIN `dim_meds` meds
              ON pres.item_id = meds.item_id
      ),

      facility_data AS (
      SELECT
          fac.fac_mgmt_id,
          item.item_name,
          item.item_unit,
          fac.amount,
          fac.item_price,
          fac.amount * fac.item_price AS total_value,
          'facility' AS item_type
      FROM `fact_facility_asmt` fac
          LEFT JOIN `dim_item` item
              ON fac.item_id = item.item_id AND fac.item_type = 'item'

      UNION ALL

      SELECT
          fac.fac_mgmt_id,
          svcs.item_name,
          svcs.item_unit,
          fac.amount,
          fac.item_price,
          fac.amount * fac.item_price AS total_value,
          'facility' AS item_type
      FROM `fact_facility_asmt` fac
          LEFT JOIN `dim_med_service` svcs
              ON fac.item_id = svcs.item_id AND fac.item_type = 'service'

      UNION ALL

      SELECT
          fac.fac_mgmt_id,
          room.room_name,
          'room slot' AS unit,
          timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), STR_TO_DATE(fac.end_datetime, '%Y-%m-%dT%H:%i:%s')) + 1, -- same start/end date means 1
          fac.item_price,
          timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), STR_TO_DATE(fac.end_datetime, '%Y-%m-%dT%H:%i:%s')) * fac.item_price  AS total_value, -- same start/end date means 1
          'facility' AS item_type
      FROM `fact_facility_asmt` fac
          LEFT JOIN `dim_room` room
              ON fac.item_id = room.room_id AND fac.item_type = 'room'
      ),

      appointment_data AS (
      SELECT
          appt.appt_id,
          usr.full_name,
          facl.fac_name,
          1 AS amount,
          appt.appt_fee,
          appt.appt_fee AS total_value,
          'appointment' AS item_type
      FROM `fact_appointment` appt
          LEFT JOIN `dim_faculty` facl
              ON facl.fac_id = appt.faculty_id
          LEFT JOIN `dim_user` usr
              ON usr.user_id = appt.doctor_id
      )
      SELECT
      *
      FROM (
        SELECT
            pmt.payment_id,
            pmt.payment_type,
            pmt.payment_desc,
            appt.*
        FROM `fact_payment` pmt
        LEFT JOIN `appointment_data` appt ON appt.appt_id = pmt.appt_id

        UNION ALL

        SELECT
            pmt.payment_id,
            pmt.payment_type,
            pmt.payment_desc,
            pres.*
        FROM `fact_payment` pmt
        LEFT JOIN `pres_data` pres ON pres.med_hist_id = pmt.med_hist_id

        UNION ALL

        SELECT
            pmt.payment_id,
            pmt.payment_type,
            pmt.payment_desc,
            fac.*
        FROM `fact_payment` pmt
        LEFT JOIN `facility_data` fac ON fac.fac_mgmt_id = pmt.fac_mgmt_id
      ) AS unioned_data
      WHERE unioned_data.payment_id = '$payment_id' AND amount IS NOT NULL";
    if($sql) {
      $result = $conn->query($sql);
      if ($result) { 
        // Kiểm tra và hiển thị dữ liệu
        $data = [];
        while ($row = $result->fetch_assoc()) {
          $data[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $data]);
      } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "dbError"]);
      }
    }
  }
?>