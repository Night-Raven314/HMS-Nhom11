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
    $page_type = mysqli_real_escape_string($conn, $data['pageType']);
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "";
    switch ($page_type) {
      case 'guest':
        $sql = "SELECT * FROM `dim_user` WHERE `role` = 'patient' AND status <> 'deleted'";
        break;
      case 'employee':
        $sql = "SELECT * FROM `dim_user` WHERE `role` <> 'patient' AND status <> 'deleted'";
        break;
      
      default:
        # code...
        break;
    }
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