-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2022 at 08:53 PM
-- Server version: 10.2.38-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galangda_galangdana`
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
(1, 'Pembagian Sembako Kepada Masyarakat Sekitar Yayasan', 'pembagian-sembako-kepada-masyarakat-sekitar-yayasan', 1, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, '2021-12-20 21:56:31', '2022-01-13 21:09:59', 'assets/gallery/blog/VyLi2i4o8AHFDmEFQlMIQ0bu6wCYmqPfvDLesUx0.png', 'David Abdul Aziz', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 12),
(2, 'Antusiasme Warga Membantu Pengecoran Pesantren', 'antusiasme-warga-membantu-pengecoran-pesantren', 1, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, '2021-12-20 22:00:14', '2022-01-22 09:36:37', 'assets/gallery/blog/IHHRofZKlTOdXLbWODGzPSda2dxbjzCkqdFQQP6D.png', 'David Abdul Aziz', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 14),
(3, 'Semangat Anak-anak Ketika Belajar Mengaji Patut Diancungi Jempol', 'semangat-anak-anak-ketika-belajar-mengaji-patut-diancungi-jempol', 2, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, '2021-12-20 22:03:21', '2021-12-29 19:00:47', 'assets/gallery/blog/MM21W9smtkrL4zK08YCmuIxC5zSsoRHfL2wXpHOZ.png', 'Kiki Agustin', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 1);

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
(1, 1, 1, 'Cerita yang sangat inspiratif', NULL, '2021-12-29 00:56:05', '2021-12-29 00:56:05'),
(2, 2, 1, 'Semoga pembangunanya di perlancar', NULL, '2021-12-29 19:06:58', '2021-12-29 19:06:58'),
(3, 1, 1, 'bagus', NULL, '2022-01-13 21:09:58', '2022-01-13 21:09:58');

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
  `tanggal_penyaluran` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributions`
--

INSERT INTO `distributions` (`id`, `judul`, `penyaluran`, `gambar`, `deleted_at`, `created_at`, `updated_at`, `program_id`, `tanggal_penyaluran`) VALUES
(1, 'Pembelian Semen untuk pondasi', '<p>Setelah dana mulai terkumpul, kami mulai membeli semen untuk pondasi</p>', 'assets/gallery/penyaluran/KJRGMDJIwH5c6yKv7X6st0XiiwJ5yVnBJYcEbslf.jpg', NULL, '2021-12-28 09:27:29', '2021-12-28 09:27:29', 2, '2021-12-28 20:10:13'),
(2, 'Pembelian Pasir', '<p>pembelian psir pertama</p>', 'assets/gallery/penyaluran/zZDHswx18FuEouhm54xOzhsPtHMGf2TFUsk5PMLB.jpg', NULL, '2021-12-29 21:24:27', '2021-12-29 21:24:27', 2, '2021-12-30 00:00:00');

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
(1, 2, 'assets/gallery/T36tzRG8So1Bsrh4tLkL10zT6OxBMkSBMpMBexdE.png', NULL, '2021-12-20 21:07:05', '2021-12-20 21:07:05'),
(2, 1, 'assets/gallery/3mpqc8p12P0JGdO44WgxzZn1Gu0VDNxfCJ2kqc6v.png', NULL, '2021-12-20 21:08:00', '2021-12-20 21:08:00'),
(3, 3, 'assets/gallery/zvZyNYLkG79oLckfJ3Zzd4NOzQLpgcQlt3x5i1q8.png', '2022-01-11 06:12:51', '2021-12-29 21:22:35', '2022-01-11 06:12:51');

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
(31, '2021_12_02_151425_create_report_transactions_table', 8),
(32, '2021_12_13_090436_add_kategori_program_field_to_transactions_table', 9);

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
(1, '<p>LKS Al-Hikmah Majalaya adalah salah satu yayasan sosial yang berada di<strong>&nbsp;</strong>Kp. Cibodas RT. 03 RW 01 Desa Cibodas | Kecamatan Solokan Jeruk | Kabupaten Bandung | Provinsi Jawa Barat.&nbsp;</p>\r\n\r\n<p>Banyak kegiatan yang dilakukan oleh kami, seperti mengajarkan anak-anak mengaji, kegiatan mengaji dimulai setiap hari dari pagi hingga malam, selain itu kami juga sering melakukan kegiatan sosial lainnya, diantaranya membantu para kaum dhuafa dan korban bencana.</p>', '<p>Membantu Pemerintah dalam melaksanakan Undang-Undang RI No. 11 tahun 2009 tentang Kesejahteraan Sosial dan Peraturan Daerah Kota Bandung Nomor : 24 Tahun 2010 Tentang Penyelenggaraan dan Penanganan Kesejahteraan Sosial.</p>', '<p>Mewujudkan kesejahteraan sosial melalui pelayanan kesejahteraan sosial kepada masyarakat.</p>', '<p>membantu meringankan beban hidup anak yatim piatu dhuafa Membina , dan mengarahkan kepada ha hal yang positif termasuk memberikan pelatihan wirausaha</p>', NULL, NULL, '2021-12-20 20:37:00');

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
(1, 'Pembangunan pesantren LKS Al-Hikmah Majalaya', 'pembangunan-pesantren-lks-al-hikmah-majalaya', 2, 50000000, 3000000, 'Kiki Agustin', NULL, '2021-11-30 18:44:43', '2021-12-22 00:39:29', '<p>Sudah satu tahun pembangunan wakaf pesantren terhenti, dikarenakan dana,nya tidak ada maka dari itu kami selaku panitia ingin mengajak para orang baik untuk membereskan pembangunan ini minimal sampai tahap pengecoran, supaya pesantren ini bisa digunakan untuk para santri menginap.</p>\r\n\r\n<p>Karena untuk saat ini para santri masih tidur ditempat yang kecil dan seadanya.</p>'),
(2, 'Membantu nenek iroh untuk punya tempat tinggal yang layak', 'membantu-nenek-iroh-untuk-punya-tempat-tinggal-yang-layak', 1, 15000000, 6850000, 'Kiki Agustin', NULL, '2021-11-30 18:46:51', '2022-01-13 21:08:43', '<p><strong>Nenek iroh adalah sebatang kara, dan rumah beliau sudah mau rubuh.</strong></p>\r\n\r\n<p>Mari kita bantu nenek iroh untuk mempunyai rumah yang layak dan nyaman, karena tanpa kasih sayang dari kita semua, rumah beliau tidak akan bisa diperbaiki</p>'),
(3, 'Membantu anak yatim', 'membantu-anak-yatim', 1, 100000, 0, 'Kiki Agustin', '2022-01-11 06:13:17', '2021-12-29 21:20:41', '2022-01-11 06:13:17', '<p>yuk bantu anak yatim</p>');

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
(1, 2, '2021-12-29', 'Pembelian Semen', 2000000, NULL, '2021-12-29 04:46:59', '2021-12-29 04:46:59'),
(2, 2, '2021-12-30', 'Pembelian Pasir', 2000000, NULL, '2021-12-29 21:25:02', '2022-01-09 16:07:53');

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
  `samarkan` int(11) NOT NULL,
  `kategori_program` int(11) NOT NULL,
  `invoice` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `program_donations_id`, `nama_lengkap`, `email`, `jumlah_donasi`, `status_transaksi`, `doa`, `deleted_at`, `created_at`, `updated_at`, `samarkan`, `kategori_program`, `invoice`) VALUES
(1, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 2000000, 'SUCCESS', 'Doa untuk kalian semua', NULL, '2021-12-20 22:10:30', '2021-12-20 22:11:09', 0, 1, 'ALHIKMAHMJL-202112211'),
(2, 2, 'Mega Kusmayati', '20110150@stmik-mi.ac.id', 1000000, 'SUCCESS', 'Semoga cepat selesai', NULL, '2021-12-21 19:38:40', '2021-12-21 19:39:28', 1, 1, 'ALHIKMAHMJL-202112222'),
(3, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 100000, 'SUCCESS', 'Doa untuk kalian semua', NULL, '2021-12-21 21:01:49', '2021-12-21 21:03:02', 0, 1, 'ALHIKMAHMJL-202112223'),
(4, 1, 'Awan', 'awan12@gmail.com', 3000000, 'SUCCESS', 'Semoga cepat selesai', NULL, '2021-12-22 00:38:15', '2021-12-22 00:39:29', 0, 2, 'ALHIKMAHMJL-202112224'),
(5, 1, 'Wawan', 'wawan@gmail.com', 100000, 'EXPIRED', 'Semoga cepat selesai', NULL, '2021-12-22 00:47:26', '2021-12-23 00:48:20', 0, 2, 'ALHIKMAHMJL-202112225'),
(6, 1, 'Wawan', 'davidabdul365@gmail.com', 200000, 'EXPIRED', 'Semoga cepat selesai', NULL, '2021-12-23 20:07:02', '2021-12-23 20:22:55', 1, 2, 'ALHIKMAHMJL-202112246'),
(7, 2, 'Dea Hasanatus Tsaniah', 'davidabdul365@gmail.com', 900000, 'SUCCESS', 'Semoga cepat selesai', NULL, '2021-12-24 02:23:59', '2021-12-24 02:25:07', 1, 1, 'ALHIKMAHMJL-202112247'),
(8, 2, 'Dfunstation', 'dfunstation.apps@gmail.com', 900000, 'SUCCESS', 'Semoga cepat selesai', NULL, '2021-12-24 08:00:25', '2021-12-24 08:02:01', 0, 1, 'ALHIKMAHMJL-202112248'),
(9, 2, 'David Abdul Aziz', 'davidabdul365@gmail.com', 100000, 'SUCCESS', 'Semoga cepat selesai', NULL, '2021-12-24 08:12:43', '2021-12-24 08:14:22', 0, 1, 'ALHIKMAHMJL-202112249'),
(10, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 10000, 'SUCCESS', 'Doa untuk kalian semua', NULL, '2021-12-24 08:33:25', '2021-12-24 08:34:42', 1, 1, 'ALHIKMAHMJL-2021122410'),
(11, 2, 'Awan', 'davidabdul365@gmail.com', 100000, 'EXPIRED', 'Semoga cepat selesai', NULL, '2021-12-24 16:41:13', '2021-12-24 16:56:37', 0, 1, 'ALHIKMAHMJL-2021122411'),
(12, 1, 'Kiki Agustin', 'kikiagustin62@gmail.com', 100000, 'EXPIRED', 'Doa untuk kalian semua', NULL, '2021-12-27 08:33:33', '2021-12-28 08:34:22', 0, 2, 'ALHIKMAHMJL-2021122712'),
(13, 2, 'DeniSopyan', 'sopyadeni@gmail.com', 1000000, 'PENDING', 'Semoga cepat selesai', NULL, '2021-12-27 23:58:58', '2021-12-27 23:58:58', 0, 1, 'ALHIKMAHMJL-2021122813'),
(14, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 1700000, 'SUCCESS', 'Doa untuk kalian semua', NULL, '2021-12-28 08:50:22', '2021-12-28 08:52:18', 1, 1, 'ALHIKMAHMJL-2021122814'),
(15, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 10000, 'SUCCESS', 'Doa untuk kalian semua', NULL, '2021-12-29 00:53:32', '2021-12-29 00:54:46', 1, 1, 'ALHIKMAHMJL-2021122915'),
(16, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 10000, 'SUCCESS', 'Doa untuk kalian semua', NULL, '2021-12-29 20:59:17', '2021-12-29 21:00:26', 1, 1, 'ALHIKMAHMJL-2021123016'),
(17, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 10000, 'SUCCESS', 'Doa untuk kalian semua', NULL, '2021-12-29 21:34:05', '2021-12-29 21:34:59', 1, 1, 'ALHIKMAHMJL-2021123017'),
(18, 2, 'Wawan', 'onlinekiki008@gmail.com', 100000, 'SUCCESS', 'Semoga cepat selesai', NULL, '2022-01-05 01:53:14', '2022-01-05 02:08:37', 1, 1, 'ALHIKMAHMJL-2022010518'),
(19, 2, 'Saya', 'saya@gmail.com', 10000, 'EXPIRED', 'Semoga cepat selesai', NULL, '2022-01-08 23:32:56', '2022-01-08 23:49:12', 1, 1, 'ALHIKMAHMJL-2022010919'),
(20, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 10000, 'EXPIRED', 'Doa untuk kalian semua', NULL, '2022-01-12 19:57:22', '2022-01-12 20:12:58', 0, 1, 'ALHIKMAHMJL-2022011320'),
(21, 2, 'Kiki Agustin', 'kikiagustin62@gmail.com', 10000, 'SUCCESS', 'Doa untuk kalian semua', NULL, '2022-01-13 21:07:29', '2022-01-13 21:08:43', 1, 1, 'ALHIKMAHMJL-2022011421'),
(22, 2, 'Kiki', 'admin@admin.com', 10000, 'EXPIRED', 'Semoga cepat selesai', NULL, '2022-01-22 07:03:40', '2022-01-22 07:19:14', 0, 1, 'ALHIKMAHMJL-2022012222'),
(23, 2, 'Ilham', 'ilham@gmail.com', 2000000, 'EXPIRED', 'Semoga cepat selesai', NULL, '2022-01-22 09:37:57', '2022-01-22 09:53:57', 1, 1, 'ALHIKMAHMJL-2022012223'),
(24, 2, 'Saya', 'kikiagustin62@gmail.com', 10000, 'EXPIRED', 'Semoga cepat selesai', NULL, '2022-01-25 20:10:57', '2022-01-25 20:26:15', 0, 1, 'ALHIKMAHMJL-2022012624');

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
(1, 'Kiki Agustin', 'kikiagustin62@gmail.com', '2021-11-30 18:38:13', '$2y$10$.ytVkqP9d/AQHkwBzK.V7OeNc6o6Ipa7JzgOr6XloC9gdmL1i2XSy', NULL, '2021-11-30 18:37:16', '2021-12-17 20:11:19', 'assets/gallery/profile/uT2hjpH8NgpUTC46FDReRhPAj2L5zpTS71g6kx2Y.jpg', 'ADMIN'),
(2, 'David Abdul Aziz', 'davidabdul365@gmail.com', '2021-12-17 00:57:25', '$2y$10$5dTVz6lgMrOhjkbRKv0ScOIzD16aRfNdMIh2TpqXORcu9vEDpO8sO', NULL, '2021-12-17 00:54:35', '2021-12-17 00:57:25', '', 'RELAWAN');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_donations`
--
ALTER TABLE `program_donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report_transactions`
--
ALTER TABLE `report_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
