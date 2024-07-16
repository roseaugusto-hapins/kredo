<?php
require_once 'db_class.php';

$db = new PDO_DB();

$employees = $db->viewAllEmployees();
?>



<!DOCTYPE html>
<html>

<head>
  <title>List of Employees</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<div class="container p-5 m-5">
  <button class="btn btn-primary" onclick="location.href='create.php'">Add Employee</button>
  <br><br>
  <h1>List Employee</h1>
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Position</th>
      <th>Department</th>
      <th>Action</th>
    </tr>
    <?php
    foreach ($employees as $employee) {
    ?>
      <tr>
        <td><?php echo $employee['id'] ?></td>
        <td><?php echo $employee['name'] ?></td>
        <td><?php echo $employee['position'] ?></td>
        <td><?php echo $employee['department'] ?></td>
        <td>
          <a href="edit.php?id=<?= $employee['id'] ?>">Edit</a>
          <a href="delete.php?id=<?= $employee['id'] ?>">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>