<?php
// "db.php"
// Description
// Ce fichier contient des constantes et fonctions liées à l'interaction avec la base de données:
// Insert() ExecuteQuery() CountRow() CustomCountRow() FormatConditions() FetchRow() 
// Ce fichier est importé dans "utils.php"
// TODO: dans Insert() - 
// TODO: function FetchAll() - customFetchRow() - customFetchAll

// --------------------------------- IMPORT ----------------------------------
require_once('../database_connection.php');

// --------------------- CONSTANTS & VARIABLES & CLASSES ---------------------
// -------------------------- FUNCTIONS DECLARATION --------------------------
// Insère $data dans la table $db_table et retourne le id de l'élément inséré c-a-d lastInsertId()
// Elle retourne null si une erreur survient
// Ex: Insert('user' , [
//     'nom_user' => 'MAHOUSSOU',
//     'prenom_user' => 'Robert',
//     'mdp_user' => hash(1234)
// ]);
// Pour afficher les erreurs donner la valeur true à la variable optionelle $debug
// TODO: Insérer plusieurs rows à la fois? Insérer dans plusieurs tables à la fois?
function Insert($db_table, $data, $debug=false) /* :string|null */ {
    $columns = implode(', ' , array_keys($data));
    $markers_arr = array_map( function($str) {return ':' . $str;}, array_keys($data));
    $markers = implode(', ', $markers_arr);

    $query = "INSERT INTO $db_table ($columns) VALUES ($markers)";
    // echo $query;
    global $connect;
    $statement = $connect->prepare($query);
    if ($statement === false) {
        if ($debug) {
            return 'ERROR: FAILED TO PREPARE PDO STATEMENT FROM <br>
            $query: "' . $query . '"';
        }
        return null;
    }
    
    $to_execute = array_combine($markers_arr, array_values($data));
    $successful = $statement->execute($to_execute);
    if ($successful === false) {
        if ($debug) {
            return 'ERROR: FAILED TO EXECUTE PDO STATEMENT FROM <br>
            $query: "' . $query . '" <br>
            AND $array: "'. $to_execute . '"';
        }
        return null;
    }

    return $connect->lastInsertId();
}



// Execute la requête $query et retourne le résultat: $statement->fetchAll()
// Si la requête contient des placeholders, passer le array des valeurs: $to_execute
// Ex: $query = "SELECT * FROM soins_spa WHERE id_soins_spa = :id"; $to_execute = [":id" => "3"];
// Pour afficher les erreurs donner la valeur true à la variable optionelle $debug
function ExecuteQuery($query, $to_execute=[], $debug=false) /* :array|null */ {
    global $connect;
    $statement = $connect->prepare($query);
    if ($statement === false) {
        if ($debug) {
            return 'ERROR: FAILED TO PREPARE PDO STATEMENT FROM <br>
            $query: "' . $query . '"';
        }
        return null;
    }

    $successful = $statement->execute($to_execute);
    if ($successful === false) {
        if ($debug) {
            return 'ERROR: FAILED TO EXECUTE PDO STATEMENT FROM <br>
            $query: "' . $query . '" <br>' .
            'AND $array: "'. $to_execute . '"';
        }
        return null;
    }

    $result = $statement->fetchAll();
    if ($result === false) {
        if ($debug) {
            return 'ERROR: FAILED TO FETCH RESULT FROM STATEMENT FROM <br>
            $query: "' . $query . '" <br>' .
            'AND $array: "'. $to_execute . '"';
        }
        return null;
    }

    return $result;
}


// Compte le nombre de lignes de la table $db_table qui remplissent les conditions $conds
// $conds est un array. $conds est optionnel
// Ex: CountRow("soins_spa", ["id_soins_spa" => "3", "statut_soins_spa" => "Actif"]);
// Ex: CountRow("soins_spa");
function CountRow($db_table, $conds=[]) /* :string|null */ {
    return CustomCountRow($db_table, FormatConditions(array_keys($conds)), $conds);
}

// Compte le nombre de lignes de la table $db_table qui remplissent les conditions dans $cond_str
// $cond_str est une chaîne de charactères. $cond_str et $to_execute sont optionnels
// Ex: CustomCountRow("soins_spa", "WHERE id_soins_spa = :id", [":id" => "4"]);
// Ex: CustomCountRow("soins_spa");
function CustomCountRow($db_table, $cond_str="", $to_execute=[]) /* :string|null */ {
    $query = "
        SELECT COUNT(*) AS num
        FROM " . $db_table . " " .
        $cond_str
    ;
    $result = ExecuteQuery($query, $to_execute);
    if ($result === null) {
        return null;
    }

    return $result[0]['num'];
}

// Convertit le array des conditions en une chaîne de charactère qui sera concatenée à la requête
// FormatConditions utilise des placeholders (voir exemple).
// Ex: FormatCond(["id_soins_spa" => "3", "statut_soins_spa" => "Actif"]) -->
// "WHERE id_soins_spa = :id_soins_spa AND statut_soins_spa = :statut_soins_spa"
function FormatConditions($conds_arr) /* :string */ {
    if (count($conds_arr) == 0) {
        return '';
    }

    $where = ' WHERE '; $eq = ' = '; $and = ' AND ';
    $result = '';
    foreach ($conds_arr as $key => $elem) {
        if ($key == 0) {
            $result .= $where . $elem;
        } else {
            $result .= $and . $elem;
        }
        $result .= $eq . ' :' . $elem;
    }
    return $result;
}

// Fetch les colonnes $columns, de la ligne de la table $db_table qui remplit les conditions $conds
// Ex: FetchRow("soins_spa", ["id_soins_spa" => "3"], ["nom_soins_spa", "desc_soins_spa", "date_create_soins_spa"]);
function FetchRow($db_table, $conds, $columns=[]) /* :array|null */ {
    if (count($conds) === 0) {
        return null;
    } else {
        $cond_str = FormatConditions(array_keys($conds));
    }
    if (count($columns) === 0) {
        $columns_str = " * ";
    } else {
        $columns_str = " " . implode(", ", $columns) . " ";
    }
    $query = "SELECT " . $columns_str .
    "FROM " . $db_table .
    $cond_str;
    // echo $query;
    $result = ExecuteQuery($query, $conds);
    if ($result === null || count($result) === 0) {
        return null;
    }

    $row = [];
    // fetch seulement le premier row
    foreach($result[0] as $key => $value) {
        // corriger les bêtises de php: retirer les éléments de $result[0] qui ont les indexes: 0, 1, 2, ...
        if (gettype($key) !== 'integer') {
            $row[$key] = $value;
        }
    }
    return $row;
}




function Update($db_table, $conds, $data, $debug=false) /* :string|null */ {
    $set_arr = array_map( function($str) {return $str .  ' = :' . $str;}, array_keys($data));
    $set = implode(", ", $set_arr);
    $cond_str = FormatConditions(array_keys($conds));

    $query = "UPDATE $db_table SET $set $cond_str";
    // echo $query;
    global $connect;
    $statement = $connect->prepare($query);
    if ($statement === false) {
        if ($debug) {
            return 'ERROR: FAILED TO PREPARE PDO STATEMENT FROM <br>
            $query: "' . $query . '"';
        }
        return null;
    }
    
    // $markers_arr = array_map( function($str) {return ':' . $str;}, array_keys($data));
    // $to_execute = array_combine($markers_arr, array_values($data));
    $to_execute = $data;
    // si la clé se retrouve 2 fois?
    foreach($conds as $key => $value) {
        $to_execute[$key] = $value;
    }
    // var_dump($to_execute);
    $successful = $statement->execute($to_execute);
    if ($successful === false) {
        if ($debug) {
            return 'ERROR: FAILED TO EXECUTE PDO STATEMENT FROM <br>
            $query: "' . $query . '" <br>
            AND $array: "'. $to_execute . '"';
        }
        return null;
    }

    return true;
    // return $connect->lastInsertId();
}

// var_dump(Update('soins_spa', [
//     'id_soins_spa' => '5',
//     'statut_soins_spa' => 'Actif'
// ], ['nom_soins_spa' => 'tom',
// 'desc_soins_spa' => 'jerry'],
// true));
