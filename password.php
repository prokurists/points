<?php 
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_"; // Generating Password
$password = substr( str_shuffle( $chars ), 0, 8 );

echo $password;

?>