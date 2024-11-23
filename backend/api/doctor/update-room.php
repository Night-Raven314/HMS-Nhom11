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
    $post_id = $data['fact_asmt_id'] ? mysqli_real_escape_string($conn, $data['fact_asmt_id']) : null;
    $post_ptn_log = mysqli_real_escape_string($conn, $row['ptn_log_id']);

    $post_item_type = mysqli_real_escape_string($conn, $row['item_type']);
    $post_item_id = mysqli_real_escape_string($conn, $row['item_id']);
    $post_amount = mysqli_real_escape_string($conn, $row['amount']);
    $post_price = mysqli_real_escape_string($conn, $row['price']);
    $post_note = mysqli_real_escape_string($conn, $row['item_note']);
    $post_start_time = mysqli_real_escape_string($conn, $row['start_time']);
    $post_end_time = mysqli_real_escape_string($conn, $row['end_time']);

    $sql = "INSERT INTO `fact_facility_asmt` (`ptn_log_id`, `item_type`, `item_id`, `amount`, `price`, `item_note`, `start_datetime`, `end_datetime`)
      VALUES ('$post_ptn_log', '$post_item_type', '$post_item_id', $post_amount, $post_price, '$post_note', '$post_start_time', '$post_end_time')";

    $sub_sql_update = "UPDATE `fact_facility_asmt` SET `end_datetime` = '$post_end_time' WHERE `fact_asmt_id` = '$post_id'";
    mysqli_query($conn, $sub_sql_update);

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