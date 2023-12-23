-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 01:46 AM
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
(8, '19810705200', 'Ahmadi Yuli Ananta, ST', 'dosen', 'L', '085749379804', 'D-IV TI', 'Ahmadi Yuli Ananta, ST'),
(9, '19810705209', 'Dika Rizky Yulianto,S.Kom, M.Kom', 'dosen', 'L', '085478623122', 'D-IV TI', 'Dika Rizky Yulianto,S.Kom, M.Kom'),
(10, '19810705321', 'Endah Septa Sintya, S.Pd., M.Kom', 'dosen', 'P', '085724387279', 'D-IV TI', 'Endah Septa Sintya, S.Pd., M.Kom'),
(11, '19810705789', 'Ahmadi Yuli Ananta,M.M.', 'dosen', 'L', '095201257102', 'D-IV TI', 'Ahmadi Yuli Ananta,M.M.'),
(12, '19810705007', 'Muhammada Unggul Pamenang,S.ST, M.T', 'dosen', 'L', '087765432230', 'D-IV TI', 'Muhammada Unggul Pamenang,S.ST, M.T'),
(13, '19810705209', 'Kadek Suarjuna Batubulan, S.Kom., M.T.', 'dosen', 'L', '082234561790', 'D-IV TI', 'Kadek Suarjuna Batubulan, S.Kom., M.T.'),
(14, '19810705211', 'Dodit Suprianto, S.Kom., M.T.', 'dosen', 'L', '082667777156', 'D-IV TI', 'Dodit Suprianto, S.Kom., M.T.'),
(15, '19810705789', 'Anugrah Nur Rahmanto, S.Sn., M.Ds.', 'dosen', 'L', '082331346277', 'D-IV TI', 'Anugrah Nur Rahmanto, S.Sn., M.Ds.'),
(16, '1234567', 'dosen', 'dosen', 'L', '0987654321', 'DI-IV SIB', 'dosen');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_ruang`, `jenis_kegiatan`, `tgl_mulai`, `tgl_selesai`, `hari`, `keterangan`, `status`) VALUES
(51, 'LPY1', 'KBM', '2023-12-18', '2023-12-24', 'senin', 'Matematika', 'tersedia'),
(52, 'LPY1', 'KBM', '2023-12-25', '2023-12-31', 'senin', 'Matematika', 'kbm'),
(53, 'LPY1', 'KBM', '2024-01-01', '2024-01-07', 'senin', 'Matematika', 'tersedia'),
(54, 'LSI2', 'KBM', '2023-12-18', '2023-12-24', 'selasa', 'Desain Pemrograman Web', 'tersedia'),
(55, 'LSI2', 'KBM', '2023-12-25', '2023-12-31', 'selasa', 'Desain Pemrograman Web', 'tersedia'),
(56, 'LSI2', 'KBM', '2024-01-01', '2024-01-07', 'selasa', 'Desain Pemrograman Web', 'tersedia'),
(57, 'RT05', 'KBM', '2023-12-18', '2023-12-24', 'rabu', 'Bahasa Inggris', 'tersedia'),
(58, 'RT05', 'KBM', '2023-12-25', '2023-12-31', 'rabu', 'Bahasa Inggris', 'tersedia'),
(59, 'RT05', 'KBM', '2024-01-01', '2024-01-07', 'rabu', 'Bahasa Inggris', 'tersedia'),
(60, 'RT01', 'KBM', '2023-12-18', '2023-12-24', 'kamis', 'Manajemen Proyek', 'tersedia'),
(61, 'RT01', 'KBM', '2023-12-25', '2023-12-31', 'kamis', 'Manajemen Proyek', 'tersedia'),
(62, 'RT01', 'KBM', '2024-01-01', '2024-01-07', 'kamis', 'Manajemen Proyek', 'tersedia'),
(63, 'LSI1', 'KBM', '2023-12-18', '2023-12-24', 'jumat', 'Artificial Intelligence', 'tersedia'),
(64, 'LSI1', 'KBM', '2023-12-25', '2023-12-31', 'jumat', 'Artificial Intelligence', 'tersedia'),
(65, 'LSI1', 'KBM', '2024-01-01', '2024-01-07', 'jumat', 'Artificial Intelligence', 'tersedia'),
(66, 'LAI2', 'KBM', '2023-12-18', '2023-12-24', 'senin', 'Basis Data Lanjut', 'tersedia'),
(67, 'LAI2', 'KBM', '2023-12-25', '2023-12-31', 'senin', 'Basis Data Lanjut', 'kbm'),
(68, 'LAI2', 'KBM', '2024-01-01', '2023-12-31', 'senin', 'Basis Data Lanjut', 'tersedia'),
(69, 'RT02', 'KBM', '2023-12-18', '2023-12-24', 'selasa', 'Agama', 'tersedia'),
(70, 'RT02', 'KBM', '2023-12-25', '2023-12-31', 'selasa', 'Agama', 'tersedia'),
(71, 'RT02', 'KBM', '2024-01-01', '2024-01-07', 'selasa', 'Agama', 'tersedia'),
(72, 'LSI1', 'KBM', '2023-12-18', '2023-12-24', 'kamis', 'Critical Thingking', 'tersedia'),
(73, 'LSI1', 'KBM', '2023-12-25', '2023-12-31', 'kamis', 'Critical Thingking', 'tersedia'),
(74, 'LSI1', 'KBM', '2024-01-01', '2024-01-07', 'kamis', 'Critical Thingking', 'tersedia'),
(75, 'LPY2', 'KBM', '2023-12-18', '2023-12-24', 'jumat', 'Pemrograman Berbasis Objek', 'tersedia'),
(76, 'LPY2', 'KBM', '2023-12-25', '2023-12-31', 'jumat', 'Pemrograman Berbasis Objek', 'tersedia'),
(77, 'LPY2', 'KBM', '2024-01-01', '2024-01-07', 'jumat', 'Pemrograman Berbasis Objek', 'tersedia'),
(78, 'LKJ3', 'KBM', '2023-12-18', '2023-12-24', 'rabu', 'Dasar Pemrograman', 'tersedia'),
(79, 'LKJ3', 'KBM', '2023-12-18', '2023-12-24', 'rabu', 'Dasar Pemrograman', 'tersedia'),
(80, 'LKJ3', 'KBM', '2024-01-01', '2024-01-07', 'rabu', 'Dasar Pemrograman', 'tersedia'),
(81, 'LIG1', 'KBM', '2023-12-18', '2023-12-24', 'senin', 'Praktikum Algoritma Struktur Data', 'tersedia'),
(82, 'LIG1', 'KBM', '2023-12-25', '2023-12-31', 'senin', 'Praktkum Algoritma Struktur Data', 'kbm'),
(83, 'LIG1', 'KBM', '2024-01-01', '2024-01-07', 'senin', 'Praktkum Algoritma Struktur Data', 'tersedia'),
(84, 'RT09', 'KBM', '2023-12-18', '2023-12-24', 'kamis', 'Sistem Manajemen ', 'tersedia'),
(85, 'RT09', 'KBM', '2023-12-25', '2023-12-31', 'kamis', 'Sistem Manajeman', 'tersedia'),
(86, 'LIG1', 'KBM', '2024-01-01', '2024-01-07', 'kamis', 'Sistem Manajemen', 'tersedia'),
(88, 'RPL8', 'KBM', '2023-12-25', '2023-12-31', 'jumat', 'Manajemen Proyek', 'tersedia'),
(89, 'RPL8', 'KBM', '2024-01-01', '2024-01-07', 'jumat', 'Manajemen Proyek', 'tersedia'),
(90, 'RPL8', 'KBM', '2024-01-01', '2024-01-07', 'jumat', 'Manajemen Proyek', 'tersedia'),
(91, 'RT09', 'KBM', '2024-01-01', '2024-01-07', 'kamis', 'Sistem Manajemen', 'tersedia'),
(92, 'RT07', 'KBM', '2023-12-18', '2023-12-24', 'jumat', 'Pancasila', 'tersedia'),
(93, 'RT07', 'KBM', '2023-12-25', '2023-12-31', 'jumat', 'Pancasila', 'tersedia'),
(94, 'RT07', 'KBM', '2024-01-01', '2024-01-07', 'jumat', 'Pancasila', 'tersedia'),
(95, 'RPL5', 'KBM', '2023-12-18', '2023-12-24', 'senin', 'Basis Data', 'tersedia'),
(96, 'RPL5', 'KBM', '2023-12-25', '2023-12-31', 'senin', 'Basis Data', 'kbm'),
(97, 'RPL5', 'KBM', '2024-01-01', '2024-01-07', 'senin', 'Basis Data', 'tersedia'),
(98, 'RT06', 'KBM', '2023-12-18', '2023-12-24', 'selasa', 'Ilmu Komunikasi', 'tersedia'),
(99, 'RT06', 'KBM', '2023-12-25', '2023-12-31', 'selasa', 'Ilmu Komunikasi', 'tersedia'),
(100, 'RT06', 'KBM', '2024-01-01', '2024-01-07', 'selasa', 'Ilmu Komunikasi', 'tersedia'),
(101, 'RT04', 'KBM', '2023-12-18', '2023-12-24', 'rabu', 'Sistem Operasi', 'tersedia'),
(102, 'RT04', 'KBM', '2023-12-25', '2023-12-31', 'rabu', 'Sistem Operasi', 'tersedia'),
(103, 'RT04', 'KBM', '2024-01-01', '2024-01-07', 'rabu', 'Sistem Operasi', 'tersedia'),
(104, 'LSI3', 'KBM', '2023-12-18', '2023-12-24', 'kamis', 'Praktikum Basis Data', 'tersedia'),
(105, 'LSI3', 'KBM', '2023-12-25', '2023-12-31', 'kamis', 'Praktikum Basis Data', 'tersedia'),
(106, 'LSI3', 'KBM', '2024-01-01', '2024-01-07', 'kamis', 'Praktikum Basis Data', 'tersedia'),
(107, 'LPY3', 'KBM', '2023-12-18', '2023-12-24', 'jumat', 'Praktikum Dasar Pemrograman', 'tersedia'),
(108, 'LPY3', 'KBM', '2023-12-25', '2023-12-31', 'jumat', 'Praktikum Dasar Pemrograman', 'tersedia'),
(109, 'LPY3', 'KBM', '2024-01-01', '2024-01-07', 'jumat', 'Praktikum Dasar Pemrograman', 'tersedia'),
(110, 'LPY4', 'KBM', '2023-12-18', '2023-12-24', 'senin', 'Konsep Teknologi Informasi', 'tersedia'),
(111, 'LPY4', 'KBM', '2023-12-25', '2023-12-31', 'senin', 'Konsep Teknologi Informasi', 'kbm'),
(112, 'LPY4', 'KBM', '2024-01-01', '2024-01-07', 'senin', 'Konsep Teknologi Informasi', 'tersedia'),
(113, 'RT03', 'KBM', '2023-12-18', '2023-12-24', 'selasa', 'Keselamatan dan Kesehatan Kerja', 'tersedia'),
(114, 'RT03', 'KBM', '2023-12-25', '2023-12-31', 'selasa', 'Keselamatan dan Kesehatan Kerja', 'tersedia'),
(115, 'RT03', 'KBM', '2024-01-01', '2024-01-07', 'selasa', 'Keselamatan dan Kesehatan Kerja', 'tersedia'),
(116, 'LPY1', 'Eksternal', '2023-12-23', '2023-12-23', 'sabtu', 'hmti', 'diproses'),
(117, 'LPY1', 'Eksternal', '2023-12-22', '2023-12-22', 'jumat', 'hmti', 'diproses');

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
,`arah` enum('Timur','Barat')
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `jenis_kelamin`, `no_tlp`, `kelas`, `prodi`, `username`) VALUES
(37, '2112', 'coba', 'L', '0098764', '2D', 'D-IV TI', 'coba'),
(44, '2241720178', 'Yusriyah Firjatullah', 'L', '081996719875', '2D', 'D-IV TI', 'Yusriyah Firjatullah'),
(45, '2241720194', 'Yuma Rakha Samodra Sikayo', 'L', '085749379804', '2D', 'D-IV TI', 'Yuma Rakha Samodra Sikayo'),
(46, '2241720063', 'Yonatan Efrassetyo', 'L', '082268608092', '2D', 'D-IV TI', 'Yonatan Efrassetyo'),
(47, '2241720026', 'Sofisugiharto Zaini', 'L', '082235177689', '2D', 'D-IV TI', 'Sofisugiharto Zaini'),
(48, '2241720039', 'Riska Kurnia Triwulandari', 'P', '085607179754', '2D', 'D-IV TI', 'Riska Kurnia Triwulandari'),
(49, '2241720132', 'Putri Ayu Aliciawati', 'P', '082332726081', '2D', 'D-IV TI', 'Putri Ayu Aliciawati'),
(50, '2241720140', 'Pascalis Dewangga Sandilaksono', 'L', '085945613214', '2D', 'D-IV TI', 'Pascalis Dewangga Sandilaksono'),
(51, '2241720022', 'Muhammad Nurul Mustofa', 'L', '085161644408', '2D', 'D-IV TI', 'Muhammad Nurul Mustofa'),
(52, '2241720034', 'Muhammad Ariel Saputra', 'L', '081290103716', '2D', 'D-IV TI', 'Muhammad Ariel Saputra'),
(53, '2241720189', 'Muhammad Naufal Syahandra', 'L', '089533235860', '2D', 'D-IV TI', 'Muhammad Naufal Syahandra'),
(54, '2241720164', 'Mohammad Alimul Adin Pramono', 'L', '082229934242', '2D', 'D-IV TI', 'Mohammad Alimul Adin Pramono'),
(55, '2241720010', 'Maulita Yasmin Nadila', 'P', '081331337926', '2D', 'D-IV TI', 'Maulita Yasmin Nadila'),
(56, '2241720199', 'Maulana Arya Putra Nugraha', 'L', '082233617717', '2D', 'D-IV TI', 'Maulana Arya Putra Nugraha'),
(57, '2241720209', 'Filla Ramadhani Utomo', 'L', '085536319267', '2D', 'D-IV TI', 'Filla Ramadhani Utomo'),
(58, '2241720229', 'Febiola Lidya  Sianturi', 'P', '081333277487', '2D', 'D-IV TI', 'Febiola Lidya  Sianturi'),
(59, '2241720111', 'Dido Imam Padmanegara', 'L', '08990341945', '2D', 'D-IV TI', 'Dido Imam Padmanegara'),
(60, '2241720182', 'Dennis Parulian Panjaitan', 'L', '081333487717', '2D', 'D-IV TI', 'Dennis Parulian Panjaitan'),
(61, '2241720068', 'Cyndu Fathur Rohman', 'L', '082229351766', '2D', 'D-IV TI', 'Cyndu Fathur Rohman'),
(62, '2141720195', 'Celesta Rio Daffa Daniswara', 'L', '082299859545', '2D', 'D-IV TI', 'Celesta Rio Daffa Daniswara'),
(63, '2241720019', 'Brilyan Satria Wahyuda', 'L', '081806948891', '2D', 'D-IV TI', 'Brilyan Satria Wahyuda'),
(64, '2241720225', 'Bagus Arnovario Wibowo', 'L', '089580300020', '2D', 'D-IV TI', 'Bagus Arnovario Wibowo'),
(65, '2241720047', 'Aulia Firda Syafira', 'P', '082231221972', '2D', 'D-IV TI', 'Aulia Firda Syafira'),
(66, '2241720190', 'Athiyan Aqil Muhammad', 'L', '088103615310', '2D', 'D-IV TI', 'Athiyan Aqil Muhammad'),
(67, '2241720236', 'Asti Nurin Hidayanti', 'P', '082331346277', '2D', 'D-IV TI', 'Asti Nurin Hidayanti'),
(68, '2241720083', 'Ahmed Fathir Syafaat', 'L', '082110992160', '2D', 'D-IV TI', 'Ahmed Fathir Syafaat'),
(69, '2241720088', 'Abdul Aziz ', 'L', '085158313133', '2D', 'D-IV TI', 'Abdul Aziz ');

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
  `instansi` varchar(100) NOT NULL,
  `tgl_dipakai` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` enum('diproses','disetujui','ditolak','') NOT NULL,
  `pesan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`id_proses`, `id_ruang`, `id_jadwal`, `username`, `tanggal_pinjam`, `tujuan`, `instansi`, `tgl_dipakai`, `file`, `status`, `pesan`) VALUES
(12, 'LPY1', 51, 'Muhammada Unggul Pamenang,S.ST, M.T', '2023-12-22 07:24:37', 'hmti', 'Dosen', '2023-12-23', NULL, 'diproses', NULL),
(13, 'LPY1', 51, 'Yusriyah Firjatullah', '2023-12-22 07:27:09', 'hmti', 's', '2023-12-22', NULL, 'diproses', NULL);

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
        
    	UPDATE jadwal as j SET j.status='dibooking' WHERE j.tgl_mulai = NEW.tgl_dipakai AND j.tgl_selesai = NEW.tgl_dipakai AND j.id_ruang = NEW.id_ruang AND j.jenis_kegiatan != 'KBM';
        
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `proses_admin` AFTER INSERT ON `proses` FOR EACH ROW BEGIN
	DECLARE hari_enum VARCHAR(20);
	IF NEW.status = 'diproses'
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
        VALUES (NEW.id_ruang, 'Eksternal', DATE(NEW.tgl_dipakai), DATE(NEW.tgl_dipakai), hari_enum, NEW.tujuan, 'diproses');
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tolak_admin` AFTER UPDATE ON `proses` FOR EACH ROW BEGIN
	DECLARE hari_enum VARCHAR(20);
	IF OLD.status = 'diproses' AND NEW.status = 'ditolak'
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
        
        DELETE FROM jadwal WHERE jadwal.tgl_mulai = NEW.tgl_dipakai AND jadwal.tgl_selesai = NEW.tgl_dipakai AND jadwal.id_ruang = NEW.id_ruang AND jadwal.jenis_kegiatan != 'KBM';
       
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
,`instansi` varchar(100)
,`tgl_dipakai` date
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
  `kapasitas` int(100) NOT NULL,
  `arah` enum('Timur','Barat') NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `lantai`, `jenis_ruang`, `kapasitas`, `arah`, `gambar`) VALUES
('LAI2', 'Lab Kecerdasan Buatan 2', '8', 'Praktikum', 30, 'Barat', 'LAI2.jpg'),
('LIG1', 'Lab Visual Komputer 1', '7', 'Praktikum', 30, 'Timur', 'LIG1.jpg'),
('LKJ3', 'Lab Komputasi Jaringan 3', '7', 'Praktikum', 30, 'Timur', 'LKJ3.jpg'),
('LPY1', 'Lab Proyek 1', '5', 'Praktikum', 30, 'Barat', 'LPY1.jpg'),
('LPY2', 'Lab Proyek 2', '6', 'Praktikum', 30, 'Timur', 'LPY2.jpg'),
('LPY3', 'Lab Proyek 3', '6', 'Praktikum', 30, 'Timur', 'LPY3.jpg'),
('LPY4', 'Lab Proyek 4', '7', 'Praktikum', 30, 'Timur', 'LPY4.jpg'),
('LSI1', 'Lab Sistem Informasi 1', '6', 'Praktikum', 30, 'Timur', 'LSI1.jpg'),
('LSI2', 'Lab Sistem Informasi 2', '6', 'Praktikum', 30, 'Timur', 'LSI2.jpg'),
('LSI3', 'Lab Sistem Informasi 3', '6', 'Praktikum', 30, 'Timur', 'LSI3.jpg'),
('RPL5', 'Lab Pemrograman 5', '7', 'Praktikum', 30, 'Barat', 'RPL5.jpg'),
('RPL8', 'Lab Pemrograman 8', '7', 'Praktikum', 30, 'Timur', 'RPL8.jpg'),
('RT01', 'Ruang Kelas Teori 1', '5', 'Teori', 30, 'Barat', 'RT01.jpg'),
('RT02', 'Ruang Kelas Teori 2', '5', 'Teori', 30, 'Barat', 'RT02.jpg'),
('RT03', 'Ruang Kelas Teori 3', '5', 'Teori', 60, 'Barat', 'RT03.jpg'),
('RT04', 'Ruang Kelas Teori 4', '5', 'Teori', 30, 'Barat', 'RT04.jpg'),
('RT05', 'Ruang Kelas Teori 5', '5', 'Teori', 60, 'Barat', 'RT05.jpg'),
('RT06', 'Ruang Kelas Teori 6', '5', 'Teori', 30, 'Barat', 'RT06.jpg'),
('RT07', 'Ruang Kelas Teori 7', '5', 'Teori', 60, 'Barat', 'RT07.jpg'),
('RT09', 'Ruang Kelas Teori 9', '8', 'Teori', 30, 'Barat', 'RT09.jpg'),
('RT11', 'Ruang Studio 2', '8', 'Praktikum', 30, 'Barat', 'RT11.jpg'),
('RT12', 'Ruang Studio 1', '8', 'Praktikum', 30, 'Barat', 'RT12.jpg');

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
('Abdul Aziz ', '$2y$10$fy4lAhmiFtJL.0bDUd2ZbeC.kwMtaZSY4e1MyIybwUpqYooia7Rzy', 'fbaa9525bfc44e565d2e0ffac3f12505', 'mahasiswa'),
('admin1', '$2y$10$N3Zq/74FYsHJ9triAUIftegfqGxQHc5rfIXsJhIuNGje.UPbZ9PlC', '22897a6963af7c6b36db472dd8698480', 'admin'),
('Ahmadi Yuli Ananta, ST', '$2y$10$OhgkDuXnlBXnXf2BHAoaVuqpuMUKRwhL2NqflU/oTH/jYgWWQq2gi', 'eebb775cc1ecfaf27a201e155aca50a4', 'dosen'),
('Ahmadi Yuli Ananta,M.M.', '$2y$10$Ui.oQ8xWhcQWVKokIhRApuAcOrObghKOYZucmp3ItWBNMMn/TsSE2', 'e47431aaded09d238f34962dfebb343f', 'dosen'),
('Ahmed Fathir Syafaat', '$2y$10$YG/omD7ys5RW21s8XHz7TOkzUHUjJEpWJMIbY2LSScxMs2FCTOhMm', '90d507be81c446b626b66565e998a824', 'mahasiswa'),
('Anugrah Nur Rahmanto, S.Sn., M.Ds.', '$2y$10$LtildzSVQ.GMudhlk5qp2O/P8M8JdpNL.Wj4.Pmt4XvSEpMnykzxq', '0896ceaef8fd65e8a72c49ca502c4ae3', 'dosen'),
('Asti Nurin Hidayanti', '$2y$10$L0N1mD6S8eIhgq2UjAmRd.M02vScvv76a83bQTGLcL/W2vt3P3UQ6', '1bfb09b68a5ecc599a2710026d90fd8e', 'mahasiswa'),
('Athiyan Aqil Muhammad', '$2y$10$QqXkb4CJq65A9tm49JAlt.QNqsef7t17KkAsaXUDlrBA1y1kqqr0a', '1ce8509df7f93ba9e79e2c64c94d5611', 'mahasiswa'),
('Aulia Firda Syafira', '$2y$10$j9FdidIMo0HMjGlPM6vDzOHwuuwbHc6LIgo21z2c1WoaXADnDVg9G', '431db75fc30d88f0f9e541eff847aa73', 'mahasiswa'),
('Bagus Arnovario Wibowo', '$2y$10$ypDbxaMZ18WeT9U/qde3POpBXxeann1c2Xlcqyq.CF/alyg8OWOQu', '900de804a9ed1dfe845895e0b8168785', 'mahasiswa'),
('Brilyan Satria Wahyuda', '$2y$10$tT0ngBLqz/ztUkRVWx9YNufSbNr47DfgMVZMw4at5hUH42KMxwedG', '5f6784e142022093ddcf6eddcd1cdebe', 'mahasiswa'),
('Celesta Rio Daffa Daniswara', '$2y$10$DUHQ8z2uCWjFvllf6LfP0OfcZAyjoaJk0mlZgYMvLljNPJKjLmDCq', 'a78f49ec5162464b2161f98b1fe6152e', 'mahasiswa'),
('coba', '$2y$10$elRNWVrNBhFuxf5FSw5d/eB2r8nujTB67/dwJkOPppfZig4FiS2.m', 'cad1ebb55bb739ded866053d05e8806d', 'mahasiswa'),
('Cyndu Fathur Rohman', '$2y$10$OVJ665cmjIVRMs.Ko4LYROcDAZ0wxy2bGig06spAN0aDaYhxIKGOS', '4da9233ee34ca449736b4f2aa284c6d6', 'mahasiswa'),
('Dennis Parulian Panjaitan', '$2y$10$W/8rNM1ie6qwkJb/NzIx.ugoodx6NRMf80SJsVrdoYjUcm5DILU6e', '9876a935366a6208d4f41de115c25ec5', 'mahasiswa'),
('Dido Imam Padmanegara', '$2y$10$bpqhtxjzWr04r63wIAEbA.FvT3jXd.Cwj0Irb5PQ/TP76MgXjleMy', '64e5bf79c6eeb7395a0d01c094e9c559', 'mahasiswa'),
('Dika Rizky Yulianto,S.Kom, M.Kom', '$2y$10$nEXjUotObGJZ275ynziVSOrBFrkwod/OfJ/LCLNtdzdleQ6Epa9MW', '195a11550af159eced3a501e14e1d062', 'dosen'),
('Dodit Suprianto, S.Kom., M.T.', '$2y$10$DL7bwDHTO2F.FAUhkM.XoOIUC1ezUVrC0sF1Na40znnxV9qm.JrkO', '048e00bf824b35395c7569722b3695a1', 'dosen'),
('dosen', '$2y$10$GPt2aVue/X31rQMrHLmjY.4SFMiTsjC6nJYoXg5UTn9o25ElwKnPm', 'e6b568e85df986fbe062d58467a0d1fd', 'dosen'),
('Endah Septa Sintya, S.Pd., M.Kom', '$2y$10$905hfHQCo2Ab8/0W7V62zetA9Zol1b5FltA7y27nmWuJfEK9ymC96', '7608cf3221278d0f78ea19b7585a15a8', 'dosen'),
('Febiola Lidya  Sianturi', '$2y$10$DLAPR.0/bTBS6vpqBJaYvuwZlCThWpAe2HN9ILD8XM3U..swZHfUy', '4b1e140cbe2af10125bf11a3ce585289', 'mahasiswa'),
('Filla Ramadhani Utomo', '$2y$10$Gv49sov5vY5PXM4PVPwNZeWRXO2CFGCmumSBRJYHG4n/NKdpcRws.', 'd5295852aeaffd119f94b23f800317dc', 'mahasiswa'),
('Kadek Suarjuna Batubulan, S.Kom., M.T.', '$2y$10$RAdCY4P4Ods1VasBhdLS..TrlWIW6Ke9sBsFq/XUkqSWqUNfcnZTm', '865fb0157492fe5e04e3f2449fb7b35e', 'dosen'),
('Maulana Arya Putra Nugraha', '$2y$10$s/0XQG0axJzbY4AaLuHETOjH1aAEgN6Wi1KacoeZPe9xINl8alY2a', '562f46a4624d1947defc4540730f484c', 'mahasiswa'),
('Maulita Yasmin Nadila', '$2y$10$4CNkfy7zcBWWWnzA4MMiyuRKsIXNc6m6IK9DS61xgZ/L7Y7sTis2i', 'e987d3701be6232fc32b96b1a9508668', 'mahasiswa'),
('Mohammad Alimul Adin Pramono', '$2y$10$JjZ93wUznCWoBoOeaay/4O8geXq6UUDdo8MX1lS2MOgF6mtNdbw0e', '122f946d98bf30f84eecb7f4cebf81c6', 'mahasiswa'),
('Muhammad Ariel Saputra', '$2y$10$mamhN0zu2hCrH6QGp88WZedROw3eK5PZSolIjCUBX2e4PDKYP9qdy', '22335f9d18f456c728045430a2326d24', 'mahasiswa'),
('Muhammad Naufal Syahandra', '$2y$10$kz41FFH4qfd2HrfIAjqKZ.YXlWUR1c4R77DUQ7tl3MX6OCs.2.NtO', '556dee99d9980a7df32ea75e0ddbe9c7', 'mahasiswa'),
('Muhammad Nurul Mustofa', '$2y$10$w/IAVqmEoUB6WNE8SjxSvOj2.Xy8PZ58uoaAnSQKZ3pWgsRmvWfM2', '42dc54e358daf55953ee4316a7e1685d', 'mahasiswa'),
('Muhammada Unggul Pamenang,S.ST, M.T', '$2y$10$lZpQ004XT8ieUF05Enl/KeXKQ27q0Z9pmc1yErIz4rVN/9WmgztgW', 'bdecc8f05913aefa87c0e990a5fc5c39', 'dosen'),
('Pascalis Dewangga Sandilaksono', '$2y$10$cMhna/T.yMRYleFUbp08ieWZ6q3zryaEd5cuEUxJDOCqZYNK/CHyu', '5ccc6f4762c4f1962fb6847416eff9dd', 'mahasiswa'),
('Putri Ayu Aliciawati', '$2y$10$KDgcmtx/vrESFcIFng9xaeLsY1FTdV9.4oS4tUP2BLetuam//RwNC', '64397bf67556b9b45533ab1b774852fd', 'mahasiswa'),
('Riska Kurnia Triwulandari', '$2y$10$z9dX8176rTgQVvhodpf8YeOD4mo88e1AtX.IKB.0lNQyA4p6ITwPi', '559cad408888c98b4389431bb63f6e51', 'mahasiswa'),
('Sofisugiharto Zaini', '$2y$10$rahEVOopB1pd/L.zRo9.sulmq1290tyH4gdxIbKFbOufbv2dhWeki', 'b455a5796761a8227ee6c72a30ba6650', 'mahasiswa'),
('Yonatan Efrassetyo', '$2y$10$9u6CED/sr/UyN8vv3QV9IOIyiTHH9/ofqYosVkTbEr6J0FqrgWTrO', '722aed85de9f35b23eb67bcbc092b1c0', 'mahasiswa'),
('Yuma Rakha Samodra Sikayo', '$2y$10$gJbVqGzFXeYrZW6Kp6IeEunN5wSbQ.iSTwJuEz/NaH3vboR7yANIi', '47534ed3812ec2c0b1873a3f935de2d3', 'mahasiswa'),
('Yusriyah Firjatullah', '$2y$10$CNqSLCOpu.EDfpyUpYjmeeHISukMv/mbRQ8UQH8VkEXmZQi785PUa', 'cafe012d05464814435022e54637b9d2', 'mahasiswa');

-- --------------------------------------------------------

--
-- Structure for view `jadwal_ruang`
--
DROP TABLE IF EXISTS `jadwal_ruang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jadwal_ruang`  AS SELECT `r`.`id_ruang` AS `id_ruang`, `r`.`nama_ruang` AS `nama_ruang`, `r`.`lantai` AS `lantai`, `r`.`jenis_ruang` AS `jenis_ruang`, `r`.`kapasitas` AS `kapasitas`, `r`.`arah` AS `arah`, `j`.`id_jadwal` AS `id_jadwal`, `j`.`jenis_kegiatan` AS `jenis_kegiatan`, `j`.`keterangan` AS `keterangan`, `j`.`tgl_mulai` AS `tgl_mulai`, `j`.`tgl_selesai` AS `tgl_selesai`, `j`.`hari` AS `hari`, `j`.`status` AS `status` FROM (`jadwal` `j` join `ruang` `r` on(`j`.`id_ruang` = `r`.`id_ruang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `proses_ruang`
--
DROP TABLE IF EXISTS `proses_ruang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proses_ruang`  AS SELECT `p`.`id_ruang` AS `id_ruang`, `r`.`nama_ruang` AS `nama_ruang`, `p`.`id_proses` AS `id_proses`, `p`.`instansi` AS `instansi`, `p`.`tgl_dipakai` AS `tgl_dipakai`, `p`.`username` AS `username`, `r`.`lantai` AS `lantai`, `r`.`jenis_ruang` AS `jenis_ruang`, `r`.`kapasitas` AS `kapasitas`, `p`.`tanggal_pinjam` AS `tanggal_pinjam`, `p`.`tujuan` AS `tujuan`, `p`.`file` AS `file`, `p`.`status` AS `status`, `p`.`pesan` AS `pesan`, `p`.`id_jadwal` AS `id_jadwal` FROM ((`proses` `p` left join `ruang` `r` on(`p`.`id_ruang` = `r`.`id_ruang`)) left join `jadwal` `j` on(`p`.`id_ruang` = `j`.`id_jadwal`)) ;

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
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
