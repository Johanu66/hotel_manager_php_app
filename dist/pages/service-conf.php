<?php
include('../database_connection.php');
include('../AddLogInclude.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_SERVICE_CONF_EN;
} else {
    $page_name = TITRE_SERVICE_CONF_FR;
}

$conference = 'active';
$service_conf = 'active';


if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à service_conf
if( isset($_SESSION['menu_service_conf']) && ($_SESSION['menu_service_conf'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}


// Log
switch ($_SESSION['type_compte']) {

    case 1:
        addlog("Cons-01-service-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-service-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-service-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-service-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-service-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
                    echo LISTE_SERVICE_CONF_EN;
                } else { 
                    echo LISTE_SERVICE_CONF_FR;
                }
                ?>
            </h2>
            <p class="section-lead">
            <?php 
                if ($_SESSION['lang'] == 'EN') { 
                    echo INTRO_SERVICE_CONF_EN;
                } else { 
                    echo INTRO_SERVICE_CONF_FR;
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
                                        echo BOUTON_NOUVEAU_SERVICE_CONF_EN;
                                    } else { 
                                        echo BOUTON_NOUVEAU_SERVICE_CONF_FR;
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
                    <form method="POST" action="../export/export-service-conf.php">
                        <div class="form-group" style="width:300px; float:right;">
                            <div class="input-group">
                                <select name="export_service_conf" class="custom-select" id="inputGroupSelect04">
                                    <option value="pdf"><?php echo $export_pdf ?></option>
                                    <option value="word"><?php echo $export_word ?></option>
                                    <option value="excel"><?php echo $export_excel ?></option>
                                </select>
                                <div class="input-group-append">
                                    <button name="btn_export_service_conf" class="btn btn-primary" type="submit"><?php echo $export ?></button>
                                </div>
                            </div>
                        </div>
                    </form>

                <?php
                    }
                ?>

                    <div class="table-responsive">
                        <table id="service_conf_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo NOM_SERVICE_CONF_EN;
                                        } else { 
                                            echo NOM_SERVICE_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DESC_SERVICE_CONF_EN;
                                        } else { 
                                            echo DESC_SERVICE_CONF_FR;
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
  <div id="service_confModal" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="service_conf_form">
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
                                            echo NOM_SERVICE_CONF_EN;
                                        } else { 
                                            echo NOM_SERVICE_CONF_FR;
                                        }
                                    ?> *</label>
                          <input type="text" name="nom_service_conf" id="nom_service_conf" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label><?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DESC_SERVICE_CONF_EN;
                                        } else { 
                                            echo DESC_SERVICE_CONF_FR;
                                        }
                                    ?></label>
                          <textarea type="text" name="desc_service_conf" id="desc_service_conf" class="form-control"></textarea>
                      </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_service_conf" id="id_service_conf"/>
                      <input type="hidden" name="btn_action" id="btn_action"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton" name="action" id="action"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- Modifier Modal -->
  <div id="service_confModal_modif" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="service_conf_form_modif">
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
                                            echo NOM_SERVICE_CONF_EN;
                                        } else { 
                                            echo NOM_SERVICE_CONF_FR;
                                        }
                                    ?> *</label>
                          <input type="text" name="nom_service_conf_modif" id="nom_service_conf_modif" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label><?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DESC_SERVICE_CONF_EN;
                                        } else { 
                                            echo DESC_SERVICE_CONF_FR;
                                        }
                                    ?></label>
                          <textarea type="text" name="desc_service_conf_modif" id="desc_service_conf_modif" class="form-control"></textarea>
                      </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_service_conf_modif" id="id_service_conf_modif"/>
                      <input type="hidden" name="btn_action_modif" id="btn_action_modif"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_modif" name="action_modif" id="action_modif"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>

  <!-- Consulter Modal -->
  <div id="service_confModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="service_conf_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="service_conf_details"></div>
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

      /* Affichage de la liste */
      var service_confdataTable = $('#service_conf_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"service-conf-fetch.php",// modifiable
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[2],// modifiable
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });

      /* Affichage de la fenêtre d'ajout*/

          $('#add_button').click(function(){
              $('#service_confModal').modal('show');
              $('#service_conf_form')[0].reset();
              $('.modal-title').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_AJOUT_SERVICE_CONF_EN;} else { echo TITRE_AJOUT_SERVICE_CONF_FR;}?>");
              $('.save-edit-bouton').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_ENREGISTRER_EN;} else { echo BOUTON_ENREGISTRER_FR;}?>");
              $('#btn_action').val('Enregistrer');
          });



      /* Enregistrer */

          $(document).on('submit','#service_conf_form', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"service-conf-action.php",//
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {    // text à modifier

                      if(data == "Ce service existe déjà dans la liste") {
                        $('#service_confModal').modal('hide');
                          $('#service_conf_form')[0].reset();
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_SERVICE_CONF_EN;} else { echo MESSAGE_DOUBLON_SERVICE_CONF_FR;}?>',
                           'error');
                      }


                      if(data == "Le service a été enregistré avec succès.") {
                          $('#service_confModal').modal('hide');
                          $('#service_conf_form')[0].reset();

                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_CREATION_SERVICE_CONF_EN;} else { echo MESSAGE_SUCCES_CREATION_SERVICE_CONF_FR;}?>',
                          'success');
                      }

                      service_confdataTable.ajax.reload();

                  }
              })
          });

          /* Consulter */
      /*  envoie l'id de la chambre et la valeur de consulter a chambre_action.php
      qui à son tour  va afficher tous les détails */
      $(document).on('click', '.view', function(){
          var id_service_conf_view = $(this).attr("id");
          var btn_action_view = 'consulter';
          $.ajax({
              url:"service-conf-action.php",
              method:"POST",
              data:{id_service_conf_view:id_service_conf_view, btn_action_view:btn_action_view},
              dataType:"json",
              success:function(data)
              {
                  $('#service_confModal_view').modal('show'); // affiche le modal
                  $('.modal-title_view').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CONSULTER_SERVICE_CONF_EN; } else { echo TITRE_CONSULTER_SERVICE_CONF_FR; } ?>");
                  $('#service_conf_details').html(data); 

              }
          })
      });


      /* fetch single, etat avant la modification */
          $(document).on('click', '.update', function(){
              var id_service_conf_modif = $(this).attr("id");
              var btn_action_modif = 'fetch_single';
              $.ajax({
                  url:"service-conf-action.php",
                  method:"POST",
                  data:{id_service_conf_modif:id_service_conf_modif, btn_action_modif:btn_action_modif},
                  dataType:"json",
                  success:function(data)
                  {
                      $('#service_confModal_modif').modal('show');
                      $('#nom_service_conf_modif').val(data.nom_service_conf);
                      $('#desc_service_conf_modif').val(data.desc_service_conf);
                      $('.modal-title_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_MODIFIER_SERVICE_CONF_EN; } else { echo TITRE_MODIFIER_SERVICE_CONF_FR;} ?>");
                      $('.save-edit-bouton_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_MODIFIER_EN;} else { echo BOUTON_MODIFIER_FR;}?>");
                      $('#id_service_conf_modif').val(id_service_conf_modif);
                      $('#btn_action_modif').val("Modifier");

                  }
              })
          });


      /* Modifier Submit */

          $(document).on('submit','#service_conf_form_modif', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"service-conf-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {
                      if(data == "Ce service existe déjà dans la liste") {
                          $('#service_confModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_SERVICE_CONF_EN;} else { echo MESSAGE_DOUBLON_SERVICE_CONF_FR;}?>',
                           'error');
                      }


                      if(data == "Le service a été modifié avec succès.") {
                          $('#service_confModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_MODIF_SERVICE_CONF_EN;} else { echo MESSAGE_SUCCES_MODIF_SERVICE_CONF_FR;}?>',
                          'success');
                      }


                      $('#service_conf_form_modif')[0].reset();
                      service_confdataTable.ajax.reload();

                  }
              })
          });


      /* Changer statut */
      $(document).on('click', '.delete', function(){
          var id_service_conf = $(this).attr('id');
          var status = $(this).data("status");
          var btn_action = 'delete';

          swal({
              title: '<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_SUPPRIMER_EN;} else { echo TITRE_SUPPRIMER_FR;}?>',
              text: '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUPPRIMER_SERVICE_CONF_EN;} else { echo MESSAGE_SUPPRIMER_SERVICE_CONF_FR;}?>',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                      url:"service-conf-action.php",
                      method:"POST",
                      data:{id_service_conf:id_service_conf, status:status, btn_action:btn_action},
                      dataType: "JSON",
                      success:function(data)
                      {
                        if(data == "Actif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_SERVICE_CONF_EN . STATUT_ACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_SERVICE_CONF_FR . STATUT_ACTIF_FR; } ?>', 'success');
                        }
                        if(data == "Inactif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_SERVICE_CONF_EN . STATUT_INACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_SERVICE_CONF_FR . STATUT_INACTIF_FR; } ?>', 'success');
                        }
                          service_confdataTable.ajax.reload();
                      }
                  });

              } else {
              }
          });

      });


  </script>

</body>
</html>