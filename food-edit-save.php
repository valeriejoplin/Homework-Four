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
$iItem = $_POST['iItem'];

$sql = "update FoodMenu set ItemName=? where FoodID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iItem, $_POST['iid']);
    $stmt->execute();
?>
    
    <h1>Edit Item</h1>
<div class="alert alert-success" role="alert">
  Menu Item edited.
</div>
    <a href="food.php" class="btn btn-primary">Go back</a>
   <?php
require_once("header.php");
?>
