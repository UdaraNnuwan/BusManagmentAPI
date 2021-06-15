-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 02:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assign`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehical_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `name`, `type`, `vehical_number`, `created_at`, `updated_at`) VALUES
(1, 'unk', 'Udara', 'BB2255kkk', '2021-06-11 06:30:07', '2021-06-11 06:30:07'),
(2, 'unk', 'Udara', 'BB2255kkk', '2021-06-11 08:01:31', '2021-06-11 08:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`id`, `bus_id`, `route_id`, `status`, `created_at`, `updated_at`) VALUES
(13, 1, 1, 'active', '2021-06-11 08:12:43', '2021-06-11 08:12:43'),
(14, 1, 2, 'active', '2021-06-11 08:12:49', '2021-06-11 08:12:49'),
(16, 1, 2, 'active', '2021-06-11 09:32:28', '2021-06-11 09:32:28'),
(17, 2, 1, 'active', '2021-06-11 09:36:00', '2021-06-11 09:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `bus_schedules`
--

CREATE TABLE `bus_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_route_id` bigint(20) UNSIGNED NOT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_timestamp` time NOT NULL,
  `end_timestamp` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_schedules`
--

INSERT INTO `bus_schedules` (`id`, `bus_route_id`, `direction`, `start_timestamp`, `end_timestamp`, `created_at`, `updated_at`) VALUES
(3, 13, 'reverse', '00:00:04', '00:00:06', '2021-06-12 02:28:07', '2021-06-12 02:28:07'),
(4, 13, 'reverse', '20:00:00', '06:00:00', '2021-06-12 02:28:51', '2021-06-12 02:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `bus_schedule_bookings`
--

CREATE TABLE `bus_schedule_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_seat_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bus_schedule_id` bigint(20) UNSIGNED NOT NULL,
  `seat_number` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_schedule_bookings`
--

INSERT INTO `bus_schedule_bookings` (`id`, `bus_seat_id`, `user_id`, `bus_schedule_id`, `seat_number`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 13, '1', '1', '2021-06-12 04:26:59', '2021-06-12 04:26:59'),
(2, 1, 1, 4, 13, '1', '0', '2021-06-12 04:31:50', '2021-06-12 04:31:50'),
(3, 1, 2, 4, 13, '1', '1', '2021-06-12 04:32:05', '2021-06-12 04:32:05'),
(4, 1, 2, 4, 13, '1', '1', '2021-06-12 04:32:59', '2021-06-12 04:32:59'),
(5, 1, 2, 4, 13, '1', '1', '2021-06-12 04:33:01', '2021-06-12 04:33:01'),
(6, 1, 2, 4, 13, '1', '1', '2021-06-12 04:33:58', '2021-06-12 04:33:58'),
(11, 1, 2, 4, 12, '1', '1', '2021-06-12 04:59:26', '2021-06-12 04:59:26'),
(12, 1, 2, 4, 12, '1', '1', '2021-06-12 04:59:37', '2021-06-12 04:59:37'),
(13, 1, 2, 4, 12, '1', '1', '2021-06-12 05:00:08', '2021-06-12 05:00:08'),
(14, 1, 2, 4, 12, '1', '1', '2021-06-12 05:00:09', '2021-06-12 05:00:09'),
(15, 1, 2, 4, 13, '1', '1', '2021-06-12 05:10:12', '2021-06-12 05:10:12'),
(16, 1, 2, 4, 13, '1', '1', '2021-06-12 05:24:38', '2021-06-12 05:24:38'),
(17, 1, 2, 4, 13, '1', '1', '2021-06-12 05:26:06', '2021-06-12 05:26:06'),
(18, 1, 2, 4, 13, '1', '1', '2021-06-12 05:26:18', '2021-06-12 05:26:18'),
(19, 1, 2, 4, 13, '1', '1', '2021-06-12 05:26:50', '2021-06-12 05:26:50'),
(20, 1, 3, 3, 13, '100', '1', '2021-06-14 07:41:32', '2021-06-14 07:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `bus_seats`
--

CREATE TABLE `bus_seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `seat_number` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_seats`
--

INSERT INTO `bus_seats` (`id`, `bus_id`, `seat_number`, `price`, `availability`, `created_at`, `updated_at`) VALUES
(1, 2, 13, '200', 0, '2021-06-12 00:07:43', '2021-06-14 07:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_06_10_081142_create_routes_table', 1),
(5, '2021_06_10_081204_create_buses_table', 1),
(6, '2021_06_10_081225_create_bus_routes_table', 1),
(7, '2021_06_10_081243_create_bus_schedules_table', 1),
(8, '2021_06_10_081312_create_bus_seats_table', 1),
(9, '2021_06_10_081346_create_bus_schedule_bookings_table', 1),
(10, '2021_06_15_080709_create_password_resets_table', 2),
(11, '2021_06_15_081142_create_password_resets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 1, 'AssignmentToken', 'cc16ce0f7f8a363486f37b1e1e7ed60bd69e879474b897bbd3700c38d2b68b9b', '[\"*\"]', NULL, '2021-06-11 06:15:46', '2021-06-11 06:15:46'),
(4, 'App\\User', 1, 'User Token', '74e3702e3a9f1cb1f3ff20eed9d772a37fcd3f8151be73863211a8d580204c84', '[\"*\"]', NULL, '2021-06-11 06:33:56', '2021-06-11 06:33:56'),
(5, 'App\\User', 2, 'User Token', 'c5e08d70c92f9b58f88669be2e92596f6c08979a5b113a4cb4c6676af443b18a', '[\"*\"]', NULL, '2021-06-12 01:45:23', '2021-06-12 01:45:23'),
(10, 'App\\User', 4, 'AssignmentToken', 'dd361f59bb465794977b0b3758b849a8ec24be449215f2a26ad9088b64c0ce2b', '[\"*\"]', NULL, '2021-06-15 03:02:36', '2021-06-15 03:02:36'),
(11, 'App\\User', 1, 'usertoken', 'd8a0c9e240ea9b94600133593d4206024e43044485b879c1f698000a84d9468b', '[1]', NULL, '2021-06-15 06:16:25', '2021-06-15 06:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `node_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `node_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `node_one`, `node_two`, `route_number`, `distance`, `time`, `created_at`, `updated_at`) VALUES
(1, 'mattegoda', 'pitakotuwa', '138/2', '22', '5hr', '2021-06-11 06:32:04', '2021-06-11 06:32:04'),
(2, 'mattegoda', 'pitakotuwa', '138/2', '22', '5hr', '2021-06-11 08:01:13', '2021-06-11 08:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$/hdA1dFIvqPT4TPCV4w7RudpQP869F2sEZ0Fv81vnzw.tZn7PWK1u', 1, 'tvuoidF5LwyQ29ouC0kE5fIhJATvtyL5c6kKOSsAKRVi35GXS3EiRDuOAATt', '2021-06-11 06:15:46', '2021-06-15 06:19:13'),
(2, 'customer', 'customer@gmail.com', '$2y$10$n1HTCBvfH8ma2VEl5r22sumyNcaaONmqkSTjJOHysf7FDzQElmOGu', 2, NULL, '2021-06-11 06:18:26', '2021-06-11 06:18:26'),
(3, 'Admin2', 'admin2@gmail.com', '$2y$10$DPzQJrSoJB.QT9zL3RYI3OyRiA8jiWJyhpHkgH705AT0qG1ckj82i', 1, NULL, '2021-06-14 03:56:37', '2021-06-14 03:56:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_routes_bus_id_foreign` (`bus_id`),
  ADD KEY `bus_routes_route_id_foreign` (`route_id`);

--
-- Indexes for table `bus_schedules`
--
ALTER TABLE `bus_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_schedules_bus_route_id_foreign` (`bus_route_id`);

--
-- Indexes for table `bus_schedule_bookings`
--
ALTER TABLE `bus_schedule_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seat_number` (`bus_seat_id`),
  ADD KEY `bus_schedule_bookings_user_id_foreign` (`user_id`),
  ADD KEY `bus_schedule_bookings_bus_schedule_id_foreign` (`bus_schedule_id`);

--
-- Indexes for table `bus_seats`
--
ALTER TABLE `bus_seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_seats_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
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
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bus_schedules`
--
ALTER TABLE `bus_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bus_schedule_bookings`
--
ALTER TABLE `bus_schedule_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bus_seats`
--
ALTER TABLE `bus_seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD CONSTRAINT `bus_routes_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`),
  ADD CONSTRAINT `bus_routes_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`);

--
-- Constraints for table `bus_schedules`
--
ALTER TABLE `bus_schedules`
  ADD CONSTRAINT `bus_schedules_bus_route_id_foreign` FOREIGN KEY (`bus_route_id`) REFERENCES `bus_routes` (`id`);

--
-- Constraints for table `bus_schedule_bookings`
--
ALTER TABLE `bus_schedule_bookings`
  ADD CONSTRAINT `bus_schedule_bookings_bus_schedule_id_foreign` FOREIGN KEY (`bus_schedule_id`) REFERENCES `bus_schedules` (`id`),
  ADD CONSTRAINT `bus_schedule_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seat_number` FOREIGN KEY (`bus_seat_id`) REFERENCES `bus_seats` (`id`);

--
-- Constraints for table `bus_seats`
--
ALTER TABLE `bus_seats`
  ADD CONSTRAINT `bus_seats_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
