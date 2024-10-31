<!DOCTYPE html>
<html lang="en">

<?php
//error_reporting(0);

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

include SITE_ROOT . ('/HMS-Nhom11/assets/include/config.php');

date_default_timezone_set('Asia/Ho_Chi_Minh');

session_start();

// VN-Pay Params
$vnp_Url = vnpay_payment_url;
$vnp_Returnurl = vnpay_payment_callback_url;
$vnp_TmnCode = vnpay_terminal_id;
$vnp_HashSecret = vnpay_secret_key;

// // Order Informations
// $vnp_TxnRef = $_POST['payment_id']; //Mã đơn hàng trên hệ thống
// $vnp_OrderInfo = $_POST['payment_desc']; // Mô tả nội dung thanh toán, không dấu, không ký tự đặc biệt
// $vnp_OrderType = 'other'; // Danh mục hàng hoá - Không có doc, mặc định là other
// $vnp_Amount = $_POST['amount'] * 100; // Giá trị đơn hàng x100 (Ví dụ đơn 10000 thì gửi dữ liệu 1000000)
// $vnp_Locale = 'vn'; // Set ngôn ngữ
// $vnp_BankCode = $_POST['bank_code']; // vnp_BankCode=VNPAYQR Thanh toán quét mã QR || vnp_BankCode=VNBANK Thẻ ATM - Tài khoản ngân hàng nội địa || vnp_BankCode=INTCARD Thẻ thanh toán quốc tế
// $vnp_IpAddr = '127.0.0.1'; //$_SERVER['REMOTE_ADDR'];// IP của KH thực hiện giao dịch - php Lấy tự động

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from form 
    $form_payment_type = mysqli_real_escape_string($conn, $_POST['payment_type']);
    $form_reference_id = mysqli_real_escape_string($conn, $_POST['reference_id']);
    $form_payment_amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $form_payment_desc = mysqli_real_escape_string($conn, $_POST['payment_desc']);
  
    $sql = "INSERT INTO `fact_payment` (payment_type, reference_id, amount, payment_desc, payment_status) VALUES ('$form_payment_type', $form_reference_id, $form_payment_amount, '$form_payment_desc', 'pending')";
    $payment_log = mysqli_query($conn, $sql);
    $log_payment_id = mysqli_insert_id($conn);
    echo "<script>console.log('$log_payment_id');</script>";
  
    $payment_get = "SELECT * FROM `fact_payment` WHERE `payment_id` = $log_payment_id";
    $payment_info_get = mysqli_query($conn, $payment_get);
    $payment_data = mysqli_fetch_assoc($payment_info_get);

    $count = mysqli_num_rows($payment_info_get);
  
    if ($count == 1) {
        // Assign payment data for VN Pay
        // Custom Order Info
        $payment_id = $payment_data['payment_id']; // Mã thanh toán
        $payment_type = $payment_data['payment_type']; // Loại thanh toán appointment || prescription
        $reference_id = $payment_data['reference_id']; // Tham chiếu mục đích thanh toán
        $payment_amount = $payment_data['amount']; // Giá trị thanh toán
        $payment_desc = $payment_data['payment_desc']; // Mô tả thanh toán
    } else {
      $error = "Data retrieval failed";
    }
  }

$payment_amount_temp = isset($payment_amount ) ? $payment_amount: '';
// Order Informations
$vnp_TxnRef = isset($payment_id ) ? $payment_id: ''; //Mã đơn hàng trên hệ thống
$vnp_OrderInfo = isset($payment_desc ) ? $payment_desc: ''; // Mô tả nội dung thanh toán, không dấu, không ký tự đặc biệt
$vnp_OrderType = 'other'; // Danh mục hàng hoá - Không có doc, mặc định là other
$vnp_Amount = (int)$payment_amount_temp * 100; // Giá trị đơn hàng x100 (Ví dụ đơn 10000 thì gửi dữ liệu 1000000)
$vnp_Locale = 'vn'; // Set ngôn ngữ
$vnp_BankCode = isset($_POST["bank_code"] ) ? $_POST["bank_code"]: ''; // vnp_BankCode=VNPAYQR Thanh toán quét mã QR || vnp_BankCode=VNBANK Thẻ ATM - Tài khoản ngân hàng nội địa || vnp_BankCode=INTCARD Thẻ thanh toán quốc tế
$vnp_IpAddr = '127.0.0.1'; //$_SERVER['REMOTE_ADDR'];// IP của KH thực hiện giao dịch - php Lấy tự động

//Add Params of 2.0.1 Version
$vnp_ExpireDate = date('YmdHis', strtotime('+30 minutes')); // Set thời hạn thanh toán là 30p

// //Billing (Bỏ qua)
// $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
// $vnp_Bill_Email = $_POST['txt_billing_email'];
// $fullName = trim($_POST['txt_billing_fullname']);
// if (isset($fullName) && trim($fullName) != '') {
//     $name = explode(' ', $fullName);
//     $vnp_Bill_FirstName = array_shift($name);
//     $vnp_Bill_LastName = array_pop($name);
// }
// $vnp_Bill_Address = $_POST['txt_inv_addr1'];
// $vnp_Bill_City = $_POST['txt_bill_city'];
// $vnp_Bill_Country = $_POST['txt_bill_country'];
// $vnp_Bill_State = $_POST['txt_bill_state'];

// // Invoice (Bỏ qua)
// $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
// $vnp_Inv_Email = $_POST['txt_inv_email'];
// $vnp_Inv_Customer = $_POST['txt_inv_customer'];
// $vnp_Inv_Address = $_POST['txt_inv_addr1'];
// $vnp_Inv_Company = $_POST['txt_inv_company'];
// $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
// $vnp_Inv_Type = $_POST['cbo_inv_type'];

// Create Payment Data String
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate" => $vnp_ExpireDate
    // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
    // "vnp_Bill_Email" => $vnp_Bill_Email,
    // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
    // "vnp_Bill_LastName" => $vnp_Bill_LastName,
    // "vnp_Bill_Address" => $vnp_Bill_Address,
    // "vnp_Bill_City" => $vnp_Bill_City,
    // "vnp_Bill_Country" => $vnp_Bill_Country,
    // "vnp_Inv_Phone" => $vnp_Inv_Phone,
    // "vnp_Inv_Email" => $vnp_Inv_Email,
    // "vnp_Inv_Customer" => $vnp_Inv_Customer,
    // "vnp_Inv_Address" => $vnp_Inv_Address,
    // "vnp_Inv_Company" => $vnp_Inv_Company,
    // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
    // "vnp_Inv_Type" => $vnp_Inv_Type
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array(
    'code' => '00'
    ,
    'message' => 'success'
    ,
    'data' => $vnp_Url
);

echo "<script>console.log('$vnp_Url');</script>";

?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta name="Cross-Origin-Opener-Policy" content="same-origin-allow-popups">

    <title>
        Thông tin thanh toán
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material_dash.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('../assets/image/Hospital_Seamless1.png'); background-size: 400px 400px;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Test Thanh toán</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form name="auth_form" role="form" class="text-start" method="POST">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Loại đơn hàng</label>
                                        <input name="payment_type" id="payment_type" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Giá trị</label>
                                        <input name="amount" id="amount" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Nội dung</label>
                                        <input name="payment_desc" id="payment_desc" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Tham chiếu hệ thống</label>
                                        <input name="reference_id" id="reference_id" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Phương thức</label>
                                        <input name="bank_code" id="bank_code" class="form-control">
                                    </div>
                                    <div class="text-center" onclick="paymentRedirect()">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"
                                            >Thanh toán</button>
                                    </div>
                                    <script>
                                        function paymentRedirect() {
                                            window.location.href = "<?php echo $vnp_Url ?>";
                                            
                                        }
                                    </script>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>


<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js"></script>
<script src="../assets/js/popup.js"></script>
</body>

</html>