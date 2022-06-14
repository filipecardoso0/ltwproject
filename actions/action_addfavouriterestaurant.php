<?php

    require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/favouriteRestaurant.php');

    $session = new Session();
    $db = getDatabaseConnection();
    $userid = $_POST['restaurantid'];
    $restaurantid = $_POST['restaurantid'];

    if($session->isLoggedIn()){
        if(FavouriteRestaurant::addFavouriteRestaurant($db, (int)$userid, (int)$restaurantid)){
            $session->addMessage('success', 'Restaurant Removed from Favourites');
        }
        else{
            $session->addMessage('error', 'Something Went Wrong while removing Restaurant from Favourites');
        }
    }

?>
