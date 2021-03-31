<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require 'resources/pages/index.php';
        break;

    case '/profile' :
        require 'resources/pages/profile.php';
        break;

    case '/login' :
        require 'resources/pages/login.php';
        break;

    case '/register' :
        require 'resources/pages/register.php';
        break;

    case '/create-group' :
        require 'resources/pages/create-group.php';
        break;

    default :
        require 'resources/pages/404.php';
        break;
}

?>