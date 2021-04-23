<div class="container w80">
<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["loggedIn"])){
    echo "<span class='badge badge-secondary'>Transactions recieved: </span>";
    require __DIR__."/from_comments.php";
    echo "<hr><span class='badge badge-secondary'>Transactions sent: </span>";
    require __DIR__."/to_comments.php";

?>
</div>
<?php }else{
    toLoginPage();
} ?>