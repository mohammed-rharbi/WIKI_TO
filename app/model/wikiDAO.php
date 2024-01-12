<?php 

include_once 'data_DAO.php';
include_once "wikiClass.php" ;


class WikiDAO extends DatabaseDAO{

public function getwiki(){

    $sql = "SELECT * FROM wikis WHERE is_archive = 1";

    $result = $this->fetchAll($sql);

    $wikis = [];
    foreach($result as $row){
        $wikis[] = new wiki(
            $row["wikiID"],
            $row["wiki_Title"],
            $row["wiki_content"],
            $row["author"],
            $row["category"],
            $row["is_archive"],
            $row["created_at"]
        );
    }

        return $wikis;
}

public function getWikiID($wikiID){

    $sql = "SELECT * FROM wikis WHERE wikiID = :wikiID";

    $parm = [':wikiID' => $wikiID ];

    $result = $this->fetch($sql, $parm);

    return $result ? new wiki(
        $result["wikiID"],
            $result["wiki_Title"],
            $result["wiki_content"],
            $result["author"],
            $result["category"],
            $result["is_archive"],
            $result["created_at"]
    ): null;
}

public function getWikiIDwithTags($wikiID){

    $sql = "SELECT * FROM wikis WHERE wikiID = :wikiID AND is_archive = 1";
    $parm = [":wikiID" => $wikiID];
    $result = $this->fetch($sql, $parm);

    if($result){
        $wiki = new wiki(
            $result["wikiID"],
            $result["wiki_Title"],
            $result["wiki_content"],
            $result["author"],
            $result["category"],
            $result["is_archive"],
            $result["created_at"]
        );

        $tags = $this->getTagBYwikiID($result['wikiID']);
        $wiki->setTags($tags);

        return $wiki;
    }
    return null;
}


public function getWikisCrud() {

    $sql = "SELECT w.* , u.userName FROM wikis w JOIN users u ON w.author = u.userID";

    $result = $this->fetchAll($sql);
    $wikis = [];

    foreach($result as $row) {

        $wiki = new wiki(
            $row["wikiID"],
            $row["wiki_Title"],
            $row["wiki_content"],
            $row["author"],
            $row["category"],
            $row["is_archive"],
            $row["created_at"]
        );

        $tag = $this->getTagbywikiID($row["wikiID"]);
        $wiki->setTags($tag);

        $wikis[] = $wiki;
    }
        return $wikis;
}

public function getTagbywikiID($wikiID) {

    $sql = "SELECT t.* FROM tag t JOIN wikitags wt ON t.tagID = wt.tagID WHERE wt.wikiID = :wikiID";
    $parm = [":wikiID"=> $wikiID];
    $result = $this->fetchAll($sql, $parm);

    foreach($result as $row) {
        $tag = new tag(
            $row["tagID"],
            $row["tagName"],
            $row["created_at"]
        );
    }
    return $tag;
}


    

public function getWikis(){

    $sql = "SELECT * FROM wikis";

    $result = $this->fetchAll($sql);

    $wikia = [];
    foreach($result as $row){
        $wikia[] = new Wiki(
            $row["wikiID"],
            $row["wiki_Title"],
            $row["wiki_content"],
            $row["author"],
            $row["category "],
            $row["is_archive"],
            $row["created_at"]
        );
    }
    return $wikia;
}   

public function getWikiBYCat($catID){

    $sql = "SELECT * FROM wikis WHERE category = :categoryID";
    $parm = [":categoryID"=> $catID];
    $result = $this->fetchAll($sql, $parm);

    $wikia = [];
    foreach($result as $row){
        $wikia[] = new Wiki(
            $row["wikiID"],
            $row["wiki_Title"],
            $row["wiki_content"],
            $row["author"],
            $row["category "],
            $row["is_archive"],
            $row["created_at"]
        );
}
return $wikia;

}

public function getlitestWiki($limit = 5){

    $sql = "SELECT * FROM wikis WHERE is_archive = 1 ORDER BY created_at DESC LIMIT 5" . (int) $limit;
    $result = $this->fetchAll($sql);

    $wikia = [];
    foreach($result as $row){
        $wikia[] = new Wiki(
            $row["wikiID"],
            $row["wiki_Title"],
            $row["wiki_content"],
            $row["author"],
            $row["category "],
            $row["is_archive"],
            $row["created_at"]
        );
    }
    return $wikia;
}

public function MAKEwiki($title , $content , $userID , $Category,$tag){

    $sql = "INSERT INTO wikis (wiki_Title , wiki_content , author ,category) VALUES (:title , :content ,:userID ,:category)";

    $parm = [":title"=> $title,
    ":content"=> $content,
    ":userID"=>$userID ,
    ":category"=> $Category,
];

$result = $this->execute($sql, $parm);

if($result){

    $wikiId = $this->conn->lastInsertId();

    $this->insertwikitag($wikiId , $tag);
}
return $result;
}

public function updateWiki($wikiId, $title, $content, $categoryId, $tagId)
{
    // Update the wiki information
    $query = "UPDATE wikis SET wiki_Title = :title, wiki_content = :content, category = :categoryId, created_at = CURRENT_TIMESTAMP WHERE wikiID = :wikiId";
    $params = [
        ':wikiId' => $wikiId,
        ':title' => $title,
        ':content' => $content,
        ':categoryId' => $categoryId,
    ];

    $success = $this->execute($query, $params);

    if ($success) {
        // Delete existing tags for the wiki
        $this->deleteWikiTag($wikiId);

        // Insert new tags for the wiki into wiki_tags table
        $this->insertWikiTag($wikiId, $tagId);
    }

    return $success;
}


private function insertwikitag($wikiID , $tag){

    foreach($tag as $tagID){
        $sql = "INSERT INTO wikitags (WikiID , TagID) VALUES (:wikiID , :tagID)";
        $parm = [
        ':wikiID' => $wikiID,
        ':tagID' => $tagID,
     ];

     $this->execute($sql, $parm);
    }
}

private function deletewikitag($wikiID){
    $sql = "DELETE FROM wikitags WHERE wikiID = :wikiID";
    $parm = [":wikiID"=> $wikiID];

    $this-> execute($sql, $parm);
}

public function disable($wikiID){

    $sql = "UPDATE wikis SET is_archive = 0 WHERE wikiID = :wikiID";
    $parm = [':wikiID'=> $wikiID];

    return $this->execute($sql, $parm);
}

public function enable($wikiID){

    $sql = "UPDATE wikis SET is_archive = 1 WHERE wikiID = :wikiID";
    $parm = [':wikiID'=> $wikiID];

    return $this->execute($sql, $parm);
}

public function getTagbyWiki($wikiID){

    $sql = "SELECT t.* FROM tags t JOIN wikitags wt ON t.tagID = wt.tagID WHERE wt.wikiID = :wikiID";

    $parm = [":wikiID"=> $wikiID];
    $result = $this->fetchAll($sql, $parm);

    $tag = [];
    foreach($result as $row){
        $tag[] = new tag (
            $row["tagID"],
            $row["tagName"],
            $row["created_at"],
        );
    }
    return $tag;
}

public function deletwiki($wikiID){

    $this->conn->beginTransaction();

    $sqlWtag = "DELETE FROM wikitags WHERE wikiID = :wikiID";
    $parmWtag = [":wikiID"=> $wikiID];
    $this->execute($sqlWtag, $parmWtag);

    $sqlW = "DELETE FROM wiki WHERE wikiID = :wikiID";
    $parmW = [":wikiID"=> $wikiID];
    $this->execute($sqlW, $parmW);

    $this->conn->commit();

    return true;

}



}




?>