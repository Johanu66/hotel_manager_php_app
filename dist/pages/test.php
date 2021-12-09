<?php
include('../database_connection.php');
require_once('utils.php');
$query = "SELECT nom_soins_spa FROM soins_spa WHERE id_soins_spa = '3'";
$result = ExecuteQuery($query);
var_dump($result);

$nom = json_decode($result[0]['nom_soins_spa'], true);
echo '<br>' . gettype($nom['Ali']);
