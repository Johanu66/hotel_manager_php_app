<?php
include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_list.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_CHAMBRE_EN;
} else {
    $page_name = TITRE_CHAMBRE_FR;
}

$hebergement = 'active';
$chambre = 'active';

if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à chambre
if( isset($_SESSION['menu_chambre']) && ($_SESSION['menu_chambre'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}


// Log
switch ($_SESSION['type_compte']) {

    case 1:
        addlog("Cons-01-chambre", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-chambre", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-chambre", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-chambre", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-chambre", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
                    echo LISTE_CHAMBRE_EN;
                } else { 
                    echo LISTE_CHAMBRE_FR;
                }
                ?>
            </h2>
            <p class="section-lead">
            <?php 
                if ($_SESSION['lang'] == 'EN') { 
                    echo INTRO_CHAMBRE_EN;
                } else { 
                    echo INTRO_CHAMBRE_FR;
                }
                ?>
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">

                    <?php include '../parts/titre-tableau.php';?>

                    <!-- Si l'utilisateur n'est pas un lecteur, il a accès au bouton d'enregistrement -->
                    <?php
                        if($_SESSION['type_compte'] != '5') {
                    ?>

                        <div class="card-header-action">
                    
                        <form method="POST">
                            <button type="button" name="add" id="add_button" class="btn btn-warning">
                            <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo BOUTON_NOUVELLE_CHAMBRE_EN;
                            } else { 
                                echo BOUTON_NOUVELLE_CHAMBRE_FR;
                            }
                            ?>

                            </button>
                        </form>

                        </div>

                    <?php
                        }
                    ?>

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
                    <form method="POST" action="../export/export-chambre.php">
                        <div class="form-group" style="width:300px; float:right;">
                            <div class="input-group">
                                <select name="export_chambre" class="custom-select" id="inputGroupSelect04">
                                    <option value="pdf"><?php echo $export_pdf ?></option>
                                    <option value="word"><?php echo $export_word ?></option>
                                    <option value="excel"><?php echo $export_excel ?></option>
                                </select>
                                <div class="input-group-append">
                                    <button name="btn_export_chambre" class="btn btn-primary" type="submit"><?php echo $export ?></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                        }
                    ?>

                    <div class="table-responsive">

                        <table id="chambre_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">N°</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo NOM_CHAMBRE_EN;
                                    } else { 
                                        echo NOM_CHAMBRE_FR;
                                    }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo TYPE_CHAMBRE_EN;
                                    } else { 
                                        echo TYPE_CHAMBRE_FR;
                                    }
                                    ?>
                                    </th>
                                    
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo DESC_CHAMBRE_EN;
                                    } else { 
                                        echo DESC_CHAMBRE_FR;
                                    }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important; text-align: center !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo STATUT_EN;
                                        } else { 
                                            echo STATUT_FR;
                                        }
                                    ?></th>

                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important; text-align: center !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo ACTIONS_EN;
                                        } else { 
                                            echo ACTIONS_FR;
                                        }
                                    ?></th>
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
  <div id="chambreModal" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="chambre_form">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">

                      <div class="form-group">
                          <label>
                          <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo NOM_CHAMBRE_EN;
                            } else { 
                                echo NOM_CHAMBRE_FR;
                            }
                            ?>
                         *</label>
                          <input type="text" name="nom_chambre" id="nom_chambre" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label>
                          <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo DESC_CHAMBRE_FR;
                            } else { 
                                echo DESC_CHAMBRE_FR;
                            }
                            ?>
                         </label>
                          <textarea type="text" name="desc_chambre" id="desc_chambre" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <label><?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo SUPERFICIE_CHAMBRE_EN;
                                        } else { 
                                            echo SUPERFICIE_CHAMBRE_FR;
                                        }
                                    ?></label>
                          <input type="text" name="aire_chambre" id="aire_chambre" class="form-control" />
                      </div>

                      <div class="form-group">
                          <label>Type *</label>
                          <select name="id_type_chambre_fk_chambre" id="id_type_chambre_fk_chambre" class="form-control" required >
                              <option value=""><?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo CHOISIR_TYPE_CHAMBRE_CHAMBRE_EN;
                                        } else { 
                                            echo CHOISIR_TYPE_CHAMBRE_CHAMBRE_FR;
                                        }
                                    ?></option>
                              <?php echo fill_type_chambre_list($connect);?>
                          </select>
                      </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_chambre" id="id_chambre"/>
                      <input type="hidden" name="btn_action" id="btn_action"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton" name="action" id="action"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- Modifier Modal -->
  <div id="chambreModal_modif" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="chambre_form_modif">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_modif"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">

                      <div class="form-group">
                          <label>
                          <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo NOM_CHAMBRE_EN;
                            } else { 
                                echo NOM_CHAMBRE_FR;
                            }
                            ?>
                         *</label>
                          <input type="text" name="nom_chambre_modif" id="nom_chambre_modif" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label>
                          <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo DESC_CHAMBRE_EN;
                            } else { 
                                echo DESC_CHAMBRE_FR;
                            }
                            ?>
                         </label>
                          <textarea type="text" name="desc_chambre_modif" id="desc_chambre_modif" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <label><?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo SUPERFICIE_CHAMBRE_EN;
                                        } else { 
                                            echo SUPERFICIE_CHAMBRE_FR;
                                        }
                                    ?></label>
                          <input type="text" name="aire_chambre_modif" id="aire_chambre_modif" class="form-control" />
                      </div>

                      <div class="form-group">
                          <label>
                          <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo TYPE_CHAMBRE_EN;
                            } else { 
                                echo TYPE_CHAMBRE_FR;
                            }
                            ?>
                         *</label>
                          <select name="id_type_chambre_fk_chambre_modif" id="id_type_chambre_fk_chambre_modif" class="form-control" required >
                              <?php echo fill_type_chambre_list($connect);?>
                          </select>
                      </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_chambre_modif" id="id_chambre_modif"/>
                      <input type="hidden" name="btn_action_modif" id="btn_action_modif"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_modif" name="action_modif" id="action_modif"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- Consulter Modal -->
  
  <div id="chambreModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="chambre_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="chambre_details"></div>
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
      var chambredataTable = $('#chambre_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"chambre-fetch.php",
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[5],
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });

      /* Affichage de la fenêtre d'ajout*/

          $('#add_button').click(function(){
              $('#chambreModal').modal('show');
              $('#chambre_form')[0].reset();
              $('.modal-title').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_AJOUT_CHAMBRE_EN;} else { echo TITRE_AJOUT_CHAMBRE_FR;}?>");
              $('.save-edit-bouton').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_ENREGISTRER_EN;} else { echo BOUTON_ENREGISTRER_FR;}?>");
              $('#btn_action').val('Enregistrer');
          });



      /* Enregistrer */

          $(document).on('submit','#chambre_form', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"chambre-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {

                      if(data == "Cette chambre existe déjà dans la liste.") {
                        $('#chambreModal').modal('hide');
                        $('#chambre_form')[0].reset();
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_CHAMBRE_EN;} else { echo MESSAGE_DOUBLON_CHAMBRE_FR;}?>',
                           'error');
                      }


                      if(data == "La chambre a été enregistrée avec succès.") {
                        $('#chambreModal').modal('hide');
                        $('#chambre_form')[0].reset();
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_CREATION_CHAMBRE_EN;} else { echo MESSAGE_SUCCES_CREATION_CHAMBRE_FR;}?>',
                          'success');
                      }

                      $('#chambre_form')[0].reset();
                      chambredataTable.ajax.reload();

                  }
              })
          });


      /* Consulter */

      $(document).on('click', '.view', function(){
          var id_chambre_view = $(this).attr("id");
          var btn_action_view = 'consulter';
          $.ajax({
              url:"chambre-action.php",
              method:"POST",
              data:{id_chambre_view:id_chambre_view, btn_action_view:btn_action_view},
              dataType:"json",
              success:function(data)
              {
                  $('#chambreModal_view').modal('show');
                  $('.modal-title_view').text("<?php if ($_SESSION['lang'] == 'EN') { echo CONSULTER_CHAMBRE_EN;} else { echo CONSULTER_CHAMBRE_FR;}?>");
                  $('#chambre_details').html(data);

              }
          })
      });





      /* fetch single */
          $(document).on('click', '.update', function(){
              var id_chambre_modif = $(this).attr("id");
              var btn_action_modif = 'fetch_single';
              $.ajax({
                  url:"chambre-action.php",
                  method:"POST",
                  data:{id_chambre_modif:id_chambre_modif, btn_action_modif:btn_action_modif},
                  dataType:"json",
                  success:function(data)
                  {
                      $('#chambreModal_modif').modal('show');
                      $('#nom_chambre_modif').val(data.nom_chambre);
                      $('#desc_chambre_modif').val(data.desc_chambre);
                      $('#aire_chambre_modif').val(data.aire_chambre);
                      $('#id_type_chambre_fk_chambre_modif').val(data.id_type_chambre_fk_chambre);
                      $('.modal-title_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo MODIF_CHAMBRE_EN;} else { echo MODIF_CHAMBRE_FR;}?>");
                      $('.save-edit-bouton_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_MODIFIER_EN;} else { echo BOUTON_MODIFIER_FR;}?>");
                      $('#id_chambre_modif').val(id_chambre_modif);
                      $('#btn_action_modif').val("Modifier");

                  }
              })
          });


      /* Modifier Submit */

          $(document).on('submit','#chambre_form_modif', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"chambre-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {
                      //console.log(data);
                      if(data == "Cette chambre existe déjà dans la liste.") {
                          $('#chambreModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_CHAMBRE_EN;} else { echo MESSAGE_DOUBLON_CHAMBRE_FR;}?>',
                           'error');
                      }


                      if(data == "La chambre a été modifiée avec succès.") {
                        $('#chambreModal_modif').modal('hide');
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_MODIF_CHAMBRE_EN;} else { echo MESSAGE_SUCCES_MODIF_CHAMBRE_FR;}?>',
                          'success');
                      }


                      $('#chambre_form_modif')[0].reset();
                      chambredataTable.ajax.reload();
                  }
              })
          });


      /* Changer statut */
      $(document).on('click', '.delete', function(){
          var id_chambre = $(this).attr('id');
          var status = $(this).data("status");
          var btn_action = 'delete';

          swal({
              title: '<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CHANGER_STATUT_EN;} else { echo TITRE_CHANGER_STATUT_FR;}?>',
              text: '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_CHANGER_STATUT_CHAMBRE_EN;} else { echo MESSAGE_CHANGER_STATUT_CHAMBRE_FR;}?>',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                      url:"chambre-action.php",
                      method:"POST",
                      data:{id_chambre:id_chambre, status:status, btn_action:btn_action},
                      dataType: "JSON",
                      success:function(data)
                      {
                        if(data == "Actif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_CHAMBRE_EN . STATUT_ACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_CHAMBRE_FR . STATUT_ACTIF_FR; } ?>', 'success');
                        }
                        if(data == "Inactif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_CHAMBRE_EN . STATUT_INACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_CHAMBRE_FR . STATUT_INACTIF_FR; } ?>', 'success');
                        }

                          chambredataTable.ajax.reload();
                      }
                  });

              } else {
              }
          });

      });


  </script>

</body>
</html>