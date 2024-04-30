-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 30, 2024 lúc 08:31 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_legoweb_project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(10, 99.00, 'not paid', 1, 1, '1', '1', '2024-04-30 17:40:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 3, '5', 'Lego Minecraft - Abandoned Mine Area', '21166.jpg', 99.00, 1, 1, '2024-04-19 18:16:51'),
(2, 3, '7', 'Lego Minecraft - Battle of the ocean', '21180.jpg', 99.00, 1, 1, '2024-04-19 18:16:51'),
(3, 3, '1', 'Lego Minecraft - Modern Tree House', '21174.jpg', 99.00, 1, 1, '2024-04-19 18:16:51'),
(4, 4, '5', 'Lego Minecraft - Abandoned Mine Area', '21166.jpg', 99.00, 1, 1, '2024-04-19 18:17:05'),
(5, 4, '7', 'Lego Minecraft - Battle of the ocean', '21180.jpg', 99.00, 1, 1, '2024-04-19 18:17:05'),
(6, 4, '1', 'Lego Minecraft - Modern Tree House', '21174.jpg', 99.00, 1, 1, '2024-04-19 18:17:05'),
(7, 5, '7', 'Lego Minecraft - Battle of the ocean', '21180.jpg', 99.00, 1, 1, '2024-04-20 20:23:34'),
(8, 6, '7', 'Lego Minecraft - Battle of the ocean', '21180.jpg', 99.00, 1, 1, '2024-04-20 20:25:38'),
(9, 7, '1', 'Lego Minecraft - Modern Tree House', '21174.jpg', 99.00, 2, 1, '2024-04-28 16:47:33'),
(10, 8, '21', 'Lego City- Police Dog Squad', '60241.jpg', 79.00, 1, 1, '2024-04-29 09:39:05'),
(11, 9, '1', 'Lego Minecraft - Modern Tree House', '21174.jpg', 99.00, 1, 1, '2024-04-30 17:37:33'),
(12, 10, '1', 'Lego Minecraft - Modern Tree House', '21174.jpg', 99.00, 1, 1, '2024-04-30 17:40:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(108) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_image4` varchar(255) DEFAULT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) DEFAULT NULL,
  `product_color` varchar(108) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Lego Minecraft - Modern Tree House', 'LGMC', 'Awesome Toy For Kids', '21174.jpg', '21174-1.jpg', '21174-2.jpg', '21174-3.jpg', 99.99, 0, 'Toy'),
(2, 'Lego Minecraft - Bee house', 'LGMC', 'Awesome Toy For Kids', '21241.jpg', '21241-1.jpg', '21241-2.jpg', '21241-3.jpg', 99.99, 0, 'Toy'),
(3, 'LGMC - Ender Dragon: The Final Battle', 'LGMC', 'Awesome Toy For Kids', '21242.jpg', '21242-1.jpg', '21242-2.jpg', '21242-3.jpg', 99.99, 0, 'Toy'),
(4, 'Lego Minecraft - Bone Demon Dungeon', 'LGMC', 'Awesome Toy For Kids', '21189.jpg', '21189-1.jpg', '21189-2.jpg', '21189-3.jpg', 99.99, 0, 'Toy'),
(5, 'Lego Minecraft - Abandoned Mine Area', 'LGMC', 'Awesome Toy For Kids', '21166.jpg', '21166-1.jpg', '21166-2.jpg', '21166-3.jpg', 99.99, 0, 'Toy'),
(6, 'Lego Minecraft - Creative Box 3.0', 'LGMC', 'Awesome Toy For Kids', '21161.jpg', '21161-1.jpg', '21161-2.jpg', '21161-3.jpg', 99.99, 0, 'Toy'),
(7, 'Lego Minecraft - Battle of the ocean', 'LGMC', 'Awesome Toy For Kids', '21180.jpg', '21180-1.jpg', '21180-2.jpg', '21180-3.jpg', 99.99, 0, 'Toy'),
(8, 'Lego Minecraft - Hell\'s gate', 'LGMC', 'Awesome Toy For Kids', '21172.jpg', '21172-1.jpg', '21172-2.jpg', '21172-3.jpg', 99.99, 0, 'Toy'),
(9, 'Lego Minecraft - Coral', 'LGMC', 'Awesome Toy For Kids', '21164.jpg', '21164-1.jpg', '21164-2.jpg', '21164-3.jpg', 99.99, 0, 'Toy'),
(10, 'Lego Minecraft - Abandoned village', 'LGMC', 'Awesome Toy For Kids', '21190.jpg', '21190-1.jpg', '21190-2.jpg', '21190-3.jpg', 99.99, 0, 'Toy'),
(11, 'Lego Minecraft - Ice castle', 'LGMC', 'Awesome Toy For Kids', '21186.jpg', '21186-1.jpg', '21186-2.jpg', '21186-3.jpg', 99.99, 0, 'Toy'),
(12, 'Lego Minecraft - Bakery', 'LGMC', 'Awesome Toy For Kids', '21184.jpg', '21184-1.jpg', '21184-2.jpg', '21184-3.jpg', 99.99, 0, 'Toy'),
(13, 'Lego StarWars - Obi-Wan Kenobi\'s Jedi spacecraft', 'LGSW', 'Awesome Toy For Kids', '75333.jpg', '75333-1.jpg', '75333-2.jpg', '75333-3.jpg', 99.99, 0, 'Toy'),
(14, 'Lego StarWars - Clone Trooper army', 'LGSW', 'Awesome Toy For Kids', '75359.jpg', '75359-1.jpg', '75359-2.jpg', '75359-3.jpg', 69.99, 0, 'Toy'),
(15, 'Lego StarWars - Luke Skywalker\'s X-wing spacecraft', 'LGSW', 'Awesome Toy For Kids', '75301.jpg', '75301-1.jpg', '75301-2.jpg', '75301-3.jpg', 69.99, 0, 'Toy'),
(16, 'Lego StarWars - Pirate ship', 'LGSW', 'Awesome Toy For Kids', '75346.jpg', '75346-1.jpg', '75346-2.jpg', '75346-3.jpg', 69.99, 0, 'Toy'),
(17, 'Lego StarWars - 501st Clone Troopers', 'LGSW', 'Awesome Toy For Kids', '75345.jpg', '75345-1.jpg', '75345-2.jpg', '75345-3.jpg', 69.99, 0, 'Toy'),
(18, 'Lego StarWars - The Mandalorian & The Child', 'LGSW', 'Awesome Toy For Kids', '75317.jpg', '75317-1.jpg', '75317-2.jpg', '75317-3.jpg', 69.99, 0, 'Toy'),
(19, 'Lego StarWars - Slave I spacecraft', 'LGSW', 'Awesome Toy For Kids', '75312.jpg', '75312-1.jpg', '75312-2.jpg', '75312-3.jpg', 69.99, 0, 'Toy'),
(20, 'Lego StarWars - Snowtrooper army', 'LGSW', 'Awesome Toy For Kids', '75320.jpg', '75320-1.jpg', '75320-2.jpg', '75320-3.jpg', 69.99, 0, 'Toy'),
(21, 'Lego City- Police Dog Squad', 'LGCT', 'Awesome Toy For Kids', '60241.jpg', '60241-1.jpg', '60241-2.jpg', '60241-3.jpg', 79.99, 0, 'Toy'),
(22, 'Lego City - Advent Calendar Christmas', 'LGCT', 'Awesome Toy For Kids', '60303.jpg', '60303-1.jpg', '60303-2.jpg', '60303-3.jpg', 72.99, 0, 'Toy'),
(23, 'Lego City - People Pack - Fun Fair', 'LGCT', 'Awesome Toy For Kids', '60234.jpg', '60234-1.jpg', '60234-2.jpg', '60234-3.jpg', 72.99, 0, 'Toy'),
(24, 'Lego City - Donut shop opening', 'LGCT', 'Awesome Toy For Kids', '60233.jpg', '60233-1.jpg', '60233-2.jpg', '60233-3.jpg', 119.99, 0, 'Toy'),
(25, 'Lego City - Garage Center', 'LGCT', 'Awesome Toy For Kids', '60232.jpg', '60232-1.jpg', '60232-2.jpg', '60232-3.jpg', 69.99, 0, 'Toy'),
(26, 'Lego City - Fire Chief Response Truck', 'LGCT', 'Awesome Toy For Kids', '60231.jpg', '60231-1.jpg', '60231-2.jpg', '60231-3.jpg', 89.99, 0, 'Toy'),
(27, 'LGCT - Space Research and Development', 'LGCT', 'Awesome Toy For Kids', '60230.jpg', '60230-1.jpg', '60230-2.jpg', '60230-3.jpg', 69.99, 0, 'Toy'),
(28, 'LGCT - Rocket Assembly & Transport', 'LGCT', 'Awesome Toy For Kids', '60229.jpg', '60229-1.jpg', '60229-2.jpg', '60229-3.jpg', 59.99, 0, 'Toy'),
(29, 'LGNJ - Castle of the Forsaken Emperor', 'LGNJ', 'Awesome Toy For Kids', '70678.jpg', '70678-1.jpg', '70678-2.jpg', '70678-3.jpg', 199.99, 0, 'Toy'),
(30, 'LGNJ - Land Bounty', 'LGNJ', 'Awesome Toy For Kids', '70677.jpg', '70677-1.jpg', '70677-2.jpg', '70677-3.jpg', 129.99, 0, 'Toy'),
(31, 'Lego Friends - Rescue Mission Boat', 'LGF', 'Awesome Toy For Kids', '41381.jpg', '41381-1.jpg', '41381-2.jpg', '41381-3.jpg', 29.99, 0, 'Toy'),
(32, 'LGF - Lighthouse Rescue Center', 'LGF', 'Awesome Toy For Kids', '41380.jpg', '41380-1.jpg', '41380-2.jpg', '41380-3.jpg', 49.99, 0, 'Toy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(108) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'manh', 'dm1234@gmail.com', '1461dfa1320ffedf3e79b7d6c0aeba3e');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
