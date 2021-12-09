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
    	SELECT * FROM carac_conf 
		WHERE nom_carac_conf = :nom_carac_conf
        AND statut_carac_conf = 'Actif'
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_carac_conf'	    =>	$_POST["nom_carac_conf"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette caractéristique de salle de conférence existe déjà dans la liste.');
        }else
        {

            insert6('carac_conf',
                'nom_carac_conf',$_POST["nom_carac_conf"],
                'desc_carac_conf',$_POST["desc_carac_conf"],
                'date_create_carac_conf', date("Y-m-d H:i:s"),
                'date_last_modif_carac_conf',date("Y-m-d H:i:s"),
                'user_create_carac_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_carac_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );

            echo json_encode('La caractéristique de salle de conférence a été enregistrée avec succès.');

            

            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-carac-conf", $_POST["nom_carac_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-carac-conf", $_POST["nom_carac_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-carac-conf", $_POST["nom_carac_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-carac-conf", $_POST["nom_carac_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('carac_conf',
            'id_carac_conf',$_POST["id_carac_conf"],
            'statut_carac_conf',$status,
            'date_del_carac_conf', date("Y-m-d H:i:s"),
            'user_del_carac_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );
        
        echo json_encode($status);


        // Log
        $query00 = "
		SELECT nom_carac_conf 
		FROM carac_conf 
		WHERE id_carac_conf = '".$_POST["id_carac_conf"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_carac_conf = "";

        foreach($result00 as $row00)
        {
            $nom_carac_conf = $row00["nom_carac_conf"];
        }

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Chg-01-carac-conf", $nom_carac_conf.",".$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Chg-02-carac-conf", $nom_carac_conf.",".$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            
        }
    }
}
 
 /* Consulter */
if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM carac_conf WHERE id_carac_conf = :id_carac_conf";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_carac_conf' => $_POST["id_carac_conf_view"]
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
            //$nom_carac_conf = $row["nom_carac_conf"];

            if ($_SESSION['lang'] == 'EN') {
                $label_nom = NOM_CARAC_CONF_EN;
                $label_desc = DESC_CARAC_CONF_EN;
                $label_date_create = LABEL_DATE_CREATE_EN;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                $label_created_by = LABEL_CREATED_BY_EN;
            } else {
                $label_nom = NOM_CARAC_CONF_FR;
                $label_desc = DESC_CARAC_CONF_FR;
                $label_date_create = LABEL_DATE_CREATE_FR;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                $label_created_by = LABEL_CREATED_BY_FR;
            }


            $output .= '
			<tr>
				<td>' . $label_nom . '</td>
				<td>' . $row["nom_carac_conf"] . '</td>
			</tr>
			<tr>
				<td>' . $label_desc . '</td>
				<td>' . $row["desc_carac_conf"] . '</td>
			</tr>
			<tr>
				<td>' . $label_date_create . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_create_carac_conf"])) . ' à ' . date("H:i", strtotime($row["date_create_carac_conf"])) . '</td>
			</tr>
			<tr>
				<td>' . $label_date_last_modif . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_last_modif_carac_conf"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_carac_conf"])) . '</td>
			</tr>
			<tr>
				<td>' . $label_created_by . '</td>
                <td>' . $row['user_create_carac_conf'] . '</td>
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
                addlog("Info-01-carac-conf", $row["nom_carac_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-carac-conf", $row["nom_carac_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-carac-conf", $row["nom_carac_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-carac-conf", $row["nom_carac_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-carac-conf", $row["nom_carac_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }


    }

}


if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM carac_conf WHERE id_carac_conf = :id_carac_conf";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_carac_conf'	=>	$_POST["id_carac_conf_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_carac_conf = '';
        $desc_carac_conf = '';


        foreach($result as $row)
        {
            $nom_carac_conf = $row['nom_carac_conf'];
            $desc_carac_conf = $row['desc_carac_conf'];
        }

        $output = array(
            'nom_carac_conf' => $nom_carac_conf,
            'desc_carac_conf' => $desc_carac_conf
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
        	FROM carac_conf 
        	WHERE id_carac_conf <> :id_carac_conf  
        ) AS JP 
        WHERE nom_carac_conf = :nom_carac_conf 
        AND statut_carac_conf = 'Actif'
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_carac_conf'	    =>	$_POST["id_carac_conf_modif"],
                ':nom_carac_conf'	    =>	$_POST["nom_carac_conf_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            //echo 'Ce type de chambre existe déjà dans la liste.';
            echo json_encode('Cette caractéristique de salle de conférence existe déjà dans la liste.');
        }else
        {

            update4('carac_conf',
                'id_carac_conf',$_POST["id_carac_conf_modif"],
                'nom_carac_conf',$_POST["nom_carac_conf_modif"],
                'desc_carac_conf',$_POST["desc_carac_conf_modif"],
                'date_last_modif_carac_conf',date("Y-m-d H:i:s"),
                'user_last_modif_carac_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );
            //echo 'Le type de chambre a été modifié avec succès.';
            echo json_encode('La caractéristique de salle de conférence a été modifiée avec succès.');




            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-carac-conf", $_POST['nom_carac_conf_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-carac-conf", $_POST['nom_carac_conf_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-carac-conf", $_POST['nom_carac_conf_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                
            }

        }

    }
}

?>
