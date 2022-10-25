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
$iItem = $_POST['iItem'];
$iPrice = $_POST['iPrice'];
$iDesc = $_POST['iDesc'];
$iSide = $_POST['iSide'];
$sql = "INSERT into FoodMenu (ItemName, Price, Description, DefaultSide) value (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$iItem, $iPrice, $iDesc, $iSide);
    $stmt->execute();
?>
<h1>Add Item</h1>
<div class="alert alert-success" role="alert">
  Your menu item has been added!
</div>

<a href="food.php" class="btn btn-primary">Go back</a>
<?php
require_once("footer.php");
?>
