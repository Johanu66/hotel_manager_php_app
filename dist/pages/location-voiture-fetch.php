<?php

//category_fetch.php

include('../database_connection.php');
include('../AddLogInclude.php');


include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $facture_oui = FACTURE_OUI_EN;
    $facture_non = FACTURE_NON_EN;
    $consulter = BOUTON_CONSULTER_EN;
    $modifier = BOUTON_MODIFIER_EN;
    $supprimer = SUPPRIMER_EN;
    $new_facture = NOUVELLE_FACTURE_EN;
    $view_facture = AFFICHER_FACTURE_EN;
    $edit_facture = MODIFIER_FACTURE_EN;
    //$indiquer_prix = INDIQUER_PRIX_EN;
} else {
    $facture_oui = FACTURE_OUI_FR;
    $facture_non = FACTURE_NON_FR;
    $consulter = BOUTON_CONSULTER_FR;
    $modifier = BOUTON_MODIFIER_FR;
    $supprimer = SUPPRIMER_FR;
    $new_facture = NOUVELLE_FACTURE_FR;
    $view_facture = AFFICHER_FACTURE_FR;
    $edit_facture = MODIFIER_FACTURE_FR;
    //$indiquer_prix = INDIQUER_PRIX_FR;
}
$colonne = array("modele_voiture","immatriculation_voiture","debut_location_voiture","fin_location_voiture","nom_personne","nom_client","prix_location_voiture","facture_location_voiture");

$query = '';

$output = array();

$query .= "
SELECT *
FROM location_voiture,voiture,personne,voiturier,client
WHERE personne.id_personne= voiturier.id_personne_fk_voiturier
  AND location_voiture.id_voiture_fk_location_voiture=voiture.id_voiture
  AND location_voiture.id_client_fk_location_voiture=client.id_client
  AND location_voiture.id_voiturier_fk_location_voiture=voiturier.id_voiturier
  AND statut_location_voiture ='Actif'
";

 if(isset($_POST["search"]["value"]))
{
    $query .= 'AND ( modele_voiture LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR immatriculation_voiture LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR debut_location_voiture LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR fin_location_voiture LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR prix_location_voiture LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR facture_location_voiture LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR nom_personne LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR nom_client LIKE "%'.$_POST["search"]["value"].'%" )';
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

    $factures ='';
    if($row['facture_location_voiture'] == 'Non')
      {
	 	$factures = '<center><span class="badge badge-primary">'.$facture_non .'</span></center>';
	 }
    else
	{
		$factures = '<center><span class="badge badge-danger">'. $facture_oui .'</span></center>';
	}

    // $prix ='';
    // if($row['prix_location_voiture'] >0)
    //   {
	//  	$prix = '<center><span class="badge badge-primary">'.$row['prix_location_voiture'].'</span></center>';
	//  }
    // else
	// {
	// 	$prix = '<center><span class="badge badge-danger">'. _ .'</span></center>';
	// }
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
	$sub_array[] = $row['modele_voiture'];
	$sub_array[] = $row['immatriculation_voiture'];
	$sub_array[] = $row['debut_location_voiture'];
    $sub_array[] = $row['fin_location_voiture'];
	$sub_array[] = $row['nom_personne'];
	$sub_array[] = $row['nom_client'];
    $sub_array[] = $row['prix_location_voiture'];
	$sub_array[] = $factures;
    //$sub_array[] = $prix;

    $bouton_consulter       =   '<a class="dropdown-item view" id="'.$row["id_location_voiture"].'" href="#">'. $consulter . '</a>';
    $bouton_modifier        =   '<a class="dropdown-item update" id="'.$row["id_location_voiture"].'" href="#">'. $modifier . '</a>';
    $bouton_supprimer       =   '<a class="dropdown-item delete" id="'.$row["id_location_voiture"].'" href="#" data-status="'.$row["statut_location_voiture"].'">'. $supprimer . '</a>';
    $bouton_new_facture     =   '<a class="dropdown-item new_facture" id="'.$row["id_location_voiture"].'" href="#">'. $new_facture . '</a>';
    $bouton_view_facture    =   '<a class="dropdown-item view_facture" id="'.$row["id_location_voiture"].'" href="#">'. $view_facture . '</a>';
    $bouton_edit_facture    =   '<a class="dropdown-item edit_facture" id="'.$row["id_location_voiture"].'" href="#">'. $edit_facture . '</a>';
    //$bouton_indiquer_prix    =   '<a class="dropdown-item indiquer_prix" id="'.$row["id_location_voiture"].'" href="#">'. $indiquer_prix . '</a>';
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
        $actions .= $bouton_consulter . $bouton_modifier . $dropdown_divider . $bouton_supprimer . $dropdown_divider;
        if ($row['facture_location_voiture'] == 'Non') {
            $actions .= $bouton_new_facture ;
        } else {
            $actions .= $bouton_view_facture;
        }
        // if ($row['prix_location_voiture'] >0) {
        //     $actions .= $bouton_view_facture;
        // } else {
        //     $actions .= $bouton_indiquer_prix;
        // }
	}

    // Administrateur ==========================================================================================
	if($_SESSION['type_compte'] == '2')
	{
        $actions .= $bouton_consulter . $bouton_modifier . $dropdown_divider . $bouton_supprimer . $dropdown_divider;
        if ($row['facture_location_voiture'] == 'Non') {
            $actions .= $bouton_new_facture;
        } else {
            $actions .= $bouton_view_facture;
        }
	}

	// Editeur ==========================================================================================
	if($_SESSION['type_compte'] == '3')
	{
        $actions .= $bouton_consulter . $bouton_modifier . $dropdown_divider;
        if ($row['facture_location_voiture'] == 'Non') {
            $actions .= $bouton_new_facture;
        } else {
            $actions .= $bouton_view_facture;
        }
	}

	// Auteur ==========================================================================================
	if($_SESSION['type_compte'] == '4')
	{
        $actions .= $bouton_consulter . $dropdown_divider;
        if ($row['facture_location_voiture'] == 'Non') {
            $actions .= $bouton_new_facture;
        } else {
            $actions .= $bouton_view_facture;
        }
	}

	// Lecteur ==========================================================================================
	if($_SESSION['type_compte'] == '5')
	{
        $actions .= $bouton_consulter . $dropdown_divider;
        if ($factures) {
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
	$statement = $connect->prepare("
    SELECT *
    FROM location_voiture,voiture,personne,voiturier,client
    WHERE personne.id_personne= voiturier.id_personne_fk_voiturier
    AND location_voiture.id_voiture_fk_location_voiture=voiture.id_voiture
    AND location_voiture.id_client_fk_location_voiture=client.id_client
    AND location_voiture.id_voiturier_fk_location_voiture=voiturier.id_voiturier
    AND statut_location_voiture ='Actif'
    ");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>