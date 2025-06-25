-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql107.byetcluster.com
-- Generation Time: Jun 25, 2025 at 12:05 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39238009_pemanasan`
--

-- --------------------------------------------------------

--
-- Table structure for table `incoming_goods`
--

CREATE TABLE `incoming_goods` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `received_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incoming_goods`
--

INSERT INTO `incoming_goods` (`id`, `product_id`, `supplier`, `quantity`, `received_date`) VALUES
(1, 102, 'Toko Jaya Makmur', 12, '2025-06-25 05:18:25'),
(2, 104, 'Toko Soto Jaya Jaya', 199, '2025-06-25 05:20:18'),
(3, 105, 'Toko Soto Jaya Jaya', 100, '2025-06-25 05:20:59'),
(4, 105, 'Agen Sate Maduro', 100, '2025-06-25 05:21:47'),
(5, 106, 'Agen Jaya Merdeka', 100, '2025-06-25 05:24:54'),
(6, 107, 'Toko Anggrek Mekar', 100, '2025-06-25 05:25:20'),
(7, 108, 'Kebun Kopi Yahood', 100, '2025-06-25 05:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `outcoming_goods`
--

CREATE TABLE `outcoming_goods` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `reason` enum('sold','damaged','expired','other') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outcoming_goods`
--

INSERT INTO `outcoming_goods` (`id`, `product_id`, `transaction_id`, `quantity`, `reason`, `date`) VALUES
(1, 102, 30, 1, 'sold', '2025-06-25 05:26:59'),
(2, 105, NULL, 12, 'expired', '2025-06-25 05:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `created_at`) VALUES
(102, 'Bumbu Nasi Goreng', 'Bumbu', '12000.00', '2025-05-21 07:39:38'),
(104, 'Bumbu Soto', 'coba reusable', '21000.00', '2025-05-21 11:52:07'),
(105, 'Bumbu Sate Enak', 'Bumbu Enak Banget', '20000.00', '2025-05-28 11:46:03'),
(106, 'Mi Indomi', 'mi instan', '22000.00', '2025-06-03 11:03:47'),
(107, 'saos sambal CBA 12ml', 'saos', '10000.00', '2025-06-06 12:08:44'),
(108, 'Kopi Liong saset', 'Kopi', '5000.00', '2025-06-11 12:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`product_id`, `quantity`, `last_updated`) VALUES
(102, 11, '2025-06-25 02:26:59'),
(104, 199, '2025-06-25 02:20:18'),
(105, 188, '2025-06-25 02:36:20'),
(106, 100, '2025-06-25 02:24:54'),
(107, 100, '2025-06-25 02:25:20'),
(108, 100, '2025-06-25 02:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_sold` int(11) NOT NULL,
  `price_per_unit` decimal(12,0) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` enum('cash','debit','credit','ewallet') NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `product_id`, `user_id`, `total_sold`, `price_per_unit`, `total_price`, `payment_method`, `transaction_date`) VALUES
(30, 102, 1, 1, '12000', '12000.00', 'debit', '2025-06-25 05:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Rizki Maulana', 'rizki@example.com', '$2y$10$r5CemtZ4AL4YiV1bXQn9Ke0D1/XLU.EZZKrCGa0PK6vEJMa1rFPYy', 'admin', '2025-02-28 19:55:21'),
(3, 'coba lagi', 'coba2@mail.com', '$2y$10$r5CemtZ4AL4YiV1bXQn9Ke0D1/XLU.EZZKrCGa0PK6vEJMa1rFPYy', 'admin', '2025-03-01 16:23:11'),
(5, 'biji', 'biji@mail.com', '$2y$10$LmqIuZAebOVt0IZ5bGE90OCJLMAcUi8ij9syPvjsfNX62D4LXvIVm', 'admin', '2025-06-09 16:29:30'),
(6, 'coba doang', 'coba21@mail.com', '$2y$10$Jlxuv.ypexExkuk.HjZ49uYXlw5xA6oVVrVpZzNA33Fzl2EbidOs2', 'customer', '2025-06-09 16:48:20'),
(7, 'lelele', 'lele@mail.com', '$2y$10$RA8FLJsMur/hfLcqONfXeO/AIEjI9dqGng3wg6hdgunXsjSigJlja', 'admin', '2025-06-11 16:41:16'),
(8, 'cust112', 'cust12@mail.com', '$2y$10$.cFByxQRPTCpzplRaHduX.kVGAGqo/HWZl2ZAEerekL4GY.7pHHfC', 'customer', '2025-06-12 20:28:56'),
(9, 'admin123', 'adm123@mail.com', '$2y$10$6Cvp.taIx34zzewSugc9h.s6f39mCpQc00egote6wXS7NUkZwAh6.', 'admin', '2025-06-15 22:50:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incoming_goods`
--
ALTER TABLE `incoming_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `outcoming_goods`
--
ALTER TABLE `outcoming_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incoming_goods`
--
ALTER TABLE `incoming_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `outcoming_goods`
--
ALTER TABLE `outcoming_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incoming_goods`
--
ALTER TABLE `incoming_goods`
  ADD CONSTRAINT `incoming_goods_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `outcoming_goods`
--
ALTER TABLE `outcoming_goods`
  ADD CONSTRAINT `outcoming_goods_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `outcoming_goods_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
