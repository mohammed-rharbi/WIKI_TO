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

    
}




?>