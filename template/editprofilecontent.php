<?php

    function output_profile_edit_content(User $user, string $accountype){ ?>

        <section class="profileEditing">
            <img id="profilepicture" src="https://i.picsum.photos/id/218/200/300.jpg?hmac=S2tW-K1x-k9tZ7xyNVAdnie_NW9LJEby6GBgYpL7kfo" alt="Profile Picture">
            <p><a id="profileimage" href="#0">Edit Profile Image<i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p>Name: <?=$user->name?> </p>
            <p><a href="#0" id="username">Username: <?=$user->username?><i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p><a href="#0" id="password">Change Password<i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p><a href="#0" id="address">Address: <?=$user->address?><i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p><a href="#0" id="phonenumber">Phone Number: <?=$user->phonenumber?> <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p><a href="../actions/action_logout.php" id="logout">Logout</a></p>
        </section>

        <aside>
            <a href="../editprofile.php">Edit Profile</a>
            <?php if($accountype === "owner") { ?>
            <a href="../editrestaurant.php">My Restaurants</a>
            <?php } ?>
        </aside>

    <?php } ?>
