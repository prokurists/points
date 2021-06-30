<div class="card w80">
<div class="card-body">
<?php require  'resources/errorMsg.php'; ?>

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

  <button type="submit" name="update-pw" class="btn btn-dark">Submit</button>
</form>


</div></div>