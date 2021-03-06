/*Заполняем тяблицу категорий*/ 

INSERT INTO categories (name)
VALUES ('Доски и лыжи'), ('Крепления'), ('Ботинки'), ('Одежда'), ('Инструменты'), ('Разное');

/*Заполняем таблицу лотов*/

INSERT INTO lots (dtlot_add, lot_title, description, img_path, cost_add, dt_end, step, category_id, user_id)
VALUES ('2018-11-26 12:14:00', '2014 Rossignol District Snowboard', 'Доска для сноуборда 2014 Rossignol District Snowboard', 'img/lot-1.jpg', 10999, '2018-12-31 00:00:00', 500, 1, 1),
('2018-11-26 12:24:00', 'DC Ply Mens 2016/2017 Snowboard', 'Доска для сноуборда DC Ply Mens 2016/2017', 'img/lot-2.jpg', 159999, '2018-12-30 23:59:59', 1500, 1, 2),
('2018-11-26 12:54:00', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления Union Contact Pro', 'img/lot-3.jpg', 8000, '2018-12-31 23:00:00', 200, 2, 1),
('2018-11-26 12:55:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки для сноуборда', 'img/lot-4.jpg', 10999, '2019-01-01 12:00:00', 300, 3, 1),
('2018-11-26 12:56:00', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка для сноуборда', 'img/lot-5.jpg', 7500, '2018-12-31 13:15:00', 200, 4, 1);

/*Заполняем таблицу ставок*/

INSERT INTO bets (dtbet_add, cost_end, lot_id, user_id)
VALUES ('2018-11-26 12:15:00', 11499, 1, 1), ('2018-11-26 12:16:00', 11999, 1, 2), ('2018-11-26 12:25:00', 161499, 2, 2), ('2018-11-26 12:26:00', 162999, 2, 1), 
('2018-11-26 12:55:00', 8200, 3, 1), ('2018-11-26 12:56:00', 8400, 3, 2), ('2018-11-26 12:56:00', 11299, 4, 1), ('2018-11-26 12:57:00', 11599, 4, 2),
('2018-11-26 12:57:00', 7700, 5, 2), ('2018-11-26 12:58:00', 7900, 5, 1), ('2018-11-26 12:58:00', 5500, 6, 1), ('2018-11-26 12:59:00', 5600, 6, 2);

/*Заполняем таблицу пользователей*/

INSERT INTO users (dt_reg, email, name, password, avatar_path, contacts)
VALUES ('2018-11-01 12:00:00', 'vasyapupkin@mail.ru', 'vasya_pupkin', 'k231jasdJK', 'img/avatar-1.jpg', 'Moscow, Arbat St., 123000'),
('2018-11-02 12:00:00', 'pavelvolya@mail.ru', 'pavel_volya', 'alfkdohgi09KASD', 'img/avatar-2.jpg', 'St. Petersburg, Sennaya St., 564123');

/*Получаем все категории товаров*/

SELECT * FROM `categories`;

/*Получаем самые новые, открытые лоты, включая название, стартовую цену, ссылку на изображение, цену, название категории*/

SELECT `lot_title`, `cost_add`, `img_path`, `category_id`, `categories`.`name` AS `category_name`, (SELECT MAX(`cost_end`) FROM `bets` WHERE `lot_id` = `lots`.`id`) AS `current_price` FROM `lots` 
LEFT JOIN `categories` ON `lots`.`category_id` = `categories`.`id`
WHERE `dt_end` > CAST((NOW()) AS date) 
ORDER BY `dtlot_add` DESC;

/*Показываем лот по его id. Получаем также название категории, к которой принадлежит лот*/

SELECT `lot_title`, `category_id`, `categories`.`name` AS `category_name` FROM `lots`
LEFT JOIN `categories` ON `lots`.`category_id` = `categories`.`id`
ORDER BY `lots`.`category_id` DESC;

/*Обновляем название лота по его идентификатору*/

UPDATE `lots` SET `lot_title` = '2014 Rossignol District Snowboard New'
WHERE `lots`.`id` = 1;

/*Получаем список самых свежих ставок для лота по его идентификатору*/

SELECT * FROM `bets` WHERE `lot_id` = 1 ORDER BY `dtbet_add` DESC;


