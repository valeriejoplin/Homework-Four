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
$cID = $_POST['cID'];
$cFirst = $_POST['cFirst'];
$cLast = $_POST['cLast'];
$cFav= $_POST['cFav'];
$cNotes= $_POST['cNotes'];

$sql = "INSERT into Customers (FirstName, LastName, FavoriteItem, Notes) values (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis",$cID,$cFirst, $cLast, $cFav, $cNotes);
    $stmt->execute();
?>
<h1>Add Customer</h1>
<div class="alert alert-success" role="alert">
  Your customer has been added!
</div>

<a href="customers.php" class="btn btn-primary">Go back</a>
<?php
require_once("footer.php");
?>
