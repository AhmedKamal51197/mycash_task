<?php
class Employee {
    public $con;
  

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
    public function all()
    {
        $data = $this->con->query("select * from employees");
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addEmployees($employeeFname, $employeeLname,$salary,$image,$manager_id){
        $stmt=$this->con->prepare('insert into employees(fname,lname,salary,image,manager_id)  values(?,?,?,?,?)');
        $stmt->execute([$employeeFname, $employeeLname, $salary, $image,$manager_id]);
    }

}