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
    // appt_id OR ptn_log_id depending which type of payment being created
    $post_id = $data['post_id'] ? mysqli_real_escape_string($conn, $data['post_id']) : null;

    // Process the form data (e.g., save to database, send email, etc.)
    $post_total_amount = mysqli_real_escape_string($conn, $data['total_amount']);
    $post_payment_desc = mysqli_real_escape_string($conn, $data['payment_desc']);
    
    switch ($post_action) {
      case 'appointment':

        $sql = "INSERT INTO `fact_payment` (`payment_type`, `appt_id`, `amount`, `payment_desc`, `payment_status`) VALUES ('appointment', '$post_id', $post_total_amount, '$post_payment_desc', 'pending')";
        break;

      case 'patient-log':

        $sql = "INSERT INTO `fact_payment` (`payment_type`, `ptn_log_id`, `amount`, `payment_desc`, `payment_status`) VALUES ('patient-log', '$post_id', $post_total_amount, '$post_payment_desc', 'pending')";
        break;
        
      default:
        # code...
        break;
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