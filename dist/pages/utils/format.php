<?php
// "format.php"
// Description
// Ce fichier contient des constantes et fonctions de formatage:
// th() FormatDatetime() ToolTip() ContenuToolTipAcces() ContenuToolTipAccesSauf()
// Ce fichier est importé dans "utils.php"
// TODO: dans FormatDatetime() - dans ContenuToolTipAcces()

// --------------------------------- IMPORT ----------------------------------
// require_once 'lang.php';
// --------------------- CONSTANTS & VARIABLES & CLASSES ---------------------
// -------------------------- FUNCTIONS DECLARATION --------------------------
// Permet d'afficher un <th> d'une colonne du DataTable
function th($nom_de_colonne) /* :string */ {
    return
    '<th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">' .
        $nom_de_colonne .
    '</th>';
}

// Formate en fonction de la langue de l'utilisateur, le datetime retourné par la base de données.
// Ex: FR: FormatDatetime("2021-07-03 14:23:12") --> "03 Juil 2021 à 14h23"
// EN: --> "Jul 03 2021 at 02:23 PM"
// TODO: "Jul 3rd..." Pouvoir ajouter la seconde, "le 10 Jan", afficher seulement la date, seulm l'heure
// Trouver une plus élégante façon de gérer AM-PM
function FormatDatetime($datetime) /* :string */ {
    global $LABELS_MONTHS_SHORT, $FORMAT_DATETIME;
    $datetime = strtotime($datetime);
    $data = [
        "%year"      => date('Y', $datetime),
        "%month"     => $LABELS_MONTHS_SHORT[(integer) date('m', $datetime)],
        "%day"       => date('d', $datetime),
        "%hour_24"   => date('H', $datetime),
        "%hour_12"   => date('h', $datetime),
        "%min"       => date('i', $datetime),
        // "%sec" => date('s', $datetime)
    ];
    
    if ($_SESSION['lang'] === 'EN') {
        $data["%suffix"] = 'AM';
        if ((integer) $data["%hour_24"] >= 12) {
            $data["%suffix"] = 'PM';
        }
    }
    return str_replace(array_keys($data), array_values($data), $FORMAT_DATETIME);
}

// Retourne les attributs html nécéssaires pour afficher un tooltip 
// Ex:<balise attr1="valeur1" attr2="valeur2" <?php echo Tooltip("left", "Bonjour"); ? >  >Text</balise>
function ToolTip($position, $contenu) /* :string */ {
    return ' data-toggle="tooltip" data-placement="' . $position . '" title="" data-original-title="' . $contenu . '" ';
}

// Retourne le contenu que doit avoir le tooltip qui décrit les rôles qui ont accès à une action
// ContenuToolTipAcces('all') veut dire que tous les rôles ont accès
// TODO: sprintf n roles: a, s, d et c.
function ContenuToolTipAcces(...$roles) /* string */ {
    global $ACCES, $MESSAGE_ACCES_TOUS_LES_ROLES, $LABEL_ROLES;
    if (count($roles) === 1 && $roles[0] === 'all') {
        return $ACCES . ": " . $MESSAGE_ACCES_TOUS_LES_ROLES . '.';
    }

    $labels_roles = [];
    foreach ($roles as $role_initial) {
        // convertir $role en minuscule. Retirer de $role tout charactère autre que a-z ou underscore
        $temp = str_split(strtolower($role_initial));
        $role = '';
        foreach($temp as $char) {
            if (ctype_alpha($char) or $char === '_') {
                $role .= $char;
            }
        }

        if (!in_array($role, ROLES)) {
            // return 'ERROR: ROLE INCONNU "' . $role_initial . '"';
            return null;
        }
        $labels_roles[] = $LABEL_ROLES[array_search($role, ROLES)];
    }
    return $ACCES . ": " . implode(', ', $labels_roles) . '.';
}

// Retourne le contenu que doit avoir le tooltip qui décrit que seul le rôle $role n'a pas accès à l'action
function ContenuToolTipAccesSauf($role) /* string */ {
    global $ACCES, $MESSAGE_ACCES_SAUF, $LABEL_ROLES;
    // convertir $role en minuscule. Retirer de $role tout charactère autre que a-z ou underscore
    $role_initial = $role;
    $temp = str_split(strtolower($role_initial));
    $role = '';
    foreach($temp as $char) {
        if (ctype_alpha($char) or $char === '_') {
            $role .= $char;
        }
    }

    if (!in_array($role, ROLES)) {
        // return 'Rôle inconnu: "' . $role . '"';
        return null;
    }
    return $ACCES . ": " . sprintf($MESSAGE_ACCES_SAUF, $LABEL_ROLES[array_search($role, ROLES)]);
}


function FormatBadgeFacture($facture) {
    global $OUI, $NON, $ANNULE;
    switch($facture) {
        case "Oui":
            return '<span class="badge badge-primary">'. $OUI .'</span>';
        case "Non":
            return '<span class="badge badge-danger">'. $NON .'</span>';
        case "Annulé":
            return '<span class="badge badge-warning">'. $ANNULE .'</span>';
        default:
            return $facture;
    }

}

