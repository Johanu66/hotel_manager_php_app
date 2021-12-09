<?php
//facture_conf_action.php

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
            
        $status = 'Annulé';

        update3('facture_conf',
            'id_facture_conf',$_POST["id_facture_conf"],
            'statut_facture_conf',$status,
            'date_del_facture_conf', date("Y-m-d H:i:s"),
            'user_del_facture_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );


        $query = "SELECT id_location_conf_fk_facture_conf FROM facture_conf
        WHERE id_facture_conf = :id_facture_conf";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_facture_conf'	    =>	$_POST["id_facture_conf"]
            )
        );
        $result = $statement->fetchAll();
        $id_location_conf = '';
        foreach($result as $row) {
            $id_location_conf = $row['id_location_conf_fk_facture_conf'];
        }

        update1('location_conf',
        'id_location_conf', $id_location_conf,
        'facture_location_conf',$status
         );


        echo json_encode($status);
                

         switch ($_SESSION['type_compte']) {
             case 1:
                 addlog("Chg-01-facture-conf", $_POST["id_facture_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;
             case 2:
                 addlog("Chg-02-facture-conf", $_POST["id_facture_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;                 
         }
    }
}


/* Consulter */

// if(isset($_POST['btn_action_view'])) {

//     if ($_POST['btn_action_view'] == 'consulter') {

//         $query = "SELECT * FROM facture_conf WHERE id_facture_conf = :id_facture_conf";
//         // $query = "SELECT * FROM facture_conf WHERE id_facture_conf = :id_facture_conf";

//         $statement = $connect->prepare($query);
//         $statement->execute(
//             array(
//                 ':id_facture_conf' => $_POST["id_facture_conf_view"]
//             )
//         );
//         $result = $statement->fetchAll();
//         $output = '
//     <div class="table-responsive">
//       <table class="table table-boredered">
//     ';

//         //$nom_facture_conf ='';
//         if ($_SESSION['lang'] == 'EN') {
//             $statut_actif = STATUT_ACTIF_EN;
//         } else {
//             $statut_actif = STATUT_ACTIF_FR;
//         }
//         if ($_SESSION['lang'] == 'EN') {
//             $statut_inactif = STATUT_INACTIF_EN;
//         } else {
//             $statut_inactif = STATUT_INACTIF_FR;
//         }

//         foreach ($result as $row) {
//             $status = '';
//             if ($row['statut_facture_conf'] == 'Actif') {
//                 $status = '<span class="badge badge-primary">'. $statut_actif .'</span>';
//             } else {
//                 $status = '<span class="badge badge-danger">'. $statut_inactif .'</span>';
//             }

//             // Pour le journal d'événements
//             //$nom_facture_conf = $row["nom_facture_conf"];

//             if ($_SESSION['lang'] == 'EN') {
//                     $label_nom = NOM_FACTURE_CONF_EN;
//                     $label_desc = DESC_FACTURE_CONF_EN;
//                     $label_date_create = LABEL_DATE_CREATE_EN;
//                     $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
//                     $label_created_by = LABEL_CREATED_BY_EN;
//                     $label_statut = STATUT_EN;
//                 } else {
//                     $label_nom = NOM_FACTURE_CONF_FR;
//                     $label_desc = DESC_FACTURE_CONF_FR;
//                     $label_date_create = LABEL_DATE_CREATE_FR;
//                     $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
//                     $label_created_by = LABEL_CREATED_BY_FR;
//                     $label_statut = STATUT_FR;
//                 }


//             $output .= '
//       <tr>
//         <td>' . $label_nom . '</td>
//         <td>' . $row["nom_facture_conf"] . '</td>
//       </tr>
//       <tr>
//         <td>' . $label_desc . '</td>
//         <td>' . $row["desc_facture_conf"] . '</td>
//       </tr>
//       <tr>
//         <td>' . $label_date_create . '</td>
//         <td>' . date("d-m-Y", strtotime($row["date_create_facture_conf"])) . ' à ' . date("H:i", strtotime($row["date_create_facture_conf"])) . '</td>
//       </tr>
//       <tr>
//         <td>' . $label_date_last_modif . '</td>
//         <td>' . date("d-m-Y", strtotime($row["date_last_modif_facture_conf"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_facture_conf"])) . '</td>
//       </tr>
//       <tr>
//         <td>' . $label_created_by . '</td>
//         <td>' . $row['user_create_facture_conf'] . '</td>
//       </tr>
//       <tr>
//         <td>' . $label_statut . '</td>
//         <td>' . $status . '</td>
//       </tr>
//       ';
//         }


//         $output .= '
//       </table>
//     </div>
//     ';
//         echo json_encode($output);

//         switch ($_SESSION['type_compte']) {

//             case 1:
//                 addlog("Info-01-facture-conf", $row["nom_facture_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//                 break;
//             case 2:
//                 addlog("Info-02-facture-conf", $row["nom_facture_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//                 break;
//             case 3:
//                 addlog("Info-03-facture-conf", $row["nom_facture_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//                 break;
//             case 4:
//                 addlog("Info-04-facture-conf", $row["nom_facture_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//                 break;
//             case 5:
//                 addlog("Info-05-facture-conf", $row["nom_facture_conf"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//                 break;
//         }
        

//     }

// }



// if(isset($_POST['btn_action_modif']))
// {

//     /* fetch single */
//     if($_POST['btn_action_modif'] == 'fetch_single')
//     {

//         $query = "SELECT * FROM facture_conf WHERE id_facture_conf = :id_facture_conf";
//         $statement = $connect->prepare($query);
//         $statement->execute(
//             array(
//                 ':id_facture_conf'	=>	$_POST["id_facture_conf_modif"]
//             )
//         );
//         $result = $statement->fetchAll();

//         $nom_facture_conf = '';
//         $desc_facture_conf = '';


//         foreach($result as $row)
//         {
//             $nom_facture_conf = $row['nom_facture_conf'];
//             $desc_facture_conf = $row['desc_facture_conf'];
//         }

//         $output = array(
//             'nom_facture_conf' => $nom_facture_conf,
//             'desc_facture_conf' => $desc_facture_conf
//         );

//         echo json_encode($output);

//     }

//     /* Modifier */
//     if($_POST['btn_action_modif'] == 'Modifier')
//     {
        

//         // Vérifier si le type de chambre existe déjà dans la base
//         $query0 = "
//     	SELECT * 
//         FROM ( 
//             SELECT * 
//         	FROM facture_conf 
//         	WHERE id_facture_conf <> :id_facture_conf  
//         ) AS JP 
//         WHERE nom_facture_conf = :nom_facture_conf 
//     	";
//         $statement0 = $connect->prepare($query0);
//         $statement0->execute(
//             array(
//                 ':id_facture_conf'	    =>	$_POST["id_facture_conf_modif"],
//                 ':nom_facture_conf'	    =>	$_POST["nom_facture_conf_modif"]
//             )
//         );
//         $count = $statement0->rowCount();
//         if($count > 0)
//         {
//             //echo 'Ce type de chambre existe déjà dans la liste.';
//             echo json_encode('Ce type de chambre existe déjà dans la liste.');
//         }else
//         {

//             update4('facture_conf',
//                 'id_facture_conf',$_POST["id_facture_conf_modif"],
//                 'nom_facture_conf',$_POST["nom_facture_conf_modif"],
//                 'desc_facture_conf',$_POST["desc_facture_conf_modif"],
//                 'date_last_modif_facture_conf',date("Y-m-d H:i:s"),
//                 'user_last_modif_facture_conf', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
//             );
//             //echo 'Le type de chambre a été modifié avec succès.';
//             echo json_encode('Le type de chambre a été modifié avec succès.');


//             // Log
//             switch ($_SESSION['type_compte']) {

//                 case 1:
//                     addlog("Modif-01-facture-conf", $_POST["nom_facture_conf_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//                     break;
//                 case 2:
//                     addlog("Modif-02-facture-conf", $_POST["nom_facture_conf_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//                     break;
//                 case 3:
//                     addlog("Modif-03-facture-conf", $_POST["nom_facture_conf_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//                     break;               
//             }


//         }

//     }
    
// }

?>