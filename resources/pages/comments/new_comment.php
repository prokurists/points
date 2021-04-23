<div class="container">
  <br>
<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["email"])){

    //$commentView = new Comment();
    $userView = new User();

    $users = $userView->getAllUsersOption();
    $userMaxPoints = $userView->userStartingPoints();
    
?>
<div class="card">
<div class="card-body">
<form action="/comments" method="POST" name="new_comment">
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
      <br>
      <label for="comment">Comment:</label>
  <textarea class="form-control" rows="1" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-dark" name="new_comment">Submit</button>

  </form>


  </div>
  </div></div></div>

<?php 
} else {
  toLoginPage();

}
  ?>