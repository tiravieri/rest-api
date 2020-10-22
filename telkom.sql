-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 02:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `logistik`
--

CREATE TABLE `logistik` (
  `kode_logistik` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logistik`
--

INSERT INTO `logistik` (`kode_logistik`, `nama`, `tipe`, `status`, `foto`) VALUES
(1, 'Laptop Asus', 'Elektronik', 'Tersedia', 'laptopasus.jpg'),
(2, 'Converter HDMI', 'Elektronik', 'Tersedia', 'converterhdmi.jpg'),
(3, 'Kursi Dosen', 'Mebel', 'Tersedia', 'kursi.jpg'),
(4, 'Kursi Mahasiswa', 'Mebel', 'Tersedia', 'kursimhs.png'),
(5, 'Lab Komputer Ruangan A010', 'Ruangan', 'Tersedia', 'labkom01.jpg'),
(6, 'Lab Komputer A020', 'Ruangan', 'Tersedia', 'labkom02.jpg'),
(7, 'Ruang Kelas B010', 'Ruangan', 'Tersedia', 'ruang010203.jpg'),
(8, 'Proyektor LG', 'Elektronik', 'Tersedia', 'proyektorLG.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `angkatan` varchar(255) NOT NULL,
  `alamat` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `password`, `nama`, `fakultas`, `program_studi`, `angkatan`, `alamat`) VALUES
(1301160465, 'asdkill', 'tira vieri', 'Informatika', 'S1 Informatika', '2016', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `noPeminjaman` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `kode_logistik` int(11) NOT NULL,
  `tgl_transaksi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`noPeminjaman`, `nim`, `kode_logistik`, `tgl_transaksi`, `status`, `kegiatan`, `tgl_pinjam`, `tgl_pengembalian`) VALUES
(1, 1301160465, 1, '0000-00-00', 'Diterima', 'Presentasi', '2020-10-16', '2020-10-22'),
(2, 1301160465, 6, '0000-00-00', 'Proses', 'Belajar', '2020-10-15', '2020-10-15'),
(3, 1301160465, 4, '15 Oct 2020', 'Ditolak', 'Belajar', '2020-10-15', '2020-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `nip` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`nip`, `password`, `nama`, `role`, `alamat`) VALUES
(1501160464, 'asdkill1', 'Dono', 'Karyawan', 'Bandung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logistik`
--
ALTER TABLE `logistik`
  ADD PRIMARY KEY (`kode_logistik`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`noPeminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logistik`
--
ALTER TABLE `logistik`
  MODIFY `kode_logistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `noPeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
