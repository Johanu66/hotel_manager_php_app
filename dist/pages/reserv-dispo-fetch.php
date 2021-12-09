<?php

//category_fetch.php

include('../database_connection.php');
include('../AddLogInclude.php');


include('../lang/fr-lang.php');
include('../lang/en-lang.php');


$colonne = array("nom_type_chambre", "nom_chambre");

$query = '';

$output = array();

$query .= "
SELECT * 
FROM chambre 
INNER JOIN type_chambre tc 
ON chambre.id_type_chambre_fk_chambre = tc.id_type_chambre 
WHERE statut_chambre = 'Actif' 
AND id_chambre NOT IN (SELECT id_chambre_fk_chambre_reservee 
	                         FROM reservation,chambre_reservee 
							 WHERE reservation.id_reservation = chambre_reservee.id_reservation_fk_chambre_reservee 
							 AND date_fin_reservation > CURDATE() 
							 AND libere_chambre_reservee = 'Non') 
";

 if(isset($_POST["search"]["value"]))
{
    $query .= 'AND nom_type_chambre LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nom_chambre LIKE "%'.$_POST["search"]["value"].'%" ';
}

// Filtrage dans le tableau
if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
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
	// $status = '';
	// if($row['statut_chambre'] == 'Actif')
	// {
	// 	$status = '<center><span class="badge badge-primary">Actif</span></center>';
	// }
	// else
	// {
	// 	$status = '<center><span class="badge badge-danger">Inactif</span></center>';
	// }
	$sub_array = array();
	$sub_array[] = $row['nom_type_chambre'];
	$sub_array[] = $row['nom_chambre'];
	$sub_array[] = $row['desc_chambre'];
	$sub_array[] = '<center><span class="badge badge-primary">Disponible</span></center>';



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
			<a class="dropdown-item view" id="'.$row["id_chambre"].'" href="#">Consulter</a>
			<a class="dropdown-item reserver" id="'.$row["id_chambre"].'" href="#">Réserver</a>
        <div class="dropdown-divider"></div>
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
	  <a class="dropdown-item view" id="'.$row["id_chambre"].'" href="#">Consulter</a>
	  <a class="dropdown-item reserver" id="'.$row["id_chambre"].'" href="#">Réserver</a>
  <div class="dropdown-divider"></div>
        <a class="dropdown-item delete" id="'.$row["id_type_chambre"].'" href="#" data-status="'.$row["statut_type_chambre"].'">'. $changer_statut . '</a>
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
	  <a class="dropdown-item view" id="'.$row["id_chambre"].'" href="#">Consulter</a>
	  <a class="dropdown-item reserver" id="'.$row["id_chambre"].'" href="#">Réserver</a>
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
			<a class="dropdown-item view" id="'.$row["id_chambre"].'" href="#">Consulter</a>
			<a class="dropdown-item reserver" id="'.$row["id_chambre"].'" href="#">Réserver</a>
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
	  <a class="dropdown-item view" id="'.$row["id_chambre"].'" href="#">Consulter</a>
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
FROM chambre 
INNER JOIN type_chambre tc 
ON chambre.id_type_chambre_fk_chambre = tc.id_type_chambre 
WHERE statut_chambre = 'Actif' 
AND id_chambre NOT IN (SELECT id_chambre_fk_chambre_reservee 
	                         FROM reservation,chambre_reservee 
							 WHERE reservation.id_reservation = chambre_reservee.id_reservation_fk_chambre_reservee 
							 AND date_fin_reservation > CURDATE() 
							 AND libere_chambre_reservee = 'Non') 
    ");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>