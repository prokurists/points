<?php 
if(isset($_SESSION['loggedIn'])){
require_once("comments.php");
?>

<?php }else{ toLoginPage();} ?>