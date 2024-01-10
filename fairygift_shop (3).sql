-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 08:55 AM
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
-- Database: `fairygift_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Product_ID` int(255) NOT NULL,
  `Product_Price` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Weight` varchar(255) NOT NULL,
  `Flavour` varchar(255) NOT NULL,
  `Shape` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `orphanage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `Gift_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Order_ID` int(255) NOT NULL,
  `G_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `maincategory`
--

CREATE TABLE `maincategory` (
  `MC_ID` int(11) NOT NULL,
  `MC_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maincategory`
--

INSERT INTO `maincategory` (`MC_ID`, `MC_Name`) VALUES
(1, ' Birthday'),
(2, ' Anniversary'),
(3, ' Valentinesday'),
(4, ' Wedding'),
(5, ' Best wishes'),
(6, ' Same Day Delivery'),
(7, ' Next Day Delivery'),
(8, ' Offer Products'),
(9, ' Latest Products'),
(10, ' Orphanage');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Message_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_ID`, `User_ID`, `message`, `image`) VALUES
(25, 29, 'hello, can i get these cup cakes?', 'cupcake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `purchase_type` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_number` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_city` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_number` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `receiver_city` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `special_note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `personal_note` varchar(255) NOT NULL,
  `order_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `Order_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'success',
  `G_Total` int(255) NOT NULL,
  `products` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `User_ID`, `purchase_type`, `sender_name`, `sender_number`, `sender_email`, `sender_city`, `receiver_name`, `receiver_number`, `receiver_email`, `receiver_address`, `receiver_city`, `delivery_date`, `delivery_time`, `special_note`, `image`, `personal_note`, `order_datetime`, `Order_status`, `payment_status`, `G_Total`, `products`) VALUES
(74, 27, 'Send as a Gift', 'kube', '0775625511', 'udayakumarsharmini99@gmail.com', 'matale', 'sajeevini', '0771234565', 'udayakumarsajeevini@gmail.com', '32/32, river side road, kaludawela, colombo', 'colombo', '2022-09-30', '16:11:00', '', '', '', '2022-09-07 12:11:10', '', 'success', 3800, 'Little girl with balloons Cake Theme<br>Quantity:1<br>weight:1kg <br>Flavour:vanila<br>Shape:Round<br>Age:10<br>Color:<br> ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(255) NOT NULL,
  `SC_ID` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Price` varchar(255) NOT NULL,
  `Product_Quote` varchar(255) NOT NULL,
  `Product_Details` varchar(255) NOT NULL,
  `Product_Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `SC_ID`, `Product_Name`, `Product_Price`, `Product_Quote`, `Product_Details`, `Product_Image`) VALUES
(271, 1, ' Tom and Jerry', '4000', 'Tom and Jerry Theme cake', '    Tom and Jerry Theme cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.      ', 'baby_boy_2.jpg'),
(273, 1, ' frozen cake', '4000', 'Frozen Blue Theme Cake', ' Frozen Theme cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'baby-girl-4.jpg'),
(275, 1, ' minion cake', '3900', 'Minion Theme Cake', ' minion Theme cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'baby_boy_9.jpg'),
(276, 1, ' balloon theme', '3800', 'Little girl with balloons Cake Theme', ' little girl with balloons Theme cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'baby-girl-1.jpg'),
(278, 1, ' Cake for DAD', '3700', 'Cake For Father', '  cake for father. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'elder-men-5.jpg'),
(279, 1, ' cake for mom', '4000', 'Cake for Mother', ' cake for mother. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'elder-women-1.jpg'),
(280, 1, ' Butterscotch Cake', '4000', 'Butterscotch Cake', ' butterscotch cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'butterscotch_01.jpg'),
(281, 1, ' Black Forest Cake', '3900', 'Black Forest Cake', ' Black forest cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'blackforest_01.jpg'),
(282, 1, ' 21st birthday cake', '3600', '21st birthday cake for boy', ' 21st birthday cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'adult-boy-10.jpg'),
(283, 1, ' 21st birthday cake', '4000', '21st birthday cake for girl', ' 21st birthday cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'adult-girl-5.jpg'),
(284, 2, ' Flower bouquet', '3500', 'Berry blooms flower', '   This floral bouquet represents naturalistic beauty and vintage charm. wrapped in a pinky color wrapping. includes 4 pink roses.4 gerberas, chrysanthemums, golden rods and filling flowers.', 'flower_bouquet_01.jpg'),
(285, 2, ' rose flower bouquet', '4000', 'Rose flower bouquet', ' This floral bouquet represents naturalistic beauty and vintage charm. wrapped in a brown color wrapping. includes 10 red roses with green leaves', 'flowerbouquet_02.jpg'),
(286, 2, ' Flower bouquet', '4500', 'Eternal Sunshine Large flower bouquet', ' This floral bouquet represents naturalistic beauty and vintage charm. wrapped in a brown color wrapping. includes chrysanthemums, green leaves ,golden rods and filling flowers.', 'flower_bouquet_03.jpg'),
(287, 2, ' flower basket', '3500', 'Multi flower Basket', ' This floral basket represents naturalistic beauty and vintage charm. includes chrysanthemums, green leaves ,golden rods and filling flowers.', 'flowerbasket_01.jpg'),
(288, 2, ' flower basket', '4000', 'Rose Flower Basket ', '   This floral basket represents naturalistic beauty and vintage charm. includes rose flowers, green leaves ,golden rods and filling flowers.', 'flowerbasket_05.jpg'),
(289, 2, ' flower basket', '4000', 'Flower Basket For mom', '  This floral basket represents naturalistic beauty and vintage charm. includes chrysanthemums, green leaves ,golden rods and filling flowers.', 'flowerbasket_02.jpg'),
(290, 3, ' Chocolate bouquets', '5500', 'Dairy Milk Chocolate Bouquet', '  This chocolate bouquet includes 15 dairy milk chocolates with different sizes', 'chocobouquet_01.jpg'),
(291, 3, ' Chocolate bouquets', '4000', 'Snickers chocolates bouquet', '  This chocolate bouquet includes 10 snickers chocolates with different same size', 'chocbouquet_02.jpg'),
(292, 3, ' Chocolate bouquets', '3800', 'KitKat chocolates bouquet', ' This chocolate bouquet includes 8 same size snickers chocolates with black wrapping paper.', 'chocobouquet_03.jpg'),
(293, 3, ' chocolate basket', '5000', 'Multi chocolate basket', '   This chocolates basket includes variety of chocolate brans with different sizes', 'chocobox_01.jpg'),
(294, 3, ' chocolate basket', '4800', 'Kit-Kat Chocolate box', '  This chocolates box includes Kit-Kat chocolate brands with heart shaped chocolates', 'chocobox_03.jpg'),
(295, 3, ' chocolate basket', '4000', 'Dairy Milk Chocolate Box', ' This chocolates box includes 12  dairy milk chocolates.', 'chocobox_04.jpg'),
(296, 4, ' Mug', '750', 'Kid Photo printed  Mug ', ' photo which you wish can be printed in a white mug. mug color can be customized. you should upload a pic and quote when you order.', 'PG_01.jpg'),
(297, 4, ' mug', '750', 'Photo Printed Mug', '   photo which you wish can be printed in a black mug. mug color can be customized. you should upload a pic and quote when you order.  ', 'pg_02.jpg'),
(298, 4, ' Mug', '750', 'Quote Printed Mug', '  Quote which you wish can be printed in a white mug. mug color can be customized. you should upload a  quote when you order.  ', 'PG_03.jpg'),
(299, 4, ' Cushion', '2750', 'Photo printed Cushion', '  photo which you wish can be printed in a cushion. cushion color can be customized. you should upload a pic and quote when you order.', 'PG_05.jpg'),
(300, 4, ' Cushion', '2750', 'Kid Photo printed Cushion', '   photo which you wish can be printed in a cushion. cushion color can be customized. you should upload a pic and quote when you order.  ', 'PG_06.jpg'),
(301, 4, ' Cushion', '2750', 'Quote printed Cushion', ' Quote which you wish can be printed in a cushion. cushion color can be customized. you should upload a pic and quote when you order.', 'PG_07.jpg'),
(302, 4, ' Pencil Sketch', '3000', 'Pencil sketch of 2 people', ' photo which you wish can be sketch in pencil. paper size  can be customized. you should upload a pic and quote when you order.', 'PG_11.jpg'),
(303, 4, ' Pencil sketch', '3000', 'Pencil sketch of Boy', ' photo which you wish can be sketch in pencil. paper size  can be customized. you should upload a pic and quote when you order. ', 'PG_13.jpg'),
(304, 4, ' Pencil Sketch', '3000', 'Pencil sketch of Girl', '  photo which you wish can be sketch in pencil. paper size  can be customized. you should upload a pic and quote when you order.', 'PG_09.jpg'),
(305, 30, ' cake', '2800', 'Music Theme Cake', ' Tom and Jerry Theme cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'adult-girl-8.jpg'),
(306, 30, ' cake', '2950', 'cake for girl', '  cake for girl. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'adult-girl-10.jpg'),
(307, 30, ' cake', '2750', 'cake for kids', ' cake for kids. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'baby-girl-5.jpg'),
(308, 30, ' cake', '2675', 'Cricket Playground Theme', ' cricket playground Theme cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'adult-boy-6.jpeg'),
(309, 30, ' Chocolates', '2500', 'Multi chocolate basket', ' Multi chocolate basket. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'chocobox_02.jpg'),
(310, 30, ' Flower bouquet', '2675', 'Multi flowers bouquet', '  This floral bouquet represents naturalistic beauty and vintage charm. wrapped in a pinky color wrapping. includes 4 pink roses.4 gerberas, chrysanthemums, golden rods and filling flowers.', 'flower_bouquet_05.jpg'),
(311, 30, ' Mug', '500', 'Photo Printed Mug', ' photo which you wish can be printed in a black mug. mug color can be customized. you should upload a pic and quote when you order', 'PG_04.jpg'),
(312, 30, ' Cushion', '1500', 'Photo printed Cushion', ' Quote which you wish can be printed in a cushion. cushion color can be customized. you should upload a pic and quote when you order', 'PG_07.jpg'),
(313, 31, ' Fruit Cake', '2750', 'Fruit cake with Chocolate Drip', ' fruit cake with chocolate drip. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'fruitcake_03.jpg'),
(314, 31, ' Butterscotch Cake', '3000', 'Butterscotch Cake', ' butter scotch cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'butterscotch_03.jpg'),
(315, 31, ' Red velvet Cake', '2850', 'Red velvet cake', ' red velvet cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'redvelvet_01.jpg'),
(316, 31, ' Fruit Cake', '2800', 'Fruit cake with white cream', ' Fruit cake with white cream. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'fruitcake_01.jpg'),
(317, 31, ' Butterscotch Cake', '3500', 'Butterscotch Cake', ' butterscotch cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'butterscotch_02.jpg'),
(318, 31, ' Black Forest Cake', '3500', 'Black Forest Cake', ' blackforest cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'blackforest_03.jpg'),
(319, 31, ' Doraemon cake', '4000', 'Doraemon Theme cake', ' Doraemon Theme cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'baby_boy_4.jpg'),
(320, 31, ' Red velvet Cake', '3900', 'Red velvet cake', ' red velvet cake. All fondant decorations on the cake are handmade, and edible. weight ,color, flavor and year can be customized.', 'redvelvet_02.jpg'),
(321, 8, ' Cup Cakes', '170', 'Cup Cakes for orphanage children', ' you can order cup cakes for orphanage children', 'cupcake.jpg'),
(322, 8, ' Cake Pieces', '160', 'Cake Pieces for orphanage children', ' you can order cup cakes for orphanage children', 'cake-pieces.jpg'),
(323, 8, ' Chocolates', '50', 'Chocolates for orphanage children', '  you can chocolates for orphanage children', 'Chocolates.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `User_ID`, `review`) VALUES
(1, 27, 'good service on time! reasonable price.'),
(2, 27, 'good service! hope to order soon!!');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `SC_ID` int(11) NOT NULL,
  `Subcategory` varchar(255) NOT NULL,
  `MC_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`SC_ID`, `Subcategory`, `MC_ID`) VALUES
(1, ' Birthday - cake', 1),
(2, '  Birthday - Flowers', 1),
(3, '  Birthday - Chocolates', 1),
(4, ' Birthday - Personalized Gifts', 1),
(8, ' Orphanage - candy', 10),
(9, ' Anniversary -Cake', 2),
(10, ' Anniversary - Flowers', 2),
(11, ' Anniversary - Personalized Gifts', 2),
(12, ' Anniversary - Chocolates', 2),
(13, 'Valentines - Cake', 3),
(14, 'Valentines - Flowers', 3),
(15, 'Valentines - Personalized Gifts', 3),
(16, 'Valentines - Chocolates', 3),
(17, 'Wedding - Flowers', 4),
(18, 'Wedding - Personalized Gifts', 4),
(19, 'Best Wishes - Cake', 5),
(20, 'Best Wishes - Flowers', 5),
(21, 'Best Wishes - Chocolates', 5),
(22, 'NDD - cake', 7),
(23, 'NDD - Flowers', 7),
(24, 'NDD - Personalized Gifts', 7),
(25, 'NDD - Chocolates', 7),
(26, 'SDD - Cake', 6),
(27, 'SDD - Flowers', 6),
(28, 'SDD - Personalized Gifts', 6),
(29, 'SDD - Chocolates', 6),
(30, 'Offer', 8),
(31, ' Latest Products', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `User_Type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `User_Type`) VALUES
(22, 'Admin', 'fairyadmin@gmail.com', '63629c88226bcc9d0b2940fc1e10228e', 'Admin'),
(27, 'sharmi', 'udayakumarsharmini99@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(29, 'Sajeevini', 'UdayakumarSajeevini@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `W_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Product_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_ID`),
  ADD KEY `cforigen` (`Product_ID`),
  ADD KEY `cforigen2` (`User_ID`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`Gift_ID`),
  ADD KEY `gf1` (`User_ID`),
  ADD KEY `gf2` (`Order_ID`);

--
-- Indexes for table `maincategory`
--
ALTER TABLE `maincategory`
  ADD PRIMARY KEY (`MC_ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Message_ID`),
  ADD KEY `mforigen` (`User_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `orderf` (`User_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `scpforigen` (`SC_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `rf` (`User_ID`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`SC_ID`),
  ADD KEY `scforigen` (`MC_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`W_ID`),
  ADD KEY `Forigen` (`Product_ID`),
  ADD KEY `Forigen2` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `Gift_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `maincategory`
--
ALTER TABLE `maincategory`
  MODIFY `MC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Message_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `SC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `W_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cforigen` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cforigen2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `gifts`
--
ALTER TABLE `gifts`
  ADD CONSTRAINT `gf1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gf2` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `mforigen` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orderf` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `scpforigen` FOREIGN KEY (`SC_ID`) REFERENCES `subcategory` (`SC_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `rf` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `scforigen` FOREIGN KEY (`MC_ID`) REFERENCES `maincategory` (`MC_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `Forigen` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Forigen2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
