<?php

    declare(strict_types=1);

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/../db/dishesclass.php');

    $session = new Session();

    $db = getDatabaseConnection();

    function removerestaurant($db, $restaurantid) :?bool{

        $stmt = $db->prepare("Delete from Restaurant Where IdRestaurant = ?");
        if($stmt->execute(array($restaurantid))){
            //Removes all restaurant dishes
            if(!Dish::removeallRestaurantDishes($db, (int)$restaurantid))
                return false;

            //Removes The image with the IdRestaurant -> Had to use this statement, because for some weird reason ON DELETE CASCADE is not working
            $stmt2 = $db->prepare("Delete from RestaurantImage Where IdRestaurant = ?");
            if(!$stmt2->execute((array($restaurantid))))
                return false;

            //Deletes the file from the folder
            unlink("../images/originals/restaurant_$restaurantid.jpg");
            unlink("../images/thumbs_medium/restaurant_$restaurantid.jpg");
            unlink("../images/thumbs_small/restaurant_$restaurantid.jpg");

            return true;
        }
        else
            return false;
    }

    if(removerestaurant($db, $_POST['id'])){
        $session->addMessage('success', 'Restaurant removed successfully');
    }
    else
        $session->addMessage('error', 'Something went wrong while trying to remove the restaurant');
?>
