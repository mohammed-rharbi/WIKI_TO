<?php 



class home {


    private $wiki;
    private $tag;
    private $category;

public function __construct(){
    $this->wiki = new wikiDAO;
    $this->tag = new TagDAO();
    $this->category = new CategoryDAO();
}


   public function index() {
    $gettag = $this->tag->getlatest();
    $getCateg = $this->category->getlatestCatg();
    $getwiki = $this->wiki->getwiki();
    
    include "app/view/home.php";

   }
}



?>