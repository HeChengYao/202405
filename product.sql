-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-06-03 03:27:37
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `productdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL COMMENT '產品序號',
  `Pname` varchar(32) NOT NULL COMMENT '產品名稱',
  `Price` int(11) NOT NULL COMMENT '產品價格',
  `Pnum` int(11) NOT NULL COMMENT '產品數量',
  `Premark` varchar(128) NOT NULL COMMENT '產品備註',
  `Pimg` varchar(128) NOT NULL COMMENT '圖片路徑',
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '產品建檔時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`ID`, `Pname`, `Price`, `Pnum`, `Premark`, `Pimg`, `Created_at`) VALUES
(41, '漢堡02', 99, 99, '漢堡02漢堡02漢堡02', 'images/m02.avif', '2023-06-19 07:30:28'),
(42, '漢堡03', 60, 20, '漢堡03漢堡03漢堡03', 'images/m03.avif', '2023-06-19 07:30:44'),
(44, '漢堡01', 1, 1, '漢堡01漢堡01漢堡01', 'images/m01.avif', '2023-06-19 08:05:48'),
(45, '漢堡02', 23, 4, '漢堡01漢堡01漢堡01', 'images/m02.avif', '2023-06-19 08:06:01'),
(46, '漢堡03', 20, 1, '漢堡03漢堡03漢堡03', 'images/m02.avif', '2023-06-19 08:06:15'),
(47, '漢堡04', 50, 6, '漢堡04漢堡04漢堡04', 'images/m04.avif', '2023-06-19 08:06:26'),
(48, '漢堡05', 80, 3, '漢堡05漢堡05漢堡05', 'images/m05.avif', '2023-06-19 08:06:37'),
(49, '漢堡06', 80, 3, '漢堡06漢堡06漢堡06', 'images/m01.avif', '2023-06-19 08:06:49'),
(50, '漢堡07', 90, 3, '漢堡07漢堡07漢堡07', 'images/m02.avif', '2023-06-19 08:07:01'),
(51, '漢堡08', 90, 5, '漢堡08漢堡08漢堡08', 'images/m06.avif', '2023-06-19 08:07:14'),
(52, '漢堡09', 80, 6, '漢堡09漢堡09漢堡09', 'images/m03.avif', '2023-06-19 08:07:26'),
(53, '可樂01', 60, 5, '可樂01可樂01可樂01', 'images/cola01.avif', '2023-06-19 08:22:15'),
(54, '可樂02', 30, 2, '可樂02可樂02可樂02', 'images/cola01.avif', '2023-06-19 08:22:29'),
(55, '可樂03', 80, 5, '可樂02可樂02可樂02可樂02可樂02', 'images/m01.avif', '2023-06-19 08:22:39'),
(56, '可樂04', 90, 5, '可樂02可樂02可樂02可樂02可樂02', 'images/m01.avif', '2023-06-19 08:22:48'),
(57, '可樂05', 20, 2, '可樂02可樂02可樂02可樂02', 'images/m01.avif', '2023-06-19 08:23:08'),
(61, '珍珠奶茶', 80, 10, '粉好喝!', 'xxx.jpg', '2023-11-06 07:24:49'),
(64, '紅茶拿鐵', 0, 10, '超好喝!超派!', 'xxx.jpg', '2023-11-06 08:09:29'),
(65, '紅茶拿鐵', 60, 10, '超好喝!超派!', 'xxx.jpg', '2023-11-06 08:09:44'),
(66, '紅茶拿鐵', 60, 10, '超好喝!超派!', 'xxx.jpg', '2023-11-06 08:12:50'),
(67, '紅茶拿鐵', 60, 10, '超好喝!超派!', 'xxx.jpg', '2023-11-06 08:12:50'),
(68, '紅茶拿鐵', 60, 10, '超好喝!超派!', 'xxx.jpg', '2023-11-06 08:12:51'),
(69, '紅茶拿鐵', 60, 10, '超好喝!超派!', 'xxx.jpg', '2023-11-06 08:12:52'),
(70, '蛋糕', 70, 10, '很好吃', 'images/cake01.avif', '2024-06-03 00:53:38');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '產品序號', AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
