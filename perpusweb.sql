-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 08:27 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(4, 'admin', 'admin', 'admin', 'gambar_admin/Chrysanthemum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_anggota`
--

CREATE TABLE `data_anggota` (
  `id_anggota` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `ttl` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `no_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_anggota`
--

INSERT INTO `data_anggota` (`id_anggota`, `nama`, `jk`, `ttl`, `alamat`, `foto`, `no_id`) VALUES
(14, 'Ilham Makarim', 'L', 'Jepara ', 'Jepara', 'gambar_anggota/12341', ''),
(15, 'Safina Adriani', 'P', 'Yogyakarta, 20 Juni 1996', 'Yogyakarta', 'gambar_anggota/Deser', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_buku`
--

CREATE TABLE `data_buku` (
  `id_buku` int(5) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `th_terbit` varchar(4) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `jumlah_buku` int(2) NOT NULL,
  `lokasi` varchar(15) NOT NULL,
  `asal` varchar(15) NOT NULL,
  `tgl_input` varchar(20) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_buku`
--

INSERT INTO `data_buku` (`id_buku`, `judul`, `pengarang`, `th_terbit`, `penerbit`, `kategori`, `jumlah_buku`, `lokasi`, `asal`, `tgl_input`, `gambar`) VALUES
(1, 'Bikin mading lebih keren', 'Pramana Sukmajati', '2011', 'Info komputer', 'Teknologi', 10, 'Rak 1', 'P', '2016/12/12', ''),
(2, 'Kumpulan Senam dan artikel kes', 'Muslimah', '2011', 'Muslimah', 'Kesehatan', 0, 'rak 2', 'S', '2016/12/12', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `perlu1` varchar(15) NOT NULL,
  `cari` varchar(30) NOT NULL,
  `saran` varchar(100) NOT NULL,
  `tgl_kunjung` date NOT NULL,
  `jam_kunjung` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama`, `jk`, `perlu1`, `cari`, `saran`, `tgl_kunjung`, `jam_kunjung`) VALUES
(6, 'Muhammad Ilham Makarim', 'L', 'lihat lihat buk', 'buku  mengejar mimpi', 'rumayan bagus', '2016-12-12', '03:43:48'),
(7, 'Phalini Herman Chaniago', 'P', 'Pinjam Buku', 'Buku Tentang Hidup', 'Perbanyak Bukunya ya kakak', '2016-12-12', '03:44:36'),
(8, 'Yulia Sugma Kusuma Wardani', 'P', 'jalan jalan', 'buku tentang seni', 'dikasih kantin dong kakak', '2016-12-12', '03:45:43'),
(9, 'Abdan Bagus Panuntun', 'L', 'refreshing', 'buku death journey', 'lumayan bagus', '2016-12-12', '03:46:41'),
(10, 'Amalia Ulfah', 'P', 'nemenin teman', 'buku tentang jodoh sampai hala', 'bagus lengkap buku-buku nya', '2016-12-12', '03:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `trans_pinjam`
--

CREATE TABLE `trans_pinjam` (
  `id_pinjam` int(5) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `id_peminjam` int(4) NOT NULL,
  `nama_peminjam` varchar(30) NOT NULL,
  `tgl_pinjam` varchar(15) NOT NULL,
  `tgl_kembali` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_pinjam`
--

INSERT INTO `trans_pinjam` (`id_pinjam`, `judul_buku`, `id_peminjam`, `nama_peminjam`, `tgl_pinjam`, `tgl_kembali`, `status`, `ket`) VALUES
(5, 'Bikin mading lebih keren', 1, 'Ilham', '12-12-2016', '19-12-2016', 'kembali', ''),
(6, 'Kumpulan Senam dan artikel kes', 2, 'Ilham', '12-12-2016', '19-12-2016', 'pinjam', ''),
(7, 'Kumpulan Senam dan artikel kes', 2, 'Safina', '12-12-2016', '19-12-2016', 'pinjam', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `data_anggota`
--
ALTER TABLE `data_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `trans_pinjam`
--
ALTER TABLE `trans_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_anggota`
--
ALTER TABLE `data_anggota`
  MODIFY `id_anggota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `trans_pinjam`
--
ALTER TABLE `trans_pinjam`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
