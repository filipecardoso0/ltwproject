<?php

    require_once('template/common.php');
    require_once('template/editrestaurantstemplate.php');
    require_once('template/modaleditrestaurantformtemplate.php');
    require_once('template/modalconfirmform.php');

    require_once('utils/session.php');
    require_once('db/connectiondb.php');
    require_once('db/restaurantclass.php');
    require_once('db/categoryclass.php');

    $db = getDatabaseConnection();
    $session = new Session();
    $categories = Category::getAllCategories($db);
    $restaurants = Restaurant::getAllUserRestaurants($db, (int)$session->getId());

    if($session->isLoggedIn()){
        output_header_editprofile();
        //Displays message
        output_message($session);
        output_edit_restaurants_template($session, $db, $restaurants);
        output_footer();
        output_edit_restaurantforms($categories);
        output_confirmchanges();
    }
    else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>