<?php
require_once 'db_class.php';
$db = new PDO_DB();

if (!empty($_GET['id'])) {
  $id = $_GET['id'];
  $db->deleteEmployee($id);
}
