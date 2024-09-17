<?php
include_once './includes/header.php';
getHeader('Add Product');
include_once './includes/nav_bar.php';


$error=[];
if(isset($_GET['error'])){
  $error=json_decode($_GET['error'],true);

}
require_once("../../Models/Connection.php");
require_once("../../Models/Employee.php");

$data=new Employee;
$managers=$data->all();
?>


<div class="container-fluid">
  <div class="row">
    <div class="content-wrapper">


      <div class="row">
        <div class="col-xl-12 mb-30">
          <div class="card card-statistics mb-30">
            <div class="card-body">




              <h1 class="text-primary">Add Employee</h1>
              <form method="post" class="col-lg-6 " action="../../Controllers/EmployeeController.php"
                enctype="multipart/form-data">
                <div class="form-group ">
                  <label for="exampleInputName">Employee First Name</label>
                  <input type="text" class="form-control" id="fname" aria-describedby="nameHelp" name="fname">
                  <small class="text-danger"><?php if(isset($error['$fname'])){
        echo $error['$fname'];
      } ?></small>
                </div>
                <div class="form-group ">
                  <label for="exampleInputName">Employee Last Name</label>
                  <input type="text" class="form-control" id="lname" aria-describedby="nameHelp" name="lname">
                  <small class="text-danger"><?php if(isset($error['$lname'])){
        echo $error['$lname'];
      } ?></small>
                </div>
          

                <div class=" form-group">
                  <label for="manager">Choose Manager:</label>
                  <select name="manager_id" class="form-control my-sm-3" id="manager">
                    <?php
      foreach($managers as $manager){
      ?>
                    <option value=<?php echo $manager['id']?>><?php echo $manager['fname']." ".$manager['lname']?></option>
                    <?php
      // <?=$category['id']
      }
      ?>
                  </select>
                </div>

                <div class="form-outline" style="width: 22rem;">
                  <label class="form-label" for="form1">Enter the Salary</label>
                  <i class="fas fa-dollar-sign trailing"></i>
                  <input type="number" id="form1" name="salary" class="form-control form-icon-trailing" />
                  <small class="text-danger"><?php if(isset($error['$salary'])){
        echo $error['$salary'];
      } ?></small>
                </div>
                <div>
                  <label for="photo">Upload photo:</label>
                  <?php if(isset($error['$image'])){
        echo $error['$image'];
      } ?>
                  <input class="my-ms-4" type="file" id="photo" name="image" accept="image/*">
                </div>
                <button type="submit " class="btn btn-primary my-sm-2 " name="add">Save</button>
                <input class="col-lg2 text-light p-1 my-sm-2 bg-danger rounded-1 border-0 " type="reset">

              </form>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

