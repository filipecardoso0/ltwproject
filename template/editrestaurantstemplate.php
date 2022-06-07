<?php
    declare(strict_types=1);

        function output_edit_restaurants_template(Session $session, PDO $db, $userRestaurants){ ?>

        <section class="userRestaurants">
            <span>
                <p id="addbtnrestaurant" ><a href="#0">Add a new Restaurant</a></p>
            </span>

            <?php
            //Outputs user Restaurants if any else display Text
            if($userRestaurants == null) { ?>
            <section id="shownorestmessage">
                <i class="fa-solid fa-rectangle-xmark fa-shake"></i>
                <p>You haven't registered any restaurants yet</p>
            </section>
            <?php }
            else{
            foreach($userRestaurants as $restaurant) {
                //Gets restaurant categoryTitle
                $category = Category::getCategoryWithId($db, (int)$restaurant['IdCategory']);
                //Gets restaurant Profile Image
                $profileimage = Restaurant::getRestaurantImage($db, (int)$restaurant['IdRestaurant']);

                //Only outputs restaurant if it belongs to the user
                if((int)$session->getId() === (int)$restaurant['IdOwner']) { ?>
            <article>
                <p id="removerestbtn"><a href="#0">Remove Restaurant</a></p>
                <!-- Restaurant ID -->
                <input type="text" style="display: none" value="<?=$restaurant['IdRestaurant']?>">
                <!-- Restaurant INFO -->
                <img id="restaurantprofilepicture" src="../images/originals/restaurant_<?=$profileimage['IdImage']?>.jpg" alt = "restaurant photo">
                <p id="editrestaurantprofilepic"><a href="">Edit Restaurant Profile Picture <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
                <p id="restaurantname"> <a href="">Nome: <?=$restaurant['name']?> <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
                <p id="restaurantaddr"> <a href="">Address: <?=$restaurant['address']?> <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
                <p id="restaurantcategory"> <a href="">Categoria: <?=$category->title?> <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
                <p id="editrestaurantinfo"><a href="restaurantEditDishes.html">Editar Pratos</a></p>
            </article>
            <?php   }
             }
        } ?>

        </section>

        <aside>
            <a href="../editprofile.php">Edit Profile</a>
            <a href="../editrestaurant.php">My Restaurants</a>
        </aside>

<?php } ?>


