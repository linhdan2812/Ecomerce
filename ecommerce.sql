-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2022 lúc 01:31 PM
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
-- Cơ sở dữ liệu: `ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detailadress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` enum('new','progress','delivered','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `summary`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fsfsdf', NULL, 'sdfsdf', NULL, 'active', '2022-10-11 14:28:47', '2022-10-11 14:28:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent','all') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `value` decimal(20,0) NOT NULL,
  `minbill` decimal(20,0) NOT NULL,
  `expired_at` date DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location_city`
--

CREATE TABLE `location_city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('published','draft') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_with_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `location_city`
--

INSERT INTO `location_city` (`id`, `name`, `slug`, `status`, `type`, `name_with_type`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nội', 'ha-noi', 'published', 'thanh-pho', 'Thành phố Hà Nội', '01', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(2, 'Hà Giang', 'ha-giang', 'published', 'tinh', 'Tỉnh Hà Giang', '02', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(4, 'Cao Bằng', 'cao-bang', 'published', 'tinh', 'Tỉnh Cao Bằng', '04', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(6, 'Bắc Kạn', 'bac-kan', 'published', 'tinh', 'Tỉnh Bắc Kạn', '06', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(8, 'Tuyên Quang', 'tuyen-quang', 'published', 'tinh', 'Tỉnh Tuyên Quang', '08', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(10, 'Lào Cai', 'lao-cai', 'published', 'tinh', 'Tỉnh Lào Cai', '10', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(11, 'Điện Biên', 'dien-bien', 'published', 'tinh', 'Tỉnh Điện Biên', '11', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(12, 'Lai Châu', 'lai-chau', 'published', 'tinh', 'Tỉnh Lai Châu', '12', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(14, 'Sơn La', 'son-la', 'published', 'tinh', 'Tỉnh Sơn La', '14', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(15, 'Yên Bái', 'yen-bai', 'published', 'tinh', 'Tỉnh Yên Bái', '15', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(17, 'Hoà Bình', 'hoa-binh', 'published', 'tinh', 'Tỉnh Hoà Bình', '17', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(19, 'Thái Nguyên', 'thai-nguyen', 'published', 'tinh', 'Tỉnh Thái Nguyên', '19', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(20, 'Lạng Sơn', 'lang-son', 'published', 'tinh', 'Tỉnh Lạng Sơn', '20', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(22, 'Quảng Ninh', 'quang-ninh', 'published', 'tinh', 'Tỉnh Quảng Ninh', '22', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(24, 'Bắc Giang', 'bac-giang', 'published', 'tinh', 'Tỉnh Bắc Giang', '24', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(25, 'Phú Thọ', 'phu-tho', 'published', 'tinh', 'Tỉnh Phú Thọ', '25', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(26, 'Vĩnh Phúc', 'vinh-phuc', 'published', 'tinh', 'Tỉnh Vĩnh Phúc', '26', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(27, 'Bắc Ninh', 'bac-ninh', 'published', 'tinh', 'Tỉnh Bắc Ninh', '27', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(30, 'Hải Dương', 'hai-duong', 'published', 'tinh', 'Tỉnh Hải Dương', '30', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(31, 'Hải Phòng', 'hai-phong', 'published', 'thanh-pho', 'Thành phố Hải Phòng', '31', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(33, 'Hưng Yên', 'hung-yen', 'published', 'tinh', 'Tỉnh Hưng Yên', '33', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(34, 'Thái Bình', 'thai-binh', 'published', 'tinh', 'Tỉnh Thái Bình', '34', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(35, 'Hà Nam', 'ha-nam', 'published', 'tinh', 'Tỉnh Hà Nam', '35', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(36, 'Nam Định', 'nam-dinh', 'published', 'tinh', 'Tỉnh Nam Định', '36', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(37, 'Ninh Bình', 'ninh-binh', 'published', 'tinh', 'Tỉnh Ninh Bình', '37', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(38, 'Thanh Hóa', 'thanh-hoa', 'published', 'tinh', 'Tỉnh Thanh Hóa', '38', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(40, 'Nghệ An', 'nghe-an', 'published', 'tinh', 'Tỉnh Nghệ An', '40', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(42, 'Hà Tĩnh', 'ha-tinh', 'published', 'tinh', 'Tỉnh Hà Tĩnh', '42', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(44, 'Quảng Bình', 'quang-binh', 'published', 'tinh', 'Tỉnh Quảng Bình', '44', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(45, 'Quảng Trị', 'quang-tri', 'published', 'tinh', 'Tỉnh Quảng Trị', '45', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(46, 'Thừa Thiên Huế', 'thua-thien-hue', 'published', 'tinh', 'Tỉnh Thừa Thiên Huế', '46', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(48, 'Đà Nẵng', 'da-nang', 'published', 'thanh-pho', 'Thành phố Đà Nẵng', '48', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(49, 'Quảng Nam', 'quang-nam', 'published', 'tinh', 'Tỉnh Quảng Nam', '49', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(51, 'Quảng Ngãi', 'quang-ngai', 'published', 'tinh', 'Tỉnh Quảng Ngãi', '51', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(52, 'Bình Định', 'binh-dinh', 'published', 'tinh', 'Tỉnh Bình Định', '52', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(54, 'Phú Yên', 'phu-yen', 'published', 'tinh', 'Tỉnh Phú Yên', '54', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(56, 'Khánh Hòa', 'khanh-hoa', 'published', 'tinh', 'Tỉnh Khánh Hòa', '56', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(58, 'Ninh Thuận', 'ninh-thuan', 'published', 'tinh', 'Tỉnh Ninh Thuận', '58', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(60, 'Bình Thuận', 'binh-thuan', 'published', 'tinh', 'Tỉnh Bình Thuận', '60', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(62, 'Kon Tum', 'kon-tum', 'published', 'tinh', 'Tỉnh Kon Tum', '62', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(64, 'Gia Lai', 'gia-lai', 'published', 'tinh', 'Tỉnh Gia Lai', '64', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(66, 'Đắk Lắk', 'dak-lak', 'published', 'tinh', 'Tỉnh Đắk Lắk', '66', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(67, 'Đắk Nông', 'dak-nong', 'published', 'tinh', 'Tỉnh Đắk Nông', '67', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(68, 'Lâm Đồng', 'lam-dong', 'published', 'tinh', 'Tỉnh Lâm Đồng', '68', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(70, 'Bình Phước', 'binh-phuoc', 'published', 'tinh', 'Tỉnh Bình Phước', '70', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(72, 'Tây Ninh', 'tay-ninh', 'published', 'tinh', 'Tỉnh Tây Ninh', '72', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(74, 'Bình Dương', 'binh-duong', 'published', 'tinh', 'Tỉnh Bình Dương', '74', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(75, 'Đồng Nai', 'dong-nai', 'published', 'tinh', 'Tỉnh Đồng Nai', '75', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(77, 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', 'published', 'tinh', 'Tỉnh Bà Rịa - Vũng Tàu', '77', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(79, 'Hồ Chí Minh', 'ho-chi-minh', 'published', 'thanh-pho', 'Thành phố Hồ Chí Minh', '79', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(80, 'Long An', 'long-an', 'published', 'tinh', 'Tỉnh Long An', '80', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(82, 'Tiền Giang', 'tien-giang', 'published', 'tinh', 'Tỉnh Tiền Giang', '82', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(83, 'Bến Tre', 'ben-tre', 'published', 'tinh', 'Tỉnh Bến Tre', '83', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(84, 'Trà Vinh', 'tra-vinh', 'published', 'tinh', 'Tỉnh Trà Vinh', '84', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(86, 'Vĩnh Long', 'vinh-long', 'published', 'tinh', 'Tỉnh Vĩnh Long', '86', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(87, 'Đồng Tháp', 'dong-thap', 'published', 'tinh', 'Tỉnh Đồng Tháp', '87', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(89, 'An Giang', 'an-giang', 'published', 'tinh', 'Tỉnh An Giang', '89', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(91, 'Kiên Giang', 'kien-giang', 'published', 'tinh', 'Tỉnh Kiên Giang', '91', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(92, 'Cần Thơ', 'can-tho', 'published', 'thanh-pho', 'Thành phố Cần Thơ', '92', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(93, 'Hậu Giang', 'hau-giang', 'published', 'tinh', 'Tỉnh Hậu Giang', '93', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(94, 'Sóc Trăng', 'soc-trang', 'published', 'tinh', 'Tỉnh Sóc Trăng', '94', '2021-12-16 02:08:33', '2021-12-16 02:08:33'),
(95, 'Nam ĐỊnh', 'nam-dinh', 'draft', 'thanh-pho', 'Thành phốNam Định', '95', '2021-12-16 02:08:33', '2022-06-22 03:31:43'),
(96, 'Nam ĐỊnh', 'nam-dinh', 'draft', 'thanh-pho', 'Thành phốNam Định', '96', '2021-12-16 02:08:33', '2022-06-22 03:31:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location_district`
--

CREATE TABLE `location_district` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('published','draft') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_with_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_with_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location_ward`
--

CREATE TABLE `location_ward` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('published','draft') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_with_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_with_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_09_11_212531_create_users_table', 1),
(3, '2022_09_11_212717_create_password_resets_table', 1),
(4, '2022_09_11_212947_create_failed_jobs_table', 1),
(5, '2022_09_11_213157_create_brands_table', 1),
(6, '2022_09_11_213230_create_banners_table', 1),
(7, '2022_09_11_213305_create_categories_table', 1),
(8, '2022_09_11_213358_create_products_table', 1),
(9, '2022_09_11_213500_create_post_categories_table', 1),
(10, '2022_09_11_213539_create_post_tags_table', 1),
(11, '2022_09_11_213625_create_posts_table', 1),
(12, '2022_09_11_213711_create_messages_table', 1),
(13, '2022_09_11_213749_create_shippings_table', 1),
(14, '2022_09_11_213833_create_orders_table', 1),
(15, '2022_09_11_213956_create_carts_table', 1),
(16, '2022_09_11_214037_create_notifications_table', 1),
(17, '2022_09_11_214108_create_coupons_table', 1),
(18, '2022_09_11_214141_create_wishlists_table', 1),
(19, '2022_09_11_214212_create_product_reviews_table', 1),
(20, '2022_09_11_214246_create_post_comments_table', 1),
(21, '2022_09_11_214319_create_settings_table', 1),
(22, '2022_09_11_214408_create_addresses_table', 1),
(23, '2022_09_11_214606_create_location_city_table', 1),
(24, '2022_09_11_214654_create_location_district_table', 1),
(25, '2022_09_11_214741_create_location_ward_table', 1),
(26, '2022_09_11_214819_create_comments_table', 1),
(27, '2022_09_11_214937_create_vnpay_table', 1),
(28, '2022_09_14_211458_add_column_status_to_vnpay_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_total` double(8,2) DEFAULT NULL,
  `shipping_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `payment_method` enum('cod','paypal') COLLATE utf8mb4_unicode_ci DEFAULT 'cod',
  `payment_status` enum('Đang xử lý','Đã thanh toán') COLLATE utf8mb4_unicode_ci DEFAULT 'Đang xử lý',
  `status` enum('Đang xử lý','Đang vận chuyển','Giao hàng thành công','Đã hủy') COLLATE utf8mb4_unicode_ci DEFAULT 'Đang xử lý',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressdetail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vnp_SecureHash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `sub_total`, `shipping_id`, `coupon`, `total_amount`, `quantity`, `data`, `payment_method`, `payment_status`, `status`, `name`, `email`, `phone`, `post_code`, `city`, `district`, `ward`, `addressdetail`, `created_at`, `updated_at`, `vnp_SecureHash`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cod', 'Đang xử lý', 'Đang xử lý', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-11 15:32:01', '2022-10-11 15:32:01', NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cod', 'Đang xử lý', 'Đang xử lý', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-11 15:34:10', '2022-10-11 15:34:10', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cod', 'Đang xử lý', 'Đang vận chuyển', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-11 15:37:31', '2022-10-16 04:58:47', 'd6040226728532b2d914ae6ca5f395478c43fdb1bb576a5dd33349b92d41f9de0568c187e80cd194a6d597996650ec217c55b54117cc034198c2ced3ebd6319b'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cod', 'Đang xử lý', 'Đang xử lý', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html?vnp_Amount=2424200&vnp_Bill_Address=Tuy+lai+M%E1%BB%B9+%C4%90%E1%BB%A9c+H%C3%A0+N%E1%BB%99i&vnp_Bill_City=H%C3%A0+N%E1%BB%99i&vnp_Bill_Country=Vi%E1%BB%87t+Nam&vnp_Bill_Email=anhnt070298%40gmail.com&vnp_Bill_FirstName=Nguy%E1%BB%85n&vnp_Bill_LastName=Anh&vnp_Bill_Mobile=0355607744&vnp_Command=pay&vnp_CreateDate=20221011224111&vnp_CurrCode=VND&vnp_ExpireDate=20221011225606&vnp_IpAddr=127.0.0.1&vnp_Locale=vn&vnp_OrderInfo=Thanh+toan+hoa+don+mua+hang&vnp_OrderType=billpayment&vnp_ReturnUrl=http%3A%2F%2Flocalhost%3A8000%2Fvnpay-return&vnp_TmnCode=TMAIHSK1&vnp_TxnRef=20221011224106&vnp_Version=2.1.0&vnp_SecureHash=8b06736bdabf77e3344d8b2beee5949ad2819e5d2272e8c1f85f9a3cecc650e217c93820224c16fbd702a39c2fdd4c2acfe3fc93851f1953ec26a38e6b518d0b', '2022-10-11 15:41:11', '2022-10-11 15:41:11', '8b06736bdabf77e3344d8b2beee5949ad2819e5d2272e8c1f85f9a3cecc650e217c93820224c16fbd702a39c2fdd4c2acfe3fc93851f1953ec26a38e6b518d0b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quote` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `replied_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'M',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `summary`, `description`, `photo`, `stock`, `size`, `status`, `price`, `discount`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'sdfsdf', NULL, 'sdfsdfsd', 'dsfsdfsd', 'uploads/products/63457db3a3a07-Outfit của Hiệp ơi cứu tao.png', 2322, '32342', 'active', 24242.00, 111.00, 1, NULL, '2022-10-11 14:29:07', '2022-10-11 14:29:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT 0,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `request_orders`
--

CREATE TABLE `request_orders` (
  `id` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_order` int(20) NOT NULL,
  `image` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `request_orders`
--

INSERT INTO `request_orders` (`id`, `id_user`, `id_order`, `image`, `note`, `type`, `name_product`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'uploads/products/634bb8aad3d1d-k8b_xsft.jpg', 'lỗi cái j', 'C', 'sdfsdf', 'success', '2022-10-16 07:54:19', '2022-10-16 08:40:54'),
(4, 1, 3, 'uploads/products/634c1d2df353a-Untitled design.png', 'lỗi do thằng hoàng', 'C', 'sdfsdf', 'pending', '2022-10-16 15:03:10', '2022-10-16 15:03:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `birthday`, `gender`, `email`, `email_verified_at`, `password`, `photo`, `role`, `provider`, `provider_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thế Em Nguyễn', NULL, NULL, NULL, 'ent070298@gmail.com', NULL, NULL, 'https://lh3.googleusercontent.com/a/ALm5wu0BXzEfW1qs305NYB2QqnG92WjpZJagxmTKpOu0=s96-c', 'user', 'google', '100201474086149115646', 'active', NULL, '2022-10-11 14:27:23', '2022-10-11 14:27:23'),
(2, 'Thế Anh Nguyễn', NULL, NULL, NULL, 'anhnt070298@gmail.com', NULL, NULL, 'https://lh3.googleusercontent.com/a/ALm5wu3PuVI7j_9v5e6ujsSkdIFccgcPcndbW-VuO_OU=s96-c', 'admin', 'google', '111618921100307838050', 'active', NULL, '2022-10-11 14:28:02', '2022-10-11 14:28:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
--

CREATE TABLE `vnpay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `vnp_TmnCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã website của merchant trên hệ thống của VNPAY',
  `vnp_Amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Số tiền thanh toán',
  `vnp_BankCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã ngân hàng thanh toán',
  `vnp_BankTranNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã giao dịch tại ngân hàng',
  `vnp_CardType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Loại tài khoản/thẻ khách hàng sử dụng',
  `vnp_PayDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thời gian thanh toán',
  `vnp_OrderInfo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thông tin mô tả nội dung thanh toán',
  `vnp_TransactionNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã giao dịch ghi nhận tại hệ thống VNPAY',
  `vnp_ResponseCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã phản hồi kết quả thanh toán',
  `vnp_TransactionStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã phản hồi trạng thái thanh toán',
  `vnp_TxnRef` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã tham chiếu của giao dịch tại hệ thống của merchant',
  `vnp_SecureHashType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Loại mã băm',
  `vnp_SecureHash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã kiểm tra để đảm bảo dữ liệu của giao dịch không bị thay đổi',
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_transport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vnp_Bill_Mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vnp_Bill_Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vnp_Bill_FirstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vnp_Bill_LastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vnp_Bill_Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vnp_Bill_City` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vnp_Bill_Country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay_tests`
--

CREATE TABLE `vnpay_tests` (
  `id` int(20) NOT NULL,
  `vnp_Version` varchar(255) DEFAULT NULL,
  `vnp_TmnCode` varchar(255) DEFAULT NULL,
  `vnp_Amount` varchar(255) DEFAULT NULL,
  `vnp_Command` varchar(255) DEFAULT NULL,
  `vnp_CreateDate` varchar(255) DEFAULT NULL,
  `vnp_CurrCode` varchar(255) DEFAULT NULL,
  `vnp_IpAddr` varchar(255) DEFAULT NULL,
  `vnp_Locale` varchar(255) DEFAULT NULL,
  `vnp_OrderInfo` varchar(255) DEFAULT NULL,
  `vnp_OrderType` varchar(255) DEFAULT NULL,
  `vnp_ReturnUrl` varchar(255) DEFAULT NULL,
  `vnp_TxnRef` varchar(255) DEFAULT NULL,
  `vnp_ExpireDate` varchar(255) DEFAULT NULL,
  `vnp_Bill_Mobile` varchar(255) DEFAULT NULL,
  `vnp_Bill_Email` varchar(255) DEFAULT NULL,
  `vnp_Bill_FirstName` varchar(255) DEFAULT NULL,
  `vnp_Bill_LastName` varchar(255) DEFAULT NULL,
  `vnp_Bill_Address` varchar(255) DEFAULT NULL,
  `vnp_Bill_City` varchar(255) DEFAULT NULL,
  `vnp_Bill_Country` varchar(255) DEFAULT NULL,
  `vnp_Inv_Phone` varchar(255) DEFAULT NULL,
  `vnp_Inv_Email` varchar(255) DEFAULT NULL,
  `vnp_Inv_Customer` varchar(255) DEFAULT NULL,
  `vnp_Inv_Address` varchar(255) DEFAULT NULL,
  `vnp_Inv_Company` varchar(255) DEFAULT NULL,
  `vnp_Inv_Taxcode` varchar(255) DEFAULT NULL,
  `vnp_Inv_Type` varchar(255) DEFAULT NULL,
  `vnp_SecureHash` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `vnp_BankTranNo` varchar(255) DEFAULT NULL,
  `vnp_CardType` varchar(255) DEFAULT NULL,
  `vnp_PayDate` varchar(255) DEFAULT NULL,
  `vnp_TransactionNo` varchar(255) DEFAULT NULL,
  `vnp_ResponseCode` varchar(255) DEFAULT NULL,
  `vnp_TransactionStatus` varchar(255) DEFAULT NULL,
  `vnp_SecureHashType` varchar(255) DEFAULT NULL,
  `vnp_SecureHash_return` varchar(255) DEFAULT NULL,
  `user_id` int(20) NOT NULL,
  `status_order` varchar(255) NOT NULL DEFAULT 'pending',
  `cart` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vnpay_tests`
--

INSERT INTO `vnpay_tests` (`id`, `vnp_Version`, `vnp_TmnCode`, `vnp_Amount`, `vnp_Command`, `vnp_CreateDate`, `vnp_CurrCode`, `vnp_IpAddr`, `vnp_Locale`, `vnp_OrderInfo`, `vnp_OrderType`, `vnp_ReturnUrl`, `vnp_TxnRef`, `vnp_ExpireDate`, `vnp_Bill_Mobile`, `vnp_Bill_Email`, `vnp_Bill_FirstName`, `vnp_Bill_LastName`, `vnp_Bill_Address`, `vnp_Bill_City`, `vnp_Bill_Country`, `vnp_Inv_Phone`, `vnp_Inv_Email`, `vnp_Inv_Customer`, `vnp_Inv_Address`, `vnp_Inv_Company`, `vnp_Inv_Taxcode`, `vnp_Inv_Type`, `vnp_SecureHash`, `Status`, `vnp_BankTranNo`, `vnp_CardType`, `vnp_PayDate`, `vnp_TransactionNo`, `vnp_ResponseCode`, `vnp_TransactionStatus`, `vnp_SecureHashType`, `vnp_SecureHash_return`, `user_id`, `status_order`, `cart`, `created_at`, `updated_at`) VALUES
(1, '2.1.0', 'TMAIHSK1', '24242', 'pay', '20221015164553', 'VND', '127.0.0.1', 'vn', 'Noi dung thanh toan', 'topup', 'http://localhost:8000/vnpay-return', '20221015164549', '20221015170049', '0934998386', 'xonv@vnpay.vn', 'NGUYEN', 'XO', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Hà Nội', 'VN', '02437764668', 'pholv@vnpay.vn', 'Lê Văn Phổ', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Công ty Cổ phần giải pháp Thanh toán Việt Nam', '0102182292', 'I', 'ba9fd6c13085e7751cdf84e300959be26e5165885dcb31c30bf290ff3c7cab924ac124e9a3c0107622e4958007162618e74d3c5e9c543d4a1c61600ba456cccd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'pending', '{\"1\":{\"name\":\"sdfsdf\",\"quantity\":1,\"price\":24242,\"image\":\"uploads\\/products\\/63457db3a3a07-Outfit c\\u1ee7a Hi\\u1ec7p \\u01a1i c\\u1ee9u tao.png\"}}', '2022-10-15 09:45:53', '2022-10-15 09:45:53'),
(2, '2.1.0', 'TMAIHSK1', '24242', 'pay', '20221015171137', 'VND', '127.0.0.1', 'vn', 'Noi dung thanh toan', 'topup', 'http://localhost:8000/vnpay-return', '20221015164549', '20221015170049', '0934998386', 'xonv@vnpay.vn', 'NGUYEN', 'XO', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Hà Nội', 'VN', '02437764668', 'pholv@vnpay.vn', 'Lê Văn Phổ', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Công ty Cổ phần giải pháp Thanh toán Việt Nam', '0102182292', 'I', '03f8a0a88dfcd6bfe918e940ee80a8f9198650c437b8d014744003bb450789ca9a99e5b88072501338c140961d5a4136e8f814c8c8d3771e3d59d92c4ca77fb9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'pending', '{\"1\":{\"name\":\"sdfsdf\",\"quantity\":1,\"price\":24242,\"image\":\"uploads\\/products\\/63457db3a3a07-Outfit c\\u1ee7a Hi\\u1ec7p \\u01a1i c\\u1ee9u tao.png\"}}', '2022-10-15 10:11:37', '2022-10-15 10:11:37'),
(3, '2.1.0', 'TMAIHSK1', '24242', 'pay', '20221015171146', 'VND', '127.0.0.1', 'vn', 'Noi dung thanh toan', 'topup', 'http://localhost:8000/vnpay-return', '20221015171142', '20221015172642', '0934998386', 'xonv@vnpay.vn', 'NGUYEN', 'XO', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Hà Nội', 'VN', '02437764668', 'pholv@vnpay.vn', 'Lê Văn Phổ', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Công ty Cổ phần giải pháp Thanh toán Việt Nam', '0102182292', 'I', '5153a562cb255f977da76cac4f98c0f997b8d72a9967fbd903e4c7b5d0e863299e4e6ffa7e30522e7784ca630b41e158f3856c995ff8cec60dc9c691f00b84ae', '0', 'VNP13857181', 'ATM', '20221015171203', '13857181', '00', '00', NULL, NULL, 1, 'shipping', '{\"1\":{\"name\":\"sdfsdf\",\"quantity\":1,\"price\":24242,\"image\":\"uploads\\/products\\/63457db3a3a07-Outfit c\\u1ee7a Hi\\u1ec7p \\u01a1i c\\u1ee9u tao.png\"}}', '2022-10-15 10:11:46', '2022-10-16 15:06:16'),
(4, '2.1.0', 'TMAIHSK1', '24242', 'pay', '20221016102444', 'VND', '127.0.0.1', 'vn', 'Noi dung thanh toan', 'topup', 'http://localhost:8000/vnpay-return', '20221016102438', '20221016103938', '0934998386', 'xonv@vnpay.vn', 'NGUYEN', 'XO', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Hà Nội', 'VN', '02437764668', 'pholv@vnpay.vn', 'Lê Văn Phổ', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Công ty Cổ phần giải pháp Thanh toán Việt Nam', '0102182292', 'I', '36e83a6ce3418a9fd698bf7b32a45105394636453cf5317a83ed1b5e2dfb077e751ee51e4eb68c46bfe697a76108bb2c1c83106fe5da76de9327ab9364e31b8b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'pending', '{\"1\":{\"name\":\"sdfsdf\",\"quantity\":1,\"price\":24242,\"image\":\"uploads\\/products\\/63457db3a3a07-Outfit c\\u1ee7a Hi\\u1ec7p \\u01a1i c\\u1ee9u tao.png\"}}', '2022-10-16 03:24:44', '2022-10-16 03:24:44'),
(5, '2.1.0', 'TMAIHSK1', '24242', 'pay', '20221016102917', 'VND', '127.0.0.1', 'vn', 'Noi dung thanh toan', 'topup', 'http://localhost:8000/vnpay-return', '20221016102912', '20221016104412', '0934998386', 'xonv@vnpay.vn', 'NGUYEN', 'XO', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Hà Nội', 'VN', '02437764668', 'pholv@vnpay.vn', 'Lê Văn Phổ', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Công ty Cổ phần giải pháp Thanh toán Việt Nam', '0102182292', 'I', '5431a7edfe7f061014bf0f636fcf374e6eb99edd574f584590947ffb41a7d21c0f3b0231a6c7ae545c43dcc949d1ca2e77ff24b811b28d5a822e79e07146c671', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'pending', '{\"1\":{\"name\":\"sdfsdf\",\"quantity\":1,\"price\":24242,\"image\":\"uploads\\/products\\/63457db3a3a07-Outfit c\\u1ee7a Hi\\u1ec7p \\u01a1i c\\u1ee9u tao.png\"}}', '2022-10-16 03:29:17', '2022-10-16 03:29:17'),
(6, '2.1.0', 'TMAIHSK1', '2424200', 'pay', '20221016215652', 'VND', '127.0.0.1', 'vn', 'Noi dung thanh toan', 'topup', 'http://localhost:8000/vnpay-return', '20221016215555', '20221016221055', '0934998386', 'xonv@vnpay.vn', 'NGUYEN', 'Anh', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Hà Nội', 'VN', '02437764668', 'pholv@vnpay.vn', 'Lê Văn Phổ', '22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội', 'Công ty Cổ phần giải pháp Thanh toán Việt Nam', '0102182292', 'I', '5df3a4e57ed8cd6ba847570e5f0fea70a94538740169096f55f66c62d256fb869f6df6db8a7fbb4242164582615bc8e5deb0417ad208d63f767fcb3eb6a1d35e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'pending', '{\"1\":{\"name\":\"sdfsdf\",\"quantity\":1,\"price\":24242,\"image\":\"uploads\\/products\\/63457db3a3a07-Outfit c\\u1ee7a Hi\\u1ec7p \\u01a1i c\\u1ee9u tao.png\"}}', '2022-10-16 14:56:52', '2022-10-16 14:56:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `location_city`
--
ALTER TABLE `location_city`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `location_district`
--
ALTER TABLE `location_district`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `location_ward`
--
ALTER TABLE `location_ward`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  ADD KEY `posts_post_tag_id_foreign` (`post_tag_id`),
  ADD KEY `posts_added_by_foreign` (`added_by`);

--
-- Chỉ mục cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_user_id_foreign` (`user_id`),
  ADD KEY `post_comments_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_tags_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `request_orders`
--
ALTER TABLE `request_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnpay_tests`
--
ALTER TABLE `vnpay_tests`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_cart_id_foreign` (`cart_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `location_city`
--
ALTER TABLE `location_city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `location_district`
--
ALTER TABLE `location_district`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `location_ward`
--
ALTER TABLE `location_ward`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `request_orders`
--
ALTER TABLE `request_orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `vnpay_tests`
--
ALTER TABLE `vnpay_tests`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_post_cat_id_foreign` FOREIGN KEY (`post_cat_id`) REFERENCES `post_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_post_tag_id_foreign` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tags` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
