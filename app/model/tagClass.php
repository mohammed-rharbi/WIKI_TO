<?php


class tag {

    private $tagID;
    private $tagName;
    private $crated_at;

    public function __construct($tagID, $tagName, $crated_at){

        $this->tagID = $tagID;
        $this->tagName = $tagName;
        $this->crated_at = $crated_at;
    }

    public function getTagID(){
        return $this->tagID;
    }

    public function getTagName(){
        return $this->tagName;
    }

    public function getCratedAt(){
        return $this->crated_at;
    }

} 
?>