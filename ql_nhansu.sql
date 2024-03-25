-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2024 at 03:19 AM
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
('A01', 'Nguyễn thị Hải', 'NU', 'Hà Nội', 'TC', 600),
('A02', 'Trần Văn Chính Mươi', 'NAM', 'Bình Định', 'QT', 500),
('A03', 'Lê Trần Bạch Yến', 'NU', 'TP HCM', 'TC', 700),
('A04', 'Trần Anh Tuấn', 'NAM', 'Hà Nội', 'KT', 800),
('A05', 'Nguyễn thị Hải', 'NU', 'Hà Nội', 'TC', 600),
('A06', 'Trần văn Chính', 'NAM', 'Bình Định', 'QT', 500),
('A07', 'Lê Trần bạch Yến', 'NU', 'TP HCM', 'TC', 700),
('A08', 'Trần anh Tuấn', 'NAM', 'Hà Nội', 'KT', 800),
('A11', 'Nguyễn thị Hải', 'NU', 'Hà Nội', 'TC', 600),
('B01', 'Trần Thanh Mai', 'NU', 'Hải Phòng', 'TC', 800),
('B02', 'Trần Thị Thu Thủy', 'NU', 'TP HCM', 'KT', 700),
('B03', 'Nguyễn Thị Nở', 'NU', 'Ninh Bình', 'KT', 400),
('B04', 'Trần thanh Mai', 'NU', 'Hải Phòng', 'TC', 800),
('B05', 'Trần thị thu Thủy', 'NU', 'TP HCM', 'KT', 700),
('B06', 'Nguyễn Thị Nở', 'NU', 'Ninh Bình', 'KT', 400),
('B11', 'Trần thanh Mai', 'NU', 'Hải Phòng', 'TC', 800),
('B12', 'Trần thị thu Thủy', 'NU', 'TP HCM', 'KT', 700),
('B13', 'Nguyễn Thị Nở', 'NU', 'Ninh Bình', 'KT', 400),
('C05', 'Nguyễn thị Hải', 'NU', 'Hà Nội', 'TC', 600),
('C06', 'Trần văn Chính', 'NAM', 'Bình Định', 'QT', 500),
('C07', 'Lê Trần bạch Yến', 'NU', 'TP HCM', 'TC', 700),
('C08', 'Trần anh Tuấn', 'NAM', 'Hà Nội', 'KT', 800),
('D04', 'Trần thanh Mai', 'NU', 'Hải Phòng', 'TC', 800),
('D05', 'Trần thị thu Thủy', 'NU', 'TP HCM', 'KT', 700),
('D06', 'Nguyễn Thị Nở', 'NU', 'Ninh Bình', 'KT', 400),
('qq1', 'jkjkasdjkjkas', 'sk', 'akjfnak', 'TC', 2929);

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `Ma_Phong` varchar(2) NOT NULL,
  `Ten_Phong` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`Ma_Phong`, `Ten_Phong`) VALUES
('KT', 'Kỹ Thuật'),
('QT', 'Quản trị'),
('TC', 'Tài chính');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `username`, `password`, `fullname`, `email`, `role`) VALUES
(1, 'admin', '123', 'Admin User', 'admin@example.com', 'admin'),
(2, 'user', '111', 'Regular User 1', 'user1@example.com', 'user'),
(3, 'user2', 'user456', 'Regular User 2', 'user2@example.com', 'user');

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
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`Ma_Phong`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
