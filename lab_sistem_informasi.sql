-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2025 at 02:25 PM
-- Server version: 10.6.22-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_sistem_informasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul1` text NOT NULL,
  `description1` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `judul2` text NOT NULL,
  `description2` text NOT NULL,
  `link_yutub` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `judul1`, `description1`, `image1`, `judul2`, `description2`, `link_yutub`, `created_at`, `updated_at`) VALUES
(7, 'Tentang Kami', 'INSYDE Lab (Intelligent System and Data Engineering) merupakan laboratorium di bawah Fakultas Ilmu Komputer UPN \"Veteran\" Jawa Timur yang berfokus pada pengembangan dan riset di bidang Kecerdasan Buatan, Data Engineering, dan Internet of Things.  Didukung fasilitas modern seperti robot lengan 5 sumbu, perangkat 3D printing, serta studio robotik dan multimedia, INSYDE Lab menjadi pusat kolaborasi antara akademisi dan industri dalam menciptakan inovasi teknologi masa depan.', '01JWAV574ZZF8ZJ9Q0GV3QDD7C.jpg', 'Company Profile', 'Fakultas Ilmu Komputer UPN \"Veteran\" Jawa Timur merupakan institusi pendidikan tinggi yang berkomitmen pada pengembangan ilmu pengetahuan dan teknologi di bidang informatika. Melalui riset, inovasi, dan kolaborasi, fakultas ini berperan aktif dalam mencerdaskan bangsa serta memberikan kontribusi nyata dalam memecahkan berbagai tantangan masyarakat melalui solusi berbasis teknologi informasi.', 'https://www.youtube.com/embed/35iLNyoBRUQ', '2025-05-26 14:48:55', '2025-06-02 13:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `beranda_layanan_kami`
--

CREATE TABLE `beranda_layanan_kami` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beranda_layanan_kami`
--

INSERT INTO `beranda_layanan_kami` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(9, 'Konsultasi TI', 'Layanan konsultasi teknologi informasi dari INSYDE Lab untuk solusi sistem, keamanan data, AI, dan pengembangan digital.', '01JVR3KXV6K36GCJRPV9JT3ZYZ.png', '2025-05-20 17:19:49', '2025-05-28 07:13:15'),
(10, 'Sertifikasi BNSP', 'Program sertifikasi kompetensi resmi berskala nasional yang diakui BNSP untuk meningkatkan daya saing lulusan di dunia kerja', '01JVR3NNQVA36SKNNQD8YT2RWG.png', '2025-05-20 17:20:12', '2025-05-28 07:15:41'),
(11, 'Sewa LAB', 'Fasilitas laboratorium lengkap dan nyaman disewakan untuk pelatihan, workshop, ujian sertifikasi, atau kegiatan akademik lainnya.', '01JVR3QJ3D3K2HP603RSHQ3XHR.png', '2025-05-20 17:20:39', '2025-05-28 07:16:33'),
(12, 'Pelatihan', 'Program pelatihan intensif bidang TI, AI, dan IoT untuk meningkatkan kompetensi mahasiswa, dosen, dan mitra industri.', '01JVR3S09E9YFE327KPV2THD7N.png', '2025-05-20 17:21:00', '2025-05-28 07:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('lab_insyde_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:2;', 1749498702),
('lab_insyde_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1749498702;', 1749498702),
('lab_insyde_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:2;', 1746121069),
('lab_insyde_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1746121069;', 1746121069),
('lab_sistem_informasi_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1750755845),
('lab_sistem_informasi_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1750755845;', 1750755845),
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:2;', 1746109816),
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1746109816;', 1746109816);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `hari_oprasional` varchar(100) NOT NULL,
  `jam_oprasional` text NOT NULL,
  `link_maps` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `phone`, `whatsapp`, `instagram`, `youtube`, `linkedin`, `address`, `hari_oprasional`, `jam_oprasional`, `link_maps`, `created_at`, `updated_at`) VALUES
(4, 'fasilkom@upnjatim.ac.id', '+6289680996202', '+6289680996202', 'https://www.instagram.com/fasilkom.upnvjatim/?hl=en', 'https://www.youtube.com/@FASILKOMUPNVJATIM', 'https://www.linkedin.com/company/laboratorium-solusi', 'Gedung Fasilkom 2 Jl. Rungkut Madya No.1, Gn. Anyar, Kec. Gn. Anyar, Surabaya, Jawa Timur 60294', 'Senin-Jumat', '7.30am – 4:00pm', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.167637766181!2d112.78831249999999!3d-7.335062500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb792f87d495%3A0xaae1e1cbcc3e2778!2sFakultas%20Ilmu%20Komputer%20UPN%20%22Veteran%22%20Jawa%20Timur!5e0!3m2!1sen!2sid!4v1748305822866!5m2!1sen!2sid', '2025-05-26 15:24:14', '2025-06-04 03:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_leaders`
--

CREATE TABLE `faculty_leaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_leaders`
--

INSERT INTO `faculty_leaders` (`id`, `name`, `position`, `nip`, `email`, `image`, `created_at`, `updated_at`) VALUES
(10, 'Prof. Dr. Ir. Novirina Hendrasarie, MT.', 'Dekan', 'NIP. 19681126 199403 2 001', 'dekan.fasilkom@upnjatim.ac.id', '01JYGJTH9E1J0TFT3FWVGNNFJ0.jpg', '2025-05-20 18:54:01', '2025-06-24 09:03:08'),
(11, 'Dr. I Gede Susrama Mas Diyasa, ST., MT.', 'Wakil Dekan I', 'NIP. 19700619 2021211 009', 'igsusrama.if@upnjatim.ac.id', '01JVR95MCBMF8HD8A2HET9TSR5.png', '2025-05-20 18:54:37', '2025-05-20 19:01:15'),
(12, 'Made Hanindia Prami Swari, S.Kom, M.Cs', 'Wakil Dekan II', ' NIP. 19890205 2018032 001', 'madehanindia.fik@upnjatim.ac.id', '01JXB3XK4RFT4PH4Y1YMAQM1Y1.png', '2025-05-20 18:55:18', '2025-06-09 19:50:45'),
(14, 'Dr. Basuki Rahmat, S.Si. MT', 'Wakil Dekan III', '19690723 2021211 002', 'basukirahmat.if@upnjatim.ac.id', '01JXB3YN8ZYD9AY2J21AS89XK1.png', '2025-05-26 15:03:04', '2025-06-09 19:51:20');

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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(13, 'Lab nya bisa disewa untuk kegiatan apa saja ? ', 'Pelatihan & Workshop Teknologi, Ujian Sertifikasi, Kelas Tambahan atau Bimbingan Teknis, Penelitian dan Pengembangan (R&D), Seminar dan Guest Lecture, Kegiatan Startup', '2025-05-20 17:30:35', '2025-05-28 07:24:47'),
(14, 'Spesifikasi PC nya bagaimana ?', 'Intel Core i9-12900KF, HSF For Intel i9 Gen 12, Chipset Z690, 2x 16GB DDR4, 1 TB NVME M.2 SSD, 4TB HDD 3.5\" SATA, GPU 12GB GDDR6, Gigabit Ethernet, Support WLAN, LED 24\" FHD, USB Keyboard & Mouse, Windows 11 pro', '2025-05-20 17:30:44', '2025-05-28 07:40:26'),
(15, 'Setelah mengikuti pelatihan apakah akan mendapatkan sertifikat? ', 'Ya, setelah mengikuti pelatihan di INSYDE Lab, peserta akan mendapatkan sertifikat sebagai bukti telah mengikuti dan menyelesaikan program pelatihan tersebut.', '2025-05-20 17:30:54', '2025-05-28 07:42:32'),
(16, 'Apakah sertifikasi dilaksanakan secara online ? ', 'Tidak, sertifikasi tidak dilaksanakan secara online. Sertifikasi dilakukan secara langsung di lokasi yang telah ditentukan.', '2025-05-20 18:15:56', '2025-05-28 07:55:05'),
(17, 'Apakah masih bisa akses materi ketika selesai pelatihan ? ', 'Ya, peserta tetap bisa mengakses materi pelatihan meskipun kegiatan pelatihan telah selesai.', '2025-05-20 18:17:31', '2025-05-28 07:55:23'),
(18, 'Apakah pembatalan sewa lab dikenakan denda ? ', 'Ya, pembatalan sewa lab dapat dikenakan denda sesuai dengan kebijakan yang berlaku. Harap hubungi pihak pengelola untuk informasi lebih lanjut mengenai ketentuan pembatalan.', '2025-05-20 18:18:04', '2025-05-28 07:57:10'),
(19, 'Bagaimana jika penyewa lab terbukti merusak fasilitas lab ? ', 'Penyewa yang terbukti merusak fasilitas lab akan dikenakan sanksi dan wajib mengganti kerusakan sesuai dengan nilai kerugian yang ditentukan oleh pihak pengelola.', '2025-05-20 18:18:40', '2025-05-28 07:57:33'),
(20, 'Apakah bisa melakukan perbaikan di lab insyde untuk produk yang sudah dibeli ? ', 'Ya, Lab Insyde menerima layanan perbaikan untuk produk yang telah dibeli, selama masih dalam masa layanan atau garansi.', '2025-05-20 18:19:09', '2025-05-28 07:58:34'),
(21, 'Apakah produk nya memiliki garansi ? ', 'Ya, setiap produk yang dibeli memiliki garansi dengan ketentuan yang berlaku. Informasi detail mengenai masa dan jenis garansi dapat dilihat di kartu garansi atau saat pembelian.', '2025-05-20 18:19:41', '2025-05-28 07:58:49'),
(22, 'Harus menunggu berapa lama untuk bisa ambil sertifikat bnsp setelah mengikuti sertifikasi ? ', 'Sertifikat BNSP umumnya dapat diambil dalam waktu 1 hingga 2 bulan setelah pelaksanaan sertifikasi, tergantung pada proses verifikasi dan pencetakan dari pihak BNSP.', '2025-05-20 18:20:05', '2025-05-28 07:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_lab`
--

CREATE TABLE `jadwal_lab` (
  `id` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `sesi` int(11) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_lab`
--

INSERT INTO `jadwal_lab` (`id`, `hari`, `sesi`, `jam`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '07.00-08.00', 1, '2025-05-26 15:13:09', '2025-05-26 15:13:09'),
(2, 1, 2, '08.00-09.00', 1, '2025-05-26 18:33:55', '2025-05-26 18:33:55'),
(3, 1, 3, '09.00-10.00', 1, '2025-06-24 09:23:45', '2025-06-24 09:23:45'),
(4, 1, 4, '10.00-11.00', 1, '2025-06-24 09:23:46', '2025-06-24 09:23:46'),
(5, 1, 5, '11.00-12.00', 1, '2025-06-24 09:23:48', '2025-06-24 09:23:48'),
(6, 1, 6, '12.00-13.00', 0, '2025-05-22 08:22:00', '2025-05-22 01:22:00'),
(7, 1, 7, '13.00-14.00', 0, '2025-05-18 14:53:57', '2025-05-18 14:53:57'),
(8, 1, 8, '14.00-15.00', 0, '2025-05-18 14:54:11', '2025-05-18 14:54:11'),
(10, 1, 9, '15.00-16.00', 1, '2025-05-26 18:33:52', '2025-05-26 18:33:52'),
(11, 2, 1, '07.00-08.00', 1, '2025-06-24 09:23:39', '2025-06-24 09:23:39'),
(12, 2, 2, '08.00-09.00', 0, '2025-05-22 08:16:23', '2025-05-22 01:16:23'),
(13, 2, 3, '09.00-10.00', 0, '2025-05-18 15:22:12', '2025-05-20 09:59:17'),
(14, 2, 4, '10.00-11.00', 0, '2025-05-22 08:16:27', '2025-05-22 01:16:27'),
(15, 2, 5, '11.00-12.00', 1, '2025-06-24 09:23:49', '2025-06-24 09:23:49'),
(16, 2, 6, '12.00-13.00', 0, '2025-06-24 09:24:25', '2025-06-24 09:24:25'),
(17, 2, 7, '13.00-14.00', 0, '2025-05-22 08:16:30', '2025-05-22 01:16:30'),
(18, 2, 8, '14.00-15.00', 0, '2025-05-22 08:22:03', '2025-05-22 01:22:03'),
(19, 2, 9, '15.00-16.00', 1, '2025-06-24 09:24:18', '2025-06-24 09:24:18'),
(20, 3, 1, '07.00-08.00', 1, '2025-06-24 09:24:28', '2025-06-24 09:24:28'),
(21, 3, 2, '08.00-09.00', 0, '2025-05-22 08:16:43', '2025-05-22 01:16:43'),
(22, 3, 3, '09.00-10.00', 0, '2025-06-24 09:24:26', '2025-06-24 09:24:26'),
(23, 3, 4, '10.00-11.00', 0, '2025-05-18 16:10:39', '2025-05-18 16:26:38'),
(24, 3, 5, '11.00-12.00', 1, '2025-06-24 09:23:51', '2025-06-24 09:23:51'),
(25, 3, 6, '12.00-13.00', 0, '2025-05-22 08:16:47', '2025-05-22 01:16:47'),
(26, 3, 7, '13.00-14.00', 0, '2025-06-24 09:24:23', '2025-06-24 09:24:23'),
(27, 3, 8, '14.00-15.00', 0, '2025-05-22 08:16:50', '2025-05-22 01:16:50'),
(28, 3, 9, '15.00-16.00', 1, '2025-06-24 09:24:18', '2025-06-24 09:24:18'),
(29, 4, 1, '07.00-08.00', 1, '2025-06-24 09:23:34', '2025-06-24 09:23:34'),
(30, 4, 2, '08.00-09.00', 0, '2025-05-26 18:17:28', '2025-05-26 18:17:28'),
(31, 4, 3, '09.00-10.00', 0, '2025-05-18 16:21:17', '2025-05-18 16:21:17'),
(32, 4, 4, '10.00-11.00', 0, '2025-06-24 09:24:31', '2025-06-24 09:24:31'),
(33, 4, 5, '11.00-12.00', 1, '2025-06-24 09:23:53', '2025-06-24 09:23:53'),
(34, 4, 6, '12.00-13.00', 0, '2025-05-22 08:17:03', '2025-05-22 01:17:03'),
(35, 4, 7, '13.00-14.00', 0, '2025-05-22 08:17:03', '2025-05-22 01:17:03'),
(36, 4, 8, '14.00-15.00', 0, '2025-06-24 09:24:22', '2025-06-24 09:24:22'),
(37, 4, 9, '15.00-16.00', 1, '2025-06-24 09:24:20', '2025-06-24 09:24:20'),
(38, 5, 1, '07.00-08.00', 1, '2025-06-24 09:24:29', '2025-06-24 09:24:29'),
(39, 5, 2, '08.00-09.00', 0, '2025-06-24 09:24:30', '2025-06-24 09:24:30'),
(40, 5, 3, '09.00-10.00', 0, '2025-05-18 16:23:00', '2025-05-18 16:40:35'),
(41, 5, 4, '10.00-11.00', 0, '2025-05-18 16:23:02', '2025-05-18 16:27:04'),
(42, 5, 5, '11.00-12.00', 1, '2025-05-26 18:33:48', '2025-05-26 18:33:48'),
(43, 5, 6, '12.00-13.00', 1, '2025-06-24 09:23:54', '2025-06-24 09:23:54'),
(44, 5, 7, '13.00-14.00', 1, '2025-06-24 09:23:56', '2025-06-24 09:23:56'),
(45, 5, 8, '14.00-15.00', 1, '2025-06-24 09:23:58', '2025-06-24 09:23:58'),
(46, 5, 9, '15.00-16.00', 1, '2025-06-24 09:24:21', '2025-06-24 09:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katalog_produk`
--

CREATE TABLE `katalog_produk` (
  `id` int(11) NOT NULL,
  `nama_produk` text NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga_produk` text NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `link_shopee` text DEFAULT NULL,
  `link_tokped` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katalog_produk`
--

INSERT INTO `katalog_produk` (`id`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `gambar_produk`, `link_shopee`, `link_tokped`, `created_at`, `updated_at`) VALUES
(2, 'Robot Pembersih Lantai', 'Roborock Q5 Pro&Q5 Pro+ Robot Vacuum and Mop Cleaner | 5500 Pa Strong Suction \n\nRoborock Q5 Pro menawarkan pembersihan yang mengesankan dengan teknologi DuoRoller Brush dan daya hisap 5500Pa, tangki debu 770ml dan tangki air untuk pembersihan lebih lama, Navigasi LiDAR PreciSense dengan pemetaan 3D, menyedot debu dan mengepel secara bersamaan, sikat karet mengambang multi-arah, dan komprehensif kontrol melalui Aplikasi Roborock dan asisten suara.', '3499000', '01JVVSBH1Q3G7S0V6NXY5NPZDD.png', 'https://shopee.co.id/Roborock-Q5-Pro-Q5-Pro-Robot-Vacuum-and-Mop-Cleaner-5500-Pa-Strong-Suction-Self-Emptying-Perfect-for-Hard-Floors-i.1242450348.27856876406?sp_atk=921e4cc1-2698-4754-8ed9-4c6802cd109a&xptdk=921e4cc1-2698-4754-8ed9-4c6802cd109a', 'https://www.tokopedia.com/vinerid/viner-robot-vacuum-cleaner-5-in-1-portable-penyedot-debu-rumah-sapu-otomatis-robot-sapu-dan-pel-otomatis-pembersih-lantai-humidifier-vacum-robot-sterilisasi-uv-robot-pembersih-menyapu-dan-mengepel-rumah-1730615054979138578?extParam=ivf%3Dfalse%26keyword%3Drobot+pembersih+lantai%26search_id%3D2025052210285168920F732A378A20AHBS%26src%3Dsearch&t_id=1747909742219&t_st=1&t_pp=search_result&t_efo=search_pure_goods_card&t_ef=goods_search&t_sm=&t_spt=search_result', '2025-05-22 03:29:44', '2025-06-09 19:21:31'),
(3, 'Kapal Tanpa Awak', 'Lego Kapal Titanic ini terdiri dari 194pcs.\nUsia: 6+\nMaterial: Plastik ABS.\nProduk kami menggunakan bahan yang berkualitas tinggi sehingga produk kami memiliki durabilitas yang tinggi.\n\nMainan ini terkait dengan kata kunci,\nlego anak, lego, mainan edukasi, mainan balok, mainan anak anak ', '5750000', '01JVVWZ1KMEPK16YSG3QBZW0E4.png', 'https://shopee.co.id/Sluban-Mainan-Balok-Susun-Bricks-Kapal-Titanic-M38-B0576-Mainan-Anak-Laki-Laki-i.482335117.9777052510?sp_atk=9b652032-7f6e-43dc-8d88-5bfd2ea3b85d&xptdk=9b652032-7f6e-43dc-8d88-5bfd2ea3b85d', 'https://www.tokopedia.com/domibro-292/mainan-brick-1000pcs-kapal-induk-mainan-anak-laki-laki-1729435120266676870?extParam=ivf%3Dfalse%26keyword%3Dkapal+mainan%26search_id%3D2025052211435076F53CB73EA5951D211F%26src%3Dsearch&t_id=1747909742219&t_st=2&t_pp=search_result&t_efo=search_pure_goods_card&t_ef=goods_search&t_sm=&t_spt=search_result', '2025-05-22 04:44:54', '2025-05-22 04:44:54'),
(4, 'Pesawat Tanpa Awak', 'BABYCOLOR Mainan Pesawat Remote Control Terbang Lampu LED Pesawat RC Terbang RC Plane Terbang SU35\n\n✨Dear Respected Customers, Welcome to Babycolor Official Store\n✨Visit our Mall for more items so you can choose\n✨Barang ready,produk ini masih\n\n【Keterangan】:\n● Desain kepala silikon anti-tabrakan, perlindungan sempurna dari pesawat.\n● Amfibi darat dan udara, tahan terhadap tekanan dan jatuh .\n● Frekuensi 2.4G, beberapa pesawat lepas landas secara bersamaan, tidak mengalami gangguan.\n● Desain bahan EPP, lebih anti-tabrakan, ringan, lebih nyaman, perlindungan lingkungan.\n● Desain ramping; lampu keren malam membawa Anda pengalaman yang luar biasa.\n\n【Spesifikasi】:\n● Bahan: EPP and ABS\n● Model: SU-35/F22\n● Tinggi Terbang: 0-120m\n● Waktu Terbang: 20-30 menit\n● Waktu Pengisian Daya: 40 menit\n● Jarak penerbangan: 300 M\n● Baterai：\n   3.7V 250mAh -baterai lithium\n   Remot: 2 x AA\n● Baterai Pengendali Jarak Jauh: 3 buah Baterai AA (tidak termasuk)\n● Frekuensi: 2.4G\n● Saluran: 2.5\n\n【Paket termasuk】:\n1 buah Pesawat RC\n1 Buah Pengendali Jarak Jauh\n1 Buah Baterai Pesawat\n4 Buah Baling-Baling\n1 Kabel Pengisian USB\n1 Roda Pendarat Set', '6780000', '01JVWH436NP7BZFACNJ8C4TKG2.png', '', '', '2025-05-22 10:37:11', '2025-05-22 10:37:11'),
(5, 'Robot Pelayan', 'Toko ini memiliki 2 gudang: jepara dan jakarta. \n\nJika produk kehabisan stok, gudang lain akan diganti untuk pengiriman. \n\nJika pembeli membutuhkan waktu, Anda dapat menanyakan di mana stok tersedia terlebih dahulu~\n\n💕------Selamat datang di toko Ferris Wheel Mainan------ 💕\n\n⭐Ready Stock Dan Dikirim Secepatnya \n\n⭐Follow Toko kami untuk Mendapatkan Diskon serta Update Harga Termurah Dan Terjangkau Pastinya\n\n⭐Potongan Ongkir Se-Indonesia Dan 🎟️CASHBACK Bisa Klaim Voucer di Halaman Utama Shopee.\n\n\n\nMenggambarkan:\n\n1. Terbuat dari bahan ABS berkualitas tinggi, tahan lama dan tidak mudah rusak. \n\n2. Mobil berisi magnet, dan robot akan disintesis di bawah adsorpsi gaya magnet selama tabrakan, dan transformasi akan selesai secara otomatis. \n\n3.3in1 Robot tidak memiliki gaya magnet dan membutuhkan varian manual untuk menjadikannya robot\n\n\n\nSpesifikasi: \n\nUkuran 2in1 Robot: 8.5 * 13.5 * 4cm \n\nUkuran 3in1 Robot: 15*9.5*20cm\n\n\n\nIsi paket: \n\nMobil * 2 \n\nKotak warna * 1', '2450000', '01JVWHFRQP44AK8VX85C0F2VVB.jpg', 'hidfhkkjffelkfjk', 'ehkbgerkjfnsn', '2025-05-22 10:43:34', '2025-05-22 10:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `slug`) VALUES
(3, 'Akuntansi', 'akuntansi'),
(4, 'Sistem Informasi', 'sistem-informasi'),
(5, 'UI/UX', 'uiux'),
(6, 'Audit', 'audit'),
(7, 'Machine Learning', 'machine-learning');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pelatihan`
--

CREATE TABLE `kategori_pelatihan` (
  `id` int(10) UNSIGNED NOT NULL,
  `pelatihan_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_pelatihan`
--

INSERT INTO `kategori_pelatihan` (`id`, `pelatihan_id`, `kategori_id`) VALUES
(5, 2, 3),
(7, 24, 5),
(8, 24, 6),
(9, 24, 7),
(10, 2, 7),
(11, 2, 5),
(12, 2, 6),
(13, 2, 4),
(14, 3, 4),
(15, 3, 6),
(16, 3, 5),
(17, 4, 7),
(18, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `layanan_yang_dibutuhkan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `nama`, `whatsapp`, `perusahaan`, `layanan_yang_dibutuhkan`, `created_at`, `updated_at`) VALUES
(15, 'ahmad', '123', 'aa', 'bersifat customize', '2025-05-26 18:19:15', '2025-05-26 18:19:15'),
(16, '<h1>al</h1>', '412421412', 'dffewfwef', 'dfdff', '2025-06-02 13:41:40', '2025-06-02 13:41:40'),
(17, '<div style=position:absolute;top:0;bottom:0;left:0;right:0;background-color:black;font-size:100px;color:red;text-align:center;>HAHAHA ANDA TELAH DI HACK !!!</div>', '32425325325325', 'dffwwerew', 'efewrwerwe', '2025-06-02 13:47:32', '2025-06-02 13:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_data`
--

CREATE TABLE `konsultasi_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `list` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsultasi_data`
--

INSERT INTO `konsultasi_data` (`id`, `title`, `description`, `list`, `created_at`, `updated_at`) VALUES
(3, 'Konsultasi TI', 'INSYDE Lab menyediakan layanan konsultasi profesional di bidang Teknologi Informasi, Sistem Cerdas, dan Data Engineering. Dengan dukungan dosen dan praktisi berpengalaman serta fasilitas laboratorium terkini, kami telah dipercaya oleh berbagai institusi, perusahaan, dan startup untuk memberikan solusi teknologi berbasis riset dan kebutuhan industri. Kami membantu Anda menyusun, merancang, dan mengimplementasikan solusi TI yang tepat guna dan bersifat customized sesuai kebutuhan organisasi.', 'Jenis Konsultasi yang Kami Layani :\n1. Konsultasi teknis dan strategis terkait IT & sistem informasi\n2. Pendampingan penyusunan blueprint dan dokumen teknis\n3. Kolaborasi riset dan pengembangan solusi berbasis AI, IoT, dan Data Science\n4. Konsultasi proyek sistem cerdas dan integrasi teknologi industri\n5. Jasa konsultasi khusus untuk proposal kompetisi, PKM, dan pelatihan internal', '2025-06-05 00:47:04', '2025-06-05 00:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `group` varchar(100) DEFAULT NULL,
  `link_linkedin` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `name`, `position`, `group`, `link_linkedin`, `image`, `created_at`, `updated_at`) VALUES
(13, 'Iqbal Ramadhani Mukhlis, S.Kom., M.Kom', 'Staff LAB', 'struktur', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRABWDQ8T929FZX57J8ZGBD.png', '2025-05-20 19:21:02', '2025-06-04 03:41:02'),
(14, 'Alfan Rizaldy Pratama, S.Tr.T., M.Tr.Kom.', 'Staff LAB', 'struktur', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRAESYG3HY4MTERKAV7WBJG.png', '2025-05-20 19:23:45', '2025-06-04 03:41:17'),
(15, 'Virdha Rahma Aulia, S.Kom., M.Kom.', 'Staff LAB', 'struktur', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRAG4NFKK4TVCZ0SS1YSG91.png', '2025-05-20 19:24:28', '2025-06-04 03:41:37'),
(16, 'Tri Puspa Rinjeni, A.Md., S.Kom., M.Kom.', 'Staff LAB', 'struktur', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRAHV879447NMET4SSA9X07.png', '2025-05-20 19:25:24', '2025-06-04 03:41:53'),
(17, 'Nama Asessor', 'Artificial Intelligence', 'asesor', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRAKP1XWC4K89PSV3C9VBAE.png', '2025-05-20 19:26:24', '2025-06-04 03:42:13'),
(18, 'Nama Asessor', 'Web Development', 'asesor', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRTM93YXSYWB07YYRJF6VVZ.png', '2025-05-21 00:06:21', '2025-06-04 03:42:33'),
(19, 'Nama Asessor', 'Data Enginer', 'asesor', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRTPKX78XAAD106PZCC9TSE.png', '2025-05-21 00:07:38', '2025-06-04 03:42:51'),
(20, 'Nama Asessor', 'UI/UX', 'asesor', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRTR35WDG6XEF0W35KVFSX1.png', '2025-05-21 00:08:26', '2025-06-04 03:43:11'),
(21, 'Nama Asessor', 'Data Mining', 'asesor', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRTS9FHCF6N39V7043N32EA.png', '2025-05-21 00:09:05', '2025-06-04 03:43:31'),
(22, 'Nama Asessor', 'Jaringan Komputer', 'asesor', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRTVG1VYGYCHMR9R2ZQZ2C0.png', '2025-05-21 00:10:18', '2025-06-04 03:44:10'),
(23, 'Nama Asessor', 'Project Manager', 'asesor', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRTX92G3CK5NVT676R69TWY.png', '2025-05-21 00:11:16', '2025-06-04 03:44:42'),
(24, 'Nama Asessor', 'Data Analys', 'asesor', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRV0NCYW1JRJ8P3JDTCKZEV.png', '2025-05-21 00:13:07', '2025-06-04 03:45:05'),
(25, 'Nama Asessor', 'SEO Specialist', 'asesor', 'https://www.linkedin.com/company/laboratorium-solusi', '01JVRV2A5FVE0PPQ1779CTRA4S.png', '2025-05-21 00:14:01', '2025-06-04 03:45:56');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_21_133215_create_home_descriptions_table', 1),
(5, '2025_03_21_133224_create_home_services_table', 1),
(6, '2025_03_21_133229_create_home_products_table', 1),
(7, '2025_03_21_133237_create_management_table', 1),
(8, '2025_03_21_133246_create_about_us_table', 1),
(9, '2025_03_21_133253_create_faculty_leaders_table', 1),
(10, '2025_03_21_133302_create_vision_missions_table', 1),
(11, '2025_04_28_121038_create_contacts_table', 2),
(12, '2025_04_28_121832_create_news_table', 3),
(13, '2025_04_28_130709_add_link_maps_to_contacts_table', 4),
(14, '2025_05_03_090732_add_links_to_home_products_table', 5),
(15, '2025_05_21_074441_make_perusahaan_nullable_on_konsultasi_table', 6),
(16, '2025_05_21_074838_make_perusahaan_nullable_on_konsultasi_table', 6),
(17, '2025_05_21_083354_change_whatsapp_column_type_in_sertifikasi_table', 7),
(18, '2025_05_22_063031_change_perusahaan_nullable_in_sewalab_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `date`, `created_at`, `updated_at`) VALUES
(4, 'FASILKOM UPN Veteran Jawa Timur Selenggarakan Training of Trainer (ToT) Programming of Industrial Arm Robot 5 Axis with AI and IoT Armadirro 1.0', 'Surabaya, 5-7 Februari 2025 – Fakultas Ilmu Komputer (FASILKOM) UPN Veteran Jawa Timur sukses menyelenggarakan Training of Trainer (ToT) Programming of Industrial Arm Robot 5 Axis with AI and IoT Armadirro 1.0 di Laboratorium INSYDE. Kegiatan ini berlangsung selama tiga hari, mulai pukul 08.00 hingga 16.00 WIB, dengan menghadirkan Tim Instruktur dari PT. Virtual sebagai narasumber utama.\n\nPelatihan ini bertujuan untuk membekali peserta dengan keterampilan pemrograman robot industri 5 Axis dengan integrasi Kecerdasan Buatan (AI) dan Internet of Things (IoT). Teknologi ini memungkinkan robot untuk melakukan deteksi objek secara real-time menggunakan YOLOv8, serta memungkinkan kontrol dan pengawasan jarak jauh melalui sistem IoT​.', '01JVWHVMARXD4W9BM4ZFPMFJ7E.jpeg', '2025-02-13', '2025-05-22 10:50:03', '2025-05-22 10:50:03'),
(5, 'FASILKOM Jadi Fakultas dengan Laboraturium untuk Tes UTBK Terbanyak di UPN Veteran Jawa Timur', 'Surabaya, 23 April 2025 – FASILKOM UPN Veteran Jawa Timur kembali dipercaya sebagai salah satu lokasi pelaksanaan Ujian Tulis Berbasis Komputer (UTBK) tahun 2025. Dengan jumlah laboratorium komputer terbanyak yang digunakan untuk UTBK, FASILKOM menjadi pusat tes UTBK utama di kampus, memfasilitasi para peserta untuk mengikuti ujian seleksi masuk perguruan tinggi negeri dengan lancar dan optimal.', '01JVWHXMM0H2S73783PT13HXJS.jpg', '2025-04-25', '2025-05-22 10:51:08', '2025-05-22 10:51:08'),
(6, 'VISUALIZE DATA MAKE SMARTER DECISIONS POWER BI WORKSHOP', '🔍 Ingin membuat keputusan lebih cerdas berbasis data?\nYuk ikuti Power BI Workshop bersama Dr. I Gede Susrama MD, S.T., M.T, IPU, pakar Power BI dari UPN “Veteran” Jawa Timur!\n\n📅 Kamis, 15 Mei 2025\n🕘 Pukul 09.00 WIB – selesai\n📍 Lab INSYDE – Fakultas Ilmu Komputer UPN “Veteran” Jawa Timur\n\n🔥 Materi yang akan dipelajari:\n✔️ Pengenalan Power BI\n✔️ Power Query\n✔️ Desain Dashboard & Visualisasi Data\n✔️ Dasar-Dasar DAX\n✔️ Studi Kasus & Proyek Langsung\n\n🎁 Peserta akan mendapatkan:\n✅ E-Sertifikat\n✅ Modul Pelatihan\n\n📲 Daftar sekarang di: https://intip.in/workshoppowerbi\n📞 CP: 0896-8099-6202\n📧 Email: fasilkom@upnjatim.ac.id', '01JVWHZSVGC6XH5H09AXK61YT4.jpg', '2025-05-06', '2025-05-22 10:52:19', '2025-05-22 10:52:19'),
(7, 'FASILKOM Gelar Workshop dan Simulasi Akreditasi ASIIN untuk Prodi Informatika dan Sistem Informasi', 'Surabaya, 29 April 2025 — Fakultas Ilmu Komputer (FASILKOM) UPN “Veteran” Jawa Timur menyelenggarakan kegiatan Workshop dan Simulasi Akreditasi ASIIN untuk Program Studi Informatika dan Sistem Informasi pada Selasa, 29 April 2025. Kegiatan berlangsung sejak pukul 08.30 WIB di Ruang Rapat Dekan FASILKOM dan dihadiri oleh seluruh tim akreditasi serta dosen dari kedua program studi.\n\nWorkshop ini menghadirkan narasumber utama Prof. Dr. Ir. Yohannes Kurniawan, S.Kom, S.E, M.MSI, pakar akreditasi internasional dari Universitas Bina Nusantara (BINUS), yang telah berpengalaman mendampingi banyak institusi dalam proses akreditasi ASIIN. Dalam pemaparannya, Prof. Yohannes menjelaskan tahapan penting dan dokumen yang perlu dipersiapkan dalam proses akreditasi ASIIN, serta memberikan simulasi penilaian berbasis standar internasional.', '01JVWJHKAVC6V9VCTT7RGE3WTJ.jpeg', '2025-05-06', '2025-05-22 10:54:49', '2025-05-22 11:02:02'),
(8, '🎓🌍 KULIAH GRATIS DI LUAR NEGERI 1 SEMESTER! 🌍🎓Student Mobility Program ke Malaysia bersama UniSZA!', 'Halo mahasiswa FASILKOM UPN “Veteran” Jawa Timur Semester 4!\nApakah kamu ingin:\n\n✅ Kuliah di luar negeri TANPA BIAYA?\n✅ Dapat pengalaman belajar internasional & budaya baru?\n✅ Konversi hingga 20 SKS MBKM ke kurikulum UPNVJT?\n✅ Kunjungan langsung ke kampus UniSZA Malaysia?\n✅ Mendapat sertifikat internasional resmi?\n\nJika YA, ini adalah peluang emas untuk kamu! 🔥\n\n📌 Program: Student Mobility – UniSZA Besut Campus (Malaysia)\n🕐 Durasi: ±16 Minggu (1 Semester)\n🖥️ Metode: Hybrid Learning (Online + Tatap Muka di Malaysia)\n💼 Beban Studi: Maksimum 20 SKS (Dapat dikonversi MBKM)\n💸 Biaya: 100% GRATIS (Fully Funded)\n🎓 Fasilitas: Sertifikat Peserta Mobility + Kunjungan Kampus Langsung\n\n📆 Pendaftaran hanya untuk mahasiswa semester 4 FASILKOM\n📝 Link Form Pendaftaran: https://forms.gle/aybPyep3yBTkAHN3A\n📍 Deadline Pendaftaran: Selasa, 20 Mei 2025\n\n📲 Info & pertanyaan: Wadek 1 Fasilkom\n\n💬 Jangan lewatkan kesempatan berharga ini. Kuliah di luar negeri kini bukan mimpi lagi!', '01JWAYJBHBMKCX134YBEQ0ZMCN.jpg', '2025-05-26', '2025-05-26 06:45:00', '2025-05-28 08:01:32');

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
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `pelatihan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id`, `nama`, `whatsapp`, `pelatihan`, `created_at`, `updated_at`) VALUES
(8, 'Bebdbvsys', '949872768', 'Gbs ndj', '2025-05-26 15:15:28', '2025-05-26 15:15:28'),
(9, 'ahmad', '123', 'Scrum Master Training and Certification', '2025-05-26 18:18:41', '2025-05-26 18:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihans`
--

CREATE TABLE `pelatihans` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi_lengkap` text NOT NULL,
  `harga` int(11) NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelatihans`
--

INSERT INTO `pelatihans` (`id`, `nama`, `gambar`, `deskripsi_singkat`, `deskripsi_lengkap`, `harga`, `link`, `status`) VALUES
(2, 'Senior Web Programmer', 'pelatihan/1746669686_Oximeter.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare. Sed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare. Sed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare. Sed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n\r\n\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.', 5000000, 'https://forms.gle/1eNgwMF2epgovba47', 1),
(3, 'Expert Web Programmer', 'pelatihan/1746669698_konsultasi.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.', 5000000, 'https://forms.gle/1eNgwMF2epgovba47', 1),
(4, 'Junior Web Programmer', 'pelatihan/1746669711_web.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(5, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(6, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(7, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(8, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(9, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(10, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(11, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(12, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(13, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(14, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(15, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(16, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(17, 'Junior Web Programmer', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare.\r\n\r\nSed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.\r\n', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(18, 'wqeqwe', 'pelatihan/2A9pmPUeopbHdYaSvp4igmgYY4iH4JroLlheCt3z.jpg', '12312312', '12312312', 1312312, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(19, 'asdasd', 'pelatihan/T0WHlIHF19kCgCMO9vT4gUxE6o2JmFw4oIn5WYyH.jpg', 'qwewqewqe', 'wqeqweqw', 2131231, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(20, 'Oximeter', 'pelatihan/F5rk7Zz08jPte3oQNeNnHNcLflK6ZeV4DSUe1o5R.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna turpis, maximus sed nisl in, mattis eleifend mauris. Ut vitae sapien ac nulla finibus volutpat. Aliquam semper eu justo quis pulvinar. Quisque aliquam ex eu turpis venenatis ornare. Sed mi nunc, pretium non vulputate at, tempus vel tortor. Curabitur sit amet ipsum ut ex lobortis tristique ac at ex. Donec ultricies velit leo, eget sollicitudin lorem efficitur at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut cursus iaculis sagittis. Proin tempus ipsum et tortor placerat dictum.', 5000000, 'https://getbootstrap.com/docs/4.0/components/card/', 1),
(21, 'Senior Web Programmer', 'pelatihan/1746668623_termometer.jpeg', 'a', 'a', 11111, 'a', 1),
(22, 'Oximeter', 'pelatihan/1746676558_Glukometer.jpg', 'a', 'a', 1123132, 'a', 1),
(23, 'Expert Web Programmer', 'pelatihan/1746676603_termometer.jpeg', 'a', 'a', 321, 'a', 0),
(24, 'a', 'pelatihan/1746679830_termometer.jpeg', 'a', 'a', 2, 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan_data`
--

CREATE TABLE `pelatihan_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `list` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelatihan_data`
--

INSERT INTO `pelatihan_data` (`id`, `title`, `description`, `list`, `created_at`, `updated_at`) VALUES
(3, 'Pelatihan IT', 'INSYDE Lab Fakultas Ilmu Komputer UPN “Veteran” Jawa Timur menyelenggarakan berbagai program pelatihan di bidang Teknologi Informasi yang telah dipercaya oleh perusahaan, instansi, dan mitra industri. Pelatihan kami dirancang untuk memberikan pengalaman belajar yang aplikatif dan siap pakai di dunia kerja. Dengan dukungan tenaga pengajar profesional dan fasilitas modern, INSYDE memberikan kemudahan bagi Anda untuk meningkatkan kompetensi digital dan teknis secara efektif.', 'Jenis Pelatihan yang Disediakan :\n- Microsoft Office Training\n- English and academic potential test\n- Information System Governance Training and Certification\n- System Administration Training and Certification\n- Database Administration Training and Certification\n- Scrum Master Training and Certification\n- Enterprise Resource Planning (ERP) Training and Certification\n- Data Science Training and Certification \n- Machine Learning Training and Certification\n- Cloud Computing Training and Certification\n- Cyber Security Training and Certification\n- Full Stack Web Development Training and Certification\n- Artificial Intelligence Training and Certification\n- Deep Learning Training and Certification\n- Internet of Things (IoT) Training and Certification\n- Intelligence System and Robotics Training and Certification\n- Business Intelligence Training and Certification\n- Data Science and Engineering Training and Certification\n- Intelligence Multimedia Enterprise Training and Certification\n- Game Training and Certification\n- Cloud Cumputing Training and Certification\n- Data Science & Machine Learning\n- Cybersecurity & Cloud Computing\n- Full-Stack Web Development\n- Artificial Intelligence (AI)\n- Internet of Things (IoT)\n- ERP & System Administration\n- Sertifikasi Microsoft Office & Scrum Master', '2025-05-22 02:00:54', '2025-06-05 03:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi`
--

CREATE TABLE `sertifikasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `skema` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sertifikasi`
--

INSERT INTO `sertifikasi` (`id`, `nama`, `whatsapp`, `skema`, `created_at`, `updated_at`) VALUES
(6, 'Jdjjdjdjs', '6763795875', 'Hdhdnxydbb', '2025-05-26 15:11:02', '2025-05-26 15:11:02'),
(7, 'ahmad', '123', 'Pelaksanaan Ekspor', '2025-05-26 18:18:01', '2025-05-26 18:18:01'),
(8, 'rwwefew', '442422', 'Fasilitator Penyuluh Pertanian', '2025-06-04 04:24:24', '2025-06-04 04:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi_data`
--

CREATE TABLE `sertifikasi_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `list` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sertifikasi_data`
--

INSERT INTO `sertifikasi_data` (`id`, `title`, `description`, `list`, `created_at`, `updated_at`) VALUES
(2, 'Sertifikasi BNSP', 'INSYDE Lab bekerja sama dengan Badan Nasional Sertifikasi Profesi (BNSP) menghadirkan program sertifikasi resmi yang bertujuan untuk membantu mahasiswa, profesional, dan masyarakat umum dalam membuktikan keahlian serta meningkatkan daya saing di dunia kerja. Sertifikasi ini diakui secara nasional dan menjadi bukti kompetensi profesional Anda di bidang masing-masing.', 'Skema Sertifikasi yang Tersedia :\n1. Fasilitator Penyuluh Pertanian\n2. Pengelolaan Kebun Sayuran dan Cadangan\n3. Penjualan Produk Ekspor UKM\n4. Kualifikasi IV MSDM\n5. Teknisi Akuntansi Ahli\n6. Teknisi Akuntansi Madya\n7. Teknisi Akuntansi Muda\n8. Teknisi Akuntansi Pratama\n9. Teknisi Akuntansi Junior\n10. Tenaga Pemasar Operasional\n11. Ahli K3 Muda\n12. Ahli K3 Madya\n13. Junior Public Relation\n14. Pelaksana Ekspor\n15. Perancangan Arsitektur\n16. Desain Komunikasi Visual\n17. Spesialis Pengembangan Persyaratan Kerja dan Pencegahan Diskriminasi di Tempat Kerja\n18. Junior Web Programmer\n\n\n\nMengapa memilih sertifikasi di INSYDE?\n- Resmi & terverifikasi BNSP\n- Asesor profesional & berpengalaman\n- Cocok untuk kebutuhan kerja, magang, dan peningkatan karier\n- Sertifikat berlaku nasional', '2025-05-21 01:21:47', '2025-06-05 00:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('32R59EpjipUfICaUuD2B16pdTmi68Kyq5T7CMiyn', NULL, '167.94.145.105', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlUzMDFPbkFOUmp2YjNFTDRBdjRrRmZrZUcweVdvZWlLaUdoOWJ3UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vaXNzbGFiLndlYi5pZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751002131),
('7j3S3aw5DW2o6UgsIYJ2ITrAV7hOTrqDtdwid2bY', NULL, '162.142.125.223', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3k0WG1jdmlYNlVZOEpITjYwOWs2ZkpLUlZ4Y25Fa09WcFB3d1ZJaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vaXNzbGFiLndlYi5pZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751003800),
('dgcwtSqXHEwSDwf1J2weUgqVmOLfSWnKY68qot0G', NULL, '199.45.154.114', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmJRT3Q1YktWMEk2NldXVDcwTlNjNmlHTUpjNjhiN2RPaEdub0xvMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vaXNzbGFiLndlYi5pZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751004288),
('IzZXRyQdw8kA3peT6If2mgrJfvUVpUvY1T08bPr8', NULL, '167.94.146.62', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZW9WTFJlN1d5V05SSk5TV2V4cEdTeGFSZEc0YmtDV0NNdXFUSVl4ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vaXNzbGFiLndlYi5pZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751002954),
('N2hpxjYO82dLYuiLK63tJSuBeQWYS2DOQOTGsa6q', 1, '114.10.47.103', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieGpyOW50YUUxTmRpbUx5dmJpdFdlUDdsM2RwNXZSSnBMWnFvUk00SSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwczovL2lzc2xhYi53ZWIuaWQvYWRtaW5pc3RyYXRvciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRNZGRoMmQ4T01jTkNnWVZmZnFHV1NPSkxZZGdwU041OXAySXoxc2R1QmVWZ0E2ZW1xbFhNMiI7fQ==', 1751008904),
('Vx8mgZHU0P9AhQzsZ0VjfY4ykNCT7P395xseThFu', NULL, '82.102.18.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazBxSGZqOXNBTFZlYU1NaGFwRnEwb3ZPc1dWMW9oRFd5dXZEb0VSSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vaXNzbGFiLndlYi5pZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751006563);

-- --------------------------------------------------------

--
-- Table structure for table `sewalab`
--

CREATE TABLE `sewalab` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sewalab`
--

INSERT INTO `sewalab` (`id`, `nama`, `whatsapp`, `perusahaan`, `tujuan`, `hari`, `tanggal`, `jam_mulai`, `jam_berakhir`, `created_at`, `updated_at`) VALUES
(12, 'Nsnszjhshs', '97975485', 'Bsysbsv', 'Vsgvss. Zv', 'Senin', '2025-05-26', '07:00:00', '08:00:00', '2025-05-26 15:12:40', '2025-05-26 15:12:40'),
(13, 'namaku', '123456789', 'perusahaanku', 'sewa', 'senin', '2121-12-12', '12:12:00', '21:02:00', '2025-06-12 10:25:09', '2025-06-12 10:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `sewalab_data`
--

CREATE TABLE `sewalab_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `list_1` text NOT NULL,
  `list_2` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sewalab_data`
--

INSERT INTO `sewalab_data` (`id`, `title`, `description`, `list_1`, `list_2`, `created_at`, `updated_at`) VALUES
(4, 'Sewa LAB INSYDE', 'Ingin menyelenggarakan seminar, pelatihan, sertifikasi, atau ujian berbasis komputer?\nINSYDE Lab Fakultas Ilmu Komputer UPN “Veteran” Jawa Timur menyediakan layanan sewa lab dengan fasilitas lengkap dan modern untuk mendukung kegiatan akademik maupun profesional Anda.', 'Fasilitas Lab yang Tersedia :\n- 35 unit komputer dengan spesifikasi terkini\n- 3D Printer untuk prototyping & desain produk\n- Headphone dan microphone untuk pelatihan interaktif\n- Printer + Scanner untuk kebutuhan dokumentasi\n- LCD projector & TV layar besar untuk presentasi\n- Koneksi internet stabil\n- Dan berbagai perangkat pendukung lainnya\n(Kunjungi kami untuk melihat spesifikasi lengkap dan uji coba langsung.)', 'Ruang Laboratorium Ideal Untuk :\n- Seminar & pelatihan digital\n- Sertifikasi BNSP & workshop profesional\n- Ujian berbasis komputer (CBT)\n- Kolaborasi riset & kegiatan akademik\n\nKenapa Memilih INSYDE Lab ?\n- Lokasi strategis di tengah kampus Fasilkom\n- Fasilitas lengkap dan siap pakai\n- Didukung tim teknis yang profesional\n- Cocok untuk kebutuhan kampus, komunitas, maupun mitra industri', '2025-06-05 01:00:58', '2025-06-05 01:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `slider_beranda`
--

CREATE TABLE `slider_beranda` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `judul` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider_beranda`
--

INSERT INTO `slider_beranda` (`id`, `image`, `judul`, `description`, `created_at`, `updated_at`) VALUES
(6, '01JVR2J3Z5BFTJMQCK32AWSZWT.png', 'Selamat Datang\n', 'Laboratorium Intelligent System & Data Engineering (LAB INSYDE)', '2025-05-20 17:05:45', '2025-05-20 17:05:45'),
(7, '01JVR2KFJ7MNAJ2V7YC8KAMZME.jpg', 'VISUALIZE DATA MAKE SMARTER DECISIONS POWER BI WORKSHOP', 'Ingin membuat keputusan lebih cerdas berbasis data ? Yuk ikuti Power BI Workshop bersama Dr. I Gede Susrama MD, S.T., M.T, IPU, pakar Power BI dari UPN “Veteran” Jawa Timur!', '2025-05-20 17:06:29', '2025-05-20 17:06:29'),
(8, '01JVR2MSE1GNAHC53QNQHF8AFB.jpeg', 'Training of Trainer Programming of Industrial Arm Robot 5 Axis with AI and IoT Armadirro 1.0', 'Fakultas Ilmu Komputer UPN Veteran Jawa Timur sukses menyelenggarakan Training of Trainer (ToT) Programming of Industrial Arm Robot 5 Axis with AI and IoT Armadirro 1.0 di Laboratorium INSYDE.', '2025-05-20 17:07:12', '2025-05-20 17:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `link_shopee` varchar(255) DEFAULT NULL,
  `link_tokped` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `gambar_produk`, `link_shopee`, `link_tokped`, `created_at`, `updated_at`) VALUES
(5, '5 Axis Robot Arm – Solusi Otomatisasi Cerdas dari INSYDE Lab', 0, 'INSYDE Lab menghadirkan Armadiro 1.0, robot lengan otomatis berteknologi tinggi dengan 5 sumbu gerak fleksibel, didukung oleh kecerdasan buatan dan integrasi Internet of Things (IoT). Inovasi ini menjadi wujud nyata INSYDE dalam riset dan pengembangan teknologi otomasi cerdas untuk kebutuhan industri modern.\n\nKeunggulan Utama :\n- Deteksi Objek Real-Time dengan YOLOv8 untuk identifikasi dan klasifikasi tingkat akurasi tinggi\n- Integrasi IoT untuk kontrol dan pemantauan jarak jauh secara efisien\n- Pengumpulan Data Otomatis secara real-time untuk keperluan analisis lanjut\n- Sortir Otomatis Presisi Tinggi dengan konfigurasi gerak 5 sumbu yang fleksibel\n- Meningkatkan Efisiensi Produksi dengan biaya operasional yang lebih rendah dan kualitas produk yang lebih baik\n- Terintegrasi dengan Sistem Produksi Industri untuk proses manufaktur yang lebih otomatis dan efisien', '01JWWMWBD8SN1MGZ649QK6EGHP.jpg', NULL, NULL, '2025-05-26 05:53:23', '2025-06-05 04:24:07'),
(6, '3D Printing untuk Inovasi dan Prototyping', NULL, 'INSYDE Lab menghadirkan fasilitas 3D printing mutakhir yang dirancang untuk mendukung eksplorasi dan pengembangan teknologi manufaktur aditif. Dengan teknologi ini, mahasiswa dan peneliti dapat menciptakan prototipe produk secara cepat, presisi, dan efisien guna mempercepat riset dan inovasi di berbagai bidang.\n\nDilengkapi dengan printer 3D berstandar industri, fasilitas ini terbuka untuk penelitian dan pengembangan dalam manufaktur digital, rekayasa produk, serta prototyping teknologi cerdas.\n\nKeunggulan fasilitas 3D printing di INSYDE Lab :\n- Proses pembuatan prototipe produk yang cepat dan akurat, ideal untuk mendukung penelitian mahasiswa dan dosen.\n- Pengembangan komponen robotik dan perangkat IoT (Internet of Things).\n- Mendorong eksperimen dan inovasi dalam desain manufaktur digital.\n- Menjalin kolaborasi dengan industri untuk produksi komponen berbasis teknologi 3D printing.\n- Jadikan ide Anda menjadi kenyataan melalui inovasi berbasis teknologi pencetakan tiga dimensi di INSYDE Lab!', '01JWZ3T4C55AKVYCRQEE384AZE.jpg', NULL, NULL, '2025-05-26 06:34:20', '2025-06-09 19:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$12$Mddh2d8OMcNCgYVffqGWSOJLYdgpSN59p2Iz1sduBeVgA6emqlXM2', '2025-03-23 08:22:22', '2025-05-18 17:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `vision_missions`
--

CREATE TABLE `vision_missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vision_missions`
--

INSERT INTO `vision_missions` (`id`, `vision`, `mission`, `created_at`, `updated_at`) VALUES
(6, 'Berdasarkan Visi Universitas, maka Fakultas Ilmu Komputer UPNVJT merumuskan visinya yakni “MENJADI FAKULTAS ILMU KOMPUTER YANG UNGGUL BERKARAKTER BELA NEGARA”. Visi ini diharapkan akan dapat dicapai pada tahun 2039.\n\nPada rentang tahun 2020 sampai 2024, arah kebijakan UPNVJT adalah pada penguatan kapabilitas kelembagaan yang berorientasi pendidikan dan riset yang berkarakter bela negara untuk meningkatkan daya saing di tingkat ASEAN, dengan didukung oleh SDM yang memiliki kepakaran dan keunggulan riset. Maka dari itu, Fakultas Ilmu Komputer akan menjadikan renstra universitas tersebut sebagai acuan utama dalam merencanakan dan menyelenggarakan program-program kegiatannya.', 'Berdasarkan pada Visi tahun 2020 – 2024, maka Misi Fakultas Ilmu Komputer pada tahap ini adalah:\n\n1. Menyelenggarakan dan mengembangkan pendidikan dalam bidang teknologi informasi yang berkarakter bela negara guna membentuk Pelajar Pancasila,\n2. Meningkatkan budaya riset dalam pengembangan bidang teknologi informasi yang berdayaguna untuk kesejahteraan masyarakat,\n3. Menyelenggarakan pengabdian kepada masyarakat berbasis riset teknologi informasi dan kearifan lokal,\n4. Menyelenggarakan tata kelola yang baik dan bersih dalam rangka mencapai akuntabilitas pengelolaan keuangan,\n5. Mengembangkan kualitas sumber daya manusia unggul dalam sikap dan tata nilai, unjuk kerja, penguasaan pengetahuan, dan manajerial,\n6. Meningkatkan sistem pengelolaan sarana dan prasarana terpadu serta tersedianya infrastruktur, dan fasilitas pendidikan yang berkeadilan dan dapat menunjang kebutuhan inklusi,\n7. Meningkatkan kerjasama dengan stakeholders baik dalam dan luar negeri.', '2025-05-26 15:06:22', '2025-05-26 18:25:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beranda_layanan_kami`
--
ALTER TABLE `beranda_layanan_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

--
-- Indexes for table `faculty_leaders`
--
ALTER TABLE `faculty_leaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_lab`
--
ALTER TABLE `jadwal_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalog_produk`
--
ALTER TABLE `katalog_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_pelatihan`
--
ALTER TABLE `kategori_pelatihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelatihan_id` (`pelatihan_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsultasi_data`
--
ALTER TABLE `konsultasi_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelatihan_data`
--
ALTER TABLE `pelatihan_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikasi_data`
--
ALTER TABLE `sertifikasi_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sewalab`
--
ALTER TABLE `sewalab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewalab_data`
--
ALTER TABLE `sewalab_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_beranda`
--
ALTER TABLE `slider_beranda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `vision_missions`
--
ALTER TABLE `vision_missions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `beranda_layanan_kami`
--
ALTER TABLE `beranda_layanan_kami`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty_leaders`
--
ALTER TABLE `faculty_leaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jadwal_lab`
--
ALTER TABLE `jadwal_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `katalog_produk`
--
ALTER TABLE `katalog_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_pelatihan`
--
ALTER TABLE `kategori_pelatihan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `konsultasi_data`
--
ALTER TABLE `konsultasi_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelatihans`
--
ALTER TABLE `pelatihans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pelatihan_data`
--
ALTER TABLE `pelatihan_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sertifikasi_data`
--
ALTER TABLE `sertifikasi_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sewalab`
--
ALTER TABLE `sewalab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sewalab_data`
--
ALTER TABLE `sewalab_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider_beranda`
--
ALTER TABLE `slider_beranda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vision_missions`
--
ALTER TABLE `vision_missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_pelatihan`
--
ALTER TABLE `kategori_pelatihan`
  ADD CONSTRAINT `kategori_pelatihan_ibfk_1` FOREIGN KEY (`pelatihan_id`) REFERENCES `pelatihans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategori_pelatihan_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
