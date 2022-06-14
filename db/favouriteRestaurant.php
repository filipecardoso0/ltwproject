<?php

    declare(strict_types = 1);

    class FavouriteRestaurant{
        public int $idFavouriteRestaurant;
        public int $idUser;
        public int $idRestaurant;
    
    
        public function __construct(int $idFavouriteRestaurant, int $idUser, $idRestaurant){
            $this->idFavouriteRestaurant = $idFavouriteRestaurant;
            $this->idUser = $idUser;
            $this->idRestaurant = $idRestaurant;
        }


        static function getUserLikedRestaurants(PDO $db, int $iduser){
            $stmt = $db->prepare('Select IdFavouriteRestaurant, IdRestaurant From FavouriteRestaurant Where IdUser = ?');
            $stmt->execute(array($iduser));
            $favrestaurants = array();
            while($favrestaurant = $stmt->fetch()){
               $favrestaurants[] = new FavouriteRestaurant((int)$favrestaurant['IdFavouriteRestaurant'], $iduser, (int)$favrestaurant['IdRestaurant']);
            }

            return $favrestaurants;
        }

        
        static function getFavouriteRestaurantName(PDO $db, int $idFavouriteRestaurant){
            $stmt = $db->prepare('select restaurant.name from restaurant, favouriteRestaurant where restaurant.idRestaurant = ?');
            $stmt->execute(array($idFavouriteRestaurant));

        if($name = $stmt->fetch()){
            return $name;
        }
        else{
            return null;
        }

        
    }

    static function getRestaurantId(PDO $db, int $idFavouriteRestaurant){
        $stmt = $db->prepare('select idRestaurant from restaurant where idRestaurant = ?');
        $stmt->execute(array($idFavouriteRestaurant));

        if($idRestaurant= $stmt->fetch()){
            return $idRestaurant;
        }
        else{
            return null;
        }

        
    }

    static function addFavouriteRestaurant(PDO $db, int $IdUser, int $IdRestaurant) :?bool{
        $stmt = $db->prepare('INSERT INTO FavouriteRestaurant (IdUser, IdRestaurant) VALUES (?, ?)');
        if($stmt->execute(array($IdUser, $IdRestaurant)))
            return true;

        return false;
    }

    static function removeFavouriteRestaurant(PDO $db, int $IdUser, int $IdRestaurant) :?bool{
        $stmt = $db->prepare('Delete from FavouriteRestaurant Where IdUser = ? AND IdRestaurant = ?');
        if($stmt->execute(array($IdUser, $IdRestaurant)))
            return true;

        return false;
    }

    static function getFavouriteRestaurantId(PDO $db, int $idUser, int $idRestaurant){
        $stmt = $db->prepare('select idFavouriteRestaurant from favouriteRestaurant where idUser = ? and idRestaurant = ?');
        $stmt->execute(array($idUser, $idRestaurant));

        if($idFavouriteRestaurant = $stmt->fetch()){
            return $idFavouriteRestaurant;
        }
        else{
            return null;
        }
    
    }
}


?>