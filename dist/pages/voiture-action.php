<?php

//voiture_action.php

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

        // Vérifier si la voiture existe déjà dans la base
        $query0 = "
    	SELECT * FROM voiture 
		WHERE modele_voiture = :modele_voiture 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':modele_voiture'	=>	$_POST["modele_voiture"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette voiture existe déjà dans la liste.');
        }else
        {

            insert11('voiture',
                'modele_voiture',$_POST["modele_voiture"],
                'immatriculation_voiture',$_POST["immatriculation_voiture"],
                'prix_achat_voiture',$_POST["prix_achat_voiture"],
                'desc_voiture',$_POST["desc_voiture"],
                'etat_voiture',$_POST["etat"],
                'date_achat_voiture',$_POST["date_achat_voiture"],
                'date_create_voiture',date("Y-m-d H:i:s"),
                'date_last_modif_voiture',date("Y-m-d H:i:s"),
                'user_create_voiture', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_voiture', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'id_marque_voiture_fk_voiture',$_POST["id_marque_voiture_fk_voiture"]
            );
             
            echo json_encode('La voiture a été enregistrée avec succès.');


             // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-voiture", $_POST["modele_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-voiture", $_POST["modele_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-voiture", $_POST["modele_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-voiture", $_POST["modele_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('voiture',
            'id_voiture',$_POST["id_voiture"],
            'statut_voiture',$status,
            'date_del_voiture', date("Y-m-d H:i:s"),
            'user_del_voiture', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );

        echo json_encode($status);

        // Log
        // On a besoin du modele de la voiture
        $query00 = "
		SELECT modele_voiture 
		FROM voiture 
		WHERE id_voiture = '".$_POST["id_voiture"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_voiture = "";

        foreach($result00 as $row00)
        {
            $modele_voiture = $row00["modele_voiture"];
        }

        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Chg-01-voiture", $modele_voiture. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Chg-02-voiture", $modele_voiture. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }



    }
}




/* Consulter */

 if(isset($_POST['btn_action_view'])) {

     if ($_POST['btn_action_view'] == 'consulter') {
         $query = "SELECT * FROM voiture WHERE id_voiture = :id_voiture";
         $statement = $connect->prepare($query);
         $statement->execute(
             array(
                 ':id_voiture' => $_POST["id_voiture_view"]
             )
         );
         $result = $statement->fetchAll();
         $output = '
		<div class="table-responsive">
			<table class="table table-boredered">
 		';

         //$modele_voiture ='';
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
         if ($_SESSION['lang'] == 'EN') {
             $etat_neuve = ETAT_NEUVE_EN;
         } else {
             $etat_neuve = ETAT_NEUVE_FR;
         }
         if ($_SESSION['lang'] == 'EN') {
             $etat_occasion = ETAT_OCCASION_EN;
         } else {
             $etat_occasion = ETAT_OCCASION_FR;
         }
            
         foreach ($result as $row) {
            $status = '';
            if ($row['statut_voiture'] == 'Actif') {
                $status = '<span class="badge badge-primary">'. $statut_actif .'</span>';
            } else {
                $status = '<span class="badge badge-danger">'. $statut_inactif .'</span>';
            }
             $etats = '';
            if ($row['etat_voiture'] == 'Neuve') {
                $etats =  $etat_neuve ;
            } else {
                $etats =  $etat_occasion ;
            }

        //     // Pour le journal d'événements
        //     //$modele_voiture = $row["modele_voiture"];

             if ($_SESSION['lang'] == 'EN') {
                $label_modele = MODELE_VOITURE_EN;
                $label_desc = DESC_VOITURE_EN;
                $label_immatriculation = IMMATRI_VOITURE_EN;
                $label_date_create = LABEL_DATE_CREATE_EN;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                $label_created_by = LABEL_CREATED_BY_EN;
                $label_etat = ETAT_VOITURE_EN;
                $label_prix_achat = PRIX_ACHAT_VOITURE_EN;
                $label_date_achat = DATE_ACHAT_VOITURE_EN;
                $label_statut = STATUT_EN;

            } else {
                $label_modele = MODELE_VOITURE_FR;
                $label_desc = DESC_VOITURE_FR;
                $label_immatriculation = IMMATRI_VOITURE_FR;
                $label_date_create = LABEL_DATE_CREATE_FR;
                $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                $label_created_by = LABEL_CREATED_BY_FR;
                $label_etat = ETAT_VOITURE_FR;
                $label_prix_achat = PRIX_ACHAT_VOITURE_FR;
                $label_date_achat = DATE_ACHAT_VOITURE_FR;
                $label_statut = STATUT_FR;
            } 

            $output .= '
			<tr>
                <td>' . $label_modele . '</td>
                <td>' . $row["modele_voiture"] . '</td>
			</tr>
			<tr>
                <td>' . $label_immatriculation . '</td>
				<td>' . $row["immatriculation_voiture"] . '</td>
			</tr>
            <tr>
                <td>' . $label_prix_achat . '</td>
				<td>' . $row["prix_achat_voiture"] . '</td>
			</tr>
            <tr>
                <td>' . $label_date_achat . '</td>
				<td>' . $row["date_achat_voiture"] . '</td>
			</tr>
			<tr>
                <td>' . $label_desc . '</td>
				<td>' . $row["desc_voiture"] . '</td>
			</tr>
			<tr>
                <td>' . $label_date_create . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_create_voiture"])) . ' à ' . date("H:i", strtotime($row["date_create_voiture"])) . '</td>
			</tr>
			<tr>
                <td>' . $label_date_last_modif . '</td>
				<td>' . date("d-m-Y", strtotime($row["date_last_modif_voiture"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_voiture"])) . '</td>
			</tr>
			<tr>
                <td>' . $label_created_by . '</td>
                <td>' . $row['user_create_voiture'] . '</td>
                </tr>
			<tr>
                <td>' . $label_etat . '</td>
				<td>' . $etats . '</td>
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
                addlog("Info-01-voiture", $row["modele_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-voiture", $row["modele_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-voiture", $row["modele_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-voiture", $row["modele_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-voiture", $row["modele_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
     }
}

        
 




if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM voiture WHERE id_voiture = :id_voiture";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_voiture'	=>	$_POST["id_voiture_modif"]
            )
        );
        $result = $statement->fetchAll();

        $modele_voiture = '';
        $immatriculation_voiture = '';
        $desc_voiture = '';
        $prix_achat_voiture ='';
        $date_achat_voiture ='';
        $etat_voiture ='';
        $id_marque_voiture_fk_voiture = '';


        foreach($result as $row)
        {
            $modele_voiture = $row['modele_voiture'];
            $immatriculation_voiture = $row['immatriculation_voiture'];
            $prix_achat_voiture = $row['prix_achat_voiture'];
            $date_achat_voiture = $row['date_achat_voiture'];
            $etat_voiture = $row['etat_voiture'];
            $desc_voiture = $row['desc_voiture'];
            $id_marque_voiture_fk_voiture = $row['id_marque_voiture_fk_voiture'];
        }

        $output = array(
            'modele_voiture' => $modele_voiture,
            'immatriculation_voiture' => $immatriculation_voiture,
            'prix_achat_voiture' => $prix_achat_voiture,
            'date_achat_voiture' =>$date_achat_voiture,
            'etat_voiture'  =>$etat_voiture,
            'desc_voiture' => $desc_voiture,
            'id_marque_voiture_fk_voiture' => $id_marque_voiture_fk_voiture
        );

        echo json_encode($output);

    }

    // /* Modifier */
    if($_POST['btn_action_modif'] == 'Modifier')
    {

        // Vérifier si la voiture existe déjà dans la base
        $query0 = "
    	SELECT * 
        FROM ( 
            SELECT * 
        	FROM voiture 
        	WHERE id_voiture <> :id_voiture  
        ) AS JP 
        WHERE modele_voiture = :modele_voiture 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_voiture'	    =>	$_POST["id_voiture_modif"],
                ':modele_voiture'	    =>	$_POST["modele_voiture_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Cette voiture existe déjà dans la liste.');
        }else
        {

            update9('voiture',
                'id_voiture',$_POST["id_voiture_modif"],
                'modele_voiture',$_POST["modele_voiture_modif"],
                'immatriculation_voiture',$_POST["immatriculation_voiture_modif"],
                'prix_achat_voiture',$_POST["prix_achat_voiture_modif"],
                'desc_voiture',$_POST["desc_voiture_modif"],
                'date_achat_voiture',$_POST["date_achat_voiture_modif"],
                'etat_voiture',$_POST["etat"],
                'date_last_modif_voiture',date("Y-m-d H:i:s"),
                'user_last_modif_voiture', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'id_marque_voiture_fk_voiture',$_POST["id_marque_voiture_fk_voiture_modif"]
                
            );
            echo json_encode('La voiture a été modifiée avec succès.');

              // Log
              switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-voiture", $_POST['modele_voiture_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-voiture", $_POST['modele_voiture_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-voiture", $_POST['modele_voiture_modif'], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
            }
        }
    }

    }
       


?>