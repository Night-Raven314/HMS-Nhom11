<?php 

session_start();

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');
 
require_once SITE_ROOT . ('/HMS-Nhom11/assets/vendor/facebook-oauth/src/Facebook/autoload.php');

$fb = new Facebook\Facebook([
    'app_id' => facebook_app_id,
    'app_secret' => facebook_app_secret,
    'default_graph_version' => facebook_oauth_version,
]);

// Create the login helper object
$helper = $fb->getRedirectLoginHelper();
// If the state param exists, set it
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

// If the captured code param exists and is valid
try {
    // Get the access token
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // Handle error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // Handle error
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

// If the access token is not set, redirect to the login page
if (!isset($accessToken)) {
    // Define params and redirect to Facebook OAuth page
    $loginUrl = $helper->getLoginUrl(facebook_app_callback_url, ['email']);
    header('Location: ' . $loginUrl);
    exit;
}
// If the access token is set, the user is logged in
try {

    
    // Get basic user data from Facebook
    $response = $fb->get('/me?fields=name,email', $accessToken);
    $BuserData = $response->getGraphUser();

    // Get basic user data from Facebook
    $user_id = $BuserData->getId();
    $full_name = $BuserData->getName();
    $user_email = '';

    // $fbPictureUrl = $userData->getPicture()->getUrl();
    
    echo $userDetails;

    $user_check = "SELECT * FROM `dim_user` WHERE `oauth_facebook` = '$user_id' AND `role` = 'patient'";
    $user_info = mysqli_query($conn, $user_check);

    $count = mysqli_num_rows($user_info);

    if($count == 0){

        $user_add = "INSERT INTO `dim_user` (`email_address`, `full_name`, `role`, `oauth_facebook`) VALUES ('$user_email', '$full_name', 'patient', '$user_id')";
        $user_info_add = mysqli_query($conn, $user_add);
        $log_user_id = mysqli_insert_id($conn);
        
        // $user_get = "SELECT * FROM `dim_user` WHERE `user_id` = $log_user_id";
        // $user_info_get = mysqli_query($conn, $user_get);
        // $new_row = mysqli_fetch_assoc($user_info_get);

            $_SESSION['auth_user_id'] = $log_user_id;
            $_SESSION['auth_user_role'] = 'patient';
            $_SESSION['auth_login_type'] = 'facebook_oauth';

            $_SESSION['temp_regis_name'] = $full_name;
            $_SESSION['temp_regis_email'] = $user_email;

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/role-patient/complete_profile.php');
    } else {
        $old_row = mysqli_fetch_assoc($user_info);

        $_SESSION['auth_user_id'] = $old_row['user_id'];
        $_SESSION['auth_user_role'] = $old_row['role'];
        $_SESSION['auth_login_type'] = 'facebook_oauth';

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/assets/include/redirect.php');
    }

} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // Handle error
    echo 'Graph returned an error: ' . $e->getMessage();
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // Handle error
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}
