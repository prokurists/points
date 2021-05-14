<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="/">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if(!isset($_SESSION["loggedIn"])){ ?>
        <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>

      <?php }else{ ?>
        <li class="nav-item">
        <a class="nav-link" href="/transaction_history">Transaction History</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/statistics">TOP users</a>
      </li>
      <?php if(isset($_SESSION["groupMaster"])){?>
      <li class="nav-item">
        <a class="nav-link" href="/group_settings">Group settings</a>
      </li>
        <?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <span class="badge badge-pill badge-light">Hello, <?php echo $_SESSION["email"]; ?> </span><br>
    <a class="nav-link" href="/logout"><i class="fa fa-sign-out" style="font-size:20px; color:red; padding-left:2px;"></i></a>
<?php }?>


    </form>
  </div>
</nav>

