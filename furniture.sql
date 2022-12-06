-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 03:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `nama_furnitur` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price_date` datetime NOT NULL DEFAULT current_timestamp(),
  `jumlah_Barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `nama_furnitur`, `total`, `category`, `price_date`, `jumlah_Barang`) VALUES
(11, 'Lemari', 5000, 'Lemari', '2021-11-17 22:02:23', 1),
(12, 'Kursi', 5000, 'Kursi', '2021-11-18 13:56:26', 1),
(13, 'Lemari', 5000, 'Lemari', '2021-11-18 13:56:45', 1),
(14, 'Lemari', 5000, 'Lemari', '2021-11-18 13:58:03', 1),
(15, 'Lemari Jati', 2000000, 'Lemari', '2021-11-18 13:58:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(999) NOT NULL,
  `category` enum('Meja','Kursi','Lemari') NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`, `price`, `quantity`, `photo`) VALUES
(1, 'Kursi', 'Kursi', 'Kursi', 5000, 7, 'kursi.jpg'),
(2, 'Lemari', 'Lemari', 'Lemari', 5000, 8, 'lemari.jpg'),
(3, 'Meja Belajar', 'Meja kualitas tinggi dengan harga merakyat, cocok untuk pelajar dan mahasiswa', 'Meja', 290000, 10, '8929f6b8de310a9e2a2e84f428d2121a.jpg'),
(4, 'Kursi Santai', 'sjnvduisnv diujsnvuisdnviusnv dsujvnusdinvs', 'Kursi', 190000, 8, '10089098_2.jpg'),
(5, 'Lemari Anak', 'fsdfdsvdf df d', 'Lemari', 1000000, 5, 'image.jpg'),
(6, 'Lemari Jati', 'jghkgm', 'Lemari', 2000000, 3, '38797d8c0104b4fe3570c14db70b7e13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `role`) VALUES
(1, 'admin', 'adminmasukaja', 'admin');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
