<?php

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/dishesclass.php');
    require_once(__DIR__ . '/../utils/session.php');

    $session = new Session();
    $db = getDatabaseConnection();

    if(Dish::createDish($db, (int)$_POST['IdRestaurant'], (int)$_POST['IdCategory'], $_POST['Name'], (int)$_POST['Price'])){
        $session->addMessage("success", "Dish added successfully");
    }
    else
        $session->addMessage("error", "Something Went Wrong Wile trying to creating the dish");


    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>