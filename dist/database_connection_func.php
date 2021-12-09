<?php
//database_connection.php

$conx = new PDO('mysql:host=localhost;dbname=hotel', 'root', ''/*,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]*/);
$conx->exec('SET NAMES utf8');

?>