<?php

    declare(strict_types=1);

    require_once(__DIR__ . '/../db/categoryclass.php');

function output_main_content(PDO $db, $restaurants, $categories){ ?>

<h1>Top rated restaurants</h1>
    <section id="toprated">
    <?php foreach($restaurants as $restaurant){ ?>
        <article>
            <img src="images/thumbs_medium/restaurant_<?=$restaurant['IdRestaurant']?>.jpg" alt="restaurant profile picture">
            <h2><a href=""><?=$restaurant['name']?></a></h2>
            <p>Morada: <?=$restaurant['address']?></p>
            <p>Rating do Restaurante 1</p>
            <p>Média de Preco: <span>€</span></p>
        </article>
    <?php  } ?>
    </section>

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


<?php } ?>


