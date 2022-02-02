-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 03:58 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` varchar(20) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tlp` varchar(16) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `role` enum('Admin','Kasir','Member') NOT NULL,
  `id_user` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama`, `alamat`, `jenis_kelamin`, `tlp`, `foto`, `role`, `id_user`) VALUES
('KS001', 'Pandu Putra Pradana', 'Uni Emirat Ciparay', 'L', '089663416413', 'default.png', 'Admin', 'USR001'),
('KS002', 'Tenku Essaimi Hesky', 'Manggahang Soviet', 'L', '0899388383', 'default.png', 'Admin', 'USR002'),
('KS003', 'Ilhan Haffiyan Juldan', 'Republik Rakyat Cikoneng', 'L', '11223343434', 'default.png', 'Admin', 'USR003'),
('KS004', 'Mamang Kasir', 'Jln. Baleendah nomor 18, Kabupaten Bandung', 'L', '08586323927', 'default.png', 'Kasir', 'USR008');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tlp` varchar(16) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_user` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama`, `alamat`, `jenis_kelamin`, `tlp`, `foto`, `id_user`) VALUES
('PL001', 'Andres Fonolossa', 'Jerman Barat RT05/09', 'L', '08586323927', 'default.png', 'USR004'),
('PL002', 'Alvaro Martin Vazquez', 'Kelurahan Chicago Desa Washington', 'L', '08586323927', 'default.png', 'USR005'),
('PL003', 'Mas Rizal abdul jama', 'Republik Rakyat Cikoneng', 'L', '0899388383', 'default.png', 'USR007');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` varchar(12) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nama_outlet`, `alamat`, `tlp`) VALUES
('ENL-001', 'EL Neptune Laundry Cabang Ciparay', 'Jln ciparay no.18, RT08 RW09, Kabupaten Bandung', '08586323927122'),
('ENL-002', 'EL Neptoon Laundry Cabang Cikoneng', 'Jln Manggahang no.18, RT08 RW09, Kabupaten Bandung', '08586323927'),
('ENL-003', 'EL Neptoon Laundry Cabang Manggahang', 'Jln Manggahang no.18, RT08 RW09, Kabupaten Bandung', '08586323927'),
('ENL-004', 'EL Neptoon Laundry cabang Majalaya', 'Jln. Mjalaya nomor 25, Kabupaten Bandungs', '022128281992');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(50) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`, `harga`) VALUES
('PK001', 'Kiloan (Semua Jenis Paket)', 10000),
('PK002', 'Selimut', 45000),
('PK003', 'Bed Cover', 20000),
('PK004', 'Kaos', 7000),
('PK005', 'Karpet', 75000),
('PK006', 'Jeans', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ig` varchar(50) NOT NULL,
  `wa` varchar(16) NOT NULL,
  `fb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `nama`, `ig`, `wa`, `fb`) VALUES
(1, 'EL Neptoon Laundry', 'smkn7be_official', '089663416413', 'https://web.facebook.com/Smkn7Baleendah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` varchar(20) NOT NULL,
  `id_member` varchar(12) NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `id_outlet` varchar(12) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ambil` datetime DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_member`, `id_paket`, `id_outlet`, `tgl_masuk`, `tgl_ambil`, `jumlah`, `total`, `status`, `dibayar`) VALUES
('SSH-000002', 'PL002', 'PK002', 'ENL-002', '2022-01-29 08:07:55', '2022-01-30 04:34:13', 43, 516000, 'diambil', 'dibayar'),
('SSH-000003', 'PL003', 'PK005', 'ENL-003', '2022-01-30 12:00:00', '2022-01-30 04:34:11', 8, 600000, 'diambil', 'dibayar'),
('SSH-000004', 'PL003', 'PK001', 'ENL-001', '2022-01-30 06:57:42', '2022-01-30 07:06:03', 40, 400000, 'diambil', 'dibayar'),
('SSH-000005', 'PL001', 'PK003', 'ENL-001', '2022-01-30 06:58:26', '0000-00-00 00:00:00', 8, 160000, 'baru', 'belum_dibayar'),
('SSH-000006', 'PL002', 'PK003', 'ENL-002', '2022-01-30 06:59:45', '0000-00-00 00:00:00', 47, 940000, 'baru', 'belum_dibayar'),
('SSH-000007', 'PL001', 'PK005', 'ENL-002', '2022-01-30 06:59:59', '0000-00-00 00:00:00', 47, 3525000, 'baru', 'belum_dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Admin','Kasir','Member','Owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES
('OWR01', 'owner@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Owner'),
('USR001', 'rellamoza95@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Admin'),
('USR002', 'tenku@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Admin'),
('USR003', 'rellamoza@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Admin'),
('USR004', 'fono@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Member'),
('USR005', 'test@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Member'),
('USR007', 'rizal@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Member'),
('USR008', 'kasir@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relasi detail transaksi paket` (`id_paket`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `relasi karyawan user` (`id_user`) USING BTREE;

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `relasi member user` (`id_user`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relasi transaksi member` (`id_member`),
  ADD KEY `relasi transaksi paket` (`id_paket`),
  ADD KEY `relasi transaksi outlet` (`id_outlet`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `relasi detail transaksi paket` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi detail transaksi transaksi` FOREIGN KEY (`id`) REFERENCES `tb_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD CONSTRAINT `relasi karyawan user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD CONSTRAINT `relasi member user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `relasi transaksi member` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi transaksi outlet` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi transaksi paket` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
