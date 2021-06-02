<?php

switch ($request) {
    case '/' :
        require  'resources/pages/index.php';
        break;

    case '/login' :
        require  'resources/pages/login.php';
        break;

    case '/group_settings' :
        require 'resources/pages/group.php';
        break;

    case '/transaction' :
        require 'resources/pages/transactions/transaction.php';
        break;

    case '/profile' :
        require  'resources/pages/transactions/transaction_history.php';
        break;
        
        case '/statistics' :
            require 'resources/pages/statistics.php';
            break;

        case '/logout' :
            session_unset();
            header("Refresh: 0; URL=/");
        break;

        case '/register'.'/'.$regKey:
            require 'resources/pages/register.php';
            echo $_SERVER['REQUEST_URI'];

            break;

        default :
            require  'resources/pages/404.php';
            break;
}

?>