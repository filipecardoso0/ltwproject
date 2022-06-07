<?php

    declare(strict_types = 1);

    class Restaurant{
        public int $idRestaurant;
        public int $idOwner;
        public int $idCategory;
        public string $name;
        public string $address;
        public int $avg_review;

        public function __construct(int $idRestaurant, int $idOwner, int $idCategory, string $name, string $address, $avg_review){
            $this->idRestaurant = $idRestaurant;
            $this->idOwner = $idOwner;
            $this->idCategory = $idCategory;
            $this->name = $name;
            $this->address = $address;
            $this->avg_review = $avg_review;
        }

        static function getRestaurantWithOwnerAndName(PDO $db, int $idOwner, string $restname) :?Restaurant{
            $stmt = $db->prepare('Select IdRestaurant, IdOwner, IdCategory, name, address, avg_review FROM Restaurant Where IdOwner = ? AND name = ?');
            $stmt->execute(array($idOwner, $restname));

            if($restaurant = $stmt->fetch())
                return new Restaurant((int)$restaurant['IdRestaurant'], (int)$restaurant['IdOwner'], (int)$restaurant['IdCategory'], $restaurant['name'], $restaurant['address'], (int)$restaurant['avg_review']);
            else
                return null;
        }

        static function createRestaurant(PDO $db, int $IdOwner , int $IdCategory, string $name, string $address) :?bool{
            $stmt = $db->prepare('Insert into Restaurant (IdOwner, IdCategory, name, address, avg_review) VALUES (?, ?, ?, ?, ?)');

            if(!$stmt->execute(array($IdOwner, $IdCategory, $name, $address, 0)))
                return false;

            return true;
        }

        static function getAllUserRestaurants(PDO $db, int $userid){
            $stmt = $db->prepare('Select * From Restaurant Where IdOwner = ?');
            $stmt->execute(array($userid));

            return $stmt->fetchAll();
        }

        static function getRestaurantImage(PDO $db, int $idrestaurant){
            $stmt = $db->prepare("Select IdImage From RestaurantImage Where IdRestaurant = ?");
            $stmt->execute(array($idrestaurant));

            return $stmt->fetch();
        }

        static function getRestaurantName(PDO $db, int $idRestaurant){
            $stmt = $db->prepare('Select name from Restaurant where idRestaurant = ?');
            $stmt->execute(array($idRestaurant));

            if($resName = $stmt->fetch()){
                return $resName['name'];
            }
            else{
                return null;
            }
        }

        static function getAllRestaurants(PDO $db){
            $stmt = $db->prepare('Select * From Restaurant');
            $stmt->execute();

            return $stmt->fetchAll();
        }


        static function getRestaurantOwner(PDO $db, int $idOwner){
            $stmt = $db->prepare('select restaurant.name from restaurant, owner where owner.idUser = ?');
            $stmt->execute(array($idOwner));

            if($ownerName = $stmt->fetch()){
                return $ownerName['restaurant.name'];
            }
            else{
                return null;
            }
        }

        static function getRestaurantAddress(PDO $db, int $idRestaurant){
            $stmt = $db->prepare('select address from restaurant where idRestaurant = ?');
            $stmt->execute(array($idRestaurant));

            if($resAdd = $stmt->fetch()){
                return $resAdd['address'];
            }
            else{
                return null;
            }
        }


    }
    

?>