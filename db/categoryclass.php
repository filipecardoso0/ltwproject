<?php

    declare(strict_types=1);

    class Category
    {
        public int $id;
        public string $title;

        public function __construct(int $id, string $title){
            $this->id = $id;
            $this->title = $title;
        }

        static function getCategoryWithId(PDO $db, int $idcategory) :?Category{
            $stmt = $db->prepare("SELECT CategoryTitle FROM Category Where IdCategory = ?");
            $stmt->execute(array($idcategory));

            if($category = $stmt->fetch())
                return new Category($idcategory, $category['CategoryTitle']);

            return null;
        }

        static function getAllCategories(PDO $db){
            $stmt = $db->prepare("Select * FROM Category");
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
?>