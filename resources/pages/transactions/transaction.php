
<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

    //$transactionView = new Transaction();
    $userView = new User();
    $walletView = new Wallet();

    $email = $_SESSION["email"];

    $users = $userView->getAllUsersOption();
    $userMaxPoints = $walletView->userWalletAmount($email);
    
    
?>
<div class="card">
<div class="card-body">
<form action="<?php $request; ?>" method="POST">
<div class="form-row">
  <div class="form-group col-md-4 ">
      <label for="users">Select coworker:</label>
      <select class="form-control" id="users" name="emailto" required>
<?php foreach($users as $value){
    echo "<option value='".$value."'>".$userView->getUserName($value)."</option>";
} ?>
      </select>
    </div>
    <div class="form-group col-md-6">
    <label for="transactions">Leave comment: </label>
      <textarea class="form-control" rows="1" maxlength="200" name="transaction" id="transactions" required></textarea>
    </div>

    <div class="form-group col-md-2">
      <label for="quantity">Points left <?php echo $userMaxPoints; ?></label>
      <input type="number" placeholder="Give points" class="form-control" id="quantity" name="quantity" min="1" max="<?php echo $userMaxPoints; ?>" required>
    </div>
  </div>
    <button type="submit" class="btn btn-dark btn-block" name="new_transaction">Thank someone</button>

  </form>
</div>
<?php 
} else {
  toLoginPage();

}
  ?>
  </div>