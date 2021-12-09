<?php
// "redirect.php"
// Description
// Ce fichier contient des constantes et fonctions de connexion, de vérification des droits d'accès
// et de redirection:
// URL_PAGE_CONNEXION - URL_TABLEAU_DE_BORD - ROLES
// IsConnected() IsNotConnected()         IsAllowed()            IsNotAllowed()
// Redirect()    RedirectIfNotConnected() RedirectIfNotAllowed() UserIs()       UserIsNot()
// Ce fichier est importé dans "utils.php"
// TODO: revoir URL_TABLEAU_DE_BORD - dans RedirectIfNotAllowed()

// --------------------------------- IMPORT ----------------------------------
// --------------------- CONSTANTS & VARIABLES & CLASSES ---------------------
const URL_PAGE_CONNEXION  = 'connexion.php';
const URL_TABLEAU_DE_BORD = 'tableau-de-bord-admin.php';
const ROLES = [ // ne pas inclure des espaces ni underscore, only a-z lowercases
    1   =>  'super_admin',
    2   =>  'admin',
    3   =>  'editeur',
    4   =>  'auteur',
    5   =>  'lecteur'
];


// -------------------------- FUNCTIONS DECLARATION --------------------------
// Redirige l'utilisateur vers $url
function Redirect($url) /* :void */ {
    try {
        header('location:' . $url);
        exit;
    } catch(Exception $e) {
        exit("ERROR: FAILED TO REDIRECT TO: " . $url);
    }
}

// Permet de vérifier si l'utilisateur s'est déjà connecté
// Retourne true ou false
function IsConnected() /* :bool */ {
    return isset($_SESSION['type_compte']);
}

// Existe juste pour ne pas écrire !IsConnected()
function IsNotConnected() /* :bool */ {
    return !isset($_SESSION['type_compte']);
}

// Redirige l'utilisateur vers $url s'il n'est pas connecté
// Si aucune $url n'est spécifié, URL_PAGE_CONNEXION sera utilisée par défaut
function RedirectIfNotConnected($url=URL_PAGE_CONNEXION) /* :void */ {
    if (IsNotConnected()) {
        Redirect($url);
    }
}

// Permet de vérifier si l'utilisateur a le droit d'accéder aux menus listés
// Ex: IsAllowed("type_chambre", "chambre", "facture_chambre") retourne true si et seulement si 
// l'utilisateur a accès aux menus type_chambre, chambre et facture_chambre 
function IsAllowed(...$menus) /* :bool */ {
    foreach($menus as $menu) {
        // $_SESSION['menu_type_chambre'] === 'Actif' ??
        if (!isset($_SESSION['menu_' . $menu]) || ($_SESSION['menu_' . $menu] !== 'Actif')) {
            return false;
        }
    }
    return true;
}

// Permet de vérifier si l'utilisateur a le droit d'accéder aux menus listés
// Ex: IsNotAllowed("type_chambre", "chambre", "facture_chambre") retourne true si 
// l'utilisateur n'a pas accès à l'un des menus: type_chambre, chambre et facture_chambre 
function IsNotAllowed(...$menus) /* :bool */ {
    foreach($menus as $menu) {
        // $_SESSION['menu_type_chambre'] === 'Actif' ??
        if (!isset($_SESSION['menu_' . $menu]) || ($_SESSION['menu_' . $menu] !== 'Actif')) {
            return true;
        }
    }
    return false;
}

// Redirige l'utilisateur vers $url s'il n'est pas autorisé à accéder
// au menu $menu. On ne peut pas lister plusieurs menus comme dans IsAllowed().
// Si l'url n'est pas spécifiée, l'utilisateur sera par défaut redirigé vers son tableau de bord.
// TODO: Gérer les tableaux de bord plus tard. Pour l'instant on utilise URL_TABLEAU_DE_BORD comme url par defaut
// On ne peut pas lister plusieurs menus. Est-ce okay?
function RedirectIfNotAllowed($menu, $url=URL_TABLEAU_DE_BORD) /* :void */ {
    if (IsNotAllowed($menu)) {
        Redirect($url);
    }
}

// Permet de vérifier si l'utilisateur a un des rôles listés
// Ex: UserIs("super_admin", "admin") retourne true si l'utilisateur est un Super Administrateur,
// ou un Administrateur
function UserIs(...$roles) /* :bool|null */ {
    if (!isset($_SESSION['type_compte'])) {
    // if (isNotConnected()) {
        return null;
    }

    $user_role = ROLES[$_SESSION['type_compte']];
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
        if ($role === $user_role) {
            return true;
        }
    }
    return false;
}

// Retourne true si l'utilisateur n'a aucun des rôles listés
// Ex: UserIsNot("super_admin", "admin") retourne true si l'utilisateur est un éditeur
// un auteur, ou un lecteur
function UserIsNot(...$roles) /* :bool|null */ {
    if (!isset($_SESSION['type_compte'])) {
    // if (isNotConnected()) {
        return null;
    }

    $user_role = ROLES[$_SESSION['type_compte']];
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
        if ($role === $user_role) {
            return false;
        }
    }
    return true;
}


