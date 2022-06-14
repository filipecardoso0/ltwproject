<?php

declare(strict_types=1);

require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../db/connectiondb.php');
require_once(__DIR__ .'/../db/favouriteRestaurant.php');

$session = new Session();

$db = getDatabaseConnection();

$restaurants = FavouriteRestaurant::getUserLikedRestaurants($db, (int)$_GET['id']);

echo json_encode($restaurants)
?>