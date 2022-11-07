<?php
require_once("header.php");
?>
<body>
 <h1>Edit Employees</h1>
<?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT FirstName, LastName, HireDate, Position from Employees where EmployeeID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['eid']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="employee-edit-save.php">
  <div class="mb-3">
    <label for="FirstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="FirstName" aria-describedby="nameHelp" name="eFirst" value="<?=$row['FirstName']?>">
    <div id="nameHelp" class="form-text">Enter their first name</div>
      <label for="LastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="LastName" aria-describedby="nameHelp" name="eLast" value="<?=$row['LastName']?>">
    <div id="nameHelp" class="form-text">Enter their name</div>
         <label for="HireDate" class="form-label">Hire Date</label>
    <input type="text" class="form-control" id="HireDate" aria-describedby="nameHelp" name="eHireDate" value="<?=$row['HireDate']?>">
    <div id="nameHelp" class="form-text">Enter their date of hire</div>
         <label for="Position" class="form-label">Position</label>
    <input type="text" class="form-control" id="Position" aria-describedby="nameHelp" name="ePosition" value="<?=$row['Position']?>">
    <div id="nameHelp" class="form-text">Enter their job title(s).</div>
  </div>
    <input type="hidden" name="eid" value="<?=$row['EmployeeId']?>">
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
