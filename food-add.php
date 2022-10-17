<?php
require_once("header.php");
?>
<h1> Add Food </h1>
<form method="post" action="food-add-save.php">
  <div class="mb-3">
    <label for="ItemName" class="form-label">Item</label>
    
    <input type="text" class="form-control" id="ItemName" aria-describedby="nameHelp" name="iItem">
    <div id="nameHelp" class="form-text">Enter the item you want to add.</div>

    <input type="text" class="form-control" id="Price" aria-describedby="priceHelp" name="iItem"> 
    <div id="priceHelp" class="form-text">Enter the price.</div>

    <input type="text" class="form-control" id="Description" aria-describedby="descHelp" name="iItem">
    <div id="descHelp" class="form-text">Please provide a description.</div>

    <input type="text" class="form-control" id="DefaultSide" aria-describedby="sideHelp" name="iItem">
    <div id="sideHelp" class="form-text">Enter the side it comes with.</div>

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
require_once("footer.php");
?>
