-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 05:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostandfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `created`) VALUES
(1, 'sdfds', -1, '2020-03-13 10:23:42'),
(2, 'sdcmddc', -1, '2020-03-13 10:24:54'),
(3, 'ghjjtyut', -1, '2020-03-13 10:25:09'),
(4, 'ewewrdfs', -1, '2020-03-13 10:37:33'),
(5, 'scsc', 4, '2020-03-15 16:26:11'),
(6, 'dffd', 1, '2020-03-15 16:26:30'),
(7, 'bn', -1, '2020-04-03 06:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `found_date` date NOT NULL,
  `found_location` varchar(255) NOT NULL,
  `location_description` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `sub_category` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `status1` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `found`
--

INSERT INTO `found` (`id`, `user_id`, `name`, `number`, `email`, `found_date`, `found_location`, `location_description`, `category`, `sub_category`, `brand`, `model`, `description`, `image`, `color`, `created`, `updated`, `status1`) VALUES
(2, 0, 'szdsz', 4343, '', '0000-00-00', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '2020-04-02 07:39:33', 'pending'),
(3, 0, 'jhghjbds', 346, '', '0000-00-00', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '2020-04-02 08:51:55', 'Approved'),
(4, 6, 'sacasc', 0, '', '0000-00-00', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '2020-04-02 08:57:23', 'Approved'),
(6, 6, 'zither', 123, 'z@gmail.com', '0000-00-00', '', '', 0, 0, '', '', '', 'the-palm-962785_1920.jpg', '', '0000-00-00 00:00:00', '2020-04-02 12:02:17', 'Approved'),
(7, 8, '', 0, '', '0000-00-00', '', '', 0, 0, '', '', '', 'clothing-store-984396_1920.jpg', '', '0000-00-00 00:00:00', '2020-04-05 14:12:38', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `lost_date` datetime DEFAULT NULL,
  `last_location` text DEFAULT NULL,
  `location_description` text DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `status1` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `name`, `number`, `email`, `lost_date`, `last_location`, `location_description`, `category`, `sub_category`, `brand`, `model`, `description`, `image`, `color`, `created`, `updated`, `status1`) VALUES
(58, 8, 'jineshhh', '', '', '0000-00-00 00:00:00', '', '', 0, NULL, '', '', '', 'http://localhost/landf/uploads/pexels-photo-945982.jpeg', '', '2020-04-05 00:00:00', '2020-04-05 14:09:25', 'Approved'),
(59, 6, 'dscdsacdsc', '46456', 'sad@gmail.com', '2020-04-08 00:00:00', 'asx', 'axax', 4, NULL, 'asxasx', '345', 'asds', 'http://localhost/landf/uploads/EVEgjNlUMAIyXfL.png', 'black', '2020-04-09 00:00:00', '2020-04-09 11:20:43', 'pending'),
(60, 6, 'dscdsacdsc', '46456', 'sad@gmail.com', '2020-04-08 00:00:00', 'asx', 'axax', 4, NULL, 'asxasx', '345', 'asds', 'http://localhost/landf/uploads/EVEgjNlUMAIyXfL.png', 'black', '2020-04-09 00:00:00', '2020-04-09 11:21:07', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('google','facebook','twitter','linkedin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'google',
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `password`, `gender`, `locale`, `picture`, `created`, `modified`, `role`) VALUES
(1, 'google', '113530264819953994761', 'chetan', 'sharma', '19chetan87sharma@gmail.com', 'Nancy16#', '', 'en', 'https://lh3.googleusercontent.com/a-/AOh14Gg5KB94CysR_p2Oevon19UQeHpvUItfrvriFIHQzQ', '2020-03-12 08:10:41', '2020-03-27 18:33:39', NULL),
(2, 'google', '', 'admin', 'admin', 'admin@admin.com', 'Nancy16#', NULL, NULL, NULL, '2020-03-12 00:00:00', '2020-03-12 00:00:00', 1),
(3, 'google', '117168308266754700256', 'webtenor', 'it', 'webtenorit@gmail.com', NULL, '', 'en', 'https://lh6.googleusercontent.com/-uWmNdMST-D0/AAAAAAAAAAI/AAAAAAAAAAA/AKF05nCEmFrBBZ5ImHz6wsO00F3_DsRZ7w/photo.jpg', '2020-03-14 15:14:49', '2020-03-14 15:56:13', NULL),
(4, 'google', '106371668635816592264', 'Jinesh', 'Mehta', 'jineshmehta1403@gmail.com', NULL, '', 'en-GB', 'https://lh3.googleusercontent.com/a-/AOh14GjN9j3mRAcnk4_zs_GXVvYQ_pBUTyTdXnryPrlQ', '2020-03-27 18:39:29', '2020-03-27 18:39:29', NULL),
(5, 'google', '', 'Nancy', 'Dalal', 'nancy@gmail.com', 'Nancy16#', 'female', 'India', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 'google', '103291275746511488618', 'Nancy', 'Dalal', 'nancydalal16@gmail.com', NULL, '', 'en', 'https://lh3.googleusercontent.com/a-/AOh14Gj5QcF6RpNHBbPPeHm9kvdf1aaL2vkWb87VPMBzpg', '2020-04-01 08:33:38', '2020-04-09 17:01:02', 1),
(7, 'google', '102980716340558838045', 'Nancy', 'Dalal', 'nancy.dalal100855@marwadiuniversity.ac.in', NULL, '', 'en', 'https://lh4.googleusercontent.com/-OlHf7o0Na6w/AAAAAAAAAAI/AAAAAAAAAAA/AAKWJJP61z4XnvuJHhEE3ndXoY-CyFJ9oA/photo.jpg', '2020-04-02 09:44:48', '2020-04-02 09:45:56', NULL),
(8, 'google', '109726031117330313498', 'Namita', 'Ashodia', 'nashodia3295@gmail.com', NULL, '', 'en-GB', 'https://lh5.googleusercontent.com/-jg03pMZu2ko/AAAAAAAAAAI/AAAAAAAAAAA/AAKWJJO_aQNdOs1Bm6i4ghkKdD__QZsDUQ/photo.jpg', '2020-04-05 12:33:25', '2020-04-05 16:12:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
