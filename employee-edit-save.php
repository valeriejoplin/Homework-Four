<?php
require_once("header.php");
?>
  <body>
    
<?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$eFirst = $_POST['eFirst'];
$eLast = $_POST['eLast'];
$eHireDate= $_POST['eHireDate'];
$ePosition= $_POST['ePosition'];



$sql = "update Employees set FirstName=?, LastName=?,HireDate=?,Position=? where EmployeeID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $eID,$eFirst, $eLast, $eHireDate, $ePosition, $_POST['eid']);
    $stmt->execute();
?>
    
    <h1>Edit Employee</h1>
<div class="alert alert-success" role="alert">
   Employee edited.
</div>
    <a href="employee.php" class="btn btn-primary">Go back</a>
   <?php
require_once("footer.php");
?>
