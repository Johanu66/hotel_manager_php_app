<?php

//boisson_action.php

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

        // Vérifier si la boisson existe déjà dans la base
        $query0 = "
    	SELECT * FROM boisson 
		WHERE lib_boisson = :lib_boisson 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':lib_boisson'	=>	$_POST["lib_boisson"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette boisson existe déjà dans la liste.');
        }else
        {

            insert7('boisson',
                'lib_boisson',$_POST["lib_boisson"],
                'desc_boisson',$_POST["desc_boisson"],
                'prix_unite_boisson',$_POST["prix_unite_boisson"],
                'date_create_boisson',date("Y-m-d H:i:s"),
                'date_last_modif_boisson',date("Y-m-d H:i:s"),
                'user_create_boisson', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_boisson', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );
            echo json_encode('La boisson a été enregistrée avec succès.');


            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-boisson", $_POST["lib_boisson"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-boisson", $_POST["lib_boisson"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-boisson", $_POST["lib_boisson"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-boisson", $_POST["lib_boisson"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('boisson',
            'id_boisson',$_POST["id_boisson"],
            'statut_boisson',$status,
            'date_del_boisson', date("Y-m-d H:i:s"),
            'user_del_boisson', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );

        echo json_encode($status);

        // Log
        // On a besoin du nom de la boisson
        $query00 = "
		SELECT lib_boisson 
		FROM boisson 
		WHERE id_boisson = '".$_POST["id_boisson"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $lib_boisson = "";

        foreach($result00 as $row00)
        {
            $lib_boisson = $row00["lib_boisson"];
        }

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Chg-01-boisson", $lib_boisson. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Chg-02-boisson", $lib_boisson. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }



    }
}


/* Consulter */

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM boisson WHERE id_boisson = :id_boisson";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_boisson' => $_POST["id_boisson_view"]
            )
        );
        $result = $statement->fetchAll();

        $output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';

        //$lib_boisson ='';
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
            // echo json_encode($row);
            $status = '';
            if ($row['statut_boisson'] == 'Actif') {
                $status = '<span class="badge badge-primary">'. $statut_actif .'</span>';
            } else {
                $status = '<span class="badge badge-danger">'. $statut_inactif .'</span>';
            }

            
            if ($_SESSION['lang'] == 'EN') {
                $label_lib = LIB_BOISSON_EN;
                $label_desc = DESC_BOISSON_EN;
                $label_prix_unite = PRIX_UNITE_BOISSON_EN;
                $label_date_create = LABEL_DATE_CREATE_EN;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                $label_created_by = LABEL_CREATED_BY_EN;
                $label_statut = STATUT_EN;
            } else {
                $label_lib = LIB_BOISSON_FR;
                $label_desc = DESC_BOISSON_FR;
                $label_prix_unite = PRIX_UNITE_BOISSON_FR;
                $label_date_create = LABEL_DATE_CREATE_FR;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                $label_created_by = LABEL_CREATED_BY_FR;
                $label_statut = STATUT_FR;
            }


            $output .= '
			<tr>
                <td>' . $label_lib . '</td>
                <td>' . $row["lib_boisson"] . '</td>
			</tr>
			<tr>
                <td>' . $label_desc . '</td>
				<td>' . $row["desc_boisson"] . '</td>
			</tr>
			<tr>
                <td>' . $label_prix_unite . '</td>
				<td>' . $row["prix_unite_boisson"] . '</td>
			</tr>
			<tr>
                <td>' . $label_date_create . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_create_boisson"])) . ' à ' . date("H:i", strtotime($row["date_create_boisson"])) . '</td>
			</tr>
			<tr>
                <td>' . $label_date_last_modif . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_last_modif_boisson"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_boisson"])) . '</td>
			</tr>
			<tr>
                <td>' . $label_created_by . '</td>
                <td>' . $row['user_create_boisson'] . '</td>
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
                addlog("Info-01-boisson", $row["lib_boisson"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-boisson", $row["lib_boisson"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-boisson", $row["lib_boisson"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-boisson", $row["lib_boisson"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-boisson", $row["lib_boisson"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }


    }

}


if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM boisson WHERE id_boisson = :id_boisson";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_boisson'	=>	$_POST["id_boisson_modif"]
            )
        );
        $result = $statement->fetchAll();

        $lib_boisson = '';
        $desc_boisson = '';
        $prix_unite_boisson = '';

        foreach($result as $row)
        {
            $lib_boisson = $row['lib_boisson'];
            $desc_boisson = $row['desc_boisson'];
            $prix_unite_boisson = $row['prix_unite_boisson'];
            ;
        }

        $output = array(
            'lib_boisson' => $lib_boisson,
            'desc_boisson' => $desc_boisson,
            'prix_unite_boisson' => $prix_unite_boisson,
        );

        echo json_encode($output);

    }


    /* Modifier */
    if($_POST['btn_action_modif'] == 'Modifier')
    {
        // Vérifier si la boisson existe déjà dans la base
        $query0 = "
    	SELECT * 
        FROM ( 
            SELECT * 
        	FROM boisson 
        	WHERE id_boisson <> :id_boisson  
        ) AS JP 
        WHERE lib_boisson = :lib_boisson 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_boisson'	    =>	$_POST["id_boisson_modif"],
                ':lib_boisson'	    =>	$_POST["lib_boisson"]
            )
        );
        $count = $statement0->rowCount();


        if($count > 0)
        {
            echo json_encode('Cette boisson existe déjà dans la liste.');
        }else
        {
            update5('boisson',
                'id_boisson',$_POST["id_boisson_modif"],
                'lib_boisson',$_POST["lib_boisson"],
                'desc_boisson',$_POST["desc_boisson"],
                'prix_unite_boisson',$_POST["prix_unite_boisson"],
                'date_last_modif_boisson',date("Y-m-d H:i:s"),
                'user_last_modif_boisson', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );

            echo json_encode('La boisson a été modifiée avec succès.');
            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-boisson", $_POST['lib_boisson'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-boisson", $_POST['lib_boisson'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-boisson", $_POST['lib_boisson'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
            }

        }
   }
}

?>