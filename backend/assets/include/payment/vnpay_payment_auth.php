<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');

$vnp_HashSecret = vnpay_secret_key;

$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$payment_id = $_GET['vnp_TxnRef'];
echo "<script>console.log('$payment_id');</script>";
$payment_ref = $_GET['vnp_TransactionNo'];

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        echo "GD Thanh cong";
        $payment_update = "UPDATE `fact_payment` SET payment_status = 'completed', bank_trans_code = '$payment_ref' WHERE payment_id = $payment_id";
        $payment_info_update = mysqli_query($conn, $payment_update);
    } else {
        echo "GD Khong thanh cong";
        $payment_update = "UPDATE `fact_payment` SET payment_status = 'failed' WHERE payment_id = $payment_id";
        $payment_info_update = mysqli_query($conn, $payment_update);
    }
} else {
    echo "Chu ky khong hop le";
}
?> 