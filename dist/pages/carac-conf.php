<?php
include('../database_connection.php');
include('../AddLogInclude.php');

if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à carac_conf
if( isset($_SESSION['menu_carac_conf']) && ($_SESSION['menu_carac_conf'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}

// Log
switch ($_SESSION['type_compte']) {
case 1:
    addlog("Cons-01-carac-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
    break;
case 2:
    addlog("Cons-02-carac-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
    break;
case 3:
    addlog("Cons-03-carac-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
    break;
case 4:
    addlog("Cons-04-carac-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
    break;
case 5:
    addlog("Cons-05-carac-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
    break;
}

$conference = 'active';
$carac_conf = 'active';

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_CARAC_CONF_EN;
    $page_title = LISTE_CARAC_CONF_EN;
    $page_intro = INTRO_CARAC_CONF_EN;
    $bouton_new = BOUTON_NOUVELLE_CARAC_CONF_EN;

    $export_pdf = EXPORT_PDF_EN;
    $export_word = EXPORT_WORD_EN;
    $export_excel = EXPORT_EXCEL_EN;
    $export = BOUTON_EXPORTER_EN;

    $nom_carac_conf = NOM_CARAC_CONF_EN;
    $desc_carac_conf = DESC_CARAC_CONF_EN;
    $actions = ACTIONS_EN;

    $titre_ajout = TITRE_AJOUT_CARAC_CONF_EN;
    $bouton_enregistrer = BOUTON_ENREGISTRER_EN;
    $titre_consulter = TITRE_CONSULTER_CARAC_CONF_EN;

    $effectue = EFFECTUE_EN;
    $erreur = ERREUR_EN;
    $doublon = MESSAGE_DOUBLON_CARAC_CONF_EN;
    $succes_creation = MESSAGE_SUCCES_CREATION_CARAC_CONF_EN;
    
} else {
    $page_name = TITRE_CARAC_CONF_FR;
    $page_title = LISTE_CARAC_CONF_FR;
    $page_intro = INTRO_CARAC_CONF_FR;
    $bouton_new = BOUTON_NOUVELLE_CARAC_CONF_FR;

    $export_pdf = EXPORT_PDF_FR;
    $export_word = EXPORT_WORD_FR;
    $export_excel = EXPORT_EXCEL_FR;
    $export = BOUTON_EXPORTER_FR;

    $nom_carac_conf = NOM_CARAC_CONF_FR;
    $desc_carac_conf = DESC_CARAC_CONF_FR;
    $actions = ACTIONS_FR;

    $titre_ajout = TITRE_AJOUT_CARAC_CONF_FR;
    $bouton_enregistrer = BOUTON_ENREGISTRER_FR;
    $titre_consulter = TITRE_CONSULTER_CARAC_CONF_FR;

    $effectue = EFFECTUE_FR;
    $erreur = ERREUR_FR;
    $doublon = MESSAGE_DOUBLON_CARAC_CONF_FR;
    $succes_creation = MESSAGE_SUCCES_CREATION_CARAC_CONF_FR;
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
                <?php echo $page_title; ?>
            </h2>
            <p class="section-lead">
                <?php echo $page_intro; ?>
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <?php include '../parts/titre-tableau.php';?>
                    <div class="card-header-action">

                      <form method="POST">
                          <button type="button" name="add" id="add_button" class="btn btn-warning">
                              <?php echo $bouton_new; ?>
                          </button>
                      </form>
                    </div>
                  </div>

                  <div class="card-body">
                  <?php 
                    if(($_SESSION['type_compte'] == 1) || ($_SESSION['type_compte'] == 2)) {
                  ?>
                    <form method="POST" action="../export/export-carac-conf.php">
                        <div class="form-group" style="width:300px; float:right;">
                            <div class="input-group">
                                <select name="export_carac_conf" class="custom-select" id="inputGroupSelect04">
                                    <option value="pdf"><?php echo $export_pdf ?></option>
                                    <option value="word"><?php echo $export_word ?></option>
                                    <option value="excel"><?php echo $export_excel ?></option>
                                </select>
                                <div class="input-group-append">
                                    <button name="btn_export_carac_conf" class="btn btn-primary" type="submit"><?php echo $export ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                    }
                ?>

                    <div class="table-responsive">
                        <table id="carac_conf_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                        <?php echo $nom_carac_conf; ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                        <?php echo $desc_carac_conf; ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important; text-align: center !important;">
                                        <?php echo $actions; ?>
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
  <div id="carac_confModal" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="carac_conf_form">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div class="form-group">
                          <label><?php echo $nom_carac_conf; ?> *</label>
                          <input type="text" name="nom_carac_conf" id="nom_carac_conf" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label><?php echo $desc_carac_conf; ?></label>
                          <textarea type="text" name="desc_carac_conf" id="desc_carac_conf" class="form-control"></textarea>
                      </div>
                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_carac_conf" id="id_carac_conf"/>
                      <input type="hidden" name="btn_action" id="btn_action"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton" name="action" id="action"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- Modifier Modal -->
  <div id="carac_confModal_modif" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="carac_conf_form_modif">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_modif"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div class="form-group">
                          <label><?php echo $nom_carac_conf; ?> *</label>
                          <input type="text" name="nom_carac_conf_modif" id="nom_carac_conf_modif" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label><?php echo $desc_carac_conf; ?></label>
                          <textarea type="text" name="desc_carac_conf_modif" id="desc_carac_conf_modif" class="form-control"></textarea>
                      </div>
                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_carac_conf_modif" id="id_carac_conf_modif"/>
                      <input type="hidden" name="btn_action_modif" id="btn_action_modif"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_modif" name="action_modif" id="action_modif"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- Consulter Modal -->
  <div id="carac_confModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="carac_conf_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="carac_conf_details"></div>
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
      var carac_confdataTable = $('#carac_conf_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"carac-conf-fetch.php",
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
              $('#carac_confModal').modal('show');
              $('#carac_conf_form')[0].reset();
              $('.modal-title').text("<?php echo $titre_ajout; ?>");
              $('.save-edit-bouton').text("<?php echo $bouton_enregistrer; ?>");
              $('#btn_action').val('Enregistrer');
          });


      /* Enregistrer */
          $(document).on('submit','#carac_conf_form', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"carac-conf-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {

                      if(data == "Cette caractéristique de salle de conférence existe déjà dans la liste.") {
                        $('#carac_confModal').modal('hide');
                          $('#carac_conf_form')[0].reset();
                        swal('<?php echo $erreur; ?>',
                           '<?php echo $doublon; ?>',
                           'error');
                      }


                      if(data == "La caractéristique de salle de conférence a été enregistrée avec succès.") {
                          $('#carac_confModal').modal('hide');
                          $('#carac_conf_form')[0].reset();

                          swal('<?php echo $effectue; ?>',
                          '<?php echo $succes_creation; ?>',
                          'success');
                      }

                      carac_confdataTable.ajax.reload();
                  }
              })
          });


      /* Consulter */
      $(document).on('click', '.view', function(){
          var id_carac_conf_view = $(this).attr("id");
          var btn_action_view = 'consulter';
          $.ajax({
              url:"carac-conf-action.php",
              method:"POST",
              data:{id_carac_conf_view:id_carac_conf_view, btn_action_view:btn_action_view},
              dataType:"json",
              success:function(data)
              {
                  $('#carac_confModal_view').modal('show');
                  $('.modal-title_view').text("<?php echo $titre_consulter; ?>");
                  $('#carac_conf_details').html(data); 

              }
          })
      });


      /* fetch single */
        $(document).on('click', '.update', function(){
            var id_carac_conf_modif = $(this).attr("id");
            var btn_action_modif = 'fetch_single';
            $.ajax({
                url:"carac-conf-action.php",
                method:"POST",
                data:{id_carac_conf_modif:id_carac_conf_modif, btn_action_modif:btn_action_modif},
                dataType:"json",
                success:function(data)
                {
                    $('#carac_confModal_modif').modal('show');
                    $('#nom_carac_conf_modif').val(data.nom_carac_conf);
                    $('#desc_carac_conf_modif').val(data.desc_carac_conf);
                    $('.modal-title_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_MODIFIER_CARAC_CONF_EN; } else { echo TITRE_MODIFIER_CARAC_CONF_FR;} ?>");
                    $('.save-edit-bouton_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_MODIFIER_EN;} else { echo BOUTON_MODIFIER_FR;}?>");
                    $('#id_carac_conf_modif').val(id_carac_conf_modif);
                    $('#btn_action_modif').val("Modifier");

                }
            })
        });


      /* Modifier Submit */
          $(document).on('submit','#carac_conf_form_modif', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"carac-conf-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {
                      if(data == "Cette caractéristique de salle de conférence existe déjà dans la liste.") {
                          $('#carac_confModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_CARAC_CONF_EN;} else { echo MESSAGE_DOUBLON_CARAC_CONF_FR;}?>',
                           'error');
                      }


                      if(data == "La caractéristique de salle de conférence a été modifiée avec succès.") {
                          $('#carac_confModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_MODIF_CARAC_CONF_EN;} else { echo MESSAGE_SUCCES_MODIF_CARAC_CONF_FR;}?>',
                          'success');
                      }


                      $('#carac_conf_form_modif')[0].reset();
                      carac_confdataTable.ajax.reload();

                  }
              })
          });


      /* Changer statut */
      $(document).on('click', '.delete', function(){
          var id_carac_conf = $(this).attr('id');
          var status = $(this).data("status");
          var btn_action = 'delete';

          swal({
              title: '<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_SUPPRIMER_EN;} else { echo TITRE_SUPPRIMER_FR;}?>',
              text: '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUPPRIMER_CARAC_CONF_EN;} else { echo MESSAGE_SUPPRIMER_CARAC_CONF_FR;}?>',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                      url:"carac-conf-action.php",
                      method:"POST",
                      data:{id_carac_conf:id_carac_conf, status:status, btn_action:btn_action},
                      dataType: "JSON",
                      success:function(data)
                      {
                        if(data == "Actif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_CARAC_CONF_EN . STATUT_ACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_CARAC_CONF_FR . STATUT_ACTIF_FR; } ?>', 'success');
                        }
                        if(data == "Inactif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_CARAC_CONF_EN . STATUT_INACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_CARAC_CONF_FR . STATUT_INACTIF_FR; } ?>', 'success');
                        }
                          carac_confdataTable.ajax.reload();
                      }
                  });

              } else {
              }
          });

      });


  </script>

</body>
</html>