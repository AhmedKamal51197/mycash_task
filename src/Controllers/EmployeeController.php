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
        $this->employees=$this->employeeModel->all();
    }
}