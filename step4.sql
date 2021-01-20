-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Oca 2021, 21:06:47
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `step4`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket`
--

CREATE TABLE `basket` (
  `basket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_cost` double DEFAULT NULL,
  `num_of_products` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `basket`
--

INSERT INTO `basket` (`basket_id`, `user_id`, `total_cost`, `num_of_products`) VALUES
(201, 1, 30, 4),
(202, 2, 50, 5),
(203, 3, 60, 6),
(204, 4, 25, 2),
(205, 5, 40, 5),
(206, 6, 35, 2),
(207, 7, 75, 3),
(208, 8, 32, 4),
(209, 9, 30.99, 1),
(210, 10, 45.99, 1),
(211, 11, 100, 1),
(212, 12, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basketproducts`
--

CREATE TABLE `basketproducts` (
  `basket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `countt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `basketproducts`
--

INSERT INTO `basketproducts` (`basket_id`, `user_id`, `product_id`, `countt`) VALUES
(201, 1, 503, 4),
(202, 2, 502, 5),
(203, 3, 502, 6),
(204, 4, 503, 1),
(204, 4, 510, 1),
(205, 5, 509, 5),
(206, 6, 510, 2),
(207, 7, 506, 3),
(208, 8, 509, 4),
(209, 9, 504, 1),
(210, 10, 507, 1),
(211, 11, 501, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Drinks'),
(2, 'Food'),
(3, 'Personal Care'),
(4, 'Stationery'),
(5, 'Toys'),
(6, 'Clothing');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `user_comment` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`user_comment`, `user_id`, `product_id`) VALUES
('insallah indirime girer', 1, 507),
('flavor tastes too artificial', 3, 502),
('insallah indirime girer', 4, 508),
('cok guzel artik hep alirim', 5, 509),
('color is not as vibrant as it looks here', 7, 506),
('cok guzel artik hep alirim', 8, 509),
('price is too high', 9, 505),
('it caused allergy I regret buying it', 10, 501),
('cok guzel artik hep alirim', 10, 507),
('I hope it will get on sale soon', 10, 508),
('umarim indirime girer', 11, 509);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_sum` double DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_date`, `invoice_address`, `invoice_sum`, `order_id`, `user_id`) VALUES
(401, '2020-03-03', 'A Street', 30, 301, 1),
(402, '2020-12-15', 'B Street', 50, 302, 2),
(403, '2020-12-15', 'C Street', 60, 303, 3),
(404, '2020-10-20', 'D Street', 25, 304, 4),
(405, '2020-11-23', 'E Street', 40, 305, 5),
(406, '2019-02-02', 'F Street', 35, 306, 6),
(407, '2020-05-01', 'G Street', 75, 307, 7),
(408, '2020-12-10', 'H Street', 32, 308, 8),
(409, '2020-12-11', 'I Street', 30.99, 309, 9),
(410, '2020-10-13', 'J Street', 45.99, 310, 10),
(411, '2020-08-08', 'K Street', 100, 311, 11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `manager_password` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_first_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_last_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_password`, `manager_first_name`, `manager_last_name`) VALUES
(1, 'sari', 'Ayse', 'Yalcin'),
(2, 'yesil', 'Selim', 'Gursoy'),
(3, 'pembe', 'Fatih', 'Terim'),
(4, 'beyaz', 'Ahmet', 'Cakar'),
(5, 'siyah', 'Sinan', 'Engin'),
(6, 'koyuyesil', 'Nilufer', 'Yilmaz'),
(7, 'lacivert', 'Meltem', 'Koc'),
(8, 'mavi', 'Ali', 'Can'),
(9, 'kirmizi', 'Kemal', 'Noyan'),
(10, 'mor', 'Mark', 'Zuckerberg'),
(11, 'turuncu', 'Jeff', 'Bezos'),
(12, 'erguvan', 'Elon', 'Musk');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orderedbasketproducts`
--

CREATE TABLE `orderedbasketproducts` (
  `basket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_price` double DEFAULT NULL,
  `counttt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `orderedbasketproducts`
--

INSERT INTO `orderedbasketproducts` (`basket_id`, `user_id`, `order_id`, `product_id`, `total_price`, `counttt`) VALUES
(201, 1, 301, 503, 30, 4),
(202, 2, 302, 502, 50, 5),
(203, 3, 303, 502, 60, 6),
(204, 4, 304, 503, 7.5, 1),
(204, 4, 304, 510, 17.5, 1),
(205, 5, 305, 509, 40, 5),
(206, 6, 306, 510, 35, 2),
(207, 7, 307, 506, 75, 3),
(208, 8, 308, 509, 32, 4),
(209, 9, 309, 504, 30.99, 1),
(210, 10, 310, 507, 45.99, 1),
(211, 11, 311, 501, 100, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `place_order`
--

CREATE TABLE `place_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `basket_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `place_order`
--

INSERT INTO `place_order` (`order_id`, `user_id`, `manager_id`, `basket_id`, `order_date`, `order_status`) VALUES
(301, 1, 1, 201, '2020-03-03', 'delivered'),
(302, 2, 2, 202, '2020-12-15', 'ordered'),
(303, 3, 3, 203, '2020-12-15', 'ordered'),
(304, 4, 4, 204, '2020-10-20', 'delivered'),
(305, 5, 5, 205, '2020-11-23', 'delivered'),
(306, 6, 6, 206, '2019-02-02', 'delivered'),
(307, 7, 7, 207, '2020-05-01', 'delivered'),
(308, 8, 8, 208, '2020-12-10', 'shipped'),
(309, 9, 9, 209, '2020-12-11', 'shipped'),
(310, 10, 10, 210, '2020-10-13', 'delivered'),
(311, 11, 11, 211, '2020-08-08', 'delivered');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(2,1) DEFAULT NULL,
  `product_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `price`, `brand`, `rating`, `product_picture`) VALUES
(501, 'Color 5 Dark Brown Hair Dye', 'Does not contain harmful chemicals', 100, 'Phyto', 4.5, 'https://cdn.dsmcdn.com/mnresize/415/622/Assets/ProductImages/oa/54/897776/3/0618059109843_1_org_zoom.jpg'),
(502, 'Spicy Ketchup', 'made with 100% organic tomatoes', 10, 'Heinz', 4.8, 'https://images-na.ssl-images-amazon.com/images/I/71b2jDPXtGL._SL1500_.jpg'),
(503, 'Strawberry Flavored Yogurt', 'Unique strawberry flavor', 7.5, 'Sek', 3.8, 'https://reimg-carrefour.mncdn.com/mnresize/600/600/productimage/30148872/30148872_0_MC/8797232332850_1502188408175.jpg'),
(504, 'Toy Car Set', '1 blue, 1 orange, 1 black toy cars', 30.99, 'Hot Wheels', 4.7, 'https://images-na.ssl-images-amazon.com/images/I/61xa7NXlFqL._AC_SY450_.jpg'),
(505, 'A4 Striped Notebook', '160 page', 20, 'Gipta', 4.6, 'https://productimages.hepsiburada.net/s/39/375/10617553551410.jpg'),
(506, 'Scotch Plaid Shirt', '100% cotton', 25, 'Koton', 4.0, 'https://ktnimg.mncdn.com/mnresize/1500/1969/product-images/0KAK62145UWP51/1500Wx1969H/0KAK62145UWP51_G03_zoom3_V01.jpg'),
(507, 'Cold Pressed Coconut Oil', 'No added flavor, 100% natural', 45.99, 'Organicum', 5.0, 'https://images-na.ssl-images-amazon.com/images/I/61zAHfJ6RsL._AC_SX569_.jpg'),
(508, 'Color 1 Light Blonde Hair Dye', 'Dyes your hair without damaging', 100, 'Palette', 4.1, 'https://images-na.ssl-images-amazon.com/images/I/51t9sYsGXOL._SY355_.jpg'),
(509, 'Chocolate Milk', 'Made with cacao and pasteurized milk', 8, 'Icim', 5.0, 'https://migros-dali-storage-prod.global.ssl.fastly.net/sanalmarket/product/11018061/icim-cikolatali-pastorize-sise-sut-500-ml-97408d.jpg'),
(510, 'Mango Ice Tea x5 ', 'Tropical taste', 17.5, 'Lipton', 4.5, 'https://images-na.ssl-images-amazon.com/images/I/81p0dkz-7tL._SX425_.jpg'),
(511, 'Mint Shampoo', 'Menthol freshness', 15, 'Head&Shoulders', 3.5, 'https://images-na.ssl-images-amazon.com/images/I/51W4vCc8HRL._SL1000_.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `productcategory`
--

CREATE TABLE `productcategory` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `productcategory`
--

INSERT INTO `productcategory` (`product_id`, `category_id`) VALUES
(501, 3),
(502, 2),
(503, 2),
(504, 5),
(505, 4),
(506, 6),
(507, 2),
(508, 3),
(509, 1),
(510, 1),
(511, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `productmanager`
--

CREATE TABLE `productmanager` (
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `productmanager`
--

INSERT INTO `productmanager` (`manager_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ratings`
--

CREATE TABLE `ratings` (
  `user_rating` double(2,1) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `ratings`
--

INSERT INTO `ratings` (`user_rating`, `purchase_date`, `user_id`, `product_id`) VALUES
(4.0, '2020-03-03', 1, 503),
(4.8, '2020-12-15', 2, 502),
(NULL, '2020-12-15', 3, 502),
(3.6, '2020-10-20', 4, 503),
(4.5, '2020-10-20', 4, 504),
(5.0, '2020-11-23', 5, 509),
(4.5, '2019-02-02', 6, 510),
(4.0, '2020-05-01', 7, 506),
(5.0, '2020-12-10', 8, 509),
(4.9, '2020-12-11', 9, 504),
(5.0, '2020-10-13', 10, 507),
(4.5, '2020-08-08', 11, 501);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `registereduserinfo`
--

CREATE TABLE `registereduserinfo` (
  `registered_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `registereduserinfo`
--

INSERT INTO `registereduserinfo` (`registered_id`, `email`, `password`, `phone_number`, `user_id`) VALUES
(1, 'milginoglu@g', 'gunes', '4445', 1),
(2, 'bodaci@g', 'bulut', '4446', 2),
(3, 'udede@g', 'apartman', '4447', 3),
(4, 'dacar@g', 'pencere', '4448', 4),
(5, 'esamlioglu@g', 'televizyon', '4449', 5),
(6, 'aliyilmaz@g', 'tablet', '4450', 6),
(7, 'akaya@g', 'ekran', '4451', 7),
(8, 'csahin@g', 'sifre', '4452', 8),
(9, 'kcetin@g', 'telefon', '4453', 9),
(10, 'eyilmaz@g', 'battaniye', '4454', 10),
(11, 'hyildiz@g', 'hakan1999', '4455', 11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `salesmanager`
--

CREATE TABLE `salesmanager` (
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `salesmanager`
--

INSERT INTO `salesmanager` (`manager_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `address`, `first_name`, `last_name`) VALUES
(1, 'A Street', 'Mert', 'Ilginoglu'),
(2, 'B Street', 'Berke', 'Odaci'),
(3, 'C Street', 'Ufuk', 'Dede'),
(4, 'D Street', 'Dorukan', 'Acar'),
(5, 'E Street', 'Ecem', 'Samlioglu'),
(6, 'F Street', 'Ali', 'Yilmaz'),
(7, 'G Street', 'Ahmet', 'Kaya'),
(8, 'H Street', 'Ceren', 'Sahin'),
(9, 'I Street', 'Kerem', 'Cetin'),
(10, 'J Street', 'Erdem', 'Yilmaz'),
(11, 'K Street', 'Hakan', 'Yildiz'),
(12, 'L Street', 'Elif', 'Ozdemir');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `basketproducts`
--
ALTER TABLE `basketproducts`
  ADD PRIMARY KEY (`basket_id`,`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Tablo için indeksler `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`,`user_id`),
  ADD KEY `order_id` (`order_id`,`user_id`);

--
-- Tablo için indeksler `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Tablo için indeksler `orderedbasketproducts`
--
ALTER TABLE `orderedbasketproducts`
  ADD PRIMARY KEY (`basket_id`,`order_id`,`product_id`),
  ADD KEY `basket_id` (`basket_id`,`user_id`),
  ADD KEY `order_id` (`order_id`,`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Tablo için indeksler `place_order`
--
ALTER TABLE `place_order`
  ADD PRIMARY KEY (`order_id`,`user_id`),
  ADD KEY `basket_id` (`basket_id`,`user_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Tablo için indeksler `productmanager`
--
ALTER TABLE `productmanager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Tablo için indeksler `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Tablo için indeksler `registereduserinfo`
--
ALTER TABLE `registereduserinfo`
  ADD PRIMARY KEY (`registered_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `salesmanager`
--
ALTER TABLE `salesmanager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- Tablo için AUTO_INCREMENT değeri `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `place_order`
--
ALTER TABLE `place_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- Tablo için AUTO_INCREMENT değeri `registereduserinfo`
--
ALTER TABLE `registereduserinfo`
  MODIFY `registered_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `basketproducts`
--
ALTER TABLE `basketproducts`
  ADD CONSTRAINT `basketproducts_ibfk_1` FOREIGN KEY (`basket_id`,`user_id`) REFERENCES `basket` (`basket_id`, `user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basketproducts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`order_id`,`user_id`) REFERENCES `place_order` (`order_id`, `user_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `orderedbasketproducts`
--
ALTER TABLE `orderedbasketproducts`
  ADD CONSTRAINT `orderedbasketproducts_ibfk_1` FOREIGN KEY (`basket_id`,`user_id`) REFERENCES `basket` (`basket_id`, `user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderedbasketproducts_ibfk_2` FOREIGN KEY (`order_id`,`user_id`) REFERENCES `place_order` (`order_id`, `user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderedbasketproducts_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `place_order`
--
ALTER TABLE `place_order`
  ADD CONSTRAINT `place_order_ibfk_1` FOREIGN KEY (`basket_id`,`user_id`) REFERENCES `basket` (`basket_id`, `user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `place_order_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `salesmanager` (`manager_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `productcategory`
--
ALTER TABLE `productcategory`
  ADD CONSTRAINT `productcategory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productcategory_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `productmanager`
--
ALTER TABLE `productmanager`
  ADD CONSTRAINT `productmanager_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `registereduserinfo`
--
ALTER TABLE `registereduserinfo`
  ADD CONSTRAINT `registereduserinfo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `salesmanager`
--
ALTER TABLE `salesmanager`
  ADD CONSTRAINT `salesmanager_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
