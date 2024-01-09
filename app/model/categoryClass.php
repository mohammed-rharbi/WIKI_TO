<?php

class Category{

    private $categoryID;
    private $Name;

    private $crated_at;

   
    public function __construct($categoryID, $name, $crated_at){
        $this->categoryID = $categoryID;
        $this->Name = $name;
        $this->crated_at = $crated_at;
    }

    public function getCategoryID(){
        return $this->categoryID;
    }

    public function getName(){
        return $this->Name;
    }

    public function getCratedAt(){
        return $this->crated_at;
    }
}


?>