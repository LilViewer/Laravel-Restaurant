-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 26 2022 г., 23:00
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `products`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `count` int UNSIGNED DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `count`, `description`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Пицца \"Пепперони\"', '685.00', 15, 'Пицца соус, сыр Моцарелла, томат, куриное филе, пепперони, свинина, бекон', 'pepperoni.jpg', 1, '2022-02-23 07:27:13', '2022-02-23 07:27:13'),
(2, 'Пицца \"Семь сыров\"', '785.00', 11, 'Сыр моцарелла, сыр эмменталь, соус сырный, сыр горгондзола, сыр чеддер, сыр креметте, сыр фетакса, сыр пармезан', 'seven-cheeses.jpg', 1, '2022-02-23 07:27:13', '2022-02-23 07:27:13'),
(3, 'Пицца \"Норвежская\"', '800.00', 11, 'Сливочный соус, соус манго-чили, сыр моцарелла, лук красный, перец болгарский, ломтики лосося, салат Айсберг', 'norwegian.jpg', 1, '2022-02-23 07:27:13', '2022-02-23 07:27:13'),
(4, 'Пельмени \"Теленок с поросем\"', '390.00', 11, 'Настоящие самолепные пельмени из пушистого теста на деревенских желтках и сметане', 'dumplings.jpg', 2, '2022-02-23 07:27:13', '2022-02-23 07:27:13'),
(5, 'Цыпленок на вертеле', '423.00', 7, 'Подается на лаваше со свежим томатом и огурцом, с маринованным луком и с шашлычным соусом', 'chick.jpg', 2, '2022-02-23 07:27:13', '2022-02-23 07:27:13'),
(6, 'Суп \"Курочка ряба\"', '140.00', 10, 'Кура тушка, морковь, макароны, зелень, яйцо, соль, специи.', 'chicken-soup.jpg', 2, '2022-02-23 07:27:13', '2022-02-23 07:27:13'),
(7, 'Отбивная из поросенка', '520.00', 7, 'Толстый кусок парной свинины с томатами и грибами под сырной корочкой', 'pig-chop.jpg', 2, '2022-02-23 07:27:13', '2022-02-23 07:27:13'),
(8, 'Судак запеченный', '384.00', 7, 'Филе судака с картошкой, деревенской сметаной, травами и луком', 'zander.jpg', 2, '2022-02-23 07:27:13', '2022-02-23 07:27:13'),
(9, 'Щучья уха на карасях', '380.00', 12, 'Наваристая походная уха на четырех рыбах, лаврухе, перце и луке.', 'ear.jpg', 2, '2022-02-23 07:27:13', '2022-02-23 07:27:13'),
(10, 'Мурманские кальмары', '420.00', 4, 'Мурманские кальмары с чесночным маслом', 'squid.jpg', 2, '2022-02-23 07:27:13', '2022-02-23 07:27:13');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_categories_products` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
