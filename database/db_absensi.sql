-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2023 pada 09.06
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `gaji` double DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `total_kehadiran` int(11) DEFAULT 0,
  `total_alpha` int(11) DEFAULT 0,
  `potongan_pph_persen` int(3) DEFAULT NULL,
  `potongan_pph` int(11) DEFAULT NULL,
  `potongan_asuransi` double DEFAULT NULL,
  `karyawan_id` int(11) NOT NULL,
  `potongan_mangkir` double DEFAULT NULL,
  `tunjangan_jabatan` double DEFAULT NULL,
  `tunjangan_konsumsi` double DEFAULT NULL,
  `tunjangan_harian` double DEFAULT NULL,
  `bonus_target` double DEFAULT NULL,
  `total_gaji` double DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `gaji`, `periode`, `total_kehadiran`, `total_alpha`, `potongan_pph_persen`, `potongan_pph`, `potongan_asuransi`, `karyawan_id`, `potongan_mangkir`, `tunjangan_jabatan`, `tunjangan_konsumsi`, `tunjangan_harian`, `bonus_target`, `total_gaji`, `create_at`, `create_by`) VALUES
(3, 3000000, '7', 2, 0, NULL, 300000, 150000, 129, 0, 1500000, 700000, 0, 2000000, 6120000, '2023-08-03 17:10:45', NULL),
(7, 3000000, '8', 0, 0, 10, 300000, 1500000, 129, 0, 1500000, 70000, 0, 2000000, 4770000, '2023-08-03 17:21:30', NULL),
(8, 3000000, '8', 0, 0, 10, 300000, 1500000, 129, 0, 1500000, 70000, 0, 2000000, 4770000, '2023-08-04 01:47:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `gedung_id` int(11) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`gedung_id`, `nama_gedung`, `alamat`) VALUES
(12, 'LOKASI 1', 'Alamat 1'),
(13, 'LOKASI 2', 'Alamat 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'finance', 'Finance'),
(3, 'Operator', 'Operator'),
(4, 'supervisor', 'Supervisor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(5, 'STAFF'),
(6, 'MANAJER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `status_karyawan` varchar(50) DEFAULT NULL,
  `id_shift` int(20) NOT NULL,
  `gedung_id` int(11) NOT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `tunjangan_jabatan` double DEFAULT NULL,
  `tunjangan_konsumsi` double DEFAULT NULL,
  `tunjangan_harian` double DEFAULT NULL,
  `bonus_target` double DEFAULT NULL,
  `persentase_pph21` int(11) DEFAULT NULL,
  `potongan_asuransi` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `id_karyawan`, `nama_karyawan`, `jabatan`, `status_karyawan`, `id_shift`, `gedung_id`, `gaji_pokok`, `tunjangan_jabatan`, `tunjangan_konsumsi`, `tunjangan_harian`, `bonus_target`, `persentase_pph21`, `potongan_asuransi`) VALUES
(129, 'S2008001', 'Karyawan 1', 5, 'Aktif', 5, 12, 3000000, 1500000, 70000, 0, 2000000, 10, '1500000'),
(130, 'M2008129', 'Karyawan 2', 6, NULL, 6, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'S2008130', 'Karyawan 3', 5, NULL, 5, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_khd` int(11) NOT NULL,
  `nama_khd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id_khd`, `nama_khd`) VALUES
(1, 'Hadir'),
(2, 'Sakit'),
(3, 'Ijin'),
(4, 'Alpha'),
(5, 'Lepas/Off');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `protected` tinyint(4) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) UNSIGNED NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `protected`, `is_active`, `is_parent`, `sort`) VALUES
(15, 'menu management', 'menu', 'fa fa-list-alt', NULL, 1, 42, 14),
(16, 'master data', 'sdf', 'fa fa-folder', NULL, 1, 0, 1),
(18, 'Data Karyawan', 'karyawan', 'fa fa-user', NULL, 1, 16, 2),
(19, 'data Jabatan', 'jabatan', 'fa fa-briefcase', NULL, 1, 16, 3),
(21, 'Data Shift', 'shift', 'fa fa-retweet', NULL, 1, 16, 4),
(22, 'data Lokasi', 'lokasi', 'fa fa-location-arrow', NULL, 1, 16, 5),
(31, 'Ambil QR Code', 'GenBar', 'fa fa-qrcode', NULL, 1, 0, 6),
(32, 'Gaji', 'gaji', 'fas fa-hand-holding-usd', NULL, 1, 44, 7),
(33, 'Scan QRCODE', 'scan', 'fa fa-search-plus', NULL, 1, 0, 7),
(35, 'User management', 'users', 'fa fa-users', NULL, 1, 42, 13),
(36, 'Histori Absensi', 'presensi', 'fa fa-paperclip', NULL, 1, 41, 9),
(39, 'Rekap Absensi', 'rekap', 'fa fa-list-alt', NULL, 1, 41, 10),
(41, 'Data Absensi', 'dataabs', 'far fa-folder-open', NULL, 1, 0, 8),
(42, 'setting', 'setting', 'fas fa-cogs', NULL, 1, 0, 11),
(44, 'Gaji', 'gaji', 'fas fa-dollar-sign', NULL, 1, 0, 0),
(45, 'Gaji Perorang', 'gaji/slip_perorang', 'fas fa-file-invoice-dollar', NULL, 1, 44, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id_absen` int(11) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `jam_msk` time NOT NULL,
  `jam_klr` time NOT NULL,
  `id_khd` int(11) DEFAULT NULL,
  `ket` varchar(150) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id_absen`, `id_karyawan`, `tgl`, `jam_msk`, `jam_klr`, `id_khd`, `ket`, `id_status`) VALUES
(64, 'S2008001', '2020-08-02', '12:52:43', '12:52:46', 1, '', 2),
(65, 'S2008001', '2020-08-03', '12:52:43', '12:52:46', 1, '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift`
--

CREATE TABLE `shift` (
  `id_shift` int(11) NOT NULL,
  `nama_shift` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shift`
--

INSERT INTO `shift` (`id_shift`, `nama_shift`) VALUES
(5, 'SHIFT 1'),
(6, 'SHIFT 2'),
(7, 'SHIFT 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stts`
--

CREATE TABLE `stts` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stts`
--

INSERT INTO `stts` (`id_status`, `nama_status`) VALUES
(1, 'Masuk'),
(2, 'Pulang'),
(3, 'tidak hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(26, '::1', 'admin@admin.com', '$2y$12$MPcQlOck9fzd/5UjJ6iIXuhZivhkXdfoVD2xFXpZTnZ2IWQw/nFhW', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1556798313, 1691131967, 1, 'admin', 'nistator', NULL, '123412341234'),
(34, '::1', 'jefrimaruli@gmail.com', '$2y$12$yt3Qu8yQzdT3zYSgbDyDsOCi6d6TMtIrCTzB.nJaruVCO5hDMdtm2', 'jefrimaruli@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1560355548, 1560524242, 1, 'Jeff', 'Maruli', NULL, '9832349234'),
(46, '::1', 'operator@operator.com', '$2y$10$ibxBt.RYG7jib0JxBxB1.usc9pzjqUqPPTvwLgPp1gMRKg6VMLLei', 'operator@operator.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1562178403, 1596347698, 1, 'operator', '2', NULL, '34890234809238490'),
(47, '::1', 'staff@staff.com', '$2y$12$RHPXgho6UJLQWv8W3F9oJekbSnFYXyhNADZvuqaYmGEoUD6Yl1Hd.', 'staff@staff.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1564294648, 1564294659, 1, 'staf', 'staff', NULL, '239423849234890');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(29, 26, 1),
(37, 34, 1),
(49, 46, 3),
(50, 47, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`gedung_id`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_khd`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indeks untuk tabel `stts`
--
ALTER TABLE `stts`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `gedung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_khd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `shift`
--
ALTER TABLE `shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `stts`
--
ALTER TABLE `stts`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
