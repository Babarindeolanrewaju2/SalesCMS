-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 09:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `city_id`, `photo`, `created_on`) VALUES
(1, 'dwebguru', '$2y$10$MHnfFADXN7rON5R5B1YgouKbbHUOam0NzFZPzvqlgc/GWkTwv5owa', 'Afeez', 'Babatunde', 2, 'avatar.jpg', '2018-04-30'),
(7, 'admin', '$2y$10$6mCJgFHR19zCsuouOVUvo.Jt5WJlVy2kO5ERN06dBA/RH9gPpAoBC', 'Ayuba', 'Kunle', 3, 'me.jpg77123', '2019-07-02'),
(8, 'adejoke', '$2y$10$IITn5dnYKMH/x2x5USDy3eIQg4SQV2Riz0z1ZyKH8ZR5XV7q1gxl6', 'joke', 'Ade', 4, 'IMG_20181003_121148.jpg49129', '2019-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `city_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `region_id`, `city_name`) VALUES
(1, 4, 'Lagos'),
(2, 3, 'Abuja'),
(3, 5, 'Port Harcourt'),
(4, 3, 'Kano');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `city_id` int(11) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `unit_price` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(10) NOT NULL,
  `profit` int(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `city_id`, `product_id`, `unit_price`, `qty`, `total`, `profit`, `user_id`) VALUES
(4857, '2019-03-04', 3, 'VD20615', '12500', 1, 12500, 2500, 7),
(4913, '2019-03-04', 3, 'AH51604', '400', 3, 1200, 300, 7),
(10524, '2019-02-04', 3, 'MX36054', '130', 6, 780, 180, 7),
(12307, '2019-02-04', 3, 'RK06134', '700', 1, 700, 200, 7),
(12751, '2019-04-13', 1, 'WS40126', '350', 1, 350, 150, 1),
(17306, '2019-04-04', 3, 'WS40126', '350', 2, 700, 300, 7),
(30274, '2019-05-04', 3, 'IH12430', '4000', 1, 4000, 500, 7),
(50436, '2019-07-04', 3, 'IZ12346', '40000', 1, 40000, 5000, 7),
(51704, '2019-06-03', 4, 'VS40621', '16500', 1, 16500, 3500, 1),
(51714, '2019-06-20', 2, 'VS40621', '16500', 1, 16500, 3500, 1),
(53120, '2019-02-05', 3, 'PU24360', '1200', 2, 2400, 400, 1),
(53170, '2019-01-03', 2, 'PU24360', '1200', 2, 2400, 400, 7),
(56389, '2019-01-04', 3, 'TB23465', '5000', 2, 10000, 2000, 7),
(62751, '2019-01-03', 3, 'WS40126', '350', 1, 350, 150, 1),
(65783, '2019-07-04', 3, 'TG21043', '130', 3, 390, 90, 7),
(68519, '2019-05-04', 4, 'VD20615', '12500', 2, 25000, 5000, 8),
(82645, '2019-07-03', 4, 'WS40126', '350', 2, 700, 300, 1),
(83645, '2019-04-15', 2, 'WS40126', '350', 2, 700, 300, 7),
(84913, '2019-02-04', 3, 'UW35640', '25500', 1, 25500, 4500, 7),
(94603, '2019-03-01', 1, 'PU24360', '1200', 1, 1200, 200, 1),
(94623, '2019-06-03', 2, 'PU24360', '1200', 1, 1200, 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `cost_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_name`, `cost_price`, `selling_price`, `expire_date`, `created_on`) VALUES
('AH51604', 7, 'Soft Bread', 300, 400, '2022-03-18', '2019-07-04 20:13:39'),
('IF01564', 2, 'HP 650', 30000, 40000, '2026-02-17', '2019-07-02 22:17:34'),
('IH12430', 9, 'Children Wardrobe', 3500, 4000, '2020-12-31', '2019-07-04 20:13:05'),
('IZ12346', 5, 'LG 42 Inc', 35000, 40000, '2024-07-16', '2019-07-04 20:15:11'),
('MX36054', 10, 'Fanta', 100, 130, '2020-07-23', '2019-07-04 20:14:36'),
('PU24360', 5, 'Car Video', 1000, 1200, '2020-12-31', '2019-07-02 19:15:39'),
('RK06134', 3, 'Smart phones & PDAs ', 500, 700, '2022-03-01', '0000-00-00 00:00:00'),
('TB23465', 8, 'HP Power', 4000, 5000, '2020-01-15', '2019-07-04 20:12:12'),
('TG21043', 10, 'Coke', 100, 130, '2021-03-09', '2019-07-04 20:14:14'),
('TU62513', 2, 'Dell Latitude E6530', 20000, 35000, '2019-07-17', '2019-07-02 18:24:15'),
('UW35640', 4, 'Sony Camera 15x', 21000, 25500, '2035-12-01', '2019-07-02 19:38:29'),
('VD20615', 4, 'Monitors', 10000, 12500, '2019-10-17', '2019-07-02 19:21:35'),
('VS40621', 3, 'Nokia 3310', 13000, 16500, '2020-08-19', '2019-07-02 19:24:30'),
('WS40126', 1, 'Bluetooth Headphones', 200, 350, '2020-08-31', '2019-07-02 19:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cat_id`, `cat_name`, `created_on`) VALUES
(1, 'Audio', '2019-07-02'),
(2, 'Computers', '2019-07-02'),
(3, 'Cell phones', '2019-07-02'),
(4, 'Cameras and camcorders', '2019-07-02'),
(5, 'TV and Video', '2019-07-02'),
(6, 'Milk', '2019-07-04'),
(7, 'Biscuit', '2019-07-04'),
(8, 'Bag', '2019-07-04'),
(9, 'Toy', '2019-07-04'),
(10, 'Soft Drink', '2019-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`) VALUES
(3, 'North'),
(4, 'West'),
(5, 'South');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
