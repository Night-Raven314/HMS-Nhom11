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
    foreach ($data["request"] as $row) {
      $post_item_id = mysqli_real_escape_string($conn, $row['item_id']);
      $post_action = mysqli_real_escape_string($conn, $row['action']); //addition or deduction
      $post_amount = mysqli_real_escape_string($conn, $row['amount']);
      $post_stock_note = mysqli_real_escape_string($conn, $row['note']);

      $sub_sql_delete = "UPDATE `fact_item_stock` SET `status` = 'deleted' WHERE item_id = '$post_item_id'";
      mysqli_query($conn, $sub_sql_delete);

      $sub_sql_create = "INSERT INTO `fact_item_stock` (`item_id`, `change_type`, `amount_changed`, `stock_note`) VALUES ('$post_item_id', '$post_action', '$post_amount', '$post_stock_note')";
      mysqli_query($conn, $sub_sql_create);

    }
    
    echo json_encode(["status" => "success", "data" => "success"]);

} else {
    // Handle error if no data or missing expected values
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "invalidForm"]);
}
?>