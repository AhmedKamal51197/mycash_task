<?php
class Connection
{
    
    private $userName='root';
    private $serverName='localhost';
    private $password='';
    private $port='3307';
    private $db='mycash';
    public $con;
    public function __construct()
    {
        try 
        {
            $this->con=new PDO("mysql:host=$this->serverName;port=$this->port;dbname=$this->db",$this->userName,$this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e)
        {
            echo "Connection failed: ".$e->getMessage();
        }
    }
}