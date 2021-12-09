<?php

function addlog($CodeEvent, $ParamEvent, $PseudoUtilisateur){
    include('dbconnex.php');
    
    $varLogDate = gmdate("Y-m-d");
    $varLogHeure = gmdate("H:i:s"); //strftime("%H:%M:%S");
    $varCodeEvent = $CodeEvent;
    $varParamEvent = $ParamEvent;
    $varLogPseudo = addslashes($PseudoUtilisateur);
    $varLogIP = getenv("REMOTE_ADDR");
    
    
    $query_Clients = "INSERT INTO addlog_table(`CodeEvenement`,`ParametresEvenement`,`DateEvenement`,`HeureEvenement`,`PseudoUtilisateur`,`AdresseIP`) VALUES ('". $CodeEvent . "','" . $varParamEvent . "','" . $varLogDate . "','" . $varLogHeure ."','". $varLogPseudo . "','" . $varLogIP . "')";
            
    $statement = $connect->prepare($query_Clients);
    $statement->execute();
    
    }

// function addlog($CodeEvent, $MessageEvent, $PseudoUtilisateur){
// include('dbconnex.php');

// $varLogDate = gmdate("Y-m-d");
// $varLogHeure = gmdate("H:i:s"); //strftime("%H:%M:%S");
// $varCodeEvent = $CodeEvent;
// $varLogMessage = addslashes($MessageEvent);
// $varLogPseudo = addslashes($PseudoUtilisateur);
// $varLogIP = getenv("REMOTE_ADDR");


// $query_Clients = "INSERT INTO addlog_table(`CodeEvenement`,`MessageEvenement`,`DateEvenement`,`HeureEvenement`,`PseudoUtilisateur`,`AdresseIP`) VALUES ('". $CodeEvent . "','" . $varLogMessage . "','" . $varLogDate . "','" . $varLogHeure ."','". $varLogPseudo . "','" . $varLogIP . "')";
		
// $statement = $connect->prepare($query_Clients);
// $statement->execute();

// }
?>