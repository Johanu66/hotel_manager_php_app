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

function servicesAddi($id_location) {
    // retourne Oui ou Non (dans la langue adéquate), et avec les badges
    $query = "SELECT COUNT(id_location_conf_fk_assoc_location_conf_and_service_conf)
        FROM assoc_location_conf_and_service_conf
        WHERE id_location_conf_fk_assoc_location_conf_and_service_conf = :id_location
    ";

    global $connect;
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ":id_location"  =>  $id_location
        )
    );
    $result = $statement->fetchAll();

    foreach($result as $row) {
        $count = $row[0];
    }

    global $oui, $non;
    if($count > 0) {
        $services_addi = '<center><span class="badge badge-primary">'. $oui .'</span></center>';
    } else {
        $services_addi = '<center><span class="badge badge-danger">'. $non .'</span></center>';
    }

    return $services_addi;
}



if(isset($_POST['btn_export_location_conf'])) {
    // code commun à tous les types de fichier
    $query = "SELECT id_location_conf, nom_salle_conf, date_debut_location_conf, date_fin_location_conf,
    motif_location_conf, prix_location_conf, facture_location_conf, statut_location_conf, id_client_fk_location_conf
    FROM location_conf, salle_conf
    WHERE location_conf.id_salle_conf_fk_location_conf = salle_conf.id_salle_conf
    AND statut_location_conf = 'Actif'
    ORDER BY date_create_location_conf
    ";
    
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    
    $date = gmdate("d-m-Y");
    $hour = gmdate("H:i");
    $hour2 = gmdate("H-i");

    if ($_SESSION['lang'] == 'EN') { 
        $label_salle = SALLE_LOCATION_CONF_EN;
        $label_date_debut = DATE_DEBUT_LOCATION_EN;
        $label_date_fin = DATE_FIN_LOCATION_EN;
        $label_duree = DUREE_LOCATION_CONF_EN;
        $label_client = CLIENT_LOCATION_CONF_EN;
        $label_motif = MOTIF_LOCATION_CONF_EN;
        $label_prix = PRIX_LOCATION_CONF_EN;
        $label_services_addi = SERVICES_ADDI_LOCATION_CONF_EN;
        $label_facture = FACTURE_LOCATION_CONF_EN;
        $oui = OUI_EN;
        $non = NON_EN;
        $annule = ANNULE_EN;
        $prix_non_indiqué = PRIX_NON_INDIQUE_EN;
        $titre = 'List of conference rooms rentals on '.$date.' at '.$hour.' (GMT)';
        $nom_fichier = 'List of conference rooms rentals_'.$date.'_'.$hour2;
    } else {
        $label_salle = SALLE_LOCATION_CONF_FR;
        $label_date_debut = DATE_DEBUT_LOCATION_FR;
        $label_date_fin = DATE_FIN_LOCATION_FR;
        $label_duree = DUREE_LOCATION_CONF_FR;
        $label_client = CLIENT_LOCATION_CONF_FR;
        $label_motif = MOTIF_LOCATION_CONF_FR;
        $label_prix = PRIX_LOCATION_CONF_FR;
        $label_services_addi = SERVICES_ADDI_LOCATION_CONF_FR;
        $label_facture = FACTURE_LOCATION_CONF_FR;
        $oui = OUI_FR;
        $non = NON_FR;
        $annule = ANNULE_FR;
        $prix_non_indiqué = PRIX_NON_INDIQUE_FR;
        $titre = 'Liste des locations de salles de conférence en date du '.$date.' à '.$hour.' (Heure GMT)';
        $nom_fichier = 'Liste des locations de salles de conférence_'.$date.'_'.$hour2;
    }


    // PDF
    if($_POST['export_location_conf'] == 'pdf') {
        
        $output = '
        <div class="table-responsive" style="font-size: 16px !important;">
            <h1>'. $titre .'</h1>
            <table border="1" style="border-collapse:collapse;" >
                <tr bgcolor="#c6efce">
                
                    <th>'. $label_salle .'</th>
                    <th>'. $label_date_debut .'</th>
                    <th>'. $label_date_fin .'</th>
                    <th>'. $label_duree .'</th>
                    <th>'. $label_client .'</th>
                    <th>'. $label_motif .'</th>
                    <th>'. $label_prix .'</th>
                    <th>'. $label_services_addi .'</th>
                    <th>'. $label_facture .'</th>
    
                </tr>
        ';
    
        foreach($result as $row) {
            // duree(en jours)
            $duree = dateDiff($row['date_debut_location_conf'], $row['date_fin_location_conf']);
        
            // client
            $client = getClientFromId($row['id_client_fk_location_conf']);

            // services_addi
            $services_addi = servicesAddi($row['id_location_conf']);

            // prix_ht
            if ($row['prix_location_conf'] == null) {
                $prix = '<center><span class="badge badge-warning">' . $prix_non_indiqué . '</span></center>';
            } else {
                $prix = $row['prix_location_conf'];
            }


            // facture
            if($row['facture_location_conf'] == 'Oui') {
                $facture = '<center><span class="badge badge-primary">'. $oui .'</span></center>';
            } else if ($row['facture_location_conf'] == 'Annulé') {
                $facture = '<center><span class="badge badge-warning">'. $annule .'</span></center>';
            } else {
                $facture = '<center><span class="badge badge-danger">'. $non .'</span></center>';
            }


            $output .= '
                <tr>
                    <td>'. $row["nom_salle_conf"] .'</td>
                    <td>'. formatDatetime($row["date_debut_location_conf"], $_SESSION['lang']) .'</td>
                    <td>'. formatDatetime($row["date_fin_location_conf"], $_SESSION['lang']) .'</td>
                    <td>'. $duree .'</td>
                    <td>'. $client .'</td>
                    <td>'. $row["motif_location_conf"] .'</td>
                    <td>'. $prix .'</td>
                    <td>'. $services_addi .'</td>
                    <td>'. $facture .'</td>
                </tr>
        ';
        }

        $output .= '
            </table>
        </div>
        ';

        $pdf = new Pdf();
        $file_name = $nom_fichier . '.pdf';

        $pdf->loadHtml($output);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream($file_name, array("Attachment" => false));
        
        // Log
        switch ($_SESSION['type_compte']) {
            case 1:
                addlog("Exp-01-location-conf", "PDF", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Exp-02-location-conf", "PDF", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
    }


    if($_POST['export_location_conf'] == 'word') {

		$output = '
		    <b>'. $titre .'</b>
			<table style="width: 100%; border: 1px #000000 solid;">
			    <tr style="background-color:#c6efce; font-size: 15px; font-weight:bold; text-align: center; height: 20px ">
			    
                    <th>'. $label_salle .'</th>
                    <th>'. $label_date_debut .'</th>
                    <th>'. $label_date_fin .'</th>
                    <th>'. $label_duree .'</th>
                    <th>'. $label_client .'</th>
                    <th>'. $label_motif .'</th>
                    <th>'. $label_prix .'</th>
                    <th>'. $label_services_addi .'</th>
                    <th>'. $label_facture .'</th>

			    </tr>
		';

        foreach($result as $row) {
            // duree(en jours)
            $duree = dateDiff($row['date_debut_location_conf'], $row['date_fin_location_conf']);
        
            // client
            $client = getClientFromId($row['id_client_fk_location_conf']);

            // services_addi
            $services_addi = servicesAddi($row['id_location_conf']);

            // facture
            if($row['facture_location_conf'] == 'Oui') {
                $facture = '<center><span class="badge badge-primary">'. $oui .'</span></center>';
            } else {
                $facture = '<center><span class="badge badge-danger">'. $non .'</span></center>';
            }


            $output .= '
    			<tr style="font-size: 15px; height:30px;">
                    <td>'. $row["nom_salle_conf"] .'</td>
                    <td>'. formatDatetime($row["date_debut_location_conf"], $_SESSION['lang']) .'</td>
                    <td>'. formatDatetime($row["date_fin_location_conf"], $_SESSION['lang']) .'</td>
                    <td>'. $duree .'</td>
                    <td>'. $client .'</td>
                    <td>'. $row["motif_location_conf"] .'</td>
                    <td>'. $row["prix_location_conf"] .'</td>
                    <td>'. $services_addi .'</td>
                    <td>'. $facture .'</td>
                </tr>
        ';
        }

        $output .= '
            </table>
        ';

	    // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $file_name = $nom_fichier .'.docx';

        /* Note: any element you append to a document must reside inside of a Section. */        
        // Adding an empty Section to the document...
        $section = $phpWord->addSection(            
            array('marginLeft' => 600, 'marginRight' => 600,
            'marginTop' => 300, 'marginBottom' => 600)
        );
        $sectionStyle = $section->getStyle();
        $sectionStyle->setOrientation($sectionStyle::ORIENTATION_LANDSCAPE);
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $output);
        header("Content-type: application/vnd.ms-word");  
        header('Content-Disposition: attachment; filename='. $file_name);        
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('php://output');
        
        // Log
        switch ($_SESSION['type_compte']) {        
            case 1:
                addlog("Exp-01-location-conf", "Word", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Exp-02-location-conf", "Word", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
    }


    if($_POST['export_location_conf'] == 'excel') {

        $output = '
        <div class="table-responsive">
            <b>'. $titre .'</b>
            <table class="table table-boredered">
                <tr bgcolor="#c6efce">

                    <th>'. $label_salle .'</th>
                    <th>'. $label_date_debut .'</th>
                    <th>'. $label_date_fin .'</th>
                    <th>'. $label_duree .'</th>
                    <th>'. $label_client .'</th>
                    <th>'. $label_motif .'</th>
                    <th>'. $label_prix .'</th>
                    <th>'. $label_services_addi .'</th>
                    <th>'. $label_facture .'</th>

                </tr>
        ';

        foreach($result as $row) {
            // duree(en jours)
            $duree = dateDiff($row['date_debut_location_conf'], $row['date_fin_location_conf']);
        
            // client
            $client = getClientFromId($row['id_client_fk_location_conf']);

            // services_addi
            $services_addi = servicesAddi($row['id_location_conf']);

            // facture
            if($row['facture_location_conf'] == 'Oui') {
                $facture = '<center><span class="badge badge-primary">'. $oui .'</span></center>';
            } else {
                $facture = '<center><span class="badge badge-danger">'. $non .'</span></center>';
            }

            $output .= '
            <tr>
                <td>'. $row["nom_salle_conf"] .'</td>
                <td>'. formatDatetime($row["date_debut_location_conf"], $_SESSION['lang']) .'</td>
                <td>'. formatDatetime($row["date_fin_location_conf"], $_SESSION['lang']) .'</td>
                <td>'. $duree .'</td>
                <td>'. $client .'</td>
                <td>'. $row["motif_location_conf"] .'</td>
                <td>'. $row["prix_location_conf"] .'</td>
                <td>'. $services_addi .'</td>
                <td>'. $facture .'</td>
            </tr>            
            ';
        }

        $output .= '
            </table>
        </div>
        ';
        
        $file_name = $nom_fichier .'.xls';

        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename='. $file_name);
        echo "\xEF\xBB\xBF";
        echo $output;

        // Log
        switch ($_SESSION['type_compte']) {
        
            case 1:
                addlog("Exp-01-location-conf", "Excel", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Exp-02-location-conf", "Excel", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }

    }    
}
