<div class="container w80">
<form action="/transaction_history" method="POST">
  <label for="birthday">Choose data month:</label>
  <input type="month" value="<?php echo $monthChoosen; ?>" name="monthChoosen">
  <input type="submit" name="setMonth">
</form>

<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["loggedIn"])){
        echo "Last month history";


       $xComment = new Comment();

       $commentFrom = $xComment->showFromComments($_SESSION["email"], $monthChoosen);
       $commentFromCounter = count($commentFrom);
       $commentFromRow = 3;

       $commentTo = $xComment->showToComments($_SESSION["email"], $monthChoosen);
       $commentToCounter = count($commentTo);
       $commentToRow = 3;


       require_once __DIR__.("/transaction_made.php");
       require_once __DIR__.("/from_comments.php");


}else{
    toLoginPage();
} ?>
</div>

