<?php function output_profile_edit_content(){ ?>

        <section class="profileEditing">
            <img id="profilepicture" src="https://i.picsum.photos/id/218/200/300.jpg?hmac=S2tW-K1x-k9tZ7xyNVAdnie_NW9LJEby6GBgYpL7kfo" alt="Profile Picture">
            <p><a id="profileimage" href="">Edit Profile Image <i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p>Name: FirstName LastName</p>
            <p id="username">Username: UsernameTemplate <a href=""><i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p><a href="">Change Password<i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="address">Address: 32932857859412 <a href=""><i class="fa-solid fa-pen-to-square editicon"></i></a></p>
            <p id="phone-number">Phone Number: 938283953 <a href=""><i class="fa-solid fa-pen-to-square editicon"></i></a></p>
        </section>

        <aside>
            <a href="../editprofile.php">Edit Profile</a>
            <a href="../editrestaurant.php">My Restaurants</a>
        </aside>

<?php } ?>
