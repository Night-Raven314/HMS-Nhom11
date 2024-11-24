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
    $user_id = mysqli_real_escape_string($conn, $data['userId']);
    $user_role = mysqli_real_escape_string($conn, $data['userRole']);
    $login_type = mysqli_real_escape_string($conn, $data['loginType']);
    $post_full_name = mysqli_real_escape_string($conn, $data['fullName']);
    $post_user_name = mysqli_real_escape_string($conn, $data['userName']);
    $post_password = mysqli_real_escape_string($conn, $data['password']);
    $post_email = mysqli_real_escape_string($conn, $data['email']);
    $post_contact_no = mysqli_real_escape_string($conn, $data['contactNo']);
    $post_address = mysqli_real_escape_string($conn, $data['address']);
    $post_city = mysqli_real_escape_string($conn, $data['city']);
    $post_gender = mysqli_real_escape_string($conn, $data['gender']);
    $post_birthday = mysqli_real_escape_string($conn, $data['birthday']);

    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "UPDATE `dim_user` SET
        `user_name` = '$post_user_name',
        `full_name` = '$post_full_name',
        `contact_no` = $post_contact_no,
        `gender` = '$post_gender',
        `birthday` = '$post_birthday',
        `email_address` = '$post_email',
        `address` = '$post_address',
        `city` = '$post_city',
        `password` = '$post_password' 
        WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

  
    if ($result) {
      $response = (object)[
        "auth_user_id" => $user_id,
        "auth_user_role" => $user_role,
        "auth_login_type" => $login_type
      ];
      echo json_encode(["status" => "success", "data" => $response]);
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