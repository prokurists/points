<div class="container w80">
<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["loggedIn"])){
    require_once("from_comments.php");
    echo "<hr>";
    require_once("to_comments.php");

?>
</div>
<?php }else{
    toLoginPage();
} ?>