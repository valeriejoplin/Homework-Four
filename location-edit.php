<?php
require_once("header.php");
?>
<body>
 <h1>Edit Location</h1>
<?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from Location where LocationID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['lID']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="location-edit-save.php">
  <div class="mb-3">
 <label for="City" class="form-label">City</label>
    <input type="text" class="form-control" id="City" aria-describedby="nameHelp" name="lCity"> value="<?=$row['City']?>">
    <div id="nameHelp" class="form-text">Enter the city name.</div>
    <label for="State" class="form-label">State</label>
    <input type="text" class="form-control" id="LastName" aria-describedby="nameHelp" name="lState"> value="<?=$row['State']?>">
    <div id="nameHelp" class="form-text">Enter the state name.</div>
    <label for="Address" class="form-label">Address</label>
    <input type="text" class="form-control" id="Address" aria-describedby="nameHelp" name="lAdd"> value="<?=$row['Address']?>">
    <div id="nameHelp" class="form-text">Enter the address.</div>
    <label for="LocationID" class="form-label">ID</label>
    <input type="text" class="form-control" id="LocationID" aria-describedby="nameHelp" name="lID"> value="<?=$row['LocationID']?>">
    <div id="nameHelp" class="form-text">Enter the location ID.</div>
  </div>
  <input type="hidden" name="lID" value="<?=$row['Location']?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<?php
require_once("footer.php");
?>
