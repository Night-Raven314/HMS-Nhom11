-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 08, 2024 at 05:40 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

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
  `fac_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `fac_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fac_desc` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fac_note` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fac_pricing` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_faculty`
--

INSERT INTO `dim_faculty` (`fac_id`, `fac_name`, `fac_desc`, `fac_note`, `fac_pricing`, `created_at`, `updated_at`, `status`) VALUES
('63054655-a115-11ef-95f3-b42e994cb670', 'Khoa Tim mạch', 'Chuyên chẩn đoán, điều trị bệnh mạch vành, tăng huyết áp, suy tim, rối loạn nhịp tim.', '', 500000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active'),
('63115435-a115-11ef-95f3-b42e994cb670', 'Khoa Thần kinh', 'Điều trị các bệnh lý hệ thần kinh trung ương và ngoại vi như đột quỵ, động kinh, tủy sống.', '', 450000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active'),
('6311557a-a115-11ef-95f3-b42e994cb670', 'Khoa Chấn thương chỉnh hình', 'Chăm sóc chấn thương, dị tật, thoái hóa khớp và bệnh lý hệ cơ xương.', '', 400000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active'),
('631155fd-a115-11ef-95f3-b42e994cb670', 'Khoa Nhi', 'Chăm sóc sức khỏe toàn diện cho trẻ sơ sinh, trẻ em, thanh thiếu niên với nhiều bệnh lý trẻ em.', '', 350000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active'),
('63115688-a115-11ef-95f3-b42e994cb670', 'Khoa Ung bướu', 'Chuyên phát hiện và điều trị các loại ung thư như ung thư phổi, vú, máu và khối u.', '', 550000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active'),
('63115701-a115-11ef-95f3-b42e994cb670', 'Khoa Tai mũi họng', 'Điều trị viêm tai, mũi, họng, viêm xoang, đau họng mãn tính và các rối loạn liên quan.', '', 300000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active'),
('63115776-a115-11ef-95f3-b42e994cb670', 'Khoa Hô hấp', 'Chẩn đoán, điều trị các bệnh đường hô hấp như viêm phổi, hen suyễn, COPD, bệnh phổi.', '', 400000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active'),
('631157ed-a115-11ef-95f3-b42e994cb670', 'Khoa Tiêu hóa', 'Điều trị các bệnh đường tiêu hóa như viêm gan, dạ dày, ruột, gan, mật và tuyến tụy.', '', 450000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active'),
('6311585c-a115-11ef-95f3-b42e994cb670', 'Khoa Da liễu', 'Chăm sóc bệnh da như viêm da, dị ứng, mụn trứng cá, sắc tố và nhiễm trùng da.', '', 350000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active'),
('631158d3-a115-11ef-95f3-b42e994cb670', 'Khoa Phụ sản', 'Chăm sóc sức khỏe sinh sản phụ nữ từ thai kỳ, sinh nở đến khám phụ khoa và hậu sản.', '', 400000, '2024-10-07 04:36:31', '2024-11-25 14:07:34', 'active');

--
-- Triggers `dim_faculty`
--
DELIMITER $$
CREATE TRIGGER `before_insert_dim_faculty` BEFORE INSERT ON `dim_faculty` FOR EACH ROW SET NEW.fac_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dim_floor`
--

CREATE TABLE `dim_floor` (
  `floor_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `floor_order` int DEFAULT NULL,
  `floor_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `floor_note` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_floor`
--

INSERT INTO `dim_floor` (`floor_id`, `floor_order`, `floor_name`, `floor_note`, `created_at`, `updated_at`, `status`) VALUES
('05681e2f-a116-11ef-95f3-b42e994cb670', 1, 'Tầng 1', NULL, '2024-11-09 08:07:27', '2024-11-17 03:46:59', 'active'),
('0569d3c3-a116-11ef-95f3-b42e994cb670', 2, 'Tầng 2', NULL, '2024-11-09 08:07:33', '2024-11-17 03:47:04', 'active'),
('0569d4dc-a116-11ef-95f3-b42e994cb670', 3, 'Tầng 3', NULL, '2024-11-09 08:07:40', '2024-11-17 03:47:09', 'active'),
('0569d551-a116-11ef-95f3-b42e994cb670', 4, 'Tầng 4', 'Phòng suýt nữa VIP', '2024-11-09 08:07:45', '2024-11-24 03:56:34', 'active'),
('0569d5c3-a116-11ef-95f3-b42e994cb670', 5, 'Tầng 5', 'Phòng VIP', '2024-11-09 08:08:05', '2024-11-17 03:47:21', 'active');

--
-- Triggers `dim_floor`
--
DELIMITER $$
CREATE TRIGGER `before_insert_dim_floor` BEFORE INSERT ON `dim_floor` FOR EACH ROW SET NEW.floor_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dim_item`
--

CREATE TABLE `dim_item` (
  `item_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_price` int DEFAULT NULL,
  `item_lending_price` int DEFAULT '0',
  `item_unit` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_item`
--

INSERT INTO `dim_item` (`item_id`, `item_name`, `item_price`, `item_lending_price`, `item_unit`, `created_at`, `updated_at`, `status`) VALUES
('b7f03426-a115-11ef-95f3-b42e994cb670', 'Băng gạc vô trùng', 15000, 0, 'gói', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3c784-a115-11ef-95f3-b42e994cb670', 'Khẩu trang y tế', 50000, 0, 'hộp', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3c8ec-a115-11ef-95f3-b42e994cb670', 'Bông y tế', 25000, 0, 'hộp', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3c989-a115-11ef-95f3-b42e994cb670', 'Nhiệt kế điện tử', 300000, 15000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3ca16-a115-11ef-95f3-b42e994cb670', 'Máy đo huyết áp', 500000, 25000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3ca9f-a115-11ef-95f3-b42e994cb670', 'Bộ dụng cụ tiêm insulin', 150000, 0, 'bộ', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3cb28-a115-11ef-95f3-b42e994cb670', 'Găng tay y tế', 50000, 0, 'hộp', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3cbab-a115-11ef-95f3-b42e994cb670', 'Ống tiêm nhựa', 2000, 0, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3cc27-a115-11ef-95f3-b42e994cb670', 'Máy đo đường huyết', 600000, 30000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3cca4-a115-11ef-95f3-b42e994cb670', 'Băng keo cá nhân', 10000, 0, 'gói', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3cd25-a115-11ef-95f3-b42e994cb670', 'Bộ truyền dịch', 30000, 0, 'bộ', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3cda1-a115-11ef-95f3-b42e994cb670', 'Bình oxy y tế', 1000000, 0, 'bình', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3ce1e-a115-11ef-95f3-b42e994cb670', 'Máy xông mũi họng', 800000, 40000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3cea3-a115-11ef-95f3-b42e994cb670', 'Nạng y tế', 250000, 10000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3cf23-a115-11ef-95f3-b42e994cb670', 'Xe lăn', 2500000, 50000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3cfa6-a115-11ef-95f3-b42e994cb670', 'Gạc rửa vết thương', 10000, 0, 'gói', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d023-a115-11ef-95f3-b42e994cb670', 'Kim tiêm vô trùng', 1000, 0, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d109-a115-11ef-95f3-b42e994cb670', 'Bộ test đường huyết', 120000, 0, 'bộ', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d190-a115-11ef-95f3-b42e994cb670', 'Mặt nạ oxy', 50000, 0, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d20b-a115-11ef-95f3-b42e994cb670', 'Bộ dụng cụ sơ cứu', 150000, 0, 'bộ', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d285-a115-11ef-95f3-b42e994cb670', 'Cân sức khỏe điện tử', 250000, 10000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d2f4-a115-11ef-95f3-b42e994cb670', 'Máy đo nồng độ oxy (SpO2)', 450000, 20000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d35b-a115-11ef-95f3-b42e994cb670', 'Máy trợ thở', 1500000, 75000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d3c7-a115-11ef-95f3-b42e994cb670', 'Găng tay cao su', 40000, 0, 'hộp', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d431-a115-11ef-95f3-b42e994cb670', 'Ống nghe y tế', 300000, 15000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d49c-a115-11ef-95f3-b42e994cb670', 'Bình xịt mũi', 70000, 0, 'chai', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d507-a115-11ef-95f3-b42e994cb670', 'Băng thun hỗ trợ khớp', 100000, 0, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d57d-a115-11ef-95f3-b42e994cb670', 'Bông ngoáy tai y tế', 5000, 0, 'gói', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d601-a115-11ef-95f3-b42e994cb670', 'Kính bảo hộ y tế', 80000, 0, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active'),
('b7f3d680-a115-11ef-95f3-b42e994cb670', 'Máy đo nhiệt độ trán', 400000, 25000, 'cái', '2024-10-06 22:20:26', '2024-11-12 16:46:53', 'active');

--
-- Triggers `dim_item`
--
DELIMITER $$
CREATE TRIGGER `before_insert_dim_item` BEFORE INSERT ON `dim_item` FOR EACH ROW SET NEW.item_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dim_meds`
--

CREATE TABLE `dim_meds` (
  `item_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_price` int DEFAULT NULL,
  `item_unit` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_meds`
--

INSERT INTO `dim_meds` (`item_id`, `item_name`, `item_price`, `item_unit`, `created_at`, `updated_at`, `status`) VALUES
('37052846-a11b-11ef-83b3-b42e994cb670', 'TPCN', 170000, 'hộp', '2024-11-12 17:26:13', '2024-11-16 15:56:13', 'deleted'),
('a5abc0d8-a115-11ef-95f3-b42e994cb670', 'Paracetamol', 2000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4687-a115-11ef-95f3-b42e994cb670', 'Aspirin', 3000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af47c1-a115-11ef-95f3-b42e994cb670', 'Amoxicillin', 25000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4858-a115-11ef-95f3-b42e994cb670', 'Vitamin C', 5000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af48e2-a115-11ef-95f3-b42e994cb670', 'Ibuprofen', 1500, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4961-a115-11ef-95f3-b42e994cb670', 'Efferalgan', 12000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af49dd-a115-11ef-95f3-b42e994cb670', 'Panadol', 18000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4a53-a115-11ef-95f3-b42e994cb670', 'Clarithromycin', 35000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4ad7-a115-11ef-95f3-b42e994cb670', 'Metformin', 2000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4b54-a115-11ef-95f3-b42e994cb670', 'Omeprazole', 10000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4bcc-a115-11ef-95f3-b42e994cb670', 'Loratadine', 8000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4c44-a115-11ef-95f3-b42e994cb670', 'Ciprofloxacin', 12000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4cfe-a115-11ef-95f3-b42e994cb670', 'Azithromycin', 30000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4d7d-a115-11ef-95f3-b42e994cb670', 'Cefalexin', 25000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4df1-a115-11ef-95f3-b42e994cb670', 'Acetylcysteine', 15000, 'gói', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4e6b-a115-11ef-95f3-b42e994cb670', 'Silymarin', 4000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4ee0-a115-11ef-95f3-b42e994cb670', 'Prednisolone', 12000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4f5a-a115-11ef-95f3-b42e994cb670', 'Hydroxyzine', 20000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af4fd4-a115-11ef-95f3-b42e994cb670', 'Drotaverin', 15000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af503f-a115-11ef-95f3-b42e994cb670', 'Diclofenac', 5000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af523e-a115-11ef-95f3-b42e994cb670', 'Fexofenadine', 25000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af55d9-a115-11ef-95f3-b42e994cb670', 'Ketoconazole', 20000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5648-a115-11ef-95f3-b42e994cb670', 'Cetirizine', 7000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af56a0-a115-11ef-95f3-b42e994cb670', 'Meloxicam', 2500, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af56f6-a115-11ef-95f3-b42e994cb670', 'Esomeprazole', 20000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af574d-a115-11ef-95f3-b42e994cb670', 'Trimebutine', 15000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af57a0-a115-11ef-95f3-b42e994cb670', 'Loperamide', 3000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af57f0-a115-11ef-95f3-b42e994cb670', 'Simvastatin', 10000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af583d-a115-11ef-95f3-b42e994cb670', 'Spironolactone', 5000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af588f-a115-11ef-95f3-b42e994cb670', 'Dulcolax', 12000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af58dd-a115-11ef-95f3-b42e994cb670', 'Calcium carbonate', 8000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af592f-a115-11ef-95f3-b42e994cb670', 'Atorvastatin', 15000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af597f-a115-11ef-95f3-b42e994cb670', 'Gabapentin', 18000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af59cc-a115-11ef-95f3-b42e994cb670', 'Doxycycline', 25000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5a27-a115-11ef-95f3-b42e994cb670', 'Fluconazole', 20000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5a8a-a115-11ef-95f3-b42e994cb670', 'Montelukast', 18000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5adc-a115-11ef-95f3-b42e994cb670', 'Folic Acid', 3000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5b29-a115-11ef-95f3-b42e994cb670', 'Amlodipine', 10000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5b76-a115-11ef-95f3-b42e994cb670', 'Candesartan', 15000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5bc3-a115-11ef-95f3-b42e994cb670', 'Losartan', 13000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5c10-a115-11ef-95f3-b42e994cb670', 'Levofloxacin', 22000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5c63-a115-11ef-95f3-b42e994cb670', 'Metronidazole', 10000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5cb3-a115-11ef-95f3-b42e994cb670', 'Propranolol', 12000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5d00-a115-11ef-95f3-b42e994cb670', 'Lansoprazole', 18000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5d53-a115-11ef-95f3-b42e994cb670', 'Ranitidine', 8000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5da1-a115-11ef-95f3-b42e994cb670', 'Terbinafine', 15000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5dee-a115-11ef-95f3-b42e994cb670', 'Tetracycline', 12000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5e3f-a115-11ef-95f3-b42e994cb670', 'Domperidone', 5000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5e8a-a115-11ef-95f3-b42e994cb670', 'Bromhexine', 7000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5ed8-a115-11ef-95f3-b42e994cb670', 'Clotrimazole', 20000, 'hộp', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active'),
('a5af5f28-a115-11ef-95f3-b42e994cb670', 'Nystatin', 10000, 'viên', '2024-10-07 05:15:01', '2024-11-12 16:46:23', 'active');

--
-- Triggers `dim_meds`
--
DELIMITER $$
CREATE TRIGGER `before_insert_dim_meds` BEFORE INSERT ON `dim_meds` FOR EACH ROW SET NEW.item_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dim_med_service`
--

CREATE TABLE `dim_med_service` (
  `item_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_price` int DEFAULT NULL,
  `item_unit` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_med_service`
--

INSERT INTO `dim_med_service` (`item_id`, `item_name`, `item_price`, `item_unit`, `created_at`, `updated_at`, `status`) VALUES
('c967443b-a115-11ef-95f3-b42e994cb670', 'Xét nghiệm máu toàn phần', 150000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674706-a115-11ef-95f3-b42e994cb670', 'Xét nghiệm đường huyết', 80000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c967477f-a115-11ef-95f3-b42e994cb670', 'Xét nghiệm nước tiểu', 70000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c96747e1-a115-11ef-95f3-b42e994cb670', 'Xét nghiệm chức năng gan', 120000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674834-a115-11ef-95f3-b42e994cb670', 'Xét nghiệm chức năng thận', 100000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674883-a115-11ef-95f3-b42e994cb670', 'Xét nghiệm mỡ máu', 90000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c96748d7-a115-11ef-95f3-b42e994cb670', 'Chụp X-quang ngực', 200000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c967492d-a115-11ef-95f3-b42e994cb670', 'Chụp CT scan', 1500000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c967497d-a115-11ef-95f3-b42e994cb670', 'Chụp cộng hưởng từ (MRI)', 2500000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c96749ca-a115-11ef-95f3-b42e994cb670', 'Chụp siêu âm ổ bụng', 300000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674a19-a115-11ef-95f3-b42e994cb670', 'Siêu âm tim', 500000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674a6a-a115-11ef-95f3-b42e994cb670', 'Siêu âm tuyến giáp', 350000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674ab8-a115-11ef-95f3-b42e994cb670', 'Điện tâm đồ (ECG)', 200000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674b06-a115-11ef-95f3-b42e994cb670', 'Đo mật độ xương', 400000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674b54-a115-11ef-95f3-b42e994cb670', 'Khám và chụp ảnh võng mạc', 250000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674b9f-a115-11ef-95f3-b42e994cb670', 'Xét nghiệm nhóm máu', 60000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674bef-a115-11ef-95f3-b42e994cb670', 'Đo huyết áp', 30000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674c3c-a115-11ef-95f3-b42e994cb670', 'Test COVID-19', 150000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674c88-a115-11ef-95f3-b42e994cb670', 'Xét nghiệm ung thư sớm', 1000000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active'),
('c9674cd7-a115-11ef-95f3-b42e994cb670', 'Kiểm tra nồng độ vitamin D', 80000, 'lần', '2024-11-09 05:57:49', '2024-11-12 16:47:22', 'active');

--
-- Triggers `dim_med_service`
--
DELIMITER $$
CREATE TRIGGER `before_insert_dim_med_service` BEFORE INSERT ON `dim_med_service` FOR EACH ROW SET NEW.item_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dim_room`
--

CREATE TABLE `dim_room` (
  `room_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `room_order` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `floor_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `faculty_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `room_size` int DEFAULT NULL,
  `room_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_room`
--

INSERT INTO `dim_room` (`room_id`, `room_order`, `room_name`, `floor_id`, `faculty_id`, `room_size`, `room_price`, `created_at`, `updated_at`, `status`) VALUES
('796a557f-a116-11ef-95f3-b42e994cb670', '101', 'Phòng 101', '05681e2f-a116-11ef-95f3-b42e994cb670', '63054655-a115-11ef-95f3-b42e994cb670', 1, 700000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a571d-a116-11ef-95f3-b42e994cb670', '110', 'Phòng 110', '05681e2f-a116-11ef-95f3-b42e994cb670', NULL, 4, 350000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a57c4-a116-11ef-95f3-b42e994cb670', '201', 'Phòng 201', '0569d3c3-a116-11ef-95f3-b42e994cb670', '6311557a-a115-11ef-95f3-b42e994cb670', 1, 720000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a5858-a116-11ef-95f3-b42e994cb670', '202', 'Phòng 202', '0569d3c3-a116-11ef-95f3-b42e994cb670', NULL, 2, 570000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'deleted'),
('796a58e8-a116-11ef-95f3-b42e994cb670', '203', 'Phòng 203', '0569d3c3-a116-11ef-95f3-b42e994cb670', NULL, 2, 570000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a596e-a116-11ef-95f3-b42e994cb670', '204', 'Phòng 204', '0569d3c3-a116-11ef-95f3-b42e994cb670', NULL, 4, 370000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a5a24-a116-11ef-95f3-b42e994cb670', '205', 'Phòng 205', '0569d3c3-a116-11ef-95f3-b42e994cb670', '631155fd-a115-11ef-95f3-b42e994cb670', 2, 570000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a5aaa-a116-11ef-95f3-b42e994cb670', '206', 'Phòng 206', '0569d3c3-a116-11ef-95f3-b42e994cb670', NULL, 1, 720000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a5b2b-a116-11ef-95f3-b42e994cb670', '207', 'Phòng 207', '0569d3c3-a116-11ef-95f3-b42e994cb670', NULL, 4, 370000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'deleted'),
('796a5baa-a116-11ef-95f3-b42e994cb670', '208', 'Phòng 208', '0569d3c3-a116-11ef-95f3-b42e994cb670', NULL, 2, 570000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a5c26-a116-11ef-95f3-b42e994cb670', '209', 'Phòng 209', '0569d3c3-a116-11ef-95f3-b42e994cb670', NULL, 1, 720000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a5ca0-a116-11ef-95f3-b42e994cb670', '102', 'Phòng 102', '05681e2f-a116-11ef-95f3-b42e994cb670', NULL, 2, 550000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a5d1b-a116-11ef-95f3-b42e994cb670', '301', 'Phòng 301', '0569d4dc-a116-11ef-95f3-b42e994cb670', '63115688-a115-11ef-95f3-b42e994cb670', 1, 740000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a5d98-a116-11ef-95f3-b42e994cb670', '302', 'Phòng 302', '0569d4dc-a116-11ef-95f3-b42e994cb670', NULL, 4, 390000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a5e0e-a116-11ef-95f3-b42e994cb670', '303', 'Phòng 303', '0569d4dc-a116-11ef-95f3-b42e994cb670', NULL, 2, 590000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'deleted'),
('796a5e89-a116-11ef-95f3-b42e994cb670', '304', 'Phòng 304', '0569d4dc-a116-11ef-95f3-b42e994cb670', NULL, 2, 590000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a5f04-a116-11ef-95f3-b42e994cb670', '305', 'Phòng 305', '0569d4dc-a116-11ef-95f3-b42e994cb670', NULL, 4, 390000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a5f7d-a116-11ef-95f3-b42e994cb670', '306', 'Phòng 306', '0569d4dc-a116-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 2, 590000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a5ff8-a116-11ef-95f3-b42e994cb670', '307', 'Phòng 307', '0569d4dc-a116-11ef-95f3-b42e994cb670', NULL, 1, 740000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6077-a116-11ef-95f3-b42e994cb670', '308', 'Phòng 308', '0569d4dc-a116-11ef-95f3-b42e994cb670', NULL, 4, 390000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a60ed-a116-11ef-95f3-b42e994cb670', '309', 'Phòng 309', '0569d4dc-a116-11ef-95f3-b42e994cb670', NULL, 1, 740000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6162-a116-11ef-95f3-b42e994cb670', '401', 'Phòng 401', '0569d551-a116-11ef-95f3-b42e994cb670', '63115776-a115-11ef-95f3-b42e994cb670', 2, 610000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a61de-a116-11ef-95f3-b42e994cb670', '103', 'Phòng 103', '05681e2f-a116-11ef-95f3-b42e994cb670', NULL, 4, 350000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6253-a116-11ef-95f3-b42e994cb670', '402', 'Phòng 402', '0569d551-a116-11ef-95f3-b42e994cb670', NULL, 4, 410000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a62d5-a116-11ef-95f3-b42e994cb670', '403', 'Phòng 403', '0569d551-a116-11ef-95f3-b42e994cb670', NULL, 1, 760000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a634c-a116-11ef-95f3-b42e994cb670', '404', 'Phòng 404', '0569d551-a116-11ef-95f3-b42e994cb670', NULL, 2, 610000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'deleted'),
('796a63c1-a116-11ef-95f3-b42e994cb670', '405', 'Phòng 405', '0569d551-a116-11ef-95f3-b42e994cb670', NULL, 4, 410000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6433-a116-11ef-95f3-b42e994cb670', '406', 'Phòng 406', '0569d551-a116-11ef-95f3-b42e994cb670', '631157ed-a115-11ef-95f3-b42e994cb670', 1, 760000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a64ac-a116-11ef-95f3-b42e994cb670', '407', 'Phòng 407', '0569d551-a116-11ef-95f3-b42e994cb670', NULL, 2, 610000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a651e-a116-11ef-95f3-b42e994cb670', '408', 'Phòng 408', '0569d551-a116-11ef-95f3-b42e994cb670', NULL, 4, 410000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6591-a116-11ef-95f3-b42e994cb670', '501', 'Phòng 501', '0569d5c3-a116-11ef-95f3-b42e994cb670', '6311585c-a115-11ef-95f3-b42e994cb670', 1, 780000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'deleted'),
('796a6609-a116-11ef-95f3-b42e994cb670', '502', 'Phòng 502', '0569d5c3-a116-11ef-95f3-b42e994cb670', NULL, 1, 780000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6684-a116-11ef-95f3-b42e994cb670', '503', 'Phòng 503', '0569d5c3-a116-11ef-95f3-b42e994cb670', NULL, 1, 780000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a67b6-a116-11ef-95f3-b42e994cb670', '104', 'Phòng 104', '05681e2f-a116-11ef-95f3-b42e994cb670', NULL, 2, 550000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a6830-a116-11ef-95f3-b42e994cb670', '504', 'Phòng 504', '0569d5c3-a116-11ef-95f3-b42e994cb670', '631158d3-a115-11ef-95f3-b42e994cb670', 1, 780000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a68a7-a116-11ef-95f3-b42e994cb670', '505', 'Phòng 505', '0569d5c3-a116-11ef-95f3-b42e994cb670', NULL, 1, 780000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6919-a116-11ef-95f3-b42e994cb670', '506', 'Phòng 506', '0569d5c3-a116-11ef-95f3-b42e994cb670', NULL, 1, 780000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a698d-a116-11ef-95f3-b42e994cb670', '507', 'Phòng 507', '0569d5c3-a116-11ef-95f3-b42e994cb670', NULL, 1, 780000, '2024-11-08 16:29:39', '2024-11-20 15:27:46', 'maintenance'),
('796a6a09-a116-11ef-95f3-b42e994cb670', '105', 'Phòng 105', '05681e2f-a116-11ef-95f3-b42e994cb670', '63115435-a115-11ef-95f3-b42e994cb670', 1, 700000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6a80-a116-11ef-95f3-b42e994cb670', '106', 'Phòng 106', '05681e2f-a116-11ef-95f3-b42e994cb670', NULL, 4, 350000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'deleted'),
('796a6af7-a116-11ef-95f3-b42e994cb670', '107', 'Phòng 107', '05681e2f-a116-11ef-95f3-b42e994cb670', NULL, 2, 550000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6b6f-a116-11ef-95f3-b42e994cb670', '108', 'Phòng 108', '05681e2f-a116-11ef-95f3-b42e994cb670', NULL, 4, 350000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('796a6be3-a116-11ef-95f3-b42e994cb670', '109', 'Phòng 109', '05681e2f-a116-11ef-95f3-b42e994cb670', NULL, 1, 700000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active');

--
-- Triggers `dim_room`
--
DELIMITER $$
CREATE TRIGGER `before_insert_dim_room` BEFORE INSERT ON `dim_room` FOR EACH ROW SET NEW.room_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dim_user`
--

CREATE TABLE `dim_user` (
  `user_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_no` bigint DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthday` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `gender` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `faculty_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `oauth_google` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `oauth_facebook` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_user`
--

INSERT INTO `dim_user` (`user_id`, `user_name`, `password`, `email_address`, `contact_no`, `full_name`, `birthday`, `created_at`, `updated_at`, `gender`, `city`, `address`, `role`, `faculty_id`, `oauth_google`, `oauth_facebook`, `status`) VALUES
('0eef0c41-b24e-11ef-9657-b42e994cb670', 'demo_patient_2', 'pass123', 'demo_patient_2@example.com', 84345678912, 'Nguyen Van Hung', '1989-02-23T00:00:00.000Z', '2024-12-04 14:42:59', NULL, 'male', 'Ho Chi Minh', '16 Le Hong Phong', 'patient', '', NULL, NULL, 'active'),
('5c950e93-ac16-11ef-982c-b42e994cb670', 'nurse40', 'password123', 'nurse40@example.com', 842131423432, 'Nguyen Thi Ly', '1983-06-15T00:00:00.000Z', '2024-11-26 16:49:11', NULL, 'female', 'Ho Chi Minh', '35 Vo Van Tan', 'nurse', '63115701-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68edf2da-a114-11ef-95f3-b42e994cb670', 'huan_patient', 'password123', 'huan.nguyen@example.com', 84912345601, 'Nguyen Nhut Gia Huan', NULL, '2024-10-07 05:36:07', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '1 Mac Dinh Chi', 'patient', NULL, NULL, NULL, 'active'),
('68ee02c1-a114-11ef-95f3-b42e994cb670', 'huan_doctor', 'password123', 'huan.nguyen@example.com', 84912345602, 'Nguyen Nhut Gia Huan', NULL, '2024-10-07 05:36:07', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '1 Le Duan New', 'doctor', '63115776-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee03a8-a114-11ef-95f3-b42e994cb670', 'huan_admin', 'password123', 'huan.nguyen@example.com', 84567890123, 'Nguyen Nhut Gia Huan', '1999-10-03', '2024-10-07 05:36:07', '2024-11-24 11:43:43', 'male', 'Ho Chi Minh', '1 Le Duan 14', 'admin', 'NULL', NULL, NULL, 'active'),
('68ee0467-a114-11ef-95f3-b42e994cb670', 'long_patient', 'password123', 'long.nguyen@example.com', 84912345604, 'Nguyen Ba Long', NULL, '2024-10-07 05:36:07', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'patient', NULL, NULL, NULL, 'active'),
('68ee0505-a114-11ef-95f3-b42e994cb670', 'long_doctor', 'password123', 'long.nguyen@example.com', 84912345605, 'Nguyen Ba Long', NULL, '2024-10-07 05:36:07', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'doctor', '6311557a-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee05a8-a114-11ef-95f3-b42e994cb670', 'long_admin', 'password123', 'long.nguyen@example.com', 84912345606, 'Nguyen Ba Long', NULL, '2024-10-07 05:36:07', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '2 Tran Hung Dao', 'admin', NULL, NULL, NULL, 'active'),
('68ee0641-a114-11ef-95f3-b42e994cb670', 'khoa_patient', 'password123', 'khoa.tran@example.com', 84912345607, 'Tran Nguyen Dang Khoa', NULL, '2024-10-07 05:36:07', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, 'active'),
('68ee06e2-a114-11ef-95f3-b42e994cb670', 'khoa_doctor', 'password123', 'khoa.tran@example.com', 84912345608, 'Tran Nguyen Dang Khoa', NULL, '2024-10-07 05:36:07', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'doctor', '631158d3-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee077f-a114-11ef-95f3-b42e994cb670', 'khoa_admin', 'password123', 'khoa.tran@example.com', 84912345609, 'Tran Nguyen Dang Khoa', NULL, '2024-10-07 05:36:07', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'admin', NULL, NULL, NULL, 'active'),
('68ee0818-a114-11ef-95f3-b42e994cb670', 'doctor10', 'password123', 'doctor10@example.com', 84910000010, 'Nguyen Van An', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '10 Phan Xich Long', 'doctor', '63054655-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee08af-a114-11ef-95f3-b42e994cb670', 'doctor11', 'password123', 'doctor11@example.com', 84910000011, 'Tran Thi Bich', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'female', 'Ho Chi Minh', '11 Le Van Sy', 'doctor', '63115701-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee0942-a114-11ef-95f3-b42e994cb670', 'doctor12', 'password123', 'doctor12@example.com', 84910000012, 'Pham Minh Cuong', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '12 Nguyen Trai', 'doctor', '631155fd-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee09de-a114-11ef-95f3-b42e994cb670', 'doctor13', 'password123', 'doctor13@example.com', 84000000013, 'Vo Thi Hoa', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'female', 'Ho Chi Minh', '14 Vo Thi Sau', 'doctor', '6311585c-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee0a6f-a114-11ef-95f3-b42e994cb670', 'doctor14', 'password123', 'doctor14@example.com', 84910000014, 'Tran Van Hai', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '14 Hai Ba Trung', 'doctor', '63115435-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee0b00-a114-11ef-95f3-b42e994cb670', 'doctor15', 'password123', 'doctor15@example.com', 84910000015, 'Pham Van Khoa', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '15 Le Lai', 'doctor', '631157ed-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee0b90-a114-11ef-95f3-b42e994cb670', 'doctor16', 'password123', 'doctor16@example.com', 84910000016, 'Nguyen Thi Lan', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'female', 'Ho Chi Minh', '16 Tran Hung Dao', 'doctor', '63115688-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee0c2a-a114-11ef-95f3-b42e994cb670', 'doctor17', 'password123', 'doctor17@example.com', 84910000017, 'Tran Van Minh', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '17 Nguyen Thi Minh Khai', 'doctor', '6311557a-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee0cc5-a114-11ef-95f3-b42e994cb670', 'doctor18', 'password123', 'doctor18@example.com', 84910000018, 'Pham Thi Nhi', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'female', 'Ho Chi Minh', '18 Le Duan', 'doctor', '63115776-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee0d59-a114-11ef-95f3-b42e994cb670', 'doctor19', 'password123', 'doctor19@example.com', 84910000019, 'Nguyen Van Quan', NULL, '2024-10-07 05:44:49', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '19 Dong Khoi', 'doctor', '63054655-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee0dec-a114-11ef-95f3-b42e994cb670', 'patient20', 'password123', 'patient20@example.com', 84920000020, 'Nguyen Van Tuan', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '20 Nguyen Hue', 'patient', NULL, NULL, NULL, 'active'),
('68ee0e7c-a114-11ef-95f3-b42e994cb670', 'patient21', 'password123', 'patient21@example.com', 84920000021, 'Tran Thi Thao', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '21 Le Thanh Ton', 'patient', NULL, NULL, NULL, 'active'),
('68ee0f0d-a114-11ef-95f3-b42e994cb670', 'patient22', 'password123', 'patient22@example.com', 84920000022, 'Pham Van Hoang', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '22 Tran Van Kieu', 'patient', NULL, NULL, NULL, 'active'),
('68ee0fa2-a114-11ef-95f3-b42e994cb670', 'patient23', 'password123', 'patient23@example.com', 84920000023, 'Nguyen Thi Ly', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '23 Le Loi', 'patient', NULL, NULL, NULL, 'active'),
('68ee1040-a114-11ef-95f3-b42e994cb670', 'patient24', 'password123', 'patient24@example.com', 84920000024, 'Tran Van Dat', '1989-07-27', '2024-10-07 05:44:59', '2024-11-27 14:40:25', 'male', 'Ho Chi Minh', '24 Pham Ngoc Thach', 'patient', 'NULL', NULL, NULL, 'active'),
('68ee10d0-a114-11ef-95f3-b42e994cb670', 'patient25', 'password123', 'patient25@example.com', 84920000025, 'Pham Thi Kim', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '25 Vo Van Tan', 'patient', NULL, NULL, NULL, 'active'),
('68ee115e-a114-11ef-95f3-b42e994cb670', 'patient26', 'password123', 'patient26@example.com', 84920000026, 'Nguyen Van Phuc', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '26 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, 'active'),
('68ee11f5-a114-11ef-95f3-b42e994cb670', 'patient27', 'password123', 'patient27@example.com', 84920000027, 'Tran Thi Mai', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '27 Le Van Sy', 'patient', NULL, NULL, NULL, 'active'),
('68ee128e-a114-11ef-95f3-b42e994cb670', 'patient28', 'password123', 'patient28@example.com', 84920000028, 'Pham Van Tinh', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '28 Nguyen Trai', 'patient', NULL, NULL, NULL, 'active'),
('68ee131e-a114-11ef-95f3-b42e994cb670', 'patient29', 'password123', 'patient29@example.com', 84920000029, 'Nguyen Thi Hanh', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '29 Hai Ba Trung', 'patient', NULL, NULL, NULL, 'active'),
('68ee13ac-a114-11ef-95f3-b42e994cb670', 'patient30', 'password123', 'patient30@example.com', 84920000030, 'Tran Van Quang', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '30 Nguyen Hue', 'patient', NULL, NULL, NULL, 'active'),
('68ee143a-a114-11ef-95f3-b42e994cb670', 'patient31', 'password123', 'patient31@example.com', 84920000031, 'Pham Thi Trang', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '31 Le Thanh Ton', 'patient', NULL, NULL, NULL, 'active'),
('68ee14cc-a114-11ef-95f3-b42e994cb670', 'patient32', 'password123', 'patient32@example.com', 84920000032, 'Nguyen Van Son', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '32 Tran Van Kieu', 'patient', NULL, NULL, NULL, 'active'),
('68ee1560-a114-11ef-95f3-b42e994cb670', 'patient33', 'password123', 'patient33@example.com', 84920000033, 'Tran Thi Hoa', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '33 Le Loi', 'patient', NULL, NULL, NULL, 'active'),
('68ee15fd-a114-11ef-95f3-b42e994cb670', 'patient34', 'password123', 'patient34@example.com', 84920000034, 'Pham Van Cuong', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '34 Pham Ngoc Thach', 'patient', NULL, NULL, NULL, 'active'),
('68ee1691-a114-11ef-95f3-b42e994cb670', 'patient35', 'password123', 'patient35@example.com', 84920000035, 'Nguyen Thi Ngoc', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '35 Vo Van Tan', 'patient', NULL, NULL, NULL, 'active'),
('68ee1724-a114-11ef-95f3-b42e994cb670', 'patient36', 'password123', 'patient36@example.com', 84920000036, 'Tran Van Hieu', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '36 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, 'active'),
('68ee17bc-a114-11ef-95f3-b42e994cb670', 'patient37', 'password123', 'patient37@example.com', 84920000037, 'Pham Thi An', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '37 Le Van Sy', 'patient', NULL, NULL, NULL, 'active'),
('68ee1857-a114-11ef-95f3-b42e994cb670', 'patient38', 'password123', 'patient38@example.com', 84920000038, 'Nguyen Van Thanh', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '38 Nguyen Trai', 'patient', NULL, NULL, NULL, 'active'),
('68ee18ec-a114-11ef-95f3-b42e994cb670', 'patient39', 'password123', 'patient39@example.com', 84920000039, 'Tran Thi Kim', NULL, '2024-10-07 05:44:59', '2024-11-12 16:38:16', 'female', 'Ho Chi Minh', '39 Hai Ba Trung', 'patient', NULL, NULL, NULL, 'active'),
('b181a736-b24b-11ef-9657-b42e994cb670', 'demo_doctor', 'pass123', 'demo_doctor@example.com', 84123456789, 'Nguyen Tran Thanh Tu', '1980-06-18T00:00:00.000Z', '2024-12-04 14:26:04', NULL, 'male', 'Ho Chi Minh', '14 Le Hong Phong', 'doctor', '63115701-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('b4f3dfc4-b4c1-11ef-942d-d5f755c4d6e3', 'demo_nurse', 'pass123', 'demo_nurse@example.com', 84567891234, 'Nguyen Thi Huong', '1995-05-24T00:00:00.000Z', '2024-12-05 14:42:10', NULL, 'female', 'Ho Chi Minh', '29 Ly Tu Trong', 'nurse', '63115701-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('f1696fd4-b24d-11ef-9657-b42e994cb670', 'demo_patient_1', 'pass123', 'demo_patient_1@example.com', 84234567891, 'Chu Thi Huyen Trang', '1984-08-13T00:00:00.000Z', '2024-12-04 14:42:10', NULL, 'female', 'Ho Chi Minh', '35 Pho Quang', 'patient', '', NULL, NULL, 'active');

--
-- Triggers `dim_user`
--
DELIMITER $$
CREATE TRIGGER `before_insert_dim_user` BEFORE INSERT ON `dim_user` FOR EACH ROW SET NEW.user_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fact_appointment`
--

CREATE TABLE `fact_appointment` (
  `appt_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `doctor_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `patient_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `faculty_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `appt_fee` int DEFAULT NULL,
  `appt_datetime` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_appointment`
--

INSERT INTO `fact_appointment` (`appt_id`, `doctor_id`, `patient_id`, `faculty_id`, `appt_fee`, `appt_datetime`, `created_at`, `updated_at`, `status`) VALUES
('5a995a0b-adb5-11ef-962c-b42e994cb670', '68ee02c1-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '63115776-a115-11ef-95f3-b42e994cb670', 45000, '2024-11-28T01:19:00.000Z', '2024-11-28 18:19:49', NULL, 'active'),
('73dbefd8-b24e-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', 'f1696fd4-b24d-11ef-9657-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 300000, '2024-12-12T07:59:00.000Z', '2024-12-04 14:45:49', NULL, 'active'),
('942df348-ae62-11ef-95cd-b42e994cb670', '68ee02c1-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '63115776-a115-11ef-95f3-b42e994cb670', 400000, '2024-11-28T10:59:00.000Z', '2024-11-29 14:59:48', NULL, 'active'),
('b0e80d3a-a1e2-11ef-968e-b42e994cb670', '68ee09de-a114-11ef-95f3-b42e994cb670', '68ee10d0-a114-11ef-95f3-b42e994cb670', '631155fd-a115-11ef-95f3-b42e994cb670', 450000, '2024-10-08T21:30:00Z', '2024-10-10 15:40:44', '2024-11-16 17:28:23', 'active'),
('b0e81f9e-a1e2-11ef-968e-b42e994cb670', '68ee0b90-a114-11ef-95f3-b42e994cb670', '68ee128e-a114-11ef-95f3-b42e994cb670', '63115776-a115-11ef-95f3-b42e994cb670', 480000, '2024-10-17T14:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e820f0-a1e2-11ef-968e-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '68ee0dec-a114-11ef-95f3-b42e994cb670', '6311557a-a115-11ef-95f3-b42e994cb670', 400000, '2024-10-20T09:45:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82166-a1e2-11ef-968e-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '68ee1040-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 390000, '2024-10-22T16:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e821d2-a1e2-11ef-968e-b42e994cb670', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '68ee14cc-a114-11ef-95f3-b42e994cb670', '6311585c-a115-11ef-95f3-b42e994cb670', 410000, '2024-10-24T08:15:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82231-a1e2-11ef-968e-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '68ee0fa2-a114-11ef-95f3-b42e994cb670', '63115688-a115-11ef-95f3-b42e994cb670', 420000, '2024-10-26T11:30:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e822a8-a1e2-11ef-968e-b42e994cb670', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '68ee13ac-a114-11ef-95f3-b42e994cb670', '631157ed-a115-11ef-95f3-b42e994cb670', 460000, '2024-10-28T15:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82300-a1e2-11ef-968e-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '63115435-a115-11ef-95f3-b42e994cb670', 370000, '2024-10-08T21:30:00Z', '2024-10-10 15:40:44', '2024-11-16 17:28:49', 'active'),
('b0e8235f-a1e2-11ef-968e-b42e994cb670', '68ee0818-a114-11ef-95f3-b42e994cb670', '68ee0e7c-a114-11ef-95f3-b42e994cb670', '63054655-a115-11ef-95f3-b42e994cb670', 350000, '2024-11-02T10:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e823b3-a1e2-11ef-968e-b42e994cb670', '68ee0d59-a114-11ef-95f3-b42e994cb670', '68ee0f0d-a114-11ef-95f3-b42e994cb670', '631158d3-a115-11ef-95f3-b42e994cb670', 500000, '2024-11-04T17:30:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82407-a1e2-11ef-968e-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '68ee131e-a114-11ef-95f3-b42e994cb670', '63115688-a115-11ef-95f3-b42e994cb670', 420000, '2024-11-05T09:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e8245c-a1e2-11ef-968e-b42e994cb670', '68ee09de-a114-11ef-95f3-b42e994cb670', '68ee1560-a114-11ef-95f3-b42e994cb670', '631155fd-a115-11ef-95f3-b42e994cb670', 450000, '2024-11-07T14:15:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82531-a1e2-11ef-968e-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '68ee115e-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 390000, '2024-11-10T11:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e8259a-a1e2-11ef-968e-b42e994cb670', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '68ee1691-a114-11ef-95f3-b42e994cb670', '6311585c-a115-11ef-95f3-b42e994cb670', 410000, '2024-11-11T13:30:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e825f0-a1e2-11ef-968e-b42e994cb670', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '68ee11f5-a114-11ef-95f3-b42e994cb670', '631157ed-a115-11ef-95f3-b42e994cb670', 460000, '2024-11-12T16:45:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82643-a1e2-11ef-968e-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '68ee1724-a114-11ef-95f3-b42e994cb670', '6311557a-a115-11ef-95f3-b42e994cb670', 400000, '2024-11-13T09:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82697-a1e2-11ef-968e-b42e994cb670', '68ee0818-a114-11ef-95f3-b42e994cb670', '68ee15fd-a114-11ef-95f3-b42e994cb670', '63054655-a115-11ef-95f3-b42e994cb670', 350000, '2024-11-14T14:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e826ef-a1e2-11ef-968e-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee128e-a114-11ef-95f3-b42e994cb670', '63115435-a115-11ef-95f3-b42e994cb670', 370000, '2024-10-08T21:30:00Z', '2024-10-10 15:40:44', '2024-11-16 17:29:02', 'active'),
('b0e82744-a1e2-11ef-968e-b42e994cb670', '68ee0b90-a114-11ef-95f3-b42e994cb670', '68ee17bc-a114-11ef-95f3-b42e994cb670', '63115776-a115-11ef-95f3-b42e994cb670', 480000, '2024-11-16T15:15:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82799-a1e2-11ef-968e-b42e994cb670', '68ee0d59-a114-11ef-95f3-b42e994cb670', '68ee1857-a114-11ef-95f3-b42e994cb670', '631158d3-a115-11ef-95f3-b42e994cb670', 500000, '2024-11-17T10:45:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e827ed-a1e2-11ef-968e-b42e994cb670', '68ee09de-a114-11ef-95f3-b42e994cb670', '68ee0f0d-a114-11ef-95f3-b42e994cb670', '631155fd-a115-11ef-95f3-b42e994cb670', 450000, '2024-11-18T13:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82841-a1e2-11ef-968e-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '68ee1040-a114-11ef-95f3-b42e994cb670', '6311557a-a115-11ef-95f3-b42e994cb670', 400000, '2024-11-19T09:30:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82896-a1e2-11ef-968e-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 390000, '2024-10-08T21:30:00Z', '2024-10-10 15:40:44', '2024-11-16 17:29:08', 'active'),
('b0e828ea-a1e2-11ef-968e-b42e994cb670', '68ee0b90-a114-11ef-95f3-b42e994cb670', '68ee0e7c-a114-11ef-95f3-b42e994cb670', '63115776-a115-11ef-95f3-b42e994cb670', 480000, '2024-11-21T08:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e8293e-a1e2-11ef-968e-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee18ec-a114-11ef-95f3-b42e994cb670', '63115435-a115-11ef-95f3-b42e994cb670', 370000, '2024-11-22T14:45:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e829ff-a1e2-11ef-968e-b42e994cb670', '68ee0818-a114-11ef-95f3-b42e994cb670', '68ee1691-a114-11ef-95f3-b42e994cb670', '63054655-a115-11ef-95f3-b42e994cb670', 350000, '2024-11-23T10:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82a67-a1e2-11ef-968e-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '68ee13ac-a114-11ef-95f3-b42e994cb670', '63115688-a115-11ef-95f3-b42e994cb670', 420000, '2024-11-24T13:15:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82abd-a1e2-11ef-968e-b42e994cb670', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '68ee1724-a114-11ef-95f3-b42e994cb670', '631157ed-a115-11ef-95f3-b42e994cb670', 460000, '2024-11-25T15:30:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82b12-a1e2-11ef-968e-b42e994cb670', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '68ee14cc-a114-11ef-95f3-b42e994cb670', '6311585c-a115-11ef-95f3-b42e994cb670', 410000, '2024-11-26T11:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82b65-a1e2-11ef-968e-b42e994cb670', '68ee0d59-a114-11ef-95f3-b42e994cb670', '68ee0fa2-a114-11ef-95f3-b42e994cb670', '631158d3-a115-11ef-95f3-b42e994cb670', 500000, '2024-11-27T16:30:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82bb9-a1e2-11ef-968e-b42e994cb670', '68ee0b90-a114-11ef-95f3-b42e994cb670', '68ee1857-a114-11ef-95f3-b42e994cb670', '63115776-a115-11ef-95f3-b42e994cb670', 480000, '2024-11-28T09:45:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82c0d-a1e2-11ef-968e-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '68ee11f5-a114-11ef-95f3-b42e994cb670', '6311557a-a115-11ef-95f3-b42e994cb670', 400000, '2024-11-29T14:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82c53-a1e2-11ef-968e-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '68ee128e-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 390000, '2024-11-30T12:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82c93-a1e2-11ef-968e-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '68ee18ec-a114-11ef-95f3-b42e994cb670', '63115688-a115-11ef-95f3-b42e994cb670', 420000, '2024-12-01T10:30:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82cd3-a1e2-11ef-968e-b42e994cb670', '68ee09de-a114-11ef-95f3-b42e994cb670', '68ee15fd-a114-11ef-95f3-b42e994cb670', '631155fd-a115-11ef-95f3-b42e994cb670', 450000, '2024-12-02T13:45:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82d13-a1e2-11ef-968e-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee115e-a114-11ef-95f3-b42e994cb670', '63115435-a115-11ef-95f3-b42e994cb670', 370000, '2024-12-03T16:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82d52-a1e2-11ef-968e-b42e994cb670', '68ee0818-a114-11ef-95f3-b42e994cb670', '68ee131e-a114-11ef-95f3-b42e994cb670', '63054655-a115-11ef-95f3-b42e994cb670', 350000, '2024-12-04T09:15:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82d92-a1e2-11ef-968e-b42e994cb670', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '68ee17bc-a114-11ef-95f3-b42e994cb670', '6311585c-a115-11ef-95f3-b42e994cb670', 410000, '2024-12-05T11:30:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82e8e-a1e2-11ef-968e-b42e994cb670', '68ee0d59-a114-11ef-95f3-b42e994cb670', '68ee10d0-a114-11ef-95f3-b42e994cb670', '631158d3-a115-11ef-95f3-b42e994cb670', 500000, '2024-12-06T15:00:00Z', '2024-10-10 15:40:44', '2024-11-13 17:14:10', 'active'),
('b0e82ee5-a1e2-11ef-968e-b42e994cb670', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '68ee0dec-a114-11ef-95f3-b42e994cb670', '631157ed-a115-11ef-95f3-b42e994cb670', 460000, '2024-12-07T10:15:00Z', '2024-10-10 15:40:44', '2024-11-25 17:31:29', 'deleted'),
('d87df18a-acdf-11ef-b431-55d6306d9398', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee1040-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 45000, '2024-11-30T02:00:00.000Z', '2024-11-27 16:51:28', NULL, 'active');

--
-- Triggers `fact_appointment`
--
DELIMITER $$
CREATE TRIGGER `before_insert_fact_appointment` BEFORE INSERT ON `fact_appointment` FOR EACH ROW SET NEW.appt_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fact_facility_asmt`
--

CREATE TABLE `fact_facility_asmt` (
  `fac_asmt_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `ptn_log_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_type` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `item_price` int DEFAULT NULL,
  `item_note` mediumtext COLLATE utf8mb4_general_ci,
  `start_datetime` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `end_datetime` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_facility_asmt`
--

INSERT INTO `fact_facility_asmt` (`fac_asmt_id`, `ptn_log_id`, `item_type`, `item_id`, `amount`, `item_price`, `item_note`, `start_datetime`, `end_datetime`, `created_at`, `updated_at`, `status`) VALUES
('19f14d84-acd0-11ef-b431-55d6306d9398', '925148dc-ac1d-11ef-b431-55d6306d9398', 'item', 'b7f3cda1-a115-11ef-95f3-b42e994cb670', 1, 1000000, 'oxy', '2024-11-27T14:58:45.970Z', NULL, '2024-11-27 14:58:46', '2024-11-27 16:59:10', 'completed'),
('19f199ce-acd0-11ef-b431-55d6306d9398', '925148dc-ac1d-11ef-b431-55d6306d9398', 'room', '796a596e-a116-11ef-95f3-b42e994cb670', NULL, 370000, 'some note', '2024-11-28T14:58:00.000Z', NULL, '2024-11-27 14:58:46', '2024-11-27 16:59:10', 'completed'),
('63fe45d0-ad8e-11ef-962c-b42e994cb670', '44514c6f-ad8e-11ef-962c-b42e994cb670', 'room', '796a62d5-a116-11ef-95f3-b42e994cb670', NULL, 760000, '', '2024-11-28T12:40:00.000Z', NULL, '2024-11-28 13:40:54', NULL, 'active'),
('752198b4-aa46-11ef-96ba-b42e994cb670', '0976620e-a81f-11ef-9842-b42e994cb670', 'room', '796a68a7-a116-11ef-95f3-b42e994cb670', NULL, 780000, '', '2024-11-25T09:28:00.000Z', NULL, '2024-11-24 09:28:26', '2024-11-28 13:47:07', 'completed'),
('80bf3e5c-ace1-11ef-b431-55d6306d9398', '692260ee-ace1-11ef-b431-55d6306d9398', 'item', 'b7f3cda1-a115-11ef-95f3-b42e994cb670', 1, 1000000, 'oxy', '2024-11-27T17:03:19.914Z', NULL, '2024-11-27 17:03:19', '2024-11-27 17:03:25', 'completed'),
('80c01548-ace1-11ef-b431-55d6306d9398', '692260ee-ace1-11ef-b431-55d6306d9398', 'room', '796a6253-a116-11ef-95f3-b42e994cb670', NULL, 410000, 'êrererererer', '2024-11-29T17:03:00.000Z', NULL, '2024-11-27 17:03:19', '2024-11-27 17:03:25', 'completed'),
('8c7bd278-ad90-11ef-962c-b42e994cb670', '7ec6c7fe-ad90-11ef-962c-b42e994cb670', 'item', 'b7f3d57d-a115-11ef-95f3-b42e994cb670', 1, 5000, '', '2024-11-28T13:56:21.456Z', '2024-11-28T15:53:23+00:00', '2024-11-28 13:56:21', '2024-11-28 15:53:23', 'completed'),
('8c991c02-ad90-11ef-962c-b42e994cb670', '7ec6c7fe-ad90-11ef-962c-b42e994cb670', 'room', '796a6253-a116-11ef-95f3-b42e994cb670', NULL, 410000, '', '2024-11-27T12:56:00.000Z', '2024-11-28T15:53:23+00:00', '2024-11-28 13:56:21', '2024-11-28 15:53:23', 'completed'),
('9f51d309-aa31-11ef-96ba-b42e994cb670', '0976620e-a81f-11ef-9842-b42e994cb670', 'room', '796a6609-a116-11ef-95f3-b42e994cb670', NULL, 780000, '', '2024-11-23T20:00:00.000Z', '2024-11-25T09:28:00.000Z', '2024-11-24 06:59:17', '2024-11-28 13:47:07', 'completed'),
('bd72d971-ada2-11ef-962c-b42e994cb670', '937f7d45-ada2-11ef-962c-b42e994cb670', 'service', 'c96749ca-a115-11ef-95f3-b42e994cb670', 1, 300000, 'adsfdsf', '2024-11-28T16:06:34.542Z', '2024-11-28T16:06:40+00:00', '2024-11-28 16:06:34', '2024-11-28 16:06:40', 'completed'),
('bd7839c9-ada2-11ef-962c-b42e994cb670', '937f7d45-ada2-11ef-962c-b42e994cb670', 'room', '796a651e-a116-11ef-95f3-b42e994cb670', NULL, 410000, '', '2024-11-28T16:00:00.000Z', '2024-11-28T16:06:40+00:00', '2024-11-28 16:06:34', '2024-11-28 16:06:40', 'completed'),
('fb21fd89-adb5-11ef-962c-b42e994cb670', 'c2122dbc-adb5-11ef-962c-b42e994cb670', 'item', 'b7f3d20b-a115-11ef-95f3-b42e994cb670', 3, 150000, '', '2024-11-28T18:24:18.540Z', '2024-11-28T18:24:44+00:00', '2024-11-28 18:24:18', '2024-11-28 18:24:45', 'completed');

--
-- Triggers `fact_facility_asmt`
--
DELIMITER $$
CREATE TRIGGER `before_insert_fact_facility_asmt` BEFORE INSERT ON `fact_facility_asmt` FOR EACH ROW SET NEW.fac_asmt_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fact_item_stock`
--

CREATE TABLE `fact_item_stock` (
  `stock_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `change_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `amount_changed` int NOT NULL,
  `amount_final` int NOT NULL,
  `stock_note` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_item_stock`
--

INSERT INTO `fact_item_stock` (`stock_id`, `updated_by`, `item_id`, `change_type`, `amount_changed`, `amount_final`, `stock_note`, `created_at`, `updated_at`, `status`) VALUES
('0cfa1afa-ac19-11ef-b431-55d6306d9398', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c784-a115-11ef-95f3-b42e994cb670', 'deduction', 15, 40, '', '2024-11-26 17:08:26', NULL, 'active'),
('177495c0-ac17-11ef-982c-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c784-a115-11ef-95f3-b42e994cb670', 'addition', 20, 50, '', '2024-11-26 16:54:24', '2024-11-26 17:28:45', 'deleted'),
('19f16ecc-acd0-11ef-b431-55d6306d9398', NULL, 'b7f3cda1-a115-11ef-95f3-b42e994cb670', 'deduction', 1, -1, NULL, '2024-11-27 14:58:46', NULL, 'active'),
('2aa9ec13-ac17-11ef-982c-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c784-a115-11ef-95f3-b42e994cb670', 'addition', 20, 70, '', '2024-11-26 16:54:57', '2024-11-26 17:28:47', 'deleted'),
('560d44a1-ad8e-11ef-962c-b42e994cb670', NULL, 'a5af47c1-a115-11ef-95f3-b42e994cb670', 'deduction', 324, -327, NULL, '2024-11-28 13:40:31', NULL, 'active'),
('562fba92-ad8e-11ef-962c-b42e994cb670', NULL, 'a5af4cfe-a115-11ef-95f3-b42e994cb670', 'deduction', 234, -234, NULL, '2024-11-28 13:40:31', NULL, 'active'),
('563d4ce3-ad8e-11ef-962c-b42e994cb670', NULL, 'a5af4c44-a115-11ef-95f3-b42e994cb670', 'deduction', 23, -23, NULL, '2024-11-28 13:40:31', NULL, 'active'),
('6f6ede7a-ac1c-11ef-b431-55d6306d9398', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 12, 12, 'fuck mask', '2024-11-26 17:32:40', '2024-12-01 08:33:19', 'deleted'),
('71d7b6b2-ac19-11ef-b431-55d6306d9398', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c8ec-a115-11ef-95f3-b42e994cb670', 'addition', 2, 2, 'fuck mask', '2024-11-26 17:11:15', NULL, 'active'),
('75a8b1d8-ace1-11ef-b431-55d6306d9398', NULL, 'a5af5b29-a115-11ef-95f3-b42e994cb670', 'deduction', 2, -2, NULL, '2024-11-27 17:03:01', NULL, 'active'),
('75a8f42c-ace1-11ef-b431-55d6306d9398', NULL, 'a5af47c1-a115-11ef-95f3-b42e994cb670', 'deduction', 2, -3, NULL, '2024-11-27 17:03:01', NULL, 'active'),
('78b2628b-ac16-11ef-982c-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c784-a115-11ef-95f3-b42e994cb670', 'addition', 50, 50, '', '2024-11-26 16:49:58', '2024-11-26 17:28:48', 'deleted'),
('7d55de7e-ac16-11ef-982c-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c784-a115-11ef-95f3-b42e994cb670', 'deduction', 20, 30, '', '2024-11-26 16:50:06', '2024-11-26 17:28:50', 'deleted'),
('80bfb008-ace1-11ef-b431-55d6306d9398', NULL, 'b7f3cda1-a115-11ef-95f3-b42e994cb670', 'deduction', 1, -2, NULL, '2024-11-27 17:03:19', NULL, 'active'),
('8c87e470-ad90-11ef-962c-b42e994cb670', NULL, 'b7f3d57d-a115-11ef-95f3-b42e994cb670', 'deduction', 1, -1, NULL, '2024-11-28 13:56:21', NULL, 'active'),
('93b7f295-ad90-11ef-962c-b42e994cb670', NULL, 'a5af5b29-a115-11ef-95f3-b42e994cb670', 'deduction', 23, -25, NULL, '2024-11-28 13:56:33', NULL, 'active'),
('a34b4840-ada2-11ef-962c-b42e994cb670', NULL, 'a5af47c1-a115-11ef-95f3-b42e994cb670', 'deduction', 21, -348, NULL, '2024-11-28 16:05:50', NULL, 'active'),
('a369ca7e-ada2-11ef-962c-b42e994cb670', NULL, 'a5af4687-a115-11ef-95f3-b42e994cb670', 'deduction', 2314, -2314, NULL, '2024-11-28 16:05:50', NULL, 'active'),
('a37c3329-ada2-11ef-962c-b42e994cb670', NULL, 'a5af4687-a115-11ef-95f3-b42e994cb670', 'deduction', 1432, -3746, NULL, '2024-11-28 16:05:51', NULL, 'active'),
('ca863407-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cf23-a115-11ef-95f3-b42e994cb670', 'addition', 50, 50, '', '2024-12-01 08:32:24', NULL, 'active'),
('d34f7d88-accf-11ef-b431-55d6306d9398', NULL, 'a5af4df1-a115-11ef-95f3-b42e994cb670', 'deduction', 2, -2, NULL, '2024-11-27 14:56:47', NULL, 'active'),
('d34fb5fa-accf-11ef-b431-55d6306d9398', NULL, 'a5af47c1-a115-11ef-95f3-b42e994cb670', 'deduction', 1, -1, NULL, '2024-11-27 14:56:47', NULL, 'active'),
('eaeb41b5-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 5000, '', '2024-12-01 08:33:19', '2024-12-01 08:33:21', 'deleted'),
('eb0cc383-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 20, '', '2024-12-01 08:33:19', '2024-12-01 08:33:22', 'deleted'),
('eb245954-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 5012, '', '2024-12-01 08:33:19', '2024-12-01 08:33:22', 'deleted'),
('eb635ec9-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cea3-a115-11ef-95f3-b42e994cb670', 'addition', 50, 50, '', '2024-12-01 08:33:19', '2024-12-01 08:33:22', 'deleted'),
('eb6bab09-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cc27-a115-11ef-95f3-b42e994cb670', 'addition', 50, 50, '', '2024-12-01 08:33:19', '2024-12-01 08:33:22', 'deleted'),
('ec26d728-ac18-11ef-b431-55d6306d9398', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c784-a115-11ef-95f3-b42e994cb670', 'deduction', 15, 55, '', '2024-11-26 17:07:31', '2024-11-26 17:28:51', 'deleted'),
('ec9eb7f6-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 10000, '', '2024-12-01 08:33:21', '2024-12-01 08:33:30', 'deleted'),
('ecafaf79-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 40, '', '2024-12-01 08:33:22', '2024-12-01 08:33:30', 'deleted'),
('ecd198df-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 10012, '', '2024-12-01 08:33:22', '2024-12-01 08:33:30', 'deleted'),
('ecdd7ac0-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cea3-a115-11ef-95f3-b42e994cb670', 'addition', 50, 100, '', '2024-12-01 08:33:22', '2024-12-01 08:33:30', 'deleted'),
('ececc4ab-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cc27-a115-11ef-95f3-b42e994cb670', 'addition', 50, 100, '', '2024-12-01 08:33:22', '2024-12-01 08:33:31', 'deleted'),
('f1a776df-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 15000, '', '2024-12-01 08:33:30', '2024-12-01 08:33:30', 'deleted'),
('f1b6b94b-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 60, '', '2024-12-01 08:33:30', '2024-12-01 08:33:30', 'deleted'),
('f1c5fdc8-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 20000, '', '2024-12-01 08:33:30', '2024-12-01 08:33:30', 'deleted'),
('f1ce5565-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 15012, '', '2024-12-01 08:33:30', '2024-12-01 08:33:31', 'deleted'),
('f1e67eb0-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 20000, '', '2024-12-01 08:33:30', '2024-12-01 08:33:30', 'deleted'),
('f1ece1fb-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 80, '', '2024-12-01 08:33:30', '2024-12-01 08:33:30', 'deleted'),
('f1f5c1c8-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cea3-a115-11ef-95f3-b42e994cb670', 'addition', 50, 150, '', '2024-12-01 08:33:30', '2024-12-01 08:33:31', 'deleted'),
('f1fc1f51-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 20000, '', '2024-12-01 08:33:30', '2024-12-01 08:33:32', 'deleted'),
('f22eee2b-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 80, '', '2024-12-01 08:33:31', '2024-12-01 08:33:31', 'deleted'),
('f23633f0-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cc27-a115-11ef-95f3-b42e994cb670', 'addition', 50, 150, '', '2024-12-01 08:33:31', '2024-12-01 08:33:31', 'deleted'),
('f23633fc-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 20012, '', '2024-12-01 08:33:31', '2024-12-01 08:33:31', 'deleted'),
('f24727b3-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 100, '', '2024-12-01 08:33:31', '2024-12-01 08:33:32', 'deleted'),
('f26c8073-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 25012, '', '2024-12-01 08:33:31', '2024-12-01 08:33:31', 'deleted'),
('f27b3d58-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cea3-a115-11ef-95f3-b42e994cb670', 'addition', 50, 200, '', '2024-12-01 08:33:31', '2024-12-01 08:33:31', 'deleted'),
('f2988e31-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cea3-a115-11ef-95f3-b42e994cb670', 'addition', 50, 250, '', '2024-12-01 08:33:32', '2024-12-01 08:33:32', 'deleted'),
('f2988e34-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 25012, '', '2024-12-01 08:33:32', '2024-12-01 08:33:32', 'deleted'),
('f29edc9d-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cc27-a115-11ef-95f3-b42e994cb670', 'addition', 50, 200, '', '2024-12-01 08:33:32', '2024-12-01 08:33:32', 'deleted'),
('f2cfe24c-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cea3-a115-11ef-95f3-b42e994cb670', 'addition', 50, 300, '', '2024-12-01 08:33:32', '2024-12-01 08:33:32', 'deleted'),
('f2cfe24d-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cc27-a115-11ef-95f3-b42e994cb670', 'addition', 50, 250, '', '2024-12-01 08:33:32', '2024-12-01 08:33:32', 'deleted'),
('f2e0f617-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 20000, '', '2024-12-01 08:33:32', '2024-12-01 08:33:33', 'deleted'),
('f2eeb0e1-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 25000, '', '2024-12-01 08:33:32', '2024-12-01 08:33:33', 'deleted'),
('f2f8a68d-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 120, '', '2024-12-01 08:33:32', '2024-12-01 08:33:33', 'deleted'),
('f2ffa492-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cc27-a115-11ef-95f3-b42e994cb670', 'addition', 50, 300, '', '2024-12-01 08:33:32', NULL, 'active'),
('f2ffa505-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 140, '', '2024-12-01 08:33:32', '2024-12-01 08:33:33', 'deleted'),
('f30efc09-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 30012, '', '2024-12-01 08:33:32', '2024-12-01 08:33:33', 'deleted'),
('f31728c6-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 35012, '', '2024-12-01 08:33:32', '2024-12-01 08:33:33', 'deleted'),
('f3267469-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cea3-a115-11ef-95f3-b42e994cb670', 'addition', 50, 300, '', '2024-12-01 08:33:32', NULL, 'active'),
('f32d7138-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cea3-a115-11ef-95f3-b42e994cb670', 'addition', 50, 300, '', '2024-12-01 08:33:32', NULL, 'active'),
('f38dd9c0-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 30000, '', '2024-12-01 08:33:33', '2024-12-01 08:33:33', 'deleted'),
('f39d19a6-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 140, '', '2024-12-01 08:33:33', '2024-12-01 08:33:33', 'deleted'),
('f3aabc62-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 35000, '', '2024-12-01 08:33:33', '2024-12-01 08:33:34', 'deleted'),
('f3b36b72-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 40012, '', '2024-12-01 08:33:33', '2024-12-01 08:33:34', 'deleted'),
('f3d00881-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 160, '', '2024-12-01 08:33:34', '2024-12-01 08:33:35', 'deleted'),
('f3df43e4-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3c989-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 45012, '', '2024-12-01 08:33:34', NULL, 'active'),
('f45e76fe-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 35000, '', '2024-12-01 08:33:34', '2024-12-01 08:33:35', 'deleted'),
('f46c0287-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 180, '', '2024-12-01 08:33:35', '2024-12-01 08:33:35', 'deleted'),
('f47f2bfa-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 40000, '', '2024-12-01 08:33:35', '2024-12-01 08:33:36', 'deleted'),
('f49dbb03-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3d431-a115-11ef-95f3-b42e994cb670', 'addition', 20, 200, '', '2024-12-01 08:33:35', NULL, 'active'),
('f50f4e0d-afbe-11ef-9655-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', 'b7f3cbab-a115-11ef-95f3-b42e994cb670', 'addition', 5000, 45000, '', '2024-12-01 08:33:36', NULL, 'active'),
('f78699a1-adb5-11ef-962c-b42e994cb670', NULL, 'a5af4687-a115-11ef-95f3-b42e994cb670', 'deduction', 21, -3767, NULL, '2024-11-28 18:24:12', NULL, 'active'),
('f7a36860-adb5-11ef-962c-b42e994cb670', NULL, 'a5af4d7d-a115-11ef-95f3-b42e994cb670', 'deduction', 34, -34, NULL, '2024-11-28 18:24:12', NULL, 'active'),
('fb2b3155-adb5-11ef-962c-b42e994cb670', NULL, 'b7f3d20b-a115-11ef-95f3-b42e994cb670', 'deduction', 3, -3, NULL, '2024-11-28 18:24:18', NULL, 'active');

--
-- Triggers `fact_item_stock`
--
DELIMITER $$
CREATE TRIGGER `update_final_amount_fact_item_stock` BEFORE INSERT ON `fact_item_stock` FOR EACH ROW BEGIN
    DECLARE current_stock INT;

    -- Generate UUID for stock_id if it is NULL
    SET NEW.stock_id = UUID();

    -- Get the current stock amount for the item
    SELECT amount_final INTO current_stock
    FROM fact_item_stock
    WHERE item_id = NEW.item_id
    ORDER BY created_at DESC
    LIMIT 1;

    -- If no previous stock record exists, assume starting from 0
    IF current_stock IS NULL THEN
        SET current_stock = 0;
    END IF;

    -- Update the amount_final based on change_type
    IF NEW.change_type = 'addition' THEN
        SET NEW.amount_final = current_stock + NEW.amount_changed;
    ELSEIF NEW.change_type = 'deduction' THEN
        SET NEW.amount_final = current_stock - NEW.amount_changed;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fact_med_hist`
--

CREATE TABLE `fact_med_hist` (
  `med_hist_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `ptn_log_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `doctor_id` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `patient_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blood_press` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blood_sugar` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spo2` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `weight` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `height` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `temp` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `med_note` mediumtext COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_med_hist`
--

INSERT INTO `fact_med_hist` (`med_hist_id`, `ptn_log_id`, `doctor_id`, `patient_id`, `blood_press`, `blood_sugar`, `spo2`, `weight`, `height`, `temp`, `med_note`, `created_at`, `updated_at`, `status`) VALUES
('27ec08fc-a113-11ef-95f3-b42e994cb670', '', '68ee0b90-a114-11ef-95f3-b42e994cb670', '68ee0e7c-a114-11ef-95f3-b42e994cb670', '115/75', '5.0', NULL, '55', NULL, '36.0', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27eddc22-a113-11ef-95f3-b42e994cb670', '', '68ee0942-a114-11ef-95f3-b42e994cb670', '68ee18ec-a114-11ef-95f3-b42e994cb670', '120/80', '5.5', NULL, '60', NULL, '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27eddd62-a113-11ef-95f3-b42e994cb670', '', '68ee0d59-a114-11ef-95f3-b42e994cb670', '68ee0f0d-a114-11ef-95f3-b42e994cb670', '145/92', '7.5', NULL, '82', NULL, '38.0', 'Huyết áp tăng cao. Đã kê thuốc.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edde0d-a113-11ef-95f3-b42e994cb670', 'bde4adf5-a68e-11ef-9694-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '68ee15fd-a114-11ef-95f3-b42e994cb670', '145/90', '7.1', NULL, '78', NULL, '37.9', 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 14:49:09', '2024-11-19 15:56:10', 'active'),
('27eddeb4-a113-11ef-95f3-b42e994cb670', '', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '68ee128e-a114-11ef-95f3-b42e994cb670', '140/90', '6.8', NULL, '75', NULL, '37.8', 'Chẩn đoán tiểu đường. Bắt đầu điều trị.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27eddf4c-a113-11ef-95f3-b42e994cb670', '', '68ee0818-a114-11ef-95f3-b42e994cb670', '68ee115e-a114-11ef-95f3-b42e994cb670', '135/88', '6.4', NULL, '75', NULL, '37.0', 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27eddfea-a113-11ef-95f3-b42e994cb670', '', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '68ee13ac-a114-11ef-95f3-b42e994cb670', '135/88', '7.0', NULL, '76', NULL, '37.5', 'Theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede07a-a113-11ef-95f3-b42e994cb670', '', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee0dec-a114-11ef-95f3-b42e994cb670', '120/80', '5.5', NULL, '65', NULL, '36.5', 'Kiểm tra sức khỏe bình thường. Không có vấn đề gì.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede117-a113-11ef-95f3-b42e994cb670', '', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '120/78', '5.1', NULL, '59', NULL, '36.3', 'Không có vấn đề gì.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede1a8-a113-11ef-95f3-b42e994cb670', '', '68ee09de-a114-11ef-95f3-b42e994cb670', '68ee1691-a114-11ef-95f3-b42e994cb670', '120/80', '5.0', NULL, '64', NULL, '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede236-a113-11ef-95f3-b42e994cb670', '', '68ee0b90-a114-11ef-95f3-b42e994cb670', '68ee1724-a114-11ef-95f3-b42e994cb670', '125/80', '5.9', NULL, '75', NULL, '37.0', 'Huyết áp đã ổn định.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede2c5-a113-11ef-95f3-b42e994cb670', '', '68ee0942-a114-11ef-95f3-b42e994cb670', '68ee0fa2-a114-11ef-95f3-b42e994cb670', '130/85', '5.4', NULL, '70', NULL, '36.8', 'Kiểm tra cho thấy kết quả bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede355-a113-11ef-95f3-b42e994cb670', '', '68ee0d59-a114-11ef-95f3-b42e994cb670', '68ee1857-a114-11ef-95f3-b42e994cb670', '140/90', '7.0', NULL, '85', NULL, '37.8', 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede3e9-a113-11ef-95f3-b42e994cb670', '', '68ee0b00-a114-11ef-95f3-b42e994cb670', '68ee0e7c-a114-11ef-95f3-b42e994cb670', '115/75', '5.1', NULL, '73', NULL, '36.5', 'Tất cả các chỉ số đều trong phạm vi bình thường.', '2024-10-08 14:49:09', '2024-11-16 15:56:13', 'deleted'),
('27ede476-a113-11ef-95f3-b42e994cb670', '', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '68ee11f5-a114-11ef-95f3-b42e994cb670', '125/80', '5.2', NULL, '70', NULL, '36.9', 'Kiểm tra định kỳ. Kết quả bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede501-a113-11ef-95f3-b42e994cb670', '', '68ee0818-a114-11ef-95f3-b42e994cb670', '68ee10d0-a114-11ef-95f3-b42e994cb670', '120/78', '5.3', NULL, '62', NULL, '36.6', 'Tất cả chỉ số trong phạm vi bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede589-a113-11ef-95f3-b42e994cb670', '', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '68ee1040-a114-11ef-95f3-b42e994cb670', '150/95', '8.0', NULL, '90', NULL, '38.5', 'Chẩn đoán tiểu đường. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede61b-a113-11ef-95f3-b42e994cb670', '', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee131e-a114-11ef-95f3-b42e994cb670', '125/82', '5.4', NULL, '63', NULL, '36.6', 'Đường huyết hơi cao. Khuyên thay đổi chế độ ăn uống.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede6a7-a113-11ef-95f3-b42e994cb670', '', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '68ee14cc-a114-11ef-95f3-b42e994cb670', '130/85', '5.7', NULL, '80', NULL, '37.5', 'Kiểm tra cho thấy kết quả bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede73a-a113-11ef-95f3-b42e994cb670', '', '68ee09de-a114-11ef-95f3-b42e994cb670', '68ee1560-a114-11ef-95f3-b42e994cb670', '125/80', '5.2', NULL, '70', NULL, '36.9', 'Kiểm tra định kỳ. Kết quả bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede7c3-a113-11ef-95f3-b42e994cb670', '', '68ee0b90-a114-11ef-95f3-b42e994cb670', '68ee17bc-a114-11ef-95f3-b42e994cb670', '110/70', '5.4', NULL, '58', NULL, '36.1', 'Kiểm tra sức khỏe định kỳ. Tất cả bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede853-a113-11ef-95f3-b42e994cb670', '', '68ee0942-a114-11ef-95f3-b42e994cb670', '68ee0e7c-a114-11ef-95f3-b42e994cb670', '110/70', '4.9', NULL, '55', NULL, '36.0', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede8e7-a113-11ef-95f3-b42e994cb670', '', '68ee0d59-a114-11ef-95f3-b42e994cb670', '68ee0f0d-a114-11ef-95f3-b42e994cb670', '140/90', '6.5', NULL, '80', NULL, '37.8', 'Chẩn đoán tăng huyết áp. Cần thay đổi lối sống ngay lập tức.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede970-a113-11ef-95f3-b42e994cb670', '', '68ee0b00-a114-11ef-95f3-b42e994cb670', '68ee1040-a114-11ef-95f3-b42e994cb670', '145/92', '8.5', NULL, '91', NULL, '38.7', 'Mức đường huyết vẫn cao. Điều chỉnh thuốc.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ede9ea-a113-11ef-95f3-b42e994cb670', '', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '68ee10d0-a114-11ef-95f3-b42e994cb670', '125/82', '5.1', NULL, '56', NULL, '36.3', 'Mức đường huyết bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edeaf7-a113-11ef-95f3-b42e994cb670', '', '68ee0818-a114-11ef-95f3-b42e994cb670', '68ee18ec-a114-11ef-95f3-b42e994cb670', '125/82', '5.7', NULL, '61', NULL, '36.6', 'Không có vấn đề gì.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edeb78-a113-11ef-95f3-b42e994cb670', '', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '68ee1857-a114-11ef-95f3-b42e994cb670', '145/92', '7.5', NULL, '87', NULL, '38.0', 'Mức đường huyết cao. Đã điều chỉnh thuốc.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edec00-a113-11ef-95f3-b42e994cb670', '', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee115e-a114-11ef-95f3-b42e994cb670', '130/85', '6.1', NULL, '76', NULL, '37.1', 'Cần chú ý đến chế độ ăn uống.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edec92-a113-11ef-95f3-b42e994cb670', '', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '68ee13ac-a114-11ef-95f3-b42e994cb670', '130/85', '6.5', NULL, '74', NULL, '37.3', 'Mức đường huyết đã được kiểm soát bằng thuốc.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27eded1e-a113-11ef-95f3-b42e994cb670', '', '68ee09de-a114-11ef-95f3-b42e994cb670', '68ee128e-a114-11ef-95f3-b42e994cb670', '130/85', '6.5', NULL, '84', NULL, '37.8', 'Huyết áp đã ổn định. Tiếp tục điều trị.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27ededa7-a113-11ef-95f3-b42e994cb670', '', '68ee0b90-a114-11ef-95f3-b42e994cb670', '68ee131e-a114-11ef-95f3-b42e994cb670', '130/84', '5.8', NULL, '64', NULL, '36.7', 'Theo dõi mức đường huyết. Cần kiểm tra lại.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edee2d-a113-11ef-95f3-b42e994cb670', '', '68ee0942-a114-11ef-95f3-b42e994cb670', '68ee11f5-a114-11ef-95f3-b42e994cb670', '120/78', '5.3', NULL, '63', NULL, '36.4', 'Kiểm tra định kỳ. Không có vấn đề gì.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edeeb8-a113-11ef-95f3-b42e994cb670', '', '68ee0d59-a114-11ef-95f3-b42e994cb670', '68ee0dec-a114-11ef-95f3-b42e994cb670', '135/88', '6.0', NULL, '66', NULL, '37.0', 'Huyết áp hơi cao. Cần theo dõi chế độ ăn uống.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edef3e-a113-11ef-95f3-b42e994cb670', '', '68ee0b00-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '115/75', '5.0', NULL, '64', NULL, '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edefcd-a113-11ef-95f3-b42e994cb670', '', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '68ee1724-a114-11ef-95f3-b42e994cb670', '135/88', '6.4', NULL, '77', NULL, '37.2', 'Huyết áp hơi cao. Theo dõi thường xuyên.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf057-a113-11ef-95f3-b42e994cb670', '', '68ee0818-a114-11ef-95f3-b42e994cb670', '68ee1560-a114-11ef-95f3-b42e994cb670', '130/85', '5.5', NULL, '72', NULL, '37.0', 'Không có dấu hiệu bất thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf0e4-a113-11ef-95f3-b42e994cb670', '', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '68ee1691-a114-11ef-95f3-b42e994cb670', '120/80', '5.0', NULL, '64', NULL, '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf16f-a113-11ef-95f3-b42e994cb670', '', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee15fd-a114-11ef-95f3-b42e994cb670', '140/88', '6.9', NULL, '79', NULL, '37.8', 'Cần kiểm tra lại trong tháng tới.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf1fc-a113-11ef-95f3-b42e994cb670', '', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '68ee128e-a114-11ef-95f3-b42e994cb670', '140/88', '6.8', NULL, '86', NULL, '38.0', 'Cần theo dõi huyết áp. Kiểm tra định kỳ cần thiết.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf28a-a113-11ef-95f3-b42e994cb670', '', '68ee09de-a114-11ef-95f3-b42e994cb670', '68ee115e-a114-11ef-95f3-b42e994cb670', '120/80', '5.2', NULL, '75', NULL, '37.1', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf317-a113-11ef-95f3-b42e994cb670', '', '68ee0b90-a114-11ef-95f3-b42e994cb670', '68ee13ac-a114-11ef-95f3-b42e994cb670', '140/90', '6.0', NULL, '75', NULL, '38.2', 'Huyết áp đã ổn định.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf3a0-a113-11ef-95f3-b42e994cb670', '', '68ee0942-a114-11ef-95f3-b42e994cb670', '68ee0fa2-a114-11ef-95f3-b42e994cb670', '140/90', '6.5', NULL, '78', NULL, '37.3', 'Cần theo dõi mức đường huyết. Đã điều chỉnh thuốc.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf41f-a113-11ef-95f3-b42e994cb670', '', '68ee0d59-a114-11ef-95f3-b42e994cb670', '68ee0e7c-a114-11ef-95f3-b42e994cb670', '110/70', '5.0', NULL, '56', NULL, '36.2', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf4ac-a113-11ef-95f3-b42e994cb670', '', '68ee0b00-a114-11ef-95f3-b42e994cb670', '68ee0f0d-a114-11ef-95f3-b42e994cb670', '130/85', '6.8', NULL, '82', NULL, '37.1', 'Huyết áp đã ổn định.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf539-a113-11ef-95f3-b42e994cb670', '', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '68ee1040-a114-11ef-95f3-b42e994cb670', '130/85', '5.9', NULL, '79', NULL, '37.6', 'Huyết áp và đường huyết đều trong mức bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf5c7-a113-11ef-95f3-b42e994cb670', '', '68ee0818-a114-11ef-95f3-b42e994cb670', '68ee18ec-a114-11ef-95f3-b42e994cb670', '120/80', '5.5', NULL, '60', NULL, '36.5', 'Kiểm tra sức khỏe bình thường.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('27edf657-a113-11ef-95f3-b42e994cb670', '', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '68ee17bc-a114-11ef-95f3-b42e994cb670', '115/75', '5.0', NULL, '58', NULL, '36.2', 'Kiểm tra sức khỏe bình thường. Tất cả các chỉ số đều ổn định.', '2024-10-08 14:49:09', '2024-11-14 16:55:23', 'active'),
('4b155a8d-ad8e-11ef-962c-b42e994cb670', '44514c6f-ad8e-11ef-962c-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee0dec-a114-11ef-95f3-b42e994cb670', '3124', NULL, '134', '341', '1234', '213', 'àdaSDF', '2024-11-28 13:40:12', NULL, 'active'),
('618c10b2-accf-11ef-b431-55d6306d9398', '925148dc-ac1d-11ef-b431-55d6306d9398', '5c950e93-ac16-11ef-982c-b42e994cb670', '68ee1040-a114-11ef-95f3-b42e994cb670', '111/22', NULL, '99', '200', '123', '40', 'fucked as hell', '2024-11-27 14:53:36', '2024-11-27 16:59:10', 'completed'),
('700af330-ace1-11ef-b431-55d6306d9398', '692260ee-ace1-11ef-b431-55d6306d9398', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee1040-a114-11ef-95f3-b42e994cb670', '111/22', NULL, '99', '200', '180', '40', 'sfdfgdfgfg', '2024-11-27 17:02:51', '2024-11-27 17:03:25', 'completed'),
('90498fe3-ad90-11ef-962c-b42e994cb670', '7ec6c7fe-ad90-11ef-962c-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '3241', NULL, '231432', '1324', '2314', '41234', 'safcsdf', '2024-11-28 13:56:27', '2024-11-28 13:58:26', 'completed'),
('984748b8-ada2-11ef-962c-b42e994cb670', '937f7d45-ada2-11ef-962c-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '12343', NULL, '3124', '34132', '321432', '234123', 'dsafsdfds', '2024-11-28 16:05:32', '2024-11-28 16:06:40', 'completed'),
('dd24bae4-accf-11ef-b431-55d6306d9398', '925148dc-ac1d-11ef-b431-55d6306d9398', '5c950e93-ac16-11ef-982c-b42e994cb670', '68ee1040-a114-11ef-95f3-b42e994cb670', '111/222', NULL, '99', '200', '123', '40', 'sfdfdf', '2024-11-27 14:57:04', '2024-11-27 16:59:10', 'completed'),
('e0bdfc9c-a835-11ef-9842-b42e994cb670', '0976620e-a81f-11ef-9842-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '45/90', NULL, '99', '45', '165', '36.5', 'Test', '2024-11-21 18:24:42', '2024-11-28 13:47:07', 'completed'),
('ed4c3303-adb5-11ef-962c-b42e994cb670', 'c2122dbc-adb5-11ef-962c-b42e994cb670', '68ee02c1-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '123', NULL, '123', '123', '123', '312', 'dsafdsfds', '2024-11-28 18:23:55', '2024-11-28 18:24:44', 'completed'),
('ff7f9ee3-a9b8-11ef-9872-b42e994cb670', '0976620e-a81f-11ef-9842-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '3241', NULL, '1234', '234', '134', '1234', 'dầdsasdfsfasdf', '2024-11-23 16:35:49', '2024-11-28 13:47:07', 'completed');

--
-- Triggers `fact_med_hist`
--
DELIMITER $$
CREATE TRIGGER `before_insert_fact_med_hist` BEFORE INSERT ON `fact_med_hist` FOR EACH ROW SET NEW.med_hist_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fact_patient_log`
--

CREATE TABLE `fact_patient_log` (
  `ptn_log_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `patient_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `doctor_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `faculty_id` varchar(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_inpatient` tinyint(1) NOT NULL DEFAULT '0',
  `med_note` mediumtext COLLATE utf8mb4_general_ci,
  `start_datetime` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `end_datetime` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_patient_log`
--

INSERT INTO `fact_patient_log` (`ptn_log_id`, `patient_id`, `doctor_id`, `faculty_id`, `is_inpatient`, `med_note`, `start_datetime`, `end_datetime`, `created_at`, `updated_at`, `status`) VALUES
('0976620e-a81f-11ef-9842-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 1, 'dầdsasdfsfasdf', '2024-11-21T16:41:12+01:00', '', '2024-11-21 15:41:12', '2024-11-28 13:47:07', 'completed'),
('44514c6f-ad8e-11ef-962c-b42e994cb670', '68ee0dec-a114-11ef-95f3-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 1, 'àdaSDF', '2024-11-28T14:40:01+01:00', '', '2024-11-28 13:40:01', '2024-11-28 13:40:54', 'active'),
('692260ee-ace1-11ef-b431-55d6306d9398', '68ee1040-a114-11ef-95f3-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 1, 'sfdfgdfgfg', '2024-11-27T17:02:40+00:00', '', '2024-11-27 17:02:40', '2024-11-27 17:03:25', 'completed'),
('79c9d5f2-ad90-11ef-962c-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 0, NULL, '2024-11-28T14:55:50+01:00', NULL, '2024-11-28 13:55:50', NULL, 'active'),
('7ec6c7fe-ad90-11ef-962c-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 1, 'safcsdf', '2024-11-28T14:55:58+01:00', '2024-11-28T15:53:23+00:00', '2024-11-28 13:55:58', '2024-11-28 15:53:23', 'completed'),
('925148dc-ac1d-11ef-b431-55d6306d9398', '68ee1040-a114-11ef-95f3-b42e994cb670', '5c950e93-ac16-11ef-982c-b42e994cb670', '63115776-a115-11ef-95f3-b42e994cb670', 1, 'sfdfdf', '2024-11-26T17:40:48+00:00', '', '2024-11-26 17:40:48', '2024-11-27 16:59:10', 'completed'),
('937f7d45-ada2-11ef-962c-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 1, 'dsafsdfds', '2024-11-28T17:05:24+01:00', '2024-11-28T16:06:40+00:00', '2024-11-28 16:05:24', '2024-11-28 16:06:40', 'completed'),
('bde4adf5-a68e-11ef-9694-b42e994cb670', '68ee15fd-a114-11ef-95f3-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '631157ed-a115-11ef-95f3-b42e994cb670', 0, 'Chẩn đoán tiểu đường. Cần theo dõi sức khỏe cẩn thận', '2024-10-08T21:30:00Z', '2024-10-08T21:30:00Z', '2024-11-19 15:55:47', NULL, 'active'),
('c2122dbc-adb5-11ef-962c-b42e994cb670', '68ee143a-a114-11ef-95f3-b42e994cb670', '68ee02c1-a114-11ef-95f3-b42e994cb670', '63115776-a115-11ef-95f3-b42e994cb670', 0, 'dsafdsfds', '2024-11-28T19:22:42+01:00', '2024-11-28T18:24:44+00:00', '2024-11-28 01:22:42', '2024-11-28 18:24:45', 'completed');

--
-- Triggers `fact_patient_log`
--
DELIMITER $$
CREATE TRIGGER `before_insert_fact_patient_log` BEFORE INSERT ON `fact_patient_log` FOR EACH ROW SET NEW.ptn_log_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fact_payment`
--

CREATE TABLE `fact_payment` (
  `payment_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `appt_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ptn_log_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` int NOT NULL,
  `payment_desc` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank_trans_code` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_payment`
--

INSERT INTO `fact_payment` (`payment_id`, `payment_type`, `appt_id`, `ptn_log_id`, `amount`, `payment_desc`, `payment_status`, `bank_trans_code`, `created_at`, `updated_at`) VALUES
('0b0fde3c-adb6-11ef-962c-b42e994cb670', 'patient-log', NULL, 'c2122dbc-adb5-11ef-962c-b42e994cb670', 1363000, 'Thanh toán viện phí ngày 29/11/2024', 'pending', NULL, '2024-11-28 18:24:45', NULL),
('1dd4f59e-ad92-11ef-962c-b42e994cb670', 'postpaid', NULL, '7ec6c7fe-ad90-11ef-962c-b42e994cb670', 645000, 'Thanh toán viện phí ngày 28/11/2024 21:07', 'pending', NULL, '2024-11-28 14:07:34', NULL),
('21490306-ad8f-11ef-962c-b42e994cb670', 'postpaid', NULL, '0976620e-a81f-11ef-9842-b42e994cb670', 0, 'Thanh toán viện phí ngày 28/11/2024 20:46', 'pending', NULL, '2024-11-28 13:46:12', NULL),
('3cd013d8-ad8f-11ef-962c-b42e994cb670', 'postpaid', NULL, '0976620e-a81f-11ef-9842-b42e994cb670', 0, 'Thanh toán viện phí ngày 28/11/2024 20:46', 'pending', NULL, '2024-11-28 13:46:58', NULL),
('429480c2-ad8f-11ef-962c-b42e994cb670', 'postpaid', NULL, '0976620e-a81f-11ef-9842-b42e994cb670', 3120000, 'Thanh toán viện phí ngày 28/11/2024 20:47', 'pending', NULL, '2024-11-28 13:47:08', NULL),
('50721d51-ad9f-11ef-962c-b42e994cb670', 'postpaid', NULL, '7ec6c7fe-ad90-11ef-962c-b42e994cb670', 645000, 'Thanh toán viện phí ngày 28/11/2024 22:42', 'pending', NULL, '2024-11-28 15:42:03', NULL),
('5aaa637d-adb5-11ef-962c-b42e994cb670', 'appointment', '5a995a0b-adb5-11ef-962c-b42e994cb670', NULL, 400000, 'Thanh toán đặt hẹn ngày 28/11/2024', 'completed', '14705828', '2024-11-28 18:19:49', '2024-11-28 18:20:30'),
('73f7572e-b24e-11ef-9657-b42e994cb670', 'appointment', '73dbefd8-b24e-11ef-9657-b42e994cb670', NULL, 300000, 'Thanh toán đặt hẹn ngày 12/12/2024', 'pending', NULL, '2024-12-04 14:45:49', NULL),
('89b14399-a692-11ef-9694-b42e994cb670', 'prepaid', 'b0e82166-a1e2-11ef-968e-b42e994cb670', NULL, 390000, 'Query Test', 'pending', NULL, '2024-11-19 16:22:57', NULL),
('93fdaf9a-ad91-11ef-962c-b42e994cb670', 'postpaid', NULL, '7ec6c7fe-ad90-11ef-962c-b42e994cb670', 645000, 'Thanh toán viện phí ngày 28/11/2024 21:03', 'pending', NULL, '2024-11-28 14:03:43', NULL),
('94469fae-ae62-11ef-95cd-b42e994cb670', 'appointment', '942df348-ae62-11ef-95cd-b42e994cb670', NULL, 400000, 'Thanh toán đặt hẹn ngày 28/11/2024', 'pending', NULL, '2024-11-29 14:59:48', NULL),
('c0dfca45-ada2-11ef-962c-b42e994cb670', 'patient-log', NULL, '937f7d45-ada2-11ef-962c-b42e994cb670', 12473000, 'Thanh toán viện phí ngày 28/11/2024 23:06', 'pending', NULL, '2024-11-28 16:06:40', NULL),
('c2315ca7-a0f8-11ef-95f3-b42e994cb670', 'prescription', 'b0e8245c-a1e2-11ef-968e-b42e994cb670', NULL, 120000, 'Test Pay 4', 'completed', '14641914', '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c2316cca-a0f8-11ef-95f3-b42e994cb670', 'prescription', 'b0e8259a-a1e2-11ef-968e-b42e994cb670', NULL, 120000, 'Pay test 5', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c2316d97-a0f8-11ef-95f3-b42e994cb670', 'prescription', 'b0e8259a-a1e2-11ef-968e-b42e994cb670', NULL, 120000, 'Pay test 5', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c2316e42-a0f8-11ef-95f3-b42e994cb670', 'prescription', 'b0e82300-a1e2-11ef-968e-b42e994cb670', NULL, 20000, 'Test Pay 6', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c2316ee1-a0f8-11ef-95f3-b42e994cb670', 'prescription', 'b0e82300-a1e2-11ef-968e-b42e994cb670', NULL, 20000, 'Test Pay 6', 'completed', '14641919', '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c2316f76-a0f8-11ef-95f3-b42e994cb670', 'prescription', 'b0e82166-a1e2-11ef-968e-b42e994cb670', 'bde4adf5-a68e-11ef-9694-b42e994cb670', 140000, 'Pay test 7', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-19 15:56:51'),
('c2317007-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e820f0-a1e2-11ef-968e-b42e994cb670', NULL, 123000, 'Test thanh toan', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c2317098-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e820f0-a1e2-11ef-968e-b42e994cb670', NULL, 123000, 'Test thanh toan', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c2317128-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e81f9e-a1e2-11ef-968e-b42e994cb670', NULL, 123000, 'Test thanh toan', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c23171b3-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e81f9e-a1e2-11ef-968e-b42e994cb670', NULL, 123000, 'asdfsd', 'completed', '14643763', '2024-11-06 17:00:00', '2024-11-14 13:48:50'),
('c2317242-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e820f0-a1e2-11ef-968e-b42e994cb670', NULL, 123456, 'test', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c23172ce-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e820f0-a1e2-11ef-968e-b42e994cb670', NULL, 123456, 'test', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c2317354-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e82166-a1e2-11ef-968e-b42e994cb670', NULL, 345000, 'Test Pay 1', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c23173d9-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e82166-a1e2-11ef-968e-b42e994cb670', NULL, 345000, 'Test Pay 1', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c2317461-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e82231-a1e2-11ef-968e-b42e994cb670', NULL, 345000, 'Test Pay 2', 'pending', NULL, '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('c23174eb-a0f8-11ef-95f3-b42e994cb670', 'appointment', 'b0e822a8-a1e2-11ef-968e-b42e994cb670', NULL, 123000, 'Test pay 3', 'completed', '14641906', '2024-11-06 17:00:00', '2024-11-13 17:14:08'),
('e6148fd3-ada0-11ef-962c-b42e994cb670', 'postpaid', NULL, '7ec6c7fe-ad90-11ef-962c-b42e994cb670', 645000, 'Thanh toán viện phí ngày 28/11/2024 22:53', 'pending', NULL, '2024-11-28 15:53:23', NULL);

--
-- Triggers `fact_payment`
--
DELIMITER $$
CREATE TRIGGER `before_insert_fact_payment` BEFORE INSERT ON `fact_payment` FOR EACH ROW SET NEW.payment_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fact_prescription`
--

CREATE TABLE `fact_prescription` (
  `pres_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `med_hist_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `item_note` mediumtext COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_prescription`
--

INSERT INTO `fact_prescription` (`pres_id`, `med_hist_id`, `item_id`, `amount`, `price`, `item_note`, `created_at`, `status`) VALUES
('443c554c-a35d-11ef-961a-b42e994cb670', '27eddd62-a113-11ef-95f3-b42e994cb670', 'a5abc0d8-a115-11ef-95f3-b42e994cb670', 1, 2000, 'Uống 1 viên buổi sáng sau ăn', '2024-10-08 14:50:10', 'active'),
('443c6570-a35d-11ef-961a-b42e994cb670', '27ede355-a113-11ef-95f3-b42e994cb670', 'a5abc0d8-a115-11ef-95f3-b42e994cb670', 2, 2000, 'Uống 1 viên vào buổi sáng', '2024-10-08 14:50:10', 'active'),
('443c6634-a35d-11ef-961a-b42e994cb670', '27ede3e9-a113-11ef-95f3-b42e994cb670', 'a5af4b54-a115-11ef-95f3-b42e994cb670', 1, 10000, 'Uống 1 viên buổi sáng trước ăn', '2024-10-08 14:50:10', 'active'),
('443c66dd-a35d-11ef-961a-b42e994cb670', '27ede476-a113-11ef-95f3-b42e994cb670', 'a5af4858-a115-11ef-95f3-b42e994cb670', 1, 12000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10', 'active'),
('443c676d-a35d-11ef-961a-b42e994cb670', '27ede589-a113-11ef-95f3-b42e994cb670', 'a5af4bcc-a115-11ef-95f3-b42e994cb670', 1, 10000, 'Uống 1 viên trước bữa ăn', '2024-10-08 14:50:10', 'active'),
('443c6806-a35d-11ef-961a-b42e994cb670', '27ede61b-a113-11ef-95f3-b42e994cb670', 'a5af4b54-a115-11ef-95f3-b42e994cb670', 1, 2000, 'Uống 1 viên buổi sáng', '2024-10-08 14:50:10', 'active'),
('443c6896-a35d-11ef-961a-b42e994cb670', '27ede7c3-a113-11ef-95f3-b42e994cb670', 'a5af48e2-a115-11ef-95f3-b42e994cb670', 1, 15000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10', 'active'),
('443c6928-a35d-11ef-961a-b42e994cb670', '27ede853-a113-11ef-95f3-b42e994cb670', 'a5af47c1-a115-11ef-95f3-b42e994cb670', 1, 25000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10', 'active'),
('443c69b7-a35d-11ef-961a-b42e994cb670', '27ede8e7-a113-11ef-95f3-b42e994cb670', 'a5af4858-a115-11ef-95f3-b42e994cb670', 2, 25000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10', 'active'),
('443c6a43-a35d-11ef-961a-b42e994cb670', '27ede970-a113-11ef-95f3-b42e994cb670', 'a5af4ad7-a115-11ef-95f3-b42e994cb670', 1, 2000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10', 'active'),
('443c6acb-a35d-11ef-961a-b42e994cb670', '27edeaf7-a113-11ef-95f3-b42e994cb670', 'a5abc0d8-a115-11ef-95f3-b42e994cb670', 1, 2000, 'Uống 1 viên buổi sáng sau ăn', '2024-10-08 14:50:10', 'active'),
('443c6b54-a35d-11ef-961a-b42e994cb670', '27eddd62-a113-11ef-95f3-b42e994cb670', 'a5af4ad7-a115-11ef-95f3-b42e994cb670', 1, 2000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10', 'active'),
('443c6bdf-a35d-11ef-961a-b42e994cb670', '27edeb78-a113-11ef-95f3-b42e994cb670', 'a5af4687-a115-11ef-95f3-b42e994cb670', 1, 3000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10', 'active'),
('443c6c65-a35d-11ef-961a-b42e994cb670', '27edec92-a113-11ef-95f3-b42e994cb670', 'a5af4961-a115-11ef-95f3-b42e994cb670', 2, 12000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10', 'active'),
('443c6ce8-a35d-11ef-961a-b42e994cb670', '27eded1e-a113-11ef-95f3-b42e994cb670', 'a5af47c1-a115-11ef-95f3-b42e994cb670', 1, 25000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10', 'active'),
('443c6d72-a35d-11ef-961a-b42e994cb670', '27ededa7-a113-11ef-95f3-b42e994cb670', 'a5af4b54-a115-11ef-95f3-b42e994cb670', 1, 10000, 'Uống 1 viên buổi sáng', '2024-10-08 14:50:10', 'active'),
('443c6dfc-a35d-11ef-961a-b42e994cb670', '27edef3e-a113-11ef-95f3-b42e994cb670', 'a5af4858-a115-11ef-95f3-b42e994cb670', 1, 15000, 'Uống 1 viên sau khi ăn', '2024-10-08 14:50:10', 'active'),
('443c6e8e-a35d-11ef-961a-b42e994cb670', '27edf057-a113-11ef-95f3-b42e994cb670', 'a5af47c1-a115-11ef-95f3-b42e994cb670', 1, 2000, 'Uống 1 viên buổi sáng sau ăn', '2024-10-08 14:50:10', 'active'),
('443c6f19-a35d-11ef-961a-b42e994cb670', '27edf0e4-a113-11ef-95f3-b42e994cb670', 'a5af4ad7-a115-11ef-95f3-b42e994cb670', 1, 2000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10', 'active'),
('443c6fa6-a35d-11ef-961a-b42e994cb670', '27edf16f-a113-11ef-95f3-b42e994cb670', 'a5af4b54-a115-11ef-95f3-b42e994cb670', 1, 10000, 'Uống 1 viên buổi sáng', '2024-10-08 14:50:10', 'active'),
('443c7036-a35d-11ef-961a-b42e994cb670', '27edf1fc-a113-11ef-95f3-b42e994cb670', 'a5af48e2-a115-11ef-95f3-b42e994cb670', 1, 1500, 'Uống 1 viên trước khi ăn', '2024-10-08 14:50:10', 'active'),
('443c70c6-a35d-11ef-961a-b42e994cb670', '27edde0d-a113-11ef-95f3-b42e994cb670', 'a5af47c1-a115-11ef-95f3-b42e994cb670', 2, 25000, 'Uống 1 viên mỗi ngày sau ăn', '2024-10-08 14:50:10', 'active'),
('443c7157-a35d-11ef-961a-b42e994cb670', '27edde0d-a113-11ef-95f3-b42e994cb670', 'a5af4b54-a115-11ef-95f3-b42e994cb670', 1, 10000, 'Uống 1 viên buổi sáng', '2024-10-08 14:50:10', 'active'),
('443c71e7-a35d-11ef-961a-b42e994cb670', '27eddeb4-a113-11ef-95f3-b42e994cb670', 'a5af4858-a115-11ef-95f3-b42e994cb670', 1, 15000, 'Uống 1 viên sau khi ăn', '2024-10-08 14:50:10', 'active'),
('443c7270-a35d-11ef-961a-b42e994cb670', '27ede07a-a113-11ef-95f3-b42e994cb670', 'a5af4687-a115-11ef-95f3-b42e994cb670', 1, 3000, 'Uống 1 viên trước khi ngủ', '2024-10-08 14:50:10', 'active'),
('443c72f5-a35d-11ef-961a-b42e994cb670', '27ede117-a113-11ef-95f3-b42e994cb670', 'a5af4ad7-a115-11ef-95f3-b42e994cb670', 1, 2000, 'Uống 1 viên buổi tối trước khi ngủ', '2024-10-08 14:50:10', 'active'),
('443c7382-a35d-11ef-961a-b42e994cb670', '27ede236-a113-11ef-95f3-b42e994cb670', 'a5af48e2-a115-11ef-95f3-b42e994cb670', 1, 1500, 'Uống 1 viên trước khi ăn', '2024-10-08 14:50:10', 'active'),
('443c74b4-a35d-11ef-961a-b42e994cb670', '27ede2c5-a113-11ef-95f3-b42e994cb670', 'a5af4961-a115-11ef-95f3-b42e994cb670', 2, 12000, 'Uống 1 viên vào buổi tối', '2024-10-08 14:50:10', 'active'),
('55fbc69b-ad8e-11ef-962c-b42e994cb670', '4b155a8d-ad8e-11ef-962c-b42e994cb670', 'a5af47c1-a115-11ef-95f3-b42e994cb670', 324, 25000, 'dsafsd', '2024-11-28 13:40:31', 'active'),
('561e6275-ad8e-11ef-962c-b42e994cb670', '4b155a8d-ad8e-11ef-962c-b42e994cb670', 'a5af4cfe-a115-11ef-95f3-b42e994cb670', 234, 30000, 'adsf', '2024-11-28 13:40:31', 'active'),
('563874c6-ad8e-11ef-962c-b42e994cb670', '4b155a8d-ad8e-11ef-962c-b42e994cb670', 'a5af4c44-a115-11ef-95f3-b42e994cb670', 23, 12000, 'ádf', '2024-11-28 13:40:31', 'active'),
('75a8691c-ace1-11ef-b431-55d6306d9398', '700af330-ace1-11ef-b431-55d6306d9398', 'a5af5b29-a115-11ef-95f3-b42e994cb670', 2, 10000, 'dfgsdfsd', '2024-11-27 17:03:01', 'completed'),
('75a8e2a2-ace1-11ef-b431-55d6306d9398', '700af330-ace1-11ef-b431-55d6306d9398', 'a5af47c1-a115-11ef-95f3-b42e994cb670', 2, 25000, 'dfdsgfsdgdfssgsfg', '2024-11-27 17:03:01', 'completed'),
('93ae6e3b-ad90-11ef-962c-b42e994cb670', '90498fe3-ad90-11ef-962c-b42e994cb670', 'a5af5b29-a115-11ef-95f3-b42e994cb670', 23, 10000, 'asdcs', '2024-11-28 13:56:33', 'completed'),
('a3394a38-ada2-11ef-962c-b42e994cb670', '984748b8-ada2-11ef-962c-b42e994cb670', 'a5af47c1-a115-11ef-95f3-b42e994cb670', 21, 25000, 'afdsf', '2024-11-28 16:05:50', 'completed'),
('a362c2c5-ada2-11ef-962c-b42e994cb670', '984748b8-ada2-11ef-962c-b42e994cb670', 'a5af4687-a115-11ef-95f3-b42e994cb670', 2314, 3000, 'adsfds', '2024-11-28 16:05:50', 'completed'),
('a370534a-ada2-11ef-962c-b42e994cb670', '984748b8-ada2-11ef-962c-b42e994cb670', 'a5af4687-a115-11ef-95f3-b42e994cb670', 1432, 3000, 'asdfs', '2024-11-28 16:05:51', 'completed'),
('d34eb0ce-accf-11ef-b431-55d6306d9398', '618c10b2-accf-11ef-b431-55d6306d9398', 'a5af4df1-a115-11ef-95f3-b42e994cb670', 2, 15000, 'fuck ', '2024-11-27 14:56:47', 'completed'),
('d34fa376-accf-11ef-b431-55d6306d9398', '618c10b2-accf-11ef-b431-55d6306d9398', 'a5af47c1-a115-11ef-95f3-b42e994cb670', 1, 25000, 'just do it', '2024-11-27 14:56:47', 'completed'),
('f7775d06-adb5-11ef-962c-b42e994cb670', 'ed4c3303-adb5-11ef-962c-b42e994cb670', 'a5af4687-a115-11ef-95f3-b42e994cb670', 21, 3000, 'dfsadsf', '2024-11-28 18:24:12', 'completed'),
('f79c642c-adb5-11ef-962c-b42e994cb670', 'ed4c3303-adb5-11ef-962c-b42e994cb670', 'a5af4d7d-a115-11ef-95f3-b42e994cb670', 34, 25000, 'asdfads', '2024-11-28 18:24:12', 'completed');

--
-- Triggers `fact_prescription`
--
DELIMITER $$
CREATE TRIGGER `before_insert_fact_prescription` BEFORE INSERT ON `fact_prescription` FOR EACH ROW SET NEW.pres_id = UUID()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fact_work_schedule`
--

CREATE TABLE `fact_work_schedule` (
  `work_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_datetime` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `end_datetime` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `work_note` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fact_work_schedule`
--

INSERT INTO `fact_work_schedule` (`work_id`, `user_id`, `start_datetime`, `end_datetime`, `work_note`, `created_at`, `updated_at`, `status`) VALUES
('118a9a00-aa32-11ef-96ba-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '2024-11-24T07:02:00.000Z', '2024-11-24T12:02:00.000Z', '', '2024-11-24 07:02:29', '2024-11-24 07:02:33', 'deleted'),
('1f2e7c6c-a35d-11ef-961a-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '2024-11-12T08:00:00Z', '2024-11-12T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30cb93-a35d-11ef-961a-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '2024-11-13T07:30:00Z', '2024-11-13T15:30:00Z', 'Bị ốm, tôi nghỉ ca chiều hôm nay', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30cce5-a35d-11ef-961a-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '2024-11-12T08:30:00Z', '2024-11-12T16:30:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30cd8e-a35d-11ef-961a-b42e994cb670', '68ee0818-a114-11ef-95f3-b42e994cb670', '2024-11-10T09:00:00Z', '2024-11-10T17:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30ce32-a35d-11ef-961a-b42e994cb670', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '2024-11-14T10:00:00Z', '2024-11-14T18:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30ced0-a35d-11ef-961a-b42e994cb670', '68ee0b90-a114-11ef-95f3-b42e994cb670', '2024-11-11T10:00:00Z', '2024-11-11T18:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30cfad-a35d-11ef-961a-b42e994cb670', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '2024-11-12T06:30:00Z', '2024-11-12T12:30:00Z', 'Mẹ tôi ốm nên tôi chỉ có thể làm nửa ngày hôm nay', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d04c-a35d-11ef-961a-b42e994cb670', '68ee0d59-a114-11ef-95f3-b42e994cb670', '2024-11-12T08:00:00Z', '2024-11-12T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d0e4-a35d-11ef-961a-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '2024-11-14T07:30:00Z', '2024-11-14T15:30:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d18b-a35d-11ef-961a-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '2024-11-13T08:00:00Z', '2024-11-13T14:00:00Z', 'Tôi có cuộc hẹn sáng nay, nên chỉ làm nửa ca', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d221-a35d-11ef-961a-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '2024-11-12T08:00:00Z', '2024-11-12T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d2aa-a35d-11ef-961a-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '2024-11-11T07:00:00Z', '2024-11-11T13:00:00Z', 'Do lý do cá nhân, tôi chỉ làm việc buổi sáng', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d584-a35d-11ef-961a-b42e994cb670', '68ee09de-a114-11ef-95f3-b42e994cb670', '2024-11-10T09:30:00Z', '2024-11-10T17:30:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d627-a35d-11ef-961a-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '2024-11-13T04:00', '2024-11-14T00:00', 'New', '2024-11-09 09:39:16', '2024-11-24 07:01:27', 'deleted'),
('1f30d6b0-a35d-11ef-961a-b42e994cb670', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '2024-11-14T08:00:00Z', '2024-11-14T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d733-a35d-11ef-961a-b42e994cb670', '68ee0818-a114-11ef-95f3-b42e994cb670', '2024-11-13T08:00:00Z', '2024-11-13T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d7b7-a35d-11ef-961a-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '2024-11-10T10:30:00Z', '2024-11-10T16:30:00Z', 'Công việc hôm nay có chút khó khăn, tôi phải làm ca nửa ngày', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d845-a35d-11ef-961a-b42e994cb670', '68ee0b90-a114-11ef-95f3-b42e994cb670', '2024-11-11T07:00:00Z', '2024-11-11T15:00:00Z', 'Tôi phải chăm sóc con cái, vì vậy tôi nghỉ ca chiều', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d8d8-a35d-11ef-961a-b42e994cb670', '68ee0d59-a114-11ef-95f3-b42e994cb670', '2024-11-13T07:30:00Z', '2024-11-13T15:30:00Z', 'Tôi có lịch hẹn bác sĩ vào chiều nay, nên chỉ làm ca sáng', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d961-a35d-11ef-961a-b42e994cb670', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '2024-11-13T08:00:00Z', '2024-11-13T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30d9e8-a35d-11ef-961a-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '2024-11-14T07:00:00Z', '2024-11-14T15:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30da73-a35d-11ef-961a-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '2024-11-14T08:00:00Z', '2024-11-14T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30dafa-a35d-11ef-961a-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '2024-11-11T08:00:00Z', '2024-11-11T14:00:00Z', 'Có việc đột xuất, tôi phải nghỉ làm ca chiều', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30db7d-a35d-11ef-961a-b42e994cb670', '68ee09de-a114-11ef-95f3-b42e994cb670', '2024-11-12T08:00:00Z', '2024-11-12T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30dc00-a35d-11ef-961a-b42e994cb670', '68ee0b90-a114-11ef-95f3-b42e994cb670', '2024-11-10T10:00:00Z', '2024-11-10T18:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30dc7f-a35d-11ef-961a-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '2024-11-11T09:00:00Z', '2024-11-11T17:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30dd08-a35d-11ef-961a-b42e994cb670', '68ee0818-a114-11ef-95f3-b42e994cb670', '2024-11-12T07:30:00Z', '2024-11-12T15:30:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30dd93-a35d-11ef-961a-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '2024-11-10T08:30:00Z', '2024-11-10T16:30:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30de1a-a35d-11ef-961a-b42e994cb670', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '2024-11-13T08:00:00Z', '2024-11-13T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30dea1-a35d-11ef-961a-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '2024-11-14T09:00:00Z', '2024-11-14T17:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30df28-a35d-11ef-961a-b42e994cb670', '68ee0d59-a114-11ef-95f3-b42e994cb670', '2024-11-14T08:00:00Z', '2024-11-14T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30dfaf-a35d-11ef-961a-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '2024-11-13T09:00:00Z', '2024-11-13T17:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e036-a35d-11ef-961a-b42e994cb670', '68ee09de-a114-11ef-95f3-b42e994cb670', '2024-11-13T07:00:00Z', '2024-11-13T12:00:00Z', 'Hôm nay tôi phải đi khám bác sĩ, làm việc nửa ngày', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e0c2-a35d-11ef-961a-b42e994cb670', '68ee0b00-a114-11ef-95f3-b42e994cb670', '2024-11-12T10:00:00Z', '2024-11-12T18:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e14b-a35d-11ef-961a-b42e994cb670', '68ee09de-a114-11ef-95f3-b42e994cb670', '2024-11-11T07:30:00Z', '2024-11-11T15:30:00Z', 'Bận việc gia đình, tôi chỉ làm nửa ngày', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e1d3-a35d-11ef-961a-b42e994cb670', '68ee0b90-a114-11ef-95f3-b42e994cb670', '2024-11-14T07:00:00Z', '2024-11-14T15:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e259-a35d-11ef-961a-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '2024-11-12T07:30:00Z', '2024-11-12T15:30:00Z', 'Do lịch hẹn quan trọng, tôi làm việc nửa ngày', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e2df-a35d-11ef-961a-b42e994cb670', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '2024-11-12T10:00:00Z', '2024-11-12T18:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e368-a35d-11ef-961a-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '2024-11-11T10:00:00Z', '2024-11-11T18:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e3e7-a35d-11ef-961a-b42e994cb670', '68ee09de-a114-11ef-95f3-b42e994cb670', '2024-11-14T07:30:00Z', '2024-11-14T15:30:00Z', 'Tôi cần nghỉ ca chiều vì có việc đột xuất', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e46e-a35d-11ef-961a-b42e994cb670', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '2024-11-10T08:00:00Z', '2024-11-10T16:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e4f4-a35d-11ef-961a-b42e994cb670', '68ee0d59-a114-11ef-95f3-b42e994cb670', '2024-11-11T08:30:00Z', '2024-11-11T16:30:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e57d-a35d-11ef-961a-b42e994cb670', '68ee0942-a114-11ef-95f3-b42e994cb670', '2024-11-14T07:30:00Z', '2024-11-14T15:30:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e603-a35d-11ef-961a-b42e994cb670', '68ee0b90-a114-11ef-95f3-b42e994cb670', '2024-11-13T09:00:00Z', '2024-11-13T17:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e689-a35d-11ef-961a-b42e994cb670', '68ee0c2a-a114-11ef-95f3-b42e994cb670', '2024-11-12T09:00:00Z', '2024-11-12T17:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30e711-a35d-11ef-961a-b42e994cb670', '68ee0818-a114-11ef-95f3-b42e994cb670', '2024-11-11T07:30:00Z', '2024-11-11T15:30:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30ebc2-a35d-11ef-961a-b42e994cb670', '68ee0cc5-a114-11ef-95f3-b42e994cb670', '2024-11-10T07:00:00Z', '2024-11-10T12:00:00Z', 'Do có việc gia đình, tôi chỉ làm việc buổi sáng', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30ec80-a35d-11ef-961a-b42e994cb670', '68ee0d59-a114-11ef-95f3-b42e994cb670', '2024-11-10T10:00:00Z', '2024-11-10T18:00:00Z', NULL, '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('1f30ed1a-a35d-11ef-961a-b42e994cb670', '68ee08af-a114-11ef-95f3-b42e994cb670', '2024-11-14T08:00:00Z', '2024-11-14T14:00:00Z', 'Tôi có cuộc họp quan trọng vào chiều nên phải nghỉ làm buổi chiều', '2024-11-09 09:39:16', '2024-11-15 14:23:02', 'active'),
('5b10382f-a4b2-11ef-93f7-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '2024-11-18T10:00', '2024-11-18T16:00', 'Test', '2024-11-17 07:05:41', NULL, 'active'),
('6695f87d-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-05T09:00:00', '2024-12-05T15:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('6699b41c-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-06T07:00:00', '2024-12-06T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b4f5-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-07T08:00:00', '2024-12-07T16:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b53f-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-08T11:00:00', '2024-12-08T19:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b586-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-09T08:00:00', '2024-12-09T16:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b5ca-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-10T10:00:00', '2024-12-10T18:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b609-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-11T09:00:00', '2024-12-11T15:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('6699b64c-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-12T07:00:00', '2024-12-12T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b6c9-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-13T12:00:00', '2024-12-13T20:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b70d-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-14T08:00:00', '2024-12-14T16:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b747-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-15T13:00:00', '2024-12-15T21:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b783-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-16T07:00:00', '2024-12-16T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b7bf-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-17T10:00:00', '2024-12-17T18:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('6699b7f9-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-18T08:00:00', '2024-12-18T14:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('6699b833-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-19T07:00:00', '2024-12-19T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0a53-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-20T12:00:00', '2024-12-20T20:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0b4f-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-21T07:00:00', '2024-12-21T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0ba0-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-22T11:00:00', '2024-12-22T19:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0be4-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-23T10:00:00', '2024-12-23T18:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0c25-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-24T07:00:00', '2024-12-24T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0c66-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-25T09:00:00', '2024-12-25T15:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('669b0cab-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-26T07:00:00', '2024-12-26T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0cee-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-27T08:00:00', '2024-12-27T14:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('669b0d2b-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-28T07:00:00', '2024-12-28T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0d68-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-29T13:00:00', '2024-12-29T21:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0da2-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-30T07:00:00', '2024-12-30T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0ddc-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-31T09:00:00', '2024-12-31T17:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0e15-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-01T07:00:00', '2025-01-01T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0e4f-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-02T07:00:00', '2025-01-02T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0e98-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-03T08:00:00', '2025-01-03T16:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0ed0-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-04T12:00:00', '2025-01-04T20:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0f0e-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-05T09:00:00', '2025-01-05T15:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('669b0f4c-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-06T07:00:00', '2025-01-06T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0f8c-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-07T07:00:00', '2025-01-07T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b0fde-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-08T10:00:00', '2025-01-08T18:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b1018-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-09T09:00:00', '2025-01-09T15:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('669b1052-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-10T07:00:00', '2025-01-10T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b108a-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-11T11:00:00', '2025-01-11T19:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b10c5-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-12T07:00:00', '2025-01-12T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b10ff-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-13T09:00:00', '2025-01-13T17:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b164b-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-14T08:00:00', '2025-01-14T14:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('669b16c5-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-15T07:00:00', '2025-01-15T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b170c-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-16T13:00:00', '2025-01-16T21:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b174d-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-17T07:00:00', '2025-01-17T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b178e-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-18T09:00:00', '2025-01-18T17:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b17ca-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-19T07:00:00', '2025-01-19T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b1806-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-20T09:00:00', '2025-01-20T15:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('669b1843-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-21T08:00:00', '2025-01-21T16:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b1882-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-22T11:00:00', '2025-01-22T19:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b18bf-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-23T07:00:00', '2025-01-23T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b18fb-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-24T09:00:00', '2025-01-24T17:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b1935-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-25T07:00:00', '2025-01-25T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b1972-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-26T12:00:00', '2025-01-26T20:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b19ae-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-27T09:00:00', '2025-01-27T15:00:00', 'Worked 2 hours less than usual due to left early.', '2024-12-04 14:38:17', NULL, 'active'),
('669b19ec-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-28T07:00:00', '2025-01-28T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b1a2a-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-29T07:00:00', '2025-01-29T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b1a66-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-30T07:00:00', '2025-01-30T15:00:00', NULL, '2024-12-04 14:38:17', NULL, 'active'),
('669b1aa4-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '2025-01-31T09:00:00', '2025-01-31T17:00:00', 'Worked 2 hours more than usual due to overtime.', '2024-12-04 14:38:17', NULL, 'active'),
('6cd94cae-a412-11ef-94b2-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '2024-11-17T07:00', '2024-11-17T19:00', 'Test', '2024-11-16 12:00:51', '2024-11-17 07:05:47', 'deleted'),
('6e7949c5-a412-11ef-94b2-b42e994cb670', '68ee0a6f-a114-11ef-95f3-b42e994cb670', '2024-11-17T07:00', '2024-11-17T19:00', 'Test', '2024-11-16 12:00:54', NULL, 'active'),
('e23cf1c3-aa87-11ef-9d3e-b42e994cb670', '68ee02c1-a114-11ef-95f3-b42e994cb670', '2024-11-28T00:00:00.000Z', '2024-11-28T14:00:00.000Z', 'Test', '2024-11-24 17:16:46', NULL, 'active'),
('f6fd7bec-acd7-11ef-b431-55d6306d9398', '68ee08af-a114-11ef-95f3-b42e994cb670', '2024-11-30T02:00:00.000Z', '2024-11-30T14:00:00.000Z', '', '2024-11-27 15:55:03', NULL, 'active');

--
-- Triggers `fact_work_schedule`
--
DELIMITER $$
CREATE TRIGGER `before_insert_fact_work_schedule` BEFORE INSERT ON `fact_work_schedule` FOR EACH ROW SET NEW.work_id = UUID()
$$
DELIMITER ;

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
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `dim_med_service`
--
ALTER TABLE `dim_med_service`
  ADD PRIMARY KEY (`item_id`);

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
-- Indexes for table `fact_item_stock`
--
ALTER TABLE `fact_item_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `fact_med_hist`
--
ALTER TABLE `fact_med_hist`
  ADD PRIMARY KEY (`med_hist_id`);

--
-- Indexes for table `fact_patient_log`
--
ALTER TABLE `fact_patient_log`
  ADD PRIMARY KEY (`ptn_log_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
