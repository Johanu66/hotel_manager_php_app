<?php
// "log.php"
// Description
// Ce fichier contient des constantes et fonctions concernant les logs:
// LABEL_LOG_CONS LABEL_LOG_ADD LABEL_LOG_INFO
// FormatLogCode() RawLog() NewLog() LogCons() LogAdd() LogInfo() 
// Ce fichier est importé dans "utils.php"
// TODO: les LABEL_LOG - dans FormatLogCode() - dans RawLog() - fonctions pour afficher les logs

// --------------------------------- IMPORT ----------------------------------
require_once('db.php');

// --------------------- CONSTANTS & VARIABLES & CLASSES ---------------------
// Ces labelspeuvent-ils varier en fonction de la langue?
const LABEL_LOG_CONS  = 'Cons';  // Consultation d'une page
const LABEL_LOG_ADD   = 'Enr';   // Enregistrement d'un nouvel élément
const LABEL_LOG_INFO  = 'Info';  // Affichage des infos d'un élement
const LABEL_LOG_MODIF = 'Modif'; // Modification des infos d'un élement
const LABEL_LOG_PRIX  = 'Prix';  // Indiquer le prix d'un élement

// -------------------------- FUNCTIONS DECLARATION --------------------------
// TODO: D'où vient le format du code?
function FormatLogCode($log_type, $menu, $type_compte) /* :string */ {
    // remplacer "_" par "-" dans $menu?? Il vaut mieux le garder tel
    // "Cons-01-location_conf"
    // "Cons-01-location-conf"
    return $log_type . '-0' . $type_compte . '-' . $menu;
}

// RawLog() insère un log dans la base de données. Les infos insérées sont:
// la date, l'heure, le code, les paramètres de l'évenement, le pseudo de l'utilisateur,
// son id_compte, son adresse IP
// TODO: id_compte clé étrangère
function RawLog($log_type, $menu, $type_compte, $id_compte, $pseudo, $args=[]) /* :string|null */ {
    $date = gmdate("Y-m-d");
    $heure = gmdate("H:i:s");
    $code = FormatLogCode($log_type, $menu, $type_compte);
    $params = json_encode($args); // remember htmlspecialchars quand il faudra l'afficher
    $ip_address = getenv("REMOTE_ADDR");

    $id_log = Insert("addlog_table", [
        'DateEvenement'         =>  $date,
        'HeureEvenement'        =>  $heure,
        'CodeEvenement'         =>  $code,
        'ParametresEvenement'   =>  $params,
        'PseudoUtilisateur'     =>  $pseudo,
        'IdCompte'              =>  $id_compte,
        'AdresseIP'             =>  $ip_address,
    ]
    // , true
    );

    return $id_log;
}

// NewLog() insère un log du type $log_type, du menu $menu et avec les paramètres $args
// Retourne $id_log
function NewLog($log_type, $menu, $args=[]) /* :string|null */ {
    $pseudo = addslashes($_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
    return RawLog($log_type, $menu, $_SESSION['type_compte'], $_SESSION['id_compte'], $pseudo, $args);
}

// Log de la consultation d'une page (de la consultation du menu $menu)
// Retourne $id_log
function LogCons($menu, $args=[]) /* :string|null */ {
    return NewLog(LABEL_LOG_CONS, $menu, $args);
}

// Log d'un ajout d'un élément dand le menu $menu
// Retourne $id_log
function LogAdd($menu, $args=[]) /* :string|null */ {
    return NewLog(LABEL_LOG_ADD, $menu, $args);
}

// Log de la consultation des infos d'un élement du menu $menu
// Retourne $id_log
function LogInfo($menu, $args=[]) /* :string|null */ {
    return NewLog(LABEL_LOG_INFO, $menu, $args);
}

// Log de la modification d'un élement du menu $menu
// Retourne $id_log
function LogModif($menu, $args=[]) /* :string|null */ {
    return NewLog(LABEL_LOG_MODIF, $menu, $args);
}


// Log de "indiquer le prix" d'un élement du menu $menu
// Retourne $id_log
function LogPrix($menu, $args=[]) /* :string|null */ {
    return NewLog(LABEL_LOG_PRIX, $menu, $args);
}

// TODO: fonctions pour afficher les logs dans le menu journaux
