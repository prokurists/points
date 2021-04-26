<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

  $userView = new User();
  $userStartPoints = $userView->userStartingPoints();
  $userGainedPoints = $userView->userGainedPoints();

?>


<?php require "transactions/transaction.php"; ?>

<?php require "transactions/transaction_made.php"; ?>
<br>


<?php }else{ toLoginPage();} ?>