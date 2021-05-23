-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 11:53 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `article`
--

-- --------------------------------------------------------

--
-- Table structure for table `applid_tasks`
--

CREATE TABLE `applid_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectdetail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `register_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applid_tasks`
--

INSERT INTO `applid_tasks` (`id`, `projectdetail_id`, `project_id`, `register_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 6, 3, '2021-04-09 03:59:36', '2021-04-09 03:59:36'),
(2, 9, 6, 3, '2021-04-09 03:59:43', '2021-04-09 03:59:43'),
(3, 13, 6, 3, '2021-04-09 03:59:47', '2021-04-09 03:59:47'),
(4, 8, 6, 3, '2021-04-09 04:57:12', '2021-04-09 04:57:12'),
(5, 14, 3, 3, '2021-04-11 03:52:44', '2021-04-11 03:52:44'),
(6, 15, 6, 3, '2021-04-11 03:55:34', '2021-04-11 03:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_03_30_155333_create_registers_table', 1),
(10, '2021_04_05_062717_create_projects_table', 1),
(11, '2021_04_05_070225_create_project_deatils_table', 1),
(13, '2021_04_08_112917_create_applid_tasks_table', 2);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'hello', '2021-04-05 04:11:34', '2021-04-05 04:11:34'),
(3, 'hello', '2021-04-05 04:12:27', '2021-04-05 04:12:27'),
(5, 'hello', '2021-04-05 05:07:08', '2021-04-05 05:07:08'),
(6, 'abdullah khan', '2021-04-06 01:10:07', '2021-04-09 00:15:57'),
(9, 'to day project is Beast', '2021-04-09 00:01:39', '2021-04-09 00:01:39'),
(10, 'polution', '2021-04-11 03:49:11', '2021-04-11 03:49:11'),
(11, 'name of project is', '2021-04-11 04:14:39', '2021-04-11 04:14:39'),
(12, 'hello', '2021-04-11 04:20:50', '2021-04-11 04:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `register_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `task_name`, `project_id`, `register_id`, `created_at`, `updated_at`) VALUES
(2, 'ASDFGH1', 2, 2, NULL, '2021-04-11 03:50:19'),
(6, 'my name is abdullah', 6, 1, '2021-04-06 08:12:43', '2021-04-07 05:01:43'),
(8, 'ho', 6, 3, '2021-04-07 00:28:22', '2021-04-09 04:58:05'),
(9, 'hello', 6, 3, '2021-04-07 00:29:36', '2021-04-11 03:50:58'),
(10, 'ho', 6, NULL, '2021-04-08 01:41:12', '2021-04-08 01:41:12'),
(13, 'hi', 6, 3, '2021-04-09 00:15:38', '2021-04-09 04:55:05'),
(14, 'hellllll', 3, NULL, '2021-04-10 07:59:02', '2021-04-10 07:59:02'),
(15, 'hello', 6, NULL, '2021-04-11 03:49:36', '2021-04-11 03:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abdullah', 'abdullahkhan@gmail.com', '$2y$10$yqPZ7CHK8xZmD5V.z5SyyOvnqD7fCpCvFonLNucrx9r7aON29lwxO', 1, 1, '2021-04-05 02:12:35', '2021-04-05 02:12:35'),
(2, NULL, 'abdullahkhurshid41@gmail.com', '$2y$10$4B1MOCwuEMDlwkl3yWV.yeLLcFHwsfCK.QnLc9pUGy7ucZeiYTmEe', 3, 1, '2021-04-05 02:14:01', '2021-04-05 02:14:01'),
(3, NULL, 'khan@gmail.com', '$2y$10$JnbY8GdXyk1eclOPaqvMv.Ihjo9n7yRUWr.BDnZxN8JVd1IesUdva', 2, 1, '2021-04-06 02:43:39', '2021-04-06 02:43:39'),
(4, NULL, 'uzairnawaz98@yahoo.com', '$2y$10$5jfhAOzcX.Lw6rLnMRu3VubsYZ/BxNYDY/N3xyCKM4lLOoYaEEi0W', 3, 1, '2021-04-07 05:41:20', '2021-04-07 05:41:20'),
(5, NULL, 'faiza00aiza@gmail.com', '$2y$10$xFG823i7hD5S0FNCJ5Tgp.cPLH5wAVZPsmVpstFmPJLEyTZYTL5g2', 2, 1, '2021-04-11 03:47:32', '2021-04-11 03:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applid_tasks`
--
ALTER TABLE `applid_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applid_tasks_projectdetail_id_foreign` (`projectdetail_id`),
  ADD KEY `applid_tasks_project_id_foreign` (`project_id`),
  ADD KEY `applid_tasks_register_id_foreign` (`register_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_deatils_project_id_foreign` (`project_id`),
  ADD KEY `project_deatils_register_id_foreign` (`register_id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `applid_tasks`
--
ALTER TABLE `applid_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applid_tasks`
--
ALTER TABLE `applid_tasks`
  ADD CONSTRAINT `applid_tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applid_tasks_projectdetail_id_foreign` FOREIGN KEY (`projectdetail_id`) REFERENCES `project_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applid_tasks_register_id_foreign` FOREIGN KEY (`register_id`) REFERENCES `registers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_details`
--
ALTER TABLE `project_details`
  ADD CONSTRAINT `project_deatils_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_deatils_register_id_foreign` FOREIGN KEY (`register_id`) REFERENCES `registers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
