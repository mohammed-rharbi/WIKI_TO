
<?php

class logController{

private $LOG;

public function __construct(){
    $this->LOG = new logDAO();
}

public function displayForm(){
    include 'app/view/login.php';
}

public function login(){

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = $this->LOG->login($email, $password);

        if($result ['success']){

            $user = $this->LOG->getUserByEmail($email);

            $_SESSION['userID'] = $user->getUserID();
            $_SESSION['user'] = $user;
            if(isset($_SESSION['user'])){
                $role = $_SESSION['user']->getRole();

            switch($role){
                case 'admin':
                    header('Location: index.php?action=admin');
                    break;
                case 'author':
                    header('Location: index.php?action=author');
                    break;
                default:
                header('Location: index.php?action=home');
                break;

            }
            }
        }else{
            $error =$result ['message'];
            include_once 'app\view\login.php';
        }
    }
}

public function displaysignUP(){
    include 'app/view/signup.php';
}

public function register(){

    if($_SERVER['REQUEST_METHOD'] === 'POST'){


        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $this->LOG->register($username, $email, $password);

        if($result ['success']){
            
            header('Location: index.php?action=login');

            exit();
        }else{
            $error =$result ['message'];
            include_once 'app\view\signup.php';
        }
    }
}

public function logout(){

    $_SESSION = array();

    session_destroy();

    header("Location: index.php?action=login");
    exit();
}


}

?>
