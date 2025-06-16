-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 06:47 PM
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
-- Database: `pemanasan`
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
(13, 102, 'toko sempak', 20, '2025-05-25 03:09:23'),
(14, 103, 'toko sempak', 20, '2025-05-25 03:09:37'),
(15, 104, 'toko sempak', 20, '2025-05-25 03:09:46'),
(16, 105, 'Toko Jawa Jawa', 100, '2025-05-28 04:46:49'),
(17, 106, 'Toko Jawa Jawa', 100, '2025-06-03 04:04:08'),
(18, 108, 'toko sempak', 100, '2025-06-11 08:35:23'),
(19, 107, 'Toko Jawa Jawa', 220, '2025-06-11 08:38:49'),
(20, 102, 'Toko Jawa Jawa', 100, '2025-06-15 05:31:32'),
(22, 102, 'toko sempak', 100, '2025-06-15 06:55:18'),
(23, 102, 'Toko Jawa Jawa', 100, '2025-06-15 07:04:17'),
(24, 102, 'toko sempak', 100, '2025-06-15 07:13:53'),
(25, 102, 'Toko Jawa Jawa', 110, '2025-06-15 07:35:19');

--
-- Triggers `incoming_goods`
--
DELIMITER $$
CREATE TRIGGER `increase_stock` AFTER INSERT ON `incoming_goods` FOR EACH ROW UPDATE stock SET quantity = quantity + NEW.quantity
WHERE product_id = NEW.product_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `undo_increase_stock` AFTER DELETE ON `incoming_goods` FOR EACH ROW UPDATE stock SET quantity = quantity - OLD.quantity
WHERE product_id = OLD.product_id
$$
DELIMITER ;

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
(10, 102, 18, 2, 'sold', '2025-05-26 06:44:14'),
(12, 102, 19, 1, 'sold', '2025-05-28 07:08:05'),
(13, 103, 20, 1, 'sold', '2025-05-28 07:08:20'),
(16, 105, 21, 2, 'sold', '2025-05-28 10:17:33'),
(17, 106, 22, 2, 'sold', '2025-06-03 09:04:33'),
(18, 104, 18, 22, 'damaged', '2025-06-03 04:05:03'),
(19, 102, NULL, 3, 'other', '2025-06-03 04:19:50'),
(20, 103, 23, 1, 'sold', '2025-06-05 10:36:01'),
(22, 106, 24, 2, 'sold', '2025-06-06 09:44:37'),
(24, 108, 25, 2, 'sold', '2025-06-11 11:15:12'),
(25, 103, NULL, 2, 'damaged', '2025-06-11 07:47:08'),
(26, 103, NULL, 1, 'damaged', '2025-06-11 07:47:19'),
(27, 103, NULL, 2, 'damaged', '2025-06-11 07:49:32'),
(28, 103, NULL, 1, 'damaged', '2025-06-11 07:49:51'),
(29, 102, NULL, 2, 'expired', '2025-06-11 07:50:22'),
(30, 103, NULL, 1, 'expired', '2025-06-11 07:50:41'),
(31, 103, NULL, 1, 'expired', '2025-06-11 07:51:42'),
(32, 103, NULL, 1, 'expired', '2025-06-11 07:51:59'),
(33, 102, NULL, 1, 'damaged', '2025-06-11 07:52:34'),
(34, 103, NULL, 1, 'other', '2025-06-11 08:15:43'),
(35, 102, NULL, 112, 'damaged', '2025-06-15 07:19:01'),
(38, 103, NULL, 1, 'damaged', '2025-06-15 04:06:04'),
(39, 102, NULL, 1, 'damaged', '2025-06-15 04:46:59'),
(40, 105, NULL, 1, 'damaged', '2025-06-15 05:31:13'),
(41, 102, NULL, 1, 'damaged', '2025-06-15 05:31:46'),
(46, 102, NULL, 1, 'damaged', '2025-06-15 06:26:26'),
(48, 102, NULL, 1, 'damaged', '2025-06-15 06:51:22'),
(49, 102, NULL, 99, 'damaged', '2025-06-15 06:54:23'),
(50, 102, NULL, 100, 'damaged', '2025-06-15 07:02:27'),
(51, 102, NULL, 100, 'damaged', '2025-06-15 07:04:53'),
(52, 102, NULL, 120, 'damaged', '2025-06-15 07:15:26'),
(54, 102, 27, 12, 'sold', '2025-06-15 13:15:39'),
(55, 102, 28, 1, 'sold', '2025-06-15 13:18:06');

--
-- Triggers `outcoming_goods`
--
DELIMITER $$
CREATE TRIGGER `after_outcoming_update` AFTER UPDATE ON `outcoming_goods` FOR EACH ROW UPDATE stock SET quantity = quantity - NEW.quantity WHERE quantity = NEW.quantity
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `decrease_stock` AFTER INSERT ON `outcoming_goods` FOR EACH ROW UPDATE stock SET quantity =  quantity - NEW.quantity WHERE product_id = NEW.product_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `undo_decrease_stock` AFTER DELETE ON `outcoming_goods` FOR EACH ROW UPDATE stock SET quantity = quantity + OLD.quantity WHERE product_id = OLD.product_id
$$
DELIMITER ;

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
(102, 'Bumbu Nasi Goreng', 'Bumbu', 12000.00, '2025-05-21 00:39:38'),
(103, 'coba doang', 'coba', 21000.00, '2025-05-21 04:27:14'),
(104, 'Bumbu Soto', 'coba reusable', 21000.00, '2025-05-21 04:52:07'),
(105, 'Bumbu Sate Enak', 'Bumbu Enak Banget', 20000.00, '2025-05-28 04:46:03'),
(106, 'Mi Indomi', 'mi instan', 22000.00, '2025-06-03 04:03:47'),
(107, 'saos sambal CBA 12ml', 'saos', 10000.00, '2025-06-06 05:08:44'),
(108, 'Kopi Liong saset', 'Kopi', 5000.00, '2025-06-11 05:27:31');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `delete_stock` AFTER DELETE ON `products` FOR EACH ROW DELETE FROM stock WHERE product_id = OLD.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_stock` AFTER INSERT ON `products` FOR EACH ROW INSERT INTO stock (product_id, quantity, last_updated) VALUES (NEW.id, 0, NOW())
$$
DELIMITER ;

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
(102, 73, '2025-06-15 13:18:06'),
(103, 104, '2025-06-15 09:06:04'),
(104, 98, '2025-06-03 09:05:03'),
(105, 97, '2025-06-15 10:31:13'),
(106, 96, '2025-06-06 09:44:37'),
(107, 220, '2025-06-11 13:38:49'),
(108, 98, '2025-06-11 13:35:23');

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
(18, 102, 3, 2, 12000, 24000.00, 'debit', '2025-05-26 06:44:14'),
(19, 102, 1, 1, 12000, 12000.00, 'cash', '2025-05-28 02:08:05'),
(20, 103, 1, 1, 21000, 21000.00, 'cash', '2025-05-28 02:08:20'),
(21, 105, 1, 2, 20000, 40000.00, 'cash', '2025-05-28 05:17:33'),
(22, 106, 1, 2, 22000, 44000.00, 'cash', '2025-06-03 04:04:33'),
(23, 103, 3, 1, 21000, 21000.00, 'cash', '2025-06-05 05:36:01'),
(24, 106, 3, 2, 12000, 24000.00, 'cash', '2025-06-06 04:44:37'),
(25, 108, 7, 2, 12000, 24000.00, 'cash', '2025-06-11 06:15:12'),
(27, 102, 1, 12, 12000, 144000.00, 'cash', '2025-06-15 08:15:39'),
(28, 102, 3, 1, 12000, 12000.00, 'cash', '2025-06-15 08:18:06');

--
-- Triggers `transactions`
--
DELIMITER $$
CREATE TRIGGER `after_transaction_insert` AFTER INSERT ON `transactions` FOR EACH ROW BEGIN
    INSERT INTO outcoming_goods (
        product_id,
        transaction_id,
        quantity,
        reason,
        date
    ) VALUES (
        NEW.product_id,
        NEW.id,
        NEW.total_sold,
        'sold',
        NOW()
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_transaction` AFTER UPDATE ON `transactions` FOR EACH ROW BEGIN
    -- Hapus dulu data lama dari outcoming_goods untuk transaksi ini
    DELETE FROM outcoming_goods
    WHERE transaction_id = OLD.id;

    -- Tambahkan data baru ke outcoming_goods
        INSERT INTO outcoming_goods (
        product_id,
        transaction_id,
        quantity,
        reason,
        date
    ) VALUES (
        NEW.product_id,
        NEW.id,
        NEW.total_sold,
        'sold',
        NOW()
    );

    -- Tidak perlu ubah stok langsung karena trigger di outcoming_goods akan otomatis mengurangi stock
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `undo_transactinos` AFTER DELETE ON `transactions` FOR EACH ROW UPDATE stock SET quantity = quantity + OLD.total_sold
WHERE product_id = OLD.product_id
$$
DELIMITER ;

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
(1, 'Rizki Maulana', 'rizki@example.com', '$2y$10$r5CemtZ4AL4YiV1bXQn9Ke0D1/XLU.EZZKrCGa0PK6vEJMa1rFPYy', 'admin', '2025-02-28 11:55:21'),
(3, 'coba lagi', 'coba2@mail.com', '$2y$10$r5CemtZ4AL4YiV1bXQn9Ke0D1/XLU.EZZKrCGa0PK6vEJMa1rFPYy', 'admin', '2025-03-01 08:23:11'),
(5, 'biji', 'biji@mail.com', '$2y$10$LmqIuZAebOVt0IZ5bGE90OCJLMAcUi8ij9syPvjsfNX62D4LXvIVm', 'admin', '2025-06-09 09:29:30'),
(6, 'coba doang', 'coba21@mail.com', '$2y$10$Jlxuv.ypexExkuk.HjZ49uYXlw5xA6oVVrVpZzNA33Fzl2EbidOs2', 'customer', '2025-06-09 09:48:20'),
(7, 'lelele', 'lele@mail.com', '$2y$10$RA8FLJsMur/hfLcqONfXeO/AIEjI9dqGng3wg6hdgunXsjSigJlja', 'admin', '2025-06-11 09:41:16'),
(8, 'cust112', 'cust12@mail.com', '$2y$10$.cFByxQRPTCpzplRaHduX.kVGAGqo/HWZl2ZAEerekL4GY.7pHHfC', 'customer', '2025-06-12 13:28:56'),
(9, 'admin123', 'adm123@mail.com', '$2y$10$6Cvp.taIx34zzewSugc9h.s6f39mCpQc00egote6wXS7NUkZwAh6.', 'admin', '2025-06-15 15:50:12');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `outcoming_goods`
--
ALTER TABLE `outcoming_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
