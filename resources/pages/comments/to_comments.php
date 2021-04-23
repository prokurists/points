<br>
<?php
$commentView = new Comment();
$commentTo = $commentView->showToComments($_SESSION["email"]);
$commentToCounter = count($commentTo);
$commentToRow = 3;

if ($commentToCounter < 3){
  $commentToRow = $commentToCounter;
}

if (!EMPTY($commentTo)){
for ($row = 0; $row < $commentToRow; $row++) {
  echo "<div class='card'>
  <div class='card-header'>

  <span class='badge badge-danger'>-".$commentTo[$row][1]." POINTS </span>
  <span class='badge badge-light'>".$commentTo[$row][2]."</span>


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