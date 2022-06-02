<?php

    declare(strict_types = 1);

    class Dishes{
        public int $idDishes;
        public string $name;
        public int $price;
        public string $category;
        public string $photo;
        public int $idRestaurant;


        public function __construct(int $idDishes, string $name, int $price, string $category, string $photo, int $idRestaurant){
            $this->idDishes = $idDishes;
            $this->name = $name;
            $this->price = $price;
            $this->category = $category;
            $this->photo = $photo;
        
        }

        static function getDishId(PDO $db, string $name, int $idRestaurant){
            $stmt = $db->prepare('SELECT IdDishes from Dishes where Name = ? AND idRestaurant = ?');
            $stmt->execute(array($name, $idRestaurant));

            if($idDishes = $stmt->fetch()){
                return $idDishes;
            }
            else{
                return null;
            }
        }

        static function getDishName(PDO $db, int $idDishes){
            $stmt = $db->prepare('SELECT Name from Dishes where idDishes = ?')
            $stmt->execute(array($idDishes));

            if($name = $stmt->fetch()){
                return $name;
            }
            else{
                return null;
            }   
        }

        static function createDish(PDO $db, string $name, int $price, string $category, string $photo, int $idRestaurant){
            $stmt = $db->prepare('INSERT into Dishes (Name, Price, Category, Photo, IdRestaurant) VALUES (?,?,?,?,?)');
            $stmt->execute(array($name, $price, $category, $photo, $idRestaurant));
        }

        static function createNewDish(PDO $db, string $name, int $price, string $category, string $photo, int $idRestaurant){
            $fetchdishname = $db->prepare('Select * from Dishes where name = ?');
            $fetchdishname->execute(array($name));

            $fetchrestaurant = $db->prepare('Select * from Dishes where idRestaurant = ?');
            $fetchrestaurant->execute(array($idRestaurant));

            if(($fetchdishname->fetch() && $fetchrestaurant->fetch()))!= null {
                return false;
            }

            self::createDish($db, $name, $price, $category, $photo, $idRestaurant);

            return true;
        }
    }



?>