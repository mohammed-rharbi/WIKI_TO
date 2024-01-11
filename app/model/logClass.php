
<?php

class log
{

    private $userID;
    private $userName;
    private $email;
    private $password;
    private $role;

function __construct($userID, $userName, $email, $password, $role){
    $this->userID = $userID;
    $this->userName = $userName;
    $this->email = $email;
    $this->password = $password;
    $this->role = $role;
}

public function getUserID(){
    return $this->userID;
}

public function getUserName(){
    return $this->userName;
}
public function getEmail(){
    return $this->email;
}

public function getPassword(){
    return $this->password;
}
public function getRole(){
    return $this->role;
}


}

?>