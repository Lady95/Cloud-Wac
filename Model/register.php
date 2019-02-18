<?php
include_once(database.php);

class register extends Database 
{
    private $firstname; 
    private $lastname; 
    private $email; 
    private $username; 
    private $password; 

    public function __construct($firstname, $lastname, $email, $username, $password) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public function insertUser(){
        $connect = $this->pdo; 
        $query = $connect->prepare("INSERT INTO users (username, firstname, lastname, email, password)
        VALUES(:username, :firstname, :lastname, :email, :password)"); 
        $query->bindValue(':username', $this->username,  PDO::PARAM_STR); 
        $query->bindValue(':firstname', $this->firstname, PDO::PARAM_STR); 
        $query->bindValue(':lastname', $this->lastname, PDO::PARAM_STR); 
        $query->bindValue(':email', $this->email, PDO::PARAM_STR); 
        $query->bindValue(':password', $this->password, PDO::PARAM_STR); 
        $query->execute();
    }
    
}