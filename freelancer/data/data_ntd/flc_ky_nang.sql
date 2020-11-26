-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 08:02 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `viec365_tv365com`
--

-- --------------------------------------------------------

--
-- Table structure for table `flc_ky_nang`
--

CREATE TABLE IF NOT EXISTS `flc_ky_nang` (
`ma_ky_nang` int(11) NOT NULL,
  `ten_ky_nang` varchar(255) NOT NULL,
  `ma_nganh_nghe` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flc_ky_nang`
--

INSERT INTO `flc_ky_nang` (`ma_ky_nang`, `ten_ky_nang`, `ma_nganh_nghe`) VALUES
(1, 'PHP', 1),
(2, 'HTML', 1),
(3, 'CSS', 1),
(4, 'Java', 1),
(5, 'Android', 1),
(6, '.NET', 1),
(7, 'C#', 1),
(8, 'Drupal', 1),
(9, 'Wordpress', 1),
(10, 'Javascript', 1),
(11, 'Lập trình C++', 1),
(12, 'Python', 1),
(13, 'Thiết kế đồ họa', 2),
(14, 'Thiết kế nội thất', 2),
(15, 'Vector', 2),
(16, 'Thiết kế 3D', 2),
(17, 'Corel Painter', 2),
(18, 'Bao bì và đóng gói', 2),
(19, 'Photoshop\r\n', 2),
(20, 'SketchUp', 2),
(21, 'Thiết kế logo', 2),
(22, '2D Animation', 2),
(23, 'Blog writing', 3),
(24, 'Viết kịch bản', 3),
(25, 'Viết sách', 3),
(26, 'Viết bài qua mạng', 3),
(27, 'Viết truyện ngắn', 3),
(28, 'Dịch thuật tiếng Anh', 3),
(29, 'Dịch thuật tiếng Pháp', 3),
(30, 'Dịch thuật tiếng Nga', 3),
(31, 'Dịch thuật tiếng Tây Ban Nha', 3),
(32, 'Dịch thuật tiếng Đức', 3),
(33, 'Copy Editing', 3),
(34, 'Tổng đài', 4),
(35, 'Trợ lí trực tuyến', 4),
(36, 'Xử lý email', 4),
(37, 'Hỗ trợ khách hàng', 4),
(38, 'Data Scraping', 4),
(39, 'Excel', 4),
(40, 'Database Design', 4),
(41, 'Microsoft Outlook', 4),
(42, 'Data Delivery', 4),
(43, 'Giữ sổ kế toán', 4),
(44, 'Kế hoạch kinh doanh', 4),
(45, 'Kiểm toán', 5),
(46, 'Luật lao động', 5),
(47, 'Hợp đồng', 5),
(48, 'Luật nhà đất', 5),
(49, 'Luật thuế', 5),
(50, 'Pháp lý', 5),
(51, 'Hợp đồng', 5),
(52, 'Administrative Support', 5),
(53, 'Tư vấn luật', 5),
(54, 'Lập báo cáo tài chính', 5),
(55, 'Kiến trúc xây dựng', 6),
(56, 'Dựng phối cảnh 3D', 6),
(57, 'Thiết kế ngoại thất', 6),
(58, 'Thiết kế xây dựng nhà', 6),
(59, 'Kĩ thuật dân dụng', 6),
(60, 'Giám sát công trình', 6),
(61, 'Địa chất công trình', 6),
(62, 'Kĩ thuật vật liệu', 6),
(63, 'Nội thất', 6),
(64, 'Revit Architecture', 6),
(65, 'Clip', 7),
(66, 'After Effect', 7),
(67, 'Quảng cáo', 7),
(68, 'Thiết kế Poster', 7),
(69, 'Video hoạt hình', 7),
(70, 'Video Review', 7),
(71, 'Kỹ thuật Video', 7),
(72, 'VideoScribe', 7),
(73, 'Explainer Videos', 7),
(74, 'Video 360 độ', 7),
(75, 'Chụp ảnh', 8),
(76, 'Tuyển dụng', 8),
(77, 'Quảng cáo facebook', 8),
(78, 'Quản lý blog&fanpage', 8),
(79, 'Tối ưu cho công cụ tìm kiếm - SEO', 8),
(80, 'Đăng bài lên Forum', 8),
(81, 'Hỗ trợ kĩ thuật', 8),
(82, 'Fitness', 8),
(83, 'TikTok', 8),
(84, 'Bất kì công việc gì', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flc_ky_nang`
--
ALTER TABLE `flc_ky_nang`
 ADD PRIMARY KEY (`ma_ky_nang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flc_ky_nang`
--
ALTER TABLE `flc_ky_nang`
MODIFY `ma_ky_nang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
