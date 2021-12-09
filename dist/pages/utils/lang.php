<?php
// "utils.php"
// Description
// Ce fichier contient des constantes et fonctions:
// - de connexion, de vérification des droits d'accès, et de redirection:
//   URL_PAGE_CONNEXION URL_TABLEAU_DE_BORD IsConnected() IsNotConnected() IsAllowed() IsNotAllowed()
//   Redirect() RedirectIfNotConnected() RedirectIfNotAllowed()
// - de formatage:
//   th() FormatDatetime() ToolTip() ContenuToolTipAcces() ContenuToolTipAccesSauf()
// - liées à l'interaction avec la base de données:
//   Insert() ExecuteQuery() CountRow() CustomCountRow() FormatConditions() FetchRow() 
// - concernant les logs:
//   LABEL_LOG_CONS  LABEL_LOG_ADD  LABEL_LOG_INFO
//   FormatLogCode() RawLog() NewLog() LogCons() LogAdd() LogInfo() 
// Elle contient également les fonction:
//   LoadDictionary()
// 
// 
// TODO: ArrayToHtmlTable() et Print_Array()
// 

// --------------------------------- IMPORT ----------------------------------
include_once('../lang/lang.php');
// --------------------- CONSTANTS & VARIABLES & CLASSES ---------------------
// -------------------------- FUNCTIONS DECLARATION --------------------------
// importe les constantes langues appropriées et retourne le chemin d'accès du fichier importé
// Si elle ne trouve pas de session c-a-d en cas d'échec, elle retourne null
// FR est la langue par défaut
// TODO: Gérer le menu
// function LoadDictionary($menu) {
//     if (!isset($_SESSION)) {return null;} // est-ce nécessaire?
//     if (!isset($_SESSION['lang'])) {
//         $_SESSION['lang'] == 'FR';
//     }

//     $contenu = DICTIONNAIRE[$_SESSION['lang']][$menu];
//     // foreach ($contenu as $key => $value) {
//     //     define($key, $value);
//     // }
//     foreach ($contenu as $key => $value) {
//         $GLOBALS[${$key}] = $value;
//     }
// }



