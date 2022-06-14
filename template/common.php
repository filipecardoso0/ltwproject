<?php

    declare(strict_types=1);

    require_once(__DIR__ . '/../utils/session.php');

    function output_header_notloggedin(){ ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/form.css">
        <meta charset="UTF-8">
        <title>Ready2Eat</title>

        <!-- JS -->
        <script src="../javascript/modalregloginform.js" defer></script> <!-- Modal login & register forms -->
        <script src="../javascript/modalgeneral.js" defer></script> <!-- Modal form general functions -->

        <!-- FONT AWESOME ICONS CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <header>
        <a href="index.php">Ready2Eat</a>
        <a id="shopping-cart" href="">Carrinho</a>
        <a href="#0" id="login">Login</a>
        <a href="#0" id="register">Register</a>

        <section id="searchbar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="search" placeholder="What are you looking for?">
        </section>
    </header>


<?php    } ?>

    <?php

    function output_header_loggedin(string $name){ ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/styleRestaurantView.css">
        <link rel="stylesheet" href="../style/form.css">
        <meta charset="UTF-8">
        <title>Ready2Eat</title>

        <!-- JS -->
        <script src="../javascript/likerestaurant.js" defer></script><!--Add restaurant to favourite JS-->
        <script src="../javascript/encodeajax.js" defer></script> <!-- AJAX Encode function -->

        <!-- FONT AWESOME ICONS CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <header>
        <a href="index.php">Ready2Eat</a>
        <a id="shopping-cart" href="">Carrinho</a>
        <a href="editprofile.php" id="navname"><img src="https://i.picsum.photos/id/658/200/200.jpg?hmac=f24wxXCkgtH72eZ6mY95KRxTyvEG-_3ysR9z-R0a1QM" alt="User Profile Picture"> <?=$name?></a>
        <a href="actions/action_logout.php">Sign Out</a>

        <section id="searchbar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="search" placeholder="What are you looking for?">
        </section>
    </header>

    <?php    } ?>

    <?php

    function output_header_editprofile(){ ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/PEstyle.css">
        <link rel="stylesheet" href="../style/editinfoform.css">
        <link rel="stylesheet" href="../style/editrestaurantform.css">
        <link rel="stylesheet" href="../style/editdishform.css">
        <meta charset="UTF-8">
        <title>Ready2Eat</title>

        <!-- JS -->
        <script src="../javascript/modalusereditform.js" defer></script> <!--Edit profile modals -->
        <script src="../javascript/modalrestauranteditform.js" defer></script> <!-- Edit restaurant info modals -->
        <script src="../javascript/modaleditdishform.js" defer></script> <!--Edit dish modal -->
        <script src="../javascript/modalconfirmchanges.js" defer></script> <!-- Confirm changes modal -->
        <script src="../javascript/modalgeneral.js" defer></script> <!-- Modal form general functions -->
        <script src="../javascript/encodeajax.js" defer></script> <!-- Ajax encode function -->

        <!-- FONT AWESOME ICONS CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <header>
        <a href="../index.php">Ready2Eat</a>
        <a href="../editprofile.php">Profile</a>
    </header>


    <?php    } ?>

<?php   function output_footer() { ?>
        <footer>
            <ul>
                <li>Copyright &#169 Ready2Eat</li>
                <li>All rights reserved</li>
                <li>Contactos:
                    <a href="">
                        Facebook
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="">
                        Instagram
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="">
                        Twitter
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
            </ul>
        </footer>
<?php } ?>

<?php function output_message(Session $session){ ?>

    <section id="messages">

    <?php foreach($session->getMessages() as $message){ ?>

        <article class="<?=$message['type']?>">
            <p><?=$message['text']?></p>
        </article>

    <?php } ?>

    </section>

<?php }?>
