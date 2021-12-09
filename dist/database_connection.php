<?php
//database_connection.php

$connect = new PDO('mysql:host=localhost;dbname=hotel', 'root', '' );//,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$connect->exec('SET NAMES utf8');

session_start();

?>