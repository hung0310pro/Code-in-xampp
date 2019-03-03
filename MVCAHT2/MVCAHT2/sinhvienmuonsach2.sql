-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2019 lúc 06:33 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sinhvienmuonsach2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_sach`
--

CREATE TABLE `tb_sach` (
  `id` int(10) UNSIGNED NOT NULL,
  `namebook` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `p_year` varchar(255) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_sach`
--

INSERT INTO `tb_sach` (`id`, `namebook`, `author`, `p_year`) VALUES
(7, 'Cơ lý thuyết', 'Trịnh Long', '2010'),
(9, 'Xác xuất 2', 'Đặng Hùng Thắng', '2009'),
(10, 'PT đạo hàm riêng', 'Đặng Hùng Thắng', '2010');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_sinhvien`
--

CREATE TABLE `tb_sinhvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `class` varchar(255) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_sinhvien`
--

INSERT INTO `tb_sinhvien` (`id`, `name`, `birthday`, `age`, `class`) VALUES
(34, 'Lê Hùng', '2019-02-01', 22, 'A1C'),
(35, 'Thành Hoan', '2019-02-15', 22, 'A'),
(36, 'Văn Tuấn', '2019-02-16', 22, 'ACCC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_themuon`
--

CREATE TABLE `tb_themuon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sinhvien` int(11) UNSIGNED ZEROFILL NOT NULL,
  `borrow_date` date NOT NULL,
  `pay_date` date NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_themuon`
--

INSERT INTO `tb_themuon` (`id`, `id_sinhvien`, `borrow_date`, `pay_date`, `state`) VALUES
(24, 00000000034, '2019-02-08', '2019-02-23', 2),
(25, 00000000035, '2019-02-21', '2019-02-28', 1),
(26, 00000000034, '2019-02-09', '2019-02-15', 2),
(27, 00000000034, '2019-02-08', '2019-02-28', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_trunggian`
--

CREATE TABLE `tb_trunggian` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `id_the` int(11) UNSIGNED ZEROFILL NOT NULL,
  `id_sach` int(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_trunggian`
--

INSERT INTO `tb_trunggian` (`id`, `id_the`, `id_sach`) VALUES
(00000000019, 00000000024, 00000000009),
(00000000020, 00000000024, 00000000010),
(00000000021, 00000000025, 00000000007),
(00000000022, 00000000025, 00000000009),
(00000000023, 00000000025, 00000000010),
(00000000024, 00000000026, 00000000009),
(00000000025, 00000000026, 00000000010),
(00000000026, 00000000027, 00000000007),
(00000000027, 00000000027, 00000000009);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_sach`
--
ALTER TABLE `tb_sach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_sinhvien`
--
ALTER TABLE `tb_sinhvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_themuon`
--
ALTER TABLE `tb_themuon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dfs` (`id_sinhvien`);

--
-- Chỉ mục cho bảng `tb_trunggian`
--
ALTER TABLE `tb_trunggian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bbb` (`id_the`),
  ADD KEY `ccc` (`id_sach`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_sach`
--
ALTER TABLE `tb_sach`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tb_sinhvien`
--
ALTER TABLE `tb_sinhvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tb_themuon`
--
ALTER TABLE `tb_themuon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tb_trunggian`
--
ALTER TABLE `tb_trunggian`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_themuon`
--
ALTER TABLE `tb_themuon`
  ADD CONSTRAINT `dfs` FOREIGN KEY (`id_sinhvien`) REFERENCES `tb_sinhvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tb_trunggian`
--
ALTER TABLE `tb_trunggian`
  ADD CONSTRAINT `bbb` FOREIGN KEY (`id_the`) REFERENCES `tb_themuon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ccc` FOREIGN KEY (`id_sach`) REFERENCES `tb_sach` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
