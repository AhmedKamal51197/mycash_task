<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Employee</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
  <div class="container-fluid">
    <div class="row">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-xl-12 mb-4">
            <div class="card">
              <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                  <h1 class="h4 mb-0">All Employees</h1>
                  <a class="btn btn-light" href="../../views/Employee/AddEmployee.php">Add Employee</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-hover table-striped table-bordered text-center">
                  <thead class="table-light">
                    <tr>
                      <th >id</th>  
                      <th >First Name</th>
                      <th >Last Name</th>
                      <th >Salary</th>
                      <th >Image</th>
                      <th >Manager Full Name</th>
                      <th colspan='3'>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    require_once ("../../Models/Employee.php");
                    require_once ("../../Controllers/EmployeeController.php");
                    $employee = new EmployeeController;
                    $emps = $employee->index();
                    $managers = $employee->getManagers();
                    $managersMap = [];
                    foreach ($managers as $manager) {
                        $managersMap[$manager['id']] = $manager['full_name'];
                    }
                    foreach ($emps as $emp) {
                      echo "<tr>";
                      foreach ($emp as $key => $val) {
                        if ($key === 'image') {
                          echo "<td><img src='../../EmployeeImage/$val' class='img-fluid rounded-circle' style='width: 50px; height: 50px;'></td>";
                        } else if($key==='manager_id'){
                            $managerFullName = isset($managerMap[$val]) ? $managerMap[$val] : 'No manager';
                            echo "<td>".$managerFullName."</td>";

                        } else {
                          echo "<td>".$val."</td>";
                        }
                      }
                      echo "
                        <td>
                          <a class='btn btn-primary btn-sm' href='AddEmployee.php'>Add</a>
                          <a class='btn btn-warning btn-sm' href='EditEmployee.php?id={$emp['id']}'>Edit</a>
                          <a class='btn btn-danger btn-sm' href='DeleteEmployee.php?id={$emp['id']}'>Delete</a>
                        </td>
                      ";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
