-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for cen4010_fa21_g24
CREATE DATABASE IF NOT EXISTS `cen4010_fa21_g24` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cen4010_fa21_g24`;

-- Dumping structure for table cen4010_fa21_g24.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(10) NOT NULL COMMENT 'Post Author',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - Standard Post, 1 - Event',
  `post_title` text NOT NULL COMMENT 'Post Title',
  `post_content` text NOT NULL COMMENT 'Post Contents',
  `event_location` varchar(50) DEFAULT NULL COMMENT 'For events: US ZIP Code',
  `event_link` varchar(50) DEFAULT NULL COMMENT 'For events: URL',
  PRIMARY KEY (`id`),
  KEY `FK_posts_users` (`user`),
  CONSTRAINT `FK_posts_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table cen4010_fa21_g24.posts: ~4 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `user`, `type`, `post_title`, `post_content`, `event_location`, `event_link`) VALUES
	(1, 1, 0, 'Test', 'TEst', NULL, NULL),
	(2, 1, 0, 'Test', 'Test', NULL, NULL),
	(3, 1, 0, 'Test', 'Test 2', NULL, NULL),
	(10, 6, 1, 'Company Test', 'Yes', '33064', 'http://127.0.0.1');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table cen4010_fa21_g24.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '0 - System, 1 - Event Host/Vendor, 2 - User',
  `username` varchar(50) DEFAULT NULL COMMENT 'Unique username',
  `first_name` varchar(50) NOT NULL COMMENT 'First Name or Company Name',
  `last_name` varchar(50) DEFAULT NULL COMMENT 'Last Name',
  `location` varchar(50) DEFAULT NULL COMMENT 'Location as US ZIP code',
  `password_hash` mediumtext NOT NULL COMMENT 'SHA-512',
  `profile_desc` text COMMENT 'Profile Description',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table cen4010_fa21_g24.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `type`, `username`, `first_name`, `last_name`, `location`, `password_hash`, `profile_desc`) VALUES
	(1, 2, 'aaaaaa', 'Test', 'Me', '33064', 'E53DC714E464628B0EB5D566A3B510805B4729CBED31D1106E016340070828475C102F5D0C2CD918F7128AD4C603585F66BFCB5A8AB36CE377E0EE018AD8FD1F', 'Hi!'),
	(2, 2, 'bbbbbb', 'Nope', 'No', NULL, 'E53DC714E464628B0EB5D566A3B510805B4729CBED31D1106E016340070828475C102F5D0C2CD918F7128AD4C603585F66BFCB5A8AB36CE377E0EE018AD8FD1F', 'No!'),
	(3, 2, 'cccccc', 'Test', 'Two', NULL, 'E53DC714E464628B0EB5D566A3B510805B4729CBED31D1106E016340070828475C102F5D0C2CD918F7128AD4C603585F66BFCB5A8AB36CE377E0EE018AD8FD1F', 'Two!'),
	(4, 2, 'test1', 'test1', 'test1', NULL, '3fae8e9370dca8b1da302fda8e1b41fe9019204afd4c0e60c29bf68ed29f26343226f4513a3bd1705a03de656c7c0fec105d3f8e8439d49530e7e87c3e9a1d15', NULL),
	(5, 2, 'test4', 'Tester', '4', NULL, 'f86694407df7e0395eba11380b9142031c2caf61288e165a6f400c210ae1ac7887b132088615eeaba59576ee2dc21f936a89bf69c0caad1ce35a4551316f0260', NULL),
	(6, 1, 'mycompany', 'My Company', '', '33064', 'e23d1c9087a379a1e22ac3f7c1f9935bd4e940650f8e069b601b6e373fd6d0b9930900667d7d15db067afccdf90624752f2dcac758901a7030bfd07f24dc29b5', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
