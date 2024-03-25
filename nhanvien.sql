-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2024 at 01:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_nhansu`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Ma_NV` varchar(3) NOT NULL,
  `Ten_NV` varchar(100) NOT NULL,
  `Phai` varchar(3) DEFAULT NULL,
  `Noi_Sinh` varchar(200) DEFAULT NULL,
  `Ma_Phong` varchar(2) DEFAULT NULL,
  `Luong` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`Ma_NV`, `Ten_NV`, `Phai`, `Noi_Sinh`, `Ma_Phong`, `Luong`) VALUES
('A01', 'Nguyễn Thị Hải', 'NU', 'Hà Nội', 'TC', 600),
('A02', 'Trần Văn Chính', 'NAM', 'Bình Định', 'QT', 500),
('A03', 'Lê Trần Bạch Yến', 'NU', 'TP HCM', 'TC', 700),
('A04', 'Trần Anh Tuấn', 'NAM', 'Hà Nội', 'KT', 800),
('B01', 'Trần Thanh Mai', 'NU', 'Hải Phòng', 'TC', 800),
('B02', 'Trần Thị Thu Thủy', 'NU', 'TP HCM', 'KT', 700),
('B03', 'Nguyễn Thị Nở', 'NU', 'Ninh Bình', 'KT', 400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Ma_NV`),
  ADD KEY `Ma_Phong` (`Ma_Phong`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`Ma_Phong`) REFERENCES `phongban` (`Ma_Phong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
