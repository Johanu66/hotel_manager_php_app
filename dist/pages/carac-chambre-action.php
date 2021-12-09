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
    	SELECT * FROM carac_chambre 
		WHERE nom_carac_chambre = :nom_carac_chambre 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_carac_chambre'	    =>	$_POST["nom_carac_chambre"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette caractéristique de chambre existe déjà dans la liste.');
        }else
        {

            insert6('carac_chambre',
                'nom_carac_chambre',$_POST["nom_carac_chambre"],
                'desc_carac_chambre',$_POST["desc_carac_chambre"],
                'date_create_carac_chambre', date("Y-m-d H:i:s"),
                'date_last_modif_carac_chambre',date("Y-m-d H:i:s"),
                'user_create_carac_chambre', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_carac_chambre', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );
            //echo 'Le type de chambre a été enregistré avec succès.';
            echo json_encode('La caractéristique de la chambre a été enregistrée avec succès.');

            

            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-carac-chambre", $_POST["nom_carac_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-carac-chambre", $_POST["nom_carac_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-carac-chambre", $_POST["nom_carac_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-carac-chambre", $_POST["nom_carac_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('carac_chambre',
            'id_carac_chambre',$_POST["id_carac_chambre"],
            'statut_carac_chambre',$status,
            'date_del_carac_chambre', date("Y-m-d H:i:s"),
            'user_del_carac_chambre', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );
        //echo 'Le statut du type de chambre est : ' . $status;

        
        echo json_encode($status);


        // Log
        // On a besoin du nom du type de la chambre
        $query00 = "
		SELECT nom_carac_chambre 
		FROM carac_chambre 
		WHERE id_carac_chambre = '".$_POST["id_carac_chambre"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_carac_chambre = "";

        foreach($result00 as $row00)
        {
            $nom_carac_chambre = $row00["nom_carac_chambre"];
        }

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Chg-01-carac-chambre", $nom_carac_chambre.",".$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Chg-02-carac-chambre", $nom_carac_chambre.",".$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            
        }



    }
}
 
 /* Consulter */
/* la selection de tous les colums de la table lorque le bouton est cliqué*/

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM carac_chambre WHERE id_carac_chambre = :id_carac_chambre";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_carac_chambre' => $_POST["id_carac_chambre_view"]
            )
        );
        /* debut du tableau dans le formulaire */
        $result = $statement->fetchAll();
        $output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';

        //$nom_carac_chambre ='';
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
            if ($row['statut_carac_chambre'] == 'Actif') {
                $status = '<span class="badge badge-primary">'. $statut_actif .'</span>';
            } else {
                $status = '<span class="badge badge-danger">'. $statut_inactif .'</span>';
            }

            // Pour le journal d'événements
            //$nom_carac_chambre = $row["nom_carac_chambre"];

            if ($_SESSION['lang'] == 'EN') {
                $label_nom = NOM_CARAC_CHAMBRE_EN;
                $label_desc = DESC_CARAC_CHAMBRE_EN;
                $label_date_create = LABEL_DATE_CREATE_EN;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                $label_created_by = LABEL_CREATED_BY_EN;
                $label_statut = STATUT_EN;
            } else {
                $label_nom = NOM_CARAC_CHAMBRE_FR;
                $label_desc = DESC_CARAC_CHAMBRE_FR;
                $label_date_create = LABEL_DATE_CREATE_FR;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                $label_created_by = LABEL_CREATED_BY_FR;
                $label_statut = STATUT_FR;
            }


            $output .= '
			<tr>
				<td>' . $label_nom . '</td>
				<td>' . $row["nom_carac_chambre"] . '</td>
			</tr>
			<tr>
				<td>' . $label_desc . '</td>
				<td>' . $row["desc_carac_chambre"] . '</td>
			</tr>
			<tr>
				<td>' . $label_date_create . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_create_carac_chambre"])) . ' à ' . date("H:i", strtotime($row["date_create_carac_chambre"])) . '</td>
			</tr>
			<tr>
				<td>' . $label_date_last_modif . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_last_modif_carac_chambre"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_carac_chambre"])) . '</td>
			</tr>
			<tr>
				<td>' . $label_created_by . '</td>
                <td>' . $row['user_create_carac_chambre'] . '</td>
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
        /* fermeture du tableau */
        echo json_encode($output);

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Info-01-carac-chambre", $row["nom_carac_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-carac-chambre", $row["nom_carac_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-carac-chambre", $row["nom_carac_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-carac-chambre", $row["nom_carac_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-carac-chambre", $row["nom_carac_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }


    }

}


if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM carac_chambre WHERE id_carac_chambre = :id_carac_chambre";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_carac_chambre'	=>	$_POST["id_carac_chambre_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_carac_chambre = '';
        $desc_carac_chambre = '';


        foreach($result as $row)
        {
            $nom_carac_chambre = $row['nom_carac_chambre'];
            $desc_carac_chambre = $row['desc_carac_chambre'];
        }

        $output = array(
            'nom_carac_chambre' => $nom_carac_chambre,
            'desc_carac_chambre' => $desc_carac_chambre
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
        	FROM carac_chambre 
        	WHERE id_carac_chambre <> :id_carac_chambre  
        ) AS JP 
        WHERE nom_carac_chambre = :nom_carac_chambre 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_carac_chambre'	    =>	$_POST["id_carac_chambre_modif"],
                ':nom_carac_chambre'	    =>	$_POST["nom_carac_chambre_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            //echo 'Ce type de chambre existe déjà dans la liste.';
            echo json_encode('Cette caractéristique de chambre existe déjà dans la liste.');
        }else
        {

            update4('carac_chambre',
                'id_carac_chambre',$_POST["id_carac_chambre_modif"],
                'nom_carac_chambre',$_POST["nom_carac_chambre_modif"],
                'desc_carac_chambre',$_POST["desc_carac_chambre_modif"],
                'date_last_modif_carac_chambre',date("Y-m-d H:i:s"),
                'user_last_modif_carac_chambre', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );
            //echo 'Le type de chambre a été modifié avec succès.';
            echo json_encode('La caractéristique de la chambre a été modifiée avec succès.');




            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-carac-chambre", $_POST['nom_carac_chambre_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-carac-chambre", $_POST['nom_carac_chambre_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-carac-chambre", $_POST['nom_carac_chambre_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                
            }

        }

    }
}

?>
