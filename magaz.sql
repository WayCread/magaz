-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 01 2021 г., 23:56
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magaz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `pib` text NOT NULL,
  `adr` text NOT NULL,
  `num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `login`, `pass`, `pib`, `adr`, `num`) VALUES
(1, '123@gmail.com', '321', 'Степанко Іван Олегович', 'м. Луцьк', '+380997021854'),
(2, '222@gmail.com', '321', 'Коченко Владислав Владиславович', 'м. Луцьк', '+380992121854'),
(3, '431232@gmail.com', '43335', 'Топаченко Арсен Арсенович', 'м. Луцьк', '+38065665441');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_acc` int(11) NOT NULL,
  `id_good` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_cart`, `id_acc`, `id_good`) VALUES
(1, 1, 1),
(1, 1, 5),
(1, 1, 5),
(1, 1, 2),
(1, 1, 3),
(2, 2, 2),
(2, 2, 3),
(2, 2, 4),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_gd` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_gd`, `title`, `price`, `id_seller`) VALUES
(1, 'Цукерки \"Ромашка\"', 140, 1),
(2, 'Цукерки \"Монблан\"', 155, 1),
(3, 'Цукерки \"Грибочки\"', 110, 1),
(4, 'Цукерки \"Червоний мак\"', 110, 2),
(5, 'Цукерки \"Кара-кум\"', 105, 2),
(6, 'Торт \"Київський\"', 275, 1),
(7, 'Торт \"Горіховий\"', 250, 1),
(8, 'Торт \"Кенді-кат\"', 244, 1),
(9, 'Торт \"Вишня в шоколаді\"', 301, 2),
(10, '222', 222, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `date` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_cart`, `date`, `status`) VALUES
(0, 1, '01.12.2021', 'Відправлено'),
(1, 2, '02.12.2021', 'Відправлено');

-- --------------------------------------------------------

--
-- Структура таблицы `sellers`
--

CREATE TABLE `sellers` (
  `id_seller` int(11) NOT NULL,
  `seller` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sellers`
--

INSERT INTO `sellers` (`id_seller`, `seller`) VALUES
(1, 'Roshen'),
(2, 'Nestle');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD KEY `id` (`id_acc`),
  ADD KEY `id_gd` (`id_good`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_gd`),
  ADD KEY `id_seller` (`id_seller`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Индексы таблицы `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id_seller`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_gd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_acc`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_good`) REFERENCES `goods` (`id_gd`);

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`id_seller`) REFERENCES `sellers` (`id_seller`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
