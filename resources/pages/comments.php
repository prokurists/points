<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

  $userView = new User();
  $userStartPoints = $userView->userStartingPoints();
  $userGainedPoints = $userView->userGainedPoints();

?>


<?php require "comments/new_comment.php"; ?>

<?php require "comments/to_comments.php"; ?>
<br>


<?php }else{ toLoginPage();} ?>