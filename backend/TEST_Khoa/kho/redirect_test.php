<?php
// error_reporting(0);
// Start the session
session_start();

echo ("{$_SESSION['auth_login_user']}" . "<br />");
echo ("{$_SESSION['auth_login_email']}" . "<br />");
echo ("{$_SESSION['auth_user_id']}" . "<br />");
echo ("{$_SESSION['auth_user_role']}" . "<br />");
echo ("{$_SESSION['auth_login_type']}" . "<br />");

// if (!isset($_SESSION['auth_login_user']) || !isset($_SESSION['auth_login_email'])) {
//     header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/backend/assets/include/log-out.php');
//     die();
// } else if (!isset($_SESSION['auth_user_role'])) {
//     header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/backend/assets/include/log-out.php');
//     die();
// }

if ($_SESSION['auth_user_role'] === 'admin') {
    header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-admin/guest.php');
    exit();
}

if ($_SESSION['auth_user_role'] === 'doctor') {
    header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/TEST_Khoa/profile_test.php');
    exit();
}

if ($_SESSION['auth_user_role'] === 'patient') {
    header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-patient/schedule.php');
    exit();
}
