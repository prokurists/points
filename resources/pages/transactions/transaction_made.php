<br>
<div class="container w80">

<?php
$commentView = new Comment();
$commentTo = $commentView->showToComments($_SESSION["email"], $currentMonth);
$commentToCounter = count($commentTo);
$commentToRow = 3;

if ($commentToCounter < 3){
  $commentToRow = $commentToCounter;
}

if (!EMPTY($commentTo)){
for ($row = 0; $row < $commentToRow; $row++) {

  echo "<div class='card'>
  <div class='card-header'>
  <div class='row'>
  <div class='col-2'>
  <span class='badge badge-danger'>-".$commentTo[$row][1]." POINTS </span>
  </div>
  <div class='col-2'>
  <span class='badge badge-light'>Date: ".$commentTo[$row][2]."</span>
  </div>
  <div class='col-8'>
  Sent to: ".$commentTo[$row][3]."
  <form action='/' method='POST'>
  <input type='hidden' name='deleteCommentID' value='".$commentTo[$row][4]."'>
  <input type='hidden' name='commentAmount' value='".$commentTo[$row][1]."'>
  <input type='hidden' name='emailTo' value='".$commentTo[$row][3]."'>
  <button type='submit' class='ml-2 mb-1 close' name='deleteComment' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button></form>
  </div></div>


  </div>
  <div class='card-body'>
      <p>".$commentTo[$row][0]."</p>

  </div>

</div><br>";
}
for ($row = 3; $row < count($commentTo); $row++) {
  echo "<div id='showMoreTo' class='collapse p-15'><div class='card'>
  <div class='card-header'>

  <span class='badge badge-danger'>-".$commentTo[$row][1]." POINTS </span>
  <span class='badge badge-light'>".$commentTo[$row][2]."</span>


  </div>
  <div class='card-body'>
      <p>".$commentTo[$row][0]."</p>
  </div></div>

</div>";
}
if ($commentToCounter > 3){
  echo "  
  <a href='#showMoreTo' class='btn btn-dark' data-toggle='collapse'> show/hide all
    <span class='badge badge-success'  </span></a>
  ";}
  } else {
  echo "<div class='card'>
  <div class='card-header'>
  </div>
  <div class='card-body'>
      <p>You haven't rated anyone yet</p>
      <a href='/new_comment' class='btn btn-dark'>Rate now</a>
  </div>
</div>";

}
?>
</div>