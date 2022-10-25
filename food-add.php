<?php
require_once("header.php");
?>
<h1> Add Food </h1>
<form method="post" action="food-add-save.php">
  <div class="mb-3">
    <label for="ItemName" class="form-label">Menu Item</label>
    <input type="text" class="form-control" id="ItemName" aria-describedby="nameHelp" name="iItem">
    <div id="nameHelp" class="form-text">Enter the item you want to add.</div>
    <label for="Price" class="form-label">Price</label>
    <input type="text" class="form-control" id="Price" aria-describedby="nameHelp" name="iPrice"> 
    <div id="nameHelp" class="form-text">Enter the price.</div>
    <label for="Description" class="form-label">Description</label>

    <input type="text" class="form-control" id="Description" aria-describedby="nameHelp" name="iDesc">
    <div id="nameHelp" class="form-text">Please provide a description.</div>
    <label for="DefaultSide" class="form-label">Side</label>
    <input type="text" class="form-control" id="DefaultSide" aria-describedby="nameHelp" name="iSide">
    <div id="nameHelp" class="form-text">Enter the side it comes with.</div>
    <label for="FoodID" class="form-label">ID</label>
    <input type="text" class="form-control" id="FoodID" aria-describedby="nameHelp" name="iID">
    <div id="nameHelp" class="form-text">Enter the ID.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
require_once("footer.php");
?>
