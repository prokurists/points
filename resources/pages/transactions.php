<div class="container w80">
<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

  $userView = new User();
  $userStartPoints = $userView->userStartingPoints();
  $userGainedPoints = $userView->userGainedPoints();
  $commentView = new Comment();
  $commentTo = $commentView->showToComments($_SESSION["email"], $currentMonth);
  $commentToCounter = count($commentTo);
  $commentToRow = 3;

?>


<?php require "transactions/transaction.php"; ?>

<?php require "transactions/transaction_made.php"; ?>
<br>


<?php }else{ toLoginPage();} ?>
</div>