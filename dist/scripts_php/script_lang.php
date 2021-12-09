<?php

include('../database_connection.php');

include('../AddLogInclude.php');

$_SESSION['nom_promoteur'] = $_POST["nom_promoteur"];
$_SESSION['prenom_promoteur'] = $_POST["prenom_promoteur"];
$_SESSION['email_promoteur'] = $_POST["email_promoteur"];
$_SESSION['tel_promoteur'] = $_POST["tel_promoteur"];
$_SESSION['ville_promoteur'] = $_POST["ville_promoteur"];
$_SESSION['pays_promoteur'] = $_POST["pays_promoteur"];
$_SESSION['pass_promoteur'] = $_POST["pass_promoteur"];
$_SESSION['value'] = $_POST["value"];

$message = 'Bon';

echo $message;

?>