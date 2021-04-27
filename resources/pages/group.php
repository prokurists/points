<?php 
//Allow to see Group info and set values if you are group master
    if (isset($_SESSION["groupMaster"])){

    $groupView = new Group();
    $usersView = new User();
    $usersList = array();
    
    $usersEmailList = $groupView->showGroupUsersList();
    foreach ($usersEmailList as $value){
        array_push($usersList, $usersView->getAllUsersData($value))  ;
    }
    
    
    $vall = $usersView->showWalletAmount();
    $linkReg = $groupView->getGroupExValue($_SESSION["email"]);


    ?>
    <div class="container w80">
    <div class="table-responsive">

    <table class="table table-hover">
        <thead class='thead-dark'>
          <tr>
            <th scope='col'>Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Wallet</th>
            <th scope='col'>Gift</th>
          </tr>
        </thead><tbody>
<?php
for ($row = 0; $row < count($usersList); $row++) {
    $usr = 0;
    $usr+1;
    echo "<tr>";

    for ($col = 0; $col < 4; $col++) {
        
      echo "<td>".$usersList[$row][$usr][$col]."</td>";


    }
    echo "</tr>";
  
}

 ?>

        </tbody>
</table></div>

<hr>
<label for="linkreg">Your group invite link:</label>

    <input type="text" name="linkreg" class="form-control form-control" value="https://<?php echo $_SERVER['HTTP_HOST']."/register?key=". $linkReg; ?>">
    <hr>
    <form action="<?php echo $request;?>" method="POST" name="setWallet">
  <label for="quantity">Your group wallet value:</label>
  <input type="number" id="quantity" value="<?php echo $vall; ?>" name="quantity" min="10" max="100">
  <input type="submit" class="btn btn-dark" value="setWallet" name="setWallet">
</form>
<HR>
<div class="row">


<div class="col">
<form action="<?php echo $request; ?>" method="POST">
<button type="submit" class="btn btn-dark btn-block" name="resetGift">Reset gift</button>
</form>
</div>

<div class="col">
<form action="<?php echo $request; ?>" method="POST">
<button type="submit" class="btn btn-dark btn-block" name="resetWallet">Reset wallet</button>
</form>
</div>
<div class="col">
<form action="<?php echo $request; ?>" method="POST">
<button type="submit" class="btn btn-dark btn-block" name="resettransaction">Reset transactions</button>
</form>




</div>
</div>
</div>
<?php 
    } else {
        echo "You have no permissions to look this directory. Only Admins can look here.";

    }