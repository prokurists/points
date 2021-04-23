




<div class="container w80">
<?php

  $topUsers = new User();
  $usersList = $topUsers->getTopUser($_SESSION["groupName"]);

 

  for ($row = 0; $row < 3; $row++) {
      if ($row === 0){
        $rowNr = 1;
      } elseif ($row === 1){
        $rowNr = 2;
      } else{
        $rowNr = 3;
      }
      echo "<div class='card'>
      <div class='card-body'>
      <div class='row'>
      <div class='col-sm-6'><h1>".$rowNr."</h1></div>
      <div class='col-sm-2'>".$usersList[$row][1]." POINTS</div>
      <div class='col-sm-4'>".$usersList[$row][0]."</div>
    
    </div></div></div>";
    

  }

?>

</div>