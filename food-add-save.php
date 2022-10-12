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

$sql = "insert into FoodMenu (ItemName) value (?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $iItem);
    $stmt->execute();
?>
    <h1>Add New Item</h1>
<div class="alert alert-success" role="alert">
  New item added.
</div>
    <a href="food.php" class="btn btn-primary">Go back</a>

<?php
require_once("footer.php");
?>
