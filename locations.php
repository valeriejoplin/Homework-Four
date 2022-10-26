<?php
require_once("header.php");
?>
 <body>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>City</th>
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST['saveType']) {
    case 'Add':
      $sqlAdd = "insert into Location (City) value (?)";
      $stmtAdd = $conn->prepare($sqlAdd);
      $stmtAdd->bind_param("s", $_POST['lName']);
      $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">New Location added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Supervisor set City=? where LocationID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['lName'], $_POST['sid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Location edited.</div>';
      break;
    case 'Delete':
      $sqlDelete = "delete from Location where LocationID=?";
      $stmtDelete = $conn->prepare($sqlDelete);
      $stmtDelete->bind_param("i", $_POST['sid']);
      $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Location deleted.</div>';
      break;
  }
}
?>
$sql = "SELECT LocationID, City from Location";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["LocationID"]?></td>
    <td><a href="location-details.php?id=<?=$row["LocationID"]?>"><?=$row["City"]?></a></td>
<td>
            <form method="post" action="location-add-save.php">
             <input type="hidden" name="id" value="<?=$row["LocationID"]?>" />
             <input type="submit" value="Location Name" />
           </form>
           </td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editLocation<?=$row["LocationID"]?>">
                Edit
              </button>
              <div class="modal fade" id="editLocation<?=$row["LocationID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLocation<?=$row["LocationID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editLocation<?=$row["LocationID"]?>Label">Edit Location</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editLocation<?=$row["LocationID"]?>Name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="editLocation<?=$row["LocationID"]?>Name" aria-describedby="editLocation<?=$row["LocationID"]?>Help" name="lName" value="<?=$row['LocationID']?>">
                          <div id="editLocation<?=$row["LocationID"]?>Help" class="form-text">Enter the City name.</div>
                        </div>
                        <input type="hidden" name="sid" value="<?=$row['LocationID']?>">
                        <input type="hidden" name="saveType" value="Edit">
                        <input type="submit" class="btn btn-primary" value="Submit">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <form method="post" action="">
                <input type="hidden" name="sid" value="<?=$row["LocationID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <input type="submit" class="btn" onclick="return confirm('Are you sure?')" value="Delete">
              </form>
            </td>
  </tr>
<?php
  
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
    </table>
<br />
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLocation">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addLocation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLocationLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addLocationLabel">Add A New Location</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="City" class="form-label">City</label>
                  <input type="text" class="form-control" id="City" aria-describedby="nameHelp" name="lName">
                  <div id="nameHelp" class="form-text">Enter the city's name.</div>
                </div>
                <input type="hidden" name="saveType" value="Add">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>  
    
    
<?php
require_once("footer.php");
?>
