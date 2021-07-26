<div class="card no-border">

<img class="login-logo" src="/resources/style/images/lg.png"></img>

<?php require  'resources/errorMsg.php'; ?>

    <form method="POST">      
    <div class="form-group">

      <label for="forgot_email">Email:</label>

      <input 
      type="email" 
      class="form-control" 
      id="forgot_email" 
      placeholder="Enter to reset email" 
      name="email-reset" 
      required>

      <button 
      type="submit" 
      name="reset-pw" 
      class="btn btn-dark submit">Reset</button>

    </div>
  </form>
</div>
