<div class="container w80">
<form action="/transaction_history" method="POST">
  <label for="birthday">Choose data month:</label>
  <input type="month" value="<?php echo $monthChoosen; ?>" name="monthChoosen">
  <input type="submit" name="setMonth">
</form>

<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["loggedIn"])){
        $deleteButtonEnabled = false;


       $xTransaction = new Transaction();

       $transactionFrom = $xTransaction->showFromTransactions($_SESSION["email"], $monthChoosen);
       $transactionFromCounter = count($transactionFrom);
       $transactionFromRow = 3;


       $transactionTo = $xTransaction->showToTransactions($_SESSION["email"], $monthChoosen);
       $transactionToCounter = count($transactionTo);
       $transactionToRow = 3;


       require_once __DIR__.("/transactions_made.php");
       require_once __DIR__.("/transactions_from.php");


}else{
    toLoginPage();
} ?>
</div>

