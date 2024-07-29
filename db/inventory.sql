-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 10:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 2,
  `image` varchar(100) NOT NULL DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `image`) VALUES
(12, 'dozzer', 'dozzer@gmail.com', '$2y$10$qS6Orska.SqY8Dlhrt/s1.8jjs4aaNAC0vOYP4oAQ43n1s/NUvdO.', 1, 'profile.png'),
(13, 'default user', 'user@gmail.com', '$2y$10$/nN5T0O6YC7UMZKYGqwbS.Q4LXnxPrBl9TIK6HwewWm0PAImxx8.K', 2, 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `contact`, `address`, `password`) VALUES
(1, 'Lorem Ipsum', 'dozzer.ifm@gmail.com', '0700000000', 'dar-mbagala-chamazi-98', '$2y$10$Teg0Nc931qQAu9o0.BD6yuyLgY.77caFrTUA/JgWbvXJOuPoWjagi');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `product`, `quantity`, `price`) VALUES
(1, 1, 'Lorem Ipsum', 5, 0),
(2, 1, 'entrepreneurship', 4, 0),
(3, 1, 'entrepreneurship', 4, 0),
(4, 1, 'entrepreneurship', 54, 22000),
(5, 1, 'Lorem Ipsum', 44, 66000),
(6, 1, 'Lorem Ipsum', 44, 66000),
(7, 1, 'Lorem Ipsum', 44, 66000),
(8, 1, 'Lorem Ipsum', 44, 66000),
(9, 1, 'Lorem Ipsum', 44, 66000),
(10, 1, 'Lorem Ipsum', 44, 66000),
(11, 1, 'Lorem Ipsum', 44, 66000),
(12, 1, 'Lorem Ipsum', 44, 66000),
(13, 3, 'Lorem Ipsum', 100, 66000),
(14, 3, 'entrepreneurship', 720, 22000),
(15, 3, 'entrepreneurship', 720, 22000),
(16, 3, 'Lorem Ipsum', 6, 66000),
(17, 3, 'Lorem Ipsum', 6, 66000),
(18, 2, 'Lorem Ipsum', 12, 66000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dimensions` varchar(10) NOT NULL,
  `manufactury` date NOT NULL,
  `expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `dimensions`, `manufactury`, `expiry`) VALUES
(1, 'Lorem Ipsum', 'this is a cool product', 66000, 4, '2x3', '2024-05-21', '2024-06-29'),
(2, 'entrepreneurship', 'this is a really cool product .Thanks', 22000, 20, '7x7', '2024-05-27', '2024-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `product` varchar(100) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `product`, `contact`, `address`) VALUES
(1, 'business manager', 'cauches', '0711223344', 'dar-ilala-bunju-buza');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
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
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
