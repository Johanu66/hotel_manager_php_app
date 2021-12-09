<?php


include('../AddLogInclude.php');
include('../database_connection.php');
include('../scripts_php/fonctions_sql.php');

function get_nom_chambre($id_chambre) {
    $query = 'SELECT nom_chambre FROM chambre WHERE id_chambre = :id_chambre';
    global $connect;
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id_chambre'   =>  $id_chambre,
        )
    );
    $result = $statement->fetchAll();
    foreach($result as $row) {
        $nom_chambre = $row['nom_chambre'];
    }
    return $nom_chambre;
}

function insert() {
    // if (isset($_POST('nouveau_client')) && ($_POST['nouveau_client'] == "on")){

        // $query = "
        // INSERT INTO personne
        // (nom_personne, prenom_personne, tel_personne, email_personne, id_card_personne, passeport_personne,
        // date_create_personne, user_create_personne, date_last_modif_personne, user_last_modif_personne)
        // VALUES (:nom_client, :prenom_client, :tel_client, :email_client, :id_card_client, :passeport_client,
        // :date_create_personne, :user_create_personne, :date_last_modif_personne, :user_last_modif_personne) 
        // ";

        // global $connect;
        // $statement = $connect->prepare($query);
        // $statement->execute(
        //     array(
        //         ':nom_client'        =>  $_POST['nom_client'],
        //         ':prenom_client'     =>  $_POST['prenom_client'],
        //         ':tel_client'        =>  $_POST['tel_client'],
        //         ':email_client'      =>  $_POST['email_client'],
        //         ':id_card_client'        =>  $_POST['id_card_client'],
        //         ':passeport_client'      =>  $_POST['passeport_client'],
        //         ':date_create_personne'  =>  date("Y-m-d H:i:s"),
        //         ':date_last_modif_personne'  =>  date("Y-m-d H:i:s"),
        //         ':user_create_personne'  =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
        //         ':user_last_modif_personne'  =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],      
        //     )
        // );


        // $id_personne = $connect -> lastInsertId();

        // $query = "
        // INSERT INTO client
        // (nom_client, prenom_client, id_personne_fk_client)
        // VALUES (:nom_client, :prenom_client, :id_personne_fk_client)
        // ";

        // $statement = $connect->prepare($query);
        // $statement->execute(
        //     array(
        //         ':nom_client'        =>  $_POST['nom_client'],
        //         ':prenom_client'     =>  $_POST['prenom_client'],
        //         ':id_personne_fk_client'  =>  $id_personne,
        //     )
        // );

        // $id_client = $connect -> lastInsertId();

        // insert7('user',
        // 'nom_user', $_POST['nom_client'],
        // 'prenom_user', $_POST['prenom_client'],
        // 'tel_user', $_POST['tel_client'],
        // 'email_user', $_POST['email_client'],
        // 'idcard_user',$_POST['id_card_client'],
        // 'passeport_user', $_POST['passeport_client'],
        // 'id_type_user_fk_user', '2'
        // );
    
        // insert3('client',
        // 'nom_client', $_POST['nom_client'],
        // 'prenom_client', $_POST['prenom_client'],
        // 'id_user_fk_client', '2'
        // );
    
    // } else {
        // $id_client = $_POST['nom_prenom_client'];
    // }

    // $query = "
    // INSERT INTO reservation
    // (date_debut_reservation, date_fin_reservation, provenance_reservation, destination_reservation,
    // nbre_adulte_reservation, nbre_enfant_reservation, date_create_reservation, date_last_modif_reservation,
    // user_create_reservation, user_last_modif_reservation, statut_reservation, id_client_fk_reservation)
    // VALUES (:date_debut_reservation, :date_fin_reservation, :provenance_reservation, :destination_reservation,
    // :nbre_adulte_reservation, :nbre_enfant_reservation, :date_create_reservation, :date_last_modif_reservation,
    // :user_create_reservation, :user_last_modif_reservation, :statut_reservation, :id_client_fk_reservation)
    // ";

    // $statement->execute(
    //     array(
    //         ':date_debut_reservation'       =>  $_POST['date_debut'],
    //         ':date_fin_reservation'     =>  $_POST['date_fin'],
    //         ':provenance_reservation'       =>  $_POST['provenance_client'],
    //         ':destination_reservation'      =>  $_POST['destination_client'],
    //         ':nbre_adulte_reservation'      =>  $_POST['nbre_adulte'],
    //         ':nbre_enfant_reservation'      =>  $_POST['nbre_enfant'],
    //         ':date_create_reservation'      =>  date("Y-m-d H:i:s"),
    //         ':date_last_modif_reservation'      =>  date("Y-m-d H:i:s"),
    //         ':user_create_reservation'      =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
    //         ':user_last_modif_reservation'      =>  $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
    //         ':statut_reservation'       =>  'En attente',
    //         ':id_client_fk_reservation'     =>  $id_client,
    //     )
    // );

    // $id_reservation = $connect-> lastInsertId();

    // insert9('reservation',
    // 'date_debut_reservation', $_POST['date_debut'],
    // 'date_fin_reservation', $_POST['date_fin'],
    // 'provenance_reservation', $_POST['provenance_client'],
    // 'destination_reservation', $_POST['destination_client'],
    // 'nbre_adulte_reservation', $_POST['nbre_adulte'],
    // 'nbre_enfant_reservation', $_POST['nbre_enfant'],
    // 'date_create_reservation',date("Y-m-d H:i:s"),
    // 'date_last_modif_reservation', date("Y-m-d H:i:s"),
    // // user create, user last modif
    // 'id_client_fk_reservation', $_POST['nom_prenom_client']
    // );



    // $occupee = 'Non';
    // $libere = 'Oui';
    // if ($_POST['arrivee'] == 'oui') {
    //     $occupee = 'Oui';
    //     $libere = 'Non';
    // }

    // $periode = '';
    // $montant = '';
    // switch($_POST['tarif']) {
    //     case "nuitee":
    //         $periode = 'nuitee';
    //         $montant = $_POST['montant_total_nuitee'];
    //         break;
    //     case "autre_tarif":
    //         // recuperer periode
    //         $id_tarif_chambre = $_POST['periode_tarif_chambre'];
    //         $query = 'SELECT periode_tarif_chambre FROM tarif_chambre WHERE id_tarif_chambre = :id_tarif_chambre';
    //         global $connect;
    //         $statement = $connect->prepare($query);
    //         $statement->execute(
    //             array(
    //                 ':id_tarif_chambre' => $id_tarif_chambre
    //             )
    //         );

    //         $result = $statement->fetchAll();
    //         foreach ($result as $row) {
    //             $periode = $row['periode_tarif_chambre'];
    //         }
    //         $montant = $_POST['montant_total_periode'];
    //         break;
    //     case "personaliser":
    //         $periode = $_POST['tarif_personaliser'];
    //         $montant = $_POST['montant_total_personaliser'];
    //         break;
    // }

    // insert6('chambre_reservee',
    // 'occupe_chambre_reservee', $occupee,
    // 'libere_chambre_reservee', $libere,
    // 'tarif_periode_chambre_reservee', $periode,
    // 'tarif_montant_chambre_reservee', $montant,
    // 'id_chambre_fk_chambre_reservee', $_POST['id_chambre'],
    // 'id_reservation_fk_chambre_reservee', $id_reservation);

    // echo json_encode("La réservation a été bien enregistrée.");
}


if(isset($_POST['btn_action_reserver']))
{
    /* Réserver */
    if($_POST['btn_action_reserver'] == 'Reserver')
    {
        if(isset($_POST['nouveau_client']) && $_POST['nouveau_client'] == 'on')
       { // Vérifier si le client existe déjà
            $query0 = "
            SELECT tel_user FROM user,type_user
            WHERE type_user.id_type_user = user.id_type_user_fk_user
            AND tel_user = :tel_user
            AND lib_type_user ='client' 
            ";
            $statement0 = $connect->prepare($query0);
            $statement0->execute(
                array(
                    ':tel_user'	=>	$_POST["tel_client"]
                )
            );
            $count = $statement0->rowCount();
            if($count > 0)
            {
                echo json_encode('Ce client existe déjà.');
            }
            else
            { 
                insert();
                $nom_chambre = get_nom_chambre($_POST['id_chambre']);
                switch ($_SESSION['type_compte']) {

                    case 1:
                        addlog("Reserv-01", $nom_chambre, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                        break;
                    case 2:
                        addlog("Reserv-02", $nom_chambre, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                        break;
                    case 3:
                        addlog("Reserv-03", $nom_chambre, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                        break;
                    case 4:
                        addlog("Reserv-04", $nom_chambre, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                        break;
                    
                }
                
            }
        }
        else
        { 
            insert();
            $nom_chambre = get_nom_chambre($_POST['id_chambre']);
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Reserv-01", $nom_chambre, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Reserv-02", $nom_chambre, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Reserv-03", $nom_chambre, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Reserv-04", $nom_chambre, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                
            }
    }
    }   
}



    //     // Vérifier si la chambre existe déjà dans la base
    //     $query0 = "
    // 	SELECT * FROM chambre 
	// 	WHERE nom_chambre = :nom_chambre 
    // 	";
    //     $statement0 = $connect->prepare($query0);
    //     $statement0->execute(
    //         array(
    //             ':nom_chambre'	=>	$_POST["nom_chambre"]
    //         )
    //     );
    //     $count = $statement0->rowCount();
    //     if($count > 0)
    //     {
    //         echo json_encode('Cette chambre existe déjà dans la liste.');
    //     }else
    //     {

    //         insert6('chambre',
    //             'nom_chambre',$_POST["nom_chambre"],
    //             'desc_chambre',$_POST["desc_chambre"],
    //             'aire_chambre',$_POST["aire_chambre"],
    //             'date_create_chambre',date("Y-m-d H:i:s"),
    //             'date_last_modif_chambre',date("Y-m-d H:i:s"),
    //             'id_type_chambre_fk_chambre',$_POST["id_type_chambre_fk_chambre"]
    //         );
    //         echo json_encode('La chambre a été enregistrée avec succès.');


    //         // Log
    //         switch ($_SESSION['type_user']) {

    //             case 1:
    //                 addlog("Enr-20", "Enregistrement d\'une nouvelle chambre : ".$_POST['nom_chambre'], $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Administrateur");
    //                 break;
    //             case 2:
    //                 addlog("Enr-20", "Enregistrement d\'une nouvelle chambre : ".$_POST['nom_chambre'], $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Contrôleur");
    //                 break;
    //             case 3:
    //                 addlog("Enr-20", "Enregistrement d\'une nouvelle chambre : ".$_POST['nom_chambre'], $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Enregistreur");
    //                 break;
    //             case 4:
    //                 addlog("Enr-20", "Enregistrement d\'une nouvelle chambre : ".$_POST['nom_chambre'], $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Recenseur");
    //                 break;
    //         }

    //     }
    // }

    /* Delete */
    // if($_POST['btn_action'] == 'delete')
    // {

    //     $status = 'Actif';
    //     if($_POST['status'] == 'Actif')
    //     {
    //         $status = 'Inactif';
    //     }

    //     update1('chambre',
    //         'id_chambre',$_POST["id_chambre"],
    //         'statut_chambre',$status
    //     );
    //     echo 'Le statut de la salle de chambre est : ' . $status;

    //     // Log
    //     // On a besoin du nom de la chambre
    //     $query00 = "
	// 	SELECT nom_chambre 
	// 	FROM chambre 
	// 	WHERE id_chambre = '".$_POST["id_chambre"]."'
	// 	";
    //     $statement00 = $connect->prepare($query00);
    //     $statement00->execute();
    //     $result00 = $statement00->fetchAll();

    //     $nom_chambre = "";

    //     foreach($result00 as $row00)
    //     {
    //         $nom_chambre = $row00["nom_chambre"];
    //     }

    //     switch ($_SESSION['type_user']) {

    //         case 1:
    //             addlog("Chg-20", "Changement du statut de la chambre : ".$nom_chambre.". Statut réglé sur : ".$status, $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Administrateur");
    //             break;
    //         case 2:
    //             addlog("Chg-20", "Changement du statut de la chambre : ".$nom_chambre.". Statut réglé sur : ".$status, $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Contrôleur");
    //             break;
    //         case 3:
    //             addlog("Chg-20", "Changement du statut de la chambre : ".$nom_chambre.". Statut réglé sur : ".$status, $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Enregistreur");
    //             break;
    //         case 4:
    //             addlog("Chg-20", "Changement du statut de la chambre : ".$nom_chambre.". Statut réglé sur : ".$status, $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Recenseur");
    //             break;
    //     }



    // }
// }


/* Consulter */

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT *
                  FROM chambre
                  INNER JOIN type_chambre tc 
                  ON chambre.id_type_chambre_fk_chambre = tc.id_type_chambre 
                  WHERE id_chambre = :id_chambre";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_chambre' => $_POST["id_reserv_dispo_view"]
            )
        );
        $result = $statement->fetchAll();
        $output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';

        //$nom_chambre ='';

        foreach ($result as $row) {
            $status = '<center><span class="badge badge-primary">Disponible</span></center>';

            // Pour le journal d'événements
            //$nom_chambre = $row["nom_chambre"];

            $output .= '
			<tr>
				<td>Type</td>
				<td>' . $row["nom_type_chambre"] . '</td>
			</tr>
			<tr>
				<td>Nom</td>
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


        switch ($_SESSION['type_compte']) {

            case 1:
                addlog("Info-01-reserv-dispo", $row["nom_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-reserv-dispo", $row["nom_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-reserv-dispo", $row["nom_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-reserv-dispo", $row["nom_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-reserv-dispo", $row["nom_chambre"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }

    }

}


if(isset($_POST['action_reserver']))
{
    if($_POST['action_reserver'] == 'fetch_room_details')
    {
        $query = "SELECT *
                  FROM chambre
                  INNER JOIN type_chambre tc 
                  ON chambre.id_type_chambre_fk_chambre = tc.id_type_chambre 
                  WHERE id_chambre = :id_chambre";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_chambre'	=>	$_POST["id_chambre"]
            )
        );
        $result = $statement->fetchAll();

        $type_chambre = '';
        $nom_chambre = '';

        foreach($result as $row)
        {
            $type_chambre = $row['nom_type_chambre'];
            $nom_chambre = $row['nom_chambre'];
        }

        $query0 = "
        SELECT id_tarif_chambre, montant_tarif_chambre, periode_tarif_chambre 
        FROM tarif_chambre 
        WHERE id_chambre_fk_tarif_chambre = :id_chambre 
        ORDER BY montant_tarif_chambre ASC 
        ";
        $statement0 = $connect->prepare($query0);
        $statement0->execute([
            ':id_chambre' => $_POST['id_chambre']
        ]);
        $result0 = $statement0->fetchAll();

        $periode_tarif_chambre ='';
        $periode_tarif_chambre = '<option selected disabled>Période</option>';

        foreach($result0 as $row0)
        {
            $periode_tarif_chambre .= '<option value="'.$row0["id_tarif_chambre"].'">'.$row0["periode_tarif_chambre"]. '</option>';
        }
    
        $output = array(
            'type_chambre' => $type_chambre,
            'nom_chambre' => $nom_chambre,
            'periode_tarif_chambre' => $periode_tarif_chambre,
        );

        echo json_encode($output);
    }
}




//     /* Modifier */
//     if($_POST['btn_action_modif'] == 'Modifier')
//     {

//         // Vérifier si la chambre existe déjà dans la base
//         $query0 = "
//     	SELECT * 
//         FROM ( 
//             SELECT * 
//         	FROM chambre 
//         	WHERE id_chambre <> :id_chambre  
//         ) AS JP 
//         WHERE nom_chambre = :nom_chambre 
//     	";
//         $statement0 = $connect->prepare($query0);
//         $statement0->execute(
//             array(
//                 ':id_chambre'	    =>	$_POST["id_chambre_modif"],
//                 ':nom_chambre'	    =>	$_POST["nom_chambre_modif"]
//             )
//         );
//         $count = $statement0->rowCount();
//         if($count > 0)
//         {
//             echo json_encode('Cette chambre existe déjà dans la liste.');
//         }else
//         {

//             update5('chambre',
//                 'id_chambre',$_POST["id_chambre_modif"],
//                 'nom_chambre',$_POST["nom_chambre_modif"],
//                 'desc_chambre',$_POST["desc_chambre_modif"],
//                 'aire_chambre',$_POST["aire_chambre_modif"],
//                 'date_last_modif_chambre',date("Y-m-d H:i:s"),
//                 'id_type_chambre_fk_chambre',$_POST["id_type_chambre_fk_chambre_modif"]
//             );
//             echo json_encode('La chambre a été modifiée avec succès.');

//             // Log
//             switch ($_SESSION['type_user']) {

//                 case 1:
//                     addlog("Mod-20", "Modification des détails de la chambre : ".$_POST['nom_chambre_modif'], $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Administrateur");
//                     break;
//                 case 2:
//                     addlog("Mod-20", "Modification des détails de la chambre : ".$_POST['nom_chambre_modif'], $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Contrôleur");
//                     break;
//                 case 3:
//                     addlog("Mod-20", "Modification des détails de la chambre : ".$_POST['nom_chambre_modif'], $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Enregistreur");
//                     break;
//                 case 4:
//                     addlog("Mod-20", "Modification des détails de la chambre : ".$_POST['nom_chambre_modif'], $_SESSION["prenom_user"]." ".$_SESSION["nom_user"]." - Recenseur");
//                     break;
//             }

//         }

//     }
// }


?>