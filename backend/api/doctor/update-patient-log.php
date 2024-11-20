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
    $auth_user_id = isset($data['auth_user_id']) ? mysqli_real_escape_string($conn, $data['auth_user_id']) : null;
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $post_id = $data['ptn_log_id'] ? mysqli_real_escape_string($conn, $data['ptn_log_id']) : null;
      $sql = "UPDATE `fact_patient_log` SET `status` = 'deleted' WHERE ptn_log_id = '$post_id'";
    } else {
      // Process the form data (e.g., save to database, send email, etc.)
      $post_patient_id = mysqli_real_escape_string($conn, $data['patient_id']);
      $post_faculty_id = mysqli_real_escape_string($conn, $data['faculty_id']);
      $post_inpatient = mysqli_real_escape_string($conn, $data['is_inpatient']);

      switch ($post_action) {
        case 'create':
          $iso8601 = (new DateTime())->format(DateTime::ATOM); // Same as ISO 8601

          $sql = "INSERT INTO `fact_patient_log` (`patient_id`, `doctor_id`, `faculty_id`, `is_inpatient`, `start_datetime`, `end_datetime`)
            VALUES ('$post_patient_id', '$auth_user_id', '$post_faculty_id', $post_inpatient, '$iso8601', NULL)";
          break;

        case 'update':
          $post_start_datetime = mysqli_real_escape_string($conn, $data['start_datetime']);
          $post_end_datetime = mysqli_real_escape_string($conn, $data['end_datetime']);
          $sql = "UPDATE `fact_patient_log` SET `patient_id` = '$post_patient_id', `doctor_id` = '$auth_user_id', `faculty_id` = '$post_faculty_id', `is_inpatient` = $post_inpatient,
             `start_datetime` = '$post_start_datetime', `end_datetime` = '$post_end_datetime' WHERE ptn_log_id = '$post_id'";
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