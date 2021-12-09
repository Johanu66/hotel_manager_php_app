<?php
    function getMethodePaiement($id_methode_paiement){
        $query = "SELECT nom_methode_paiement FROM methode_paiement
        WHERE id_methode_paiement = :id";
        global $connect;
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':id' => $id_methode_paiement
            )
        );
        $result = $statement->fetchAll();
        $nom_methode_paiement = '';
        foreach($result as $row) {
            $nom_methode_paiement .= $row['nom_methode_paiement'];
        }
        return $nom_methode_paiement;
    }