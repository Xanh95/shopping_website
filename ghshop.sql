-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 10:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(150) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(3, 'Bán Hàng'),
(1, 'Lãnh Đạo'),
(2, 'Văn Phòng');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `hometown` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `role` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `birthday`, `phone`, `password`, `address`, `hometown`, `email`, `gender`, `department`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Tăng Xuân Anh', '04/12/1995', '0389607406', '$2y$10$uP1CQ17jDR6vUDaHSfA7JuDLfmOBYFS6pMj1rg46/XeILGLU/rfm6', 'thượng thanh long biên hà nội', 'phú thọ', 'tangxuananh1995@gmail.com', '1', 'Lãnh Đạo', 1, '2023-04-26 18:26:38', '2023-04-27 19:03:57'),
(3, 'xanh', '04/12/1995', '0389607407', '$2y$10$JdjB9javqwzQQYJECAXpb.dI/Mr1cG.9qoag15AVj7kSTjqQF5C8y', 'thượng thanh long biên hà nội', 'phú thọ', '123@gmaiil.com', '1', 'Lãnh Đạo', 2, '2023-04-27 08:59:53', '2023-04-27 15:59:53'),
(4, 'vang', '04/12/1995', '03896073403', '$2y$10$ihf4IiDMWEVzLK3FDmZiv.jaF2IKHOmIkwOr2/jkv7TokmpMZNzUm', 'thượng thanh long biên hà nội', 'phú thọ', 'xuanan3hvolam2@gmail.com', '1', 'Lãnh Đạo', 4, '2023-04-27 09:00:52', '2023-04-27 16:00:52'),
(5, 'tim', '04/12/1995', '0389607412', '$2y$10$pVQN67csISz68xP2kXGMru5Sg7vThzpgzyULOt7Ie5Ee9Oh.NAS4O', 'thượng thanh long biên hà nội', 'phú thọ', 'xuan2an3hvolam2@gmail.com', '1', 'Lãnh Đạo', 3, '2023-04-27 09:02:06', '2023-04-28 01:11:23'),
(8, 'Tăng Xuân Anh 6', '04/12/1995', '689607406', '$2y$10$qKIYPLJv0MsNByhVpuToMOaLfaxwuosUkoS2T3TLOwJzURY4bTzv.', 'thượng thanh long biên hà nội', 'phú thọ', 'x6uanan3hvolam2@gmail.com', '1', 'Văn Phòng', 1, '2023-04-27 09:07:35', '2023-04-27 16:07:35'),
(9, 'Tăng Xuân Anh 7', '04/12/1995', '7389607406', '$2y$10$7gHudg.R4AN7VAGqZRYV9eMr7wMCtUQ9nbRCpZ4eT2S3DWUOEVzqC', 'thượng thanh long biên hà nội', 'phú thọ', 'tangx1uananh1995@gmail.com', '1', 'Văn Phòng', 2, '2023-04-27 09:08:17', '2023-04-28 01:40:19'),
(10, 'Tăng Xuân Anh 8', '04/12/1995', '0389607408', '$2y$10$Scu49IOnRSJnSdcEAxRo5evPKvkM4wUeTQLNYrGFrfR7e7Kf9N6FW', 'thượng thanh long biên hà nội', 'phú thọ', 't2an2anh1995@gmail.com', '1', 'Văn Phòng', 3, '2023-04-27 09:08:54', '2023-04-28 03:02:27'),
(11, 'Tăng Xuân Anh 9 ', '04/12/1995', '9389607407', '$2y$10$0talyp10hHN5JQvS6XFvRO2CZcW6uA0GbNl1vTCyRoG9OfGJw6UYO', 'thượng thanh long biên hà nội', 'phú thọ', 't2a3nanh1995@gmail.com', '1', 'Văn Phòng', 4, '2023-04-27 09:09:20', '2023-04-27 16:09:20'),
(12, 'Tăng Xuân Anh 4', '04/12/1995', '0389607404', '$2y$10$kLZB94VRb63Fkom6kzEk6uQ2hHojAe1rHvwghCDAjz2zwsuPDRKNa', 'thượng thanh long biên hà nội', 'phú thọ', 't2an4anh1995@gmail.com', '1', 'Văn Phòng', 4, '2023-04-27 09:10:13', '2023-04-28 02:39:12'),
(13, 'Tăng Xuân Anh 7', '04/12/1995', '03896074126', '$2y$10$pXk6VDazCB1O5YQNVRVj3Ohwk69QnJomsAIMqZlhe781hZ9P2u6YO', 'thượng thanh long biên hà nội', 'phú thọ', 'xu2anan3hvolam2@gmail.com', '2', 'Bán Hàng', 1, '2023-04-27 09:10:35', '2023-04-27 16:10:35'),
(15, '??????', '04/12/1995', '0312307406', '$2y$10$emtbCS498z/xJ0A118Bo6u.MmJqtPgVpNKEDWal40oz3vQFDVBBOK', 'thượng thanh long biên hà nội', 'phú thọ', 'tangxu3112nh1995@gmail.com', '2', 'Lãnh Đạo', 1, '2023-04-27 19:21:36', '2023-04-29 05:58:25'),
(16, 'caibang', '04/12/1995', '0382312307407', '$2y$10$cDCumb.biB7zm2xbtxVhueJ8RP8ySWlc4aCKrOrdt6jzHdoq3GRie', 'thượng thanh long biên hà nội', 'phú thọ', 'tang2312395@gmail.com', '2', 'Văn Phòng', 1, '2023-04-27 19:25:39', '2023-04-29 05:58:11'),
(17, 'vodang', '04/12/1995', '123123123', '$2y$10$mgKqtrziVbNw/u/sHNvnb.NoB1ysuH.HM0.4j6G9fBt/xMbTB/W9.', 'thượng thanh long biên hà nội', 'phú thọ', 'tangx3a212295@gmail.com', '1', 'Lãnh Đạo', 1, '2023-04-27 19:27:35', '2023-04-29 05:57:57'),
(18, 'thieu lam 123', '03/31/1991', '0332602406', '$2y$10$qZqu89zMFzymJRQUSmznQO2mHu5oOU0vYmlDB1.HCbD8JfSEJKeD6', 'thượng thanh long biên hà nội', 'phú thọ', '123qwe@gmail.com', '1', 'Lãnh Đạo', 3, '2023-04-28 16:17:37', '2023-04-29 05:57:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
