<?php

    declare(strict_types = 1);

    class Review{
        public int $idReview;
        public string $content;
        public int $rating;
        public int $idRestaurant;
        public int $idUser;

        public function __construct(int $idReview, string $content, int $rating, int $idRestaurant, int $idUser){
            $this->idReview=$idReview;
            $this->content=$content;
            $this->rating=$rating;
            $this->idRestaurant=$idRestaurant;
            $this->idUser=$idUser;
        }

        static function getReviewContent(PDO $db, int $idReview){
            $stmt = $db->prepare('select content from review where idReview = ?');
            $stmt->execute(array($idReview));

            if($cont = $stmt->fetch()){
                return $cont;
            }
            else{
                return null;
            }
        }

        static function getAllRestaurantReviews(PDO $db, int $idRestaurant){
            $stmt = $db->prepare('Select * From Review Where IdRestaurant = ?');
            $stmt->execute(array($idRestaurant));

            return $stmt->fetchAll();
        }

        static function getReviewPublisherName(PDO $db, int $idReview){
            $stmt = $db->prepare('select user.name as uname from user, review where user.IdUser = ?');
            $stmt->execute(array($idReview));

            if($pubName = $stmt->fetch()){
                return $pubName['uname'];
            }
            else{
                return null;
            }
        }

        static function removeReview(PDO $db, int $restaurantid, int $idUser){
            $stmt = $db->prepare('Delete from Review where IdRestaurant = ? and IdUser=?');
            if($stmt->execute(array($restaurantid, $idUser)))
                return true;
    
            return false;
        }

        static function createReview(PDO $db, string $content, int $rating, int $idRestaurant, int $idUser){
            $stmt = $db->prepare('Insert into Review (content, rating, idRestaurant, idUser) VALUES(?,?,?,?)');
            $stmt->execute(array($content, $rating, $idRestaurant, $idUser));
        }

        static function checkHasOrdered(PDO $db, int $idRestaurant, int $idUser):?bool{
            $stmt = $db->prepare('Select count(IdOrders) as cnt from Orders where IdRestaurant = ? and IdCustomer = ?');
            $stmt->execute(array($idRestaurant, $idUser));
            if($order = $stmt->fetch()){
                if($order['cnt'] == 0){
                    return $false;
                }
                return true;
            }
            else{
                return false;
            } 
        }

        static function getAvgReview(PDO $db, int $IdRestaurant):?string{
            $stmt = $db->prepare('SELECT round(avg(Rating), 1) as rat from Review where IdRestaurant = ?');
            $stmt->execute(array($IdRestaurant));

            if($rating = $stmt->fetch()){
                if($rating['rat'] == NULL){
                    $msg = "Sem reviews até agora!";
                    return $msg;
                }
                return (string) $rating['rat'];
            }
            else{
                $msg = "Sem reviews até agora!";
                return $msg;
            }   
        }


    }



?>