<?php
require_once "../Models/Employee.php";
require_once "../Models/Connection.php";
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
}


if(isset($_POST['add']))
{
    $emp=new EmployeeController;
    $emp->store($_POST['fname'],$_POST['lname'],$_POST['salary'],$_POST['image'],$_POST['manager_id']);
}
