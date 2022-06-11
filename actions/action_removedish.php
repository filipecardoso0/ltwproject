<?php

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/dishesclass.php');
    require_once(__DIR__ . '/../utils/session.php');

    $session = new Session();

    $db = getDatabaseConnection();
    $dishid = $_POST['id'];

    if(Dish::removeDish($db, $dishid))
        $session->addMessage('success', 'Dish successfully removed!');
    else
        $session->addMessage('error', 'Something went wrong while trying to remove the dish');
?>
