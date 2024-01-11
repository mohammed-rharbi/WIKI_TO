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

public function showWikiPage($wikiID){

    $wikis = new WikiDAO();
    $wiki = $this->wiki->getWikiIDwithTags($wikiID);

    include_once "";
}


public function adminIndex(){

    $wikis = new WikiDAO();
    $wiki = $wikis->getWikisCrud();

    include_once "admin";
}

public function authorIndex(){

    $wikis = new wikiDAO();
    $wiki = $wikis->getWikisCrud();

    include_once "author";
}

public function create(){

    $tag = $this->tag->getTag();
    $category = $this->category->getAllCategory();

    include_once "";
}

public function store(){

    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $title = $_POST['wiki_title'];
        $content = $_POST['wiki_content'];
        $category = $_POST['$category'];
        $tag = isset($_POST['tags']) ? $_POST['tags'] : null;

        $author = isset($_POST['author']) ? $_POST['author'] : null;

        if($author){

            $success = $this->wiki->MAKEwiki($title , $content ,$author , $category , $tag);

            if($success){
                header('Location: index.php?action=authorWikiTable');
                exit();
            }else{
                echo 'failed';
            }
        }echo 'failed';
    }
}

public function edit($wikiID){

    $wiki = $this->wiki->getWikiID($wikiID);

    if(!$wiki){
        echo 'there is no wikis';
        return;
    }

    $categories = $this->category->getAllCategory();
    $tags = $this->tag->getTag();

    include_once '';

}

public function update($wikiID){

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $title = $_POST['wiki_title'];
        $content = $_POST['wiki_content'];
        $category = $_POST['$category'];
        $tag = isset($_POST['tags']) ? $_POST['tags'] : [];

        $succsess = $this->wiki->updateWiki($wikiID , $title , $content , $category , $tag);

        if($succsess){
            header('Location: index.php?action=authorWikiTable');
            exit();
        }else{
            echo 'failed';
        }
    }
}

public function disable($wikiID){

    $seccess = $this->wiki->enable($wikiID);

    if($seccess){
        header('Location: index.php?action=authorWikiTable');
            exit();
    }else{
        echo 'faield';
    }
}

public function delete($wikiID){
    $wiki = $this->wiki->getWikiID($wikiID);

    if($wiki){
        include_once '';
    }else{
        echo 'delete failed';
    }
}

public function destroy(){

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $wikiID = $_POST['wikiID'];

        $seccess = $this->wiki->deletwiki($wikiID);

        if($seccess){
            header('Location: index.php?action=authorWikiTable');
            exit();
        }else{
            echo 'failed';
        }
    }
}

}



?>