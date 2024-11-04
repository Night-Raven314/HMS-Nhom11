<?php

// Database Authentication
define('servername', 'localhost');
define('username', 'root');
define('password', '@Rturia14');
define('dbname', 'dacn-hms');

// Google Authentication
define('google_app_id', '104458844677-uvj7eo80ufvo6cimqoa3jr4s2rldoje2.apps.googleusercontent.com');
define('google_app_secret', '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');
define('google_app_callback_url', 'http://localhost/HMS-Nhom11/assets/include/oauth/g-authenticate.php');

// Facebook Authentication
define('facebook_app_id', '8730803523625712');
define('facebook_app_secret', 'f7438a3246ad2a0a75bc9ace3c2c5fa6');
define('facebook_app_callback_url', 'http://localhost/HMS-Nhom11/assets/include/oauth/f-authenticate.php');
define('facebook_oauth_version', 'v18.0');

// VNPAY 
define('vnpay_terminal_id', 'ZZWFS6LR');
define('vnpay_secret_key', 'CKVJO0UP8GK1TIRCNHV0S8R3R6R3RY6I');
define('vnpay_payment_url', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
define('vnpay_payment_callback_url', 'http://localhost/HMS-Nhom11/assets/include/payment/vnpay_payment_auth.php');
// Địa chỉ: https://sandbox.vnpayment.vn/merchantv2/
// Tên đăng nhập: tdangkhoa1606@gmail.com
// Mặt khẩu: 1508152508@Bin


// Create connection
$conn = new mysqli(servername, username, password, dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}
