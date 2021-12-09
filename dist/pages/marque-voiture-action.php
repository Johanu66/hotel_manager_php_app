<?php
//marque_voiture_action.php

include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_sql.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');



if(isset($_POST['btn_action']))
{
    /* Enregistrer */
    if($_POST['btn_action'] == 'Enregistrer')
    {

        // Vérifier si le type chambre existe déjà dans la base
        $query0 = "
    	SELECT * FROM marque_voiture 
		WHERE nom_marque_voiture = :nom_marque_voiture 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_marque_voiture'	    =>	$_POST["nom_marque_voiture"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette marque existe déjà dans la liste.');
        } else
        {

            insert6('marque_voiture',
                'nom_marque_voiture',$_POST["nom_marque_voiture"],
                'desc_marque_voiture',$_POST["desc_marque_voiture"],
                'date_create_marque_voiture', date("Y-m-d H:i:s"),
                'date_last_modif_marque_voiture',date("Y-m-d H:i:s"),
                'user_create_marque_voiture', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_marque_voiture', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );

            //echo 'La marque de la voiture a été enregistrée avec succès.';
            echo json_encode('La marque de voiture a été enregistrée avec succès.');

             // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-marque-voiture", $_POST["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-marque-voiture", $_POST["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-marque-voiture", $_POST["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-marque-voiture", $_POST["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
            }
 

        }

    }

    /* Delete */
    if($_POST['btn_action'] == 'delete')
    {
            
        $status = 'Actif';
        if($_POST['status'] == 'Actif')
        {
            $status = 'Inactif';
        }

        update3('marque_voiture',
            'id_marque_voiture',$_POST["id_marque_voiture"],
            'statut_marque_voiture',$status,
            'date_del_marque_voiture', date("Y-m-d H:i:s"),
            'user_del_marque_voiture', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );
        //echo 'Le statut du type de chambre est : ' . $status;

        
        echo json_encode($status);
        


        // Log
        // On a besoin du nom du type de la chambre
        $query00 = "
		SELECT nom_marque_voiture 
		FROM marque_voiture 
		WHERE id_marque_voiture = '".$_POST["id_marque_voiture"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_marque_voiture = "";

        foreach($result00 as $row00)
        {
            $nom_marque_voiture = $row00["nom_marque_voiture"];
        }

        

          switch ($_SESSION['type_compte']) {

             case 1:
                 addlog("Chg-01-marque-voiture", $nom_marque_voiture. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;
             case 2:
                 addlog("Chg-02-marque-voiture", $nom_marque_voiture. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;                 
         } 

    }
}


/* Consulter */

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM marque_voiture WHERE id_marque_voiture = :id_marque_voiture";
        // $query = "SELECT * FROM marque_voiture WHERE id_marque_voiture = :id_marque_voiture";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_marque_voiture' => $_POST["id_marque_voiture_view"]
            )
        );
        $result = $statement->fetchAll();
        $output = '
    <div class="table-responsive">
      <table class="table table-boredered">
    ';

        //$nom_marque_voiture ='';
        if ($_SESSION['lang'] == 'EN') {
            $statut_actif = STATUT_ACTIF_EN;
        } else {
            $statut_actif = STATUT_ACTIF_FR;
        }
        if ($_SESSION['lang'] == 'EN') {
            $statut_inactif = STATUT_INACTIF_EN;
        } else {
            $statut_inactif = STATUT_INACTIF_FR;
        }

        foreach ($result as $row) {
            $status = '';
            if ($row['statut_marque_voiture'] == 'Actif') {
                $status = '<span class="badge badge-primary">'. $statut_actif .'</span>';
            } else {
                $status = '<span class="badge badge-danger">'. $statut_inactif .'</span>';
            }

            // Pour le journal d'événements
            //$nom_marque_voiture = $row["nom_marque_voiture"];

            if ($_SESSION['lang'] == 'EN') {
                    $label_nom = NOM_MARQUE_VOITURE_EN;
                    $label_desc = DESC_MARQUE_VOITURE_EN;
                    $label_date_create = LABEL_DATE_CREATE_EN;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                    $label_created_by = LABEL_CREATED_BY_EN;
                    $label_statut = STATUT_EN;
                } else {
                    $label_nom = NOM_MARQUE_VOITURE_FR;
                    $label_desc = DESC_MARQUE_VOITURE_FR;
                    $label_date_create = LABEL_DATE_CREATE_FR;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                    $label_created_by = LABEL_CREATED_BY_FR;
                    $label_statut = STATUT_FR;
                }


            $output .= '
      <tr>
        <td>' . $label_nom . '</td>
        <td>' . $row["nom_marque_voiture"] . '</td>
      </tr>
      <tr>
        <td>' . $label_desc . '</td>
        <td>' . $row["desc_marque_voiture"] . '</td>
      </tr>
      <tr>
        <td>' . $label_date_create . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_create_marque_voiture"])) . ' à ' . date("H:i", strtotime($row["date_create_marque_voiture"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_date_last_modif . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_last_modif_marque_voiture"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_marque_voiture"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_created_by . '</td>
        <td>' . $row['user_create_marque_voiture'] . '</td>
      </tr>
      <tr>
        <td>' . $label_statut . '</td>
        <td>' . $status . '</td>
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
                addlog("Info-01-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        } 
        

    }

}



if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM marque_voiture WHERE id_marque_voiture = :id_marque_voiture";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_marque_voiture'	=>	$_POST["id_marque_voiture_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_marque_voiture = '';
        $desc_marque_voiture = '';


        foreach($result as $row)
        {
            $nom_marque_voiture = $row['nom_marque_voiture'];
            $desc_marque_voiture = $row['desc_marque_voiture'];
        }

        $output = array(
            'nom_marque_voiture' => $nom_marque_voiture,
            'desc_marque_voiture' => $desc_marque_voiture
        );

        echo json_encode($output);

    }

    /* Modifier */
    if($_POST['btn_action_modif'] == 'Modifier')
    {
        

        // Vérifier si le type de chambre existe déjà dans la base
        $query0 = "
    	SELECT * 
        FROM ( 
            SELECT * 
        	FROM marque_voiture 
        	WHERE id_marque_voiture <> :id_marque_voiture  
        ) AS JP 
        WHERE nom_marque_voiture = :nom_marque_voiture 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_marque_voiture'	    =>	$_POST["id_marque_voiture_modif"],
                ':nom_marque_voiture'	    =>	$_POST["nom_marque_voiture_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            //echo 'Cette marque existe déjà dans la liste.';
            echo json_encode('Cette marque existe déjà dans la liste.');
        }else
        {

            update4('marque_voiture',
                'id_marque_voiture',$_POST["id_marque_voiture_modif"],
                'nom_marque_voiture',$_POST["nom_marque_voiture_modif"],
                'desc_marque_voiture',$_POST["desc_marque_voiture_modif"],
                'date_last_modif_marque_voiture',date("Y-m-d H:i:s"),
                'user_last_modif_marque_voiture', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );
            //echo 'La marque de voiture a été modifiée avec succès.';
            echo json_encode('La marque de voiture a été modifiée avec succès.');


            // Log
             switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-marque-voiture", $_POST["nom_marque_voiture_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-marque-voiture", $_POST["nom_marque_voiture_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-marque-voiture", $_POST["nom_marque_voiture_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;               
            } 


        }

    }
    
}

?>