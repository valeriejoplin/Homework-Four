<?php
require_once("header.php")
?>
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
      $sqlAdd = "insert into FoodMenu (ItemName) value (?)";
      $stmtAdd = $conn->prepare($sqlAdd);
      $stmtAdd->bind_param("s", $_POST['iItem']);
      $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">New item added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update FoodMenu set ItemName=? where =FoodID?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['iItem'], $_POST['iid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Item edited.</div>';
    case 'Delete':
      $sqlDelete = "delete from FoodMenu where FoodID=?";
      $stmtDelete = $conn->prepare($sqlDelete);
      $stmtDelete->bind_param("i", $_POST['iid']);
      $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Item deleted.</div>';
  }
}
?>
 <h1> Food Menu </h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Description</th>
      <th>Side</th>
    </tr>
  </thead>
  <tbody>
  <?php
$sql = "SELECT FoodID, ItemName, Price, Description, DefaultSide from FoodMenu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["FoodID"]?></td>
    <td><?=$row["ItemName"]?></td>
    <td><?=$row["Price"]?></td>
    <td><?=$row["Description"]?></td>
    <td><?=$row["DefaultSide"]?></td>
      <td> 
          <button type ="button" class="btn" data-bs-toggle="modal" data-bs-target="#editFood<?-$row["FoodID"]?>">
              Edit
          </button>
          <div class ="modal fade" id="editFood<?=$row["FoodID"]?>" data-bs-background="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editItem<?=$row["FoodID"]?>Label" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="editItem<?=$row["FoodID"]?>Label">Edit Menu Items</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">      
                       <label for="editItem<?=$row["FoodItem"]?>Name" class="form-label">Name</label> 
<input type="text" class="form-control" id="editItem<?=$row["FoodID"]?>Name" aria-describedby="editItem<?=$row["FoodID"]?>Help" name="iItem" value="<?=$row['ItemName']?>">
                          <div id="editItem<?=$row["FoodID"]?>Help" class="form-text">Enter the item's name.</div>
                        </div>
                        <input type="hidden" name="iid" value="<?=$row['FoodID']?>">
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
                <input type="hidden" name="iid" value="<?=$row["FoodID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <button type="submit" class="btn" onclick="return confirm('Are you sure?')">Delete</button>
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
<a href="food-add.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Add New Item</a>

<?php
require_once("footer.php")
?>
