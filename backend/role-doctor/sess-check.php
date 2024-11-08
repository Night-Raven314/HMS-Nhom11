<?php
   error_reporting(0);

   define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

   include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');

   // Start the session
   session_start();

   if(!isset($_SESSION['auth_user_id']) || $_SESSION['auth_user_role']!='doctor'){
      header('Refresh:0 , url=http://localhost/HMS-Nhom11/sign-in.php');
      die();
   }
   $user_id = $_SESSION['auth_user_id'];

   $user_check = "SELECT * FROM `dim_user` WHERE user_id = $user_id";
   $user_auth = mysqli_query($conn, $user_check);

   $user_auth_data = mysqli_fetch_assoc($user_auth);

   $auth_user_id = $user_auth_data['user_id'];
   $auth_user_name = $user_auth_data['user_name'];
   $auth_full_name = $user_auth_data['full_name'];
   $auth_user_email = $user_auth_data['email_address'];
?>