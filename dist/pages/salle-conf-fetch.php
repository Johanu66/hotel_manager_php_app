<?php

//category_fetch.php

include('../database_connection.php');
include('../AddLogInclude.php');

include('../lang/fr-lang.php');
include('../lang/en-lang.php');


$colonne = array("nom_salle_conf", "desc_salle_conf", "capacite_salle_conf");

$query = '';

$output = array();

$main_query = "SELECT * FROM salle_conf ";
$query .= $main_query;


if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nom_salle_conf LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR desc_salle_conf LIKE "%'.$_POST["search"]["value"].'%" ';	
	$query .= 'OR capacite_salle_conf LIKE "%'.$_POST["search"]["value"].'%" ';
}

// Filtrage dans le tableau
if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY nom_salle_conf ASC ';
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

foreach ($result as $row) {
  $sub_array = array();
	$sub_array[] = $row['nom_salle_conf'];
	$sub_array[] = $row['desc_salle_conf'];
  $sub_array[] = $row['capacite_salle_conf'];

    if ($_SESSION['lang'] == 'EN') {
        $consulter = BOUTON_CONSULTER_EN;
        $modifier = BOUTON_MODIFIER_EN;
		$supprimer = SUPPRIMER_EN;
    } else {
        $consulter = BOUTON_CONSULTER_FR;
        $modifier = BOUTON_MODIFIER_FR;
		$supprimer = SUPPRIMER_FR;
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
        <a class="dropdown-item view" id="'.$row["id_salle_conf"].'" href="#">'. $consulter . '</a>
        <a class="dropdown-item update" id="'.$row["id_salle_conf"].'" href="#">'. $modifier . '</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item delete" id="'.$row["id_salle_conf"].'" href="#" data-status="'.$row["statut_salle_conf"].'">'. $supprimer . '</a>
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
        <a class="dropdown-item view" id="'.$row["id_salle_conf"].'" href="#">'. $consulter . '</a>
        <a class="dropdown-item update" id="'.$row["id_salle_conf"].'" href="#">'. $modifier . '</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item delete" id="'.$row["id_salle_conf"].'" href="#" data-status="'.$row["statut_salle_conf"].'">'. $supprimer . '</a>
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
        <a class="dropdown-item view" id="'.$row["id_salle_conf"].'" href="#">'. $consulter . '</a>
        <a class="dropdown-item update" id="'.$row["id_salle_conf"].'" href="#">'. $modifier . '</a>
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
        <a class="dropdown-item view" id="'.$row["id_salle_conf"].'" href="#">'. $consulter . '</a>
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
        <a class="dropdown-item view" id="'.$row["id_salle_conf"].'" href="#">'. $consulter . '</a>
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
  global $main_query;
	$statement = $connect->prepare($main_query);//requete d'en haut à remettre
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>