<div class="container w80">
<?php

  $topUsers = new User();
  $usersList = $topUsers->getTopUser($_SESSION["groupName"]);

  $topUsersTransactions = new Transaction();

 

  for ($row = 0; $row < count($usersList); $row++) {

      $transactionUsersList = $topUsersTransactions->getTopUserTransactions($usersList[$row][2], $lastMonth);


      echo "
      <div class='card'>
      <div class='card-body'>
      <div class='row'>
      <div class='col-sm-4 center'>Points: ".$usersList[$row][1]."<br>
      User: ".$usersList[$row][0]."<hr></div><div class='col-sm'><ul class='list-group list-group-flush'>";
      for ($col = 0; $col < count($transactionUsersList); $col++){
      echo "<li class='list-group-item'>".$transactionUsersList[$col]."</li>";

    } echo "</ul></div></div></div></div><br>";
  }



?>

</div>