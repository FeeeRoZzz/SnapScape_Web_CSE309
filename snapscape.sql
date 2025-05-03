-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 04:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snapscape`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `photographers` int(11) NOT NULL,
  `videographers` int(11) NOT NULL,
  `requirements` text DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `booking_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `event_title`, `event_date`, `photographers`, `videographers`, `requirements`, `payment_method`, `transaction_id`, `booking_date`) VALUES
(1, 'Product Launch', '2025-04-14', 1, 1, 'sd', 'bKash', 'sss', '2025-04-28 21:38:48'),
(2, 'Corporate Summit', '2025-04-03', 1, 2, 'ff', 'bKash', 'ss', '2025-04-28 21:39:30'),
(3, 'Product Launch', '2025-04-03', 1, 2, '2', 'MasterCard', 'dd', '2025-04-28 21:51:11'),
(4, 'Graduation Ceremony', '2025-04-24', 1, 1, 'ooo', 'bKash', 'sssss', '2025-04-28 21:55:59'),
(5, 'Product Launch', '2025-04-11', 1, 2, 'GOOD', 'Visa', 'AQWSA2WEES', '2025-04-29 00:49:03'),
(6, 'Corporate Summit', '2025-05-20', 1, 1, 'NEED BEST', 'Visa', 'ASQWEVDDDS', '2025-05-03 15:34:27'),
(7, 'Product Launch', '2025-06-27', 3, 2, 'Hi , I Need Best PG for my projects', 'Visa', 'GGVGHJSOK', '2025-05-03 19:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`) VALUES
(2, 3, 6, 'OK', '2025-04-28 18:50:35'),
(3, 4, 7, 'done', '2025-05-03 09:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `promo_code` varchar(50) DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `enrollment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `course_name`, `name`, `mobile`, `promo_code`, `payment_method`, `enrollment_date`) VALUES
(1, 'Basic to Advance Photography', 'ss', 'ss', 'ss', 'MasterCard', '2025-04-28 22:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(2, 4, 7, '2025-05-03 09:26:51'),
(3, 5, 8, '2025-05-03 13:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `photo_path`, `created_at`) VALUES
(4, 3, 'HI', NULL, '2025-04-28 07:37:56'),
(5, 3, 'we', 'Uploads/2025_03_31_10_05_IMG_3547.JPG', '2025-04-28 07:38:06'),
(6, 3, 'Hi', NULL, '2025-04-28 18:50:30'),
(7, 4, 'hi', NULL, '2025-05-03 09:26:46'),
(8, 5, 'Hi , i am Arhan a new photographer .', NULL, '2025-05-03 13:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `promo` varchar(50) DEFAULT NULL,
  `class_date` date NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `course`, `name`, `mobile`, `email`, `promo`, `class_date`, `payment_method`, `created_at`) VALUES
(1, 'Social Media Content Creation', 'd', 'd', 'd@yy.com', 'dd', '2025-04-16', 'Visa', '2025-04-28 22:51:54'),
(2, 'Social Media Content Creation', 'd', 'd', 'd@yy.com', 'dd', '2025-04-16', 'Visa', '2025-04-28 22:52:20'),
(3, 'Portrait Photography', 'FEROZ MAHMUD', '01872801865', 'burgerboy_sheikh2021@yahoo.com', 'QAQA', '2025-04-18', 'MasterCard', '2025-04-28 23:00:55'),
(4, 'Portrait Photography', 'ss', '01872801865', 'ssss@yahoo.com', 'ss', '2025-04-04', 'bKash', '2025-04-28 23:01:39'),
(5, 'Mobile Photography', 'ARAF', '01872801865', '2030036@iub.edu.bd', 'QA', '2025-04-15', 'Visa', '2025-04-28 23:11:02'),
(6, 'Mobile Photography', 'ARAF', '01872801865', '2030036@iub.edu.bd', 'QA', '2025-04-15', 'Visa', '2025-04-28 23:11:02'),
(7, 'Portrait Photography', 'FEROZ MAHMUD', '01872801865', 'burgerboy_sheikh2021@yahoo.com', 'AS', '2025-04-24', 'Visa', '2025-04-29 00:51:51'),
(8, 'DSLR Fundamentals', 'FEROZ MAHMUD', '01872801865', 'jdkfhjfdhjkdh@gg.c', 'LOVE', '2025-04-03', 'Visa', '2025-04-29 00:53:52'),
(9, 'Video Editing Masterclass', 'AL-AMIN', '01911344520', 'burgerboy_sheikh2021@yahoo.com', 'LOCK', '2025-05-01', 'MasterCard', '2025-04-29 01:00:14'),
(10, 'Mobile Photography', 'FAHIM ARHAM', '01872801865', 'burgerboy_sheikh2021@yahoo.com', 'FZ123', '2025-04-30', 'Visa', '2025-05-03 15:41:04'),
(11, 'Documentary Filmmaking', 'TALHA NABIL', '01872801865', 'burgerboy_sheikh2021@yahoo.com', 'SA', '2025-05-17', 'Nagad', '2025-05-03 15:42:12'),
(12, 'Landscape Photography', 'Arham Hossain', '01872801877', 'mahmud.feroz2000@gmail.com', 'FZ123', '2025-06-28', 'bKash', '2025-05-03 19:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`, `created_at`) VALUES
(3, 'Feroz', '$2y$10$Ylh6wXYvosTJ/T4kzGTPDeAXejIFQ1XhvdnxpxCx7ob6Mks7w6fcG', 'photographer', '2025-04-28 07:34:36'),
(4, 'fahim', '$2y$10$HCojuHa/ksR7SPfBIXGdGOsnsdgoha1ewKoPvn8wQbN8oaMqHt9DC', 'videographer', '2025-05-03 09:26:13'),
(5, 'arham', '$2y$10$EGCTx27manJJLF0C0sHrHubf9GUCBMX8Ghyl9WhKPVE1nKFVuZV7S', 'photographer', '2025-05-03 13:03:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_like` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
