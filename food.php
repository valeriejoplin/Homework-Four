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
      $stmtAdd->bind_param("s", $_POST['iItem']);
      $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">New item added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update FoodMenu set ItemName=? where =FoodID?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['iITem'], $_POST['iid']);
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
$sql = "SELECT FoodID, ItemName, Price, Description, DefaultSide from FoodMenu";
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

<?php
require_once("footer.php")
?>
