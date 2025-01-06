-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2025 lúc 02:44 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproduct`
--

CREATE TABLE `adproduct` (
  `Ma_loaisp` varchar(50) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `Ten_loaisp` varchar(50) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `giaxuat` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `khuyenmai` int(11) NOT NULL,
  `Mota_loaisp` text NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adproduct`
--

INSERT INTO `adproduct` (`Ma_loaisp`, `ma_sp`, `Ten_loaisp`, `hinhanh`, `gianhap`, `giaxuat`, `soluong`, `khuyenmai`, `Mota_loaisp`, `create_date`) VALUES
('MN', 'MN04', 'Combo mặt nạ bùn', 'Lrp-Sebo-Controlling-Mask-5.jpg', 20000, 35000, 100, 5, 'giảm mụn', '2024-11-27'),
('MN', 'MN05', 'mặt nạ 05', 'mat-na-bun.jpg', 20000, 40000, 10, 5, 'dưỡng da chuyên sâu', '2024-11-27'),
('MN', 'MN06', 'mặt nạ 06', '8ced7353752793ccf8e2a2b7d25cb795.jpg', 20000, 45000, 50, 5, 'cấp ẩm', '2024-11-28'),
('SD', 'SD08', 'son dưỡng 08', '1690965742019-32.jpeg', 200000, 1000000, 70, 50, 'dưỡng môi mềm mịn', '2024-11-28'),
('SD', 'SD09', 'son dưỡng 09', 'download__3__357cebeec6c549418f51bee801a7ecc8_1024x1024.webp', 200000, 1500000, 100, 50, 'căng bóng', '2024-11-28'),
('SR', 'SR01', 'serum 01', 'serum.jpg', 100000, 1200000, 20, 10, 'sáng da', '2024-12-01'),
('SR', 'SR02', 'serum 02', 'effaclar_serum_609a9d9c4cda4b79a7a477844bdf4e74_1024x1024_9fba5e5bc1324ce58d4e50dae162855b.webp', 100000, 1200000, 50, 20, 'sáng da ngừa mụn', '2024-11-28'),
('SR', 'SR03', 'serum 03', 'serum-la-roche-posay-cicaplast-b5-30ml-3.jpg', 100000, 1200000, 100, 10, 'trị mụn giảm viêm', '2024-12-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproducttype`
--

CREATE TABLE `adproducttype` (
  `Ma_loaisp` varchar(50) NOT NULL,
  `Ten_loaisp` varchar(50) NOT NULL,
  `Mota_loaisp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `adproducttype`
--

INSERT INTO `adproducttype` (`Ma_loaisp`, `Ten_loaisp`, `Mota_loaisp`) VALUES
('MN', 'mặt nạ', 'làm sáng'),
('MN1', 'mặt nạ', '123123'),
('SD', 'son dưỡng ', 'son dưỡng'),
('SR', 'serum', 'sáng da');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `id` int(11) NOT NULL,
  `mahd` varchar(10) DEFAULT NULL,
  `makh` varchar(10) DEFAULT NULL,
  `tenkhachhang` varchar(100) DEFAULT NULL,
  `danh_gia` text DEFAULT NULL,
  `sao` int(11) DEFAULT NULL,
  `ngay_danh_gia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgiasanpham`
--

INSERT INTO `danhgiasanpham` (`id`, `mahd`, `makh`, `tenkhachhang`, `danh_gia`, `sao`, `ngay_danh_gia`) VALUES
(8, 'HD88973', NULL, 'khanh', 'ok', 5, '2024-12-01 12:08:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhkithanhvien`
--

CREATE TABLE `danhkithanhvien` (
  `FullName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DienThoai` varchar(11) NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `QuocTich` varchar(20) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `HinhAnh` varchar(100) NOT NULL,
  `SoThich` varchar(200) NOT NULL,
  `Level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhkithanhvien`
--

INSERT INTO `danhkithanhvien` (`FullName`, `UserName`, `PassWord`, `Email`, `DienThoai`, `GioiTinh`, `QuocTich`, `DiaChi`, `HinhAnh`, `SoThich`, `Level`) VALUES
('khanh', 'khanh', '123', '123@gmail.com', '123456789', 'Nam', 'VN', 'HN', 'Screenshot 2024-09-10 072326.png', 'game', 'quantri'),
('khanh1', 'khanh1', '123', '123@gmail.com', '123456789', 'Nam', 'VN', 'HN', 'Screenshot 2024-09-10 072326.png', 'game', 'nguoidung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discountcodes`
--

CREATE TABLE `discountcodes` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount_percentage` float NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discountcodes`
--

INSERT INTO `discountcodes` (`id`, `code`, `discount_percentage`, `start_date`, `end_date`, `created_at`) VALUES
(2, '97E4EBDAEA', 5, '2024-12-08', '2024-12-11', '2024-12-09 08:42:10'),
(3, '80F97F9E3A', 20, '2024-12-07', '2024-12-12', '2024-12-09 08:43:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gopy`
--

CREATE TABLE `gopy` (
  `id` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `ngaygopy` date NOT NULL,
  `noi_dung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gopy`
--

INSERT INTO `gopy` (`id`, `tenkh`, `email`, `phone`, `ngaygopy`, `noi_dung`) VALUES
(9, '123', '123@gmail.con', '123', '2024-12-10', '123'),
(10, '123', '123@gmail.con', '123', '2024-12-10', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `tenKM` varchar(255) NOT NULL,
  `moTa` text DEFAULT NULL,
  `giamGia` decimal(5,2) NOT NULL,
  `ngayBD` date NOT NULL,
  `ngayKT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `tenKM`, `moTa`, `giamGia`, `ngayBD`, `ngayKT`) VALUES
(16, 'black friday', 'giảm giá', 5.00, '2024-12-01', '2024-12-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsumuahang`
--

CREATE TABLE `lichsumuahang` (
  `mahd` varchar(10) NOT NULL,
  `makh` varchar(10) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `diachilh` varchar(200) NOT NULL,
  `diachigh` varchar(200) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsumuahang`
--

INSERT INTO `lichsumuahang` (`mahd`, `makh`, `tenkh`, `phone`, `diachilh`, `diachigh`, `tongtien`, `create_date`, `trangthai`) VALUES
('HD81144', 'KH16224', '213', '123', '234', '234', 1156000, '2024-11-01', 'Đã thanh toán'),
('HD67812', 'KH20329', '123123', '123', '123', '123', 5000000, '2024-12-10', 'Đã thanh toán'),
('HD26763', 'KH28547', '234', '234', '234', '234', 4732579, '2024-12-10', 'Đã thanh toán'),
('HD72411', 'KH29548', 'khánh', '123456789', 'asd', 'asd', 166250, '2024-11-02', 'Đã thanh toán'),
('HD51899', 'KH34120', '123', '123', '123123123123', '123', 17010261, '2024-12-10', 'Đã thanh toán'),
('HD29237', 'KH44290', '123', '123', '123', '123', 11553045, '2024-12-10', 'Đã thanh toán'),
('HD87651', 'KH65842', '123', '123', '123', '123', 244361, '2024-12-10', 'Đã thanh toán'),
('HD88973', 'KH69769', 'Khánh2', '123456789', 'HN', 'HN', 42750, '2024-02-01', 'Đã thanh toán'),
('HD50642', 'KH77659', '123', '123', '123', '123', 3704349, '2024-12-09', 'Đã thanh toán'),
('HD30400', 'KH81895', 'qưeqwe', '12423536', 'qưeqwe', 'ửat', 166250, '2024-12-09', 'Đã thanh toán'),
('HD58704', 'KH83214', '123', '123', '123', '123', 576000, '2024-12-09', 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(255) NOT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `SoDienThoai` varchar(15) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `NguoiLienHe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oderdetail`
--

CREATE TABLE `oderdetail` (
  `mahd` varchar(10) NOT NULL,
  `masp` varchar(10) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giaxuat` int(11) NOT NULL,
  `khuyenmai` int(3) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `oderdetail`
--

INSERT INTO `oderdetail` (`mahd`, `masp`, `tensp`, `soluong`, `giaxuat`, `khuyenmai`, `hinhanh`, `thanhtien`) VALUES
('HD58704', 'MN04', 'Combo mặt nạ bùn', 1, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 33250),
('HD58704', 'MN06', 'mặt nạ 06', 1, 45000, 5, '8ced7353752793ccf8e2a2b7d25cb795.jpg', 42750),
('HD58704', 'SD08', 'son dưỡng 08', 1, 1000000, 50, '1690965742019-32.jpeg', 500000),
('HD81144', 'MN04', 'Combo mặt nạ bùn', 1, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 33250),
('HD81144', 'MN06', 'mặt nạ 06', 1, 45000, 5, '8ced7353752793ccf8e2a2b7d25cb795.jpg', 42750),
('HD81144', 'SR03', 'serum 03', 1, 1200000, 10, 'serum-la-roche-posay-cicaplast-b5-30ml-3.jpg', 1080000),
('HD45600', 'MN04', 'Combo mặt nạ bùn', 5, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 166250),
('HD23240', 'MN04', 'Combo mặt nạ bùn', 5, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 166250),
('HD66269', 'MN04', 'Combo mặt nạ bùn', 5, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 166250),
('HD20814', 'MN04', 'Combo mặt nạ bùn', 5, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 166250),
('HD30400', 'MN04', 'Combo mặt nạ bùn', 5, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 166250),
('HD72411', 'MN04', 'Combo mặt nạ bùn', 5, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 166250),
('HD88973', 'MN06', 'mặt nạ 06', 1, 45000, 5, '8ced7353752793ccf8e2a2b7d25cb795.jpg', 42750),
('HD50642', '123', '123', 23, 123, 123, '1690965742019-32.jpeg', -651),
('HD50642', 'MN04', 'Combo mặt nạ bùn', 100, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 3325000),
('HD50642', 'MN05', 'mặt nạ 05', 10, 40000, 5, 'mat-na-bun.jpg', 380000),
('HD87651', '234', '234', 1, 222222, 5, 'serum.jpg', 211111),
('HD87651', 'MN04', 'Combo mặt nạ bùn', 1, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 33250),
('HD52928', '234', '234', 21, 222222, 5, 'serum.jpg', 4433329),
('HD52928', 'MN04', 'Combo mặt nạ bùn', 100, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 3325000),
('HD26763', '234', '234', 21, 222222, 5, 'serum.jpg', 4433329),
('HD26763', 'MN04', 'Combo mặt nạ bùn', 9, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 299250),
('HD51899', '234', '234', 79, 222222, 5, 'serum.jpg', 16677761),
('HD51899', 'MN04', 'Combo mặt nạ bùn', 10, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 332500),
('HD67812', 'SD08', 'son dưỡng 08', 10, 1000000, 50, '1690965742019-32.jpeg', 5000000),
('HD29237', '234', '234', 50, 222222, 5, 'serum.jpg', 10555545),
('HD29237', 'MN04', 'Combo mặt nạ bùn', 30, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 997500),
('HD76950', 'MN04', 'Combo mặt nạ bùn', 1, 35000, 5, 'Lrp-Sebo-Controlling-Mask-5.jpg', 33250);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `mahd` varchar(10) NOT NULL,
  `makh` varchar(10) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `diachilh` varchar(200) NOT NULL,
  `diachigh` varchar(200) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`mahd`, `makh`, `tenkh`, `phone`, `diachilh`, `diachigh`, `tongtien`, `create_date`, `trangthai`) VALUES
('HD76950', 'KH26818', '123', '123', '123', '123', 33250, '2024-12-10', 'Đang chờ xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `matintuc` varchar(50) NOT NULL,
  `tieude` varchar(50) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `noidung` text NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`matintuc`, `tieude`, `hinhanh`, `noidung`, `create_date`) VALUES
('456', 'BLACKFRIDAY', 'Lrp-Sebo-Controlling-Mask-5.jpg', 'giá siêu hời deal rẻ đã đời', '2024-12-10'),
('789', 'Tri ân khách hàng mới', 'mat-na-bun.jpg', 'giảm giá lên đến 50% cho khách hàng với giá trị đơn hàng trên 2.0000.000', '2024-12-09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `adproduct`
--
ALTER TABLE `adproduct`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `adproducttype`
--
ALTER TABLE `adproducttype`
  ADD PRIMARY KEY (`Ma_loaisp`);

--
-- Chỉ mục cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhkithanhvien`
--
ALTER TABLE `danhkithanhvien`
  ADD PRIMARY KEY (`UserName`);

--
-- Chỉ mục cho bảng `discountcodes`
--
ALTER TABLE `discountcodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsumuahang`
--
ALTER TABLE `lichsumuahang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`matintuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `discountcodes`
--
ALTER TABLE `discountcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `gopy`
--
ALTER TABLE `gopy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
