<?php
include('../database_connection.php');
include('../AddLogInclude.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_ARTICLE_RESTAU_EN;
} else {
    $page_name = TITRE_ARTICLE_RESTAU_FR;
}

$restaurant = 'active';
$article_restau = 'active';

// Renvoie à la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['type_compte'])) 
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à article_restau
if( isset($_SESSION['menu_article_restau']) && ($_SESSION['menu_article_restau'] == 'Inactif')) 
{
    header('location:tableau-de-bord-admin.php');
}


switch ($_SESSION['type_compte']) {

    case 1:
        addlog("Cons-01-article-restau", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-article-restau", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-article-restau", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-article-restau", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-article-restau", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
                    echo LISTE_ARTICLE_RESTAU_EN;
                } else { 
                    echo LISTE_ARTICLE_RESTAU_FR;
                }
                ?>
            </h2>
            <p class="section-lead">
            <?php 
                if ($_SESSION['lang'] == 'EN') { 
                    echo INTRO_ARTICLE_RESTAU_EN;
                } else { 
                    echo INTRO_ARTICLE_RESTAU_FR;
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
                                        echo BOUTON_NOUVEAU_ARTICLE_RESTAU_EN;
                                    } else { 
                                        echo BOUTON_NOUVEAU_ARTICLE_RESTAU_FR;
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
                            $export_bouton = BOUTON_EXPORTER_EN;
                        } else {
                            $export_pdf = EXPORT_PDF_FR;
                            $export_word = EXPORT_WORD_FR;
                            $export_excel = EXPORT_EXCEL_FR;
                            $export_bouton = BOUTON_EXPORTER_FR;
                        }
                  ?>
                    <form method="POST" action="../export/export-article-restau.php">
                        <div class="form-group" style="width:300px; float:right;">
                            <div class="input-group">
                                <select name="export_article_restau" class="custom-select" id="inputGroupSelect04">
                                <option value="pdf"><?php echo $export_pdf ?></option>
                                <option value="word"><?php echo $export_word ?></option>
                                <option value="excel"><?php echo $export_excel ?></option>
                                </select>
                                <div class="input-group-append">
                                    <button name="btn_export_article_restau" class="btn btn-primary" type="submit"><?php echo $export_bouton ?></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                        }
                    ?>
                    <div class="table-responsive">

                        <table id="article_restau_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">N°</th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo NOM_ARTICLE_RESTAU_EN;
                                        } else { 
                                            echo NOM_ARTICLE_RESTAU_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php 
                                        if ($_SESSION['lang'] == 'EN') { 
                                            echo DESC_ARTICLE_RESTAU_FR;
                                        } else { 
                                            echo DESC_ARTICLE_RESTAU_FR;
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

  <!-- Ajouter Modal -->
  <div id="article_restauModal" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="article_restau_form">
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
                                echo NOM_ARTICLE_RESTAU_EN;
                            } else { 
                                echo NOM_ARTICLE_RESTAU_FR;
                            }
                            ?>
                         *</label>
                          <input type="text" name="nom_article_restau" id="nom_article_restau" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label>
                          <?php 
                                if ($_SESSION['lang'] == 'EN') { 
                                    echo DESC_ARTICLE_RESTAU_FR;
                                } else { 
                                    echo DESC_ARTICLE_RESTAU_FR;
                                }
                            ?>
                            </label>
                          <textarea type="text" name="desc_article_restau" id="desc_article_restau" class="form-control"></textarea>
                      </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_article_restau" id="id_article_restau"/>
                      <input type="hidden" name="btn_action" id="btn_action"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton" name="action" id="action"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>

<!-- Consulter Modal -->
  
<div id="article_restauModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="article_restau_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="article_restau_details"></div>
                  </div>

              </div>
          </form>
      </div>
  </div>
  


  <!-- Modifier Modal -->
  <div id="article_restauModal_modif" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="article_restau_form_modif">
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
                                echo NOM_ARTICLE_RESTAU_EN;
                            } else { 
                                echo NOM_ARTICLE_RESTAU_FR;
                            }
                            ?>
                         *</label>
                          <input type="text" name="nom_article_restau_modif" id="nom_article_restau_modif" class="form-control" required />
                      </div>
                      <div class="form-group">
                          <label>
                          <?php 
                                if ($_SESSION['lang'] == 'EN') { 
                                    echo DESC_ARTICLE_RESTAU_EN;
                                } else { 
                                    echo DESC_ARTICLE_RESTAU_FR;
                                }
                            ?>
                            </label>
                          <textarea type="text" name="desc_article_restau_modif" id="desc_article_restau_modif" class="form-control"></textarea>
                      </div>

                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_article_restau_modif" id="id_article_restau_modif"/>
                      <input type="hidden" name="btn_action_modif" id="btn_action_modif"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_modif" name="action_modif" id="action_modif"></button>
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
      var article_restaudataTable = $('#article_restau_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url:"article-restau-fetch.php", //changer
              type:"POST"
          },
          "columnDefs":[
              {
                  "targets":[4 ], // changer l'index des colonnes qui ne seront pas triées
                  "orderable":false,
              },
          ],
          //"bSort" : false,
          "pageLength": 10
      });

      /* Affichage de la fenêtre d'ajout*/

          $('#add_button').click(function(){
              $('#article_restauModal').modal('show');
              $('#article_restau_form')[0].reset();
              $('.modal-title').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_AJOUT_ARTICLE_RESTAU_EN;} else { echo TITRE_AJOUT_ARTICLE_RESTAU_FR;}?>");
              $('.save-edit-bouton').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_ENREGISTRER_EN;} else { echo BOUTON_ENREGISTRER_FR;}?>");
              $('#btn_action').val('Enregistrer');
          });



      
            /* Enregistrer */

          $(document).on('submit','#article_restau_form', function(event){
              event.preventDefault();
              var form_data = $(this).serialize();
              $.ajax({
                  url:"article-restau-action.php", // changer
                  method:"POST",
                  data:form_data,
                  dataType:"json", // type de data de retour
                  success:function(data)
                  {
                      // changer
                      if(data == "Ce type de plat existe déjà dans la liste.") {
                        $('#article_restauModal').modal('hide');
                          $('#article_restau_form')[0].reset();
                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                           '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_ARTICLE_RESTAU_EN;} else { echo MESSAGE_DOUBLON_ARTICLE_RESTAU_FR;}?>',
                           'error');
                      }


                      if(data == "Le type de plat a été enregistré avec succès.") {
                          $('#article_restauModal').modal('hide');
                          $('#article_restau_form')[0].reset();

                          swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                          '<?php //if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_CREATION_ARTICLE_RESTAU_EN;} else { echo MESSAGE_SUCCES_CREATION_ARTICLE_RESTAU_FR;}?>','success');

                        }

                        article_restaudataTable.ajax.reload(); // recharger le tableau

                  }
              })
          });


            /* Consulter */

$(document).on('click', '.view', function(){
    var id_article_restau_view = $(this).attr("id");
    var btn_action_view = 'consulter';
    $.ajax({
        url:"article-restau-action.php",
        method:"POST",
        data:{id_article_restau_view:id_article_restau_view, btn_action_view:btn_action_view},
        dataType:"json",
        success:function(data)
        {
            $('#article_restauModal_view').modal('show');
            $('.modal-title_view').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CONSULTER_ARTICLE_RESTAU_EN; } else { echo TITRE_CONSULTER_ARTICLE_RESTAU_FR; } ?>");
            $('#article_restau_details').html(data);

        }
    })
});

/* fetch single */
$(document).on('click', '.update', function(){
        var id_article_restau_modif = $(this).attr("id");
        var btn_action_modif = 'fetch_single';
        $.ajax({
            url:"article-restau-action.php",
            method:"POST",
            data:{id_article_restau_modif:id_article_restau_modif, btn_action_modif:btn_action_modif},
            dataType:"json",
            success:function(data)
            {
                $('#article_restauModal_modif').modal('show');
                $('#nom_article_restau_modif').val(data.nom_article_restau);
                $('#desc_article_restau_modif').val(data.desc_article_restau); // dupliquer si necessaire
                $('.modal-title_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_MODIF_ARTICLE_RESTAU_EN; } else { echo TITRE_MODIF_ARTICLE_RESTAU_FR;} ?>");
                $('.save-edit-bouton_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_MODIFIER_EN;} else { echo BOUTON_MODIFIER_FR;}?>");
                $('#id_article_restau_modif').val(id_article_restau_modif);
                $('#btn_action_modif').val("Modifier");

            }
        })
    });

/* Modifier Submit */
    // Change
    $(document).on('submit','#article_restau_form_modif', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"article-restau-action.php",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
              //   console.log(data);
                if(data == "Ce type de plat existe déjà dans la liste.") {
                    $('#article_restauModal_modif').modal('hide');
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                     '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_ARTICLE_RESTAU_EN;} else { echo MESSAGE_DOUBLON_ARTICLE_RESTAU_FR;}?>',
                     'error');
                }


                if(data == "Le type de plat a été modifié avec succès.") {
                    $('#article_restauModal_modif').modal('hide');
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                    '<?php //if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_MODIF_ARTICLE_RESTAU_EN;} else { echo MESSAGE_SUCCES_MODIF_ARTICLE_RESTAU_FR;}?>',
                    'success');

                }


                $('#article_restau_form_modif')[0].reset();
                article_restaudataTable.ajax.reload();

            }
        })
    });










/* Changer statut */
// changer au besoin
$(document).on('click', '.delete', function(){
    var id_article_restau = $(this).attr('id');
    var status = $(this).data("status");
    var btn_action = 'delete';

    swal({
        title: '<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CHANGER_STATUT_EN;} else { echo TITRE_CHANGER_STATUT_FR;}?>',
        text: '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_CHANGER_STATUT_ARTICLE_RESTAU_EN;} else { echo MESSAGE_CHANGER_STATUT_ARTICLE_RESTAU_FR;}?>',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {

            $.ajax({
                url:"article-restau-action.php",
                method:"POST",
                data:{id_article_restau:id_article_restau, status:status, btn_action:btn_action},
                dataType: "JSON",
                success:function(data)
                {
                  if(data == "Actif") {
                      swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>',
                      '<?php // if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_ARTICLE_RESTAU_EN . STATUT_ACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_ARTICLE_RESTAU_FR . STATUT_ACTIF_FR; } ?>', 'success');
                  }
                  if(data == "Inactif") {
                      swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>',
                       '<?php //if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_ARTICLE_RESTAU_EN . STATUT_INACTIF_EN; } else { echo MESSAGE_STATUT_CHANGE_ARTICLE_RESTAU_FR . STATUT_INACTIF_FR; } ?>', 'success');
                  }

                    article_restaudataTable.ajax.reload();
                }
            });

        } else {
        }
    });

});


  </script>

</body>
</html>