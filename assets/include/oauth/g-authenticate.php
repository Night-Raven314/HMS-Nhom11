<?php 
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
 
require_once SITE_ROOT . ('/HMS-Nhom11/assets/vendor/google-oauth/vendor/autoload.php');
$client = new Google_Client();
$client->setClientId(google_app_id);
$client->setClientSecret(google_app_secret);
$client->setRedirectUri(google_app_callback_url);
$client->addScope("email");
$client->addScope("profile");
$client->addScope("https://www.googleapis.com/auth/user.addresses.read");
$client->addScope("https://www.googleapis.com/auth/user.birthday.read");
$client->addScope("https://www.googleapis.com/auth/user.gender.read");
$client->addScope("https://www.googleapis.com/auth/user.phonenumbers.read");

$google_url = $client->createAuthUrl();

$service = new Google_Service_Oauth2($client);

if(isset($_GET['code'])){
    $check = $client->authenticate($_GET['code']);
    $_SESSION['g-oauth-token'] = $client->getAccessToken();
    if(isset( $check['error'] )){
        echo $check['error_description'];
    }else{
        $user = $service->userinfo->get();

        $user_check = "SELECT * FROM `dim_user` WHERE `email_address` = '$user->email' AND `role` = 'patient'";
        $user_info = mysqli_query($conn, $user_check);

        if(!$user_info){
            $user_email = $service->userinfo->get("email");
            $full_name = $service->userinfo->get("name");
            $gender = $service->userinfo->get("gender");

            $user_add = "INSERT INTO `dim_user` (`email_address`, `full_name`, `gender`, `role`) VALUES ($user_email, $full_name, $gender, 'patient')";
            $user_info = mysqli_query($conn, $user_add);
            
            $user_check = "SELECT * FROM `dim_user` WHERE `email_address` = '$user_email' AND `role` = 'patient'";
            $user_info = mysqli_query($conn, $user_check);
            $new_row = mysqli_fetch_assoc($result);

            $_SESSION['auth_login_user'] = '';
            $_SESSION['auth_login_email'] = $new_row['email_address'];
            $_SESSION['auth_user_id'] = $new_row['user_id'];
            $_SESSION['auth_user_role'] = $new_row['role'];
            $_SESSION['auth_login_type'] = 'google';

            header('Refresh:0 , url=http://localhost/HMS-Nhom11/redirect.php');
        } else {
            $old_row = mysqli_fetch_assoc($user_info);

            $_SESSION['auth_login_user'] = $old_row['user_name'];
            $_SESSION['auth_login_email'] = $old_row['email_address'];
            $_SESSION['auth_user_id'] = $old_row['user_id'];
            $_SESSION['auth_user_role'] = $old_row['role'];
            $_SESSION['auth_login_type'] = 'google';

            header('Refresh:0 , url=http://localhost/HMS-Nhom11/redirect.php');
        }
    }
} else {
    header('Refresh:0 , url=http://localhost/HMS-Nhom11/redirect.php');
}
