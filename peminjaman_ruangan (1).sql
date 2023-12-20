-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 07:14 PM
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
-- Database: `peminjaman_ruangan`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `keterangan` varchar(255) NOT NULL,
  `status` enum('tersedia','kbm','dibooking','diproses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_ruang`, `jenis_kegiatan`, `tgl_mulai`, `tgl_selesai`, `hari`, `keterangan`, `status`) VALUES
(2, 'LAI1', 'KBM', '2023-12-18', '2023-12-24', 'senin', 'Desain Pemrograman Web', 'tersedia'),
(16, 'LSI3', 'KBM', '2023-12-18', '2023-12-24', 'senin', 'manpro', 'tersedia'),
(19, 'LAI1', 'KBM', '2023-12-25', '2023-12-31', 'senin', 'Desain Pemrograman Web', 'tersedia'),
(21, 'LSI3', 'KBM', '2023-12-25', '2023-12-31', 'senin', 'manpro', 'tersedia'),
(22, 'R.5.02', 'KBM', '2023-12-18', '2023-12-24', 'senin', 'Artificial Intelligence', 'tersedia'),
(23, 'R.5.02', 'KBM', '2023-12-25', '2023-12-31', 'senin', 'Artificial Intelligence', 'tersedia'),
(24, 'LAI1', 'Eksternal', '2023-12-22', '2023-12-22', 'jumat', 'COBASEK', 'dibooking');

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
,`id_jadwal` int(11)
,`jenis_kegiatan` varchar(500)
,`keterangan` varchar(255)
,`tgl_mulai` date
,`tgl_selesai` date
,`hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu')
,`status` enum('tersedia','kbm','dibooking','diproses')
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `jenis_kelamin`, `no_tlp`, `kelas`, `prodi`, `username`) VALUES
(37, '2112', 'yuji', 'L', '0098764', '2D', 'D-IV TI', 'yuji'),
(38, '111', 'yuma ', 'L', '0000000', '2D', 'D-IV TI', 'yuma '),
(40, '1', 'ayu', 'P', '444', '1A', 'D-IV TI', 'ayu'),
(41, '12', 'as', 'L', '2', '1A', 'D-IV TI', 'as'),
(42, '666', 'sukuna', 'L', '0988634', '2D', 'D-IV TI', 'sukuna');

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_proses` int(11) NOT NULL,
  `id_ruang` varchar(10) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tujuan` varchar(225) NOT NULL,
  `tgl_dipakai` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` enum('diproses','disetujui','ditolak','') NOT NULL,
  `pesan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`id_proses`, `id_ruang`, `id_jadwal`, `username`, `tanggal_pinjam`, `tujuan`, `tgl_dipakai`, `file`, `status`, `pesan`) VALUES
(2, 'LAI1', 2, 'yuji', '2023-12-20 21:35:11', 'COBASEK', '2023-12-22', NULL, 'disetujui', ''),
(3, 'LAI1', 19, 'ayu', '2023-12-21 00:45:10', 'cobalagi', '2023-12-27', NULL, 'ditolak', 'gaboleh su');

--
-- Triggers `proses`
--
DELIMITER $$
CREATE TRIGGER `acc_admin` AFTER UPDATE ON `proses` FOR EACH ROW BEGIN
	DECLARE hari_enum VARCHAR(20);
	IF OLD.status = 'diproses' AND NEW.status = 'disetujui'
    THEN
        CASE DAYOFWEEK(NEW.tgl_dipakai)
            WHEN 1 THEN SET hari_enum := 'minggu';
            WHEN 2 THEN SET hari_enum := 'senin';
            WHEN 3 THEN SET hari_enum := 'selasa';
            WHEN 4 THEN SET hari_enum := 'rabu';
            WHEN 5 THEN SET hari_enum := 'kamis';
            WHEN 6 THEN SET hari_enum := 'jumat';
            WHEN 7 THEN SET hari_enum := 'sabtu';
        END CASE;
        
        UPDATE jadwal SET jadwal.status = 'tersedia' WHERE jadwal.id_jadwal = NEW.id_jadwal;
        
    	INSERT INTO jadwal (id_ruang, jenis_kegiatan, tgl_mulai, tgl_selesai, hari, keterangan, status)
        VALUES (NEW.id_ruang, 'Eksternal', DATE(NEW.tgl_dipakai), DATE(NEW.tgl_dipakai), hari_enum, NEW.tujuan, 'dibooking');
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
,`id_jadwal` int(11)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `salt`, `tipe`) VALUES
('admin1', '$2y$10$N3Zq/74FYsHJ9triAUIftegfqGxQHc5rfIXsJhIuNGje.UPbZ9PlC', '22897a6963af7c6b36db472dd8698480', 'admin'),
('as', '$2y$10$YTmmGjVofpwLZCVRi/tDm.hvdF5lBuD2Jq1LMSui/N40vm6JJoHIC', 'f5a228075165d1b512a9046320c105e2', 'mahasiswa'),
('ayu', '$2y$10$RdayurOp8rQ8eaqlDtpyO.YdgX.DT91W7YVI7Xw/R7LOW0eVaOuh.', '5a2966b5587f8b3b9ea78f4c5bb971f3', 'mahasiswa'),
('Rosa', '$2y$10$UWTj6EQ9xIntO3XEMUYTjeDekOjLxQXy/3ZssncVhCi15tig4o3Pe', '3583e7bd951773790c47b333b3934810', 'dosen'),
('sukuna', '$2y$10$TTNwd6z5xLDhbU82EuaDTuJGIkS/mhS.hdZofBX6Dn8pzGnMjwS2i', '0155e26a4fc46a40fd493b3e019d5fb8', 'mahasiswa'),
('unggul', '$2y$10$lpI7/IWTrcyPxwPHA9ActuTPCGDXMLx3CJwyHbk4OYVrgbPo5MnFa', '29553bb7f266c95aab9a228ef6cf0d2a', 'dosen'),
('yuji', '$2y$10$elRNWVrNBhFuxf5FSw5d/eB2r8nujTB67/dwJkOPppfZig4FiS2.m', 'cad1ebb55bb739ded866053d05e8806d', 'mahasiswa'),
('yuma ', '$2y$10$N03sAUafHH7aFLKYqTUVrOTOj0ljxIqaS6LGvwr5IOpDvdhG.oS7a', '49fc45860ff24933e648452c364368c2', 'mahasiswa');

-- --------------------------------------------------------

--
-- Structure for view `jadwal_ruang`
--
DROP TABLE IF EXISTS `jadwal_ruang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jadwal_ruang`  AS SELECT `r`.`id_ruang` AS `id_ruang`, `r`.`nama_ruang` AS `nama_ruang`, `r`.`lantai` AS `lantai`, `r`.`jenis_ruang` AS `jenis_ruang`, `r`.`kapasitas` AS `kapasitas`, `j`.`id_jadwal` AS `id_jadwal`, `j`.`jenis_kegiatan` AS `jenis_kegiatan`, `j`.`keterangan` AS `keterangan`, `j`.`tgl_mulai` AS `tgl_mulai`, `j`.`tgl_selesai` AS `tgl_selesai`, `j`.`hari` AS `hari`, `j`.`status` AS `status` FROM (`jadwal` `j` join `ruang` `r` on(`j`.`id_ruang` = `r`.`id_ruang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `proses_ruang`
--
DROP TABLE IF EXISTS `proses_ruang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proses_ruang`  AS SELECT `p`.`id_ruang` AS `id_ruang`, `r`.`nama_ruang` AS `nama_ruang`, `p`.`id_proses` AS `id_proses`, `p`.`username` AS `username`, `r`.`lantai` AS `lantai`, `r`.`jenis_ruang` AS `jenis_ruang`, `r`.`kapasitas` AS `kapasitas`, `p`.`tanggal_pinjam` AS `tanggal_pinjam`, `p`.`tujuan` AS `tujuan`, `p`.`file` AS `file`, `p`.`status` AS `status`, `p`.`pesan` AS `pesan`, `p`.`id_jadwal` AS `id_jadwal` FROM ((`proses` `p` left join `ruang` `r` on(`p`.`id_ruang` = `r`.`id_ruang`)) left join `jadwal` `j` on(`p`.`id_ruang` = `j`.`id_jadwal`)) ;

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
  ADD KEY `userProses` (`username`),
  ADD KEY `jadwalProses` (`id_jadwal`);

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
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `jadwalProses` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ruangProses` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userProses` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
