<?php
require_once("header.php");
?>
<body>
 <h1>Edit Customers</h1>
<?php
$servername = "localhost";
$username = "valeriej_databaseuser";
$password = "tI_*dXAL^r[(";
$dbname = "valeriej_homework4";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from Customers where CustomerID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['cID']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="customers-edit-save.php">
 <div class="mb-3">
    <label for="FirstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="FirstName" aria-describedby="nameHelp" name="eFirst">
    <div id="nameHelp" class="form-text">Enter their first name.</div>
    <label for="LastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="LastName" aria-describedby="nameHelp" name="eLast"> 
    <div id="nameHelp" class="form-text">Enter their last name.</div>
    <label for="HireDate" class="form-label">Hire Date</label>
    <input type="text" class="form-control" id="HireDate" aria-describedby="nameHelp" name="eHireDate">
    <div id="nameHelp" class="form-text">Enter their date of hire.</div>
    <label for="Position" class="form-label">Position</label>
    <input type="text" class="form-control" id="Position" aria-describedby="nameHelp" name="ePosition">
    <div id="nameHelp" class="form-text">Enter their job title(s).</div>
    <label for="EmployeeID" class="form-label">ID</label>
    <input type="text" class="form-control" id="CustomerID" aria-describedby="nameHelp" name="eID"> 
    <div id="nameHelp" class="form-text">Enter their ID number.</div>
  </div>
  <input type="hidden" name="eID" value="<?=$row['EmployeeID']?>">
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
