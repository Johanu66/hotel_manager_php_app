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
    exit;
}



if(isset($_POST['btn_export_location_voiture'])) {

    if($_POST['export_location_voiture'] == 'pdf') {

        $query = "
        SELECT *
        FROM location_voiture,voiture,personne,voiturier,client
        WHERE personne.id_personne= voiturier.id_personne_fk_voiturier
        AND location_voiture.id_voiture_fk_location_voiture=voiture.id_voiture
        AND location_voiture.id_client_fk_location_voiture=client.id_client
        AND location_voiture.id_voiturier_fk_location_voiture=voiturier.id_voiturier
        ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        
        $date = gmdate("d-m-Y");
        $hour = gmdate("H:i");
        
        $hour2 = gmdate("H-i");
        

        if ($_SESSION['lang'] == 'EN') { 
            $nom_location_voiture = VOITURE_LOCATION_VOITURE_EN;
            $plaque_location_voiture = PLAQUE_LOCATION_VOITURE_EN;
            $debut_location_voiture = DATE_DEBUT_LOCATION_VOITURE_EN;
            $fin_location_voiture= DATE_FIN_LOCATION_VOITURE_EN;
            $voiturier_ = VOITURIER_LOCATION_VOITURE_EN;
            $nom_client = CLIENT_LOCATION_VOITURE_EN;
            $prix_location_voiture = PRIX_LOCATION_VOITURE_EN;
            $facture = FACTURE_LOCATION_VOITURE_EN;
            $facture_oui = FACTURE_OUI_EN;
            $facture_non = FACTURE_NON_EN;
            $titre = 'List of car rental on '.$date.' at '.$hour.' (GMT)';
        } else {
            $nom_location_voiture = VOITURE_LOCATION_VOITURE_FR;
            $plaque_location_voiture = PLAQUE_LOCATION_VOITURE_FR;
            $debut_location_voiture = DATE_DEBUT_LOCATION_VOITURE_FR;
            $fin_location_voiture = DATE_FIN_LOCATION_VOITURE_FR;
            $voiturier = VOITURIER_LOCATION_VOITURE_FR;
            $nom_client = CLIENT_LOCATION_VOITURE_FR;
            $prix_location_voiture = PRIX_LOCATION_VOITURE_FR;
            $facture = FACTURE_LOCATION_VOITURE_FR;
            $facture_oui = FACTURE_OUI_FR;
            $facture_non = FACTURE_NON_FR;
            $titre = 'Liste des locations de voiture en date du '.$date.' à '.$hour.' (Heure GMT)';
        }
        
        $output = '
        <div class="table-responsive" style="font-size: 16px !important;">
            <h1>'. $titre .'</h1>
            <table border="1" style="border-collapse:collapse;" >
                <tr bgcolor="#c6efce">
        
                    <th>'. $nom_location_voiture .'</th>
                    <th>'. $plaque_location_voiture .'</th>
                    <th>'. $debut_location_voiture .'</th>
                    <th>'. $fin_location_voiture .'</th>
                    <th>'. $voiturier .'</th>
                    <th>'. $nom_client .'</th>
                    <th>'. $prix_location_voiture .'</th>
                    <th>'. $facture .'</th>

                </tr>
        ';
        foreach($result as $row)
        {
            $factures ='';
            if($row['facture_location_voiture'] == 'Non')
            {
                $factures = '<center><span class="badge badge-primary">'.$facture_non .'</span></center>';
            }
            else
            {
                $factures = '<center><span class="badge badge-danger">'. $facture_oui .'</span></center>';
            }
            
        $output .= '
            <tr> 
                <td>'.$row["modele_voiture"].'</td>
                <td>'.$row["immatriculation_voiture"].'</td>
                <td>'.$row["debut_location_voiture"].'</td>
                <td>'.$row["fin_location_voiture"].'</td>
                <td>'.$row["nom_personne"].'</td>
                <td>'.$row["nom_client"].'</td>
                <td>'.$row["prix_location_voiture"].'</td>
                <td>'.$factures.'</td>
            </tr>
                
        ';
        
        }
        $output .= '
            </table>
        </div>
        ';
        
        $pdf = new Pdf();
        if ($_SESSION['lang'] == 'EN') {
            $file_name = 'List of car rental_'.$date.'_'.$hour2.'.pdf';
        } else {
            $file_name = 'Liste des locations de voiture_'.$date.'_'.$hour2.'.pdf';
        }

        $pdf->loadHtml($output);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream($file_name, array("Attachment" => false));
        
        // Log
        // switch ($_SESSION['type_compte']) {
        
        //     case 1:
        //         addlog("Exp-01-location-voiture", "PDF", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 2:
        //         addlog("Exp-02-location-voiture", "PDF", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        // }
    }


    if($_POST['export_location_voiture'] == 'word') {

        $query = "
        SELECT *
        FROM location_voiture,voiture,personne,voiturier,client
        WHERE personne.id_personne= voiturier.id_personne_fk_voiturier
        AND location_voiture.id_voiture_fk_location_voiture=voiture.id_voiture
        AND location_voiture.id_client_fk_location_voiture=client.id_client
        AND location_voiture.id_voiturier_fk_location_voiture=voiturier.id_voiturier
        ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        
        $date = gmdate("d-m-Y");
        $hour = gmdate("H:i");
        
        $hour2 = gmdate("H-i");
        
        if ($_SESSION['lang'] == 'EN') { 
            $nom_location_voiture = VOITURE_LOCATION_VOITURE_EN;
            $plaque_location_voiture = PLAQUE_LOCATION_VOITURE_EN;
            $debut_location_voiture = DATE_DEBUT_LOCATION_VOITURE_EN;
            $fin_location_voiture= DATE_FIN_LOCATION_VOITURE_EN;
            $voiturier_ = VOITURIER_LOCATION_VOITURE_EN;
            $nom_client = CLIENT_LOCATION_VOITURE_EN;
            $prix_location_voiture = PRIX_LOCATION_VOITURE_EN;
            $facture = FACTURE_LOCATION_VOITURE_EN;
            $facture_oui = FACTURE_OUI_EN;
            $facture_non = FACTURE_NON_EN;
            $titre = 'List of car rental on '.$date.' at '.$hour.' (GMT)';
        } else {
            $nom_location_voiture = VOITURE_LOCATION_VOITURE_FR;
            $plaque_location_voiture = PLAQUE_LOCATION_VOITURE_FR;
            $debut_location_voiture = DATE_DEBUT_LOCATION_VOITURE_FR;
            $fin_location_voiture = DATE_FIN_LOCATION_VOITURE_FR;
            $voiturier = VOITURIER_LOCATION_VOITURE_FR;
            $nom_client = CLIENT_LOCATION_VOITURE_FR;
            $prix_location_voiture = PRIX_LOCATION_VOITURE_FR;
            $facture = FACTURE_LOCATION_VOITURE_FR;
            $facture_oui = FACTURE_OUI_FR;
            $facture_non = FACTURE_NON_FR;
            $titre = 'Liste des locations de voiture en date du '.$date.' à '.$hour.' (Heure GMT)';
        }

		$output = '
		    <b>'. $titre .'</b>
			<table style="width: 100%; border: 1px #000000 solid;">
			    <tr style="background-color:#c6efce; font-size: 15px; font-weight:bold; text-align: center; height: 20px ">
			    
                    <th>'. $nom_location_voiture .'</th>
                    <th>'. $plaque_location_voiture .'</th>
                    <th>'. $debut_location_voiture .'</th>
                    <th>'. $fin_location_voiture .'</th>
                    <th>'. $voiturier .'</th>
                    <th>'. $nom_client .'</th>
                    <th>'. $prix_location_voiture .'</th>
                    <th>'. $facture .'</th>
        
			    </tr>
		';
		foreach($result as $row)
		{
		    
            $factures ='';
            if($row['facture_location_voiture'] == 'Non')
            {
                $factures = '<center><span class="badge badge-primary">'.$facture_non .'</span></center>';
            }
            else
            {
                $factures = '<center><span class="badge badge-danger">'. $facture_oui .'</span></center>';
            }
		    		
			$output .= '
			
			<tr style="font-size: 15px; height:30px;">
                <td>'.$row["modele_voiture"].'</td>
                <td>'.$row["immatriculation_voiture"].'</td>
                <td>'.$row["debut_location_voiture"].'</td>
                <td>'.$row["fin_location_voiture"].'</td>
                <td>'.$row["nom_personne"].'</td>
                <td>'.$row["nom_client"].'</td>
                <td>'.$row["prix_location_voiture"].'</td>
                <td>'.$factures.'</td>
            </tr>	
    		';

		}
		$output .= '
			</table>
		
		';

	    // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        
        /* Note: any element you append to a document must reside inside of a Section. */
        
        // Adding an empty Section to the document...
        $section = $phpWord->addSection(
            
            array('marginLeft' => 600, 'marginRight' => 600,
            'marginTop' => 300, 'marginBottom' => 600)
            
            );
        
        $sectionStyle = $section->getStyle();
        $sectionStyle->setOrientation($sectionStyle::ORIENTATION_LANDSCAPE);
        
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $output);
        
        if ($_SESSION['lang'] == 'EN') {
            $file_name = 'List of car rental_'.$date.'_'.$hour2.'.docx';
        } else {
            $file_name = 'Liste des locations de voiture_'.$date.'_'.$hour2.'.docx';
        }
        header("Content-type: application/vnd.ms-word");  
        header('Content-Disposition: attachment; filename='. $file_name);
        
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('php://output');
        
        // Log
        // switch ($_SESSION['type_compte']) {
        
        //     case 1:
        //         addlog("Exp-01-location-voiture", "Word", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 2:
        //         addlog("Exp-02-location-voiture", "Word", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        // }


    }


    if($_POST['export_location_voiture'] == 'excel') {

        $query = "
        SELECT *
        FROM location_voiture,voiture,personne,voiturier,client
        WHERE personne.id_personne= voiturier.id_personne_fk_voiturier
        AND location_voiture.id_voiture_fk_location_voiture=voiture.id_voiture
        AND location_voiture.id_client_fk_location_voiture=client.id_client
        AND location_voiture.id_voiturier_fk_location_voiture=voiturier.id_voiturier
        ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        
        $date = gmdate("d-m-Y");
        $hour = gmdate("H:i");
        
        $hour2 = gmdate("H-i");
        
        if ($_SESSION['lang'] == 'EN') { 
            $nom_location_voiture = VOITURE_LOCATION_VOITURE_EN;
            $plaque_location_voiture = PLAQUE_LOCATION_VOITURE_EN;
            $debut_location_voiture = DATE_DEBUT_LOCATION_VOITURE_EN;
            $fin_location_voiture= DATE_FIN_LOCATION_VOITURE_EN;
            $voiturier_ = VOITURIER_LOCATION_VOITURE_EN;
            $nom_client = CLIENT_LOCATION_VOITURE_EN;
            $prix_location_voiture = PRIX_LOCATION_VOITURE_EN;
            $facture = FACTURE_LOCATION_VOITURE_EN;
            $facture_oui = FACTURE_OUI_EN;
            $facture_non = FACTURE_NON_EN;
            $titre = 'List of car rental on '.$date.' at '.$hour.' (GMT)';
        } else {
            $nom_location_voiture = VOITURE_LOCATION_VOITURE_FR;
            $plaque_location_voiture = PLAQUE_LOCATION_VOITURE_FR;
            $debut_location_voiture = DATE_DEBUT_LOCATION_VOITURE_FR;
            $fin_location_voiture = DATE_FIN_LOCATION_VOITURE_FR;
            $voiturier = VOITURIER_LOCATION_VOITURE_FR;
            $nom_client = CLIENT_LOCATION_VOITURE_FR;
            $prix_location_voiture = PRIX_LOCATION_VOITURE_FR;
            $facture = FACTURE_LOCATION_VOITURE_FR;
            $facture_oui = FACTURE_OUI_FR;
            $facture_non = FACTURE_NON_FR;
            $titre = 'Liste des locations de voiture en date du '.$date.' à '.$hour.' (Heure GMT)';
        }

        $output = '
        <div class="table-responsive">
            <b>'. $titre .'</b>
            <table class="table table-boredered">
                <tr bgcolor="#c6efce">

                    <th>'. $nom_location_voiture .'</th>
                    <th>'. $plaque_location_voiture .'</th>
                    <th>'. $debut_location_voiture .'</th>
                    <th>'. $fin_location_voiture .'</th>
                    <th>'. $voiturier .'</th>
                    <th>'. $nom_client .'</th>
                    <th>'. $prix_location_voiture .'</th>
                    <th>'. $facture .'</th>
        
                </tr>
        ';
        foreach($result as $row)
        {
            
            $factures ='';
            if($row['facture_location_voiture'] == 'Non')
            {
                $factures = '<center><span class="badge badge-primary">'.$facture_non .'</span></center>';
            }
            else
            {
                $factures = '<center><span class="badge badge-danger">'. $facture_oui .'</span></center>';
            }
            
        $output .= '
            
            <tr>
                <td>'.$row["modele_voiture"].'</td>
                <td>'.$row["immatriculation_voiture"].'</td>
                <td>'.$row["debut_location_voiture"].'</td>
                <td>'.$row["fin_location_voiture"].'</td>
                <td>'.$row["nom_personne"].'</td>
                <td>'.$row["nom_client"].'</td>
                <td>'.$row["prix_location_voiture"].'</td>
                <td>'.$factures.'</td>
            </tr>            
        ';
                                
        }
        $output .= '
            </table>
        </div>
        ';
        
        if ($_SESSION['lang'] == 'EN') {
            $file_name = 'List of car rental_'.$date.'_'.$hour2.'.xls';
        } else {
            $file_name = 'Liste des locations de voiture_'.$date.'_'.$hour2.'.xls';
        }

        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename='. $file_name);
        echo "\xEF\xBB\xBF";
        echo $output;

        // Log
        // switch ($_SESSION['type_compte']) {
        
        //     case 1:
        //         addlog("Exp-01-location-voiture", "Excel", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 2:
        //         addlog("Exp-02-location-voiture", "Excel", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        // }

    }    
}
