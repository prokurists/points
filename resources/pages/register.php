<div class="card no-border">
<img class="login-logo" src="/resources/style/images/lg.png"></img>
<?php require  'resources/errorMsg.php'; ?>

<form method="POST">
<div class="form-group">

    <label for="form_name">Name and surname:</label>

    <input 
    type="text"
    placeholder="John Doe"
    name="name"
    id="form_name"
    class="form-control"
    required/>

  </div>

  <div class="form-group">

    <label for="form_email">Email address:</label>

    <input 
    type="email" 
    placeholder="name@example.com" 
    name="email" 
    id="form_email" 
    class="form-control"
    required/>

  </div>

  <div class="form-group">

    <label for="form_password">Password:</label>

    <input 
    type="password" 
    placeholder="Enter password" 
    name="password" 
    id="form_password" 
    class="form-control"
    required/>

  </div>

  <div class="form-group">

    <label for="form_second_password">Retype password:</label>

    <input 
    type="password" 
    placeholder="Retype password" 
    name="password_Confirm" 
    id="form_second_password" 
    class="form-control"
    required/>

  </div>

  <div class="form-group">

<?php 
if ($regKey == "") {
  
?>     
<label for="form_group">Create new Group</label>

    <input 
    type="text" 
    placeholder="Bizzy Blasters" 
    id="form_group" 
    name="groupName" 
    class="form-control"
    required />

<?php
} else {   
  echo "<input 
  type='hidden' 
  name='groupValue'  
  value='".$regKey."'
  class='form-control'
  readonly/>";
}
?>

</div>
  <button 
  type="submit" 
  id="register" 
  class="btn btn-dark" 
  name="register">Register</button>

  </div>

</form>