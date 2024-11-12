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
    $page_type = mysqli_real_escape_string($conn, $data['pageType']);
    $post_id = $data['itemId'] ? mysqli_real_escape_string($conn, $data['itemId']) : null;
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $sql = "UPDATE `dim_" . $page_type . "` SET
      `status` = 'inactive' WHERE item_id = '$post_id'";
    } else {
      $post_item_name = mysqli_real_escape_string($conn, $data['itemName']);
      $post_item_unit = mysqli_real_escape_string($conn, $data['unit']);
      $post_item_price = mysqli_real_escape_string($conn, $data['price']);

      // Process the form data (e.g., save to database, send email, etc.)
      switch ($post_action) {
        case 'create':
          $sql = "INSERT INTO `dim_" . $page_type . "` (`item_name`, `item_price`, `item_unit`) VALUES ('$post_item_name', '$post_item_price', '$post_item_unit')";
          break;

        case 'update':
          $sql = "UPDATE `dim_" . $page_type . "` SET `item_name` = '$post_item_name', `item_price` = '$post_item_price', `item_unit` = '$post_item_unit' WHERE item_id = '$post_id'";;
        
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