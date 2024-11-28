<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);
  include ('../config.php');
  
  // Allow CORS requests (optional, based on your setup)
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-Methods: POST");
  
  // Get the raw POST data and decode it
  $input = file_get_contents("php://input");
  // Get data sent from FE
  $data = json_decode($input, true);
  if ($data) {
  $errorMsg = "";
  $sql = "";

  $payment_id = $data['payment_id'] ? mysqli_real_escape_string($conn, $data['payment_id']) : null;
  // Access form values
  
  $sql = "SELECT * FROM `fact_payment` WHERE `payment_id` = '$payment_id' ORDER BY `created_at` DESC, `updated_at` DESC";

  if($sql) {
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo json_encode(["status" => "success", "data" => "success"]);
    } else {
      http_response_code(500);
      echo json_encode(["status" => "error", "message" => "invalidCredential"]);
    }
  }

} else {
  // Handle error if no data or missing expected values
  http_response_code(400);
  echo json_encode(["status" => "error", "message" => "invalidForm"]);
}
?>