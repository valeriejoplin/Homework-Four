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
$lID = $_POST['lID'];
$lCity = $_POST['lCity'];
$lState = $_POST['lState'];
$lAdd= $_POST['lAdd'];

$sql = "INSERT into Location (City, State, Address) values (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis",$lID,$lCity, $lState, $lAdd);
    $stmt->execute();
?>
<h1>Add Location</h1>
<div class="alert alert-success" role="alert">
  Your location has been added!
</div>

<a href="locations.php" class="btn btn-primary">Go back</a>
<?php
require_once("footer.php");
?>
