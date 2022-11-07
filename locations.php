<?php
require_once("header.php")
?>
 <body>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>City</th>
      <th>State</th>
      <th>Address</th>
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

$sql = "SELECT * from Location";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["LocationID"]?></td>
    <td><?=$row["City"]?></td>
    <td><?=$row["State"]?></td>
    <td><?=$row["Address"]?></td>
<td> 
           <td>
    <form method="post" action="location-edit.php">
      <input type="hidden" name="cid" value="<?=$row["LocationID"]?>"/>
      <input type="submit" value="Edit" class="btn" />
    </form>
  </td>
    <td>
    <form method="post" action="location-delete-save.php">
      <input type="hidden" name="did" value="<?=$row["LocationID"]?>"/>
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
<a href="location-add.php" class="btn btn-primary">Add New Location</a>
</br>
<?php
require_once("footer.php")
?>
