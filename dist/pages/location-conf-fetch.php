<?php
include('../database_connection.php');
include('../AddLogInclude.php');

include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $oui = OUI_EN;
    $non = NON_EN;
	$annule = ANNULE_EN;
    $prix_non_indiqué = PRIX_NON_INDIQUE_EN;
    $consulter = BOUTON_CONSULTER_EN;
    $modifier = BOUTON_MODIFIER_EN;
    $supprimer = SUPPRIMER_EN;
    $new_facture = NOUVELLE_FACTURE_EN;
    $view_facture = AFFICHER_FACTURE_EN;
    $edit_facture = MODIFIER_FACTURE_EN;
    $indiquer_le_prix = INDIQUER_LE_PRIX_EN;
    $MONTHS_SHORT = MONTHS_SHORT_EN;
} else {
    $oui = OUI_FR;
    $non = NON_FR;
	$annule = ANNULE_FR;
    $prix_non_indiqué = PRIX_NON_INDIQUE_FR;
    $consulter = BOUTON_CONSULTER_FR;
    $modifier = BOUTON_MODIFIER_FR;
    $supprimer = SUPPRIMER_FR;
    $new_facture = NOUVELLE_FACTURE_FR;
    $view_facture = AFFICHER_FACTURE_FR;
    $edit_facture = MODIFIER_FACTURE_FR;
    $indiquer_le_prix = INDIQUER_LE_PRIX_FR;
    $MONTHS_SHORT = MONTHS_SHORT_FR;
}

// $debut et $fin sont des strings
function dateDiff($debut, $fin){
    $debut = date_create($debut);
    $fin = date_create($fin);
    if ($fin <= $debut) {
        return '0';
    }
    return date_diff($debut, $fin) -> format('%a') + 1; //par défaut vs par excès
}

function formatDatetime($datetime, $lang) {
    $datetime = strtotime($datetime);
    $day = date('d', $datetime);
    $month = date('m', $datetime);
    $year = date('Y', $datetime);
    $hour_12 = date('h', $datetime);
    $hour_24 = date('H', $datetime);
    $min = date('i', $datetime);
    // $sec = date('s', $datetime);
    global $MONTHS_SHORT;

    $format_fr = '%s %s %s à %sh%s';
    $format_en = '%s %s %s at %s:%s %s';
    if ($lang == 'FR') {
        return sprintf($format_fr, $day, $MONTHS_SHORT[(integer) $month], $year, $hour_24, $min);
    } else if ($lang == 'EN') {
        $suffix = 'AM';
        if ((integer) $hour_24 >= 12) {
            $suffix = 'PM';
        }
        return sprintf($format_en, $MONTHS_SHORT[(integer) $month], $day, $year, $hour_12, $min, $suffix);
    }
    return '';
}

// noms des colonnes dans l'ordre
$colonne = array("nom_salle_conf", "date_debut_location_conf", "date_fin_location_conf", "duree",
    "nom_personne", "motif_location_conf", "prix_location_conf", "services_addi", "facture_location_conf"
);

$query = '';
$output = array();

$main_query = "SELECT id_location_conf, nom_salle_conf, date_debut_location_conf, date_fin_location_conf,
    (DATEDIFF(date_fin_location_conf, date_debut_location_conf) + 1) AS duree,
    motif_location_conf, prix_location_conf, facture_location_conf, statut_location_conf,
    nom_personne, prenom_personne
    FROM location_conf, salle_conf, client, personne
    WHERE location_conf.id_salle_conf_fk_location_conf = salle_conf.id_salle_conf
    AND location_conf.id_client_fk_location_conf = client.id_client
    AND client.id_personne_fk_client = personne.id_personne
    AND statut_location_conf = 'Actif'
";
$query .= $main_query;

if(isset($_POST["search"]["value"]))
{
	$query .= 'AND (nom_salle_conf LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nom_personne LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR prenom_personne LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR date_debut_location_conf LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR date_fin_location_conf LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR duree LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR motif_location_conf LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR facture_location_conf LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR prix_location_conf LIKE "%'.$_POST["search"]["value"].'%" )';	
}

// order by duree - by prix - by service - by facture : À FAIRE
// Filtrage dans le tableau
if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY date_create_location_conf DESC ';
}

if($_POST['length'] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row['nom_salle_conf'];
    
	$sub_array[] = formatDatetime($row['date_debut_location_conf'], $_SESSION['lang']);
	$sub_array[] = formatDatetime($row['date_fin_location_conf'], $_SESSION['lang']);

    // duree(en jours)
    // $duree = dateDiff($row['date_debut_location_conf'], $row['date_fin_location_conf']);
    $duree = $row['duree'];
    $sub_array[] = $duree;

    // client
    $client = $row['nom_personne']. ' ' .$row['prenom_personne'];
    $sub_array[] = $client;

	$sub_array[] = $row['motif_location_conf'];

    // prix_ht
    if ($row['prix_location_conf'] == null) {
        $prix_null = true;
        $prix = '<td><td><center><span class="badge badge-warning">' . $prix_non_indiqué . '</span></center></td></td>';
    } else {
        $prix_null = false;
        $prix = $row['prix_location_conf'];
    }
	$sub_array[] = $prix;

    //services additionnels
    $query0 = "SELECT COUNT(id_location_conf_fk_assoc_location_conf_and_service_conf)
        FROM assoc_location_conf_and_service_conf
        WHERE id_location_conf_fk_assoc_location_conf_and_service_conf = :id_location
    ";
    $statement0 = $connect->prepare($query0);
    $statement0->execute(
        array(
            ":id_location"  =>  $row['id_location_conf']
        )
    );
    $result0 = $statement0->fetchAll();

    foreach($result0 as $row0) {
        $count0 = $row0[0];
    }

    if($count0 > 0) {
        $services_addi = '<center><span class="badge badge-primary">'. $oui .'</span></center>';
    } else {
        $services_addi = '<center><span class="badge badge-danger">'. $non .'</span></center>';
    }
    $sub_array[] = $services_addi;


    //facture
    if($row['facture_location_conf'] == 'Oui') {
        $facture_exist = true;
        $facture = '<center><span class="badge badge-primary">'. $oui .'</span></center>';
    } else if ($row['facture_location_conf'] == 'Annulé') {
        $facture_exist = true;
        $facture = '<center><span class="badge badge-warning">'. $annule .'</span></center>';
    } else {
        $facture_exist = false;
        $facture = '<center><span class="badge badge-danger">'. $non .'</span></center>';
    }
    $sub_array[] = $facture;

    $bouton_consulter       =   '<a class="dropdown-item view" id="'.$row["id_location_conf"].'" href="#" title="Accès: Tous les rôles">'. $consulter . '</a>';
    $bouton_modifier        =   '<a class="dropdown-item update" id="'.$row["id_location_conf"].'" href="#" title="Accès: Super Administrateur, Administrateur et Editeur">'. $modifier . '</a>';
    $bouton_supprimer       =   '<a class="dropdown-item delete" id="'.$row["id_location_conf"].'" href="#" title="Accès: Super Administrateur et Administrateur">'. $supprimer . '</a>';
    $bouton_new_facture     =   '<a class="dropdown-item new_facture" id="'.$row["id_location_conf"].'" href="#" title="Accès: Tous les rôles sauf lecteur">'. $new_facture . '</a>';
    $bouton_view_facture    =   '<a class="dropdown-item view_facture" id="'.$row["id_location_conf"].'" href="#" title="Accès: Tous les rôles">'. $view_facture . '</a>';
    $bouton_indiquer_prix   =   '<a class="dropdown-item indiquer_prix" id="'.$row["id_location_conf"].'" href="#" title="Accès: Tous les rôles sauf lecteur">'. $indiquer_le_prix . '</a>';   
    $dropdown_divider       =   '<div class="dropdown-divider"></div>';

    $actions = '
        <center>
            <div class="btn-group">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu">
    ';

    // Super Administrateur ==========================================================================================
	if($_SESSION['type_compte'] == '1')
	{
        $actions .= $bouton_consulter;
        switch(true) {
        case $prix_null:
            $actions .= $bouton_indiquer_prix . $bouton_modifier . $dropdown_divider . $bouton_supprimer;
            break;
        case $facture_exist:
            $actions .= $dropdown_divider . $bouton_view_facture;
            break;
        default:
            $actions .= $bouton_modifier . $dropdown_divider . $bouton_supprimer . $dropdown_divider . $bouton_new_facture;
            break;
        }

	}

    // Administrateur ==========================================================================================
	if($_SESSION['type_compte'] == '2')
	{
        $actions .= $bouton_consulter;
        switch(true) {
        case $prix_null:
            $actions .= $bouton_indiquer_prix . $bouton_modifier . $dropdown_divider . $bouton_supprimer;
            break;
        case $facture_exist:
            $actions .= $dropdown_divider . $bouton_view_facture;
            break;
        default:
            $actions .= $bouton_modifier . $dropdown_divider . $bouton_supprimer . $dropdown_divider . $bouton_new_facture;
            break;
        }
	}

	// Editeur ==========================================================================================
	if($_SESSION['type_compte'] == '3')
	{
        $actions .= $bouton_consulter;
        switch(true) {
        case $prix_null:
            $actions .= $bouton_indiquer_prix . $bouton_modifier;
            break;
        case $facture_exist:
            $actions .= $dropdown_divider . $bouton_view_facture;
            break;
        default:
            $actions .= $bouton_modifier . $dropdown_divider . $bouton_new_facture;
            break;
        }
	}

	// Auteur ==========================================================================================
	if($_SESSION['type_compte'] == '4')
	{
        $actions .= $bouton_consulter;
        switch(true) {
        case $prix_null:
            $actions .= $bouton_indiquer_prix;
            break;
        case $facture_exist:
            $actions .= $dropdown_divider . $bouton_view_facture;
            break;
        default:
            $actions .= $dropdown_divider . $bouton_new_facture;
            break;
        }
	}

	// Lecteur ==========================================================================================
	if($_SESSION['type_compte'] == '5')
	{
        $actions .= $bouton_consulter . $dropdown_divider;
        if ($facture_exist) {
            $actions .= $bouton_view_facture;
        }
	}


    $actions .= '
                </div>
            </div>
        </center>
    ';
    $sub_array[] = $actions;
	

	$data[] = $sub_array;
}

$output = array(
	"draw"			=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"				=>	$data
);

function get_total_all_records($connect)
{
    global $main_query;
	$statement = $connect->prepare($main_query); // same query as above
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>