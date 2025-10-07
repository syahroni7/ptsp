/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : 127.0.0.1:3306
 Source Schema         : kemenag_ptsp_live

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 16/03/2023 12:56:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for daftar_jenis_layanan
-- ----------------------------
DROP TABLE IF EXISTS `daftar_jenis_layanan`;
CREATE TABLE `daftar_jenis_layanan` (
  `id_jenis_layanan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_jenis_layanan`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of daftar_jenis_layanan
-- ----------------------------
BEGIN;
INSERT INTO `daftar_jenis_layanan` VALUES (1, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Data/Informasi', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (2, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Kenaikan Pangkat', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (3, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Konsultasi', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (4, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Mutasi', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (5, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Pencatatan', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (6, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Penerbitan SK GTT', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (7, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Pengaduan', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (8, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Pengesahan', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (9, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Pensiun', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (10, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Perizinan', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (11, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Layanan Persetujuan', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (12, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Layanan Rekomendasi', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (13, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Layanan Bantuan Operasional Sekolah', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (14, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Layanan BOP RA', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (15, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Layanan Surat Masuk', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (16, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Layanan Surat Keterangan', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (17, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Layanan Program Indonesia Pintar', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (18, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Layanan PTK', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (19, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Layanan Bantuan', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (20, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Layanan Pendaftaran', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (21, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Layanan Perbaikan Data CJH', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (22, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Layanan Persyaratan Kafilah', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (23, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Layanan Penunjukan', '', '');
INSERT INTO `daftar_jenis_layanan` VALUES (24, '2023-02-27 03:46:19', '2023-02-27 03:46:19', NULL, 'Layanan Keuangan', '', '');
COMMIT;

-- ----------------------------
-- Table structure for daftar_layanan
-- ----------------------------
DROP TABLE IF EXISTS `daftar_layanan`;
CREATE TABLE `daftar_layanan` (
  `id_layanan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_unit_pengolah` int unsigned NOT NULL,
  `id_jenis_layanan` int unsigned NOT NULL,
  `id_output_layanan` int unsigned NOT NULL,
  `lama_layanan` int NOT NULL,
  `biaya_layanan` int NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of daftar_layanan
-- ----------------------------
BEGIN;
INSERT INTO `daftar_layanan` VALUES (1, NULL, NULL, NULL, 'Pelayanan Data dan Informasi Umum', 1, 1, 1, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (2, NULL, NULL, NULL, 'Kenaikan Pangkat Fungsional Tertentu / Guru', 1, 2, 2, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (3, NULL, NULL, NULL, 'Kenaikan Pangkat Reguler / Pelaksana', 1, 2, 2, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (4, NULL, NULL, NULL, 'Konsultasi BMN', 1, 3, 1, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (5, NULL, NULL, NULL, 'Mutasi Jabatan Pelaksana', 1, 4, 3, 6, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (6, NULL, '2022-11-23 09:46:13', NULL, 'Pelayanan Surat Masuk Umum', 1, 5, 4, 2, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (7, NULL, NULL, NULL, 'Surat Permohonan SK GTT / SK PTT', 1, 6, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (8, NULL, NULL, NULL, 'Pelayanan Pengaduan Masyarakat', 1, 7, 1, 30, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (9, NULL, NULL, NULL, 'Legalisir Dokumen Kepegawaian', 1, 8, 5, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (10, NULL, NULL, NULL, 'Permohonan Pensiun', 1, 9, 6, 6, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (11, NULL, NULL, NULL, 'Izin Audiensi dengan Kepala Kantor', 1, 10, 7, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (12, NULL, NULL, NULL, 'Izin Magang/PKL', 1, 10, 8, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (13, NULL, NULL, NULL, 'Izin Pemakaian Tempat', 1, 10, 8, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (14, NULL, NULL, NULL, 'Surat Tugas Eksternal', 1, 11, 9, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (15, NULL, NULL, NULL, 'Surat Rekomendasi Pindah Tugas', 1, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (16, NULL, NULL, NULL, 'Rekomendasi Surat Izin Belajar/Tugas Belajar', 1, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (17, NULL, NULL, NULL, 'Usulan Memperoleh Penghargaan Satya Lencana', 1, 12, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (18, NULL, NULL, NULL, 'Usulan Kartu Kepegawaian (Karpeg)', 1, 12, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (19, NULL, NULL, NULL, 'Usulan Kartu Suami / Istri (Karis / Karsu)', 1, 12, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (20, NULL, NULL, NULL, 'Usulan Pencantuman Gelar', 1, 12, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (21, NULL, NULL, NULL, 'Usulan Penyesuaian Masa Kerja', 1, 12, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (22, NULL, NULL, NULL, 'Usulan Mengikuti Ujian Dinas dan UPKP', 1, 12, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (23, NULL, NULL, NULL, 'Permohonan Cuti', 1, 10, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (24, NULL, NULL, NULL, 'Konsultasi Layanan Kepegawaian', 1, 3, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (25, NULL, NULL, NULL, 'Kenaikan Jenjang Jabatan Fungsional Madya', 1, 12, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (26, NULL, NULL, NULL, 'Usulan Mutasi Jabatan Fungsional', 1, 12, 3, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (27, NULL, NULL, NULL, 'Bantuan Operasional Sekolah', 2, 13, 11, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (28, NULL, NULL, NULL, 'Bantuan Opersional Pendidikan RA', 2, 14, 11, 6, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (29, NULL, NULL, NULL, 'Konsultasi PT', 2, 3, 12, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (30, NULL, NULL, NULL, 'Laporan Bulanan Madrasah', 2, 1, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (31, NULL, '2022-11-23 09:45:05', NULL, 'Pelayanan Surat Masuk PenMad', 2, 15, 4, 2, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (32, NULL, NULL, NULL, 'Pengesahan Ijazah/STTB/SKP Ijazah', 2, 16, 14, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (33, NULL, NULL, NULL, 'Laporan Program Indonesia Pintar', 2, 17, 11, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (34, NULL, NULL, NULL, 'SK Pembagian Tugas Madrasah', 2, 8, 15, 5, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (35, NULL, NULL, NULL, 'Surat Izin Pendirian dan Operasional Madrasah', 2, 10, 16, 6, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (36, NULL, NULL, NULL, 'Surat Keterangan Pengganti Ijazah Karena Hilang', 2, 16, 17, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (37, NULL, NULL, NULL, 'Surat Keterangan Pengganti Ijazah Karena Kerusakan Ijazah', 2, 16, 17, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (38, NULL, NULL, NULL, 'Surat Keterangan Pengganti Ijazah Karena Kesalahan Penulisan Ijazah', 2, 16, 17, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (39, NULL, NULL, NULL, 'Surat Pengajuan Penonaktifan PTK', 2, 18, 17, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (40, NULL, NULL, NULL, 'Surat Rekomendasi Bantuan Sarpras', 2, 19, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (41, NULL, NULL, NULL, 'Surat Izin Penelitian Madrasah', 2, 10, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (42, NULL, NULL, NULL, 'Surat Izin Darmawisata / Studi Banding', 2, 10, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (43, NULL, NULL, NULL, 'Surat Rekomendasi Melanjutkan Sekolah', 2, 3, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (44, NULL, NULL, NULL, 'Usulan TPG dan Tunjangan Kinerja', 2, 3, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (45, NULL, NULL, NULL, 'Konsultasi Data EMIS dan SIMPATIKA', 2, 3, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (46, NULL, NULL, NULL, 'Surat Rekomendasi Mutasi Siswa', 2, 16, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (47, NULL, '2023-01-03 05:39:24', NULL, 'Konsultasi Data EMIS', 3, 3, 18, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (48, NULL, NULL, NULL, 'Konsultasi Tunjangan Sertifikasi Guru', 3, 3, 1, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (49, NULL, NULL, NULL, 'Pencairan Tunjangan Sertifikasi', 3, 12, 11, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (50, NULL, NULL, NULL, 'Penyerahan Surat Pengajuan Riwayat mengajar di akun SIAGA', 3, 5, 19, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (51, NULL, NULL, NULL, 'Data Emis Pondok Pesantren, MDTA dan TPQ', 4, 1, 1, 2, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (52, NULL, NULL, NULL, 'Laporan Bulanan Pondok Pesantren', 4, 1, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (53, NULL, '2022-11-23 09:44:31', NULL, 'Pelayanan Surat Masuk PD Pontren', 4, 5, 4, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (54, NULL, NULL, NULL, 'Penanda tanganan Ijazah MDTA/TPQ', 4, 8, 20, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (55, NULL, NULL, NULL, 'Surat Rekomendasi Pendirian Pondok Pesantren', 4, 12, 10, 3, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (56, NULL, NULL, NULL, 'Surat Rekomendasi dan Verifikasi Pendirian LPT (TPQ / Rumah Tahfiz)', 4, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (57, NULL, NULL, NULL, 'Surat Rekomendasi Izin Penelitian PD Pontren', 4, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (58, NULL, NULL, NULL, 'Usulan Izin Operasional PKPDS Wustho', 4, 10, 8, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (59, NULL, NULL, NULL, 'Izin Operasional Penyelenggaraan MDTA', 4, 1, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (60, NULL, NULL, NULL, 'Izin Operasional Penyelenggaraan LPQ', 4, 10, 8, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (61, NULL, NULL, NULL, 'Izin Operasional Penyelenggaraan Pondok Pesanren', 4, 10, 8, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (62, NULL, NULL, NULL, 'Rekomendasi Layanan LPQ, MDT, dan Pondok Pesantren', 4, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (63, NULL, NULL, NULL, 'Konsultasi Haji', 5, 3, 1, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (64, NULL, NULL, NULL, 'Konsultasi Umrah', 5, 3, 1, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (65, NULL, NULL, NULL, 'Pendaftaran Haji Reguler', 5, 20, 11, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (66, NULL, NULL, NULL, 'Persyaratan Calon petugas Haji', 5, 20, 11, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (67, NULL, NULL, NULL, 'Rekomendasi Izin Pendirian KBIH', 5, 10, 10, 3, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (68, NULL, NULL, NULL, 'Rekomendasi Izin Pendirian PPIU', 5, 10, 16, 3, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (69, NULL, NULL, NULL, 'Rekomendasi Perpanjangan Izin Kantor PPIU', 5, 10, 16, 4, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (70, NULL, NULL, NULL, 'Rekomendasi Perpanjangan Izin KBIH', 5, 10, 10, 3, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (71, NULL, NULL, NULL, 'Rekomendasi Perpanjangan Izin PPIU', 5, 10, 10, 3, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (72, NULL, NULL, NULL, 'Mutasi berangkat Haji', 5, 11, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (73, NULL, NULL, NULL, 'Pengajuan Manula Berangkat Haji', 5, 11, 21, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (74, NULL, NULL, NULL, 'Pengajuan Manula dan Pendamping Berangkat Haji', 5, 11, 21, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (75, NULL, NULL, NULL, 'Pengajuan penggabungan berangkat Haji orang tua ke anak sebaliknya', 5, 11, 21, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (76, NULL, NULL, NULL, 'Pengajuan penggabungan berangkat Haji suami ke istri sebaliknya', 5, 11, 21, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (77, NULL, NULL, NULL, 'Pengajuan Pramanifes dari KBIH dan IPHI', 5, 11, 21, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (78, NULL, NULL, NULL, 'Penundaan Berangkat Haji', 5, 11, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (79, NULL, NULL, NULL, 'Pembatalan Haji (Berangkat)', 5, 12, 17, 60, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (80, NULL, NULL, NULL, 'Pembatalan Haji (Meninggal Dunia)', 5, 12, 17, 60, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (81, NULL, NULL, NULL, 'Rekomendasi Pembuatan Paspor Haji', 5, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (82, NULL, NULL, NULL, 'Rekomendasi Pembuatan Paspor Umrah', 5, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (83, NULL, '2022-11-23 09:45:43', NULL, 'Pelayanan Surat Masuk PHU', 5, 15, 4, 2, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (84, NULL, NULL, NULL, 'Berita Acara Pemeriksaan Data Calon Jamaah Haji', 5, 21, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (85, NULL, NULL, NULL, 'Pelimpahan Nomor Porsi Haji Jamaah Wafat', 5, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (86, NULL, NULL, NULL, 'Pelimpahan Nomor Porsi Haji Jamaah Sakit Permanen', 5, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (87, NULL, NULL, NULL, 'Data Bimbingan Masyarakat Islam', 6, 1, 22, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (88, NULL, NULL, NULL, 'Konsultasi Perkawinan', 6, 3, 23, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (89, NULL, NULL, NULL, 'Laporan Bulanan KUA', 6, 1, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (90, NULL, NULL, NULL, 'Laporan Bulanan PAI Non PNS', 6, 1, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (91, NULL, NULL, NULL, 'Laporan Karya Tulis Ilmiah Penghulu', 6, 1, 24, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (92, NULL, NULL, NULL, 'Laporan Tahunan KUA', 6, 1, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (93, NULL, NULL, NULL, 'Laporan Triwulan KUA', 6, 1, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (94, NULL, NULL, NULL, 'Layanan Persyaratan Khafilah MTQ', 6, 22, 25, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (95, NULL, '2022-11-23 09:45:55', NULL, 'Pelayanan Surat Masuk BiMas', 6, 15, 4, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (96, NULL, NULL, NULL, 'Permohonan Rekomendasi BP4', 6, 3, 26, 5, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (97, NULL, NULL, NULL, 'Rekomendasi Kegiatan Keagamaan', 6, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (98, NULL, NULL, NULL, 'Rekomendasi Ormas Islam/Lembaga Keagamaan', 6, 12, 10, 30, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (99, NULL, NULL, NULL, 'Rekomendasi Perubahan Status Mushalla Menjadi Masjid', 6, 12, 11, 30, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (100, NULL, NULL, NULL, 'Sertifikat Muallaf', 6, 5, 27, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (101, NULL, NULL, NULL, 'Pengukuran Arah Kiblat', 6, 16, 27, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (102, NULL, NULL, NULL, 'Rohaniwan dan/atau Pembaca Doa', 6, 23, 28, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (103, NULL, NULL, NULL, 'Laporan BOP KUA', 6, 1, 22, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (104, NULL, NULL, NULL, 'Rekomendasi Pendirian Musholla / Masjid', 6, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (105, NULL, NULL, NULL, 'Layanan Data Musholla dan Masjid', 6, 1, 22, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (106, NULL, NULL, NULL, 'Rekomendasi Bantuan Masjid / Mushalla', 6, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (107, NULL, NULL, NULL, 'Laporan Nikah di luar Kantor KUA', 6, 1, 22, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (108, NULL, NULL, NULL, 'Rekomendasi Sertifikat Halal', 6, 12, 10, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (109, NULL, NULL, NULL, 'Layanan Informasi dan Konsultasi Wakaf', 7, 3, 23, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (110, NULL, NULL, NULL, 'Pelayanan Alih Tulisan Arab Melayu ke Bahasa Indonesia', 7, 1, 22, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (111, NULL, NULL, NULL, 'Layanan Informasi tentang Percepatan Sertifikat Tanah Wakaf', 7, 1, 22, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (112, NULL, NULL, NULL, 'Layanan Informasi dan Konsultasi Zakat', 7, 3, 23, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (113, '2022-10-21 02:31:04', '2022-10-21 02:31:04', NULL, 'Pelayanan Simpatika', 2, 1, 1, 1, 1, '', '');
INSERT INTO `daftar_layanan` VALUES (114, '2022-10-21 02:31:28', '2022-10-21 02:31:28', NULL, 'Pelayanan EMIS', 2, 1, 1, 1, 1, '', '');
INSERT INTO `daftar_layanan` VALUES (115, '2022-11-15 01:44:19', '2022-11-23 09:46:05', NULL, 'Pelayanan Surat Masuk PAIS', 3, 15, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (116, '2022-11-23 09:48:55', '2022-11-23 09:48:55', NULL, 'Pelayanan Surat Masuk Zawa', 7, 5, 1, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (117, '2023-01-03 05:45:08', '2023-01-03 05:45:08', NULL, 'Pengajuan Nomor Registrasi Guru (NRG) PAI', 3, 10, 4, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (118, '2023-02-27 03:46:52', '2023-02-27 03:46:52', NULL, 'Pencairan Uang Makan', 1, 24, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (119, '2023-02-27 03:47:44', '2023-02-27 03:47:44', NULL, 'Pencairan Tunjangan Kinerja', 1, 24, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (120, '2023-02-27 03:48:05', '2023-02-27 03:48:05', NULL, 'Pencairan Sertifikasi', 1, 24, 13, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (121, '2023-03-01 06:22:47', '2023-03-01 06:22:47', NULL, 'Penandatanganan Surat Secara Elektronik', 1, 1, 4, 1, 0, '', '');
INSERT INTO `daftar_layanan` VALUES (122, '2023-03-16 05:53:47', '2023-03-16 05:53:47', NULL, 'Insentif Guru Ustadz', 4, 24, 13, 1, 0, '', '');
COMMIT;

-- ----------------------------
-- Table structure for daftar_output_layanan
-- ----------------------------
DROP TABLE IF EXISTS `daftar_output_layanan`;
CREATE TABLE `daftar_output_layanan` (
  `id_output_layanan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_output_layanan`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of daftar_output_layanan
-- ----------------------------
BEGIN;
INSERT INTO `daftar_output_layanan` VALUES (1, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Informasi', '', '');
INSERT INTO `daftar_output_layanan` VALUES (2, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Pengantar usul Kenaikan Pangkat', '', '');
INSERT INTO `daftar_output_layanan` VALUES (3, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Surat Pengantar', '', '');
INSERT INTO `daftar_output_layanan` VALUES (4, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Surat', '', '');
INSERT INTO `daftar_output_layanan` VALUES (5, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Legalisir', '', '');
INSERT INTO `daftar_output_layanan` VALUES (6, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Pengantar Pensiun', '', '');
INSERT INTO `daftar_output_layanan` VALUES (7, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Jadwal Audiensi', '', '');
INSERT INTO `daftar_output_layanan` VALUES (8, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Surat Izin', '', '');
INSERT INTO `daftar_output_layanan` VALUES (9, '2022-10-19 20:48:29', '2022-10-19 20:48:29', NULL, 'Surat Tugas', '', '');
INSERT INTO `daftar_output_layanan` VALUES (10, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Surat Rekomendasi', '', '');
INSERT INTO `daftar_output_layanan` VALUES (11, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Berkas Lengkap', '', '');
INSERT INTO `daftar_output_layanan` VALUES (12, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Pemahaman', '', '');
INSERT INTO `daftar_output_layanan` VALUES (13, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Laporan', '', '');
INSERT INTO `daftar_output_layanan` VALUES (14, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Pengesahan', '', '');
INSERT INTO `daftar_output_layanan` VALUES (15, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Surat Pengesahan', '', '');
INSERT INTO `daftar_output_layanan` VALUES (16, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Surat Keputusan', '', '');
INSERT INTO `daftar_output_layanan` VALUES (17, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Surat Keterangan', '', '');
INSERT INTO `daftar_output_layanan` VALUES (18, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Konsultasi', '', '');
INSERT INTO `daftar_output_layanan` VALUES (19, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'S 28 a', '', '');
INSERT INTO `daftar_output_layanan` VALUES (20, '2022-10-19 20:48:30', '2022-10-19 20:48:30', NULL, 'Tanda Tangan', '', '');
INSERT INTO `daftar_output_layanan` VALUES (21, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Pengajuan', '', '');
INSERT INTO `daftar_output_layanan` VALUES (22, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Data', '', '');
INSERT INTO `daftar_output_layanan` VALUES (23, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Jadwal Konsultasi', '', '');
INSERT INTO `daftar_output_layanan` VALUES (24, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Karya Tulis', '', '');
INSERT INTO `daftar_output_layanan` VALUES (25, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Persyaratan', '', '');
INSERT INTO `daftar_output_layanan` VALUES (26, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Rekomendasi', '', '');
INSERT INTO `daftar_output_layanan` VALUES (27, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Sertifikat', '', '');
INSERT INTO `daftar_output_layanan` VALUES (28, '2022-10-19 20:48:31', '2022-10-19 20:48:31', NULL, 'Petugas Rohaniwan', '', '');
COMMIT;

-- ----------------------------
-- Table structure for daftar_unit_pengolah
-- ----------------------------
DROP TABLE IF EXISTS `daftar_unit_pengolah`;
CREATE TABLE `daftar_unit_pengolah` (
  `id_unit_pengolah` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_unit_pengolah`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of daftar_unit_pengolah
-- ----------------------------
BEGIN;
INSERT INTO `daftar_unit_pengolah` VALUES (1, NULL, NULL, NULL, 'Subbagian Tata Usaha', '', '');
INSERT INTO `daftar_unit_pengolah` VALUES (2, NULL, NULL, NULL, 'Seksi Pendidikan Madrasah', '', '');
INSERT INTO `daftar_unit_pengolah` VALUES (3, NULL, NULL, NULL, 'Seksi Pendidikan Agama Islam', '', '');
INSERT INTO `daftar_unit_pengolah` VALUES (4, NULL, NULL, NULL, 'Seksi Pendidikan Diniyah dan Pondok Pesantren', '', '');
INSERT INTO `daftar_unit_pengolah` VALUES (5, NULL, NULL, NULL, 'Seksi Penyelenggaraan Haji dan Umrah', '', '');
INSERT INTO `daftar_unit_pengolah` VALUES (6, NULL, NULL, NULL, 'Seksi Bimbingan Masyarakat Islam', '', '');
INSERT INTO `daftar_unit_pengolah` VALUES (7, NULL, NULL, NULL, 'Seksi Penyelenggara Zakat dan Wakaf', '', '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
