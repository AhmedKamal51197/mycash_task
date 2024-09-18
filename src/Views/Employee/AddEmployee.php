<?php

$error = [];
if (isset($_GET['error'])) {
    $error = json_decode($_GET['error'], true);
}

require_once("../../Models/Connection.php");
require_once("../../Models/Employee.php");

$data = new Employee;
$managers = $data->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-primary">Add Employee</h1>
                    <form method="post" action="../../Controllers/EmployeeController.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="fname" class="form-label">Employee First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname">
                            <small class="text-danger"><?php if (isset($error['fname'])) {
                                echo $error['fname'];
                            } ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Employee Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname">
                            <small class="text-danger"><?php if (isset($error['lname'])) {
                                echo $error['lname'];
                            } ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="manager" class="form-label">Choose Manager:</label>
                            <select name="manager_id" class="form-select" id="manager">
                                <?php foreach ($managers as $manager) { ?>
                                    <option value="<?php echo $manager['id']; ?>">
                                        <?php echo $manager['fname'] . " " . $manager['lname']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Enter the Salary</label>
                            <input type="number" id="salary" name="salary" class="form-control">
                            <small class="text-danger"><?php if (isset($error['salary'])) {
                                echo $error['salary'];
                            } ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Upload Photo:</label>
                            <input type="file" id="photo" name="image" class="form-control">
                            <small class="text-danger"><?php if (isset($error['image'])) {
                                echo $error['image'];
                            } ?></small>
                        </div>
                        <input type="submit" class="btn btn-primary"  name="newEmp" value="Add">
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
