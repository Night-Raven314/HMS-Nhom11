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
    $auth_faculty_id = $data['faculty_id'] ? mysqli_real_escape_string($conn, $data['faculty_id']) : null;
    $auth_appt_datetime = $data['appt_datetime'] ? mysqli_real_escape_string($conn, $data['appt_datetime']) : null;
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "WITH
      appointment_count AS (
      SELECT
          DISTINCT(appt_raw.doctor_id) AS doctor_id,
          COUNT(appt_raw.appt_id) AS count
      FROM (
          SELECT
              *
          FROM `fact_appointment` appt
          WHERE
              appt.faculty_id = '$auth_faculty_id' COLLATE utf8mb4_general_ci
              AND DATE(STR_TO_DATE(appt.appt_datetime,'%Y-%m-%dT%H:%i:%s')) = DATE(STR_TO_DATE('$auth_appt_datetime' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
              AND HOUR(STR_TO_DATE(appt.appt_datetime,'%Y-%m-%dT%H:%i:%s')) = HOUR(STR_TO_DATE('$auth_appt_datetime' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
          )appt_raw
          GROUP BY 1
      ),

      doctor_shift AS (
      SELECT
          DISTINCT(work.user_id) AS doctor_id,
          usr.full_name AS doctor_name
      FROM `fact_work_schedule` `work`
          LEFT JOIN `dim_user` usr
            ON work.user_id = usr.user_id AND role = 'doctor'
      WHERE
          usr.faculty_id = '$auth_faculty_id' COLLATE utf8mb4_general_ci
          AND DATE(STR_TO_DATE(work.start_datetime,'%Y-%m-%dT%H:%i:%s')) = DATE(STR_TO_DATE('$auth_appt_datetime' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
          AND HOUR(STR_TO_DATE(work.start_datetime,'%Y-%m-%dT%H:%i:%s')) <= HOUR(STR_TO_DATE('$auth_appt_datetime' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
          AND DATE(STR_TO_DATE(work.end_datetime,'%Y-%m-%dT%H:%i:%s')) = DATE(STR_TO_DATE('$auth_appt_datetime' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
          AND HOUR(STR_TO_DATE(work.end_datetime,'%Y-%m-%dT%H:%i:%s')) > HOUR(STR_TO_DATE('$auth_appt_datetime' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
      )

      SELECT
        shift.doctor_id,
        shift.doctor_name
      FROM doctor_shift shift
        LEFT JOIN appointment_count count
            ON shift.doctor_id = count.doctor_id
      WHERE
        (count.count < 3 OR count.count IS NULL)";
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