<?php
include('../database_connection.php');
include('../AddLogInclude.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_MARQUE_VOITURE_EN;
} else {
    $page_name = TITRE_MARQUE_VOITURE_FR;
}

$transport = 'active';
$marque_voiture = 'active';

// Renvoie à la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['type_compte'])) 
{
    header('location:connexion.php');
}

 // Renvoie au tableau de bord si l'utilisateur n'a pas accès à marque_voiture
if( isset($_SESSION['menu_marque_voiture']) && ($_SESSION['menu_marque_voiture'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}
 

 switch ($_SESSION['type_compte']) {

    case 1:
        addlog("Cons-01-marque-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-marque-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-marque-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-marque-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-marque-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
                    echo LISTE_MARQUE_VOITURE_EN;
                } else { 
                    echo LISTE_MARQUE_VOITURE_FR;
                }
                ?>
            </h2>
            <p class="section-lead">
            <?php 
                if ($_SESSION['lang'] == 'EN') { 
                    echo INTRO_MARQUE_VOITURE_EN;
                } else { 
                    echo INTRO_MARQUE_VOITURE_FR;
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
                                        echo BOUTON_NOUVELLE_MARQUE_VOITURE_EN;
                                    } else { 
                                        echo BOUTON_NOUVELLE_MARQUE_VOITURE_FR;
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
                            } else {
                                $export_pdf = EXPORT_PDF_FR;
                                $export_word = EXPORT_WORD_FR;
                                $export_excel = EXPORT_EXCEL_FR;
                            }
                        ?>
                        <form method="POST" action="../export/export-marque-voiture.php">
                            <div class="form-group" style="width:300px; float:right;">
                                <div class="input-group">
                                    <select name="export_marque_voiture" class="custom-select" id="inputGroupSelect04">
                                        <option value="pdf"><?php echo $export_pdf ?></option>
                                        <option value="word"><?php echo $export_word ?></option>
                                        <option value="excel"><?php echo $export_excel ?></option>
                                    </select>
                                    <div class="input-group-append">
                                        <button name="btn_export_marque_voiture" class="btn btn-primary" type="submit">
                                        <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo BOUTON_EXPORTER_EN;
                                        } else { 
                                            echo BOUTON_EXPORTER_FR;
                                        }
                                        ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php
                            }
                        ?>


                     <div class="table-responsive">

                        <table id="marque_voiture_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo NOM_MARQUE_VOITURE_EN;
                                        } else { 
                                            echo NOM_MARQUE_VOITURE_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DESC_MARQUE_VOITURE_FR;
                                        } else { 
                                            echo DESC_MARQUE_VOITURE_FR;
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
  <div id="marque_voitureModal" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="marque_voiture_form">
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
                                echo NOM_MARQUE_VOITURE_EN;
                            } else { 
                                echo NOM_MARQUE_VOITURE_FR;
                            }
                            ?>
                         *</label>
                          <input type="text" name="nom_marque_voiture" id="nom_marque_voiture" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label>
                          <?php 
                                if ($_SESSION['lang'] == 'EN') { 
                                    echo DESC_MARQUE_VOITURE_FR;
                                } else { 
                                    echo DESC_MARQUE_VOITURE_FR;
                                }
                            ?>
                            </label>
                          <textarea type="text" name="desc_marque_voiture" id="desc_marque_voiture" class="form-control"></textarea>
                      </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_marque_voiture" id="id_marque_voiture"/>
                      <input type="hidden" name="btn_action" id="btn_action"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton" name="action" id="action"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- Modifier Modal -->
  <div id="marque_voitureModal_modif" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="marque_voiture_form_modif">
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
                                echo NOM_MARQUE_VOITURE_EN;
                            } else { 
                                echo NOM_MARQUE_VOITURE_FR;
                            }
                            ?>
                         *</label>
                          <input type="text" name="nom_marque_voiture_modif" id="nom_marque_voiture_modif" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label>
                          <?php 
                                if ($_SESSION['lang'] == 'EN') { 
                                    echo DESC_MARQUE_VOITURE_FR;
                                } else { 
                                    echo DESC_MARQUE_VOITURE_FR;
                                }
                            ?>
                            </label>
                          <textarea type="text" name="desc_marque_voiture_modif" id="desc_marque_voiture_modif" class="form-control"></textarea>
                      </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_marque_voiture_modif" id="id_marque_voiture_modif"/>
                      <input type="hidden" name="btn_action_modif" id="btn_action_modif"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_modif" name="action_modif" id="action_modif"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- Consulter Modal -->
  
  <div id="marque_voitureModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="marque_voiture_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="marque_voiture_details"></div>
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

      /* Affichage de la liste */ //changer
      var marque_voituredataTable = $('#marque_voiture_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"marque-voiture-fetch.php", //changer
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[2], // changer l'index des colonnes qui ne seront pas triées
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });

      /* Affichage de la fenêtre d'ajout*/

          $('#add_button').click(function(){
              $('#marque_voitureModal').modal('show');
              $('#marque_voiture_form')[0].reset();
              $('.modal-title').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_AJOUT_MARQUE_VOITURE_EN;} else { echo TITRE_AJOUT_MARQUE_VOITURE_FR;}?>");
              $('.save-edit-bouton').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_ENREGISTRER_EN;} else { echo BOUTON_ENREGISTRER_FR;}?>");
              $('#btn_action').val('Enregistrer');
          });



      /* Enregistrer */

          $(document).on('submit','#marque_voiture_form', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"marque-voiture-action.php", // changer
                  method:"POST",
                  data:form_data,
                  dataType:"json", // type de data de retour
                  success:function(data)
                  {
                      // changer
                      if(data == "Cette marque existe déjà dans la liste.") {
                        $('#marque_voitureModal').modal('hide');
                          $('#marque_voiture_form')[0].reset();
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_MARQUE_VOITURE_EN;} else { echo MESSAGE_DOUBLON_MARQUE_VOITURE_FR;}?>',
                           'error');
                      }


                      if(data == "La marque de voiture a été enregistrée avec succès.") {
                          $('#marque_voitureModal').modal('hide');
                          $('#marque_voiture_form')[0].reset();

                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_CREATION_MARQUE_VOITURE_EN;} else { echo MESSAGE_SUCCES_CREATION_MARQUE_VOITURE_FR;}?>',
                          'success');

                        }

                        marque_voituredataTable.ajax.reload(); // recharger le tableau

                  }
              })
          });


      /* Consulter */

      $(document).on('click', '.view', function(){
          var id_marque_voiture_view = $(this).attr("id");
          var btn_action_view = 'consulter';
          $.ajax({
              url:"marque-voiture-action.php",
              method:"POST",
              data:{id_marque_voiture_view:id_marque_voiture_view, btn_action_view:btn_action_view},
              dataType:"json",
              success:function(data)
              {
                  $('#marque_voitureModal_view').modal('show');
                  $('.modal-title_view').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CONSULTER_MARQUE_VOITURE_EN; } else { echo TITRE_CONSULTER_MARQUE_VOITURE_FR; } ?>");
                  $('#marque_voiture_details').html(data);

              }
          })
      });




      /* fetch single */
          $(document).on('click', '.update', function(){
              var id_marque_voiture_modif = $(this).attr("id");
              var btn_action_modif = 'fetch_single';
              $.ajax({
                  url:"marque-voiture-action.php",
                  method:"POST",
                  data:{id_marque_voiture_modif:id_marque_voiture_modif, btn_action_modif:btn_action_modif},
                  dataType:"json",
                  success:function(data)
                  {
                      $('#marque_voitureModal_modif').modal('show');
                      $('#nom_marque_voiture_modif').val(data.nom_marque_voiture);
                      $('#desc_marque_voiture_modif').val(data.desc_marque_voiture); // dupliquer si necessaire
                      $('.modal-title_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_MODIF_MARQUE_VOITURE_EN; } else { echo TITRE_MODIF_MARQUE_VOITURE_FR;} ?>");
                      $('.save-edit-bouton_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_MODIFIER_EN;} else { echo BOUTON_MODIFIER_FR;}?>");
                      $('#id_marque_voiture_modif').val(id_marque_voiture_modif);
                      $('#btn_action_modif').val("Modifier");

                  }
              })
          });


      /* Modifier Submit */
          // Change
          $(document).on('submit','#marque_voiture_form_modif', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"marque-voiture-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {
                    //   console.log(data);
                      if(data == "Cette marque existe déjà dans la liste.") {
                          $('#marque_voitureModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_MARQUE_VOITURE_EN;} else { echo MESSAGE_DOUBLON_MARQUE_VOITURE_FR;}?>',
                           'error');
                      }


                      if(data == "La marque de voiture a été modifiée avec succès.") {
                          $('#marque_voitureModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_MODIF_MARQUE_VOITURE_EN;} else { echo MESSAGE_SUCCES_MODIF_MARQUE_VOITURE_FR;}?>',
                          'success');

                      }


                      $('#marque_voiture_form_modif')[0].reset();
                      marque_voituredataTable.ajax.reload();

                  }
              })
          });


      /* Changer statut */
      // changer au besoin
      $(document).on('click', '.delete', function(){
          var id_marque_voiture = $(this).attr('id');
          var status = $(this).data("status");
          var btn_action = 'delete';

          swal({
              title: '<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CHANGER_STATUT_EN;} else { echo TITRE_CHANGER_STATUT_FR;}?>',
              text: '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_CHANGER_STATUT_MARQUE_VOITURE_EN;} else { echo MESSAGE_CHANGER_STATUT_MARQUE_VOITURE_FR;}?>',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                      url:"marque-voiture-action.php",
                      method:"POST",
                      data:{id_marque_voiture:id_marque_voiture, status:status, btn_action:btn_action},
                      dataType: "JSON",
                      success:function(data)
                      {
                        if(data == "Actif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_MARQUE_VOITURE_EN . STATUT_ACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_MARQUE_VOITURE_FR . STATUT_ACTIF_FR; } ?>', 'success');
                        }
                        if(data == "Inactif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_MARQUE_VOITURE_EN . STATUT_INACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_MARQUE_VOITURE_FR . STATUT_INACTIF_FR; } ?>', 'success');
                        }

                        marque_voituredataTable.ajax.reload();
                      }
                  });

              } else {
              }
          });

      });


  </script>

</body>
</html>