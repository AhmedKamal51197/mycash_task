<?php
class User {
    public $con;
    private $data;

    public function __construct()
    {
        $connection = new Connection();
        $this->con=$connection->con;
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->con->prepare("select * from users where email=?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}