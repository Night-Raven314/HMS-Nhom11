<?php
//error_reporting(0);

  define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

  include SITE_ROOT . ('/HMS-Nhom11/backend/assets/include/config.php');

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

  // username and password sent from form 
  $form_payment_type = mysqli_real_escape_string($conn, $_POST['payment_type']);
  $form_reference_id = mysqli_real_escape_string($conn, $_POST['reference_id']);
  $form_payment_amount = mysqli_real_escape_string($conn, $_POST['amount']);
  $form_payment_desc = mysqli_real_escape_string($conn, $_POST['payment_desc']);

  $sql = "INSERT INTO `fact_payment` (payment_type, reference_id, amount, payment_desc, payment_status) VALUES ('$form_payment_type', $form_reference_id, $form_payment_amount, '$form_payment_desc', 'pending')";
  $payment_log = mysqli_query($conn, $sql);
  $log_payment_id = mysqli_insert_id($conn);

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

    $payment_amount_temp = isset($payment_amount) ? $payment_amount : '';
    // Order Informations
    $vnp_TxnRef = isset($payment_id) ? $payment_id : ''; //Mã đơn hàng trên hệ thống
    $vnp_OrderInfo = isset($payment_desc) ? $payment_desc : ''; // Mô tả nội dung thanh toán, không dấu, không ký tự đặc biệt
    $vnp_OrderType = 'other'; // Danh mục hàng hoá - Không có doc, mặc định là other
    $vnp_Amount = (int) $payment_amount_temp * 100; // Giá trị đơn hàng x100 (Ví dụ đơn 10000 thì gửi dữ liệu 1000000)
    $vnp_Locale = 'vn'; // Set ngôn ngữ
    $vnp_BankCode = isset($_POST["bank_code"]) ? $_POST["bank_code"] : ''; // vnp_BankCode=VNPAYQR Thanh toán quét mã QR || vnp_BankCode=VNBANK Thẻ ATM - Tài khoản ngân hàng nội địa || vnp_BankCode=INTCARD Thẻ thanh toán quốc tế
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

    echo "<script>window.open('$vnp_Url', '_self');</script>";

  } else {
    $error = "Data retrieval failed";
  }

?>