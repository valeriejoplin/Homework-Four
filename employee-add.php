<?php
require_once("header.php");
?>
<h1> Add New Customer </h1>
<form method="post" action="customers-add-save.php">
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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
require_once("footer.php");
?>
