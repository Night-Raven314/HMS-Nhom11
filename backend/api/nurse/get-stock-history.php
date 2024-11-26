<?php
  error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
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
    $post_id = $data['item_id'] ? mysqli_real_escape_string($conn, $data['item_id']) : null;
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "SELECT
        usr.full_name AS updated_by,
        stock.*
      FROM `fact_item_stock` stock
        LEFT JOIN `dim_user` usr
          ON stock.updated_by = usr.user_id
      WHERE
        (timestampdiff(day, stock.created_at, CURRENT_TIMESTAMP()) <= 30 OR stock.status = 'active')
        AND `item_id` = '$post_id'";
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