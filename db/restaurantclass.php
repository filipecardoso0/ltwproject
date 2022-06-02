<?php

    declare(strict_types = 1);

    class Restaurant{
        public int $idRestaurant;
        public int $idOrders;
        public int $idDishes;
        public int $idOwner;
        public string $name;
        public string $address;
        public int $avg_review;

        public function __construc(int $idRestaurant, int $idOrders, int $idDishes, int $idOwner, string $name, string $address){
            $this->idRestaurant = $idRestaurant;
            $this->idOrders = $idOrders;
            $this->idDishes = $idDishes;
            $this->idOwner = $idOwner;
            $this->name = $name;
            $this->address = $address;
            $this->avg_review = $avg_review;
        }

        public function getRestaurantName(PDO $db, int $idRestaurant){
            $stmt = $db->prepare('Select name from restaurant where idRestaurant = ?');
            $stmt->execute(array($idRestaurant));

            if($resName = $stmt->fetch()){
                return $resName;
            }
            else{
                return null;
            }
        }

        public function createRestaurant(PDO $db,  int $idOrders, int $idDishes, int $idOwner, string $name, string $address){
            $stmt = $db->prepare('Insert into Restaurant (idOrders, idDishes, idOwner, name, address)');
            $stmt->execute(array($idOrders, $idDishes, $idOwner, $name, $address));
        }

        public function getRestaurantOwner(PDO $db, int $idOwner){
            $stmt = $db->prepare('select restaurant.name from restaurant, owner where owner.idUser = ?');
            $stmt->execute(array($idOwner));

            if($ownerName = $stmt->fetch()){
                return $ownerName;
            }
            else{
                return null;
            }
        }

        public function getRestaurantAddress(PDO $db, int $idRestaurant){
            $stmt = $db->prepare('select address from restaurant where idRestaurant = ?');
            $stmt->execute(array($idRestaurant));

            if($resAdd = $stmt->fetch()){
                return $resAdd;
            }
            else{
                return null;
            }
        }


    }
    

?>