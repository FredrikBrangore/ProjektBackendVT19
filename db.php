<?php 
/**********************************************
 *       db.php
 *       Skriptet skapar en databasuppkoppling
 *       med PDO (PHP Data Object)
 **********************************************/

$server   = "localhost";
$username = "root";
$database = "comicbookstore";

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 

}
catch(PDOException $e){
    echo $e-> getMessage();
}