SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hotel` (`id`, `uuid`, `name`) VALUES
(1,	123,	'Test name'),
(2,	124,	'Second hotel');

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `rating_hotel_id_create_date` (`rating`,`hotel_id`,`create_date`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `review` (`id`, `hotel_id`, `rating`, `create_date`) VALUES
(5,	2,	1,	'2017-09-23 10:42:19'),
(3,	1,	10,	'2016-09-22 10:41:46'),
(2,	1,	50,	'2017-09-23 10:41:39'),
(4,	1,	70,	'2016-08-23 10:41:52');
