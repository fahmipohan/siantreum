-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 09:03 AM
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
-- Database: `db_siantreum`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen_mahasiswa`
--

CREATE TABLE `departemen_mahasiswa` (
  `id_departemen_mahasiswa` int(11) NOT NULL,
  `departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen_mahasiswa`
--

INSERT INTO `departemen_mahasiswa` (`id_departemen_mahasiswa`, `departemen`) VALUES
(1, 'Departemen Bisnis dan Hospitality'),
(2, 'Departemen Industri Kreatif dan Digital');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas_mahasiswa`
--

CREATE TABLE `fakultas_mahasiswa` (
  `id_fakultas_mahasiswa` int(11) NOT NULL,
  `fakultas_mahasiswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas_mahasiswa`
--

INSERT INTO `fakultas_mahasiswa` (`id_fakultas_mahasiswa`, `fakultas_mahasiswa`) VALUES
(1, 'Vokasi');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_departemen`
--

CREATE TABLE `prodi_departemen` (
  `id_prodi_departemen` int(11) NOT NULL,
  `program_studi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_departemen`
--

INSERT INTO `prodi_departemen` (`id_prodi_departemen`, `program_studi`) VALUES
(1, 'D4 Manajemen Perhotelan'),
(2, 'D3 Keuangan dan Perbankan'),
(3, 'D3 Administrasi Bisnis'),
(4, 'D4 Desain Grafis'),
(5, 'D3 Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_pilih`
--

CREATE TABLE `tanggal_pilih` (
  `id_tanggal_pilih` int(11) NOT NULL,
  `tanggal_terpilih` date NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanggal_pilih`
--

INSERT INTO `tanggal_pilih` (`id_tanggal_pilih`, `tanggal_terpilih`, `id_users`) VALUES
(7, '2024-06-20', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_jenis_kelamin` int(11) DEFAULT NULL,
  `id_fakultas_mahasiswa` int(11) DEFAULT NULL,
  `id_departemen_mahasiswa` int(11) DEFAULT NULL,
  `id_prodi_departemen` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nim` char(50) DEFAULT NULL,
  `kontak` char(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tgl_rencana` varchar(50) DEFAULT NULL,
  `status_approval` varchar(50) DEFAULT 'pending',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `id_role`, `id_jenis_kelamin`, `id_fakultas_mahasiswa`, `id_departemen_mahasiswa`, `id_prodi_departemen`, `nama_lengkap`, `nim`, `kontak`, `email`, `tgl_rencana`, `status_approval`, `username`, `password`, `status`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@example.com', NULL, 'pending', 'admin', '$2y$10$OmXnMbOXjA7Dh.J9Ci3dX.QCpSmomPx.dIApM.byWRX2GWFovBHBy', 'aktif'),
(9, 2, 1, 1, 2, 5, 'Delfahmi Luftika Pohan', '213140714111198', '081260362632', 'f4hm1pohan@gmail.com', '2024-06-20', 'approved', 'fahmi', '$2y$10$RnMc9zv7FBZFhkis1u8jouv4/FYQuVklQlzOQTsYTvQcmX2u0Jaky', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen_mahasiswa`
--
ALTER TABLE `departemen_mahasiswa`
  ADD PRIMARY KEY (`id_departemen_mahasiswa`);

--
-- Indexes for table `fakultas_mahasiswa`
--
ALTER TABLE `fakultas_mahasiswa`
  ADD PRIMARY KEY (`id_fakultas_mahasiswa`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `prodi_departemen`
--
ALTER TABLE `prodi_departemen`
  ADD PRIMARY KEY (`id_prodi_departemen`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tanggal_pilih`
--
ALTER TABLE `tanggal_pilih`
  ADD PRIMARY KEY (`id_tanggal_pilih`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `role_id` (`id_role`),
  ADD KEY `id_fakultas_mahasiswa` (`id_fakultas_mahasiswa`),
  ADD KEY `id_departemen_mahasiswa` (`id_departemen_mahasiswa`),
  ADD KEY `id_prodi_departemen` (`id_prodi_departemen`),
  ADD KEY `id_jenis_kelamin` (`id_jenis_kelamin`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen_mahasiswa`
--
ALTER TABLE `departemen_mahasiswa`
  MODIFY `id_departemen_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fakultas_mahasiswa`
--
ALTER TABLE `fakultas_mahasiswa`
  MODIFY `id_fakultas_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prodi_departemen`
--
ALTER TABLE `prodi_departemen`
  MODIFY `id_prodi_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanggal_pilih`
--
ALTER TABLE `tanggal_pilih`
  MODIFY `id_tanggal_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tanggal_pilih`
--
ALTER TABLE `tanggal_pilih`
  ADD CONSTRAINT `tanggal_pilih_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `jenis_kelamin` (`id_jenis_kelamin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`id_fakultas_mahasiswa`) REFERENCES `fakultas_mahasiswa` (`id_fakultas_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_6` FOREIGN KEY (`id_departemen_mahasiswa`) REFERENCES `departemen_mahasiswa` (`id_departemen_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_7` FOREIGN KEY (`id_prodi_departemen`) REFERENCES `prodi_departemen` (`id_prodi_departemen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
