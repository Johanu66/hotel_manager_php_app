<?php
//location_conf_action.php

include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_sql.php');
include('../scripts_php/utils.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');


// $debut et $fin sont des strings
function dateDiff($debut, $fin){
    $debut = date_create($debut);
    $fin = date_create($fin);
    if ($fin <= $debut) {
        return '0';
    }
    return date_diff($debut, $fin) -> format('%a') + 1; //par défaut vs par excès
}

// formatter les datetime
if ($_SESSION['lang'] == 'EN') {
    $MONTHS_SHORT = MONTHS_SHORT_EN;
} else {
    $MONTHS_SHORT = MONTHS_SHORT_FR;
}
function formatDatetime($datetime, $lang) {
    $datetime = strtotime($datetime);
    $day = date('d', $datetime);
    $month = date('m', $datetime);
    $year = date('Y', $datetime);
    $hour_12 = date('h', $datetime);
    $hour_24 = date('H', $datetime);
    $min = date('i', $datetime);
    // $sec = date('s', $datetime);
    global $MONTHS_SHORT;

    $format_fr = '%s %s %s à %sh%s';
    $format_en = '%s %s %s at %s:%s %s';
    if ($lang == 'FR') {
        return sprintf($format_fr, $day, $MONTHS_SHORT[(integer) $month], $year, $hour_24, $min);
    } else if ($lang == 'EN') {
        $suffix = 'AM';
        if ((integer) $hour_24 >= 12) {
            $suffix = 'PM';
        }
        return sprintf($format_en, $MONTHS_SHORT[(integer) $month], $day, $year, $hour_12, $min, $suffix);
    }
    return '';
}


function getClientFromId($id_client) {
    $query = "SELECT nom_personne, prenom_personne
    FROM personne, client
    WHERE personne.id_personne = client.id_personne_fk_client
    AND id_client = :id_client
    ";
    global $connect;
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id_client'    =>  $id_client
        )
    );

    $result = $statement->fetchAll();
    foreach($result as $row) {
        $client = $row['nom_personne'] . ' ' . $row['prenom_personne'];
    }

    return $client;
}


if(isset($_POST['btn_action']))
{
    /* Enregistrer */
    if($_POST['btn_action'] == 'Enregistrer')
    {
        // echo json_encode($_POST);
        // exit;

        if (isset($_POST['nouveau_client']) && ($_POST['nouveau_client'] == 'on')) {
            // doublon client
            $query = "SELECT * FROM personne, client
            WHERE personne.id_personne = client.id_personne_fk_client
            AND tel_personne = :tel";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ":tel"          =>  $_POST['tel_client'],
                )
            );
            if ($statement->rowCount() > 0) {
                echo json_encode("Ce client existe déjà.");
                exit;
            }

            
            // insert personne
            $query = "INSERT INTO personne
            (nom_personne, prenom_personne, tel_personne, email_personne, id_card_personne, passeport_personne,
            date_create_personne, date_last_modif_personne, user_create_personne, user_last_modif_personne)
            VALUES(:nom, :prenom, :tel, :email, :id_card, :passeport,
            :date_create, :date_last_modif, :user_create, :user_last_modif)
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ":nom"          =>  $_POST['nom_client'],
                    ":prenom"       =>  $_POST['prenom_client'],
                    ":tel"          =>  $_POST['tel_client'],
                    ":email"        =>  $_POST['email_client'],
                    ":id_card"      =>  $_POST['id_card_client'],
                    ":passeport"    =>  $_POST['passeport_client'],
                    "date_create"         =>  date("Y-m-d H:i:s"),
                    "date_last_modif"     =>  date("Y-m-d H:i:s"),
                    "user_create"         =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                    "user_last_modif"     =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
                )
            );
            $id_personne = $connect->lastInsertId();

            // insert client
            $query = "INSERT INTO client
            (id_personne_fk_client)
            VALUES(:id_personne)
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ":id_personne"  =>  $id_personne,
                )
            );
            $id_client = $connect->lastInsertId();

        } else {
            $id_client = $_POST['nom_prenom_client'];
        }


        // Vérifier si la salle est déjà réservée pour cette période
        $query = "SELECT * FROM location_conf
        WHERE statut_location_conf = 'Actif'
        AND id_salle_conf_fk_location_conf = :id_salle
        AND (
            (date_debut_location_conf < :date_debut AND :date_debut < date_fin_location_conf)
            OR (date_debut_location_conf < :date_fin AND :date_fin < date_fin_location_conf) 
        )
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ":date_debut"   =>  $_POST['date_debut'],
                ":date_fin"     =>  $_POST['date_fin'],
                ":id_salle"     =>  $_POST['id_salle_conf_fk_location'],
            )
        );
        if ($statement->rowCount() > 0) {
            echo json_encode("La salle sélectionnée est indisponible à cette période.");
            exit;
        }


        // insert location_conf
        if ($_POST['prix_location_conf'] != "") {
            $prix = $_POST['prix_location_conf'];
        } else {
            $prix = null;
        }

        $query = "INSERT INTO location_conf
        (date_debut_location_conf, date_fin_location_conf, motif_location_conf, prix_location_conf,
        id_salle_conf_fk_location_conf, id_client_fk_location_conf,
        date_create_location_conf, date_last_modif_location_conf, user_create_location_conf, user_last_modif_location_conf)
        VALUES(:date_debut, :date_fin, :motif, :prix, :id_salle, :id_client,
        :date_create, :date_last_modif, :user_create, :user_last_modif)
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ":date_debut"   =>  $_POST['date_debut'],
                ":date_fin"     =>  $_POST['date_fin'],
                ":motif"        =>  $_POST['motif_location_conf'],
                ":prix"         =>  $prix,
                ":id_salle"     =>  $_POST['id_salle_conf_fk_location'],
                ":id_client"    =>  $id_client,
                "date_create"       =>  date("Y-m-d H:i:s"),
                "date_last_modif"   =>  date("Y-m-d H:i:s"),
                "user_create"       =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                "user_last_modif"   =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            )
        );
        $id_location = $connect->lastInsertId();


        // insert services additionnels
        if (count($_POST['id_service_conf']) > 0) {

            $query = "INSERT INTO assoc_location_conf_and_service_conf
            (id_location_conf_fk_assoc_location_conf_and_service_conf, id_service_conf_fk_assoc_location_conf_and_service_conf)
            VALUES ";
            
            $placeholders = "";
            $values = [];
            foreach($_POST['id_service_conf'] as $index => $id_service) {
                if ($id_service != ""){
                    if ($index != 0) {
                        $placeholders .= ", ";
                    }
                    $placeholders .= "(?, ?)";
    
                    array_push($values, $id_location, $id_service);    
                }
            }

            $query .= $placeholders;
            $statement = $connect->prepare($query);
            $statement->execute($values);
        }

        echo json_encode("La location a été enregistrée avec succès.");

        // Log
        switch ($_SESSION['type_compte']) {
            case 1:
                addlog("Enr-01-location-conf", $id_location, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Enr-02-location-conf", $id_location, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Enr-03-location-conf", $id_location, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Enr-04-location-conf", $id_location, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }

    }

    /* Delete */
    if($_POST['btn_action'] == 'delete')
    {
        $status = 'Inactif';

        update3('location_conf',
            'id_location_conf',$_POST["id_location_conf"],
            'statut_location_conf',$status,
            'date_del_location_conf', date("Y-m-d H:i:s"),
            'user_del_location_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );
        
        echo json_encode($status);
        

        // Log
        switch ($_SESSION['type_compte']) {
             case 1:
                 addlog("Chg-01-location-conf", $_POST["id_location_conf"]. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;
             case 2:
                 addlog("Chg-02-location-conf", $_POST["id_location_conf"]. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;                 
        }

    }

    /* Fetch Montant */
    if($_POST['btn_action'] == 'fetch_montant') {
        $query = "SELECT prix_location_conf FROM location_conf WHERE id_location_conf = :id_location_conf";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                'id_location_conf'  =>  $_POST['id_location_conf']
            )
        );
        $result = $statement->fetchAll();

        $montant_ht = '';
        foreach($result as $row) {
            $montant_ht = $row['prix_location_conf'];
        }

        $output = [
            'montant_ht'    =>  $montant_ht,
        ];
        echo json_encode($output);
        
    }


}


/* Consulter */
if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM location_conf, salle_conf
        WHERE location_conf.id_salle_conf_fk_location_conf = salle_conf.id_salle_conf
        AND id_location_conf = :id_location_conf";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_location_conf' => $_POST["id_location_conf_view"]
            )
        );
        $result = $statement->fetchAll();
        $output = '
    <div class="table-responsive">
      <table class="table table-boredered">
    ';

        foreach ($result as $row) {
            if ($_SESSION['lang'] == 'EN') {
                $label_salle = SALLE_LOCATION_CONF_EN;
                $label_date_debut = DATE_DEBUT_LOCATION_EN;
                $label_date_fin = DATE_FIN_LOCATION_EN;
                $label_duree = DUREE_LOCATION_CONF_EN;
                $label_motif = MOTIF_LOCATION_CONF_EN;
                $label_client = CLIENT_LOCATION_CONF_EN;
                $label_prix_ht = PRIX_LOCATION_CONF_EN;
                $label_services_addi = SERVICES_ADDI_LOCATION_CONF_EN;
                $label_facture = FACTURE_LOCATION_CONF_EN;
                $label_date_create = LABEL_DATE_CREATE_EN;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                $label_created_by = LABEL_CREATED_BY_EN;
                $oui = OUI_EN;
                $non = NON_EN;
                $prix_non_indiqué = PRIX_NON_INDIQUE_EN;
                $annule = ANNULE_EN;
            } else {
                $label_salle = SALLE_LOCATION_CONF_FR;
                $label_date_debut = DATE_DEBUT_LOCATION_FR;
                $label_date_fin = DATE_FIN_LOCATION_FR;
                $label_duree = DUREE_LOCATION_CONF_FR;
                $label_motif = MOTIF_LOCATION_CONF_FR;
                $label_client = CLIENT_LOCATION_CONF_FR;
                $label_prix_ht = PRIX_LOCATION_CONF_FR;
                $label_services_addi = SERVICES_ADDI_LOCATION_CONF_FR;
                $label_facture = FACTURE_LOCATION_CONF_FR;
                $label_date_create = LABEL_DATE_CREATE_FR;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                $label_created_by = LABEL_CREATED_BY_FR;
                $oui = OUI_FR;
                $non = NON_FR;
                $annule = ANNULE_FR;
                $prix_non_indiqué = PRIX_NON_INDIQUE_FR;
            }

    // duree(en jours)
    $duree = dateDiff($row['date_debut_location_conf'], $row['date_fin_location_conf']);

    // client
    $client = getClientFromId($row['id_client_fk_location_conf']);

    // prix_ht
    if ($row['prix_location_conf'] == null) {
        $prix = '<span class="badge badge-warning">' . $prix_non_indiqué . '</span>';
    } else {
        $prix = $row['prix_location_conf'];
    }



    //services additionnels
    $query0 = "SELECT * FROM service_conf, assoc_location_conf_and_service_conf
    WHERE service_conf.id_service_conf = assoc_location_conf_and_service_conf.id_service_conf_fk_assoc_location_conf_and_service_conf
    AND assoc_location_conf_and_service_conf.id_location_conf_fk_assoc_location_conf_and_service_conf = :id_location_conf
    "; //statut_service_conf

    $statement0 = $connect->prepare($query0);
    $statement0->execute(
        array(
            ':id_location_conf' => $_POST["id_location_conf_view"]
        )
    );

    if ($statement0->rowCount() > 0) {
        $result0 = $statement0->fetchAll();
        $services_addi = '';
        foreach($result0 as $index => $row0) {
            if ($index !== 0) {
                $services_addi .= ' <b style="color:black;"> | </b> ';
            }
            $services_addi .= $row0['nom_service_conf'];
        }
    } else {
        $services_addi = '<span class="badge badge-danger">'. $non .'</span>';
    }


    //facture
    if($row['facture_location_conf'] == 'Oui') {
        $facture_exist = true;
        $facture = '<center><span class="badge badge-primary">'. $oui .'</span></center>';
    } else if ($row['facture_location_conf'] == 'Annulé') {
        $facture_exist = true;
        $facture = '<center><span class="badge badge-warning">'. $annule .'</span></center>';
    } else {
        $facture_exist = false;
        $facture = '<center><span class="badge badge-danger">'. $non .'</span></center>';
    }

    if($row['facture_location_conf'] == 'Oui') {
        $facture = '<span class="badge badge-primary">'. $oui .'</span>';
    } else if ($row['facture_location_conf'] == 'Annulé') {
        $facture = '<span class="badge badge-warning">'. $annule .'</span>';
    } else {
        $facture = '<span class="badge badge-danger">'. $non .'</span>';
    }


    $output .= '
      <tr>
        <td>' . $label_salle . '</td>
        <td>' . $row["nom_salle_conf"] . '</td>
      </tr>
      <tr>
        <td>' . $label_date_debut . '</td>
        <td>' . formatDatetime($row['date_debut_location_conf'], $_SESSION['lang']) . '</td>
      </tr>
      <tr>
        <td>' . $label_date_fin . '</td>
        <td>' . formatDatetime($row['date_fin_location_conf'], $_SESSION['lang']) . '</td>
      </tr>
      <tr>
        <td>' . $label_duree . '</td>
        <td>' . $duree . '</td>
      </tr>
      <tr>
        <td>' . $label_client . '</td>
        <td>' . $client . '</td>
      </tr>
      <tr>
        <td>' . $label_motif . '</td>
        <td>' . $row["motif_location_conf"] . '</td>
      </tr>
      <tr>
        <td>' . $label_services_addi . '</td>
        <td>' . $services_addi . '</td>
      </tr>
      <tr>
        <td>' . $label_prix_ht . '</td>
        <td>' . $prix . '</td>
      </tr>
      <tr>
        <td>' . $label_facture . '</td>
        <td>' . $facture . '</td>
      </tr>
      <tr>
        <td>' . $label_date_create . '</td>
        <td>' . formatDatetime($row['date_create_location_conf'], $_SESSION['lang']) .  '</td>
      </tr>
      <tr>
        <td>' . $label_date_last_modif . '</td>
        <td>' . formatDatetime($row['date_last_modif_location_conf'], $_SESSION['lang']) .  '</td>
      </tr>
      <tr>
        <td>' . $label_created_by . '</td>
        <td>' . $row['user_create_location_conf'] . '</td>
      </tr>
      ';
        }


        $output .= '
      </table>
    </div>
    ';
        echo json_encode($output);

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Info-01-location-conf", $row["id_location_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-location-conf", $row["id_location_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-location-conf", $row["id_location_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-location-conf", $row["id_location_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-location-conf", $row["id_location_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
        

    }

}


// Nouvelle facture
if (isset($_POST['btn_action_new_facture']) && $_POST['btn_action_new_facture'] == 'New Facture') {

    // Vérifier si une facture de ce numero existe déjà
    $query = "SELECT * FROM facture_conf
    WHERE num_facture_conf = :num_facture";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':num_facture'  => $_POST['num_new_facture']
        )
    );
    $count = $statement->rowCount();

    if ($count > 0) {
        echo json_encode("Une facture porte déjà ce numéro.");
    } else {
        if (isset($_POST['select_tva_new_facture']) && ($_POST['select_tva_new_facture']== 'on')) {
            $tva_selected = 'Oui';
            $pourcentage_tva = $_POST['tva_new_facture'];
        } else {
            $tva_selected = 'Non';
            $pourcentage_tva = 0;
        }
        
        $methode_paiement = getMethodePaiement($_POST['methode_paiement_new_facture']);

        insert13('facture_conf',
        'num_facture_conf', $_POST['num_new_facture'],
        'date_facture_conf', $_POST['date_new_facture'],
        'methode_paiement_facture_conf',  $methode_paiement,
        'tva_facture_conf',  $tva_selected,
        'valeur_tva_facture_conf', $pourcentage_tva,
        'montant_ht_facture_conf' , $_POST['montant_ht_new_facture'],
        'montant_ttc_facture_conf',  $_POST['montant_ttc_new_facture'],
        'montant_ttc_en_lettre_facture_conf', $_POST['prix_en_lettres_new_facture'],
        'date_create_facture_conf', date("Y-m-d H:i:s"),
        'date_last_modif_facture_conf',date("Y-m-d H:i:s"),
        'user_create_facture_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
        'user_last_modif_facture_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
        'id_location_conf_fk_facture_conf', $_POST['id_location_conf_new_facture']
        );

        update3('location_conf',
        'id_location_conf', $_POST['id_location_conf_new_facture'],
        'date_last_modif_location_conf',date("Y-m-d H:i:s"),
        'user_last_modif_location_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
        'facture_location_conf', 'Oui'
        );

        echo json_encode('La facture a été éditée avec succes.');
        
        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("FacEdit-01-location-conf", $_POST['id_location_conf_new_facture'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("FacEdit-02-location-conf", $_POST['id_location_conf_new_facture'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("FacEdit-03-location-conf", $_POST['id_location_conf_new_facture'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("FacEdit-04-location-conf", $_POST['id_location_conf_new_facture'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("FacEdit-05-location-conf", $_POST['id_location_conf_new_facture'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
    }
}



if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {
        
        $query = "SELECT * FROM location_conf, salle_conf, client
        WHERE id_location_conf = :id_location_conf";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_location_conf'	=>	$_POST["id_location_conf_modif"]
            )
        );
        $result = $statement->fetchAll();

        $id_salle = '';
        $date_debut = '';
        $date_fin = '';
        $id_client = '';
        $motif = '';
        $prix_ht = '';


        foreach($result as $row)
        {
            $id_salle = $row['id_salle_conf_fk_location_conf'];
            $date_debut = date('Y-m-d\TH:i', strtotime($row['date_debut_location_conf']));
            $date_fin = date('Y-m-d\TH:i', strtotime($row['date_fin_location_conf']));
            $id_client = $row['id_client_fk_location_conf'];
            $motif = $row['motif_location_conf'];
            $prix_ht = $row['prix_location_conf'];
        }


        // Services Additionnels
        $query = "SELECT * FROM assoc_location_conf_and_service_conf, service_conf
        WHERE service_conf.id_service_conf = assoc_location_conf_and_service_conf.id_service_conf_fk_assoc_location_conf_and_service_conf
        AND id_location_conf_fk_assoc_location_conf_and_service_conf = :id_location_conf";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_location_conf'	=>	$_POST["id_location_conf_modif"]
            )
        );
        $result = $statement->fetchAll();

        $id_services_addi = [];
        $nom_services_addi = [];
        foreach($result as $row)
        {
            $id_services_addi[] = $row['id_service_conf_fk_assoc_location_conf_and_service_conf'];
            $nom_services_addi[] = $row['nom_service_conf'];

        }


        $output = array(
            'id_salle' => $id_salle,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'id_services_addi' => $id_services_addi,
            'nom_services_addi' => $nom_services_addi,
            'id_client' => $id_client,
            'motif' => $motif,
            'prix_ht' => $prix_ht,
        );

        echo json_encode($output);

    }

    /* Modifier */
    if($_POST['btn_action_modif'] == 'Modifier')
    {
        // echo json_encode($_POST);
        // exit;
        
        if (isset($_POST['nouveau_client_modif']) && ($_POST['nouveau_client_modif'] == 'on')) {
            // doublon client
            $query = "SELECT * FROM personne, client
            WHERE personne.id_personne = client.id_personne_fk_client
            AND tel_personne = :tel";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ":tel"          =>  $_POST['tel_client_modif'],
                )
            );
            if ($statement->rowCount() > 0) {
                echo json_encode("Ce client existe déjà.");
                exit;
            }

            
            // insert personne
            $query = "INSERT INTO personne
            (nom_personne, prenom_personne, tel_personne, email_personne, id_card_personne, passeport_personne,
            date_create_personne, date_last_modif_personne, user_create_personne, user_last_modif_personne)
            VALUES(:nom, :prenom, :tel, :email, :id_card, :passeport,
            :date_create, :date_last_modif, :user_create, :user_last_modif)
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ":nom"          =>  $_POST['nom_client_modif'],
                    ":prenom"       =>  $_POST['prenom_client_modif'],
                    ":tel"          =>  $_POST['tel_client_modif'],
                    ":email"        =>  $_POST['email_client_modif'],
                    ":id_card"      =>  $_POST['id_card_client_modif'],
                    ":passeport"    =>  $_POST['passeport_client_modif'],
                    "date_create"         =>  date("Y-m-d H:i:s"),
                    "date_last_modif"     =>  date("Y-m-d H:i:s"),
                    "user_create"         =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                    "user_last_modif"     =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
                )
            );
            $id_personne = $connect->lastInsertId();

            // insert client
            $query = "INSERT INTO client
            (id_personne_fk_client)
            VALUES(:id_personne)
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ":id_personne"  =>  $id_personne,
                )
            );
            $id_client = $connect->lastInsertId();

        } else {
            $id_client = $_POST['nom_prenom_client_modif'];
        }


        // Vérifier si la salle est déjà réservée pour cette période
        $query = "SELECT * FROM location_conf
        WHERE id_location_conf <> :id_location
        AND statut_location_conf = 'Actif'
        AND id_salle_conf_fk_location_conf = :id_salle
        AND (
            (date_debut_location_conf < :date_debut AND :date_debut < date_fin_location_conf)
            OR (date_debut_location_conf < :date_fin AND :date_fin < date_fin_location_conf) 
        )
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ":date_debut"   =>  $_POST['date_debut_modif'],
                ":date_fin"     =>  $_POST['date_fin_modif'],
                ":id_salle"     =>  $_POST['id_salle_conf_fk_location_modif'],
                ":id_location"  =>  $_POST['id_location_conf_modif'],
            )
        );
        if ($statement->rowCount() > 0) {
            echo json_encode("La salle sélectionnée est indisponible à cette période.");
            exit;
        }


        // insert location_conf
        if ($_POST['prix_location_conf_modif'] != "") {
            $prix = $_POST['prix_location_conf_modif'];
        } else {
            $prix = null;
        }

        update8('location_conf',
        'id_location_conf', $_POST['id_location_conf_modif'],
        'date_debut_location_conf', $_POST['date_debut_modif'],
        'date_fin_location_conf', $_POST['date_fin_modif'],
        'motif_location_conf', $_POST['motif_location_conf_modif'],
        'prix_location_conf', $prix,
        'id_salle_conf_fk_location_conf', $_POST['id_salle_conf_fk_location_modif'],
        'id_client_fk_location_conf', $id_client,
        'date_last_modif_location_conf', date("Y-m-d H:i:s"),
        'user_last_modif_location_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );

        $id_location = $_POST['id_location_conf_modif'];


        // insert services additionnels
        // supprimer d'abord tous les anciens services
        $query = "DELETE FROM assoc_location_conf_and_service_conf
        WHERE id_location_conf_fk_assoc_location_conf_and_service_conf = :id_location
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_location'  =>  $id_location
            )
        );
        

        if (count($_POST['id_service_conf_modif']) > 0) {
            $query = "INSERT INTO assoc_location_conf_and_service_conf
            (id_location_conf_fk_assoc_location_conf_and_service_conf, id_service_conf_fk_assoc_location_conf_and_service_conf)
            VALUES ";
            
            $placeholders = "";
            $values = [];
            foreach($_POST['id_service_conf_modif'] as $index => $id_service) {
                if ($id_service != ""){
                    if ($index != 0) {
                        $placeholders .= ", ";
                    }
                    $placeholders .= "(?, ?)";
    
                    array_push($values, $id_location, $id_service);    
                }
            }

            $query .= $placeholders;
            $statement = $connect->prepare($query);
            $statement->execute($values);
        }

        echo json_encode("La location a été modifiée avec succès.");

        // Log
        switch ($_SESSION['type_compte']) {
            case 1:
                addlog("Modif-01-location-conf", $id_location, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Modif-02-location-conf", $id_location, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Modif-03-location-conf", $id_location, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }

    }
    
}


function get_service_conf_list($connect) {
    $query = "SELECT id_service_conf, nom_service_conf FROM service_conf
    WHERE statut_service_conf = 'Actif'
    ORDER BY nom_service_conf ASC
	";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = [];
    foreach($result as $row)
    {
        $output[] = [$row["id_service_conf"], $row["nom_service_conf"]];
    }
    return $output;
}


if (isset($_POST['action']) && $_POST['action'] == 'get_service_conf_list') {
    echo json_encode(get_service_conf_list($connect));
}


function get_client_list($connect) {
    $query = "SELECT id_client, nom_personne, prenom_personne FROM client, personne
    WHERE statut_personne = 'Actif'
    AND client.id_personne_fk_client = personne.id_personne
    ORDER BY nom_client
	";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = [];
    foreach($result as $row)
    {
        $output[] = [
            'id'    =>  $row["id_client"],
            'nom'   =>  $row["nom_personne"]. ' ' . $row['prenom_personne']
        ];
    }
    return $output;   
}

if (isset($_POST['action']) && $_POST['action'] == 'get_client_list') {
    echo json_encode(get_client_list($connect));
}

/* Indiquer Prix */
if (isset($_POST['btn_action_indiquer_prix']) && $_POST['btn_action_indiquer_prix'] == 'Indiquer_Prix') {

    update1('location_conf',
    'id_location_conf', $_POST['id_location_conf_indiquer_prix'],
    'prix_location_conf', $_POST['prix_indiquer_prix']);
    
    echo json_encode('Le prix a été enregistré avec succès.');
    // Log
    switch ($_SESSION['type_compte']) {
        case 1:
            addlog("IndiqPrix-01-location-conf", $_POST['id_location_conf_indiquer_prix'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
            break;
        case 2:
            addlog("IndiqPrix-02-location-conf", $_POST['id_location_conf_indiquer_prix'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
            break;
        case 3:
            addlog("IndiqPrix-03-location-conf", $_POST['id_location_conf_indiquer_prix'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
            break;
        case 4:
            addlog("IndiqPrix-04-location-conf", $_POST['id_location_conf_indiquer_prix'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
            break;
    }
}



?>