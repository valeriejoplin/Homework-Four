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
    <label for="ItemList" class="form-label">Item Name</label>
<select class="form-select" aria-label="Select ItemName" id="ItemList" name="did">
 <?php
   $itemSQL = "Select * From DrinkMenu Order by DrinkID";
   $itemResult = $conn->query($itemSQL);
   while($itemRow=$itemResult->fetch_assoc()){
    ?>
   <option value ="<?=$itemRow["DrinkID"]?>"><?=$itemRow["DrinkID"]." - "?><?=$itemRow["ItemName"]?></option>
 <?php
    }
   ?>
  </select>
  </div>
    <div class="mb-3">
      <label for="Price" class="form-label">Adjust Price</label>
    <input type="text" class="form-control" id="Price" aria-describedby="nameHelp" name="dPrice" value="<?=$row['Price']?>">
    <div id="nameHelp" class="form-text">Enter the price</div>
         <label for="Description" class="form-label">Adjust Description</label>
    <input type="text" class="form-control" id="Description" aria-describedby="nameHelp" name="dDesc" value="<?=$row['Description']?>">
    <div id="nameHelp" class="form-text">Enter the description</div>
  </div>
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

