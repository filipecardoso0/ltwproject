<?php

    declare(strict_types=1);

    require_once(__DIR__ . '/../db/categoryclass.php');
    require_once(__DIR__ . '/../db/review.php');


function output_main_content(PDO $db, $restaurants, $categories){ ?>

<h1>Top rated restaurants</h1>
    <section id="toprated">
    <?php foreach($restaurants as $restaurant){ ?>
        <article>
            <a href="restaurantpage.php?id=<?=$restaurant['IdRestaurant']?>"><img src="images/thumbs_medium/restaurant_<?=$restaurant['IdRestaurant']?>.jpg" alt="restaurant profile picture"></a>
            <h2><a href="restaurantpage.php?id=<?=$restaurant['IdRestaurant']?>"><?=$restaurant['name']?></a></h2>
            <p>Morada: <?=$restaurant['address']?></p>
            <?php $review = Review::getAvgReview($db,(int) $restaurant['IdRestaurant']);?>
            <p>Rating do Restaurante: <?=$review?></p>
            <!--<p>Média de Preco: <span>€</span></p>-->
        </article>
    <?php  } ?>
    </section>

    <!--
    Was supposed to be implemented, but do to lack of time we couldn't do it
    <aside>
        <section id="orderby">
            <p>Ordenar por:</p>
            <label for="">Ordenar 1
                <input type="radio" name="orderby" checked>
            </label>
            <label for="">Ordenar 2
                <input type="radio" name="orderby">
            </label>
            <label for="">Ordenar 3
                <input type="radio" name="orderby">
            </label>
        </section>  
        <section id="filters">
            <p>Filtros</p>
            <label for="">Filtro 1
                <input type="radio" name="filter">
            </label>
            <label for="">Filtro 2
                <input type="radio" name="filter">
            </label>
            <label for="">Filtro 3
                <input type="radio" name="filter">
            </label> 
        </section>
        <p>Categorias</p>
        <select>
            <?php
            foreach($categories as $category){ ?>
                <option value="<?=$category['id']?>"><?=$category['CategoryTitle']?></option>
            <?php } ?>
        </select >
    </aside>
            -->



<?php } ?>


