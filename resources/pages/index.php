<?php 
if(isset($_SESSION['loggedIn'])){
require "comments.php";
?>

<?php }else{ require "login.php";} ?>