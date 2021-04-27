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

    case '/transaction_history' :
        require  'resources/pages/transactions/transaction_history.php';
        break;
        
        case '/statistics' :
            require 'resources/pages/statistics.php';
            break;

        case '/logout' :
            session_unset();
            header("Refresh: 0; URL=/");
        break;

        case '/register' AND $regKey :
            require 'resources/pages/register.php';
            break;

        default :
            require  'resources/pages/404.php';
            break;
}

?>