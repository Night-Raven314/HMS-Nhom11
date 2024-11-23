<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);
  include ('../config.php');
  
  // Allow CORS requests (optional, based on your setup)
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-Methods: POST");
  
  $errorMsg = "";
  $sql = "SELECT
      'item' AS item_type,
      item_id,
      item_name,
      item_unit,
      item_price,
      item_lending_price
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
        0 AS item_lending_price
      FROM
        `dim_med_service`
      WHERE status <> 'deleted'";
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
      echo json_encode(["status" => "success", "data" => $data]);
    } else {
      http_response_code(500);
      echo json_encode(["status" => "error", "message" => "dbError"]);
    }
  }
?>