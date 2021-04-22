<div class="card w80">
<div class="card-body">
<form method="POST" name="register">
<div class="form-group">
    <label for="text">Name:</label>
    <input type="text" class="form-control" placeholder="Enter your name and surname" name="name" required>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="name@example.com" name="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password" required>
  </div>
  <div class="form-group">
    <label for="pwd">Retype password:</label>
    <input type="password" class="form-control" placeholder="Retype password" name="password_Confirm" required>
  </div>
  <div class="form-group">

<?php 
if ($number == "/registration") {
  
?>     
<label for="group">Create new Group</label>
<input type="text" class="form-control" placeholder="Create new group" name="groupName" >
<?php
} else {   
  echo "<input type='hidden' class='form-control' placeholder='".$number."' name= 'groupValue' value='".$number."' readonly>";
}
?>
</div>
  <button type="submit" class="btn btn-primary" name="register">Submit</button>
  <a href="/login">Have account ? Login</a>

</form>

</div></div>