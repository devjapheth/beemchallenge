-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 12:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearence`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicyears`
--

CREATE TABLE `academicyears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academicyears`
--

INSERT INTO `academicyears` (`id`, `academic_year`, `created_at`, `updated_at`) VALUES
(30, '2017/2018', '2019-07-02 19:00:34', '2019-07-02 19:00:34'),
(34, '2016/2017', '2019-07-02 19:29:59', '2019-07-02 19:29:59'),
(36, '2018/2019', '2019-07-02 19:30:15', '2019-07-02 19:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `accdebtors`
--

CREATE TABLE `accdebtors` (
  `id` bigint(20) NOT NULL,
  `reg_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feename` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `program` varchar(191) NOT NULL,
  `signature` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accdebtors`
--

INSERT INTO `accdebtors` (`id`, `reg_no`, `feename`, `amount`, `created_at`, `updated_at`, `program`, `signature`) VALUES
(1, 'Mocu/BAAF/500/17', 'TCU Quality Assurance', '30,000/=', '2019-07-08 05:11:32', '2019-07-08 05:11:32', 'BA-AF', 'Paulo Dotto jr'),
(3, 'Mocu/BABEC/500/18', 'Accomodation andProperty distruction', '150,000/=', '2019-07-08 06:11:23', '2019-07-08 06:11:23', 'BA-BEC', 'jenny kihongosi'),
(4, 'MOCU/BSCBICT/140/16', 'Tution Fee', '200000', '2021-07-16 07:51:48', '2021-07-16 07:51:48', 'BSc-BICT', 'Account User');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `fee_type`, `created_at`, `updated_at`) VALUES
(1, 'Tution Fee', '2019-05-02 16:46:44', '2019-05-02 16:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hostel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `hostel`, `created_at`, `updated_at`) VALUES
(10, 'KILIMO', '2019-05-08 12:04:07', '2019-07-08 05:40:33'),
(11, 'USHIRIKA', '2019-05-08 12:04:15', '2019-05-08 12:04:15'),
(12, 'SOKOINE', '2019-05-08 12:04:20', '2019-05-08 12:04:20'),
(13, 'UJAMAA', '2019-05-08 12:04:37', '2019-05-08 12:04:37'),
(14, 'JITEGEMEE', '2019-05-08 12:04:42', '2019-05-08 12:04:42'),
(15, 'WASHIRIKA', '2019-05-08 12:04:53', '2019-05-08 12:04:53'),
(16, 'UMOJA', '2019-05-08 12:05:00', '2019-05-08 12:05:00'),
(17, 'UAMINIFU', '2019-05-08 12:05:07', '2019-05-08 12:05:07'),
(18, 'UHAI', '2019-05-08 12:05:22', '2019-06-18 05:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `libdebtors`
--

CREATE TABLE `libdebtors` (
  `id` bigint(20) NOT NULL,
  `reg_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feename` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `vid` bigint(20) DEFAULT NULL,
  `program` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `signature` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethods`
--

CREATE TABLE `paymentmethods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentmethod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentmethods`
--

INSERT INTO `paymentmethods` (`id`, `paymentmethod`, `acc_no`, `created_at`, `updated_at`) VALUES
(7, 'MPESA', '0744910391', '2019-05-08 12:09:54', '2019-06-02 19:35:01'),
(8, 'NMB', '50410008395', '2019-05-08 12:10:15', '2019-06-17 04:37:36'),
(9, 'TIGO PESA', '0653202497', '2019-05-08 12:10:23', '2019-05-08 12:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program`, `program_name`, `created_at`, `updated_at`) VALUES
(9, 'ADCA', 'Advanced Diploma in Co-operative Accounting.', '2019-05-08 11:54:05', '2019-05-29 15:39:56'),
(10, 'ADCM', 'Advanced Diploma in Co-operative Management', '2019-05-08 11:54:36', '2019-05-08 11:54:36'),
(11, 'BA-AF', 'Bachelor of Arts in Accounting  and Finance', '2019-05-08 11:55:10', '2019-05-08 15:58:50'),
(12, 'BA-BEC', 'Bachelor of Arts in Business Economics', '2019-05-08 11:55:36', '2019-05-08 11:55:36'),
(13, 'BA-CED', 'Bachelor of Arts in Community Economic Development', '2019-05-08 11:56:36', '2019-05-08 11:56:36'),
(14, 'BA-CMA', 'Bachelor of Arts in Co-operative Management and Accounting', '2019-05-08 11:58:01', '2019-05-08 11:58:01'),
(15, 'BA-HRM', 'Bachelor of Arts in Human Resource Management', '2019-05-08 11:58:24', '2019-05-08 11:58:24'),
(16, 'BA-ME', 'Bachelor of Arts in Marketing and Entrepreneurship', '2019-05-08 11:58:50', '2019-05-08 11:58:50'),
(17, 'BA-MFED', 'Bachelor of Arts in  Microfinance and  Enterprise Development', '2019-05-08 11:59:18', '2019-05-08 11:59:18'),
(19, 'BLIS', 'Bachelor of Library and Information Sciences', '2019-05-08 12:01:24', '2019-05-29 15:38:15'),
(20, 'BSc-BICT', 'Bachelor of Science in Business Information and Communication Technology', '2019-05-08 12:02:02', '2019-06-12 06:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `propertylibs`
--

CREATE TABLE `propertylibs` (
  `id` int(191) NOT NULL,
  `reg_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type` varchar(191) NOT NULL,
  `program` varchar(191) NOT NULL,
  `property` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `issue` date NOT NULL,
  `expiry` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propertylibs`
--

INSERT INTO `propertylibs` (`id`, `reg_no`, `property_type`, `program`, `property`, `code`, `issue`, `expiry`, `created_at`, `updated_at`) VALUES
(1, 'Mocu/BABEC/500/18', 'Journals', 'BA-BEC', 'TOURISM AFRICA', 'SW128', '2019-07-05', '2019-07-08', '2019-07-05 05:54:43', '2019-07-05 05:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accomodation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT 0,
  `verifiedBy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `removedBy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifieddate` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$IuLfZY0qbLD2pbZQodicn.w0Y0tsIYte6epYU7sVzCZhAODyCPb3e',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `reg_no`, `name`, `program`, `email`, `academic_year`, `accomodation`, `hostel`, `user_type`, `contact`, `isVerified`, `verifiedBy`, `removedBy`, `verifieddate`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user.jpg', NULL, 'Chriss Japheth sr', NULL, 'chriss@gmail.com', NULL, NULL, NULL, 'super', '255744910391', 0, NULL, NULL, NULL, NULL, '$2y$10$vwmrbctHCFgMA9GVLnH95OjDm/DEHulaTC2FhVK2O2youl/w/WKTS', NULL, '2019-05-22 17:29:22', '2019-06-18 05:32:40'),
(28, NULL, 'Mocu/BAAF/500/17', 'Suzan Mallya', 'BA-AF', 'suzy@gmail.com', '2017/2018', 'In-Campus', 'USHIRIKA', 'student', '255744910391', 0, NULL, NULL, NULL, NULL, '$2y$10$IuLfZY0qbLD2pbZQodicn.w0Y0tsIYte6epYU7sVzCZhAODyCPb3e', NULL, '2019-07-02 19:17:06', '2019-07-02 19:17:06'),
(29, NULL, 'Mocu/BABEC/500/18', 'Rose Obadia', 'BA-BEC', 'mendez@gmail.com', '2017/2018', 'In-Campus', 'SOKOINE', 'student', '255684034066', 0, NULL, NULL, NULL, NULL, '$2y$10$IuLfZY0qbLD2pbZQodicn.w0Y0tsIYte6epYU7sVzCZhAODyCPb3e', NULL, '2019-07-03 05:22:31', '2019-07-03 05:22:31'),
(32, NULL, NULL, 'japheth obadia', NULL, 'japheth@gmail.com', NULL, NULL, NULL, 'librarian', NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$IuLfZY0qbLD2pbZQodicn.w0Y0tsIYte6epYU7sVzCZhAODyCPb3e', NULL, '2019-07-08 05:42:45', '2019-07-08 05:42:45'),
(34, NULL, 'MOCU/BSCBICT/140/16', 'Chau Hamisi', 'BSc-BICT', 'chau@gmail.com', '2016/2017', 'In-Campus', 'UJAMAA', 'student', '255626831615', 0, NULL, NULL, NULL, NULL, '$2y$10$IuLfZY0qbLD2pbZQodicn.w0Y0tsIYte6epYU7sVzCZhAODyCPb3e', NULL, '2019-07-09 04:43:31', '2019-07-09 04:43:31'),
(35, NULL, NULL, 'Beem Account', NULL, 'accounts@beem.com', NULL, NULL, NULL, 'accountant', '0744910391', 0, NULL, NULL, NULL, NULL, '$2y$10$IuLfZY0qbLD2pbZQodicn.w0Y0tsIYte6epYU7sVzCZhAODyCPb3e', NULL, '2021-07-16 07:45:50', '2021-07-16 07:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `verificationaccs`
--

CREATE TABLE `verificationaccs` (
  `vid` bigint(100) NOT NULL,
  `reg_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` bigint(20) NOT NULL,
  `receipt` varchar(191) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verificationlibs`
--

CREATE TABLE `verificationlibs` (
  `lid` bigint(100) NOT NULL,
  `reg_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` bigint(20) NOT NULL,
  `receipt` varchar(191) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicyears`
--
ALTER TABLE `academicyears`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academicyears_academic_year_unique` (`academic_year`);

--
-- Indexes for table `accdebtors`
--
ALTER TABLE `accdebtors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_no` (`reg_no`) USING BTREE;

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hostels_hostel_unique` (`hostel`);

--
-- Indexes for table `libdebtors`
--
ALTER TABLE `libdebtors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `vid` (`vid`);

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
-- Indexes for table `paymentmethods`
--
ALTER TABLE `paymentmethods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paymentmethods_paymentmethod_unique` (`paymentmethod`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_program_unique` (`program`);

--
-- Indexes for table `propertylibs`
--
ALTER TABLE `propertylibs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `reg_no` (`reg_no`),
  ADD KEY `program` (`program`),
  ADD KEY `academic_year` (`academic_year`);

--
-- Indexes for table `verificationaccs`
--
ALTER TABLE `verificationaccs`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `verificationlibs`
--
ALTER TABLE `verificationlibs`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicyears`
--
ALTER TABLE `academicyears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `accdebtors`
--
ALTER TABLE `accdebtors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `libdebtors`
--
ALTER TABLE `libdebtors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymentmethods`
--
ALTER TABLE `paymentmethods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `propertylibs`
--
ALTER TABLE `propertylibs`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `verificationaccs`
--
ALTER TABLE `verificationaccs`
  MODIFY `vid` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verificationlibs`
--
ALTER TABLE `verificationlibs`
  MODIFY `lid` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accdebtors`
--
ALTER TABLE `accdebtors`
  ADD CONSTRAINT `accdebtors_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `users` (`reg_no`);

--
-- Constraints for table `libdebtors`
--
ALTER TABLE `libdebtors`
  ADD CONSTRAINT `new` FOREIGN KEY (`reg_no`) REFERENCES `users` (`reg_no`);

--
-- Constraints for table `propertylibs`
--
ALTER TABLE `propertylibs`
  ADD CONSTRAINT `propertylibs_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `users` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`program`) REFERENCES `programs` (`program`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`academic_year`) REFERENCES `academicyears` (`academic_year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verificationaccs`
--
ALTER TABLE `verificationaccs`
  ADD CONSTRAINT `verificationaccs_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `users` (`reg_no`),
  ADD CONSTRAINT `verificationaccs_ibfk_2` FOREIGN KEY (`id`) REFERENCES `accdebtors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verificationlibs`
--
ALTER TABLE `verificationlibs`
  ADD CONSTRAINT `verificationlibs_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `users` (`reg_no`),
  ADD CONSTRAINT `verificationlibs_ibfk_2` FOREIGN KEY (`id`) REFERENCES `libdebtors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
