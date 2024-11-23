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
    $auth_user_id = $data['auth_user_id'] ? mysqli_real_escape_string($conn, $data['auth_user_id']) : null;
    // Process the form data (e.g., save to database, send email, etc.)
    $sql = "WITH
      get_fac AS (
        SELECT
          faculty_id
        FROM `dim_user`
        WHERE
          user_id = '$auth_user_id'
      )

      SELECT
        *
      FROM (
        SELECT
          ROW_NUMBER() OVER (PARTITION BY ptn.user_id ORDER BY hst.created_at DESC) AS row_num,
          doc.user_id AS doctor_id,
          doc.full_name AS doctor_name,
          ptn.user_id AS patient_id,
          ptn.full_name AS patient_name,
          fac.fac_id,
          fac.fac_name,
          ptn.contact_no,
          ptn.gender,
          hst.med_note
        FROM `fact_med_hist` hst
          LEFT JOIN `dim_user` doc
            ON hst.doctor_id = doc.user_id
          LEFT JOIN `dim_user` ptn
            ON hst.patient_id = ptn.user_id
          LEFT JOIN `dim_faculty` fac
            ON doc.faculty_id = fac.fac_id
        WHERE
          fac.fac_id = (SELECT faculty_id FROM get_fac LIMIT 1)
          AND ptn.status <> 'deleted'
        ORDER BY
          hst.updated_at DESC, hst.created_at DESC
      ) final
      WHERE
      row_num = 1";
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