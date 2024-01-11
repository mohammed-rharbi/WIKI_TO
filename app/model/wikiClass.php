
<?php


class wiki 
{

private $wikiID;
private $wiki_Title;
private $wiki_content;
private $author;
private $category;
private $is_archive;
private $crated_at;


public function __construct($wikiID, $wiki_Title, $wiki_content, $author, $category,$is_archive , $crated_at)
{
    $this->wikiID = $wikiID;
    $this->wiki_Title = $wiki_Title;
    $this->wiki_content = $wiki_content;
    $this->author = $author;
    $this->category = $category;
    $this->is_archive = $is_archive;
    $this->crated_at = $crated_at;
    
}

public function getWikiID(){
    return $this->wikiID;
}

public function getWikiTitle(){
    return $this->wiki_Title;
}

public function getWikiContent(){
    return $this->wiki_content;
}

public function getAuthor(){
    return $this->author;
}

public function getCategory(){
    return $this->category;
}

public function getIsArchive(){
    return $this->is_archive;
}

public function getCratedAt(){
    return $this->crated_at;
}





}



?>