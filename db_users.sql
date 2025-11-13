-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 04:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama_product` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama_product`, `harga`, `stok`, `id_supplier`) VALUES
(5, 'Celana Tracking', 150000.00, 200, 4),
(6, 'Tas Carrier', 600000.00, 160, 4),
(7, 'Tenda Kapasitas 1 Orang', 450000.00, 310, 4),
(8, 'Sleeping Bag', 100000.00, 250, 4),
(9, 'Nugget Ayam 500 gram', 26000.00, 400, 5),
(10, 'Abon Sapi 100 gram', 35000.00, 500, 5);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `telepon`) VALUES
(4, 'ALTAYERI', 'Jl.Raya Ubrug, Blok A', '021345'),
(5, 'MM3 Sukabumi', 'Jl.Raya Pelabuhan II, Blok A', '0219912');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `NIM` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `NIM`, `password`, `role`, `foto`) VALUES
(11, 'Noni', 'noni@gmail.com', '201515', '$2y$10$s8LqdMqLzpVTcaLl82xdTeGOxDemUnzOW.Xpey5DQCw11NuVQBVOm', 'user', NULL),
(12, 'Mayesa', 'yesa@gmail.com', '2016004002', '$2y$10$8YjVgPKqsszySEewPWdnsuQHH9Q2M2b7Ode1W58AXFXQc6Zp/QfOi', 'admin', NULL),
(13, 'Zayn', 'zayn@gmail.com', '202512', '$2y$10$zE7GXa5zzxB/yu3czBHj5.WU0DKpd0pxhIbjruzlhIDxwx9F5XW7.', 'user', NULL),
(14, 'Hari', 'day@gmail.com', '2024005', '$2y$10$nKtjlQaQJLgb3pelz2YfCeLf1vcuQpoLU5w5Hr8sL/fHtWxabnYx.', 'user', '00242206.jpg'),
(16, 'Yeri Yudistiar', 'tiar@gmail.com', '1510', '$2y$10$M68KmmjBOgsh8QG/dpISveqZ4whRU0tH5kmifpD8EUD10lHO/BdjW', 'user', 'IMG-20250729-WA0045.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
