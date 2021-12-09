<?php
// "lang.fr.php"
// Description
// La constante DICTIONNAIRE_FR contient les constantes langues de tous les menus de l'application
// en français

// --------------------------------- IMPORT ----------------------------------
// --------------------- CONSTANTS & VARIABLES & CLASSES ---------------------
// le dictionnaire français des constantes communes à tous les menus
const DICTIONNAIRE_FR_COMMON = [
    "HOTEL"                             =>          "Hôtel",
    "ACCES"                             =>          "ACCÈS",
    "MESSAGE_ACCES_TOUS_LES_ROLES"      =>          "Tous les rôles",
    "MESSAGE_ACCES_SAUF"                =>          "Tous les rôles sauf %s.",
    "LABEL_ROLES"                       =>          [
                                                        1   =>  'Super Administrateur',
                                                        2   =>  'Administrateur',
                                                        3   =>  'Éditeur',
                                                        4   =>  'Auteur',
                                                        5   =>  'Lecteur',
                                                    ],
    "LABEL_EXPORT_PDF"                  =>          "Exporter en PDF",
    "LABEL_EXPORT_WORD"                 =>          "Exporter en Word",
    "LABEL_EXPORT_EXCEL"                =>          "Exporter en Excel",
    "LABEL_BOUTON_EXPORTER"             =>          "Exporter",
    "ACTIONS"                           =>          "Actions",
    "CONSULTER"                         =>          "Consulter",
    "MODIFIER"                          =>          "Modifier",
    "SUPPRIMER"                         =>          "Supprimer",
    "INDIQUER_PRIX"                     =>          "Indiquer le prix",
    "EDITER_FACTURE"                    =>          "Editer la facture",
    "AFFICHER_FACTURE"                  =>          "Afficher la facture",
    
    "LOADING"                           =>          "Chargement du contenu",
    "EFFECTUE"                          =>          "Effectué",
    "ERREUR"                            =>          "Erreur",
    "FORMAT_DATETIME"                   =>          "%day %month %year à %hour_24h%min",
    "LABELS_MONTHS_SHORT"               =>          [
                                                        1   =>  'Jan',
                                                        2   =>  'Fév',
                                                        3   =>  'Mar',
                                                        4   =>  'Avr',
                                                        5   =>  'Mai',
                                                        6   =>  'Juin',
                                                        7   =>  'Juil',
                                                        8   =>  'Aoû',
                                                        9   =>  'Sep',
                                                        10  =>  'Oct',
                                                        11  =>  'Nov',
                                                        12  =>  'Déc',
                                                    ],
    "OUI"                               =>          "Oui",
    "NON"                               =>          "Non",
    "ANNULE"                            =>          "Annulé",
    ];

// le dictionnaire français du menu soins_spa
const DICTIONNAIRE_FR_SOINS_SPA = [
    "TITRE"                             =>          "Soins",
    "LISTE"                             =>          "Liste des soins proposés",
    "INTRO"                             =>          "Un soin est un service proposé par le spa",
    "BOUTON_NOUVEAU"                    =>          "Nouveau soin",
    "NOM"                               =>          "Nom du soin",
    "DESC"                              =>          "Description",
    "MODAL_LABEL_NOM"                   =>          "Nom du soin",
    "MODAL_LABEL_DESC"                  =>          "Description",
    "MODAL_MESSAGE_SE_CONNECTER"        =>          "Veuillez vous reconnecter",
    "MODAL_ADD_TITRE"                   =>          "Ajouter un soin",
    "MODAL_ADD_PLACEHOLDER_NOM"         =>          "Ex: Soins du visage, Soins du corps",
    "MODAL_ADD_BOUTON"                  =>          "Enregistrer",
    "MODAL_ADD_MESSAGE_SUCCES"          =>          "Le soin a été ajouté avec succès",
    "MODAL_ADD_MESSAGE_ECHEC"           =>          "Une erreur est survenue",
    "MODAL_ADD_MESSAGE_DOUBLON"         =>          "Un soin porte déjà ce nom",
    "MODAL_ADD_MESSAGE_DROIT_DACCES"    =>          "Vous n\'êtes pas autorisés à ajouter des soins",
    "MODAL_UPDATE_TITRE"                =>          "Modifier un soin",
    "MODAL_UPDATE_BOUTON"               =>          "Modifier",
    "MODAL_VIEW_TITRE"                  =>          "Détails du soin",
    "MODAL_VIEW_LABELS"                 =>          [
                                                        "nom_soins_spa"             => "Nom",
                                                        "desc_soins_spa"            => "Description",
                                                        "date_create_soins_spa"     => "Date de la création",
                                                        "date_last_modif_soins_spa" => "Dernièrement modifiée le",
                                                        "user_create_soins_spa"     => "Enregistrer par"
                                                    ],
    "MODAL_VIEW_MESSAGE_ECHEC"          =>          "Nous n\'avons pas pu charger les infos de ce soin",
    "MODAL_UPDATE_MESSAGE_ECHEC_FETCH"  =>          "Nous n\'avons pas pu charger les infos de ce soin",
    "MODAL_UPDATE_MESSAGE_DROIT_DACCES" =>          "Vous n\'êtes pas autorisés à modifier des soins",
    "MODAL_UPDATE_MESSAGE_SUCCES"       =>          "Le soin a été modifié avec succès",
    "MODAL_UPDATE_MESSAGE_DOUBLON"      =>          "Un soin porte déjà ce nom",
    "MODAL_UPDATE_MESSAGE_ECHEC"        =>          "Une erreur est survenue",
];


// le dictionnaire français du menu soins_spa
const DICTIONNAIRE_FR_PRESTATION_SPA = [
    "TITRE"                             =>          "Prestations",
    "LISTE"                             =>          "Liste des prestations du spa",
    "INTRO"                             =>          "Une prestation est ...",
    "BOUTON_NOUVEAU"                    =>          "Nouvelle prestation",
    "NOM"                               =>          "Nom du soin",
    "DEBUT"                             =>          "Début",
    "FIN"                               =>          "Fin",
    "CLIENT"                            =>          "Client",
    "MONTANT"                           =>          "Montant hors taxes",
    "FACTURE"                           =>          "Facture",

    "MODAL_LABEL_SOIN"                  =>          "Soin",
    "MODAL_LABEL_DEBUT"                 =>          "Début",
    "MODAL_LABEL_FIN"                   =>          "Fin",
    "MODAL_LABEL_CLIENT"                =>          "Client",
    "MODAL_LABEL_NOUVEAU_CLIENT"        =>          "Nouveau client",
    "MODAL_LABEL_INFOS_NOUVEAU_CLIENT"  =>          "Informations du nouveau client",
    "MODAL_PLACEHOLDER_NOM_CLIENT"      =>          "Nom",
    "MODAL_PLACEHOLDER_PRENOM_CLIENT"   =>          "Prénom",
    "MODAL_PLACEHOLDER_ID_CARD_CLIENT"  =>          "Carte d'identité",
    "MODAL_PLACEHOLDER_PASSEPORT_CLIENT"=>          "Passeport",
    "MODAL_PLACEHOLDER_TEL_CLIENT"      =>          "Téléphone",
    "MODAL_PLACEHOLDER_EMAIL_CLIENT"    =>          "E-mail",
    "MODAL_LABEL_MONTANT"               =>          "Montant",
    "MODAL_LABEL_NOTE"                  =>          "Notes",
    "MODAL_MESSAGE_SE_CONNECTER"        =>          "Veuillez vous reconnecter",

    "MODAL_ADD_TITRE"                   =>          "Ajouter une prestation",
    "MODAL_ADD_CHOISIR_SOIN"            =>          "Choisisser un soin",
    "MODAL_ADD_CHOISIR_CLIENT"          =>          "Choisissez le client",
    "MODAL_ADD_BOUTON"                  =>          "Enregistrer",
    "MODAL_ADD_MESSAGE_SUCCES"          =>          "La prestation a été ajoutée avec succès",
    "MODAL_ADD_MESSAGE_ECHEC"           =>          "Une erreur est survenue",
    "MODAL_ADD_MESSAGE_DOUBLON"         =>          "Il existe déjà un client avec ce numero de téléphone",
    "MODAL_ADD_MESSAGE_DROIT_DACCES"    =>          "Vous n\'êtes pas autorisés à ajouter des prestations",

    "MODAL_INDIQUER_PRIX_TITRE"         =>          "Indiquer le prix",
    "MODAL_INDIQUER_PRIX_LABEL_PRIX"    =>          "Indiquer le prix de cette prestation",
    "MODAL_INDIQUER_PRIX_BOUTON"        =>          "Enregistrer",
    "MODAL_INDIQUER_PRIX_MESSAGE_SUCCES"=>          "Le prix de cette prestation a été enregistré avec succès",
    "MODAL_INDIQUER_PRIX_MESSAGE_ECHEC" =>          "Une erreur est survenue",
    "MODAL_INDIQUER_PRIX_MESSAGE_DROIT_DACCES"=>    "Vous n\'êtes pas autorisés à indiquer le prix des prestations",
    
    
        

    "MODAL_UPDATE_TITRE"                =>          "Modifier une prestation",
    "MODAL_UPDATE_BOUTON"               =>          "Modifier",
    "MODAL_UPDATE_MESSAGE_ECHEC_FETCH"  =>          "Nous n\'avons pas pu charger les infos de cette prestation",
    "MODAL_UPDATE_MESSAGE_DROIT_DACCES" =>          "Vous n\'êtes pas autorisés à modifier des prestations",
    "MODAL_UPDATE_MESSAGE_SUCCES"       =>          "La prestation a été modifiée avec succès",
    "MODAL_UPDATE_MESSAGE_ECHEC"        =>          "Une erreur est survenue",
    "MODAL_UPDATE_MESSAGE_DOUBLON"      =>          "Il existe déjà un client avec ce numero de téléphone",

    "MODAL_VIEW_TITRE"                  =>          "Détails du soin",
    "MODAL_VIEW_LABELS"                 =>          [
                                                        "nom_soins_spa"                  => "Soin",
                                                        "date_debut_prestation_spa"      => "Début",
                                                        "date_fin_prestation_spa"        => "Fin",
                                                        "client"                         => "Client",
                                                        "montant_prestation_spa"         => "Montant hors taxes",
                                                        "facture_prestation_spa"         => "Facture",
                                                        "note_prestation_spa"            => "Notes",
                                                        "date_create_prestation_spa"     => "Date de la création",
                                                        "date_last_modif_prestation_spa" => "Dernièrement modifiée le",
                                                        "user_create_prestation_spa"     => "Enregistrer par"
                                                    ],
    "MODAL_VIEW_MESSAGE_ECHEC"          =>          "Nous n\'avons pas pu charger les infos de cette prestation",


    "MODAL_NEW_FACTURE_TITRE"                       =>      "Editer la facture",
    "MODAL_NEW_FACTURE_LABEL_DATE"                  =>      "Date de la facture",
    "MODAL_NEW_FACTURE_LABEL_NUM"                   =>      "Numéro de la facture",
    "MODAL_NEW_FACTURE_LABEL_METHODE_PAIEMENT"      =>      "Méthode de paiement",
    "MODAL_NEW_FACTURE_CHOISIR_METHODE_PAIEMENT"    =>      "Choisir la méthode de paiement",
    "MODAL_NEW_FACTURE_LABEL_SELECT_TVA_FR"         =>      "Inclure TVA",
    "MODAL_NEW_FACTURE_LABEL_TVA"                   =>      "TVA",
    "MODAL_NEW_FACTURE_LABEL_MONTANT_HT"            =>      "Montant HT",
    "MODAL_NEW_FACTURE_LABEL_MONTANT_TVA"           =>      "TVA",
    "MODAL_NEW_FACTURE_LABEL_MONTANT_TTC"           =>      "Montant TTC",
    "MODAL_NEW_FACTURE_LABEL_MONTANT_TTC_EN_LETTRE" =>      "Montant TTC en lettres",
    "MODAL_NEW_FACTURE_BOUTON"                      =>      "Editer la facture",
    "MODAL_NEW_FACTURE_MESSAGE_ECHEC_FETCH"         =>      "Une erreur est survenue",
    "MODAL_NEW_FACTURE_MESSAGE_DROIT_DACCES"        =>      "Vous n\'êtes pas autorisés à éditer les factures des prestations",
    "MODAL_NEW_FACTURE_MESSAGE_SUCCES"              =>      "La facture a été éditée avec succès",
    "MODAL_NEW_FACTURE_MESSAGE_DOUBLON"             =>      "Une facture porte déjà ce nom",
    "MODAL_NEW_FACTURE_MESSAGE_ECHEC"               =>      "Une erreur est survenue",
];






// le dictionnaire français de toute l'application
const DICTIONNAIRE_FR = [
    'common'        =>  DICTIONNAIRE_FR_COMMON,
    'soins_spa'     =>  DICTIONNAIRE_FR_SOINS_SPA,
    'prestation_spa'=>  DICTIONNAIRE_FR_PRESTATION_SPA,
    // ...ainsi de suite
];

// -------------------------- FUNCTIONS DECLARATION --------------------------
// ---------------------------------- MAIN -----------------------------------
// ----------------------------------- END -----------------------------------