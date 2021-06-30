<div class="card w80">
<div class="card-body">
<?php require  'resources/errorMsg.php'; ?>

    <form method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter to reset email" name="email-reset" required>
    </div>
              <button type="submit" name="reset-pw" class="btn btn-dark">Reset</button>
              <a href="/login" class="btn btn-dark">Have account ? Login</a>
            <a class="btn btn-dark" href="/register/">Create new account</a>

  </form>
</div>
</div></div>