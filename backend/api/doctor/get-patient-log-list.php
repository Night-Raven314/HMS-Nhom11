<?php
  error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
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
    $post_id = $data['patient_id'] ? mysqli_real_escape_string($conn, $data['patient_id']) : null;
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "SELECT
      log.ptn_log_id,
      log.patient_id,
      ptn.full_name,
      log.doctor_id,
      doc.full_name,
      log.faculty_id,
      fac.fac_name,
      log.is_inpatient,
      log.med_note,
      log.start_datetime,
      log.end_datetime,
      log.status
    FROM `fact_patient_log` log
      LEFT JOIN `dim_user` ptn
        ON ptn.user_id = log.patient_id
      LEFT JOIN `dim_user` doc
        ON doc.user_id = log.doctor_id
      LEFT JOIN `dim_faculty` fac
        ON fac.fac_id = log.faculty_id
    WHERE
      patient_id = '$post_id'
      AND log.status <> 'deleted'
    ORDER BY
      log.created_at DESC";
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