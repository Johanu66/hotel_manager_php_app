<?php
include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_list.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_BOISSON_EN;
} else {
    $page_name = TITRE_BOISSON_FR;
}

$bar = 'active';
$boisson = 'active';

if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à boisson
if( isset($_SESSION['menu_boisson']) && ($_SESSION['menu_boisson'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}


 //Log
switch ($_SESSION['type_compte']) {

   case 1:
        addlog("Cons-01-boisson", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
   break;
 case 2:
       addlog("Cons-02-boisson", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
 case 3:
       addlog("Cons-03-boisson", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
 case 4:
       addlog("Cons-04-boisson", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
         break;
 case 5:
       addlog("Cons-05-boisson", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
                    echo LISTE_BOISSON_EN;
                } else { 
                    echo LISTE_BOISSON_FR;
                }
                ?>
            </h2>
            <p class="section-lead">
            <?php 
                if ($_SESSION['lang'] == 'EN') { 
                    echo INTRO_BOISSON_EN;
                } else { 
                    echo INTRO_BOISSON_FR;
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
                                echo BOUTON_NOUVELLE_BOISSON_EN;
                            } else { 
                                echo BOUTON_NOUVELLE_BOISSON_FR;
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
                    <form method="POST" action="../export/export-boisson.php">
                        <div class="form-group" style="width:300px; float:right;">
                            <div class="input-group">
                                <select name="export_boisson" class="custom-select" id="inputGroupSelect04">
                                    <option value="pdf"><?php echo $export_pdf ?></option>
                                    <option value="word"><?php echo $export_word ?></option>
                                    <option value="excel"><?php echo $export_excel ?></option>
                                </select>
                                <div class="input-group-append">
                                    <button name="btn_export_boisson" class="btn btn-primary" type="submit"><?php echo $export ?></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                        }
                    ?>

                    <div class="table-responsive">

                        <table id="boisson_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">N°</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo LIB_BOISSON_EN;
                                    } else { 
                                        echo LIB_BOISSON_FR;
                                    }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo DESC_BOISSON_EN;
                                    } else { 
                                        echo DESC_BOISSON_FR;
                                    }
                                    ?>
                                    </th>
                                    
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo PRIX_UNITE_BOISSON_EN;
                                    } else { 
                                        echo PRIX_UNITE_BOISSON_FR;
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
  <div id="boissonModal" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="boisson_form">
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
                                echo LIB_BOISSON_EN;
                            } else { 
                                echo LIB_BOISSON_FR;
                            }
                            ?>
                         *</label>
                          <input type="text" name="lib_boisson" id="lib_boisson" class="form-control" required />
                      </div>

                      <div class="form-group">
                          <label>
                          <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo DESC_BOISSON_FR;
                            } else { 
                                echo DESC_BOISSON_FR;
                            }
                            ?>
                         </label>
                          <textarea type="text" name="desc_boisson" id="desc_boisson" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                          <label>
                                  <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo PRIX_UNITE_BOISSON_EN;
                                        } else { 
                                            echo PRIX_UNITE_BOISSON_FR;
                                        }
                                    ?>
                        </label>
                          <input type="text" name="prix_unite_boisson" id="prix_unite_boisson" class="form-control" />
                      </div>

                     

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_boisson" id="id_boisson"/>
                      <input type="hidden" name="btn_action" id="btn_action"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton" name="action" id="action"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- Modifier Modal -->
  <div id="boissonModal_modif" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="boisson_form_modif">
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
                                echo LIB_BOISSON_EN;
                            } else { 
                                echo LIB_BOISSON_FR;
                            }
                            ?>
                         *</label>
                          <input type="text" name="lib_boisson" id="lib_boisson_modif" class="form-control" required />
                      </div>

                      <div class="form-group">
                          <label>
                          <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo DESC_BOISSON_FR;
                            } else { 
                                echo DESC_BOISSON_FR;
                            }
                            ?>
                         </label>
                          <textarea type="text" name="desc_boisson" id="desc_boisson_modif" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                          <label>
                                  <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo PRIX_UNITE_BOISSON_EN;
                                        } else { 
                                            echo PRIX_UNITE_BOISSON_FR;
                                        }
                                    ?>
                        </label>
                          <input type="text" name="prix_unite_boisson" id="prix_unite_boisson_modif" class="form-control" />
                      </div>

                     

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_boisson_modif" id="id_boisson_modif"/>
                      <input type="hidden" name="btn_action_modif" id="btn_action_modif"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_modif" name="action_modif" id="action_modif"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- Consulter Modal -->
  
  <div id="boissonModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="boisson_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="boisson_details"></div>
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
      var boissondataTable = $('#boisson_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"boisson-fetch.php",
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[4],
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });

      /* Affichage de la fenêtre d'ajout*/

          $('#add_button').click(function(){
              $('#boissonModal').modal('show');
              $('#boisson_form')[0].reset();
              $('.modal-title').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_AJOUT_BOISSON_EN;} else { echo TITRE_AJOUT_BOISSON_FR;}?>");
              $('.save-edit-bouton').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_ENREGISTRER_EN;} else { echo BOUTON_ENREGISTRER_FR;}?>");
              $('#btn_action').val('Enregistrer');
          });



      /* Enregistrer */

          $(document).on('submit','#boisson_form', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"boisson-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {
                      if(data == "Cette boisson existe déjà dans la liste.") {
                        $('#boissonModal').modal('hide');
                        $('#boisson_form')[0].reset();
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_BOISSON_EN;} else { echo MESSAGE_DOUBLON_BOISSON_FR;}?>',
                           'error');
                      }


                      if(data == "La boisson a été enregistrée avec succès.") {
                        $('#boissonModal').modal('hide');
                        $('#boisson_form')[0].reset();
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_CREATION_BOISSON_EN;} else { echo MESSAGE_SUCCES_CREATION_BOISSON_FR;}?>',
                          'success');
                      }

                      $('#boisson_form')[0].reset();
                      boissondataTable.ajax.reload();

                  }
              })
          });


      /* Consulter */

      $(document).on('click', '.view', function(){
          var id_boisson_view = $(this).attr("id");
          var btn_action_view = 'consulter';
          $.ajax({
              url:"boisson-action.php",
              method:"POST",
              data:{id_boisson_view:id_boisson_view, btn_action_view:btn_action_view},
              dataType:"json",
              success:function(data)
              {
                  $('#boissonModal_view').modal('show');
                  $('.modal-title_view').text("<?php if ($_SESSION['lang'] == 'EN') { echo CONSULTER_BOISSON_EN;} else { echo CONSULTER_BOISSON_FR;}?>");
                  $('#boisson_details').html(data);

              }
          })
      });





      /* fetch single */
          $(document).on('click', '.update', function(){
              var id_boisson_modif = $(this).attr("id");
              var btn_action_modif = 'fetch_single';
              $.ajax({
                  url:"boisson-action.php",
                  method:"POST",
                  data:{id_boisson_modif:id_boisson_modif, btn_action_modif:btn_action_modif},
                  dataType:"json",
                  success:function(data)
                  {
                      console.log(data.lib_boisson);
                      $('#boissonModal_modif').modal('show');
                      $('#lib_boisson_modif').val(data.lib_boisson);
                      $('#desc_boisson_modif').val(data.desc_boisson);
                      $('#prix_unite_boisson_modif').val(data.prix_unite_boisson);
                      $('.modal-title_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo MODIF_BOISSON_EN;} else { echo MODIF_BOISSON_FR;}?>");
                      $('.save-edit-bouton_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_MODIFIER_EN;} else { echo BOUTON_MODIFIER_FR;}?>");
                      $('#id_boisson_modif').val(id_boisson_modif);
                      $('#btn_action_modif').val("Modifier");

                  }
              })
          });


      /* Modifier Submit */

          $(document).on('submit','#boisson_form_modif', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"boisson-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {
                      if(data == "Cette boisson existe déjà dans la liste.") {
                          $('#boissonModal_modif').modal('hide');
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_BOISSON_EN;} else { echo MESSAGE_DOUBLON_BOISSON_FR;}?>',
                           'error');
                      }


                      if(data == "La boisson a été modifiée avec succès.") {
                        $('#boissonModal_modif').modal('hide');
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_MODIF_BOISSON_EN;} else { echo MESSAGE_SUCCES_MODIF_BOISSON_FR;}?>',
                          'success');
                      }


                      $('#boisson_form_modif')[0].reset();
                      boissondataTable.ajax.reload();
                  }
              })
          });


      /* Changer statut */
      $(document).on('click', '.delete', function(){
          var id_boisson = $(this).attr('id');
          var status = $(this).data("status");
          var btn_action = 'delete';

          swal({
              title: '<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CHANGER_STATUT_EN;} else { echo TITRE_CHANGER_STATUT_FR;}?>',
              text: '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_CHANGER_STATUT_BOISSON_EN;} else { echo MESSAGE_CHANGER_STATUT_BOISSON_FR;}?>',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                      url:"boisson-action.php",
                      method:"POST",
                      data:{id_boisson:id_boisson, status:status, btn_action:btn_action},
                      dataType: "JSON",
                      success:function(data)
                      {
                        if(data == "Actif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_BOISSON_EN . STATUT_ACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_BOISSON_FR . STATUT_ACTIF_FR; } ?>', 'success');
                        }
                        if(data == "Inactif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_BOISSON_EN . STATUT_INACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_BOISSON_FR . STATUT_INACTIF_FR; } ?>', 'success');
                        }

                          boissondataTable.ajax.reload();
                      }
                  });

              } else {
              }
          });

      });


  </script>

</body>
</html>