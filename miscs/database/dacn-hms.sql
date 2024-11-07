-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 03:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dacn-hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `dim_item`
--

CREATE TABLE `dim_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_price` int(11) DEFAULT NULL,
  `item_unit` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_item`
--

INSERT INTO `dim_item` (`item_id`, `item_name`, `item_price`, `item_unit`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 2000, 'viên', '2024-10-07 05:15:01', NULL),
(2, 'Aspirin', 3000, 'viên', '2024-10-07 05:15:01', NULL),
(3, 'Amoxicillin', 25000, 'hộp', '2024-10-07 05:15:01', NULL),
(4, 'Vitamin C', 5000, 'viên', '2024-10-07 05:15:01', NULL),
(5, 'Ibuprofen', 1500, 'viên', '2024-10-07 05:15:01', NULL),
(6, 'Efferalgan', 12000, 'hộp', '2024-10-07 05:15:01', NULL),
(7, 'Panadol', 18000, 'hộp', '2024-10-07 05:15:01', NULL),
(8, 'Clarithromycin', 35000, 'hộp', '2024-10-07 05:15:01', NULL),
(9, 'Metformin', 2000, 'viên', '2024-10-07 05:15:01', NULL),
(10, 'Omeprazole', 10000, 'viên', '2024-10-07 05:15:01', NULL),
(11, 'Loratadine', 8000, 'hộp', '2024-10-07 05:15:01', NULL),
(12, 'Ciprofloxacin', 12000, 'viên', '2024-10-07 05:15:01', NULL),
(13, 'Azithromycin', 30000, 'hộp', '2024-10-07 05:15:01', NULL),
(14, 'Cefalexin', 25000, 'hộp', '2024-10-07 05:15:01', NULL),
(15, 'Acetylcysteine', 15000, 'gói', '2024-10-07 05:15:01', NULL),
(16, 'Silymarin', 4000, 'viên', '2024-10-07 05:15:01', NULL),
(17, 'Prednisolone', 12000, 'viên', '2024-10-07 05:15:01', NULL),
(18, 'Hydroxyzine', 20000, 'hộp', '2024-10-07 05:15:01', NULL),
(19, 'Drotaverin', 15000, 'viên', '2024-10-07 05:15:01', NULL),
(20, 'Diclofenac', 5000, 'viên', '2024-10-07 05:15:01', NULL),
(21, 'Fexofenadine', 25000, 'hộp', '2024-10-07 05:15:01', NULL),
(22, 'Ketoconazole', 20000, 'hộp', '2024-10-07 05:15:01', NULL),
(23, 'Cetirizine', 7000, 'hộp', '2024-10-07 05:15:01', NULL),
(24, 'Meloxicam', 2500, 'viên', '2024-10-07 05:15:01', NULL),
(25, 'Esomeprazole', 20000, 'hộp', '2024-10-07 05:15:01', NULL),
(26, 'Trimebutine', 15000, 'hộp', '2024-10-07 05:15:01', NULL),
(27, 'Loperamide', 3000, 'viên', '2024-10-07 05:15:01', NULL),
(28, 'Simvastatin', 10000, 'viên', '2024-10-07 05:15:01', NULL),
(29, 'Spironolactone', 5000, 'viên', '2024-10-07 05:15:01', NULL),
(30, 'Dulcolax', 12000, 'viên', '2024-10-07 05:15:01', NULL),
(31, 'Calcium carbonate', 8000, 'viên', '2024-10-07 05:15:01', NULL),
(32, 'Atorvastatin', 15000, 'hộp', '2024-10-07 05:15:01', NULL),
(33, 'Gabapentin', 18000, 'hộp', '2024-10-07 05:15:01', NULL),
(34, 'Doxycycline', 25000, 'hộp', '2024-10-07 05:15:01', NULL),
(35, 'Fluconazole', 20000, 'hộp', '2024-10-07 05:15:01', NULL),
(36, 'Montelukast', 18000, 'hộp', '2024-10-07 05:15:01', NULL),
(37, 'Folic Acid', 3000, 'viên', '2024-10-07 05:15:01', NULL),
(38, 'Amlodipine', 10000, 'viên', '2024-10-07 05:15:01', NULL),
(39, 'Candesartan', 15000, 'hộp', '2024-10-07 05:15:01', NULL),
(40, 'Losartan', 13000, 'viên', '2024-10-07 05:15:01', NULL),
(41, 'Levofloxacin', 22000, 'viên', '2024-10-07 05:15:01', NULL),
(42, 'Metronidazole', 10000, 'viên', '2024-10-07 05:15:01', NULL),
(43, 'Propranolol', 12000, 'viên', '2024-10-07 05:15:01', NULL),
(44, 'Lansoprazole', 18000, 'hộp', '2024-10-07 05:15:01', NULL),
(45, 'Ranitidine', 8000, 'viên', '2024-10-07 05:15:01', NULL),
(46, 'Terbinafine', 15000, 'viên', '2024-10-07 05:15:01', NULL),
(47, 'Tetracycline', 12000, 'hộp', '2024-10-07 05:15:01', NULL),
(48, 'Domperidone', 5000, 'viên', '2024-10-07 05:15:01', NULL),
(49, 'Bromhexine', 7000, 'hộp', '2024-10-07 05:15:01', NULL),
(50, 'Clotrimazole', 20000, 'hộp', '2024-10-07 05:15:01', NULL),
(51, 'Nystatin', 10000, 'viên', '2024-10-07 05:15:01', NULL),
(52, 'Băng gạc vô trùng', 15000, 'gói', '2024-10-07 05:20:26', NULL),
(53, 'Khẩu trang y tế', 50000, 'hộp', '2024-10-07 05:20:26', NULL),
(54, 'Bông y tế', 25000, 'hộp', '2024-10-07 05:20:26', NULL),
(55, 'Nhiệt kế điện tử', 300000, 'cái', '2024-10-07 05:20:26', NULL),
(56, 'Máy đo huyết áp', 500000, 'cái', '2024-10-07 05:20:26', NULL),
(57, 'Bộ dụng cụ tiêm insulin', 150000, 'bộ', '2024-10-07 05:20:26', NULL),
(58, 'Găng tay y tế', 50000, 'hộp', '2024-10-07 05:20:26', NULL),
(59, 'Ống tiêm nhựa', 2000, 'cái', '2024-10-07 05:20:26', NULL),
(60, 'Máy đo đường huyết', 600000, 'cái', '2024-10-07 05:20:26', NULL),
(61, 'Băng keo cá nhân', 10000, 'gói', '2024-10-07 05:20:26', NULL),
(62, 'Bộ truyền dịch', 30000, 'bộ', '2024-10-07 05:20:26', NULL),
(63, 'Bình oxy y tế', 1000000, 'bình', '2024-10-07 05:20:26', NULL),
(64, 'Máy xông mũi họng', 800000, 'cái', '2024-10-07 05:20:26', NULL),
(65, 'Nạng y tế', 250000, 'cái', '2024-10-07 05:20:26', NULL),
(66, 'Xe lăn', 2500000, 'cái', '2024-10-07 05:20:26', NULL),
(67, 'Gạc rửa vết thương', 10000, 'gói', '2024-10-07 05:20:26', NULL),
(68, 'Kim tiêm vô trùng', 1000, 'cái', '2024-10-07 05:20:26', NULL),
(69, 'Bộ test đường huyết', 120000, 'bộ', '2024-10-07 05:20:26', NULL),
(70, 'Mặt nạ oxy', 50000, 'cái', '2024-10-07 05:20:26', NULL),
(71, 'Bộ dụng cụ sơ cứu', 150000, 'bộ', '2024-10-07 05:20:26', NULL),
(72, 'Cân sức khỏe điện tử', 250000, 'cái', '2024-10-07 05:20:26', NULL),
(73, 'Máy đo nồng độ oxy (SpO2)', 450000, 'cái', '2024-10-07 05:20:26', NULL),
(74, 'Máy trợ thở', 1500000, 'cái', '2024-10-07 05:20:26', NULL),
(75, 'Găng tay cao su', 40000, 'hộp', '2024-10-07 05:20:26', NULL),
(76, 'Ống nghe y tế', 300000, 'cái', '2024-10-07 05:20:26', NULL),
(77, 'Bình xịt mũi', 70000, 'chai', '2024-10-07 05:20:26', NULL),
(78, 'Băng thun hỗ trợ khớp', 100000, 'cái', '2024-10-07 05:20:26', NULL),
(79, 'Bông ngoáy tai y tế', 5000, 'gói', '2024-10-07 05:20:26', NULL),
(80, 'Kính bảo hộ y tế', 80000, 'cái', '2024-10-07 05:20:26', NULL),
(81, 'Máy đo nhiệt độ trán', 400000, 'cái', '2024-10-07 05:20:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dim_specialties`
--

CREATE TABLE `dim_specialties` (
  `specialty_id` int(11) NOT NULL,
  `specialty_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_specialties`
--

INSERT INTO `dim_specialties` (`specialty_id`, `specialty_name`, `description`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Khoa Tim mạch', 'Chuyên chẩn đoán, điều trị bệnh mạch vành, tăng huyết áp, suy tim, rối loạn nhịp tim.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11'),
(2, 'Khoa Thần kinh', 'Điều trị các bệnh lý hệ thần kinh trung ương và ngoại vi như đột quỵ, động kinh, tủy sống.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11'),
(3, 'Khoa Chấn thương chỉnh hình', 'Chăm sóc chấn thương, dị tật, thoái hóa khớp và bệnh lý hệ cơ xương.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11'),
(4, 'Khoa Nhi', 'Chăm sóc sức khỏe toàn diện cho trẻ sơ sinh, trẻ em, thanh thiếu niên với nhiều bệnh lý trẻ em.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11'),
(5, 'Khoa Ung bướu', 'Chuyên phát hiện và điều trị các loại ung thư như ung thư phổi, vú, máu và khối u.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11'),
(6, 'Khoa Tai mũi họng', 'Điều trị viêm tai, mũi, họng, viêm xoang, đau họng mãn tính và các rối loạn liên quan.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11'),
(7, 'Khoa Hô hấp', 'Chẩn đoán, điều trị các bệnh đường hô hấp như viêm phổi, hen suyễn, COPD, bệnh phổi.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11'),
(8, 'Khoa Tiêu hóa', 'Điều trị các bệnh đường tiêu hóa như viêm gan, dạ dày, ruột, gan, mật và tuyến tụy.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11'),
(9, 'Khoa Da liễu', 'Chăm sóc bệnh da như viêm da, dị ứng, mụn trứng cá, sắc tố và nhiễm trùng da.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11'),
(10, 'Khoa Phụ sản', 'Chăm sóc sức khỏe sinh sản phụ nữ từ thai kỳ, sinh nở đến khám phụ khoa và hậu sản.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `dim_user`
--

CREATE TABLE `dim_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `contact_no` bigint(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `gender` varchar(25) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `pricing` varchar(255) DEFAULT NULL,
  `oauth_google` varchar(255) DEFAULT NULL,
  `oauth_facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_user`
--

INSERT INTO `dim_user` (`user_id`, `user_name`, `password`, `email_address`, `contact_no`, `full_name`, `created_at`, `updated_at`, `gender`, `city`, `address`, `role`, `specialty_id`, `pricing`, `oauth_google`, `oauth_facebook`) VALUES
(1, 'huan_patient', 'password123', 'huan.nguyen@example.com', 84912345601, 'Nguyen Nhut Gia Huan', '2024-10-07 05:36:07', '2024-11-06 18:59:09', 'male', 'Ho Chi Minh', '1 Mac Dinh Chi', 'patient', NULL, NULL, NULL, NULL),
(2, 'huan_doctor', 'password123', 'huan.nguyen@example.com', 84912345602, 'Nguyen Nhut Gia Huan', '2024-10-07 05:36:07', '2024-11-06 18:58:17', 'male', 'Ho Chi Minh', '1 Le Duan New', 'doctor', 7, '400000', NULL, NULL),
(3, 'huan_admin', 'password123', 'huan.nguyen@example.com', 84567890123, 'Nguyen Nhut Gia Huan', '2024-10-07 05:36:07', '2024-11-06 18:32:49', 'male', 'Ho Chi Minh', '1 Le Duan 14', 'admin', NULL, NULL, NULL, NULL),
(4, 'long_patient', 'password123', 'long.nguyen@example.com', 84912345604, 'Nguyen Ba Long', '2024-10-07 05:36:07', NULL, 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'patient', NULL, NULL, NULL, NULL),
(5, 'long_doctor', 'password123', 'long.nguyen@example.com', 84912345605, 'Nguyen Ba Long', '2024-10-07 05:36:07', '2024-11-02 06:00:09', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'doctor', 3, '450000', NULL, NULL),
(6, 'long_admin', 'password123', 'long.nguyen@example.com', 84912345606, 'Nguyen Ba Long', '2024-10-07 05:36:07', NULL, 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'admin', NULL, NULL, NULL, NULL),
(7, 'khoa_patient', 'password123', 'khoa.tran@example.com', 84912345607, 'Tran Nguyen Dang Khoa', '2024-10-07 05:36:07', NULL, 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, NULL),
(8, 'khoa_doctor', 'password123', 'khoa.tran@example.com', 84912345608, 'Tran Nguyen Dang Khoa', '2024-10-07 05:36:07', '2024-11-02 06:00:09', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'doctor', 10, '500000', NULL, NULL),
(9, 'khoa_admin', 'password123', 'khoa.tran@example.com', 84912345609, 'Tran Nguyen Dang Khoa', '2024-10-07 05:36:07', NULL, 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'admin', NULL, NULL, NULL, NULL),
(10, 'doctor10', 'password123', 'doctor10@example.com', 84910000010, 'Nguyen Van An', '2024-10-07 05:44:49', '2024-11-02 06:00:09', 'male', 'Ho Chi Minh', '10 Phan Xich Long', 'doctor', 1, '350000', NULL, NULL),
(11, 'doctor11', 'password123', 'doctor11@example.com', 84910000011, 'Tran Thi Bich', '2024-10-07 05:44:49', '2024-11-02 06:00:09', 'female', 'Ho Chi Minh', '11 Le Van Sy', 'doctor', 6, '370000', NULL, NULL),
(12, 'doctor12', 'password123', 'doctor12@example.com', 84910000012, 'Pham Minh Cuong', '2024-10-07 05:44:49', '2024-11-02 06:00:09', 'male', 'Ho Chi Minh', '12 Nguyen Trai', 'doctor', 4, '400000', NULL, NULL),
(13, 'doctor13', 'password123', 'doctor13@example.com', 84000000013, 'Vo Thi Hoa', '2024-10-07 05:44:49', '2024-11-05 01:21:01', 'female', 'Ho Chi Minh', '14 Vo Thi Sau', 'doctor', 9, '450000', NULL, NULL),
(14, 'doctor14', 'password123', 'doctor14@example.com', 84910000014, 'Tran Van Hai', '2024-10-07 05:44:49', '2024-11-02 06:00:09', 'male', 'Ho Chi Minh', '14 Hai Ba Trung', 'doctor', 2, '420000', NULL, NULL),
(15, 'doctor15', 'password123', 'doctor15@example.com', 84910000015, 'Pham Van Khoa', '2024-10-07 05:44:49', '2024-11-02 06:00:09', 'male', 'Ho Chi Minh', '15 Le Lai', 'doctor', 8, '390000', NULL, NULL),
(16, 'doctor16', 'password123', 'doctor16@example.com', 84910000016, 'Nguyen Thi Lan', '2024-10-07 05:44:49', '2024-11-02 06:00:09', 'female', 'Ho Chi Minh', '16 Tran Hung Dao', 'doctor', 5, '480000', NULL, NULL),
(17, 'doctor17', 'password123', 'doctor17@example.com', 84910000017, 'Tran Van Minh', '2024-10-07 05:44:49', '2024-11-02 06:00:09', 'male', 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 'doctor', 3, '460000', NULL, NULL),
(18, 'doctor18', 'password123', 'doctor18@example.com', 84910000018, 'Pham Thi Nhi', '2024-10-07 05:44:49', '2024-11-02 06:00:09', 'female', 'Ho Chi Minh', '18 Le Duan', 'doctor', 7, '410000', NULL, NULL),
(19, 'doctor19', 'password123', 'doctor19@example.com', 84910000019, 'Nguyen Van Quan', '2024-10-07 05:44:49', '2024-11-02 06:00:09', 'male', 'Ho Chi Minh', '19 Dong Khoi', 'doctor', 1, '500000', NULL, NULL),
(20, 'patient20', 'password123', 'patient20@example.com', 84920000020, 'Nguyen Van Tuan', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '20 Nguyen Hue', 'patient', NULL, NULL, NULL, NULL),
(21, 'patient21', 'password123', 'patient21@example.com', 84920000021, 'Tran Thi Thao', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '21 Le Thanh Ton', 'patient', NULL, NULL, NULL, NULL),
(22, 'patient22', 'password123', 'patient22@example.com', 84920000022, 'Pham Van Hoang', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '22 Tran Van Kieu', 'patient', NULL, NULL, NULL, NULL),
(23, 'patient23', 'password123', 'patient23@example.com', 84920000023, 'Nguyen Thi Ly', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '23 Le Loi', 'patient', NULL, NULL, NULL, NULL),
(24, 'patient24', 'password123', 'patient24@example.com', 84920000024, 'Tran Van Dat', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '24 Pham Ngoc Thach', 'patient', NULL, NULL, NULL, NULL),
(25, 'patient25', 'password123', 'patient25@example.com', 84920000025, 'Pham Thi Kim', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '25 Vo Van Tan', 'patient', NULL, NULL, NULL, NULL),
(26, 'patient26', 'password123', 'patient26@example.com', 84920000026, 'Nguyen Van Phuc', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '26 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, NULL),
(27, 'patient27', 'password123', 'patient27@example.com', 84920000027, 'Tran Thi Mai', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '27 Le Van Sy', 'patient', NULL, NULL, NULL, NULL),
(28, 'patient28', 'password123', 'patient28@example.com', 84920000028, 'Pham Van Tinh', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '28 Nguyen Trai', 'patient', NULL, NULL, NULL, NULL),
(29, 'patient29', 'password123', 'patient29@example.com', 84920000029, 'Nguyen Thi Hanh', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '29 Hai Ba Trung', 'patient', NULL, NULL, NULL, NULL),
(30, 'patient30', 'password123', 'patient30@example.com', 84920000030, 'Tran Van Quang', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '30 Nguyen Hue', 'patient', NULL, NULL, NULL, NULL),
(31, 'patient31', 'password123', 'patient31@example.com', 84920000031, 'Pham Thi Trang', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '31 Le Thanh Ton', 'patient', NULL, NULL, NULL, NULL),
(32, 'patient32', 'password123', 'patient32@example.com', 84920000032, 'Nguyen Van Son', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '32 Tran Van Kieu', 'patient', NULL, NULL, NULL, NULL),
(33, 'patient33', 'password123', 'patient33@example.com', 84920000033, 'Tran Thi Hoa', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '33 Le Loi', 'patient', NULL, NULL, NULL, NULL),
(34, 'patient34', 'password123', 'patient34@example.com', 84920000034, 'Pham Van Cuong', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '34 Pham Ngoc Thach', 'patient', NULL, NULL, NULL, NULL),
(35, 'patient35', 'password123', 'patient35@example.com', 84920000035, 'Nguyen Thi Ngoc', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '35 Vo Van Tan', 'patient', NULL, NULL, NULL, NULL),
(36, 'patient36', 'password123', 'patient36@example.com', 84920000036, 'Tran Van Hieu', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '36 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, NULL),
(37, 'patient37', 'password123', 'patient37@example.com', 84920000037, 'Pham Thi An', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '37 Le Van Sy', 'patient', NULL, NULL, NULL, NULL),
(38, 'patient38', 'password123', 'patient38@example.com', 84920000038, 'Nguyen Van Thanh', '2024-10-07 05:44:59', NULL, 'male', 'Ho Chi Minh', '38 Nguyen Trai', 'patient', NULL, NULL, NULL, NULL),
(39, 'patient39', 'password123', 'patient39@example.com', 84920000039, 'Tran Thi Kim', '2024-10-07 05:44:59', NULL, 'female', 'Ho Chi Minh', '39 Hai Ba Trung', 'patient', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fact_appointment`
--

CREATE TABLE `fact_appointment` (
  `appointment_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `cons_fee` int(11) DEFAULT NULL,
  `booking_date` varchar(255) DEFAULT NULL,
  `booking_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `doctor_status` int(11) DEFAULT NULL,
  `patient_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_appointment`
--

INSERT INTO `fact_appointment` (`appointment_id`, `doctor_id`, `patient_id`, `specialty_id`, `cons_fee`, `booking_date`, `booking_time`, `created_at`, `updated_at`, `city`, `address`, `doctor_status`, `patient_status`) VALUES
(1, 13, 25, 4, 450000, '01/08/2024', '09:30 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '13 Vo Thi Sau', 1, 1),
(2, 16, 28, 7, 480000, '03/08/2024', '11:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '16 Tran Hung Dao', 1, 1),
(3, 12, 20, 3, 400000, '05/08/2024', '02:15 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '12 Nguyen Trai', 1, 1),
(4, 15, 24, 6, 390000, '07/08/2024', '04:45 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '15 Le Lai', 1, 1),
(5, 18, 32, 9, 410000, '09/08/2024', '08:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '18 Le Duan', 1, 1),
(6, 14, 23, 5, 420000, '11/08/2024', '10:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '14 Hai Ba Trung', 1, 1),
(7, 17, 30, 8, 460000, '13/08/2024', '01:30 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 1, 1),
(8, 11, 31, 2, 370000, '15/08/2024', '05:00 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '11 Le Van Sy', 1, 1),
(9, 10, 21, 1, 350000, '17/08/2024', '06:15 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '10 Phan Xich Long', 1, 1),
(10, 19, 22, 10, 500000, '19/08/2024', '07:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '19 Dong Khoi', 1, 1),
(11, 14, 29, 5, 420000, '21/08/2024', '11:45 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '14 Hai Ba Trung', 1, 1),
(12, 13, 33, 4, 450000, '23/08/2024', '12:30 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '13 Vo Thi Sau', 1, 1),
(13, 15, 26, 6, 390000, '25/08/2024', '09:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '15 Le Lai', 1, 1),
(14, 18, 35, 9, 410000, '27/08/2024', '02:00 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '18 Le Duan', 1, 1),
(15, 17, 27, 8, 460000, '29/08/2024', '04:30 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 1, 1),
(16, 12, 36, 3, 400000, '31/08/2024', '03:00 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '12 Nguyen Trai', 1, 1),
(17, 10, 34, 1, 350000, '02/09/2024', '10:30 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '10 Phan Xich Long', 1, 1),
(18, 11, 28, 2, 370000, '04/09/2024', '02:45 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '11 Le Van Sy', 1, 1),
(19, 16, 37, 7, 480000, '06/09/2024', '09:30 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '16 Tran Hung Dao', 1, 1),
(20, 19, 38, 10, 500000, '08/09/2024', '01:00 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '19 Dong Khoi', 1, 1),
(21, 13, 22, 4, 450000, '10/09/2024', '11:15 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '13 Vo Thi Sau', 1, 1),
(22, 12, 24, 3, 400000, '12/09/2024', '05:30 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '12 Nguyen Trai', 1, 1),
(23, 15, 31, 6, 390000, '14/09/2024', '07:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '15 Le Lai', 1, 1),
(24, 16, 21, 7, 480000, '16/09/2024', '08:45 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '16 Tran Hung Dao', 1, 1),
(25, 11, 39, 2, 370000, '18/09/2024', '12:15 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '11 Le Van Sy', 1, 1),
(26, 10, 35, 1, 350000, '20/09/2024', '02:00 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '10 Phan Xich Long', 1, 1),
(27, 14, 30, 5, 420000, '22/09/2024', '03:30 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '14 Hai Ba Trung', 1, 1),
(28, 17, 36, 8, 460000, '24/09/2024', '05:45 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 1, 1),
(29, 18, 32, 9, 410000, '26/09/2024', '06:15 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '18 Le Duan', 1, 1),
(30, 19, 23, 10, 500000, '28/09/2024', '07:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '19 Dong Khoi', 1, 1),
(31, 16, 38, 7, 480000, '30/09/2024', '09:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '16 Tran Hung Dao', 1, 1),
(32, 12, 27, 3, 400000, '02/10/2024', '11:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '12 Nguyen Trai', 1, 1),
(33, 15, 28, 6, 390000, '04/10/2024', '02:30 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '15 Le Lai', 1, 1),
(34, 14, 39, 5, 420000, '06/10/2024', '04:00 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '14 Hai Ba Trung', 1, 1),
(35, 13, 34, 4, 450000, '08/10/2024', '06:00 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '13 Vo Thi Sau', 1, 1),
(36, 11, 26, 2, 370000, '10/10/2024', '08:15 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '11 Le Van Sy', 1, 1),
(37, 10, 29, 1, 350000, '11/10/2024', '09:45 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '10 Phan Xich Long', 1, 1),
(38, 18, 37, 9, 410000, '12/10/2024', '11:00 am', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '18 Le Duan', 1, 1),
(39, 19, 25, 10, 500000, '13/10/2024', '03:45 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '19 Dong Khoi', 1, 1),
(40, 17, 20, 8, 460000, '14/10/2024', '05:15 pm', '2024-10-10 15:40:44', NULL, 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fact_med_hist`
--

CREATE TABLE `fact_med_hist` (
  `med_hist_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `blood_press` varchar(200) DEFAULT NULL,
  `blood_sugar` varchar(200) DEFAULT NULL,
  `weight` varchar(200) DEFAULT NULL,
  `temp` varchar(200) DEFAULT NULL,
  `med_note` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_med_hist`
--

INSERT INTO `fact_med_hist` (`med_hist_id`, `appointment_id`, `patient_id`, `blood_press`, `blood_sugar`, `weight`, `temp`, `med_note`, `created_at`, `updated_at`) VALUES
(1, 0, 21, '115/75', '5.0', '55', '36.0', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL),
(2, 0, 39, '120/80', '5.5', '60', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL),
(3, 0, 22, '145/92', '7.5', '82', '38.0', 'Huyết áp tăng cao. Đã kê thuốc.', '2024-10-08 14:49:09', NULL),
(4, 0, 34, '145/90', '7.1', '78', '37.9', 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 14:49:09', NULL),
(5, 0, 28, '140/90', '6.8', '75', '37.8', 'Chẩn đoán tiểu đường. Bắt đầu điều trị.', '2024-10-08 14:49:09', NULL),
(6, 0, 26, '135/88', '6.4', '75', '37.0', 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 14:49:09', NULL),
(7, 0, 30, '135/88', '7.0', '76', '37.5', 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 14:49:09', NULL),
(8, 0, 20, '120/80', '5.5', '65', '36.5', 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.', '2024-10-08 14:49:09', NULL),
(9, 0, 31, '120/78', '5.1', '59', '36.3', 'Không có vấn đề gì.', '2024-10-08 14:49:09', NULL),
(10, 0, 35, '120/80', '5.0', '64', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL),
(11, 0, 36, '125/80', '5.9', '75', '37.0', 'Huyết áp đã ổn định.', '2024-10-08 14:49:09', NULL),
(12, 0, 23, '130/85', '5.4', '70', '36.8', 'Kiểm tra cho thấy kết quả bình thường.', '2024-10-08 14:49:09', NULL),
(13, 0, 38, '140/90', '7.0', '85', '37.8', 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 14:49:09', NULL),
(14, 0, 40, '115/75', '5.1', '73', '36.5', 'Tất cả các chỉ số đều trong phạm vi bình thường.', '2024-10-08 14:49:09', NULL),
(15, 0, 27, '125/80', '5.2', '70', '36.9', 'Kiểm tra định kỳ. Kết quả bình thường.', '2024-10-08 14:49:09', NULL),
(16, 0, 25, '120/78', '5.3', '62', '36.6', 'Tất cả chỉ số trong phạm vi bình thường.', '2024-10-08 14:49:09', NULL),
(17, 0, 24, '150/95', '8.0', '90', '38.5', 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 14:49:09', NULL),
(18, 0, 29, '125/82', '5.4', '63', '36.6', 'Đường huyết hơi cao. Khuyên thay đổi chế độ ăn uống.', '2024-10-08 14:49:09', NULL),
(19, 0, 32, '130/85', '5.7', '80', '37.5', 'Kiểm tra cho thấy kết quả bình thường.', '2024-10-08 14:49:09', NULL),
(20, 0, 33, '125/80', '5.2', '70', '36.9', 'Kiểm tra định kỳ. Kết quả bình thường.', '2024-10-08 14:49:09', NULL),
(21, 0, 37, '110/70', '5.4', '58', '36.1', 'Kiểm tra sức khỏe định kỳ. Tất cả bình thường.', '2024-10-08 14:49:09', NULL),
(22, 0, 21, '110/70', '4.9', '55', '36.0', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL),
(23, 0, 22, '140/90', '6.5', '80', '37.8', 'Chẩn đoán tăng huyết áp. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 14:49:09', NULL),
(24, 0, 24, '145/92', '8.5', '91', '38.7', 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.', '2024-10-08 14:49:09', NULL),
(25, 0, 25, '125/82', '5.1', '56', '36.3', 'Mức đường huyết bình thường.', '2024-10-08 14:49:09', NULL),
(26, 0, 40, '130/85', '6.0', '76', '37.2', 'Cần theo dõi huyết áp thường xuyên.', '2024-10-08 14:49:09', NULL),
(27, 0, 39, '125/82', '5.7', '61', '36.6', 'Không có vấn đề gì.', '2024-10-08 14:49:09', NULL),
(28, 0, 38, '145/92', '7.5', '87', '38.0', 'Mức đường huyết cao. Đã điều chỉnh thuốc.', '2024-10-08 14:49:09', NULL),
(29, 0, 26, '130/85', '6.1', '76', '37.1', 'Cần chú ý đến chế độ ăn uống.', '2024-10-08 14:49:09', NULL),
(30, 0, 30, '130/85', '6.5', '74', '37.3', 'Mức đường huyết đã được kiểm soát bằng thuốc.', '2024-10-08 14:49:09', NULL),
(31, 0, 28, '130/85', '6.5', '84', '37.8', 'Huyết áp đã ổn định. Tiếp tục điều trị.', '2024-10-08 14:49:09', NULL),
(32, 0, 29, '130/84', '5.8', '64', '36.7', 'Theo dõi mức đường huyết. Cần kiểm tra lại.', '2024-10-08 14:49:09', NULL),
(33, 0, 27, '120/78', '5.3', '63', '36.4', 'Kiểm tra định kỳ. Không có vấn đề gì.', '2024-10-08 14:49:09', NULL),
(34, 0, 20, '135/88', '6.0', '66', '37.0', 'Huyết áp hơi cao. Cần theo dõi chế độ ăn uống.', '2024-10-08 14:49:09', NULL),
(35, 0, 31, '115/75', '5.0', '64', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL),
(36, 0, 36, '135/88', '6.4', '77', '37.2', 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 14:49:09', NULL),
(37, 0, 33, '130/85', '5.5', '72', '37.0', 'Không có dấu hiệu bất thường.', '2024-10-08 14:49:09', NULL),
(38, 0, 35, '120/80', '5.0', '64', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL),
(39, 0, 34, '140/88', '6.9', '79', '37.8', 'Cần kiểm tra lại trong tháng tới.', '2024-10-08 14:49:09', NULL),
(40, 0, 28, '140/88', '6.8', '86', '38.0', 'Cần theo dõi huyết áp. Kiểm tra định kỳ cần thiết.', '2024-10-08 14:49:09', NULL),
(41, 0, 26, '120/80', '5.2', '75', '37.1', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL),
(42, 0, 30, '140/90', '6.0', '75', '38.2', 'Huyết áp đã ổn định.', '2024-10-08 14:49:09', NULL),
(43, 0, 23, '140/90', '6.5', '78', '37.3', 'Cần theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 14:49:09', NULL),
(44, 0, 21, '110/70', '5.0', '56', '36.2', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL),
(45, 0, 22, '130/85', '6.8', '82', '37.1', 'Huyết áp đã ổn định.', '2024-10-08 14:49:09', NULL),
(46, 0, 24, '130/85', '5.9', '79', '37.6', 'Huyết áp và đường huyết đều trong mức bình thường.', '2024-10-08 14:49:09', NULL),
(47, 0, 39, '120/80', '5.5', '60', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL),
(48, 0, 37, '115/75', '5.0', '58', '36.2', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fact_patient_details`
--

CREATE TABLE `fact_patient_details` (
  `record_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_age` int(10) DEFAULT NULL,
  `med_hist` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_patient_details`
--

INSERT INTO `fact_patient_details` (`record_id`, `doctor_id`, `patient_id`, `patient_age`, `med_hist`, `created_at`, `updated_at`) VALUES
(1, 14, 20, 35, 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 15:03:48', NULL),
(2, 10, 21, 21, 'Kiểm tra sức khỏe bình thường.', '2024-10-08 15:03:48', NULL),
(3, 15, 22, 31, 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(4, 13, 23, 35, 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 15:03:48', NULL),
(5, 13, 24, 42, 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(6, 12, 25, 40, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 15:03:48', NULL),
(7, 11, 26, 27, 'Huyết áp đã ổn định. Theo dõi thường xuyên.', '2024-10-08 15:03:48', NULL),
(8, 16, 27, 38, 'Chẩn đoán tăng huyết áp. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 15:03:48', NULL),
(9, 19, 28, 29, 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 15:03:48', NULL),
(10, 10, 29, 24, 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.', '2024-10-08 15:03:48', NULL),
(11, 11, 30, 45, 'Kiểm tra cho thấy kết quả bình thường.', '2024-10-08 15:03:48', NULL),
(12, 15, 31, 33, 'Mức đường huyết cao. Đã điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(13, 12, 32, 36, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 15:03:48', NULL),
(14, 13, 33, 32, 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 15:03:48', NULL),
(15, 14, 34, 54, 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 15:03:48', NULL),
(16, 19, 35, 26, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 15:03:48', NULL),
(17, 16, 36, 42, 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(18, 11, 37, 37, 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(19, 18, 38, 44, 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 15:03:48', NULL),
(20, 19, 39, 48, 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.', '2024-10-08 15:03:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fact_payment`
--

CREATE TABLE `fact_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `reference_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_desc` varchar(255) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `bank_trans_code` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_payment`
--

INSERT INTO `fact_payment` (`payment_id`, `payment_type`, `reference_id`, `amount`, `payment_desc`, `payment_status`, `bank_trans_code`, `created_at`, `updated_at`) VALUES
(6, 'appointment', 4, '345000', 'Test Pay 1', 'pending', NULL, '2024-11-07', NULL),
(7, 'appointment', 4, '345000', 'Test Pay 1', 'pending', NULL, '2024-11-07', NULL),
(8, 'appointment', 6, '345000', 'Test Pay 2', 'pending', NULL, '2024-11-07', NULL),
(9, 'appointment', 7, '123000', 'Test pay 3', 'completed', '14641906', '2024-11-07', NULL),
(10, 'prescription', 12, '120000', 'Test Pay 4', 'completed', '14641914', '2024-11-07', NULL),
(11, 'prescription', 14, '120000', 'Pay test 5', 'pending', NULL, '2024-11-07', NULL),
(12, 'prescription', 14, '120000', 'Pay test 5', 'pending', NULL, '2024-11-07', NULL),
(13, 'prescription', 8, '20000', 'Test Pay 6', 'pending', NULL, '2024-11-07', NULL),
(14, 'prescription', 8, '20000', 'Test Pay 6', 'completed', '14641919', '2024-11-07', NULL),
(15, 'prescription', 5, '140000', 'Pay test 7', 'pending', NULL, '2024-11-07', NULL),
(16, 'appointment', 3, '123000', 'Test thanh toan', 'pending', NULL, '2024-11-07', NULL),
(17, 'appointment', 3, '123000', 'Test thanh toan', 'pending', NULL, '2024-11-07', NULL),
(18, 'appointment', 2, '123000', 'Test thanh toan', 'pending', NULL, '2024-11-07', NULL),
(19, 'appointment', 2, '123000', 'asdfsd', 'completed', '14643763', '2024-11-07', NULL),
(20, 'appointment', 3, '123456', 'test', 'pending', NULL, '2024-11-07', NULL),
(21, 'appointment', 3, '123456', 'test', 'pending', NULL, '2024-11-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fact_prescriptions`
--

CREATE TABLE `fact_prescriptions` (
  `pres_id` int(11) NOT NULL,
  `med_hist_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `item_note` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_prescriptions`
--

INSERT INTO `fact_prescriptions` (`pres_id`, `med_hist_id`, `item_id`, `amount`, `price`, `item_note`, `created_at`) VALUES
(1, 3, 1, 1, 2000, 'Uống 1 viên buổi sáng sau ăn', '2024-10-08 14:50:10'),
(2, 3, 9, 1, 2000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10'),
(3, 4, 3, 2, 25000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10'),
(4, 4, 10, 1, 10000, 'Uống 1 viên buổi sáng', '2024-10-08 14:50:10'),
(5, 5, 4, 1, 15000, 'Uống 1 viên sau khi ăn', '2024-10-08 14:50:10'),
(6, 8, 2, 1, 3000, 'Uống 1 viên trước khi ngủ', '2024-10-08 14:50:10'),
(7, 9, 9, 1, 2000, 'Uống 1 viên buổi tối trước khi ngủ', '2024-10-08 14:50:10'),
(8, 11, 5, 1, 1500, 'Uống 1 viên trước khi ăn', '2024-10-08 14:50:10'),
(9, 12, 6, 2, 12000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10'),
(10, 13, 1, 2, 2000, 'Uống 1 viên vào buổi sáng', '2024-10-08 14:50:10'),
(11, 14, 10, 1, 10000, 'Uống 1 viên buổi sáng trước ăn', '2024-10-08 14:50:10'),
(12, 15, 4, 1, 12000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10'),
(13, 17, 11, 1, 10000, 'Uống 1 viên trước bữa ăn', '2024-10-08 14:50:10'),
(14, 18, 10, 1, 2000, 'Uống 1 viên buổi sáng', '2024-10-08 14:50:10'),
(15, 21, 5, 1, 15000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10'),
(16, 22, 3, 1, 25000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10'),
(17, 23, 4, 2, 25000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10'),
(18, 24, 9, 1, 2000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10'),
(19, 27, 1, 1, 2000, 'Uống 1 viên buổi sáng sau ăn', '2024-10-08 14:50:10'),
(20, 28, 2, 1, 3000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10'),
(21, 30, 6, 2, 12000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10'),
(22, 31, 3, 1, 25000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10'),
(23, 32, 10, 1, 10000, 'Uống 1 viên buổi sáng', '2024-10-08 14:50:10'),
(24, 35, 4, 1, 15000, 'Uống 1 viên sau khi ăn', '2024-10-08 14:50:10'),
(25, 37, 3, 1, 2000, 'Uống 1 viên buổi sáng sau ăn', '2024-10-08 14:50:10'),
(26, 38, 9, 1, 2000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10'),
(27, 39, 10, 1, 10000, 'Uống 1 viên buổi sáng', '2024-10-08 14:50:10'),
(28, 40, 5, 1, 1500, 'Uống 1 viên trước khi ăn', '2024-10-08 14:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `fact_user_login`
--

CREATE TABLE `fact_user_login` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_ip` binary(16) DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT current_timestamp(),
  `logout_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact_work_schedule`
--

CREATE TABLE `fact_work_schedule` (
  `work_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `booking_date` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `work_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_work_schedule`
--

INSERT INTO `fact_work_schedule` (`work_id`, `user_id`, `specialty_id`, `booking_date`, `start_time`, `end_time`, `work_note`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '10/11/2024', '10:00 am', '11:00 am', 'Test', '2024-11-07 01:55:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dim_item`
--
ALTER TABLE `dim_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `dim_specialties`
--
ALTER TABLE `dim_specialties`
  ADD PRIMARY KEY (`specialty_id`);

--
-- Indexes for table `dim_user`
--
ALTER TABLE `dim_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `fact_appointment`
--
ALTER TABLE `fact_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `fact_med_hist`
--
ALTER TABLE `fact_med_hist`
  ADD PRIMARY KEY (`med_hist_id`);

--
-- Indexes for table `fact_patient_details`
--
ALTER TABLE `fact_patient_details`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `fact_payment`
--
ALTER TABLE `fact_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `fact_prescriptions`
--
ALTER TABLE `fact_prescriptions`
  ADD PRIMARY KEY (`pres_id`);

--
-- Indexes for table `fact_user_login`
--
ALTER TABLE `fact_user_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `fact_work_schedule`
--
ALTER TABLE `fact_work_schedule`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dim_item`
--
ALTER TABLE `dim_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `dim_specialties`
--
ALTER TABLE `dim_specialties`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dim_user`
--
ALTER TABLE `dim_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `fact_appointment`
--
ALTER TABLE `fact_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `fact_med_hist`
--
ALTER TABLE `fact_med_hist`
  MODIFY `med_hist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `fact_patient_details`
--
ALTER TABLE `fact_patient_details`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fact_payment`
--
ALTER TABLE `fact_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fact_prescriptions`
--
ALTER TABLE `fact_prescriptions`
  MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `fact_user_login`
--
ALTER TABLE `fact_user_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fact_work_schedule`
--
ALTER TABLE `fact_work_schedule`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
