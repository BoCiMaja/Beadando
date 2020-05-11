-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3308
-- Létrehozás ideje: 2020. Ápr 19. 11:54
-- Kiszolgáló verziója: 8.0.18
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `xfecaa`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `permission` int(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `permission`) VALUES
(2, 'Maja', 'Bódi', 'buksi.pajti@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(3, 'Bebi', 'Cuki', 'cuki.bebi@kicsicica.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `workers`
--

DROP TABLE IF EXISTS `workers`;
CREATE TABLE IF NOT EXISTS `workers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `nationality` varchar(250) NOT NULL DEFAULT 'Undefined',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `workers`
--

INSERT INTO `workers` (`id`, `first_name`, `last_name`, `email`, `gender`, `nationality`) VALUES
(2, 'Alma', 'Fa', 'alma@fa.com', 2, 'Angol'),
(3, 'Körte', 'Teszt', 'alma@teszt.com', 0, 'Német');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
