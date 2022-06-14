<?php

    function output_restaurantpage_content($restaurantinfo, $dishes, $userid){ ?>
    <section id="restaurantheader">
        <!-- Section Responsible for some core Restaurant Page functionalities-->
        <input id="userid" style="display: none" type="text" value="<?=$userid?>">
        <input id="restaurantid" style="display:none" type="text" value="<?=$restaurantinfo->IdRestaurant?>">
        <h1><?=$restaurantinfo->name?><a href="#0"><i class="fa-solid fa-heart fav"></i></a></h1>
    </section>
        <section id="carta">
            <h2><a>Entradas</a></h2>
            <article id="entradas">
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
            </article>
            <h2><a>Pratos Principais</a></h2>
            <article id="pratos">
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
            </article>
            <h2><a>Sobremesas</a></h2>
            <article id="sobremesas">
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
            </article>
            <h2><a>Aperitivos</a></h2>
            <article id="aperitivos">
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
            </article>
            <h2><a id="bebidas">Bebidas</a></h2>
            <article>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
                <section>
                    <img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="random photo 1">
                    <p>Nome do produto</p>
                    <p>Preço</p>
                </section>
            </article>
        </section>

        <aside id="categorias">
            <section id="categorias">
                <p><a href="#entradas">Entradas</a></p>
                <p><a href="#pratos">Pratos Principais</a></p>
                <p><a href="#sobremesas">Sobremesas</a></p>
                <p><a href="#aperitivos">Aperitivos</a></p>
                <p><a href="#bebidas">Bebidas</a></p>
                <p><a href="#informacao">Informações</a></p>
            </section>
        </aside>

    <?php } ?>