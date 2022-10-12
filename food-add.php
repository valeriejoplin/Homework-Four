<?php
require_once("header.php");
?>
<h1> Add Food </h1>
<form method="post" action="food-add-save.php">
  <div class="mb-3">
    <label for="ItemName" class="form-label">Item</label>
    <input type="text" class="form-control" id="ItemName" aria-describedby="nameHelp" name="iItem">
    <div id="nameHelp" class="form-text">Enter the item you want to add.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
require_once("footer.php");
?>
