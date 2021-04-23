<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

  $userView = new User();
  $userStartPoints = $userView->userStartingPoints();
  $userGainedPoints = $userView->userGainedPoints();

?>


<div class="container w80">
<a href="#startpoints" class="btn btn-dark btn-block btn-lg" data-toggle="collapse"> Points left
  <span class="badge badge-success">
    <?php echo $userStartPoints; ?>
  </span></a>
   <div id="startpoints" class="collapse p-15">
<?php require __DIR__."/comments/to_comments.php"; ?>
  </div></div>
<br>


<div class="container w80">

  <a href="#pointsearned" class="btn btn-dark btn-block btn-lg"data-toggle="collapse">Points earned
     <span class="badge badge-success">
       <?php echo $userGainedPoints; ?>
      </span></a>
     <div id="pointsearned" class="collapse p-15">
     <?php require __DIR__."/comments/from_comments.php"; ?>
  </div>

  </div>
<br>
<div class="container w80">


  <a href="#ratecoworker" class="btn btn-dark btn-block btn-lg" data-toggle="collapse">Rate your coworker</a>
  <div id="ratecoworker" class="collapse ">
  <?php require __DIR__."/comments/new_comment.php"; ?>
  </div></div></div>
  
<br>


<?php }else{ toLoginPage();} ?>