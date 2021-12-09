<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 18/10/2020
 * Time: 16:38
 */


include('../database_connection.php');

if(!empty($_POST["tarif_id"])){

    $query = "
    SELECT montant_tarif_chambre 
    FROM tarif_chambre 
    WHERE id_tarif_chambre = :id_tarif_chambre 
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id_tarif_chambre' =>	$_POST['tarif_id']
        )
    );
    $result = $statement->fetchAll();

    $output = '';

    foreach($result as $row)
    {
        $output .= $row["montant_tarif_chambre"];
    }
    echo json_encode($output);

}
?>