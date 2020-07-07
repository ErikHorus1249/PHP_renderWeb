-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 07, 2020 lúc 05:31 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlns1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `adminLevel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `adminLevel`) VALUES
(1, 'erik', 'hi.@gmail.com', 'hi', '1249', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_luong`
--

CREATE TABLE `tbl_luong` (
  `salId` int(11) NOT NULL,
  `salDescription` tinytext NOT NULL,
  `salValue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_luong`
--

INSERT INTO `tbl_luong` (`salId`, `salDescription`, `salValue`) VALUES
(1, 'Bậc 1', 3000000),
(2, 'Bậc 2', 4000000),
(3, 'Bậc 3', 4500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhanvien`
--

CREATE TABLE `tbl_nhanvien` (
  `nvId` int(11) NOT NULL,
  `nvName` varchar(255) NOT NULL,
  `nvAge` date NOT NULL,
  `nvYears` date NOT NULL,
  `nvPosition` varchar(255) NOT NULL,
  `nvZoomId` int(11) NOT NULL,
  `nvSalaryId` int(11) NOT NULL,
  `nvEmail` varchar(150) NOT NULL,
  `nvPhone` varchar(150) NOT NULL,
  `nvIndexId` int(11) NOT NULL,
  `nvImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phong`
--

CREATE TABLE `tbl_phong` (
  `zoomId` int(11) NOT NULL,
  `zoomName` varchar(255) NOT NULL,
  `zoomDescription` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_phong`
--

INSERT INTO `tbl_phong` (`zoomId`, `zoomName`, `zoomDescription`) VALUES
(3, 'xin chap', '1'),
(5, 'Công nghệ thông tin 3', 'no2'),
(7, 'Lao công', 'hahsha');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_position`
--

CREATE TABLE `tbl_position` (
  `positionId` int(11) NOT NULL,
  `positionName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_position`
--

INSERT INTO `tbl_position` (`positionId`, `positionName`) VALUES
(1, 'Tạp vụ'),
(2, 'Giảng viên bậc 1'),
(3, 'Giảng viên bâc 2');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_luong`
--
ALTER TABLE `tbl_luong`
  ADD PRIMARY KEY (`salId`);

--
-- Chỉ mục cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD PRIMARY KEY (`nvId`);

--
-- Chỉ mục cho bảng `tbl_phong`
--
ALTER TABLE `tbl_phong`
  ADD PRIMARY KEY (`zoomId`);

--
-- Chỉ mục cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`positionId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_luong`
--
ALTER TABLE `tbl_luong`
  MODIFY `salId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `nvId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_phong`
--
ALTER TABLE `tbl_phong`
  MODIFY `zoomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `positionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
