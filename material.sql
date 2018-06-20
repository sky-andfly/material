-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 20 2018 г., 18:20
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `material`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Керамическая плитка'),
(2, 'Грунтовка'),
(3, 'Гипсокартон');

-- --------------------------------------------------------

--
-- Структура таблицы `nomenclatura`
--

CREATE TABLE `nomenclatura` (
  `id` int(11) NOT NULL,
  `img` varchar(32) NOT NULL,
  `name` text NOT NULL,
  `discription` text NOT NULL,
  `kol` int(12) NOT NULL,
  `price` int(12) NOT NULL,
  `category` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nomenclatura`
--

INSERT INTO `nomenclatura` (`id`, `img`, `name`, `discription`, `kol`, `price`, `category`) VALUES
(1, 'tovar/1.jpg', 'ФАНТАЗИЯ КОРАЛОВАЯ ТЕМНАЯ СТЕНА', '<br> Толщина: 5мм<br>\r\nВысота: 400мм<br>\r\nШирина: 230мм<br>', 56, 525, 1),
(2, 'tovar/2.gif', 'Гипсокартон Лафарж (стена) ', '<br>Основные:<br>Длина 2500.0 (мм)<br>Ширина1200.0 (мм)<br>Толщина12.5 (мм)', 87, 205, 2),
(3, 'tovar/3.jpg', 'Грунт \"Эльф\" Д-07 Фунгицид', '<br>Свойства:<br>\r\nОтличная проникающая способность.\r\nСильное биоцидное действие.\r\nДизенфицирующее действие.<br>\r\n\r\nПодготовка поверхности:<br>\r\nЗараженные поверхности штукатурок или малярных покрытий очистить механически досуха, стены вымыть водой.<br>\r\n\r\nСпособ применения:<br>\r\nПеред применением грунтовку следует тщательно перемещать. На сухую стену нанести фунгицидную пропитку кистью в количестве 0,2–0,3 л/м2. Затем поверхность можно штукатурить.<br>\r\n\r\nРасход:<br>\r\nдо 5 м2/л.<br>\r\n\r\nХранение:<br>\r\nВ герметично закрытой полиэтиленовой таре при температуре от +5 до + 30С<br>', 567, 342, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `discount` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `promo`
--

INSERT INTO `promo` (`id`, `name`, `discount`) VALUES
(1, 'black friday', 10),
(2, 'АКИТЭ', 100),
(3, 'Богначев', 3),
(4, 'Аникашин', 1),
(7, 'Редактированный текст2222', 222);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nomenclatura`
--
ALTER TABLE `nomenclatura`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `promo`
--
ALTER TABLE `promo`
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
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `nomenclatura`
--
ALTER TABLE `nomenclatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
