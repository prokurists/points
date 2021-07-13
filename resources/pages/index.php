<?php 
if(isset($_SESSION['loggedIn'])){

require __DIR__."/transactions.php";
?>

<?php }else{ require __DIR__."/login.php";} ?>