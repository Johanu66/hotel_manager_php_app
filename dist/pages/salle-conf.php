<?php
include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_list.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_SALLE_CONF_EN;
} else {
    $page_name = TITRE_SALLE_CONF_FR;
}

$conference = 'active';
$salle_conf = 'active';


if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à salle_conf
if( isset($_SESSION['menu_salle_conf']) && ($_SESSION['menu_salle_conf'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}


// Log
switch ($_SESSION['type_compte']) {

    case 1:
        addlog("Cons-01-salle-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-salle-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-salle-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-salle-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-salle-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

  <?php include '../parts/headmeta.php';?>

  <title><?php echo $page_name; ?> - Hôtel</title>

  <?php include '../parts/headsuite.php';?>

  <?php include '../parts/headstyle.php';?>

</head>


<body style="background-color: #f1f1f1;">
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      <?php include '../parts/navbar.php';?>

      <?php include '../parts/sidebar.php';?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $page_name; ?></h1>
            <div class="section-header-breadcrumb">

              <?php include '../parts/breadcrumb-dashboard.php';?>

              <div class="breadcrumb-item"><?php echo $page_name; ?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">
                <?php 
                if ($_SESSION['lang'] == 'EN') { 
                    echo LISTE_SALLE_CONF_EN;
                } else { 
                    echo LISTE_SALLE_CONF_FR;
                }
                ?>
            </h2>
            <p class="section-lead">
            <?php 
                if ($_SESSION['lang'] == 'EN') { 
                    echo INTRO_SALLE_CONF_EN;
                } else { 
                    echo INTRO_SALLE_CONF_FR;
                }
                ?>
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">

                    <?php include '../parts/titre-tableau.php';?>

                    <div class="card-header-action">

                      <form method="POST">
                          <button type="button" name="add" id="add_button" class="btn btn-warning">
                                <?php 
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo BOUTON_NOUVELLE_SALLE_CONF_EN;
                                    } else { 
                                        echo BOUTON_NOUVELLE_SALLE_CONF_FR;
                                    }
                                ?>
                                </button>
                      </form>

                    </div>
                  </div>

                  <div class="card-body">

                  <?php 
                    if(($_SESSION['type_compte'] == 1) || ($_SESSION['type_compte'] == 2)) {
                        if($_SESSION['lang'] == 'EN') {
                            $export_pdf = EXPORT_PDF_EN;
                            $export_word = EXPORT_WORD_EN;
                            $export_excel = EXPORT_EXCEL_EN;
                            $export = BOUTON_EXPORTER_EN;
                        } else {
                            $export_pdf = EXPORT_PDF_FR;
                            $export_word = EXPORT_WORD_FR;
                            $export_excel = EXPORT_EXCEL_FR;
                            $export = BOUTON_EXPORTER_FR;
                        }
                  ?>
                    <form method="POST" action="../export/export-salle-conf.php">
                        <div class="form-group" style="width:300px; float:right;">
                            <div class="input-group">
                                <select name="export_salle_conf" class="custom-select" id="inputGroupSelect04">
                                    <option value="pdf"><?php echo $export_pdf ?></option>
                                    <option value="word"><?php echo $export_word ?></option>
                                    <option value="excel"><?php echo $export_excel ?></option>
                                </select>
                                <div class="input-group-append">
                                    <button name="btn_export_salle_conf" class="btn btn-primary" type="submit"><?php echo $export ?></button>
                                </div>
                            </div>
                        </div>
                    </form>

                <?php
                    }
                ?>

                    <div class="table-responsive">

                        <table id="salle_conf_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo NOM_SALLE_CONF_EN;
                                        } else { 
                                            echo NOM_SALLE_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DESC_SALLE_CONF_EN;
                                        } else { 
                                            echo DESC_SALLE_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo CAPACITE_SALLE_CONF_EN;
                                        } else { 
                                            echo CAPACITE_SALLE_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important; text-align: center !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo ACTIONS_EN;
                                        } else { 
                                            echo ACTIONS_FR;
                                        }
                                    ?>
                                    </th>
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

  <!-- Ajouter Modal -->
    <div id="salle_confModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="salle_conf_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body"> <!-- Modal à modifier-->
                        <div class="form-group">
                            <label><?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo NOM_SALLE_CONF_EN;
                                    } else { 
                                        echo NOM_SALLE_CONF_FR;
                                    }
                                    ?> *</label>
                            <input type="text" name="nom_salle_conf" id="nom_salle_conf" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label><?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo DESC_SALLE_CONF_EN;
                                    } else { 
                                        echo DESC_SALLE_CONF_FR;
                                    }
                                    ?></label>
                            <textarea name="desc_salle_conf" id="desc_salle_conf" class="form-control"></textarea>
                        </div>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="form-group carac_salle_conf" id="carac_salle_conf">
                            <label>
                                <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo CARAC_SALLE_CONF_EN;
                                    } else { 
                                        echo CARAC_SALLE_CONF_FR;
                                    }
                                ?>
                            </label>
                            <div class="input-group select_block" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">
                                <select class="custom-select" name="id_carac_conf[]" style="width:95%;">
                                    <option value="" selected><?php  
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo CHOISIR_CARAC_SALLE_CONF_EN;
                                        } else { 
                                            echo CHOISIR_CARAC_SALLE_CONF_FR;
                                        }
                                        ?></option>
                                    <?php echo fill_carac_salle_list($connect);?>
                                </select>

                                <div class="input-group-append ">
                                    <button class="btn btn-primary btn_more select_block_button" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;">+</button>
                                </div>
                            </div>
                        </div>
<!------------------------------------------------------------------------------------------------------------>
                        <div class="form-group">
                            <label><?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo CAPACITE_SALLE_CONF_EN;
                                    } else { 
                                        echo CAPACITE_SALLE_CONF_FR;
                                    }
                                ?></label>
                            <input type="text" name="capacite_salle_conf" id="capacite_salle_conf" class="form-control" />
                        </div>

                    </div>

                    <div class="modal-footer bg-whitesmoke">
                        <input type="hidden" name="id_salle_conf" id="id_salle_conf"/>
                        <input type="hidden" name="btn_action" id="btn_action"/>
                        <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton" name="action" id="action"></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


  <!-- Modifier Modal -->
  <div id="salle_confModal_modif" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="salle_conf_form_modif">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_modif"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">

                      <div class="form-group">
                          <label><?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo NOM_SALLE_CONF_EN;
                                        } else { 
                                            echo NOM_SALLE_CONF_FR;
                                        }
                                    ?> *</label>
                          <input type="text" name="nom_salle_conf_modif" id="nom_salle_conf_modif" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label><?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DESC_SALLE_CONF_EN;
                                        } else { 
                                            echo DESC_SALLE_CONF_FR;
                                        }
                                    ?></label>
                          <textarea name="desc_salle_conf_modif" id="desc_salle_conf_modif" class="form-control"></textarea>
                      </div>

                      <div class="form-group carac_salle_conf" id="carac_salle_conf_modif">
                                <label><?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo CARAC_SALLE_CONF_EN;
                                        } else { 
                                            echo CARAC_SALLE_CONF_FR;
                                        }
                                        ?></label>
                                <div class="input-group select_block" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">
                                    <select class="custom-select" name="id_carac_conf_modif[]" style="width:95%;">
                                        <option value="" selected><?php  
                                            if ($_SESSION['lang'] == 'EN') { 
                                                echo CHOISIR_CARAC_SALLE_CONF_EN;
                                            } else { 
                                                echo CHOISIR_CARAC_SALLE_CONF_FR;
                                            }
                                            ?></option>
                                        <?php echo fill_carac_salle_list($connect);?>
                                    </select>

                                    <div class="input-group-append ">
                                        <button class="btn btn-primary btn_more select_block_button" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;">+</button>
                                    </div>
                                </div>
                        </div>

                        <div class="form-group">
                            <label>
                                <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo CAPACITE_SALLE_CONF_EN;
                                    } else { 
                                        echo CAPACITE_SALLE_CONF_FR;
                                    }
                                ?>
                            </label>
                          <input type="text" name="capacite_salle_conf_modif" id="capacite_salle_conf_modif" class="form-control" />
                      </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_salle_conf_modif" id="id_salle_conf_modif"/>
                      <input type="hidden" name="btn_action_modif" id="btn_action_modif"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_modif" name="action_modif" id="action_modif"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>

  <!-- Consulter Modal -->
  <div id="salle_confModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="salle_conf_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="salle_conf_details"></div>
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

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/modules-datatables.js"></script>
  
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>


  <script type="text/javascript">


    var selected_carac_salle_conf = [];
    var selected_carac_salle_conf_modif = [];

    function updateSelectedCaracSalleConf() {
        selected_carac_salle_conf = [];
        let select = $('select[name="id_carac_conf[]"]');

        select.each(function(){
            selected_carac_salle_conf.push($(this).val());
        })
    }
    function updateSelectedCaracSalleConfModif() {
        selected_carac_salle_conf_modif = [];
        let select = $('select[name="id_carac_conf_modif[]"]');

        select.each(function(){
            selected_carac_salle_conf_modif.push($(this).val());
        })
    }


    function moreSelectBlock(btn_more){
        let select_block = btn_more.parents('.select_block');
        select_block.find('select').attr('disabled', true);
        select_block.after(newSelectBlock());
        select_block.find('.select_block_button').hide();
    }

    function lessSelectBlock(btn_less){
        let select_block = btn_less.parents('.select_block');
        select_block.prev('.select_block').find('select').attr('disabled', false);
        select_block.prev('.select_block').find('.select_block_button').show();
        select_block.remove();
    }

    function moreSelectBlockModif(btn_more){
        let select_block = btn_more.parents('.select_block');
        select_block.find('select').attr('disabled', true);
        select_block.after(newSelectBlockModif());
        select_block.find('.select_block_button').hide();
    }

    function lessSelectBlockModif(btn_less){
        let select_block = btn_less.parents('.select_block');
        select_block.prev('.select_block').find('select').attr('disabled', false);
        select_block.prev('.select_block').find('.select_block_button').show();
        select_block.remove();
    }

    function removeAllButFirstSelectBlock() {
        // let list_of_select_block = document.getElementsByClassName('select_block');
        let list_of_select_block = document.getElementById('carac_salle_conf').querySelectorAll('.select_block');
        let len = list_of_select_block.length;
        for (let i = len-1; i >= 0; i--) {
            if (i != 0) {
                let elem = $(list_of_select_block[i]);
                // console.log(elem);
                lessSelectBlock(elem.find('select'));
            }
        }
    }

    function removeAllButFirstSelectBlockModif() {
        // let list_of_select_block = document.getElementsByClassName('select_block');
        let list_of_select_block = document.getElementById('carac_salle_conf_modif').querySelectorAll('.select_block');
        let len = list_of_select_block.length;
        for (let i = len-1; i >= 0; i--) {
            if (i != 0) {
                let elem = $(list_of_select_block[i]);
                lessSelectBlock(elem.find('select'));
            }
        }
    }

    function notSelected(json_obj) {
        let not_selected = [];
        for (const i in json_obj) {
            let carac_conf = json_obj[i];
            let id_carac_conf = carac_conf[0];
            let selected = false;
            for (const j in selected_carac_salle_conf) {
                if (id_carac_conf == selected_carac_salle_conf[j]) {
                    selected = true;
                    break;
                }
            }
            if (!selected) {
                not_selected.push(carac_conf);
            }
        }
        return not_selected;
    }

    function notSelectedModif(json_obj) {
        let not_selected = [];
        for (const i in json_obj) {
            let carac_conf = json_obj[i];
            let id_carac_conf = carac_conf[0];
            let selected = false;
            for (const j in selected_carac_salle_conf_modif) {
                if (id_carac_conf == selected_carac_salle_conf_modif[j]) {
                    selected = true;
                    break;
                }
            }
            if (!selected) {
                not_selected.push(carac_conf);
            }
        }
        return not_selected;
    }

    function formatOptions(json_obj) {
        let output = '';
        for (const i in json_obj) {
            let id_carac_conf = json_obj[i][0];
            let nom_carac_conf = json_obj[i][1];
            output += '<option value="' + id_carac_conf + '">' + nom_carac_conf + '</option>';
        }
        return output;
    }

    function newSelectBlock() {
        // get_carac_salle_list
        let select_block = $('<div></div>');
        select_block.addClass('select_block');
        let content =  '' +
            '<div class="input-group" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
                '<select class="custom-select" name="id_carac_conf[]" style="width:95%;">' +
                    '<option value="" selected><?php  
                            if ($_SESSION['lang'] == 'EN') { 
                                echo CHOISIR_CARAC_SALLE_CONF_EN;
                            } else { 
                                echo CHOISIR_CARAC_SALLE_CONF_FR;
                            }
                        ?></option>' +
                    '<?php //echo fill_carac_salle_list($connect);?>' +
                '</select>' +
                '<div class="input-group-append">' +
                    '<button class="btn btn-primary select_block_button btn_less" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;">-</button>' +
                '</div>' +
            '</div>' +
            '' +
            '<div class="input-group select_block_button" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
                '<div></div>' +
                '<div class="input-group-append">' +
                    '<button class="btn btn-primary btn_more" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;height:40px;">+</button>' +
                '</div>' +
            '</div>';

        select_block.html(content);
        select_block.find('.btn_more').click(function(){
            updateSelectedCaracSalleConf();
            if (select_block.find('select').val() != "") {
                moreSelectBlock($(this));
            }
        });
        select_block.find('select').on('change', function(){
            updateSelectedCaracSalleConf();
            if (select_block.find('select').val() != "") {
                moreSelectBlock($(this));
            }
        })
        select_block.find('.btn_less').click(function(){
            updateSelectedCaracSalleConf();
            lessSelectBlock($(this));
        });
        // select_block.hide();

        $.ajax({
            url:"salle-conf-action.php",
            method:"POST",
            data: {action:"get_carac_salle_list"},
            dataType:"json",
            success:function(data){
                select_block.find('select').append(formatOptions(notSelected(data)));
                if (select_block.find('option').length == 1) {
                    lessSelectBlock(select_block.find('.btn_more'));
                } //else {
                //     select_block.show();
                // }
            }
        });
        
        return select_block;
    }

    function newSelectBlockModif() {
        // get_carac_salle_list
        let select_block = $('<div></div>');
        select_block.addClass('select_block');
        let content =  '' +
            '<div class="input-group" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
                '<select class="custom-select" name="id_carac_conf_modif[]" style="width:95%;">' +
                    '<option value="" selected><?php  
                            if ($_SESSION['lang'] == 'EN') { 
                                echo CHOISIR_CARAC_SALLE_CONF_EN;
                            } else { 
                                echo CHOISIR_CARAC_SALLE_CONF_FR;
                            }
                        ?></option>' +
                    '<?php //echo fill_carac_salle_list($connect);?>' +
                '</select>' +
                '<div class="input-group-append">' +
                    '<button class="btn btn-primary select_block_button btn_less" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;">-</button>' +
                '</div>' +
            '</div>' +
            '' +
            '<div class="input-group select_block_button" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
                '<div></div>' +
                '<div class="input-group-append">' +
                    '<button class="btn btn-primary btn_more" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;height:40px;">+</button>' +
                '</div>' +
            '</div>';

        select_block.html(content);
        select_block.find('.btn_more').click(function(){
            updateSelectedCaracSalleConfModif();
            if (select_block.find('select').val() != "") {
                moreSelectBlockModif($(this));
            }
        });
        select_block.find('select').on('change', function(){
            updateSelectedCaracSalleConfModif();
            if (select_block.find('select').val() != "") {
                moreSelectBlockModif($(this));
            }
        })
        select_block.find('.btn_less').click(function(){
            updateSelectedCaracSalleConfModif();
            lessSelectBlockModif($(this));
        });
        // select_block.hide();

        $.ajax({
            url:"salle-conf-action.php",
            method:"POST",
            data: {action:"get_carac_salle_list"},
            dataType:"json",
            success:function(data){
                select_block.find('select').append(formatOptions(notSelectedModif(data)));
                if (select_block.find('option').length == 1) {
                    lessSelectBlockModif(select_block.find('.btn_more'));
                } //else {
                //     select_block.show();
                // }
            }
        });
        
        return select_block;
    }


    $('#carac_salle_conf .select_block .btn_more').click(function(){
        updateSelectedCaracSalleConf();
        let select_block = $(this).parents('.select_block');
        if (select_block.find('select').val() != "") {
            moreSelectBlock($(this));
        }
    })

    $('#carac_salle_conf .select_block select').on('change', function(){
        updateSelectedCaracSalleConf();
        let select_block = $(this).parents('.select_block');
        if (select_block.find('select').val() != "") {
            moreSelectBlock($(this));
        }
    })
    
    $('#carac_salle_conf_modif .select_block .btn_more').click(function(){
        updateSelectedCaracSalleConfModif();
        let select_block = $(this).parents('.select_block');
        if (select_block.find('select').val() != "") {
            moreSelectBlockModif($(this));
        }
    })

    $('#carac_salle_conf_modif .select_block select').on('change', function(){
        updateSelectedCaracSalleConfModif();
        let select_block = $(this).parents('.select_block');
        if (select_block.find('select').val() != "") {
            moreSelectBlockModif($(this));
        }
    })


      /* Affichage de la liste */
      var salle_confdataTable = $('#salle_conf_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"salle-conf-fetch.php",// modifiable
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[3],// modifiable
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });

      /* Affichage de la fenêtre d'ajout*/
          $('#add_button').click(function(){
              $('#salle_confModal').modal('show');
              $('#salle_conf_form')[0].reset();
              removeAllButFirstSelectBlock();
              $('.modal-title').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_AJOUT_SALLE_CONF_EN;} else { echo TITRE_AJOUT_SALLE_CONF_FR;}?>");
              $('.save-edit-bouton').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_ENREGISTRER_EN;} else { echo BOUTON_ENREGISTRER_FR;}?>");
              $('#btn_action').val('Enregistrer');
          });



      /* Enregistrer */
          $(document).on('submit','#salle_conf_form', function(event){
              event.preventDefault();
              // disabled_select
              $('#carac_salle_conf .select_block select').attr('disabled', false);
              var form_data = $(this).serialize();
              $.ajax({
                  url:"salle-conf-action.php",//
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {    // text à modifier

                      if(data == "Cette salle de conference existe déjà dans la liste.") {
                        $('#salle_confModal').modal('hide');
                        $('#salle_conf_form')[0].reset();
                        removeAllButFirstSelectBlock();

                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_SALLE_CONF_EN;} else { echo MESSAGE_DOUBLON_SALLE_CONF_FR;}?>',
                           'error');
                      }


                      if(data == "La salle de conférence a été enregistrée avec succès.") {
                          $('#salle_confModal').modal('hide');
                          $('#salle_conf_form')[0].reset();
                          removeAllButFirstSelectBlock();

                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_CREATION_SALLE_CONF_EN;} else { echo MESSAGE_SUCCES_CREATION_SALLE_CONF_FR;}?>',
                          'success');
                      }

                      salle_confdataTable.ajax.reload();

                  }
              })
          });

      /* Consulter */
      /*  envoie l'id de la chambre et la valeur de consulter a chambre_action.php
      qui à son tour  va afficher tous les détails */
      $(document).on('click', '.view', function(){
          var id_salle_conf_view = $(this).attr("id");
          var btn_action_view = 'consulter';
          $.ajax({
              url:"salle-conf-action.php",
              method:"POST",
              data:{id_salle_conf_view:id_salle_conf_view, btn_action_view:btn_action_view},
              dataType:"json",
              success:function(data)
              {
                  $('#salle_confModal_view').modal('show'); // affiche le modal
                  $('.modal-title_view').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CONSULTER_SALLE_CONF_EN; } else { echo TITRE_CONSULTER_SALLE_CONF_FR; } ?>");
                  $('#salle_conf_details').html(data);

              }
          })
      });


      /* fetch single, etat avant la modification */
          $(document).on('click', '.update', function(){
              var id_salle_conf_modif = $(this).attr("id");
              var btn_action_modif = 'fetch_single';
              $.ajax({
                  url:"salle-conf-action.php",
                  method:"POST",
                  data:{id_salle_conf_modif:id_salle_conf_modif, btn_action_modif:btn_action_modif},
                  dataType:"json",
                  success:function(data)
                  {
                      removeAllButFirstSelectBlockModif();
                      $('#salle_confModal_modif').modal('show');
                      $('#salle_conf_form_modif')[0].reset();
                      $('#nom_salle_conf_modif').val(data.nom_salle_conf);
                      $('#desc_salle_conf_modif').val(data.desc_salle_conf);
                      $('#capacite_salle_conf_modif').val(data.capacite_salle_conf);
                      console.log(data);
                      $('.modal-title_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_MODIFIER_SALLE_CONF_EN; } else { echo TITRE_MODIFIER_SALLE_CONF_FR;} ?>");
                      $('.save-edit-bouton_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_MODIFIER_EN;} else { echo BOUTON_MODIFIER_FR;}?>");
                      $('#id_salle_conf_modif').val(id_salle_conf_modif);
                      $('#btn_action_modif').val("Modifier");

                  }
              })
          });


      /* Modifier Submit */

          $(document).on('submit','#salle_conf_form_modif', function(event){
              event.preventDefault();
              $('#carac_salle_conf_modif .select_block select').attr('disabled', false);
              var form_data = $(this).serialize();
              $.ajax({
                  url:"salle-conf-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {
                      if(data == "Cette salle de conference existe déjà dans la liste.") {
                          $('#salle_confModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_SALLE_CONF_EN;} else { echo MESSAGE_DOUBLON_SALLE_CONF_FR;}?>',
                           'error');
                      }


                      if(data == "La salle de conférence a été modifiée avec succès.") {
                          $('#salle_confModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_MODIF_SALLE_CONF_EN;} else { echo MESSAGE_SUCCES_MODIF_SALLE_CONF_FR;}?>',
                          'success');
                      }


                      removeAllButFirstSelectBlockModif();
                      $('#salle_conf_form_modif')[0].reset();
                      salle_confdataTable.ajax.reload();

                  }
              })
          });


      /* Changer statut */
      $(document).on('click', '.delete', function(){
          var id_salle_conf = $(this).attr('id');
          var status = $(this).data("status");
          var btn_action = 'delete';

          swal({
              title: '<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_SUPPRIMER_EN;} else { echo TITRE_SUPPRIMER_FR;}?>',
              text: '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUPPRIMER_SALLE_CONF_EN;} else { echo MESSAGE_SUPPRIMER_SALLE_CONF_FR;}?>',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                      url:"salle-conf-action.php",
                      method:"POST",
                      data:{id_salle_conf:id_salle_conf, status:status, btn_action:btn_action},
                      dataType: "JSON",
                      success:function(data)
                      {
                        if(data == "Actif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_SALLE_CONF_EN . STATUT_ACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_SALLE_CONF_FR . STATUT_ACTIF_FR; } ?>', 'success');
                        }
                        if(data == "Inactif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_SALLE_CONF_EN . STATUT_INACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_SALLE_CONF_FR . STATUT_INACTIF_FR; } ?>', 'success');
                        }
                          salle_confdataTable.ajax.reload();
                      }
                  });

              } else {
              }
          });

      });


  </script>

</body>
</html>