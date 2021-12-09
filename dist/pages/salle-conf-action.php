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
    	SELECT * FROM salle_conf 
		WHERE nom_salle_conf = :nom_salle_conf
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_salle_conf'	    =>	$_POST["nom_salle_conf"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette salle de conference existe déjà dans la liste.');
        }else
        {
            $query00 = "INSERT INTO salle_conf
            (nom_salle_conf, desc_salle_conf, capacite_salle_conf, date_create_salle_conf, date_last_modif_salle_conf,
            user_create_salle_conf, user_last_modif_salle_conf)
            VALUES (:nom_salle_conf, :desc_salle_conf, :capacite_salle_conf, :date_create_salle_conf, :date_last_modif_salle_conf,
            :user_create_salle_conf, :user_last_modif_salle_conf)
            ";
            $statement00 = $connect->prepare($query00);
            $statement00 -> execute(
                array(
                    ':nom_salle_conf'               =>  $_POST["nom_salle_conf"],
                    ':desc_salle_conf'              =>  $_POST["desc_salle_conf"],
                    ':capacite_salle_conf'          =>  $_POST["capacite_salle_conf"],
                    ':date_create_salle_conf'       =>  date("Y-m-d H:i:s"),
                    ':date_last_modif_salle_conf'   =>  date("Y-m-d H:i:s"),
                    ':user_create_salle_conf'       =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                    ':user_last_modif_salle_conf'   =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
                )
            );

            
            $id_salle_conf = $connect->lastInsertId();
            foreach ($_POST['id_carac_conf'] as $id_carac_conf) {
                insert2('assoc_salle_conf_and_carac_conf',
                    'id_salle_conf_fk_assoc_salle_conf_and_carac_conf', $id_salle_conf,
                    'id_carac_conf_fk_assoc_salle_conf_and_carac_conf', $id_carac_conf
                );
            }

            echo json_encode('La salle de conférence a été enregistrée avec succès.');

            

            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-salle-conf", $_POST["nom_salle_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-salle-conf", $_POST["nom_salle_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-salle-conf", $_POST["nom_salle_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-salle-conf", $_POST["nom_salle_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('salle_conf',
            'id_salle_conf',$_POST["id_salle_conf"],
            'statut_salle_conf',$status,
            'date_del_salle_conf', date("Y-m-d H:i:s"),
            'user_del_salle_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );
        
        echo json_encode($status);


        // Log
        $query00 = "
		SELECT nom_salle_conf 
		FROM salle_conf 
		WHERE id_salle_conf = '".$_POST["id_salle_conf"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_salle_conf = "";

        foreach($result00 as $row00)
        {
            $nom_salle_conf = $row00["nom_salle_conf"];
        }

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Chg-01-salle-conf", $nom_salle_conf.",".$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Chg-02-salle-conf", $nom_salle_conf.",".$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            
        }
    }
}


/* Consulter */
if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT *
        FROM salle_conf LEFT JOIN 
        (SELECT id_salle_conf_fk_assoc_salle_conf_and_carac_conf, nom_carac_conf FROM carac_conf
        INNER JOIN assoc_salle_conf_and_carac_conf AS assoc
        ON carac_conf.id_carac_conf = assoc.id_carac_conf_fk_assoc_salle_conf_and_carac_conf
        WHERE carac_conf.statut_carac_conf = 'Actif') AS temp
        ON salle_conf.id_salle_conf = temp.id_salle_conf_fk_assoc_salle_conf_and_carac_conf
        WHERE id_salle_conf = :id_salle_conf";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_salle_conf' => $_POST["id_salle_conf_view"]
            )
        );
        $result = $statement->fetchAll();


        // mettre le resultat de la requete dans le bon format
        $resultat = [];
        foreach($result as $row)
        {
            $provisoire = [];
            $provisoire['id_salle_conf'] = $row['id_salle_conf'];
            $provisoire['nom_salle_conf'] = $row['nom_salle_conf'];
            $provisoire['desc_salle_conf'] = $row['desc_salle_conf'];
            $provisoire['capacite_salle_conf'] = $row['capacite_salle_conf'];
            $provisoire['date_create_salle_conf'] = $row['date_create_salle_conf'];
            $provisoire['date_last_modif_salle_conf'] = $row['date_last_modif_salle_conf'];
            $provisoire['user_create_salle_conf'] = $row['user_create_salle_conf'];
            

            if( in_array($provisoire['id_salle_conf'], array_keys($resultat)) ) {
                array_push($resultat[$provisoire['id_salle_conf']]['carac_salle_conf'], $row['nom_carac_conf']);
            } else {
                $provisoire['carac_salle_conf'] = [];
                
                if ($row['nom_carac_conf'] === null) {
                    $provisoire['carac_salle_conf'][] = " - ";
                }
                else {
                    $provisoire['carac_salle_conf'][] = $row['nom_carac_conf'];
                }

                $resultat[$provisoire['id_salle_conf']] = $provisoire;
            }
        }


        $output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';


        foreach ($resultat as $row) {
            // caracteristiques

            $carac_salle_conf = '';
            foreach($row['carac_salle_conf'] as $index => $carac) {
                if ($index !== 0) {
                    $carac_salle_conf .= ' <b style="color:black;"> | </b> ';
                }
                $carac_salle_conf .= $carac;
            }

            
            if ($_SESSION['lang'] == 'EN') {
                $label_nom = NOM_SALLE_CONF_EN;
                $label_desc = DESC_SALLE_CONF_EN;
                $label_carac_salle_conf = CARAC_SALLE_CONF_EN;
                $label_capacite_salle_conf = CAPACITE_SALLE_CONF_EN;
                $label_date_create = LABEL_DATE_CREATE_EN;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                $label_created_by = LABEL_CREATED_BY_EN;
            } else {
                $label_nom = NOM_SALLE_CONF_FR;
                $label_desc = DESC_SALLE_CONF_FR;
                $label_carac_salle_conf = CARAC_SALLE_CONF_FR;
                $label_capacite_salle_conf = CAPACITE_SALLE_CONF_FR;
                $label_date_create = LABEL_DATE_CREATE_FR;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                $label_created_by = LABEL_CREATED_BY_FR;
            }


            $output .= '
			<tr>
				<td>' . $label_nom . '</td>
				<td>' . $row["nom_salle_conf"] . '</td>
			</tr>
			<tr>
				<td>' . $label_desc . '</td>
				<td>' . $row["desc_salle_conf"] . '</td>
			</tr>
			<tr>
				<td>' . $label_carac_salle_conf . '</td>
				<td>' . $carac_salle_conf . '</td>
			</tr>
			<tr>
				<td>' . $label_capacite_salle_conf . '</td>
				<td>' . $row["capacite_salle_conf"] . '</td>
			</tr>
			<tr>
				<td>' . $label_date_create . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_create_salle_conf"])) . ' à ' . date("H:i", strtotime($row["date_create_salle_conf"])) . '</td>
			</tr>
			<tr>
				<td>' . $label_date_last_modif . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_last_modif_salle_conf"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_salle_conf"])) . '</td>
			</tr>
			<tr>
				<td>' . $label_created_by . '</td>
                <td>' . $row['user_create_salle_conf'] . '</td>
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
                addlog("Info-01-salle-conf", $row["nom_salle_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-salle-conf", $row["nom_salle_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-salle-conf", $row["nom_salle_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-salle-conf", $row["nom_salle_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-salle-conf", $row["nom_salle_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
    }
}

if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM salle_conf WHERE id_salle_conf = :id_salle_conf";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_salle_conf'	=>	$_POST["id_salle_conf_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_salle_conf = '';
        $desc_salle_conf = '';
        $capacite_salle_conf = '';


        foreach($result as $row)
        {
            $nom_salle_conf = $row['nom_salle_conf'];
            $desc_salle_conf = $row['desc_salle_conf'];
            $capacite_salle_conf = $row['capacite_salle_conf'];
        }
        

        // fetch carac conf
        $query0 = "SELECT nom_carac_conf FROM carac_conf
        INNER JOIN assoc_salle_conf_and_carac_conf AS assoc
        ON carac_conf.id_carac_conf = assoc.id_carac_conf_fk_assoc_salle_conf_and_carac_conf
        WHERE assoc.id_salle_conf_fk_assoc_salle_conf_and_carac_conf = :id_salle_conf
        ";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_salle_conf'	=>	$_POST["id_salle_conf_modif"]
            )
        );
        $result0 = $statement0->fetchAll();

        $carac_salle_conf = [];
        foreach($result0 as $row) {
            $carac_salle_conf[] = $row['nom_carac_conf'];
        }

        $output = array(
            'nom_salle_conf' => $nom_salle_conf,
            'desc_salle_conf' => $desc_salle_conf,
            'capacite_salle_conf' => $capacite_salle_conf,
            'carac_salle_conf'  => $carac_salle_conf
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
        	FROM salle_conf 
        	WHERE id_salle_conf <> :id_salle_conf
        ) AS JP 
        WHERE nom_salle_conf = :nom_salle_conf
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_salle_conf'	    =>	$_POST["id_salle_conf_modif"],
                ':nom_salle_conf'	    =>	$_POST["nom_salle_conf_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette salle de conference existe déjà dans la liste.');
        }else
        {

            update5('salle_conf',
                'id_salle_conf',$_POST["id_salle_conf_modif"],
                'nom_salle_conf',$_POST["nom_salle_conf_modif"],
                'desc_salle_conf',$_POST["desc_salle_conf_modif"],
                'capacite_salle_conf',$_POST["capacite_salle_conf_modif"],
                'date_last_modif_salle_conf',date("Y-m-d H:i:s"),
                'user_last_modif_salle_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );

            // delete assoc entre salle_conf et carac_conf
            $query00 = "DELETE FROM assoc_salle_conf_and_carac_conf
            WHERE id_salle_conf_fk_assoc_salle_conf_and_carac_conf = :id_salle_conf";

            $statement00 = $connect->prepare($query00);
            $statement00->execute(
                array(
                    ':id_salle_conf'	    =>	$_POST["id_salle_conf_modif"],
                )
            );
    
            // insert assoc entre salle_conf et carac_conf
            foreach ($_POST['id_carac_conf_modif'] as $id_carac_conf) {
                insert2('assoc_salle_conf_and_carac_conf',
                    'id_salle_conf_fk_assoc_salle_conf_and_carac_conf', $_POST["id_salle_conf_modif"],
                    'id_carac_conf_fk_assoc_salle_conf_and_carac_conf', $id_carac_conf
                );
            }

            echo json_encode('La salle de conférence a été modifiée avec succès.');


            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-salle-conf", $_POST['nom_salle_conf_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-salle-conf", $_POST['nom_salle_conf_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-salle-conf", $_POST['nom_salle_conf_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                
            }

        }

    }
}


function get_carac_salle_list($connect) {
    $query = "SELECT id_carac_conf, nom_carac_conf FROM carac_conf
    WHERE statut_carac_conf = 'Actif'
    ORDER BY nom_carac_conf ASC
	";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = [];
    foreach($result as $row)
    {
        $output[] = [$row["id_carac_conf"], $row["nom_carac_conf"]];
    }
    return $output;
}


if (isset($_POST['action']) && $_POST['action'] == 'get_carac_salle_list') {
    echo json_encode(get_carac_salle_list($connect));
}


?>
