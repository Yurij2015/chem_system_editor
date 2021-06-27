-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 23 2021 г., 02:17
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `element_editor`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chemicals`
--

CREATE TABLE `chemicals` (
  `id` int NOT NULL,
  `substance_name` varchar(155) DEFAULT NULL,
  `chemical_formula` char(250) DEFAULT NULL,
  `mass` varchar(30) DEFAULT NULL,
  `molecular_weight` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chemicals`
--

INSERT INTO `chemicals` (`id`, `substance_name`, `chemical_formula`, `mass`, `molecular_weight`) VALUES
(1, 'Вода', 'H20', '', 18),
(2, 'Гидрооксид Лития', 'LiOH', '', 24),
(3, 'Водород', 'H2', '', 2),
(4, 'Оксид Лития', 'Li20', '', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `chemical_elements`
--

CREATE TABLE `chemical_elements` (
  `id` int NOT NULL,
  `items_name` varchar(55) DEFAULT NULL,
  `symbol` varchar(5) DEFAULT NULL,
  `latin_name` varchar(100) DEFAULT NULL,
  `ram` varchar(20) DEFAULT NULL,
  `oxidation` int DEFAULT NULL,
  `group_number` int DEFAULT NULL,
  `period_number` int DEFAULT NULL,
  `subgroup` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chemical_elements`
--

INSERT INTO `chemical_elements` (`id`, `items_name`, `symbol`, `latin_name`, `ram`, `oxidation`, `group_number`, `period_number`, `subgroup`) VALUES
(1, 'Водород', 'H', 'Hydrogenium', '1,00794', 1, 1, 1, ''),
(2, 'Кислород', 'O', 'Oxygenium', '15,9994', -2, 16, 2, ''),
(3, 'Гелий', 'He', 'Helium', '4,002602', 0, 18, 1, ''),
(4, 'Литий', 'Li', 'Lithium', '6,941', 1, 1, 2, '');

-- --------------------------------------------------------

--
-- Структура таблицы `chemical_reactions`
--

CREATE TABLE `chemical_reactions` (
  `id` int NOT NULL,
  `result` char(200) DEFAULT NULL,
  `reaction_type` varchar(45) DEFAULT NULL,
  `chemicals_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chemical_reactions`
--

INSERT INTO `chemical_reactions` (`id`, `result`, `reaction_type`, `chemicals_id`) VALUES
(1, 'H2O', 'Окислительно-восстановительная', 1),
(2, 'LiOH', 'Окислительно-восстановительная', 2),
(3, 'Li2O', 'Окислительно-восстановительная', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `elements_of_chemicals`
--

CREATE TABLE `elements_of_chemicals` (
  `id` int NOT NULL,
  `chemicals_id` int NOT NULL,
  `chemical_elements_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `elements_of_chemicals`
--

INSERT INTO `elements_of_chemicals` (`id`, `chemicals_id`, `chemical_elements_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 2),
(4, 2, 4),
(5, 2, 2),
(6, 2, 1),
(7, 4, 4),
(8, 4, 2),
(9, 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `reaction_reagents`
--

CREATE TABLE `reaction_reagents` (
  `id` int NOT NULL,
  `chemical_reactions_id` int NOT NULL,
  `chemical_elements_id` int DEFAULT NULL,
  `chemicals_id` int DEFAULT NULL,
  `chemical_count` int DEFAULT NULL,
  `element_count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reaction_reagents`
--

INSERT INTO `reaction_reagents` (`id`, `chemical_reactions_id`, `chemical_elements_id`, `chemicals_id`, `chemical_count`, `element_count`) VALUES
(1, 1, 1, NULL, NULL, 2),
(2, 1, 2, NULL, NULL, 1),
(3, 2, 2, NULL, NULL, 1),
(4, 2, 1, NULL, NULL, 3),
(5, 2, 4, NULL, NULL, 1),
(6, 3, 4, NULL, NULL, 2),
(7, 3, 2, NULL, NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chemicals`
--
ALTER TABLE `chemicals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chemical_elements`
--
ALTER TABLE `chemical_elements`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chemical_reactions`
--
ALTER TABLE `chemical_reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chemical_reactions_chemicals1_idx` (`chemicals_id`);

--
-- Индексы таблицы `elements_of_chemicals`
--
ALTER TABLE `elements_of_chemicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chemical_elements_chemicals1_idx` (`chemicals_id`),
  ADD KEY `fk_chemical_elements_chemical_elements1_idx` (`chemical_elements_id`);

--
-- Индексы таблицы `reaction_reagents`
--
ALTER TABLE `reaction_reagents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reaction_reagents_chemical_reactions_idx` (`chemical_reactions_id`),
  ADD KEY `fk_reaction_reagents_chemical_elements1_idx` (`chemical_elements_id`),
  ADD KEY `fk_reaction_reagents_chemicals1_idx` (`chemicals_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chemicals`
--
ALTER TABLE `chemicals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `chemical_elements`
--
ALTER TABLE `chemical_elements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `chemical_reactions`
--
ALTER TABLE `chemical_reactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `elements_of_chemicals`
--
ALTER TABLE `elements_of_chemicals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `reaction_reagents`
--
ALTER TABLE `reaction_reagents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chemical_reactions`
--
ALTER TABLE `chemical_reactions`
  ADD CONSTRAINT `fk_chemical_reactions_chemicals1` FOREIGN KEY (`chemicals_id`) REFERENCES `chemicals` (`id`);

--
-- Ограничения внешнего ключа таблицы `elements_of_chemicals`
--
ALTER TABLE `elements_of_chemicals`
  ADD CONSTRAINT `fk_chemical_elements_chemical_elements1` FOREIGN KEY (`chemical_elements_id`) REFERENCES `chemical_elements` (`id`),
  ADD CONSTRAINT `fk_chemical_elements_chemicals1` FOREIGN KEY (`chemicals_id`) REFERENCES `chemicals` (`id`);

--
-- Ограничения внешнего ключа таблицы `reaction_reagents`
--
ALTER TABLE `reaction_reagents`
  ADD CONSTRAINT `fk_reaction_reagents_chemical_elements1` FOREIGN KEY (`chemical_elements_id`) REFERENCES `chemical_elements` (`id`),
  ADD CONSTRAINT `fk_reaction_reagents_chemical_reactions` FOREIGN KEY (`chemical_reactions_id`) REFERENCES `chemical_reactions` (`id`),
  ADD CONSTRAINT `fk_reaction_reagents_chemicals1` FOREIGN KEY (`chemicals_id`) REFERENCES `chemicals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
