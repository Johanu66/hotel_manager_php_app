<?php
//logout.php
include('../AddLogInclude.php');

session_start();

// Log


switch ($_SESSION['type_compte']) {

	case 1:
		addlog("Deconnex-01", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
		break;
	case 2:
		addlog("Deconnex-02", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
		break;
	case 3:
		addlog("Deconnex-03", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
		break;
	case 4:
		addlog("Deconnex-04", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
		break;
	case 5:
		addlog("Deconnex-05", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
		break;
}


session_destroy();

header("location:connexion.php");

?>