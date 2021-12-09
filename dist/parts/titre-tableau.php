<?php

// Langues
include_once('../lang/fr-lang.php');
include_once('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $titre_tableau = TABLEAU_DONNEES_EN;
} else {
    $titre_tableau = TABLEAU_DONNEES_FR;
}

?>
<h4><?= $titre_tableau ?></h4>