<?php

    declare(strict_types = 1);

    class Dish{
        public int $IdDish;
        public int $IdCategory;
        public int $IdRestaurant;
        public string $name;
        public int $price;


        public function __construct(int $IdDish, int $IdCategory, int $IdRestaurant, string $name, int $price){
            $this->IdDish = $IdDish;
            $this->IdCategory = $IdCategory;
            $this->IdRestaurant = $IdRestaurant;
            $this->name = $name;
            $this->price = $price;

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
            $stmt = $db->prepare('SELECT Name from Dish where IdDish = ?')
            $stmt->execute(array($IdDish));

            if($name = $stmt->fetch()){
                return $name;
            }
            else{
                return null;
            }   
        }

        static function createDish(PDO $db, string $name, int $price, string $category, string $photo, int $idRestaurant){
            $stmt = $db->prepare('INSERT into Dish (Name, Price, Category, Photo, IdRestaurant) VALUES (?,?,?,?,?)');
            $stmt->execute(array($name, $price, $category, $photo, $idRestaurant));
        }

        static function createNewDish(PDO $db, string $name, int $price, string $category, string $photo, int $idRestaurant){
            $fetchdishname = $db->prepare('Select * from Dish where name = ?');
            $fetchdishname->execute(array($name));

            $fetchrestaurant = $db->prepare('Select * from Dish where idRestaurant = ?');
            $fetchrestaurant->execute(array($idRestaurant));

            if(($fetchdishname->fetch() && $fetchrestaurant->fetch()))!= null {
                return false;
            }

            self::createDish($db, $name, $price, $category, $photo, $idRestaurant);

            return true;
        }
    }



?>