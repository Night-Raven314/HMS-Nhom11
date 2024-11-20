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
    $ptn_log_id = $data['ptn_log_id'] ? mysqli_real_escape_string($conn, $data['ptn_log_id']) : null;
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "SELECT
        'item' AS item_type,
        item_id,
        item_name,
        item_unit,
        item_price,
        CASE
          WHEN item_lending_price = 0 THEN item_price
            ELSE item_lending_price END AS item_lending_price
      FROM
        `dim_item`
      WHERE status <> 'deleted'

      UNION ALL

      SELECT
        'service' AS item_type,
        item_id,
        item_name,
        item_unit,
        item_price,
        item_price
      FROM
        `dim_med_service`
      WHERE status <> 'deleted';";
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