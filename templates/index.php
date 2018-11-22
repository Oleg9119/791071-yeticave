<?php
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

?>

<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <!--Заполненный список из массива категорий-->
            <?php foreach ($categories as $category): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html"><?=$category?></a>
            </li>            
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <!--Заполненный список из массива с товарами-->
            <?php foreach ($ads as $key => $item): ?>     
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$item['img'];?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$item['category'];?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=htmlspecialchars($item['name']);?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=format_cost($item['cost']); ?><!--<b class="rub">р</b>--></span>
                        </div>
                        <div class="lot__timer timer">
                            12:23
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
    </section>
</main>