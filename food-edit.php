<?php
require_once("header.php");
?>
<body>
 <h1>Edit Menu Items</h1>
<?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT FoodID, ItemName from FoodMenu where FoodID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['iid']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="food-edit-save.php">
  <div class="mb-3">
    <label for="ItemName" class="form-label">Name</label>
    <input type="text" class="form-control" id="ItemName" aria-describedby="nameHelp" name="iITem" value="<?=$row['FoodItem']?>">
    <div id="nameHelp" class="form-text">Enter the item name.</div>
  </div>
  <input type="hidden" name="iid" value="<?=$row['FoodID']?>">
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
