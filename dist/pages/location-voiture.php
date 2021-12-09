<?php
include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_list.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_LOCATION_VOITURE_EN;
} else {
    $page_name = TITRE_LOCATION_VOITURE_FR;
}

$transport = 'active';
$location_voiture = 'active';

if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à location_voiture
if( isset($_SESSION['menu_location_voiture']) && ($_SESSION['menu_location_voiture'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}


// Log
//  switch ($_SESSION['type_compte']) {

//     case 1:
//         addlog("Cons-01-location-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//         break;
//     case 2:
//         addlog("Cons-02-location-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//         break;
//     case 3:
//         addlog("Cons-03-location-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//         break;
//     case 4:
//         addlog("Cons-04-location-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//         break;
//     case 5:
//         addlog("Cons-05-location-voiture", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
//         break;
// } 

// ?>




<!DOCTYPE html>
<html lang="en">
<head>

  <?php include '../parts/headmeta.php';?>

  <title><?php echo $page_name; ?> - Hôtel</title>

  <?php include '../parts/headsuite.php';?>

  <?php include '../parts/headstyle.php';?>
  <link href="../assets/css/chosen.min.css" rel="stylesheet" />
    <style>
        hr {
            margin-top: 0px;
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
                    echo LISTE_LOCATION_VOITURE_EN;
                } else { 
                    echo LISTE_LOCATION_VOITURE_FR;
                }
                ?>
            </h2>
            <p class="section-lead">
            <?php 
                if ($_SESSION['lang'] == 'EN') { 
                    echo INTRO_LOCATION_VOITURE_EN;
                } else { 
                    echo INTRO_LOCATION_VOITURE_FR;
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
                                    echo BOUTON_NOUVELLE_LOCATION_VOITURE_EN;
                                } else { 
                                    echo BOUTON_NOUVELLE_LOCATION_VOITURE_FR;
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
                        <form method="POST" action="../export/export-location-voiture.php">
                            <div class="form-group" style="width:300px; float:right;">
                                <div class="input-group">
                                    <select name="export_location_voiture" class="custom-select" id="inputGroupSelect04">
                                        <option value="pdf"><?php echo $export_pdf ?></option>
                                        <option value="word"><?php echo $export_word ?></option>
                                        <option value="excel"><?php echo $export_excel ?></option>
                                    </select>
                                    <div class="input-group-append">
                                        <button name="btn_export_location_voiture" class="btn btn-primary" type="submit">
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

                    <table id="location_voiture_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
            
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo VOITURE_LOCATION_VOITURE_EN;
                                    } else { 
                                        echo VOITURE_LOCATION_VOITURE_FR;
                                    }
                                    ?>
                                    </th>                       
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo PLAQUE_LOCATION_VOITURE_EN;
                                    } else { 
                                        echo PLAQUE_LOCATION_VOITURE_FR;
                                    }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo DATE_DEBUT_LOCATION_VOITURE_EN;
                                    } else { 
                                        echo DATE_DEBUT_LOCATION_VOITURE_FR;
                                    }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important; text-align: center !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DATE_FIN_LOCATION_VOITURE_EN;
                                        } else { 
                                            echo DATE_FIN_LOCATION_VOITURE_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo VOITURIER_LOCATION_VOITURE_EN;
                                    } else { 
                                        echo VOITURIER_LOCATION_VOITURE_FR;
                                    }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important; text-align: center !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo CLIENT_LOCATION_VOITURE_EN;
                                        } else { 
                                            echo CLIENT_LOCATION_VOITURE_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo PRIX_LOCATION_VOITURE_EN;
                                    } else { 
                                        echo PRIX_LOCATION_VOITURE_FR;
                                    }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo FACTURE_LOCATION_VOITURE_EN;
                                    } else { 
                                        echo FACTURE_LOCATION_VOITURE_FR;
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

  <!-- Consulter Modal -->
  <div id="location_voitureModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="location_voiture_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="location_voiture_details"></div>
                  </div>

              </div>
          </form>
      </div>
  </div>  

<!-- Ajouter Modal -->
<div id="location_voitureModal" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="location_voiture_form">
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
                                echo VOITURE_LOCATION_VOITURE_EN;
                            } else { 
                                echo VOITURE_LOCATION_VOITURE_FR;
                            }
                            ?>
                         *</label>
                    </div>
                    <div id="voiture" class="row" style="margin-top:-20px;">
                        <div class="form-group col-lg-6">
                            <select name="modele_voiture" id="modele_voiture" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" name="" id="" class="form-control" placeholder="plaque" readonly />
                        </div>
                    </div>
                      <div class="form-group">
                          <label>
                          <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo MOTIF_LOCATION_VOITURE_FR;
                            } else { 
                                echo MOTIF_LOCATION_VOITURE_FR;
                            }
                            ?>
                         </label>
                          <textarea type="text" name="motif_location_voiture" id="motif_location_voiture" class="form-control"></textarea>
                      </div>
                      <div class="row" style="margin-bottom:-25px">
                        <div class="form-group col-lg-6">
                            <label>Début de la location</label>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Fin</label>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6">
                          <input type="datetime-local" name="debut_location_voiture" id="debut_location_voiture" class="form-control" />
                      </div>
                      <div class="form-group col-lg-6">
                          <input type="datetime-local" name="fin_location_voiture" id="fin_location_voiture" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                          <label>Voiturié *</label>
                          <select name="id_voiturier" id="id_voiturier" class="form-control" required >
                              <option value=""><?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo CHOISIR_VOITURIER_LOCATION_VOITURE_EN;
                                        } else { 
                                            echo CHOISIR_VOITURIER_LOCATION_VOITURE_FR;
                                        }
                                    ?></option>
                              <?php //echo fill_voiturier_list($connect);?>
                          </select>
                   </div>
                   <div id="client_ligne">
                        <div class="form-group">
                            <label>Client</label>
                            <select name="nom_prenom_client" id="nom_prenom_client" class="form-control chosen">
                                <?php echo fill_client_list($connect);?>
                            </select>
                        </div>
                  </div>

                  <div class="form-group">
                      <label>Nouveau client</label>
                      <input type="checkbox" name="nouveau_client" id="nouveau_client" class="new_client" />
                  </div>


                  <div id="infos_client">
                        <label>Informations du nouveau client</label>
                        <hr />
                        <div class="row">
                          <div class="form-group col-lg-6">
                              <input type="text" name="nom_client" id="nom_client" class="form-control" placeholder="Nom *" required/>
                          </div>
                          <div class="form-group col-lg-6">
                              <input type="text" name="prenom_client" id="prenom_client" class="form-control" placeholder="Prénom *" required/>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-lg-6">
                              <input type="text" name="id_card_client" id="id_card_client" class="form-control" placeholder="Carte d'identité"/>
                          </div>
                          <div class="form-group col-lg-6">
                              <input type="text" name="passeport_client" id="passeport_client" class="form-control" placeholder="Passeport"/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-6">
                              <input type="text" name="tel_client" id="tel_client" class="form-control" placeholder="Télephone *" required/>
                          </div>
                          <div class="form-group col-lg-6">
                              <input type="email" name="email_client" id="email_client" class="form-control" placeholder="E-mail"/>
                          </div>
                        </div>
                        
                        <hr />
                    </div>

                  <div class="form-group">
                        <input type="radio" name="prix" value="indiquer_prix" id="indiquer_prix" class="radio_prix" />
                        <label>Indiquer le prix</label>
                  </div>

                  <div id="indication" class="row" style="margin-top:-20px;">
                        <div class="form-group col-lg-6">
                        <input type="text" name="" id="prix_location_voiture"placeholder="Prix" class="form-control" />
                        </div>
                  </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_location_voiture" id="id_location_voiture"/>
                      <input type="hidden" name="btn_action" id="btn_action"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton" name="action" id="action"></button>
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
      var location_voituredataTable = $('#location_voiture_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"location-voiture-fetch.php",
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[7],
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });

      /* Affichage de la fenêtre d'ajout*/

          $('#add_button').click(function(){
              $('#location_voitureModal').modal('show');
              $('#location_voiture_form')[0].reset();
              $('.modal-title').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_AJOUT_LOCATION_VOITURE_EN;} else { echo TITRE_AJOUT_LOCATION_VOITURE_FR;}?>");
              $('.save-edit-bouton').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_ENREGISTRER_EN;} else { echo BOUTON_ENREGISTRER_FR;}?>");
              $('#btn_action').val('Enregistrer');
          });
    

    /* Consulter */

    $(document).on('click', '.view', function(){
          var id_location_voiture_view = $(this).attr("id");
          var btn_action_view = 'consulter';
          $.ajax({
              url:"location-voiture-action.php",
              method:"POST",
              data:{id_location_voiture_view:id_location_voiture_view, btn_action_view:btn_action_view},
              dataType:"json",
              success:function(data)
              {
                  $('#location_voitureModal_view').modal('show');
                  $('.modal-title_view').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CONSULTER_LOCATION_VOITURE_EN; } else { echo TITRE_CONSULTER_LOCATION_VOITURE_FR; } ?>");
                  $('#location_voiture_details').html(data);

              }
          })
      });



      /* Changer statut */
      $(document).on('click', '.delete', function(){
          var id_location_voiture = $(this).attr('id');
          var status = $(this).data("status");
          var btn_action = 'delete';

          swal({
              title: '<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CHANGER_STATUT_EN;} else { echo TITRE_CHANGER_STATUT_FR;}?>',
              text: '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_CHANGER_STATUT_LOCATION_VOITURE_EN;} else { echo MESSAGE_CHANGER_STATUT_LOCATION_VOITURE_FR;}?>',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                      url:"location-voiture-action.php",
                      method:"POST",
                      data:{id_location_voiture:id_location_voiture, status:status, btn_action:btn_action},
                      dataType: "JSON",
                      success:function(data)
                      {
                        if(data == "Actif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_VOITURE_EN . STATUT_ACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_LOCATION_VOITURE_FR . STATUT_ACTIF_FR; } ?>', 'success');
                        }
                        if(data == "Inactif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_VOITURE_EN . STATUT_INACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_VOITURE_FR . STATUT_INACTIF_FR; } ?>', 'success');
                        }
                          location_voituredataTable.ajax.reload();
                      }
                  });

              } else {
              }
          });

      });






</script>

