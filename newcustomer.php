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
        $sqlAdd = "insert into Customers (FirstName, LastName, FavoriteItem, Notes) value (?, ?,?,?)";
        $stmtAdd = $conn->prepare($sqlAdd);
        $stmtAdd->bind_param("ss", $_POST['cFirstName'], $_POST['cLastName'], $_POST['cFavorite'], $_POST['cNotes']);
        $stmtAdd->execute();   
      echo '<div class="alert alert-success" role="alert">New Customer added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Customers set FirstName=?, LastName=?, HireDate=?,Position=? where CustomerID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("ssi", $_POST['cFirstName'], $_POST['cLastName'], $_POST['cFavorite'], $_POST['cNotes']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Customer edited.</div>';
      break;
    case 'Delete':
        $sqlDelete = "Delete From Customers where CustomerID=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $_POST['cid']);
        $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Customer Deleted.</div>';
  }
}
?>
      <h1>Customers</h1>
      <table class="table table-striped">
          
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomer">
        Add New Employee
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCustomerLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addEmployeeLabel">Add Customer</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="editCustomer<?=$row["CustomerID"]?>Name" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="editCustomer<?=$row["CustomerID"]?>Name" aria-describedby="editCustomer<?=$row["CustomerID"]?>Help" name="cFirstName">
                          <label for="editCustomer<?=$row["CustomerID"]?>Name" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="editCustomer<?=$row["CustomerID"]?>Name" aria-describedby="editCustomer<?=$row["CustomerID"]?>Help" name="cLastName">
                          <div id="editCustomer<?=$row["CustomerID"]?>Help" class="form-text">Enter the employees's name.</div>
               <label for="editCustomer<?=$row["CustomerID"]?>" class="form-label">Hire Date</label>
                          <input type="text" class="form-control" id="editCustomer<?=$row["CustomerID"]?>Name" aria-describedby="editCustomer<?=$row["CustomerID"]?>Help" name="cFavorite">
                  <label for="editCustomer<?=$row["CustomerID"]?>" class="form-label">Position</label>
                          <input type="text" class="form-control" id="editCustomer<?=$row["CustomerID"]?>Name" aria-describedby="editCustomer<?=$row["CustomerID"]?>Help" name="cNotes">
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
            <th>Favorite Item </th>
            <th>Optional Notes</th>
          </tr>
        </thead>
        <tbody>
          
<?php
$sql = "SELECT * FROM Customers Order by CustomerID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
            <td><?=$row["CustomerID"]?></td>
            <td><?=$row["FirstName"]." "?><?=$row["LastName"]?></a></td>
              <td><?=$row["FavoriteItem"]?></td>
            <td><?=$row["Notes"]?></td>

            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editCustomer<?=$row["CustomerID"]?>">
                Edit
              </button>
              <div class="modal fade" id="editCustomer<?=$row["CustomerID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCustomer<?=$row["CustomerID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editCustomer<?=$row["CustomerID"]?>Label">Edit Customers</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editCustomer<?=$row["CustomerID"]?>Name" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="editCustomer<?=$row["CustomerID"]?>Name" aria-describedby="editCustomer<?=$row["CustomerID"]?>Help" name="cFirstName" value="<?=$row['FirstName']?>">
                          <label for="editCustomer<?=$row["CustomerID"]?>Name" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="editCustomer<?=$row["CustomerID"]?>Name" aria-describedby="editCustomer<?=$row["CustomerID"]?>Help" name="cLastName" value="<?=$row['LastName']?>">
                          <div id="editCustomer<?=$row["CustomerID"]?>Help" class="form-text">Enter the employee's name.</div>
                           <label for="editCustomer<?=$row["CustomerID"]?>" class="form-label">Hire Date</label>
                          <input type="text" class="form-control" id="editCustomer<?=$row["CustomerID"]?>Name" aria-describedby="editCustomer<?=$row["CustomerID"]?>Help" name="cFavorite" value="<?=$row['FavoriteItem']?>">
                          <div id="editCustomer<?=$row["CustomerID"]?>Help" class="form-text">Enter the employee's date of hire.</div>
                          <label for="editCustomer<?=$row["CustomerID"]?>Name" class="form-label">Position</label>
                          <input type="text" class="form-control" id="editCustomer<?=$row["CustomerID"]?>Name" aria-describedby="editCustomer<?=$row["CustomerID"]?>Help" name="cNotes" value="<?=$row['Notes']?>">
                          <div id="editCustomer<?=$row["CustomerID"]?>Help" class="form-text">Enter the employee's position.</div>
                        </div>
                        <input type="hidden" name="cid" value="<?=$row['CustomerId']?>">
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
                <input type="hidden" name="cid" value="<?=$row["CustomerID"]?>" />
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
