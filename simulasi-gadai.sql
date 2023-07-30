-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 11:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simulasi-gadai`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tipe_barang` varchar(255) NOT NULL,
  `harga_barang` double NOT NULL,
  `spesifikasi` longtext NOT NULL,
  `image` text NOT NULL,
  `merk_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `tipe_barang`, `harga_barang`, `spesifikasi`, `image`, `merk_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'Redmi 10', 'Selene', 2300000, 'Ram 4GB\r\nRom 64GB\r\nChipset Mediatek Helio G88', 'barang/NFKmibQftYQpkJOdAjyOEJuWh8thC1Z53pooPZsq.jpg', 4, 2, '2023-07-27 02:04:03', '2023-07-28 01:09:27'),
(4, 'Lenovo IdeaPad Gaming 3', 'IG3', 14000000, 'Ram 8GB\r\nRom 1TB\r\nChipset Intel Core I7 Gen 12', 'barang/fsZaGYZhLvjDYcOIJUQKs6XeP4EwdnWoO4cGlyxJ.jpg', 2, 3, '2023-07-27 02:11:41', '2023-07-27 12:41:43'),
(6, 'ROG 3', 'ZFROG3', 13000000, 'Ram 8GB\r\nRom 1TB\r\nSnapdragon Gen 8', 'barang/ybbFiJQ2ertV3GRm2tiUp9HmJihjEAuAGu0HKwfh.jpg', 5, 2, '2023-07-28 01:31:11', '2023-07-28 06:49:09'),
(7, 'Infinix Hot 10', 'HP', 2300000, 'dajdhjasd', 'barang/smbS6kyuIePLUZzayU9gTk3KcsaPcor4AO1PYPX4.jpg', 6, 2, '2023-07-28 03:25:01', '2023-07-28 03:25:01'),
(8, 'Xiaomi 13 Pro', 'Xiaomi 13 Pro', 35499000, '12/256 GB', 'barang/P5Q0cVt6B2ygd09UyDyYT3p1DNhZFLYTOy7xwbUI.jpg', 4, 2, '2023-07-28 10:43:56', '2023-07-28 10:43:56'),
(9, 'Xiaomi Mix Fold 2', 'Xiaomi Mix Fold 2', 35499000, '12/512 GB', 'barang/hWWtC2vh04M5Cp1ONiFk1KcPG7dGV0TgaVdPLdnw.jpg', 4, 2, '2023-07-28 10:44:47', '2023-07-28 10:44:47'),
(10, 'Xiaomi 12 Pro', 'Xiaomi 12 Pro', 12999999, '12/256 GB', 'barang/6Wk3cmcwg4YrHsL7gL4PqJNVKSs05ZNK0ZNJfoub.jpg', 4, 2, '2023-07-28 10:45:46', '2023-07-28 10:45:46'),
(11, 'Xiaomi 13', 'Xiaomi 13', 13475000, '8/256 GB', 'barang/Gdg7g3oRMgDZJStdxdxrLN7Zxr9Jw8wqZLM0kqSK.jpg', 4, 2, '2023-07-28 10:48:03', '2023-07-28 10:48:03'),
(12, 'Redmi K60 Pro', 'Redmi K60 Pro', 10571000, '8/256 GB', 'barang/wKdCPDh09tL19fI5B9KM9bwbzQosrMArlhenO4I1.jpg', 4, 2, '2023-07-28 10:48:52', '2023-07-28 10:48:52'),
(13, 'Drone Dji', 'Drone Spark', 5000000, 'Bisa terbang', 'barang/5QfQCp3HUAviVydwFM5xBzCI8P8D0I9kmarysb1x.jpg', 7, 5, '2023-07-30 01:18:59', '2023-07-30 01:18:59');

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `image`, `created_at`, `updated_at`) VALUES
(2, 'HandPhone', 'kategori/y3EGQI4vfnOlpbUbbC5xCuyBTdS7WHEUBQG2XPgX.jpg', '2023-07-27 00:29:50', '2023-07-27 10:41:38'),
(3, 'Laptop', 'kategori/sYKnkyc1RZDOyuaD8z4mhLM3r7EwFTtvjpT3GfvH.jpg', '2023-07-27 00:30:05', '2023-07-27 10:33:02'),
(5, 'Drone', 'kategori/PzzYginA7pByYU6yUjDoI0DFr5QDzDKkwAZ2YnBN.jpg', '2023-07-30 01:16:36', '2023-07-30 01:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `merks`
--

CREATE TABLE `merks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_merk` varchar(255) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merks`
--

INSERT INTO `merks` (`id`, `nama_merk`, `kategori_id`, `created_at`, `updated_at`) VALUES
(2, 'Asus', 3, '2023-07-27 01:04:25', '2023-07-28 01:15:46'),
(4, 'Xiaomi', 2, '2023-07-27 01:28:17', '2023-07-27 09:08:17'),
(5, 'Asus', 2, '2023-07-28 01:30:03', '2023-07-28 01:30:03'),
(6, 'Infinix', 2, '2023-07-28 03:24:09', '2023-07-28 03:24:09'),
(7, 'Dji', 5, '2023-07-30 01:17:46', '2023-07-30 01:17:46');

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
(5, '2023_07_26_084648_create_barang_table', 1),
(25, '2014_10_12_000000_create_users_table', 2),
(26, '2014_10_12_100000_create_password_resets_table', 2),
(27, '2019_08_19_000000_create_failed_jobs_table', 2),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(29, '2023_07_27_060715_create_kategoris_table', 2),
(30, '2023_07_27_060830_create_merks_table', 2),
(31, '2023_07_28_084648_create_barangs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Admin Gadai Express', 'admingadaiexpress@gmail.com', NULL, '$2y$10$k/neB0leJMHc4xUn/rJ13OHe4VoL13vGPvbo7yviHqxdf1aWyksL2', NULL, NULL, NULL),
(2, 'ikis', 'ikis@gmail.com', NULL, '$2y$10$17Ia/SEaqB0PFXUfKUo7.OxbSy.xbp53orHdaYLFui73GfAn6l9xG', NULL, '2023-07-27 08:48:11', '2023-07-27 08:48:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_merk_id_foreign` (`merk_id`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merks`
--
ALTER TABLE `merks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merks_kategori_id_foreign` (`kategori_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `merks`
--
ALTER TABLE `merks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`),
  ADD CONSTRAINT `barangs_merk_id_foreign` FOREIGN KEY (`merk_id`) REFERENCES `merks` (`id`);

--
-- Constraints for table `merks`
--
ALTER TABLE `merks`
  ADD CONSTRAINT `merks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
