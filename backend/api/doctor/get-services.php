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
    $ptn_log_id = isset($data['ptn_log_id']) ? mysqli_real_escape_string($conn, $data['ptn_log_id']) : null;
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "WITH
      item_list AS (
      SELECT
          item_id,
          item_name,
          item_unit
      FROM `dim_item`
          
      UNION ALL
          
      SELECT
          item_id,
          item_name,
          item_unit
      FROM `dim_med_service`
          
      UNION ALL
          
      SELECT
          room_id,
          room_name,
          'ngày' AS room_unit
      FROM `dim_room`
      )

      SELECT
        fac.fac_asmt_id,
        fac.start_datetime,
        fac.end_datetime,
        fac.item_type,
        fac.item_id,
        itm.item_name,
        itm.item_unit,
        CASE
          WHEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), STR_TO_DATE(fac.end_datetime, '%Y-%m-%dT%H:%i:%s')) = 0 THEN 1
          WHEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), CURRENT_TIMESTAMP()) = 0 THEN 1
        	WHEN (fac.amount IS NULL AND fac.end_datetime IS NULL) THEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), CURRENT_TIMESTAMP())
          WHEN (fac.amount IS NULL AND fac.end_datetime IS NOT NULL) THEN timestampdiff(day, STR_TO_DATE(fac.start_datetime, '%Y-%m-%dT%H:%i:%s'), STR_TO_DATE(fac.end_datetime, '%Y-%m-%dT%H:%i:%s'))
            ELSE fac.amount END AS amount,
        fac.item_price,
        fac.item_note
      FROM `fact_facility_asmt` fac
        LEFT JOIN item_list itm
            ON fac.item_id = itm.item_id
      WHERE
        fac.ptn_log_id = '$ptn_log_id'
        AND fac.status <> 'deleted'";
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