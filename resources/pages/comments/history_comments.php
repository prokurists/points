<?php  
//Allow to see content only if you are logged in
if (isset($_SESSION["loggedIn"])){
        echo "Last month history";

}else{
    toLoginPage();
} ?>