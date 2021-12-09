<?php
include('../database_connection.php');
include('../AddLogInclude.php');
require_once '../pdf.php';
require_once '../vendor/autoload.php';

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if($_SESSION['type_compte'] != 1 && $_SESSION['type_compte'] != 2)
{
	header("location:../pages/tableau-de-bord-admin.php");
}


// $debut et $fin sont des strings
function dateDiff($debut, $fin){
    $debut = date_create($debut);
    $fin = date_create($fin);
    if ($fin <= $debut) {
        return '0';
    }
    return date_diff($debut, $fin) -> format('%a') + 1; //par défaut vs par excès
}


if(isset($_POST['id_location_conf_view_facture'])) {
    $query = "SELECT * FROM location_conf, facture_conf, salle_conf, client
    WHERE facture_conf.id_location_conf_fk_facture_conf = location_conf.id_location_conf
    AND location_conf.id_salle_conf_fk_location_conf = salle_conf.id_salle_conf
    AND location_conf.id_client_fk_location_conf = client.id_client
    AND facture_conf.id_location_conf_fk_facture_conf = :id_location_conf
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id_location_conf' => $_POST['id_location_conf_view_facture']
        )
    );
    $result = $statement->fetchAll();

    // $date = gmdate("d-m-Y");
    // $hour = gmdate("H:i");
    // $hour2 = gmdate("H-i");

    if ($_SESSION['lang'] == 'EN') { 
        $label_salle = SALLE_LOCATION_CONF_EN;
        $label_date_debut = DATE_DEBUT_LOCATION_EN;
        $label_date_fin = DATE_FIN_LOCATION_EN;
        $label_duree = DUREE_LOCATION_CONF_EN;
        $label_client = CLIENT_LOCATION_CONF_EN;
        $label_date_facture = DATE_FACTURE_LOCATION_CONF_EN;
        $label_numero_facture = NUM_FACTURE_LOCATION_CONF_EN;
        $label_methode_paiement = METHODE_PAIEMENT_FACTURE_LOCATION_CONF_EN;
        $label_montant_ht = MONTANT_HT_LOCATION_CONF_EN;
        $label_tva = VALEUR_TVA_EN;
        $label_montant_ttc = MONTANT_TTC_LOCATION_CONF_EN;
        $oui = OUI_EN;
        $non = NON_EN;
        // $titre = 'List of conference rooms rentals on '.$date.' at '.$hour.' (GMT)';
        // $nom_fichier = 'List of conference rooms rentals_'.$date.'_'.$hour2;
    } else {
        $label_salle = SALLE_LOCATION_CONF_FR;
        $label_date_debut = DATE_DEBUT_LOCATION_FR;
        $label_date_fin = DATE_FIN_LOCATION_FR;
        $label_duree = DUREE_LOCATION_CONF_FR;
        $label_client = CLIENT_LOCATION_CONF_FR;
        $label_date_facture = DATE_FACTURE_LOCATION_CONF_EN;
        $label_numero_facture = NUM_FACTURE_LOCATION_CONF_EN;
        $label_methode_paiement = METHODE_PAIEMENT_FACTURE_LOCATION_CONF_EN;
        $label_montant_ht = MONTANT_HT_LOCATION_CONF_EN;
        $label_tva = VALEUR_TVA_EN;
        $label_montant_ttc = MONTANT_TTC_LOCATION_CONF_EN;
        $oui = OUI_FR;
        $non = NON_FR;
        // $titre = 'Liste des locations de salles de conférence en date du '.$date.' à '.$hour.' (Heure GMT)';
        // $nom_fichier = 'Liste des locations de salles de conférence_'.$date.'_'.$hour2;
    }

    foreach($result as $row) {
        $salle = $row["nom_salle_conf"];
        $debut = $row["date_debut_location_conf"];
        $fin = $row["date_fin_location_conf"];

        // duree(en jours)
        $duree = dateDiff($row['date_debut_location_conf'], $row['date_fin_location_conf']);
    
        // client
        $client = $row['nom_client']. ' ' .$row['prenom_client'];

        $date_facture = $row["date_facture_conf"];
        $num_facture = $row["num_facture_conf"];
        $methode_paiement = $row["methode_paiement_facture_conf"];
        $montant_ht = $row["montant_ht_facture_conf"];
        $tva = $row["valeur_tva_facture_conf"];
        $montant_ttc = $row["montant_ttc_facture_conf"];

        // $pdf = new Pdf();
        // $file_name = $nom_fichier . '.pdf';

        // $pdf->loadHtml($output);
        // $pdf->setPaper('A4', 'landscape');
        // $pdf->render();
        // $pdf->stream($file_name, array("Attachment" => false));
    
        // Log
        // switch ($_SESSION['type_compte']) {
        //     case 1:
        //         addlog("FacView-01-location-conf", $row['num_facture_conf'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 2:
        //         addlog("FacView-02-location-conf", $row['num_facture_conf'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 3:
        //         addlog("FacView-03-location-conf", $row['num_facture_conf'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 4:
        //         addlog("FacView-04-location-conf", $row['num_facture_conf'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 5:
        //         addlog("FacView-05-location-conf", $row['num_facture_conf'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        // }
    }
}

