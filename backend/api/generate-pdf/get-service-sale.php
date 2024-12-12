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
    $start_date = mysqli_real_escape_string($conn, $data['start_date']);
    $end_date = mysqli_real_escape_string($conn, $data['end_date']);
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "SELECT
        *
      FROM (
        SELECT
          fac.created_at,
          usr.full_name,
          itm.item_name,
          itm.item_unit,
          fac.amount,
          fac.item_price,
          fac.amount * fac.item_price AS total,
          fac.item_note
        FROM `fact_facility_asmt` fac
          LEFT JOIN `fact_patient_log` log
            ON log.ptn_log_id = fac.ptn_log_id
          LEFT JOIN `dim_user` usr
            ON log.patient_id = usr.user_id
          LEFT JOIN `dim_med_service` itm
            ON itm.item_id = fac.item_id
        WHERE
          fac.status IN ('Active', 'Completed')
          AND log.status IN ('Active', 'Completed')
          AND itm.item_name IS NOT NULL
      )
      WHERE
        created_at BETWEEN DATE(STR_TO_DATE('$start_date' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
        	AND DATE(STR_TO_DATE('$end_date' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
      ORDER BY 1 DESC";
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