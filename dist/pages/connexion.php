<?php
//connexion.php


include('../database_connection.php');

include('../AddLogInclude.php');

//require("../lang/choose-lang.php");

if(isset($_SESSION['type_compte']))
{
    header("location:tableau-de-bord.php");
}

// Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');
if(isset($_SESSION['lang'])) { } else { $_SESSION['lang'] = 'FR'; }
if(isset($_POST["fr"])) { $_SESSION['lang'] = 'FR'; }
if(isset($_POST["en"])) { $_SESSION['lang'] = 'EN'; }

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo ($_SESSION['lang'] == 'EN') ? TITRE_ONGLET_CONNEXION_EN : TITRE_ONGLET_CONNEXION_FR; ?></title>

  <link rel="icon" type="image/png" href="../assets/img/fav.png" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>

<!-- /END GA --></head>

<!--<body style="background-image: url('../assets/img/login2.jpg'); background-position: center">-->
<body style="background: url('../assets/img/hotel1920-sombre.jpg');">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <!--<img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">-->
			  <img src="../assets/img/hotel-logo.png" alt="logo" width="300" class="">
            </div>

            <div class="card card-primary">



              <div class="card-header">
                  <h4><?php if ($_SESSION['lang'] == 'EN') { echo BIENVENUE_CONNEXION_EN; } else { echo BIENVENUE_CONNEXION_FR; } ?></h4>

                      <div class="card-header-action">

                          <form method="POST">
                              <button type="submit" name="fr" class="btn btn-warning">Fr</button>
                              <button type="submit" name="en" class="btn btn-primary">En</button>
                          </form>

                      </div>


              </div>

              <div class="card-body">
                <form method="POST" id="form_login">
                  <div class="form-group">
                    <label for="email"><?php if ($_SESSION['lang'] == 'EN') { echo INPUT_UN_CONNEXION_EN; } else { echo INPUT_UN_CONNEXION_FR; } ?></label>

                    <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text">
                                  <i class="fas fa-user"></i>
                              </div>
                          </div>
                          <input id="pseudo_compte" type="text" class="form-control" name="pseudo_compte" tabindex="1" required autofocus>
                    </div>


                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label"><?php if ($_SESSION['lang'] == 'EN') { echo INPUT_DEUX_CONNEXION_EN; } else { echo INPUT_DEUX_CONNEXION_FR; } ?></label>
                     <!--
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                            <?php if ($_SESSION['lang'] == 'EN') { echo PASS_OUBLIE_CONNEXION_EN; } else { echo PASS_OUBLIE_CONNEXION_FR; } ?>
                        </a>
                      </div>
                      -->
                    </div>

                    <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text">
                                  <i class="fas fa-lock"></i>
                              </div>
                          </div>
                          <input type="password" id="mdp_compte" name="mdp_compte" autocomplete="new-password" tabindex="2" class="form-control" required>
                    </div>

                  </div>

                  <!--
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me"><?php if ($_SESSION['lang'] == 'EN') { echo SOUVENIR_CONNEXION_EN; } else { echo SOUVENIR_CONNEXION_FR; } ?></label>
                    </div>
                  </div>
                  -->

                  <div class="form-group">
                    <button type="submit" id="login" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        <?php if ($_SESSION['lang'] == 'EN') { echo BOUTON_LOGIN_CONNEXION_EN; } else { echo BOUTON_LOGIN_CONNEXION_FR; } ?>
                    </button>
                  </div>
                </form>

                <!--
                <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>                                
                  </div>
                </div>
                -->

              </div>


            </div>

            <!--
            <div class="mt-5 text-muted text-center">
                <?php if ($_SESSION['lang'] == 'EN') { echo NO_COMPTE_CONNEXION_EN; } else { echo NO_COMPTE_CONNEXION_FR; } ?> <a href="premiere-ferme-1.php"><?php if ($_SESSION['lang'] == 'EN') { echo CREER_COMPTE_CONNEXION_EN; } else { echo CREER_COMPTE_CONNEXION_FR; } ?></a>
            </div>
            -->
            <div class="simple-footer" style="color: white; font-weight: bold;">
                <?php if ($_SESSION['lang'] == 'EN') { echo COPYRIGHT_CONNEXION_EN; } else { echo COPYRIGHT_CONNEXION_FR; } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
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
  <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>
  <!--<script src="../assets/js/sweetalert2js"></script>-->

  <!-- Page Specific JS File -->

  
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

</body>



<script>
    $(document).ready(function() {

        $(document).on('submit','#form_login', function(event){
            event.preventDefault();

            var form_data = $(this).serialize();
            $.ajax({
                url:'../scripts_php/script_connexion.php',
                method:'POST',
                data:form_data,
                dataType: 'json',
                success:function(data) {
                    // console.log(data);
                    if(data == "Paramètres corrects - Admin") {
                        window.location="tableau-de-bord-admin.php";
                    }

                    if(data == "Paramètres corrects - Secrétaire") {
                        window.location="tableau-de-bord-sec.php";
                    }

                    if(data == "Pseudo non valide") {
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_CONNEXION_EN; } else { echo ERREUR_CONNEXION_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo USERNAME_INCORRECT_CONNEXION_EN; } else { echo USERNAME_INCORRECT_CONNEXION_FR; } ?>', 'error');
                    }

                    if(data == "Mot de passe erroné") {
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_CONNEXION_EN; } else { echo ERREUR_CONNEXION_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo PASS_INCORRECT_CONNEXION_EN; } else { echo PASS_INCORRECT_CONNEXION_FR; } ?>', 'error');
                    }

                    if(data == "Compte désactivé") {
                        swal('<?php if ($_SESSION['lang'] == 'EN') { echo ERREUR_CONNEXION_EN; } else { echo ERREUR_CONNEXION_FR; } ?>', '<?php if ($_SESSION['lang'] == 'EN') { echo COMPTE_INACTIF_CONNEXION_EN; } else { echo COMPTE_INACTIF_CONNEXION_FR; } ?>', 'error');
                    }
                }
            });


        });

    });

</script>

</html>