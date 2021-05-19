<?php 
//Allow to see Group info and set values if you are group master
    if (isset($_SESSION["groupMaster"])){

    $xGroup = new Group();
    $xWallet = new Wallet();
    $xUser = new User();
         
    $vall = $xGroup->showWalletAmount();
    $linkReg = $xGroup->getGroupExValue($_SESSION["email"]);
    $getAllUsers = $xWallet->showAllUserWallet($_SESSION["adminGroupName"]);


    ?>
    <div class="container w80 card p-5">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>User</th>
        <th>Wallet</th>
        <th>Gift</th>
      </tr>
    </thead>
    <tbody>
<?php
  for ($row = 0; $row < count($getAllUsers); $row++){
        echo "
        <tr>
        <td>".$xUser->getUserName($getAllUsers[$row][0])."</td>
        <td>".$getAllUsers[$row][1]."</td>
        <td>".$getAllUsers[$row][2]."</td>
      </tr>";
    }
    ?>
        </tbody>
  </table>


<hr>
<label for="linkreg">Your group invite link:</label>

    <input type="text" name="linkreg" class="form-control form-control" value="https://<?php echo $_SERVER['HTTP_HOST']."/register?key=". $linkReg; ?>">
    <hr>
    <form action="<?php echo $request;?>" method="POST" name="setWallet">
  <label for="quantity">Your group wallet value:</label>
  <input type="number" id="quantity" value="<?php echo $vall; ?>" name="quantity" min="10" max="100">
  <input type="submit" class="btn btn-dark" value="setWallet" name="setWallet">
</form>
</div>
</div>
<?php 
    } else {
        echo "You have no permissions to look this directory. Only Admins can look here.";

    }