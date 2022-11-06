<?php
require_once("header.php");
?>
<?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";

$conn = new mysqli($servername, $username, $password, $dbname);

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$eID = $_POST['eID'];
$eFirst = $_POST['eFirst'];
$eLast = $_POST['eLast'];
$eHireDate= $_POST['eHireDate'];
$ePosition= $_POST['ePosition'];

$sql = "INSERT into Employees (FirstName, LastName, HireDate, Position) values (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis",$eID,$eFirst, $eLast, $eHireDate, $ePosition);
    $stmt->execute();
?>
<h1>Add Employee</h1>
<div class="alert alert-success" role="alert">
  Your employee has been hired!
</div>

<a href="employee.php" class="btn btn-primary">Go back</a>
<?php
require_once("footer.php");
?>
