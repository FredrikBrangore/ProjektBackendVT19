<?php
/**********************************************
 *       header.php
 *       Sidhuvud, inkluderas högst upp på alla 
 *       sidor som har en view (HTML-kod)
 **********************************************/

// Visa felmeddelanden vid development
// Ta bort dessa rader vid production
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);
  // include 'debug.php';
  
  //Lånade denna kod från Mahmud.
?>
<!doctype html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/sketchy/bootstrap.min.css">
  <title>Serie Butiken</title>
</head>
<body class="container">
<h1 class="text-center">
<a href="index.php">Serie Butiken</a>
</h1>