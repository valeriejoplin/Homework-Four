<?php
require_once("header.php");
?>
<body>
 <h1>Edit Drinks</h1>
<?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ItemName, Price, Description from DrinkMenu where DrinkID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['did']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="drink-edit-save.php">
  <div class="mb-3">
    <label for="ItemName" class="form-label">New Name</label>
    <input type="text" class="form-control" id="ItemName" aria-describedby="nameHelp" name="dItem" value="<?=$row['ItemName']?>">
    <div id="nameHelp" class="form-text">Enter the item's name</div>
      </div>
  <div class="mb-3">
    <label for="ItemList" class="form-label">Item Name</label>
<select class="form-select" aria-label="Select ItemName" id="ItemList" name="did">
<?php
    $itemSql = "select * from DrinkMenu order by FoodID";
    $itemResult = $conn->query($itemSql);
    while($itemRow = $itemResult->fetch_assoc()) {
      if ($itemRow['DrinkID'] == $row['DrinkID']) {
        $selText = " selected";
      } else {
        $selText = "";
      }
?>
  <option value="<?=$itemRow['DrinkID']?>"<?=$selText?>><?=$itemRow['DrinkID']?></option>
  <?php } ?>
  </select>
      <label for="Price" class="form-label">Adjust Price</label>
    <input type="text" class="form-control" id="Price" aria-describedby="nameHelp" name="dPrice" value="<?=$row['Price']?>">
    <div id="nameHelp" class="form-text">Enter the Manager's name</div>
         <label for="Description" class="form-label">Adjust Description</label>
    <input type="text" class="form-control" id="Description" aria-describedby="nameHelp" name="dDesc" value="<?=$row['Description']?>">
    <div id="nameHelp" class="form-text">Enter the description</div>
  </div>
  <input type="hidden" name="did" value="<?=$row['DrinkID']?>">
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

