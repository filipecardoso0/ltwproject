<?php

    declare(strict_types=1);

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/restaurantclass.php');

    $db = getDatabaseConnection();

    $id = $_POST['id'];
    $field =  $_POST['field'];
    $value = $_POST['value'];

    if($field === "Name"){
        Restaurant::updateRestaurantName($db, (int)$id, $value);
    }
    else if($field == "Address"){
        Restaurant::updateRestaurantAddress($db, (int)$id, $value);
    }
    else{
        Restaurant::updateRestaurantCategory($db, (int)$id, intval($value, 0));
    }


?>