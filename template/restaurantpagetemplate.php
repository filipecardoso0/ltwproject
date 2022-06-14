<?php

    require_once(__DIR__ . '/../db/dishesclass.php');

    function output_restaurantpage_content(PDO $db, $restaurantinfo, $dishcategories, $userid){ ?>
    <section id="restaurantheader">
        <!-- Section Responsible for some core Restaurant Page functionalities-->
        <input id="userid" style="display: none" type="text" value="<?=$userid?>">
        <input id="restaurantid" style="display:none" type="text" value="<?=$restaurantinfo->IdRestaurant?>">
        <h1><?=$restaurantinfo->name?><a href="#0"><i class="fa-solid fa-heart fav"></i></a></h1>
    </section>

    <section id="dishmenu">
        <?php foreach($dishcategories as $dishcategory){
            $dishes = Dish::getCategoryDishes($db, $restaurantinfo->IdRestaurant, $dishcategory['IdCategory']);?>
            <h2><a><?=$dishcategory['CategoryTitle']?></a></h2>
            <section id="<?=$dishcategory['IdCategory']?>">
                <?php if(count($dishes) != 0){?>
                    <?php foreach($dishes as $dish){ ?>
                            <article>
                                <a href="#0">
                                    <img src="../images/thumbs_medium/dish_<?=$dish->IdDish?>.jpg" alt="dish image">
                                </a>
                                <p>Name: <?=$dish->name?></p>
                                <p>Price: <?=$dish->price?></p>
                            </article>
                    <?php } ?>
                <?php } ?>
                <?php if(count($dishes) == 0){ ?>
                    <article id="categoryempty">
                        <p>This Restaurant hasn't include any <?=$dishcategory['CategoryTitle']?> on its menu yet!  <i class="fa-solid fa-circle-notch fa-spin"></i></p>
                    </article>
                <?php } ?>
                </section>
        <?php } ?>
    </section>

        <aside id="categorias">
            <section id="categorias">
                <?php foreach($dishcategories as $dishcategory){?>
                    <p><a href="#<?=$dishcategory['IdCategory']?>"><?=$dishcategory['CategoryTitle']?></a></p>
                <?php } ?>
            </section>
        </aside>

    <?php } ?>