<?php

//category_fetch.php

include('../database_connection.php');

include('../AddLogInclude.php');

include('../lang/fr-lang.php');
include('../lang/en-lang.php');



$colonne = array("modele_voiture", "nom_marque_voiture", "immatriculation_voiture", "etat_voiture","statut_voiture");

$query = '';

$output = array();

$query .= "
SELECT * 
FROM voiture 
INNER JOIN marque_voiture mv 
ON voiture.id_marque_voiture_fk_voiture = mv.id_marque_voiture 
";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE modele_voiture LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR immatriculation_voiture LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nom_marque_voiture LIKE "%'.$_POST["search"]["value"].'%" ';
}

// Filtrage dans le tableau
if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY modele_voiture DESC ';
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
    if ($_SESSION['lang'] == 'EN') {
		$statut_actif = STATUT_ACTIF_EN;
	} else {
		$statut_actif = STATUT_ACTIF_FR;
	}
	if ($_SESSION['lang'] == 'EN') {
		$statut_inactif = STATUT_INACTIF_EN;
	} else {
		$statut_inactif = STATUT_INACTIF_FR;
	}

	if ($_SESSION['lang'] == 'EN') {
		$etat_neuve = ETAT_NEUVE_EN;
	} else {
		$etat_neuve = ETAT_NEUVE_FR;
	}
	if ($_SESSION['lang'] == 'EN') {
		$etat_occasion = ETAT_OCCASION_EN;
	} else {
		$etat_occasion = ETAT_OCCASION_FR;
	}

	$etats = '';
	if($row['etat_voiture'] == 'Neuve')
	{
		$etats = '<center>'. $etat_neuve .'</center>';
	}
	else
	{
		$etats = '<center>'. $etat_occasion .'</center>';
	}

	$status = '';
	if($row['statut_voiture'] == 'Actif')
	{
		$status = '<center><span class="badge badge-primary">'. $statut_actif .'</span></center>';
	}
	else
	{
		$status = '<center><span class="badge badge-danger">'. $statut_inactif .'</span></center>';
	}
	$sub_array = array();
	//$sub_array[] = $row['id_voiture'];
	$sub_array[] = $row['modele_voiture'];
	$sub_array[] = $row['nom_marque_voiture'];
	$sub_array[] = $row['immatriculation_voiture'];
	$sub_array[] = $etats;
	$sub_array[] =$status;
	
	if ($_SESSION['lang'] == 'EN') {
		$consulter = BOUTON_CONSULTER_EN;
	} else {
		$consulter = BOUTON_CONSULTER_FR;
	}
	if ($_SESSION['lang'] == 'EN') {
		$modifier = BOUTON_MODIFIER_EN;
	} else {
		$modifier = BOUTON_MODIFIER_FR;
	}
	 if ($_SESSION['lang'] == 'EN') {
		$changer_statut = STATUT_EN;
	} else {
		$changer_statut = STATUT_FR;
	} 
			
	// Super Administrateur ==========================================================================================
	if($_SESSION['type_compte'] == '1')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_voiture"].'" href="#">'. $consulter . '</a>
        <a class="dropdown-item update" id="'.$row["id_voiture"].'" href="#">'. $modifier . '</a>
		<div class="dropdown-divider"></div>
        <a class="dropdown-item delete" id="'.$row["id_voiture"].'" href="#" data-status="'.$row["statut_voiture"].'">'. $changer_statut . '</a>
      </div>
    </div>
	
	
	</center>
	';
	}

	// Administrateur ==========================================================================================
	if($_SESSION['type_compte'] == '2')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_voiture"].'" href="#">'. $consulter . '</a>
        <a class="dropdown-item update" id="'.$row["id_voiture"].'" href="#">'. $modifier . '</a>
		<div class="dropdown-divider"></div>
        <a class="dropdown-item delete" id="'.$row["id_voiture"].'" href="#" data-status="'.$row["statut_voiture"].'">'. $changer_statut . '</a>
      </div>
    </div>
	
	
	</center>
	';
	}


	// Editeur ==========================================================================================
	if($_SESSION['type_compte'] == '3')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_voiture"].'" href="#">'. $consulter . '</a>
        <a class="dropdown-item update" id="'.$row["id_voiture"].'" href="#">'. $modifier . '</a>
      </div>
    </div>
	
	
	</center>
	';
	}


	// Auteur ==========================================================================================
	if($_SESSION['type_compte'] == '4')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_voiture"].'" href="#">'. $consulter . '</a>
      </div>
    </div>
	
	
	</center>
	';
	}


	// Lecteur ==========================================================================================
	if($_SESSION['type_compte'] == '5')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_voiture"].'" href="#">'. $consulter . '</a>
      </div>
    </div>
	
	
	</center>
	';
	}
	
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
	$statement = $connect->prepare("
    SELECT * 
    FROM voiture 
    INNER JOIN marque_voiture mv on voiture.id_marque_voiture_fk_voiture = mv.id_marque_voiture 
    ");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>