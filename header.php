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
  <title>"Comicbooks"</title>
</head>
<body class="container" style="background-color:#ff69b4">
<h1 class="text-center m-3">
<a href="register.php" style="text-decoration: none;"><span style="border: 3px solid black; background-color:#fff">"Comicbook Store" School Project.</span></a>
</h1>
<h2 class="text-center m-2"><span style="border: 3px solid black; font-weight: bold; background-color:#fff">We only alow Gmail att this time!</span></h2>
