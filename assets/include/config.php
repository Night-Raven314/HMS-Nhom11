<?php

// Database Authentication
define('servername','localhost');
define('username','root');
define('password','');
define('dbname','dacn-hms');

// Google Authentication
define('google_app_id','104458844677-uvj7eo80ufvo6cimqoa3jr4s2rldoje2.apps.googleusercontent.com');
define('google_app_secret','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');
define('google_app_callback_url','http://localhost/HMS-Nhom11/assets/include/oauth/g-authenticate.php');

// Facebook Authentication
define('facebook_app_id','8730803523625712');
define('facebook_app_secret','d9116361720a1ab3c7f68964633f07c6');
define('facebook_app_callback_url','http://localhost/HMS-Nhom11/assets/include/oauth/f-authenticate.php');
define('facebook_oauth_version','v18.0');

// Create connection
$conn = new mysqli(servername, username, password, dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{

}

?>