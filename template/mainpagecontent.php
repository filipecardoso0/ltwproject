<?php

    declare(strict_types=1);

    require_once(__DIR__ . '/../db/categoryclass.php');

function output_main_content(PDO $db, $categories){ ?>

<h1>Top rated restaurants</h1>
    <section id="toprated">
        <article>
            <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
            <h2><a href="">Nome do Restaurante 1</a></h2>
            <p>Rating do Restaurante 1</p>
            <p>Média de Preco: <span>€</span></p>
        </article>
        <article>
            <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 2">
            <h2><a href="">Nome do Restaurante 2</a></h2>
            <p>Rating do Restaurante 2</p>
            <p>Média de Preco: <span>€</span></p>
        </article>
        <article>
            <img src="https://i.picsum.photos/id/299/200/300.jpg?hmac=iJwKPn_sm8S_ZGJttTHq5EpwaEESy8Q-qDaQ9xWtlYw" alt="random photo 3">
            <h2><a href="">Nome do Restaurante 3</a></h2>
            <p>Rating do Restaurante 3</p>
            <p>Média de Preco: <span>€</span></p>
        </article>
        <article>
            <img src="https://i.picsum.photos/id/299/200/300.jpg?hmac=iJwKPn_sm8S_ZGJttTHq5EpwaEESy8Q-qDaQ9xWtlYw" alt="random photo 3">
            <h2><a href="">Nome do Restaurante 4</a></h2>
            <p>Rating do Restaurante 4 </p>
            <p>Média de Preco: <span>€</span></p>
        </article>
        <article>
            <img src="https://i.picsum.photos/id/299/200/300.jpg?hmac=iJwKPn_sm8S_ZGJttTHq5EpwaEESy8Q-qDaQ9xWtlYw" alt="random photo 3">
            <h2><a href="">Nome do Restaurante 5</a></h2>
            <p>Rating do Restaurante 5 </p>
            <p>Média de Preco: <span>€</span></p>
        </article>
        <article>
            <img src="https://i.picsum.photos/id/299/200/300.jpg?hmac=iJwKPn_sm8S_ZGJttTHq5EpwaEESy8Q-qDaQ9xWtlYw" alt="random photo 3">
            <h2><a href="">Nome do Restaurante 6</a></h2>
            <p>Rating do Restaurante 6 </p>
            <p>Média de Preco: <span>€</span></p>
        </article>
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


