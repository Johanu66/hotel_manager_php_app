<?php

include('../database_connection.php');

include('../AddLogInclude.php');

//On vérifie si le pseudo renvoyé existe dans la base
$query = "
  SELECT * 
  FROM compte
  INNER JOIN personne
  ON compte.id_personne_fk_compte = personne.id_personne
  WHERE pseudo_compte = :pseudo_compte
";
$statement = $connect->prepare($query);
$statement->execute(
    array(
        ':pseudo_compte'	=>	$_POST["pseudo_compte"],
    )
);



$message = '';
$count = $statement->rowCount();
if($count > 0)
{
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        if($row['statut_compte'] == 'Actif')
        {
            if(password_verify($_POST["mdp_compte"], $row["mdp_compte"]))
            {

                $_SESSION['type_compte'] = $row['id_type_compte_fk_compte'];
                $_SESSION['id_compte'] = $row['id_compte'];
                $_SESSION['pseudo_compte'] = $row['pseudo_compte'];

                $_SESSION['nom_personne'] = $row['nom_personne'];
                $_SESSION['prenom_personne'] = $row['prenom_personne'];
                $_SESSION['email_personne'] = $row['email_personne'];
                $_SESSION['tel_personne'] = $row['tel_personne'];

                // $_SESSION['menu_chambre'] = 'Actif';
                $query0 = "
                    SELECT lib_menu, statut_assoc_compte_and_menu
                    FROM assoc_compte_and_menu, menu, compte
                    WHERE compte.id_compte = assoc_compte_and_menu.id_compte_fk_assoc_compte_and_menu
                    AND menu.id_menu = assoc_compte_and_menu.id_menu_fk_assoc_compte_and_menu
                    AND compte.id_compte = :id_compte
                    AND statut_menu = 'Actif'
                    ";

                $statement0 = $connect->prepare($query0);
                $statement0->execute(
                    array(
                        ':id_compte' => $row['id_compte']
                    )
                );
                $result0 = $statement0->fetchAll();

                foreach($result0 as $row0){
                    // $_SESSION['menu_type_chambre'] = 'Inactif';
                    $_SESSION['menu_' . $row0['lib_menu']] = $row0['statut_assoc_compte_and_menu'];
                }                

                if ($row['id_type_compte_fk_compte'] == 1) {
                    $message = "Paramètres corrects - Admin";
                }

                if ($row['id_type_compte_fk_compte'] == 2) {
                    $message = "Paramètres corrects - Admin";
                }

                if ($row['id_type_compte_fk_compte'] == 3) {
                    $message = "Paramètres corrects - Admin";
                }

                if ($row['id_type_compte_fk_compte'] == 4) {
                    $message = "Paramètres corrects - Admin";
                }

                if ($row['id_type_compte_fk_compte'] == 5) {
                    $message = "Paramètres corrects - Admin";
                }
                

                // Log
                switch ($_SESSION['type_compte']) {

                    case 1:
                        addlog("Connex-01", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                        break;
                    case 2:
                        addlog("Connex-02", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                        break;
                    case 3:
                        addlog("Connex-03", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                        break;
                    case 4:
                        addlog("Connex-04", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                        break;
                    case 5:
                        addlog("Connex-05", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
                        break;
                }

        }
        else
           {
                $message = "Mot de passe erroné";

                // Log
                addlog("ErrConnex-01", $row["prenom_personne"]." ".$row["nom_personne"], "-");

            }
        }
    
        else
        {
            $message = "Compte désactivé";

            // Log
            addlog("ErrConnex-03", $row["prenom_personne"]." ".$row["nom_personne"], "-");

        }
    }
}
else
{

    $message = "Pseudo non valide";

    // Log
    addlog("ErrConnex-02", "", "-");

}


echo json_encode($message);

?>