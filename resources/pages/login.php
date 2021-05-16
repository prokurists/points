<div class="card w80 ">
<div class="card-body">
<form method="POST" name="login" class="">
  <div class="form-group">
    <label for="uname">Email adress:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter email" name="email" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="submit" name="login" class="btn btn-dark">Login</button>
  <a class="btn btn-dark" href="/register">Create new account</a>
</form>
</div></div>