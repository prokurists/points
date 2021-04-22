<br>
<?php
$commentView = new Comment();
$commentFrom = $commentView->showFromComments($_SESSION["email"]);

if (!EMPTY($commentFrom)){
  
for ($row = 0; $row < count($commentFrom); $row++) {
  echo "<div class='card'>
  <div class='card-header'>
  <span class='badge badge-success'>+".$commentFrom[$row][1]." POINTS</span>
  </div>
  <div class='card-body'>
      <p>".$commentFrom[$row][0]."</p>
  </div>
</div>";
}}else {
  echo "<div class='card'>
  <div class='card-header'>
  </div>
  <div class='card-body'>
      <p>You haven't recieved any rate yet</p>
  </div>
</div>";
}
?>