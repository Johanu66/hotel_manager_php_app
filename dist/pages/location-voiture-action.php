<?php
//location_voiture_action.php

include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_sql.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');


if(isset($_POST['btn_action']))
{
 /* Delete */
 if($_POST['btn_action'] == 'delete')
 {

     $status = 'Actif';
     if($_POST['status'] == 'Actif')
     {
         $status = 'Inactif';
     }

     update3('location_voiture',
         'id_location_voiture',$_POST["id_location_voiture"],
         'statut_location_voiture',$status,
         'date_del_location_voiture', date("Y-m-d H:i:s"),
         'user_del_location_voiture', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
     );

     echo json_encode($status);

     // Log
    

    //  switch ($_SESSION['type_compte']) {

    //      case 1:
    //          addlog("Chg-01-voiture", $modele_voiture. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
    //          break;
    //      case 2:
    //          addlog("Chg-02-voiture", $modele_voiture. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
    //          break;
    //  }



 }
}


/* Consulter */

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "
        SELECT *
        FROM location_voiture,voiture,personne,voiturier,client
        WHERE personne.id_personne= voiturier.id_personne_fk_voiturier
        AND location_voiture.id_voiture_fk_location_voiture=voiture.id_voiture
        AND location_voiture.id_client_fk_location_voiture=client.id_client
        AND id_location_voiture = :id_location_voiture
        ";
       

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_location_voiture' => $_POST["id_location_voiture_view"]
            )
        );
        $result = $statement->fetchAll();
        $output = '
    <div class="table-responsive">
      <table class="table table-boredered">
    ';

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
            $facture_oui = FACTURE_OUI_EN;
        } else {
            $facture_oui = FACTURE_OUI_FR;
        }
        if ($_SESSION['lang'] == 'EN') {
            $facture_non = FACTURE_NON_EN;
        } else {
            $facture_non = FACTURE_NON_FR;
        }
        
        foreach ($result as $row) {
             $status = '';
             if ($row['statut_location_voiture'] == 'Actif') {
                $status =  $statut_actif ;
            } else {
                $status =  $statut_inactif ;
            }
            $factures ='';
            if($row['facture_location_voiture'] == 'Non')
            {
                $factures = '<center><span class="badge badge-primary">'.$facture_non .'</span></center>';
            }
            else
            {
                $factures = '<center><span class="badge badge-danger">'. $facture_oui .'</span></center>';
            }

            // Pour le journal d'événements
            //$nom_marque_voiture = $row["nom_marque_voiture"];

            if ($_SESSION['lang'] == 'EN') {
                    $label_nom = VOITURE_LOCATION_VOITURE_EN;
                    $label_plaque = PLAQUE_LOCATION_VOITURE_EN;
                    $label_debut = DATE_DEBUT_LOCATION_VOITURE_EN;
                    $label_fin = DATE_FIN_LOCATION_VOITURE_EN;
                    $label_voiturier = VOITURIER_LOCATION_VOITURE_EN;
                    $label_nom_client = CLIENT_LOCATION_VOITURE_EN;
                    $label_prix = PRIX_LOCATION_VOITURE_EN;
                    $label_facture = FACTURE_LOCATION_VOITURE_EN;
                    $label_date_create = LABEL_DATE_CREATE_EN;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                    $label_created_by = LABEL_CREATED_BY_EN;
                    $label_statut = STATUT_EN;
                } else {
                    $label_nom = VOITURE_LOCATION_VOITURE_FR;
                    $label_plaque = PLAQUE_LOCATION_VOITURE_FR;
                    $label_debut = DATE_DEBUT_LOCATION_VOITURE_FR;
                    $label_fin = DATE_FIN_LOCATION_VOITURE_FR;
                    $label_voiturier = VOITURIER_LOCATION_VOITURE_FR;
                    $label_nom_client = CLIENT_LOCATION_VOITURE_FR;
                    $label_prix = PRIX_LOCATION_VOITURE_FR;
                    $label_facture = FACTURE_LOCATION_VOITURE_FR;
                    $label_date_create = LABEL_DATE_CREATE_FR;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                    $label_created_by = LABEL_CREATED_BY_FR;
                    $label_statut = STATUT_FR;
                }


            $output .= '
      <tr>
        <td>' . $label_nom . '</td>
        <td>' . $row["modele_voiture"] . '</td>
      </tr>
      <tr>
        <td>' . $label_plaque . '</td>
        <td>' . $row["immatriculation_voiture"] . '</td>
      </tr>
      <tr>
        <td>' . $label_debut . '</td>
        <td>' . $row["debut_location_voiture"] . '</td>
      </tr>
      <tr>
        <td>' . $label_fin . '</td>
        <td>' . $row["fin_location_voiture"] . '</td>
      </tr>
      <tr>
        <td>' .$label_voiturier . '</td>
        <td>' . $row["nom_personne"] . '</td>
      </tr>
      <tr>
        <td>' . $label_nom_client . '</td>
        <td>' . $row["nom_client"] . '</td>
      </tr>
      <tr>
        <td>' .  $label_prix . '</td>
        <td>' . $row["prix_location_voiture"] . '</td>
      </tr>
      <tr>
        <td>' . $label_date_create . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_create_location_voiture"])) . ' à ' . date("H:i", strtotime($row["date_create_location_voiture"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_date_last_modif . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_last_modif_location_voiture"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_location_voiture"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_created_by . '</td>
        <td>' . $row['user_create_location_voiture'] . '</td>
      </tr>
      <tr>
        <td>' . $label_facture . '</td>
        <td>' . $factures . '</td>
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

        //  switch ($_SESSION['type_compte']) {

        //     case 1:
        //         addlog("Info-01-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 2:
        //         addlog("Info-02-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 3:
        //         addlog("Info-03-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 4:
        //         addlog("Info-04-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        //     case 5:
        //         addlog("Info-05-marque-voiture", $row["nom_marque_voiture"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        //         break;
        // } 
        

    }

}


?>