<?php 



class wikiController{

private $wiki;
private $category;
private $tag;

public function __construct(){
    $this->wiki = new wikiDAO;
    $this->category = new categoryDAO;
    $this->tag = new tagDAO;
}



}



?>