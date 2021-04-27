<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

    //$transactionView = new Transaction();
    $userView = new User();

    $users = $userView->getAllUsersOption();
    $userMaxPoints = $userView->userStartingPoints();
    
    
?>
<div class="card">
<div class="card-body">
<form action="<?php $request; ?>" method="POST">
    <div class="form-group">
      <label for="sel1">Select coworker:</label>
      <select class="form-control" id="sel1" name="emailto">
<?php foreach($users as $value){
    echo "<option value='".$value."'>".$userView->getUserName($value)."</option>";
} ?>
      </select>
      <br>
      <label for="quantity">Points given:</label>
      <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $userMaxPoints; ?>">
      <span class="badge badge-warning">Points left <?php echo $userMaxPoints; ?></span>

      <br>
      <label for="transaction">Transaction:</label>
  <textarea class="form-control" rows="1" name="transaction"></textarea>
    </div>
    <button type="submit" class="btn btn-dark" name="new_transaction">Submit</button>

  </form>


  </div>
  </div>
<?php 
} else {
  toLoginPage();

}
  ?>