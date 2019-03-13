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

// startar en session
session_start();

// Manipulerar session variabler

//Lånade denna kod delvis från Mahmud.
?>
<!doctype html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/sketchy/bootstrap.min.css">
  <title>"Comicbooks"</title>
</head>
<body class="container" style="background-color:#ff69b4; ">

<h1 class="text-center m-3 " style="text-decoration: none;"><span style="border: 3px solid black; background-color:#fff">"Comicbook Store" School Project.</span>
</h1>
