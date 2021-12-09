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



$query = "SELECT * FROM soins_spa WHERE statut_soins_spa = 'Actif'";
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
	$sub_array[] = $row['desc_soins_spa'];

    // Les Actions
    {
        $action_consulter       =   '<a class="dropdown-item view_button"   data-id_soins_spa="' . $row["id_soins_spa"] . '" href="#" title="' . ContenuToolTipAcces("all") . '">' . $CONSULTER . '</a>';
        $action_modifier        =   '<a class="dropdown-item update_button" data-id_soins_spa="' . $row["id_soins_spa"] . '" href="#" title="' . ContenuToolTipAcces("super_admin", "admin", "editeur") . '">' . $MODIFIER . '</a>';
        $action_supprimer       =   '<a class="dropdown-item delete_button" data-id_soins_spa="' . $row["id_soins_spa"] . '" href="#" title="' . ContenuToolTipAcces("super_admin", "admin") . '">' . $SUPPRIMER . '</a>';
        // $bouton_indiquer_prix   =   '<a class="dropdown-item indiquer_prix" id="'.$row["id_location_conf"].'" href="#" title="Accès: Tous les rôles sauf lecteur">'. $indiquer_le_prix . '</a>';   
        // $bouton_new_facture     =   '<a class="dropdown-item new_facture" id="'.$row["id_location_conf"].'" href="#" title="Accès: Tous les rôles sauf lecteur">'. $new_facture . '</a>';
        // $bouton_view_facture    =   '<a class="dropdown-item view_facture" id="'.$row["id_location_conf"].'" href="#" title="Accès: Tous les rôles">'. $view_facture . '</a>';
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
        switch(true) {
            case UserIs("super_admin"):
                $actions .= $action_consulter . $action_modifier . $dropdown_divider . $action_supprimer;
                break;
            case UserIs("admin"):
                $actions .= $action_consulter . $action_modifier . $dropdown_divider . $action_supprimer;
                break;
            case UserIs("editeur"):
                $actions .= $action_consulter . $action_modifier;
                break;
            case UserIs("auteur"):
                $actions .= $action_consulter;
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
