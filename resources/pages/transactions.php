<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

  $userView = new User();
  $userStartPoints = $userView->userStartingPoints();
  $userGainedPoints = $userView->userGainedPoints();

  $transactionView = new Transaction();
  $transactionTo = $transactionView->showToTransactions($_SESSION["email"], $currentMonth);
  $transactionToCounter = count($transactionTo);
  $transactionToRow = 3;

?>


<?php require __DIR__. "/transactions/transaction.php"; ?>
<div class="container w80">

<?php require __DIR__."/transactions/transactions_made.php"; ?>
<br>


<?php }else{ toLoginPage();} ?>
</div>