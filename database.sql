-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 01:23 PM
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
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'rubel', 'rubel', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Foundation', NULL, '2024-02-24 15:31:12', '2024-02-24 15:31:12'),
(2, 'Eyeshadow', NULL, '2024-02-24 15:32:31', '2024-02-24 15:32:31'),
(3, 'Lipstick', NULL, '2024-02-24 15:32:38', '2024-02-24 15:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(30) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `feature_images`
--

CREATE TABLE `feature_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_images`
--

INSERT INTO `feature_images` (`id`, `url`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '66c1fb329d0e91723988786.jpg', 6, '2024-08-18 13:46:26', '2024-08-18 13:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `remarkable` varchar(200) DEFAULT NULL,
  `Dcharge` smallint(5) UNSIGNED NOT NULL,
  `bill` int(11) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `name`, `phone`, `address`, `remarkable`, `Dcharge`, `bill`, `status_id`, `created_at`, `updated_at`) VALUES
(22, 'Rubaya', '01684572065', '125 west kafrul taltola', NULL, 70, 830, 1, '2024-03-06 15:03:07', '2024-03-06 15:03:07'),
(23, 'নাসির আহমেদ রুবেল', '০১৩১০৮৫২৮২৪', '১১৯ পশ্চিম কাফরুল তালতলা', NULL, 70, 830, 1, '2024-03-06 21:09:51', '2024-03-06 21:09:51'),
(24, 'shafiqu asad', '01914917079', 'dokkhinkhan majar er samne', NULL, 150, 1650, 1, '2024-03-07 10:21:58', '2024-03-07 10:21:58'),
(25, 'test1', '01310852824', 'test1', NULL, 150, 930, 1, '2024-03-07 13:15:48', '2024-03-07 13:15:48'),
(26, 'sdfsdf', '০১৩১০৮৫২৮২৪', 'sdfsdfsdfsdf sdfsdfsdfsdf sdfsdfsdfsdf sdfsdfsdfsdf sdfsdfsdfsdf sdfsdfsdfsdf', NULL, 150, 370, 1, '2024-03-07 13:20:19', '2024-03-07 13:20:19'),
(27, 'নাসির আহমেদ রুবেল', '০১৩১০৮৫২৮২৪', '১১৯ পশ্চিম কাফরুল তালতলা', NULL, 150, 410, 1, '2024-03-09 16:58:20', '2024-03-09 16:58:20'),
(28, 'নাসির আহমেদ রুবেল', '01914917079', '১১৯ পশ্চিম কাফরুল তালতলা', NULL, 70, 350, 1, '2024-03-09 17:19:34', '2024-03-09 17:19:34'),
(29, 'Nasir Ahmed Rubel', '01996557748', '119 west kafrul agargaon taltola', NULL, 70, 730, 1, '2024-03-18 10:10:14', '2024-03-18 10:10:14'),
(30, 'NASIR AHMED RUBEL', '01310852824', '119 (Sardar tower) West Kafrul Agargaon Taltola', NULL, 150, 650, 1, '2024-08-01 20:02:31', '2024-08-01 20:02:31'),
(31, 'NASIR AHMED RUBEL', '01310852824', '119 WEST KAFRUL, TALTOLA, DHAKA-1207', NULL, 150, 410, 1, '2024-11-01 12:09:34', '2024-11-01 12:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `product_id`, `invoice_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(24, 1, 22, 1, 220, '2024-03-06 15:03:07', '2024-03-06 15:03:07'),
(25, 2, 22, 1, 260, '2024-03-06 15:03:07', '2024-03-06 15:03:07'),
(26, 3, 22, 1, 280, '2024-03-06 15:03:07', '2024-03-06 15:03:07'),
(27, 1, 23, 1, 220, '2024-03-06 21:09:51', '2024-03-06 21:09:51'),
(28, 2, 23, 1, 260, '2024-03-06 21:09:51', '2024-03-06 21:09:51'),
(29, 3, 23, 1, 280, '2024-03-06 21:09:51', '2024-03-06 21:09:51'),
(30, 3, 24, 3, 280, '2024-03-07 10:21:59', '2024-03-07 10:21:59'),
(31, 1, 24, 3, 220, '2024-03-07 10:21:59', '2024-03-07 10:21:59'),
(32, 1, 25, 1, 220, '2024-03-07 13:15:48', '2024-03-07 13:15:48'),
(33, 3, 25, 2, 280, '2024-03-07 13:15:48', '2024-03-07 13:15:48'),
(34, 1, 26, 1, 220, '2024-03-07 13:20:19', '2024-03-07 13:20:19'),
(35, 2, 27, 1, 260, '2024-03-09 16:58:20', '2024-03-09 16:58:20'),
(36, 3, 28, 1, 280, '2024-03-09 17:19:34', '2024-03-09 17:19:34'),
(37, 1, 29, 3, 220, '2024-03-18 10:10:14', '2024-03-18 10:10:14'),
(38, 1, 30, 1, 220, '2024-08-01 20:02:31', '2024-08-01 20:02:31'),
(39, 3, 30, 1, 280, '2024-08-01 20:02:31', '2024-08-01 20:02:31'),
(40, 4, 31, 1, 260, '2024-11-01 12:09:34', '2024-11-01 12:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2024_01_12_120651_create_products_table', 4),
(35, '2024_01_29_133451_create_products_table', 5),
(50, '2024_02_24_140848_add_columns_to_invoices_table', 11),
(93, '2014_10_12_000000_create_users_table', 12),
(94, '2014_10_12_100000_create_password_reset_tokens_table', 12),
(95, '2019_08_19_000000_create_failed_jobs_table', 12),
(96, '2019_12_14_000001_create_personal_access_tokens_table', 12),
(97, '2024_01_07_130406_create_contacts_table', 12),
(98, '2024_01_08_125849_create_images_table', 12),
(99, '2024_01_20_125808_create_colors_table', 12),
(100, '2024_01_29_132836_create_categories_table', 12),
(101, '2024_01_29_211710_create_statuses_table', 12),
(102, '2024_01_29_211942_create_products_table', 12),
(103, '2024_02_07_195855_create_feature_images_table', 12),
(104, '2024_02_24_125830_create_status_orders_table', 12),
(105, '2024_02_24_125900_create_invoices_table', 12),
(106, '2024_02_24_133642_create_invoice_details_table', 12),
(107, '2024_03_08_224511_create_adminusers_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `img` varchar(100) NOT NULL,
  `description` longtext DEFAULT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `categories_id`, `status_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Sunisa Foundation', '1708810380.jpg', '<p>Sunisa Foundation</p>', 1, 2, 220, '2024-02-24 15:33:00', '2024-02-24 15:33:00'),
(2, 'Hot Foil', '1708810397.jpg', '<p>Hot Foil</p>', 2, 2, 260, '2024-02-24 15:33:17', '2024-02-24 15:33:17'),
(3, 'Huda 12pcs Lipstick', '1708810424.jpg', '<p>Huda 12pcs Lipstick</p>', 3, 1, 280, '2024-02-24 15:33:44', '2024-02-24 15:33:44'),
(4, 'magnetic lash', '1723904992.jpg', '<p>magnetic lash</p>', 2, 2, 260, '2024-08-17 14:29:52', '2024-08-17 14:29:52'),
(5, 'Imagic Mascara', '1723988618.jpg', '<p>Imagic Mascara</p>', 1, 2, 120, '2024-08-18 13:43:38', '2024-08-18 13:43:38'),
(6, 'Imagic Mascara', '1723988786.jpg', '<p>Imagic Mascara</p>', 1, 2, 120, '2024-08-18 13:46:26', '2024-08-18 13:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Inactive', '2024-02-24 15:31:12', '2024-02-24 15:31:12'),
(2, 'Active', '2024-02-24 15:31:12', '2024-02-24 15:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `status_orders`
--

CREATE TABLE `status_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_orders`
--

INSERT INTO `status_orders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Not Shipped', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rubel', 'rubel@google.com', NULL, '$2y$12$lSYx.eE4OpAU3idawQdhU.C1DXuGoLXLivqvCZRjyxQmLcGPQYm4y', NULL, '2024-03-08 16:56:35', '2024-03-08 16:56:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feature_images`
--
ALTER TABLE `feature_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_status_id_foreign` (`status_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_details_product_id_foreign` (`product_id`),
  ADD KEY `invoice_details_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categories_id_foreign` (`categories_id`),
  ADD KEY `products_status_id_foreign` (`status_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_orders`
--
ALTER TABLE `status_orders`
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
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_images`
--
ALTER TABLE `feature_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_orders`
--
ALTER TABLE `status_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `feature_images`
--
ALTER TABLE `feature_images`
  ADD CONSTRAINT `feature_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_orders` (`id`);

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoice_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
