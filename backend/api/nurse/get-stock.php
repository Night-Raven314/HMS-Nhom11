<?php
  error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
  // ini_set('display_errors', 1);
  include ('../config.php');
  
  // Allow CORS requests (optional, based on your setup)
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-Methods: POST");
  
  $sql = "SELECT
      usr.full_name AS updated_by,
      stock.stock_id,
      stock.item_id,
      stock.amount_final,
      stock.created_at
    FROM `fact_item_stock` stock
      LEFT JOIN `dim_user` usr
        ON stock.updated_by = usr.user_id
    WHERE
      stock.status = 'active'
    ORDER BY
      stock.created_at DESC";
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
?>