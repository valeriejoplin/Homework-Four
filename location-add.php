<?php
require_once("header.php");
?>
<h1> Add New Location </h1>
<form method="post" action="location-add-save.php">
  <div class="mb-3">
    <label for="City" class="form-label">City</label>
    <input type="text" class="form-control" id="City" aria-describedby="nameHelp" name="lCity">
    <div id="nameHelp" class="form-text">Enter the city name.</div>
    <label for="State" class="form-label">State</label>
    <input type="text" class="form-control" id="LastName" aria-describedby="nameHelp" name="lState"> 
    <div id="nameHelp" class="form-text">Enter the state name.</div>
    <label for="Address" class="form-label">Address</label>
    <input type="text" class="form-control" id="Address" aria-describedby="nameHelp" name="lAdd">
    <div id="nameHelp" class="form-text">Enter the address.</div>
    <label for="LocationID" class="form-label">ID</label>
    <input type="text" class="form-control" id="LocationID" aria-describedby="nameHelp" name="lID"> 
    <div id="nameHelp" class="form-text">Enter the location ID.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
require_once("footer.php");
?>
