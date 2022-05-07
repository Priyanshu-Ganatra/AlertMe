-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 07:38 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) DEFAULT NULL,
  `a_pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_header` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_location` text NOT NULL,
  `has_images` tinyint(1) NOT NULL DEFAULT 0,
  `images` text DEFAULT NULL,
  `has_videos` tinyint(4) DEFAULT 0,
  `videos` text DEFAULT NULL,
  `real_count` int(11) DEFAULT 0,
  `fake_count` int(11) DEFAULT 0,
  `share_count` int(11) DEFAULT 0,
  `comments_count` int(11) DEFAULT 0,
  `posted_on` datetime DEFAULT current_timestamp(),
  `post_city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_header`, `post_location`, `has_images`, `images`, `has_videos`, `videos`, `real_count`, `fake_count`, `share_count`, `comments_count`, `posted_on`, `post_city`) VALUES
(17, 28, 'My first post', 'Gurudev nagar', 0, '1651402255people.jpg', 0, NULL, 0, 0, 0, 0, '2022-05-01 16:20:55', 'Yavatmal'),
(18, 28, 'My second post', 'Gilani nagar', 0, '1651404750Screenshot 2022-03-23 101647.png', 0, NULL, 0, 0, 0, 0, '2022-05-01 17:02:30', 'Yavatmal'),
(19, 28, 'My third post', 'Gilani nagar', 0, '1651404848', 0, NULL, 0, 0, 0, 0, '2022-05-01 17:04:08', 'Yavatmal'),
(20, 28, 'My 4th post', 'Gurudev nagar', 0, '1651406566france.png', 0, NULL, 0, 0, 0, 0, '2022-05-01 17:32:46', 'Yavatmal'),
(21, 28, 'My 5th post', 'Gurudev nagar', 0, '1651406775', 0, NULL, 0, 0, 0, 0, '2022-05-01 17:36:15', 'Yavatmal'),
(22, 29, 'My first post', 'Gurudev nagar', 0, '1651407189germany.png', 0, NULL, 0, 0, 0, 0, '2022-05-01 17:43:09', 'Yavatmal'),
(23, 29, 'My second post', 'Gilani nagar', 0, '1651407869japan.png', 0, NULL, 0, 0, 0, 0, '2022-05-01 17:54:29', 'Yavatmal');

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure for table `subscribers_list`
--

CREATE TABLE `subscribers_list` (
  `id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `u_pwd` char(60) DEFAULT NULL,
  `pfp` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `ac_status` int(11) NOT NULL COMMENT '0=e-mail unverified, 1=e-mail verified, 2=blocked',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `about` text DEFAULT '',
  `verified` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `u_pwd`, `pfp`, `email`, `city`, `age`, `ac_status`, `created_on`, `updated_on`, `about`, `verified`) VALUES
(28, 'Priyanshu', 'Ganatra', 'e10adc3949ba59abbe56e057f20f883e', '1651344525people.jpg', 'priyanshuganatra@gmail.com', 'Yavatmal', 19, 1, '2022-04-29 15:25:10', '2022-05-07 22:56:26', 'This is priyanshu!', 0),
(29, 'New', 'User', '081a311f4fd497a5c42c6ac1dd8ca296', 'profile.png', 'cpetest3008@gmail.com', 'Yavatmal', 18, 1, '2022-04-30 18:21:38', '2022-05-07 22:22:58', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
