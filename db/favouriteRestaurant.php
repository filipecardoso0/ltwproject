<?php

    declare(strict_types = 1);

    class FavouriteRestaurant{
        public int $idFavouriteRestaurant;
        public int $idUser;
        public int $idRestaurant;
    
    
        public function __construct(int $idFavouriteRestaurant, int $idUser, $idRestaurant){
            $this->idFavouriteRestaurant = $idFavouriteRestaurant;
            $this->idUser = $idUser;
            $this->idDish = $idDish;
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
        $stmt->execute(array($idFavouriteDish));

        if($idRestaurant= $stmt->fetch()){
            return $idRestaurant;
        }
        else{
            return null;
        }

        
    }

    static function createNewFavouriteDish(PDO $db, int $idUser, int $idRestaurant){
        $stmt = $db->prepare('insert int favouriteDish (idUser, idRestaurant) VALUES(?,?)');
        $stmt->execute(array($idUser, $idRestaurant));
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