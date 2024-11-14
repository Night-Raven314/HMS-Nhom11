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
    $auth_user_id = $data['auth_user_id'] ? mysqli_real_escape_string($conn, $data['auth_user_id']) : null;
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $sql = "UPDATE `fact_work-schedule` SET `status` = 'inactive' WHERE user_id = '$auth_user_id'";
    } else {
      // Process the form data (e.g., save to database, send email, etc.)
      switch ($post_action) {
        case 'create':
          foreach ($data as $row) {
            $post_start_time = mysqli_real_escape_string($conn, $data['start_datetime']);
            $post_end_time = mysqli_real_escape_string($conn, $data['end_datetime']);
            $post_note = mysqli_real_escape_string($conn, $data['work_note']);

            $sql = "INSERT INTO `fact_work_schedule` (`user_id`, `start_datetime`, `end_datetime`, `work_note`) VALUES ('$auth_user_id', '$post_start_time', '$post_end_time', '$post_note')";
          }
          break;

        case 'update':
          $sql = "UPDATE `fact_work-schedule` SET `status` = 'inactive' WHERE user_id = '$auth_user_id'";
          
          foreach ($data as $row) {
            $post_start_time = mysqli_real_escape_string($conn, $data['start_datetime']);
            $post_end_time = mysqli_real_escape_string($conn, $data['end_datetime']);
            $post_note = mysqli_real_escape_string($conn, $data['work_note']);

            $sql = "INSERT INTO `fact_work_schedule` (`user_id`, `start_datetime`, `end_datetime`, `work_note`) VALUES ('$auth_user_id', '$post_start_time', '$post_end_time', '$post_note')";
          }
          break;

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