<div class="card no-border">

<img class="login-logo" src="/resources/style/images/lg.png"></img>

<?php require  'resources/errorMsg.php'; ?>

<form method="POST" name="login">

  <div class="form-group">

    <label for="form_email">Email adress:</label>

    <input 
    type="text" 
    class="form-control" 
    id="form_email" 
    placeholder="Enter email" 
    name="email" required/>

  </div>

  <div class="form-group">

    <label for="form_password">Password:</label>

    <input 
    type="password" 
    class="form-control" 
    id="form_password" 
    placeholder="Enter password" 
    name="password" 
    required/>

    <button type="submit" name="login" class="btn btn-dark submit">Login</button>
    <a href="/register/" class="submit">Create new account</a>
    <div class="card float-right no-border">
     <a href="/reset-password" class="submit">Forgot password?</a>
  </div>
    </div>
  </div>
</form>