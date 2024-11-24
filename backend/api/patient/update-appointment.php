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
    $post_id = $data['appt_id'] ? mysqli_real_escape_string($conn, $data['appt_id']) : null;
    $auth_user_id = $data['auth_user_id'] ? mysqli_real_escape_string($conn, $data['auth_user_id']) : null;
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $sql = "UPDATE `fact_appointment` SET
      `status` = 'deleted' WHERE appt_id = '$post_id'";

      $sql_refund = "UPDATE `fact_payment` SET
      `payment_status` = 'refund' WHERE appt_id = '$post_id'";
      mysqli_query($conn, $sql_refund);
    } else {
      $post_doctor_id = mysqli_real_escape_string($conn, $data['doctor_id']);
      $post_faculty_id = mysqli_real_escape_string($conn, $data['faculty_id']);
      $post_appt_fee = mysqli_real_escape_string($conn, $data['appt_fee']);
      $post_appt_datetime = mysqli_real_escape_string($conn, $data['appt_datetime']);

      // Process the form data (e.g., save to database, send email, etc.)
      switch ($post_action) {
        case 'create':
          $sql = "INSERT INTO `fact_appointment` (`doctor_id`, `patient_id`, `faculty_id`, `appt_fee`, `appt_datetime`, `status`) VALUES ('$post_doctor_id', '$auth_user_id', '$post_faculty_id', '$post_appt_fee', '$post_appt_datetime', 'active')";

          break;

        case 'update':
          $sql = "UPDATE `fact_appointment` SET `doctor_id` = '$post_doctor_id', `patient_id` = '$auth_user_id', `faculty_id` = '$post_faculty_id', `appt_fee` = '$post_appt_fee', `appt_datetime` = '$post_appt_datetime' WHERE appt_id = '$post_id'";

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