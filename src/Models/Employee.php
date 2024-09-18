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
    public function addEmployees($employeeFname, $employeeLname,$salary,$image,$manager_id=null){
       try{

           $stmt=$this->con->prepare('insert into employees(fname,lname,salary,image,manager_id)  values(?,?,?,?,?)');
           $stmt->execute([$employeeFname, $employeeLname, $salary, $image,$manager_id]);
       }catch (PODException $th) {
        echo $th->getMessage();
        header("location:".$_SERVER['PHP_SELF']."?errors=");
    }
    }
    public function Managers()
    {
        $sql=`select emp.id ,CONCAT(manager.fname, ' ', manager.lname) AS full_name
              from employees as manager
              join employees as emp on manager.id=emp.manager_id`;
              if (empty($sql)) {
                return [];
            }
         $result = $this->con->query($sql);
         return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id)
    {
        try{
           $stmt=$this->con->prepare('select * from employees where id=?');
           $stmt->execute([$id]);
           return  $stmt->fetch(PDO::FETCH_ASSOC);

        }catch (PDOException $e)
        {
            echo $e->getMessage();
            header("location:".$_SERVER['PHP_SELF']."?errors=");
        }
    }

}