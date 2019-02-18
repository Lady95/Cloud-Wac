<?php
class Database 
{
    protected $server; 
    protected $user; 
    protected $pass;
    private $options; 
    protected $pdo;  

    public function __construct(){
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
    
}