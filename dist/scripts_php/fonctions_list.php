<?php

// include('../lang/fr-lang.php');

function fill_type_chambre_list($connect)
{
    $query = "
	SELECT * FROM type_chambre 
	WHERE statut_type_chambre = 'Actif' 
	ORDER BY nom_type_chambre ASC 
	";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id_type_chambre"].'">'.$row["nom_type_chambre"].'</option>';
    }
    return $output;
}

function fill_client_list($connect)
{
    $query = "
	SELECT id_client, nom_personne, prenom_personne
    FROM client, personne
    WHERE personne.id_personne = client.id_personne_fk_client 
	ORDER BY nom_personne ASC 
	";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id_client"].'">'.$row["nom_personne"]. ' '. $row["prenom_personne"] . '</option>';
    }
    return $output;
}

function fill_type_plat_list($connect)
{
    $query = "
    SELECT * FROM type_plat 
    WHERE statut_type_plat = 'Actif' 
    ORDER BY nom_type_plat ASC 
    ";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id_type_plat"].'">'.$row["nom_type_plat"].'</option>';
    }
    return $output;
}

function fill_salle_conf_list($connect)
{
    $query = "
    SELECT * FROM salle_conf 
    WHERE statut_salle_conf = 'Actif' 
    ORDER BY nom_salle_conf ASC 
    ";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id_salle_conf"].'">'.$row["nom_salle_conf"].'</option>';
    }
    return $output;
}

function fill_marque_voiture_list($connect)
{
    $query = "
    SELECT * FROM marque_voiture 
    WHERE statut_marque_voiture = 'Actif' 
    ORDER BY nom_marque_voiture ASC 
    ";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id_marque_voiture"].'">'.$row["nom_marque_voiture"].'</option>';
    }
    return $output;
}


function fill_carac_salle_list($connect)
{
    $query = "SELECT id_carac_conf, nom_carac_conf FROM carac_conf
    WHERE statut_carac_conf = 'Actif'
    ORDER BY nom_carac_conf ASC
	";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id_carac_conf"].'">'. $row["nom_carac_conf"] .'</option>';
    }
    return $output;
}


function fill_service_conf_list($connect)
{
    $query = "SELECT * FROM service_conf
    WHERE statut_service_conf = 'Actif'
    ORDER BY nom_service_conf ASC
	";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id_service_conf"].'">'. $row["nom_service_conf"] .'</option>';
    }
    return $output;
}

function fill_methode_paiement_list($connect)
{
    $query = "SELECT * FROM methode_paiement
    WHERE statut_methode_paiement = 'Actif'
    ORDER BY nom_methode_paiement
	";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id_methode_paiement"].'">'. $row["nom_methode_paiement"] .'</option>';
    }
    return $output;
}

function fill_soins_spa_list($connect)
{
    $query = "SELECT * FROM soins_spa
    WHERE statut_soins_spa = 'Actif'
    ORDER BY nom_soins_spa
	";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id_soins_spa"].'">'. $row["nom_soins_spa"] .'</option>';
    }
    return $output;
}



function count_reserv_attente($connect)
{
	$statement = $connect->prepare("
    SELECT id_reservation, date_debut_reservation, date_fin_reservation, nom_type_chambre, nom_chambre, nom_client, prenom_client, tarif_montant_chambre_reservee, statut_reservation
    FROM reservation, client, chambre_reservee, type_chambre, chambre
    WHERE reservation.id_client_fk_reservation = client.id_client
    AND chambre_reservee.id_chambre_fk_chambre_reservee = chambre.id_chambre
    AND chambre_reservee.id_reservation_fk_chambre_reservee = reservation.id_reservation
    AND chambre.id_type_chambre_fk_chambre = type_chambre.id_type_chambre
    AND statut_reservation = 'En attente' 
    ");
	$statement->execute();
	return $statement->rowCount();
}











// // // STATISTIQUES
// CARTE A
function carte_A($icon, $badge, $name, $tooltip, $value, $id) {
    return 
    '<div class="col-lg-3 col-md-6 col-sm-6 col-12" >
    <div class="card card-statistic-1" id="'. $id .'">
      <div class="card-icon '. $badge .'">
        <i class="'. $icon .'"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4 data-toggle="tooltip" data-placement="top" title="" data-original-title="'. $tooltip .'">'. $name .'</h4>
        </div>
        <div class="card-body">
        '. $value .'
        </div>
      </div>
    </div>
  </div>
  ';
}

// Functions pour compter les élements dans la base de données
function formatCond($list_cond_val) {
    if (count($list_cond_val) == 0) {
        return '';
    }

    $where = ' WHERE '; $eq = ' = '; $and = ' AND ';
    $result = '';
    foreach ($list_cond_val as $key => $elem) {
        switch (true) {
            case $key == 0:
                $result .= $where . $elem;
                break;
            case $key % 2 == 0;
                $result .= $and . $elem;
                break;
            default:
                $result .= $eq . '\'' . $elem . '\'';
                break;
        }

    }
    return $result;
}

function processCount($query) {
    global $connect;
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count = '';
    foreach($result as $row) {
        $count = $row[0];
    }
    return $count;
}

// cette fonction compte le nombre d'élements de la table $db_table qui remplissent la condition SQL $cond_str
// Ex: $cond_str = "WHERE statut_location_conf = 'Actif'"
function customRowCount($db_table, $cond_str) {
    $query = "
        SELECT COUNT(*)
        FROM " . $db_table . " " .
        $cond_str
    ;

    return processCount($query);
}

// la différence entre RowCount et customRowCount est que on passe à RowCount la liste des conditions
// comme des variables
// Ex: RowCount('location_conf', 'statut_location_conf', 'Actif', 'facture_location_conf', 'Non')
function RowCount($db_table, ...$cond) {
    return customRowCount($db_table, formatCond($cond));
}

// compte les salles de conférence disponibles actuellement
function countSalleDispoConf() {
    $query = "SELECT COUNT(*) FROM 
    (SELECT id_salle_conf FROM salle_conf
    WHERE statut_salle_conf = 'Actif'
    AND id_salle_conf NOT IN
        (SELECT DISTINCT id_salle_conf_fk_location_conf FROM location_conf
        WHERE statut_location_conf = 'Actif'
        AND (date_debut_location_conf < CURRENT_TIMESTAMP AND CURRENT_TIMESTAMP < date_fin_location_conf)
        )
    ) AS salles_dispo";

    return processCount($query);
}

// compte le nombre de location de salles de conférence avec des services additionnels
function countLocationConfWithServiceAddi() {
    $query = "SELECT COUNT(*) FROM
    (SELECT DISTINCT id_location_conf FROM location_conf, assoc_location_conf_and_service_conf
    WHERE location_conf.id_location_conf = assoc_location_conf_and_service_conf.id_location_conf_fk_assoc_location_conf_and_service_conf
    AND statut_location_conf = 'Actif'
    -- GROUP BY id_location_conf
    ) AS with_service_addi";

    return processCount($query);
}


// cette fonction sera appelée depuis le fichier principal
function fill_count_conf($param) {
    switch($param) {
        case 'total_location': // et si la facture est annulée? // et si la location n'est pas encore éffectuée?
            return RowCount('location_conf', 'statut_location_conf', 'Actif');
        case 'total_salle':
            return RowCount('salle_conf', 'statut_salle_conf', 'Actif');
        case 'total_carac':
            return RowCount('carac_conf', 'statut_carac_conf', 'Actif');
        case 'total_service':
            return RowCount('service_conf', 'statut_service_conf', 'Actif');
        case 'location_sans_facture':
            return RowCount('location_conf', 'statut_location_conf', 'Actif', 'facture_location_conf', 'Non');
        case 'location_sans_prix':
            return customRowCount('location_conf', 'WHERE statut_location_conf = \'Actif\' AND prix_location_conf IS NULL');
        case 'salle_dispo':
            return countSalleDispoConf();
        case 'location_avec_service_addi': // et si le service n'est plus actif?
            return countLocationConfWithServiceAddi();
    }
}






// // // TOP ITEMS
// une ligne de la carte
function carteTopItem($max, $value, $title_str, $value_str) {
    $percent = (double) $value * 100 / (double) $max;

    return '
    <div class="mb-4" >
        <div class="text-small float-right font-weight-bold text-muted">'. $value_str .'</div>
        <div class="font-weight-bold mb-1">'. $title_str .'</div>
        <div class="progress" data-height="3" style="height: 3px;">
            <div class="progress-bar" role="progressbar" data-width="'. $percent .'%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '. $percent .'%;"></div>
        </div>                          
    </div>
    ';
}

// toutes les lignes de la carte
function formatCarteTop($max, ...$items) {
    $result = '';
    foreach ($items as $item) {
        $result .= carteTopItem($max, ...$item);
    }
    return $result;
}

// retourne la condition sur la periode
function formatCondPeriode($periode, $date_column) {
    switch ($periode) {
        case 'all':
            return '';
        case '1_an':
            $date = new DateTime();
            $date->sub(new DateInterval('P11M'));
            $date = $date->format('Y-m') . '-01 00:00:00';
            break;
        case '6_mois':
            $date = new DateTime();
            $date->sub(new DateInterval('P5M'));
            $date = $date->format('Y-m') . '-01 00:00:00';
            break;
        case '3_mois':
            $date = new DateTime();
            $date->sub(new DateInterval('P2M'));
            $date = $date->format('Y-m') . '-01 00:00:00';
            break;
        case 'mois':
            $date = new DateTime();
            $date = $date->format('Y-m') . '-01 00:00:00';
            break;
        default:
            return '';
    }
    return " AND " . $date_column . " >= '" . $date . "' ";
}


// // TOP SERVICES ADDI
const MAX_NUMBER_TOP_SERVICE_ADDI = 7;

// récupérer la liste des services additionnels avec le nombre de fois que chacun a été demandé dans des locations
function getTopServiceAddi($periode) {
    $cond_periode = formatCondPeriode($periode, 'date_fin_location_conf');
    $query = "SELECT nom_service_conf, COUNT(*) AS num
    FROM service_conf, location_conf, assoc_location_conf_and_service_conf
    WHERE service_conf.id_service_conf = assoc_location_conf_and_service_conf.id_service_conf_fk_assoc_location_conf_and_service_conf
    AND location_conf.id_location_conf = assoc_location_conf_and_service_conf.id_location_conf_fk_assoc_location_conf_and_service_conf
    AND statut_location_conf = 'Actif'
    AND statut_service_conf = 'Actif'
    ". $cond_periode ."
    GROUP BY nom_service_conf
    ORDER BY num DESC
    LIMIT ". MAX_NUMBER_TOP_SERVICE_ADDI;

    global $connect;
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $items = [];
    foreach($result as [$name, $count]) {
        $items[] = ['name' => $name, 'count' => $count];
    }
    return $items;
}

// cette fonction sera appelée par le fichier principal
function fill_top_service_addi($periode){
    if ($_SESSION['lang'] == 'EN') {
        $str_first_top_service = MODEL_FIRST_TOP_SERVICE_STAT_CONF_EN;
        $message_aucun_service_addi = MESSAGE_AUCUN_SERVICE_ADDI_STAT_CONF_EN;
    } else {
        $str_first_top_service = MODEL_FIRST_TOP_SERVICE_STAT_CONF_FR;
        $message_aucun_service_addi = MESSAGE_AUCUN_SERVICE_ADDI_STAT_CONF_FR;
    }

    $raw_items = getTopServiceAddi($periode);
    if (count($raw_items) == 0) {
        return $message_aucun_service_addi;
    }

    $items = [];
    $first = true;
    foreach($raw_items as $raw_item) {
        $value_str = $raw_item['count'];
        if ($first) {
            $value_str = sprintf($str_first_top_service, $raw_item['count']);
            $first = false;
        }

        $items[] = [(integer) $raw_item['count'], $raw_item['name'], $value_str];
    }

    $max = $raw_items[0]['count'];
    // $total_number_location = (integer) RowCount('location_conf', 'statut_location_conf', 'Actif');
    return formatCarteTop($max, ...$items);
}


// // TOP CLIENT SALLES DE CONFERENCE
const MAX_NUMBER_TOP_CLIENT_CONF = 10;

// récupérer la liste des meilleurs clients des salles de conférence, par revenu généré ou par nbre de location
function getTopClientConf($mode_selection, $periode) {
    $cond_periode = formatCondPeriode($periode, 'date_fin_location_conf');

    if ($mode_selection == 'montant') {$order_by = 'montant'; $cond_montant = ' AND prix_location_conf IS NOT NULL ';}
    else if($mode_selection == 'location') {$order_by = 'num'; $cond_montant = '';}

    $query = "SELECT nom_personne, prenom_personne, COUNT(*) AS num, SUM(prix_location_conf) AS montant
    FROM location_conf, client, personne
    WHERE location_conf.id_client_fk_location_conf = client.id_client
    AND client.id_personne_fk_client = personne.id_personne
    AND statut_location_conf = 'Actif'
    ". $cond_montant ."
    ". $cond_periode ."
    GROUP BY id_client_fk_location_conf
    ORDER BY ". $order_by ." DESC
    LIMIT ". MAX_NUMBER_TOP_CLIENT_CONF;

    global $connect;
    // include('../database_connection.php');
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $items = [];
    foreach($result as [$nom_client, $prenom_client, $count, $montant]) {
        $items[] = [
            'client'    =>  $nom_client . " " . $prenom_client,
            'count'     =>  $count,
            'montant'   =>  $montant
        ];
    }
    return $items;
}

// choisir un montant max proche du montant du premier client
// function setMaxMontant($largest_montant) {
//     $max = 10**ceil((log10($largest_montant)));
//     return $largest_montant <= $max/2 ?  $max/2 : $max;
// }

// cette fonction sera appelée par le fichier principal
function fill_top_client_conf($mode_selection, $periode) {
    if ($_SESSION['lang'] == 'EN') {
        $label_nbre_location_conf = LABEL_NBRE_LOCATION_STAT_CONF_EN;
        $label_montant_location_conf = '';
        $message_aucun_client = MESSAGE_AUCUN_CLIENT_STAT_CONF_EN;
    } else {
        $label_nbre_location_conf = LABEL_NBRE_LOCATION_STAT_CONF_FR;
        $label_montant_location_conf = '';
        $message_aucun_client = MESSAGE_AUCUN_CLIENT_STAT_CONF_FR;
    }

    $raw_items = getTopClientConf($mode_selection, $periode);
    if (count($raw_items) == 0) {
        return $message_aucun_client;
    }

    if ($mode_selection == 'montant') {
        $main_param = 'montant'; $second_param = 'count';
        $label_second_param = $label_nbre_location_conf;
        // $max = setMaxMontant((double) $raw_items[0]['montant']);
        // $max = 500000; // setMax
    } else {
        $main_param = 'count'; $second_param = 'montant';
        $label_second_param = $label_montant_location_conf;
        // $max = (integer) RowCount('location_conf', 'statut_location_conf', 'Actif');
    }

    $items = [];
    foreach($raw_items as $raw_item) {
        $title_str = $raw_item['client'];
        if ($raw_item[$second_param] != null) {
            $title_str .= ' ('. $raw_item[$second_param] . ' ' . $label_second_param . ')';
        }

        $items[] = [(integer) $raw_item[$main_param], $title_str, $raw_item[$main_param]];
    }

    $max = $raw_items[0][$main_param];
    return formatCarteTop($max, ...$items);
}

// print_r(fill_top_client_conf("montant", "mois"));




// // // GENERAL CHART
// retourne un array des noms des $n derniers mois 
function last_n_months($n) {
    if ($n > 12) {
        $arr = last_n_months($n - 12);
        array_push($arr, ...last_n_months(12));
        return $arr;
    }

    if ($n == 0) {
        return [];
    }

    // 0 < n <= 12
    $current_month = (integer) date('m');
    $starting_month = max($current_month - $n, 0) + 1;

    if ($_SESSION['lang'] == 'EN') {
        $MONTHS = MONTHS_EN;
    } else {
        $MONTHS = MONTHS_FR;
    }
    $months = array_slice($MONTHS, $starting_month, $current_month - $starting_month + 1);
    if ($current_month < $n) {
        array_unshift($months, ...array_slice($MONTHS, $current_month - $n));
    }

    return $months;
}

// retourne un array des $n dernières années
function last_n_years($n) {
    $current_year = (integer) date('Y');
    $result = [];
    for ($i = 0; $i < $n; $i++) {
        array_unshift($result, $current_year - $i);
    }
    return $result;
}

// retourne l'année et le mois du mois précedent
// Ex: previousYearMonth(2020, 01) = [2019, 12]
function previousYearMonth($year, $month) {
    $min_month = 1; $max_month = 12;
    return $month == $min_month ? [$year - 1, $max_month] : [$year, $month - 1];
}

// retourne [$year_diff, $month_diff]: la difference de date entre la plus ancienne location et aujourd'hui
function dateDiffFromOldestTillToday($cond_salle = '', $to_execute = null) {
    $query = "SELECT DATE_FORMAT(date_fin_location_conf, '%Y') AS annee,
        DATE_FORMAT(date_fin_location_conf, '%m') AS mois
    FROM location_conf
    WHERE statut_location_conf = 'Actif'
    ". $cond_salle ."
    ORDER BY date_fin_location_conf
    LIMIT 1";

    global $connect;
    // include('../database_connection.php');
    $statement = $connect->prepare($query);
    if ($to_execute != null) {
        $statement->execute($to_execute);
    } else {
        $statement->execute();
    }
    $result = $statement->fetchAll();

    if (count($result) == 0) {
        // aucune location
        return [0, 0];
    }

    $year = ''; $month = '';
    foreach($result as $row) {
        $year = $row['annee'];
        $month = $row['mois'];
    }
    $temp_year = (integer) date('Y');
    $temp_month = (integer) date('m');
    if ($year > $temp_year || ($year == $temp_year && $month > $temp_month)) {
        // la première location finit à une date ultérieure, Que Faire?
        return [0, 0];
    }
    if ($year == $temp_year && $month == $temp_month) {
        // la plus ancienne location finit ce mois-ci
        return [1, 1];
    }

    $nb_of_months = 2;
    $nb_of_years = 1;
    while (previousYearMonth($temp_year, $temp_month) != [$year, $month]) {
        $nb_of_months++;

        $prev_year = $temp_year;
        [$temp_year, $temp_month] = previousYearMonth($temp_year, $temp_month);
        if ($prev_year != $temp_year) {
            $nb_of_years++;
        }
    }
    return [$nb_of_years, $nb_of_months];
}

// cette fonction sera appelée depuis le fichier principal
// elle retourne les infos nécessaires pour afficher le graphe
function fetch_general_chart_conf($periode = 'all', $salles = 'all', $mode_selection = 'montant') {
    if ($_SESSION['lang'] == 'EN') {
        $label_par_montant = LABEL_PAR_MONTANT_CONF_EN;
        $label_par_nbre_location = LABEL_PAR_NBRE_LOCATION_CONF_EN;
    } else {
        $label_par_montant = LABEL_PAR_MONTANT_CONF_FR;
        $label_par_nbre_location = LABEL_PAR_NBRE_LOCATION_CONF_FR;
    }

    // le label
    if ($mode_selection == 'montant') {$label = $label_par_montant;}
    else if ($mode_selection == 'location') {$label = $label_par_nbre_location;}


    // le type de graphe
    if ($mode_selection == 'montant') {$type = 'line';}
    else if ($mode_selection == 'location') {$type = 'bar';}


    if ($salles != 'all') {
        $cond_salle = 'AND id_salle_conf_fk_location_conf = :id_salle';
        $to_execute = [':id_salle' => $salles]; // à changer, afficher plusieures salles en même temps 
    } else {
        $cond_salle = '';
        $to_execute = null;
    }
    
    // les labels (x-axis)
    {
        [$year_diff, $month_diff] = dateDiffFromOldestTillToday($cond_salle, $to_execute); 
        if ($month_diff == 0) {
            return null;
        }

        $labels_type = 'months';
        switch ($periode) {
            case 'all':
                if ($month_diff > 12) {
                    $labels = last_n_years($year_diff);
                    $labels_type = 'years';
                } else {
                    $labels = last_n_months($month_diff);
                }
                break;
            case '1_an':
                $labels = last_n_months(min(12, $month_diff));
                // if ($month_diff > 12) {
                //     $labels = last_n_months(12);
                // } else {
                //     $labels = last_n_months($month_diff);
                // }
                break;
            case '6_mois':
                $labels = last_n_months(min(6, $month_diff));
                break;
        }
    }

    // data
    {
        $cond_periode = formatCondPeriode($periode, 'date_fin_location_conf');
        // data - MONTANT
        if ($mode_selection == 'montant')
        {
            // prendre montant ttc si facture
            $query_months = "SELECT
                YEAR(date_fin_location_conf) AS annee,
                MONTH(date_fin_location_conf) AS mois,
                SUM(prix_location_conf) AS montant,
                DATE_FORMAT(date_fin_location_conf, '%Y-%m') AS year_and_month
            FROM location_conf
            WHERE statut_location_conf = 'Actif'
            AND prix_location_conf IS NOT NULL
            ". $cond_periode ."
            ". $cond_salle ."
            GROUP BY year_and_month
            ORDER BY year_and_month
            ";

            $query_years = "SELECT
                YEAR(date_fin_location_conf) AS annee,
                SUM(prix_location_conf) AS montant
            FROM location_conf
            WHERE statut_location_conf = 'Actif'
            AND prix_location_conf IS NOT NULL
            ". $cond_periode ."
            ". $cond_salle ."
            GROUP BY annee
            ORDER BY annee
            ";

        }
        // data - NBRE DE LOCATION
        else if ($mode_selection == 'location')
        {
            $query_months = "SELECT
                YEAR(date_fin_location_conf) AS annee,
                MONTH(date_fin_location_conf) AS mois,
                COUNT(id_location_conf) AS montant,
                DATE_FORMAT(date_fin_location_conf, '%Y-%m') AS year_and_month
            FROM location_conf
            WHERE statut_location_conf = 'Actif'
            ". $cond_periode ."
            ". $cond_salle ."
            GROUP BY year_and_month
            ORDER BY year_and_month
            ";

            $query_years = "SELECT
                YEAR(date_fin_location_conf) AS annee,
                COUNT(id_location_conf) AS montant
            FROM location_conf
            WHERE statut_location_conf = 'Actif'
            ". $cond_periode ."
            ". $cond_salle ."
            GROUP BY annee
            ORDER BY annee
            ";
        }

        if ($labels_type == 'years') {$query = $query_years;} else {$query = $query_months;}
        global $connect;
        // include('../database_connection.php');
        $statement = $connect->prepare($query);
        if ($salles != 'all') {$statement->execute($to_execute);} else {$statement->execute();}

        if ($statement->rowCount() == 0) {
            return null;
        } else {
            $result = $statement->fetchAll();
            $data = [];
            if ($labels_type == 'years') {
                $prev_year = '';
                foreach ($result as ['annee' => $year, 'montant' => $montant]) {
                    // fill between
                    $temp_year = $year;
                    while ($prev_year != '' && $prev_year != ($temp_year - 1)) {
                        $data[] = '0';
                        $temp_year = $temp_year - 1;
                    }

                    $data[] = $montant;
                    $prev_year = $year;
                }
                
                // fill after
                $temp_year = date('Y');
                if ($prev_year != $temp_year) {
                    $data[] = '0';
                    while ($prev_year != ($temp_year - 1)) {
                        $data[] = '0';
                        $temp_year = $temp_year - 1;
                    }
                }

                // fill before
                if (count($data) < count($labels)) {
                    array_unshift(  $data,
                                    ...array_fill(0, count($labels) - count($data), 0)
                    );
                }

                // use only the last count($labels) values
                $data = array_slice($data, -count($labels));
                
            } else {
                [$prev_year, $prev_month] = ['', ''];
                foreach($result as ['annee' => $year, 'mois' => $month, 'montant' => $montant]) {
                    // fill between
                    [$temp_year, $temp_month] = [$year, $month];
                    while ([$prev_year, $prev_month] != ['', ''] && [$prev_year, $prev_month] != previousYearMonth($temp_year, $temp_month)) {
                        $data[] = '0';
                        [$temp_year, $temp_month] = previousYearMonth($temp_year, $temp_month);
                    }

                    $data[] = $montant;
                    [$prev_year, $prev_month] = [$year, $month];
                }
                
                [$temp_year, $temp_month] = [date('Y'), date('m')];
                if ([$prev_year, $prev_month] != [$temp_year, $temp_month]) {
                    $data[] = '0';
                    // fill after
                    while ([$prev_year, $prev_month] != previousYearMonth($temp_year, $temp_month)) {
                        $data[] = '0';
                        [$temp_year, $temp_month] = previousYearMonth($temp_year, $temp_month);
                    }
                }

                // fill before
                if (count($data) < count($labels)) {
                    array_unshift(  $data,
                                    ...array_fill(0, count($labels) - count($data), 0)
                    );
                }

                // use only the last count($labels) values
                $data = array_slice($data, -count($labels));
            }

        }

    }

    // step_size
    $step_size = 10 ** (integer) log10(max($data)); // revoir le cas nbre de location
    if ($step_size == max($data)){ $step_size = $step_size / 10;}

    return [$type, $label, $labels, $data, $step_size];
}

// var_dump(fetch_general_chart_conf('6_mois', '19', 'location'));


// la liste des salles formattées pour être insérée dans un dropdown
function fill_salle_header_actions(){
    $query = "
    SELECT * FROM salle_conf 
    WHERE statut_salle_conf = 'Actif' 
    ORDER BY nom_salle_conf ASC
    ";
    global $connect;
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach($result as $row)
    {
        $output .= '<li><a href="#" class="dropdown-item" data-id_salle="'.$row['id_salle_conf'].'">'.$row['nom_salle_conf'].'</a></li>';
    }
    return $output;
}



