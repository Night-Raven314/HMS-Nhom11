-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 14, 2024 at 03:31 PM
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
('ae6b188a-b943-11ef-971e-f1693ceffb1e', 'Máy A', 200000, 0, 'bộ', '2024-12-13 11:16:21', NULL, 'active'),
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
('796a6be3-a116-11ef-95f3-b42e994cb670', '109', 'Phòng 109', '05681e2f-a116-11ef-95f3-b42e994cb670', NULL, 1, 700000, '2024-11-08 16:29:39', '2024-11-17 04:00:03', 'active'),
('e225c8d2-b943-11ef-971e-f1693ceffb1e', '508', '507', '0569d5c3-a116-11ef-95f3-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 4, 680000, '2024-12-13 11:17:47', '2024-12-13 11:17:59', 'deleted');

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
('68edf2da-a114-11ef-95f3-b42e994cb670', 'huan_patient', 'password123', 'huan.nguyen@example.com', 84912345601, 'Nguyen Nhut Gia Huan', NULL, '2024-10-07 05:36:07', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '1 Mac Dinh Chi', 'patient', NULL, NULL, NULL, 'active'),
('68ee02c1-a114-11ef-95f3-b42e994cb670', 'huan_doctor', 'password123', 'huan.nguyen@example.com', 84912345602, 'Nguyen Nhut Gia Huan', NULL, '2024-10-07 05:36:07', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '1 Le Duan New', 'doctor', '63115776-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee03a8-a114-11ef-95f3-b42e994cb670', 'huan_admin', 'password123', 'huan.nguyen@example.com', 84567890123, 'Nguyen Nhut Gia Huan', '1999-10-03', '2024-10-07 05:36:07', '2024-11-24 11:43:43', 'male', 'Ho Chi Minh', '1 Le Duan 14', 'admin', 'NULL', NULL, NULL, 'active'),
('68ee0641-a114-11ef-95f3-b42e994cb670', 'khoa_patient', 'password123', 'khoa.tran@example.com', 84912345607, 'Tran Nguyen Dang Khoa', NULL, '2024-10-07 05:36:07', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'patient', NULL, NULL, NULL, 'active'),
('68ee06e2-a114-11ef-95f3-b42e994cb670', 'khoa_doctor', 'password123', 'khoa.tran@example.com', 84912345608, 'Tran Nguyen Dang Khoa', NULL, '2024-10-07 05:36:07', '2024-11-12 16:44:31', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'doctor', '631158d3-a115-11ef-95f3-b42e994cb670', NULL, NULL, 'active'),
('68ee077f-a114-11ef-95f3-b42e994cb670', 'khoa_admin', 'password123', 'khoa.tran@example.com', 84912345609, 'Tran Nguyen Dang Khoa', NULL, '2024-10-07 05:36:07', '2024-11-12 16:38:16', 'male', 'Ho Chi Minh', '3 Nguyen Thi Minh Khai', 'admin', NULL, NULL, NULL, 'active'),
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
('5541f0fc-b944-11ef-971e-f1693ceffb1e', 'b181a736-b24b-11ef-9657-b42e994cb670', 'f1696fd4-b24d-11ef-9657-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 300000, '2024-12-20T05:20:00.000Z', '2024-12-13 11:21:01', NULL, 'active');

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
('5922f03a-b945-11ef-971e-f1693ceffb1e', '364a0832-b945-11ef-971e-f1693ceffb1e', 'service', 'c967492d-a115-11ef-95f3-b42e994cb670', 1, 1500000, '', '2024-12-13T11:28:17.098Z', NULL, '2024-12-13 11:28:17', NULL, 'active'),
('de9aac90-b944-11ef-971e-f1693ceffb1e', '76b99b2c-b944-11ef-971e-f1693ceffb1e', 'service', 'c9674706-a115-11ef-95f3-b42e994cb670', 1, 80000, 'Khả năng đường huyết', '2024-12-13T11:24:51.524Z', '2024-12-13T11:26:20+00:00', '2024-12-13 11:24:51', '2024-12-13 11:26:20', 'completed'),
('f965d7fc-b944-11ef-971e-f1693ceffb1e', '76b99b2c-b944-11ef-971e-f1693ceffb1e', 'room', '796a5ff8-a116-11ef-95f3-b42e994cb670', NULL, 740000, 'Cần nhập viện', '2024-12-13T11:25:00.000Z', '2024-12-13T11:26:20+00:00', '2024-12-13 11:25:36', '2024-12-13 11:26:20', 'completed');

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
('b125b67e-b944-11ef-971e-f1693ceffb1e', NULL, 'a5af4d7d-a115-11ef-95f3-b42e994cb670', 'deduction', 1, -1, NULL, '2024-12-13 11:23:35', NULL, 'active'),
('b1260818-b944-11ef-971e-f1693ceffb1e', NULL, 'a5af5ed8-a115-11ef-95f3-b42e994cb670', 'deduction', 1, -1, NULL, '2024-12-13 11:23:35', NULL, 'active'),
('cb3517e4-b944-11ef-971e-f1693ceffb1e', NULL, 'a5af4961-a115-11ef-95f3-b42e994cb670', 'deduction', 5, -5, NULL, '2024-12-13 11:24:18', NULL, 'active'),
('e9a5e3ba-b945-11ef-971e-f1693ceffb1e', 'b4f3dfc4-b4c1-11ef-942d-d5f755c4d6e3', 'ae6b188a-b943-11ef-971e-f1693ceffb1e', 'addition', 15, 15, 'Nhập máy', '2024-12-13 11:32:19', '2024-12-13 11:32:45', 'deleted'),
('f9589366-b945-11ef-971e-f1693ceffb1e', 'b4f3dfc4-b4c1-11ef-942d-d5f755c4d6e3', 'ae6b188a-b943-11ef-971e-f1693ceffb1e', 'deduction', 1, 14, 'Hỏng 1 máy', '2024-12-13 11:32:45', NULL, 'active');

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
('41b949f8-b945-11ef-971e-f1693ceffb1e', '364a0832-b945-11ef-971e-f1693ceffb1e', 'b4f3dfc4-b4c1-11ef-942d-d5f755c4d6e3', 'f1696fd4-b24d-11ef-9657-b42e994cb670', '70/120', NULL, '98', '65', '145', '35', 'Bình thường', '2024-12-13 11:27:37', NULL, 'active'),
('8f13ccf6-b944-11ef-971e-f1693ceffb1e', '76b99b2c-b944-11ef-971e-f1693ceffb1e', 'b181a736-b24b-11ef-9657-b42e994cb670', 'f1696fd4-b24d-11ef-9657-b42e994cb670', '65/120', NULL, '99', '65', '145', '35', 'Bình thường', '2024-12-13 11:22:38', '2024-12-13 11:26:20', 'completed'),
('c038ad10-b944-11ef-971e-f1693ceffb1e', '76b99b2c-b944-11ef-971e-f1693ceffb1e', 'b181a736-b24b-11ef-9657-b42e994cb670', 'f1696fd4-b24d-11ef-9657-b42e994cb670', '65/130', NULL, '98', '65', '145', '35', 'Nặng hơn rồi', '2024-12-13 11:24:00', '2024-12-13 11:26:20', 'completed');

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
('364a0832-b945-11ef-971e-f1693ceffb1e', 'f1696fd4-b24d-11ef-9657-b42e994cb670', 'b4f3dfc4-b4c1-11ef-942d-d5f755c4d6e3', '63115701-a115-11ef-95f3-b42e994cb670', 0, 'Bình thường', '2024-12-13T11:27:18+00:00', NULL, '2024-12-13 11:27:18', '2024-12-13 11:27:37', 'active'),
('76b99b2c-b944-11ef-971e-f1693ceffb1e', 'f1696fd4-b24d-11ef-9657-b42e994cb670', 'b181a736-b24b-11ef-9657-b42e994cb670', '63115701-a115-11ef-95f3-b42e994cb670', 1, 'Nặng hơn rồi', '2024-12-13T11:21:57+00:00', '2024-12-13T11:26:20+00:00', '2024-12-13 11:21:57', '2024-12-13 11:26:20', 'completed');

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
('138c505c-b945-11ef-971e-f1693ceffb1e', 'patient-log', NULL, '76b99b2c-b944-11ef-971e-f1693ceffb1e', 925000, 'Thanh toán viện phí ngày 13/12/2024', 'pending', NULL, '2024-12-13 11:26:20', NULL),
('55461736-b944-11ef-971e-f1693ceffb1e', 'appointment', '5541f0fc-b944-11ef-971e-f1693ceffb1e', NULL, 300000, 'Thanh toán đặt hẹn ngày 20/12/2024', 'completed', '14742387', '2024-12-13 11:21:01', '2024-12-13 11:30:33');

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
('b125473e-b944-11ef-971e-f1693ceffb1e', '8f13ccf6-b944-11ef-971e-f1693ceffb1e', 'a5af4d7d-a115-11ef-95f3-b42e994cb670', 1, 25000, 'Uống ngày 2 viên', '2024-12-13 11:23:35', 'completed'),
('b125ef04-b944-11ef-971e-f1693ceffb1e', '8f13ccf6-b944-11ef-971e-f1693ceffb1e', 'a5af5ed8-a115-11ef-95f3-b42e994cb670', 1, 20000, 'Uống ngày 4 viên', '2024-12-13 11:23:35', 'completed'),
('cb34dc8e-b944-11ef-971e-f1693ceffb1e', 'c038ad10-b944-11ef-971e-f1693ceffb1e', 'a5af4961-a115-11ef-95f3-b42e994cb670', 5, 12000, 'Uống ngày 5 viên', '2024-12-13 11:24:18', 'completed');

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
('2b4e932c-b944-11ef-971e-f1693ceffb1e', 'b181a736-b24b-11ef-9657-b42e994cb670', '2024-12-20T01:20:00.000Z', '2024-12-20T13:20:00.000Z', '', '2024-12-13 11:19:50', '2024-12-13 11:20:21', 'deleted'),
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
('c3b415a4-b63f-11ef-a2f8-768847cb2450', '5c950e93-ac16-11ef-982c-b42e994cb670', '2024-12-10T01:10:00.000Z', '2024-12-10T12:10:00.000Z', '', '2024-12-09 15:10:45', NULL, 'active'),
('c3b48a16-b63f-11ef-a2f8-768847cb2450', '5c950e93-ac16-11ef-982c-b42e994cb670', '2024-12-11T00:10:00.000Z', '2024-12-11T12:10:00.000Z', '', '2024-12-09 15:10:45', NULL, 'active');

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
