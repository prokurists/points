<div class="container w80">
<form action="/transaction_history" method="POST">
  <label for="birthday">Choose data month:</label>
  <input type="month" value="<?php echo $dataMonth; ?>" name="choosenMonth">
  <input type="submit" name="setMonth">
</form>

<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["loggedIn"])){
        echo "Last month history";
        $xComment = new Comment();
       // $showCommentsByMonth = $xComment->showComments($_SESSION["email"], $currentMonth);

}else{
    toLoginPage();
} ?>
</div>

