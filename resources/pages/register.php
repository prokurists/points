<div class="card w80">
<div class="card-body">
<?php require  'resources/errorMsg.php'; ?>
<form method="POST" name="register">
<div class="form-group">
    <label for="text">Name and surname:</label>
    <input type="text" class="form-control" placeholder="John Doe" name="name" required>
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
if ($regKey == "/register") {
  
?>     
<label for="group">Create new Group</label>
<input type="text" class="form-control" placeholder="Bizzy Blasters" name="groupName" >
<?php
} else {   
  echo "<input type='hidden' class='form-control' placeholder='".$regKey."' name= 'groupValue' value='".$regKey."' readonly>";
}
?>
</div>
  <button type="submit" class="btn btn-dark" name="register">Register</button>
  <a href="/login" class="btn btn-dark">Have account ? Login</a>

</form>

</div></div>