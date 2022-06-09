<?php

    declare(strict_types = 1);

    class Dish{
        public int $IdDish;
        public int $IdRestaurant;
        public int $IdCategory;
        public string $name;
        public int $price;


        public function __construct(int $IdDish, int $IdRestaurant, int $IdCategory, string $name, int $price){
            $this->IdDish = $IdDish;
            $this->IdRestaurant = $IdRestaurant;
            $this->IdCategory = $IdCategory;
            $this->name = $name;
            $this->price = $price;

        }

        static function getAllRestaurantDishes(PDO $db, int $idrestaurant){
            $stmt = $db->prepare('Select IdDish, IdCategory, Name, Price From Dish Where IdRestaurant = ?');
            $stmt->execute(array($idrestaurant));

            $dishes = array();
            while($dish = $stmt->fetch()){
                $dishes[] = new Dish((int)$dish['IdDish'], $idrestaurant, (int)$dish['IdCategory'], $dish['Name'], (int)$dish['Price']);
            }

            return $dishes;
        }

        static function getDishId(PDO $db, string $name, int $idRestaurant){
            $stmt = $db->prepare('SELECT IdDish from Dish where Name = ? AND idRestaurant = ?');
            $stmt->execute(array($name, $idRestaurant));

            if($IdDish = $stmt->fetch()){
                return $IdDish;
            }
            else{
                return null;
            }
        }

        static function getDishName(PDO $db, int $IdDish){
            $stmt = $db->prepare('SELECT Name from Dish where IdDish = ?');
            $stmt->execute(array($IdDish));

            if($name = $stmt->fetch()){
                return $name;
            }
            else{
                return null;
            }   
        }

        static function createDish(PDO $db, int $IdRestaurant, int $IdCategory, string $Name, int $Price) :?bool{
            $stmt = $db->prepare('INSERT into Dish (IdRestaurant, IdCategory, Name, Price) VALUES (?,?,?,?)');

            if($stmt->execute(array($IdRestaurant, $IdCategory, $Name, $Price)))
                return true;
            else
                return true;
        }

        static function createNewDish(PDO $db, string $name, int $price, string $category, string $photo, int $idRestaurant){
            $fetchdishname = $db->prepare('Select * from Dish where name = ?');
            $fetchdishname->execute(array($name));

            $fetchrestaurant = $db->prepare('Select * from Dish where idRestaurant = ?');
            $fetchrestaurant->execute(array($idRestaurant));

            if(($fetchdishname->fetch() && $fetchrestaurant->fetch()) != null) {
                return false;
            }

            self::createDish($db, $name, $price, $category, $photo, $idRestaurant);

            return true;
        }
    }

?>