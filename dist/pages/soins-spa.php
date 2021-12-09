<?php
include_once('utils.php');

$menu = 'soins_spa'; // le nom du menu actuel
$url_fetch = 'soins-spa-fetch.php';
$url_action = 'soins-spa-action.php';

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
$soins_spa = 'active';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../parts/headmeta.php';?>
    <title><?php echo $TITRE; ?> - <?php echo $HOTEL ?></title>
    <?php include '../parts/headsuite.php';?>
    <?php include '../parts/headstyle.php';?>
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
                                        <form method="POST" action="../export/export-soins-spa.php" class="export">
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
                                                        <button name="export_soins_spa" type="submit" class="btn btn-primary" <?php echo ToolTip("left", ContenuToolTipAcces("super_admin, admin")) ?> ><?php echo $LABEL_BOUTON_EXPORTER ?></button>
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
                                                        <?php echo th($NOM) ?> 
                                                        <?php echo th($DESC) //Avec comme paramètre le nom de la constante définie dans le dictionnaire ?>
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
    <!-- AJOUTER - MODIFIER - CONSULTER -->

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
                            <label><?php echo $MODAL_LABEL_NOM ?> *</label>
                            <input type="text" name="nom_soins_spa" class="form-control" placeholder="<?php echo $MODAL_ADD_PLACEHOLDER_NOM ?>" required />
                        </div>

                        <div class="form-group">
                            <label><?php echo $MODAL_LABEL_DESC ?></label>
                            <textarea name="desc_soins_spa" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer bg-whitesmoke">
                        <!-- Cet input envoie le nom de l'action à éffectuer: add, update, delete, new_facture... -->
                        <!-- name="action_soins_spa" value="add" -->
                        <input type="hidden" name="action<?php echo '_' . $menu ?>" value="add" />
                        <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton">
                            <?php echo $MODAL_ADD_BOUTON ?>
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
                                <label><?php echo $MODAL_LABEL_NOM ?> *</label>
                                <input type="text" name="nom_soins_spa" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label><?php echo $MODAL_LABEL_DESC ?></label>
                                <textarea name="desc_soins_spa" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-whitesmoke">
                        <!-- Cet input envoie l'id du soin à modifier -->
                        <input type="hidden" name="id_soins_spa" value="" />
                        <!-- Cet input envoie le nom de l'action à éffectuer: add, update, delete, new_facture... -->
                        <!-- name="action_soins_spa" value="update" -->
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
                "targets":[2],
                "orderable":false,
            },
        ],
        //"bSort" : false,
        "pageLength": 10
    });

    
    // // // SCRIPT MODAL ADD
    /* Affichage de la fenêtre modale d'ajout */
    $('#add_button').click(function(){
        // ATTENTION!!! Reset tous les champs du formulaire
        $('#modal_add form')[0].reset();
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
                // HandleResponseAdd est la fonction qui gère quoi faire en fonction de la réponse reçu
                HandleResponseAdd(response);
                // Reload le datatable
                soins_spa_datatable.ajax.reload();
            }
        })
    })

    function HandleResponseAdd(response) {
        switch(response.status) {
            case "success":
                $('#modal_add form')[0].reset();
                $('#modal_add').modal('hide');
                swal('<?php echo $EFFECTUE ?>',
                '<?php echo $MODAL_ADD_MESSAGE_SUCCES ?>',
                'success');
                break;
            case "doublon":
                $('#modal_add form')[0].reset();
                $('#modal_add').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_ADD_MESSAGE_DOUBLON ?>',
                'error');
                break;
            case "invalid_form":
                // afficher les erreurs dans le formulaire
                break;
            case "failed":
                $('#modal_add form')[0].reset();
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
                    $('#modal_add form')[0].reset();
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
                $('#modal_add form')[0].reset();
                $('#modal_add').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                $('#modal_add form')[0].reset();
                $('#modal_add').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_ADD_MESSAGE_ECHEC ?>',
                'error');
                break;
        }
    }


    // // // SCRIPT MODAL UPDATE
    /* Affichage de la fenêtre modale modifier */
    $(document).on('click', '.update_button', function(){
        // ATTENTION!!! Reset tous les champs du formulaire
        $('#modal_update form')[0].reset();
        // Afficher le modal
        $('#modal_update').modal('show');
        $('#modal_update .loading').show();
        $('#modal_update .content').hide();

        // Insérer le id du soin dans le formulaire
        id_soins_spa = $(this).data("id_soins_spa");
        $('#modal_update [name="id_soins_spa"]').val(id_soins_spa);

        console.log({action<?php echo '_' . $menu ?>:'fetch_data_form_update', id_soins_spa:id_soins_spa});
        $.ajax({
            url: "<?php echo $url_action ?>",
            method: "POST",
            // action_soins_spa = "fetch_data_form_update"
            data: {action<?php echo '_' . $menu ?>:'fetch_data_form_update', id_soins_spa:id_soins_spa},
            dataType: "json",
            success: function(response){
                console.log(response);
                HandleResponseFetchDataFormUpdate(response);
            }
        })
    })

    function HandleResponseFetchDataFormUpdate(response) {
        switch(response.status) {
            case "success":
                $('#modal_update .loading').hide();
                $('#modal_update .content').show();
                $('#modal_update [name="nom_soins_spa"]').val(response.data.nom_soins_spa);
                $('#modal_update [name="desc_soins_spa"]').val(response.data.desc_soins_spa);
                break;
            case "invalid_form":
                // afficher les erreurs dans le formulaire
                $('#modal_update form')[0].reset();
                break;
            case "failed":
                $('#modal_update form')[0].reset();
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
                    $('#modal_update form')[0].reset();
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
                $('#modal_update form')[0].reset();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                $('#modal_update form')[0].reset();
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
                $('#modal_update form')[0].reset();
                $('#modal_update').modal('hide');
                swal('<?php  echo $EFFECTUE ?>',
                '<?php echo $MODAL_UPDATE_MESSAGE_SUCCES ?>',
                'success');
                break;
            case "doublon":
                $('#modal_update form')[0].reset();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_UPDATE_MESSAGE_DOUBLON ?>',
                'error');
                break;
            case "invalid_form":
                //  afficher les erreurs dans le formulaire
                break;
            case "failed":
                $('#modal_update form')[0].reset();
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
                    $('#modal_update form')[0].reset();
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
                $('#modal_update form')[0].reset();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_MESSAGE_SE_CONNECTER ?>',
                'error');
                break;
            default:
                $('#modal_update form')[0].reset();
                $('#modal_update').modal('hide');
                swal('<?php echo $ERREUR ?>',
                '<?php echo $MODAL_UPDATE_MESSAGE_ECHEC ?>',
                'error');
                break;
        }
    }

    

    // // // SCRIPT MODAL VIEW
    /* Affichage de la fenêtre modale consulter */
    $(document).on('click', '.view_button', function(){
        // Afficher le modal
        $('#modal_view').modal('show');
        $('#modal_view .loading').show();
        $('#modal_view .details').empty();
        $('#modal_view .details').hide();

        console.log({action<?php echo '_' . $menu ?>:'view', id_soins_spa:$(this).data("id_soins_spa")});
        $.ajax({
            url: "<?php echo $url_action ?>",
            method: "POST",
            data: {action<?php echo '_' . $menu ?>:'view', id_soins_spa:$(this).data("id_soins_spa")},
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











    function JsonToHtmlTable(json){
        // TO DO: handle th 
        table = '<table class="table table-boredered">';
        for (key in json) {
            table += '' +
            '<tr>' +
                '<td>' + key + '</td>' +
                '<td>' + json[key] + '</td>' +
            '</tr>';
        }
        table += '</table>';
        return table;
    }
      


    </script>

</body>
</html>






