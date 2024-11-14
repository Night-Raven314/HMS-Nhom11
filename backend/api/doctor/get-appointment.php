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
    $auth_user_id = $data['auth_user_id'] ? mysqli_real_escape_string($conn, $data['auth_user_id']) : null;
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "SELECT
        appt.doctor_id,
        dct.full_name AS doctor_name,
        appt.patient_id,
        ptn.full_name AS patient_name,
        appt.faculty_id,
        fac.fac_name AS faculty_name,
        appt.appt_fee,
        appt.appt_datetime
      FROM `fact_appointment` appt
        LEFT JOIN `dim_user` dct
          ON appt.doctor_id = dct.user_id
        LEFT JOIN `dim_user` ptn
          ON appt.patient_id = ptn.user_id
        LEFT JOIN `dim_faculty` fac
          ON appt.faculty_id = dct.faculty_id
      WHERE
        appt.status <> 'inactive' AND doctor_id = '$auth_user_id'";
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