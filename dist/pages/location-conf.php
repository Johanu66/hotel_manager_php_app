<?php
include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_list.php');

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') { $page_name = TITRE_LOCATION_CONF_EN; } else { $page_name = TITRE_LOCATION_CONF_FR;}

$conference = 'active';
$location_conf = 'active';

// Renvoie à la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à location_conf
if( isset($_SESSION['menu_location_conf']) && ($_SESSION['menu_location_conf'] == 'Inactif'))
{
    header('location:tableau-de-bord-admin.php');
}

switch ($_SESSION['type_compte']) {
    case 1:
        addlog("Cons-01-location-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-location-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-location-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-location-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-location-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
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
    <link href="location.css" rel="stylesheet" />
    <link href="pselect.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">

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
                            <?php if ($_SESSION['lang'] == 'EN') { echo LISTE_LOCATION_CONF_EN;} else { echo LISTE_LOCATION_CONF_FR;}?>
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
                                                <form method="POST">
                                                    <button type="button" name="add" id="add_button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accès: Tous les rôles sauf lecteur">
                                                    <?php
                                                        if ($_SESSION['lang'] == 'EN') {
                                                            echo BOUTON_NOUVELLE_LOCATION_CONF_EN;
                                                        } else {
                                                            echo BOUTON_NOUVELLE_LOCATION_CONF_FR;
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
                    <form method="POST" action="../export/export-location-conf.php">
                        <div class="form-group" style="width:300px; float:right;">
                            <div class="input-group">
                                <select name="export_location_conf" class="custom-select" id="inputGroupSelect04">
                                    <option value="pdf"><?php echo $export_pdf ?></option>
                                    <option value="word"><?php echo $export_word ?></option>
                                    <option value="excel"><?php echo $export_excel ?></option>
                                </select>
                                <div class="input-group-append">
                                    <button name="btn_export_location_conf" class="btn btn-primary" type="submit" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accès: Super Administrateur et Administrateur"><?php echo $export ?></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                        }
                    ?>

                    <div class="table-responsive">

                        <table id="location_conf_data" class="table table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo SALLE_LOCATION_CONF_EN;
                                        } else {
                                            echo SALLE_LOCATION_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo DATE_DEBUT_LOCATION_EN;
                                        } else {
                                            echo DATE_DEBUT_LOCATION_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo DATE_FIN_LOCATION_EN;
                                        } else {
                                            echo DATE_FIN_LOCATION_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo DUREE_LOCATION_CONF_EN;
                                        } else {
                                            echo DUREE_LOCATION_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo CLIENT_LOCATION_CONF_EN;
                                        } else {
                                            echo CLIENT_LOCATION_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo MOTIF_LOCATION_CONF_EN;
                                        } else {
                                            echo MOTIF_LOCATION_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo PRIX_LOCATION_CONF_EN;
                                        } else {
                                            echo PRIX_LOCATION_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo SERVICES_ADDI_LOCATION_CONF_EN;
                                        } else {
                                            echo SERVICES_ADDI_LOCATION_CONF_FR;
                                        }
                                    ?>
                                    </th>
                                    <th class="border-top" style="background-color: #f1f1f1 !important; color: black !important; font-size: 15px !important; font-weight: bold !important;">
                                    <?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo FACTURE_LOCATION_CONF_EN;
                                        } else {
                                            echo FACTURE_LOCATION_CONF_FR;
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
  <div id="location_confModal" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="location_conf_form">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div class="groups">
                          <div class="group_left">


                    <div class="form-group">
                        <label>Salle *</label>
                        <select name="id_salle_conf_fk_location" id="id_salle_conf_fk_location" class="form-control" required >
                            <option value=""><?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo CHOISIR_SALLE_CONF_EN;
                                        } else {
                                            echo CHOISIR_SALLE_CONF_FR;
                                        }
                                    ?></option>
                            <?php echo fill_salle_conf_list($connect);?>
                        </select>
                    </div>

                    <div class="row">
                    <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo DATE_DEBUT_LOCATION_EN;
                            } else {
                                echo DATE_DEBUT_LOCATION_FR;
                            }
                            ?>
                         *</label>
                          <input type="datetime-local" name="date_debut" id="date_debut" class="form-control" required />
                      </div>
                      <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo DATE_FIN_LOCATION_EN;
                            } else {
                                echo DATE_FIN_LOCATION_FR;
                            }
                            ?>
                         *</label>
                          <input type="datetime-local" name="date_fin" id="date_fin" class="form-control" required />
                      </div>
                    </div>


                   <!-- SERVICES ADDITIONNELS -->
                   <div class="form-group services_addi" id="services_addi">
                        <label><?php
                                if ($_SESSION['lang'] == 'EN') {
                                    echo SERVICES_ADDI_LOCATION_CONF_EN;
                                } else {
                                    echo SERVICES_ADDI_LOCATION_CONF_FR;
                                }
                                ?></label>



                        <div class="input-group select_block" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">
                         <select class="custom-select" name="id_service_conf[]" style="width:95%;">
                                <option value="" selected><?php
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo CHOISIR_SERVICE_LOCATION_CONF_EN;
                                    } else {
                                        echo CHOISIR_SERVICE_LOCATION_CONF_FR;
                                    }
                                    ?></option>
                                <?php echo fill_service_conf_list($connect);?>
                            </select>

                            <div class="input-group-append ">
                                <button class="btn btn-primary btn_more select_block_button" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;">+</button>
                            </div>
                        </div>
                    </div>


                          </div>
                            <div class="group_right">
                            <!-- CLIENT DEBUT -->

                            <div id="client_ligne">
                      <div class="form-group">
                          <label>Client</label>
                          <br>

                          <div id="require_client" class="alert alert-light" style="padding:8px 12px;display:inline-block">
                            <i style="background-color:#ffa426; color:white; padding:4px 7px; margin-right:4px;" class="fas fa-exclamation"></i>
                            <span><?php
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo CLIENT_REQUIS_EN;
                                    } else {
                                        echo CLIENT_REQUIS_FR;
                                    }
                                    ?></span>
                          </div>
      
                          <select name="nom_prenom_client" id="nom_prenom_client" class="form-control chosen">
                              <option value="" selected><?php
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo CHOISIR_CLIENT_EN;
                                    } else {
                                        echo CHOISIR_CLIENT_FR;
                                    }
                                    ?></option>
                              <?php echo fill_client_list($connect);?>
                          </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nouveau_client"><?php
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo NOUVEAU_CLIENT_EN;
                                    } else {
                                        echo NOUVEAU_CLIENT_FR;
                                    }
                                    ?></label>
                      <input type="checkbox" name="nouveau_client" id="nouveau_client" class="new_client" />
                    </div>

                    <div id="infos_client">
                        <label><?php
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo INFOS_NOUVEAU_CLIENT_EN;
                                    } else {
                                        echo INFOS_NOUVEAU_CLIENT_FR;
                                    }
                                    ?></label>
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
                    <!-- CLIENT FIN -->

                    <div class="form-group">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo MOTIF_LOCATION_CONF_EN;
                            } else {
                                echo MOTIF_LOCATION_CONF_FR;
                            }
                            ?>
                         </label>
                          <textarea type="text" name="motif_location_conf" id="motif_location_conf" class="form-control"></textarea>
                      </div>

                   <div class="row">
                    <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo PRIX_LOCATION_CONF_EN;
                            } else {
                                echo PRIX_LOCATION_CONF_FR;
                            }
                            ?>
                         </label>
                          <input type="number" min=0 step=0.01 name="prix_location_conf" id="prix_location_conf" class="form-control" />
                      </div>
                   </div>

                            </div>
                      </div>
                  </div>


                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_location_conf" id="id_location_conf"/>
                      <input type="hidden" name="btn_action" id="btn_action"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton" name="action" id="action"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>





    <!-- Indiquer le prix Modal -->
    <div id="location_confModal_indiquer_prix" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="location_conf_indiquer_prix_form">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_indiquer_prix"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-lg-6">
                            <label>
                            <?php
                                if ($_SESSION['lang'] == 'EN') {
                                    echo INDIQUER_LE_PRIX_LOCATION_CONF_EN;
                                } else {
                                    echo INDIQUER_LE_PRIX_LOCATION_CONF_FR;
                                }
                                ?>
                            *</label>
                            <input type="number" min=0 step=0.01 name="prix_indiquer_prix" id="prix_indiquer_prix" class="form-control" required/>
                        </div>
                      </div>
                  </div>

                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_location_conf_indiquer_prix" id="id_location_conf_indiquer_prix"/>
                      <input type="hidden" name="btn_action_indiquer_prix" id="btn_action_indiquer_prix"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_indiquer_prix" name="action_indiquer_prix" id="action_indiquer_prix"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>






  <!-- Consulter Modal -->
  <div id="location_confModal_view" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="location_conf_form_view">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_view"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div id="location_conf_details"></div>
                  </div>

              </div>
          </form>
      </div>
  </div>









  <!-- Modifier Modal -->
  <div id="location_confModal_modif" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="location_conf_form_modif">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_modif"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-body">
                      <div class="groups">
                          <div class="group_left">


                    <div class="form-group">
                        <label>Salle *</label>
                        <select name="id_salle_conf_fk_location_modif" id="id_salle_conf_fk_location_modif" class="form-control" required >
                            <option value=""><?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo CHOISIR_SALLE_CONF_EN;
                                        } else {
                                            echo CHOISIR_SALLE_CONF_FR;
                                        }
                                    ?></option>
                            <?php echo fill_salle_conf_list($connect);?>
                        </select>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo DATE_DEBUT_LOCATION_EN;
                            } else {
                                echo DATE_DEBUT_LOCATION_FR;
                            }
                            ?>
                         *</label>
                          <input type="datetime-local" name="date_debut_modif" id="date_debut_modif" class="form-control" required />
                      </div>
                      <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo DATE_FIN_LOCATION_EN;
                            } else {
                                echo DATE_FIN_LOCATION_FR;
                            }
                            ?>
                         *</label>
                          <input type="datetime-local" name="date_fin_modif" id="date_fin_modif" class="form-control" required />
                      </div>
                    </div>

<!------------------------------------------------------------------------------------------------------->
                   <!-- SERVICES ADDITIONNELS -->
                   <div class="form-group services_addi" id="services_addi_modif">
                        <label>
                            <?php
                                if ($_SESSION['lang'] == 'EN') {
                                    echo SERVICES_ADDI_LOCATION_CONF_EN;
                                } else {
                                    echo SERVICES_ADDI_LOCATION_CONF_FR;
                                }
                            ?>
                        </label>

                        <p class="label_selected_options" id="services_addi_inclus"></p>

                        <div class="selectgroup selectgroup-pills selected_options" id="list_des_services_addi"></div>

                        <div class="input-group select_block_modif" style="margin-bottom:5px;">
                            <select class="form-control" name="id_service_conf_modif[]">
                                <option value="" selected></option>
                                <?php echo fill_service_conf_list($connect);?>
                            </select>

                            <!-- <div class="input-group-append ">
                                <button class="btn btn-primary btn_more select_block_button" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;">+</button>
                            </div> -->
                        </div>
                    </div>
<!------------------------------------------------------------------------------------------------------->

                          </div>
                            <div class="group_right">
                            <!-- CLIENT DEBUT -->
                            <div id="client_ligne_modif">
                      <div class="form-group">
                          <label>Client</label>
                          <br>
                          <div id="require_client_modif" class="alert alert-light" style="padding:8px 12px;display:inline-block">
                            <i style="background-color:#ffa426; color:white; padding:4px 7px; margin-right:4px;" class="fas fa-exclamation"></i>
                            <span><?php
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo CLIENT_REQUIS_EN;
                                    } else {
                                        echo CLIENT_REQUIS_FR;
                                    }
                                    ?></span>                          </div>
                          <select name="nom_prenom_client_modif" id="nom_prenom_client_modif" class="form-control chosen">
                              <option value=""><?php
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo CHOISIR_CLIENT_EN;
                                    } else {
                                        echo CHOISIR_CLIENT_FR;
                                    }
                                    ?></option>
                              <?php echo fill_client_list($connect);?>
                          </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nouveau_client_modif"><?php
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo NOUVEAU_CLIENT_EN;
                                    } else {
                                        echo NOUVEAU_CLIENT_FR;
                                    }
                                    ?></label>
                      <input type="checkbox" name="nouveau_client_modif" id="nouveau_client_modif" class="new_client_modif" />
                    </div>

                    <div id="infos_client_modif">
                        <label><?php
                                    if ($_SESSION['lang'] == 'EN') {
                                        echo INFOS_NOUVEAU_CLIENT_EN;
                                    } else {
                                        echo INFOS_NOUVEAU_CLIENT_FR;
                                    }
                                    ?></label>
                        <hr />
                        <div class="row">
                          <div class="form-group col-lg-6">
                              <input type="text" name="nom_client_modif" id="nom_client_modif" class="form-control" placeholder="Nom *" required/>
                          </div>
                          <div class="form-group col-lg-6">
                              <input type="text" name="prenom_client_modif" id="prenom_client_modif" class="form-control" placeholder="Prénom *" required/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-lg-6">
                              <input type="text" name="id_card_client_modif" id="id_card_client_modif" class="form-control" placeholder="Carte d'identité"/>
                          </div>
                          <div class="form-group col-lg-6">
                              <input type="text" name="passeport_client_modif" id="passeport_client_modif" class="form-control" placeholder="Passeport"/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-6">
                              <input type="text" name="tel_client_modif" id="tel_client_modif" class="form-control" placeholder="Télephone *" required/>
                          </div>
                          <div class="form-group col-lg-6">
                              <input type="email" name="email_client_modif" id="email_client_modif" class="form-control" placeholder="E-mail"/>
                          </div>
                        </div>

                        <hr />
                    </div>
                    <!-- CLIENT FIN -->

                    <div class="form-group">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo MOTIF_LOCATION_CONF_EN;
                            } else {
                                echo MOTIF_LOCATION_CONF_FR;
                            }
                            ?>
                         </label>
                          <textarea type="text" name="motif_location_conf_modif" id="motif_location_conf_modif" class="form-control"></textarea>
                      </div>

                   <div class="row">
                    <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo PRIX_LOCATION_CONF_EN;
                            } else {
                                echo PRIX_LOCATION_CONF_FR;
                            }
                            ?>
                         </label>
                          <input type="number" min=0 step=0.01 name="prix_location_conf_modif" id="prix_location_conf_modif" class="form-control" />
                      </div>
                   </div>

                            </div>
                      </div>
                  </div>


                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_location_conf_modif" id="id_location_conf_modif"/>
                      <input type="hidden" name="btn_action_modif" id="btn_action_modif"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_modif" name="action_modif" id="action_modif"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>





    <!-- Formulaire Afficher Facture -->
    <form id="afficher_facture_form" style="display:none" method="POST" action="../facture/facture-conf.php">
        <input type="hidden" name="id_location_conf" value="" />
        <input type="submit" name="" />
    </form>






  <!-- Nouvelle Facture Modal -->
  <div id="location_confModal_new_facture" class="modal fade">
      <div class="modal-dialog">
          <form method="post" id="location_conf_new_facture_form">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_new_facture"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                      <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                 echo DATE_FACTURE_LOCATION_CONF_EN;
                            } else {
                                 echo DATE_FACTURE_LOCATION_CONF_FR;
                            }
                            ?>
                         *</label>
                          <input type="datetime-local" name="date_new_facture" id="date_new_facture" class="form-control" required />
                      </div>

                      <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                 echo NUM_FACTURE_LOCATION_CONF_EN;
                            } else {
                                 echo NUM_FACTURE_LOCATION_CONF_FR;
                            }
                            ?>
                         *</label>
                          <input type="text" name="num_new_facture" id="num_new_facture" class="form-control" required />
                      </div>
                    </div>

                      <div class="form-group">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                 echo METHODE_PAIEMENT_FACTURE_LOCATION_CONF_EN;
                            } else {
                                 echo METHODE_PAIEMENT_FACTURE_LOCATION_CONF_FR;
                            }
                            ?>
                         *</label>
                         <select name="methode_paiement_new_facture" id="methode_paiement_new_facture" class="form-control" required >
                            <option value=""><?php
                                        if ($_SESSION['lang'] == 'EN') {
                                            echo CHOISIR_METHODE_PAIEMENT_EN;
                                        } else {
                                            echo CHOISIR_METHODE_PAIEMENT_FR;
                                        }
                                    ?></option>
                            <?php echo fill_methode_paiement_list($connect);?>
                        </select>
                      </div>

                      <div class="row" style="height:70px;">
                        <div class="form-group col-lg-4" style="margin-top:10px;">
                            <input type="checkbox" name="select_tva_new_facture" value="on" id="select_tva_new_facture" class="" style="margin-top:0px;"/>
                            <label for="select_tva_new_facture" style="position:relative;bottom:2px;">
                            <?php
                                if ($_SESSION['lang'] == 'EN') {
                                    echo SELECT_TVA_EN;
                                } else {
                                    echo SELECT_TVA_FR;
                                }
                                ?>
                            </label>
                        </div>

                        <div class="form-group" style="margin-top:8px;padding-right:10px;">
                            <label>
                            <?php
                                if ($_SESSION['lang'] == 'EN') {
                                    echo TVA_EN;
                                } else {
                                    echo TVA_FR;
                                }
                                ?>* :</label>
                        </div>

                        <div class="form-group">
                            <input type="number" min=0 max=100 step=0.01 name="tva_new_facture" id="tva_new_facture" class="form-control" style="width:100px;" required />
                        </div>

                        <div class="form-group" style="margin-top:8px;padding-left:5px;font-size:17px;">%</div>

                    </div>

                    <div class="row">
                      <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                 echo MONTANT_HT_LOCATION_CONF_EN;
                            } else {
                                 echo MONTANT_HT_LOCATION_CONF_FR;
                            }
                            ?>
                         </label>
                          <input type="text" name="montant_ht_new_facture" id="montant_ht_new_facture" class="form-control" readonly />
                      </div>

                      <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo VALEUR_TVA_EN;
                            } else {
                                echo VALEUR_TVA_FR;
                            }
                            ?>
                         </label>
                          <input type="text" name="valeur_tva_new_facture" id="valeur_tva_new_facture" class="form-control" readonly />
                      </div>
                    </div>


                    <div class="row">
                      <div class="form-group col-lg-6">
                          <label>
                          <?php
                            if ($_SESSION['lang'] == 'EN') {
                                 echo MONTANT_TTC_LOCATION_CONF_EN;
                            } else {
                                 echo MONTANT_TTC_LOCATION_CONF_FR;
                            }
                            ?>
                         </label>
                          <input type="text" name="montant_ttc_new_facture" id="montant_ttc_new_facture" class="form-control" readonly />
                      </div>
                    </div>

                    <div class="form-group">
                        <label>
                        <?php 
                            if ($_SESSION['lang'] == 'EN') { 
                                echo PRIX_EN_LETTRES_LOCATION_CONF_EN;
                            } else { 
                                echo PRIX_EN_LETTRES_LOCATION_CONF_FR;
                            }
                        ?>
                        *</label>
                        <textarea type="text" name="prix_en_lettres_new_facture" id="prix_en_lettres_new_facture" class="form-control" required></textarea>
                    </div>





                  </div>
                  <div class="modal-footer bg-whitesmoke">
                      <input type="hidden" name="id_location_conf_new_facture" id="id_location_conf_new_facture"/>
                      <input type="hidden" name="btn_action_new_facture" id="btn_action_new_facture"/>
                      <button type="submit" class="btn btn-primary btn-shadow save-edit-bouton_new_facture" name="action_new_facture" id="action_new_facture"></button>
                  </div>
              </div>
          </form>
      </div>
  </div>


  <!-- MODAL Test -->
  <div id="modal_test" class="modal fade">
      <div class="modal-dialog">
          <form method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title_new_facture">Titre</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">

                    <div class="form-group" id="pselect">
                        <label>pSelect</label>

                        <p class="label_selected_options">Voici les options sélectionnées</p>
                        <div class="selectgroup selectgroup-pills selected_options"></div>

                        <div class="input-group select_block">
                            <select class="form-control" name="name">
                                <option value="" selected>Choose an option</option>
                            </select>
                        </div>
                    </div>


                  </div>
                  <div class="modal-footer bg-whitesmoke">
                      <button type="submit" class="btn btn-primary btn-shadow " name="action_new_facture" id="">Valider</button>
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
  <script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/modules-datatables.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/js/chosen.jquery.min.js"></script>

  <script src="pselect.js"></script>


  <script type="text/javascript">

    // Modal Test pSelect
    // $('#modal_test').modal('show');
    // $('.label_selected_options').hide();
    // $('.selected_options').hide();
    




    // convertit le json des options en options html à insérer dans un select
    function pselectFormatOptions(json_obj) {
        let output = '';
        for (const i in json_obj) {
            let val = json_obj[i][0];
            let label = json_obj[i][1];
            output += '<option value="' + val + '">' + label + '</option>';
        }
        return output;
    }

    // execute l'ajax dans fetch_options_func, formatte le json retourné par l'ajax,
    // et insère ce resultat formatté dans le select contenu dans pselect_jquery
    function pselectFillSelect(pselect_jquery, default_option, fetch_options_func) {
        return fetch_options_func().done( function(options){
            console.log(options);
            formatted_options = default_option + pselectFormatOptions(options);
            pselect_jquery.find('select').html(formatted_options);
        })
    }

    pselect = $('#pselect');
    DEFAULT_OPTION = '<option value="">Choisir une option</option>';
    function testFetchOptions(){
        return $.ajax({
            url: "pselect.php",
            method: "POST",
            data: {action:"fetch_options"},
            dataType: "json"
        })
    }

    res = pselectFillSelect(pselect, DEFAULT_OPTION, testFetchOptions)
    console.log(res);





    SELECTED = [];
    $('#pselect select').on('change', function(){
        // si val n'est pas nulle ajouter val-name à selected_options
        if ($(this).val() != "") {
            option_json = {
                val: $(this).val(),
                label: $(this).find('option[value="' + $(this).val() + '"]').text()
            }
            addOptionToSelected(option_json, SELECTED, $(this).parent().parent('#pselect'))
            removeOptionFromSelectByValue(option_json.val, $(this))
        }
    })

    // removeOptionFromSelectByValue
    // removeOptionFromSelectByLabel
    function removeOptionFromSelectByValue(val, select_jquery) {
        select_jquery.find('option[value="' + val + '"]').remove();
    }
    function addOptionToSelect(option_json, select_jquery) {
        html = '<option value="' + option_json.val + '">' + option_json.label + '</option>';
        select_jquery.append(html);
    }

    // returns true if every elem of arr === undefined
    function containsOnlyEmpty(arr){
        for (elem in arr){
            if (elem !== undefined){
                return false
            }
        }
        return true
    }

    // adds an option to the list of selected options, and displays it
    function addOptionToSelected(option_json, selected_options, pselect_jquery) {
        if (selected_options.length == 0 || containsOnlyEmpty(selected_options)) {
            pselect_jquery.find('.label_selected_options').show();
            pselect_jquery.find('.selected_options').show();
        }
        pselect_jquery.find('.selected_options').append(createSingeSelectedItem(option_json, selected_options, pselect_jquery))
        selected_options.push(option_json);
    }

    // removes an option from the list of selected options, and hides it
    function removeOptionFromSelected(val, selected_options, pselect_jquery){
        console.log('value: ' + val);
        pselect_jquery.find('label[data-val="' + val + '"]').remove();

        // remove from selected options
        for (i=0; i<selected_options.length; i++) {
            if (selected_options[i] !== undefined && selected_options[i].val == val) {
                delete selected_options[i];
            }
        }

        if (selected_options.length == 0 || containsOnlyEmpty(selected_options)) {
            pselect_jquery.find('.label_selected_options').hide();
            pselect_jquery.find('.selected_options').hide();
        }
    }

    function actionClickOnRemoveChip(remove_chip_jquery, selected_options, pselect_jquery){
        option_json = {
            val: remove_chip_jquery.parent('.selectgroup-item').data("val"),
            label: remove_chip_jquery.siblings('.selectgroup-button').text()
        }
        select_jquery = pselect_jquery.find('select'); 
        removeOptionFromSelected(option_json.val, selected_options, pselect_jquery)
        addOptionToSelect(option_json, select_jquery)
    }

    // format an item as displayed in the list of selected items 
    function createSingeSelectedItem(option_json, selected_options, pselect_jquery){
        content = '' +
        // '<input type="checkbox" name="id_service_conf_modif[]" value="' + id_services_addi[i] + '"' +
        // ' style="position:absolute; width:0px; height:0px;" checked />' +
        '<label class="selectgroup-item" data-val="' + option_json.val + '">' +
            '<span class="selectgroup-button" style="cursor:context-menu;">' + option_json.label + '</span>' +
            '<span class="remove-chip">-</span>' +
        '</label>';
        item = $(content)

        // add events
        item.find('.remove-chip').hover(function() {
            $(this).siblings('.selectgroup-button').toggleClass('chip-hover');
        })
        item.find('.remove-chip').click( function(){
            actionClickOnRemoveChip($(this), selected_options, pselect_jquery)
        })

        return item;
    }





















    $('.chosen').chosen( {width: "100%"});

    /* Affichage de la liste */
    var location_confdataTable = $('#location_conf_data').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"location-conf-fetch.php",
            type:"POST"
        },
        "columnDefs":[
            {
                "targets":[7,9],
                "orderable":false,
            },
        ],
        //"bSort" : false,
        "pageLength": 10
    });



    // // // AJOUTER MODAL
    // Dates
    $('#date_debut').on('change', function(){
        $('#date_fin').attr('min', $(this).val());
    })
    // Services addi

    // Action case à cocher Nouveau client
    $('input[name="nouveau_client"]').click(function() {
        if ($(this).prop("checked") == true) {
            $('#client_ligne').hide();
            $('#infos_client').show(500);
            $('#nom_client').attr('required', 'required');
            $('#prenom_client').attr('required', 'required');
            $('#tel_client').attr('required', 'required');
        } else {
            // todo: reset le chosen
            $('#client_ligne').show(500);
            $('#infos_client').hide();
            $('#nom_client').removeAttr('required');
            $('#prenom_client').removeAttr('required');
            $('#tel_client').removeAttr('required');
        }
    });
    // require client
    $('#nom_prenom_client').on('change', function(){
        if ($(this).val() != "") {
            $('#require_client').hide(300);
        }
    })


    /* Affichage de la fenêtre d'ajout*/
    $('#add_button').click(function(){
        $('#location_confModal').modal('show');

        // // resets
        $('#location_conf_form')[0].reset();
        // reset date
        $('#date_fin').removeAttr('min');
        // reset services addi // todo
        removeAllButFirstSelectBlock();
        //reset le chosen
        $('#nom_prenom_client').next('.chosen-container').find('.chosen-single span').text(
            $('#nom_prenom_client option[value=""]').text()
        );
        // reset require_client
        $('#require_client').hide();
        // reset client
        $('#client_ligne').show(500);
        $('#infos_client').hide();
        $('#nom_client').removeAttr('required');
        $('#prenom_client').removeAttr('required');
        $('#tel_client').removeAttr('required');

        $('.modal-title').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_AJOUT_LOCATION_CONF_EN;} else { echo TITRE_AJOUT_LOCATION_CONF_FR;}?>");
        $('.save-edit-bouton').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_ENREGISTRER_EN;} else { echo BOUTON_ENREGISTRER_FR;}?>");
        $('#btn_action').val('Enregistrer');
    });


    /* Enregistrer */
    $(document).on('submit','#location_conf_form', function(event){
        event.preventDefault();
        // require_client
        if( ($('.new_client').prop("checked") == false) && ($('#nom_prenom_client').val() == "")){
            $('#require_client').show(300);
            return;
        } else {
            $('#require_client').hide(300);
        }
        // services addi
        $('#location_conf_form .select_block select').attr('disabled', false);

        var form_data = $(this).serialize();
        $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data:form_data,
            dataType:"json",
            success: function(data) {

                if(data == "La salle sélectionnée est indisponible à cette période.") {
                    $('#location_confModal').modal('hide');
                    $('#location_conf_form')[0].reset();
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                    '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_INDISPONIBLE_LOCATION_CONF_EN;} else { echo MESSAGE_INDISPONIBLE_LOCATION_CONF_FR;}?>',
                    'error');
                }

                if(data == "Ce client existe déjà.") {
                    $('#location_confModal').modal('hide');
                    $('#location_conf_form')[0].reset();
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                    '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_CLIENT_LOCATION_CONF_EN;} else { echo MESSAGE_DOUBLON_CLIENT_LOCATION_CONF_FR;}?>',
                    'error');
                }

                if(data == "La location a été enregistrée avec succès.") {
                    $('#location_confModal').modal('hide');
                    $('#location_conf_form')[0].reset();
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                    '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_CREATION_LOCATION_CONF_EN;} else { echo MESSAGE_SUCCES_CREATION_LOCATION_CONF_FR;}?>',
                    'success');
                }

                location_confdataTable.ajax.reload();
            }
        })
    });







    // // // INDIQUER PRIX
    $(document).on('click', '.indiquer_prix', function(){
        var id_location_conf_indiquer_prix = $(this).attr("id");
        $('#location_confModal_indiquer_prix').modal('show');
        $('#location_conf_indiquer_prix_form')[0].reset();
        $('.modal-title_indiquer_prix').text("<?php if ($_SESSION['lang'] == 'EN') { echo INDIQUER_LE_PRIX_EN;} else { echo INDIQUER_LE_PRIX_FR;}?>");
        $('.save-edit-bouton_indiquer_prix').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_ENREGISTRER_EN;} else { echo BOUTON_ENREGISTRER_FR;}?>");
        $('#id_location_conf_indiquer_prix').val(id_location_conf_indiquer_prix);
        $('#btn_action_indiquer_prix').val('Indiquer_Prix');
    });

    $(document).on('submit','#location_conf_indiquer_prix_form', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data:form_data,
            dataType:"json",
            success: function(data) {

                if(data == "Le prix a été enregistré avec succès.") {
                    $('#location_confModal_indiquer_prix').modal('hide');
                    $('#location_conf_indiquer_prix_form')[0].reset();
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                    '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_INDIQUER_PRIX_LOCATION_CONF_EN;} else { echo MESSAGE_SUCCES_INDIQUER_PRIX_LOCATION_CONF_FR;}?>',
                    'success');
                }

                location_confdataTable.ajax.reload(); 
            }
        })
    });








    // // // CONSULTER
    $(document).on('click', '.view', function(){
        var id_location_conf_view = $(this).attr("id");
        var btn_action_view = 'consulter';
        $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data:{id_location_conf_view:id_location_conf_view, btn_action_view:btn_action_view},
            dataType:"json",
            success: function(data) {
                $('#location_confModal_view').modal('show');
                $('.modal-title_view').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_CONSULTER_LOCATION_CONF_EN; } else { echo TITRE_CONSULTER_LOCATION_CONF_FR; } ?>");
                $('#location_conf_details').html(data);
            }
        })
    });







    // // // SUPPRIMER
    $(document).on('click', '.delete', function() {
        var id_location_conf = $(this).attr('id');
        var btn_action = 'delete';

        swal({
            title: '<?php if ($_SESSION['lang'] == 'EN') { echo SUPPRIMER_EN;} else { echo SUPPRIMER_FR;}?>',
            text: '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_CHANGER_STATUT_LOCATION_CONF_EN;} else { echo MESSAGE_CHANGER_STATUT_LOCATION_CONF_FR;}?>',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:"location-conf-action.php",
                    method:"POST",
                    data:{id_location_conf:id_location_conf, btn_action:btn_action},
                    dataType: "JSON",
                    success: function(data) {
                        if(data == "Inactif") {
                            swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN; } else { echo EFFECTUE_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_STATUT_CHANGE_LOCATION_CONF_EN; } else { echo MESSAGE_STATUT_CHANGE_LOCATION_CONF_FR; } ?>', 'success');
                        }

                        location_confdataTable.ajax.reload();
                    }
                });
            }
        });
    });











    // // // MODIFIER MODAL
    // Dates
    $('#date_debut_modif').on('change', function(){
        $('#date_fin_modif').attr('min', $(this).val());
    })
    // Services addi //todo

    // Action case à cocher Nouveau client
    $('input[name="nouveau_client_modif"]').click(function(){
        if ($(this).prop("checked") == true) {
            $('#client_ligne_modif').hide();
            $('#infos_client_modif').show(500);
            $('#nom_client_modif').attr('required', 'required');
            $('#prenom_client_modif').attr('required', 'required');
            $('#tel_client_modif').attr('required', 'required');
        } else {
            $('#client_ligne_modif').show(500);
            $('#infos_client_modif').hide();
            $('#nom_client_modif').removeAttr('required');
            $('#prenom_client_modif').removeAttr('required');
            $('#tel_client_modif').removeAttr('required');
        }
    });
    // require client
    $('#nom_prenom_client_modif').on('change', function(){
        if ($(this).val() != "") {
            $('#require_client_modif').hide(300);
        }
    })


    function formatServicesAddi(jquery_obj, id_services_addi, services_addi) {
        content = '';
        for (let i = 0; i < services_addi.length; i++) {
            if (services_addi[i] != '') {
            checkbox = '<input type="checkbox" name="id_service_conf_modif[]" value="' + id_services_addi[i] + '"' +
                ' style="position:absolute; width:0px; height:0px;" checked />';
            content += checkbox +
            '<label class="selectgroup-item">' +
                '<span class="selectgroup-button" style="cursor:context-menu;">' + services_addi[i] + '</span>' +
                '<span class="remove-chip">-</span>' +
            '</label>';
            }
        }
        elem = $(content);

        elem.find('.remove-chip').hover( function() {
            $(this).siblings('.selectgroup-button').toggleClass('chip-hover');
        }, function() {
            $(this).siblings('.selectgroup-button').toggleClass('chip-hover');
        });

        elem.find('.remove-chip').click( function(){
        // $(this).parent('.selectgroup-item').hide(300);
        $(this).parent('.selectgroup-item').prev('input[type="checkbox"]').attr('checked', false);
        $(this).parent('.selectgroup-item').prev('input[type="checkbox"]').remove();
        $(this).parent('.selectgroup-item').remove();
        updateSelectModif();

        });

        jquery_obj.append(elem);
        return content;
    }


    /* fetch single */
    $(document).on('click', '.update', function(){
        var id_location_conf_modif = $(this).attr("id");
        var btn_action_modif = 'fetch_single';
        $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data:{id_location_conf_modif:id_location_conf_modif, btn_action_modif:btn_action_modif},
            dataType:"json",
            success: function(data) {
                $('#location_confModal_modif').modal('show');

                // // resets
                $('#location_conf_form_modif')[0].reset();
                // reset date
                $('#date_fin_modif').removeAttr('min');
                // reset services addi // todo
                removeAllButFirstSelectBlockModif();
                $('#list_des_services_addi').html('');
                //reset le chosen
                $('#nom_prenom_client_modif').next('.chosen-container').find('.chosen-single span').text(
                $('#nom_prenom_client_modif option[value=""]').text()
                );
                // reset require_client
                $('#require_client_modif').hide();
                // reset client
                $('#client_ligne_modif').show(500);
                $('#infos_client_modif').hide();
                $('#nom_client_modif').removeAttr('required');
                $('#prenom_client_modif').removeAttr('required');
                $('#tel_client_modif').removeAttr('required');


                // inserer les données
                $('#id_salle_conf_fk_location_modif').val(data.id_salle);
                $('#date_debut_modif').val(data.date_debut);
                $('#date_fin_modif').val(data.date_fin);
                $('#date_fin_modif').attr('min', data.date_debut);

                if (data.id_services_addi.length == 0){
                    $('#services_addi_inclus').text('<?php
                            if ($_SESSION['lang'] == "EN") {
                                echo AUCUN_SERVICE_ADDI_INCLU_LOCATION_CONF_EN;
                            } else {
                                echo AUCUN_SERVICE_ADDI_INCLU_LOCATION_CONF_FR;
                            }
                        ?>'
                    );
                    $('#services_addi_modif option[value=""]').text('<?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo CHOISIR_SERVICE_LOCATION_CONF_EN;
                            } else {
                                echo CHOISIR_SERVICE_LOCATION_CONF_FR;
                            }
                            ?>'
                    );
                } else {
                    $('#services_addi_inclus').text('<?php
                            if ($_SESSION['lang'] == "EN") {
                                echo VOICI_SERVICE_ADDI_INCLU_LOCATION_CONF_EN;
                            } else {
                                echo VOICI_SERVICE_ADDI_INCLU_LOCATION_CONF_FR;
                            }
                        ?>'
                    );
                    $('#services_addi_modif option[value=""]').text('<?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo CHOISIR_SERVICE_MODIF_LOCATION_CONF_EN;
                            } else {
                                echo CHOISIR_SERVICE_MODIF_LOCATION_CONF_FR;
                            }
                            ?>'
                    );
                }
                formatServicesAddi($('#list_des_services_addi'), data.id_services_addi, data.nom_services_addi);
                updateSelectModif();

                $('#nom_prenom_client_modif option[value="' + data.id_client + '"]').attr('selected', true);
                $('#nom_prenom_client_modif').next('.chosen-container').find('.chosen-single span').text(
                    $('#nom_prenom_client_modif option[value="' + data.id_client + '"]').text()
                );
                $('#motif_location_conf_modif').val(data.motif);
                $('#prix_location_conf_modif').val(data.prix_ht);

                $('.modal-title_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_MODIF_LOCATION_CONF_EN; } else { echo TITRE_MODIF_LOCATION_CONF_FR;} ?>");
                $('.save-edit-bouton_modif').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_MODIFIER_EN;} else { echo BOUTON_MODIFIER_FR;}?>");
                $('#id_location_conf_modif').val(id_location_conf_modif);
                $('#btn_action_modif').val("Modifier");
            }
        })
    });


    /* Modifier Submit */
    $(document).on('submit','#location_conf_form_modif', function(event){
        event.preventDefault();
        // require_client
        if( ($('.new_client_modif').prop("checked") == false) && ($('#nom_prenom_client_modif').val() == "")){
            $('#require_client_modif').show(300);
            return;
        } else {
            $('#require_client_modif').hide(300);
        }
        // services addi
        $('#location_conf_form_modif .select_block select').attr('disabled', false);

        var form_data = $(this).serialize();
        $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data:form_data,
            dataType:"json",
            success: function(data) {
                if(data == "La salle sélectionnée est indisponible à cette période.") {
                    $('#location_confModal_modif').modal('hide');
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                    '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_INDISPONIBLE_LOCATION_CONF_EN;} else { echo MESSAGE_INDISPONIBLE_LOCATION_CONF_FR;}?>',
                    'error');
                }

                if(data == "Ce client existe déjà.") {
                    $('#location_confModal_modif').modal('hide');
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                    '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_CLIENT_LOCATION_CONF_EN;} else { echo MESSAGE_DOUBLON_CLIENT_LOCATION_CONF_FR;}?>',
                    'error');
                }

                if(data == "La location a été modifiée avec succès.") {
                    $('#location_confModal_modif').modal('hide');
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                    '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_MODIF_LOCATION_CONF_EN;} else { echo MESSAGE_SUCCES_MODIF_LOCATION_CONF_FR;}?>',
                    'success');
                }

                $('#location_conf_form_modif')[0].reset();
                location_confdataTable.ajax.reload();
            }
        })
    });









    // // // NEW FACTURE
    // Calculer Montant TTC
    function calculerTTC() {
        var tva = $('#tva_new_facture').val();
        var montant_ht = $('#montant_ht_new_facture').val();
        var valeur_tva = 0;
        var montant_ttc = montant_ht;

        valeur_tva = (montant_ht * tva / 100).toFixed(2);
        $('#valeur_tva_new_facture').val(valeur_tva);
        $montant_ttc = (Number(montant_ht) + Number(valeur_tva)).toFixed(2);
        $('#montant_ttc_new_facture').val($montant_ttc);
    }

    // TVA
    $('#select_tva_new_facture').click(function() {
        if( $(this).prop("checked") == true) {
            $(this).parents('.form-group').siblings().show(500);
            $('#tva_new_facture').attr('required', 'required');
        } else {
            $('#tva_new_facture').val(0);
            calculerTTC();
            $(this).parents('.form-group').siblings().hide(300);
            $('#tva_new_facture').removeAttr('required');
        }
    });

    $(document).on('keyup', function(){calculerTTC();} );
    $('#tva_new_facture').change( function(){calculerTTC();} );


    /* Nouvelle Facture */
    $(document).on('click', '.new_facture', function(){
        var id_location_conf = $(this).attr("id");
        var btn_action = 'fetch_montant';
        $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data:{id_location_conf:id_location_conf, btn_action:btn_action},
            dataType:"json",
            success: function(data) {
                $('#location_confModal_new_facture').modal('show');
                // // resets
                $('#location_conf_new_facture_form')[0].reset();
                // tva
                $('#tva_new_facture').val(0);
                $('#select_tva_new_facture').parents('.form-group').siblings().hide();
                $('#tva_new_facture').removeAttr('required');

                $('#montant_ht_new_facture').val(data.montant_ht);
                calculerTTC();

                $('.modal-title_new_facture').text("<?php if ($_SESSION['lang'] == 'EN') { echo TITRE_NEW_FACTURE_LOCATION_CONF_EN; } else { echo TITRE_NEW_FACTURE_LOCATION_CONF_FR;} ?>");
                $('.save-edit-bouton_new_facture').text("<?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_NOUVELLE_FACTURE_EN;} else { echo BOUTON_NOUVELLE_FACTURE_FR;}?>");
                $('#id_location_conf_new_facture').val(id_location_conf);
                $('#btn_action_new_facture').val("New Facture");
            }
        })
    });


    /* Nouvelle Facture Submit */
    $(document).on('submit','#location_conf_new_facture_form', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data:form_data,
            dataType:"json",
            success: function(data) {
                console.log(data);
                if(data == "La facture a été éditée avec succes.") {
                    $('#location_confModal_new_facture').modal('hide');
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo EFFECTUE_EN;} else { echo EFFECTUE_FR;}?>',
                    '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_SUCCES_NOUVELLE_FACTURE_LOCATION_CONF_EN;} else { echo MESSAGE_SUCCES_NOUVELLE_FACTURE_LOCATION_CONF_FR;}?>',
                    'success');
                }

                if(data == "Une facture porte déjà ce numéro.") {
                    $('#location_confModal_new_facture').modal('hide');
                    swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_EN;} else { echo ERREUR_FR;}?>',
                    '<?php if ($_SESSION['lang'] == 'EN') { echo MESSAGE_DOUBLON_FACTURE_LOCATION_CONF_EN;} else { echo MESSAGE_DOUBLON_FACTURE_LOCATION_CONF_FR;}?>',
                    'error');
                }
                

                $('#location_conf_new_facture_form')[0].reset();
                location_confdataTable.ajax.reload();
            }
        })
    });








    // // // AFFICHER FACTURE
    $(document).on('click', '.view_facture', function(event){
        event.preventDefault();
        $id_location_conf = $(this).attr('id');
        $('input[name="id_location_conf"]').val($id_location_conf);
        $('#afficher_facture_form').submit();
    })





















          function selectServicesAddi(jquery_obj, services_addi) {
        // updateSelectedServicesAddiModif();
          for (let i = 0; i < services_addi.length; i++) {
              id_service = services_addi[i];
              jquery_obj.find('.select_block').last().find('option[value="' + id_service + '"]').attr('selected', true);
              moreSelectBlockModif(jquery_obj.find('.select_block').last().find('.btn_more'));
              console.log(id_service);
          }
      }

      function afficherServicesAddi(jquery_obj, services_addi){
          content = '';
          first = true;
          for (let i = 0; i < services_addi.length; i++) {
              if (services_addi[i] != '') {
                  if (first) {
                    first = false;
                  } else {
                      content += ' - ';
                  }
                  content += services_addi[i];
              }
          }
          jquery_obj.text(content);
          return content;
      }


    var selected_services_addi = [];
    var selected_services_addi_modif = [];

    function updateSelectedServicesAddi() {
        selected_services_addi = [];
        let select = $('select[name="id_service_conf[]"]');

        select.each(function(){
            selected_services_addi.push($(this).val());
        })
    }
    function updateSelectedServicesAddiModif() {
        selected_services_addi_modif = [];
        let select = $('select[name="id_service_conf_modif[]"]');

        select.each(function(){
            selected_services_addi_modif.push($(this).val());
        })
    }
    // function updateSelectedCaracSalleConfModif() {
    //     selected_carac_salle_conf_modif = [];
    //     let select = $('select[name="id_carac_conf_modif[]"]');

    //     select.each(function(){
    //         selected_carac_salle_conf_modif.push($(this).val());
    //     })
    // }


    function moreSelectBlock(btn_more){
        let select_block = btn_more.parents('.select_block');
        select_block.find('select').attr('disabled', true);
        select_block.after(newSelectBlock());
        select_block.find('.select_block_button').hide();
    }

    function lessSelectBlock(btn_less){
        let select_block = btn_less.parents('.select_block');
        select_block.prev('.select_block').find('select').attr('disabled', false);
        select_block.prev('.select_block').find('.select_block_button').show();
        select_block.remove();
    }

    function moreSelectBlockModif(btn_more){
        let select_block = btn_more.parents('.select_block');
        select_block.find('select').attr('disabled', true);
        select_block.after(newSelectBlockModif());
        select_block.find('.select_block_button').hide();
    }

    function lessSelectBlockModif(btn_less){
        let select_block = btn_less.parents('.select_block');
        select_block.prev('.select_block').find('select').attr('disabled', false);
        select_block.prev('.select_block').find('.select_block_button').show();
        select_block.remove();
    }

    // function moreSelectBlockModif(btn_more){
    //     let select_block = btn_more.parents('.select_block');
    //     select_block.find('select').attr('disabled', true);
    //     select_block.after(newSelectBlockModif());
    //     select_block.find('.select_block_button').hide();
    // }

    // function lessSelectBlockModif(btn_less){
    //     let select_block = btn_less.parents('.select_block');
    //     select_block.prev('.select_block').find('select').attr('disabled', false);
    //     select_block.prev('.select_block').find('.select_block_button').show();
    //     select_block.remove();
    // }

    function removeAllButFirstSelectBlock() {
        // let list_of_select_block = document.getElementsByClassName('select_block');
        let list_of_select_block = document.getElementById('services_addi').querySelectorAll('.select_block');
        let len = list_of_select_block.length;
        for (let i = len-1; i >= 0; i--) {
            if (i != 0) {
                let elem = $(list_of_select_block[i]);
                // console.log(elem);
                lessSelectBlock(elem.find('select'));
            }
        }
    }
    function removeAllButFirstSelectBlockModif() {
        // let list_of_select_block = document.getElementsByClassName('select_block');
        let list_of_select_block = document.getElementById('services_addi_modif').querySelectorAll('.select_block');
        let len = list_of_select_block.length;
        for (let i = len-1; i >= 0; i--) {
            if (i != 0) {
                let elem = $(list_of_select_block[i]);
                // console.log(elem);
                lessSelectBlock(elem.find('select'));
            }
        }
    }

    // function removeAllButFirstSelectBlockModif() {
    //     // let list_of_select_block = document.getElementsByClassName('select_block');
    //     let list_of_select_block = document.getElementById('carac_salle_conf_modif').querySelectorAll('.select_block');
    //     let len = list_of_select_block.length;
    //     for (let i = len-1; i >= 0; i--) {
    //         if (i != 0) {
    //             let elem = $(list_of_select_block[i]);
    //             lessSelectBlock(elem.find('select'));
    //         }
    //     }
    // }

    function notSelected(json_obj) {
        let not_selected = [];
        for (const i in json_obj) {
            let service_conf = json_obj[i];
            let id_service_conf = service_conf[0];
            let selected = false;
            for (const j in selected_services_addi) {
                if (id_service_conf == selected_services_addi[j]) {
                    selected = true;
                    break;
                }
            }
            if (!selected) {
                not_selected.push(service_conf);
            }
        }
        return not_selected;
    }

    function notSelectedModif(json_obj) {
        let not_selected = [];
        for (const i in json_obj) {
            let service_conf = json_obj[i];
            let id_service_conf = service_conf[0];
            let selected = false;
            for (const j in selected_services_addi_modif) {
                if (id_service_conf == selected_services_addi_modif[j]) {
                    selected = true;
                    break;
                }
            }
            if (!selected) {
                not_selected.push(service_conf);
            }
        }
        return not_selected;
    }

    // function notSelectedModif(json_obj) {
    //     let not_selected = [];
    //     for (const i in json_obj) {
    //         let carac_conf = json_obj[i];
    //         let id_carac_conf = carac_conf[0];
    //         let selected = false;
    //         for (const j in selected_carac_salle_conf_modif) {
    //             if (id_carac_conf == selected_carac_salle_conf_modif[j]) {
    //                 selected = true;
    //                 break;
    //             }
    //         }
    //         if (!selected) {
    //             not_selected.push(carac_conf);
    //         }
    //     }
    //     return not_selected;
    // }

    function formatOptions(json_obj) {
        let output = '';
        for (const i in json_obj) {
            let id_service_conf = json_obj[i][0];
            let nom_service_conf = json_obj[i][1];
            output += '<option value="' + id_service_conf + '">' + nom_service_conf + '</option>';
        }
        return output;
    }

    function newSelectBlock() {
        // get_carac_salle_list
        let select_block = $('<div></div>');
        select_block.addClass('select_block');
        let content =  '' +
            '<div class="input-group" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
                '<select class="custom-select" name="id_service_conf[]" style="width:95%;">' +
                    '<option value="" selected><?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo CHOISIR_SERVICE_LOCATION_CONF_EN;
                            } else {
                                echo CHOISIR_SERVICE_LOCATION_CONF_FR;
                            }
                        ?></option>' +
                    '<?php //echo fill_carac_salle_list($connect);?>' +
                '</select>' +
                '<div class="input-group-append">' +
                    '<button class="btn btn-primary select_block_button btn_less" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;">-</button>' +
                '</div>' +
            '</div>' +
            '' +
            '<div class="input-group select_block_button" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
                '<div></div>' +
                '<div class="input-group-append">' +
                    '<button class="btn btn-primary btn_more" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;height:40px;">+</button>' +
                '</div>' +
            '</div>';

        select_block.html(content);
        select_block.find('.btn_more').click(function(){
            updateSelectedServicesAddi();
            if (select_block.find('select').val() != "") {
                moreSelectBlock($(this));
            }
        });
        select_block.find('select').on('change', function(){
            updateSelectedServicesAddi();
            if (select_block.find('select').val() != "") {
                moreSelectBlock($(this));
            }
        })
        select_block.find('.btn_less').click(function(){
            updateSelectedServicesAddi();
            lessSelectBlock($(this));
        });
        // select_block.hide();

        $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data: {action:"get_service_conf_list"},
            dataType:"json",
            success:function(data){
                console.log(formatOptions(notSelected(data)));
                select_block.find('select').append(formatOptions(notSelected(data)));
                if (select_block.find('option').length == 1) {
                    lessSelectBlock(select_block.find('.btn_more'));
                } //else {
                //     select_block.show();
                // }
            }
        });

        return select_block;
    }

    function newSelectBlockModif() {
        // get_carac_salle_list
        let select_block = $('<div></div>');
        select_block.addClass('select_block');
        let content =  '' +
            '<div class="input-group" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
                '<select class="custom-select" name="id_service_conf_modif[]" style="width:95%;">' +
                    '<option value="" selected><?php
                            if ($_SESSION['lang'] == 'EN') {
                                echo CHOISIR_SERVICE_MODIF_LOCATION_CONF_EN;
                            } else {
                                echo CHOISIR_SERVICE_MODIF_LOCATION_CONF_FR;
                            }
                        ?></option>' +
                    '<?php //echo fill_carac_salle_list($connect);?>' +
                '</select>' +
                '<div class="input-group-append">' +
                    '<button class="btn btn-primary select_block_button btn_less" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;">-</button>' +
                '</div>' +
            '</div>' +
            '' +
            '<div class="input-group select_block_button" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
                '<div></div>' +
                '<div class="input-group-append">' +
                    '<button class="btn btn-primary btn_more" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;height:40px;">+</button>' +
                '</div>' +
            '</div>';

        select_block.html(content);
        select_block.find('.btn_more').click(function(){
            updateSelectedServicesAddiModif();
            if (select_block.find('select').val() != "") {
                moreSelectBlockModif($(this));
            }
        });
        select_block.find('select').on('change', function(){
            updateSelectedServicesAddiModif();
            if (select_block.find('select').val() != "") {
                moreSelectBlockModif($(this));
            }
        })
        select_block.find('.btn_less').click(function(){
            updateSelectedServicesAddiModif();
            lessSelectBlockModif($(this));
        });
        // select_block.hide();

        $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data: {action:"get_service_conf_list"},
            dataType:"json",
            success:function(data){
                // console.log(formatOptions(notSelectedModif(data)));
                select_block.find('select').append(formatOptions(notSelectedModif(data)));
                if (select_block.find('option').length == 1) {
                    lessSelectBlockModif(select_block.find('.btn_more'));
                } //else {
                //     select_block.show();
                // }
            }
        });

        return select_block;
    }

    // function newSelectBlockModif() {
    //     // get_carac_salle_list
    //     let select_block = $('<div></div>');
    //     select_block.addClass('select_block');
    //     let content =  '' +
    //         '<div class="input-group" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
    //             '<select class="custom-select" name="id_carac_conf_modif[]" style="width:95%;">' +
    //                 '<option value="" selected><?php
    //                         if ($_SESSION['lang'] == 'EN') {
    //                             echo CHOISIR_CARAC_SALLE_CONF_EN;
    //                         } else {
    //                             echo CHOISIR_CARAC_SALLE_CONF_FR;
    //                         }
    //                     ?></option>' +
    //                 '<?php //echo fill_carac_salle_list($connect);?>' +
    //             '</select>' +
    //             '<div class="input-group-append">' +
    //                 '<button class="btn btn-primary select_block_button btn_less" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;">-</button>' +
    //             '</div>' +
    //         '</div>' +
    //         '' +
    //         '<div class="input-group select_block_button" style="margin-bottom:5px;display:grid;grid-template-columns:1fr 40px;">' +
    //             '<div></div>' +
    //             '<div class="input-group-append">' +
    //                 '<button class="btn btn-primary btn_more" type="button" style="border-radius:0.25rem!important;font-size:1.4rem;width:100%;height:40px;">+</button>' +
    //             '</div>' +
    //         '</div>';

    //     select_block.html(content);
    //     select_block.find('.btn_more').click(function(){
    //         updateSelectedCaracSalleConfModif();
    //         if (select_block.find('select').val() != "") {
    //             moreSelectBlockModif($(this));
    //         }
    //     });
    //     select_block.find('select').on('change', function(){
    //         updateSelectedCaracSalleConfModif();
    //         if (select_block.find('select').val() != "") {
    //             moreSelectBlockModif($(this));
    //         }
    //     })
    //     select_block.find('.btn_less').click(function(){
    //         updateSelectedCaracSalleConfModif();
    //         lessSelectBlockModif($(this));
    //     });
    //     // select_block.hide();

    //     $.ajax({
    //         url:"salle-conf-action.php",
    //         method:"POST",
    //         data: {action:"get_carac_salle_list"},
    //         dataType:"json",
    //         success:function(data){
    //             select_block.find('select').append(formatOptions(notSelectedModif(data)));
    //             if (select_block.find('option').length == 1) {
    //                 lessSelectBlockModif(select_block.find('.btn_more'));
    //             } //else {
    //             //     select_block.show();
    //             // }
    //         }
    //     });

    //     return select_block;
    // }


    $('#services_addi .select_block .btn_more').click(function(){
        updateSelectedServicesAddi();
        let select_block = $(this).parents('.select_block');
        if (select_block.find('select').val() != "") {
            moreSelectBlock($(this));
        }
    })

    $('#services_addi .select_block select').on('change', function(){
        updateSelectedServicesAddi();
        let select_block = $(this).parents('.select_block');
        if (select_block.find('select').val() != "") {
            moreSelectBlock($(this));
        }
    })


    $('#services_addi_modif .select_block .btn_more').click(function(){
        updateSelectedServicesAddiModif();
        let select_block = $(this).parents('.select_block');
        if (select_block.find('select').val() != "") {
            moreSelectBlockModif($(this));
        }
    })

    // $('#services_addi_modif .select_block select').on('change', function(){
    //     updateSelectedServicesAddiModif();
    //     let select_block = $(this).parents('.select_block');
    //     if (select_block.find('select').val() != "") {
    //         moreSelectBlockModif($(this));
    //     }
    // })

    function updateSelectModif() {
         $.ajax({
            url:"location-conf-action.php",
            method:"POST",
            data: {action:"get_service_conf_list"},
            dataType:"json",
            success:function(data) {
                select = $('#services_addi_modif .select_block_modif select');

                // find selected
                selected = [];
                $('#list_des_services_addi').find('input[type="checkbox"]').each(
                    function (){
                        selected.push($(this).val());
                    }
                );
                // console.log(selected);

                // remove selected
                final = [];
                for (i = 0; i < data.length; i++) {
                    final.push(data[i]);
                    for (j = 0; j < selected.length; j++) {
                        if (data[i][0] == selected[j]) {
                            final.pop();
                            break;
                        }
                    }
                }

                default_option = '<option value="" selected><?php
                    if ($_SESSION['lang'] == 'EN') {
                        echo CHOISIR_SERVICE_LOCATION_CONF_EN;
                    } else {
                        echo CHOISIR_SERVICE_LOCATION_CONF_FR;
                    }
                    ?></option>';

               select.html(default_option + formatOptions(final));
            }
        });
    }

    // $('#services_addi_modif .select_block_modif .btn_more').click(function(){
    //     updateSelectModif();
    //     let select_block = $(this).parents('.select_block_modif');
    //     let val = select_block.find('select').val();
    //     if ( val != "") {
    //         formatServicesAddi( $('#list_des_services_addi'), [val], [select_block.find('option[value="' + val + '"]').text()]);
    //     }
    //     select_block.find('select').val("");
    // })

    $('#services_addi_modif .select_block_modif select').on('change', function(){
        updateSelectModif();
        let select_block = $(this).parents('.select_block_modif');
        let val = select_block.find('select').val();
        if ( val != "") {
            formatServicesAddi( $('#list_des_services_addi'), [val], [select_block.find('option[value="' + val + '"]').text()]);
        }
        select_block.find('select').val("");
    })



    // $('#carac_salle_conf_modif .select_block .btn_more').click(function(){
    //     updateSelectedCaracSalleConfModif();
    //     let select_block = $(this).parents('.select_block');
    //     if (select_block.find('select').val() != "") {
    //         moreSelectBlockModif($(this));
    //     }
    // })

    // $('#carac_salle_conf_modif .select_block select').on('change', function(){
    //     updateSelectedCaracSalleConfModif();
    //     let select_block = $(this).parents('.select_block');
    //     if (select_block.find('select').val() != "") {
    //         moreSelectBlockModif($(this));
    //     }
    // })


    // function mainUpdateSelect() {
    //      $.ajax({
    //         url:"location-conf-action.php",
    //         method:"POST",
    //         data: {action:"get_service_conf_list"},
    //         dataType:"json",
    //         success:function(data) {
    //             select = $('#services_addi .main_select_block select');

    //             // find selected
    //             selected = [];
    //             $('#main_list_des_services_addi').find('input[type="checkbox"]').each(
    //                 function (){
    //                     selected.push($(this).val());
    //                 }
    //             );
    //             // console.log(selected);

    //             // remove selected
    //             final = [];
    //             for (i = 0; i < data.length; i++) {
    //                 final.push(data[i]);
    //                 for (j = 0; j < selected.length; j++) {
    //                     if (data[i][0] == selected[j]) {
    //                         final.pop();
    //                         break;
    //                     }
    //                 }
    //             }

    //             default_option = '<option value="" selected><?php
    //                 if ($_SESSION['lang'] == 'EN') {
    //                     echo CHOISIR_SERVICE_LOCATION_CONF_EN;
    //                 } else {
    //                     echo CHOISIR_SERVICE_LOCATION_CONF_FR;
    //                 }
    //                 ?></option>';

    //            select.html(default_option + formatOptions(final));
    //         }
    //     });
    // }

    // function mainFormatServicesAddi(jquery_obj, id_services_addi, services_addi) {
    //     content = '';
    //     for (let i = 0; i < services_addi.length; i++) {
    //         if (services_addi[i] != '') {
    //         checkbox = '<input type="checkbox" name="id_service_conf[]" value="' + id_services_addi[i] + '"' +
    //             ' style="position:absolute; width:0px; height:0px;" checked />';
    //         content += checkbox +
    //         '<label class="selectgroup-item">' +
    //             '<span class="selectgroup-button" style="cursor:context-menu;">' + services_addi[i] + '</span>' +
    //             '<span class="remove-chip">-</span>' +
    //         '</label>';
    //         }
    //     }
    //     elem = $(content);

    //     elem.find('.remove-chip').hover( function() {
    //         $(this).siblings('.selectgroup-button').toggleClass('chip-hover');
    //     }, function() {
    //         $(this).siblings('.selectgroup-button').toggleClass('chip-hover');
    //     });

    //     elem.find('.remove-chip').click( function(){
    //     // $(this).parent('.selectgroup-item').hide(300);
    //     $(this).parent('.selectgroup-item').prev('input[type="checkbox"]').attr('checked', false);
    //     $(this).parent('.selectgroup-item').prev('input[type="checkbox"]').remove();
    //     $(this).parent('.selectgroup-item').remove();
    //     mainUpdateSelect();

    //     });

    //     jquery_obj.append(elem);
    //     return content;
    // }


    
    // $('#services_addi .main_select_block select').on('change', function(){
    //     mainUpdateSelectModif();
    //     let select_block = $(this).parents('.main_select_block');
    //     let val = select_block.find('select').val();
    //     if ( val != "") {
    //         mainFormatServicesAddi( $('#main_list_des_services_addi'), [val], [select_block.find('option[value="' + val + '"]').text()]);
    //     }
    //     select_block.find('select').val("");
    // })







  </script>

</body>
</html>