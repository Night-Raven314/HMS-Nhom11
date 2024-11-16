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
    $post_id = $data['itemId'] ? mysqli_real_escape_string($conn, $data['itemId']) : null;
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $sql = "UPDATE `fact_med_hist` SET
      `status` = 'deleted' WHERE med_hist_id = '$post_id'";
    } else {
      $post_blood_press = mysqli_real_escape_string($conn, $data['blood_press']);
      $post_blood_sugar = mysqli_real_escape_string($conn, $data['blood_sugar']);
      $post_weight = mysqli_real_escape_string($conn, $data['weight']);
      $post_temp = mysqli_real_escape_string($conn, $data['temp']);
      $post_med_note = mysqli_real_escape_string($conn, $data['med_note']);

      // Process the form data (e.g., save to database, send email, etc.)
      switch ($post_action) {
        case 'create':
          $sql = "INSERT INTO `fact_med_hist` (`blood_press`, `blood_sugar`, `weight`, `temp`, `med_note`) VALUES ('$post_blood_press', '$post_blood_sugar', '$post_weight', '$post_temp', '$post_med_note')";
          break;

        case 'update':
          $sql = "UPDATE `fact_med_hist` SET `blood_press` = '$post_blood_press', `blood_sugar` = '$post_blood_sugar', `weight` = '$post_weight', `temp` = '$post_temp', `med_note` = '$post_med_note' WHERE med_hist_id = '$post_id'";;
        
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