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
    //$auth_user_id = $data['auth_user_id'] ? mysqli_real_escape_string($conn, $data['auth_user_id']) : null;
    $patient_id = $data['patient_id'] ? mysqli_real_escape_string($conn, $data['patient_id']) : null;
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "SELECT
          pres.med_hist_id,
          mshst.patient_id,
          meds.item_name,
          pres.amount,
          meds.item_unit,
          pres.item_note,
          pmt.payment_status,
          pmt.updated_at
      FROM `fact_prescription` pres
        LEFT JOIN `fact_payment` pmt
          ON pres.med_hist_id = pmt.med_hist_id
        LEFT JOIN `dim_meds` meds
          ON pres.item_id = meds.item_id
        LEFT JOIN `fact_med_hist` mshst
          ON pres.med_hist_id = mshst.med_hist_id
      WHERE
        mshst.status = 'active'
        AND pres.status = 'active'
        AND mshst.patient_id = '$patient_id'";
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