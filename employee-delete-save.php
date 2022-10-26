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

$sql = "delete from Employees where EmployeeID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['eID']);
    $stmt->execute();
?>
    
    <h1>Fire Employee</h1>
<div class="alert alert-success" role="alert">
Employee Fired.
   </div>
    <a href="employees.php" class="btn btn-primary">Go back</a>

<?php
require_once("footer.php");
?>
