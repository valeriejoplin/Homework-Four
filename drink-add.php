<?php
require_once("header.php");
?>
<h1> Add Drink </h1>
<form method="post" action="drink-add-save.php">
  <div class="mb-3">
    <label for="ItemName" class="form-label">Drink Name</label>
    <input type="text" class="form-control" id="ItemName" aria-describedby="nameHelp" name="dItem">
    <div id="nameHelp" class="form-text">Enter the item you want to add.</div>
    <label for="Price" class="form-label">Price</label>
    <input type="text" class="form-control" id="Price" aria-describedby="nameHelp" name="dPrice"> 
    <div id="nameHelp" class="form-text">Enter the price.</div>
    <label for="Description" class="form-label">Description</label>

    <input type="text" class="form-control" id="Description" aria-describedby="nameHelp" name="dDesc">
    <div id="nameHelp" class="form-text">Please provide a description.</div>
    <label for="DrinkID" class="form-label">ID</label>
    <input type="text" class="form-control" id="FoodID" aria-describedby="nameHelp" name="dID">
    <div id="nameHelp" class="form-text">Enter the ID.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
require_once("footer.php");
?>
