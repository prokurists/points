<?php 
session_start();

require_once 'classes/autoload.php';
require_once 'core/functions.php';


?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $pageTitle;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="/resources/style/css/style.css">
  <link rel="apple-touch-icon" sizes="180x180" href="resources/style/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="resources/style/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="resources/style/images/favicon-16x16.png">
<link rel="manifest" href="resources/style/images/site.webmanifest">
</head>
  <body>
      <?php require __DIR__ . '/resources/navi.php';?>

         <div class="jumbotron jumbotron-fluid">
         <?php require __DIR__ . '/resources/jumbo.php';?>
        </div>

      <div class="container-fluid">
          <?php require __DIR__ . '/resources/main.php';?>
      </div>

  <footer>
          <?php require __DIR__ . '/resources/footer.php';?>
  </footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
