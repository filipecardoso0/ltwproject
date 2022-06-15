<?php

    function output_profile_edit_content(User $user, string $accountype){ ?>

        <section class="profileEditing">
            <img id="profilepicture" src="https://i.picsum.photos/id/218/200/300.jpg?hmac=S2tW-K1x-k9tZ7xyNVAdnie_NW9LJEby6GBgYpL7kfo" alt="Profile Picture">
            <!--
            Didnt' implement due to lack of time
            <p><a id="profileimage" href="#0">Edit Profile Image</a><i class="fa-solid fa-pen-to-square editicon"></i></p>-->
            <p>Name: <?=$user->name?> </p>
            <p>Username: <a href="#0" id="username"><?=$user->username?></a><i class="fa-solid fa-pen-to-square editicon"></i></p>
            <p><a href="#0" id="password">Change Password<i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p>Address: <a href="#0" id="address"><?=$user->address?></a><i class="fa-solid fa-pen-to-square editicon"></i></p>
            <p>Phone Number: <a href="#0" id="phonenumber"><?=$user->phonenumber?></a> <i class="fa-solid fa-pen-to-square editicon"></i></p>
            <p><a href="../actions/action_logout.php" id="logout">Logout</a></p>
        </section>

        <aside>
            <a href="../editprofile.php">Edit Profile</a>
            <?php if($accountype === "owner") { ?>
            <a href="../editrestaurant.php">My Restaurants</a>
            <?php } ?>
        </aside>

    <?php } ?>
