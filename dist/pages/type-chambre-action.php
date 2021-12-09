<?php
//type_chambre_action.php

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
    	SELECT * FROM type_chambre 
		WHERE nom_type_chambre = :nom_type_chambre 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_type_chambre'	    =>	$_POST["nom_type_chambre"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Ce type de chambre existe déjà dans la liste.');
        } else
        {

            insert6('type_chambre',
                'nom_type_chambre',$_POST["nom_type_chambre"],
                'desc_type_chambre',$_POST["desc_type_chambre"],
                'date_create_type_chambre', date("Y-m-d H:i:s"),
                'date_last_modif_type_chambre',date("Y-m-d H:i:s"),
                'user_create_type_chambre', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_type_chambre', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );

            //echo 'Le type de chambre a été enregistré avec succès.';
            echo json_encode('Le type de chambre a été enregistré avec succès.');

            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-type-chambre", $_POST["nom_type_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-type-chambre", $_POST["nom_type_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-type-chambre", $_POST["nom_type_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-type-chambre", $_POST["nom_type_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('type_chambre',
            'id_type_chambre',$_POST["id_type_chambre"],
            'statut_type_chambre',$status,
            'date_del_type_chambre', date("Y-m-d H:i:s"),
            'user_del_type_chambre', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );
        //echo 'Le statut du type de chambre est : ' . $status;

        
        echo json_encode($status);
        


        // Log
        // On a besoin du nom du type de la chambre
        $query00 = "
		SELECT nom_type_chambre 
		FROM type_chambre 
		WHERE id_type_chambre = '".$_POST["id_type_chambre"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_type_chambre = "";

        foreach($result00 as $row00)
        {
            $nom_type_chambre = $row00["nom_type_chambre"];
        }

        

         switch ($_SESSION['type_compte']) {

             case 1:
                 addlog("Chg-01-type-chambre", $nom_type_chambre. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;
             case 2:
                 addlog("Chg-02-type-chambre", $nom_type_chambre. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;                 
         }

    }
}


/* Consulter */

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM type_chambre WHERE id_type_chambre = :id_type_chambre";
        // $query = "SELECT * FROM type_chambre WHERE id_type_chambre = :id_type_chambre";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_type_chambre' => $_POST["id_type_chambre_view"]
            )
        );
        $result = $statement->fetchAll();
        $output = '
    <div class="table-responsive">
      <table class="table table-boredered">
    ';

        //$nom_type_chambre ='';
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
            if ($row['statut_type_chambre'] == 'Actif') {
                $status = '<span class="badge badge-primary">'. $statut_actif .'</span>';
            } else {
                $status = '<span class="badge badge-danger">'. $statut_inactif .'</span>';
            }

            // Pour le journal d'événements
            //$nom_type_chambre = $row["nom_type_chambre"];

            if ($_SESSION['lang'] == 'EN') {
                    $label_nom = NOM_TYPE_CHAMBRE_EN;
                    $label_desc = DESC_TYPE_CHAMBRE_EN;
                    $label_date_create = LABEL_DATE_CREATE_EN;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                    $label_created_by = LABEL_CREATED_BY_EN;
                    $label_statut = STATUT_EN;
                } else {
                    $label_nom = NOM_TYPE_CHAMBRE_FR;
                    $label_desc = DESC_TYPE_CHAMBRE_FR;
                    $label_date_create = LABEL_DATE_CREATE_FR;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                    $label_created_by = LABEL_CREATED_BY_FR;
                    $label_statut = STATUT_FR;
                }


            $output .= '
      <tr>
        <td>' . $label_nom . '</td>
        <td>' . $row["nom_type_chambre"] . '</td>
      </tr>
      <tr>
        <td>' . $label_desc . '</td>
        <td>' . $row["desc_type_chambre"] . '</td>
      </tr>
      <tr>
        <td>' . $label_date_create . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_create_type_chambre"])) . ' à ' . date("H:i", strtotime($row["date_create_type_chambre"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_date_last_modif . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_last_modif_type_chambre"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_type_chambre"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_created_by . '</td>
        <td>' . $row['user_create_type_chambre'] . '</td>
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
                addlog("Info-01-type-chambre", $row["nom_type_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-type-chambre", $row["nom_type_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-type-chambre", $row["nom_type_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-type-chambre", $row["nom_type_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-type-chambre", $row["nom_type_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
        

    }

}



if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM type_chambre WHERE id_type_chambre = :id_type_chambre";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_type_chambre'	=>	$_POST["id_type_chambre_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_type_chambre = '';
        $desc_type_chambre = '';


        foreach($result as $row)
        {
            $nom_type_chambre = $row['nom_type_chambre'];
            $desc_type_chambre = $row['desc_type_chambre'];
        }

        $output = array(
            'nom_type_chambre' => $nom_type_chambre,
            'desc_type_chambre' => $desc_type_chambre
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
        	FROM type_chambre 
        	WHERE id_type_chambre <> :id_type_chambre  
        ) AS JP 
        WHERE nom_type_chambre = :nom_type_chambre 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_type_chambre'	    =>	$_POST["id_type_chambre_modif"],
                ':nom_type_chambre'	    =>	$_POST["nom_type_chambre_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            //echo 'Ce type de chambre existe déjà dans la liste.';
            echo json_encode('Ce type de chambre existe déjà dans la liste.');
        }else
        {

            update4('type_chambre',
                'id_type_chambre',$_POST["id_type_chambre_modif"],
                'nom_type_chambre',$_POST["nom_type_chambre_modif"],
                'desc_type_chambre',$_POST["desc_type_chambre_modif"],
                'date_last_modif_type_chambre',date("Y-m-d H:i:s"),
                'user_last_modif_type_chambre', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );
            //echo 'Le type de chambre a été modifié avec succès.';
            echo json_encode('Le type de chambre a été modifié avec succès.');


            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-type-chambre", $_POST["nom_type_chambre_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-type-chambre", $_POST["nom_type_chambre_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-type-chambre", $_POST["nom_type_chambre_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;               
            }


        }

    }
    
}

?>