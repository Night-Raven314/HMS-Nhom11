<?php
   error_reporting(0);
   // Start the session
   session_start();

   if(!isset($_SESSION['auth_login_user']) || $_SESSION['auth_user_role']!='admin'){
      header('Refresh:0 , url=http://localhost/HMS-Nhom11/sign-in.php');
      die();
   }
   $login_session = $_SESSION['auth_login_user'];
?>