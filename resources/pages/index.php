<?php 
if(isset($_SESSION['loggedIn'])){
?>
Tu esi ielogojies

<?php } else { ?>


    <a href="/login" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Log in</a>
    <a href="/register" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Registration</a>
    <a href="/create-group" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Create group</a>

    
<?php } ?>