-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 04:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techfoon_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `crudoprations`
--

CREATE TABLE `crudoprations` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crudoprations`
--

INSERT INTO `crudoprations` (`id`, `username`, `password`, `image`) VALUES
(1, 'admin@gmail.com', 'Hello@123', '1.jpg'),
(2, 'annu@gmail.com', 'Hello@123', '2.jpg'),
(3, 'nikki@gmail.com', 'Hello@123', ''),
(4, 'shikha@gmail.com', 'Hello@123', ''),
(5, 'chiku@gmail.com', 'Hello@123', ''),
(9, 'peeyush@gmail.com', 'Hello@123', '5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crudoprations`
--
ALTER TABLE `crudoprations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crudoprations`
--
ALTER TABLE `crudoprations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
