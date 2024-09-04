-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 02:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'news', '2024-08-28 01:53:52', '2024-09-01 00:10:57'),
(2, 'sport', '2024-08-28 01:53:52', NULL),
(3, 'technology', '2024-08-28 04:05:02', NULL),
(4, 'culture', '2024-08-30 04:05:51', '2024-08-31 21:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 10,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `cat_id`, `status`, `image`, `created_at`, `updated_at`) VALUES
(6, 'post 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 10, '/assets/images/posts/2024_09_04_02_09_00_04.jpg', '2024-09-04 03:30:04', NULL),
(7, 'post 2', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.', 1, 10, '/assets/images/posts/2024_09_04_02_09_00_45.jpg', '2024-09-04 03:30:45', NULL),
(8, 'post 3', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.', 1, 10, '/assets/images/posts/2024_09_04_02_09_01_03.jpg', '2024-09-04 03:31:03', NULL),
(9, 'post 4', 'Lorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.Lorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.Lorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.Lorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.\r\nLorem ipsum odor amet, consectetuer adipiscing elit. Elit class vestibulum pretium porta fusce viverra. Gravida conubia efficitur montes hendrerit justo molestie id. Gravida mollis magnis dignissim augue sodales velit tortor nec massa. Tellus suscipit nisl ex pellentesque rutrum.', 4, 10, '/assets/images/posts/2024_09_04_02_09_01_29.jpg', '2024-09-04 03:31:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `created_at`) VALUES
(1, 'sepehr@example.com', '$2y$10$czp0O7STkfcTY6o2cpqyl.yFSPwRKMnvTpG.FCirHwpL4wrb8tc3W', 'sepehr', 'mahmoudi', '2024-09-01 01:08:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
