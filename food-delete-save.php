<?php
require_once("header.php");
?>
 <body>
    
<?php
$servername = "localhost";
$username = "projecto_homework3";
$password = "0w_zeP}]OVy0";
$dbname = "projecto_homework3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "delete from instructor where instructor_id=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['iid']);
    $stmt->execute();
?>
    
    <h1>Delete Instructor</h1>
<div class="alert alert-success" role="alert">
  Instructor deleted.
</div>
    <a href="instructors.php" class="btn btn-primary">Go back</a>

<?php
require_once("footer.php");
?>
