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
    // Get user data from Facebook
    $response = $fb->get('/me?fields=name,email,picture', $accessToken);
    $userData = $response->getGraphUser();

    // Get user data from Facebook
    $user_email = $userData->getEmail();
    $full_name = $userData->getName();
    // $fbPictureUrl = $userData->getPicture()->getUrl();

    $user_check = "SELECT * FROM `dim_user` WHERE `email_address` = '$user_email' AND `role` = 'patient'";
    $user_info = mysqli_query($conn, $user_check);

    $count = mysqli_num_rows($user_info);

    if($count == 0){

        $user_add = "INSERT INTO `dim_user` (`email_address`, `full_name`, `role`) VALUES ('$user_email', '$full_name', 'patient')";
        $user_info_add = mysqli_query($conn, $user_add);
        
        $user_get = "SELECT * FROM `dim_user` WHERE `email_address` = '$user_email' AND `role` = 'patient'";
        $user_info_get = mysqli_query($conn, $user_get);
        $new_row = mysqli_fetch_assoc($user_info_get);

        $_SESSION['auth_login_user'] = 'facebook_oauth';
        $_SESSION['auth_login_email'] = $new_row['email_address'];
        $_SESSION['auth_user_id'] = $new_row['user_id'];
        $_SESSION['auth_user_role'] = $new_row['role'];
        $_SESSION['auth_login_type'] = 'facebook_oauth';

        header('Refresh:0 , url=http://localhost/HMS-Nhom11/assets/include/redirect.php');
    } else {
        $old_row = mysqli_fetch_assoc($user_info);

        $_SESSION['auth_login_user'] = $old_row['user_name'];
        $_SESSION['auth_login_email'] = $old_row['email_address'];
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
