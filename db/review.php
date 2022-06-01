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

        static function getReviewPublisherName(PDO $db, int $idReview){
            $stmt = $db->prepare('select user.name from user, review where user.id = ?');
            $stmt->execute(array($idReview));

            if($pubName = $stmt->fetch()){
                return $pubName;
            }
            else{
                return null;
            }
        }

        static function createReview(PDO $db, string $content, int $rating, int $idRestaurant, int $idUser){
            $stmt = $db->prepare('Insert into Review (content, rating, idRestaurant, idUser) VALUES(?,?,?,?)');
            $stmt->execute(array($content, $rating, $idRestaurant, $idUser));
        }


    }



?>