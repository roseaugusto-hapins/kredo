<?php
require_once 'db_class.php';
$db = new PDO_DB();

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $position = $_POST['position'];
  $department = $_POST['department'];

  $db->addEmployee($name, $position, $department);
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Create Employee</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container p-5 m-5">
    <button class="btn btn-warning" onclick="location.href='index.php'">Back</button>
    <br><br>
    <h1>Create Employee</h1>
    <form method="POST">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" required name="name">
      </div>
      <div class="form-group">
        <label>Position</label>
        <input type="text" class="form-control" required name="position">
      </div>
      <div class="form-group">
        <label>Department</label>
        <input type="text" class="form-control" required name="department">
      </div>
      <div class="mt-3">
        <input type="submit" value="submit" name="submit" class=" btn btn-success">
        <input type="reset" value="cancel" class="btn btn-danger">
      </div>
    </form>
  </div>
</body>

</html>