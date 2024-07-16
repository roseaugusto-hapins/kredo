<?php
error_reporting(E_ALL);

class PDO_DB
{
  private $db_host     = "localhost";
  private $db_username = "root";
  private $db_password = "root";
  private $db_name     = "kredo";

  protected $db;

  public function __construct()
  {
    if (!isset($this->db)) {
      // Connect to the database
      try {
        $conn = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_username, $this->db_password);
        $this->db = $conn;
      } catch (PDOException $e) {
        die("Failed to connect with MySQL: " . $e->getMessage());
      }
    }
  }

  function addEmployee($name, $position, $department)
  {
    $sql = "INSERT INTO employee(name, position, department) VALUES (?,?,?)";
    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute(array($name, $position, $department));
      $this->db = null;
      echo "<script>alert('Employee Added!');location.href='index.php';</script>";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  function viewEmployee($id)
  {
    $row = [];
    $sql = "SELECT * FROM employee WHERE id=?";

    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute(array($id));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $this->db = null;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $row;
  }

  function viewAllemployees()
  {
    $sql = "SELECT * FROM employee ORDER by name";
    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $this->db = null;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $row;
  }

  function updateEmployee($id, $name, $position, $department)
  {
    $sql = "UPDATE employee SET name=?, position=?, department=? WHERE id=?";
    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute(array($name, $position, $department, $id));
      $this->db = null;
      echo "<script>alert('Employee Updated!');location.href='index.php';</script>";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  function deleteEmployee($id)
  {
    $sql = "DELETE FROM employee WHERE id=?";

    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute(array($id));
      $this->db = null;
      echo "<script>alert('Employee Deleted!');location.href='index.php';</script>";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
