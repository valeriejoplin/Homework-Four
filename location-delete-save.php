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

$sql = "delete from Location where LocationID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['lID']);
    $stmt->execute();
?>
    
    <h1>Delete Location</h1>
<div class="alert alert-success" role="alert">
  Drink deleted.
</div>
    <a href="location.php" class="btn btn-primary">Go back</a>

<?php
require_once("footer.php");
?>
