-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2026 at 01:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `supplier_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'B01', 'Sabun Lifebuoy', 4000, 50, 1),
(2, 'B02', 'indomie Goreng', 3000, 120, 5),
(3, 'B03', 'Minyak goreng 1L', 18000, 30, 2),
(4, 'B04', 'Beras 5kg', 68000, 15, 7),
(5, 'B05', 'permen karet', 1000, 40, 3),
(6, 'B06', 'Kopi Kapal Api', 1500, 200, 4),
(7, 'B07', 'Teh Sariwangi', 6500, 80, 6),
(8, 'B08', 'Susu Ultra 250ml', 7000, 60, 8),
(9, 'B09', 'Aqua 600ml', 3500, 100, 9),
(10, 'B10', 'Tisu', 12000, 25, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
('P01', 'Ahmad Faiq', 'L', '081200001', 'Sumenep'),
('P02', 'Putra', 'L', '081200002', 'Bangkalan'),
('P03', 'Dewi', 'P', '081200003', 'Sampang'),
('P04', 'Dina', 'P', '081200004', 'Sidoarjo'),
('P05', 'Eko', 'L', '081200005', 'Malang'),
('P06', 'Fajar', 'L', '081200006', 'Surabaya'),
('P07', 'Gita', 'P', '081200007', 'Pamekasan'),
('P08', 'Setiawan', 'L', '081200008', 'Bandung'),
('P09', 'Indah', 'P', '081200009', 'Sumenep'),
('P10', 'Joko', 'L', '081200010', 'Solo');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int DEFAULT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT NULL,
  `transaksi_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2026-03-01 10:15:00', 12000, 'TUNAI', 1),
(2, '2026-03-01 14:20:00', 37000, 'TRANSFER', 2),
(3, '2026-03-02 11:05:00', 68000, 'EDC', 3),
(4, '2026-03-02 16:45:00', 14000, 'TUNAI', 4),
(5, '2026-03-03 09:30:00', 15000, 'TUNAI', 5),
(6, '2026-03-03 13:10:00', 21000, 'TRANSFER', 6),
(7, '2026-03-04 10:50:00', 35000, 'TUNAI', 7),
(8, '2026-03-04 15:15:00', 24000, 'EDC', 8),
(9, '2026-03-05 12:00:00', 12000, 'TUNAI', 9),
(10, '2026-03-05 17:30:00', 18000, 'TRANSFER', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT. Maju Bersama', '08123456', 'Surabaya'),
(2, 'PT. Senang Sekali', '081515563', 'Bangkalan'),
(3, 'PT. Segar Segar', '0845454663', 'Surabaya'),
(4, 'CV. Sumber Makmur', '081999888', 'Gresik'),
(5, 'PT. Abadi Jaya', '082111222', 'Sidoarjo'),
(6, 'CV. Berkah Utama', '083333444', 'Malang'),
(7, 'PT. Nusantara Indah', '085666777', 'Jakarta'),
(8, 'CV. Karya Mandiri', '087888999', 'Bandung'),
(9, 'PT. Mega Surya', '089111222', 'Semarang'),
(10, 'CV. Prima Gemilang', '088333444', 'Jember');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text,
  `total` int DEFAULT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2026-03-01', 'Lunas', 12000, 'P01'),
(2, '2026-03-01', 'Lunas', 37000, 'P02'),
(3, '2026-03-02', 'Belum Lunas', 68000, 'P03'),
(4, '2026-03-02', 'Lunas', 14500, 'P04'),
(5, '2026-03-03', 'Lunas', 15000, 'P05'),
(6, '2026-03-03', 'Belum Lunas', 21000, 'P06'),
(7, '2026-03-04', 'Belum Lunas', 35000, 'P07'),
(8, '2026-03-04', 'Lunas', 24000, 'P08'),
(9, '2026-03-05', 'Belum Lunas', 12000, 'P09'),
(10, '2026-03-05', 'Lunas', 18500, 'P10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `harga` int DEFAULT NULL,
  `qty` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 4000, 2),
(1, 2, 3000, 1),
(2, 3, 18000, 2),
(3, 4, 68000, 1),
(4, 5, 14000, 1),
(5, 6, 1500, 10),
(6, 8, 7000, 3),
(7, 9, 3000, 10),
(8, 10, 12000, 2),
(9, 2, 3000, 4),
(10, 3, 18000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', 'admin123', 'mimin', 'Surabaya', '081234123412', 1),
(2, 'kasir1', '123456', 'budi Kasir', 'Surabaya', '085678567856', 2),
(3, 'kasir2', '123456', 'Siti Kasir', 'pamekasan', '087890789078', 2),
(4, 'kasir3', '123456', 'Eko Kasir', 'Malang', '085111222333', 2),
(5, 'manajer', 'manajer123', 'Bambang', 'Surabaya', '085200112233', 1),
(6, 'staf1', 'staf123', 'Randi', 'Gresik', '089612612612', 3),
(7, 'staf2', 'staf123', 'Dita', 'bangkalan', '082234234234', 3),
(8, 'gudang1', '123456', 'Fikri', 'Sidoarjo', '083844455566', 3),
(9, 'gudang2', '123456', 'Hani', 'Gresik', '081777888999', 3),
(10, 'kepala_toko', '123456', 'Faiq', 'Suemenep', '081345345345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
