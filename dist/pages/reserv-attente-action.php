<?php

//chambre_action.php

include('../AddLogInclude.php');

include('../database_connection.php');

include('../scripts_php/fonctions_sql.php');

if(isset($_POST['btn_action']))
{
    /* Enregistrer */
    if($_POST['btn_action'] == 'Enregistrer')
    {

        // Vérifier si la chambre existe déjà dans la base
        $query0 = "
    	SELECT * FROM chambre 
		WHERE nom_chambre = :nom_chambre 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_chambre'	=>	$_POST["nom_chambre"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette chambre existe déjà dans la liste.');
        }else
        {

            insert6('chambre',
                'nom_chambre',$_POST["nom_chambre"],
                'desc_chambre',$_POST["desc_chambre"],
                'aire_chambre',$_POST["aire_chambre"],
                'date_create_chambre',date("Y-m-d H:i:s"),
                'date_last_modif_chambre',date("Y-m-d H:i:s"),
                'id_type_chambre_fk_chambre',$_POST["id_type_chambre_fk_chambre"]
            );
            echo json_encode('La chambre a été enregistrée avec succès.');


            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-reserv-attente", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-reserv-attente", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-reserv-attente", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-reserv-attente", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update1('chambre',
            'id_chambre',$_POST["id_chambre"],
            'statut_chambre',$status
        );
        echo 'Le statut de la salle de chambre est : ' . $status;

        // Log
        // On a besoin du nom de la chambre
        $query00 = "
		SELECT nom_chambre 
		FROM chambre 
		WHERE id_chambre = '".$_POST["id_chambre"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_chambre = "";

        foreach($result00 as $row00)
        {
            $nom_chambre = $row00["nom_chambre"];
        }

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Chg-01-reserv-attente", $nom_chambre. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Chg-02-reserv-attente", $nom_chambre. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }

    }
}


/* Consulter */

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM chambre WHERE id_chambre = :id_chambre";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_chambre' => $_POST["id_chambre_view"]
            )
        );
        $result = $statement->fetchAll();
        $output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';

        //$nom_chambre ='';

        foreach ($result as $row) {
            $status = '';
            if ($row['statut_chambre'] == 'Actif') {
                $status = '<span class="badge badge-primary">Actif</span>';
            } else {
                $status = '<span class="badge badge-danger">Inactif</span>';
            }

            // Pour le journal d'événements
            //$nom_chambre = $row["nom_chambre"];

            $output .= '
			<tr>
				<td>Nom de la chambre</td>
				<td>' . $row["nom_chambre"] . '</td>
			</tr>
			<tr>
				<td>Description</td>
				<td>' . $row["desc_chambre"] . '</td>
			</tr>
			<tr>
				<td>Aire</td>
				<td>' . $row["aire_chambre"] . '</td>
			</tr>
			<tr>
				<td>Date de création</td>
				<td>' . date("d-m-Y", strtotime($row["date_create_chambre"])) . ' à ' . date("H:i", strtotime($row["date_create_chambre"])) . '</td>
			</tr>
			<tr>
				<td>Dernièrement modifié le</td>
				<td>' . date("d-m-Y", strtotime($row["date_last_modif_chambre"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_chambre"])) . '</td>
			</tr>
			<tr>
				<td>Enregistrée par</td>
				<td>' . $row['user_create_chambre'] . '</td>
			</tr>
			<tr>
				<td>Statut</td>
				<td>' . $status . '</td>
			</tr>
			';
        }


        $output .= '
			</table>
		</div>
		';
        echo json_encode($output);

    }

}


if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM chambre WHERE id_chambre = :id_chambre";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_chambre'	=>	$_POST["id_chambre_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_chambre = '';
        $desc_chambre = '';
        $aire_chambre = '';
        $id_type_chambre_fk_chambre = '';


        foreach($result as $row)
        {
            $nom_chambre = $row['nom_chambre'];
            $desc_chambre = $row['desc_chambre'];
            $aire_chambre = $row['aire_chambre'];
            $id_type_chambre_fk_chambre = $row['id_type_chambre_fk_chambre'];;
        }

        $output = array(
            'nom_chambre' => $nom_chambre,
            'desc_chambre' => $desc_chambre,
            'aire_chambre' => $aire_chambre,
            'id_type_chambre_fk_chambre' => $id_type_chambre_fk_chambre
        );

        echo json_encode($output);

    }


    /* Modifier */
    if($_POST['btn_action_modif'] == 'Modifier')
    {

        // Vérifier si la chambre existe déjà dans la base
        $query0 = "
    	SELECT * 
        FROM ( 
            SELECT * 
        	FROM chambre 
        	WHERE id_chambre <> :id_chambre  
        ) AS JP 
        WHERE nom_chambre = :nom_chambre 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_chambre'	    =>	$_POST["id_chambre_modif"],
                ':nom_chambre'	    =>	$_POST["nom_chambre_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette chambre existe déjà dans la liste.');
        }else
        {

            update5('chambre',
                'id_chambre',$_POST["id_chambre_modif"],
                'nom_chambre',$_POST["nom_chambre_modif"],
                'desc_chambre',$_POST["desc_chambre_modif"],
                'aire_chambre',$_POST["aire_chambre_modif"],
                'date_last_modif_chambre',date("Y-m-d H:i:s"),
                'id_type_chambre_fk_chambre',$_POST["id_type_chambre_fk_chambre_modif"]
            );
            echo json_encode('La chambre a été modifiée avec succès.');

            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-reserv-attente", $_POST['nom_chambre_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-reserv-attente", $_POST['nom_chambre_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-reserv-attente", $_POST['nom_chambre_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
            }
        }
    }
}

?>