<?php

$page_name = 'Réservation confirmée';

$reservation = 'active';
$reserv_confirme = 'active';

include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_list.php');

if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à reserv_confirme
if( isset($_SESSION['menu_reserv_confirme']) && ($_SESSION['menu_reserv_confirme'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}

// Log
switch ($_SESSION['type_compte']) {

    case 1:
        addlog("Cons-01-reserv-confirme", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-reserv-confirme", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-reserv-confirme", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-reserv-confirme", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-reserv-confirme", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
            <h2 class="section-title">Liste des réservations confirmées</h2>
            <p class="section-lead">
                Une réservation terminée est une réservation déja passée.

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
                                <a href="reserv-dispo.php"><button type="button" name="" id="add_button" class="btn btn-warning">Nouvelle réservation</button></a>
                            </form>

                        </div>
                    <?php
                    }
                    ?>


                  </div>

                  <div class="card-body">
                    <div class="table-responsive">

                        <table id="reserv_confirme_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Début</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Fin</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Type</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Chambre</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Client</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Montant</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Arrivée</th>

                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Action</th>
                                    
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

      /* Affichage de la liste */
      var reserv_confirmedataTable = $('#reserv_confirme_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"reserv-confirme-fetch.php",
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


    //   /* Consulter */
    //   /*  envoie l'id de la reserv_confirme et la valeur de consulter a reserv_confirme_action.php
    //   qui à son tour  va afficher tous les détails */
    //   $(document).on('click', '.view', function(){
    //       var id_reserv_confirme_view = $(this).attr("id");
    //       var btn_action_view = 'consulter';
    //       $.ajax({
    //           url:"reserv-confirme-action.php",
    //           method:"POST",
    //           data:{id_reserv_confirme_view:id_reserv_confirme_view, btn_action_view:btn_action_view},
    //           dataType:"json",
    //           success:function(data)
    //           {
    //               $('#reserv_confirmeModal_view').modal('show');
    //               $('.modal-title_view').text("Détails d'une reserv_confirme");
    //               $('#reserv_confirme_details').html(data);

    //           }
    //       })
    //   });





    //   /* fetch single */
    //       $(document).on('click', '.update', function(){
    //           var id_reserv_confirme_modif = $(this).attr("id");
    //           var btn_action_modif = 'fetch_single';
    //           $.ajax({
    //               url:"reserv-confirme-action.php",
    //               method:"POST",
    //               data:{id_reserv_confirme_modif:id_reserv_confirme_modif, btn_action_modif:btn_action_modif},
    //               dataType:"json",
    //               success:function(data)
    //               {
    //                   $('#reserv_confirmeModal_modif').modal('show');
    //                   $('#nom_reserv_confirme_modif').val(data.nom_reserv_confirme);
    //                   $('#desc_reserv_confirme_modif').val(data.desc_reserv_confirme);
    //                   $('#aire_reserv_confirme_modif').val(data.aire_reserv_confirme);
    //                   $('#id_type_reserv_confirme_fk_reserv_confirme_modif').val(data.id_type_reserv_confirme_fk_reserv_confirme);
    //                   $('.modal-title_modif').text("Modifier une reserv_confirme");
    //                   $('.save-edit-bouton_modif').text("Modifier");
    //                   $('#id_reserv_confirme_modif').val(id_reserv_confirme_modif);
    //                   $('#btn_action_modif').val("Modifier");

    //               }
    //           })
    //       });


    //   /* Modifier Submit */

    //       $(document).on('submit','#reserv_confirme_form_modif', function(event){
    //           event.preventDefault();
    //           var form_data = $(this).serialize();
    //           $.ajax({
    //               url:"reserv_confirme-action.php",
    //               method:"POST",
    //               data:form_data,
    //               dataType:"json",
    //               success:function(data)
    //               {
    //                   //console.log(data);
    //                   if(data == "Cette reserv_confirme existe déjà dans la liste.") {
    //                       $('#reserv_confirmeModal_modif').modal('hide');
    //                       swal('Erreur', 'Cette reserv_confirme existe déjà dans la liste.', 'error');
    //                   }


    //                   if(data == "La reserv_confirme a été modifiée avec succès.") {
    //                       $('#reserv_confirmeModal_modif').modal('hide');
    //                       swal('Effectué', 'La reserv_confirme a été modifiée avec succès.', 'success');
    //                   }


    //                   $('#reserv_confirme_form_modif')[0].reset();
    //                   reserv_confirmedataTable.ajax.reload();
    //               }
    //           })
    //       });


    //   /* Changer statut */
    //   $(document).on('click', '.delete', function(){
    //       var id_reserv_confirme = $(this).attr('id');
    //       var status = $(this).data("status");
    //       var btn_action = 'delete';

    //       swal({
    //           title: 'Changement du statut !',
    //           text: 'Souhaitez-vous changer le statut de la reserv_confirme ?',
    //           icon: 'warning',
    //           buttons: true,
    //           dangerMode: true,
    //       })
    //       .then((willDelete) => {
    //           if (willDelete) {

    //               $.ajax({
    //                   url:"reserv_confirme-action.php",
    //                   method:"POST",
    //                   data:{id_reserv_confirme:id_reserv_confirme, status:status, btn_action:btn_action},
    //                   success:function(data)
    //                   {
    //                       swal('Effectué',data,'success');

    //                       reserv_confirmedataTable.ajax.reload();
    //                   }
    //               });

    //           } else {
    //           }
    //       });

    //   });


  </script>

</body>
</html>