<?php require_once("header.php"); ?>
<body>
    <div class="container">
      
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
        $sqlAdd = "insert into Employees (FirstName, LastName, HireDate, Position) value (?, ?,?,?)";
        $stmtAdd = $conn->prepare($sqlAdd);
        $stmtAdd->bind_param("ss", $_POST['eFirstName'], $_POST['eLastName'], $_POST['eHireDate'], $_POST['ePosition']);
        $stmtAdd->execute();   
      echo '<div class="alert alert-success" role="alert">New Employee added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Employees set FirstName=?, LastName=?, HireDate=?,Position=? where EmployeeID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("ssi", $_POST['eFirstName'], $_POST['eLastName'], $_POST['eHireDate'], $_POST['ePosition'], $_POST['eid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Employee edited.</div>';
      break;
    case 'Delete':
        $sqlDelete = "Delete From Employees where EmployeeID=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $_POST['eid']);
        $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Employee Fired.</div>';
  }
}
?>
      <h1>Employees</h1>
      <table class="table table-striped">
          
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployee">
        Hire New Employee
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addEmployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addEmployeeLabel">Add Employee</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="editEmployee<?=$row["EmployeeID"]?>Name" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="editEmployee<?=$row["EmployeeID"]?>Name" aria-describedby="editEmployee<?=$row["EmployeeID"]?>Help" name="eFirstName">
                          <label for="editEmployee<?=$row["EmployeeID"]?>Name" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="editEmployee<?=$row["EmployeeID"]?>Name" aria-describedby="editEmployee<?=$row["EmployeeID"]?>Help" name="eLastName">
                          <div id="editEmployee<?=$row["EmployeeID"]?>Help" class="form-text">Enter the employees's name.</div>
               <label for="editEmployee<?=$row["EmployeeID"]?>" class="form-label">Hire Date</label>
                          <input type="text" class="form-control" id="editEmployee<?=$row["EmployeeID"]?>Name" aria-describedby="editEmployee<?=$row["EmployeeID"]?>Help" name="eHireDate">
                  <label for="editEmployee<?=$row["EmployeeID"]?>" class="form-label">Position</label>
                          <input type="text" class="form-control" id="editEmployee<?=$row["EmployeeID"]?>Name" aria-describedby="editEmployee<?=$row["EmployeeID"]?>Help" name="ePosition">
                        </div>
                <input type="hidden" name="saveType" value="Add">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
          
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Hire Date</th>
            <th>Position</th>
          </tr>
        </thead>
        <tbody>
          
<?php
$sql = "SELECT EmployeeID, LastName, FirstName, HireDate, Position FROM Employees Order by EmployeeID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
            <td><?=$row["EmployeeID"]?></td>
            <td><?=$row["LastName"]." "?><?=$row["FirstName"]?></a></td>
              <td><?=$row["HireDate"]?></td>
            <td><?=$row["Position"]?></td>

            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editEmployee<?=$row["EmployeeID"]?>">
                Edit
              </button>
              <div class="modal fade" id="editEmployee<?=$row["EmployeeID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editEmployee<?=$row["EmployeeID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editEmployee<?=$row["EmployeeID"]?>Label">Edit Employee</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editEmployee<?=$row["EmployeeID"]?>Name" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="editEmployee<?=$row["EmployeeID"]?>Name" aria-describedby="editEmployee<?=$row["EmployeeID"]?>Help" name="eFirstName" value="<?=$row['FirstName']?>">
                          <label for="editEmployee<?=$row["EmployeeID"]?>Name" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="editEmployee<?=$row["EmployeeID"]?>Name" aria-describedby="editEmployee<?=$row["EmployeeID"]?>Help" name="eLastName" value="<?=$row['LastName']?>">
                          <div id="editEmployee<?=$row["EmployeeID"]?>Help" class="form-text">Enter the employee's name.</div>
                           <label for="editEmployee<?=$row["EmployeeID"]?>" class="form-label">Hire Date</label>
                          <input type="text" class="form-control" id="editEmployee<?=$row["EmployeeID"]?>Name" aria-describedby="editEmployee<?=$row["EmployeeID"]?>Help" name="eHireDate" value="<?=$row['HireDate']?>">
                          <div id="editEmployee<?=$row["EmployeeID"]?>Help" class="form-text">Enter the employee's date of hire.</div>
                          <label for="editEmployee<?=$row["EmployeeID"]?>Name" class="form-label">Position</label>
                          <input type="text" class="form-control" id="editEmployee<?=$row["EmployeeID"]?>Name" aria-describedby="editEmployee<?=$row["EmployeeID"]?>Help" name="ePosition" value="<?=$row['Position']?>">
                          <div id="editEmployee<?=$row["EmployeeID"]?>Help" class="form-text">Enter the employee's position.</div>
                        </div>
                        <input type="hidden" name="eid" value="<?=$row['EmployeeID']?>">
                        <input type="hidden" name="saveType" value="Edit">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <form method="post" action="">
                <input type="hidden" name="eid" value="<?=$row["EmployeeID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <button type="submit" class="btn" onclick="return confirm('Are you sure?')"> Delete </button>
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

   </body>
    <footer>
<?php require_once("footer.php"); ?>
</footer>
