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
    $ptn_log_id = mysqli_real_escape_string($conn, $data['ptn_log_id']);
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "WITH 
      med_hist_ref AS (
      SELECT
        med.med_hist_id
      FROM `fact_med_hist` med
      WHERE
        med.ptn_log_id = '$ptn_log_id'
      ),
          
      pres_data AS (
      SELECT
        hst.ptn_log_id,
        meds.item_name,
        meds.item_unit,
        pres.amount,
        pres.price,
        pres.amount * pres.price AS total_value,
        pres.item_note,
        'prescription' AS item_type
      FROM `fact_prescription` pres
        LEFT JOIN `dim_meds` meds
          ON pres.item_id = meds.item_id
        LEFT JOIN `fact_med_hist` hst
          ON pres.med_hist_id = hst.med_hist_id
      WHERE
        pres.med_hist_id IN (SELECT med_hist_id FROM med_hist_ref)
        AND pres.status = 'completed'
      ),

      facility_data AS (
      SELECT
        fac.ptn_log_id,
        item.item_name,
        item.item_unit,
        fac.amount,
        fac.item_price,
        fac.amount * fac.item_price AS total_value,
        fac.item_note,
        'facility' AS item_type
      FROM `fact_facility_asmt` fac
        LEFT JOIN `dim_item` item
          ON fac.item_id = item.item_id AND fac.item_type = 'item'
      WHERE
        fac.status = 'completed'

      UNION ALL

      SELECT
        fac.ptn_log_id,
        svcs.item_name,
        svcs.item_unit,
        fac.amount,
        fac.item_price,
        fac.amount * fac.item_price AS total_value,
        fac.item_note,
        'facility' AS item_type
      FROM `fact_facility_asmt` fac
        LEFT JOIN `dim_med_service` svcs
          ON fac.item_id = svcs.item_id AND fac.item_type = 'service'
      WHERE
        fac.status = 'completed'

      UNION ALL

      SELECT
        fac.ptn_log_id,
        room.room_name,
        'Ngày' AS unit,
        CASE
          WHEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), STR_TO_DATE(fac.end_datetime, '%Y-%m-%dT%H:%i:%s')) = 0 THEN 1
          WHEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), CURRENT_TIMESTAMP()) = 0 THEN 1
          WHEN fac.amount IS NULL THEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), STR_TO_DATE(fac.end_datetime, '%Y-%m-%dT%H:%i:%s')) + 1
          WHEN fac.end_datetime IS NULL THEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), CURRENT_TIMESTAMP()) + 1
            ELSE fac.amount END AS amount,
        fac.item_price,
        CASE
          WHEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), STR_TO_DATE(fac.end_datetime, '%Y-%m-%dT%H:%i:%s')) = 0 THEN 1 * fac.item_price
          WHEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), CURRENT_TIMESTAMP()) = 0 THEN 1 * fac.item_price
          WHEN fac.amount IS NULL THEN (timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), STR_TO_DATE(fac.end_datetime, '%Y-%m-%dT%H:%i:%s')) + 1) * fac.item_price
          WHEN fac.end_datetime IS NULL THEN (timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), CURRENT_TIMESTAMP()) + 1) * fac.item_price
            ELSE fac.amount END AS total_value,
        '' AS item_note,
        'facility' AS item_type
      FROM `fact_facility_asmt` fac
        LEFT JOIN `dim_room` room
          ON fac.item_id = room.room_id AND fac.item_type = 'room'
      WHERE
        fac.status = 'completed'
      )
      SELECT
      *
      FROM (
        SELECT
          pres.*
        FROM `pres_data` pres

        UNION ALL

        SELECT
          fac.*
        FROM `facility_data` fac
      ) AS unioned_data
      WHERE unioned_data.ptn_log_id = '$ptn_log_id' AND amount IS NOT NULL";
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