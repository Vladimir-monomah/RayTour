-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 30 2022 г., 18:42
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `raytour`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$4VjjsXQjMjiBgAONSC4LBOWWEkvo6r0lSqU6N47sEVVec1x3wd6DS', 'jnxxXmsfyrJjTzVfsENgRSLrjMKOtxJ6R61rvAL3SNaSN2ZoJa8AJ750sDOT', '', '2021-02-09 11:19:15');

-- --------------------------------------------------------

--
-- Структура таблицы `albumdetails`
--

CREATE TABLE `albumdetails` (
  `id` int(11) NOT NULL,
  `des` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `albumdetails`
--

INSERT INTO `albumdetails` (`id`, `des`, `img`, `parent`) VALUES
(10, 'Image Details', '1468587013.jpg', '1'),
(9, 'Image Details', '1468587008.jpg', '1'),
(8, 'Image Details', '1468587002.jpg', '1'),
(11, 'Image Details', '1468587018.jpg', '1'),
(12, 'Image Details', '1468587023.jpg', '1'),
(13, 'Image Details', '1468587033.jpg', '1'),
(14, 'Image Details', '1468587238.jpg', '2'),
(15, 'Image Details', '1468587245.jpg', '2'),
(16, 'Image Details', '1468587251.jpg', '2'),
(17, 'Image Details', '1468587257.jpg', '2'),
(18, 'Image Details', '1468587265.jpg', '2'),
(19, 'Image Details', '1468587270.jpg', '2'),
(20, 'Image Details', '1468587276.jpg', '2'),
(21, 'Image Details', '1468587282.jpg', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id`, `name`, `des`, `img`) VALUES
(1, 'Тур на Силхет', 'Силхет - крупный город, расположенный на берегу реки Сурма на северо-востоке Бангладеш.', '1468586973.jpg'),
(2, 'Тур на Кокс Базар', 'Кокс-Базар - это город, рыбацкий порт и районная штаб-квартира в Бангладеше.', '1468587221.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `brand_logo`
--

CREATE TABLE `brand_logo` (
  `id` int(11) NOT NULL,
  `img` varchar(2555) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand_logo`
--

INSERT INTO `brand_logo` (`id`, `img`) VALUES
(1, '20160802181629786920partner1.jpg'),
(2, '20160802181629135238partner2.jpg'),
(3, '20160802181629525390partner3.jpg'),
(5, '20160802181629824163partner5.jpg'),
(18, '20160806001308447497photodunelogo.jpg'),
(17, '20160806001206471642codecanyon.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `cat`
--

INSERT INTO `cat` (`id`, `name`, `img`) VALUES
(1, 'Египет', ''),
(2, 'Греция', ''),
(3, 'Непал', ''),
(4, 'Сингапур', ''),
(7, 'Италия', ''),
(6, 'Доминикана', '');

-- --------------------------------------------------------

--
-- Структура таблицы `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `wcmsg` varchar(1024) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `currency` varchar(255) CHARACTER SET utf8 NOT NULL,
  `head` varchar(255) NOT NULL,
  `txt` blob NOT NULL,
  `about` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `general_setting`
--

INSERT INTO `general_setting` (`id`, `sitename`, `wcmsg`, `address`, `mobile`, `email`, `currency`, `head`, `txt`, `about`) VALUES
(1, 'RayTour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quis, ipsam. Maiores soluta facere accusantium modi libero ullam maxime alias quam sequi neque quae, vero ratione officiis rem deleniti, fugiat commodi voluptas voluptatum ut provident, laboriosam, quod eaque. Iste, maxime, veniam. Quis consequuntur libero, voluptatum vero ullam, veritatis ea culpa.', 'Бугульма, ул. Якупова 54', '89228383135', 'Dia.di.56@mail.ru', 'РУБ', 'What We Do', 0xd09cd0b8d181d181d0b8d18f20c2abd0a2d09a20c2ab526179546f7572c2bb202d20d181d0bed0b7d0b4d0b0d0bdd0b8d0b520d183d181d0bbd0bed0b2d0b8d0b920d0b4d0bbd18f20d0bad0b0d187d0b5d181d182d0b2d0b5d0bdd0bdd0bed0b3d0be20d0bed182d0b4d18bd185d0b020d0b820d0bfd0bed0bbd0b5d0b7d0bdd0bed0b3d0be20d0b4d0bed181d183d0b3d0b02c20d18120d186d0b5d0bbd18cd18e20d180d0b0d181d188d0b8d180d0b5d0bdd0b8d18f20d0bad180d183d0b3d0bed0b7d0bed180d0b020d0b820d0bfd0bed0bbd183d187d0b5d0bdd0b8d18f20d0bdd0bed0b2d18bd1852c20d18fd180d0bad0b8d18520d0b820d0bfd0bed0bbd0bed0b6d0b8d182d0b5d0bbd18cd0bdd18bd18520d18dd0bcd0bed186d0b8d0b92e3c62723e3c62723ed0a6d0b5d0bbd0b820c2abd0a2d09a20c2ab526179546f7572c2bb3a3c62723e266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b312e20d184d0b8d180d0bcd0b020d0b4d0bed0bbd0b6d0bdd0b020d181d182d180d0b5d0bcd0b8d182d18cd181d18f20d0ba20d181d182d0b0d0b1d0b8d0bbd18cd0bdd0bed0bcd18320d0bfd0bed0bbd0bed0b6d0b5d0bdd0b8d18e20d0bdd0b020d180d18bd0bdd0bad0b520d0b7d0b020d181d187d0b5d18220d0b2d18bd18fd0b2d0bbd0b5d0bdd0b8d18f20d0b820d0bfd180d0bed0b4d0b2d0b8d0b6d0b5d0bdd0b8d18f20d0bad0bed0bdd0bad183d180d0b5d0bdd182d0bdd18bd18520d0bfd180d0b5d0b8d0bcd183d189d0b5d181d182d0b23b3c62723e266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20322e20d0b4d0bed181d182d0b8d0b6d0b5d0bdd0b8d0b520d0b4d0bed0bbd0b3d0bed181d180d0bed187d0bdd0bed0b3d0be20d181d0bed182d180d183d0b4d0bdd0b8d187d0b5d181d182d0b2d0b020d18120d0bbd18ed0b1d18bd0bc20d0bad0bbd0b8d0b5d0bdd182d0bed0bc2c20d0bed0b1d180d0b0d182d0b8d0b2d188d0b8d0bcd181d18f20d0b220d184d0b8d180d0bcd1833b3c62723e266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20332e20d183d0b2d0b5d0bbd0b8d187d0b5d0bdd0b8d0b520d0bfd180d0b8d0b1d18bd0bbd0b820d182d183d180d184d0b8d180d0bcd18b2e3c62723e, 0xd09fd0bed0bbd0b8d182d0b8d0bad0b020d182d183d180d0b0d0b3d0b5d0bdd182d181d182d0b2d0b0202d20d181d182d180d0b5d0bcd0bbd0b5d0bdd0b8d0b520d0ba20d0bfd0bed181d182d0bed18fd0bdd0bdd0bed0bcd18320d180d0bed181d182d18320d0bad0b0d187d0b5d181d182d0b2d0b020d182d183d180d0b8d181d182d181d0bad0be2dd18dd0bad181d0bad183d180d181d0b8d0bed0bdd0bdd18bd18520d182d183d180d0bed0b22c20d181d182d180d0b5d0bcd0bbd0b5d0bdd0b8d0b520d181d0b4d0b5d0bbd0b0d182d18c20d0bfd180d0bed0b3d180d0b0d0bcd0bcd18b20d0b1d0bed0bbd0b5d0b520d0bfd180d0b8d0b2d0bbd0b5d0bad0b0d182d0b5d0bbd18cd0bdd18bd0bcd0b82c20d0bfd0bed0b7d0bdd0b0d0b2d0b0d182d0b5d0bbd18cd0bdd18bd0bcd0b820d0b820d0bad0bed0bcd184d0bed180d182d0bdd18bd0bcd0b82e);

-- --------------------------------------------------------

--
-- Структура таблицы `orrdr`
--

CREATE TABLE `orrdr` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tours_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dt` varchar(255) NOT NULL,
  `numppl` varchar(255) NOT NULL,
  `tm` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orrdr`
--

INSERT INTO `orrdr` (`id`, `name`, `tours_id`, `address`, `mobile`, `email`, `dt`, `numppl`, `tm`, `stat`) VALUES
(4, 'Иванов Иван Иванович', 164, 'г. Алматы, ул. Серпуховская 45', '89456987231', 'ivan@mail.ru', '02/28/2021', '5', '1612966882', '2'),
(5, 'Иванов Иван Иванович', 165, 'вамшщвыраыфдвр', '946264945626', 'ivan1@mail.ru', '02/25/2021', '2', '1613068122', '0'),
(6, 'Иванов Иван Иванович', 164, 'вдстывдлмт', '111', 'ivan@mail.ru', '02/28/2021', '2', '1614006419', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `slider_home`
--

CREATE TABLE `slider_home` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `btxt` varchar(2555) NOT NULL,
  `stxt` varchar(2555) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider_home`
--

INSERT INTO `slider_home` (`id`, `img`, `btxt`, `stxt`) VALUES
(13, '1612798732.jpg', '', ''),
(12, '1612798723.jpg', '', ''),
(9, '1612798686.jpg', '', ''),
(10, '1612798699.jpg', '', ''),
(11, '1612798717.jpg', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL,
  `li` varchar(255) NOT NULL,
  `yt` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `social`
--

INSERT INTO `social` (`id`, `fb`, `tw`, `gp`, `li`, `yt`) VALUES
(1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` blob DEFAULT NULL,
  `inc` blob DEFAULT NULL,
  `exc` blob DEFAULT NULL,
  `loc` varchar(255) NOT NULL,
  `dur` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tours`
--

INSERT INTO `tours` (`id`, `name`, `rate`, `parent`, `img`, `description`, `inc`, `exc`, `loc`, `dur`, `featured`) VALUES
(165, 'Греция из Казани 2021', 42575, '2', '1612866793.jpg', 0x3c7370616e3ed09dd0b5d0b4d0b0d180d0bed0bc20d0b3d0bed0b2d0bed180d18fd1822c20d187d182d0be20d0b220d093d180d0b5d186d0b8d0b820d0b5d181d182d18c20d0b2d181d0b52e20d0a8d0b8d0bad0b0d180d0bdd18bd0b520d0bfd0bbd18fd0b6d0b82c20d0bbd183d187d188d0b8d0b520d0bed182d0b5d0bbd0b820d0bcd0b8d180d0b02c20d182d0b5d0bfd0bbd0bed0b520d0bcd0bed180d0b52c20d0b2d0bad183d181d0bdd0b5d0b9d188d0b0d18f20d0b3d180d0b5d187d0b5d181d0bad0b0d18f20d0bad183d185d0bdd18f2c20d181d0b0d0bcd18bd0b520d0bad180d0b0d181d0b8d0b2d18bd0b520d0b2d0b8d0b4d18b2c20d0b3d0bed180d18b20d0b820d181d0bed0bbd0bdd186d0b52120d09dd0b5d0b2d0b0d0b6d0bdd0be20d0bad0b0d0bad0bed0b920d0bed182d0b4d18bd18520d092d18b20d0b8d189d0b5d182d0b52c20d0b5d0b4d0b5d182d0b520d092d18b20d18120d181d0b5d0bcd18cd0b5d0b920d0b8d0bbd0b820d0bfd0b0d180d0bed0b9202d20d0b4d180d183d0b6d0b5d0bbd18ed0b1d0bdd0b0d18f20d093d180d0b5d186d0b8d18f20d0b6d0b4d0b5d18220d0b8d0bcd0b5d0bdd0bdd0be20d092d0b0d181213c62723e3c2f7370616e3e3c6469763e3c62723e3c2f6469763e3c68323e3c623ed09ed0b1d189d0b8d0b520d181d0b2d0b5d0b4d0b5d0bdd0b8d18f3c2f623e3c2f68323e3c7370616e3e3c62723e3c6469763ed093d180d0b5d186d0b8d18f2c20d0bed184d0b8d186d0b8d0b0d0bbd18cd0bdd0be20d093d180d0b5d187d0b5d181d0bad0b0d18f20d0a0d0b5d181d0bfd183d0b1d0bbd0b8d0bad0b0202d20d0b3d0bed181d183d0b4d0b0d180d181d182d0b2d0be2c20d180d0b0d181d0bfd0bed0bbd0bed0b6d0b5d0bdd0bdd0bed0b520d0b220d0aed0b6d0bdd0bed0b920d095d0b2d180d0bed0bfd0b52e20d098d0bcd0b5d0b5d18220d181d183d185d0bed0bfd183d182d0bdd183d18e20d0b3d180d0b0d0bdd0b8d186d18320d18120d090d0bbd0b1d0b0d0bdd0b8d0b5d0b92c20d0a0d0b5d181d0bfd183d0b1d0bbd0b8d0bad0bed0b920d09cd0b0d0bad0b5d0b4d0bed0bdd0b8d0b5d0b920d0b820d091d0bed0bbd0b3d0b0d180d0b8d0b5d0b92c20d0bdd0b020d181d0b5d0b2d0b5d180d0be2dd0b2d0bed181d182d0bed0bad0b520d0b820d0b2d0bed181d182d0bed0bad0b5202d20d18120d0a2d183d180d186d0b8d0b5d0b92e20d0a0d0b0d181d0bfd0bed0bbd0bed0b6d0b5d0bdd0b020d0bdd0b020d091d0b0d0bbd0bad0b0d0bdd181d0bad0bed0bc20d0bfd0bed0bbd183d0bed181d182d180d0bed0b2d0b520d0b820d0bcd0bdd0bed0b3d0bed187d0b8d181d0bbd0b5d0bdd0bdd18bd18520d0bed181d182d180d0bed0b2d0b0d1852e20d09ed0bcd18bd0b2d0b0d0b5d182d181d18f20d0add0b3d0b5d0b9d181d0bad0b8d0bc20d0b820d0a4d180d0b0d0bad0b8d0b9d181d0bad0b8d0bc20d0bcd0bed180d18fd0bcd0b820d0bdd0b020d0b2d0bed181d182d0bed0bad0b52c20d098d0bed0bdd0b8d187d0b5d181d0bad0b8d0bc20d0bdd0b020d0b7d0b0d0bfd0b0d0b4d0b52c20d0bdd0b020d18ed0b3d0b5202d20d0a1d180d0b5d0b4d0b8d0b7d0b5d0bcd0bdd18bd0bc20d0b820d09ad180d0b8d182d181d0bad0b8d0bc20d0bcd0bed180d18fd0bcd0b82e3c62723e3c62723ed09fd0be20d181d0b2d0bed0b8d0bc20d180d0b0d0b7d0bcd0b5d180d0b0d0bc20d093d180d0b5d186d0b8d18f20d0b7d0b0d0bdd0b8d0bcd0b0d0b5d18220393620d0bcd0b5d181d182d0be20d0b220d0bcd0b8d180d0b5202d2031333220d0bad0bc322e3c62723e3c62723ed09ad0bbd0b8d0bcd0b0d18220d093d180d0b5d186d0b8d0b820d185d0b0d180d0b0d0bad182d0b5d180d0b8d0b7d183d0b5d182d181d18f20d0bcd18fd0b3d0bad0bed0b920d0b2d0bbd0b0d0b6d0bdd0bed0b920d0b7d0b8d0bcd0bed0b920d0b820d0b6d0b0d180d0bad0b8d0bc20d181d183d185d0b8d0bc20d0bbd0b5d182d0bed0bc2e3c2f6469763e3c2f7370616e3e, 0x3c6469763e3c6469763ed09ed091d0a9d090d0af20d098d09dd0a4d09ed0a0d09cd090d0a6d098d0af3c2f6469763e3c6469763e3c6469763e3c2f6469763e3c6469763e3c623ed0a0d0b0d181d0bfd0bed0bbd0bed0b6d0b5d0bdd0b8d0b5266e6273703b3c2f623ed0b220323520d0bad0bc20d0bed18220d0b0d18dd180d0bed0bfd0bed180d182d0b020d0b32e20d098d180d0b0d0bad0bbd0b8d0bed0bd2c20d0b2203120d0bad0bc20d0bed18220d0bad183d180d0bed180d182d0bdd0bed0b3d0be20d0b3d0bed180d0bed0b4d0b020d0a5d0b5d180d181d0bed0bdd0b8d181d181d0bed1812e20d090d0b2d182d0bed0b1d183d181d0bdd0b0d18f20d0bed181d182d0b0d0bdd0bed0b2d0bad0b020d0b22031303020d0bc20d0bed18220d0bed182d0b5d0bbd18f2e20d092d0b5d187d0b5d180d0bdd0b8d0b520d180d0b0d0b7d0b2d0bbd0b5d187d0b5d0bdd0b8d18f3a20d0b32e20d0a5d0b5d180d181d0bed0bdd0b8d181d181d0bed18120283120d0bad0bc293c2f6469763e3c6469763e3c623ed0a2d0b5d0bbd0b5d184d0bed0bd266e6273703b3c2f623e2b3330323839373032323237313c2f6469763e3c6469763e3c623ed0a1d0b0d0b9d182266e6273703b3c2f623e3c6120687265663d22687474703a2f2f7777772e657269686f74656c732e677222207461726765743d22222072656c3d22223e687474703a2f2f7777772e657269686f74656c732e67723c2f613e3c62723e3c62723e3c2f6469763e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed09fd09bd0afd0963c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed0bad0b0d0b1d0b8d0bdd0bad0b820d0b4d0bbd18f20d0bfd0b5d180d0b5d0bed0b4d0b5d0b2d0b0d0bdd0b8d18f3c2f6c693e3c6c693ed0bfd0b5d181d187d0b0d0bdd0be2dd0b3d0b0d0bbd0b5d187d0bdd18bd0b920283220d0bfd0bbd18fd0b6d0b0293c2f6c693e3c6c693ed0bdd0b020d0bfd0bbd18fd0b6d0b520d0b7d0bed0bdd182d0b8d0bad0b82c20d188d0b5d0b7d0bbd0bed0bdd0b3d0b83a20d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be3c2f6c693e3c6c693ed0b2d185d0bed0b420d0b220d0bcd0bed180d0b53a20d0bad0b0d0bcd0b5d0bdd0b8d181d182d18bd0b92028d0bcd0b5d181d182d0b0d0bcd0b820d0bfd180d0bed185d0bed0b4d0b8d18220d0bfd180d0b8d180d0bed0b4d0bdd0b0d18f20d0bad0b0d0bcd0b5d0bdd0bdd0b0d18f20d0bfd0bbd0b8d182d0b0293c2f6c693e3c6c693ed0bdd0b020d0bfd0bbd18fd0b6d0b520d0b7d0bed0bdd182d0b8d0bad0b82c20d188d0b5d0b7d0bbd0bed0bdd0b3d0b82c20d0bcd0b0d182d180d0b0d181d18b3a20d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be3c2f6c693e3c6c693ed0b4d183d1883c2f6c693e3c6c693ed0bdd0b020d0bfd0bbd18fd0b6d0b520d0bfd0bed0bbd0bed182d0b5d0bdd186d0b03a20d0bdd0b5d1823c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed0a2d095d0a0d0a0d098d0a2d09ed0a0d098d0af20d09ed0a2d095d09bd0af3c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed098d0bdd182d0b5d180d0bdd0b5d18220d0bfd0bbd0b0d182d0bdd0be2028d0b8d0bdd182d0b5d180d0bdd0b5d182202d20d183d0b3d0bed0bbd0bed0ba293c2f6c693e3c6c693ed0bfd0b0d180d0bad0bed0b2d0bad0b020d0b5d181d182d18c3c2f6c693e3c6c693ed0b1d0b0d180d18b3a20333c2f6c693e3c6c693ed0b1d0b0d181d181d0b5d0b9d0bdd18b3a203320283220d0b8d0b720d0bad0bed182d0bed180d18bd18520d18120d0bcd0bed180d181d0bad0bed0b920d0b2d0bed0b4d0bed0b93b20d0b2d0bed0b4d0bdd18bd0b520d0b3d0bed180d0bad0b8202d20d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693e57692d466920d0b220d0bbd0bed0b1d0b1d0b82c20d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be3c2f6c693e3c6c693ed18320d0b1d0b0d181d181d0b5d0b9d0bdd0b020d0b7d0bed0bdd182d0b8d0bad0b82c20d188d0b5d0b7d0bbd0bed0bdd0b3d0b83a20d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be3c2f6c693e3c6c693ed0b0d0bcd184d0b8d182d0b5d0b0d182d1803c2f6c693e3c6c693ed0a2d0922dd0b7d0b0d0bb3c2f6c693e3c6c693ed180d0b5d181d182d0bed180d0b0d0bdd18b3a20313c2f6c693e3c6c693ed0bcd0b8d0bdd0b8d0bcd0b0d180d0bad0b5d1823c2f6c693e3c6c693ed0b2d180d0b0d18720d0bfd0be20d0b2d18bd0b7d0bed0b2d1832028d0bfd0be20d0b7d0b0d0bfd180d0bed181d1832c20d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed091d095d0a1d09fd09bd090d0a2d09dd0abd09520d0a3d0a1d09bd0a3d093d0983c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed182d180d0b5d0bdd0b0d0b6d0b5d180d0bdd18bd0b920d0b7d0b0d0bb3c2f6c693e3c6c693ed0bdd0b0d181d182d0bed0bbd18cd0bdd18bd0b920d182d0b5d0bdd0bdd0b8d1813c2f6c693e3c6c693ed182d0b5d0bdd0bdd0b8d181d0bdd18bd0b920d0bad0bed180d182202832293c2f6c693e3c6c693ed0b2d0bed0bbd0b5d0b9d0b1d0bed0bb3c2f6c693e3c6c693ed0b2d0b5d187d0b5d180d0bdd0b5d0b520d188d0bed1833c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed09fd09bd090d0a2d09dd0abd09520d0a3d0a1d09bd0a3d093d0983c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed18dd0bbd0b5d0bad182d180d0bed0bdd0bdd18bd0b520d0b8d0b3d180d18b3c2f6c693e3c6c693ed0b1d0b8d0bbd18cd18fd180d0b43c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed094d09bd0af20d094d095d0a2d095d0993c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed0bed182d0b4d0b5d0bbd0b5d0bdd0b8d0b520d0b4d0bbd18f20d0b4d0b5d182d0b5d0b920d0b220d0b1d0b0d181d181d0b5d0b9d0bdd0b520d0b4d0bbd18f20d0b2d0b7d180d0bed181d0bbd18bd185202833293c2f6c693e3c6c693ed0b4d0b5d182d181d0bad0b0d18f20d0bfd0bbd0bed189d0b0d0b4d0bad0b03c2f6c693e3c6c693ed0b4d0b5d182d181d0bad0b8d0b520d0bad0bbd183d0b1d18b3a20313c2f6c693e3c6c693ed0b4d0b5d182d181d0bad0b8d0b520d181d182d183d0bbd18cd187d0b8d0bad0b820d0b220d180d0b5d181d182d0bed180d0b0d0bdd0b53a20d0b5d181d182d18c3c2f6c693e3c6c693ed0b4d0b5d182d181d0bad0b0d18f20d0bad180d0bed0b2d0b0d182d0bad0b03a20d0bfd0be20d0b7d0b0d0bfd180d0bed181d1832c20d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be3c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed09fd098d0a2d090d09dd098d0953c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693e41493c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed09220d09dd09ed09cd095d0a0d0953c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed0b2d0b0d0bdd0bdd0b020d0b8d0bbd0b820d0b4d183d1883c2f6c693e3c6c693ed0b1d0b0d0bbd0bad0bed0bd20d0b8d0bbd0b820d182d0b5d180d180d0b0d181d0b03c2f6c693e3c6c693ed182d0b5d0bbd0b5d184d0bed0bd3c2f6c693e3c6c693ed184d0b5d0bd3a20d0b5d181d182d18c3c2f6c693e3c6c693ed0bcd0b8d0bdd0b82dd185d0bed0bbd0bed0b4d0b8d0bbd18cd0bdd0b8d0ba3c2f6c693e3c6c693ed0bad0bed0bdd0b4d0b8d186d0b8d0bed0bdd0b5d1803a20d0b8d0bdd0b4d0b8d0b2d0b8d0b4d183d0b0d0bbd18cd0bdd18bd0b92028d0bfd0bbd0b0d182d0bdd0be2c20d0b220d0bfd0b5d180d0b8d0bed0b420d1812030332e303720d0bfd0be2033312e30382d20d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0a2d0923a20d181d0bfd183d182d0bdd0b8d0bad0bed0b2d0bed0b53c2f6c693e3c6c693ed0bfd0bed0bb3a20d0bad0b5d180d0b0d0bcd0b8d187d0b5d181d0bad0b0d18f20d0bfd0bbd0b8d182d0bad0b03c2f6c693e3c6c693ed181d0b5d0b9d1843a20d0b220d0bdd0bed0bcd0b5d180d0b52c20d0bfd0bbd0b0d182d0bdd0be3c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed0a2d098d09fd0ab20d09dd09ed09cd095d0a0d09ed0923c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693e50726f6d6f20526f6f6d20517561647269706c653c2f6c693e3c6c693e517561647275706c6520526f6f6d2053656120566965773c2f6c693e3c6c693e50726f6d6f20526f6f6d3c2f6c693e3c6c693e5374616e646172642047617264656e20566965773c2f6c693e3c6c693e5374616e646172642053656120566965773c2f6c693e3c6c693e46616d696c7920526f6f6d2032204264726d2047563c2f6c693e3c6c693e517561647275706c6520726f6f6d2047617264656e20766965773c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e, 0xd092d181d0b520d18dd0bad181d0bad183d180d181d0b8d0b820d0bed0bfd0bbd0b0d187d0b8d0b2d0b0d18ed182d181d18f20d0bed182d0b4d0b5d0bbd18cd0bdd0be2e, 'Eri Beach & Village Hotel 4*', '9', '1'),
(164, 'Египет из Казани 2021', 39428, '1', '1612865538.jpg', 0x3c7370616e3ed095d0b3d0b8d0bfd0b5d182202d20d18dd182d0be20d181d182d180d0b0d0bdd0b02c20d0b220d0bad0bed182d0bed180d0bed0b920d181d182d0bed0b8d18220d0bfd0bed0b1d18bd0b2d0b0d182d18c20d185d0bed182d18f20d0b1d18b20d180d0b0d0b720d0b220d0b6d0b8d0b7d0bdd0b82120d092d0b5d0b4d18c20d182d0bed0bbd18cd0bad0be20d0b220d18dd182d0bed0bc20d183d0b3d0bed0bbd0bad0b520d0bcd0b8d180d0b020d0b2d18b20d181d0bcd0bed0b6d0b5d182d0b520d0bed0bad183d0bdd183d182d18cd181d18f20d0b220d0b0d182d0bcd0bed181d184d0b5d180d18320d0b4d180d0b5d0b2d0bdd0b5d0b9d188d0b5d0b920d186d0b8d0b2d0b8d0bbd0b8d0b7d0b0d186d0b8d0b82c20d0b3d180d0b0d0bdd0b4d0b8d0bed0b7d0bdd18bd18520d0bfd0b8d180d0b0d0bcd0b8d0b42c20d0bcd0bed0b3d183d189d0b5d181d182d0b2d0b5d0bdd0bdd18bd18520d184d0b0d180d0b0d0bed0bdd0bed0b220d0b820d0bfd180d0b5d0bad180d0b0d181d0bdd18bd18520d186d0b0d180d0b8d1862120d097d0b0d0b3d0b0d0b4d0bad0b820d0b8d181d182d0bed180d0b8d0b82c20d0bdd0b520d0b5d0b4d0b8d0bdd181d182d0b2d0b5d0bdd0bdd0bed0b520d187d182d0be20d0bcd0b0d0bdd0b8d18220d0bfd0bed181d0b5d182d0b8d182d18c20d18dd182d18320d187d183d0b4d0b5d181d0bdd183d18e20d181d182d180d0b0d0bdd1832c20d182d0b0d0bad0b6d0b520d0bed0bdd0b020d0b8d0b7d0b2d0b5d181d182d0bdd0b020d181d0b2d0bed0b8d0bc20d18dd0bad0b7d0bed182d0b8d187d0b5d181d0bad0b8d0bc20d0bad180d0b0d181d0bdd18bd0bc20d0bcd0bed180d0b5d0bc2c20d0bad0bed182d0bed180d0bed0b520d182d0bed187d0bdd0be20d0bdd0b520d0bed181d182d0b0d0b2d0b8d18220d092d0b0d18120d180d0b0d0b2d0bdd0bed0b4d183d188d0bdd18bd0bc20d0ba20d095d0b3d0b8d0bfd182d1832120d09dd0b520d0bed182d0bad0b0d0b7d18bd0b2d0b0d0b9d182d0b520d181d0b5d0b1d0b520d0b220d183d0b4d0bed0b2d0bed0bbd18cd181d182d0b2d0b8d0b820d0bfd0bed0b1d18bd0b2d0b0d182d18c20d0b220d18dd182d0bed0b920d183d0b4d0b8d0b2d0b8d182d0b5d0bbd18cd0bdd0bed0b920d181d182d180d0b0d0bdd0b5213c62723e3c62723e3c2f7370616e3e3c68333e3c623ed09ed0b1d189d0b8d0b520d181d0b2d0b5d0b4d0b5d0bdd0b8d18f3c2f623e3c2f68333e3c6469763ed095d0b3d0b8d0bfd0b5d1822c20d0bed184d0b8d186d0b8d0b0d0bbd18cd0bdd0bed0b520d0bdd0b0d0b7d0b2d0b0d0bdd0b8d0b5202d20d090d180d0b0d0b1d181d0bad0b0d18f20d180d0b5d181d0bfd183d0b1d0bbd0b8d0bad0b020d095d0b3d0b8d0bfd0b5d182202d20d0b3d0bed181d183d0b4d0b0d180d181d182d0b2d0be20d0b220d0a1d0b5d0b2d0b5d180d0bdd0bed0b920d090d184d180d0b8d0bad0b520d0b820d0bdd0b020d0a1d0b8d0bdd0b0d0b9d181d0bad0bed0bc20d0bfd0bed0bbd183d0bed181d182d180d0bed0b2d0b520d090d0b7d0b8d0b82c20d0bfd0bed18dd182d0bed0bcd18320d18fd0b2d0bbd18fd0b5d182d181d18f20d181d182d180d0b0d0bdd0bed0b920d0b4d0b2d183d18520d0bcd0b0d182d0b5d180d0b8d0bad0bed0b22e3c62723ed09dd0b020d181d0b5d0b2d0b5d180d0be2dd0b2d0bed181d182d0bed0bad0b520d0b3d180d0b0d0bdd0b8d187d0b8d18220d18120d098d0b7d180d0b0d0b8d0bbd0b5d0bc2c20d0a1d0b5d0bad182d0bed180d0bed0bc20d093d0b0d0b7d0b02e20d09dd0b020d18ed0b3d0b520d18120d0a1d183d0b4d0b0d0bdd0bed0bc2e20d09dd0b020d0b7d0b0d0bfd0b0d0b4d0b520d18120d09bd0b8d0b2d0b8d0b5d0b92e20d09dd0b020d181d0b5d0b2d0b5d180d0b520d182d0b5d180d180d0b8d182d0bed180d0b8d18f20d0bed0bcd18bd0b2d0b0d0b5d182d181d18f20d0b2d0bed0b4d0b0d0bcd0b820d0a1d180d0b5d0b4d0b8d0b7d0b5d0bcd0bdd0bed0b3d0be2c20d0bdd0b020d0b2d0bed181d182d0bed0bad0b5202d20d09ad180d0b0d181d0bdd0bed0b3d0be20d0bcd0bed180d0b5d0b92e20d09ed0b1d0b020d0bcd0bed180d18f20d181d0bed0b5d0b4d0b8d0bdd0b5d0bdd18b20d0bfd0bed181d180d0b5d0b4d181d182d0b2d0bed0bc20d0b8d181d0bad183d181d181d182d0b2d0b5d0bdd0bdd0be20d181d0bed0bed180d183d0b6d191d0bdd0bdd0bed0b3d0be20d0a1d183d18dd186d0bad0bed0b3d0be20d0bad0b0d0bdd0b0d0bbd0b02e3c62723ed09fd0be20d181d0b2d0bed0b8d0bc20d180d0b0d0b7d0bcd0b5d180d0b0d0bc20d095d0b3d0b8d0bfd0b5d18220d0b7d0b0d0bdd0b8d0bcd0b0d0b5d18220333020d0bcd0b5d181d182d0be20d0b220d0bcd0b8d180d0b5202d2031203030312034353020d0bad0bc322e3c62723ed095d0b3d0b8d0bfd0b5d18220d18fd0b2d0bbd18fd0b5d182d181d18f20d187d0b0d181d182d18cd18e20d0bfd183d181d182d18bd0bdd0b820d0a1d0b0d185d0b0d180d18b2e3c62723e3c62723ed09bd0b5d182d0be20d0bed187d0b5d0bdd18c20d0b6d0b0d180d0bad0bed0b52c20d181d182d0bed0bbd0b1d0b8d0ba20d182d0b5d180d0bcd0bed0bcd0b5d182d180d0b020d0bcd0bed0b6d0b5d18220d0bcd0b5d181d182d0b0d0bcd0b820d0b220d182d0b5d0bdd0b820d0bfd180d0b8d0b1d0bbd0b8d0b6d0b0d182d18cd181d18f20d0ba2035302dd0b3d180d0b0d0b4d183d181d0bdd0bed0b920d0bed182d0bcd0b5d182d0bad0b52c20d0bdd0be20d0bdd0bed187d18cd18e20d0b2d181d0b5d0b3d0b4d0b020d0bdd0b0d0bcd0bdd0bed0b3d0be20d0bfd180d0bed185d0bbd0b0d0b4d0bdd0b5d0b52c20d181d183d182d0bed187d0bdd18bd0b520d0bfd0b5d180d0b5d0bfd0b0d0b4d18b20d182d0b5d0bcd0bfd0b5d180d0b0d182d183d18020d0bed187d0b5d0bdd18c20d0b2d0b5d0bbd0b8d0bad0b82c20d0bcd0b5d0b6d181d0b5d0b7d0bed0bdd0bdd18bd0b520d0bcd0b5d0bdd18cd188d0b52e3c62723ed09ed181d0b0d0b4d0bad0bed0b220d0bed187d0b5d0bdd18c20d0bcd0b0d0bbd0be2028d0b4d0be20323520d0bcd0bc20d0b220d0b3d0bed0b4292c20d182d0bed0bbd18cd0bad0be20d0bdd0b020d0bad180d0b0d0b9d0bdd0b5d0bc20d181d0b5d0b2d0b5d180d0b520d095d0b3d0b8d0bfd182d0b020d0b820d0b220d0b3d0bed180d0b0d18520d0a1d0b8d0bdd0b0d0b9d181d0bad0bed0b3d0be20d0bfd0bed0bbd183d0bed181d182d180d0bed0b2d0b020d0bad0bed0bbd0b8d187d0b5d181d182d0b2d0be20d0bed181d0b0d0b4d0bad0bed0b220d0b4d0bed185d0bed0b4d0b8d18220d0b4d0be2032303020d0bcd0bc20d0b220d0b3d0bed0b42e3c2f6469763e, 0x3c6469763e3c6469763e3c623ed09ed091d0a9d090d0af20d098d09dd0a4d09ed0a0d09cd090d0a6d098d0af3c2f623e3c2f6469763e3c6469763e3c6469763ed09ed182d0b5d0bbd18c20d181d0bed181d182d0bed0b8d18220d0b8d0b720d0b4d0b2d183d185d18dd182d0b0d0b6d0bdd18bd18520d0bad0bed180d0bfd183d181d0bed0b22c20d181d182d0bed18fd189d0b8d18520d0b2d0bed0bad180d183d0b320d0b1d0b0d181d181d0b5d0b9d0bdd0b03c2f6469763e3c6469763e3c623ed09ed181d0bdd0bed0b2d0b0d0bd20d0b2266e6273703b3c2f623e3230303420d0b32e3c2f6469763e3c6469763e3c623ed09fd0bed181d0bbd0b5d0b4d0bdd18fd18f20d180d0b5d181d182d0b0d0b2d180d0b0d186d0b8d18f20d0b2266e6273703b3c2f623e3230303920d0b32e3c2f6469763e3c6469763e3c623ed0a0d0b0d181d0bfd0bed0bbd0bed0b6d0b5d0bdd0b8d0b5266e6273703b3c2f623e323520d0bad0bc20d0bed18220d0b0d18dd180d0bed0bfd0bed180d182d0b020d0b32e20d0a8d0b0d180d0bc2dd18dd0bbd18c2dd0a8d0b5d0b9d1852c203820d0bad0bc20d0bed18220d09dd0b0d0b0d0bcd0b020d091d0b5d0b92c20d0b220d0a0d0b0d18120d09ed0bc20d0add0bbd18c20d0a1d0b8d0b43c2f6469763e3c6469763e3c623ed09fd0bbd0bed189d0b0d0b4d18c266e6273703b3c2f623e3137266e6273703b30303020d0bad0b220d0bcd0bc3c2f6469763e3c6469763e3c623ed0a2d0b5d0bbd0b5d184d0bed0bd266e6273703b3c2f623e28322030363929203335322039392032342f203336362035362035303c2f6469763e3c6469763e3c623ed0a1d0b0d0b9d182266e6273703b3c2f623e3c6120687265663d22687474703a2f2f7777772e6c756e61736861726d2e636f6d22207461726765743d22222072656c3d22223e7777772e6c756e61736861726d2e636f6d3c2f613e3c62723e3c62723e3c2f6469763e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed09fd09bd0afd0963c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed0bdd0b020d0bfd0bbd18fd0b6d0b520d0bfd0bed0bbd0bed182d0b5d0bdd186d0b02028d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0bfd0b5d181d187d0b0d0bdd18bd0b920d0bfd0bbd18fd0b63c2f6c693e3c6c693ed0bdd0b020d0bfd0bbd18fd0b6d0b520d0b7d0bed0bdd182d0b8d0bad0b82c20d188d0b5d0b7d0bbd0bed0bdd0b3d0b82c20d0bcd0b0d182d180d0b0d181d18b2028d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0b0d0b2d182d0bed0b1d183d18120d0b4d0be20d0bfd0bbd18fd0b6d0b02028d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed0a2d095d0a0d0a0d098d0a2d09ed0a0d098d0af20d09ed0a2d095d09bd0af3c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed0b0d0b2d182d0bed0b1d183d18120d0b4d0be20d186d0b5d0bdd182d180d0b020d0b3d0bed180d0bed0b4d0b02028d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0b8d0bdd182d0b5d180d0bdd0b5d1822dd0bad0b0d184d0b53c2f6c693e3c6c693e3120d0bed182d0bad180d18bd182d18bd0b920d0b1d0b0d181d181d0b5d0b9d0bd3c2f6c693e3c6c693ed0b1d0b0d1803c2f6c693e3c6c693e57692d466920d0b220d0bbd0bed0b1d0b1d0b83c2f6c693e3c6c693ed0bed0b1d0bcd0b5d0bd20d0b2d0b0d0bbd18ed182d18b3c2f6c693e3c6c693ed180d0b5d181d182d0bed180d0b0d0bdd18b3c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed09fd09bd090d0a2d09dd0abd09520d0a3d0a1d09bd0a3d093d0983c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed181d0b0d183d0bdd0b03c2f6c693e3c6c693ed0b4d0b6d0b0d0bad183d0b7d0b83c2f6c693e3c6c693ed0bcd0b0d181d181d0b0d0b63c2f6c693e3c6c693ed0bdd0b0d181d182d0bed0bbd18cd0bdd18bd0b920d182d0b5d0bdd0bdd0b8d1813c2f6c693e3c6c693ed0b2d0bed0bbd0b5d0b9d0b1d0bed0bb3c2f6c693e3c6c693ed0bfd0bbd18fd0b6d0bdd18bd0b920d0b2d0bed0bbd0b5d0b9d0b1d0bed0bb3c2f6c693e3c6c693ed0b1d0b8d0bbd18cd18fd180d0b43c2f6c693e3c6c693ed0b4d0b0d180d182d1813c2f6c693e3c6c693ed0b4d0b0d0b9d0b2d0b8d0bdd0b33c2f6c693e3c6c693ed0bad0b0d182d0b0d0bcd0b0d180d0b0d0bd3c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed0a3d0a1d09bd0a3d093d0983c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed0b2d0bed0b4d0bdd0bed0b520d0bfd0bed0bbd0be2028d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0b4d0b0d0b9d0b2d0b8d0bdd0b32dd186d0b5d0bdd182d1802028d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0bcd0b0d181d181d0b0d0b62028d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0b1d0b8d0bbd18cd18fd180d0b42028d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0b2d0bed0bbd0b5d0b9d0b1d0bed0bb20d0bdd0b020d0bfd0bbd18fd0b6d0b52028d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0bdd0b0d181d182d0bed0bbd18cd0bdd18bd0b920d182d0b5d0bdd0bdd0b8d1812028d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed0b2d0b5d187d0b5d180d0bdd0b5d0b520d188d0bed18320283120d180d0b0d0b720d0b220d0bdd0b5d0b4d0b5d0bbd18e293c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed094d09bd0af20d094d095d0a2d095d0993c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed0b4d0b5d182d181d0bad0b8d0b920d0b1d0b0d181d181d0b5d0b9d0bd3c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed09fd098d0a2d090d09dd098d0953c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693e42423c2f6c693e3c6c693e48423c2f6c693e3c6c693e41493c2f6c693e3c6c693ed0b7d0b0d0bad183d181d0bad0b83c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed09ad09ed09dd0a6d095d09fd0a6d098d0af20d09fd098d0a2d090d09dd098d0af3c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed0b7d0b0d0b2d182d180d0b0d0ba202830373a30302d31303a3030293c2f6c693e3c6c693ed0bed0b1d0b5d0b4202831333a30302d31353a3030293c2f6c693e3c6c693ed183d0b6d0b8d0bd202831393a30302d32313a30302920e2809420d188d0b2d0b5d0b4d181d0bad0b8d0b920d181d182d0bed0bb3c2f6c693e3c6c693ed0bfd0bed0b7d0b4d0bdd0b8d0b920d183d0b6d0b8d0bd2028d0bfd0be20d0b7d0b0d0bfd180d0bed181d183293c2f6c693e3c6c693ed0bfd180d0bed185d0bbd0b0d0b4d0b8d182d0b5d0bbd18cd0bdd18bd0b520d0bdd0b0d0bfd0b8d182d0bad0b82c20d0b0d0bbd0bad0bed0b3d0bed0bbd18cd0bdd18bd0b520d0bdd0b0d0bfd0b8d182d0bad0b820d0bcd0b5d181d182d0bdd0bed0b3d0be20d0bfd180d0bed0b8d0b7d0b2d0bed0b4d181d182d0b2d0b02028d0b1d0b5d181d0bfd0bbd0b0d182d0bdd0be20d0b4d0bbd18f204149293c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed09220d09dd09ed09cd095d0a0d0953c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693ed182d0b5d0bbd0b5d0b2d0b8d0b7d0bed1803c2f6c693e3c6c693e726f6f6d20736572766963652028d0bfd0bbd0b0d182d0bdd0be293c2f6c693e3c6c693ed186d0b5d0bdd182d180d0b0d0bbd18cd0bdd18bd0b920d0bad0bed0bdd0b4d0b8d186d0b8d0bed0bdd0b5d1803c2f6c693e3c6c693ed0b4d183d1883c2f6c693e3c6c693ed182d0b5d0bbd0b5d184d0bed0bd3c2f6c693e3c6c693ed0b1d0b0d0bbd0bad0bed0bd20d0b8d0bbd0b820d182d0b5d180d180d0b0d181d0b03c2f6c693e3c6c693ed183d0b1d0bed180d0bad0b020d0bdd0bed0bcd0b5d180d0b03a20d0b5d0b6d0b5d0b4d0bdd0b5d0b2d0bdd0be3c2f6c693e3c6c693ed181d0bcd0b5d0bdd0b020d0b1d0b5d0bbd18cd18f3a20d0b5d0b6d0b5d0b4d0bdd0b5d0b2d0bdd0be2028d0bfd0be20d0b7d0b0d0bfd180d0bed181d183293c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e3c6469763e3c6469763e3c623ed0a2d098d09fd0ab20d09dd09ed09cd095d0a0d09ed0923c2f623e3c2f6469763e3c6469763e3c756c3e3c6c693e7374616e646172743c2f6c693e3c6c693e66616d696c793c2f6c693e3c6c693e73756974653c2f6c693e3c2f756c3e3c2f6469763e3c2f6469763e, 0xd092d181d0b520d18dd0bad181d0bad183d180d181d0b8d0b820d0bed0bfd0bbd0b0d187d0b8d0b2d0b0d18ed182d181d18f20d0bed182d0b4d0b5d0bbd18cd0bdd0be, 'Luna Sharm (Ex. Mercure Luna Sharm El Sheikh) 3*', '9', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remember_token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `city`, `address`, `remember_token`) VALUES
(1, 'Иванов Иван Иванович', 'ivan@mail.ru', 234234, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'fdsa', 'sdafsd', 'SG8LQRGti643lX6TFrx0oHm7h2ERNVLIKD0x0uFDgW5GMgXMxm'),
(2, 'Иванов Иван Сергеевич', 'ivan1@mail.ru', 23423, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'afsd', 'fasdfa', 'J8HzI0n9AQDlasHyfQhOcgZ0ZgPzTPSYNDfJVbDnSX3rxKyZO5');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `albumdetails`
--
ALTER TABLE `albumdetails`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `brand_logo`
--
ALTER TABLE `brand_logo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orrdr`
--
ALTER TABLE `orrdr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rk_tours` (`tours_id`);

--
-- Индексы таблицы `slider_home`
--
ALTER TABLE `slider_home`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `albumdetails`
--
ALTER TABLE `albumdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `brand_logo`
--
ALTER TABLE `brand_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orrdr`
--
ALTER TABLE `orrdr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `slider_home`
--
ALTER TABLE `slider_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
