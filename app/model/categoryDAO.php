<?php

include_once "data_DAO";
include_once "categoryClass.php";


class CategoryDAO extends DatabaseDAO{



    public function getCategory() {

        $sql = "SELECT * FROM categories";

        $result = $this->fetchAll($sql);

        $tags = [];

        foreach($result as $row) {

            $tags[] = new tag (
                $row["CategoryID"],
                $row["Name"],
                $row["created_at"],
            );
        }

 return $tags;
    }

    public function getAllCategory() {

        $sql = "SELECT * FROM categories";
        $result = $this->fetchAll($sql);

        $tag = [];
        foreach($result as $row) {
            $tag[] = new tag (
                $row["category"],
                $row["tagName"],
                $row["created_at"],
            );
        }
        return $tag;
    }

    public function getlatestCatg($limit = 5) {

        $sql = "SELECT * FROM categories ORDER BY crated_at DESC LIMIT" . (int)$limit;

        $catg = $this->fetchAll($sql);

        $category = [];
        foreach($catg as $row) {
            $category[] = new category (
                $row["categoryID"],
                $row["Name"],
                $row["created_at"],
            );
        }
        return $category;
    }

    public function getCategoriesByID($categoryID) {
        $sql = "SELECT * FROM categories WHERE categoryID = :categoryID";
        $parm = [':categoryID' => $categoryID];
        $result = $this->fetch($sql, $parm);

        if($result) {
            return new category (
                $result['categoryID'],
                $result['Name'],
                $result['created_at'],
            );
        }
        return null;
    }

    public function Makecategory($name){
        $sql = "INSERT INTO categories (Name) VALUES (:name)";
        $parm = [":name"=> $name];

        return $this->execute($sql, $parm);
    }

    public function updateCategoy($categoruID, $name){

        $sql = "UPDATE categories SET Name = :name WHERE categoryID = :categoryID";
        $parm = [":Name"=> $name,":categoryID"=> $categoruID];

        return $this->execute($sql, $parm);
    }

    public function deleteCategoy($categoyID){

        $sql = "DELETE FROM categories WHERE categoryID = :categoryID";
        $parm = [":categoryID"=> $categoyID];
        $this->execute($sql, $parm);

        return ['seccess' => true , 'message' => 'category deleted'];
    }
}




?>