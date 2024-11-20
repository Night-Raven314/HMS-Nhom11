<?php
// Khởi tạo biến
$specialties = []; // Khởi tạo mảng

// Lấy dữ liệu chuyên khoa
$sql = "SELECT specialty_id, specialty_name FROM dim_specialties";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $specialties[] = $row; // Thêm mỗi hàng vào mảng
        }
    } else {
        echo "Không có chuyên khoa nào được tìm thấy.";
    }
} else {
    die("Truy vấn thất bại: " . $conn->error);
}

// Khởi tạo biến
$get_doctors = []; // Khởi tạo mảng

// Lấy dữ liệu chuyên khoa
$sql = "SELECT user_id, full_name FROM dim_user WHERE role = 'doctor' AND user_name LIKE '%doctor%'";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $get_doctors[] = $row; // Thêm mỗi hàng vào mảng
        }
    } else {
        echo "Không có chuyên khoa nào được tìm thấy.";
    }
} else {
    die("Truy vấn thất bại: " . $conn->error);
}