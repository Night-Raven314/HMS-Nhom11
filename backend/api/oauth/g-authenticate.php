<?php 

session_start();

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include ('../config.php');
 
require_once ('../../assets/vendor/google-oauth/vendor/autoload.php');

$client = new Google_Client();
$client->setClientId('104458844677-uvj7eo80ufvo6cimqoa3jr4s2rldoje2.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://localhost/google-login-redirect');
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
        $user_data = $service->userinfo->get();

        $user_check = "SELECT * FROM `dim_user` WHERE (`email_address` = '$user_data->email' OR `oauth_google` = '$user_data->email') AND `role` = 'patient'";
        $user_info = mysqli_query($conn, $user_check);

        $count = mysqli_num_rows($user_info);

        if($count == 0){
            $user_email = $user_data->email;
            $full_name = $user_data->name;
            $gender = $user_data->gender;

            $user_add = "INSERT INTO `dim_user` (`email_address`, `oauth_google`, `full_name`, `gender`, `role`) VALUES ('$user_email', '$user_email', '$full_name', '$gender', 'patient')";
            $user_info_add = mysqli_query($conn, $user_add);
            
            $user_get = "SELECT * FROM `dim_user` WHERE `oauth_google` = '$user_email' AND `role` = 'patient'";
            $user_info_get = mysqli_query($conn, $user_get);
            $new_row = mysqli_fetch_assoc($user_info_get);

            // header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/role-patient/complete_profile.php');

            $data = (object)[
              "auth_user_id" => $new_row['user_id'],
              "auth_user_role" => $new_row['role'],
              "auth_login_type" => "google_oauth"
            ];
            echo json_encode(["status" => "success", "data" => $data]);
        } else {
            $old_row = mysqli_fetch_assoc($user_info);

            $data = (object)[
              "auth_user_id" => $old_row['user_id'],
              "auth_user_role" => $old_row['role'],
              "auth_login_type" => "google-oauth"
            ];
            echo json_encode(["status" => "success", "data" => $data]);
        }
    }
} else {
    header('Refresh:0 , url=http://localhost:8080/HMS-Nhom11/index.php');
}
