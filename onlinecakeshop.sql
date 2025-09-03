-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2025 at 01:12 AM
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
-- Database: `onlinecakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_admin_registrations`
--

CREATE TABLE `cake_shop_admin_registrations` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_admin_registrations`
--

INSERT INTO `cake_shop_admin_registrations` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(2, 'aadmin', 'rida86234@gmail.com', 'admin0');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_category`
--

CREATE TABLE `cake_shop_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_category`
--

INSERT INTO `cake_shop_category` (`category_id`, `category_name`, `category_image`) VALUES
(1, '𝐂𝐀𝐊𝐄', '240728082956.jfif'),
(2, '𝐏𝐀𝐒𝐓𝐑𝐈𝐄𝐒', '240728083010.jfif'),
(3, '𝐂𝐎𝐎𝐊𝐈𝐄𝐒', '240728083034.jpg'),
(4, '𝐏𝐔𝐅𝐅𝐒', '240728083106.jpg'),
(5, '𝐃𝐎𝐍𝐔𝐓𝐒', '240728083148.jpg'),
(6, '𝐈𝐂𝐄-𝐂𝐑𝐄𝐀𝐌𝐒', '240728083221.jfif'),
(7, '𝐒𝐖𝐄𝐄𝐓𝐒', '240728083242.jfif'),
(9, '𝐒𝐀𝐍𝐃𝐖𝐈𝐂𝐇𝐄𝐒', '240728083510.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_orders`
--

CREATE TABLE `cake_shop_orders` (
  `orders_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_orders`
--

INSERT INTO `cake_shop_orders` (`orders_id`, `users_id`, `delivery_date`, `payment_method`, `total_amount`) VALUES
(1, 2, '2020-08-09', 'Cash', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_orders_detail`
--

CREATE TABLE `cake_shop_orders_detail` (
  `orders_detail_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_orders_detail`
--

INSERT INTO `cake_shop_orders_detail` (`orders_detail_id`, `orders_id`, `product_name`, `quantity`) VALUES
(1, 1, 'Red velvet', 1),
(2, 1, 'Oreo', 1),
(3, 2, 'Oreo', 1),
(4, 2, 'Black forest', 1),
(5, 2, 'Red velvet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_product`
--

CREATE TABLE `cake_shop_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_product`
--

INSERT INTO `cake_shop_product` (`product_id`, `product_name`, `product_category`, `product_price`, `product_description`, `product_image`) VALUES
(1, 'Pineapple Cake', 1, '800', 'This mouthwatering creation features a soft, fluffy cake infused with the vibrant flavor of ripe pineapples.', '2407280840340.webp'),
(2, 'Red velvet', 1, '800', 'This sumptuous cake boasts a rich, velvety texture with a deep crimson hue that’s as captivating as its taste.', '2007310439020.jpg, 2007310439021.jpg, 2007310439022.jpg'),
(3, 'Black forest', 1, '900', 'Savor the classic charm of our Black Forest Cake, a decadent delight that combines rich layers of chocolate sponge cake with luscious, juicy cherries.', '2007310440210.jpg, 2007310440211.jpg, 2007310440212.jpg'),
(4, 'Oreo', 1, '800', 'Dive into the ultimate indulgence with our Oreo Cake, a dessert that takes your love for cookies and cream to the next level', '2007310441020.jpg, 2007310441021.jpg, 2007310441022.jpg'),
(5, 'Choclate Pastry', 2, '150', 'Buttery, flaky pastry shell that’s perfectly golden and crisp.', '2407281001080.jpeg'),
(6, 'Strawberry Chocolate Pastry', 2, '150', 'Delight in a harmonious blend of fruity and chocolaty goodness with our Strawberry Chocolate Pastry.', '2407281004090.png'),
(7, 'Pineapple ', 2, '150', 'Savor a taste of the tropics with our Tropical Pineapple Pastries.', '2407281006560.webp'),
(8, 'Choco chips', 3, '050', 'Enjoy a timeless treat with our Classic Choco Chips Cookies', '2007310445280.jpg'),
(9, 'Peanut Butter ', 3, '050', 'Delight in the rich, nutty flavor of our Irresistible Peanut Butter Cookies.', '2407281009580.jpg'),
(10, 'Nutella Chocoalte Stuffed ', 3, '060', 'Experience pure indulgence with our Nutella Chocolate-Stuffed Cookies.', '2407281011550.webp'),
(11, 'Veg', 4, '200', 'Discover the perfect blend of savory and satisfying with our Flavorful Veg Puffs.', '2407281017180.jpg'),
(12, 'Cream Puffs', 4, '200', 'Our cream is expertly crafted to be smooth and rich, with just the right amount of sweetness.', '2407281018350.jpg'),
(13, 'Chocolate Donut', 5, '170', 'The donut is crafted with high-quality cocoa to ensure a deep, intense chocolate flavor, and topped with a sprinkle', '2407281021370.jfif'),
(14, 'Pink vanilla', 5, '170', 'The donut’s golden-brown exterior is perfectly complemented by the smooth, glossy glaze, which adds a hint of vanilla and a touch of sweetness', '2407281024400.jfif'),
(15, 'Boston cream doughnut', 5, '180', 'Indulge in a timeless favorite with our Classic Boston Cream Doughnut', '2407281028300.jpg'),
(16, 'Feast', 6, '90', 'Each bite offers a delightful contrast of textures and flavors.', '2407281030090.webp'),
(17, 'Gulab jamun', 7, '400', 'These delicious treats are made from milk solids (often khoya or mawa), which are formed into small balls, deep-fried until golden brown, and then soaked in a fragrant sugar syrup.', '2407290614230.jpg'),
(18, 'Besan barfi', 7, '400', 'Besan barfi is cherished for its rich, nutty flavor and slightly crumbly texture. ', '2407290618040.jpg'),
(19, 'White gulab jamun', 7, '400', 'While the classic gulab jamun is deep brown or reddish-brown due to caramelization during frying, white gulab jamun maintains a pale, ivory color.', '2407290620100.webp'),
(20, 'Gourmet Mauj Mango Drink', 8, '150', 'Gourmet Mauj Mango Drink is a premium beverage that showcases the rich and tropical flavor of mangoes.', '2407290632120.jpg'),
(21, 'Gourmet cola', 8, '100', 'Gourme Cola is crafted to offer a more sophisticated and unique cola experience.', '2407290634240.jpg'),
(22, 'Fizup', 8, '100', 'Fizup is a brand that offers a range of sparkling beverages with a focus on high-quality ingredients and distinctive flavors.', '2407290636270.webp'),
(23, 'Club Sandwich', 9, '200', 'The club sandwich is a classic and popular sandwich known for its hearty layers and versatile fillings. ', '2407290639110.jfif'),
(24, 'Mayonnaise Sandwich', 9, '200', 'A mayonnaise sandwich is a simple yet versatile sandwich that highlights the creamy, tangy flavor of mayonnaise.', '2407290809230.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_users_registrations`
--

CREATE TABLE `cake_shop_users_registrations` (
  `users_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `otp_expiry` datetime DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `users_username` varchar(100) NOT NULL,
  `users_email` varchar(150) NOT NULL,
  `users_password` varchar(100) NOT NULL,
  `users_mobile` varchar(50) NOT NULL,
  `users_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake_shop_users_registrations`
--

INSERT INTO `cake_shop_users_registrations` (`users_id`, `otp`, `otp_expiry`, `createdAt`, `updatedAt`, `users_username`, `users_email`, `users_password`, `users_mobile`, `users_address`) VALUES
(1, 0, NULL, '2025-08-31 15:57:19', '2025-08-31 15:58:23', 'fami', 'f7057945@gmail.com', 'b2a9a16d67bddbb905264b3136f3c831', '03231543530', 'dhok bnaras'),
(2, 0, NULL, '2025-08-31 16:00:02', '2025-08-31 16:11:09', 'alina', 'alinaftma345@gmail.com', '8659d1803b968151628dbbdb4428a857', '03215531231', 'shalley valley range road');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake_shop_admin_registrations`
--
ALTER TABLE `cake_shop_admin_registrations`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cake_shop_category`
--
ALTER TABLE `cake_shop_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cake_shop_orders`
--
ALTER TABLE `cake_shop_orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `cake_shop_orders_detail`
--
ALTER TABLE `cake_shop_orders_detail`
  ADD PRIMARY KEY (`orders_detail_id`);

--
-- Indexes for table `cake_shop_product`
--
ALTER TABLE `cake_shop_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `cake_shop_users_registrations`
--
ALTER TABLE `cake_shop_users_registrations`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake_shop_admin_registrations`
--
ALTER TABLE `cake_shop_admin_registrations`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cake_shop_category`
--
ALTER TABLE `cake_shop_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cake_shop_orders`
--
ALTER TABLE `cake_shop_orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cake_shop_orders_detail`
--
ALTER TABLE `cake_shop_orders_detail`
  MODIFY `orders_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cake_shop_product`
--
ALTER TABLE `cake_shop_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cake_shop_users_registrations`
--
ALTER TABLE `cake_shop_users_registrations`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
