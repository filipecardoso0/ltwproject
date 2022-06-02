<?php

    declare(strict_types = 1);

    class FavouriteDish{
        public int $idFavouriteDish;
        public int $idUser;
        public int $idDishes;
    }

    public function __construct(int $idFavouriteDish, int $idDishes, int $idUser){
        $this->idFavouriteDish = $idFavouriteDish;
        $this->idUser = $idUser;
        $this->idDishes = $idDishes;
    }

    static function getFavouriteDishName(PDO $db, int $idFavouriteDish){
        $stmt = $db->prepare('select dishes.name from dishes, favouriteDish where dishes.idDishes = ?');
        $stmt->execute(array($idFavouriteDish));

        if($name = $stmt->fetch()){
            return $name;
        }
        else{
            return null;
        }

        
    }

    static function getDishId(PDO $db, int $idFavouriteDish){
        $stmt = $db->prepare('select idDishes from dishes where idDishes = ?');
        $stmt->execute(array($idFavouriteDish));

        if($idDishes= $stmt->fetch()){
            return $idDishes;
        }
        else{
            return null;
        }

        
    }

    static function createNewFavouriteDish(PDO $db, int $idUser, int $idDishes){
        $stmt = $db->prepare('insert int favouriteDish (idUser, idDishes) VALUES(?,?)');
        $stmt->execute(array($idUser, $idDishes));
    }

    static function getFavouriteDishId(PDO $db, int $idUser, int $idDishes){
        $stmt = $db->prepare('select idFavouriteDish from favouriteDish where idUser = ? and idDishes = ?');
        $stmt->execute(array($idUser, $idDishes));

        if($idFavouriteDish = $stmt->fetch()){
            return $idFavouriteDish;
        }
        else{
            return null;
        }
    }


?>