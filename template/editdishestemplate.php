<?php

    function output_edit_dishes_content(){ ?>

        <section class="userRestaurants">
        <span>
            <p id="addbtndish" ><a href="">Add a new dish</a></p>
        </span>

        foreach(
        <article>
            <img id="restaurantprofilepicture" src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt = "restaurant photo">
            <p id="editrestaurantprofilepic"><a href="">Edit Dish Picture <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="dishname"> <a href="">Nome: Nome do Prato <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="dishprice"> <a href="">Preco: 932&#8364 <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="dishcategory"> <a href="">Categoria: FastFood <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="removeplate"><a href="">Remover Prato</a></p>
        </article>

    </section>

    <aside>
        <a href="../editprofile.php">Edit Profile</a>
        <a href="../editrestaurant.php">My Restaurants</a>
    </aside>

    <?php } ?>
