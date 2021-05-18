<div class="container w80">

<?php

  $users = new User();
  $usersList = $users->getAllUsers($_SESSION["groupName"]);

  $transactions = new Transaction();

  echo "<div class='card p-3 mb-3 text-center'>";
  echo "<h2> ".date("F", strtotime($lastMonth))." results</h2>";
  echo "</div>";
 

  for ($row = 0; $row < count($usersList); $row++) {
      $points = 0;
      $transactionUsersList = $transactions->getTopUserTransactions($usersList[$row], $lastMonth);
      $transactionTotalPoints = $transactions->getTotalPoints($usersList[$row], $lastMonth);

      echo "
      <div class='card'>
      <div class='card-body'>
      <div class='row'>
      <div class='col-sm-4 center'>".$users->getUserName($usersList[$row])."<br>
      <h1 center>".$transactionTotalPoints."</h1>
      </div><div class='col-sm'><ul class='list-group list-group-flush'>";
      for ($col = 0; $col < count($transactionUsersList); $col++){
      echo "<li class='list-group-item'>".$transactionUsersList[$col]."</li>";

    }


    echo "</ul></div></div></div></div><br>";

  }



?>

</div>