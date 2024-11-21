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
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $sql = "UPDATE `fact_med_hist` SET
      `status` = 'deleted' WHERE med_hist_id = '$post_id'";
      mysqli_query($conn, $sql);
    } else {
      $post_blood_press = mysqli_real_escape_string($conn, $data['blood_press']);
      $post_spo2 = mysqli_real_escape_string($conn, $data['spo2']);
      $post_weight = mysqli_real_escape_string($conn, $data['weight']);
      $post_height = mysqli_real_escape_string($conn, $data['height']);
      $post_temp = mysqli_real_escape_string($conn, $data['temp']);
      $post_med_note = mysqli_real_escape_string($conn, $data['med_note']);

      // Process the form data (e.g., save to database, send email, etc.)
      switch ($post_action) {
        case 'create':
          $post_ptn_log = mysqli_real_escape_string($conn, $data['ptn_log_id']);
          $post_doctor_id = mysqli_real_escape_string($conn, $data['doctor_id']);
          $post_patient_id = mysqli_real_escape_string($conn, $data['patient_id']);
          $sql = "INSERT INTO `fact_med_hist` (`ptn_log_id`, `doctor_id`, `patient_id`, `blood_press`, `spo2`, `height`, `weight`, `temp`, `med_note`) VALUES ('$post_ptn_log', '$post_doctor_id', '$post_patient_id', '$post_blood_press', '$post_spo2', '$post_height', '$post_weight', '$post_temp', '$post_med_note')";
          mysqli_query($conn, $sql);

          $sql2 = "UPDATE `fact_patient_log` SET `med_note` = '$post_med_note' WHERE ptn_log_id = '$post_ptn_log'";
          mysqli_query($conn, $sql2);

          break;

        case 'update':
          $post_id = isset($data['med_hist_id']) ? mysqli_real_escape_string($conn, $data['med_hist_id']) : null;
          $sql = "UPDATE `fact_med_hist` SET `ptn_log_id` = '$post_log_id', `blood_press` = '$post_blood_press', `spo2` = '$post_spo2', `height` = '$post_height', `weight` = '$post_weight', `temp` = '$post_temp', `med_note` = '$post_med_note' WHERE med_hist_id = '$post_id'";
          mysqli_query($conn, $sql);

          break;
        
        default:
          # code...
          break;
      }
    }

    echo json_encode(["status" => "success", "data" => "success"]);

} else {
    // Handle error if no data or missing expected values
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "invalidForm"]);
}
?>