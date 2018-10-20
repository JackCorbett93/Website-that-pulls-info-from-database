-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2017 at 03:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n00153357`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `dimensions` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `dimensions`, `category`, `price`, `image`) VALUES
(1, 'Wool chair  ', 'This lovely mid century armchair has been given a new lease of life with stripped and revarnished blonde wooden arms and a cosy new coat of fleecy upholstery. The perfect marriage of mid century and scandi style!', '21.5in wide x 31in deep x 33in high back x 17in high seat', 'chair', 125, 'images/Mid.png'),
(2, 'Teak Coffee Table', 'This little mid century coffee table has a solid teak top with a lovely bevelled edge and elegant grey splayed legs. Small, but perfectly formed, it would be a great addition to any living room.', '18in high x 30in wide x 16in deep', 'table', 60, 'images/TeakCoffeeTable.png'),
(3, 'Pye Stereogram', 'This Pye stereogram, model 1214, is a classic piece of mid century furniture...and it works! It has a Garrard 5200 turntable and a LW, MW and FM radio and also great storage for records (or other stuff). As an optional extra we can fit it with a Vamp amplifier so that you can stream music via bluetooth from your phone or other mobile devices.', '46in wide, 16in deep, 24.5in tall', 'others', 215, 'images/PyeStereogram.png'),
(4, 'Tripod Light (purple shade)', 'We modified a wooden artist''s easel to make an elegant tripod floor light. It''s fitted with a brass bayonet switched fitting and wired with vibrant purple fabric covered flex, to tone with the deep purple drum shade.', '55in tall, 16in diameter light, 35in diameter base', 'lighting', 105, 'images/TripodLightpurpleshade.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
