<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

  $userView = new User();


  $transactionView = new Transaction();
  $transactionTo = $transactionView->showToTransactions($_SESSION["email"], $currentMonth);
  $transactionToCounter = count($transactionTo);
  $transactionToRow = 3;

?>

<?php require  'resources/errorMsg.php'; ?>



<?php require __DIR__. "/transactions/transaction.php"; ?>

<?php require __DIR__."/transactions/transactions_made.php"; ?>
<br>


<?php }else{ toLoginPage();} ?>
