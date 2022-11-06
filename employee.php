<?php
require_once("header.php");
?>
<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Date of Hire</th>
      <th>Position</th>
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

$sql = "SELECT * from Employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["EmployeeID"]?></td>
    <td><a href="employee-cards.php?id=<?=$row["EmployeeID"]?>"><?=$row["FirstName"]?></a></td>
    <td><?=$row["LastName"]?></td>
    <td><?=$row["HireDate"]?></td>
    <td><?=$row["Position"]?></td>
    <td>
      <td>
    <form method="post" action="employee-edit.php">
      <input type="hidden" name="cid" value="<?=$row["EmployeeID"]?>"/>
      <input type="submit" value="Edit" class="btn" />
    </form>
    <form method="post" action="employee-delete-save.php">
      <input type="hidden" name="eID" value="<?=$row["EmployeeID"]?>"/>
      <input type="submit" value="Fire" class="btn btn-primary" onclick="confirm('Are you sure you want to fire them?')" />
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
<a href="employee-add.php" class="btn btn-primary">Add New Customer</a>
</br>
<?php
require_once("footer.php");
?>
