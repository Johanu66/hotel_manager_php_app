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
include_once('utils/lang.php');
include_once('utils/redirect.php');
include_once('utils/format.php');
include_once('utils/db.php');
include_once('utils/log.php');

// --------------------- CONSTANTS & VARIABLES & CLASSES ---------------------
// -------------------------- FUNCTIONS DECLARATION --------------------------



// TO DO...
function ArrayToHtmlTable($arr) {
    $table = '<table>';
    foreach($arr as $key => $value) {
        $table .= '<tr>';
        $table .= '<th >' . $key . '</th>';
        if (gettype($value) === 'array') {
            $table .= '<td>' . ArrayToHtmlTable($value) . '</td>';
        } else {
            $table .= '<td>' . $value . '</td>';
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    return $table;
}
function array_print($arr){
    $table = '<table style="border:1px solid black;">';
    foreach($arr as $key => $value) {
        $table .= '<tr>';
        $table .= '<th style="vertical-align:top">' . $key . '</th>';
        if (gettype($value) === 'array') {
            $table .= '<td>' . array_print($value) . '</td>';
        } else {
            $table .= '<td>' . $value . '</td>';
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    echo $table;
}
