<?php
//stat-conf-action.php

include('../database_connection.php');

include('../scripts_php/fonctions_list.php');

// include('../AddLogInclude.php');
// include('../scripts_php/fonctions_sql.php');

// Langues
include_once('../lang/fr-lang.php');
include_once('../lang/en-lang.php');

// $_POST['action'] = "fill_top_service_addi";

if (isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'fill_top_service_addi':
            echo json_encode(fill_top_service_addi($_POST['periode']));
            break;
        case 'fill_top_client':
            echo json_encode(fill_top_client_conf($_POST['mode_selection'], $_POST['periode']));
            break;
        case 'fetch_general_chart':
            // echo json_encode('hi');
            echo json_encode(fetch_general_chart_conf($_POST['periode'], $_POST['salles'], $_POST['mode_selection']));
            break;
    }
}

