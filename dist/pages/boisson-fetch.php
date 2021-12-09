<?php

//category_fetch.php

include('../database_connection.php');

include('../AddLogInclude.php');

include('../lang/fr-lang.php');
include('../lang/en-lang.php');



$colonne = array("id_boisson","lib_boisson", "desc_boisson","prix_unite_boisson","statut_boisson");

$query = '';

$output = array();

$query .= "
SELECT * 
FROM boisson  
";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE lib_boisson LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR desc_boisson LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR prix_unite_boisson LIKE "%'.$_POST["search"]["value"].'%" ';
}

// Filtrage dans le tableau
if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id_boisson DESC ';
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

	$status = '';
	if($row['statut_boisson'] == 'Actif')
	{
		$status = '<center><span class="badge badge-primary">'. $statut_actif .'</span></center>';
	}
	else
	{
		$status = '<center><span class="badge badge-danger">'. $statut_inactif .'</span></center>';
	}
	$sub_array = array();
	$sub_array[] = $row['id_boisson'];
	$sub_array[] = $row['lib_boisson'];
	$sub_array[] = $row['desc_boisson'];
	$sub_array[] = $row['prix_unite_boisson'];
	$sub_array[] = $status;
	
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
		$changer_statut = BOUTON_STATUT_EN;
	} else {
		$changer_statut = BOUTON_STATUT_FR;
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
        <a class="dropdown-item view" id="'.$row["id_boisson"].'" href="#">'. $consulter . '</a>
        <a class="dropdown-item update" id="'.$row["id_boisson"].'" href="#">'. $modifier . '</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item delete" id="'.$row["id_boisson"].'" href="#" data-status="'.$row["statut_boisson"].'">'. $changer_statut . '</a>
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
        <a class="dropdown-item view" id="'.$row["id_boisson"].'" href="#">'. $consulter . '</a>
        <a class="dropdown-item update" id="'.$row["id_boisson"].'" href="#">'. $modifier . '</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item delete" id="'.$row["id_boisson"].'" href="#" data-status="'.$row["statut_boisson"].'">'. $changer_statut . '</a>
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
        <a class="dropdown-item view" id="'.$row["id_boisson"].'" href="#">'. $consulter . '</a>
        <a class="dropdown-item update" id="'.$row["id_boisson"].'" href="#">'. $modifier . '</a>
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
        <a class="dropdown-item view" id="'.$row["id_boisson"].'" href="#">'. $consulter . '</a>
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
        <a class="dropdown-item view" id="'.$row["id_boisson"].'" href="#">'. $consulter . '</a>
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
    FROM boisson 
    ");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>