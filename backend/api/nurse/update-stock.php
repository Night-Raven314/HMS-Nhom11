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
    if($post_action === "deduction") {
      foreach ($data as $row) {
        $post_item_id = mysqli_real_escape_string($conn, $row['item_id']);
        $post_amount = mysqli_real_escape_string($conn, $row['amount']);
        $post_stock_note = mysqli_real_escape_string($conn, $row['note']);

        $sub_sql_addition = "INSERT INTO `fact_item_stock` (`item_id`, `change_type`, `amount_changed`, `stock_note`) VALUES ('$post_item_id', 'deduction', '$post_amount', '$post_stock_note')";
        mysqli_query($conn, $sub_sql_create);

      }
    } else if($post_action === "addition") {
      // Process the form data (e.g., save to database, send email, etc.)
      foreach ($data as $row) {
        $post_item_id = mysqli_real_escape_string($conn, $row['item_id']);
        $post_amount = mysqli_real_escape_string($conn, $row['amount']);
        $post_stock_note = mysqli_real_escape_string($conn, $row['note']);

        $sub_sql_addition = "INSERT INTO `fact_item_stock` (`item_id`, `change_type`, `amount_changed`, `stock_note`) VALUES ('$post_item_id', 'addition', '$post_amount', '$post_stock_note')";
        mysqli_query($conn, $sub_sql_create);

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