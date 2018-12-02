<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <!--Заполненный список из массива категорий-->
            <?php foreach ($categories as $category): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="index.php?category_id=<?=$category['id']; ?>"><?=$category['name']; ?></a>
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
            <?php 
                $now_date_time = new DateTime('now');
                $midnight_date_time = new DateTime($item['dt_end']);
                $midnight_date_time_diff = $midnight_date_time->diff($now_date_time);
                $time_interval_format = $midnight_date_time_diff->format('%H:%i');
            ?>   
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$item['img_path'];?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$item['category_name'];?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=htmlspecialchars($item['lot_title']);?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=format_cost($item['cost_add']); ?></span>
                        </div>
                        <div class="lot__timer timer"><?=$time_interval_format?></div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
    </section>
</main>