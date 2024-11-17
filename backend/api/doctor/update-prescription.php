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
    $post_id = $data['med_hist_id'] ? mysqli_real_escape_string($conn, $data['med_hist_id']) : null;
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $sql = "UPDATE `fact_prescription` SET
      `status` = 'deleted' WHERE med_hist_id = '$post_id'";
    } else {
      // Process the form data (e.g., save to database, send email, etc.)
      switch ($post_action) {
        case 'create':
          foreach ($data as $row) {
            $post_item_id = mysqli_real_escape_string($conn, $row['item_id']);
            $post_amount = mysqli_real_escape_string($conn, $row['amount']);
            $post_price = mysqli_real_escape_string($conn, $row['price']);
            $post_note = mysqli_real_escape_string($conn, $row['item_note']);

            $sub_sql_create = "INSERT INTO `fact_prescription` (`med_hist_id`, `item_id`, `amount`, `price`, `item_note`) VALUES ('$post_id', '$post_item_id', '$post_amount', '$post_price', '$post_note')";

          }
          break;

        case 'update':
          $sql = "UPDATE `fact_prescription` SET `status` = 'deleted' WHERE med_hist_id = '$post_id'";
          
          foreach ($data as $row) {
            $post_item_id = mysqli_real_escape_string($conn, $row['item_id']);
            $post_amount = mysqli_real_escape_string($conn, $row['amount']);
            $post_price = mysqli_real_escape_string($conn, $row['price']);
            $post_note = mysqli_real_escape_string($conn, $row['item_note']);

            $sub_sql_create = "INSERT INTO `fact_med_hist` (`med_hist_id`, `item_id`, `amount`, `price`, `item_note`) VALUES ('$post_id', '$post_item_id', '$post_amount', '$post_price', '$post_note')";

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