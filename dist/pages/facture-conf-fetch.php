<?php

//category_fetch.php

include('../database_connection.php');
include('../AddLogInclude.php');

include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $actif = STATUT_ACTIF_EN;
	$annule = ANNULE_EN;
    $MONTHS_SHORT = MONTHS_SHORT_EN;
} else {
    $actif = STATUT_ACTIF_FR;
	$annule = ANNULE_FR;
    $MONTHS_SHORT = MONTHS_SHORT_FR;
}

// formatter les dates
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
$colonne = array("num_facture_conf", "date_facture_conf", "nom_personne", "montant_ttc_facture_conf", "statut_facture_conf");

$query = '';

$output = array();

$query .= "SELECT * FROM facture_conf, location_conf, client, personne
WHERE facture_conf.id_location_conf_fk_facture_conf = location_conf.id_location_conf
AND location_conf.id_client_fk_location_conf = client.id_client
AND client.id_personne_fk_client = personne.id_personne
"; // changer

if(isset($_POST["search"]["value"]))
{	// changer les colonnes à rechercher
	$query .= 'AND (num_facture_conf LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR date_facture_conf LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nom_personne LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR prenom_personne LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR statut_facture_conf LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR montant_ttc_facture_conf LIKE "%'.$_POST["search"]["value"].'%") ';
}

// Filtrage dans le tableau
if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY date_facture_conf DESC ';
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
	$sub_array = array(); // tenir compte de l'ordre dansle tableau
	$sub_array[] = $row['num_facture_conf'];
	$sub_array[] = formatDatetime($row['date_facture_conf'], $_SESSION['lang']);
	$sub_array[] = $row['nom_personne']. ' ' .$row['prenom_personne'];
	$sub_array[] = $row['montant_ttc_facture_conf'];

	// statut
    if($row['statut_facture_conf'] == 'Actif') {
        $statut = '<center><span class="badge badge-primary">'. $actif .'</span></center>';
    } else {
        $statut = '<td><td><center><span class="badge badge-warning">' . $annule . '</span></center></td></td>';
    }
    $sub_array[] = $statut;
	

	if ($_SESSION['lang'] == 'EN') {
		$view_facture = AFFICHER_FACTURE_EN;
		$annule_facture = ANNULER_FACTURE_EN;
	} else {
		$view_facture = AFFICHER_FACTURE_FR;
		$annule_facture = ANNULER_FACTURE_FR;
	}

	$bouton_view_facture    =   '<a class="dropdown-item view_facture" id="'.$row["id_facture_conf"].'" href="#" title="Accès: Tous les rôles">'. $view_facture . '</a>';
    $bouton_annule_facture    =   '<a class="dropdown-item delete_facture" id="'.$row["id_facture_conf"].'" href="#" title="Accès: Super Administrateur uniquement">'. $annule_facture . '</a>';

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
		$actions .= $bouton_view_facture;
		if ($row['statut_facture_conf'] == 'Actif') {
			$actions .= $bouton_annule_facture;
		}
	}

    // Administrateur ==========================================================================================
	if($_SESSION['type_compte'] == '2')
	{
		$actions .= $bouton_view_facture;
	}

	// Editeur ==========================================================================================
	if($_SESSION['type_compte'] == '3')
	{
		$actions .= $bouton_view_facture;
	}

	// Auteur ==========================================================================================
	if($_SESSION['type_compte'] == '4')
	{
		$actions .= $bouton_view_facture;
	}

	// Lecteur ==========================================================================================
	if($_SESSION['type_compte'] == '5')
	{
		$actions .= $bouton_view_facture;
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
	$statement = $connect->prepare("SELECT * FROM facture_conf, location_conf, client, personne
	WHERE facture_conf.id_location_conf_fk_facture_conf = location_conf.id_location_conf
	AND location_conf.id_client_fk_location_conf = client.id_client
	AND client.id_personne_fk_client = personne.id_personne
	"); // same query as above
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>