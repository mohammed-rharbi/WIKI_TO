<?php

class CategoryControll{


    private $category;

    public function __construct(){
        $this->category = new CategoryDAO();
    }

    public function showLatestCateg($limit){
        
        $latestCAT = $this->category->getlatestCatg();

        include_once "";
    }

    public function showCategory(){

        $category = $this->category->getAllCategory();

        include_once "";
    }

    public function displayPageCateg($categoryID){

        $category = new CategoryDAO();
        $categ = $category->getCategoriesByID($categoryID); 

        $wikis = new WikiDAO();
        $relatedWiki = $wikis->getWikiBYCat($categoryID);

        include_once "";

    }

    public function index(){

        $category = $this->category->getAllCategory();
        include_once "";
    }

    public function create(){
        include_once "";
    }

    public function store(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'];

            if($this->category->Makecategory($name)){
                header('Location: index.php?action=categoryTable');
                exit();
            }
        }
    }
        
    public function edit(){

        $categoryID = isset($_GET['id']) ? $_GET['id'] : null;
        $category = $categoryID ? $this->category->getCategoriesByID($categoryID) : null;

        if($category){
            include_once '';
        }
    }

    public function update(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $categoryID = $_POST['$categoryID'];
            $name = $_POST['name'];

            if($this->category->updateCategoy($categoryID , $name)){
                header('Location: index.php?action=categoryTable');
                exit();
            }
        }
    }

    public function delete(){

        $categoryID = isset($_GET['id']) ? $_GET['id'] : null;
        $category = $categoryID ? $this->category->getCategoriesByID($categoryID) : null;

        if($category){
            include_once '';
        }else{
            echo'not found';
        }
    }

    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $categoryID = $_POST['$categoryID'];

            $result = $this->category->deleteCategoy($categoryID);

            if($result['success']){
                header('Location: index.php?action=categoryTable');
                exit();
            }
        }

    }
         

}

?>