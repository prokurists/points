<br>
<?php
$commentView = new Comment();
$commentFrom = $commentView->showFromComments($_SESSION["email"]);
$commentFromCounter = count($commentFrom);
$commentFromRow = 3;

if (!EMPTY($commentFrom)){
  
for ($row = 0; $row < $commentFromRow; $row++) {
  echo "<div class='card'>
  <div class='card-header'>
  <span class='badge badge-success'>+".$commentFrom[$row][1]." POINTS</span>
  <small class='text-muted text-right'>".$commentFrom[$row][2]."</small>

  </div>
  <div class='card-body'>
      <p>".$commentFrom[$row][0]."</p>
  </div>

</div>

<br>";
}

for ($row = 3; $row < count($commentFrom); $row++) {
  echo "<div id='showMoreFrom' class='collapse p-15'><div class='card'>
  <div class='card-header'>

  <span class='badge badge-success'>+".$commentFrom[$row][1]." POINTS </span>
  <span class='badge badge-light'>".$commentFrom[$row][2]."</span>


  </div>
  <div class='card-body'>
      <p>".$commentFrom[$row][0]."</p>
  </div></div>

</div>";
}
if ($commentFromCounter > 3){
echo "  
<a href='#showMoreFrom' class='btn btn-dark' data-toggle='collapse'> show/hide all
  <span class='badge badge-success'  </span></a>
";}
} else {
  echo "<div class='card'>
  <div class='card-header'>
  </div>
  <div class='card-body'>
      <p>You haven't recieved any rate yet</p>
  </div>
</div>";
}
?>