-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 18, 2023 lúc 06:47 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chuyenbay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyen_bay`
--

CREATE TABLE `chuyen_bay` (
  `ma_chuyen_bay` int(11) NOT NULL,
  `so_hieu_chuyen_bay` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tp_khoi_hanh` int(11) NOT NULL,
  `ngay_khoi_hanh` date NOT NULL,
  `ma_tp_den` int(11) NOT NULL,
  `ngay_den` date NOT NULL,
  `gia_ve` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyen_bay`
--

INSERT INTO `chuyen_bay` (`ma_chuyen_bay`, `so_hieu_chuyen_bay`, `ma_tp_khoi_hanh`, `ngay_khoi_hanh`, `ma_tp_den`, `ngay_den`, `gia_ve`) VALUES
(1, 'AB1032', 26, '2023-10-11', 22, '2023-10-12', 200000),
(2, 'AC1032', 26, '2023-10-11', 22, '2023-10-12', 200000),
(3, 'AB1034', 26, '2023-10-11', 22, '2023-10-12', 200000),
(4, 'AB1035', 26, '2023-10-11', 22, '2023-10-12', 200000),
(5, 'ATEST02', 21, '2023-10-10', 26, '2023-10-11', 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quoc_gia`
--

CREATE TABLE `quoc_gia` (
  `Ma_quoc_gia` int(11) NOT NULL,
  `Ten_quoc_gia` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quoc_gia`
--

INSERT INTO `quoc_gia` (`Ma_quoc_gia`, `Ten_quoc_gia`) VALUES
(7, 'VN'),
(8, 'USA'),
(9, 'CANADA'),
(10, 'FRANCE');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanh_pho`
--

CREATE TABLE `thanh_pho` (
  `Ma_thanh_pho` int(11) NOT NULL,
  `Ten_thanh_pho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten_bang_tinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Quoc_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanh_pho`
--

INSERT INTO `thanh_pho` (`Ma_thanh_pho`, `Ten_thanh_pho`, `Ten_bang_tinh`, `Quoc_gia`) VALUES
(21, 'Test', 'Test', 7),
(22, 'Test', 'Test', 8),
(23, 'Test', 'Test', 9),
(24, 'Test', 'Test', 9),
(25, 'Test', 'Test', 9),
(26, 'Nha Trang', 'Khanh Hoa', 7);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuyen_bay`
--
ALTER TABLE `chuyen_bay`
  ADD PRIMARY KEY (`ma_chuyen_bay`),
  ADD KEY `ma_tp_khoi_hanh` (`ma_tp_khoi_hanh`),
  ADD KEY `ma_tp_den` (`ma_tp_den`);

--
-- Chỉ mục cho bảng `quoc_gia`
--
ALTER TABLE `quoc_gia`
  ADD PRIMARY KEY (`Ma_quoc_gia`);

--
-- Chỉ mục cho bảng `thanh_pho`
--
ALTER TABLE `thanh_pho`
  ADD PRIMARY KEY (`Ma_thanh_pho`),
  ADD KEY `Quoc_gia` (`Quoc_gia`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuyen_bay`
--
ALTER TABLE `chuyen_bay`
  MODIFY `ma_chuyen_bay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quoc_gia`
--
ALTER TABLE `quoc_gia`
  MODIFY `Ma_quoc_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `thanh_pho`
--
ALTER TABLE `thanh_pho`
  MODIFY `Ma_thanh_pho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chuyen_bay`
--
ALTER TABLE `chuyen_bay`
  ADD CONSTRAINT `chuyen_bay_ibfk_1` FOREIGN KEY (`ma_tp_khoi_hanh`) REFERENCES `thanh_pho` (`Ma_thanh_pho`),
  ADD CONSTRAINT `chuyen_bay_ibfk_2` FOREIGN KEY (`ma_tp_den`) REFERENCES `thanh_pho` (`Ma_thanh_pho`);

--
-- Các ràng buộc cho bảng `thanh_pho`
--
ALTER TABLE `thanh_pho`
  ADD CONSTRAINT `thanh_pho_ibfk_1` FOREIGN KEY (`Quoc_gia`) REFERENCES `quoc_gia` (`Ma_quoc_gia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
