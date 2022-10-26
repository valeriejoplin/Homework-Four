<?php
require_once("header.php")
?>
  <body>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DrinkID, ItemName, Price, Description from DrinkMenu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["DrinkID"]?></td>
    <td><?=$row["ItemName"]?></td>
    <td><?=$row["Price"]?></td>
    <td><?=$row["Description"]?></td>
   <td> 
           <td>
    <form method="post" action="drink-edit.php">
      <input type="hidden" name="did" value="<?=$row["DrinkID"]?>"/>
      <input type="submit" value="Edit" class="btn" />
    </form>
  </td>
    <td>
    <form method="post" action="drink-delete-save.php">
      <input type="hidden" name="did" value="<?=$row["DrinkID"]?>"/>
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
<a href="drink-add.php" class="btn btn-primary">Add New Item</a>
</br>
<?php
require_once("footer.php")
?>
