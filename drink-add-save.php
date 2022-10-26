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
$dItem = $_POST['dItem'];
$dPrice = $_POST['dPrice'];
$dDesc = $_POST['dDesc'];
$dID= $_POST['dID'];
$sql = "INSERT into FoodMenu (ItemName, Price, Description, DrinkID) values (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis",$iID,$iItem, $iPrice, $iDesc);
    $stmt->execute();
?>
<h1>Add Item</h1>
<div class="alert alert-success" role="alert">
  Your  item has been added!
</div>

<a href="drink.php" class="btn btn-primary">Go back</a>
<?php
require_once("footer.php");
?>
