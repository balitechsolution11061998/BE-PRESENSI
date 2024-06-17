-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 01:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `kode_cabang` char(3) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `lokasi_cabang` varchar(255) NOT NULL,
  `radius_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kode_cabang`, `nama_cabang`, `lokasi_cabang`, `radius_cabang`) VALUES
('BDG', 'PUTRA', '-7.033358038053839, 113.65719779622523', 150),
('INS', 'KANTOR INSTIKA', '-7.321942518196893,107.86029333749414', 150),
('PST', 'PUTRI', '-7.321942518196893,107.86029333749414', 150);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `kode_dept` char(3) NOT NULL,
  `nama_dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`kode_dept`, `nama_dept`) VALUES
('F', 'Fakultas'),
('K', 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `jam_kerja`
--

CREATE TABLE `jam_kerja` (
  `kode_jam_kerja` char(4) NOT NULL,
  `nama_jam_kerja` varchar(15) NOT NULL,
  `awal_jam_masuk` time NOT NULL,
  `jam_masuk` time NOT NULL,
  `akhir_jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `lintashari` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jam_kerja`
--

INSERT INTO `jam_kerja` (`kode_jam_kerja`, `nama_jam_kerja`, `awal_jam_masuk`, `jam_masuk`, `akhir_jam_masuk`, `jam_pulang`, `lintashari`) VALUES
('JK01', 'Kerja Harian', '05:12:00', '06:00:00', '15:00:00', '15:10:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` char(5) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `kode_dept` char(3) NOT NULL,
  `kode_cabang` char(3) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_lengkap`, `jabatan`, `no_hp`, `foto`, `kode_dept`, `kode_cabang`, `password`, `remember_token`) VALUES
('11111', 'Bahrul Ulum', 'Staff', '081908246357', '11111.jpg', 'F', 'BDG', '$2y$10$9D6JDd7.e0yAvfAf7yQUQeM4K0r0U1MTMb7pUjfEYvgrW/k5MULUm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_jamkerja`
--

CREATE TABLE `konfigurasi_jamkerja` (
  `nik` char(5) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `kode_jam_kerja` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `konfigurasi_jamkerja`
--

INSERT INTO `konfigurasi_jamkerja` (`nik`, `hari`, `kode_jam_kerja`) VALUES
('11111', 'Senin', NULL),
('11111', 'Selasa', NULL),
('11111', 'Rabu', NULL),
('11111', 'Kamis', NULL),
('11111', 'Jumat', NULL),
('11111', 'Sabtu', 'JK01'),
('11111', 'Minggu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_jamkerja_by_date`
--

CREATE TABLE `konfigurasi_jamkerja_by_date` (
  `nik` char(5) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_jam_kerja` char(4) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_jk_dept`
--

CREATE TABLE `konfigurasi_jk_dept` (
  `kode_jk_dept` char(7) NOT NULL,
  `kode_cabang` char(3) DEFAULT NULL,
  `kode_dept` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_jk_dept_detail`
--

CREATE TABLE `konfigurasi_jk_dept_detail` (
  `kode_jk_dept` char(7) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `kode_jam_kerja` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `master_cuti`
--

CREATE TABLE `master_cuti` (
  `kode_cuti` char(3) NOT NULL,
  `nama_cuti` varchar(30) DEFAULT NULL,
  `jml_hari` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `master_cuti`
--

INSERT INTO `master_cuti` (`kode_cuti`, `nama_cuti`, `jml_hari`) VALUES
('C01', 'Tahunan', 12),
('C02', 'Cuti Melahirkan', 90);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_12_14_233749_create_permission_tables', 1),
(5, '2023_12_15_002819_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 13),
(1, 'App\\Models\\User', 17);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_izin`
--

CREATE TABLE `pengajuan_izin` (
  `kode_izin` char(9) NOT NULL,
  `nik` char(5) DEFAULT NULL,
  `tgl_izin_dari` date DEFAULT NULL,
  `tgl_izin_sampai` date DEFAULT NULL,
  `status` char(1) DEFAULT NULL COMMENT 'i : izin s : sakit',
  `kode_cuti` char(3) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `doc_sid` varchar(255) DEFAULT NULL,
  `status_approved` char(1) DEFAULT '0' COMMENT '0 : Pending 1: Disetuji 2: Ditolak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view-karyawan', 'web', '2023-12-15 08:36:28', '2023-12-15 08:36:28'),
(2, 'view-departemen', 'web', '2023-12-15 08:36:28', '2023-12-15 08:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `nik` char(5) NOT NULL,
  `tgl_presensi` date NOT NULL,
  `jam_in` time DEFAULT NULL,
  `jam_out` time DEFAULT NULL,
  `foto_in` varchar(255) DEFAULT NULL,
  `foto_out` varchar(255) DEFAULT NULL,
  `lokasi_in` text DEFAULT NULL,
  `lokasi_out` text DEFAULT NULL,
  `kode_jam_kerja` char(4) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `kode_izin` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_rekappresensi`
-- (See below for the actual view)
--
CREATE TABLE `q_rekappresensi` (
`nik` char(5)
,`nama_lengkap` varchar(100)
,`jabatan` varchar(20)
,`tgl_1` varchar(329)
,`tgl_2` varchar(329)
,`tgl_3` varchar(329)
,`tgl_4` varchar(329)
,`tgl_5` varchar(329)
,`tgl_6` varchar(329)
,`tgl_7` varchar(329)
,`tgl_8` varchar(329)
,`tgl_9` varchar(329)
,`tgl_10` varchar(329)
,`tgl_11` varchar(329)
,`tgl_12` varchar(329)
,`tgl_13` varchar(329)
,`tgl_14` varchar(329)
,`tgl_15` varchar(329)
,`tgl_16` varchar(329)
,`tgl_17` varchar(329)
,`tgl_18` varchar(329)
,`tgl_19` varchar(329)
,`tgl_20` varchar(329)
,`tgl_21` varchar(329)
,`tgl_22` varchar(329)
,`tgl_23` varchar(329)
,`tgl_24` varchar(329)
,`tgl_25` varchar(329)
,`tgl_26` varchar(329)
,`tgl_27` varchar(329)
,`tgl_28` varchar(329)
,`tgl_29` varchar(329)
,`tgl_30` varchar(329)
,`tgl_31` varchar(329)
);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2023-12-15 08:36:28', '2023-12-15 08:36:28'),
(2, 'admin departemen', 'web', '2023-12-18 08:22:14', '2023-12-18 08:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1);

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
  `kode_dept` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_cabang` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `kode_dept`, `kode_cabang`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'bahru lulum', 'bahrul@gmail.com', NULL, '$2y$10$pkgYrMOf677J3qzkAdIig.pOqYkwaS7ULPjGvjGZJ0gh3wroEoR5.', 'PA', 'BDG', NULL, '2024-03-01 10:53:54', '2024-03-01 10:53:54'),
(17, '12345', 'tamimi@gmail.com', NULL, '$2y$10$bqlMJshgRZ4pP6f8T2MLO.mhvjzC8eKnGsZ21447zROxtoYyllAQW', 'F', 'BDG', NULL, '2024-03-28 11:53:36', '2024-03-28 11:53:36');

-- --------------------------------------------------------

--
-- Structure for view `q_rekappresensi`
--
DROP TABLE IF EXISTS `q_rekappresensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_rekappresensi`  AS SELECT `karyawan`.`nik` AS `nik`, `karyawan`.`nama_lengkap` AS `nama_lengkap`, `karyawan`.`jabatan` AS `jabatan`, `tgl_1` AS `tgl_1`, `tgl_2` AS `tgl_2`, `tgl_3` AS `tgl_3`, `tgl_4` AS `tgl_4`, `tgl_5` AS `tgl_5`, `tgl_6` AS `tgl_6`, `tgl_7` AS `tgl_7`, `tgl_8` AS `tgl_8`, `tgl_9` AS `tgl_9`, `tgl_10` AS `tgl_10`, `tgl_11` AS `tgl_11`, `tgl_12` AS `tgl_12`, `tgl_13` AS `tgl_13`, `tgl_14` AS `tgl_14`, `tgl_15` AS `tgl_15`, `tgl_16` AS `tgl_16`, `tgl_17` AS `tgl_17`, `tgl_18` AS `tgl_18`, `tgl_19` AS `tgl_19`, `tgl_20` AS `tgl_20`, `tgl_21` AS `tgl_21`, `tgl_22` AS `tgl_22`, `tgl_23` AS `tgl_23`, `tgl_24` AS `tgl_24`, `tgl_25` AS `tgl_25`, `tgl_26` AS `tgl_26`, `tgl_27` AS `tgl_27`, `tgl_28` AS `tgl_28`, `tgl_29` AS `tgl_29`, `tgl_30` AS `tgl_30`, `tgl_31` AS `tgl_31` FROM (`karyawan` left join (select `nik` AS `nik`,max(if(`tgl_presensi` = '2023-11-01',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_1`,max(if(`tgl_presensi` = '2023-11-02',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_2`,max(if(`tgl_presensi` = '2023-11-03',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_3`,max(if(`tgl_presensi` = '2023-11-04',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_4`,max(if(`tgl_presensi` = '2023-11-05',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_5`,max(if(`tgl_presensi` = '2023-11-06',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_6`,max(if(`tgl_presensi` = '2023-11-07',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_7`,max(if(`tgl_presensi` = '2023-11-08',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_8`,max(if(`tgl_presensi` = '2023-11-09',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_9`,max(if(`tgl_presensi` = '2023-11-10',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_10`,max(if(`tgl_presensi` = '2023-11-11',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_11`,max(if(`tgl_presensi` = '2023-11-12',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_12`,max(if(`tgl_presensi` = '2023-11-13',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_13`,max(if(`tgl_presensi` = '2023-11-14',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_14`,max(if(`tgl_presensi` = '2023-11-15',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_15`,max(if(`tgl_presensi` = '2023-11-16',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_16`,max(if(`tgl_presensi` = '2023-11-17',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_17`,max(if(`tgl_presensi` = '2023-11-18',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_18`,max(if(`tgl_presensi` = '2023-11-19',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_19`,max(if(`tgl_presensi` = '2023-11-20',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_20`,max(if(`tgl_presensi` = '2023-11-21',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_21`,max(if(`tgl_presensi` = '2023-11-22',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_22`,max(if(`tgl_presensi` = '2023-11-23',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_23`,max(if(`tgl_presensi` = '2023-11-24',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_24`,max(if(`tgl_presensi` = '2023-11-25',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_25`,max(if(`tgl_presensi` = '2023-11-26',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_26`,max(if(`tgl_presensi` = '2023-11-27',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_27`,max(if(`tgl_presensi` = '2023-11-28',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_28`,max(if(`tgl_presensi` = '2023-11-29',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_29`,max(if(`tgl_presensi` = '2023-11-30',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_30`,max(if(`tgl_presensi` = '2023-11-31',concat(convert(ifnull(`jam_in`,'NA') using latin1),'|',convert(ifnull(`jam_out`,'NA') using latin1),'|',ifnull(`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',convert(ifnull(`jam_kerja`.`jam_masuk`,'NA') using latin1),'|',convert(ifnull(`jam_kerja`.`jam_pulang`,'NA') using latin1),'|',ifnull(`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_31` from ((`presensi` left join `jam_kerja` on(`kode_jam_kerja` = `jam_kerja`.`kode_jam_kerja`)) left join `pengajuan_izin` on(`kode_izin` = `pengajuan_izin`.`kode_izin`)) group by `nik`) `presensi` on(`karyawan`.`nik` = `nik`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kode_cabang`) USING BTREE;

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`kode_dept`) USING BTREE;

--
-- Indexes for table `jam_kerja`
--
ALTER TABLE `jam_kerja`
  ADD PRIMARY KEY (`kode_jam_kerja`) USING BTREE;

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`) USING BTREE,
  ADD KEY `fk_karyawan_cabang` (`kode_cabang`) USING BTREE,
  ADD KEY `fk_karyawan_dept` (`kode_dept`) USING BTREE;

--
-- Indexes for table `konfigurasi_jamkerja`
--
ALTER TABLE `konfigurasi_jamkerja`
  ADD KEY `fk_kj_karyawan` (`nik`) USING BTREE,
  ADD KEY `fk_kj_jk` (`kode_jam_kerja`) USING BTREE;

--
-- Indexes for table `konfigurasi_jamkerja_by_date`
--
ALTER TABLE `konfigurasi_jamkerja_by_date`
  ADD KEY `fk_kjbydate_karyawan` (`nik`) USING BTREE;

--
-- Indexes for table `konfigurasi_jk_dept`
--
ALTER TABLE `konfigurasi_jk_dept`
  ADD PRIMARY KEY (`kode_jk_dept`) USING BTREE,
  ADD KEY `fk_kjd_cabang` (`kode_cabang`) USING BTREE,
  ADD KEY `fk_kjd_dept` (`kode_dept`) USING BTREE;

--
-- Indexes for table `konfigurasi_jk_dept_detail`
--
ALTER TABLE `konfigurasi_jk_dept_detail`
  ADD KEY `fk_jkdept` (`kode_jk_dept`) USING BTREE;

--
-- Indexes for table `master_cuti`
--
ALTER TABLE `master_cuti`
  ADD PRIMARY KEY (`kode_cuti`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`) USING BTREE,
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE;

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`) USING BTREE,
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE;

--
-- Indexes for table `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  ADD PRIMARY KEY (`kode_izin`) USING BTREE,
  ADD KEY `fk_pengajuan_karyawan` (`nik`) USING BTREE,
  ADD KEY `fk_pengajuan_cuti` (`kode_cuti`) USING BTREE;

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`) USING BTREE;

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_presensi_karyawan` (`nik`) USING BTREE,
  ADD KEY `fk_prensesi_pengajuan_izin` (`kode_izin`) USING BTREE,
  ADD KEY `fk_presensi_jk` (`kode_jam_kerja`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`) USING BTREE;

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`) USING BTREE,
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_karyawan_cabang` FOREIGN KEY (`kode_cabang`) REFERENCES `cabang` (`kode_cabang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_karyawan_dept` FOREIGN KEY (`kode_dept`) REFERENCES `departemen` (`kode_dept`) ON UPDATE CASCADE;

--
-- Constraints for table `konfigurasi_jamkerja`
--
ALTER TABLE `konfigurasi_jamkerja`
  ADD CONSTRAINT `fk_kj_jk` FOREIGN KEY (`kode_jam_kerja`) REFERENCES `jam_kerja` (`kode_jam_kerja`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kj_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON UPDATE CASCADE;

--
-- Constraints for table `konfigurasi_jamkerja_by_date`
--
ALTER TABLE `konfigurasi_jamkerja_by_date`
  ADD CONSTRAINT `fk_kjbydate_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON UPDATE CASCADE;

--
-- Constraints for table `konfigurasi_jk_dept`
--
ALTER TABLE `konfigurasi_jk_dept`
  ADD CONSTRAINT `fk_kjd_cabang` FOREIGN KEY (`kode_cabang`) REFERENCES `cabang` (`kode_cabang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kjd_dept` FOREIGN KEY (`kode_dept`) REFERENCES `departemen` (`kode_dept`) ON UPDATE CASCADE;

--
-- Constraints for table `konfigurasi_jk_dept_detail`
--
ALTER TABLE `konfigurasi_jk_dept_detail`
  ADD CONSTRAINT `fk_jkdept` FOREIGN KEY (`kode_jk_dept`) REFERENCES `konfigurasi_jk_dept` (`kode_jk_dept`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`model_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  ADD CONSTRAINT `fk_pengajuan_cuti` FOREIGN KEY (`kode_cuti`) REFERENCES `master_cuti` (`kode_cuti`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengajuan_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `fk_prensesi_pengajuan_izin` FOREIGN KEY (`kode_izin`) REFERENCES `pengajuan_izin` (`kode_izin`),
  ADD CONSTRAINT `fk_presensi_jk` FOREIGN KEY (`kode_jam_kerja`) REFERENCES `jam_kerja` (`kode_jam_kerja`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_presensi_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
