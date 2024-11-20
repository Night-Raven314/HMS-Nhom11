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
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $sql = "UPDATE `fact_facility_asmt` SET
      `status` = 'deleted' WHERE fact_asmt_id = '$post_id'";
    } else if($post_action === "create") {

      foreach ($data as $row) {
        $post_item_id = mysqli_real_escape_string($conn, $row['item_id']);
        $post_amount = mysqli_real_escape_string($conn, $row['amount']);
        $post_price = mysqli_real_escape_string($conn, $row['price']);
        $post_note = mysqli_real_escape_string($conn, $row['item_note']);

        $sub_sql_create = "INSERT INTO `fact_prescription` (`med_hist_id`, `item_id`, `amount`, `price`, `item_note`) VALUES ('$post_id', '$post_item_id', '$post_amount', '$post_price', '$post_note');
          INSERT INTO `fact_item_stock` (`item_id`, `change_type`, `amount_changed`) VALUES ('$post_item_id', 'deduction', '$post_amount')";
        mysqli_query($conn, $sub_sql_create);

      }
      echo json_encode(["status" => "success", "data" => "success"]);
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