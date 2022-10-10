<?php
require_once("header.php");
?>
<body>
    <h1>Location Details</h1>
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
$lid = $_GET['LocationID'];
$sql = "SELECT * FROM Location WHERE LocationID=" . $lid;
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["LocationID"]?></td>
    <td><?=$row["City"]?></td>
    <td><?=$row["State"]?></td>
    <td><?=$row["Address"]?></td>
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
require_once("footer.php");
?>
