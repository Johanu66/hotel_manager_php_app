<?php
include('../database_connection.php');

// return $_POST;

if (isset($_POST['action'])) {
    switch($_POST['action']){
    case "fetch_options":
        echo json_encode(get_service_conf_list());
        exit;
    }
}

function get_service_conf_list() {
    $query = "SELECT id_service_conf, nom_service_conf FROM service_conf
    WHERE statut_service_conf = 'Actif'
    ORDER BY nom_service_conf ASC
	";
    global $connect;
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = [];
    foreach($result as $row)
    {
        $output[] = [$row["id_service_conf"], $row["nom_service_conf"]];
    }
    return $output;
}
