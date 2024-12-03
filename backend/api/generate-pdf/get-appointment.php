<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include('../config.php');

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
  $start_date = mysqli_real_escape_string($conn, $data['start_date']);
    $end_date = mysqli_real_escape_string($conn, $data['end_date']);
  // Process the form data (e.g., save to database, send email, etc.)
  $sql = "WITH
    doctor_data AS(
    SELECT
      dct.user_id AS doctor_id,
      dct.full_name AS doctor_name,
      fac.fac_id AS faculty_id,
      fac.fac_name AS faculty_name
    FROM `dim_user` dct
      LEFT JOIN `dim_faculty` fac 
        ON dct.faculty_id = fac.fac_id
    ),

    med_hist_match AS(
      SELECT
        appt_id,
        SUM(valid) AS `count`
      FROM
        (
        SELECT
          appt.appt_id,
          CASE WHEN TIMESTAMPDIFF(
              hour,
              mhst.created_at,
              STR_TO_DATE(
                  appt.appt_datetime,
                  '%Y-%m-%dT%H:%i:%s'
              )
            ) BETWEEN 0 AND 2 THEN 1 ELSE 0
      END AS valid
    FROM `fact_appointment` appt
      LEFT JOIN `fact_med_hist` mhst
        ON appt.patient_id = mhst.patient_id
    ) subquery_alias -- Alias for the subquery
    GROUP BY
        appt_id
    )
      SELECT
        appt.appt_id,
        appt.doctor_id,
        dct.doctor_name,
        appt.patient_id,
        ptn.full_name AS patient_name,
        appt.faculty_id,
        dct.faculty_name,
        appt.appt_fee,
        appt.appt_datetime,
        CASE 
          WHEN mhsm.count > 0 THEN 'completed'
          WHEN STR_TO_DATE(appt.appt_datetime, '%Y-%m-%dT%H:%i:%s') >= CURRENT_TIMESTAMP() THEN 'upcoming'
          ELSE 'missed' END AS appt_status
      FROM `fact_appointment` appt
      LEFT JOIN doctor_data dct
        ON appt.doctor_id = dct.doctor_id
      LEFT JOIN `dim_user` ptn
        ON appt.patient_id = ptn.user_id
      LEFT JOIN med_hist_match mhsm
        ON appt.appt_id = mhsm.appt_id
      WHERE
        appt.status <> 'deleted'
      	AND appt.created_at BETWEEN DATE(STR_TO_DATE('$start_date' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
        	AND DATE(STR_TO_DATE('$start_date' COLLATE utf8mb4_general_ci,'%Y-%m-%dT%H:%i:%s'))
      ORDER BY
        appt.created_at DESC, appt.appt_datetime DESC";
  if ($sql) {
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