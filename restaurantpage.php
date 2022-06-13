<?php

    require_once('template/common.php');
    require_once('template/restaurantpagetemplate.php');
    require_once ('template/modalregisterloginforms.php');
    require_once('db/connectiondb.php');
    require_once('utils/session.php');
    require_once('db/restaurantclass.php');
    require_once('db/dishesclass.php');

    $session = new Session();
    $db = getDatabaseConnection();
    $idrestaurant = $_GET['id'];
    $restaurantinfo = Restaurant::getRestaurantWithId($db, $idrestaurant);
    $restaurantdishes = Dish::getAllRestaurantDishes($db, $idrestaurant);

    if($session->isLoggedIn()){
        output_header_loggedin($session->getName());
    }
    else{
        output_header_notloggedin();
    }
    output_message($session);
    output_restaurantpage_content($restaurantinfo, $restaurantdishes);
    output_modal_register_login_forms();
    output_footer();

?>