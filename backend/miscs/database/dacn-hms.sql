-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 07:25 AM
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
-- Table structure for table `dim_faculty`
--

CREATE TABLE `dim_faculty` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(255) DEFAULT NULL,
  `fac_desc` varchar(255) DEFAULT NULL,
  `fac_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_faculty`
--

INSERT INTO `dim_faculty` (`fac_id`, `fac_name`, `fac_desc`, `fac_note`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Khoa Tim mạch', 'Chuyên chẩn đoán, điều trị bệnh mạch vành, tăng huyết áp, suy tim, rối loạn nhịp tim.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active'),
(2, 'Khoa Thần kinh', 'Điều trị các bệnh lý hệ thần kinh trung ương và ngoại vi như đột quỵ, động kinh, tủy sống.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active'),
(3, 'Khoa Chấn thương chỉnh hình', 'Chăm sóc chấn thương, dị tật, thoái hóa khớp và bệnh lý hệ cơ xương.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active'),
(4, 'Khoa Nhi', 'Chăm sóc sức khỏe toàn diện cho trẻ sơ sinh, trẻ em, thanh thiếu niên với nhiều bệnh lý trẻ em.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active'),
(5, 'Khoa Ung bướu', 'Chuyên phát hiện và điều trị các loại ung thư như ung thư phổi, vú, máu và khối u.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active'),
(6, 'Khoa Tai mũi họng', 'Điều trị viêm tai, mũi, họng, viêm xoang, đau họng mãn tính và các rối loạn liên quan.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active'),
(7, 'Khoa Hô hấp', 'Chẩn đoán, điều trị các bệnh đường hô hấp như viêm phổi, hen suyễn, COPD, bệnh phổi.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active'),
(8, 'Khoa Tiêu hóa', 'Điều trị các bệnh đường tiêu hóa như viêm gan, dạ dày, ruột, gan, mật và tuyến tụy.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active'),
(9, 'Khoa Da liễu', 'Chăm sóc bệnh da như viêm da, dị ứng, mụn trứng cá, sắc tố và nhiễm trùng da.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active'),
(10, 'Khoa Phụ sản', 'Chăm sóc sức khỏe sinh sản phụ nữ từ thai kỳ, sinh nở đến khám phụ khoa và hậu sản.', '', '2024-10-07 04:36:31', '2024-11-02 06:10:11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dim_floor`
--

CREATE TABLE `dim_floor` (
  `floor_id` int(11) NOT NULL,
  `floor_name` varchar(255) DEFAULT NULL,
  `floor_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_floor`
--

INSERT INTO `dim_floor` (`floor_id`, `floor_name`, `floor_note`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Tầng 1', NULL, '2024-11-09 08:07:27', NULL, 'active'),
(2, 'Tầng 2', NULL, '2024-11-09 08:07:33', NULL, 'active'),
(3, 'Tầng 3', NULL, '2024-11-09 08:07:40', NULL, 'active'),
(4, 'Tầng 4', NULL, '2024-11-09 08:07:45', NULL, 'active'),
(5, 'Tầng 5', 'Phòng VIP', '2024-11-09 08:08:05', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dim_item`
--

CREATE TABLE `dim_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_price` int(11) DEFAULT NULL,
  `item_lending_price` int(11) DEFAULT 0,
  `item_unit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_item`
--

INSERT INTO `dim_item` (`item_id`, `item_name`, `item_price`, `item_lending_price`, `item_unit`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Băng gạc vô trùng', 15000, 0, 'gói', '2024-10-06 22:20:26', NULL, 'active'),
(2, 'Khẩu trang y tế', 50000, 0, 'hộp', '2024-10-06 22:20:26', NULL, 'active'),
(3, 'Bông y tế', 25000, 0, 'hộp', '2024-10-06 22:20:26', NULL, 'active'),
(4, 'Nhiệt kế điện tử', 300000, 15000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(5, 'Máy đo huyết áp', 500000, 25000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(6, 'Bộ dụng cụ tiêm insulin', 150000, 0, 'bộ', '2024-10-06 22:20:26', NULL, 'active'),
(7, 'Găng tay y tế', 50000, 0, 'hộp', '2024-10-06 22:20:26', NULL, 'active'),
(8, 'Ống tiêm nhựa', 2000, 0, 'cái', '2024-10-06 22:20:26', NULL, 'active'),
(9, 'Máy đo đường huyết', 600000, 30000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(10, 'Băng keo cá nhân', 10000, 0, 'gói', '2024-10-06 22:20:26', NULL, 'active'),
(11, 'Bộ truyền dịch', 30000, 0, 'bộ', '2024-10-06 22:20:26', NULL, 'active'),
(12, 'Bình oxy y tế', 1000000, 0, 'bình', '2024-10-06 22:20:26', NULL, 'active'),
(13, 'Máy xông mũi họng', 800000, 40000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(14, 'Nạng y tế', 250000, 10000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(15, 'Xe lăn', 2500000, 50000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(16, 'Gạc rửa vết thương', 10000, 0, 'gói', '2024-10-06 22:20:26', NULL, 'active'),
(17, 'Kim tiêm vô trùng', 1000, 0, 'cái', '2024-10-06 22:20:26', NULL, 'active'),
(18, 'Bộ test đường huyết', 120000, 0, 'bộ', '2024-10-06 22:20:26', NULL, 'active'),
(19, 'Mặt nạ oxy', 50000, 0, 'cái', '2024-10-06 22:20:26', NULL, 'active'),
(20, 'Bộ dụng cụ sơ cứu', 150000, 0, 'bộ', '2024-10-06 22:20:26', NULL, 'active'),
(21, 'Cân sức khỏe điện tử', 250000, 10000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(22, 'Máy đo nồng độ oxy (SpO2)', 450000, 20000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(23, 'Máy trợ thở', 1500000, 75000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(24, 'Găng tay cao su', 40000, 0, 'hộp', '2024-10-06 22:20:26', NULL, 'active'),
(25, 'Ống nghe y tế', 300000, 15000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active'),
(26, 'Bình xịt mũi', 70000, 0, 'chai', '2024-10-06 22:20:26', NULL, 'active'),
(27, 'Băng thun hỗ trợ khớp', 100000, 0, 'cái', '2024-10-06 22:20:26', NULL, 'active'),
(28, 'Bông ngoáy tai y tế', 5000, 0, 'gói', '2024-10-06 22:20:26', NULL, 'active'),
(29, 'Kính bảo hộ y tế', 80000, 0, 'cái', '2024-10-06 22:20:26', NULL, 'active'),
(30, 'Máy đo nhiệt độ trán', 400000, 25000, 'cái', '2024-10-06 22:20:26', '2024-11-10 05:48:19', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dim_meds`
--

CREATE TABLE `dim_meds` (
  `meds_id` int(11) NOT NULL,
  `meds_name` varchar(255) DEFAULT NULL,
  `meds_price` int(11) DEFAULT NULL,
  `meds_unit` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_meds`
--

INSERT INTO `dim_meds` (`meds_id`, `meds_name`, `meds_price`, `meds_unit`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Paracetamol', 2000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(2, 'Aspirin', 3000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(3, 'Amoxicillin', 25000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(4, 'Vitamin C', 5000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(5, 'Ibuprofen', 1500, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(6, 'Efferalgan', 12000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(7, 'Panadol', 18000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(8, 'Clarithromycin', 35000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(9, 'Metformin', 2000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(10, 'Omeprazole', 10000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(11, 'Loratadine', 8000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(12, 'Ciprofloxacin', 12000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(13, 'Azithromycin', 30000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(14, 'Cefalexin', 25000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(15, 'Acetylcysteine', 15000, 'gói', '2024-10-07 05:15:01', NULL, 'active'),
(16, 'Silymarin', 4000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(17, 'Prednisolone', 12000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(18, 'Hydroxyzine', 20000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(19, 'Drotaverin', 15000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(20, 'Diclofenac', 5000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(21, 'Fexofenadine', 25000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(22, 'Ketoconazole', 20000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(23, 'Cetirizine', 7000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(24, 'Meloxicam', 2500, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(25, 'Esomeprazole', 20000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(26, 'Trimebutine', 15000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(27, 'Loperamide', 3000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(28, 'Simvastatin', 10000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(29, 'Spironolactone', 5000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(30, 'Dulcolax', 12000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(31, 'Calcium carbonate', 8000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(32, 'Atorvastatin', 15000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(33, 'Gabapentin', 18000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(34, 'Doxycycline', 25000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(35, 'Fluconazole', 20000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(36, 'Montelukast', 18000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(37, 'Folic Acid', 3000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(38, 'Amlodipine', 10000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(39, 'Candesartan', 15000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(40, 'Losartan', 13000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(41, 'Levofloxacin', 22000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(42, 'Metronidazole', 10000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(43, 'Propranolol', 12000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(44, 'Lansoprazole', 18000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(45, 'Ranitidine', 8000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(46, 'Terbinafine', 15000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(47, 'Tetracycline', 12000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(48, 'Domperidone', 5000, 'viên', '2024-10-07 05:15:01', NULL, 'active'),
(49, 'Bromhexine', 7000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(50, 'Clotrimazole', 20000, 'hộp', '2024-10-07 05:15:01', NULL, 'active'),
(51, 'Nystatin', 10000, 'viên', '2024-10-07 05:15:01', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dim_med_service`
--

CREATE TABLE `dim_med_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_price` int(11) DEFAULT NULL,
  `service_unit` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_med_service`
--

INSERT INTO `dim_med_service` (`service_id`, `service_name`, `service_price`, `service_unit`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Xét nghiệm máu toàn phần', 150000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(2, 'Xét nghiệm đường huyết', 80000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(3, 'Xét nghiệm nước tiểu', 70000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(4, 'Xét nghiệm chức năng gan', 120000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(5, 'Xét nghiệm chức năng thận', 100000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(6, 'Xét nghiệm mỡ máu', 90000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(7, 'Chụp X-quang ngực', 200000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(8, 'Chụp CT scan', 1500000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(9, 'Chụp cộng hưởng từ (MRI)', 2500000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(10, 'Chụp siêu âm ổ bụng', 300000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(11, 'Siêu âm tim', 500000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(12, 'Siêu âm tuyến giáp', 350000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(13, 'Điện tâm đồ (ECG)', 200000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(14, 'Đo mật độ xương', 400000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(15, 'Khám và chụp ảnh võng mạc', 250000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(16, 'Xét nghiệm nhóm máu', 60000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(17, 'Đo huyết áp', 30000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(18, 'Test COVID-19', 150000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(19, 'Xét nghiệm ung thư sớm', 1000000, 'lần', '2024-11-09 05:57:49', NULL, 'active'),
(20, 'Kiểm tra nồng độ vitamin D', 80000, 'lần', '2024-11-09 05:57:49', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dim_room`
--

CREATE TABLE `dim_room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(255) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `room_size` int(11) DEFAULT NULL,
  `room_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_room`
--

INSERT INTO `dim_room` (`room_id`, `room_name`, `floor_id`, `faculty_id`, `room_size`, `room_price`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Room 101', 1, 1, 1, 700000, '2024-11-08 16:29:39', NULL, 'active'),
(2, 'Room 102', 1, NULL, 2, 550000, '2024-11-08 16:29:39', NULL, 'occupied'),
(3, 'Room 103', 1, NULL, 4, 350000, '2024-11-08 16:29:39', NULL, 'active'),
(4, 'Room 104', 1, NULL, 2, 550000, '2024-11-08 16:29:39', NULL, 'occupied'),
(5, 'Room 105', 1, 2, 1, 700000, '2024-11-08 16:29:39', NULL, 'active'),
(6, 'Room 106', 1, NULL, 4, 350000, '2024-11-08 16:29:39', NULL, 'inactive'),
(7, 'Room 107', 1, NULL, 2, 550000, '2024-11-08 16:29:39', NULL, 'active'),
(8, 'Room 108', 1, NULL, 4, 350000, '2024-11-08 16:29:39', NULL, 'active'),
(9, 'Room 109', 1, NULL, 1, 700000, '2024-11-08 16:29:39', NULL, 'active'),
(10, 'Room 110', 1, NULL, 4, 350000, '2024-11-08 16:29:39', NULL, 'active'),
(11, 'Room 201', 2, 3, 1, 720000, '2024-11-08 16:29:39', NULL, 'active'),
(12, 'Room 202', 2, NULL, 2, 570000, '2024-11-08 16:29:39', NULL, 'inactive'),
(13, 'Room 203', 2, NULL, 2, 570000, '2024-11-08 16:29:39', NULL, 'occupied'),
(14, 'Room 204', 2, NULL, 4, 370000, '2024-11-08 16:29:39', NULL, 'active'),
(15, 'Room 205', 2, 4, 2, 570000, '2024-11-08 16:29:39', NULL, 'active'),
(16, 'Room 206', 2, NULL, 1, 720000, '2024-11-08 16:29:39', NULL, 'occupied'),
(17, 'Room 207', 2, NULL, 4, 370000, '2024-11-08 16:29:39', NULL, 'inactive'),
(18, 'Room 208', 2, NULL, 2, 570000, '2024-11-08 16:29:39', NULL, 'active'),
(19, 'Room 209', 2, NULL, 1, 720000, '2024-11-08 16:29:39', NULL, 'active'),
(20, 'Room 301', 3, 5, 1, 740000, '2024-11-08 16:29:39', NULL, 'active'),
(21, 'Room 302', 3, NULL, 4, 390000, '2024-11-08 16:29:39', NULL, 'occupied'),
(22, 'Room 303', 3, NULL, 2, 590000, '2024-11-08 16:29:39', NULL, 'inactive'),
(23, 'Room 304', 3, NULL, 2, 590000, '2024-11-08 16:29:39', NULL, 'active'),
(24, 'Room 305', 3, NULL, 4, 390000, '2024-11-08 16:29:39', NULL, 'active'),
(25, 'Room 306', 3, 6, 2, 590000, '2024-11-08 16:29:39', NULL, 'active'),
(26, 'Room 307', 3, NULL, 1, 740000, '2024-11-08 16:29:39', NULL, 'active'),
(27, 'Room 308', 3, NULL, 4, 390000, '2024-11-08 16:29:39', NULL, 'occupied'),
(28, 'Room 309', 3, NULL, 1, 740000, '2024-11-08 16:29:39', NULL, 'active'),
(29, 'Room 401', 4, 7, 2, 610000, '2024-11-08 16:29:39', NULL, 'occupied'),
(30, 'Room 402', 4, NULL, 4, 410000, '2024-11-08 16:29:39', NULL, 'active'),
(31, 'Room 403', 4, NULL, 1, 760000, '2024-11-08 16:29:39', NULL, 'active'),
(32, 'Room 404', 4, NULL, 2, 610000, '2024-11-08 16:29:39', NULL, 'inactive'),
(33, 'Room 405', 4, NULL, 4, 410000, '2024-11-08 16:29:39', NULL, 'active'),
(34, 'Room 406', 4, 8, 1, 760000, '2024-11-08 16:29:39', NULL, 'active'),
(35, 'Room 407', 4, NULL, 2, 610000, '2024-11-08 16:29:39', NULL, 'occupied'),
(36, 'Room 408', 4, NULL, 4, 410000, '2024-11-08 16:29:39', NULL, 'active'),
(37, 'Room 501', 5, 9, 1, 780000, '2024-11-08 16:29:39', NULL, 'inactive'),
(38, 'Room 502', 5, NULL, 1, 780000, '2024-11-08 16:29:39', NULL, 'active'),
(39, 'Room 503', 5, NULL, 1, 780000, '2024-11-08 16:29:39', NULL, 'occupied'),
(40, 'Room 504', 5, 10, 1, 780000, '2024-11-08 16:29:39', NULL, 'active'),
(41, 'Room 505', 5, NULL, 1, 780000, '2024-11-08 16:29:39', NULL, 'active'),
(42, 'Room 506', 5, NULL, 1, 780000, '2024-11-08 16:29:39', NULL, 'active'),
(43, 'Room 507', 5, NULL, 1, 780000, '2024-11-08 16:29:39', NULL, 'occupied');

-- --------------------------------------------------------

--
-- Table structure for table `dim_user`
--

CREATE TABLE `dim_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `contact_no` bigint(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `gender` varchar(25) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `pricing` int(11) DEFAULT NULL,
  `oauth_google` varchar(255) DEFAULT NULL,
  `oauth_facebook` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_user`
--

INSERT INTO `dim_user` (`user_id`, `username`, `password`, `email_address`, `contact_no`, `fullname`, `created_at`, `updated_at`, `gender`, `city`, `address`, `role`, `faculty_id`, `pricing`, `oauth_google`, `oauth_facebook`, `status`) VALUES
(1, 'huan_patient', 'password123', 'huan.nguyen@example.com', 84912345601, 'Nguyen Nhut Gia Huan', '2024-10-07 05:36:07', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '1 Mac Dinh Chi', 'patient', NULL, NULL, NULL, NULL, 'active'),
(2, 'huan_doctor', 'password123', 'huan.nguyen@example.com', 84912345602, 'Nguyen Nhut Gia Huan', '2024-10-07 05:36:07', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '1 Le Duan New', 'doctor', 7, 400000, NULL, NULL, 'active'),
(3, 'huan_admin', 'password123', 'huan.nguyen@example.com', 84567890123, 'Nguyen Nhut Gia Huan', '2024-10-07 05:36:07', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '1 Le Duan 14', 'admin', NULL, NULL, NULL, NULL, 'active'),
(4, 'long_patient', 'password123', 'long.nguyen@example.com', 84912345604, 'Nguyen Ba Long', '2024-10-07 05:36:07', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'patient', NULL, NULL, NULL, NULL, 'active'),
(5, 'long_doctor', 'password123', 'long.nguyen@example.com', 84912345605, 'Nguyen Ba Long', '2024-10-07 05:36:07', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'doctor', 3, 450000, NULL, NULL, 'active'),
(6, 'long_admin', 'password123', 'long.nguyen@example.com', 84912345606, 'Nguyen Ba Long', '2024-10-07 05:36:07', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'admin', NULL, NULL, NULL, NULL, 'active'),
(7, 'khoa_patient', 'password123', 'khoa.tran@example.com', 84912345607, 'Tran Nguyen Dang Khoa', '2024-10-07 05:36:07', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, NULL, 'active'),
(8, 'khoa_doctor', 'password123', 'khoa.tran@example.com', 84912345608, 'Tran Nguyen Dang Khoa', '2024-10-07 05:36:07', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'doctor', 10, 500000, NULL, NULL, 'active'),
(9, 'khoa_admin', 'password123', 'khoa.tran@example.com', 84912345609, 'Tran Nguyen Dang Khoa', '2024-10-07 05:36:07', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'admin', NULL, NULL, NULL, NULL, 'active'),
(10, 'doctor10', 'password123', 'doctor10@example.com', 84910000010, 'Nguyen Van An', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '10 Phan Xich Long', 'doctor', 1, 350000, NULL, NULL, 'active'),
(11, 'doctor11', 'password123', 'doctor11@example.com', 84910000011, 'Tran Thi Bich', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '11 Le Van Sy', 'doctor', 6, 370000, NULL, NULL, 'active'),
(12, 'doctor12', 'password123', 'doctor12@example.com', 84910000012, 'Pham Minh Cuong', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '12 Nguyen Trai', 'doctor', 4, 400000, NULL, NULL, 'active'),
(13, 'doctor13', 'password123', 'doctor13@example.com', 84000000013, 'Vo Thi Hoa', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '14 Vo Thi Sau', 'doctor', 9, 450000, NULL, NULL, 'active'),
(14, 'doctor14', 'password123', 'doctor14@example.com', 84910000014, 'Tran Van Hai', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '14 Hai Ba Trung', 'doctor', 2, 420000, NULL, NULL, 'active'),
(15, 'doctor15', 'password123', 'doctor15@example.com', 84910000015, 'Pham Van Khoa', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '15 Le Lai', 'doctor', 8, 390000, NULL, NULL, 'active'),
(16, 'doctor16', 'password123', 'doctor16@example.com', 84910000016, 'Nguyen Thi Lan', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '16 Tran Hung Dao', 'doctor', 5, 480000, NULL, NULL, 'active'),
(17, 'doctor17', 'password123', 'doctor17@example.com', 84910000017, 'Tran Van Minh', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 'doctor', 3, 460000, NULL, NULL, 'active'),
(18, 'doctor18', 'password123', 'doctor18@example.com', 84910000018, 'Pham Thi Nhi', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '18 Le Duan', 'doctor', 7, 410000, NULL, NULL, 'active'),
(19, 'doctor19', 'password123', 'doctor19@example.com', 84910000019, 'Nguyen Van Quan', '2024-10-07 05:44:49', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '19 Dong Khoi', 'doctor', 1, 500000, NULL, NULL, 'active'),
(20, 'patient20', 'password123', 'patient20@example.com', 84920000020, 'Nguyen Van Tuan', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '20 Nguyen Hue', 'patient', NULL, NULL, NULL, NULL, 'active'),
(21, 'patient21', 'password123', 'patient21@example.com', 84920000021, 'Tran Thi Thao', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '21 Le Thanh Ton', 'patient', NULL, NULL, NULL, NULL, 'active'),
(22, 'patient22', 'password123', 'patient22@example.com', 84920000022, 'Pham Van Hoang', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '22 Tran Van Kieu', 'patient', NULL, NULL, NULL, NULL, 'active'),
(23, 'patient23', 'password123', 'patient23@example.com', 84920000023, 'Nguyen Thi Ly', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '23 Le Loi', 'patient', NULL, NULL, NULL, NULL, 'active'),
(24, 'patient24', 'password123', 'patient24@example.com', 84920000024, 'Tran Van Dat', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '24 Pham Ngoc Thach', 'patient', NULL, NULL, NULL, NULL, 'active'),
(25, 'patient25', 'password123', 'patient25@example.com', 84920000025, 'Pham Thi Kim', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '25 Vo Van Tan', 'patient', NULL, NULL, NULL, NULL, 'active'),
(26, 'patient26', 'password123', 'patient26@example.com', 84920000026, 'Nguyen Van Phuc', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '26 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, NULL, 'active'),
(27, 'patient27', 'password123', 'patient27@example.com', 84920000027, 'Tran Thi Mai', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '27 Le Van Sy', 'patient', NULL, NULL, NULL, NULL, 'active'),
(28, 'patient28', 'password123', 'patient28@example.com', 84920000028, 'Pham Van Tinh', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '28 Nguyen Trai', 'patient', NULL, NULL, NULL, NULL, 'active'),
(29, 'patient29', 'password123', 'patient29@example.com', 84920000029, 'Nguyen Thi Hanh', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '29 Hai Ba Trung', 'patient', NULL, NULL, NULL, NULL, 'active'),
(30, 'patient30', 'password123', 'patient30@example.com', 84920000030, 'Tran Van Quang', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '30 Nguyen Hue', 'patient', NULL, NULL, NULL, NULL, 'active'),
(31, 'patient31', 'password123', 'patient31@example.com', 84920000031, 'Pham Thi Trang', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '31 Le Thanh Ton', 'patient', NULL, NULL, NULL, NULL, 'active'),
(32, 'patient32', 'password123', 'patient32@example.com', 84920000032, 'Nguyen Van Son', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '32 Tran Van Kieu', 'patient', NULL, NULL, NULL, NULL, 'active'),
(33, 'patient33', 'password123', 'patient33@example.com', 84920000033, 'Tran Thi Hoa', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '33 Le Loi', 'patient', NULL, NULL, NULL, NULL, 'active'),
(34, 'patient34', 'password123', 'patient34@example.com', 84920000034, 'Pham Van Cuong', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '34 Pham Ngoc Thach', 'patient', NULL, NULL, NULL, NULL, 'active'),
(35, 'patient35', 'password123', 'patient35@example.com', 84920000035, 'Nguyen Thi Ngoc', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '35 Vo Van Tan', 'patient', NULL, NULL, NULL, NULL, 'active'),
(36, 'patient36', 'password123', 'patient36@example.com', 84920000036, 'Tran Van Hieu', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '36 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, NULL, 'active'),
(37, 'patient37', 'password123', 'patient37@example.com', 84920000037, 'Pham Thi An', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '37 Le Van Sy', 'patient', NULL, NULL, NULL, NULL, 'active'),
(38, 'patient38', 'password123', 'patient38@example.com', 84920000038, 'Nguyen Van Thanh', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'male', 'Ho Chi Minh', '38 Nguyen Trai', 'patient', NULL, NULL, NULL, NULL, 'active'),
(39, 'patient39', 'password123', 'patient39@example.com', 84920000039, 'Tran Thi Kim', '2024-10-07 05:44:59', '2024-11-09 05:44:11', 'female', 'Ho Chi Minh', '39 Hai Ba Trung', 'patient', NULL, NULL, NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `fact_appointment`
--

CREATE TABLE `fact_appointment` (
  `appt_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `appt_fee` int(11) DEFAULT NULL,
  `appt_datetime` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_appointment`
--

INSERT INTO `fact_appointment` (`appt_id`, `doctor_id`, `patient_id`, `faculty_id`, `appt_fee`, `appt_datetime`, `created_at`, `updated_at`, `status`) VALUES
(1, 13, 25, 4, 450000, '2024-10-15T10:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(2, 16, 28, 7, 480000, '2024-10-17T14:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(3, 12, 20, 3, 400000, '2024-10-20T09:45:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(4, 15, 24, 6, 390000, '2024-10-22T16:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(5, 18, 32, 9, 410000, '2024-10-24T08:15:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(6, 14, 23, 5, 420000, '2024-10-26T11:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(7, 17, 30, 8, 460000, '2024-10-28T15:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(8, 11, 31, 2, 370000, '2024-10-30T13:45:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(9, 10, 21, 1, 350000, '2024-11-02T10:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(10, 19, 22, 10, 500000, '2024-11-04T17:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(11, 14, 29, 5, 420000, '2024-11-05T09:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(12, 13, 33, 4, 450000, '2024-11-07T14:15:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(13, 15, 26, 6, 390000, '2024-11-10T11:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(14, 18, 35, 9, 410000, '2024-11-11T13:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(15, 17, 27, 8, 460000, '2024-11-12T16:45:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(16, 12, 36, 3, 400000, '2024-11-13T09:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(17, 10, 34, 1, 350000, '2024-11-14T14:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(18, 11, 28, 2, 370000, '2024-11-15T08:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(19, 16, 37, 7, 480000, '2024-11-16T15:15:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(20, 19, 38, 10, 500000, '2024-11-17T10:45:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(21, 13, 22, 4, 450000, '2024-11-18T13:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(22, 12, 24, 3, 400000, '2024-11-19T09:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(23, 15, 31, 6, 390000, '2024-11-20T17:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(24, 16, 21, 7, 480000, '2024-11-21T08:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(25, 11, 39, 2, 370000, '2024-11-22T14:45:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(26, 10, 35, 1, 350000, '2024-11-23T10:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(27, 14, 30, 5, 420000, '2024-11-24T13:15:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(28, 17, 36, 8, 460000, '2024-11-25T15:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(29, 18, 32, 9, 410000, '2024-11-26T11:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(30, 19, 23, 10, 500000, '2024-11-27T16:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(31, 16, 38, 7, 480000, '2024-11-28T09:45:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(32, 12, 27, 3, 400000, '2024-11-29T14:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(33, 15, 28, 6, 390000, '2024-11-30T12:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(34, 14, 39, 5, 420000, '2024-12-01T10:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(35, 13, 34, 4, 450000, '2024-12-02T13:45:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(36, 11, 26, 2, 370000, '2024-12-03T16:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(37, 10, 29, 1, 350000, '2024-12-04T09:15:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(38, 18, 37, 9, 410000, '2024-12-05T11:30:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(39, 19, 25, 10, 500000, '2024-12-06T15:00:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active'),
(40, 17, 20, 8, 460000, '2024-12-07T10:15:00Z', '2024-10-10 15:40:44', '2024-11-09 09:15:11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `fact_facility_asmt`
--

CREATE TABLE `fact_facility_asmt` (
  `fac_asmt_id` int(11) NOT NULL,
  `fac_mgmt_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_note` mediumtext DEFAULT NULL,
  `start_datetime` varchar(50) DEFAULT NULL,
  `end_datetime` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact_facility_mgmt`
--

CREATE TABLE `fact_facility_mgmt` (
  `fac_mgmt_id` int(11) NOT NULL,
  `booker_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `start_datetime` varchar(50) DEFAULT NULL,
  `end_datetime` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact_med_hist`
--

CREATE TABLE `fact_med_hist` (
  `med_hist_id` int(11) NOT NULL,
  `appt_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `blood_press` varchar(50) DEFAULT NULL,
  `blood_sugar` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `temp` varchar(50) DEFAULT NULL,
  `med_note` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_med_hist`
--

INSERT INTO `fact_med_hist` (`med_hist_id`, `appt_id`, `patient_id`, `blood_press`, `blood_sugar`, `weight`, `temp`, `med_note`, `created_at`, `updated_at`, `status`) VALUES
(1, 0, 21, '115/75', '5.0', '55', '36.0', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL, 'active'),
(2, 0, 39, '120/80', '5.5', '60', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(3, 0, 22, '145/92', '7.5', '82', '38.0', 'Huyết áp tăng cao. Đã kê thuốc.', '2024-10-08 14:49:09', NULL, 'active'),
(4, 0, 34, '145/90', '7.1', '78', '37.9', 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 14:49:09', NULL, 'active'),
(5, 0, 28, '140/90', '6.8', '75', '37.8', 'Chẩn đoán tiểu đường. Bắt đầu điều trị.', '2024-10-08 14:49:09', NULL, 'active'),
(6, 0, 26, '135/88', '6.4', '75', '37.0', 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 14:49:09', NULL, 'active'),
(7, 0, 30, '135/88', '7.0', '76', '37.5', 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 14:49:09', NULL, 'active'),
(8, 0, 20, '120/80', '5.5', '65', '36.5', 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.', '2024-10-08 14:49:09', NULL, 'active'),
(9, 0, 31, '120/78', '5.1', '59', '36.3', 'Không có vấn đề gì.', '2024-10-08 14:49:09', NULL, 'active'),
(10, 0, 35, '120/80', '5.0', '64', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(11, 0, 36, '125/80', '5.9', '75', '37.0', 'Huyết áp đã ổn định.', '2024-10-08 14:49:09', NULL, 'active'),
(12, 0, 23, '130/85', '5.4', '70', '36.8', 'Kiểm tra cho thấy kết quả bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(13, 0, 38, '140/90', '7.0', '85', '37.8', 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 14:49:09', NULL, 'active'),
(14, 0, 40, '115/75', '5.1', '73', '36.5', 'Tất cả các chỉ số đều trong phạm vi bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(15, 0, 27, '125/80', '5.2', '70', '36.9', 'Kiểm tra định kỳ. Kết quả bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(16, 0, 25, '120/78', '5.3', '62', '36.6', 'Tất cả chỉ số trong phạm vi bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(17, 0, 24, '150/95', '8.0', '90', '38.5', 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 14:49:09', NULL, 'active'),
(18, 0, 29, '125/82', '5.4', '63', '36.6', 'Đường huyết hơi cao. Khuyên thay đổi chế độ ăn uống.', '2024-10-08 14:49:09', NULL, 'active'),
(19, 0, 32, '130/85', '5.7', '80', '37.5', 'Kiểm tra cho thấy kết quả bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(20, 0, 33, '125/80', '5.2', '70', '36.9', 'Kiểm tra định kỳ. Kết quả bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(21, 0, 37, '110/70', '5.4', '58', '36.1', 'Kiểm tra sức khỏe định kỳ. Tất cả bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(22, 0, 21, '110/70', '4.9', '55', '36.0', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL, 'active'),
(23, 0, 22, '140/90', '6.5', '80', '37.8', 'Chẩn đoán tăng huyết áp. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 14:49:09', NULL, 'active'),
(24, 0, 24, '145/92', '8.5', '91', '38.7', 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.', '2024-10-08 14:49:09', NULL, 'active'),
(25, 0, 25, '125/82', '5.1', '56', '36.3', 'Mức đường huyết bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(26, 0, 40, '130/85', '6.0', '76', '37.2', 'Cần theo dõi huyết áp thường xuyên.', '2024-10-08 14:49:09', NULL, 'active'),
(27, 0, 39, '125/82', '5.7', '61', '36.6', 'Không có vấn đề gì.', '2024-10-08 14:49:09', NULL, 'active'),
(28, 0, 38, '145/92', '7.5', '87', '38.0', 'Mức đường huyết cao. Đã điều chỉnh thuốc.', '2024-10-08 14:49:09', NULL, 'active'),
(29, 0, 26, '130/85', '6.1', '76', '37.1', 'Cần chú ý đến chế độ ăn uống.', '2024-10-08 14:49:09', NULL, 'active'),
(30, 0, 30, '130/85', '6.5', '74', '37.3', 'Mức đường huyết đã được kiểm soát bằng thuốc.', '2024-10-08 14:49:09', NULL, 'active'),
(31, 0, 28, '130/85', '6.5', '84', '37.8', 'Huyết áp đã ổn định. Tiếp tục điều trị.', '2024-10-08 14:49:09', NULL, 'active'),
(32, 0, 29, '130/84', '5.8', '64', '36.7', 'Theo dõi mức đường huyết. Cần kiểm tra lại.', '2024-10-08 14:49:09', NULL, 'active'),
(33, 0, 27, '120/78', '5.3', '63', '36.4', 'Kiểm tra định kỳ. Không có vấn đề gì.', '2024-10-08 14:49:09', NULL, 'active'),
(34, 0, 20, '135/88', '6.0', '66', '37.0', 'Huyết áp hơi cao. Cần theo dõi chế độ ăn uống.', '2024-10-08 14:49:09', NULL, 'active'),
(35, 0, 31, '115/75', '5.0', '64', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(36, 0, 36, '135/88', '6.4', '77', '37.2', 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 14:49:09', NULL, 'active'),
(37, 0, 33, '130/85', '5.5', '72', '37.0', 'Không có dấu hiệu bất thường.', '2024-10-08 14:49:09', NULL, 'active'),
(38, 0, 35, '120/80', '5.0', '64', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(39, 0, 34, '140/88', '6.9', '79', '37.8', 'Cần kiểm tra lại trong tháng tới.', '2024-10-08 14:49:09', NULL, 'active'),
(40, 0, 28, '140/88', '6.8', '86', '38.0', 'Cần theo dõi huyết áp. Kiểm tra định kỳ cần thiết.', '2024-10-08 14:49:09', NULL, 'active'),
(41, 0, 26, '120/80', '5.2', '75', '37.1', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL, 'active'),
(42, 0, 30, '140/90', '6.0', '75', '38.2', 'Huyết áp đã ổn định.', '2024-10-08 14:49:09', NULL, 'active'),
(43, 0, 23, '140/90', '6.5', '78', '37.3', 'Cần theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 14:49:09', NULL, 'active'),
(44, 0, 21, '110/70', '5.0', '56', '36.2', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL, 'active'),
(45, 0, 22, '130/85', '6.8', '82', '37.1', 'Huyết áp đã ổn định.', '2024-10-08 14:49:09', NULL, 'active'),
(46, 0, 24, '130/85', '5.9', '79', '37.6', 'Huyết áp và đường huyết đều trong mức bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(47, 0, 39, '120/80', '5.5', '60', '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', NULL, 'active'),
(48, 0, 37, '115/75', '5.0', '58', '36.2', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `fact_patient_details`
--

CREATE TABLE `fact_patient_details` (
  `record_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `med_hist` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_patient_details`
--

INSERT INTO `fact_patient_details` (`record_id`, `doctor_id`, `patient_id`, `med_hist`, `created_at`, `updated_at`) VALUES
(1, 14, 20, 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 15:03:48', NULL),
(2, 10, 21, 'Kiểm tra sức khỏe bình thường.', '2024-10-08 15:03:48', NULL),
(3, 15, 22, 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(4, 13, 23, 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 15:03:48', NULL),
(5, 13, 24, 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(6, 12, 25, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 15:03:48', NULL),
(7, 11, 26, 'Huyết áp đã ổn định. Theo dõi thường xuyên.', '2024-10-08 15:03:48', NULL),
(8, 16, 27, 'Chẩn đoán tăng huyết áp. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 15:03:48', NULL),
(9, 19, 28, 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 15:03:48', NULL),
(10, 10, 29, 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.', '2024-10-08 15:03:48', NULL),
(11, 11, 30, 'Kiểm tra cho thấy kết quả bình thường.', '2024-10-08 15:03:48', NULL),
(12, 15, 31, 'Mức đường huyết cao. Đã điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(13, 12, 32, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 15:03:48', NULL),
(14, 13, 33, 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 15:03:48', NULL),
(15, 14, 34, 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 15:03:48', NULL),
(16, 19, 35, 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 15:03:48', NULL),
(17, 16, 36, 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(18, 11, 37, 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 15:03:48', NULL),
(19, 18, 38, 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 15:03:48', NULL),
(20, 19, 39, 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.', '2024-10-08 15:03:48', NULL);

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
-- Table structure for table `fact_prescription`
--

CREATE TABLE `fact_prescription` (
  `pres_id` int(11) NOT NULL,
  `med_hist_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `item_note` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_prescription`
--

INSERT INTO `fact_prescription` (`pres_id`, `med_hist_id`, `item_id`, `amount`, `price`, `item_note`, `created_at`) VALUES
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
-- Table structure for table `fact_work_schedule`
--

CREATE TABLE `fact_work_schedule` (
  `work_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_datetime` varchar(50) DEFAULT NULL,
  `end_datetime` varchar(50) DEFAULT NULL,
  `work_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_work_schedule`
--

INSERT INTO `fact_work_schedule` (`work_id`, `user_id`, `start_datetime`, `end_datetime`, `work_note`, `created_at`, `updated_at`) VALUES
(2, 11, '2024-11-12T08:00:00Z', '2024-11-12T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(3, 14, '2024-11-14T08:00:00Z', '2024-11-14T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(4, 13, '2024-11-13T07:00:00Z', '2024-11-13T12:00:00Z', 'Hôm nay tôi phải đi khám bác sĩ, làm việc nửa ngày', '2024-11-09 09:39:16', NULL),
(5, 16, '2024-11-13T09:00:00Z', '2024-11-13T17:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(6, 10, '2024-11-11T07:30:00Z', '2024-11-11T15:30:00Z', NULL, '2024-11-09 09:39:16', NULL),
(7, 18, '2024-11-10T07:00:00Z', '2024-11-10T12:00:00Z', 'Do có việc gia đình, tôi chỉ làm việc buổi sáng', '2024-11-09 09:39:16', NULL),
(8, 19, '2024-11-10T10:00:00Z', '2024-11-10T18:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(9, 11, '2024-11-14T08:00:00Z', '2024-11-14T14:00:00Z', 'Tôi có cuộc họp quan trọng vào chiều nên phải nghỉ làm buổi chiều', '2024-11-09 09:39:16', NULL),
(10, 12, '2024-11-12T08:00:00Z', '2024-11-12T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(11, 15, '2024-11-13T07:30:00Z', '2024-11-13T15:30:00Z', 'Bị ốm, tôi nghỉ ca chiều hôm nay', '2024-11-09 09:39:16', NULL),
(12, 14, '2024-11-12T08:30:00Z', '2024-11-12T16:30:00Z', NULL, '2024-11-09 09:39:16', NULL),
(13, 10, '2024-11-10T09:00:00Z', '2024-11-10T17:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(14, 17, '2024-11-14T10:00:00Z', '2024-11-14T18:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(15, 16, '2024-11-11T10:00:00Z', '2024-11-11T18:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(16, 18, '2024-11-12T06:30:00Z', '2024-11-12T12:30:00Z', 'Mẹ tôi ốm nên tôi chỉ có thể làm nửa ngày hôm nay', '2024-11-09 09:39:16', NULL),
(17, 19, '2024-11-12T08:00:00Z', '2024-11-12T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(18, 12, '2024-11-14T07:30:00Z', '2024-11-14T15:30:00Z', NULL, '2024-11-09 09:39:16', NULL),
(19, 14, '2024-11-13T08:00:00Z', '2024-11-13T14:00:00Z', 'Tôi có cuộc hẹn sáng nay, nên chỉ làm nửa ca', '2024-11-09 09:39:16', NULL),
(20, 15, '2024-11-11T07:00:00Z', '2024-11-11T13:00:00Z', 'Do lý do cá nhân, tôi chỉ làm việc buổi sáng', '2024-11-09 09:39:16', NULL),
(21, 13, '2024-11-10T09:30:00Z', '2024-11-10T17:30:00Z', NULL, '2024-11-09 09:39:16', NULL),
(22, 11, '2024-11-13T09:00:00Z', '2024-11-13T17:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(23, 18, '2024-11-14T08:00:00Z', '2024-11-14T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(24, 10, '2024-11-13T08:00:00Z', '2024-11-13T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(25, 12, '2024-11-10T10:30:00Z', '2024-11-10T16:30:00Z', 'Công việc hôm nay có chút khó khăn, tôi phải làm ca nửa ngày', '2024-11-09 09:39:16', NULL),
(26, 16, '2024-11-11T07:00:00Z', '2024-11-11T15:00:00Z', 'Tôi phải chăm sóc con cái, vì vậy tôi nghỉ ca chiều', '2024-11-09 09:39:16', NULL),
(27, 19, '2024-11-13T07:30:00Z', '2024-11-13T15:30:00Z', 'Tôi có lịch hẹn bác sĩ vào chiều nay, nên chỉ làm ca sáng', '2024-11-09 09:39:16', NULL),
(28, 17, '2024-11-13T08:00:00Z', '2024-11-13T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(29, 15, '2024-11-14T07:00:00Z', '2024-11-14T15:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(30, 14, '2024-11-11T08:00:00Z', '2024-11-11T14:00:00Z', 'Có việc đột xuất, tôi phải nghỉ làm ca chiều', '2024-11-09 09:39:16', NULL),
(31, 13, '2024-11-12T08:00:00Z', '2024-11-12T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(32, 16, '2024-11-10T10:00:00Z', '2024-11-10T18:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(33, 12, '2024-11-11T09:00:00Z', '2024-11-11T17:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(34, 10, '2024-11-12T07:30:00Z', '2024-11-12T15:30:00Z', NULL, '2024-11-09 09:39:16', NULL),
(35, 14, '2024-11-10T08:30:00Z', '2024-11-10T16:30:00Z', NULL, '2024-11-09 09:39:16', NULL),
(36, 18, '2024-11-13T08:00:00Z', '2024-11-13T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(37, 11, '2024-11-14T09:00:00Z', '2024-11-14T17:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(38, 19, '2024-11-14T08:00:00Z', '2024-11-14T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(39, 12, '2024-11-13T09:00:00Z', '2024-11-13T17:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(40, 15, '2024-11-12T10:00:00Z', '2024-11-12T18:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(41, 13, '2024-11-11T07:30:00Z', '2024-11-11T15:30:00Z', 'Bận việc gia đình, tôi chỉ làm nửa ngày', '2024-11-09 09:39:16', NULL),
(42, 16, '2024-11-14T07:00:00Z', '2024-11-14T15:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(43, 14, '2024-11-12T07:30:00Z', '2024-11-12T15:30:00Z', 'Do lịch hẹn quan trọng, tôi làm việc nửa ngày', '2024-11-09 09:39:16', NULL),
(44, 17, '2024-11-12T10:00:00Z', '2024-11-12T18:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(45, 11, '2024-11-11T10:00:00Z', '2024-11-11T18:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(46, 13, '2024-11-14T07:30:00Z', '2024-11-14T15:30:00Z', 'Tôi cần nghỉ ca chiều vì có việc đột xuất', '2024-11-09 09:39:16', NULL),
(47, 18, '2024-11-10T08:00:00Z', '2024-11-10T16:00:00Z', NULL, '2024-11-09 09:39:16', NULL),
(48, 19, '2024-11-11T08:30:00Z', '2024-11-11T16:30:00Z', NULL, '2024-11-09 09:39:16', NULL),
(49, 12, '2024-11-14T07:30:00Z', '2024-11-14T15:30:00Z', NULL, '2024-11-09 09:39:16', NULL),
(50, 17, '2024-11-12T09:00:00Z', '2024-11-12T17:00:00Z', NULL, '2024-11-09 09:39:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dim_faculty`
--
ALTER TABLE `dim_faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `dim_floor`
--
ALTER TABLE `dim_floor`
  ADD PRIMARY KEY (`floor_id`);

--
-- Indexes for table `dim_item`
--
ALTER TABLE `dim_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `dim_meds`
--
ALTER TABLE `dim_meds`
  ADD PRIMARY KEY (`meds_id`);

--
-- Indexes for table `dim_room`
--
ALTER TABLE `dim_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `dim_user`
--
ALTER TABLE `dim_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `fact_appointment`
--
ALTER TABLE `fact_appointment`
  ADD PRIMARY KEY (`appt_id`);

--
-- Indexes for table `fact_facility_asmt`
--
ALTER TABLE `fact_facility_asmt`
  ADD PRIMARY KEY (`fac_asmt_id`);

--
-- Indexes for table `fact_facility_mgmt`
--
ALTER TABLE `fact_facility_mgmt`
  ADD PRIMARY KEY (`fac_mgmt_id`);

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
-- Indexes for table `fact_prescription`
--
ALTER TABLE `fact_prescription`
  ADD PRIMARY KEY (`pres_id`);

--
-- Indexes for table `fact_work_schedule`
--
ALTER TABLE `fact_work_schedule`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dim_faculty`
--
ALTER TABLE `dim_faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dim_floor`
--
ALTER TABLE `dim_floor`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dim_item`
--
ALTER TABLE `dim_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `dim_meds`
--
ALTER TABLE `dim_meds`
  MODIFY `meds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `dim_room`
--
ALTER TABLE `dim_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `dim_user`
--
ALTER TABLE `dim_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `fact_appointment`
--
ALTER TABLE `fact_appointment`
  MODIFY `appt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `fact_facility_asmt`
--
ALTER TABLE `fact_facility_asmt`
  MODIFY `fac_asmt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fact_facility_mgmt`
--
ALTER TABLE `fact_facility_mgmt`
  MODIFY `fac_mgmt_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `fact_prescription`
--
ALTER TABLE `fact_prescription`
  MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `fact_work_schedule`
--
ALTER TABLE `fact_work_schedule`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
