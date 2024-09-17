<?php 
require_once '../Models/User.php';
require_once '../Models/Connection.php';
$errors=[];
class UserController 
{
    private $user;
    private $userModel;
    public function __construct()
    {
        $this->userModel=new User;
        // var_dump($this->userModel);
    }

    public function login($email,$pass)
    {
        $this->user=$this->userModel->getUserByEmail($email);
        $hashPass=$this->user['password'];
        var_dump($this->user);
        if($this->user && password_verify($pass,$hashPass))
        {
            $_SESSION['email']=$this->user['email'];
            $_SESSION['user_id']=$this->user['id'];
            header("Location:../views/welcome.php");
        }
        else
        {
            header("Location:../views/login.php?error=1");
        }
    }
}

$userController = new UserController;
if(isset($_POST['login']))
{
    if(empty($_POST['email']))
    {
        $errors['email']='email is required';
    }
    else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        $errors['email']='invalid email';
    }
    if(empty($_POST['password']))
    {
        $errors['password']='password is required';
    }
    if(count($errors)>0)
    {
        header("Location:../views/login.php?errors=".json_encode($errors));
    }
    else
    {
        $errors=[];
        var_dump($_POST['email'],$_POST['password']);
        
        $userController->login($_POST['email'],$_POST['password']);
    }
}