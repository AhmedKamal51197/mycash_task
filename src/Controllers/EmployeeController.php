<?php
require_once __DIR__ . '/../Models/Employee.php';
require_once __DIR__ .  '/../Models/Connection.php';

class EmployeeController
{
    private $employees;
    private $employeeModel;
    

    public function __construct()
    {
        $this->employeeModel= new Employee;
    }

    public function index()
    {
      return  $this->employees=$this->employeeModel->all();
    }
    public function store($fname,$lname,$salary,$image,$manager_id)
    {
        $this->employeeModel->addEmployees($fname,$lname,$salary,$image,$manager_id);
    }
    public function getManagers()
    {
        return $this->employeeModel->Managers();
    }
    public function find($id)
    {
        return $this->employeeModel->findById($id);
    }
}
$emp=new EmployeeController;

// if(isset($_GET['']))
// {
//     $emp->index();
// }

var_dump($_POST['newEmp']);
function validation($data)
{

    $data=trim($data);
    $data=addslashes($data);
    $data=htmlspecialchars($data);
    return $data;

}




if(isset($_POST['newEmp']))
{
$empFname=validation($_POST['fname']);
$empLname=validation($_POST['lname']);
$salary=validation($_POST['salary']);
if(isset($_POST['manager_id']))
{

    $manager_id= $_POST['manager_id'];
}
else{
    $manager_id=null;
}
$error=[];
if(strlen($empFname)<3 )
{
    $error['$fname']="The employee first name must be more than two character";
}
if(strlen($empLname)<3 )
{
    $error['$lname']="The employee last name must be more than two character";
}
if(strlen($salary)===0)
{
    $error['$salary']="Pleas enter the salary";
}

if($_FILES['image']['size']>10000000) {
    $error['image']="the image is too long";
 }
else
{
    $from=$_FILES['image']['tmp_name'];

    $image=$_FILES['image']["name"];
    move_uploaded_file($from,"../EmployeeImage/".$image);
}
if(count($error)>0)
{
    header("Location:../Views/Employee/AddEmployee.php?error=".json_encode($error));
}
else{    
    $emp->store($empFname,$empLname,$salary,$image,$manager_id);
        header("Location:../Views/Employee/listEmployee.php");
}

}
else
{
    
}