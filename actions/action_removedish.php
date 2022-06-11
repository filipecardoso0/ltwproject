<?php

    declare(strict_types=1);

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/dishesclass.php');
    require_once(__DIR__ . '/../utils/session.php');

    $session = new Session();

    $db = getDatabaseConnection();

    function removedish($db, $dishid) :?bool{

        if(Dish::removeDishDb($db, (int)$dishid)){

        //Removes The image with the IdDish -> Had to use this statement, because for some weird reason ON DELETE CASCADE is not working
        $stmt = $db->prepare("Delete from DishImage Where IdDish = ?");
        if(!$stmt->execute((array($dishid))))
            return false;

        //Deletes the file from the folder
        unlink("../images/originals/dish_$dishid.jpg");
        unlink("../images/thumbs_medium/dish_$dishid.jpg");
        unlink("../images/thumbs_small/dish_$dishid.jpg");
            return true;
        }

        return false;
    }

    if(removedish($db, $_POST['id']))
        $session->addMessage('success', 'Dish successfully removed!');
    else
        $session->addMessage('error', 'Something went wrong while trying to remove the dish');

?>
