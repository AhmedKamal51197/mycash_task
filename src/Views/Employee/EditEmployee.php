<?php
$error = [];
if (isset($_GET['error'])) {
    $error = json_decode($_GET['error'], true);
}

require_once("../../Models/Connection.php");
require_once("../../Controllers/EmployeeController.php");
require_once("../../Models/Employee.php");

$data = new Employee;
$managers = $data->all();


// Assuming you're passing an employee ID via GET for editing
$employeeId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$employee = $data->findById($employeeId); // Fetch the employee data for editing
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-primary">Edit Employee</h1>
                    <form method="post" action="../../Controllers/EmployeeController.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($employee['id']); ?>">
                        <div class="mb-3">
                            <label for="fname" class="form-label">Employee First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo htmlspecialchars($employee['fname']); ?>">
                            <small class="text-danger"><?php if (isset($error['fname'])) {
                                echo $error['fname'];
                            } ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Employee Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo htmlspecialchars($employee['lname']); ?>">
                            <small class="text-danger"><?php if (isset($error['lname'])) {
                                echo $error['lname'];
                            } ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="manager" class="form-label">Choose Manager:</label>
                            <select name="manager_id" class="form-select" id="manager">
                                <?php foreach ($managers as $manager) { ?>
                                    <option value="<?php echo $manager['id']; ?>" <?php if ($employee['manager_id'] == $manager['id']) echo 'selected'; ?>>
                                        <?php echo $manager['fname'] . " " . $manager['lname']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Enter the Salary</label>
                            <input type="number" id="salary" name="salary" class="form-control" value="<?php echo htmlspecialchars($employee['salary']); ?>">
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
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="listEmployee.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
