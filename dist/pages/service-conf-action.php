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
    	SELECT * FROM service_conf 
		WHERE nom_service_conf = :nom_service_conf
        AND statut_service_conf = 'Actif'
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_service_conf'	    =>	$_POST["nom_service_conf"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Ce service existe déjà dans la liste');
        }else
        {

            insert6('service_conf',
                'nom_service_conf',$_POST["nom_service_conf"],
                'desc_service_conf',$_POST["desc_service_conf"],
                'date_create_service_conf', date("Y-m-d H:i:s"),
                'date_last_modif_service_conf',date("Y-m-d H:i:s"),
                'user_create_service_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_service_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );

            echo json_encode('Le service a été enregistré avec succès.');

            

            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-service-conf", $_POST["nom_service_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-service-conf", $_POST["nom_service_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-service-conf", $_POST["nom_service_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-service-conf", $_POST["nom_service_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('service_conf',
            'id_service_conf',$_POST["id_service_conf"],
            'statut_service_conf',$status,
            'date_del_service_conf', date("Y-m-d H:i:s"),
            'user_del_service_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );
        
        echo json_encode($status);


        // Log
        $query00 = "
		SELECT nom_service_conf 
		FROM service_conf 
		WHERE id_service_conf = '".$_POST["id_service_conf"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_service_conf = "";

        foreach($result00 as $row00)
        {
            $nom_service_conf = $row00["nom_service_conf"];
        }

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Chg-01-service-conf", $nom_service_conf.",".$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Chg-02-service-conf", $nom_service_conf.",".$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            
        }
    }
}
 
 /* Consulter */
if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM service_conf WHERE id_service_conf = :id_service_conf";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_service_conf' => $_POST["id_service_conf_view"]
            )
        );
        /* debut du tableau dans le formulaire */
        $result = $statement->fetchAll();
        $output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';


        foreach ($result as $row) {

            // Pour le journal d'événements
            //$nom_service_conf = $row["nom_service_conf"];

            if ($_SESSION['lang'] == 'EN') {
                $label_nom = NOM_SERVICE_CONF_EN;
                $label_desc = DESC_SERVICE_CONF_EN;
                $label_date_create = LABEL_DATE_CREATE_EN;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                $label_created_by = LABEL_CREATED_BY_EN;
            } else {
                $label_nom = NOM_SERVICE_CONF_FR;
                $label_desc = DESC_SERVICE_CONF_FR;
                $label_date_create = LABEL_DATE_CREATE_FR;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                $label_created_by = LABEL_CREATED_BY_FR;
            }


            $output .= '
			<tr>
				<td>' . $label_nom . '</td>
				<td>' . $row["nom_service_conf"] . '</td>
			</tr>
			<tr>
				<td>' . $label_desc . '</td>
				<td>' . $row["desc_service_conf"] . '</td>
			</tr>
			<tr>
				<td>' . $label_date_create . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_create_service_conf"])) . ' à ' . date("H:i", strtotime($row["date_create_service_conf"])) . '</td>
			</tr>
			<tr>
				<td>' . $label_date_last_modif . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_last_modif_service_conf"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_service_conf"])) . '</td>
			</tr>
			<tr>
				<td>' . $label_created_by . '</td>
                <td>' . $row['user_create_service_conf'] . '</td>
                </tr>
			';
        }


        $output .= '
			</table> 
		</div>
		';
        /* fermeture du tableau */
        echo json_encode($output);

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Info-01-service-conf", $row["nom_service_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-service-conf", $row["nom_service_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-service-conf", $row["nom_service_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-service-conf", $row["nom_service_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-service-conf", $row["nom_service_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }


    }

}


if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM service_conf WHERE id_service_conf = :id_service_conf";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_service_conf'	=>	$_POST["id_service_conf_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_service_conf = '';
        $desc_service_conf = '';


        foreach($result as $row)
        {
            $nom_service_conf = $row['nom_service_conf'];
            $desc_service_conf = $row['desc_service_conf'];
        }

        $output = array(
            'nom_service_conf' => $nom_service_conf,
            'desc_service_conf' => $desc_service_conf
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
        	FROM service_conf 
        	WHERE id_service_conf <> :id_service_conf  
        ) AS JP 
        WHERE nom_service_conf = :nom_service_conf 
        AND statut_service_conf = 'Actif'
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_service_conf'	    =>	$_POST["id_service_conf_modif"],
                ':nom_service_conf'	    =>	$_POST["nom_service_conf_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            //echo 'Ce type de chambre existe déjà dans la liste.';
            echo json_encode('Ce service existe déjà dans la liste');
        }else
        {

            update4('service_conf',
                'id_service_conf',$_POST["id_service_conf_modif"],
                'nom_service_conf',$_POST["nom_service_conf_modif"],
                'desc_service_conf',$_POST["desc_service_conf_modif"],
                'date_last_modif_service_conf',date("Y-m-d H:i:s"),
                'user_last_modif_service_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );
            //echo 'Le type de chambre a été modifié avec succès.';
            echo json_encode('Le service a été modifié avec succès.');


            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-service-conf", $_POST['nom_service_conf_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-service-conf", $_POST['nom_service_conf_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-service-conf", $_POST['nom_service_conf_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                
            }

        }

    }
}

?>
