-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2021 at 12:59 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immobilier`
--

-- --------------------------------------------------------

--
-- Table structure for table `logements`
--

CREATE TABLE `logements` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `city_code` char(5) NOT NULL,
  `surface` varchar(4) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logements`
--

INSERT INTO `logements` (`id`, `titre`, `address`, `city`, `city_code`, `surface`, `price`, `photo`, `type`, `description`) VALUES
(13, 'Superbe Maison', '145 rue des accacias', 'Macon', '71000', '165', '545000', 'C:\\Users\\teddy\\AppData\\Local\\Temp\\php7ECD.tmp', 'vente', 'Maison chic trés bien décoré'),
(14, 'Appartemnt luxueux', '24 ru de Paris', 'Dijon', '21000', '125', '358000', 'C:\\Users\\teddy\\AppData\\Local\\Temp\\php53A2.tmp', 'location', 'Plein centre-ville'),
(15, 'Grande maison avec piscine', '22 rue des plaines', 'Paray le Monial', '71600', '184', '253000', '', 'vente', 'Grande maison avec terrain'),
(16, 'Appartement', '14 rue des mésanges', 'Macon', '71000', '94', '199000', 'C:\\Users\\teddy\\AppData\\Local\\Temp\\php733E.tmp', 'vente', 'Bel appartement');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logements`
--
ALTER TABLE `logements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
