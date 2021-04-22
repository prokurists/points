<br>
<?php
$commentView = new Comment();
$commentTo = $commentView->showToComments($_SESSION["email"]);

if (!EMPTY($commentTo)){
for ($row = 0; $row < count($commentTo); $row++) {
  echo "<div class='card'>
  <div class='card-header'>
  <span class='badge badge-danger'>-".$commentTo[$row][1]." POINTS</span>
  </div>
  <div class='card-body'>
      <p>".$commentTo[$row][0]."</p>
  </div>
</div>";
}} else {
  echo "<div class='card'>
  <div class='card-header'>
  </div>
  <div class='card-body'>
      <p>You haven't rated anyone yet</p>
      <a href='/new_comment'>Rate now</a>
  </div>
</div>";

}
?>