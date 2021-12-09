<?php
//type_plat_action.php

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

        // Vérifier si le type plat existe déjà dans la base
        $query0 = "
    	SELECT * FROM type_plat 
		WHERE nom_type_plat = :nom_type_plat 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_type_plat'	    =>	$_POST["nom_type_plat"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Ce type de plat existe déjà dans la liste.');
        } else
        {

            insert6('type_plat',
                'nom_type_plat',$_POST["nom_type_plat"],
                'desc_type_plat',$_POST["desc_type_plat"],
                'date_create_type_plat', date("Y-m-d H:i:s"),
                'date_last_modif_type_plat',date("Y-m-d H:i:s"),
                'user_create_type_plat', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_type_plat', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );

            //echo 'Le type de plat a été enregistré avec succès.';
            echo json_encode('Le type de plat a été enregistré avec succès.');

            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-type-plat", $_POST["nom_type_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-type-plat", $_POST["nom_type_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-type-plat", $_POST["nom_type_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-type-plat", $_POST["nom_type_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('type_plat',
            'id_type_plat',$_POST["id_type_plat"],
            'statut_type_plat',$status,
            'date_del_type_plat', date("Y-m-d H:i:s"),
            'user_del_type_plat', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );
        //echo 'Le statut du type de plat est : ' . $status;

        
        echo json_encode($status);
        


        // Log
        // On a besoin du nom du type de la plat
        $query00 = "
		SELECT nom_type_plat 
		FROM type_plat 
		WHERE id_type_plat = '".$_POST["id_type_plat"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_type_plat = "";

        foreach($result00 as $row00)
        {
            $nom_type_plat = $row00["nom_type_plat"];
        }

        

         switch ($_SESSION['type_compte']) {

             case 1:
                 addlog("Chg-01-type-plat", $nom_type_plat. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;
             case 2:
                 addlog("Chg-02-type-plat", $nom_type_plat. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;                 
         }

    }
}


/* Consulter */

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM type_plat WHERE id_type_plat = :id_type_plat";
        // $query = "SELECT * FROM type_plat WHERE id_type_plat = :id_type_plat";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_type_plat' => $_POST["id_type_plat_view"]
            )
        );
        $result = $statement->fetchAll();
        $output = '
    <div class="table-responsive">
      <table class="table table-boredered">
    ';

        //$nom_type_plat ='';
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
            if ($row['statut_type_plat'] == 'Actif') {
                $status = '<span class="badge badge-primary">'. $statut_actif .'</span>';
            } else {
                $status = '<span class="badge badge-danger">'. $statut_inactif .'</span>';
            }

            // Pour le journal d'événements
            //$nom_type_plat = $row["nom_type_plat"];

            if ($_SESSION['lang'] == 'EN') {
                    $label_nom = NOM_TYPE_PLAT_EN;
                    $label_desc = DESC_TYPE_PLAT_EN;
                    $label_date_create = LABEL_DATE_CREATE_EN;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                    $label_created_by = LABEL_CREATED_BY_EN;
                    $label_statut = STATUT_EN;
                } else {
                    $label_nom = NOM_TYPE_PLAT_FR;
                    $label_desc = DESC_TYPE_PLAT_FR;
                    $label_date_create = LABEL_DATE_CREATE_FR;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                    $label_created_by = LABEL_CREATED_BY_FR;
                    $label_statut = STATUT_FR;
                }


            $output .= '
      <tr>
        <td>' . $label_nom . '</td>
        <td>' . $row["nom_type_plat"] . '</td>
      </tr>
      <tr>
        <td>' . $label_desc . '</td>
        <td>' . $row["desc_type_plat"] . '</td>
      </tr>
      <tr>
        <td>' . $label_date_create . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_create_type_plat"])) . ' à ' . date("H:i", strtotime($row["date_create_type_plat"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_date_last_modif . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_last_modif_type_plat"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_type_plat"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_created_by . '</td>
        <td>' . $row['user_create_type_plat'] . '</td>
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
                addlog("Info-01-type-plat", $row["nom_type_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-type-plat", $row["nom_type_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-type-plat", $row["nom_type_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-type-plat", $row["nom_type_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-type-plat", $row["nom_type_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
        

    }

}



if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM type_plat WHERE id_type_plat = :id_type_plat";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_type_plat'	=>	$_POST["id_type_plat_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_type_plat = '';
        $desc_type_plat = '';


        foreach($result as $row)
        {
            $nom_type_plat = $row['nom_type_plat'];
            $desc_type_plat = $row['desc_type_plat'];
        }

        $output = array(
            'nom_type_plat' => $nom_type_plat,
            'desc_type_plat' => $desc_type_plat
        );

        echo json_encode($output);

    }

    /* Modifier */
    if($_POST['btn_action_modif'] == 'Modifier')
    {
        

        // Vérifier si le type de plat existe déjà dans la base
        $query0 = "
    	SELECT * 
        FROM ( 
            SELECT * 
        	FROM type_plat 
        	WHERE id_type_plat <> :id_type_plat  
        ) AS JP 
        WHERE nom_type_plat = :nom_type_plat 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_type_plat'	    =>	$_POST["id_type_plat_modif"],
                ':nom_type_plat'	    =>	$_POST["nom_type_plat_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            //echo 'Ce type de plat existe déjà dans la liste.';
            echo json_encode('Ce type de plat existe déjà dans la liste.');
        }else
        {

            update4('type_plat',
                'id_type_plat',$_POST["id_type_plat_modif"],
                'nom_type_plat',$_POST["nom_type_plat_modif"],
                'desc_type_plat',$_POST["desc_type_plat_modif"],
                'date_last_modif_type_plat',date("Y-m-d H:i:s"),
                'user_last_modif_type_plat', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );
            //echo 'Le type de plat a été modifié avec succès.';
            echo json_encode('Le type de plat a été modifié avec succès.');


            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-type-plat", $_POST["nom_type_plat_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-type-plat", $_POST["nom_type_plat_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-type-plat", $_POST["nom_type_plat_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;               
            }


        }

    }
    
}

?>