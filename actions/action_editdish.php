<?php

    declare(strict_types=1);

    require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/dishesclass.php');

    $session = new Session();

    $db = getDatabaseConnection();

    $dishid = $_POST['id'];
    $field = $_POST['field'];
    $newvalue = $_POST['value'];

    if($field === "Name"){
        if(Dish::editDishName($db, $dishid, $newvalue))
            $session->addMessage('success', 'Dish name edited succesfully');
        else
            $session->addMessage('error', 'Something went wrong while editing dish name');
    }
    else if($field === "Price"){
        if(Dish::editDishPrice($db, $dishid, $newvalue))
            $session->addMessage('success', 'Dish price edited succesfully');
        else
            $session->addMessage('error', 'Something went wrong while editing dish price');
    }
    else if($field === "Category"){
        if(Dish::editDishCategory($db, $dishid, $newvalue))
            $session->addMessage('success', 'Dish category edited succesfully');
        else
            $session->addMessage('error', 'Something went wrong while editing dish category');
    }
    else
        $session->addMessage('error', 'An unexpected error happened. Please try again');


?>
