<?php
require_once("header.php");
?>
<body>
    <h1>Location Details</h1>
<div class="card-group">
    <?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";

$conn = new mysqli($servername, $username, $password, $dbname);

   if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$lid = $_GET['id'];
$sql = "SELECT * FROM Location WHERE LocationID=" . $lid;
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<div class="card">
    <div class="card-body">
      <h5 class="card-title"><?=$row["City"]?></h5>
      <p class="card-text"><?=$row["State"]?><ul>
      <p class="card-text"><?=$row["Address"]?><ul>
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
