<?php

    function insertImageIntoDatabase(PDO $db, string $table, int $id) :?bool{
        // Insert image data into database
        if($table === "RestaurantImage"){
            $stmt = $db->prepare("INSERT INTO RestaurantImage (IdRestaurant) VALUES(?)");
            $type = "restaurant_";
        }
        else if($table === "UserImage"){
            $stmt = $db->prepare("INSERT INTO UserImage VALUES(?)");
            $type = "user_";
        }
        else if($table == "DishImage"){
            $stmt = $db->prepare("INSERT INTO DishImage (IdDish) VALUES(?)");
            $type = "dish_";
        }
        else{
            return false;
        }

        $stmt->execute(array($id));
        // Get image ID
        $id = $db->lastInsertId();

        // Create folders if they don't exist
        if (!is_dir('../images')) mkdir('../images');
        if (!is_dir('../images/originals')) mkdir('../images/originals');
        if (!is_dir('../images/thumbs_small')) mkdir('../images/thumbs_small');
        if (!is_dir('../images/thumbs_medium')) mkdir('../images/thumbs_medium');

        // Generate filenames for original, small and medium files
        $originalFileName = "../images/originals/$type$id.jpg";
        $smallFileName =  "../images/thumbs_small/$type$id.jpg";
        $mediumFileName = "../images/thumbs_medium/$type$id.jpg";

        // Move the uploaded file to its final destination
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);


        // Crete an image representation of the original image
        $original = imagecreatefromjpeg($originalFileName);
        if (!$original) $original = imagecreatefrompng($originalFileName);
        if (!$original) $original = imagecreatefromgif($originalFileName);

        if (!$original) return false;

        $width = imagesx($original);     // width of the original image
        $height = imagesy($original);    // height of the original image
        $square = min($width, $height);  // size length of the maximum square

        // Create and save a small square thumbnail
        $small = imagecreatetruecolor(200, 200);
        imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
        imagejpeg($small, $smallFileName);

        // Calculate width and height of medium sized image (max width: 400)
        $mediumwidth = $width;
        $mediumheight = $height;
        if ($mediumwidth > 400) {
            $mediumwidth = 400;
            $mediumheight = $mediumheight * ( $mediumwidth / $width );
        }

        // Create and save a medium image
        $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
        imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
        imagejpeg($medium, $mediumFileName);

        return true;
    }

?>