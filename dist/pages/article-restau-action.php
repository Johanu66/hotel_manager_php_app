<?php
//article_restau_action.php

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

        // Vérifier si le type plat existe déjà dans la base
        $query0 = "
    	SELECT * FROM article_restau 
		WHERE nom_article_restau = :nom_article_restau 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':nom_article_restau'	    =>	$_POST["nom_article_restau"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            echo json_encode('Ce type de plat existe déjà dans la liste.');
        } else
        {

            insert6('article_restau',
                'nom_article_restau',$_POST["nom_article_restau"],
                'desc_article_restau',$_POST["desc_article_restau"],
                'date_create_article_restau', date("Y-m-d H:i:s"),
                'date_last_modif_article_restau',date("Y-m-d H:i:s"),
                'user_create_article_restau', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"],
                'user_last_modif_article_restau', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );

            //echo 'Le type de plat a été enregistré avec succès.';
            echo json_encode('Le type de plat a été enregistré avec succès.');

            // Log
            switch ($_SESSION['type_compte']) {
                case 1:
                    addlog("Enr-01-article-restau", $_POST["nom_article_restau"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Enr-02-article-restau", $_POST["nom_article_restau"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Enr-03-article-restau", $_POST["nom_article_restau"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 4:
                    addlog("Enr-04-article-restau", $_POST["nom_article_restau"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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

        update3('article_restau',
            'id_article_restau',$_POST["id_article_restau"],
            'statut_article_restau',$status,
            'date_del_article_restau', date("Y-m-d H:i:s"),
            'user_del_article_restau', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
        );
        //echo 'Le statut du type de plat est : ' . $status;

        
        echo json_encode($status);
        


        // Log
        // On a besoin du nom du type de la plat
        $query00 = "
		SELECT nom_article_restau 
		FROM article_restau 
		WHERE id_article_restau = '".$_POST["id_article_restau"]."'
		";
        $statement00 = $connect->prepare($query00);
        $statement00->execute();
        $result00 = $statement00->fetchAll();

        $nom_article_restau = "";

        foreach($result00 as $row00)
        {
            $nom_article_restau = $row00["nom_article_restau"];
        }

        

         switch ($_SESSION['type_compte']) {

             case 1:
                 addlog("Chg-01-article-restau", $nom_article_restau. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;
             case 2:
                 addlog("Chg-02-article-restau", $nom_article_restau. "," .$status, $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                 break;                 
         }

    }
}


/* Consulter */

if(isset($_POST['btn_action_view'])) {

    if ($_POST['btn_action_view'] == 'consulter') {

        $query = "SELECT * FROM article_restau WHERE id_article_restau = :id_article_restau";
        // $query = "SELECT * FROM article_restau WHERE id_article_restau = :id_article_restau";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_article_restau' => $_POST["id_article_restau_view"]
            )
        );
        $result = $statement->fetchAll();
        $output = '
    <div class="table-responsive">
      <table class="table table-boredered">
    ';

        //$nom_article_restau ='';
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
            if ($row['statut_article_restau'] == 'Actif') {
                $status = '<span class="badge badge-primary">'. $statut_actif .'</span>';
            } else {
                $status = '<span class="badge badge-danger">'. $statut_inactif .'</span>';
            }

            // Pour le journal d'événements
            //$nom_article_restau = $row["nom_article_restau"];

            if ($_SESSION['lang'] == 'EN') {
                    $label_nom = NOM_ARTICLE_RESTAU_EN;
                    $label_desc = DESC_ARTICLE_RESTAU_EN;
                    $label_date_create = LABEL_DATE_CREATE_EN;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_EN;
                    $label_created_by = LABEL_CREATED_BY_EN;
                    $label_statut = STATUT_EN;
                } else {
                    $label_nom = NOM_ARTICLE_RESTAU_FR;
                    $label_desc = DESC_ARTICLE_RESTAU_FR;
                    $label_date_create = LABEL_DATE_CREATE_FR;
                    $label_date_last_modif = LABEL_DATE_LAST_MODIF_FR;
                    $label_created_by = LABEL_CREATED_BY_FR;
                    $label_statut = STATUT_FR;
                }


            $output .= '
      <tr>
        <td>' . $label_nom . '</td>
        <td>' . $row["nom_article_restau"] . '</td>
      </tr>
      <tr>
        <td>' . $label_desc . '</td>
        <td>' . $row["desc_article_restau"] . '</td>
      </tr>
      <tr>
        <td>' . $label_date_create . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_create_article_restau"])) . ' à ' . date("H:i", strtotime($row["date_create_article_restau"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_date_last_modif . '</td>
        <td>' . date("d-m-Y", strtotime($row["date_last_modif_article_restau"])) . ' à ' . date("H:i", strtotime($row["date_last_modif_article_restau"])) . '</td>
      </tr>
      <tr>
        <td>' . $label_created_by . '</td>
        <td>' . $row['user_create_article_restau'] . '</td>
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
                addlog("Info-01-article-restau", $row["nom_article_restau"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 2:
                addlog("Info-02-article-restau", $row["nom_article_restau"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 3:
                addlog("Info-03-article-restau", $row["nom_article_restau"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 4:
                addlog("Info-04-article-restau", $row["nom_article_restau"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
            case 5:
                addlog("Info-05-article-restau", $row["nom_article_restau"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                break;
        }
        

    }

}



if(isset($_POST['btn_action_modif']))
{

    /* fetch single */
    if($_POST['btn_action_modif'] == 'fetch_single')
    {

        $query = "SELECT * FROM article_restau WHERE id_article_restau = :id_article_restau";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id_article_restau'	=>	$_POST["id_article_restau_modif"]
            )
        );
        $result = $statement->fetchAll();

        $nom_article_restau = '';
        $desc_article_restau = '';


        foreach($result as $row)
        {
            $nom_article_restau = $row['nom_article_restau'];
            $desc_article_restau = $row['desc_article_restau'];
        }

        $output = array(
            'nom_article_restau' => $nom_article_restau,
            'desc_article_restau' => $desc_article_restau
        );

        echo json_encode($output);

    }

    /* Modifier */
    if($_POST['btn_action_modif'] == 'Modifier')
    {
        

        // Vérifier si le type de plat existe déjà dans la base
        $query0 = "
    	SELECT * 
        FROM ( 
            SELECT * 
        	FROM article_restau 
        	WHERE id_article_restau <> :id_article_restau  
        ) AS JP 
        WHERE nom_article_restau = :nom_article_restau 
    	";
        $statement0 = $connect->prepare($query0);
        $statement0->execute(
            array(
                ':id_article_restau'	    =>	$_POST["id_article_restau_modif"],
                ':nom_article_restau'	    =>	$_POST["nom_article_restau_modif"]
            )
        );
        $count = $statement0->rowCount();
        if($count > 0)
        {
            //echo 'Ce type de plat existe déjà dans la liste.';
            echo json_encode('Ce type de plat existe déjà dans la liste.');
        }else
        {

            update4('article_restau',
                'id_article_restau',$_POST["id_article_restau_modif"],
                'nom_article_restau',$_POST["nom_article_restau_modif"],
                'desc_article_restau',$_POST["desc_article_restau_modif"],
                'date_last_modif_article_restau',date("Y-m-d H:i:s"),
                'user_last_modif_article_restau', $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]
            );
            //echo 'Le type de plat a été modifié avec succès.';
            echo json_encode('Le type de plat a été modifié avec succès.');


            // Log
            switch ($_SESSION['type_compte']) {

                case 1:
                    addlog("Modif-01-article-restau", $_POST["nom_article_restau_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 2:
                    addlog("Modif-02-article-restau", $_POST["nom_article_restau_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;
                case 3:
                    addlog("Modif-03-article-restau", $_POST["nom_article_restau_modif"], $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                    break;               
            }


        }

    }
    
}

?>