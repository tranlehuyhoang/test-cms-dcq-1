-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3309
-- Thời gian đã tạo: Th1 09, 2024 lúc 11:03 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test-cms-dcq-1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `code`, `address`, `phone`, `facebook`, `created_at`, `updated_at`) VALUES
(1, 'Customer1', 'customer1', NULL, NULL, NULL, NULL, NULL),
(2, 'Customer2', 'customer2', NULL, NULL, NULL, NULL, NULL),
(3, 'Customer3', 'customer3', 'Duhok, Iraq', NULL, 'https://www.facebook.com', '2024-01-05 10:21:27', '2024-01-05 10:21:27'),
(4, 'Customer4', 'customer4', 'Thành phố Hồ Chí Minh, Việt Nam', NULL, 'https://www.facebook.com', '2024-01-05 10:21:27', '2024-01-05 10:21:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dcq_projects`
--

CREATE TABLE `dcq_projects` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `budget` int(20) DEFAULT NULL,
  `customer_id` int(20) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','pending') NOT NULL DEFAULT 'active',
  `due_date` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `progress` double(5,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dcq_projects`
--

INSERT INTO `dcq_projects` (`id`, `name`, `code`, `budget`, `customer_id`, `description`, `status`, `due_date`, `start_date`, `progress`, `created_at`, `updated_at`) VALUES
(1, 'Project1', 'project1', NULL, 1, NULL, 'active', '2024-01-30 10:30:48', NULL, 30.50, NULL, NULL),
(2, 'Project2', 'project2', NULL, 1, NULL, 'active', '2024-01-30 10:30:48', NULL, 30.50, NULL, NULL),
(3, 'Project3', 'project3', 10000000, 1, NULL, 'active', '2024-01-31 23:30:00', NULL, 0.00, '2024-01-03 08:48:33', '2024-01-05 04:13:58'),
(4, 'Project4', 'project4', NULL, 2, '', 'active', '2024-01-31 06:16:00', NULL, NULL, '2024-01-04 00:55:55', '2024-01-06 23:16:23'),
(6, 'Project5', 'project5', 1000000, 3, '', 'pending', '2024-01-13 10:30:00', NULL, NULL, '2024-01-05 03:34:14', '2024-01-07 10:40:36'),
(7, 'Project6', 'project6', 15000000, 1, '', 'pending', '2024-01-31 00:00:00', NULL, NULL, '2024-01-05 04:00:51', '2024-01-07 10:40:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(160) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(160) NOT NULL,
  `name` varchar(160) NOT NULL,
  `file_name` varchar(160) NOT NULL,
  `mime_type` varchar(160) DEFAULT NULL,
  `disk` varchar(160) NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` text NOT NULL,
  `custom_properties` text NOT NULL,
  `responsive_images` text NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `conversions_disk` varchar(160) DEFAULT NULL,
  `uuid` char(36) DEFAULT NULL,
  `generated_conversions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_09_074330_create_task_comments_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revenue`
--

CREATE TABLE `revenue` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` int(20) DEFAULT NULL,
  `type` enum('expense','revenue') DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `revenue`
--

INSERT INTO `revenue` (`id`, `name`, `total`, `type`, `note`, `entry_date`, `created_at`, `updated_at`) VALUES
(1, 'Công dự án 1', 5000000, 'revenue', '', '2024-01-03 14:08:28', '2024-01-04 13:02:10', '2024-01-04 13:02:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `code`) VALUES
(1, 'Admin', 'admin'),
(2, 'Manager', 'manager'),
(3, 'Fresher', 'fresher'),
(4, 'Developer', 'developer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tasks`
--

CREATE TABLE `tasks` (
  `id` int(20) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assign_to` int(20) DEFAULT NULL,
  `created_by` int(20) DEFAULT NULL,
  `approved_by` int(20) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `task_value` double(5,2) DEFAULT NULL,
  `parent_id` int(20) DEFAULT 0,
  `project_id` int(20) DEFAULT NULL,
  `priority` enum('hight','medium','low') NOT NULL DEFAULT 'medium',
  `status` enum('in_progress','pending','complete','awaiting confirmation','to do') NOT NULL DEFAULT 'to do',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tasks`
--

INSERT INTO `tasks` (`id`, `code`, `name`, `description`, `assign_to`, `created_by`, `approved_by`, `due_date`, `task_value`, `parent_id`, `project_id`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 'task01', 'Task 01', '', 3, 2, 3, '2024-01-06 09:30:00', 1.00, 0, 1, 'low', 'to do', NULL, '2024-01-02 21:14:14'),
(3, 'task02', 'Task 02', '', 3, NULL, 3, '2024-01-31 01:23:00', 1.00, 0, 1, 'medium', 'to do', '2024-01-02 06:15:40', '2024-01-03 18:23:33'),
(4, 'task03', 'Task 03', '', 3, NULL, 3, '2024-01-13 23:30:00', 5.00, 0, 2, 'low', 'to do', '2024-01-02 21:41:13', '2024-01-02 21:50:48'),
(5, 'task04', 'Task 04', '', 3, NULL, 3, '2024-01-04 02:36:00', 10.00, 0, 4, 'medium', 'to do', '2024-01-03 17:57:34', '2024-01-03 19:37:09'),
(6, 'task05', 'Task 05', '', 3, NULL, 3, '2023-12-28 09:00:00', 4.00, 5, 4, 'low', 'complete', '2024-01-03 18:02:36', '2024-01-03 18:14:34'),
(7, NULL, 'Task 06', '', 3, NULL, 3, '2024-01-04 00:00:00', 4.00, 5, 4, 'medium', 'to do', '2024-01-03 18:18:33', '2024-01-03 18:18:33'),
(8, NULL, 'Task 07', '', 3, NULL, 3, '2024-01-05 00:30:00', 1.00, 5, 4, 'medium', 'to do', '2024-01-03 18:21:59', '2024-01-03 19:17:46'),
(9, NULL, 'Task 08', NULL, 3, NULL, 3, '2024-01-05 00:30:00', 3.00, 0, 1, 'hight', 'complete', '2024-01-03 19:44:50', '2024-01-05 01:14:46'),
(10, NULL, 'Task 09', '', 3, NULL, 3, '2024-01-05 10:30:00', 3.00, 0, 1, 'hight', 'awaiting confirmation', '2024-01-03 20:05:06', '2024-01-04 01:33:20'),
(11, NULL, 'Task 10', NULL, 6, NULL, 3, '2024-01-05 15:00:00', NULL, 0, 6, 'hight', 'to do', '2024-01-04 20:57:51', '2024-01-04 20:59:20'),
(12, NULL, 'Task 11', '', 3, NULL, 3, '2024-01-05 17:30:00', NULL, 0, 7, 'hight', 'to do', '2024-01-04 21:04:51', '2024-01-04 21:04:51'),
(13, NULL, 'Task 12', '', 3, NULL, 3, '2024-01-05 23:30:00', NULL, 0, 3, 'medium', 'to do', '2024-01-04 21:12:12', '2024-01-04 21:12:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task_comments`
--

CREATE TABLE `task_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` tinyint(4) NOT NULL,
  `create_by` tinyint(4) NOT NULL,
  `content` varchar(255) NOT NULL,
  `reply_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `task_comments`
--

INSERT INTO `task_comments` (`id`, `task_id`, `create_by`, `content`, `reply_id`, `created_at`, `updated_at`) VALUES
(1, 111, 2, '123123', 111, '2024-01-08 01:30:00', '2024-01-09 01:30:00'),
(2, 1, 2, '123123', 111, '2024-01-09 01:33:40', '2024-01-09 01:33:40'),
(3, 1, 2, '123123123', 111, '2024-01-09 01:34:38', '2024-01-09 01:34:38'),
(4, 1, 2, '123123', 0, '2024-01-01 02:25:27', '2024-01-09 02:25:27'),
(5, 1, 2, '123213', 0, '2024-01-09 02:49:09', '2024-01-09 02:49:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `facebook`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@dcq.com', NULL, '$2y$12$w.K5L2jT3wC2et1j8xcfEevwiwJOTHHkBFpOjsqioR8s3SeQGT9f6', 'OEZRzDZQt1YGqhS4hZtp9nEPeO50KomUVetbinz9NmGhvJYXmQJQCnXHgAWM', '1', NULL, '2023-12-30 08:13:16', '2023-12-30 08:13:16'),
(3, 'User1', 'user1@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '2', NULL, '2024-01-02 18:46:10', '2024-01-02 18:46:10'),
(4, 'User2', 'user2@gmail.com', NULL, '$2y$12$N5HpUYgCvk9.zAUS556uhOiE1/LF8jMjXzo2BLxFlNkdqIFbWB8ny', NULL, '2', NULL, '2024-01-02 20:37:18', '2024-01-02 20:48:25'),
(5, 'User3', 'user3@dcq.com', NULL, '$2y$12$rY2ACMJwww6fBGTMF94jz.vSDzMUa2h.a2MyhuGYr4yANpvh8Qsri', NULL, '3', 'https://www.facebook.com/HA58.PROTT', '2024-01-04 20:27:48', '2024-01-04 20:27:48'),
(6, 'User4', 'user4@dcq.com', NULL, '$2y$12$qyFP9YiJ.zv1yY5NlfJr5O4KbZ3g3KoFbXvFwsQat7Ge.nntjwlRW', NULL, '4', NULL, '2024-01-04 20:59:11', '2024-01-04 20:59:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dcq_projects`
--
ALTER TABLE `dcq_projects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `task_comments`
--
ALTER TABLE `task_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dcq_projects`
--
ALTER TABLE `dcq_projects`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `revenue`
--
ALTER TABLE `revenue`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
