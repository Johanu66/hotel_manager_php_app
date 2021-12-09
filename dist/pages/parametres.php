<?php

include('../database_connection.php');

include('../AddLogInclude.php');

if(!isset($_SESSION['nom_ferme'])) {
    header("location:connexion.php");
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
  <title><?php echo $_SESSION['lang'] == 'EN' ? TITRE_ONGLET_DEMARRAGE_EN : TITRE_ONGLET_DEMARRAGE_FR; ?></title>

  <link rel="icon" type="image/png" href="../assets/img/fav.png" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

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

<style>
a.mark-all-notif:hover, a.afficher-tout:hover {
    color: #0eb800;
}
</style>


<!-- /END GA --></head>

<body class="layout-3" style="background-color: #f1f1f1;">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">

        <a href="#" class="navbar-brand sidebar-gone-hide">
            <img src="../assets/img/logoblanc-300.png" alt="logo" width="120" class="">
        </a>

        <!--<a href="index.html" class="navbar-brand sidebar-gone-hide">Greenkiz</a>-->
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <!--<li class="nav-item active"><a href="#" class="nav-link"><?php echo $_SESSION['lang'] == 'EN' ? MENU_DEMARRER_DEMARRAGE_EN : MENU_DEMARRER_DEMARRAGE_FR; ?></a></li>-->
            <li class="nav-item"><a href="conditions.php" class="nav-link"><?php echo $_SESSION['lang'] == 'EN' ? MENU_CONDITIONS_DEMARRAGE_EN : MENU_CONDITIONS_DEMARRAGE_FR; ?></a></li>
            <li class="nav-item"><a href="politique.php" class="nav-link"><?php echo $_SESSION['lang'] == 'EN' ? MENU_POLITIQUE_DEMARRAGE_EN : MENU_POLITIQUE_DEMARRAGE_FR; ?></a></li>
            <li class="nav-item"><a href="tarifs.php" class="nav-link"><?php echo $_SESSION['lang'] == 'EN' ? MENU_TARIFS_DEMARRAGE_EN : MENU_TARIFS_DEMARRAGE_FR; ?></a></li>
            <!--<li class="nav-item"><a href="#" class="nav-link"><?php echo $_SESSION['lang'] == 'EN' ? MENU_GUIDE_DEMARRAGE_EN : MENU_GUIDE_DEMARRAGE_FR; ?></a></li>-->


            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg">
                      Langues
              <div class="dropdown-menu dropdown-menu-right">

                  <a href="features-profile.html" class="dropdown-item has-icon">
                      Français
                  </a>

                  <a href="features-activities.html" class="dropdown-item has-icon">
                      English
                  </a>

              </div>
            </li>


          </ul>
        </div>

        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <!--
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
            -->
          </div>
        </form>

        <ul class="navbar-nav navbar-right">

          <!--
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          -->

          <!-- NOTIFICATIONS -->
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="notifications nav-link notification-toggle nav-link-lg">
                  <span class="badge badge-warning count" style="padding: 4px 7px !important;"></span>
                  <i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">




              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#" class="mark-all-notif">Tout marquer comme lu</a>
                </div>
              </div>

              <div class="dropdown-list-content dropdown-list-icons notifs">

                <!--

                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now Template !
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>

                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> <br>are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>

                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>

                -->

              </div>
              <div class="dropdown-footer text-center">
                <a href="notifications.php" class="afficher-tout">Afficher tout <i class="fas fa-chevron-right"></i></a>
              </div>





            </div>
          </li>

          <!--
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg">
                    <i class="far fa-arrow-alt-circle-down"></i>

                    <div class="dropdown-menu dropdown-menu-right">

                        <a href="features-profile.html" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Français
                        </a>
                        <a href="features-activities.html" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> English
                        </a>

                    </div>
          </li>
          -->

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?php echo $_SESSION['prenom_promoteur'].' '.$_SESSION['nom_promoteur'] ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!--<div class="dropdown-title">Logged in 5 min ago</div>-->
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a href="#" class="nav-link"><i class="far fa-play-circle"></i><span>Démarrer</span></a>
            </li>
            <!--
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
              </ul>
            </li>
            -->
            <li class="nav-item">
              <a href="boutique.php" class="nav-link"><i class="far fa-window-restore"></i><span>Boutique</span></a>
            </li>

            <li class="nav-item">
              <a href="jetons.php" class="nav-link"><i class="far fa-credit-card"></i><span>Acheter des jetons</span></a>
            </li>

            <!--
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            -->
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $_SESSION['nom_ferme'] ;?><br></h1>
            <div class="section-header-breadcrumb">
              <!--
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              -->
                <div class="breadcrumb-item"><b>Promoteur :</b> <?php echo $_SESSION['prenom_promoteur'].' '.$_SESSION['nom_promoteur'] ?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Bienvenue !</h2>
              <p class="section-lead"><b>Proverbe du jour :</b> Persévérance, telle est la première vertu de l'agriculteur.</p>


          <div class="row">
                <div class="col-12 col-md-4">
                  <div class="card">
                      <div class="card-header">
                          <h4>Production végétale</h4>
                          <div class="card-header-action">
                              <label class="mt-2">
                                  <div style="font-size: 12px;">Nouvelle session</div>
                              </label>
                          </div>
                      </div>
                      <div class="card-body text-center">
                          <p>Cliquez sur le bouton ci-dessous pour le premier démarrage.</p>
                      </div>
                      <div class="card-footer bg-whitesmoke text-center">
                          <button class="btn btn-primary">Démarrer la session</button>
                      </div>
                  </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card">
                      <div class="card-header">
                          <h4>Production animale</h4>
                          <div class="card-header-action">
                              <label class="mt-2">
                                  <div style="font-size: 12px;">Actif il y a 3 jours</div>
                              </label>
                          </div>
                      </div>
                      <div class="card-body text-center">
                          <p>Dernière connexion effectuée par : <br><b><?php echo $_SESSION['prenom_promoteur'].' '.$_SESSION['nom_promoteur'] ?></b></p>
                      </div>
                      <div class="card-footer bg-whitesmoke text-center">
                          <button class="btn btn-primary">Démarrer la session</button>
                      </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                  <div class="card">
                      <div class="card-header">
                          <h4>Production halieutique</h4>
                          <div class="card-header-action">
                              <label class="mt-2">
                                  <div style="font-size: 12px;">Session inactive</div>
                              </label>
                          </div>
                      </div>
                      <div class="card-body text-center">
                          <p>Votre entreprise n'effectue pas cette activité pour le moment.</p>
                      </div>
                      <div class="card-footer bg-whitesmoke text-center">
                          <button class="btn btn-warning">Activer la session</button>
                      </div>
                  </div>
                </div>
          </div>

            <!--
            <div class="card">
              <div class="card-header">
                <h4>Example Card</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
            -->
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
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
  <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>

<script>

$(document).ready(function() {

    /* NOTIFICATIONS */
    function load_unseen_notification(view = '') {
        $.ajax({
            url: "../scripts_php/notif_fetch.php",
            method: "POST",
            data: {view: view},
            dataType: "json",
            success: function (data) {
                $('.notifs').html(data.notification);
                if (data.unseen_notification > 0) {
                    $('.count').html(data.unseen_notification);
                }
            }
        });
    }

    function clic_notification(clic, id) {

         var clic_notif = clic;
         var id_notif = id;

        $.ajax({
            url: "../scripts_php/notif_clic.php",
            method: "POST",
            data: {clic_notif:clic_notif, id_notif:id_notif},
            dataType: "json",
            success: function (data) {

            }
        });
    }

    function note(a,b) {
        var x = a;
        var y = b;

        $.ajax({
            url: "../scripts_php/notif_clic.php",
            method: "POST",
            data: {clic_notif:x, comment_id:y},
            dataType: "json",
            success: function (data) {

            }
        });
    }

    function markall(c) {
        var z = c;

        $.ajax({
            url: "../scripts_php/notif_mark.php",
            method: "POST",
            data: {mark_notif:z},
            success: function (data) {
                if(data == "good") {
                    swal('Effectué', 'Toutes les notifications ont été marquées commme lues.', 'success');
                }
            }
        });
    }

    // Clic sur une des notifications
    $(document).on('click', '.voir-notif', function(){
    //$("a.voir-notif").on("click", function(){
        var comment_id = $(this).attr('id');
        note(1,comment_id);
    });

    load_unseen_notification();

    // Clic sur la cloche
    $("a.notifications").on("click", function(){
        $('.count').html('');
        load_unseen_notification('yes');
    });

    // Clic sur Marquer tout comme lu (notifs)
    //$(document).on('click', '.mark-all-notif', function(){
    $("a.mark-all-notif").on("click", function(){
        markall(1);
    });


    setInterval(function(){
        load_unseen_notification();
    }, 5000);
    /* FIN NOTIFICATIONS */

});


</script>

</html>