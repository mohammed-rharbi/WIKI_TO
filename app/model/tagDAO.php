<?php

include_once 'data_DAO.php';
include_once 'tagClass.php';


class TagDAO extends DatabaseDAO {

public function getTag() {

    $sql = "SELECT * FROM tag";

    $result = $this-> fetchAll($sql);

    $tag = [];

    foreach ($result as $row) {
        $tag = new Tag(
            $row['tagID'],
            $row['tagName'],
            $row['created_at']
    );
   
    }

    return $tag;
}

public function getlatest($limit=5){

    $sql = "SELECT * FROM tag ORDER BY created_at DESC LIMIT " . (int) $limit;

    $result = $this->fetchAll($sql);

    $tag = [];

    foreach ($result as $row) {
        $tag[] = new Category(

            $row["tagID"],
            $row["tagName"],
            $row["created_at"]
        );
    }

        return $tag;
}

public function getTagByID($id) {

    $sql = "SELECT * FROM tag WHERE tagID = :tagID";
    $parm = [':tagID'=>$id];
    $result = $this->fetch($sql , $parm);

    if ($result) {
        return new tag($result['tagID'], $result['tagName'], $result['created_at']);
    }
    return null;
}

public function getWikiBYTag($id) {

    $sql = "SELECT w.* FROM wiki w INNER JOIN wikitags wt ON w.wikiID = wt.wikiID WHERE wt.wikiID = :tagID ";

    $parm = [":tagID"=>$id];

    $wiki = $this->fetchAll($sql , $parm);

    $wikis = [];
    foreach ($wiki as $row) {
        $wikis[] = new Wiki(
            $row["wikiID"],
             $row["wiki_title"],
             $row["wiki_content"],
            $row["author"],
             $row["category"],
             $row["is_archive"],
              $row["created_at"]
            );
    }
    return $wikis;
}

public function creatTag($name) {
    $sql = "INSERT INTO tag (name) VALUES (:name)";
    $parm = [':name' =>$name];

    return $this->execute($sql , $parm);
}

public function updateTag($tagID , $name) {

    $sql = "UPDATE tag SET name = :name WHERE tagID = :tagID";
    $parm = [
        ':name'=> $name,
        ':tagID'=> $tagID
    ];

    return $this->execute($sql , $parm);
}

public function deleteTag($tagID) {

    $this->conn->beginTransaction();

    // Delete records from wiki_tags table
    $queryWikiTags = "DELETE FROM wikitags WHERE tagID = :tagId";
    $paramsWikiTags = [':tagId' => $tagID];
    $this->execute($queryWikiTags, $paramsWikiTags);

    // Delete record from tags table
    $queryTag = "DELETE FROM tag WHERE tagID = :tagId";
    $paramsTag = [':tagId' => $tagID];
    $this->execute($queryTag, $paramsTag);

    $this->conn->commit();

    return true;
    
}



}

?>