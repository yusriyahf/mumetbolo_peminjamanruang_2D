-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 02:20 PM
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
-- Database: `peminjaman_ruangan_fixbgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `jenis_kelamin`, `no_tlp`, `alamat`, `username`) VALUES
(1, 'admin1', 'L', '0822222', 'malang', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama`, `jabatan`, `jenis_kelamin`, `no_tlp`, `prodi`, `username`) VALUES
(4, '12345', 'Rosa', 'kajur', 'L', '9974332123', 'D-IV TI', 'Rosa'),
(5, '22', 'unggul', 'dosen', 'L', '123', 'D-IV TI', 'unggul');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_ruang` varchar(10) NOT NULL,
  `jenis_kegiatan` varchar(500) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_ruang`, `jenis_kegiatan`, `tgl_mulai`, `tgl_selesai`, `hari`, `keterangan`) VALUES
(1, 'R.5.01', 'KBM', '2023-08-27', '2023-12-27', 'jumat', 'Manajemen Proyek'),
(2, 'LAI1', 'KBM', '2023-08-27', '2023-12-27', 'senin', 'Desain Pemrograman Web'),
(16, 'LSI3', 'KBM', '2023-12-12', '2023-12-30', 'selasa', ''),
(17, 'R.5.02', 'KBM', '0000-00-00', '0000-00-00', 'rabu', 'p'),
(18, 'R.5.01', 'hmti', '2023-12-29', '2023-12-29', 'jumat', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `jadwal_ruang`
-- (See below for the actual view)
--
CREATE TABLE `jadwal_ruang` (
`id_ruang` varchar(10)
,`nama_ruang` varchar(50)
,`lantai` enum('5','6','7','8')
,`jenis_ruang` varchar(20)
,`kapasitas` int(100)
,`jenis_kegiatan` varchar(500)
,`keterangan` varchar(255)
,`hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu')
);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `jenis_kelamin`, `no_tlp`, `kelas`, `prodi`, `username`) VALUES
(37, '2112', 'yuji', 'L', '0098764', '2D', 'D-IV TI', 'yuji'),
(38, '111', 'yuma ', 'L', '0000000', '2D', 'D-IV TI', 'yuma '),
(40, '1', 'ayu', 'P', '444', '1A', 'D-IV TI', 'ayu');

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_proses` int(11) NOT NULL,
  `id_ruang` varchar(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tujuan` varchar(225) NOT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` enum('diproses','disetujui','ditolak','') NOT NULL,
  `pesan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`id_proses`, `id_ruang`, `username`, `tanggal_pinjam`, `tujuan`, `mulai`, `selesai`, `file`, `status`, `pesan`) VALUES
(23, 'R.5.01', 'yuji', '2023-12-14 15:50:13', 'hmti', '2023-12-14 17:50:00', '2023-12-14 20:50:00', NULL, 'ditolak', 'belum upload surat'),
(24, 'R.5.01', 'yuji', '2023-12-15 00:51:17', 'hmti', '2023-12-29 05:49:00', '2023-12-29 06:49:00', '24-yuji.pdf', 'disetujui', ''),
(25, 'R.5.02', 'yuji', '2023-12-15 00:59:16', 'yuuu', '2023-12-29 05:49:00', '2023-12-29 06:49:00', NULL, 'diproses', NULL),
(26, 'R.5.01', 'yuji', '2023-12-16 14:35:18', 'buat belajar', '2023-12-16 00:00:00', '2023-12-16 00:00:00', NULL, 'ditolak', 'gaboleee'),
(27, 'R.5.01', 'yuji', '2023-12-16 16:28:03', 'aaa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'diproses', NULL),
(28, 'LAI1', 'yuji', '2023-12-16 16:33:00', 'a', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'diproses', NULL);

--
-- Triggers `proses`
--
DELIMITER $$
CREATE TRIGGER `acc_admin` AFTER UPDATE ON `proses` FOR EACH ROW BEGIN
	DECLARE hari_enum VARCHAR(20);
	IF OLD.status = 'diproses' AND NEW.status = 'disetujui'
    THEN
        CASE DAYOFWEEK(NEW.mulai)
            WHEN 1 THEN SET hari_enum := 'minggu';
            WHEN 2 THEN SET hari_enum := 'senin';
            WHEN 3 THEN SET hari_enum := 'selasa';
            WHEN 4 THEN SET hari_enum := 'rabu';
            WHEN 5 THEN SET hari_enum := 'kamis';
            WHEN 6 THEN SET hari_enum := 'jumat';
            WHEN 7 THEN SET hari_enum := 'sabtu';
        END CASE;
    
    	INSERT INTO jadwal (id_ruang, jenis_kegiatan, tgl_mulai, tgl_selesai, hari, waktu_mulai, waktu_selesai)
        VALUES (NEW.id_ruang, NEW.tujuan, DATE(NEW.mulai), DATE(NEW.selesai), hari_enum, TIME(NEW.mulai), TIME(NEW.selesai));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `proses_ruang`
-- (See below for the actual view)
--
CREATE TABLE `proses_ruang` (
`id_ruang` varchar(10)
,`nama_ruang` varchar(50)
,`id_proses` int(11)
,`username` varchar(100)
,`lantai` enum('5','6','7','8')
,`jenis_ruang` varchar(20)
,`kapasitas` int(100)
,`tanggal_pinjam` datetime
,`tujuan` varchar(225)
,`file` varchar(255)
,`status` enum('diproses','disetujui','ditolak','')
,`pesan` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(10) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `lantai` enum('5','6','7','8') NOT NULL,
  `jenis_ruang` varchar(20) NOT NULL,
  `kapasitas` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `lantai`, `jenis_ruang`, `kapasitas`) VALUES
('LAI1', 'Lab Kecerdasan Buatan 1', '5', 'Praktikum', 35),
('LSI3', 'Lab Sistem Informasi 3', '5', 'Praktikum', 30),
('R.5.01', 'Ruang Kelas Teori edit', '5', 'Teori', 60),
('R.5.02', 'Ruang Kelas Teori 2', '5', 'Teori', 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `tipe` enum('dosen','mahasiswa','admin','kajur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `salt`, `tipe`) VALUES
('admin1', '$2y$10$N3Zq/74FYsHJ9triAUIftegfqGxQHc5rfIXsJhIuNGje.UPbZ9PlC', '22897a6963af7c6b36db472dd8698480', 'admin'),
('ayu', '$2y$10$RdayurOp8rQ8eaqlDtpyO.YdgX.DT91W7YVI7Xw/R7LOW0eVaOuh.', '5a2966b5587f8b3b9ea78f4c5bb971f3', 'mahasiswa'),
('Rosa', '$2y$10$UWTj6EQ9xIntO3XEMUYTjeDekOjLxQXy/3ZssncVhCi15tig4o3Pe', '3583e7bd951773790c47b333b3934810', 'dosen'),
('unggul', '$2y$10$lpI7/IWTrcyPxwPHA9ActuTPCGDXMLx3CJwyHbk4OYVrgbPo5MnFa', '29553bb7f266c95aab9a228ef6cf0d2a', 'dosen'),
('yuji', '$2y$10$elRNWVrNBhFuxf5FSw5d/eB2r8nujTB67/dwJkOPppfZig4FiS2.m', 'cad1ebb55bb739ded866053d05e8806d', 'mahasiswa'),
('yuma ', '$2y$10$N03sAUafHH7aFLKYqTUVrOTOj0ljxIqaS6LGvwr5IOpDvdhG.oS7a', '49fc45860ff24933e648452c364368c2', 'mahasiswa');

-- --------------------------------------------------------

--
-- Structure for view `jadwal_ruang`
--
DROP TABLE IF EXISTS `jadwal_ruang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jadwal_ruang`  AS SELECT `r`.`id_ruang` AS `id_ruang`, `r`.`nama_ruang` AS `nama_ruang`, `r`.`lantai` AS `lantai`, `r`.`jenis_ruang` AS `jenis_ruang`, `r`.`kapasitas` AS `kapasitas`, `j`.`jenis_kegiatan` AS `jenis_kegiatan`, `j`.`keterangan` AS `keterangan`, `j`.`hari` AS `hari` FROM (`jadwal` `j` join `ruang` `r` on(`j`.`id_ruang` = `r`.`id_ruang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `proses_ruang`
--
DROP TABLE IF EXISTS `proses_ruang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proses_ruang`  AS SELECT `r`.`id_ruang` AS `id_ruang`, `r`.`nama_ruang` AS `nama_ruang`, `p`.`id_proses` AS `id_proses`, `p`.`username` AS `username`, `r`.`lantai` AS `lantai`, `r`.`jenis_ruang` AS `jenis_ruang`, `r`.`kapasitas` AS `kapasitas`, `p`.`tanggal_pinjam` AS `tanggal_pinjam`, `p`.`tujuan` AS `tujuan`, `p`.`file` AS `file`, `p`.`status` AS `status`, `p`.`pesan` AS `pesan` FROM (`proses` `p` join `ruang` `r` on(`p`.`id_ruang` = `r`.`id_ruang`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `userAdmin` (`username`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `userDsn` (`username`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `ruangJadwal` (`id_ruang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `userMhs` (`username`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_proses`),
  ADD KEY `ruangProses` (`id_ruang`),
  ADD KEY `userProses` (`username`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `userAdmin` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `userDsn` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `ruangJadwal` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `userMhs` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `ruangProses` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userProses` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
