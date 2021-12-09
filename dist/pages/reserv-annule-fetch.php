<?php

//category_fetch.php

include('../database_connection.php');

include('../AddLogInclude.php');

$colonne = array("date_debut_reservation", "date_fin_reservation", "nom_type_chambre", "nom_chambre", "nom_client", "tarif_montant_chambre_reservee");

$query = '';

$output = array();

$query .= "
SELECT id_reservation, date_debut_reservation, date_fin_reservation, nom_type_chambre, nom_chambre, nom_client, prenom_client, tarif_montant_chambre_reservee, statut_reservation
FROM reservation, client, chambre_reservee, type_chambre, chambre
WHERE reservation.id_client_fk_reservation = client.id_client
AND chambre_reservee.id_chambre_fk_chambre_reservee = chambre.id_chambre
AND chambre_reservee.id_reservation_fk_chambre_reservee = reservation.id_reservation
AND chambre.id_type_chambre_fk_chambre = type_chambre.id_type_chambre
AND statut_reservation = 'Annulé' 
";

if(isset($_POST["search"]["value"]))
{
    $query .= 'AND (date_debut_reservation LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR date_fin_reservation LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nom_client LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR prenom_client LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nom_type_chambre LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nom_chambre LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR tarif_montant_chambre_reservee LIKE "%'.$_POST["search"]["value"].'%" )';
}

// Filtrage dans le tableau
if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$colonne[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id_reservation DESC ';
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
	$sub_array[] = date("d-m-Y", strtotime($row['date_debut_reservation']));
	$sub_array[] = date("d-m-Y", strtotime($row['date_fin_reservation']));
	$sub_array[] = $row['nom_type_chambre'];
	$sub_array[] = $row['nom_chambre'];
	$sub_array[] = $row['nom_client'] . ' ' . $row['prenom_client'];
	$sub_array[] = $row['tarif_montant_chambre_reservee'];


	//Super Administrateur ==========================================================================================
	if($_SESSION['type_compte'] == '1')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_reservation"].'" href="#">Consulter</a>
        <a class="dropdown-item update" id="'.$row["id_reservation"].'" href="#">Modifier</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item delete" id="'.$row["id_reservation"].'" href="#" data-status="'.$row["statut_reservation"].'">Réactiver</a>
      </div>
    </div>
	
	</center>
	';
	}



	//Administrateur ==========================================================================================
	if($_SESSION['type_compte'] == '2')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_reservation"].'" href="#">Consulter</a>
        <a class="dropdown-item update" id="'.$row["id_reservation"].'" href="#">Modifier</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item delete" id="'.$row["id_reservation"].'" href="#" data-status="'.$row["statut_reservation"].'">Réactiver</a>
      </div>
    </div>
	
	</center>
	';
	}


	//Editeur ==========================================================================================
	if($_SESSION['type_compte'] == '3')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_reservation"].'" href="#">Consulter</a>
        <a class="dropdown-item update" id="'.$row["id_reservation"].'" href="#">Modifier</a>
      </div>
    </div>
	
	</center>
	';
	}

	//Auteur ==========================================================================================
	if($_SESSION['type_compte'] == '4')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_reservation"].'" href="#">Consulter</a>
    </div>
	
	</center>
	';
	}
    

	//Lecteur ==========================================================================================
	if($_SESSION['type_compte'] == '5')
	{
	$sub_array[] = '
	<center>
	
	<div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item view" id="'.$row["id_reservation"].'" href="#">Consulter</a>
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
    SELECT id_reservation, date_debut_reservation, date_fin_reservation, nom_type_chambre, nom_chambre, nom_client, prenom_client, tarif_montant_chambre_reservee, statut_reservation
    FROM reservation, client, chambre_reservee, type_chambre, chambre
    WHERE reservation.id_client_fk_reservation = client.id_client
    AND chambre_reservee.id_chambre_fk_chambre_reservee = chambre.id_chambre
    AND chambre_reservee.id_reservation_fk_chambre_reservee = reservation.id_reservation
    AND chambre.id_type_chambre_fk_chambre = type_chambre.id_type_chambre
    AND statut_reservation = 'Annulé' 
    ");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>