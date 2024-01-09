<?php

include_once "data_DAO.php";
include_once "authorClass.php";


class AuthorDAO extends DatabaseDAO {


   public function login($email , $password){

    $sql = "SELECT * FROM users WHERE email = :email";

    $parm = [':email'=> $email];
    $result = $this->fetch($sql,$parm);

    if($result){
        $pass = $result['password'];
        if (password_verify($password,$pass)){
            return [
                'success' => true,
                'user'=> new author(
                    $result['userID'],
                    $result['userName'],
                    $result['email'],
                    $pass,
                    $result['role']
                )
                ];
        }else{
            return [
                'success' => false,
                'message' => 'invalid email or password'
            ];
        }
      }
   } 

public function register($userName , $email , $password){

    $pass = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (userName , email , password , role ) VALUES (:userName , :email , :password , 'author')"; 
    $parm = [":userNmae"=> $userName , ":email"=> $email , "password"=> $pass ];


    $result = $this->execute($sql,$parm);

if($result){

return [
    'success'=> true,
    'message' => 'Registration successful'
];
}else{
    return [
        'success'=> false,
        'message'=> 'Registration failed'
    ];
}
}

public function getUserByEmail( $email ){
    $sql = "SELECT * FROM users WHERE email = :email";
    $parm = [':email'=> $email ];
    $result = $this->fetch($sql,$parm);

    if($result){
        return new author(
            $result['userID'],
            $result['userName'],
            $result['email'],
            $result['password'],
            $result['role']
        );
    }
    return null;
}

}

?>