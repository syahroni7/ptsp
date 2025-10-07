-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2025 at 06:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_type`
--

CREATE TABLE `access_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_type`
--

INSERT INTO `access_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_arsip`
--

CREATE TABLE `daftar_arsip` (
  `id_arsip` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_pelayanan` int(10) UNSIGNED DEFAULT NULL,
  `arsip_masuk_url` text DEFAULT NULL,
  `created_by_masuk` varchar(255) DEFAULT NULL,
  `arsip_keluar_url` text DEFAULT NULL,
  `created_by_keluar` varchar(255) DEFAULT NULL,
  `dokumen_masuk_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dokumen_masuk_url`)),
  `dokumen_keluar_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dokumen_keluar_url`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_disposisi`
--

CREATE TABLE `daftar_disposisi` (
  `id_disposisi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_pelayanan` int(10) UNSIGNED DEFAULT NULL,
  `id_aksi_disposisi` int(10) UNSIGNED DEFAULT NULL,
  `id_disposisi_parent` int(10) UNSIGNED DEFAULT NULL,
  `urutan_disposisi` int(11) DEFAULT NULL,
  `id_sender` int(10) UNSIGNED DEFAULT NULL,
  `username_sender` varchar(255) DEFAULT NULL,
  `id_recipient` int(10) UNSIGNED DEFAULT NULL,
  `username_recipient` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_jenis_layanan`
--

CREATE TABLE `daftar_jenis_layanan` (
  `id_jenis_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `updated_by` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_jenis_layanan`
--

INSERT INTO `daftar_jenis_layanan` (`id_jenis_layanan`, `created_at`, `updated_at`, `deleted_at`, `name`, `created_by`, `updated_by`) VALUES
(1, '2025-07-04 04:34:39', '2025-07-04 04:34:39', NULL, 'Layanan Data/Informasi', '', ''),
(2, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Kenaikan Pangkat', '', ''),
(3, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Konsultasi', '', ''),
(4, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Mutasi', '', ''),
(5, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Pencatatan', '', ''),
(6, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Penerbitan SK GTT', '', ''),
(7, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Pengaduan', '', ''),
(8, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Pengesahan', '', ''),
(9, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Pensiun', '', ''),
(10, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Perizinan', '', ''),
(11, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Persetujuan', '', ''),
(12, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Rekomendasi', '', ''),
(13, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Bantuan Operasional Sekolah', '', ''),
(14, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan BOP RA', '', ''),
(15, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Surat Masuk', '', ''),
(16, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Surat Keterangan', '', ''),
(17, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Program Indonesia Pintar', '', ''),
(18, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan PTK', '', ''),
(19, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Bantuan', '', ''),
(20, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Pendaftaran', '', ''),
(21, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Perbaikan Data CJH', '', ''),
(22, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Persyaratan Kafilah', '', ''),
(23, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Layanan Penunjukan', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_layanan`
--

CREATE TABLE `daftar_layanan` (
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `id_unit_pengolah` int(10) UNSIGNED NOT NULL,
  `id_jenis_layanan` int(10) UNSIGNED NOT NULL,
  `id_output_layanan` int(10) UNSIGNED NOT NULL,
  `lama_layanan` int(11) NOT NULL,
  `biaya_layanan` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `updated_by` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_layanan`
--

INSERT INTO `daftar_layanan` (`id_layanan`, `created_at`, `updated_at`, `deleted_at`, `name`, `id_unit_pengolah`, `id_jenis_layanan`, `id_output_layanan`, `lama_layanan`, `biaya_layanan`, `created_by`, `updated_by`) VALUES
(1, NULL, NULL, NULL, 'Pelayanan Data dan Informasi Umum', 1, 1, 1, 1, 0, '', ''),
(2, NULL, NULL, NULL, 'Kenaikan Pangkat Fungsional Tertentu / Guru', 1, 2, 2, 1, 0, '', ''),
(3, NULL, NULL, NULL, 'Kenaikan Pangkat Reguler / Pelaksana', 1, 2, 2, 1, 0, '', ''),
(4, NULL, NULL, NULL, 'Konsultasi BMN', 1, 3, 1, 1, 0, '', ''),
(5, NULL, NULL, NULL, 'Mutasi Jabatan Pelaksana', 1, 4, 3, 6, 0, '', ''),
(6, NULL, NULL, NULL, 'Pelayanan Surat Masuk', 1, 5, 4, 2, 0, '', ''),
(7, NULL, NULL, NULL, 'Surat Permohonan SK GTT / SK PTT', 1, 6, 3, 1, 0, '', ''),
(8, NULL, NULL, NULL, 'Pelayanan Pengaduan Masyarakat', 1, 7, 1, 30, 0, '', ''),
(9, NULL, NULL, NULL, 'Legalisir Dokumen Kepegawaian', 1, 8, 5, 1, 0, '', ''),
(10, NULL, NULL, NULL, 'Permohonan Pensiun', 1, 9, 6, 6, 0, '', ''),
(11, NULL, NULL, NULL, 'Izin Audiensi dengan Kepala Kantor', 1, 10, 7, 1, 0, '', ''),
(12, NULL, NULL, NULL, 'Izin Magang/PKL', 1, 10, 8, 1, 0, '', ''),
(13, NULL, NULL, NULL, 'Izin Pemakaian Tempat', 1, 10, 8, 1, 0, '', ''),
(14, NULL, NULL, NULL, 'Surat Tugas Eksternal', 1, 11, 9, 1, 0, '', ''),
(15, NULL, NULL, NULL, 'Surat Rekomendasi Pindah Tugas', 1, 12, 10, 1, 0, '', ''),
(16, NULL, NULL, NULL, 'Rekomendasi Surat Izin Belajar/Tugas Belajar', 1, 12, 10, 1, 0, '', ''),
(17, NULL, NULL, NULL, 'Usulan Memperoleh Penghargaan Satya Lencana', 1, 12, 3, 1, 0, '', ''),
(18, NULL, NULL, NULL, 'Usulan Kartu Kepegawaian (Karpeg)', 1, 12, 3, 1, 0, '', ''),
(19, NULL, NULL, NULL, 'Usulan Kartu Suami / Istri (Karis / Karsu)', 1, 12, 3, 1, 0, '', ''),
(20, NULL, NULL, NULL, 'Usulan Pencantuman Gelar', 1, 12, 3, 1, 0, '', ''),
(21, NULL, NULL, NULL, 'Usulan Penyesuaian Masa Kerja', 1, 12, 3, 1, 0, '', ''),
(22, NULL, NULL, NULL, 'Usulan Mengikuti Ujian Dinas dan UPKP', 1, 12, 3, 1, 0, '', ''),
(23, NULL, NULL, NULL, 'Permohonan Cuti', 1, 10, 3, 1, 0, '', ''),
(24, NULL, NULL, NULL, 'Konsultasi Layanan Kepegawaian', 1, 3, 3, 1, 0, '', ''),
(25, NULL, NULL, NULL, 'Kenaikan Jenjang Jabatan Fungsional Madya', 1, 12, 3, 1, 0, '', ''),
(26, NULL, NULL, NULL, 'Usulan Mutasi Jabatan Fungsional', 1, 12, 3, 1, 0, '', ''),
(27, NULL, NULL, NULL, 'Bantuan Operasional Sekolah', 2, 13, 11, 1, 0, '', ''),
(28, NULL, NULL, NULL, 'Bantuan Opersional Pendidikan RA', 2, 14, 11, 6, 0, '', ''),
(29, NULL, NULL, NULL, 'Konsultasi PT', 2, 3, 12, 1, 0, '', ''),
(30, NULL, NULL, NULL, 'Laporan Bulanan Madrasah', 2, 1, 13, 1, 0, '', ''),
(31, NULL, NULL, NULL, 'Layanan Surat Masuk', 2, 15, 4, 2, 0, '', ''),
(32, NULL, NULL, NULL, 'Pengesahan Ijazah/STTB/SKP Ijazah', 2, 16, 14, 1, 0, '', ''),
(33, NULL, NULL, NULL, 'Laporan Program Indonesia Pintar', 2, 17, 11, 1, 0, '', ''),
(34, NULL, NULL, NULL, 'SK Pembagian Tugas Madrasah', 2, 8, 15, 5, 0, '', ''),
(35, NULL, NULL, NULL, 'Surat Izin Pendirian dan Operasional Madrasah', 2, 10, 16, 6, 0, '', ''),
(36, NULL, NULL, NULL, 'Surat Keterangan Pengganti Ijazah Karena Hilang', 2, 16, 17, 1, 0, '', ''),
(37, NULL, NULL, NULL, 'Surat Keterangan Pengganti Ijazah Karena Kerusakan Ijazah', 2, 16, 17, 1, 0, '', ''),
(38, NULL, NULL, NULL, 'Surat Keterangan Pengganti Ijazah Karena Kesalahan Penulisan Ijazah', 2, 16, 17, 1, 0, '', ''),
(39, NULL, NULL, NULL, 'Surat Pengajuan Penonaktifan PTK', 2, 18, 17, 1, 0, '', ''),
(40, NULL, NULL, NULL, 'Surat Rekomendasi Bantuan Sarpras', 2, 19, 10, 1, 0, '', ''),
(41, NULL, NULL, NULL, 'Surat Izin Penelitian Madrasah', 2, 10, 10, 1, 0, '', ''),
(42, NULL, NULL, NULL, 'Surat Izin Darmawisata / Studi Banding', 2, 10, 10, 1, 0, '', ''),
(43, NULL, NULL, NULL, 'Surat Rekomendasi Melanjutkan Sekolah', 2, 3, 10, 1, 0, '', ''),
(44, NULL, NULL, NULL, 'Usulan TPG dan Tunjangan Kinerja', 2, 3, 10, 1, 0, '', ''),
(45, NULL, NULL, NULL, 'Konsultasi Data EMIS dan SIMPATIKA', 2, 3, 10, 1, 0, '', ''),
(46, NULL, NULL, NULL, 'Surat Rekomendasi Mutasi Siswa', 2, 16, 10, 1, 0, '', ''),
(47, NULL, NULL, NULL, 'Konsultasi Data EMIS dan SIAGA', 3, 3, 18, 1, 0, '', ''),
(48, NULL, NULL, NULL, 'Konsultasi Tunjangan Sertifikasi Guru', 3, 3, 1, 1, 0, '', ''),
(49, NULL, NULL, NULL, 'Pencairan Tunjangan Sertifikasi', 3, 12, 11, 1, 0, '', ''),
(50, NULL, NULL, NULL, 'Penyerahan Surat Pengajuan Riwayat mengajar di akun SIAGA', 3, 5, 19, 1, 0, '', ''),
(51, NULL, NULL, NULL, 'Data Emis Pondok Pesantren, MDTA dan TPQ', 4, 1, 1, 2, 0, '', ''),
(52, NULL, NULL, NULL, 'Laporan Bulanan Pondok Pesantren', 4, 1, 13, 1, 0, '', ''),
(53, NULL, NULL, NULL, 'Pelayanan Surat Masuk', 4, 5, 4, 1, 0, '', ''),
(54, NULL, NULL, NULL, 'Penanda tanganan Ijazah MDTA/TPQ', 4, 8, 20, 1, 0, '', ''),
(55, NULL, NULL, NULL, 'Surat Rekomendasi Pendirian Pondok Pesantren', 4, 12, 10, 3, 0, '', ''),
(56, NULL, NULL, NULL, 'Surat Rekomendasi dan Verifikasi Pendirian LPT (TPQ / Rumah Tahfiz)', 4, 12, 10, 1, 0, '', ''),
(57, NULL, NULL, NULL, 'Surat Rekomendasi Izin Penelitian PD Pontren', 4, 12, 10, 1, 0, '', ''),
(58, NULL, NULL, NULL, 'Usulan Izin Operasional PKPDS Wustho', 4, 10, 8, 1, 0, '', ''),
(59, NULL, NULL, NULL, 'Izin Operasional Penyelenggaraan MDTA', 4, 1, 13, 1, 0, '', ''),
(60, NULL, NULL, NULL, 'Izin Operasional Penyelenggaraan LPQ', 4, 10, 8, 1, 0, '', ''),
(61, NULL, NULL, NULL, 'Izin Operasional Penyelenggaraan Pondok Pesanren', 4, 10, 8, 1, 0, '', ''),
(62, NULL, NULL, NULL, 'Rekomendasi Layanan LPQ, MDT, dan Pondok Pesantren', 4, 12, 10, 1, 0, '', ''),
(63, NULL, NULL, NULL, 'Konsultasi Haji', 5, 3, 1, 1, 0, '', ''),
(64, NULL, NULL, NULL, 'Konsultasi Umrah', 5, 3, 1, 1, 0, '', ''),
(65, NULL, NULL, NULL, 'Pendaftaran Haji Reguler', 5, 20, 11, 1, 0, '', ''),
(66, NULL, NULL, NULL, 'Persyaratan Calon petugas Haji', 5, 20, 11, 1, 0, '', ''),
(67, NULL, NULL, NULL, 'Rekomendasi Izin Pendirian KBIH', 5, 10, 10, 3, 0, '', ''),
(68, NULL, NULL, NULL, 'Rekomendasi Izin Pendirian PPIU', 5, 10, 16, 3, 0, '', ''),
(69, NULL, NULL, NULL, 'Rekomendasi Perpanjangan Izin Kantor PPIU', 5, 10, 16, 4, 0, '', ''),
(70, NULL, NULL, NULL, 'Rekomendasi Perpanjangan Izin KBIH', 5, 10, 10, 3, 0, '', ''),
(71, NULL, NULL, NULL, 'Rekomendasi Perpanjangan Izin PPIU', 5, 10, 10, 3, 0, '', ''),
(72, NULL, NULL, NULL, 'Mutasi berangkat Haji', 5, 11, 10, 1, 0, '', ''),
(73, NULL, NULL, NULL, 'Pengajuan Manula Berangkat Haji', 5, 11, 21, 1, 0, '', ''),
(74, NULL, NULL, NULL, 'Pengajuan Manula dan Pendamping Berangkat Haji', 5, 11, 21, 1, 0, '', ''),
(75, NULL, NULL, NULL, 'Pengajuan penggabungan berangkat Haji orang tua ke anak sebaliknya', 5, 11, 21, 1, 0, '', ''),
(76, NULL, NULL, NULL, 'Pengajuan penggabungan berangkat Haji suami ke istri sebaliknya', 5, 11, 21, 1, 0, '', ''),
(77, NULL, NULL, NULL, 'Pengajuan Pramanifes dari KBIH dan IPHI', 5, 11, 21, 1, 0, '', ''),
(78, NULL, NULL, NULL, 'Penundaan Berangkat Haji', 5, 11, 10, 1, 0, '', ''),
(79, NULL, NULL, NULL, 'Pembatalan Haji (Berangkat)', 5, 12, 17, 60, 0, '', ''),
(80, NULL, NULL, NULL, 'Pembatalan Haji (Meninggal Dunia)', 5, 12, 17, 60, 0, '', ''),
(81, NULL, NULL, NULL, 'Rekomendasi Pembuatan Paspor Haji', 5, 12, 10, 1, 0, '', ''),
(82, NULL, NULL, NULL, 'Rekomendasi Pembuatan Paspor Umrah', 5, 12, 10, 1, 0, '', ''),
(83, NULL, NULL, NULL, 'Layanan Surat Masuk', 5, 15, 4, 2, 0, '', ''),
(84, NULL, NULL, NULL, 'Berita Acara Pemeriksaan Data Calon Jamaah Haji', 5, 21, 13, 1, 0, '', ''),
(85, NULL, NULL, NULL, 'Pelimpahan Nomor Porsi Haji Jamaah Wafat', 5, 12, 10, 1, 0, '', ''),
(86, NULL, NULL, NULL, 'Pelimpahan Nomor Porsi Haji Jamaah Sakit Permanen', 5, 12, 10, 1, 0, '', ''),
(87, NULL, NULL, NULL, 'Data Bimbingan Masyarakat Islam', 6, 1, 22, 1, 0, '', ''),
(88, NULL, NULL, NULL, 'Konsultasi Perkawinan', 6, 3, 23, 1, 0, '', ''),
(89, NULL, NULL, NULL, 'Laporan Bulanan KUA', 6, 1, 13, 1, 0, '', ''),
(90, NULL, NULL, NULL, 'Laporan Bulanan PAI Non PNS', 6, 1, 13, 1, 0, '', ''),
(91, NULL, NULL, NULL, 'Laporan Karya Tulis Ilmiah Penghulu', 6, 1, 24, 1, 0, '', ''),
(92, NULL, NULL, NULL, 'Laporan Tahunan KUA', 6, 1, 13, 1, 0, '', ''),
(93, NULL, NULL, NULL, 'Laporan Triwulan KUA', 6, 1, 13, 1, 0, '', ''),
(94, NULL, NULL, NULL, 'Layanan Persyaratan Khafilah MTQ', 6, 22, 25, 1, 0, '', ''),
(95, NULL, NULL, NULL, 'Layanan Surat Masuk', 6, 15, 4, 1, 0, '', ''),
(96, NULL, NULL, NULL, 'Permohonan Rekomendasi BP4', 6, 3, 26, 5, 0, '', ''),
(97, NULL, NULL, NULL, 'Rekomendasi Kegiatan Keagamaan', 6, 12, 10, 1, 0, '', ''),
(98, NULL, NULL, NULL, 'Rekomendasi Ormas Islam/Lembaga Keagamaan', 6, 12, 10, 30, 0, '', ''),
(99, NULL, NULL, NULL, 'Rekomendasi Perubahan Status Mushalla Menjadi Masjid', 6, 12, 11, 30, 0, '', ''),
(100, NULL, NULL, NULL, 'Sertifikat Muallaf', 6, 5, 27, 1, 0, '', ''),
(101, NULL, NULL, NULL, 'Pengukuran Arah Kiblat', 6, 16, 27, 1, 0, '', ''),
(102, NULL, NULL, NULL, 'Rohaniwan dan/atau Pembaca Doa', 6, 23, 28, 1, 0, '', ''),
(103, NULL, NULL, NULL, 'Laporan BOP KUA', 6, 1, 22, 1, 0, '', ''),
(104, NULL, NULL, NULL, 'Rekomendasi Pendirian Musholla / Masjid', 6, 12, 10, 1, 0, '', ''),
(105, NULL, NULL, NULL, 'Layanan Data Musholla dan Masjid', 6, 1, 22, 1, 0, '', ''),
(106, NULL, NULL, NULL, 'Rekomendasi Bantuan Masjid / Mushalla', 6, 12, 10, 1, 0, '', ''),
(107, NULL, NULL, NULL, 'Laporan Nikah di luar Kantor KUA', 6, 1, 22, 1, 0, '', ''),
(108, NULL, NULL, NULL, 'Rekomendasi Sertifikat Halal', 6, 12, 10, 1, 0, '', ''),
(109, NULL, NULL, NULL, 'Layanan Informasi dan Konsultasi Wakaf', 7, 3, 23, 1, 0, '', ''),
(110, NULL, NULL, NULL, 'Pelayanan Alih Tulisan Arab Melayu ke Bahasa Indonesia', 7, 1, 22, 1, 0, '', ''),
(111, NULL, NULL, NULL, 'Layanan Informasi tentang Percepatan Sertifikat Tanah Wakaf', 7, 1, 22, 1, 0, '', ''),
(112, NULL, NULL, NULL, 'Layanan Informasi dan Konsultasi Zakat', 7, 3, 23, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_output_layanan`
--

CREATE TABLE `daftar_output_layanan` (
  `id_output_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `updated_by` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_output_layanan`
--

INSERT INTO `daftar_output_layanan` (`id_output_layanan`, `created_at`, `updated_at`, `deleted_at`, `name`, `created_by`, `updated_by`) VALUES
(1, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Informasi', '', ''),
(2, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Pengantar usul Kenaikan Pangkat', '', ''),
(3, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Surat Pengantar', '', ''),
(4, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Surat', '', ''),
(5, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Legalisir', '', ''),
(6, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Pengantar Pensiun', '', ''),
(7, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Jadwal Audiensi', '', ''),
(8, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Surat Izin', '', ''),
(9, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Surat Tugas', '', ''),
(10, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Surat Rekomendasi', '', ''),
(11, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Berkas Lengkap', '', ''),
(12, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Pemahaman', '', ''),
(13, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Laporan', '', ''),
(14, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Pengesahan', '', ''),
(15, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Surat Pengesahan', '', ''),
(16, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Surat Keputusan', '', ''),
(17, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Surat Keterangan', '', ''),
(18, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Konsultasi', '', ''),
(19, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'S 28 a', '', ''),
(20, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Tanda Tangan', '', ''),
(21, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Pengajuan', '', ''),
(22, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Data', '', ''),
(23, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Jadwal Konsultasi', '', ''),
(24, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Karya Tulis', '', ''),
(25, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Persyaratan', '', ''),
(26, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Rekomendasi', '', ''),
(27, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Sertifikat', '', ''),
(28, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, 'Petugas Rohaniwan', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pelayanan`
--

CREATE TABLE `daftar_pelayanan` (
  `id_pelayanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tanggal_terima` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `no_registrasi` varchar(16) DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `pengirim_nama` varchar(40) DEFAULT NULL,
  `pemohon_no_surat` varchar(50) DEFAULT NULL,
  `pemohon_tanggal_surat` date DEFAULT NULL,
  `pemohon_nama` varchar(100) DEFAULT NULL,
  `pemohon_alamat` text DEFAULT NULL,
  `pemohon_no_hp` varchar(15) DEFAULT NULL,
  `kelengkapan_syarat` enum('Sudah Lengkap','Belum Lengkap') NOT NULL DEFAULT 'Belum Lengkap',
  `status_pelayanan` enum('Baru','Proses','Selesai','Ambil') NOT NULL DEFAULT 'Baru',
  `catatan` text DEFAULT NULL,
  `penerima_nama` varchar(100) DEFAULT NULL,
  `id_layanan` int(10) UNSIGNED DEFAULT NULL,
  `id_unit_pengolah` int(10) UNSIGNED DEFAULT NULL,
  `id_jenis_layanan` int(10) UNSIGNED DEFAULT NULL,
  `id_output_layanan` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `updated_by` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_syarat_layanan`
--

CREATE TABLE `daftar_syarat_layanan` (
  `id_syarat_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_master_syarat_layanan` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `updated_by` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_unit_pengolah`
--

CREATE TABLE `daftar_unit_pengolah` (
  `id_unit_pengolah` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `updated_by` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_unit_pengolah`
--

INSERT INTO `daftar_unit_pengolah` (`id_unit_pengolah`, `created_at`, `updated_at`, `deleted_at`, `name`, `created_by`, `updated_by`) VALUES
(1, '2025-07-04 04:34:35', '2025-07-04 04:34:35', NULL, 'Subbagian Tata Usaha', '', ''),
(2, '2025-07-04 04:34:35', '2025-07-04 04:34:35', NULL, 'Seksi Pendidikan Madrasah', '', ''),
(3, '2025-07-04 04:34:35', '2025-07-04 04:34:35', NULL, 'Seksi Pendidikan Agama Islam', '', ''),
(4, '2025-07-04 04:34:35', '2025-07-04 04:34:35', NULL, 'Seksi Pendidikan Diniyah dan Pondok Pesantren', '', ''),
(5, '2025-07-04 04:34:35', '2025-07-04 04:34:35', NULL, 'Seksi Penyelenggaraan Haji dan Umrah', '', ''),
(6, '2025-07-04 04:34:35', '2025-07-04 04:34:35', NULL, 'Seksi Bimbingan Masyarakat Islam', '', ''),
(7, '2025-07-04 04:34:35', '2025-07-04 04:34:35', NULL, 'Seksi Penyelenggara Zakat dan Wakaf', '', '');

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
-- Table structure for table `fileponds`
--

CREATE TABLE `fileponds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `extension` varchar(100) NOT NULL,
  `mimetypes` varchar(100) NOT NULL,
  `disk` varchar(100) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `master_aksi_disposisi`
--

CREATE TABLE `master_aksi_disposisi` (
  `id_aksi_disposisi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_aksi_disposisi`
--

INSERT INTO `master_aksi_disposisi` (`id_aksi_disposisi`, `created_at`, `updated_at`, `deleted_at`, `name`) VALUES
(1, NULL, NULL, NULL, 'permohonan_baru'),
(2, NULL, NULL, NULL, 'mohon_arahan'),
(3, NULL, NULL, NULL, 'mohon_diedarkan'),
(4, NULL, NULL, NULL, 'mohon_diselesaikan'),
(5, NULL, NULL, NULL, 'mohon_diperiksa_atau_ditelaah'),
(6, NULL, NULL, NULL, 'mohon_diproses'),
(7, NULL, NULL, NULL, 'mohon_ditindaklanjuti'),
(8, NULL, NULL, NULL, 'untuk_ditindaklanjuti'),
(9, NULL, NULL, NULL, 'untuk_diproses'),
(10, NULL, NULL, NULL, 'untuk_diwakili'),
(11, NULL, NULL, NULL, 'untuk_kita_hadiri_bersama'),
(12, NULL, NULL, NULL, 'untuk_dihadiri'),
(13, NULL, NULL, NULL, 'untuk_diarsipkan'),
(14, NULL, NULL, NULL, 'untuk_kita_bicarakan'),
(15, NULL, NULL, NULL, 'untuk_diketahui');

-- --------------------------------------------------------

--
-- Table structure for table `master_syarat_layanan`
--

CREATE TABLE `master_syarat_layanan` (
  `id_master_syarat_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` text NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `updated_by` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_syarat_layanan`
--

INSERT INTO `master_syarat_layanan` (`id_master_syarat_layanan`, `created_at`, `updated_at`, `deleted_at`, `name`, `created_by`, `updated_by`) VALUES
(1, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '1', '', ''),
(2, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '2', '', ''),
(3, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '3', '', ''),
(4, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '4', '', ''),
(5, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '5', '', ''),
(6, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '6', '', ''),
(7, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '7', '', ''),
(8, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '8', '', ''),
(9, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '9', '', ''),
(10, '2025-07-04 04:34:40', '2025-07-04 04:34:40', NULL, '10', '', '');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_20_054431_create_permission_tables', 1),
(6, '2022_09_20_103400_create_daftar_unit_pengolah_table', 1),
(7, '2022_09_20_105738_create_daftar_jenis_layanan_table', 1),
(8, '2022_09_20_121443_create_daftar_output_layanan_table', 1),
(9, '2022_09_20_124707_create_daftar_layanan_table', 1),
(10, '2022_09_21_003005_create_master_syarat_layanan_table', 1),
(11, '2022_09_21_044747_create_daftar_syarat_layanan_table', 1),
(12, '2022_09_22_051134_create_daftar_pelayanan_table', 1),
(13, '2022_09_26_082518_create_master_aksi_disposisi_table', 1),
(14, '2022_09_26_082543_create_daftar_disposisi_table', 1),
(15, '2022_09_27_031930_create_notifications_table', 1),
(16, '2022_10_03_061557_create_daftar_arsip_table', 1),
(17, '2022_10_12_165620_create_temporary_files_table', 1),
(18, '2022_11_02_000000_create_fileponds_table', 1),
(19, '2022_11_02_085056_edit_users_table', 1),
(20, '2022_11_02_143734_edit_daftar_arsip_table', 1),
(21, '2022_11_04_094635_edit_users_2_table', 1),
(22, '2022_11_09_111558_add_login_fields_to_users_table', 1),
(23, '2022_11_21_105441_create_total_layanan_perminggu_table', 1),
(24, '2022_11_21_115310_create_total_layanan_perhari_table', 1),
(25, '2022_12_09_103708_create_jobs_table', 1),
(26, '2023_01_02_171446_edit_users_table_2', 1),
(27, '2025_07_02_093923_create_access_type_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 3),
(6, 'App\\Models\\User', 4),
(6, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 6),
(6, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 11),
(7, 'App\\Models\\User', 12),
(7, 'App\\Models\\User', 13),
(7, 'App\\Models\\User', 14),
(7, 'App\\Models\\User', 15),
(7, 'App\\Models\\User', 16),
(7, 'App\\Models\\User', 17),
(7, 'App\\Models\\User', 18),
(7, 'App\\Models\\User', 19),
(7, 'App\\Models\\User', 21),
(7, 'App\\Models\\User', 22),
(7, 'App\\Models\\User', 23),
(7, 'App\\Models\\User', 25),
(7, 'App\\Models\\User', 26),
(7, 'App\\Models\\User', 27),
(7, 'App\\Models\\User', 28),
(7, 'App\\Models\\User', 29),
(7, 'App\\Models\\User', 30),
(7, 'App\\Models\\User', 31),
(7, 'App\\Models\\User', 32),
(7, 'App\\Models\\User', 33);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'menu-dashboard', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(2, 'menu-pelayanan', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(3, 'menu-arsip', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(4, 'menu-disposisi', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(5, 'menu-main', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(6, 'menu-layanan', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(7, 'page-dashboard', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(8, 'page-pelayanan-input', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(9, 'page-pelayanan-list', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(10, 'page-arsip-pelayanan', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(11, 'page-disposisi-master', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(12, 'page-disposisi-list', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(13, 'page-main-permission', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(14, 'page-main-user-data', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(15, 'page-main-user-role', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(16, 'page-main-unit_pengolah', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(17, 'page-layanan-jenis', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(18, 'page-layanan-output', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(19, 'page-layanan-daftar', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(20, 'page-layanan-syarat-master', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36'),
(21, 'page-layanan-syarat-list', 'web', '2025-07-04 04:34:36', '2025-07-04 04:34:36');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_administrator', 'web', '2025-07-04 04:34:35', '2025-07-04 04:34:35'),
(2, 'administrator', 'web', '2025-07-04 04:34:35', '2025-07-04 04:34:35'),
(3, 'operator', 'web', '2025-07-04 04:34:35', '2025-07-04 04:34:35'),
(4, 'director', 'web', '2025-07-04 04:34:35', '2025-07-04 04:34:35'),
(5, 'manager', 'web', '2025-07-04 04:34:35', '2025-07-04 04:34:35'),
(6, 'supervisor', 'web', '2025-07-04 04:34:35', '2025-07-04 04:34:35'),
(7, 'staff', 'web', '2025-07-04 04:34:35', '2025-07-04 04:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(2, 7),
(3, 1),
(3, 3),
(3, 7),
(4, 1),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(5, 1),
(6, 1),
(6, 2),
(6, 7),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(8, 1),
(8, 2),
(8, 3),
(8, 5),
(9, 1),
(9, 2),
(9, 3),
(9, 5),
(9, 7),
(10, 1),
(10, 2),
(10, 3),
(10, 7),
(11, 1),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(12, 1),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(19, 7),
(20, 1),
(20, 2),
(20, 7),
(21, 1),
(21, 2),
(21, 7);

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

CREATE TABLE `temporary_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_layanan_perhari`
--

CREATE TABLE `total_layanan_perhari` (
  `id_total_layanan_perhari` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_pelayanan` int(11) NOT NULL DEFAULT 0,
  `cron_status` enum('queue','executed') NOT NULL DEFAULT 'queue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_layanan_perminggu`
--

CREATE TABLE `total_layanan_perminggu` (
  `id_total_layanan_perminggu` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year` int(11) NOT NULL,
  `week_of_year` int(11) NOT NULL,
  `total_pelayanan` int(11) NOT NULL DEFAULT 0,
  `cron_status` enum('queue','executed') NOT NULL DEFAULT 'queue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `block` enum('no','yes') NOT NULL DEFAULT 'no',
  `status` enum('inactive','active') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `updated_by` varchar(255) NOT NULL DEFAULT '',
  `id_unit_pengolah` int(10) UNSIGNED DEFAULT NULL,
  `plain_password` varchar(255) DEFAULT NULL,
  `profile_photo` text DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `bod` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `jabatan`, `username`, `email`, `email_verified_at`, `password`, `block`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `id_unit_pengolah`, `plain_password`, `profile_photo`, `no_hp`, `last_login_at`, `last_login_ip`, `bod`) VALUES
(1, 'Prakom Kemenag Lebak, S.Kom', 'Ahli Pertama - Pranata Komputer', '199407292022031002', '199407292022031002@kemenag.go.id', NULL, '$2y$10$nzWGv6WktQI6Olufs8wfIePAxx4MS1OYh53XPuuDCn9RZpCfJIltW', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:36:14', NULL, '', '', NULL, NULL, NULL, '083892792128', '2025-07-04 11:36:01', '127.0.0.1', NULL),
(2, 'H. Abrar Munanda, M.Ag', 'Kepala Kantor', '197105141995031001', 'abrar.munanda@kemenag.go.id', NULL, '$2y$10$kzx8Y3mm7NNZIUKL19NtWOPNgN6vjqcD3cZkvml4EUQhNEGIGX6gS', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Yossef Yuda, S.HI, MA', 'Kepala Sub Bagian Tata Usaha', '198008042005011007', '198008042005011007@kemenag.go.id', NULL, '$2y$10$5.4WuWDrvER3Ij9Ed8mDkeQK80NZlVOwCX6qjWzdCHDq5GepPMe2m', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Sudirman, S.Ag', 'Kepala Seksi Pondok Pesantren', '197202112003121003', '197202112003121003@kemenag.go.id', NULL, '$2y$10$kq9TbhJwlwAB8kPGqNjyRuT6QLtcw059C/ju2QK5EIpSIaRmts4vi', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Masrizal, S.Ag, M.Pd', 'Kepala Seksi Pendidikan Agama Islam', '197202051997031003', '197202051997031003@kemenag.go.id', NULL, '$2y$10$Ot9Uu8yv1LdJRcJ/4m6n2.9oq0WpVipHaqAfB3VROk3PHpL9eiexG', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Drs. Firdaus', 'Kepala Seksi Bimbingan Masyarakat Islam', '196706191994031004', '196706191994031004@kemenag.go.id', NULL, '$2y$10$4y8wOSn7jyg5AXFBUgZ17uJ2zj1fF1TTjeFpMRVt2kLBuQMtyjoPK', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Sumardi, S.Ag, M.Pd', 'Kepala Seksi Pendidikan Madrasah', '197107051998031013', 'sumardi@kemenag.go.id', NULL, '$2y$10$AkOjjDWBVvZ.21d9EsCDLugR9ln9dYZ//wEDWGUuz2tOjs4pjrBjq', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Betriadi, S.HI', 'Kepala Seksi Penyelenggara Haji dan Umrah', '198106122008011013', '198106122008011013@kemenag.go.id', NULL, '$2y$10$J2zG0qlxGYi9Wbu/DrO7p.gFEWN0wVIE0af4N7tmtEV6y5sGO5iKu', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Gustiwarni, S.Ag', 'Kepala Seksi Zakat dan Wakaf', '196906151996032002', '196906151996032002@kemenag.go.id', NULL, '$2y$10$o6qquLfHJPvee5VHxFIWoevuETmmDTmLqMa8XQadARyIdDJfgFqhm', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Mardiyana, AMD, KKK', 'Petugas', 'mardiyana', 'mardiyana@kemenag.go.id', NULL, '$2y$10$n.tLLDWsEgoWE4gZKic2oOylYaK1Wgx2b5P3HBpdwHT.5RDjVxnbW', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Afrison, S.HI', 'Staf', '197901012007101004', '197901012007101004@kemenag.go.id', NULL, '$2y$10$6u.uaENzgivlfMCPPSVrGe9PxZMOr4UOAI6usN8nX5346xg5R0hz2', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:30', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Upik Mike, S.AP', 'Staf', '198505202014122005', '198505202014122005@kemenag.go.id', NULL, '$2y$10$Px5D97yQLLUCTF5WFKvHKu6tmW2djodF4H4u/Z2u1EgZW8RIb65jy', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Anna Yoladevika, SH', 'Staf', '197505152005012003', '197505152005012003@kemenag.go.id', NULL, '$2y$10$Gm7kt.aZHhEOfgd9DuZ.juIpYdrsX0ThP4uKhWdEntnUbWK2gEJ9e', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Sri Mulyani, SH', 'Staf', '198006222014112002', '198006222014112002@kemenag.go.id', NULL, '$2y$10$AmFm75RXTtL4zWlda504Eeyff7VJHmt1xyi3Gh5mG0x9Ypvijw9PS', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Yunefri, S.Kom ', 'Staf', '197406142007101001', '197406142007101001@kemenag.go.id', NULL, '$2y$10$jZ7DJCDm7kCEtnSvS9FR8..hQzkYel0HlzK8g.osYfcGspZ0TZqOG', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Del Junefri, SE', 'Staf', '197606082009121001', '197606082009121001@kemenag.go.id', NULL, '$2y$10$.IkoJqXB6JbyB/rWSnarduyPDNYSEj59Ie/QH5q8SdeYebsFvQaFy', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Ramadhanera P Madya, SE', 'Staf', '198705122011012008', '198705122011012008@kemenag.go.id', NULL, '$2y$10$Fsocvb6aRsLfndrNIxbrFubdtZh/Bcj.4br4Wkb75xHh.iUDE9zDC', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Nila Oksana, A. Ma', 'Staf', '198210132007102002', '198210132007102002@kemenag.go.id', NULL, '$2y$10$ZIX8ap4N23zPm/VimbijIOXsLPzooJ/bG/gebJlK6SctUzmD3N7ue', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Roni Hendra', 'Staf', '198212152005011002', '198212152005011002@kemenag.go.id', NULL, '$2y$10$HOEVZ.thPfOQWQSHMCmM7.SNJNVn/fAJqjnvvCgbVIdHD8ME/xp52', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Asriwansyah', 'Staf', '198204032005011001', '198204032005011001@kemenag.go.id', NULL, '$2y$10$facgP983vlTj9Q0yE9l.lO5tDfOgTYd/9eOaRTQS7E5tuUVxUNE9q', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Heru Syafri,A.Ma', 'Staf', '198212262005011004', '198212262005011004@kemenag.go.id', NULL, '$2y$10$U.P./WF9bZEl1xg0x6soKOjOWlT0rNfyocGvLqEWOXo8qvx0TSQOu', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Meiriza Lidya, S.S', 'Staf', 'Meiriza', 'Meiriza@kemenag.go.id', NULL, '$2y$10$13qMxwpUHA/xKWQChqHUleB2XBryzvf.gAES8oGogQoYqUC7j4BuG', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Fauzhi Abdhilah, S.Kom', 'Staf', 'Fauzhi', 'Fauzhi@kemenag.go.id', NULL, '$2y$10$Yj3i3Lfu4Z6ibiaXdEPM3.kIqBbGMUH591VpXWBvbFL8sIMqmhBrK', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:31', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Dewi Martaliza, S.AP', 'Staf', '197903062014122002', '197903062014122002@kemenag.go.id', NULL, '$2y$10$NTO2EdqChjYhv298tehGVOFqOpyUwrUEcUQTr2NnKmKuy2U1bxjEO', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'MARDANITA JALPIDA, S.S', 'Staf', '198003162007102002', '198003162007102002@kemenag.go.id', NULL, '$2y$10$8W/YXPalkeVTT81LPVdeTeJ9VFpavVHhAi7QWo/TrQ4B1bajLORzq', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Liswarti, S.Th I', 'Staf', '198104122009012004', '198104122009012004@kemenag.go.id', NULL, '$2y$10$yxsJUgCCK/KLpTjW2eOHC.m9uIvSgmFkjRx2fuVjoxo2XMpeAoU7u', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Martinis, S.Th I', 'Staf', '197101152007102002', '197101152007102002@kemenag.go.id', NULL, '$2y$10$5Dja26tqh6LPuN/MwHtlzOrACYZVS.UOfpMJTZcGaa1qCvgogNybm', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'ENDRIZAL, S.Ag', 'Staf', '197205062007101002', '197205062007101002@kemenag.go.id', NULL, '$2y$10$CRoFAvpfr.81XWqcZeB9b.H47yEhF.qxN15A.rpQyMgVJaBiIm71S', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Syafria Norawati, A.Ma', 'Staf', '198004142007102006', '198004142007102006@kemenag.go.id', NULL, '$2y$10$/AOstoBLW8KUKeQkb6eUX.TmLABovBl./6HbMQ19ILEmqwehe84g2', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'MARSEHARTI, S.Ag', 'Staf', '197208212000032003', '197208212000032003@kemenag.go.id', NULL, '$2y$10$4i/PpDpNXXQBF9FmS60A8.RSqg1QqSwUFB5PwfEOmo1ev8kni9csm', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Efnurdawati, S.HI', 'Staf', '197809292005012003', '197809292005012003@kemenag.go.id', NULL, '$2y$10$7RRJHgRvsnjBGiadVUXxDuDvuCzgexbFx0LKqPZTJMfyY/0i6qUzm', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Afriyasni', 'Staf', '196508281989032001', '196508281989032001@kemenag.go.id', NULL, '$2y$10$w9Jv4vgDiXA7BqiPk.AQieY4qvEku6dKEQKYEvOT9FZrG.G3UzsrC', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'ERMANINGSIH ', 'Staf', '197706292007102008', '197706292007102008@kemenag.go.id', NULL, '$2y$10$AbgXMFShIj891P3OjA32zO4oBkaefRabDJUA5Zi0j9fj.JNHCsZae', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'SYARIFUDDIN ', 'Staf', '196503032014111003', '196503032014111003@kemenag.go.id', NULL, '$2y$10$DFk9VXu2eLpas/RtQbkel.XbHTztSZkoJs955cw5g/gqOXx8tstg6', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:32', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'YUSNETI', 'Staf', '196702121998032002', '196702121998032002@kemenag.go.id', NULL, '$2y$10$ST267JeGxdSDljk4onLWQOV3NasDUUhtfYHN9sHx4irYL2OpQ9HD6', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'ASRIL. M', 'Staf', '196807031989021001', '196807031989021001@kemenag.go.id', NULL, '$2y$10$pAglsc1BvSew9lmIPP0eCe5hZE5YR9z9DiI1DBmtW/BAs29NqgC6u', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'AFNIZON, S.AP ', 'Staf', '197610182009011004', '197610182009011004@kemenag.go.id', NULL, '$2y$10$k4KxPFvyzokNyxGMN32KpeZA/7No6pmDcUpznxAtLEU6aZApEylfa', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'KOKO NURHADI YANTO ', 'Staf', '198305042014111002', '198305042014111002@kemenag.go.id', NULL, '$2y$10$gybH1WADsAcPKviJYCsKP.7QHQ6hWXcjWcg8pFEE316WTMnhbpwIC', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'ZULKIFLI', 'Staf', '196410112014111002', '196410112014111002@kemenag.go.id', NULL, '$2y$10$R2SleD2q3XleLR1q2oerlO40SxyrgiFD609w/DCBM485YM5BOCriC', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'SARIFAH AINI, S.Th I', 'Staf', '198701032011012010', '198701032011012010@kemenag.go.id', NULL, '$2y$10$El1Lx2U8Yw9SRA0CyN/Hl.WJVLZNQx/a03paA4ZpVEJgnwkh7XPly', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'DODY YUSRIYAL', 'Staf', '198406262007101003', '198406262007101003@kemenag.go.id', NULL, '$2y$10$P42CmbAvKP5L6Oe3SHsY/u7e/9pfPKdVZYEOIyeB5YAZBxmAyG93C', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'RICHO HARDIATNO, S.Pd', 'Staf', '198312122009011013', '198312122009011013@kemenag.go.id', NULL, '$2y$10$uWH/XBKYe7aZpha8vkOXPebUmo.8TkwPwfu/gOKah./QCDP4ybb.m', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'USRI', 'Staf', '197505162014111001', '197505162014111001@kemenag.go.id', NULL, '$2y$10$HRMpzYCb6vXVRwMlxKqcT.rKsDNF.Tm249K1ZiAWXvwKiZIv8f2Ji', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Jarmil', 'Staf', '198005152005011007', '198005152005011007@kemenag.go.id', NULL, '$2y$10$RbgkgIpf5U4qjuJENbDEPOoxVhRgyKAqnP3A1fWNY/7n83aFUD12W', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'MUCHLIS, S.TP', 'Staf', '197603152005011006', '197603152005011006@kemenag.go.id', NULL, '$2y$10$GnnXLMnzMytmD.v5Pbp5qO5DFMdyAmjPyBcShjvZMThiHO2nTcZyu', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'NELDAFINA, A.Md', 'Staf', '197112252007102002', '197112252007102002@kemenag.go.id', NULL, '$2y$10$nB5Ww47gqF8X55vWt/iBI.TMSCwYvt.ra2esvXUEMLuYfbYWh.R66', 'no', 'active', NULL, '2025-07-04 04:34:35', '2025-07-04 04:34:33', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_type`
--
ALTER TABLE `access_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_arsip`
--
ALTER TABLE `daftar_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `daftar_disposisi`
--
ALTER TABLE `daftar_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `daftar_jenis_layanan`
--
ALTER TABLE `daftar_jenis_layanan`
  ADD PRIMARY KEY (`id_jenis_layanan`);

--
-- Indexes for table `daftar_layanan`
--
ALTER TABLE `daftar_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `daftar_output_layanan`
--
ALTER TABLE `daftar_output_layanan`
  ADD PRIMARY KEY (`id_output_layanan`);

--
-- Indexes for table `daftar_pelayanan`
--
ALTER TABLE `daftar_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `daftar_syarat_layanan`
--
ALTER TABLE `daftar_syarat_layanan`
  ADD PRIMARY KEY (`id_syarat_layanan`);

--
-- Indexes for table `daftar_unit_pengolah`
--
ALTER TABLE `daftar_unit_pengolah`
  ADD PRIMARY KEY (`id_unit_pengolah`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fileponds`
--
ALTER TABLE `fileponds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `master_aksi_disposisi`
--
ALTER TABLE `master_aksi_disposisi`
  ADD PRIMARY KEY (`id_aksi_disposisi`);

--
-- Indexes for table `master_syarat_layanan`
--
ALTER TABLE `master_syarat_layanan`
  ADD PRIMARY KEY (`id_master_syarat_layanan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `temporary_files`
--
ALTER TABLE `temporary_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_layanan_perhari`
--
ALTER TABLE `total_layanan_perhari`
  ADD PRIMARY KEY (`id_total_layanan_perhari`);

--
-- Indexes for table `total_layanan_perminggu`
--
ALTER TABLE `total_layanan_perminggu`
  ADD PRIMARY KEY (`id_total_layanan_perminggu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_type`
--
ALTER TABLE `access_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daftar_arsip`
--
ALTER TABLE `daftar_arsip`
  MODIFY `id_arsip` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_disposisi`
--
ALTER TABLE `daftar_disposisi`
  MODIFY `id_disposisi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_jenis_layanan`
--
ALTER TABLE `daftar_jenis_layanan`
  MODIFY `id_jenis_layanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `daftar_layanan`
--
ALTER TABLE `daftar_layanan`
  MODIFY `id_layanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `daftar_output_layanan`
--
ALTER TABLE `daftar_output_layanan`
  MODIFY `id_output_layanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `daftar_pelayanan`
--
ALTER TABLE `daftar_pelayanan`
  MODIFY `id_pelayanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_syarat_layanan`
--
ALTER TABLE `daftar_syarat_layanan`
  MODIFY `id_syarat_layanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_unit_pengolah`
--
ALTER TABLE `daftar_unit_pengolah`
  MODIFY `id_unit_pengolah` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fileponds`
--
ALTER TABLE `fileponds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_aksi_disposisi`
--
ALTER TABLE `master_aksi_disposisi`
  MODIFY `id_aksi_disposisi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `master_syarat_layanan`
--
ALTER TABLE `master_syarat_layanan`
  MODIFY `id_master_syarat_layanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temporary_files`
--
ALTER TABLE `temporary_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_layanan_perhari`
--
ALTER TABLE `total_layanan_perhari`
  MODIFY `id_total_layanan_perhari` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_layanan_perminggu`
--
ALTER TABLE `total_layanan_perminggu`
  MODIFY `id_total_layanan_perminggu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

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
