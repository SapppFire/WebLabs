-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 06 2024 г., 15:30
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `plants_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fields`
--

CREATE TABLE `fields` (
  `field_id` int(11) NOT NULL,
  `field_number` int(11) DEFAULT NULL,
  `description_fields` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `fields`
--

INSERT INTO `fields` (`field_id`, `field_number`, `description_fields`) VALUES
(1, 1, 'Поле с черноземом'),
(2, 2, 'Поле у реки'),
(3, 3, 'Поле на возвышенности'),
(4, 4, 'Земля с суглинками'),
(5, 5, 'Поле на солнечной стороне'),
(6, 6, 'Поле у лесополосы'),
(7, 7, 'Поле с влажной почвой'),
(8, 8, 'Сухая степная зона'),
(9, 9, 'Земля с подземными водами'),
(10, 10, 'Поле с устойчивой влажностью'),
(11, 11, 'Поле в горной местности');

-- --------------------------------------------------------

--
-- Структура таблицы `plants`
--

CREATE TABLE `plants` (
  `plant_id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `name_plant` varchar(100) NOT NULL,
  `field_id` int(11) NOT NULL,
  `description_plants` text NOT NULL,
  `price_per_ton` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `plants`
--

INSERT INTO `plants` (`plant_id`, `img_path`, `name_plant`, `field_id`, `description_plants`, `price_per_ton`) VALUES
(1, '1.jpg', 'Пшеница', 1, 'Пшеница высокого качества', 300.50),
(2, '2.jpg', 'Кукуруза', 2, 'Кукуруза для корма', 150.75),
(3, '3.jpg', 'Ячмень', 3, 'Ячмень для пивоварения', 200.00),
(4, '4.jpg', 'Мак', 4, 'Мак для кайфа', 250.00),
(5, '5.jpg', 'Картофель', 5, 'Картофель для \"Вкусно и Точка\"', 180.75),
(6, '6.jpg', 'Томаты', 4, 'Томаты для соусов Heinz', 320.50),
(7, '7.jpg', 'Огурцы', 2, 'Огурцы для прикола', 210.00),
(8, '8.jpg', 'Рис', 5, 'Рис с высокими урожаями', 400.00),
(9, '9.jpg', 'Гречиха', 9, 'Гречиха для пищевой промышленности', 230.50),
(10, '10.jpg', 'Чечевица', 10, 'Чечевица с отличным качеством', 275.00),
(11, '11.jpg', 'Кукуруза', 11, 'Кукуруза для попкорна', 195.00),
(12, '12.jpg', 'Подсолнечник', 5, 'Подсолнечник для масла', 320.00),
(13, '13.jpg', 'Картофель', 7, 'Картофель высокого качества', 150.00),
(14, '14.jpg', 'Пшеница', 8, 'Пшеница для кормов и удобрений', 175.00),
(15, '15.jpg', 'Чеснок', 9, 'Чеснок с высокой насыщенностью', 500.00),
(16, '16.jpg', 'Свекла', 11, 'Свекла для производства сахара', 190.00),
(17, '17.jpg', 'Хмель', 1, 'Хмель для пивоварения', 300.00),
(18, '18.jpg', 'Мак', 3, 'Мак для опиума', 145.00),
(19, '19.jpg', 'Томаты', 2, 'Томаты для консервирования', 340.00),
(20, '20.jpg', 'Огурцы', 4, 'Огурцы для свежего потребления', 220.00);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email1` varchar(55) NOT NULL,
  `password1` varchar(55) NOT NULL,
  `password_conf` varchar(55) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birthday_date` varchar(255) NOT NULL,
  `address` varchar(55) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `interests` varchar(255) NOT NULL,
  `vklink` varchar(155) NOT NULL,
  `blood_type` varchar(35) NOT NULL,
  `rh_factor` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email1`, `password1`, `password_conf`, `full_name`, `birthday_date`, `address`, `sex`, `interests`, `vklink`, `blood_type`, `rh_factor`) VALUES
(0, 'test@mail.ru', 'f5b3c5f706c8ad9c976ae2b952d20541', '', 'Алексей Гений Ерофеев', 'test', '2000-01-01', 'мужчина', 'веб разработка', 'https://vk.com/pat1entzer0', 'Первая', 'Положительный'),
(0, 'test2@mail.ru', 'e72371e7d7bcb56b8b55983d2e54b007', '', 'Алексей Ерофеев Гений', 'улица пушкина', '2000-01-01', 'женщина', 'веб разработка', 'ссылка', 'Первая', 'Положительный');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`field_id`),
  ADD UNIQUE KEY `field_number` (`field_number`);

--
-- Индексы таблицы `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plant_id`),
  ADD KEY `field_id` (`field_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `fields`
--
ALTER TABLE `fields`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `plants`
--
ALTER TABLE `plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plants_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `fields` (`field_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
