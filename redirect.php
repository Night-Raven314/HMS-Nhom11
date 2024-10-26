<?php
// error_reporting(0);
// Start the session
session_start();

if (!isset($_SESSION['auth_login_user'])) {
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/sign-in.php');
    die();
}

if ($_SESSION['auth_user_role'] === 'admin')
{
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/u-admin/A2-admin-user.php');
    exit();
}

if ($_SESSION['auth_user_role'] === 'doctor')
{
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/F2-user-medhist.php');
    exit();
}

if ($_SESSION['auth_user_role'] === 'patient')
{
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/F1-schedule.php');
    exit();
}
?>