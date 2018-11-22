<?php
require_once('functions.php');

$is_auth = rand(0, 1);

$user_name = ''; //  укажите здесь ваше имя
$user_avatar = 'img/user.jpg';
$title = ''; // имя страницы
$content = ''; // контент страницы

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

function format_cost($cost)
{
    $round = ceil($cost);
    return number_format($round, 0, '', ' ') . ' ₽';
}

$page_content = include_template('index.php', [
    'categories' => $categories,
    'ads' => $ads
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