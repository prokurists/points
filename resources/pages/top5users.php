
<div class="container w80">
<?php

  $showGroupResults = new Group();


  if ($showGroupResults->showGroupResults($_SESSION["email"])){


  $topUsers = new User();
  $usersList = $topUsers->getTopUser($_SESSION["groupName"]);

  $topUsersComments = new Comment();

 

  for ($row = 0; $row < count($usersList); $row++) {

      $commentUsersList = $topUsersComments->getTopUserComments($usersList[$row][2]);


      echo "
      <div class='card'>
      <div class='card-body'>
      <div class='row'>
      <div class='col'>Points: ".$usersList[$row][1]."</div>
      <div class='col'>User: ".$usersList[$row][0]."</div><div class='col'><ul class='list-group list-group-flush'>";
      for ($col = 0; $col < count($commentUsersList); $col++){
      echo "<li class='list-group-item'>".$commentUsersList[$col]."</li>";

    } echo "</ul></div></div></div></div><br>";
  }


}else{
  echo "You need to wait for admin to see results.";
}
if (isset($_SESSION["groupMaster"])){
  echo "<div class='col'>
  <form action='/topusers' method='POST'>
  <button type='submit' class='btn btn-dark btn-block' name='showGroupResults'>Show/Hide Group Results</button>
  </form>   ";}
?>

</div>