-- Khởi tạo bảng chứa dữ liệu người dùng
CREATE TABLE `dim_user` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(255) DEFAULT NULL,
    `password` varchar(255) DEFAULT NULL,
    `email_address` varchar(255) DEFAULT NULL,
    `contact_no` bigint(11) DEFAULT NULL,
    `full_name` varchar(255) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    `gender` varchar(50) DEFAULT NULL,
    `city` varchar(255) DEFAULT NULL,
    `address` varchar(255) DEFAULT NULL,
    `role` varchar(50) DEFAULT NULL,
    `pricing` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

-- Khởi tạo bảng chứa các chuyên khoa
CREATE TABLE `dim_specialties` (
    `specialty_id` int(11) NOT NULL AUTO_INCREMENT,
    `specialty_name` varchar(255) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    PRIMARY KEY (`specialty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

-- Khởi tạo bảng chứa dữ liệu thuốc/vật tư
CREATE TABLE `dim_item` (
    `item_id` int(11) NOT NULL AUTO_INCREMENT,
    `item_name` varchar(255) DEFAULT NULL,
    `item_price` int(11) DEFAULT NULL,
    `item_unit` varchar(255) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

-- Khởi tạo bảng chứa lịch hẹn
CREATE TABLE `fact_appointment` (
    `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
    `doctor_id` int(11) DEFAULT NULL,
    `parient_id` int(11) DEFAULT NULL,
    `specialty_id` int(11) DEFAULT NULL,
    `cons_fee` int(11) DEFAULT NULL,
    `booking_date` varchar(255) DEFAULT NULL,
    `booking_time` varchar(255) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    `city` varchar(255) DEFAULT NULL,
    `address` varchar(255) DEFAULT NULL,
    `doctor_status` int(11) DEFAULT NULL,
    `patient_status` int(11) DEFAULT NULL,
    PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

-- Khởi tạo bảng chứa lịch sử đăng nhập
CREATE TABLE `fact_user_login` (
    `login_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `user_name` varchar(255) DEFAULT NULL,
    `user_ip` binary(16) DEFAULT NULL,
    `login_at` timestamp NULL DEFAULT current_timestamp(),
    `logout_at` timestamp NULL DEFAULT NULL,
    `status` int(11) DEFAULT NULL,
    PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

-- Khởi tạo bảng chưa thông tin bệnh nhân
CREATE TABLE `fact_patient_details` (
    `record_id` int(11) NOT NULL AUTO_INCREMENT,
    `doctor_id` int(11) NOT NULL,
    `patient_id` int(11) NOT NULL,
    `patient_note` mediumtext DEFAULT NULL,
    `patient_age` int(10) DEFAULT NULL,
    `med_hist` mediumtext DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
 PRIMARY KEY (`record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

-- Khởi tạo bảng chứa lịch sử khám bệnh
CREATE TABLE `fact_med_hist` (
    `med_hist_id` int(11) NOT NULL AUTO_INCREMENT,
    `patient_id` int(11) DEFAULT NULL,
    `blood_press` varchar(200) DEFAULT NULL,
    `blood_sugar` varchar(200) DEFAULT NULL,
    `weight` varchar(200) DEFAULT NULL,
    `temp` varchar(200) DEFAULT NULL,
    `med_note` mediumtext DEFAULT NULL,
    `prescription_id` int(11) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    PRIMARY KEY (`med_hist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

-- Khởi tạo bảng chứa lịch sử chỉ định thuốc
CREATE TABLE `fact_prescriptions` (
    `pres_id` int(11) NOT NULL AUTO_INCREMENT,
    `med_hist_id` int(11) NOT NULL,
    `item_id` int(11) NOT NULL,
    `amount` int(10) DEFAULT NULL,
    `price` int(10) DEFAULT NULL,
    `item_note` mediumtext DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`pres_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci