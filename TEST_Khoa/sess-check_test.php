<?php
session_start(); // Bắt đầu phiên

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['auth_user_id'])) {
   // Chuyển hướng người dùng về trang đăng nhập nếu chưa đăng nhập
   header("Location: ../TEST_Khoa/sign-in_test.php");
   exit();
}

// Kết nối đến cơ sở dữ liệu
require_once '../assets/include/config.php'; // Bao gồm file kết nối

// Lấy dữ liệu người dùng từ cơ sở dữ liệu
$user_id = mysqli_real_escape_string($conn, $_SESSION['auth_user_id']); // Lấy user_id từ phiên
$sql = "SELECT user_id, user_name, email_address, contact_no, full_name, city, address, role FROM dim_user WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result) {
   if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
   } else {
      echo "Không tìm thấy người dùng.";
      exit();
   }
} else {
   die("Truy vấn thất bại: " . $conn->error);
}

$conn->close();
