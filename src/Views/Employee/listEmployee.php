<div class="container-fluid">
  <div class="row">
    <!-- Left Sidebar start-->
    <?php include_once './includes/side_bar.php'; ?>
    <!-- Left Sidebar End-->

    <div class="content-wrapper">


      <div class="row">
        <div class="col-xl-12 mb-30">
          <div class="card card-statistics mb-30">
            <div class="card-body">


    <div class="d-flex justify-content-between my-sm-4">
        <h1>All Users</h1>
        <a class="w-0 h-25 btn btn-primary" href="../../views/dashboard/AddUserView.php">add user</a>
    </div>
    <table class="table  table-hover my-lg-4 table-sm  justify-content-center">
    <thead >
        <th  scope="col">First Name</th>
        <th  scope="col">Last Name</th>
        <th  scope="col">Salary</th>
        <th scope="col" >Image</th>
        <th  scope="col">Manager</th>
        <th  scope="col">Full Name</th>
        <th  scope="col">Action</th>
        <tr>
    </thead>
    <?php 
    require_once "../../Models/Employee.php";
