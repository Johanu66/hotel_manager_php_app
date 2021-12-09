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



if(isset($_POST['btn_export_article_restau'])) {

    if($_POST['export_article_restau'] == 'pdf') {

        $query = "SELECT * FROM article_restau ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        
        $date = gmdate("d-m-Y");
        $hour = gmdate("H:i");
        
        $hour2 = gmdate("H-i");
        

        if ($_SESSION['lang'] == 'EN') { 
            $nom_article_restau = NOM_ARTICLE_RESTAU_EN;
            $desc_article_restau =  DESC_ARTICLE_RESTAU_EN;
            $statut =  STATUT_EN;
            $statut_actif = STATUT_ACTIF_EN;
            $statut_inactif = STATUT_INACTIF_EN;
            $titre = 'List of room types on '.$date.' at '.$hour.' (GMT)';
        } else {
            $nom_article_restau = NOM_ARTICLE_RESTAU_FR;
            $desc_article_restau =  DESC_ARTICLE_RESTAU_FR;
            $statut =  STATUT_FR;
            $statut_actif = STATUT_ACTIF_FR;
            $statut_inactif = STATUT_INACTIF_FR;
            $titre = 'Liste des types de chambre en date du '.$date.' à '.$hour.' (Heure GMT)';
        }
        
        $output = '
        <div class="table-responsive" style="font-size: 16px !important;">
            <h1>'. $titre .'</h1>
            <table border="1" style="border-collapse:collapse;" >
                <tr bgcolor="#c6efce">
                
                    <th>N°</th>
                    <th>'. $nom_article_restau .'</th>
                    <th>'. $desc_article_restau .'</th>
                    <th>'. $statut .'</th>
        
                </tr>
        ';
        foreach($result as $row)
        {
            $status = '';
            if($row['statut_article_restau'] == 'Actif')
            {
                $status = '<center><span class="badge badge-primary">'. $statut_actif .'</span></center>';
            }
            else
            {
                $status = '<center><span class="badge badge-primary">'. $statut_inactif .'</span></center>';
            }
            
        $output .= '
                <tr>
                    <td>'.$row["id_article_restau"].'</td>
                    <td>'.$row["nom_article_restau"].'</td>
                    <td>'.$row["desc_article_restau"].'</td>
                    <td>'.$status.'</td>
                </tr>
        ';
        
        }
        $output .= '
            </table>
        </div>
        ';
        
        $pdf = new Pdf();
        if ($_SESSION['lang'] == 'EN') {
            $file_name = 'List of article_'.$date.'_'.$hour2.'.pdf';
        } else {
            $file_name = 'Liste des articles du restaurant_'.$date.'_'.$hour2.'.pdf';
        }

        $pdf->loadHtml($output);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream($file_name, array("Attachment" => false));
        
        // Log
        switch ($_SESSION['type_compte']) {
        
            case 1:
                addlog("Exp-01-article-restau", "PDF", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Exp-02-article-restau", "PDF", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
    }


    if($_POST['export_article_restau'] == 'word') {

        $query = "SELECT * FROM article_restau ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        
        $date = gmdate("d-m-Y");
        $hour = gmdate("H:i");
        
        $hour2 = gmdate("H-i");
        
        if ($_SESSION['lang'] == 'EN') { 
            $nom_article_restau = NOM_ARTICLE_RESTAU_EN;
            $desc_article_restau =  DESC_ARTICLE_RESTAU_EN;
            $statut =  STATUT_EN;
            $statut_actif = STATUT_ACTIF_EN;
            $statut_inactif = STATUT_INACTIF_EN;
            $titre = 'List of article on '.$date.' at '.$hour.' (GMT)';
        } else {
            $nom_article_restau = NOM_ARTICLE_RESTAU_FR;
            $desc_article_restau =  DESC_ARTICLE_RESTAU_FR;
            $statut =  STATUT_FR;
            $statut_actif = STATUT_ACTIF_FR;
            $statut_inactif = STATUT_INACTIF_FR;
            $titre = 'Liste des articles en date du '.$date.' à '.$hour.' (Heure GMT)';
        }

		$output = '
		    <b>'. $titre .'</b>
			<table style="width: 100%; border: 1px #000000 solid;">
			    <tr style="background-color:#c6efce; font-size: 15px; font-weight:bold; text-align: center; height: 20px ">
			    
                    <th>N°</th>
                    <th>'. $nom_article_restau .'</th>
                    <th>'. $desc_article_restau .'</th>
                    <th>'. $statut .'</th>
        
			    </tr>
		';
		foreach($result as $row)
		{
		    
            $status = '';
            if($row['statut_article_restau'] == 'Actif')
            {
                $status = '<center><span class="badge badge-primary">'. $statut_actif .'</span></center>';
            }
            else
            {
                $status = '<center><span class="badge badge-primary">'. $statut_inactif .'</span></center>';
            }
		    
			
			$output .= '
			
			<tr style="font-size: 15px; height:30px;">
                <td>'.$row["id_article_restau"].'</td>
                <td>'.$row["nom_article_restau"].'</td>
                <td>'.$row["desc_article_restau"].'</td>
                <td>'.$status.'</td>
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
            $file_name = 'List of article'.$date.'_'.$hour2.'.docx';
        } else {
            $file_name = 'Liste des articles du restaurant'.$date.'_'.$hour2.'.docx';
        }
        header("Content-type: application/vnd.ms-word");  
        header('Content-Disposition: attachment; filename='. $file_name);
        
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('php://output');
        
        // Log
        switch ($_SESSION['type_compte']) {
        
            case 1:
                addlog("Exp-01-article-restau", "Word", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Exp-02-article-restau", "Word", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }


    }


    if($_POST['export_article_restau'] == 'excel') {

        $query = "SELECT * FROM article_restau ";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        
        $date = gmdate("d-m-Y");
        $hour = gmdate("H:i");
        
        $hour2 = gmdate("H-i");
        
        if ($_SESSION['lang'] == 'EN') { 
            $nom_article_restau = NOM_ARTICLE_RESTAU_EN;
            $desc_article_restau =  DESC_ARTICLE_RESTAU_EN;
            $statut =  STATUT_EN;
            $statut_actif = STATUT_ACTIF_EN;
            $statut_inactif = STATUT_INACTIF_EN;
            $titre = 'List of article on '.$date.' at '.$hour.' (GMT)';
        } else {
            $nom_article_restau = NOM_ARTICLE_RESTAU_FR;
            $desc_article_restau =  DESC_ARTICLE_RESTAU_FR;
            $statut =  STATUT_FR;
            $statut_actif = STATUT_ACTIF_FR;
            $statut_inactif = STATUT_INACTIF_FR;
            $titre = 'Liste des articles en date du '.$date.' à '.$hour.' (Heure GMT)';
        }

        $output = '
        <div class="table-responsive">
            <b>'. $titre .'</b>
            <table class="table table-boredered">
                <tr bgcolor="#c6efce">

                    <th>N°</th>
                    <th>'. $nom_article_restau .'</th>
                    <th>'. $desc_article_restau .'</th>
                    <th>'. $statut .'</th>
        
                </tr>
        ';
        foreach($result as $row)
        {
            
            $status = '';
            if($row['statut_article_restau'] == 'Actif')
            {
                $status = '<center><span class="badge badge-primary">'. $statut_actif .'</span></center>';
            }
            else
            {
                $status = '<center><span class="badge badge-primary">'. $statut_inactif .'</span></center>';
            }
            
        $output .= '
            
            <tr>
                <td>'.$row["id_article_restau"].'</td>
            <td>'.$row["nom_article_restau"].'</td>
                <td>'.$row["desc_article_restau"].'</td>
                <td>'.$status.'</td>
            </tr>            
        ';
            
                    
        }
        $output .= '
            </table>
        </div>
        ';
        
        if ($_SESSION['lang'] == 'EN') {
            $file_name = 'List of article_'.$date.'_'.$hour2.'.xls';
        } else {
            $file_name = 'Liste des articles du restaurant_'.$date.'_'.$hour2.'.xls';
        }

        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename='. $file_name);
        echo "\xEF\xBB\xBF";
        echo $output;

        // Log
        switch ($_SESSION['type_compte']) {
        
            case 1:
                addlog("Exp-01-article-restau", "Excel", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Exp-02-article-restau", "Excel", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }

    }    
}
