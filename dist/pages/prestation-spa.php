<?php

include_once('utils.php');
include_once('../scripts_php/fonctions_list.php');

$menu = 'prestation_spa'; // le nom du menu actuel
$url_fetch = 'prestation-spa-fetch.php';
$url_action = 'prestation-spa-action.php';

include_once '../lang/lang.php';
$contenu = DICTIONNAIRE[$_SESSION['lang']]["common"];
foreach ($contenu as $key => $value) {
    ${$key} = $value;
}
$contenu = DICTIONNAIRE[$_SESSION['lang']][$menu];
foreach ($contenu as $key => $value) {
    ${$key} = $value;
}

// rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
RedirectIfNotConnected(); 
// rediriger l'utilisateur vers le tableau de bord s'il n'a pas accès au menu
RedirectIfNotAllowed($menu);

// Ajouter un nouveau log de consultation de cette page
LogCons($menu);

// importer les constantes langues communes à tous les menus
// LoadDictionary("common");
// importer les constantes langues du menu actuel
// LoadDictionary($menu);

// display sidebar comme une fonction des menus actifs... ??
$spa = 'active';
$prestation_spa = 'active';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../parts/headmeta.php';?>
    <title><?php echo $TITRE; ?> - <?php echo $HOTEL ?></title>
    <?php include '../parts/headsuite.php';?>
    <?php include '../parts/headstyle.php';?>
    <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">
	<!-- Page specific css -->
    <style>
        .export > .form-group {
            width:300px;
            float:right;
        }
        .loading {
            display: grid;
            place-items: center;
        }
        .select2-container {
            width: 100%!important;
        }
        .select2-selection {
            background-color: #fdfdff!important;
            border-color: #e4e6fc!important;
        }
        .select2-selection__rendered {
            /* position: relative; */
            padding-top: 7px!important;
            padding-left: 15px!important;
        }
    </style>
</head>
<body style="background-color: #f1f1f1;">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include '../parts/navbar.php';?>
            <?php include '../parts/sidebar.php';?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section"$>
                    <div class="section-header">
                        <h1><?php echo $TITRE ?></h1>
                        <div class="section-header-breadcrumb">
                            <?php include '../parts/breadcrumb-dashboard.php';?>
                            <div class="breadcrumb-item"><?php echo $TITRE ?></div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">
                            <?php echo $LISTE ?>
                        </h2>
                        <p class="section-lead">
                            <?php echo $INTRO ?>
                        </p>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <?php include '../parts/titre-tableau.php';?>

                                        <!-- Si l'utilisateur n'est pas un lecteur, il a accès au bouton d'enregistrement -->
                                        <!-- Si plusieurs rôles sont concernés, utiliser: UserIsNot('lecteur', 'auteur')  -->
                                        <?php if (UserIsNot('lecteur')) { ?>
                                            <div class="card-header-action">
                                                <!-- la fonction ToolTip($position, $contenu) inclut les attributs html 
                                                qui permettent d'afficher un tooltip à la position $position -->
                                                <!-- les fonctions ContenuToolTipAcces() et ContenuToolTipAccesSauf() incluent le contenu du tooltip qui décrit les droits d'accès -->
                                                <button type="button" id="add_button" class="btn btn-warning" <?php echo ToolTip("left", ContenuToolTipAccesSauf("lecteur")) ?> >
                                                    <?php echo $BOUTON_NOUVEAU ?>
                                                </button>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="card-body">
                                        <!-- Formulaire d'exportation du tableau -->
                                        <form method="POST" action="../export/export-prestation-spa.php" class="export">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select name="file_type" class="custom-select" id="inputGroupSelect04">
                                                        <option value="pdf"><?php echo $LABEL_EXPORT_PDF ?></option>
                                                        <option value="word"><?php echo $LABEL_EXPORT_WORD ?></option>
                                                        <option value="excel"><?php echo $LABEL_EXPORT_EXCEL ?></option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <!-- la fonction ToolTip($position, $contenu) inclut les attributs html 
                                                        qui permettent d'afficher un tooltip à la position $position -->
                                                        <!-- les fonctions ContenuToolTipAcces() et ContenuToolTipAccesSauf() incluent le contenu du tooltip qui décrit les droits d'accès -->
                                                        <button name="export_prestation_spa" type="submit" class="btn btn-primary" <?php echo ToolTip("left", ContenuToolTipAcces("super_admin, admin")) ?> ><?php echo $LABEL_BOUTON_EXPORTER ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Tableau des données -->
                                        <div class="table-responsive">
                                            <!-- changer le id -->
                                            <table id="soins_spa_datatable" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <!-- la fonction th(constante_langue) inclut un <th> dont le nom sera constante_langue -->
                                                        <?php echo th($NOM) //Avec comme paramètre le nom de la constante définie dans le dictionnaire ?> 
                                                        <?php echo th($DEBUT) ?> 
                                                        <?php echo th($FIN) ?> 
                                                        <?php echo th($CLIENT) ?> 
                                                        <?php echo th($MONTANT) ?>
                                                        <?php echo th($FACTURE) ?>
                                                        <?php echo th($ACTIONS) ?>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

            <?php include '../parts/footer.php';?>
        </div>
    </div>


    <!-- FENÊTRES MODALES -->
    <!-- AJOUTER - INDIQUER LE PRIX - MODIFIER - CONSULTER - EDITER LA FACTURE -->

    <!-- MODAL ADD -->
    <div id="modal_add" class="modal fade">
        <div class="modal-dialog">
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $MODAL_ADD_TITRE ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
            
                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo $MODAL_LABEL_SOIN ?> *</label>
                            <select name="id_soins_spa" class="form-control" required>
                                <option value=""><?php echo $MODAL_ADD_CHOISIR_SOIN ?></option>
                                <?php echo fill_soins_spa_list($connect) ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label><?php echo $MODAL_LABEL_DEBUT ?> *</label>
                                <input type="datetime-local" name="date_debut_prestation_spa" class="form-control" required />
                            </div>

                            <div class="form-group col-lg-6">
                                <label><?php echo $MODAL_LABEL_FIN ?> *</label>
                                <input type="datetime-local" name="date_fin_prestation_spa" class="form-control" required />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label><?php echo $MODAL_LABEL_CLIENT ?></label>
                            <select name="id_client" class="form-control select2" required>
                                <option value=""><?php echo $MODAL_ADD_CHOISIR_CLIENT ?></option>
                                <?php echo fill_client_list($connect) ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="nouveau_client" id="nouveau_client"/>
                            <label for="nouveau_client"><?php echo $MODAL_LABEL_NOUVEAU_CLIENT ?></label>
                        </div>

                        <div class="infos_client">
                            <label><?php echo $MODAL_LABEL_INFOS_NOUVEAU_CLIENT ?></label>
                            <hr />
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="nom_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_NOM_CLIENT ?> *" />
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="prenom_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_PRENOM_CLIENT ?> *" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="id_card_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_ID_CARD_CLIENT ?>"/>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="passeport_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_PASSEPORT_CLIENT ?>"/>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="tel_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_TEL_CLIENT ?> *"/>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" name="email_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_EMAIL_CLIENT ?>"/>
                                </div>
                            </div>

                            <hr />
                        </div>


                        <div class="form-group">
                            <label><?php echo $MODAL_LABEL_MONTANT ?></label>
                            <input type="number" min=0 step=0.01 name="montant_prestation_spa" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label><?php echo $MODAL_LABEL_NOTE ?></label>
                            <textarea name="note_prestation_spa" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer bg-whitesmoke">
                        <!-- Cet input envoie le nom de l'action à éffectuer: add, update, delete, new_facture... -->
                        <!-- name="action_prestation_spa" value="add" -->
                        <input type="hidden" name="action<?php echo '_' . $menu ?>" value="add" />
                        <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton">
                            <?php echo $MODAL_ADD_BOUTON ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL INDIQUER PRIX -->
    <div id="modal_indiquer_prix" class="modal fade">
        <div class="modal-dialog">
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $MODAL_INDIQUER_PRIX_TITRE ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-lg-7">
                                <label><?php echo $MODAL_INDIQUER_PRIX_LABEL_PRIX ?> *</label>
                                <input type="number" min=0 step=0.01 name="montant_prestation_spa" class="form-control" required/>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-whitesmoke">
                        <!-- Cet input envoie l'id de la prestation dont on veut indiquer le prix -->
                        <input type="hidden" name="id_prestation_spa" value="" />
                        <!-- Cet input envoie le nom de l'action à éffectuer: add, indiquer_prix, update, delete, new_facture... -->
                        <!-- name="action_prestation_spa" value="indiquer_prix" -->
                        <input type="hidden" name="action<?php echo '_' . $menu ?>" value="indiquer_prix" />
                        <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton">
                            <?php echo $MODAL_INDIQUER_PRIX_BOUTON ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL UPDATE -->
    <div id="modal_update" class="modal fade">
        <div class="modal-dialog">
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $MODAL_UPDATE_TITRE ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
            
                    <div class="modal-body">
                        <!-- Message qui s'affiche pendant le chargement des infos -->
                        <div class="loading"><?php echo $LOADING ?></div>
                        
                        <div class="content">
                            <div class="form-group">
                                <label><?php echo $MODAL_LABEL_SOIN ?> *</label>
                                <select name="id_soins_spa" class="form-control" required>
                                    <?php echo fill_soins_spa_list($connect) ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label><?php echo $MODAL_LABEL_DEBUT ?> *</label>
                                    <input type="datetime-local" name="date_debut_prestation_spa" class="form-control" required />
                                </div>

                                <div class="form-group col-lg-6">
                                    <label><?php echo $MODAL_LABEL_FIN ?> *</label>
                                    <input type="datetime-local" name="date_fin_prestation_spa" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo $MODAL_LABEL_CLIENT ?> *</label>
                                <select name="id_client" class="form-control select2" required>
                                    <?php echo fill_client_list($connect) ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="nouveau_client" id="nouveau_client_update"/>
                                <label for="nouveau_client_update"><?php echo $MODAL_LABEL_NOUVEAU_CLIENT ?></label>
                            </div>

                            <div class="infos_client">
                                <label><?php echo $MODAL_LABEL_INFOS_NOUVEAU_CLIENT ?></label>
                                <hr />
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="nom_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_NOM_CLIENT ?> *" />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="prenom_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_PRENOM_CLIENT ?> *" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="id_card_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_ID_CARD_CLIENT ?>"/>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="passeport_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_PASSEPORT_CLIENT ?>"/>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="tel_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_TEL_CLIENT ?> *"/>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="email" name="email_client" class="form-control" placeholder="<?php echo $MODAL_PLACEHOLDER_EMAIL_CLIENT ?>"/>
                                    </div>
                                </div>

                                <hr />
                            </div>

                            <div class="form-group">
                                <label><?php echo $MODAL_LABEL_MONTANT ?></label>
                                <input type="number" min=0 step=0.01 name="montant_prestation_spa" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label><?php echo $MODAL_LABEL_NOTE ?></label>
                                <textarea name="note_prestation_spa" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-whitesmoke">
                        <!-- Cet input envoie l'id de la prestation à modifier -->
                        <input type="hidden" name="id_prestation_spa" value="" />
                        <!-- Cet input envoie le nom de l'action à éffectuer: add, update, delete, new_facture... -->
                        <!-- name="action_prestation_spa" value="update" -->
                        <input type="hidden" name="action<?php echo '_' . $menu ?>" value="update" />
                        <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton">
                            <?php echo $MODAL_UPDATE_BOUTON ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL VIEW -->
    <div id="modal_view" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title_view"><?php echo $MODAL_VIEW_TITRE ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Message qui s'affiche pendant le chargement des infos -->
                    <div class="loading"><?php echo $LOADING ?></div>
                    <!-- Les détails seront insérés dans ce div -->
                    <div class="details table-responsive"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL NEW FACTURE -->
    <div id="modal_new_facture" class="modal fade">
        <div class="modal-dialog">
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $MODAL_NEW_FACTURE_TITRE ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Message qui s'affiche pendant le chargement des infos -->
                        <div class="loading"><?php echo $LOADING ?></div>
                        
                        <div class="content">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label><?php echo $MODAL_NEW_FACTURE_LABEL_DATE ?> *</label>
                                    <input type="datetime-local" name="date_facture_spa" class="form-control" required />
                                </div>

                                <div class="form-group col-lg-6">
                                    <label><?php echo $MODAL_NEW_FACTURE_LABEL_NUM ?> *</label>
                                    <input type="text" name="num_facture_spa" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo $MODAL_NEW_FACTURE_LABEL_METHODE_PAIEMENT ?> *</label>
                                <select name="id_methode_paiement" class="form-control" required >
                                    <option value=""><?php echo $MODAL_NEW_FACTURE_CHOISIR_METHODE_PAIEMENT ?></option>
                                    <?php echo fill_methode_paiement_list($connect);?>
                                </select>
                            </div>

                            <div class="row" style="height:70px;">
                                <div class="form-group col-lg-4" style="margin-top:10px;">
                                    <input type="checkbox" name="select_tva" id="select_tva" style="margin-top:0px;"/>
                                    <label for="select_tva" style="position:relative;bottom:2px;">
                                        <?php echo $MODAL_NEW_FACTURE_LABEL_SELECT_TVA_FR ?>
                                    </label>
                                </div>

                                <div class="form-group" style="margin-top:8px;padding-right:10px;">
                                    <label><?php echo $MODAL_NEW_FACTURE_LABEL_TVA ?>* :</label>
                                </div>

                                <div class="form-group">
                                    <input type="number" min=0 max=100 step=0.01 name="valeur_tva_facture_spa" class="form-control" style="width:100px;" required />
                                </div>

                                <div class="form-group" style="margin-top:8px;padding-left:5px;font-size:17px;">%</div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label><?php echo $MODAL_NEW_FACTURE_LABEL_MONTANT_HT ?></label>
                                    <input type="text" name="montant_ht_facture_spa" class="form-control" readonly />
                                </div>

                                <div class="form-group col-lg-6">
                                    <label><?php echo $MODAL_NEW_FACTURE_LABEL_MONTANT_TVA ?></label>
                                    <input type="text" id="montant_tva" class="form-control" readonly />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label><?php echo $MODAL_NEW_FACTURE_LABEL_MONTANT_TTC ?></label>
                                    <input type="text" name="montant_ttc_facture_spa" class="form-control" readonly />
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo $MODAL_NEW_FACTURE_LABEL_MONTANT_TTC_EN_LETTRE ?> *</label>
                                <textarea type="text" name="montant_ttc_en_lettre_facture_spa" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-whitesmoke">
                        <!-- Cet input envoie l'id de la prestation dont on veut éditer la facture -->
                        <input type="hidden" name="id_prestation_spa" value="" />
                        <!-- Cet input envoie le nom de l'action à éffectuer: add, indiquer_prix, update, delete, new_facture... -->
                        <!-- name="action_prestation_spa" value="new_facture" -->
                        <input type="hidden" name="action<?php echo '_' . $menu ?>" value="new_facture" />
                        <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton">
                            <?php echo $MODAL_NEW_FACTURE_BOUTON ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>






    <!-- General JS Scripts -->
    <script src="../assets/modules/jquery.min.js"></script>
    <script src="../assets/modules/popper.js"></script>
    <script src="../assets/modules/tooltip.js"></script>
    <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="../assets/modules/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>
    
    <!-- JS Libraies -->
    <script src="../assets/modules/datatables/datatables.min.js"></script>
    <script src="../assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="../assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="../assets/js/page/modules-datatables.js"></script>
    
    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>



    <script type="text/javascript">

    menu = "soins_spa";  // le nom du menu

    /* Affichage de la liste */
    var soins_spa_datatable = $('#soins_spa_datatable').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url: "<?php echo $url_fetch ?>",
            type:"POST"
        },
        "columnDefs":[
            {
                "targets":[6],
                "orderable":false,
            },
        ],
        //"bSort" : false,
        "pageLength": 10
    });

    // Action Date debut <= Date fin
    $('.modal [name="date_debut_prestation_spa"]').change(function(){
        $(this).parent('.form-group').next('.form-group').find('[name="date_fin_prestation_spa"]').attr("min", $(this).val());
    })

    // Action Nouveau Client
    $('.modal [name="nouveau_client"]').change(function(){
        if ($(this).prop("checked")) {
            $(this).parent('.form-group').prev('.form-group').hide(300);
            $(this).parent('.form-group').prev('.form-group').find('[name="id_client"]').removeAttr("required");

            $(this).parent('.form-group').next('.infos_client').show(500);
            $(this).parent('.form-group').next('.infos_client').find('[name="nom_client"]').attr("required", true);
            $(this).parent('.form-group').next('.infos_client').find('[name="prenom_client"]').attr("required", true);
            $(this).parent('.form-group').next('.infos_client').find('[name="tel_client"]').attr("required", true);
        } else {
            $(this).parent('.form-group').prev('.form-group').show(300);
            $(this).parent('.form-group').prev('.form-group').find('[name="id_client"]').attr("required", true);

            $(this).parent('.form-group').next('.infos_client').hide(300);
            $(this).parent('.form-group').next('.infos_client').find('[name="nom_client"]').removeAttr("required");
            $(this).parent('.form-group').next('.infos_client').find('[name="prenom_client"]').removeAttr("required");
            $(this).parent('.form-group').next('.infos_client').find('[name="tel_client"]').removeAttr("required");
        }
    })




    // // // SCRIPT MODAL ADD
    // Cette fonction ramène le formulaire d'ajout à son état initial
    function ResetFormAdd() {
        // ATTENTION!!! Reset tous les champs du formulaire
        $('#modal_add form')[0].reset();
        // retirer l'attribut min de date_fin_prestation_spa
        $('#modal_add [name="date_fin_prestation_spa"]').removeAttr("min");
        // reset le chosen
        default_text = $('#modal_add [name="id_client"] option[value=""]').text();
        $('#modal_add [name="id_client"]').next('.select2-container').find('.select2-selection__rendered').text(default_text);
        // afficher le select: choisir un client
        $('#modal_add [name="id_client"]').parent('.form-group').show();
        $('#modal_add [name="id_client"]').attr("required", true);
        // masquer .infos_client
        $('#modal_add .infos_client').hide();
        $('#modal_add [name="nom_client"]').removeAttr("required");
        $('#modal_add [name="prenom_client"]').removeAttr("required");
        $('#modal_add [name="tel_client"]').removeAttr("required");
    }

    /* Affichage de la fenêtre modale d'ajout */
    $('#add_button').click(function(){
        // Reset le formulaire d'ajout
        ResetFormAdd();
        // Afficher le modal
        $('#modal_add').modal('show');
    })

    /* Enregistrer */
    $(document).on('submit', '#modal_add form', function(event){
        event.preventDefault();
        var form_data = $(this).serializeArray();
        console.log(form_data);

        $.ajax({
            url: "<?php echo $url_action ?>",
            method: "POST",
            data: form_data,
            dataType: "json",
            success: function(response) {
                console.log(response);
                // HandleResponseAdd est la fonction qui gère quoi faire en fonction de la réponse reçue
                HandleResponseAdd(response);
                // Reload le datatable
                soins_spa_datatable.ajax.reload();
            }
        })
    })

    function HandleResponseAdd(response) {
        switch(response.status) {
            case "success":
                ResetFormAdd();
                $('#modal_add').modal('hide');
                swal('<?php echo $EFFECTUE ?>',
                '<?php echo $MODAL_ADD_MESSAGE_SUCCES ?>',
                'success');
                break;
            case "doublon":
                ResetFormAdd();
                $('#modal_add').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_ADD_MESSAGE_DOUBLON ?>',
                'error');
                break;
            case "invalid_form":
                // afficher les erreurs dans le formulaire
                break;
            case "failed":
                ResetFormAdd();
                $('#modal_add').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_ADD_MESSAGE_ECHEC ?>',
                'error');
                break;
            case "not_allowed":
                if (response.action == "all") {
                    // rediriger vers dashboard
                }
                if (response.action == "add") {
                    ResetFormAdd();
                    $('#modal_add').modal('hide');
                    swal('<?php echo $ERREUR ?>',
                    '<?php echo $MODAL_ADD_MESSAGE_DROIT_DACCES ?>',
                    'error');
                }
                // else
                break;
            case "not_connected":
                // demander à l'utilisateur de se reconnecter
                // ou recharger la page
                ResetFormAdd();
                $('#modal_add').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                ResetFormAdd();
                $('#modal_add').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_ADD_MESSAGE_ECHEC ?>',
                'error');
                break;
        }
    }




    // // // SCRIPT MODAL INDIQUER PRIX
    /* Affichage de la fenêtre modale d'ajout */
    $(document).on('click', '.indiquer_prix_button', function(){
        // Reset le formulaire indiquer_prix
        $('#modal_indiquer_prix form')[0].reset();
        // Afficher le modal
        $('#modal_indiquer_prix').modal('show');
        // Insérer le id de la prestation dans le formulaire
        id_prestation_spa = $(this).data("id_prestation_spa");
        $('#modal_indiquer_prix [name="id_prestation_spa"]').val(id_prestation_spa);
    })

    /* Indiquer le prix */
    $(document).on('submit', '#modal_indiquer_prix form', function(event){
        event.preventDefault();
        var form_data = $(this).serializeArray();
        console.log(form_data);

        $.ajax({
            url: "<?php echo $url_action ?>",
            method: "POST",
            data: form_data,
            dataType: "json",
            success: function(response) {
                console.log(response);
                // HandleResponseIndiquerPrix est la fonction qui gère quoi faire en fonction de la réponse reçue
                HandleResponseIndiquerPrix(response);
                // Reload le datatable
                soins_spa_datatable.ajax.reload();
            }
        })
    })

    function HandleResponseIndiquerPrix(response) {
        switch(response.status) {
            case "success":
                $('#modal_indiquer_prix form')[0].reset();
                $('#modal_indiquer_prix').modal('hide');
                swal('<?php echo $EFFECTUE ?>',
                '<?php echo $MODAL_INDIQUER_PRIX_MESSAGE_SUCCES ?>',
                'success');
                break;
            case "invalid_form":
                // afficher les erreurs dans le formulaire
                break;
            case "failed":
                $('#modal_indiquer_prix form')[0].reset();
                $('#modal_indiquer_prix').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_INDIQUER_PRIX_MESSAGE_ECHEC ?>',
                'error');
                break;
            case "not_allowed":
                if (response.action == "all") {
                    // rediriger vers dashboard
                }
                if (response.action == "add") {
                    $('#modal_indiquer_prix form')[0].reset();
                $('#modal_indiquer_prix').modal('hide');
                    swal('<?php echo $ERREUR ?>',
                    '<?php echo $MODAL_INDIQUER_PRIX_MESSAGE_DROIT_DACCES ?>',
                    'error');
                }
                // else
                break;
            case "not_connected":
                // demander à l'utilisateur de se reconnecter
                // ou recharger la page
                $('#modal_indiquer_prix form')[0].reset();
                $('#modal_indiquer_prix').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                $('#modal_indiquer_prix form')[0].reset();
                $('#modal_indiquer_prix').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_INDIQUER_PRIX_MESSAGE_ECHEC ?>',
                'error');
                break;
        }
    }




    // // // SCRIPT MODAL UPDATE
    // Cette fonction ramène le formulaire de modification à son état initial
    function ResetFormUpdate() {
        // ATTENTION!!! Reset tous les champs du formulaire
        $('#modal_update form')[0].reset();
        // retirer l'attribut min de date_fin_prestation_spa
        $('#modal_update [name="date_fin_prestation_spa"]').removeAttr("min");
        // reset le chosen
        $('#modal_update [name="id_client"]').next('.select2-container').find('.select2-selection__rendered').text('');
        // afficher le select: choisir un client
        $('#modal_update [name="id_client"]').parent('.form-group').show();
        $('#modal_update [name="id_client"]').attr("required", true);
        // masquer .infos_client
        $('#modal_update .infos_client').hide();
        $('#modal_update [name="nom_client"]').removeAttr("required");
        $('#modal_update [name="prenom_client"]').removeAttr("required");
        $('#modal_update [name="tel_client"]').removeAttr("required");
    }

    /* Affichage de la fenêtre modale modifier */
    $(document).on('click', '.update_button', function(){
        // Reset le formulaire de modification
        ResetFormUpdate();
        // Afficher le modal
        $('#modal_update').modal('show');
        $('#modal_update .loading').show();
        $('#modal_update .content').hide();

        // Insérer le id de la prestation dans le formulaire
        id_prestation_spa = $(this).data("id_prestation_spa");
        $('#modal_update [name="id_prestation_spa"]').val(id_prestation_spa);

        console.log({action<?php echo '_' . $menu ?>:'fetch_data_form_update', id_prestation_spa:id_prestation_spa});
        $.ajax({
            url: "<?php echo $url_action ?>",
            method: "POST",
            // action_prestation_spa = "fetch_data_form_update"
            data: {action<?php echo '_' . $menu ?>:'fetch_data_form_update', id_prestation_spa:id_prestation_spa},
            dataType: "json",
            success: function(response){
                console.log(response);
                // HandleResponseFetchDataFormUpdate est la fonction qui gère quoi faire en fonction de la réponse reçue
                HandleResponseFetchDataFormUpdate(response);
            }
        })
    })

    function HandleResponseFetchDataFormUpdate(response) {
        switch(response.status) {
            case "success":
                $('#modal_update .loading').hide();
                $('#modal_update .content').show();
                $('#modal_update [name="id_soins_spa"]').val(response.data.id_soins_spa_fk_prestation_spa);
                $('#modal_update [name="date_debut_prestation_spa"]').val(response.data.date_debut_prestation_spa);
                $('#modal_update [name="date_fin_prestation_spa"]').attr("min", response.data.date_debut_prestation_spa);
                $('#modal_update [name="date_fin_prestation_spa"]').val(response.data.date_fin_prestation_spa);
                $('#modal_update [name="id_client"]').val(response.data.id_client_fk_prestation_spa);
                client = $('#modal_update [name="id_client"] option[value="' + response.data.id_client_fk_prestation_spa + '"]').text();
                $('#modal_update [name="id_client"]').next('.select2-container').find('.select2-selection__rendered').text(client);
                $('#modal_update [name="montant_prestation_spa"]').val(response.data.montant_prestation_spa);
                $('#modal_update [name="note_prestation_spa"]').val(response.data.note_prestation_spa);
                break;
            case "invalid_form":
                // afficher les erreurs dans le formulaire
                ResetFormUpdate();
                break;
            case "failed":
                ResetFormUpdate();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_UPDATE_MESSAGE_ECHEC_FETCH ?>',
                'error');
                break;
            case "not_allowed":
                if (response.action == "all") {
                    // rediriger vers dashboard
                }
                if (response.action == "update") {
                    ResetFormUpdate();
                    $('#modal_update').modal('hide');
                    swal('<?php echo $ERREUR ?>',
                    '<?php echo $MODAL_UPDATE_MESSAGE_DROIT_DACCES ?>',
                    'error');
                }
                // else
                break;
            case "not_connected":
                // demander à l'utilisateur de se reconnecter
                // ou recharger la page
                ResetFormUpdate();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                ResetFormUpdate();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_UPDATE_MESSAGE_ECHEC_FETCH ?>',
                'error');
                break;
        }
    }


    /* Modifier */
    $(document).on('submit', '#modal_update form', function(event){
        event.preventDefault();
        var form_data = $(this).serializeArray();
        console.log(form_data);

        $.ajax({
            url: "<?php echo $url_action ?>",
            method: "POST",
            data: form_data,
            dataType: "json",
            success: function(response) {
                console.log(response);
                // HandleResponseUpdate est la fonction qui gère quoi faire en fonction de la réponse reçue
                HandleResponseUpdate(response);
                // Reload le datatable
                soins_spa_datatable.ajax.reload();
            }
        })
    })

    function HandleResponseUpdate(response) {
        switch(response.status) {
            case "success":
                ResetFormUpdate();
                $('#modal_update').modal('hide');
                swal('<?php  echo $EFFECTUE ?>',
                '<?php echo $MODAL_UPDATE_MESSAGE_SUCCES ?>',
                'success');
                break;
            case "doublon":
                ResetFormUpdate();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_UPDATE_MESSAGE_DOUBLON ?>',
                'error');
                break;
            case "invalid_form":
                //  afficher les erreurs dans le formulaire
                break;
            case "failed":
                ResetFormUpdate();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_UPDATE_MESSAGE_ECHEC ?>',
                'error');
                break;
            case "not_allowed":
                if (response.action == "all") {
                    //  rediriger vers dashboard
                }
                if (response.action == "update") {
                    ResetFormUpdate();
                    $('#modal_update').modal('hide');
                    swal('<?php echo $ERREUR ?>',
                    '<?php echo $MODAL_UPDATE_MESSAGE_DROIT_DACCES ?>',
                    'error');
                }
                 else
                break;
            case "not_connected":
                // demander à l'utilisateur de se reconnecter
                // ou recharger la page
                ResetFormUpdate();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                ResetFormUpdate();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_UPDATE_MESSAGE_ECHEC ?>',
                'error');
                break;
        }
    }

    // charger la liste des clients dynamiquement vu qu'on peut créer un nouveau client




    // // // SCRIPT MODAL VIEW
    /* Affichage de la fenêtre modale consulter */
    $(document).on('click', '.view_button', function(){
        // Afficher le modal
        $('#modal_view').modal('show');
        $('#modal_view .loading').show();
        $('#modal_view .details').empty();
        $('#modal_view .details').hide();

        console.log({action<?php echo '_' . $menu ?>:'view', id_prestation_spa:$(this).data("id_prestation_spa")});
        $.ajax({
            url: "<?php echo $url_action ?>",
            method: "POST",
            data: {action<?php echo '_' . $menu ?>:'view', id_prestation_spa:$(this).data("id_prestation_spa")},
            dataType: "json",
            success: function(response){
                console.log(response);
                HandleResponseView(response);
            }
        })
    });

    function HandleResponseView(response) {
        switch(response.status) {
            case "success":
                $('#modal_view .loading').hide();
                $('#modal_view .details').show();
                $('#modal_view .details').html(response.data);
                break;
            case "invalid_form":
                // afficher les erreurs dans le formulaire
                break;
            case "failed":
                $('#modal_view').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_VIEW_MESSAGE_ECHEC ?>',
                'error');
                break;
            case "not_allowed":
                // if (response.action == "all") {
                    // rediriger vers dashboard
                // }
                break;
            case "not_connected":
                // demander à l'utilisateur de se reconnecter
                // ou recharger la page
                $('#modal_view').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                $('#modal_view').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_VIEW_MESSAGE_ECHEC ?>',
                'error');
                break;
        }
    }




    // // // SCRIPT MODAL NEW FACTURE
    // Calculer Montant TTC
    function CalculerMontantTTC(){
        var valeur_tva = $('#modal_new_facture [name="valeur_tva_facture_spa"]').val();
        var montant_ht = $('#modal_new_facture [name="montant_ht_facture_spa"]').val();
        var montant_tva = 0;
        var montant_ttc = montant_ht;

        montant_tva = (montant_ht * valeur_tva / 100).toFixed(2);
        $('#montant_tva').val(montant_tva);
        montant_ttc = (Number(montant_ht) + Number(montant_tva)).toFixed(2);
        $('#modal_new_facture [name="montant_ttc_facture_spa"]').val(montant_ttc);
    }
    $(document).on('keyup', function(){CalculerMontantTTC();} );
    $('#modal_new_facture [name="valeur_tva_facture_spa"]').change( function(){CalculerMontantTTC();} );

    // Action select TVA
    $('#modal_new_facture [name="select_tva"]').change(function(){
        $('#modal_new_facture [name="valeur_tva_facture_spa"]').val("");
        if ($(this).prop("checked") == true){
            $(this).parent('.form-group').siblings().show(400);
            $('#modal_new_facture [name="valeur_tva_facture_spa"]').attr("required", true);
            CalculerMontantTTC();
        } else {
            $(this).parent('.form-group').siblings().hide(300);
            $('#modal_new_facture [name="valeur_tva_facture_spa"]').removeAttr("required");
            CalculerMontantTTC();
        }
    })
    
    // Cette fonction ramène le formulaire de modification à son état initial
    function ResetFormNewFacture() {
        // ATTENTION!!! Reset tous les champs du formulaire
        $('#modal_new_facture form')[0].reset();
        // retirer l'attribut min de date_fin_prestation_spa
        $('#modal_new_facture [name="date_facture_spa"]').removeAttr("min");
        // reset le TVA
        $('#modal_new_facture [name="select_tva"]').parent('.form-group').siblings().hide();
        $('#modal_new_facture [name="valeur_tva_facture_spa"]').removeAttr("required");
        CalculerMontantTTC();
    }

    /* Afficher la fenêtre modale "Editer la facture" */
    $(document).on('click', '.new_facture_button', function(){
        // Reset le formulaire "éditer la facture"
        ResetFormNewFacture();
        // Afficher le modal
        $('#modal_new_facture').modal('show');
        $('#modal_new_facture .loading').show();
        $('#modal_new_facture .content').hide();

        // Insérer le id de la prestation dans le formulaire
        id_prestation_spa = $(this).data("id_prestation_spa");
        $('#modal_new_facture [name="id_prestation_spa"]').val(id_prestation_spa);

        console.log({action<?php echo '_' . $menu ?>:'fetch_data_form_new_facture', id_prestation_spa:id_prestation_spa});
        $.ajax({
            url: "<?php echo $url_action ?>",
            method: "POST",
            // action_prestation_spa = "fetch_data_form_new_facture"
            data: {action<?php echo '_' . $menu ?>:'fetch_data_form_new_facture', id_prestation_spa:id_prestation_spa},
            dataType: "json",
            success: function(response){
                console.log(response);
                // HandleResponseFetchDataFormNewFacture est la fonction qui gère quoi faire en fonction de la réponse reçue
                HandleResponseFetchDataFormNewFacture(response);
            }
        })
    })

    function HandleResponseFetchDataFormNewFacture(response) {
        switch(response.status) {
            case "success":
                $('#modal_new_facture .loading').hide();
                $('#modal_new_facture .content').show();
                $('#modal_new_facture [name="date_facture_spa"]').attr("min", response.data.date_fin_prestation_spa);
                $('#modal_new_facture [name="montant_ht_facture_spa"]').val(response.data.montant_prestation_spa);
                CalculerMontantTTC();
                break;
            case "invalid_form":
                // afficher les erreurs dans le formulaire
                ResetFormNewFacture();
                break;
            case "failed":
                ResetFormNewFacture();
                $('#modal_new_facture').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_NEW_FACTURE_MESSAGE_ECHEC_FETCH ?>',
                'error');
                break;
            case "not_allowed":
                if (response.action == "all") {
                    // rediriger vers dashboard
                }
                if (response.action == "update") {
                    ResetFormNewFacture();
                    $('#modal_new_facture').modal('hide');
                    swal('<?php echo $ERREUR ?>',
                    '<?php echo $MODAL_NEW_FACTURE_MESSAGE_DROIT_DACCES ?>',
                    'error');
                }
                // else
                break;
            case "not_connected":
                // demander à l'utilisateur de se reconnecter
                // ou recharger la page
                ResetFormNewFacture();
                $('#modal_new_facture').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                ResetFormNewFacture();
                $('#modal_new_facture').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_NEW_FACTURE_MESSAGE_ECHEC_FETCH ?>',
                'error');
                break;
        }
    }


    /* Editer la facture */
    $(document).on('submit', '#modal_new_facture form', function(event){
        event.preventDefault();
        var form_data = $(this).serializeArray();
        console.log(form_data);

        $.ajax({
            url: "<?php echo $url_action ?>",
            method: "POST",
            data: form_data,
            dataType: "json",
            success: function(response) {
                console.log(response);
                // HandleResponseNewFacture est la fonction qui gère quoi faire en fonction de la réponse reçue
                HandleResponseNewFacture(response);
                // Reload le datatable
                soins_spa_datatable.ajax.reload();
            }
        })
    })

    function HandleResponseNewFacture(response) {
        switch(response.status) {
            case "success":
                ResetFormNewFacture();
                $('#modal_new_facture').modal('hide');
                swal('<?php  echo $EFFECTUE ?>',
                '<?php echo $MODAL_NEW_FACTURE_MESSAGE_SUCCES ?>',
                'success');
                break;
            case "doublon":
                ResetFormNewFacture();
                $('#modal_new_facture').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_NEW_FACTURE_MESSAGE_DOUBLON ?>',
                'error');
                break;
            case "invalid_form":
                //  afficher les erreurs dans le formulaire
                break;
            case "failed":
                ResetFormNewFacture();
                $('#modal_new_facture').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_NEW_FACTURE_MESSAGE_ECHEC ?>',
                'error');
                break;
            case "not_allowed":
                if (response.action == "all") {
                    //  rediriger vers dashboard
                }
                if (response.action == "update") {
                    ResetFormNewFacture();
                    $('#modal_new_facture').modal('hide');
                    swal('<?php echo $ERREUR ?>',
                    '<?php echo $MODAL_NEW_FACTURE_MESSAGE_DROIT_DACCES ?>',
                    'error');
                }
                 else
                break;
            case "not_connected":
                // demander à l'utilisateur de se reconnecter
                // ou recharger la page
                ResetFormNewFacture();
                $('#modal_new_facture').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                ResetFormNewFacture();
                $('#modal_new_facture').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_NEW_FACTURE_MESSAGE_ECHEC ?>',
                'error');
                break;
        }
    }




    </script>
</body>
</html>






