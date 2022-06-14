<?php

    require_once('template/common.php');
    require_once('template/restaurantpagetemplate.php');
    require_once ('template/modalregisterloginforms.php');
    require_once('template/modalrestaurantdish.php');
    require_once('template/modalshoppingcart.php');
    require_once('db/connectiondb.php');
    require_once('utils/session.php');
    require_once('db/restaurantclass.php');
    require_once('db/dishesclass.php');
    require_once('db/categoryclass.php');

    $session = new Session();
    $db = getDatabaseConnection();
    $idrestaurant = $_GET['id'];
    $restaurantinfo = Restaurant::getRestaurantWithId($db, $idrestaurant);
    $dishcategories = Category::getAllDishCategories($db);

    if($session->isLoggedIn()){
        output_header_loggedin($session->getName());
    }
    else{
        output_header_notloggedin();
    }
    output_message($session);
    output_restaurantpage_content($db, $restaurantinfo, $dishcategories, $session->getId());
    output_footer();
    output_modal_register_login_forms();
    output_modal_restaurantdish();
    output_modal_shoppingcart();

?>