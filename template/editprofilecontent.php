<?php

    function output_profile_edit_content(User $user, string $accountype){ ?>

        <section class="profileEditing">
            <img id="profilepicture" src="https://i.picsum.photos/id/218/200/300.jpg?hmac=S2tW-K1x-k9tZ7xyNVAdnie_NW9LJEby6GBgYpL7kfo" alt="Profile Picture">
            <p><a id="profileimage" href="">Edit Profile Image <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p>Name: <?=$user->name?> </p>
            <p id="username">Username: <?=$user->username?> <a href=""><i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p><a href="">Change Password<i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="address">Address: <?=$user->address?> <a href=""><i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="phone-number">Phone Number: <?=$user->phonenumber?> <a href=""><i class="fa-solid fa-pen-to-square editicon"></i></a></p>
        </section>

        <aside>
            <a href="../editprofile.php">Edit Profile</a>
            <?php if($accountype === "owner") { ?>
            <a href="../editrestaurant.php">My Restaurants</a>
            <?php } ?>
        </aside>

    <?php } ?>
