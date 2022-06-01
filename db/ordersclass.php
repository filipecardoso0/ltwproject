<?php

    declare(strict_types = 1);

    class Orders{
        public int $id;
        public int $idRestaurant;
        public int $idCustomer;
        public int $idDishes;

        public function __construct(int $id, int $idRestaurant, int $idCustomer, int $idDishes){
            $this->id=$id;
            $this->idRestaurant=$idRestaurant;
            $this->idCustomer=$idCustomer;
            $this->idDishes=$idDishes;
        }

        static function createOrder(PDO $db, int $idRestaurant, int $idCustomer, int $idDishes){
            $stmt = $db->prepare('Insert int Orders (idRestaurant, idCostumer, idDishes) VALUES(?,?,?)');
            $stmt->execute(array($idRestaurant, $idCustomer, $idDishes));
        }

        static function getRestaurantNameByOrder(PDO $db, int $idRestaurant){
            $stmt = $db->prepare('select restaurant.name from restaurant join orders on restaurant.idRestaurant = ?;');
            $stmt->execute(array($idRestaurant));

            if($restaurantName = $stmt->fetch()){
                return $restaurantName;
            }
            else{
                return null;
            }
        }

        static function getOrderId(PDO $db, int $idRestaurant, int $idCustomer, int $idDishes){
            $stmt = $db->prepare('Select idOrders from orders where idRestaurant = ? and idCustomer = ? and idDishes = ?');
            $stmt->execute(array($idRestaurant, $idCustomer, $idDishes));

            if($ordId = $stmt->fetch()){
                return $ordId;
            }
            else{
                return null;
            }
        }
        

        static function getCustomerByOrder(PDO $db, int $idCustomer){
            $stmt = $db->prepare('select customer.name from restaurant join orders on customer.idUser = ?;');
            $stmt->execute(array($idCustomer));


            if($customerName = $stmt->fetch()){
                return $customerName;
            }
            else{
                return null;
            }
        }


    }





?>