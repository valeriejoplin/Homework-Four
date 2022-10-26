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
$dItem = $_POST['dItem'];
$dPrice = $_POST['dPrice'];
$dDesc = $_POST['dDesc'];


$sql = "update FoodMenu set ItemName=?, Price=?,Description=? where FoodID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iItem,$iPrice, $iDesc, $_POST['did']);
    $stmt->execute();
?>
    
    <h1>Edit Item</h1>
<div class="alert alert-success" role="alert">
  Menu Item edited.
</div>
    <a href="drink.php" class="btn btn-primary">Go back</a>
   <?php
require_once("header.php");
?>
