<?php
// "lang.php"
// Description
// La constante DICTIONNAIRE contient les constantes langues de tous les menus de l'application
// et dans toutes les langues

// --------------------------------- IMPORT ----------------------------------
include_once 'lang-fr.php';
include_once 'lang-en.php';

// --------------------- CONSTANTS & VARIABLES & CLASSES ---------------------
// Le dictionnaire de toute l'application, dans toutes les langues
const DICTIONNAIRE =  [
    'EN'    =>  DICTIONNAIRE_EN, // voir lang-en.php
    'FR'    =>  DICTIONNAIRE_FR, // voir lang-fr.php
    // ainsi de suite
];

