<?php

//plat_action.php

include('../AddLogInclude.php');
include('../database_connection.php');
include('../scripts_php/fonctions_sql.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');


if(isset($_POST['btn_action']))
{
    /* Enregistrer */
    if($_POST['btn_action'] == 'Enregistrer')
    {

        // Vérifier si la plat existe déjà dans la base
        $query0 = "
    	SELECT * FROM plat 
		WHERE nom_plat = :nom_plat 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_plat'	=>	$_POST["nom_plat"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette plat existe déjà dans la liste.');
        }else
        {

            insert8('plat',
                'nom_plat',$_POST["nom_plat"],
                'desc_plat',$_POST["desc_plat"],
                'prix_unit_plat',$_POST["prix_unit_plat"],
                'date_create_plat',date("Y-m-d H:i:s"),
                'date_last_modif_plat',date("Y-m-d H:i:s"),
                'user_create_plat', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_plat', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'id_type_plat_fk_plat',$_POST["id_type_plat_fk_plat"]
            );
            echo json_encode('La plat a été enregistrée avec succès.');


            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-plat", $_POST["nom_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-plat", $_POST["nom_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-plat", $_POST["nom_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-plat", $_POST["nom_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('plat',
            'id_plat',$_POST["id_plat"],
            'statut_plat',$status,
            'date_del_plat', date("Y-m-d H:i:s"),
            'user_del_plat', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );

        echo json_encode($status);

        // Log
        // On a besoin du nom de la plat
        $query00 = "
		SELECT nom_plat 
		FROM plat 
		WHERE id_plat = '".$_POST["id_plat"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_plat = "";

        foreach($result00 as $row00)
        {
            $nom_plat = $row00["nom_plat"];
        }

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Chg-01-plat", $nom_plat. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Chg-02-plat", $nom_plat. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }



    }
}


/* Consulter */

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM plat WHERE id_plat = :id_plat";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_plat' => $_POST["id_plat_view"]
            )
        );
        $result = $statement->fetchAll();
        $output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';

        //$nom_plat ='';
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
            if ($row['statut_plat'] == 'Actif') {
                $status = '<span class="badge badge-primary">'. $statut_actif .'</span>';
            } else {
                $status = '<span class="badge badge-danger">'. $statut_inactif .'</span>';
            }

            // Pour le journal d'événements
            //$nom_plat = $row["nom_plat"];

            if ($_SESSION['lang'] == 'EN') {
                $label_nom = NOM_PLAT_EN;
                $label_desc = DESC_PLAT_EN;
                $label_prix_unit = PRIX_UNIT_PLAT_EN;
                $label_date_create = LABEL_DATE_CREATE_EN;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                $label_created_by = LABEL_CREATED_BY_EN;
                $label_statut = STATUT_EN;
            } else {
                $label_nom = NOM_PLAT_FR;
                $label_desc = DESC_PLAT_FR;
                $label_prix_unit = PRIX_UNIT_PLAT_FR;
                $label_date_create = LABEL_DATE_CREATE_FR;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                $label_created_by = LABEL_CREATED_BY_FR;
                $label_statut = STATUT_FR;
            }


            $output .= '
			<tr>
                <td>' . $label_nom . '</td>
                <td>' . $row["nom_plat"] . '</td>
			</tr>
			<tr>
                <td>' . $label_desc . '</td>
				<td>' . $row["desc_plat"] . '</td>
			</tr>
			<tr>
                <td>' . $label_prix_unit . '</td>
				<td>' . $row["prix_unit_plat"] . '</td>
			</tr>
			<tr>
                <td>' . $label_date_create . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_create_plat"])) . ' à ' . date("H:i", strtotime($row["date_create_plat"])) . '</td>
			</tr>
			<tr>
                <td>' . $label_date_last_modif . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_last_modif_plat"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_plat"])) . '</td>
			</tr>
			<tr>
                <td>' . $label_created_by . '</td>
                <td>' . $row['user_create_plat'] . '</td>
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
                addlog("Info-01-plat", $row["nom_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-plat", $row["nom_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-plat", $row["nom_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-plat", $row["nom_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-plat", $row["nom_plat"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }


    }

}


if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM plat WHERE id_plat = :id_plat";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_plat'	=>	$_POST["id_plat_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_plat = '';
        $desc_plat = '';
        $prix_unit_plat = '';
        $id_type_plat_fk_plat = '';


        foreach($result as $row)
        {
            $nom_plat = $row['nom_plat'];
            $desc_plat = $row['desc_plat'];
            $prix_unit_plat = $row['prix_unit_plat'];
            $id_type_plat_fk_plat = $row['id_type_plat_fk_plat'];;
        }

        $output = array(
            'nom_plat' => $nom_plat,
            'desc_plat' => $desc_plat,
            'prix_unit_plat' => $prix_unit_plat,
            'id_type_plat_fk_plat' => $id_type_plat_fk_plat
        );

        echo json_encode($output);

    }


    /* Modifier */
    if($_POST['btn_action_modif'] == 'Modifier')
    {

        // Vérifier si la plat existe déjà dans la base
        $query0 = "
    	SELECT * 
        FROM ( 
            SELECT * 
        	FROM plat 
        	WHERE id_plat <> :id_plat  
        ) AS JP 
        WHERE nom_plat = :nom_plat 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_plat'	    =>	$_POST["id_plat_modif"],
                ':nom_plat'	    =>	$_POST["nom_plat_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Ce plat existe déjà dans la liste.');
        }else
        {

            update6('plat',
                'id_plat',$_POST["id_plat_modif"],
                'nom_plat',$_POST["nom_plat_modif"],
                'desc_plat',$_POST["desc_plat_modif"],
                'prix_unit_plat',$_POST["prix_unit_plat_modif"],
                'date_last_modif_plat',date("Y-m-d H:i:s"),
                'user_last_modif_plat', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'id_type_plat_fk_plat',$_POST["id_type_plat_fk_plat_modif"]
                
            );
            echo json_encode('Le plat a été modifiée avec succès.');

            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-plat", $_POST['nom_plat_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-plat", $_POST['nom_plat_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-plat", $_POST['nom_plat_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
            }

        }

    }
}

?>