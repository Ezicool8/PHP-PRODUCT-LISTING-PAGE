-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 08:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiweb_product_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Book'),
(2, 'Disk'),
(3, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sku`, `name`, `price`, `category_name`) VALUES
('BK-0001', 'First Book', '500', 'Book'),
('BK-0002', 'Book TWO', '600', 'Book'),
('bk-090', 'Alabama', '200', 'Book'),
('DC-445', 'Ezequiel', '655', 'Disk'),
('DISK-5', 'Accapella', '500', 'Disk'),
('DSC-44561', 'Acme disk', '400', 'Disk'),
('DSK-0001', 'First Disk', '600', 'Disk'),
('dsk-00025', 'Comely', '400', 'Book'),
('DSK-0005', 'ACME-5', '200', 'Disk'),
('FR-0001', 'First Furniture', '1000', 'Furniture'),
('fr-00024', 'FURRR', '5554', 'Furniture'),
('FR-00099', 'Round Table', '3000', 'Furniture'),
('FR-2020', 'TV Stand', '500', 'Furniture'),
('Fr-42', 'Latest Furniture', '2000', 'Furniture'),
('frrr-009', 'FurnitureC s', '200', 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `sku` varchar(255) DEFAULT NULL,
  `attribute` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`sku`, `attribute`) VALUES
('BK-0001', '50'),
('DSK-0001', '500'),
('FR-0001', '50x60x70'),
('BK-0002', '60'),
('bk-090', '100'),
('FR-00099', '30x40x50'),
('DISK-5', '5000'),
('DSC-44561', '400'),
('Fr-42', '23x23x23'),
('DC-445', '500'),
('fr-00024', '4x5x6'),
('frrr-009', '45x44x55'),
('dsk-00025', '10'),
('DSK-0005', '400'),
('FR-2020', '20x20x100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `category_name` (`category_name`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD KEY `sku` (`sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `categories` (`category_name`);

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_ibfk_1` FOREIGN KEY (`sku`) REFERENCES `products` (`sku`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
