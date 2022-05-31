<?php

    Class Dishes{
        public int $id;
        public string $name;
        public int $price;
        public string $category;
        public string $photo;
        public int $idRestaurant;


        public function __construct(int $id, string $name, int $price, string $category, string $photo, int $idRestaurant){
            $this->id = $id;
            $this->name = $id;
            $this->price = $price;
            $this->category = $category;
            $this->photo = $photo;
        
        }

        static function getDishId(PDO $db, string $name, int $idRestaurant){
            $stmt = $db->prepare('SELECT IdDishes from Dishes where Name = ? AND idRestaurant = ?');
            $stmt->execute(array($name, $idRestaurant));

            if($name = $stmt->fetch()){
                return $dishID;
            }
            else{
                return null;
            }
        }

        static function getDishName(PDO $db, int $id){
            $stmt = $db->prepare('SELECT Name from Dishes where idDishes = ?')
            $stmt->execute(array($id));

            if($dishName = $stmt->fetch()){
                return $dishName;
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