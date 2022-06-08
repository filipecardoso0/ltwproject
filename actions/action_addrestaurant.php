<?php

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/restaurantclass.php');
    require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/action_imageupload.php');
    require_once('action_removerestaurant.php');

    $session = new Session();

    $db = getDatabaseConnection();


    if(Restaurant::createRestaurant($db, (int)$session->getId(), (int)$_POST['category'], $_POST['name'], $_POST['address']) == FALSE)
        $session->addMessage('error', 'Something Went Wrong while creating the restaurant');
    else{
        //Gets restaurant which was just added
        $restaurant = Restaurant::getRestaurantWithOwnerAndName($db, $session->getId(), $_POST['name']);

        if($restaurant == null){
            $session->addMessage('error', 'Something Went Wrong while creating the restaurant');
        }
        else{
            if(insertImageIntoDatabase($db, "RestaurantImage", $restaurant->IdRestaurant)){
                $session->addMessage('success', 'Restaurant created successfully!');
            }
            else{
                //Something unexpected happened (Maybe image size too big)

                //Undo changes (Remove restaurant)
                removerestaurant($db, $restaurant->idRestaurant);

                $session->addMessage('error', 'Something went wrong while assigning a profile image to your restaurant. Try using another image or a valid format (PNG/JPEG/GIF)');
            }
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>