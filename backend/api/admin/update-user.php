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
    // Access form values
    $post_id = $data['userId'] ? mysqli_real_escape_string($conn, $data['userId']) : null;
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $sql = "UPDATE `dim_user` SET
          `status` = 'deleted'
          WHERE user_id = '$post_id'";
    } else {
      $post_full_name = mysqli_real_escape_string($conn, $data['fullName']);
      $post_user_name = mysqli_real_escape_string($conn, $data['userName']);
      $post_email = mysqli_real_escape_string($conn, $data['email']);
      $post_contact_no = mysqli_real_escape_string($conn, $data['contactNo']);
      $post_address = mysqli_real_escape_string($conn, $data['address']);
      $post_city = mysqli_real_escape_string($conn, $data['city']);
      $post_gender = mysqli_real_escape_string($conn, $data['gender']);
      $post_role = mysqli_real_escape_string($conn, $data['role']);
      $default_pwd = $data['password'] ? mysqli_real_escape_string($conn, $data['password']) : "P@ss123";

      // Process the form data (e.g., save to database, send email, etc.)
      switch ($post_action) {
        case 'create':
          $sql = "INSERT INTO `dim_user` (`user_name`, `full_name`, `password`, `email_address`, `contact_no`, `role`, `gender`, `address`, `city`) VALUES ('$post_user_name', '$post_full_name', '$default_pwd', '$post_email', $post_contact_no, '$post_role', '$post_gender', '$post_address', '$post_city')";
          break;

        case 'update':
          $sql = "UPDATE `dim_user` SET
          `user_name` = '$post_user_name',
          `full_name` = '$post_full_name',
          `email_address` = '$post_email',
          `contact_no` = '$post_contact_no',
          `role` = '$post_role',
          `gender` = '$post_gender',
          `address` = '$post_address',
          `city` = '$post_city' 
          WHERE user_id = '$post_id'";
        
        default:
          # code...
          break;
      }
    }

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