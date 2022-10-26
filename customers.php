<?php
require_once("header.php")
?>
 <body>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Favorite Menu Item</th>
      <th>Optional Notes</th>
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

$sql = "SELECT * from Customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["CustomerID"]?></td>
    <td><?=$row["FirstName"]?></td>
    <td><?=$row["LastName"]?></td>
    <td><?=$row["FavoriteItem"]?></td>
    <td><?=$row["Notes"]?></td>
<td> 
           <td>
    <form method="post" action="customers-edit.php">
      <input type="hidden" name="cid" value="<?=$row["CustomerID"]?>"/>
      <input type="submit" value="Edit" class="btn" />
    </form>
  </td>
    <td>
    <form method="post" action="customers-delete-save.php">
      <input type="hidden" name="did" value="<?=$row["CustomerID"]?>"/>
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
<a href="customers-add.php" class="btn btn-primary">Add New Customer</a>
</br>
<?php
require_once("footer.php")
?>
