<?php

// check if connected, if access
require_once('utils.php');
$menu = "soins_spa";
// LoadDictionary($menu); //Que faire si err?
include_once '../lang/lang.php';
$contenu = DICTIONNAIRE[$_SESSION['lang']]["common"];
foreach ($contenu as $key => $value) {
    ${$key} = $value;
}
$contenu = DICTIONNAIRE[$_SESSION['lang']][$menu];
foreach ($contenu as $key => $value) {
    ${$key} = $value;
}



$query = "SELECT id_prestation_spa, nom_soins_spa, date_debut_prestation_spa, date_fin_prestation_spa, nom_personne,
prenom_personne, montant_prestation_spa, facture_prestation_spa
FROM soins_spa, prestation_spa, client, personne
WHERE soins_spa.id_soins_spa = prestation_spa.id_soins_spa_fk_prestation_spa
AND client.id_client = prestation_spa.id_client_fk_prestation_spa
AND personne.id_personne = client.id_personne_fk_client
AND statut_prestation_spa = 'Actif'
ORDER BY date_create_prestation_spa DESC";
$result = ExecuteQuery($query);
if ($result === null) {
// ???
}


// specialchars
$data = [];
foreach($result as $row)
{
	$sub_array = [];
	$sub_array[] = $row['nom_soins_spa'];
	$sub_array[] = $row['date_debut_prestation_spa'];
	$sub_array[] = $row['date_fin_prestation_spa'];
	$sub_array[] = $row['prenom_personne'] . ' ' . $row['nom_personne'];
	$sub_array[] = $row['montant_prestation_spa'];
	$sub_array[] = $row['facture_prestation_spa'];

    // Les Actions
    {
        $action_consulter       =   '<a class="dropdown-item view_button"   data-id_prestation_spa="' . $row["id_prestation_spa"] . '" href="#" title="' . ContenuToolTipAcces("all") . '">' . $CONSULTER . '</a>';
        $action_modifier        =   '<a class="dropdown-item update_button" data-id_prestation_spa="' . $row["id_prestation_spa"] . '" href="#" title="' . ContenuToolTipAcces("super_admin", "admin", "editeur") . '">' . $MODIFIER . '</a>';
        $action_supprimer       =   '<a class="dropdown-item delete_button" data-id_prestation_spa="' . $row["id_prestation_spa"] . '" href="#" title="' . ContenuToolTipAcces("super_admin", "admin") . '">' . $SUPPRIMER . '</a>';
        $action_indiquer_prix   =   '<a class="dropdown-item indiquer_prix_button" data-id_prestation_spa="' . $row["id_prestation_spa"].'" href="#" title="' . ContenuToolTipAccesSauf("lecteur") . '">'. $INDIQUER_PRIX . '</a>';   
        $action_new_facture     =   '<a class="dropdown-item new_facture_button" data-id_prestation_spa="' . $row["id_prestation_spa"].'" href="#" title="' . ContenuToolTipAccesSauf("lecteur") . '">'. $EDITER_FACTURE . '</a>';
        $action_view_facture    =   '<a class="dropdown-item view_facture_button" data-id_prestation_spa="' . $row["id_prestation_spa"].'" href="#"title="' . ContenuToolTipAcces("all") . '">'. $AFFICHER_FACTURE . '</a>';
        $dropdown_divider       =   '<div class="dropdown-divider"></div>';

        $actions = '
            <center>
                <div class="btn-group">
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ' . $ACTIONS . '
                    </button>
                    <div class="dropdown-menu">
        ';
        // ActionsHandler
        // TODO indiquer prix, ...
        switch(true) {
            case UserIs("super_admin"):
                if ($row['montant_prestation_spa'] === '0') {
                    $actions .= $action_consulter . $action_modifier . $action_indiquer_prix . $dropdown_divider . $action_view_facture . $action_supprimer;
                } else {
                    $actions .= $action_consulter . $action_modifier . $dropdown_divider . $action_new_facture . $dropdown_divider . $action_supprimer;
                }
                break;
            case UserIs("admin"):
                $actions .= $action_consulter . $action_modifier . $dropdown_divider . $action_new_facture . $dropdown_divider . $action_supprimer;
                break;
            case UserIs("editeur"):
                $actions .= $action_consulter . $action_modifier . $dropdown_divider . $action_new_facture;
                break;
            case UserIs("auteur"):
                $actions .= $action_consulter . $dropdown_divider . $action_new_facture;
                break;
            case UserIs("lecteur"):
                $actions .= $action_consulter;
                break;
        }
        $actions .= '
                    </div>
                </div>
            </center>
        ';
    }
    $sub_array[] = $actions;
	
	$data[] = $sub_array;
}

$output = array(
	"draw"			    =>	intval($_POST["draw"]),
	"recordsTotal"  	=>  8,
	"recordsFiltered" 	=> 	1,
	"data"				=>	$data
);

echo json_encode($output);
