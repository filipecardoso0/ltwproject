<?php

    //TODO REMOVE style="display: none" on every id input (Verify the restaurant ones)

    function output_edit_dishes_content($dishes, $categories){ ?>

        <section class="userRestaurants">
        <span>
            <p id="addbtndish" ><a href="#0">Add a new dish</a></p>
        </span>

        <?php

        if($dishes == null){ ?>

            <section>
                <section id="shownorestmessage">
                    <i class="fa-solid fa-rectangle-xmark fa-bounce"></i>
                    <p>You haven't registered any dishes yet</p>
                </section>
            </section>

        <?php }

        foreach($dishes as $dish) {
            foreach($categories as $category){
                if($category['IdCategory'] == $dish->IdCategory){
                    $categoryname = $category['CategoryTitle'];
                }
            }
            ?>
        <article>
            <!-- Dish Id -->
            <input style="display: none" type="text" value="<?=$dish->IdDish?>">
            <img id="restaurantprofilepicture" src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt = "dish photo">
            <p id="editrestaurantprofilepic"><a href="#0">Edit Dish Picture <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="dishname">Nome: <a href="#0"> <?=$dish->name?> <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="dishprice">Preco: <a href="#0"> <?=$dish->price?></a>&#8364<i class="fa-solid fa-pen-to-square editicon"></i></p>
            <p id="dishcategory">Categoria: <a href="#0"> <?=$categoryname?> <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="removedishbtn"><a href="#0">Remover Prato</a></p>
        </article>

        <?php } ?>

    </section>

    <aside>
        <a href="../editprofile.php">Edit Profile</a>
        <a href="../editrestaurant.php">My Restaurants</a>
    </aside>

    <?php } ?>
