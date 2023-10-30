-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2021 at 07:12 PM
-- Server version: 1.0.417
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `umuhuza`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `catname` varchar(244) NOT NULL,
  `cat_slug` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`, `cat_slug`, `description`, `image`) VALUES
(3, 'Fruits & Juice', 'fruits-juice', '<p>&nbsp;These are&nbsp; bananas; apple; pineapple; pear; berries; grapes; cherry; apricot;</p>\r\n', 'fruits.jpg'),
(4, 'Vegetables', 'vegetables', '<p>In this category we have different types of products such as cabbages, papper, cassava, potatoes, sellery, and many more</p>\r\n', 'vegetables.jpg'),
(5, 'Seeds', 'seeds', '<p>to be planted or To be cooked</p>\r\n', 'seeds.jpg'),
(6, 'Meats', 'meats', '<p>we have different categories of meats such us cow, sheep, pig, goat, rabbit, hen and many kinds</p>\r\n', 'meats.jpg'),
(7, 'Fishes', 'fishes', '<p>aha harimo amoko menshi yamafi aboneka mu rwanda nandi ava hanze</p>\r\n', 'fish.jpg'),
(8, 'Milk', 'milk', '<p>We deliver any kind of milk and other products related to milk or manufactured through</p>\r\n', 'milk.jpg'),
(9, 'PumpKins', 'pumpkins', '<p>Sana</p>\r\n', 'pumpkins.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `transactionId` varchar(266) NOT NULL,
  `userId` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `assignDate` date NOT NULL DEFAULT current_timestamp(),
  UNIQUE KEY `transaction unique constraint` (`transactionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`transactionId`, `userId`, `status`, `assignDate`) VALUES
('Ids^pv2UHEmXKTFdpLdaFzPLkDFqLP', 19, 0, '2021-03-30'),
('W@ao-QtHspFVL-d!-ejegPC3dJzMC9', 15, 1, '2021-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(78) NOT NULL,
  `category_id` int(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `storeid` int(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `storeFK` (`storeid`),
  KEY `categoryFK` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `type`, `storeid`, `description`, `status`, `slug`, `price`, `quantity`, `photo`, `date_view`, `counter`) VALUES
(1, 'Berry', 3, 'Organic', 2, '<p>For Dessert and juice making</p>\r\n', 'sale', 'berry', '200', 6723, 'berry.jpg', '2021-03-30', 2),
(2, 'Potatoes', 4, 'Kinigi', 1, '<p>Those are special category of big size and best irish potatoes</p>\r\n', 'new', 'potatoes', '150', 0, 'potatoes.jpg', '2021-03-30', 2),
(3, 'Loti', 6, 'cow', 2, '<p>tubaha inyama z&#39;iloti zuwo munsi</p>\r\n', 'new', 'loti', '3000', 0, 'loti.jpg', '2021-03-13', 1),
(4, 'Imvange', 6, 'Goat', 1, '<p>zikundwa cyane cyane mu gatogo</p>\r\n', 'new', 'imvange', '2800', 0, 'imvange.jpg', '2021-03-29', 1),
(5, 'Soya', 5, 'Natural', 1, '<p>These soja Are best to be good for kids</p>\r\n', 'new', 'soya', '600', 0, 'pees.jpg', '2021-03-30', 3),
(6, 'Pepper', 4, 'piri piri', 2, '<p>uru rusenda ruboneka cyane mu rwanda</p>\r\n', 'new', 'pepper', '2000', 0, 'pepper.jpg', '2021-03-26', 1),
(7, 'Seabass', 7, 'Hashe', 1, '<p>ubu bwoko bwamafi buva hanze yigihugu kandi bugurishwa muburyo butandukanyeharimo kuba zitarimo amagufa, zikase cg se ziri uko ziri cyaecyaasdhhdj huye cyangwa cyangugu shggfugugrsdbjjgusdudg</p>\r\n', 'new', 'seabass', '2000', 0, 'seabass.jpg', '2021-03-13', 1),
(9, 'Soya Milk', 8, 'Inshyushyu', 1, '<p>Best for kids deases treatment</p>\r\n', 'new', 'soya-milk', '900', 0, 'soya-milk.jpg', '2021-03-29', 1),
(10, 'Cabbages', 4, 'Rounded', 1, '<p>these price can go down according to the season</p>\r\n', 'new', 'cabbages', '100', 530, 'cabbages.jpg', '2021-03-30', 3),
(11, 'Carrots', 4, 'Long Roots', 1, '<p>These products found iin Eastern Province&nbsp;</p>\r\n\r\n<p>They are Known to be the most Delicious</p>\r\n', 'sale', 'carrots', '300', 300, 'carrots.jpg', '0000-00-00', 0),
(12, 'Banana Fiya', 3, 'Traditional ', 2, '<p>For those who suffer from&nbsp;Diabetes it helps to ogment the sugar level</p>\r\n', 'new', 'banana-fiya', '280', 400, 'banana-fiya_1617113856.jpg', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `prod_id` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `transactionId` varchar(266) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `sales_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `prod_id`, `quantity`, `transactionId`, `status`, `sales_date`) VALUES
(1, 17, '5', 2, 'W@ao-QtHspFVL-d!-ejegPC3dJzMC9', 1, '2021-03-29'),
(2, 17, '1', 3, 'W@ao-QtHspFVL-d!-ejegPC3dJzMC9', 1, '2021-03-29'),
(3, 18, '2', 2, 'Ids^pv2UHEmXKTFdpLdaFzPLkDFqLP', 0, '2021-03-30'),
(4, 18, '1', 1, 'Ids^pv2UHEmXKTFdpLdaFzPLkDFqLP', 0, '2021-03-30'),
(5, 18, '5', 1, 'Ids^pv2UHEmXKTFdpLdaFzPLkDFqLP', 0, '2021-03-30'),
(6, 17, '10', 1, '', 0, '2021-03-30'),
(7, 17, '2', 1, '', 0, '2021-03-30'),
(9, 20, '10', 2, '', 0, '2021-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `shipaddress`
--

CREATE TABLE `shipaddress` (
  `address1` varchar(266) NOT NULL,
  `address2` varchar(266) NOT NULL,
  `transactionId` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipaddress`
--

INSERT INTO `shipaddress` (`address1`, `address2`, `transactionId`) VALUES
('Kigali', 'Nyamirambo', 'W@ao-QtHspFVL-d!-ejegPC3dJzMC9'),
('Kigali', 'gikondo', 'Ids^pv2UHEmXKTFdpLdaFzPLkDFqLP'),
('Kanombe', 'Kamashashi', '17'),
('Kimisagara', 'Nyabugogo', '20');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `address`, `contact`) VALUES
(1, 'Carrier', 'Musanze Market', '0786354563'),
(2, 'City delivery', '<p>Nyarugenge/Downtown</p>\r\n', 'city@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'Sam', 'Didier', '', '', 'thanos1.jpg', 1, '', '', '2021-02-01'),
(9, 'harry@den.com', '$2y$10$Oongyx.Rv0Y/vbHGOxywl.qf18bXFiZOcEaI4ZpRRLzFNGKAhObSC', 0, 'Harry', 'Den', 'Silay City, Negros Occidental', '09092735719', 'product-8.jpg', 1, 'k8FBpynQfqsv', 'wzPGkX5IODlTYHg', '2018-05-09'),
(12, 'christine@gmail.com', '$2y$10$ozW4c8r313YiBsf7HD7m6egZwpvoE983IHfZsPRxrO1hWXfPRpxHO', 0, 'Christine', 'becker', 'demo', '7542214500', 'about-1.jpg', 1, '', '', '2018-07-09'),
(13, 'aba1remy@gmail.com', '$2y$10$kVAXhNcZiAV1dtPVjPpX3u4CvObvVKv6Po1UX2X5feCKT39sKINnq', 0, 'Avgan', 'Delsalman', 'Kicukiro, sonatube', '078352533427', 'EstherBlock.png', 1, '', '', '2020-12-08'),
(14, 'manager@manager.com', '$2y$10$9ziy174U8lkq/82zBJ0Iluw3fzWIHV.2P5G.PKC4.1FMWmkyJ80wm', 2, 'Kelly', 'Dina', 'Musanze', '07783734763', 'about-1.jpg', 1, '', '', '0000-00-00'),
(15, 'alhwiclo@gmail.com', '$2y$10$lwj8wZzids78JgtALVpgQeIp6zKvCBjU80XiuZnvNeo/gudeYH/mq', 3, 'Kwizera', 'Peace', 'Musanze, Muko', '+25036235778', 'img-3.jpg', 1, '', '', '2021-03-26'),
(16, 'mukire@rich.com', '$2y$10$uqXg2V.Vug.gTkO7sbgmvOfET75L5AzVDaYSYfbhn1jd9DJvaDILG', 0, 'Mukire', 'Richard', 'Musanze', '03784293', 'person_3.jpg', 1, 'Yp9GawFUmo4A', '', '2021-03-26'),
(17, 'joe@uwineza.com', '$2y$10$I22y9hOEVJogjMi.RnEffuNG8u4w2CmP4tPiKHIUJnpTuGeaPeEp2', 0, 'Joel', 'UWINEZA', 'kigali\r\nRwanda', '0783478665', 'signature.png', 1, 'MJ5ziBb16XPI', '', '2021-03-29'),
(18, 'remy@gmail.com', '$2y$10$uzmbejDxqYl9ul8cXp/ZkehuWfl1aFSV2sT24GvIZuVfhaTikZZMK', 0, 'Abayo', 'remy', 'kigali\r\nRwanda', '0787254817', 'UWINEZA Joel_217182194.jpg', 1, 'MaIv5AVTq3fG', '', '2021-03-30'),
(19, 'diderot@gmail.com', '$2y$10$EWbqEpLUw.tHeouR78sXkOuNaa/04xR0GYJ33/eoM6Mo9NtOKjazq', 3, 'Diderot', 'Munyaneza', 'Musanze, Kinigi', '07844937847', 'about-2.jpg', 1, '', '', '2021-03-30'),
(20, 'bosco@gmail.com', '$2y$10$IvWLG3sbGevthvMkFvhKEOMHSpiMHd5aWDEDxs6uK16KslH2nuQBu', 0, 'Bosco', 'The Maker', 'Kimicanga', '0787254817', 'person_3.jpg', 1, '5sb7QrlxmqYR', '', '2021-03-30');
