-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 06:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mccomputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(2) NOT NULL DEFAULT 1,
  `age` datetime NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(2) NOT NULL DEFAULT 0,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `fullname`, `phone`, `gender`, `age`, `address`, `avatar`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'minhchinh', '10111998', 'leminhchinh1011@gmail.com', 'Lê Minh Chính', '03277752522', 1, '1998-11-10 00:00:00', 'Nam Định', 'edu.jpg', 1, 1, '2019-09-19 23:15:50', NULL),
(2, 'myadmin', '123456', 'myadmin@gmail.com', 'Lê Minh Chính', '03277752522', 1, '1998-11-10 00:00:00', 'Nam Định', 'edu.jpg', 1, 1, '2019-09-19 23:15:50', NULL),
(3, 'chinh123', '123456', 'chinh123@gmail.com', 'Lê Minh Chính', '03277752522', 1, '1998-11-10 00:00:00', 'Nam Định', 'edu.jpg', 0, 1, '2019-09-23 21:09:02', NULL),
(4, 'lmc', 'abc123', 'lmc@gmail.com', 'Lê Minh Chính', '03277752522', 1, '1998-11-10 00:00:00', 'Nam Định', 'edu.jpg', 1, 1, '2019-09-23 21:09:02', NULL),
(13, 'Nhannhan', '18081998', 'ltn1808@gmail.com', 'Le Nhàn', '0364805278', 1, '1998-08-18 00:00:00', 'Nam Định', 'edu.jpg', 1, 1, '2019-10-22 17:02:04', NULL),
(14, 'MinhChinh', '10111998', 'stormshadow1110@gmail.com', 'Lê Minh Chính', '0327775252', 1, '1998-11-10 00:00:00', 'Xuân Tân-Xuân Trường-Nam Định', 'edu.jpg', 1, 1, '2019-10-22 17:03:29', NULL),
(15, 'MinhChinh', '10111998', 'chinh@gmail.com', 'Lê Minh Chính', '0327775252', 1, '1998-11-10 00:00:00', 'Xuân Tân-Xuân Trường-Nam Định', 'edu.jpg', 1, 1, '2019-10-22 17:08:48', NULL),
(16, 'MinhChinh', 'c4f65172fc5ef01635666737ac668956', 'chinh1998@gmail.com', 'Lê Minh Chính', '0364805278', 1, '1998-11-10 00:00:00', 'Nam Định', 'edu.jpg', 1, 1, '2019-10-24 08:22:32', NULL),
(17, 'Minh Chính', '67879666bad1d87475e509f428be3dd5', 'chinh123@gmail.com', 'Lê Minh Chính', '0364805278', 1, '1998-11-10 00:00:00', 'Nam Định', NULL, 0, 1, '2019-11-06 13:26:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cart` int(10) UNSIGNED NOT NULL,
  `id_detailproduct` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id`, `id_cart`, `id_detailproduct`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(23, 25, 1, 14267400, 1, '2019-11-07 15:16:23', '2019-11-07 15:16:23'),
(24, 25, 5, 10990000, 1, '2019-11-07 15:16:23', '2019-11-07 15:16:23'),
(25, 25, 8, 15990000, 1, '2019-11-07 15:16:23', '2019-11-07 15:16:23'),
(26, 26, 1, 14267400, 1, '2019-11-07 15:30:01', '2019-11-07 15:30:01'),
(27, 26, 26, 14715500, 2, '2019-11-07 15:30:01', '2019-11-07 15:30:01'),
(28, 27, 22, 11970000, 1, '2019-11-07 16:14:35', '2019-11-07 16:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `detail_product`
--

CREATE TABLE `detail_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_specification` int(11) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_product`
--

INSERT INTO `detail_product` (`id`, `id_product`, `id_specification`, `description`, `quantity`) VALUES
(1, 1, 22, '4Gb /Intel Core i5 /Black /Window', 29),
(2, 2, 2, '8Gb /Intel Core i3 /Grey /Window', 100),
(3, 3, 3, '4Gb /Intel Core i3 /Gold /Window', 100),
(4, 4, 4, '4Gb /Intel Core i5 /Red /Window', 100),
(5, 5, 5, '4Gb /Intel Core i5 /Grey /Window', 99),
(6, 6, 6, '4Gb /Intel Core i5 /Gold /Window', 100),
(7, 7, 7, '8Gb /Intel Core i5 /Red /Window', 100),
(8, 8, 8, '8Gb /Intel Core i5 /Grey /Window', 98),
(9, 9, 9, '8Gb /Intel Core i5 /Gold /Window', 100),
(10, 10, 10, '4Gb /Intel Core i7 /Red /Window', 100),
(11, 11, 11, '4Gb /Intel Core i7 /Grey /Window', 100),
(12, 12, 12, '4Gb /Intel Core i5 /Gold /Window', 100),
(13, 13, 13, '8Gb /Intel Core i5 /Red /Window', 100),
(14, 14, 14, '8Gb /Intel Core i5 /Grey /Window', 20),
(15, 15, 16, '8Gb /Intel Core i5 /Gold /Window', 100),
(16, 16, 17, '4Gb /Intel Core i5 /Grey /IOS', 100),
(17, 17, 12, '4Gb /Intel Core i5 /Gold /Window', 100),
(18, 18, 8, '8Gb /Intel Core i5 /Grey /Window', 100),
(20, 20, 4, '4Gb /Intel Core i5 /Red /Window', 100),
(21, 21, 17, '4Gb /Intel Core i5 /Grey /IOS', 100),
(22, 23, 5, '4Gb /Intel Core i5 /Grey /Window ', 77),
(24, 24, 6, '4Gb /Intel Core i5 /Gold /Window', 60),
(26, 34, 6, '4GB /Intel Core i5/ Gold /Window', 64),
(31, 39, 8, '8GB /Intel Core i5/ Grey /Window', 83);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_acc` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `id_acc`, `id_product`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Good', '2019-09-24 00:00:00', NULL),
(3, 3, 3, 'Bad', '2019-09-24 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_cart`
--

CREATE TABLE `order_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_acc` int(10) UNSIGNED NOT NULL,
  `total` int(11) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` tinyint(2) NOT NULL DEFAULT 1,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_cart`
--

INSERT INTO `order_cart` (`id`, `id_acc`, `total`, `fullname`, `phone`, `email`, `address`, `payment`, `status`, `note`, `created_at`, `updated_at`) VALUES
(25, 17, 41247400, 'Lê Minh Chinh', 327775252, 'stormshadow1110@gmail.com', 'Nam Định', 1, 0, 'Cần giao hàng nhanh', '2019-11-07 15:16:23', '2019-11-07 15:16:23'),
(26, 16, 43698400, 'Lê Thị Nhàn', 364805278, 'lenhan1808@gmail.com', 'Nam Định', 1, 0, 'Đồ dễ vỡ', '2019-11-07 15:30:01', '2019-11-07 15:30:01'),
(27, 16, 11970000, 'Minh Chính', 989546365, 'stormshadow1110@gmail.com', 'Hà Nội', 1, 0, NULL, '2019-11-07 16:14:35', '2019-11-07 16:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_acc` int(10) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `count_view` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `id_acc`, `title`, `summary`, `avatar`, `content`, `status`, `count_view`, `created_at`, `updated_at`) VALUES
(1, 1, 'TOP 5 ULTRABOOK - CẤU HÌNH MẠNH MẼ, THIẾT KẾ ĐỒ HỌA ĐỈNH CAO', 'Để cho các bạn chuyên về thiết kế đồ họa có thêm được sự lựa chọn tốt nhất cho mình, và có thể dễ dàng hơn khi tìm mua một chiếc laptop mỏng nhẹ nhưng vẫn phục vụ được tốt công việc. Sau đây Phúc Anh xin đưa ra 5 mẫu ultrabook có cấu hình đủ mạnh để làm n', NULL, 'TOP 5: DELL VOSTRO 5481,TOP 4: MSI PS42 MODERN 8RA, TOP 3: ASUS GAMING', 1, 100, '2019-09-23 00:00:00', NULL),
(2, 1, 'NHỮNG TÍNH NĂNG MỚI CHỈ CÓ TRÊN HĐH WATCHOS 6.0', 'Theo như Apple đã công bố thì hệ điều hành WATCHOS 6.0 chạy trên những chiếc Apple Watch series 1,2,3,4 và mới nhất là chiếc Apple Watch series 5 của mình đã được Apple trình làng và tung ra bản cập nhật chính thức vào ngày 19/9/2019 vừa qua . Hôm nay mìn', NULL, 'Phiên bản cập nhật này có dung lượng khoảng 1.4 GB. Các bạn sẽ phải sử dụng wifi bắt trực tiếp vào điện thoại, điện thoại đã được kết nối với đồng hồ và đồng hồ phải được nằm trên củ sạc để tiến hành cài đặt, thời gian cài đặt khá lâu mất khoảng 3 đến 4 tiếng', 1, 500, '2019-09-23 00:00:00', NULL),
(3, 2, 'TRÊN TAY NHANH BÀN PHÍM CƠ EK3104 - HOÀN HẢO TRONG TẦM GIÁ', 'Với tiêu chí hàng đầu là sản xuất những sản phẩm Gaming Gear có giá thành rẻ nhưng chất lượng sử dụng đem lại vẫn rất tốt, hãng E-DRA sau sản phẩm bàn phím cơ EK387 đã được rất nhiều ưa chuộng đã tiếp tục cho ra mắt phiên bản EK3104 mới nhất với kiểu dáng', NULL, 'EK3104 như đã nhắc tới bên trên sẽ là phiên bản đầy đủ của chiếc EK387 (xem đánh giá về EK387 tại đây), nhìn chung về chất lượng build thì EK3014 vẫn rất chắc chắn, dày dặn, cảm giác cầm khá nặng, đầm rất thích', 1, 143, '2019-09-23 00:00:00', NULL),
(4, 2, 'MUA HP - THỎA ĐAM MÊ - NHẬN NGAY SSD', 'Nhằm gửi lời tri ân tới Quý khách hàng đã, đang và sẽ lựa chọn các sản phẩm laptop mang thương hiệu HP, Phúc Anh triển khai chương trình ưu đãi \"MUA HP - THỎA ĐAM MÊ - NHẬN NGAY SSD\" cho tất cả các khách hàng từ ngày 20/09 - 15/10/2019.', NULL, '1. Tên chương trình: “MUA HP - THỎA ĐAM MÊ - NHẬN NGAY SSD”.\r\n\r\n2. Thời gian khuyến mãi: Từ 20/09/2019 - 15/10/2019\r\n\r\n3. Phạm vi khuyến mãi: Tất cả các cơ sở của Phúc Anh\r\n\r\n4. Đối tượng khuyến mãi: Người tiêu dùng cuối cùng\r\n\r\n5. Nội dung khuyến mãi:', 1, 1234, '2019-09-23 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_typetrade` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `promo_price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `count_view` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_typetrade`, `name`, `price`, `percent`, `promo_price`, `image`, `status`, `count_view`, `created_at`, `updated_at`) VALUES
(1, 2, 'Laptop Dell Inspiron 3567S P63F002', 16590000, 8, 15262800, 'dellinsiron.png', 1, 0, '2019-10-24 00:00:00', '2019-11-07 15:41:07'),
(2, 2, 'Laptop Dell Vostro 3480', 15990000, 12, 14910000, 'dellvostro.jpg', 1, 0, '2019-10-24 00:00:00', NULL),
(3, 1, 'Laptop HP Envy 13-ah1010TU', 21490000, 5, 19999000, 'hpenvy.jpg', 1, 0, '2019-10-24 00:00:00', NULL),
(4, 11, 'Máy tính để bàn HP Desktop Pro MT 5JC11PA', 8880000, 0, 8880000, 'pchpmt.jpg', 1, 0, '2019-10-23 00:00:00', NULL),
(5, 3, 'Laptop Acer Aspire A515-53-330E', 11990000, 3, 10990000, 'aceraprise.jpg', 1, 0, '2019-10-23 00:00:00', NULL),
(6, 3, 'Laptop Acer Swift 3 SF315-52-52Z7', 15960000, 5, 13520000, 'acerswift.jpg', 1, 0, '2019-10-23 00:00:00', NULL),
(7, 4, 'Laptop Asus X407UB-BV145', 16200000, 5, 14000000, 'asusx407.jpg', 1, 0, '2019-10-15 00:00:00', NULL),
(8, 14, 'Máy tính Gamer Asus ROG Strix GL10CS-VN004T', 16490000, 3, 15990000, 'asusrog.jpg', 1, 0, '2019-10-15 00:00:00', NULL),
(9, 5, 'Laptop Lenovo Ideapad S340', 15990000, 3, 14790000, 'lenos340.jpg', 1, 0, '2019-10-15 00:00:00', NULL),
(10, 5, 'Laptop Lenovo Ideapad 320', 16940000, 0, 15750000, 'lenovo320.jpg', 1, 0, '2019-10-15 00:00:00', NULL),
(11, 6, 'Laptop Microsoft Surface', 33890000, 0, 33890000, 'mcrsurface.jpg', 1, 0, '2019-10-15 00:00:00', NULL),
(12, 6, 'Laptop Microsoft Surface Pro 6', 44990000, 5, 42590000, 'surface6pro.jpg', 1, 0, '2019-10-19 00:00:00', NULL),
(13, 7, 'Laptop Razer Blade Stealth', 32890000, 0, 32890000, 'razerblade.jpg', 1, 0, '2019-10-18 00:00:00', NULL),
(14, 7, 'Laptop Razer Blade 14', 26990000, 10, 24291000, 'razer-14-4-1.png', 1, 0, '2019-10-19 00:00:00', '2019-11-04 17:51:01'),
(15, 8, 'Laptop Apple Macbook Air MREE2', 26690000, 5, 24690000, 'macair.jpg', 1, 0, '2019-10-20 00:00:00', NULL),
(16, 8, 'Laptop Apple Macbook Pro MUHP2', 37990000, 5, 35790000, 'macairpro.jpg', 1, 0, '2019-10-22 00:00:00', NULL),
(17, 9, 'Laptop MSI GP63 Leopard 8RD\r\n', 31490000, 3, 30590000, 'msigp63.jpg', 1, 0, '2019-10-09 00:00:00', NULL),
(18, 9, 'Laptop MSI GE75 Raider', 52990000, 4, 51990000, 'msiraider.jpg', 1, 0, '2019-10-22 00:00:00', NULL),
(20, 10, 'Laptop SAMSUNG 35X0AA-X08', 22515000, 10, 17152000, 'samsung35x.jpg', 1, 0, '2019-10-19 00:00:00', NULL),
(21, 5, 'Laptop Lenovo Ideapad S340', 15990000, 4, 14790000, 'lenovoideapad.png', 1, 0, '2019-10-13 00:00:00', NULL),
(23, 10, 'Laptop Samsung 870-Z5G', 12500000, 7, 11970000, 'samsung870.jpg', 1, 0, '2019-11-01 20:05:50', NULL),
(24, 2, 'Laptop Dell Inspiron 7391 N3TI5008W', 26990000, 7, 25100700, 'Dell_Inspiron_15_3567.jpeg', 1, 0, '2019-11-01 14:27:40', NULL),
(34, 1, 'Laptop HP Pavilion 15-cs2034TU 6YZ06PA', 15490000, 5, 14715500, '35373_laptop_hp_pavilion_15_cs2001tu_6kx30pa__gold__1_1.png', 1, 0, '2019-11-01 16:07:38', NULL),
(39, 14, 'Máy tính All in one Asus V222UAK-BA140T', 15490000, 8, 14250800, '34214_ma__y_ti__nh_all_in_one_asus_v222uak_ba140t_1_1.png', 1, 0, '2019-11-03 11:24:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `id` int(10) UNSIGNED NOT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hard_drive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `battery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`id`, `ram`, `cpu`, `hard_drive`, `color`, `screen`, `battery`, `operating_system`, `size`, `weight`) VALUES
(1, '4Gb', 'Intel Core i3', '1 Tb', 'Red', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(2, '8Gb', 'Intel Core i3', '1Tb', 'Grey', '13.2Inch', '6 cell', 'WINDOW', '32 x 25.9 x 2 cm', '1.9 kg'),
(3, '4Gb', 'Intel Core i3', '1Tb', 'Gold', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(4, '4Gb', 'Intel Core i5', '1 Tb', 'Red', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(5, '4GB', 'Intel Core i5', '1Tb', 'Grey', '13.2Inch', '6 cell', 'WINDOW', '32 x 25.9 x 2 cm', '1.9 kg'),
(6, '4Gb', 'Intel Core i5', '1Tb', 'Gold', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(7, '8Gb', 'Intel Core i5', '1 Tb', 'Red', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(8, '8GB', 'Intel Core i5', '1Tb', 'Grey', '13.2Inch', '6 cell', 'WINDOW', '32 x 25.9 x 2 cm', '1.9 kg'),
(9, '8Gb', 'Intel Core i5', '1Tb', 'Gold', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(10, '4Gb', 'Intel Core i7', '1 Tb', 'Red', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(11, '4GB', 'Intel Core i7', '1Tb', 'Grey', '13.2Inch', '6 cell', 'WINDOW', '32 x 25.9 x 2 cm', '1.9 kg'),
(12, '4Gb', 'Intel Core i7', '1Tb', 'Gold', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(13, '8Gb', 'Intel Core i7', '1 Tb', 'Red', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(14, '8GB', 'Intel Core i7', '1Tb', 'Grey', '13.2Inch', '6 cell', 'WINDOW', '32 x 25.9 x 2 cm', '1.9 kg'),
(15, '8Gb', 'Intel Core i7', '1Tb', 'Gold', '15.6Inch', '4 cell', 'WINDOW', '38 x 25.9 x 2.2 cm', '2.1 kg'),
(16, '4Gb', 'Intel Core i5', '1 Tb', 'Red', '15.6Inch', '4 cell', 'IOS', '30.41 x 21.24 x 1.56cm', '1.25 kg'),
(17, '4GB', 'Intel Core i5', '1Tb', 'Grey', '13.2Inch', '6 cell', 'IOS', '30.41 x 21.24 x 1.56cm', '1.25 kg'),
(18, '4Gb', 'Intel Core i5', '1Tb', 'White', '15.6Inch', '4 cell', 'IOS', '30.41 x 21.24 x 1.56cm', '1.25 kg'),
(19, '4Gb', 'Intel Core i7', '1 Tb', 'Red', '15.6Inch', '4 cell', 'IOS', '30.41 x 21.24 x 1.56cm', '1.25 kg'),
(20, '4GB', 'Intel Core i7', '1Tb', 'Grey', '13.2Inch', '6 cell', 'IOS', '30.41 x 21.24 x 1.56cm', '1.25 kg'),
(21, '4Gb', 'Intel Core i7', '1Tb', 'White', '15.6Inch', '4 cell', 'IOS', '30.41 x 21.24 x 1.56cm', '1.25 kg'),
(22, '4 Gb', 'Intel Core i5', '1 Tb', 'Black', '15.6 Inch', '6 cell', 'Window 10 Home', '38 x 25.9 x 2.2 cm', '2.1 Kg'),
(23, '8 Gb', 'Intel Core i5', '1 Tb', 'Black', '15.6 Inch', '6 cell', 'Window 10 Home', '38 x 25.9 x 2.2 cm', '2.1 Kg');

-- --------------------------------------------------------

--
-- Table structure for table `trademark`
--

CREATE TABLE `trademark` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_trade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trademark`
--

INSERT INTO `trademark` (`id`, `name_trade`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'Acer'),
(4, 'Asus'),
(5, 'Lenovo'),
(6, 'Microsoft'),
(7, 'Razer'),
(8, 'Apple'),
(9, 'MSI'),
(10, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id`, `type`) VALUES
(1, 'Laptop'),
(2, 'Máy tính để bàn');

-- --------------------------------------------------------

--
-- Table structure for table `type_trade`
--

CREATE TABLE `type_trade` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_type` int(11) UNSIGNED NOT NULL,
  `id_trade` int(11) UNSIGNED NOT NULL,
  `name_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_trade`
--

INSERT INTO `type_trade` (`id`, `id_type`, `id_trade`, `name_type`) VALUES
(1, 1, 1, 'Laptop HP'),
(2, 1, 2, 'Laptop Dell'),
(3, 1, 3, 'Latptop Acer'),
(4, 1, 4, 'Laptop Asus'),
(5, 1, 5, 'Laptop Lenovo'),
(6, 1, 6, 'Laptop Microsoft'),
(7, 1, 7, 'Laptop Razer'),
(8, 1, 8, 'Laptop Apple'),
(9, 1, 9, 'Laptop MSI'),
(10, 1, 10, 'Laptop Samsung'),
(11, 2, 1, 'Máy tính để bàn HP'),
(12, 2, 2, 'Máy tính để bàn Dell'),
(13, 2, 3, 'Máy tính để bàn Acer'),
(14, 2, 4, 'Máy tính để bàn Asus'),
(15, 2, 5, 'Máy tính để bàn Lenovo'),
(16, 2, 6, 'Máy tính để bàn Microsoft'),
(17, 2, 7, 'Máy tính để bàn Razer'),
(18, 2, 8, 'Máy tính để bàn Apple'),
(19, 2, 9, 'Máy tính để bàn MSI'),
(20, 2, 10, 'Máy tính để bàn Samsung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_detailproduct` (`id_detailproduct`);

--
-- Indexes for table `detail_product`
--
ALTER TABLE `detail_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_specification` (`id_specification`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acc` (`id_acc`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `order_cart`
--
ALTER TABLE `order_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acc` (`id_acc`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acc` (`id_acc`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_typetrade`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trademark`
--
ALTER TABLE `trademark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_trade`
--
ALTER TABLE `type_trade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`,`id_trade`),
  ADD KEY `id_trade` (`id_trade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `detail_product`
--
ALTER TABLE `detail_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_cart`
--
ALTER TABLE `order_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `trademark`
--
ALTER TABLE `trademark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `type_trade`
--
ALTER TABLE `type_trade`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `order_cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_detailproduct`) REFERENCES `detail_product` (`id`);

--
-- Constraints for table `detail_product`
--
ALTER TABLE `detail_product`
  ADD CONSTRAINT `detail_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_product_ibfk_2` FOREIGN KEY (`id_specification`) REFERENCES `specification` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`id_acc`) REFERENCES `account` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_cart`
--
ALTER TABLE `order_cart`
  ADD CONSTRAINT `order_cart_ibfk_1` FOREIGN KEY (`id_acc`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_acc`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_typetrade`) REFERENCES `type_trade` (`id`);

--
-- Constraints for table `type_trade`
--
ALTER TABLE `type_trade`
  ADD CONSTRAINT `type_trade_ibfk_1` FOREIGN KEY (`id_trade`) REFERENCES `trademark` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `type_trade_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
