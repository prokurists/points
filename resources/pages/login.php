<div class="card no-border">
<img class="login-logo" src="/resources/style/images/lg.png"></img>
<?php require  'resources/errorMsg.php'; ?>

<form method="POST" name="login">
  <div class="form-group">
    <label for="uname">Email adress:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter email" name="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>

  </div>
  <button type="submit" name="login" class="btn btn-dark">Login</button>
  <a href="/register/">Create new account</a>

  </div>
  <div class="card float-right no-border">
  <a href="/reset-password">Forgot password?</a>
  </div>

</form>