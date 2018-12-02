<?php
require_once('functions.php');
require_once('init.php');

$result_newlots = '';//список новых лотов
$result_categories = '';//список категорий
$is_auth = rand(0, 1);

$user_name = ''; //  укажите здесь ваше имя
$user_avatar = 'img/user.jpg';
$title = ''; // имя страницы
$content = ''; // контент страницы

if (!$con) {
    $error = mysqli_connect_error();
    $content = include_template('error.php', ['error' => $error]);
}
else {
    //Запрос на получение списка категорий
    $sql_categories = 'SELECT `id`, `name` FROM `categories`';

    //Выполняем запрос и получаем результат
    $result_categories = mysqli_query($con, $sql_categories);

    //Запрос выполнен успешно
    if ($result_categories) {
        //Получаем все категории в виде двумерного массива
        $list_categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
    }
    else {
        //Получаем текст последней ошибки
        $error = mysqli_connect_error();
        $content = include_template('error.php', ['error' => $error]);
    }
    //Запрос на получение списка новых лотов
    $sql_newlots = 'SELECT `lot_title`, `cost_add`, `dt_end`, `img_path`, `category_id`, `categories`.`name` AS `category_name`, (SELECT MAX(`cost_end`) FROM `bets` WHERE `lot_id` = `lots`.`id`) AS `current_price` FROM `lots` LEFT JOIN `categories` ON `lots`.`category_id` = `categories`.`id` WHERE `dt_end` > CAST((NOW()) AS date) ORDER BY `dtlot_add` DESC';
    
    if ($result_newlots = mysqli_query($con, $sql_newlots)) {
        $list_newlots = mysqli_fetch_all($result_newlots, MYSQLI_ASSOC);
        //Передаем в шаблон результат выполнения
        $content = include_template('index.php', ['list_newlots' => $list_newlots, 'categories' => $list_categories, 'ads' => $list_newlots]);
    }
}
//echo "<pre>";
//var_dump($list_newlots);
//echo "</pre>";
//exit;
print(include_template('layout.php', ['content' => $content, 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'title' => $title, 'categories' => $list_categories]));


$now_date_time = new DateTime('now');
$midnight_date_time = new DateTime('tomorrow midnight');
$midnight_date_time_diff = $midnight_date_time->diff($now_date_time);
$time_interval_format = $midnight_date_time_diff->format('%H:%i');

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$ads = [
    0 => [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'cost' => 10999,
        'img' => 'img/lot-1.jpg'
    ],
    1 => [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'cost' => 159999,
        'img' => 'img/lot-2.jpg'
    ],
    2 => [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'cost' => 8000,
        'img' => 'img/lot-3.jpg'
    ],
    3 => [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'cost' => 10999,
        'img' => 'img/lot-4.jpg'
    ],
    4 => [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'cost' => 7500,
        'img' => 'img/lot-5.jpg'
    ],
    5 => [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'cost' => 5400,
        'img' => 'img/lot-6.jpg'
    ]
];

$page_content = include_template('index.php', [
    'categories' => $categories,
    'ads' => $ads,
    'now_date_time' => $now_date_time,
    'midnight_date_time' => $midnight_date_time,
    'midnight_date_time_diff' => $midnight_date_time_diff,
    'time_interval_format' => $time_interval_format
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'user_name' => $user_name,
    'title' => $title,
    'is_auth' => $is_auth,
    'categories' => $categories,
    'user_avatar' => $user_avatar
]);
//print($layout_content);
?>