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
    $post_id = $data['facId'] ? mysqli_real_escape_string($conn, $data['facId']) : null;
    $post_action = mysqli_real_escape_string($conn, $data['action']);
    if($post_action === "delete") {
      $sql = "UPDATE `dim_floor` SET
          `status` = 'deleted'
          WHERE floor_id = '$post_id'";
    } else {
      $post_floor_name = mysqli_real_escape_string($conn, $data['name']);
      $post_floor_note = mysqli_real_escape_string($conn, $data['desc']);

      // Process the form data (e.g., save to database, send email, etc.)
      switch ($post_action) {
        case 'create':
          $sql = "INSERT INTO `dim_floor` (`floor_name`, `floor_note`) VALUES ('$post_floor_name', '$post_floor_note')";
          break;

        case 'update':
          $sql = "UPDATE `dim_faculty` SET
          `floor_name` = '$post_floor_name',
          `floor_note` = '$post_floor_note'
          WHERE floor_id = '$post_id'";
        
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