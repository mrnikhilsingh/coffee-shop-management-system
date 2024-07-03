-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 10:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ns_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(3) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `product_id` int(10) NOT NULL,
  `size` varchar(30) NOT NULL,
  `quantity` int(10) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `street_address` varchar(200) NOT NULL,
  `town` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` int(3) NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_price` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(5) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `type`, `created_at`) VALUES
(1, 'Coffee Capuccino', 'menu-1.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '4.90', 'coffee', '2024-02-28 06:19:36'),
(2, 'Creamy Latte Coffee', 'menu-2.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '5.10', 'coffee', '2024-02-28 06:19:36'),
(3, 'Cold Coffee', 'menu-3.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '3.65', 'coffee', '2024-02-28 07:13:50'),
(4, 'Lemonde Juice', 'drink-1.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'drink', '2024-04-24 16:53:22'),
(5, 'Pineapple Juice', 'drink-2.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '3.50', 'drink', '2024-04-24 16:53:22'),
(6, 'Hot Cake Honey', 'dessert-1.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '3.85', 'dessert', '2024-04-24 16:59:23'),
(7, 'Cherry Butter Cake', 'dessert-2.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '4.00', 'dessert', '2024-04-24 16:59:23'),
(8, 'Banana Cheery Cake', 'dessert-5.jpg', 'A small river named Duden flows by their place and supplies', '4.00', 'dessert', '2024-04-24 17:01:31'),
(14, 'Soda Drinks', 'drink-3.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '5.90', 'drink', '2024-05-28 07:40:44'),
(15, 'Roasted Chicken', 'dish-4.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '10', 'main dish', '2024-05-28 07:43:52'),
(16, 'Cornish - Mackere', 'dish-1.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '12', 'main dish', '2024-05-28 07:56:21'),
(17, ' Roasted Steak', 'dish-2.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '12', 'main dish', '2024-05-28 07:59:00'),
(18, 'Cheese Burger', 'burger-1.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '5', 'starter', '2024-05-28 08:01:57'),
(19, 'Salad Burger', 'burger-3.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '6.80', 'starter', '2024-05-28 08:02:50'),
(20, 'Roasted Sea Food', 'dish-5.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '18', 'main dish', '2024-05-28 08:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@admin.com', 'admin@admin', '2024-07-03 05:45:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
