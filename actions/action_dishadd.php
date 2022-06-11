<?php

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/dishesclass.php');
    require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/action_imageupload.php');
    require_once(__DIR__ . '/action_removedish.php');

    $session = new Session();
    $db = getDatabaseConnection();


    if(Dish::createDish($db, (int)$_POST['IdRestaurant'], (int)$_POST['IdCategory'], $_POST['Name'], (int)$_POST['Price']) == FALSE)
        $session->addMessage('error', 'Something Went Wrong while creating the given dish');
    else{
            //Gets restaurant which was just added
            $dish = Dish::getDishWithNameandRestaurantId($db, $_POST['Name'], $_POST['IdRestaurant']);

            if($dish == null){
                $session->addMessage('error', 'Something Went Wrong while creating the given dish');
            }
            else{
                if(insertImageIntoDatabase($db, "DishImage", $dish->IdDish)){
                    $session->addMessage('success', 'Dish created successfully!');
                }
                else{
                    //Something unexpected happened (Maybe image size too big)

                    //Undo changes (Remove dish)
                    removedish($db, $dish->IdDish);

                    $session->addMessage('error', 'Something went wrong while assigning a profile image to the given dish. Try using another image or a valid format (PNG/JPEG/GIF)');
                }
            }
        }


    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>