<?php
require_once "database.php";

class Users extends Database 
{
    protected $server; 
    protected $user; 
    protected $pass;
    protected $options; 
    public $pdo;  

    public function __construct() {
        $this->server = "mysql:host=localhost;dbname=my_cloud";
        $this->host = "localhost"; 
        $this->user = "root"; 
        $this->pass = "root"; 
        $this->options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

        try{
            $this->pdo = new PDO($this->server, $this->user,$this->pass, $this->options);
            return $this->pdo;
        }  catch (PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    public function createUser($firstname, $lastname, $email, $username, $password){
        $query = $this->pdo->prepare("INSERT INTO users (username, firstname, lastname, email, password)
        VALUES(:username, :firstname, :lastname, :email, :password)"); 
        $query->bindValue(':username', $username); 
        $query->bindValue(':firstname', $firstname); 
        $query->bindValue(':lastname', $lastname); 
        $query->bindValue(':email', $email); 
        $query->bindValue(':password', $password); 
        $query->execute();
    }

    public function username_exists($username) {
        $sql = $this->pdo->prepare("SELECT username FROM users WHERE username = :username");
        $sql->bindValue(":username", $username);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function email_exists($email) {
        $sql = $this->pdo->prepare("SELECT email FROM users WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }



}