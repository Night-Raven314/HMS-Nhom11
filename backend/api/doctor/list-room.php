<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);
  include ('../config.php');
  
  // Allow CORS requests (optional, based on your setup)
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-Methods: POST");
  
  $errorMsg = "";
  // Get the raw POST data and decode it
  $input = file_get_contents("php://input");
  // Get data sent from FE
  $data = json_decode($input, true);
  if ($data) {
    //$auth_user_id = $data['auth_user_id'] ? mysqli_real_escape_string($conn, $data['auth_user_id']) : null;
    $ptn_log_id = $data['ptn_log_id'] ? mysqli_real_escape_string($conn, $data['ptn_log_id']) : null;
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "WITH
      active_room AS (
      SELECT
        fac_asmt_id,
        item_id,
        amount
      FROM `fact_facility_asmt`
      WHERE
        status <> 'deleted'
      )

      SELECT
        room_order,
        'room' AS item_type,
        DISTINCT(room_id) AS item_id,
        room_name,
        'Giường' AS item_unit
        room_size,
        item_price,
        CASE
          WHEN COUNT(fac_asmt_id) >= room_size THEN 'occupied'
            ELSE 'active' END AS status
      FROM `dim_room` room
        LEFT JOIN active_room actv
          ON actv.item_id = room.room_id
      WHERE
        room.status <> 'active'
      GROUP BY 1, 2, 3, 4, 5
      ORDER BY room_order DESC
      ";
    if($sql) {
      $result = $conn->query($sql);
      if ($result) { 
        // Kiểm tra và hiển thị dữ liệu
        $data = [];
        while ($row = $result->fetch_assoc()) {
          $data[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $data]);
      } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "dbError"]);
      }
    }
  }
?>