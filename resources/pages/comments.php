<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

  $userView = new User();
  $userStartPoints = $userView->userStartingPoints();
  $userGainedPoints = $userView->userGainedPoints();

?>


<div class="container w80">
<?php require "comments/new_comment.php"; ?>

<?php require "comments/to_comments.php"; ?>
</div>
<br>


<?php }else{ toLoginPage();} ?>