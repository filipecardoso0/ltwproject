<?php

    require_once('template/common.php');
    require_once('template/editdishestemplate.php');
    require_once('utils/session.php');
    require_once('db/dishesclass.php');
    require_once('db/connectiondb.php');
    require_once('db/categoryclass.php');
    require_once('template/modalconfirmform.php');
    require_once('template/modalformeditdishes.php');

    $session = new Session();

    $db = getDatabaseConnection();
    $restaurantid = $_GET['id'];
    $dishes = Dish::getAllRestaurantDishes($db, $restaurantid);
    $dishcategories = Category::getAllDishCategories($db);

    if($session->isLoggedIn()){
        output_header_editprofile();
        //Display messages
        output_message($session);
        output_edit_dishes_content($dishes, $dishcategories);
        output_footer();
        output_editdishtemplate($dishcategories, $restaurantid);
        output_confirmchanges();
    }
    else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>