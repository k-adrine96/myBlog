-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2018 at 11:57 AM
-- Server version: 5.7.20-log
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myBlog`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2018_05_27_102208_update_users_table', 2),
(26, '2018_05_27_103253_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `img`, `status`, `created_at`, `updated_at`) VALUES
(6, 2, 'Title 55', 'Description 55', 'img1.png', 1, '2018-05-28 09:00:03', '2018-05-30 02:18:29'),
(7, 2, 'Title 444khn', 'Description 44uyqgtwei', 'img1.png', 1, '2018-05-28 09:00:03', '2018-05-30 02:39:42'),
(9, 1, 'wdeaw', 'sds', 'img1.png', 1, '2018-05-30 03:41:48', '2018-05-30 03:41:48'),
(10, 1, 'dsf', 'sdf', 'img1.png', 1, '2018-05-30 03:43:42', '2018-05-30 03:43:42'),
(11, 1, 'sd', 'sd', 'img1.png', 1, '2018-05-30 03:56:37', '2018-05-30 03:56:37'),
(12, 1, 'zdfzsd', 'sdf', 'img1.png', 1, '2018-05-30 04:18:32', '2018-05-30 04:18:32'),
(13, 1, 'zdfzsd', 'sdf', 'img1.png', 1, '2018-05-30 04:18:51', '2018-05-30 04:18:51'),
(14, 1, 'new Item', 'TESTEST', 'img1.png', 1, '2018-05-30 04:19:15', '2018-05-30 04:19:15'),
(15, 1, 'AAAAAAAA', 'BBBBBBBB', 'img1.png', 1, '2018-05-30 04:21:12', '2018-05-30 04:21:12'),
(16, 1, 'Test', 'test', 'img1.png', 1, '2018-05-30 04:41:01', '2018-05-30 04:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `phone`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '', 'admin@admin.com', '', 1, '$2y$10$yBJqTNwhwyxaASDUaO6FyejONDg/MmQzsf9e647PJ4MMJRNrNGnRm', 'L8pL6k7JPCMYwdUT00oN22gSDkrbxQYdTdovFgWnWOc8Vxaeo7bgqnUUswyi', '2018-05-28 09:00:03', '2018-05-28 09:00:03'),
(2, 'user', '', 'user@user.com', '', 0, '$2y$10$Cmb0Pli3feebEuGjj9YDNu5xd6.9/vM7qtxTl1Rp0oLXqP0uhdigS', 'ID7tQ2LVtSVldyuucr0ZZ3TT7iLmsP8yjS1Qj95AzK90BYVrBBHNLRuEH6TM', '2018-05-28 09:10:18', '2018-05-28 09:10:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
