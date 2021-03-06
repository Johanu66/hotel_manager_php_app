<?php
// "prestation-spa-action.php"
// Description


// --------------------------------- IMPORT -----------------------------------
include_once('utils.php');

// --------------------- CONSTANTS & VARIABLES & CLASSES ----------------------
$menu = 'prestation_spa';
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
    $clean_data = $_POST;
    $errors = null;
    return [$clean_data, $errors];
    // switch($action) {
    //     case "add":
    //         $clean_data = [
    //             'id_soins_spa' => $_POST['id_soins_spa'],
    //             'date_debut_prestation_spa' => $_POST['nom_prestation_spa'],
    //             'date_fin_prestation_spa' => $_POST['nom_prestation_spa'],
    //             'nom_prestation_spa' => $_POST['nom_prestation_spa'],
    //             'desc_prestation_spa'=> $_POST['desc_prestation_spa']
    //         ];
    //         $errors = null;
    //         return [$clean_data, $errors];
    //     case "view":
    //         // if (!isset($_POST['id_prestation_spa'])) {
    //         //     echo json_encode([
    //         //         "status" => "failed", // custom status?
    //         //         "menu"   => $menu,
    //         //         "action" => "view"
    //         //     ]);
    //         //     exit;
    //         // }
    //         $clean_data = [
    //             "id_prestation_spa" => $_POST['id_prestation_spa']
    //         ];
    //         $errors = null;
    //         return [$clean_data, $errors];
    //     case "fetch_data_form_update":
    //         $clean_data = [
    //             "id_prestation_spa" => $_POST['id_prestation_spa']
    //         ];
    //         $errors = null;
    //         return [$clean_data, $errors];
    //     case "update":
    //         $clean_data = [
    //             'id_prestation_spa'  => $_POST['id_prestation_spa'],
    //             'nom_prestation_spa' => $_POST['nom_prestation_spa'],
    //             'desc_prestation_spa'=> $_POST['desc_prestation_spa']
    //         ];
    //         $errors = null;
    //         return [$clean_data, $errors];
        // default:
    // }
}

function FormatConsulter($row) {
    // labels, dateformat, badges
    global $MODAL_VIEW_LABELS;
    $table = '<table class="table table-boredered">';
    foreach ($MODAL_VIEW_LABELS as $key => $label) {
        $value = $row[$key];
        if (in_array($key, ['date_debut_prestation_spa', 'date_fin_prestation_spa', 'date_create_prestation_spa', 'date_last_modif_prestation_spa'])) {
            $value = FormatDatetime($value);
        }
        if ($key === 'facture_prestation_spa') {
            $value = FormatBadgeFacture($value);
        }

        $table .= '' . 
        '<tr>' .
            '<td>' . $label . '</td>' .
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
// Si $_POST['action_prestation_spa'] n'existe pas, renvoyer l'erreur appropri??e
if (!isset($_POST['action_' . $menu])) {
    echo json_encode([
        "status"        => "failed",
        "err_message"   => "action_" . $menu . " is missing"
    ]);
    exit;
}



// G??rer les diff??rents cas de $_POST['action_prestation_spa']
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

        // V??rifier s'il faut ins??rer un nouveau client
        if (isset($clean_data['nouveau_client']) && $clean_data['nouveau_client'] === 'on') {
        // Ins??rer le mouveau client, et r??cup??rer $id_client
            // Doublons: D'abord il faut v??rifier qu'il n'existe pas d??j?? un client avec le m??me t??l??phone
            // CountRow compte le nombre d'??lements dans la table indiqu??, qui remplissent les conditions d??finies
            $doublon_count = CustomCountRow('personne, client',
                "WHERE client.id_personne_fk_client = personne.id_personne
                AND tel_personne = :tel",
                [":tel" => $clean_data['tel_client']]
            );
            // Si une erreur survient dans le CustomCountRow() retourner un message d'erreur appropri??
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

            // Aucun doublon trouv??, on peut ins??rer le nouveau client
            // La fonction Insert() ins??re les donn??es dans la table indiqu??. Elle retourne le id de 
            // l'??lement ins??r??
            $id_personne = Insert("personne", [
                "nom_personne"               => $clean_data["nom_client"],
                "prenom_personne"            => $clean_data["prenom_client"],
                "id_card_personne"           => $clean_data["id_card_client"],
                "passeport_personne"         => $clean_data["passeport_client"],
                "tel_personne"               => $clean_data["tel_client"],
                "email_personne"             => $clean_data["email_client"],
                "date_create_personne"       => date("Y-m-d H:i:s"),
                "date_last_modif_personne"   => date("Y-m-d H:i:s"),
                "user_create_personne"       => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                "user_last_modif_personne"   => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            ]);
            // Si l'insertion ??choue, retourner une erreur
            if ($id_personne === null) {
                echo json_encode([
                    "status" => "failed",
                    "menu"   => $menu,
                    "action" => $action
                ]);
                exit;
            }

            // Insertion dans la table personne r??ussie. Maintenant il faut ins??rer dans la table client.
            // La fonction Insert() ins??re les donn??es dans la table indiqu??. Elle retourne le id de 
            // l'??lement ins??r??
            $id_client = Insert("client", [
                "id_personne_fk_client"      => $id_personne,
            ]);
            // Si l'insertion ??choue, retourner une erreur
            if ($id_client === null) {
                echo json_encode([
                    "status" => "failed",
                    "menu"   => $menu,
                    "action" => $action
                ]);
                exit;
            }
            // Insertion r??ussie
        } else {
            $id_client = $clean_data['id_client'];
        }

        // Ins??rer les donn??es de la prestation
        // La fonction Insert() ins??re les donn??es dans la table indiqu??. Elle retourne le id de 
        // l'??lement ins??r??
        $id_prestation_spa = Insert("prestation_spa", [
            "id_soins_spa_fk_prestation_spa"   => $clean_data["id_soins_spa"],
            "date_debut_prestation_spa"        => $clean_data["date_debut_prestation_spa"],
            "date_fin_prestation_spa"          => $clean_data["date_fin_prestation_spa"],
            "id_client_fk_prestation_spa"      => $id_client,
            "montant_prestation_spa"           => $clean_data["montant_prestation_spa"],
            "note_prestation_spa"              => $clean_data["note_prestation_spa"],
            "date_create_prestation_spa"       => date("Y-m-d H:i:s"),
            "date_last_modif_prestation_spa"   => date("Y-m-d H:i:s"),
            "user_create_prestation_spa"       => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
            "user_last_modif_prestation_spa"   => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        ]);
        // Si l'insertion ??choue, retourner une erreur
        if ($id_prestation_spa === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }

        // Insertion r??ussie.
        // Ajouter un nouveau log d'ajout
        LogAdd($menu, ["id_prestation_spa" => $id_prestation_spa]);
        echo json_encode([
            "status" => "success",
            "menu"   => $menu,
            "action" => $action
        ]);
        exit;
    case "indiquer_prix":
        // Les lecteurs ne sont pas autoris??s ?? indiquer le prix
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

        // Update le prix
        // La fonction Update() mets ?? jour les donn??es dans la table indiqu??. Elle retourne le id de 
        // l'??lement modifi??
        $updated = Update("prestation_spa", [
            'id_prestation_spa'     => $clean_data['id_prestation_spa'],
            'statut_prestation_spa' => 'Actif'
        ], [
            "montant_prestation_spa"           => $clean_data["montant_prestation_spa"],
            "date_last_modif_prestation_spa"   => date("Y-m-d H:i:s"),
            "user_last_modif_prestation_spa"   => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
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
        LogPrix($menu, [
            "id_prestation_spa" => $clean_data['id_prestation_spa']
        ]);
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
        // TODO: FetchRow dans plusieurs tables
        $query = "SELECT nom_soins_spa, date_debut_prestation_spa, date_fin_prestation_spa, nom_personne,
        prenom_personne, montant_prestation_spa, facture_prestation_spa, note_prestation_spa,
        date_create_prestation_spa, date_last_modif_prestation_spa, user_create_prestation_spa
        FROM soins_spa, prestation_spa, client, personne
        WHERE soins_spa.id_soins_spa = prestation_spa.id_soins_spa_fk_prestation_spa
        AND client.id_client = prestation_spa.id_client_fk_prestation_spa
        AND personne.id_personne = client.id_personne_fk_client
        AND statut_prestation_spa = 'Actif'
        AND id_prestation_spa = :id";
        $result = ExecuteQuery($query, [":id" => $clean_data['id_prestation_spa']]);

        if ($result === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }
        $row = [];
        foreach($result[0] as $key => $value) {
            if (gettype($key) !== 'integer' && (!in_array($key, ['nom_personne', 'prenom_personne']))) {
                $row[$key] = $value;
            }
        }
        $row['client'] = $result[0]['prenom_personne'] . ' ' . $result[0]['nom_personne'];
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
        LogInfo($menu, ["id_prestation_spa" => $clean_data["id_prestation_spa"], "client" => $row["client"]]);
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
        $row = FetchRow("prestation_spa", [
            'statut_prestation_spa' => 'Actif',
            'id_prestation_spa' => $clean_data["id_prestation_spa"]
        ], [ // les colonnes ?? afficher dans le modal "modifier"
            "id_soins_spa_fk_prestation_spa",
            "date_debut_prestation_spa",
            "date_fin_prestation_spa",
            "id_client_fk_prestation_spa",
            "montant_prestation_spa",
            "facture_prestation_spa",
            "note_prestation_spa"
        ]);

        if ($row === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }
        $row['date_debut_prestation_spa'] = date('Y-m-d\TH:i', strtotime($row['date_debut_prestation_spa']));
        $row['date_fin_prestation_spa'] = date('Y-m-d\TH:i', strtotime($row['date_fin_prestation_spa']));

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

        if (isset($clean_data['nouveau_client']) && $clean_data['nouveau_client'] === 'on') {
        // Ins??rer le mouveau client, et r??cup??rer $id_client
            // Doublons: D'abord il faut v??rifier qu'il n'existe pas d??j?? un client avec le m??me t??l??phone
            // CustomCountRow compte le nombre d'??lements dans la table indiqu??, qui remplissent les conditions d??finies
            $doublon_count = CustomCountRow('personne, client',
                "WHERE client.id_personne_fk_client = personne.id_personne
                AND tel_personne = :tel",
                [":tel" => $clean_data['tel_client']]
            );
            // Si une erreur survient dans le CustomCountRow() retourner un message d'erreur appropri??
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
    
            // Aucun doublon trouv??, on peut ins??rer le nouveau client
            // La fonction Insert() ins??re les donn??es dans la table indiqu??. Elle retourne le id de 
            // l'??lement ins??r??
            $id_personne = Insert("personne", [
                "nom_personne"               => $clean_data["nom_client"],
                "prenom_personne"            => $clean_data["prenom_client"],
                "id_card_personne"           => $clean_data["id_card_client"],
                "passeport_personne"         => $clean_data["passeport_client"],
                "tel_personne"               => $clean_data["tel_client"],
                "email_personne"             => $clean_data["email_client"],
                "date_create_personne"       => date("Y-m-d H:i:s"),
                "date_last_modif_personne"   => date("Y-m-d H:i:s"),
                "user_create_personne"       => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                "user_last_modif_personne"   => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            ]);
            // Si l'insertion ??choue, retourner une erreur
            if ($id_personne === null) {
                echo json_encode([
                    "status" => "failed",
                    "menu"   => $menu,
                    "action" => $action
                ]);
                exit;
            }
    
            // Insertion dans la table personne r??ussie. Maintenant il faut ins??rer dans la table client.
            // La fonction Insert() ins??re les donn??es dans la table indiqu??. Elle retourne le id de 
            // l'??lement ins??r??
            $id_client = Insert("client", [
                "id_personne_fk_client"      => $id_personne,
            ]);
            // Si l'insertion ??choue, retourner une erreur
            if ($id_client === null) {
                echo json_encode([
                    "status" => "failed",
                    "menu"   => $menu,
                    "action" => $action
                ]);
                exit;
            }
            // Insertion r??ussie
        } else {
            $id_client = $clean_data['id_client'];
        }
            
        // Update les donn??es
        // La fonction Update() mets ?? jour les donn??es dans la table indiqu??. Elle retourne le id de 
        // l'??lement modifi??
        $updated = Update("prestation_spa", [
            'id_prestation_spa'     => $clean_data['id_prestation_spa'],
            'statut_prestation_spa' => 'Actif'
        ], [
            "id_soins_spa_fk_prestation_spa"   => $clean_data["id_soins_spa"],
            "date_debut_prestation_spa"        => $clean_data["date_debut_prestation_spa"],
            "date_fin_prestation_spa"          => $clean_data["date_fin_prestation_spa"],
            "id_client_fk_prestation_spa"      => $id_client,
            "montant_prestation_spa"           => $clean_data["montant_prestation_spa"],
            "note_prestation_spa"              => $clean_data["note_prestation_spa"],
            "date_last_modif_prestation_spa"   => date("Y-m-d H:i:s"),
            "user_last_modif_prestation_spa"   => $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
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
            "id_prestation_spa" => $clean_data['id_prestation_spa']
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
    case "fetch_data_form_new_facture":
        // Les lecteurs ne sont pas autoris??s ?? ??diter la facture
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
            
        // R??cup??rer les donn??es
        $row = FetchRow("prestation_spa", [
            'statut_prestation_spa' => 'Actif',
            'id_prestation_spa' => $clean_data["id_prestation_spa"]
        ], [ // les colonnes ?? afficher dans le modal "modifier"
            "date_fin_prestation_spa",
            "montant_prestation_spa",
        ]);

        if ($row === null) {
            echo json_encode([
                "status" => "failed",
                "menu"   => $menu,
                "action" => $action
            ]);
            exit;
        }
        $row['date_fin_prestation_spa'] = date('Y-m-d\TH:i', strtotime($row['date_fin_prestation_spa']));
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
    default:
        echo json_encode([
            "status" => "unknown_action",
            "menu"   => $menu,
            "action" => $action
        ]);
        exit;
}


// ----------------------------------- END ------------------------------------