-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2025 at 11:38 AM
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
-- Database: `salewise`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product`, `category`, `amount`, `created_at`) VALUES
(1, 'Jordan Air 4 Retro Black Cat', 'Footwear', 949.00, '2025-12-24 07:20:46'),
(2, 'Nike Everyday Plus Cushioned Training Crew Socks (6 Pairs)', 'Accessories', 109.00, '2025-12-24 07:23:06'),
(3, 'Puma Speedcat OG', 'Footwear', 549.00, '2025-12-24 07:23:41'),
(4, 'Asics GEL-1130 Women\'s', 'Footwear', 479.00, '2025-12-24 07:24:25'),
(5, 'Jordan Air 11 Retro', 'Footwear', 989.00, '2025-12-24 07:28:07'),
(6, 'Nike Dunk Black', 'Footwear', 539.00, '2025-12-24 07:37:06'),
(7, 'Stanley The Quencher Pro Tour 30 Oz Tumbler', 'Accessories', 209.00, '2025-12-24 07:54:37'),
(8, 'Jordan Jam Borough Backpack', 'Accessories', 169.00, '2025-12-24 07:56:15'),
(9, 'Mitchell & Ness NBA\'s Best T-Shirt', 'Clothing', 189.00, '2025-12-24 07:57:11'),
(10, 'adidas Argentina 26 Home Replica Messi Jersey', 'Clothing', 399.00, '2025-12-24 07:57:54'),
(11, 'adidas Liverpool FC 25/26 Third Jersey', 'Clothing', 329.00, '2025-12-24 07:59:07'),
(12, 'New Balance Woven Cargo Pants', 'Clothing', 309.00, '2025-12-24 08:00:19'),
(13, 'adidas Charm Footwear Overhead Hoodie', 'Clothing', 399.00, '2025-12-24 08:04:01'),
(14, 'Nike Utility Power 2.0 Duffle (31L)', 'Accessories', 269.00, '2025-12-24 08:29:44'),
(15, 'Mckenzie Coast Swim Short', 'Clothing', 129.00, '2025-12-24 10:03:48'),
(16, 'Fila Heritage Short Sleeve Polo', 'Clothing', 269.00, '2025-12-24 10:04:19'),
(17, 'Nike Sportswear Faux Fur Slouchy Bag (19L)', 'Accessories', 299.00, '2025-12-24 10:05:27'),
(18, 'New Balance 530 Women\'s', 'Footwear', 499.00, '2025-12-25 06:41:29'),
(19, 'Nike Woven Track Jacket', 'Clothing', 335.00, '2025-12-25 06:42:34'),
(20, 'New Balance 9060 Women\'s', 'Footwear', 709.00, '2025-12-25 06:43:32'),
(21, 'Nike Air Max 95 Big Bubble', 'Footwear', 799.00, '2025-12-25 06:44:10'),
(22, 'Calvin Klein Monogram Baseball Cap', 'Accessories', 219.00, '2025-12-25 06:46:03'),
(23, 'Stanley 40 oz Quencher H2.0 Tumbler', 'Accessories', 259.00, '2025-12-25 10:18:24'),
(24, 'adidas Samba OG', 'Footwear', 569.00, '2025-12-27 06:59:34'),
(25, 'Nike Woven Track Jacket', 'Clothing', 335.00, '2025-12-27 07:00:09'),
(26, 'New Balance 530 Women\'s', 'Footwear', 499.00, '2025-12-27 07:00:47'),
(27, 'Jordan Air 11 Retro', 'Footwear', 999.00, '2025-12-27 07:01:26'),
(28, 'Calvin Klein Micro Stretch Low Rise Trunks 3-Pack', 'Clothing', 359.00, '2025-12-27 09:19:04'),
(29, 'Calvin Klein Microfiber Stretch Hip Briefs (3-Pack)', 'Clothing', 289.00, '2025-12-27 09:19:29'),
(30, 'Puma Portugal 2026 Home Player Jersey', 'Clothing', 339.00, '2025-12-29 06:15:44'),
(31, 'adidas Italy 26 Home Replica Jersey', 'Clothing', 359.00, '2025-12-29 06:17:53'),
(32, 'adidas Adizero EVO SL ATR', 'Footwear', 699.00, '2025-12-29 06:18:33'),
(33, 'adidas Adizero EVO SL ATR', 'Footwear', 699.00, '2025-12-29 06:19:57'),
(34, 'Calvin Klein Microfiber Stretch Hip Briefs (3-Pack)', 'Accessories', 289.00, '2025-12-29 06:20:39'),
(35, 'Calvin Klein Microfiber Stretch Hip Briefs (3-Pack)', 'Accessories', 289.00, '2025-12-29 06:31:14'),
(36, 'Calvin Klein Microfiber Stretch Hip Briefs (3-Pack)', 'Accessories', 289.00, '2025-12-29 06:31:21'),
(37, 'Jordan Air 11 Retro', 'Footwear', 989.00, '2025-12-29 07:15:09'),
(38, 'adidas Adicolor Classic Backpack', 'Accessories', 169.00, '2025-12-29 08:32:20'),
(39, 'adidas Adicolor Classic Backpack', 'Accessories', 169.00, '2025-12-29 15:37:50'),
(41, 'adidas Adicolor Classic Backpack', 'Accessories', 169.00, '2025-12-29 16:16:01'),
(42, 'Jordan Air 11 Retro', 'Footwear', 969.00, '2025-12-29 16:19:52'),
(43, 'Asics GEL-NYC', 'Footwear', 579.00, '2025-12-29 17:26:49'),
(44, 'Asics GEL-NYC', 'Footwear', 579.00, '2025-12-30 07:31:03'),
(45, 'Stanley The Quencher Pro Tour 30 Oz Tumbler', 'Accessories', 209.00, '2025-12-30 08:09:28'),
(46, 'New Era Cap Co. 920 NY Yankees', 'Accessories', 199.00, '2025-12-30 08:19:22'),
(47, 'Calvin Klein Microfiber Stretch Hip Briefs (3-Pack)', 'Clothing', 299.00, '2025-12-30 08:20:18'),
(48, 'Jordan Air 1 Brooklyn Boots Women\'s', 'Footwear', 789.00, '2025-12-30 08:21:14'),
(49, 'Jordan Air 1 Brooklyn Boots Women\'s', 'Footwear', 789.00, '2025-12-30 08:22:25'),
(50, 'Jordan Air 1 Brooklyn Boots Women\'s', 'Footwear', 789.00, '2025-12-30 09:19:32'),
(51, 'The North Face High Pile Jacket', 'Clothing', 1309.00, '2025-12-30 10:49:31'),
(52, 'The North Face High Pile Jacket', 'Clothing', 1309.00, '2025-12-30 15:24:19'),
(53, 'Calvin Klein Microfiber Stretch Hip Briefs (3-Pack)', 'Clothing', 289.00, '2025-12-30 16:14:15'),
(54, 'New Balance 530 Women\'s', 'Footwear', 499.00, '2025-12-31 08:19:47'),
(55, 'On Running Cloudsurfer Next', 'Footwear', 819.00, '2025-12-31 08:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2025-12-24 07:18:03'),
(2, 'ych', '$2y$10$8VJNPi5.nJkr2PtSbSeOyefeiazhzROfcN/dMHaGngZx0GxHUyNLK', '2025-12-24 07:19:01'),
(3, 'sam', '$2y$10$proHE..GVn31KbJZqBR0cO5KE2RC947iQNk7GlLD9CCLOQUvBY1tq', '2025-12-24 08:04:36'),
(4, 'ykw', '$2y$10$NeFhsGLygaFvZnTCDPKMdesPmaTiFJ0gd5r/as56yAO3qDEoapPAa', '2025-12-27 06:58:57'),
(5, 'test', '$2y$10$tq58aRuiqVeAduOKBQyL0egEopWtDgtbma3tWizjOiNJQK49MMEo2', '2025-12-29 06:31:01'),
(6, '1230', '$2y$10$pVDoc/fkY.fJDkMLdVFuk.ROvbCBm7G/dmwqgOCPvxFHoA3HTFb7q', '2025-12-30 07:30:34'),
(7, 'admin1', '$2y$10$hxVH0ok8ONLd9e2ZoETdDuj.McGr.pKPUS1PU7q36vJ1VXVfXS2Wy', '2025-12-30 08:16:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
