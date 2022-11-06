<?php
require_once("header.php");
?>
<body>
 <h1>Edit Customers</h1>
<?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from Customers where CustomerID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['cID']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="customers-edit-save.php">
  <div class="mb-3">
    <label for="FirstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="FirstName" aria-describedby="nameHelp" name="cFirst">
    <div id="nameHelp" class="form-text">Enter their first name.</div>
    <label for="LastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="LastName" aria-describedby="nameHelp" name="cLast"> 
    <div id="nameHelp" class="form-text">Enter their last name.</div>
    <label for="FavoriteItem" class="form-label">Menu Item</label>
    <input type="text" class="form-control" id="FavoriteItem" aria-describedby="nameHelp" name="cFav">
    <div id="nameHelp" class="form-text">Please provide their usual order.</div>
    <label for="Notes" class="form-label">Optional Notes</label>
    <input type="text" class="form-control" id="FoodID" aria-describedby="nameHelp" name="cNotes">
    <div id="nameHelp" class="form-text">Enter notes about the customer.</div>
    <label for="CustomerID" class="form-label">ID</label>
    <input type="text" class="form-control" id="CustomerID" aria-describedby="nameHelp" name="cID"> 
    <div id="nameHelp" class="form-text">Enter their customer ID number.</div>
  </div>
  <input type="hidden" name="cID" value="<?=$row['CustomerID']?>">
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
