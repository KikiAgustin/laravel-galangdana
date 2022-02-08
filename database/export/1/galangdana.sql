-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 04:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galangdana`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dilihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `judul`, `slug`, `kategori`, `lengkap`, `deleted_at`, `created_at`, `updated_at`, `gambar`, `penulis`, `singkat`, `dilihat`) VALUES
(1, 'Mengapa membiasakan sholat sejak kecil Sangat Penting sekali', 'mengapa-membiasakan-sholat-sejak-kecil-sangat-penting-sekali', 1, '<p>Membiasakan sholat sejak dini adalah hal yang sangat penting, bagi seorang muslim. Karena dengan kita mengajarkan membiasakan diri untuk sholat kepada anak. Kita ia menjadi dewasa ia sudah terbiasa karena</p>', NULL, '2021-11-30 18:53:04', '2021-12-07 02:09:55', 'assets/gallery/blog/AXiRHKTXD9sM7cK4nfWVTOL2wteU7CJGjX2zj8EC.jpg', 'Kiki Agustin', 'Membiasakan sholat sejak dini adalah hal yang sangat penting, bagi seorang muslim. Karena dengan kit', 50),
(2, 'Melatih supaya anak senang belajar', 'melatih-supaya-anak-senang-belajar', 2, '<p>belajar emang sesuatu yang tidak mudah bagi seorang anak, apalagi hal yang sedang di pelajari bukan sesuatu yang ia senangi.</p>\r\n\r\n<p>Oleh karena itu kami mau membagikan sedikit tips bagaimana anak bisa senang belajar walaupun hal yang tidak ia senangi</p>', NULL, '2021-12-01 01:13:54', '2021-12-07 02:10:30', 'assets/gallery/blog/Z0ZnP9O0I0fFm69TdJ47NEtKklrCetnSclZwiOUr.jpg', 'Kiki Agustin', 'belajar emang sesuatu yang tidak mudah bagi seorang anak, apalagi hal yang sedang di pelajari bukan ', 3),
(3, 'Haruskah anak kecil dijambuk ketika tidak mau sholat', 'haruskah-anak-kecil-dijambuk-ketika-tidak-mau-sholat', 1, '<p>sholat adalah kewajiban bagi setiap muslim, oleh karena itu apakah ketika anak tidak mau shoat harus kita jambuk?</p>\r\n\r\n<p>Gini teman-teman&nbsp;</p>', NULL, '2021-12-01 01:15:43', '2021-12-07 02:10:02', 'assets/gallery/blog/SsbfjrAQwxsb9X05eTyB8CAqnqxa6qg89K5kAhBV.jpg', 'Kiki Agustin', 'sholat adalah kewajiban bagi setiap muslim, oleh karena itu apakah ketika anak tidak mau shoat harus', 30);

-- --------------------------------------------------------

--
-- Table structure for table `category_blogs`
--

CREATE TABLE `category_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `blog_id` int(11) NOT NULL,
  `kategori` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_blogs`
--

INSERT INTO `category_blogs` (`id`, `deleted_at`, `blog_id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Cerita Pesantren', NULL, NULL),
(2, NULL, 1, 'Kegiatan Belajar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_donations`
--

CREATE TABLE `category_donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_donations`
--

INSERT INTO `category_donations` (`id`, `nama_kategori`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kemanusiaan', NULL, '2021-11-30 18:41:04', '2021-11-30 18:41:04'),
(2, 'Pembagunan', NULL, '2021-11-30 18:41:15', '2021-11-30 18:41:15'),
(3, 'Operasional', NULL, '2021-11-30 18:41:25', '2021-11-30 18:41:25'),
(4, 'asasasasasa', '2021-12-02 05:52:44', '2021-12-02 05:52:38', '2021-12-02 05:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `comment_blogs`
--

CREATE TABLE `comment_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_blogs` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_blogs`
--

INSERT INTO `comment_blogs` (`id`, `id_blogs`, `user_id`, `komentar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Cerita yang sangat menarik', NULL, '2021-12-07 02:10:29', '2021-12-07 02:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `distributions`
--

CREATE TABLE `distributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyaluran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `program_id` int(11) NOT NULL,
  `tanggal_penyaluran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributions`
--

INSERT INTO `distributions` (`id`, `judul`, `penyaluran`, `gambar`, `deleted_at`, `created_at`, `updated_at`, `program_id`, `tanggal_penyaluran`) VALUES
(1, 'Pembelian Semen padang aja', '<p>Kami membeli mesen untuk pengecoran atap pesantren anak sholeh sekali</p>', 'assets/gallery/penyaluran/2XuBwdG9tNI8Lm24IUh5yLVYLoHgbBKblhnIPwg9.jpg', NULL, '2021-12-02 04:27:38', '2021-12-02 05:07:05', 2, '2021-12-01 00:00:00'),
(2, 'Pemberian Donasi aja', '<p>Penyaluran Donasi kepada nenek iroh heh</p>', 'assets/gallery/penyaluran/xVysqzqI1z8suHMAgWJpuP0lADPK2djNEpw2sdSR.jpg', NULL, '2021-12-02 04:28:42', '2021-12-02 04:59:42', 1, '2021-11-25 00:00:00'),
(3, 'pembelian genteng aja', '<p>wewewew</p>', 'assets/gallery/penyaluran/ROlzfBHr8szY2LVnEuEAc882LOjfOSDw5IFCkLeA.jpg', NULL, '2021-12-02 05:00:40', '2021-12-02 05:02:40', 2, '2021-12-01 00:00:00'),
(4, 'asasasa', '<p>asasasasasasa</p>', '', NULL, '2021-12-02 05:11:02', '2021-12-02 05:56:29', 2, '2021-12-01 00:00:00');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_donations_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `program_donations_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/gallery/DXTROC3LSyWg96sCntv3IF5WLYw4yoDkVQ5tWTES.jpg', NULL, '2021-11-30 18:54:55', '2021-11-30 22:56:18');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_10_12_051321_create_program_donas_table', 1),
(5, '2021_10_19_002559_add_roles_field_to_users_table', 1),
(6, '2021_10_27_000826_change_program_donas_to_program_donasis_table', 1),
(7, '2021_10_31_014725_create_program_donations_table', 1),
(8, '2021_10_31_073731_create_galleries_table', 1),
(9, '2021_11_07_043544_create_transactions_table', 1),
(10, '2021_11_18_153804_add_samarkan_field_to_transactions_table', 1),
(11, '2021_11_21_065209_create_category_donations_table', 1),
(12, '2021_11_27_040002_add_foto_field_to_users_table', 1),
(13, '2021_11_27_041840_add_detail_field_to_program_donations_table', 1),
(14, '2021_11_27_042607_drop_program_donations_id_field_to_category_donations_table', 1),
(15, '2021_11_27_043344_drop_jumlah_hari_field_to_program_donations_table', 1),
(16, '2021_11_27_061103_drop_roles_field_to_users_table', 1),
(17, '2021_11_27_062039_add_role_field_to_users_table', 1),
(18, '2021_11_28_135749_create_profiles_table', 1),
(19, '2021_11_29_081433_create_blogs_table', 1),
(20, '2021_11_29_084902_add_gambar_field_to_blogs_table', 1),
(21, '2021_11_29_085259_create_category_blogs_table', 1),
(22, '2021_11_29_103424_add_penulis_field_to_blogs_table', 1),
(23, '2021_11_29_110527_drop_singkat_field_to_blogs_table', 1),
(24, '2021_11_30_074038_add_singkat_field_to_blogs_table', 1),
(25, '2021_12_01_084146_add_dilihat_field_to_blogs_table', 2),
(26, '2021_12_02_012117_create_comment_blogs_table', 3),
(27, '2021_12_02_041313_create_distributions_table', 4),
(28, '2021_12_02_064829_drop_blogs_id_field_to_distributions_table', 5),
(29, '2021_12_02_065036_add_program_id_field_to_distributions_table', 6),
(30, '2021_12_02_084416_add_tanggal_penyaluran_field_to_distributions_table', 7),
(31, '2021_12_02_151425_create_report_transactions_table', 8);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `tentang`, `tujuan`, `visi`, `misi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '<p>LKS Al-Hikmah Majalaya adalah</p>', '<p>Membantu Pemerintah dalam melaksanakan Undang-Undang RI No. 11 tahun 2009 tentang Kesejahteraan Sosial dan Peraturan Daerah Kota Bandung Nomor : 24 Tahun 2010 Tentang Penyelenggaraan dan Penanganan Kesejahteraan Sosial.</p>', '<p>Mewujudkan kesejahteraan sosial melalui pelayanan kesejahteraan sosial kepada masyarakat.</p>', '<p>membantu meringankan beban hidup anak yatim piatu dhuafa Membina , dan mengarahkan kepada ha hal yang positif termasuk memberikan pelatihan wirausaha</p>', NULL, NULL, '2021-11-30 23:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `program_donations`
--

CREATE TABLE `program_donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `dibutuhkan` int(11) NOT NULL,
  `terkumpul` int(11) NOT NULL,
  `pengirim` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_donations`
--

INSERT INTO `program_donations` (`id`, `judul`, `slug`, `kategori`, `dibutuhkan`, `terkumpul`, `pengirim`, `deleted_at`, `created_at`, `updated_at`, `detail`) VALUES
(1, 'Pembelian Semen aja', 'membereskan-pengecoran-wakap-pesantren', 2, 50000000, 0, 'Kiki Agustin', NULL, '2021-11-30 18:44:43', '2021-12-02 04:45:39', '<p>Sudah satu tahun pembangunan wakaf pesantren terhenti, dikarenakan dana,nya tidak ada maka dari itu kami selaku panitia ingin mengajak para orang baik untuk membereskan pembangunan ini minimal sampai tahap pengecoran, supaya pesantren ini bisa digunakan untuk para santri menginap.</p>\r\n\r\n<p>Karena untuk saat ini para santri masih tidur ditempat seadanya</p>'),
(2, 'Membantu nenek iroh untuk punya tempat tinggal yang layak', 'membantu-nenek-iroh-untuk-punya-tempat-tinggal-yang-layak', 1, 15000000, 10000, 'Kiki Agustin', NULL, '2021-11-30 18:46:51', '2021-12-01 01:09:49', '<p>Nenek iroh adalah sebatang kara, dan beliau tidak punya tempat tinggal dan beliau bercita-cita ingin punya rumah sendiri</p>');

-- --------------------------------------------------------

--
-- Table structure for table `report_transactions`
--

CREATE TABLE `report_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `nama_transaksi` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_transactions`
--

INSERT INTO `report_transactions` (`id`, `program_id`, `tanggal_transaksi`, `nama_transaksi`, `jumlah`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-02', 'Pembelian kabel', 100000, NULL, NULL, NULL),
(2, 1, '2021-12-01', 'Pembelian harta aja', 100000, NULL, '2021-12-02 09:50:55', '2021-12-02 10:00:47'),
(3, 1, '2021-12-01', 'Pembelian aja', 100000, '2021-12-02 10:02:16', '2021-12-02 10:01:08', '2021-12-02 10:02:16'),
(4, 2, '2021-12-18', 'Pembelian harta', 1000000, NULL, '2021-12-02 10:03:28', '2021-12-02 10:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_donations_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_donasi` int(11) NOT NULL,
  `status_transaksi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `samarkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `program_donations_id`, `nama_lengkap`, `email`, `jumlah_donasi`, `status_transaksi`, `doa`, `deleted_at`, `created_at`, `updated_at`, `samarkan`) VALUES
(1, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 10000, 'PENDING', 'Doa untuk kalian semua', NULL, '2021-12-01 01:09:49', '2021-12-01 01:09:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `foto`, `roles`) VALUES
(1, 'Kiki Agustin', 'kikiagustin62@gmail.com', '2021-11-30 18:38:13', '$2y$10$.ytVkqP9d/AQHkwBzK.V7OeNc6o6Ipa7JzgOr6XloC9gdmL1i2XSy', NULL, '2021-11-30 18:37:16', '2021-12-01 02:04:57', 'assets/gallery/profile/0pIrrPagjLHHFylV19weLbZbMXOpre9SLQR2w8fO.jpg', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_blogs`
--
ALTER TABLE `category_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_donations`
--
ALTER TABLE `category_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_blogs`
--
ALTER TABLE `comment_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributions`
--
ALTER TABLE `distributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_donations`
--
ALTER TABLE `program_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_transactions`
--
ALTER TABLE `report_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_blogs`
--
ALTER TABLE `category_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_donations`
--
ALTER TABLE `category_donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment_blogs`
--
ALTER TABLE `comment_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_donations`
--
ALTER TABLE `program_donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report_transactions`
--
ALTER TABLE `report_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
