<?php

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../db/connectiondb.php');
require_once(__DIR__ . '/../db/favouriteDishClass.php');

$session = new Session();
$db = getDatabaseConnection();
$userid = $_POST['userid'];
$dishid = $_POST['dishid'];

if($session->isLoggedIn()){
    if(FavouriteDish::addFavouriteDish($db, (int)$userid, (int)$dishid)){
        $session->addMessage('success', 'Dish added to Favourites');
    }
    else{
        $session->addMessage('error', 'Something Went Wrong while adding Dish to Favourites');
    }
}

?>
