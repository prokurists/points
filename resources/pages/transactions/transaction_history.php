<div class="container w80">
<div class="card p-5">
<form action="<?php echo $request; ?>" method="POST">
  <label for="datepicker">Choose data month:</label>
  <input type="month" id="datepicker" max="<?php echo date('Y-m', strtotime("-1 months")); ?>" value="<?php echo $monthChoosen; ?>" name="monthChoosen">
  <input type="submit" name="setMonth">
</form></div>

<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["loggedIn"])){

      $xTransaction = new Transaction();
       $xUser = new User();

       $transactionFrom = $xTransaction->showFromTransactions($_SESSION["email"], $monthChoosen);

       if (is_array($transactionFrom)){
       $transactionFromCounter = count($transactionFrom);
       if ($transactionFromCounter < 3){
        $transactionFromRow = $transactionFromCounter;
        
      } else {
       $transactionFromRow = 3;}}

       require_once __DIR__.("/transactions_from.php");



}else{
    toLoginPage();
} ?>
</div>

