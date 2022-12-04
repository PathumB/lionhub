-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.24 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for lionhub_db
CREATE DATABASE IF NOT EXISTS `lionhub_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `lionhub_db`;

-- Dumping structure for table lionhub_db.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(50) NOT NULL,
  `verification` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`email`, `verification`, `fname`, `lname`) VALUES
	('sltech80@gmail.com', '6194b86f2aeef', 'pathum', 'bandara');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.banner_update
CREATE TABLE IF NOT EXISTS `banner_update` (
  `id` int NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_banner_update_admin` (`user_email`),
  CONSTRAINT `FK_banner_update_admin` FOREIGN KEY (`user_email`) REFERENCES `admin` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table lionhub_db.banner_update: ~5 rows (approximately)
/*!40000 ALTER TABLE `banner_update` DISABLE KEYS */;
INSERT INTO `banner_update` (`id`, `banner_name`, `date_time`, `user_email`) VALUES
	(1, 'img/slider//slider16194b780d3bc8.jpg', '2021-11-17 13:34:16', 'sltech80@gmail.com'),
	(2, 'img/slider//slider26191e42ce802b.png', '2021-11-15 10:08:04', 'sltech80@gmail.com'),
	(3, 'img/slider//slider36191e439c2adc.jpg', '2021-11-15 10:08:17', 'sltech80@gmail.com'),
	(4, 'img/slider//slider46191e43de1a99.jpg', '2021-11-15 10:08:21', 'sltech80@gmail.com'),
	(5, 'img/slider//slider56191e441041fd.jpg', '2021-11-15 10:08:25', 'sltech80@gmail.com');
/*!40000 ALTER TABLE `banner_update` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.brand: ~22 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `name`) VALUES
	(1, 'Select Brand'),
	(2, 'Samsung'),
	(3, 'Huawei'),
	(4, 'Apple'),
	(5, 'Vivo'),
	(6, 'Sony'),
	(7, 'Lenovo'),
	(8, 'HP'),
	(9, 'DELL'),
	(10, 'Apple'),
	(11, 'Microsoft'),
	(12, 'Canon Cameras'),
	(13, 'Fujifilm Cameras'),
	(14, 'GoPro Cameras'),
	(15, 'Insta360 Cameras'),
	(16, 'Panasonic Cameras'),
	(17, 'Altair Aerial Drones'),
	(18, 'Cheerson Drones'),
	(19, 'DJI Drones'),
	(20, 'DROCON Drones'),
	(21, 'Eachine Drones'),
	(22, 'Holy Stone Drones');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.cart: ~8 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`id`, `product_id`, `user_email`, `qty`) VALUES
	(76, 119, 'adooaentry0728125203@gmail.com', 1),
	(185, 111, 'kasun@gmail.com', 1),
	(186, 126, 'kasun@gmail.com', 1),
	(187, 112, 'kasun@gmail.com', 1),
	(189, 122, 'kasun@gmail.com', 1),
	(190, 119, 'kasun@gmail.com', 1),
	(191, 126, 'seller01@gmail.com', 1),
	(218, 126, 'user@gmail.com', 1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.category: ~4 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Select Category'),
	(2, 'Cell Phone & Accessories'),
	(3, 'Computer & Tablets'),
	(4, 'Camera & Accessories');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.category_has_model_and_brand
CREATE TABLE IF NOT EXISTS `category_has_model_and_brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `model_has_brand_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__category` (`category_id`),
  KEY `FK_category_has_model_and_brand_model_has_brand` (`model_has_brand_id`),
  CONSTRAINT `FK__category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_category_has_model_and_brand_model_has_brand` FOREIGN KEY (`model_has_brand_id`) REFERENCES `model_has_brand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.category_has_model_and_brand: ~105 rows (approximately)
/*!40000 ALTER TABLE `category_has_model_and_brand` DISABLE KEYS */;
INSERT INTO `category_has_model_and_brand` (`id`, `category_id`, `model_has_brand_id`) VALUES
	(1, 2, 1),
	(2, 2, 2),
	(3, 2, 3),
	(4, 2, 4),
	(5, 2, 5),
	(6, 2, 6),
	(7, 2, 7),
	(9, 2, 8),
	(10, 2, 9),
	(11, 2, 10),
	(12, 2, 11),
	(13, 2, 12),
	(14, 2, 13),
	(15, 2, 14),
	(16, 2, 15),
	(17, 2, 16),
	(18, 2, 17),
	(19, 2, 18),
	(20, 2, 19),
	(21, 2, 20),
	(22, 2, 21),
	(23, 2, 22),
	(24, 2, 23),
	(25, 2, 24),
	(26, 2, 25),
	(27, 2, 26),
	(28, 2, 27),
	(29, 2, 28),
	(30, 2, 29),
	(31, 2, 30),
	(32, 2, 31),
	(33, 2, 32),
	(34, 2, 33),
	(35, 2, 34),
	(36, 2, 35),
	(37, 3, 36),
	(38, 3, 37),
	(39, 3, 38),
	(40, 3, 39),
	(41, 3, 40),
	(42, 3, 41),
	(43, 3, 42),
	(44, 3, 43),
	(45, 3, 44),
	(46, 3, 45),
	(47, 3, 46),
	(48, 3, 47),
	(49, 3, 48),
	(50, 3, 49),
	(51, 3, 50),
	(52, 3, 51),
	(53, 3, 52),
	(54, 3, 53),
	(55, 3, 54),
	(56, 3, 55),
	(57, 3, 56),
	(58, 3, 57),
	(59, 3, 58),
	(60, 3, 59),
	(61, 3, 60),
	(62, 3, 61),
	(63, 3, 62),
	(64, 3, 63),
	(65, 3, 64),
	(66, 3, 65),
	(67, 3, 66),
	(68, 3, 67),
	(69, 3, 68),
	(70, 3, 69),
	(71, 3, 70),
	(72, 4, 71),
	(73, 4, 72),
	(74, 4, 73),
	(75, 4, 74),
	(76, 4, 75),
	(77, 4, 76),
	(78, 4, 77),
	(79, 4, 78),
	(80, 4, 79),
	(81, 4, 80),
	(82, 4, 81),
	(83, 4, 82),
	(84, 4, 83),
	(85, 4, 84),
	(86, 4, 85),
	(87, 4, 86),
	(88, 4, 87),
	(89, 4, 88),
	(90, 4, 89),
	(91, 4, 90),
	(92, 4, 91),
	(93, 4, 92),
	(94, 4, 93),
	(95, 4, 94),
	(96, 4, 95),
	(97, 4, 96),
	(98, 4, 97),
	(99, 4, 98),
	(100, 4, 99),
	(101, 4, 100),
	(102, 4, 101),
	(103, 4, 102),
	(104, 4, 103),
	(105, 4, 104),
	(106, 4, 104);
/*!40000 ALTER TABLE `category_has_model_and_brand` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_chat_status` (`status`),
  KEY `FK_chat_user` (`from`),
  KEY `FK_chat_user_2` (`to`),
  CONSTRAINT `FK_chat_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  CONSTRAINT `FK_chat_user` FOREIGN KEY (`from`) REFERENCES `user` (`email`),
  CONSTRAINT `FK_chat_user_2` FOREIGN KEY (`to`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.chat: ~5 rows (approximately)
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` (`id`, `from`, `to`, `content`, `date`, `status`) VALUES
	(80, 'aaa@gmail.com', 'user@gmail.com', 'hello seller', '2021-11-17 13:07:41', 1),
	(81, 'user@gmail.com', 'aaa@gmail.com', 'hello customer', '2021-11-17 13:08:06', 1),
	(82, 'kasun@gmail.com', 'user@gmail.com', 'hi seller ', '2021-11-17 13:10:51', 1),
	(83, 'user@gmail.com', 'kasun@gmail.com', 'hi kasun', '2021-11-17 13:11:03', 1),
	(84, 'user@gmail.com', 'aaa@gmail.com', 'hi', '2021-11-17 13:27:38', 2);
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `postal_code` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.city: ~10 rows (approximately)
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `name`, `postal_code`) VALUES
	(1, 'Select Your City', 'Select Your Postal Code'),
	(2, 'Kandy', '12345'),
	(3, 'Gampaha', '33333'),
	(4, 'Colombo', '44444'),
	(5, 'Moratuwa', '55555'),
	(6, 'Galle', '66666'),
	(7, 'Jaffna', '77777'),
	(8, 'Rathnapura', '88888'),
	(9, 'Hanguranketha', '22222'),
	(10, 'Vavuniya', '00000');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.color: ~6 rows (approximately)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id`, `name`) VALUES
	(1, 'Gold'),
	(2, 'Silver'),
	(3, 'Graphite'),
	(4, 'Pacific Blue'),
	(5, 'Jet Black'),
	(6, 'Rose Gold');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.condition
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.condition: ~2 rows (approximately)
/*!40000 ALTER TABLE `condition` DISABLE KEYS */;
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'Brand New'),
	(2, 'Used');
/*!40000 ALTER TABLE `condition` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `company` text,
  `msg` text,
  PRIMARY KEY (`id`),
  KEY `FK_contact_user` (`user_email`),
  CONSTRAINT `FK_contact_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.contact: ~2 rows (approximately)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `name`, `user_email`, `subject`, `company`, `msg`) VALUES
	(9, 'pathum', 'user@gmail.com', 'shoplk', 'shoplk', 'aaaaaaaaa'),
	(13, 'pathum', 'user@gmail.com', 'shoplk', 'shoplk', 'hello');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.district: ~9 rows (approximately)
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` (`id`, `name`) VALUES
	(1, 'Select your district'),
	(2, 'Anuradhapura'),
	(3, 'Colombo'),
	(4, 'Kandy'),
	(5, 'Ampara'),
	(6, 'Galle'),
	(8, 'Gampaha'),
	(9, 'Jaffna'),
	(10, 'Matale');
/*!40000 ALTER TABLE `district` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL,
  `product_id` int NOT NULL,
  `feed` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedback_user1_idx` (`user_email`),
  KEY `fk_feedback_product1_idx` (`product_id`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.feedback: ~6 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` (`id`, `user_email`, `product_id`, `feed`, `date`) VALUES
	(5, 'user@gmail.com', 106, 'Good job!\nhodatama pack karala thibba. battery ekath hodai. habai podi aulakata thiyenne box eka athule thibbe mn order karapu 4n eka newe', '2021-10-19 23:43:20'),
	(6, 'user@gmail.com', 106, 'Phone ekanm patta.  Highly Recommended this Phone.', '2021-10-19 23:44:47'),
	(7, 'user@gmail.com', 122, 'Nice Drone.\nGood service.', '2021-10-24 23:02:22'),
	(8, 'user@gmail.com', 122, 'Good condition brother..', '2021-10-24 23:03:29'),
	(9, 'user@gmail.com', 120, 'Good Condition..', '2021-10-27 15:48:56'),
	(12, 'user@gmail.com', 106, 'Good job. ', '2021-11-04 09:13:50');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.gender: ~2 rows (approximately)
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'Male'),
	(2, 'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.images
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.images: ~39 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`code`, `product_id`) VALUES
	('resources/products//img1616ec1b9c429f.jpg', 107),
	('resources/products//img2616ec1b9c42a3.jpeg', 107),
	('resources/products//img3616ec1b9c42a4.jpg', 107),
	('resources/products//img1616f0c99db140.jpg', 111),
	('resources/products//img2616f0c99db144.jpg', 111),
	('resources/products//img3616f0c99db145.jpg', 111),
	('resources/products//img161713eee3aa6a.png', 112),
	('resources/products//img261713eee3aa71.jpeg', 112),
	('resources/products//img361713eee3aa72.jpg', 112),
	('resources/products//img16182c015b0787.jpeg', 113),
	('resources/products//img26182c015b078c.jpg', 113),
	('resources/products//img36182c015b078d.jpeg', 113),
	('resources/products//img1616f0e0bc4ab5.jpeg', 114),
	('resources/products//img2616f0e0bc4aba.jpg', 114),
	('resources/products//img3616f0e0bc4abb.jpeg', 114),
	('resources/products//img1616f0e96263fa.jpeg', 115),
	('resources/products//img2616f0e96263ff.jpeg', 115),
	('resources/products//img3616f0e9626400.jpeg', 115),
	('resources/products//img1616fba8e1b640.png', 117),
	('resources/products//img2616fba8e1b645.png', 117),
	('resources/products//img3616fba8e1b646.png', 117),
	('resources/products//img1616fbaf7a9bae.jpg', 118),
	('resources/products//img2616fbaf7a9bb3.jpg', 118),
	('resources/products//img3616fbaf7a9bb4.jpeg', 118),
	('resources/products//img1616fbb2bf37bc.jpeg', 119),
	('resources/products//img2616fbb2bf37c1.jpg', 119),
	('resources/products//img3616fbb2bf37c2.jpg', 119),
	('resources/products//img1616fbb7939dae.jpg', 120),
	('resources/products//img2616fbb7939db3.jpg', 120),
	('resources/products//img3616fbb7939db4.jpeg', 120),
	('resources/products//img1616fbc0b60504.jpg', 122),
	('resources/products//img2616fbc0b6050a.jpg', 122),
	('resources/products//img3616fbc0b6050b.jpg', 122),
	('resources/products//img1616fbc4f7398d.jpg', 123),
	('resources/products//img2616fbc4f73992.jpg', 123),
	('resources/products//img3616fbc4f73993.jpg', 123),
	('resources/products//img1618cbf2e31bec.jpg', 126),
	('resources/products//img2618cbf2e31bf3.jpg', 126),
	('resources/products//img3618cbf2e31bf4.jpg', 126);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  KEY `FK_invoice_status` (`status`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_invoice_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.invoice: ~52 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `order_id`, `product_id`, `user_email`, `date`, `total`, `qty`, `status`) VALUES
	(7, '616ee50da2fd2', 106, 'user@gmail.com', '2021-10-19 21:02:55', 300, 1, 1),
	(8, '61710f588fe8e', 106, 'user@gmail.com', '2021-10-21 12:28:04', 300, 1, 1),
	(9, '6172e8de57a71', 106, 'user@gmail.com', '2021-10-22 22:08:19', 300, 1, 1),
	(10, '6174236a23855', 106, 'user@gmail.com', '2021-10-23 20:30:24', 300, 1, 1),
	(11, '6175804e03626', 106, 'user@gmail.com', '2021-10-24 21:19:01', 300, 1, 1),
	(12, '6175929c21427', 122, 'user@gmail.com', '2021-10-24 22:38:22', 125200, 1, 1),
	(13, '617924c932bbe', 120, 'user@gmail.com', '2021-10-27 15:37:42', 12700, 1, 1),
	(14, '617c465bab99d', 126, 'user@gmail.com', '2021-10-30 00:37:53', 85100, 1, 1),
	(15, '618227ad61573', 106, 'user@gmail.com', '2021-11-03 11:40:26', 200, 1, 1),
	(16, '61822cd09d028', 106, 'user@gmail.com', '2021-11-03 12:04:02', 200, 1, 1),
	(17, '61840ae3453d4', 106, 'user@gmail.com', '2021-11-04 22:02:04', 300, 1, 1),
	(18, '618656dd2236e', 120, 'user@gmail.com', '2021-11-06 15:50:40', 12500, 1, 1),
	(19, '618656dd2236e', 106, 'user@gmail.com', '2021-11-06 15:50:40', 100, 1, 1),
	(20, '61865d2eaf55e', 106, 'user@gmail.com', '2021-11-06 16:17:37', 1, 1, 1),
	(21, '61865df1d27fa', 106, 'user@gmail.com', '2021-11-06 16:20:47', 100, 1, 1),
	(22, '61866540694e7', 106, 'user@gmail.com', '2021-11-06 16:52:02', 0, 1, 1),
	(23, '618666168c1bf', 106, 'user@gmail.com', '2021-11-06 16:55:34', 100, 1, 1),
	(24, '618667489640e', 106, 'user@gmail.com', '2021-11-06 17:00:34', 100, 1, 1),
	(25, '618667bae9af6', 106, 'user@gmail.com', '2021-11-06 17:02:27', 100, 1, 1),
	(26, '61866850cdff0', 106, 'user@gmail.com', '2021-11-06 17:05:14', 100, 1, 1),
	(27, '61866850cdff0', 120, 'user@gmail.com', '2021-11-06 17:05:14', 12500, 1, 1),
	(28, '61868e52a2564', 106, 'user@gmail.com', '2021-11-06 19:47:08', 200, 1, 1),
	(29, '61868eedbb482', 106, 'user@gmail.com', '2021-11-06 19:49:47', 300, 1, 1),
	(30, '618690dbab24d', 106, 'user@gmail.com', '2021-11-06 19:58:11', 300, 1, 1),
	(31, '618690dbab24d', 120, 'user@gmail.com', '2021-11-06 19:58:11', 12700, 1, 1),
	(32, '618693728402e', 106, 'user@gmail.com', '2021-11-06 20:09:14', 400, 2, 1),
	(33, '61869609d9b6d', 106, 'user@gmail.com', '2021-11-06 20:20:17', 300, 1, 1),
	(34, '61869609d9b6d', 120, 'user@gmail.com', '2021-11-06 20:20:17', 12700, 1, 1),
	(35, '6186969291db9', 106, 'user@gmail.com', '2021-11-06 20:22:19', 300, 1, 1),
	(36, '6186969291db9', 120, 'user@gmail.com', '2021-11-06 20:22:19', 12700, 1, 1),
	(37, '6186970a1838e', 106, 'user@gmail.com', '2021-11-06 20:24:18', 300, 1, 1),
	(38, '6186970a1838e', 120, 'user@gmail.com', '2021-11-06 20:24:18', 12700, 1, 1),
	(39, '618697ac4ec82', 106, 'user@gmail.com', '2021-11-06 20:27:10', 200, 1, 1),
	(40, '618697ac4ec82', 120, 'user@gmail.com', '2021-11-06 20:27:10', 300, 1, 1),
	(41, '6186aae5cc55e', 106, 'user@gmail.com', '2021-11-06 21:49:03', 200, 1, 1),
	(42, '6186aae5cc55e', 120, 'user@gmail.com', '2021-11-06 21:49:03', 300, 1, 1),
	(43, '6186acf8d7c97', 106, 'user@gmail.com', '2021-11-06 21:57:53', 200, 1, 1),
	(44, '6186acf8d7c97', 120, 'user@gmail.com', '2021-11-06 21:57:53', 300, 1, 1),
	(45, '6186aeccc9712', 106, 'user@gmail.com', '2021-11-06 22:05:44', 300, 1, 1),
	(46, '6186aeccc9712', 120, 'user@gmail.com', '2021-11-06 22:05:44', 12700, 1, 1),
	(47, '6186b53a44289', 106, 'user@gmail.com', '2021-11-06 22:33:19', 300, 1, 1),
	(48, '6186b53a44289', 120, 'user@gmail.com', '2021-11-06 22:33:19', 12700, 1, 1),
	(49, '6186ba1ca5bec', 106, 'kasun@gmail.com', '2021-11-06 22:54:06', 600, 4, 1),
	(50, '6186ba1ca5bec', 120, 'kasun@gmail.com', '2021-11-06 22:54:06', 12700, 1, 1),
	(51, '6186ba1ca5bec', 111, 'kasun@gmail.com', '2021-11-06 22:54:06', 24200, 1, 1),
	(52, '618b9d82635e4', 106, 'user@gmail.com', '2021-11-10 15:53:23', 300, 1, 1),
	(53, '61922145cda05', 106, 'user@gmail.com', '2021-11-15 14:30:04', 300, 1, 1),
	(54, '61923505762c4', 106, 'sltech80@gmail.com', '2021-11-15 15:53:53', 300, 1, 1),
	(55, '61923505762c4', 120, 'sltech80@gmail.com', '2021-11-15 15:53:53', 25200, 2, 1),
	(59, '6194880376149', 106, 'user@gmail.com', '2021-11-17 10:12:08', 300, 1, 1),
	(61, '6194b8180c899', 126, 'sltech80@gmail.com', '2021-11-17 13:37:17', 85200, 1, 1),
	(62, '6194b8180c899', 106, 'sltech80@gmail.com', '2021-11-17 13:37:17', 300, 1, 1);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.location
CREATE TABLE IF NOT EXISTS `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `province_id` int NOT NULL,
  `district_id` int NOT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_location_province1_idx` (`province_id`),
  KEY `fk_location_district1_idx` (`district_id`),
  KEY `fk_location_city1_idx` (`city_id`),
  CONSTRAINT `fk_location_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_location_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`),
  CONSTRAINT `fk_location_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.location: ~26 rows (approximately)
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`id`, `province_id`, `district_id`, `city_id`) VALUES
	(1, 1, 2, 1),
	(2, 2, 4, 9),
	(3, 3, 3, 3),
	(15, 4, 4, 4),
	(16, 2, 4, 3),
	(17, 4, 3, 4),
	(18, 4, 3, 4),
	(19, 4, 3, 4),
	(20, 4, 3, 4),
	(21, 4, 3, 4),
	(22, 3, 2, 3),
	(23, 4, 3, 3),
	(24, 2, 2, 2),
	(25, 2, 2, 2),
	(26, 3, 2, 2),
	(27, 4, 2, 3),
	(28, 3, 2, 3),
	(29, 2, 3, 3),
	(30, 3, 2, 2),
	(31, 3, 3, 2),
	(32, 2, 3, 2),
	(33, 2, 4, 2),
	(34, 2, 3, 3),
	(35, 2, 2, 2),
	(36, 2, 4, 2),
	(37, 2, 4, 9);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.model
CREATE TABLE IF NOT EXISTS `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.model: ~105 rows (approximately)
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` (`id`, `name`) VALUES
	(1, 'Select Model'),
	(2, 'Galaxy S8'),
	(3, 'Galaxy S9'),
	(4, 'Galaxy S10'),
	(5, 'Galaxy S20'),
	(6, 'Galaxy Note 10'),
	(7, 'Galaxy Note 20'),
	(8, 'Nova Lite'),
	(9, 'Nova Plus'),
	(10, 'Nova 2s'),
	(11, 'Nova 8 SE'),
	(12, 'Nova 8 Pro'),
	(13, 'Y7 Pro (2018)'),
	(14, 'Y7p (P40 lite E)'),
	(15, 'iPhone 6'),
	(16, 'iPhone 7'),
	(17, 'iPhone 8'),
	(18, 'iPhone 11'),
	(19, 'iPhone 11 pro'),
	(20, 'iPhone 12'),
	(21, 'iPhone 12 pro'),
	(22, 'iPhone 13 pro'),
	(23, 'Vivo V3'),
	(24, 'Vivo V5'),
	(25, 'Vivo V5s'),
	(26, 'Vivo Y51'),
	(27, 'Vivo V7+'),
	(28, 'Vivo V27'),
	(29, 'Vivo 15s'),
	(30, 'Sony Xperia'),
	(31, 'Sony LT26a'),
	(32, 'Sony IS12S'),
	(33, 'Sony XZ 3'),
	(34, 'Sony Xperia XZ5'),
	(35, 'Sony Xperia XZ2'),
	(36, 'Sony Xperia R1'),
	(37, 'Lenovo IdeaPad Slim 5'),
	(38, 'Lenovo Yoga 9i'),
	(39, 'Lenovo Gaming'),
	(40, 'Lenovo ThinkPad X1'),
	(41, 'Lenovo ThinkBook'),
	(42, 'Lenovo Legion'),
	(43, 'Lenovo Chromebook'),
	(44, 'HP Essential'),
	(45, 'HP Pavilion'),
	(46, 'HP ENVY'),
	(47, 'HP EliteBook'),
	(48, 'HP Spectre'),
	(49, 'HP Gaming'),
	(50, 'HP Chromebook'),
	(51, 'Dell G5 Gaming Desktop'),
	(52, 'Dell Inspiron Desktop'),
	(53, 'Dell Inspiron 24 5000'),
	(54, 'Dell Precision 3240'),
	(55, 'Dell XPS Desktop Special Edition'),
	(56, 'Dell OptiPlex 7080'),
	(57, 'Dell Inspiron'),
	(58, 'iMac Pro'),
	(59, 'Mac Mini'),
	(60, 'Mac Book Pro 16'),
	(61, 'Mac Book Pro 13'),
	(62, 'Mac Book Air'),
	(63, 'Mac Book Pro 16 (2021)'),
	(64, 'Mac Book Air (2021)'),
	(65, 'Surface Go 2'),
	(66, 'Surface Book 3'),
	(67, 'Surface Laptop Go'),
	(68, 'Surface Pro 7'),
	(69, 'Surface Laptop 3'),
	(70, 'Surface Book 2'),
	(71, 'Surface Pro X'),
	(72, 'EOS-1D X'),
	(73, 'EOS-1D X Mark II'),
	(74, 'EOS-1D X Mark III'),
	(75, 'EOS-1Ds'),
	(76, 'EOS-1Ds Mark II'),
	(77, 'EOS-1Ds Mark III'),
	(78, 'EOS 5D Mark II'),
	(79, 'Fujifilm X100V'),
	(80, 'Fujifilm X-T4'),
	(81, 'Fujifilm X-Pro3'),
	(82, 'Fujifilm X-T30'),
	(83, 'GoPro Hero10 Black'),
	(84, 'GoPro Hero9 Black'),
	(85, 'GoPro Hero8 Black'),
	(86, 'GoPro Max'),
	(87, 'GoPro Hero7 Black'),
	(88, 'GoPro Hero7 Silver'),
	(89, 'GoPro Hero6 original'),
	(90, 'GoPro. Max'),
	(91, 'Insta360. One X2'),
	(92, 'Kandao. QooCam 8K 360'),
	(93, 'Insta360. ONE R Twin Edition'),
	(94, 'Insta360. ONE X.'),
	(95, 'Vuze. XR'),
	(96, 'Garmin. VIRB 360'),
	(97, 'Ricoh. Theta Z1'),
	(98, 'Panasonic Lumix'),
	(99, 'Panasonic Lumix G100'),
	(100, 'Panasonic Lumix GX80 / 85'),
	(101, 'Panasonic Lumix GH5 Mark II'),
	(102, 'Panasonic Lumix GX9'),
	(103, 'Panasonic Lumix S5'),
	(104, 'Panasonic Lumix S1R'),
	(105, 'Panasonic Lumix TZ90 / ZS70');
/*!40000 ALTER TABLE `model` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.model_has_brand
CREATE TABLE IF NOT EXISTS `model_has_brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model_id` int NOT NULL,
  `brand_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_model_has_brand_model1_idx` (`model_id`),
  KEY `fk_model_has_brand_brand1_idx` (`brand_id`),
  CONSTRAINT `fk_model_has_brand_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_model_has_brand_model1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.model_has_brand: ~104 rows (approximately)
/*!40000 ALTER TABLE `model_has_brand` DISABLE KEYS */;
INSERT INTO `model_has_brand` (`id`, `model_id`, `brand_id`) VALUES
	(1, 2, 2),
	(2, 3, 2),
	(3, 4, 2),
	(4, 5, 2),
	(5, 6, 2),
	(6, 7, 2),
	(7, 8, 3),
	(8, 9, 3),
	(9, 10, 3),
	(10, 11, 3),
	(11, 12, 3),
	(12, 13, 3),
	(13, 14, 3),
	(14, 15, 4),
	(15, 16, 4),
	(16, 17, 4),
	(17, 18, 4),
	(18, 19, 4),
	(19, 20, 4),
	(20, 21, 4),
	(21, 22, 4),
	(22, 23, 5),
	(23, 24, 5),
	(24, 25, 5),
	(25, 26, 5),
	(26, 27, 5),
	(27, 28, 5),
	(28, 29, 5),
	(29, 30, 6),
	(30, 31, 6),
	(31, 32, 6),
	(32, 33, 6),
	(33, 34, 6),
	(34, 35, 6),
	(35, 36, 6),
	(36, 37, 7),
	(37, 38, 7),
	(38, 39, 7),
	(39, 40, 7),
	(40, 41, 7),
	(41, 42, 7),
	(42, 43, 7),
	(43, 44, 8),
	(44, 45, 8),
	(45, 46, 8),
	(46, 47, 8),
	(47, 48, 8),
	(48, 49, 8),
	(49, 50, 8),
	(50, 51, 9),
	(51, 52, 9),
	(52, 53, 9),
	(53, 54, 9),
	(54, 55, 9),
	(55, 56, 9),
	(56, 57, 9),
	(57, 58, 10),
	(58, 59, 10),
	(59, 60, 10),
	(60, 61, 10),
	(61, 62, 10),
	(62, 63, 10),
	(63, 64, 10),
	(64, 65, 11),
	(65, 66, 11),
	(66, 67, 11),
	(67, 68, 11),
	(68, 69, 11),
	(69, 70, 11),
	(70, 71, 11),
	(71, 72, 12),
	(72, 73, 12),
	(73, 74, 12),
	(74, 75, 12),
	(75, 76, 12),
	(76, 77, 12),
	(77, 78, 12),
	(78, 79, 13),
	(79, 80, 13),
	(80, 81, 13),
	(81, 82, 13),
	(82, 83, 14),
	(83, 84, 14),
	(84, 85, 14),
	(85, 86, 14),
	(86, 87, 14),
	(87, 88, 14),
	(88, 89, 14),
	(89, 90, 15),
	(90, 91, 15),
	(91, 92, 15),
	(92, 93, 15),
	(93, 94, 15),
	(94, 95, 15),
	(95, 96, 15),
	(96, 97, 15),
	(97, 98, 16),
	(98, 99, 16),
	(99, 100, 16),
	(100, 101, 16),
	(101, 102, 16),
	(102, 103, 16),
	(103, 104, 16),
	(104, 105, 16);
/*!40000 ALTER TABLE `model_has_brand` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.ordertrack
CREATE TABLE IF NOT EXISTS `ordertrack` (
  `trackid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `order_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `order_status_id` int DEFAULT NULL,
  PRIMARY KEY (`trackid`),
  KEY `FK_ordertrack_user` (`user_email`),
  KEY `FK_ordertrack_order_status` (`order_status_id`),
  CONSTRAINT `FK_ordertrack_order_status` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`),
  CONSTRAINT `FK_ordertrack_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table lionhub_db.ordertrack: ~5 rows (approximately)
/*!40000 ALTER TABLE `ordertrack` DISABLE KEYS */;
INSERT INTO `ordertrack` (`trackid`, `order_id`, `user_email`, `date`, `order_status_id`) VALUES
	('106', '6194880376149', 'user@gmail.com', '2021-11-17 10:12:08', 1),
	('126', '6194b8180c899', 'sltech80@gmail.com', '2021-11-17 13:37:17', 2),
	('135', '619468bd5de31', 'user@gmail.com', '2021-11-17 07:58:54', 1),
	('56', '61922145cda05', 'user@gmail.com', '2021-11-16 15:04:48', 1),
	('76', '618b9d82635e4', 'user@gmail.com', '2021-11-15 22:54:22', 3);
/*!40000 ALTER TABLE `ordertrack` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.order_status
CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table lionhub_db.order_status: ~4 rows (approximately)
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` (`id`, `status`) VALUES
	(1, 'Order confirmed'),
	(2, 'Picked by courier'),
	(3, 'On the way'),
	(4, 'Ready for pickup');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `model_has_brand_id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `color_id` int NOT NULL,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `description` text,
  `condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_model_has_brand1_idx` (`model_has_brand_id`),
  KEY `fk_product_color1_idx` (`color_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_user1_idx` (`user_email`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_color1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_model_has_brand1` FOREIGN KEY (`model_has_brand_id`) REFERENCES `model_has_brand` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.product: ~14 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `category_id`, `model_has_brand_id`, `title`, `color_id`, `price`, `qty`, `description`, `condition_id`, `status_id`, `user_email`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`) VALUES
	(106, 2, 2, 'Samsung Galaxy A20', 5, 100, 5, 'Samsung Galaxy A20', 1, 1, 'user@gmail.com', '2021-10-19 18:28:48', 100, 200),
	(107, 2, 3, 'Huawei X1', 2, 52000, 45, 'Huawei X1', 2, 1, 'user@gmail.com', '2021-10-19 18:31:45', 100, 200),
	(111, 2, 5, 'Sony Xperia |||', 5, 24000, 14, 'Sony Xperia |||', 1, 1, 'user@gmail.com', '2021-10-19 23:51:13', 100, 200),
	(112, 2, 4, 'Vivo V30 Pro', 5, 75000, 4, 'Vivo V30 Pro', 2, 1, 'user@gmail.com', '2021-10-19 23:52:42', 150, 250),
	(113, 3, 2, 'Lenovo Ryzen 5', 4, 175000, 14, 'Lenovo Ryzen 5\nBrand new\nSalli hadissiykta denne', 1, 1, 'user@gmail.com', '2021-10-19 23:55:53', 100, 200),
	(114, 3, 6, 'Core 2 duo', 3, 25000, 16, 'Core 2 duo', 2, 1, 'user@gmail.com', '2021-10-19 23:57:23', 100, 200),
	(115, 3, 3, 'Dell Core i5', 4, 45000, 3, 'Dell Core i5', 1, 1, 'user@gmail.com', '2021-10-19 23:59:42', 100, 200),
	(117, 3, 5, 'ROG gaming pc', 5, 75000, 23, 'ROG gaming pc', 2, 1, 'user@gmail.com', '2021-10-20 12:13:26', 100, 200),
	(118, 4, 2, 'Water Proof Cam', 5, 95000, 5, 'Water Proof Cam', 1, 1, 'user@gmail.com', '2021-10-20 12:15:11', 100, 200),
	(119, 4, 3, 'Mini Film Camera', 5, 54000, 10, 'Mini Film Camera', 1, 1, 'user@gmail.com', '2021-10-20 12:16:03', 100, 200),
	(120, 4, 6, 'Adjustable Camera', 5, 12500, 8, 'Adjustable Camera\n', 2, 1, 'user@gmail.com', '2021-10-20 12:17:21', 100, 200),
	(122, 4, 3, 'Multi Task Drone ', 6, 125000, 1, 'Multi Task Drone ', 1, 1, 'user@gmail.com', '2021-10-20 12:19:47', 100, 200),
	(123, 4, 5, 'White Cover Drone', 2, 135000, 25, 'White Cover Drone', 1, 1, 'user@gmail.com', '2021-10-20 12:20:55', 100, 200),
	(126, 2, 2, 'Sony Xperia XZ 5', 1, 85000, 5, 'Sony XZ5\nGood Condition', 2, 1, 'user@gmail.com', '2021-10-30 00:34:10', 100, 200);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.profile_img
CREATE TABLE IF NOT EXISTS `profile_img` (
  `code` varchar(50) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_profile_img_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_img_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.profile_img: ~14 rows (approximately)
/*!40000 ALTER TABLE `profile_img` DISABLE KEYS */;
INSERT INTO `profile_img` (`code`, `user_email`) VALUES
	('resources/profile_img//617649567d0b1.png', 'aaa@gmail.com'),
	('resources/profile_img//61828317cbe4d.jpg', 'adooaentry0728125203@gmail.com'),
	('resources/profile_img//6176498c5d9b2.png', 'gota@gmail.com'),
	('resources/profile_img//617649aaebfee.png', 'kasun@gmail.com'),
	('resources/profile_img//617649c90dd7a.png', 'maha@gmail.com'),
	('resources/profile_img//617649e1c57af.jpg', 'maithree@gmail.com'),
	('resources/profile_img//61764a020f773.jpg', 'pathum111@gmail.com'),
	('resources/profile_img//61764a27c6bc9.png', 'pathum123@gmail.com'),
	('resources/profile_img//61764a5c5019f.png', 'pathum12@gmail.com'),
	('resources/profile_img//61764a467004b.jpg', 'pathum1@gmail.com'),
	('resources/profile_img//61764a74d6c00.png', 'ranil@gmail.com'),
	('resources/profile_img//61764a8a067a7.png', 'savendra@gmail.com'),
	('resources/profile_img//61764a9a15886.png', 'sltech80@gmail.com'),
	('resources/profile_img//618273ab6e059.jpeg', 'user@gmail.com');
/*!40000 ALTER TABLE `profile_img` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.province: ~10 rows (approximately)
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `name`) VALUES
	(1, 'Select Your Province'),
	(2, 'Central'),
	(3, 'Uva'),
	(4, 'Western'),
	(5, 'Eastern'),
	(6, 'North Central'),
	(7, 'Southern'),
	(8, 'Northern'),
	(9, 'Sabaragamuwa'),
	(10, '	Eastern');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_product1_idx` (`product_id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.recent: ~1 rows (approximately)
/*!40000 ALTER TABLE `recent` DISABLE KEYS */;
INSERT INTO `recent` (`id`, `product_id`, `user_email`) VALUES
	(321, 126, 'user@gmail.com');
/*!40000 ALTER TABLE `recent` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.status: ~3 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'active'),
	(2, 'deactive'),
	(3, 'seller');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(50) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `status_id` int DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_id`),
  KEY `FK_user_status` (`status_id`) USING BTREE,
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `FK_user_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.user: ~18 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `mobile`, `register_date`, `verification_code`, `gender_id`, `status_id`) VALUES
	('aaa@gmail.com', 'Buyer', 'Buyer', 'buyer@gmail.com', '0728125203', '2021-10-13 11:59:27', '6194b172da4ac', 1, 1),
	('adooaentry0728125203@gmail.com', 'sandun', 'wijethunga', 'ado123', '0712569106', '2021-11-03 17:57:12', NULL, 2, 1),
	('dataentry0728125203@gmail.com', 'Data', 'Entry', NULL, NULL, '2021-11-15 10:26:34', NULL, 1, 1),
	('gota@gmail.com', 'I am a', 'Buyer', 'g123456', '0728125255', '2021-10-13 11:33:45', NULL, 1, 1),
	('kasun@gmail.com', 'kasun', 'kalhara', 'kasun123', '0712587000', '2021-10-07 13:14:06', '619230f092166', 1, 1),
	('maha@gmail.com', 'pathum', 'bandara', 'm1234', '0728125203', '2021-10-07 18:51:13', NULL, 1, 1),
	('maithree@gmail.com', 'Maithree paala', 'Sirisena', 'm123456', '0728125244', '2021-10-13 11:29:01', NULL, 1, 1),
	('pathum111@gmail.com', 'pathum bro', 'bandara 123', 'p123456', '0712587706', '2021-10-08 13:27:34', NULL, 1, 1),
	('pathum123@gmail.com', 'pathum', 'bandara2', 'p789456', '0728125203', '2021-10-08 13:24:32', NULL, 1, 1),
	('pathum12@gmail.com', 'pathum', 'bandara', 'p123456', '0728155200', '2021-10-08 12:50:42', NULL, 1, 1),
	('pathum1@gmail.com', 'pathum1', 'bandara1', 'p456789', '0728125200', '2021-10-08 13:09:37', NULL, 1, 1),
	('pathumbandarame@gmail.com', 'Pathum', 'Bandara', '1212ASS@$', '0728125205', '2021-10-31 15:28:56', NULL, 1, 1),
	('ranil@gmail.com', 'ranil', 'wickramasinghe', 'r123456', '0728124444', '2021-10-13 11:36:35', NULL, 2, 1),
	('savendra@gmail.com', 'savendra', 'rajakaruna', 's123456', '0728125277', '2021-10-13 11:40:25', NULL, 1, 1),
	('seller01@gmail.com', 'I am a', 'seller', 'seller123', '0721125203', '2021-11-08 17:49:05', NULL, 1, 3),
	('sltech80@gmail.com', 'user', 'admin', 'admin123', '0728125203', '2021-09-04 11:27:34', '61923377017ac', 1, 3),
	('thili@gmail.com', 'supun', 'ranasighe', 'thilo123', '0728445203', '2021-11-13 20:17:26', NULL, 1, 1),
	('user@gmail.com', 'pathum (seller)', 'bandara', 'user123', '0728125203', '2021-09-05 18:37:50', '617f8594739d5', 1, 3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL,
  `line1` text,
  `line2` text,
  `location_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_user1_idx` (`user_email`),
  KEY `fk_user_has_address_location1_idx` (`location_id`),
  CONSTRAINT `fk_user_has_address_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.user_has_address: ~15 rows (approximately)
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` (`id`, `user_email`, `line1`, `line2`, `location_id`) VALUES
	(1, 'sltech80@gmail.com', 'udawaththakumbura', 'hanguranketha', 2),
	(2, 'user@gmail.com', '9th mile post', 'udawaththakumbura', 2),
	(3, 'kasun@gmail.com', 'udawaththa', 'hanguranketha', 15),
	(4, 'maha@gmail.com', '9th mile post', 'udawaththakumbura', 16),
	(5, 'pathum12@gmail.com', '9th mile post udawaththa kumbura', 'hanguranketha', 17),
	(6, 'pathum1@gmail.com', '9th mile post udawaththa ', 'hanguranketha aaa', 18),
	(7, 'pathum111@gmail.com', '9th mile post qqqq', 'udawaththakumbura qqqq', 19),
	(8, 'maithree@gmail.com', 'qqqqqqqqqqq', 'vvvvvvvvvvvvvvv', 20),
	(9, 'gota@gmail.com', 'api thamai', 'hodatama kree', 21),
	(10, 'ranil@gmail.com', 'hi mn ranil', 'wickramasinghe', 22),
	(11, 'savendra@gmail.com', 'savendra meeka', 'poddak balanna', 23),
	(22, 'aaa@gmail.com', '9th mile post', 'udawaththakumbura', 34),
	(23, 'pathum123@gmail.com', '9th mile post', 'udawaththakumbura', 35),
	(24, 'adooaentry0728125203@gmail.com', '9th mile post', 'udawaththakumbura', 36),
	(25, 'seller01@gmail.com', '9th mile post', 'udawaththakumbura', 37);
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;

-- Dumping structure for table lionhub_db.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wishlist_product1_idx` (`product_id`),
  KEY `fk_wishlist_user1_idx` (`user_email`),
  CONSTRAINT `fk_wishlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_wishlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lionhub_db.watchlist: ~15 rows (approximately)
/*!40000 ALTER TABLE `watchlist` DISABLE KEYS */;
INSERT INTO `watchlist` (`id`, `product_id`, `user_email`) VALUES
	(77, 114, 'adooaentry0728125203@gmail.com'),
	(151, 107, 'user@gmail.com'),
	(152, 123, 'user@gmail.com'),
	(238, 115, 'kasun@gmail.com'),
	(240, 117, 'kasun@gmail.com'),
	(241, 112, 'kasun@gmail.com'),
	(242, 126, 'kasun@gmail.com'),
	(243, 120, 'kasun@gmail.com'),
	(244, 119, 'kasun@gmail.com'),
	(245, 126, 'seller01@gmail.com'),
	(250, 111, 'user@gmail.com'),
	(251, 122, 'user@gmail.com'),
	(252, 114, 'user@gmail.com'),
	(253, 113, 'user@gmail.com'),
	(254, 117, 'user@gmail.com');
/*!40000 ALTER TABLE `watchlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
