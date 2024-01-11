<?php 


include_once "app\model\tagDAO.php";

class tagController{


    private $tag;   

    public function __construct(){

        $this->tag = new tagDAO();
    }

    public function displayTagPage($tagID){

        $tag = $this->tag->getTagByID($tagID);

        if($tag){

            $wiki = $this->tag->getWikiBYTag($tagID);

            include_once "";
        }
    }

    public function index(){
        
        $tag = $this->tag->getTag();
        include_once "";
    }

    public function makeTagPage(){

        include_once "";

    }

    public function addTag(){

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = $_POST['name'];

            if($this->tag->creatTag($name)){
                header('Location: index.php?action=tagTable');
                exit() ;
            }else{
                echo 'faild';
            }
        }
    }

    public function editTag(){

        $tagID = isset($_GET['id']) ? $_GET['id'] : null;
        $tag = $tagID ? $this->tag->getTagByID($tagID) : null ;

        if($tag){
            include_once "";
        }else{
            echo "chi l3ayba";
        }
       }
       public function Update(){

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $tagId = $_POST['tagID'];
            $name = $_POST['tagName'];

            if($this->tag->updateTag($tagId, $name)){
                header('Location: index.php?action=tagTable');
                exit() ;
            }else{
                echo 'faild';
            }
            }
       }

       public function deleteT($tagID){
        $tag = $this->tag->getTagByID($tagID);

        if($tag){
            include_once '';
        }else{
            echo 'tag is not exist';
        }
       }

       public function destroy(){

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $tagId = $_POST['tagID'];

                $resul = $this->tag->deleteTag($tagId);

                if($resul){
                    header('Location: index.php?action=tagTable');
                    exit() ;
                }else{
                    echo 'delete is failed';
                }
            }
       }

}



?>