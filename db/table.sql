SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
