<?php
include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_list.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

$page_name = 'Réservation en attente';

$reservation = 'active';
$reserv_attente = 'active';

// Renvoie à la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à reserv_attente
if( isset($_SESSION['menu_reserv_attente']) && ($_SESSION['menu_reserv_attente'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}


// Log
switch ($_SESSION['type_compte']) {

    case 1:
        addlog("Cons-01-reserv-attente", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 1:
        addlog("Cons-02-reserv-attente", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-reserv-attente", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-reserv-attente", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-reserv-attente", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
            <h2 class="section-title">Liste des réservations en attente</h2>
            <p class="section-lead">
                Une réservation en attente est considérée comme une réservation faites par un
                client lui même depuis la version Android de l'application.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">

                    <?php include '../parts/titre-tableau.php';?>

                    <!-- Si l'utilisateur n'est pas un lecteur, il a accès au bouton nouvelle reservation -->
                    <?php
                    if($_SESSION['type_compte'] != 5)
                    {
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

                        <table id="reserv_attente_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Début</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Fin</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Type de chambre</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Chambre</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Client</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Montant</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important; text-align: center !important;">Actions</th>
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



  <!-- Modifier Modal -->


  <!-- Consulter Modal -->
  <!-- affichage du formulaire si on masque on ne voie rien qui s'affiche. Le consuler ne renvoie rien-->
  





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
      var reserv_attentedataTable = $('#reserv_attente_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"reserv-attente-fetch.php",
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[6],
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });

      /* Affichage de la fenêtre d'ajout*/
      /*
          $('#add_button').click(function(){
              $('#reserv_attenteModal').modal('show');
              $('#reserv_attente_form')[0].reset();
              $('.modal-title').text("Ajouter une reserv_attente");
              $('.save-edit-bouton').text("Enregistrer");
              $('#btn_action').val('Enregistrer');
          });

*/

      /* Enregistrer */
/*
          $(document).on('submit','#reserv_attente_form', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"reserv_attente-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {

                      if(data == "Cette reserv_attente existe déjà dans la liste.") {
                          swal('Erreur', 'Cette reserv_attente existe déjà dans la liste.', 'error');
                      }


                      if(data == "La reserv_attente a été enregistrée avec succès.") {
                          $('#reserv_attenteModal').modal('hide');
                          swal('Effectué', 'La reserv_attente a été enregistrée avec succès.', 'success');
                      }

                      $('#reserv_attente_form')[0].reset();
                      reserv_attentedataTable.ajax.reload();

                  }
              })
          });
*/

      /* Consulter */
      /*  envoie l'id de la reserv_attente et la valeur de consulter a reserv_attente_action.php
      qui à son tour  va afficher tous les détails */
      $(document).on('click', '.view', function(){
          var id_reserv_attente_view = $(this).attr("id");
          var btn_action_view = 'consulter';
          $.ajax({
              url:"reserv-attente-action.php",
              method:"POST",
              data:{id_reserv_attente_view:id_reserv_attente_view, btn_action_view:btn_action_view},
              dataType:"json",
              success:function(data)
              {
                  $('#reserv_attenteModal_view').modal('show');
                  $('.modal-title_view').text("Détails d'une reserv_attente");
                  $('#reserv_attente_details').html(data);

              }
          })
      });





      /* fetch single */
          $(document).on('click', '.update', function(){
              var id_reserv_attente_modif = $(this).attr("id");
              var btn_action_modif = 'fetch_single';
              $.ajax({
                  url:"reserv-attente-action.php",
                  method:"POST",
                  data:{id_reserv_attente_modif:id_reserv_attente_modif, btn_action_modif:btn_action_modif},
                  dataType:"json",
                  success:function(data)
                  {
                      $('#reserv_attenteModal_modif').modal('show');
                      $('#nom_reserv_attente_modif').val(data.nom_reserv_attente);
                      $('#desc_reserv_attente_modif').val(data.desc_reserv_attente);
                      $('#aire_reserv_attente_modif').val(data.aire_reserv_attente);
                      $('#id_type_reserv_attente_fk_reserv_attente_modif').val(data.id_type_reserv_attente_fk_reserv_attente);
                      $('.modal-title_modif').text("Modifier une reserv_attente");
                      $('.save-edit-bouton_modif').text("Modifier");
                      $('#id_reserv_attente_modif').val(id_reserv_attente_modif);
                      $('#btn_action_modif').val("Modifier");

                  }
              })
          });


      /* Modifier Submit */

          $(document).on('submit','#reserv_attente_form_modif', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"reserv-attente-action.php",
                  method:"POST",
                  data:form_data,
                  dataType:"json",
                  success:function(data)
                  {
                      //console.log(data);
                      if(data == "Cette reserv_attente existe déjà dans la liste.") {
                          $('#reserv_attenteModal_modif').modal('hide');
                          swal('Erreur', 'Cette reserv_attente existe déjà dans la liste.', 'error');
                      }


                      if(data == "La reserv_attente a été modifiée avec succès.") {
                          $('#reserv_attenteModal_modif').modal('hide');
                          swal('Effectué', 'La reserv_attente a été modifiée avec succès.', 'success');
                      }


                      $('#reserv_attente_form_modif')[0].reset();
                      reserv_attentedataTable.ajax.reload();
                  }
              })
          });


      /* Changer statut */
      $(document).on('click', '.delete', function(){
          var id_reserv_attente = $(this).attr('id');
          var status = $(this).data("status");
          var btn_action = 'delete';

          swal({
              title: 'Changement du statut !',
              text: 'Souhaitez-vous changer annuler cette réservation ?',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                      url:"reserv-attente-action.php",
                      method:"POST",
                      data:{id_reserv_attente:id_reserv_attente, status:status, btn_action:btn_action},
                      success:function(data)
                      {
                          swal('Effectué',data,'success');
                          reserv_attentedataTable.ajax.reload();
                      }
                  });

              } else {
              }
          });

      });


  </script>

</body>
</html>