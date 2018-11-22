<?php
require_once('functions.php');

$is_auth = rand(0, 1);

$user_name = ''; //  укажите здесь ваше имя
$user_avatar = 'img/user.jpg';
$title = ''; // имя страницы
$content = ''; // контент страницы

$now_date_time = new datetime('now');
$midnight_date_time = new datetime('tomorrow midnight');
$midnight_date_time_diff = $midnight_date_time -> diff($now_date_time);
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
print($layout_content);
?>