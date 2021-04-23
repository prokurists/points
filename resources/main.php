<?php

switch ($request) {
    case '/' :
        require  'resources/pages/index.php';
        break;

    case '/login' :
        require  'resources/pages/login.php';
        break;

    case '/group' :
        require 'resources/pages/group.php';
        break;

    case '/new_comment' :
        require 'resources/pages/comments/new_comment.php';
        break;

    case '/history_comments' :
        require  'resources/pages/comments/history_comments.php';
        break;

        case '/comments' :
        require 'resources/pages/comments.php';
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