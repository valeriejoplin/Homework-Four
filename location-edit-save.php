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
$lID = $_POST['lID'];
$lCity = $_POST['lCity'];
$lState = $_POST['lState'];
$lAdd= $_POST['lAdd'];



$sql = "update Location set City=?, State=?,Address=? where LocationID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si",$lID,$lCity, $lState, $lAdd, $_POST['clID']);
    $stmt->execute();
?>
    
    <h1>Edit Location</h1>
<div class="alert alert-success" role="alert">
   Location edited.
</div>
    <a href="location.php" class="btn btn-primary">Go back</a>
   <?php
require_once("header.php");
?>
