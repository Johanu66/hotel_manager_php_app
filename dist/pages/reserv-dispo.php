<?php

$page_name = 'Chambres disponibles';

$reservation = 'active';
$reserv_dispo = 'active';

include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_list.php');

// Renvoie à la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['type_compte'])) 
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à reserv_dispo
if( isset($_SESSION['menu_type_chambre']) && ($_SESSION['menu_type_chambre'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}


switch ($_SESSION['type_compte']) {

    case 1:
        addlog("Cons-01-reserv-dispo", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-reserv-dispo", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-reserv-dispo", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-reserv-dispo", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-reserv-dispo", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
  <link href="../assets/css/chosen.min.css" rel="stylesheet" />
  <link href="test.css" rel="stylesheet" />
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
            <h2 class="section-title">Liste des chambres disponibles</h2>
            <p class="section-lead">
                Une chambre disponible est une chambre non réservée et non occupée.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">

                    <?php include '../parts/titre-tableau.php';?>

                  </div>

                  <div class="card-body">
                    <div class="table-responsive">

                        <table id="reserv_dispo_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Type de la chambre</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Nom de la chambre</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">Description</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important; text-align: center !important;">Statut</th>

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

  <!-- Consulter Modal -->
  <div id="reserv_dispoModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="reserv_dispo_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="reserv_dispo_details"></div>
                  </div>

              </div>
          </form>
      </div>
  </div>  


  <!-- Reserver Modal -->
  <div id="reserv_dispoModal_reserver" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="reserv_dispo_form_reserver">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_reserver"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                  </div>
                  <div class="modal-body">
            <!-- <div class="groups"> -->
                <!-- <div class="details_chambre"> -->
                    <div class="row" >
                      <div class="form-group col-lg-6">
                          <label>Type de la chambre</label>
                          <input type="text" name="type_chambre" id="type_chambre" class="form-control" readonly />
                      </div>
                      <div class="form-group col-lg-6">
                          <label>Nom de la chambre</label>
                          <input type="text" name="nom_chambre" id="nom_chambre" class="form-control" readonly />
                      </div>
                    </div>
                <!-- </div> -->
            <!-- </div> -->
                <div class="groups">
                <div class="group_left">
                <div class="row" style="margin-bottom:-25px">
                      <div class="form-group col-lg-6">
                          <label>Début de la réservation</label>
                      </div>
                      <div class="form-group col-lg-6">
                          <label>Fin</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6">
                          <input type="datetime-local" name="date_debut" id="date_debut" class="form-control" />
                      </div>
                      <div class="form-group col-lg-6">
                          <input type="datetime-local" name="date_fin" id="date_fin" class="form-control" />
                      </div>
                    </div>


                    <div class="form-group">
                          <input type="radio" name="tarif" value="nuitee" id="nuitee" class="radio_nuitee" checked />
                          <label>Nuitée</label>
                      </div>

                      <div id="nuitee_ligne" class="row" style="margin-top:-20px;">
                        <div class="form-group col-lg-5">
                            <input type="text" name="tarif_nuitee" id="tarif_nuitee" class="form-control" readonly />
                        </div>
                        <div class="form-group col-lg-2" style="margin-top: 10px; text-align:center;">
                            x <span id="nbre_de_nuits">3</span> =
                        </div>
                        <div class="form-group col-lg-5">
                            <input type="text" name="montant_total_nuitee" id="montant_total_nuitee" class="form-control" readonly />
                        </div>
                      </div>

                    <div class="form-group">
                        <input type="radio" name="tarif" value="autre_tarif" id="autre_tarif" class="radio_autre_tarification" />
                        <label>Autres tarifications</label>
                    </div>
                    <div id="autre_tarification" class="row" style="margin-top:-20px;">
                        <div class="form-group col-lg-6">
                            <select name="periode_tarif_chambre" id="periode_tarif_chambre" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" name="montant_total_periode" id="montant_total_periode" class="form-control" placeholder="" readonly />
                        </div>
                    </div>


                    <div class="form-group">
                        <input type="radio" name="tarif" value="personaliser" id="personaliser" class="radio_personnalize" />
                        <label>Personaliser</label>
                    </div>

                    <div id="personnalize" class="row" style="margin-top:-20px;">
                        <div class="form-group col-lg-6">
                            <input type="text" name="tarif_personaliser" id="tarif_personaliser" class="form-control" />
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" name="montant_total_personaliser" id="montant_total_personaliser" class="form-control" />
                        </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-lg-3">
                          <label>Arrivée:</label>
                      </div>
                      <div class="form-group col-lg-2">
                          <input type="radio" name="arrivee" value="oui" id="arrivee_oui" class="" />
                          <label for="arrivee_oui">Oui</label>
                      </div>
                      <div class="form-group col-lg-2">
                          <input type="radio" name="arrivee" value="non" id="arrivee_non" class="" checked/>
                          <label for="arrivee_non">Non</label>
                      </div>
                    </div>

                </div>



                <div class="group_right">
                <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="text" name="nbre_adulte" id="nbre_adulte" class="form-control" placeholder="Nombre d'adultes"/>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" name="nbre_enfant" id="nbre_enfant" class="form-control" placeholder="Nombre d'enfants"/>
                        </div>
                    </div>

                      <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="provenance_client" id="provenance_client" class="form-control" placeholder="Provenance"/>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="destination_client" id="destination_client" class="form-control" placeholder="Destination"/>
                            </div>
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

                </div>
                

                </div>
                  </div>
                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_chambre" id="id_chambre"/>
                      <input type="hidden" name="btn_action_reserver" id="btn_action_reserver"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_reserver" name="action_reserver" id="action_reserver"></button>
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
  <script src="../assets/js/chosen.jquery.min.js"></script>


  <script type="text/javascript">
    $('.chosen').chosen( {width: "100%"});

    // On masque tout ça au départ
    $('#infos_client').hide();
    $('#autre_tarification').hide();
    $('#personnalize').hide();

    $('#nom_client').removeAttr('required');
    $('#prenom_client').removeAttr('required');
    $('#tel_client').removeAttr('required');


    // Action case à cocher Nouveau client
    $('input[type="checkbox"]').click(function(){
        if($('.new_client').prop("checked") == true){
            $('#client_ligne').hide();
            $('#infos_client').show(500);
            $('#nom_client').attr('required', 'required');
            $('#prenom_client').attr('required', 'required');
            $('#tel_client').attr('required', 'required');

        }else if($(this).prop("checked") == false){
            $('#client_ligne').show(500);
            $('#infos_client').hide();
            $('#nom_client').removeAttr('required');
            $('#prenom_client').removeAttr('required');
            $('#tel_client').removeAttr('required');
        }
    });


    // Action sur les boutons radio des tarifs
    $('input[type="radio"]').click(function(){
        if($('.radio_nuitee').prop("checked") == true){
            $('#nuitee_ligne').show();
            $('#autre_tarification').hide();
            $('#personnalize').hide();
        }

        if($('.radio_autre_tarification').prop("checked") == true){
            $('#autre_tarification').show();
            $('#nuitee_ligne').hide();
            $('#personnalize').hide();
        }

        if($('.radio_personnalize').prop("checked") == true){
            $('#personnalize').show();
            $('#nuitee_ligne').hide();
            $('#autre_tarification').hide();
        }
    });




      /* Affichage de la liste */
      var reserv_dispodataTable = $('#reserv_dispo_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"reserv-dispo-fetch.php",
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[2,3,4],
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });



      /* Consulter */

      $(document).on('click', '.view', function(){
        var id_reserv_dispo_view = $(this).attr("id");
        var btn_action_view = 'consulter';
        $.ajax({
            url:"reserv-dispo-action.php",
            method:"POST",
            data:{id_reserv_dispo_view:id_reserv_dispo_view, btn_action_view:btn_action_view},
            dataType:"json",
            success:function(data)
            {
                $('#reserv_dispoModal_view').modal('show');
                $('.modal-title_view').text("Détails sur la chambre");
                $('#reserv_dispo_details').html(data);

            }
        })
      });


    /* Tarifs : période et montant */

    $('#periode_tarif_chambre').on('change', function(){
        var tarifID = $(this).val();

        $.ajax({
            type:'POST',
            url:'../scripts_php/fetch_montant_periode_tarif.php',
            data:'tarif_id='+tarifID,
            dataType:"json",
            success:function(data){
                $('#montant_total_periode').val(data);
            }
        });

    });



    /*
    $('#periode_tarif_chambre').on('change', function(){

            $('#montant_total_periode').val('-');

    });
    */

        $(document).on('click', '.reserver', function(){
            var id_chambre = $(this).attr("id");
            var action_reserver = 'fetch_room_details';
            $.ajax({
                url:"reserv-dispo-action.php",
                method:"POST",
                data:{id_chambre:id_chambre, action_reserver:action_reserver},
                dataType:"json",
                success:function(data)
                {
                    //console.log(data.periode_tarif_chambre);

                    $('#reserv_dispoModal_reserver').modal('show');

                    $('#type_chambre').val(data.type_chambre);
                    $('#nom_chambre').val(data.nom_chambre);
                    $('#id_chambre').val(id_chambre);
                    $('#periode_tarif_chambre').html(data.periode_tarif_chambre);
                    $('.save-edit-bouton_reserver').text("Réserver la chambre");
                    $('.modal-title_reserver').text("Réserver une chambre");
                    $('#btn_action_reserver').val("Reserver");
                }
             })
        });

        $(document).on('submit', '#reserv_dispo_form_reserver', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            console.log(form_data);
            $.ajax({
                url:"reserv-dispo-action.php",
                method:"POST",
                data:form_data,
                dataType:"json",
                success:function(data)
                {
                    if(data == "Ce client existe déjà.") {
                        $('#reserv_dispoModal_reserver').modal('hide');
                        swal('Erreur', 'Ce client existe déjà.', 'error');
                    }
                    if(data == "La réservation a été bien enregistrée.")
                    {
                        $('#reserv_dispoModal_reserver').modal('hide');
                        $('#reserv_dispo_form_reserver')[0].reset();
                        reserv_dispodataTable.ajax.reload();
                        swal('Effectué', 'La réservation a été bien enregistrée.', 'success');
                    }
                }
            });
        })


          /* Enregistrer */
    /*
              $(document).on('submit','#reserv_dispo_form', function(event){
                  event.preventDefault();
                  var form_data = $(this).serialize();
                  $.ajax({
                      url:"reserv_dispo-action.php",
                      method:"POST",
                      data:form_data,
                      dataType:"json",
                      success:function(data)
                      {

                          if(data == "Cette reserv_dispo existe déjà dans la liste.") {
                              swal('Erreur', 'Cette reserv_dispo existe déjà dans la liste.', 'error');
                          }


                          if(data == "La reserv_dispo a été enregistrée avec succès.") {
                              $('#reserv_dispoModal').modal('hide');
                              swal('Effectué', 'La reserv_dispo a été enregistrée avec succès.', 'success');
                          }

                          $('#reserv_dispo_form')[0].reset();
                          reserv_dispodataTable.ajax.reload();

                      }
                  })
              });
    */

          /* Consulter */
          /*  envoie l'id de la reserv_dispo et la valeur de consulter a reserv_dispo_action.php
          qui à son tour  va afficher tous les détails */
          // $(document).on('click', '.view', function(){
          //     var id_reserv_dispo_view = $(this).attr("id");
          //     var btn_action_view = 'consulter';
          //     $.ajax({
          //         url:"reserv-dispo-action.php",
          //         method:"POST",
          //         data:{id_reserv_dispo_view:id_reserv_dispo_view, btn_action_view:btn_action_view},
          //         dataType:"json",
          //         success:function(data)
          //         {
          //             $('#reserv_dispoModal_view').modal('show');
          //             $('.modal-title_view').text("Détails d'une reserv_dispo");
          //             $('#reserv_dispo_details').html(data);

          //         }
          //     })
          // });





          /* fetch single */
              // $(document).on('click', '.update', function(){
              //     var id_reserv_dispo_modif = $(this).attr("id");
              //     var btn_action_modif = 'fetch_single';
              //     $.ajax({
              //         url:"reserv-dispo-action.php",
              //         method:"POST",
              //         data:{id_reserv_dispo_modif:id_reserv_dispo_modif, btn_action_modif:btn_action_modif},
              //         dataType:"json",
              //         success:function(data)
              //         {
              //             $('#reserv_dispoModal_modif').modal('show');
              //             $('#nom_reserv_dispo_modif').val(data.nom_reserv_dispo);
              //             $('#desc_reserv_dispo_modif').val(data.desc_reserv_dispo);
              //             $('#aire_reserv_dispo_modif').val(data.aire_reserv_dispo);
              //             $('#id_type_reserv_dispo_fk_reserv_dispo_modif').val(data.id_type_reserv_dispo_fk_reserv_dispo);
              //             $('.modal-title_modif').text("Modifier une reserv_dispo");
              //             $('.save-edit-bouton_modif').text("Modifier");
              //             $('#id_reserv_dispo_modif').val(id_reserv_dispo_modif);
              //             $('#btn_action_modif').val("Modifier");

              //         }
              //     })
              // });


          /* Modifier Submit */

              // $(document).on('submit','#reserv_dispo_form_modif', function(event){
              //     event.preventDefault();
              //     var form_data = $(this).serialize();
              //     $.ajax({
              //         url:"reserv_dispo-action.php",
              //         method:"POST",
              //         data:form_data,
              //         dataType:"json",
              //         success:function(data)
              //         {
              //             //console.log(data);
              //             if(data == "Cette reserv_dispo existe déjà dans la liste.") {
              //                 $('#reserv_dispoModal_modif').modal('hide');
              //                 swal('Erreur', 'Cette reserv_dispo existe déjà dans la liste.', 'error');
              //             }


              //             if(data == "La reserv_dispo a été modifiée avec succès.") {
              //                 $('#reserv_dispoModal_modif').modal('hide');
              //                 swal('Effectué', 'La reserv_dispo a été modifiée avec succès.', 'success');
              //             }


              //             $('#reserv_dispo_form_modif')[0].reset();
              //             reserv_dispodataTable.ajax.reload();
              //         }
              //     })
              // });


          /* Changer statut */
          // $(document).on('click', '.delete', function(){
          //     var id_reserv_dispo = $(this).attr('id');
          //     var status = $(this).data("status");
          //     var btn_action = 'delete';

          //     swal({
          //         title: 'Changement du statut !',
          //         text: 'Souhaitez-vous changer le statut de la reserv_dispo ?',
          //         icon: 'warning',
          //         buttons: true,
          //         dangerMode: true,
          //     })
          //     .then((willDelete) => {
          //         if (willDelete) {

          //             $.ajax({
          //                 url:"reserv_dispo-action.php",
          //                 method:"POST",
          //                 data:{id_reserv_dispo:id_reserv_dispo, status:status, btn_action:btn_action},
          //                 success:function(data)
          //                 {
          //                     swal('Effectué',data,'success');

          //                     reserv_dispodataTable.ajax.reload();
          //                 }
          //             });

          //         } else {
          //         }
          //     });

          // });


  </script>

</body>
</html>