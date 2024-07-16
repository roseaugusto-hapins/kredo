<?php
require_once 'db_class.php';
$db = new PDO_DB();
$db1 = new PDO_DB();

if (!empty($_GET['id'])) {
  $id = $_GET['id'];
  $employee = $db->viewEmployee($id);
}

if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $position = $_POST['position'];
  $department = $_POST['department'];

  $db1->updateEmployee($id, $name, $position, $department);
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Employee</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

  <div class="container p-5 m-5">
    <button class="btn btn-warning" onclick="location.href='index.php'">Back</button>
    <br><br>
    <h1>Edit Employee</h1>
    <form method="POST">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" required name="name" value="<?php echo $employee['name']; ?>">
      </div>
      <div class="form-group">
        <label>Position</label>
        <input type="text" class="form-control" required name="position" value="<?php echo $employee['position']; ?>">
      </div>
      <div class="form-group">
        <label>Department</label>
        <input type="text" class="form-control" required name="department" value="<?php echo $employee['department']; ?>">
      </div>
      <div class="mt-3">
        <input type="submit" value="update" name="update" class=" btn btn-success">
      </div>
    </form>
  </div>
</body>

</html>