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
    // Access form values
    $myusername = mysqli_real_escape_string($conn, $data['username']);
    $mypassword = mysqli_real_escape_string($conn, $data['password']);

    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "SELECT * FROM `dim_user` WHERE `user_name` = '$myusername' and `password` = '$mypassword'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    $count = mysqli_num_rows($result);

  
    if ($count == 1) {
  
      $row = mysqli_fetch_assoc($result);
  
      $data = (object)[
        "auth_user_id" => $row['user_id'],
        "auth_user_role" => $row['role'],
        "auth_login_type" => "manual",
        "faculty_id" => $row['faculty_id']
      ];
      echo json_encode(["status" => "success", "data" => $data]);
    } else {
      http_response_code(500);
      echo json_encode(["status" => "error", "message" => "invalidCredential"]);
    }

} else {
    // Handle error if no data or missing expected values
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "invalidForm"]);
}
?>