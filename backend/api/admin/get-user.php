<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);
  include ('../config.php');
  
  // Allow CORS requests (optional, based on your setup)
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-Methods: POST");
  
  $errorMsg = "";

  // Process the form data (e.g., save to database, send email, etc.)
  $sql = "SELECT * FROM `dim_user` WHERE `role` = 'patient'";
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
?>