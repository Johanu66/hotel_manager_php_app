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


if(isset($_POST['btn_export_salle_conf'])) {

    if($_POST['export_salle_conf'] == 'pdf') {

        $query = "SELECT *
        FROM salle_conf LEFT JOIN 
        (SELECT id_salle_conf_fk_assoc_salle_conf_and_carac_conf, nom_carac_conf FROM carac_conf
        INNER JOIN assoc_salle_conf_and_carac_conf AS assoc
        ON carac_conf.id_carac_conf = assoc.id_carac_conf_fk_assoc_salle_conf_and_carac_conf
        WHERE carac_conf.statut_carac_conf = 'Actif') AS temp
        ON salle_conf.id_salle_conf = temp.id_salle_conf_fk_assoc_salle_conf_and_carac_conf
        ORDER BY nom_salle_conf
        ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        
        $date = gmdate("d-m-Y");
        $hour = gmdate("H:i");
        
        $hour2 = gmdate("H-i");
        

        if ($_SESSION['lang'] == 'EN') { 
            $nom_salle_conf = NOM_SALLE_CONF_EN;
            $desc_salle_conf =  DESC_SALLE_CONF_EN;
            $label_carac_salle_conf = CARAC_SALLE_CONF_EN;
            $capacite_salle_conf = CAPACITE_SALLE_CONF_EN;
            $titre = 'List of conference rooms on '.$date.' at '.$hour.' (GMT)';
        } else {
            $nom_salle_conf = NOM_SALLE_CONF_FR;
            $desc_salle_conf =  DESC_SALLE_CONF_FR;
            $label_carac_salle_conf = CARAC_SALLE_CONF_FR;
            $capacite_salle_conf = CAPACITE_SALLE_CONF_FR;
            $titre = 'Liste des salles de conference en date du '.$date.' à '.$hour.' (Heure GMT)';
        }
        
        $output = '
        <div class="table-responsive" style="font-size: 16px !important;">
            <h1>'. $titre .'</h1>
            <table border="1" style="border-collapse:collapse;" >
                <tr bgcolor="#c6efce">
                
                    <th>'. $nom_salle_conf .'</th>
                    <th>'. $desc_salle_conf .'</th>
                    <th>'. $label_carac_salle_conf .'</th>
                    <th>'. $capacite_salle_conf .'</th>

                </tr>
        ';

        // mettre le resultat de la requete dans le bon format
        $resultat = [];
        foreach($result as $row)
        {
            $provisoire = [];
            $provisoire['id_salle_conf'] = $row['id_salle_conf'];
            $provisoire['nom_salle_conf'] = $row['nom_salle_conf'];
            $provisoire['desc_salle_conf'] = $row['desc_salle_conf'];
            $provisoire['capacite_salle_conf'] = $row['capacite_salle_conf'];

            if( in_array($provisoire['id_salle_conf'], array_keys($resultat)) ) {
                array_push($resultat[$provisoire['id_salle_conf']]['carac_salle_conf'], $row['nom_carac_conf']);
            } else {
                $provisoire['carac_salle_conf'] = [];
                
                if ($row['nom_carac_conf'] === null) {
                    $provisoire['carac_salle_conf'][] = "";
                }
                else {
                    $provisoire['carac_salle_conf'][] = $row['nom_carac_conf'];
                }

                $resultat[$provisoire['id_salle_conf']] = $provisoire;
            }
        }

        foreach ($resultat as $row) {
            // caracteristiques
            $carac_salle_conf = '';
            foreach($row['carac_salle_conf'] as $index => $carac) {
                if ($index !== 0) {
                    $carac_salle_conf .= " - ";
                }
                $carac_salle_conf .= $carac;
            }
        

            $output .= '
                <tr>
                    <td>'.$row["nom_salle_conf"].'</td>
                    <td>'.$row["desc_salle_conf"].'</td>
                    <td>'.$carac_salle_conf.'</td>
                    <td>'.$row["capacite_salle_conf"].'</td>
                </tr>
        ';
        }

        $output .= '
            </table>
        </div>
        ';
        
        $pdf = new Pdf();
        if ($_SESSION['lang'] == 'EN') {
            $file_name = 'List of conference rooms_'.$date.'_'.$hour2.'.pdf';
        } else {
            $file_name = 'Liste des salles de conference_'.$date.'_'.$hour2.'.pdf';
        }

        $pdf->loadHtml($output);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream($file_name, array("Attachment" => false));
        
        // Log
        switch ($_SESSION['type_compte']) {
        
            case 1:
                addlog("Exp-01-salle-conf", "PDF", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Exp-02-salle-conf", "PDF", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
    }


    if($_POST['export_salle_conf'] == 'word') {

        $query = "SELECT * 
        FROM salle_conf LEFT JOIN 
        (SELECT id_salle_conf_fk_assoc_salle_conf_and_carac_conf, nom_carac_conf FROM carac_conf
        INNER JOIN assoc_salle_conf_and_carac_conf AS assoc
        ON carac_conf.id_carac_conf = assoc.id_carac_conf_fk_assoc_salle_conf_and_carac_conf
        WHERE carac_conf.statut_carac_conf = 'Actif') AS temp
        ON salle_conf.id_salle_conf = temp.id_salle_conf_fk_assoc_salle_conf_and_carac_conf
        ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        
        $date = gmdate("d-m-Y");
        $hour = gmdate("H:i");
        
        $hour2 = gmdate("H-i");
        
        if ($_SESSION['lang'] == 'EN') { 
            $nom_salle_conf = NOM_SALLE_CONF_EN;
            $desc_salle_conf =  DESC_SALLE_CONF_EN;
            $label_carac_salle_conf = CARAC_SALLE_CONF_EN;
            $capacite_salle_conf = CAPACITE_SALLE_CONF_EN;
            $titre = 'List of conference rooms on '.$date.' at '.$hour.' (GMT)';
        } else {
            $nom_salle_conf = NOM_SALLE_CONF_FR;
            $desc_salle_conf =  DESC_SALLE_CONF_FR;
            $label_carac_salle_conf = CARAC_SALLE_CONF_FR;
            $capacite_salle_conf = CAPACITE_SALLE_CONF_FR;
            $titre = 'Liste des salles de conference en date du '.$date.' à '.$hour.' (Heure GMT)';
        }

		$output = '
		    <b>'. $titre .'</b>
			<table style="width: 100%; border: 1px #000000 solid;">
			    <tr style="background-color:#c6efce; font-size: 15px; font-weight:bold; text-align: center; height: 20px ">
			    
                    <th>'. $nom_salle_conf .'</th>
                    <th>'. $desc_salle_conf .'</th>
                    <th>'. $label_carac_salle_conf .'</th>
                    <th>'. $capacite_salle_conf .'</th>
    
			    </tr>
		';


        // mettre le resultat de la requete dans le bon format
        $resultat = [];
        foreach($result as $row)
        {
            $provisoire = [];
            $provisoire['id_salle_conf'] = $row['id_salle_conf'];
            $provisoire['nom_salle_conf'] = $row['nom_salle_conf'];
            $provisoire['desc_salle_conf'] = $row['desc_salle_conf'];
            $provisoire['capacite_salle_conf'] = $row['capacite_salle_conf'];

            if( in_array($provisoire['id_salle_conf'], array_keys($resultat)) ) {
                array_push($resultat[$provisoire['id_salle_conf']]['carac_salle_conf'], $row['nom_carac_conf']);
            } else {
                $provisoire['carac_salle_conf'] = [];
                
                if ($row['nom_carac_conf'] === null) {
                    $provisoire['carac_salle_conf'][] = "";
                }
                else {
                    $provisoire['carac_salle_conf'][] = $row['nom_carac_conf'];
                }

                $resultat[$provisoire['id_salle_conf']] = $provisoire;
            }
        }

        foreach ($resultat as $row) {
            // caracteristiques
            $carac_salle_conf = '';
            foreach($row['carac_salle_conf'] as $index => $carac) {
                if ($index !== 0) {
                    $carac_salle_conf .= " - ";
                }
                $carac_salle_conf .= $carac;
            }
        
			$output .= '
			
			<tr style="font-size: 15px; height:30px;">
                <td>'.$row["nom_salle_conf"].'</td>
                <td>'.$row["desc_salle_conf"].'</td>
                <td>'.$carac_salle_conf.'</td>
                <td>'.$row["capacite_salle_conf"].'</td>
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
            $file_name = 'List of conference rooms_'.$date.'_'.$hour2.'.docx';
        } else {
            $file_name = 'Liste des salles de conference_'.$date.'_'.$hour2.'.docx';
        }
        header("Content-type: application/vnd.ms-word");  
        header('Content-Disposition: attachment; filename='. $file_name);
        
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('php://output');
        
        // Log
        switch ($_SESSION['type_compte']) {
        
            case 1:
                addlog("Exp-01-salle-conf", "Word", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Exp-02-salle-conf", "Word", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }


    }


    if($_POST['export_salle_conf'] == 'excel') {

        $query = "SELECT *
        FROM salle_conf LEFT JOIN 
        (SELECT id_salle_conf_fk_assoc_salle_conf_and_carac_conf, nom_carac_conf FROM carac_conf
        INNER JOIN assoc_salle_conf_and_carac_conf AS assoc
        ON carac_conf.id_carac_conf = assoc.id_carac_conf_fk_assoc_salle_conf_and_carac_conf
        WHERE carac_conf.statut_carac_conf = 'Actif') AS temp
        ON salle_conf.id_salle_conf = temp.id_salle_conf_fk_assoc_salle_conf_and_carac_conf
        ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        
        $date = gmdate("d-m-Y");
        $hour = gmdate("H:i");
        
        $hour2 = gmdate("H-i");
        
        if ($_SESSION['lang'] == 'EN') { 
            $nom_salle_conf = NOM_SALLE_CONF_EN;
            $desc_salle_conf =  DESC_SALLE_CONF_EN;
            $label_carac_salle_conf = CARAC_SALLE_CONF_EN;
            $capacite_salle_conf = CAPACITE_SALLE_CONF_EN;
            $titre = 'List of conference rooms on '.$date.' at '.$hour.' (GMT)';
        } else {
            $nom_salle_conf = NOM_SALLE_CONF_FR;
            $desc_salle_conf =  DESC_SALLE_CONF_FR;
            $label_carac_salle_conf = CARAC_SALLE_CONF_FR;
            $capacite_salle_conf = CAPACITE_SALLE_CONF_FR;
            $titre = 'Liste des salles de conference en date du '.$date.' à '.$hour.' (Heure GMT)';
        }

        $output = '
        <div class="table-responsive">
            <b>'. $titre .'</b>
            <table class="table table-boredered">
                <tr bgcolor="#c6efce">

                    <th>'. $nom_salle_conf .'</th>
                    <th>'. $desc_salle_conf .'</th>
                    <th>'. $label_carac_salle_conf .'</th>
                    <th>'. $capacite_salle_conf .'</th>
    
                </tr>
        ';

        // mettre le resultat de la requete dans le bon format
        $resultat = [];
        foreach($result as $row)
        {
            $provisoire = [];
            $provisoire['id_salle_conf'] = $row['id_salle_conf'];
            $provisoire['nom_salle_conf'] = $row['nom_salle_conf'];
            $provisoire['desc_salle_conf'] = $row['desc_salle_conf'];
            $provisoire['capacite_salle_conf'] = $row['capacite_salle_conf'];

            if( in_array($provisoire['id_salle_conf'], array_keys($resultat)) ) {
                array_push($resultat[$provisoire['id_salle_conf']]['carac_salle_conf'], $row['nom_carac_conf']);
            } else {
                $provisoire['carac_salle_conf'] = [];
                
                if ($row['nom_carac_conf'] === null) {
                    $provisoire['carac_salle_conf'][] = "";
                }
                else {
                    $provisoire['carac_salle_conf'][] = $row['nom_carac_conf'];
                }

                $resultat[$provisoire['id_salle_conf']] = $provisoire;
            }
        }

        foreach ($resultat as $row) {
            // caracteristiques
            $carac_salle_conf = '';
            foreach($row['carac_salle_conf'] as $index => $carac) {
                if ($index !== 0) {
                    $carac_salle_conf .= " - ";
                }
                $carac_salle_conf .= $carac;
            }
        
        
            $output .= '
            
                <tr>
                    <td>'.$row["nom_salle_conf"].'</td>
                    <td>'.$row["desc_salle_conf"].'</td>
                    <td>'.$carac_salle_conf.'</td>
                    <td>'.$row["capacite_salle_conf"].'</td>
                </tr>            
            ';
                
                    
        }
        $output .= '
            </table>
        </div>
        ';
        
        if ($_SESSION['lang'] == 'EN') {
            $file_name = 'List of rooms types_'.$date.'_'.$hour2.'.xls';
        } else {
            $file_name = 'Liste des salles de conference_'.$date.'_'.$hour2.'.xls';
        }

        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename='. $file_name);
        echo "\xEF\xBB\xBF";
        echo $output;

        // Log
        switch ($_SESSION['type_compte']) {
        
            case 1:
                addlog("Exp-01-salle-conf", "Excel", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Exp-02-salle-conf", "Excel", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }

    }    
}
