<?php
require_once("header.php")
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST['saveType']) {
    case 'Add':
      $sqlAdd = "insert into FoodMenu (ItemName) value (?)";
      $stmtAdd = $conn->prepare($sqlAdd);
      $stmtAdd->bind_param("s", $_POST['iName']);
      $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">New item added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update FoodMenu set ItemName=? where =FoodID?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['iName'], $_POST['iid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Item edited.</div>';
    case 'Delete':
      $sqlDelete = "delete from FoodMenu where FoodID=?";
      $stmtDelete = $conn->prepare($sqlDelete);
      $stmtDelete->bind_param("i", $_POST['iid']);
      $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Item deleted.</div>';
  }
}
?>
 <h1> Food Menu </h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Description</th>
      <th>Side</th>
    </tr>
  </thead>
  <tbody>
  <?php
$sql = "SELECT * from FoodMenu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["FoodID"]?></td>
    <td><?=$row["ItemName"]?></td>
    <td><?=$row["Price"]?></td>
    <td><?=$row["Description"]?></td>
    <td><?=$row["DefaultSide"]?></td>
      <td> 
           <td>
    <form method="post" action="food-edit.php">
      <input type="hidden" name="fid" value="<?=$row["FoodID"]?>"/>
      <input type="submit" value="Edit" class="btn" />
    </form>
  </td>
    <td>
    <form method="post" action="food-delete-save.php">
      <input type="hidden" name="fid" value="<?=$row["FoodID"]?>"/>
      <input type="submit" value="Delete" class="btn btn-primary" onclick="confirm('Are you sure?')" />
    </form>
  </td>
</tr>
  <?php
    }
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
</table>
<br>
<a href="food-add.php" class="btn btn-primary">Add New Item</a>
</br>


<?php
require_once("footer.php")
?>
