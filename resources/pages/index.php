<?php 
if(isset($_SESSION['loggedIn'])){
require "transactions.php";
?>

<?php }else{ require "login.php";} ?>