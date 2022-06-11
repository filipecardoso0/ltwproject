<?php

    //TODO REMOVE UNUSED CLASS FUNCTIONS -> REFACTOR RESTAURANT CLASS TOO
    //TODO VERIFICATION -> NO RESTAURANT CAN HAVE 2 DISHES WITH THE SAME NAME

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

        static function removeDishDb(PDO $db, int $dishid) :?bool{
            $stmt = $db->prepare('Delete from Dish Where IdDish = ?');
            if($stmt->execute(array($dishid)))
                return true;

            return false;
        }

        static function removeallRestaurantDishes(PDO $db, int $restaurantid) :?bool{
            $stmt = $db->prepare('Delete from Dish Where IdRestaurant = ?');
            if($stmt->execute(array($restaurantid)))
                return true;

            return false;
        }

        static function getDishWithId(PDO $db, int $dishid) :?Dish{
            $stmt = $db->prepare('Select IdRestaurant, IdCategory, Name, Price FROM Dish Where IdDish = ?');
            $stmt->execute(array($dishid));
            $dish = $stmt->fetch();
            return new Dish($dishid, (int)$dish['IdRestaurant'], (int)$dish['IdCategory'], $dish['Name'], (int)$dish['Price']);
        }

            static function getDishWithNameandRestaurantId(PDO $db, string $name, int $idRestaurant){
            $stmt = $db->prepare('SELECT IdDish, IdCategory, Price from Dish Where Name = ? AND IdRestaurant = ?');
            $stmt->execute(array($name, $idRestaurant));

            if($dish = $stmt->fetch())
                return new Dish((int)$dish['IdDish'], (int)$idRestaurant, (int)$dish['IdCategory'], $name, (int)$dish['Price']);
            else
                return null;

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
                return false;
        }

        static function editDishPrice(PDO $db, $dishid, $newprice) :?bool{
            $stmt = $db->prepare('UPDATE Dish SET Price = ? Where IdDish = ?');
            if($stmt->execute(array($newprice, $dishid)))
                return true;

            return false;
        }

        static function editDishName(PDO $db, $dishid, $newname): ?bool{
            $stmt = $db->prepare('Update Dish Set Name = ? Where IdDish = ?');
            if($stmt->execute(array($newname, $dishid)))
                return true;

            return false;
        }

        static function editDishCategory(PDO $db, $dishid, $newcategory) :?bool{
            $stmt = $db->prepare('Update Dish Set IdCategory = ? Where IdDish = ?');
            if($stmt->execute(array($newcategory, $dishid)))
                return true;

            return false;
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