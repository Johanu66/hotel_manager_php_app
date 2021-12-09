<?php
include('../database_connection.php');
include('../AddLogInclude.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_JOURNAUX_EN;
} else {
    $page_name = TITRE_JOURNAUX_FR;
}

$journaux = 'active'; // Changer

// Renvoie à la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['type_compte'])) 
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à type_chambre
if(!isset($_SESSION['type_compte']) || ($_SESSION['type_compte'] !=1) ) 
{
    header('location:tableau-de-bord-admin.php');
}


// Log
 
        addlog("Cons-01-log", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);

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
                    echo LISTE_JOURNAUX_EN;
                } else { 
                    echo LISTE_JOURNAUX_FR;
                }
                ?>
            </h2>
            <p class="section-lead"> <!--changer-->
            <?php 
                if ($_SESSION['lang'] == 'EN') { 
                    echo INTRO_JOURNAUX_EN;
                } else { 
                    echo INTRO_JOURNAUX_FR;
                }
                ?>
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">

                    <?php include '../parts/titre-tableau.php';?>

                   
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">

<!--changer id -->      <table id="journaux_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr><!--changer colonnes-->
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">N°</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo CODE_JOURNAUX_EN;
                                        } else { 
                                            echo CODE_JOURNAUX_FR;
                                        }
                                        ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo MESSAGE_JOURNAUX_EN;
                                        } else { 
                                            echo MESSAGE_JOURNAUX_FR;
                                        }
                                        ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DATE_JOURNAUX_EN;
                                        } else { 
                                            echo DATE_JOURNAUX_FR;
                                        }
                                        ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo HEURE_JOURNAUX_EN;
                                        } else { 
                                            echo HEURE_JOURNAUX_FR;
                                        }
                                        ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo PSEUDO_JOURNAUX_EN;
                                        } else { 
                                            echo PSEUDO_JOURNAUX_FR;
                                        }
                                        ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo ADRESSE_IP_JOURNAUX_EN;
                                        } else { 
                                            echo ADRESSE_IP_JOURNAUX_FR;
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
      var journauxdataTable = $('#journaux_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"journaux-fetch.php", //changer
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[], // changer l'index des colonnes qui ne seront pas triées
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });

      
      

  </script>

</body>
</html>