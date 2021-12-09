<?php
include('../database_connection.php');
include('../AddLogInclude.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_FACTURE_CONF_EN;
} else {
    $page_name = TITRE_FACTURE_CONF_FR;
}

$conference = 'active';
$facture_conf = 'active';

// Renvoie à la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['type_compte'])) 
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à facture_conf
if( isset($_SESSION['menu_facture_conf']) && ($_SESSION['menu_facture_conf'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}


switch ($_SESSION['type_compte']) {

    case 1:
        addlog("Cons-01-facture-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-facture-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-facture-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-facture-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-facture-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
                    echo LISTE_FACTURE_CONF_EN;
                } else { 
                    echo LISTE_FACTURE_CONF_FR;
                }
                ?>
            </h2>

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
                                <a href="location-conf.php"><button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accès: Tous les rôles sauf lecteur">

                                <?php 
                                    if ($_SESSION['lang'] == 'EN') { 
                                        echo BOUTON_NOUVEAU_FACTURE_CONF_EN;
                                    } else { 
                                        echo BOUTON_NOUVEAU_FACTURE_CONF_FR;
                                    }
                                ?>
                                </button></a>
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
                    <form method="POST" action="../export/export-facture-conf.php">
                        <div class="form-group" style="width:300px; float:right;">
                            <div class="input-group">
                                <select name="export_facture_conf" class="custom-select" id="inputGroupSelect04">
                                    <option value="pdf"><?php echo $export_pdf ?></option>
                                    <option value="word"><?php echo $export_word ?></option>
                                    <option value="excel"><?php echo $export_excel ?></option>
                                </select>
                                <div class="input-group-append">
                                    <button name="btn_export_facture_conf" class="btn btn-primary" type="submit" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accès: Super Administrateur et Administrateur"><?php echo $export ?></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                        }
                    ?>

                    <div class="table-responsive">

                        <table id="facture_conf_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">N° <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo NUMERO_FACTURE_CONF_EN;
                                        } else { 
                                            echo NUMERO_FACTURE_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DATE_FACTURE_CONF_EN;
                                        } else { 
                                            echo DATE_FACTURE_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo CLIENT_EN;
                                        } else { 
                                            echo CLIENT_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important; text-align: center !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo MTTC_FACTURE_CONF_EN;
                                        } else { 
                                            echo MTTC_FACTURE_CONF_FR;
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


    <!-- Formulaire Afficher Facture -->
    <form id="afficher_facture_form" style="display:none" method="POST" action="../facture/facture-conf.php">
        <input type="hidden" name="id_facture_conf" value="" />
        <input type="submit" name="" />
    </form>




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
      var facture_confdataTable = $('#facture_conf_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"facture-conf-fetch.php", //changer
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[5], // changer l'index des colonnes qui ne seront pas triées
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });



    // Afficher la facture
    $(document).on('click', '.view_facture', function(event){
        event.preventDefault();
        $id_facture_conf = $(this).attr('id');
        $('input[name="id_facture_conf"]').val($id_facture_conf);
        $('#afficher_facture_form').submit();
    })




      /* Changer statut */
      // changer au besoin
      $(document).on('click', '.delete_facture', function(){
          var id_facture_conf = $(this).attr('id');
          var btn_action = 'delete';

          swal({
              title: '<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_ANNULER_FACTURE_EN;} else { echo TITRE_ANNULER_FACTURE_EN;}?>',
              text: '',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                      url:"facture-conf-action.php",
                      method:"POST",
                      data:{id_facture_conf:id_facture_conf, btn_action:btn_action},
                      dataType: "JSON",
                      success:function(data)
                      {
                        if(data == "Annulé") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_FACTURE_ANNULE_FACTURE_CONF_EN; } else { echo MESSAGE_FACTURE_ANNULE_FACTURE_CONF_FR; } ?>', 'success');
                        }

                          facture_confdataTable.ajax.reload();
                      }
                  });

              } else {
              }
          });

      });


  </script>

</body>
</html>