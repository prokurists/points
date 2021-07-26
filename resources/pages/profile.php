<div class="card no-border">
<img class="login-logo" src="/resources/style/images/lg.png"></img>
<?php require  'resources/errorMsg.php'; ?>

<div class="container">
  <div class="row text-center">
    <div class="col stats">
You have earned <h1>25</h1> POINTS all time
</div>
<div class="col stats">
You have left <h1>30</h1> COMMENTS all time
</div>
<div class="col stats">
You have GOT <h1>10</h1> COMMENTS all time
</div>
</div></div>

<div class="container">
<hr>
  <h1 class="profileitem">Change Name</h1>
<form method="POST">
  <div class="form-group">
<label for="name">Your name is: </label>
    <input type="name" class="form-control" name="name" placeholder="Līna Kreicberga-Pavlova" required>
    </div>

    <button type="submit" name="update-name" class="btn btn-dark">Change</button>
</form>
  </div>
</div>



<div class="container">
  <hr>
  <h1 class="profileitem">Change Password</h1>
<form method="POST">
  <div class="form-group">
    <label for="oldpassword">Old password:</label>
    <input type="password" class="form-control" name="oldpassword" placeholder="Enter OLD password" id="oldpassword" required>
  </div>
  <div class="form-group">
    <label for="newpassword">New password:</label>
    <input type="password" class="form-control" name="newpassword" placeholder="Enter NEW password" id="newpassword" minlength="8" required>
  </div>
  <div class="form-group">
    <label for="repeatpassword">Repeat new password:</label>
    <input type="password" class="form-control" name="repeatpassword" placeholder="Repeat NEW password" id="repeatpassword" minlength="8" required>
  </div>

  <button type="submit" name="update-pw" class="btn btn-dark">Change</button>
</form>

</div>
</div>