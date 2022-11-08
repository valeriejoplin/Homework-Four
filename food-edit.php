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

$sql = "SELECT ItemName, Price, Description, DefaultSide from FoodMenu where FoodID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['fid']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="food-edit-save.php">
   <div class="mb-3">
    <label for="ItemList" class="form-label">Item Name</label>
<select class="form-select" aria-label="Select ItemName" id="ItemList" name="did">
 <?php
   $itemSQL = "Select * From FoodMenu Order by FoodID";
   $itemResult = $conn->query($itemSQL);
   while($itemRow=$itemResult->fetch_assoc()){
    ?>
   <option value ="<?=$itemRow["FoodID"]?>"><?=$itemRow["FoodID"]." - "?><?=$itemRow["ItemName"]?></option>
 <?php
    }
   ?>
  </select>
  </div>
  <div class="mb-3">
      <label for="Price" class="form-label">Adjust Price</label>
    <input type="text" class="form-control" id="Price" aria-describedby="nameHelp" name="iPrice" value="<?=$row['Price']?>">
    <div id="nameHelp" class="form-text">Enter the Manager's name</div>
         <label for="Description" class="form-label">Adjust Description</label>
    <input type="text" class="form-control" id="Description" aria-describedby="nameHelp" name="iDesc" value="<?=$row['Description']?>">
    <div id="nameHelp" class="form-text">Enter the description</div>
         <label for="DefaultSide" class="form-label">Adjust Sides</label>
    <input type="text" class="form-control" id="DefaultSide" aria-describedby="nameHelp" name="iSide" value="<?=$row['DefaultSide']?>">
    <div id="nameHelp" class="form-text">Enter the side</div>
  </div>
  <input type="hidden" name="fid" value="<?=$row['FoodID']?>">
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
