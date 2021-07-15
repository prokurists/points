<?php 
session_start();

require_once 'classes/autoload.php';
require_once 'core/controller.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Points system</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/resources/style/css/style.css">
  <link rel="apple-touch-icon" sizes="57x57" href="/resources/style/images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/resources/style/images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/resources/style/images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/resources/style/images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/resources/style/images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/resources/style/images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/resources/style/images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/resources/style/images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/resources/style/images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/resources/style/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/resources/style/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/resources/style/images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/resources/style/images/favicon-16x16.png">
<link rel="manifest" href="/resources/style/images/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/resources/style/images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
</head>
  <body>
  <?php require __DIR__ . '/resources/navi.php';?>

      <?php require __DIR__ . '/resources/main.php';?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>
