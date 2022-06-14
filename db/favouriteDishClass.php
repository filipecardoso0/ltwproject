<?php

    declare(strict_types = 1);

    class FavouriteDish{
        public int $IdFavouriteDish;
        public int $IdUser;
        public int $IdDish;


        public function __construct(int $IdFavouriteDish, int $IdUser, int $IdDish){
            $this->IdFavouriteDish = $IdFavouriteDish;
            $this->IdUser = $IdUser;
            $this->IdDish = $IdDish;
        }

        static function getUserLikedDishes(PDO $db, int $IdUser){
            $stmt = $db->prepare('Select IdFavouriteDish, IdDish FROM FavouriteDish Where IdUser = ?');
            $stmt->execute(array($IdUser));

            $likedishes = array();
            while($likedish = $stmt->fetch()){
                $likedishes[] = new FavouriteDish((int)$likedish['IdFavouriteDish'], $IdUser, (int)$likedish['IdDish']);
            }

            return $likedishes;
        }

        static function addFavouriteDish(PDO $db, int $IdUser, int $IdDish){
            $stmt = $db->prepare('Insert into FavouriteDish (IdUser, IdDish) VALUES (?, ?)');
            if($stmt->execute(array($IdUser, $IdDish)))
                return true;

            return false;
        }

        static function removeFavouriteDish(PDO $db, int $IdUser, int $IdDish){
            $stmt = $db->prepare('DELETE FROM FavouriteDish Where IdUser = ? AND IdDish = ?');
            if($stmt->execute(array($IdUser, $IdDish)))
                return true;

            return false;
        }

    }
?>