<?php
// "soins-spa-action.php"
// Description


// --------------------------------- IMPORT -----------------------------------
include_once('utils.php');

// --------------------- CONSTANTS & VARIABLES & CLASSES ----------------------
$menu = 'soins_spa';
include_once '../lang/lang.php';
$contenu = DICTIONNAIRE[$_SESSION['lang']]["common"];
foreach ($contenu as $key => $value) {
    ${$key} = $value;
}
$contenu = DICTIONNAIRE[$_SESSION['lang']][$menu];
foreach ($contenu as $key => $value) {
    ${$key} = $value;
}

// LoadDictionary($menu);

// -------------------------- FUNCTIONS DECLARATION ---------------------------
function ValidateForm($action) {
    switch($action) {
        case "add":
            $clean_data = [
                'nom_soins_spa' => $_POST['nom_soins_spa'],
                'desc_soins_spa'=> $_POST['desc_soins_spa']
            ];
            $errors = null;
            return [$clean_data, $errors];
        case "view":
            // if (!isset($_POST['id_soins_spa'])) {
            //     echo json_encode([
            //         "status" => "failed", // custom status?
            //         "menu"   => $menu,
            //         "action" => "view"
            //     ]);
            //     exit;
            // }
            $clean_data = [
                "id_soins_spa" => $_POST['id_soins_spa']
            ];
            $errors = null;
            return [$clean_data, $errors];
        case "fetch_data_form_update":
            $clean_data = [
                "id_soins_spa" => $_POST['id_soins_spa']
            ];
            $errors = null;
            return [$clean_data, $errors];
        case "update":
            $clean_data = [
                'id_soins_spa'  => $_POST['id_soins_spa'],
                'nom_soins_spa' => $_POST['nom_soins_spa'],
                'desc_soins_spa'=> $_POST['desc_soins_spa']
            ];
            $errors = null;
            return [$clean_data, $errors];
        // default:
    }
}

function FormatConsulter($row) {
    // labels, dateformat, badges
    $table = '<table class="table table-boredered">';
    foreach ($row as $key => $value) {
        if ($key == 'date_create_soins_spa' || $key == 'date_last_modif_soins_spa') {
            $value = FormatDatetime($value);
        }
        global $MODAL_VIEW_LABELS;
        $table .= '' .
        '<tr>' .
            '<td>' . $MODAL_VIEW_LABELS[$key] . '</td>' .
            '<td>' . $value . '</td>' .
        '</tr>';
    }
    $table .= '</table>';
    return $table;
}

// ---------------------------------- MAIN ------------------------------------
// Si l'utilisateur n'est pas connect??, renvoyer l'erreur appropri??e
if (IsNotConnected()) {
    echo json_encode(["status" => "not_connected"]);
    exit;
}
// Si l'utilisateur n'a pas le droit d'acc??der ?? ce menu, renvoyer l'erreur appropri??e
if (IsNotAllowed($menu)) {
    echo json_encode([
        "status" => "not_allowed",
        "menu"   =>  $menu,
        "action" => "all"
    ]);
    exit;
}
// Si $_POST['action_soins_spa'] n'existe pas, renvoyer l'erreur appropri??e
if (!isset($_POST['action_' . $menu])) {
    echo json_encode([
        "status"        => "failed",
        "err_message"   => "action_" . $menu . " is missing"
    ]);
    exit;
}

// G??rer les diff??rents cas de $_POST['action_soins_spa']
$action = $_POST['action_' . $menu];
switch($action) {
    case "add":
        // Les lecteurs ne sont pas autoris??s ?? ajouter des donn??es
        if (UserIs('lecteur')) {
            echo json_encode([
                "status" => "not_allowed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }

        // Valider le formulaire
        [$clean_data, $errors] = ValidateForm($action);
        if ($errors !== null) {
            echo json_encode([
                "status" => "invalid_form",
                "menu"   => $menu,
                "action" => $action,
                "errors" => $errors
            ]);
            exit;
        }
        
        // Doublons
        // CountRow compte le nombre d'??lements dans la table indiqu??, qui remplissent les conditions d??finies
        $doublon_count = CountRow('soins_spa', [
            // WHERE status_soins_spa = 'Actif' AND nom_soins_spa = $clean_data['nom_soins_spa']
            'statut_soins_spa'  =>  'Actif',
            'nom_soins_spa'     =>  $clean_data['nom_soins_spa']
        ]);
        // Si une erreur survient dans le CountRow() retourner un message d'erreur appropri??
        if ($doublon_count === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        } else if ($doublon_count !== '0') {
            // Si on trouve de doublon, renvoyer un message d'erreur appropri??
            echo json_encode([
                "status" => "doublon",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }

        // Ins??rer les donn??es
        // La fonction Insert() ins??re les donn??es dans la table indiqu??. Elle retourne le id de 
        // l'??lement ins??r??
        $id_soins_spa = Insert("soins_spa", [
            "nom_soins_spa"               => $clean_data["nom_soins_spa"],
            "desc_soins_spa"              => $clean_data["desc_soins_spa"],
            "date_create_soins_spa"       => date("Y-m-d H:i:s"),
            "date_last_modif_soins_spa"   => date("Y-m-d H:i:s"),
            "user_create_soins_spa"       => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
            "user_last_modif_soins_spa"   => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        ]);
        // Si l'insertion ??choue, retourner une erreur
        if ($id_soins_spa === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }

        // Insertion r??ussie.
        // Ajouter un nouveau log d'ajout
        LogAdd($menu, ["id_soins_spa" => $id_soins_spa, "nom_soins_spa" => $clean_data['nom_soins_spa']]);
        echo json_encode([
            "status" => "success",
            "menu"   => $menu,
            "action" => $action
        ]);
        exit;
    case "view":
        // Tous les r??les ont acc??s ?? l'action "view"

        // V??rifier les donn??es envoy??es
        [$clean_data, $errors] = ValidateForm($action);
        if ($errors !== null) {
            echo json_encode([
                "status" => "invalid_form",
                "errors" => $errors,
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }

        // R??cup??rer les donn??es
        $row = FetchRow("soins_spa", [
            'statut_soins_spa' => 'Actif',
            'id_soins_spa' => $clean_data["id_soins_spa"]
        ], [ // les colonnes ?? afficher dans le modal "consulter"
            "nom_soins_spa",
            "desc_soins_spa",
            "date_create_soins_spa",
            "date_last_modif_soins_spa",
            "user_create_soins_spa"
        ]);

        if ($row === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }
        // else if all columns are not set
        // retourner row?
        // log seulement quand success?

        $row = array_map("htmlspecialchars", $row);
        // Mettre les infos ?? acchicher dans un tableau html
        $html_table = FormatConsulter($row);
        echo json_encode([
            "status" => "success",
            "data"   => $html_table
        ]);
        LogInfo($menu, ["id_soins_spa" => $clean_data["id_soins_spa"], "nom_soins_spa" => $row["nom_soins_spa"]]);
        exit;

    case "fetch_data_form_update":
        // L'??diteur, l'administrateur et le super administrateur sont les seuls ?? pouvoir modifier
        if (UserIsNot('super_admin', 'admin', 'editeur')) {
            echo json_encode([
                "status" => "not_allowed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }
    
        // Valider le formulaire
        [$clean_data, $errors] = ValidateForm($action);
        if ($errors !== null) {
            echo json_encode([
                "status" => "invalid_form",
                "menu"   => $menu,
                "action" => $action,
                "errors" => $errors
            ]);
            exit;
        }
            
        // R??cup??rer les donn??es
        $row = FetchRow("soins_spa", [
            'statut_soins_spa' => 'Actif',
            'id_soins_spa' => $clean_data["id_soins_spa"]
        ], [ // les colonnes ?? afficher dans le modal "modifier"
            "nom_soins_spa",
            "desc_soins_spa"
        ]);

        if ($row === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }
        // else if all columns are not set
        // retourner row?
        // log seulement quand success?

        $row = array_map("htmlspecialchars", $row);
        echo json_encode([
            "status" => "success",
            "data"   => $row
        ]);
        // Aucun log
        exit;
    case "update":
        // L'??diteur, l'administrateur et le super administrateur sont les seuls ?? pouvoir modifier
        if (UserIsNot('super_admin', 'admin', 'editeur')) {
            echo json_encode([
                "status" => "not_allowed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }
    
        // Valider le formulaire
        [$clean_data, $errors] = ValidateForm($action);
        if ($errors !== null) {
            echo json_encode([
                "status" => "invalid_form",
                "menu"   => $menu,
                "action" => $action,
                "errors" => $errors
            ]);
            exit;
        }
            
        // Doublons
        // CountRow compte le nombre d'??lements dans la table indiqu??, qui remplissent les conditions d??finies
        $doublon_count = CustomCountRow('soins_spa',
            "WHERE statut_soins_spa = 'Actif' 
            AND id_soins_spa <> :id
            AND nom_soins_spa = :nom",
            [
                ":id"  => $clean_data['id_soins_spa'],
                ":nom" => $clean_data['nom_soins_spa']
            ]
        );
        // Si une erreur survient dans le CountRow() retourner un message d'erreur appropri??
        if ($doublon_count === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        } else if ($doublon_count !== '0') {
            // Si on trouve de doublon, renvoyer un message d'erreur appropri??
            echo json_encode([
                "status" => "doublon",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }
    
        // Update les donn??es
        // La fonction Update() mets ?? jour les donn??es dans la table indiqu??. Elle retourne le id de 
        // l'??lement modifi??
        $updated = Update("soins_spa", [
            'id_soins_spa'     => $clean_data['id_soins_spa'],
            'statut_soins_spa' => 'Actif'
        ], [
            "nom_soins_spa"               => $clean_data["nom_soins_spa"],
            "desc_soins_spa"              => $clean_data["desc_soins_spa"],
            "date_last_modif_soins_spa"   => date("Y-m-d H:i:s"),
            "user_last_modif_soins_spa"   => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        ]);

        // Si la modification ??choue, retourner une erreur
        if ($updated === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }


        // Update r??ussi.
        // Ajouter un nouveau log de modification
        LogModif($menu, [
            "id_soins_spa" => $clean_data['id_soins_spa'],
        ]);
        echo json_encode([
            "status" => "success",
            "menu"   => $menu,
            "action" => $action
        ]);
        exit;

    case "delete":
        echo json_encode(["status" => "success"]);
        // log
        exit;
    default:
        echo json_encode([
            "status" => "unknown_action",
            "menu"   => $menu,
            "action" => $action
        ]);
        exit;
}



// ----------------------------------- END ------------------------------------