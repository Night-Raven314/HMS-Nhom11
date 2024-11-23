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
    // Access form values
    $post_id = isset($data['ptn_log_id']) ? mysqli_real_escape_string($conn, $data['ptn_log_id']) : null;

    $sql_update_pres = "UPDATE `fact_prescription`
        SET `status` = 'completed'
        WHERE
            `med_hist_id` IN (SELECT `med_hist_id` FROM `fact_med_hist` hist WHERE hist.ptn_log_id = '$post_id')";
    mysqli_query($conn, $sql_update_pres);

    $sql_update_hist = "UPDATE `fact_med_hist`
        SET `status` = 'completed'
        WHERE `ptn_log_id` = '$post_id'";
    mysqli_query($conn, $sql_update_hist);

    $sql_update_asmt = "UPDATE `fact_facility_asmt`
        SET `status` = 'completed'
        WHERE `ptn_log_id` = '$post_id'";
    mysqli_query($conn, $sql_update_asmt);

    $sql_update_log = "UPDATE `fact_patient_log`
        SET `status` = 'completed'
        WHERE `ptn_log_id` = '$post_id'";
    mysqli_query($conn, $sql_update_log);

    echo json_encode(["status" => "success", "data" => "success"]);

} else {
    // Handle error if no data or missing expected values
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "invalidForm"]);
}
?>