<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

  $userView = new User();
  $userStartPoints = $userView->userStartingPoints();
  $userGainedPoints = $userView->userGainedPoints();

?>

<div class="row w80">

<div class="col">
<a href="#startpoints" class="btn btn-dark btn-block" data-toggle="collapse"> Points left
  <span class="badge badge-success">
    <?php echo $userStartPoints; ?>
  </span></a>
   <div id="startpoints" class="collapse p-15">
<?php include ("/comments/to_comments.php"); ?>
  </div></div>

  <div class="col">
  <a href="#pointsearned" class="btn btn-dark btn-block"data-toggle="collapse">Points earned
     <span class="badge badge-success">
       <?php echo $userGainedPoints; ?>
      </span></a>
     <div id="pointsearned" class="collapse p-15">
     <?php include ("/comments/from_comments.php"); ?>
  </div></div>

  </div>
<br>
<div class="container">
  <a href="#ratecoworker" class="btn btn-dark btn-block p-15" data-toggle="collapse">Rate your coworker</a>
  <div id="ratecoworker" class="collapse ">
  <?php include ("/comments/new_comment.php"); ?>
  </div></div>
  
<br>

</div>

<?php }else{ toLoginPage();} ?>