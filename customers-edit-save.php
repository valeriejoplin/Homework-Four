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
$cFirst = $_POST['cFirst'];
$cLast = $_POST['cLast'];
$cFav = $_POST['cFav'];
$cNotes = $_POST['cNotes'];
$cID = $_POST['cID'];



$sql = "update Customers set FirstName=?, LastName=?,FavoriteItem=?,Notes=? where CustomerID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $cFirst,$cLast,$cFav, $cNotes, $_POST['cID']);
    $stmt->execute();
?>
    
    <h1>Edit Item</h1>
<div class="alert alert-success" role="alert">
   Customer edited.
</div>
    <a href="customers.php" class="btn btn-primary">Go back</a>
   <?php
require_once("header.php");
?>
