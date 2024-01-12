<?php

include_once "data_DAO.php";
include_once "categoryClass.php";


class CategoryDAO extends DatabaseDAO{



    public function getCategory() {

        $sql = "SELECT * FROM categories";

        $result = $this->fetchAll($sql);

        $categ = [];

        foreach($result as $row) {

            $categ[] = new Category (
                $row["CategoryID"],
                $row["Name"],
                $row["created_at"],
            );
        }

 return $categ;
    }

    public function getAllCategory() {

        $sql = "SELECT * FROM categories";
        $result = $this->fetchAll($sql);

        $categ = [];
        foreach($result as $row) {
            $categ[] = new Category (
                $row["CategoryID"],
                $row["Name"],
                $row["created_at"],
            );
        }
        return $categ;
    }

    public function getlatestCatg($limit = 5)
    {
        $query = "SELECT * FROM categories ORDER BY created_at DESC LIMIT " . (int) $limit;

        $categoriesData = $this->fetchAll($query);

        $categories = [];
        foreach ($categoriesData as $categoryData) {
            $categories[] = new Category(
                $categoryData['CategoryID'],
                $categoryData['Name'],
                $categoryData['created_at']
            );
        }

        return $categories;
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

        $sql = "UPDATE categories SET Name = :name WHERE CategoryID = :categoryID";
        $parm = [":Name"=> $name,":categoryID"=> $categoruID];

        return $this->execute($sql, $parm);
    }

    public function deleteCategoy($categoyID){

        $sql = "DELETE FROM categories WHERE CategoryID = :categoryID";
        $parm = [":categoryID"=> $categoyID];
        $this->execute($sql, $parm);

        return ['seccess' => true , 'message' => 'category deleted'];
    }
}




?>