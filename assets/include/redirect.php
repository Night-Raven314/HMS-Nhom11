<?php
// error_reporting(0);
// Start the session
session_start();

// if (!isset($_SESSION['auth_login_user']) || !isset($_SESSION['auth_login_email'])) {
//     header('Refresh:0 , url=http://localhost/HMS-Nhom11/assets/include/log-out.php');
//     die();
// } else if (!isset($_SESSION['auth_user_role'])) {
//     header('Refresh:0 , url=http://localhost/HMS-Nhom11/assets/include/log-out.php');
//     die();
// }

if ($_SESSION['auth_user_role'] === 'admin') {
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-admin/guest.php');
    exit();
}

if ($_SESSION['auth_user_role'] === 'doctor') {
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-doctor/schedule.php');
    exit();
}

if ($_SESSION['auth_user_role'] === 'patient') {
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-patient/schedule.php');
    exit();
}
