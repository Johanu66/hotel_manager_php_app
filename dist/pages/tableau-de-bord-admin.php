<?php

$page_name = 'Tableau de bord';

$tableau_de_bord = 'active';

include('../database_connection.php');
include('../AddLogInclude.php');
include('../scripts_php/fonctions_list.php');

if(!isset($_SESSION['type_compte']))
{
    header('location:connexion.php');
}


switch ($_SESSION['type_compte']) {

  case 1:
      addlog("Cons-01-dashboard", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
      break;
  case 2:
      addlog("Cons-02-dashboard", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
      break;
  // case 3:
  //     addlog("Cons-03", "Consultation du tableau de bord Admin", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]." - Éditeur");
  //     break;
  // case 4:
  //     addlog("Cons-04", "Consultation du tableau de bord Admin", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]." - Auteur");
  //     break;
  // case 5:
  //     addlog("Cons-05", "Consultation du tableau de bord Admin", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]." - Lecteur");
  //     break;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>

    <?php include '../parts/headmeta.php';?>

    <title><?php echo $page_name; ?> - Hotel</title>

    <?php include '../parts/headsuite.php';?>

    <?php include '../parts/headstyle.php';?>

    <style>

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
            <!--
            <div class="section-header-breadcrumb">

                <?php include '../parts/breadcrumb-dashboard.php';?>

                <div class="breadcrumb-item"><?php echo $page_name; ?></div>
            </div>
            -->
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image" style="background-image: url('../assets/img/unsplash/bienvenue.jpg');">
                    <div class="hero-inner">
                        <h2>Bonjour, <?php echo $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"] ?></h2>
                        <p style="line-height: 30px;">Bienvenue sur <b>Hotelem</b>. Les fonctionnalités liées à votre profil de <b>Super Administrateur</b>, sont prêtes à l'emploi.</p>
                        <div class="mt-4">
                            <!--<a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="section-title">Modules disponibles</h2>
        <p class="section-lead">Vous avez souscrit au Package <b>Diamant</b> et avez accès à tous les modules.</p>

        <div class="row" style="margin-top: 30px !important;">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/rescha.jpg">
                        </div>
                        <!--
                        <div class="article-badge">
                            <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                        </div>
                        -->
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Réservation de chambres</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/restau.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Restaurant</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/bar.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Bar</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/transport.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Transport</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/conf2.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Salles de conférence</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/spa.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">SPA</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/pis.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Piscine</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/press.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Blanchisserie</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/night.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Night Club</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/fete.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Salle des fêtes</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/game.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Salle de jeux</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/modules/pers.jpg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h6 style="text-align: center;">Gestion du personnel</h6>
                        </div>

                        <p></p>

                        <div class="article-cta" style="text-align: center;">
                            <a href="#" class="btn btn-primary">Accéder au module</a>
                        </div>
                    </div>
                </article>
            </div>


        </div>

            <!--
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                            <h2>Welcome Back, Ujang!</h2>
                            <p class="lead">This page is a place to manage posts, categories and more.</p>
                        </div>
                    </div>
                </div>
            </div>
            -->
<!-- 
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Statistiques de réservation -->
                    <!-- <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                      </ul>
                    </div> -->
                  <!-- </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?php echo count_reserv_attente($connect); ?></div>
                      <div class="card-stats-item-label" title="En attente">En attente</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">12</div>
                      <div class="card-stats-item-label" title="Confirmé">Confirmé</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">23</div>
                      <div class="card-stats-item-label" title="Terminé">Terminé</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-bed"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Chambres libres</h4>
                  </div>
                  <div class="card-body">
                    59
                  </div>
                </div>
              </div>
            </div>



            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Statistiques des chambres
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?php echo count_reserv_attente($connect); ?></div>
                      <div class="card-stats-item-label" title="En attente">En attente</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">12</div>
                      <div class="card-stats-item-label" title="Confirmé">Confirmé</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">23</div>
                      <div class="card-stats-item-label" title="Terminé">Terminé</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-bed"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Chambres libres</h4>
                  </div>
                  <div class="card-body">
                    59
                  </div>
                </div>
              </div>
            </div> -->



            <!-- <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Balance</h4>
                  </div>
                  <div class="card-body">
                    $187,13
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Sales</h4>
                  </div>
                  <div class="card-body">
                    4,732
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h4>Budget vs Sales</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="158"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card gradient-bottom">
                <div class="card-header">
                  <h4>Top 5 Products</h4>
                  <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Select Period</li>
                      <li><a href="#" class="dropdown-item">Today</a></li>
                      <li><a href="#" class="dropdown-item">Week</a></li>
                      <li><a href="#" class="dropdown-item active">Month</a></li>
                      <li><a href="#" class="dropdown-item">This Year</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body" id="top-5-scroll">
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="../assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">86 Sales</div></div>
                        <div class="media-title">oPhone S9 Limited</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="64%"></div>
                            <div class="budget-price-label">$68,714</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="43%"></div>
                            <div class="budget-price-label">$38,700</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="../assets/img/products/product-4-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">67 Sales</div></div>
                        <div class="media-title">iBook Pro 2018</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="84%"></div>
                            <div class="budget-price-label">$107,133</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="60%"></div>
                            <div class="budget-price-label">$91,455</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="../assets/img/products/product-1-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">63 Sales</div></div>
                        <div class="media-title">Headphone Blitz</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="34%"></div>
                            <div class="budget-price-label">$3,717</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$2,835</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="../assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">28 Sales</div></div>
                        <div class="media-title">oPhone X Lite</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="45%"></div>
                            <div class="budget-price-label">$13,972</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="30%"></div>
                            <div class="budget-price-label">$9,660</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="../assets/img/products/product-5-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">19 Sales</div></div>
                        <div class="media-title">Old Camera</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="35%"></div>
                            <div class="budget-price-label">$7,391</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$5,472</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Budget Price</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>Best Products</h4>
                </div>
                <div class="card-body">
                  <div class="owl-carousel owl-theme" id="products-carousel">
                    <div>
                      <div class="product-item pb-3">
                        <div class="product-image">
                          <img alt="image" src="../assets/img/products/product-4-50.png" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name">iBook Pro 2018</div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                          </div>
                          <div class="text-muted text-small">67 Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>  
                      </div>
                    </div>
                    <div>
                      <div class="product-item">
                        <div class="product-image">
                          <img alt="image" src="../assets/img/products/product-3-50.png" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name">oPhone S9 Limited</div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                          </div>
                          <div class="text-muted text-small">86 Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>  
                      </div>
                    </div>
                    <div>
                      <div class="product-item">
                        <div class="product-image">
                          <img alt="image" src="../assets/img/products/product-1-50.png" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name">Headphone Blitz</div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                          </div>
                          <div class="text-muted text-small">63 Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>Top Countries</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="text-title mb-2">July</div>
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Indonesia</div>
                            <div class="text-small text-muted">3,282 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../assets/modules/flag-icon-css/flags/4x3/my.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Malaysia</div>
                            <div class="text-small text-muted">2,976 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../assets/modules/flag-icon-css/flags/4x3/us.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">United States</div>
                            <div class="text-small text-muted">1,576 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-6 mt-sm-0 mt-4">
                      <div class="text-title mb-2">August</div>
                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../assets/modules/flag-icon-css/flags/4x3/id.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Indonesia</div>
                            <div class="text-small text-muted">3,486 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../assets/modules/flag-icon-css/flags/4x3/ps.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Palestine</div>
                            <div class="text-small text-muted">3,182 <i class="fas fa-caret-up text-success"></i></div>
                          </div>
                        </li>
                        <li class="media">
                          <img class="img-fluid mt-1 img-shadow" src="../assets/modules/flag-icon-css/flags/4x3/de.svg" alt="image" width="40">
                          <div class="media-body ml-3">
                            <div class="media-title">Germany</div>
                            <div class="text-small text-muted">2,317 <i class="fas fa-caret-down text-danger"></i></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Invoices</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Invoice ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 19, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Hasan Basri</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>July 21, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-76824</a></td>
                        <td class="font-weight-600">Muhamad Nuruzzaki</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-84990</a></td>
                        <td class="font-weight-600">Agung Ardiansyah</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87320</a></td>
                        <td class="font-weight-600">Ardian Rahardiansyah</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>July 28, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <h4>14</h4>
                  <div class="card-description">Customers need help</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>My order hasn't arrived yet</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Laila Tazkiah</div>
                        <div class="bullet"></div>
                        <div class="text-primary">1 min ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Please cancel my order</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Rizal Fakhri</div>
                        <div class="bullet"></div>
                        <div>2 hours ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Do you see my mother?</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Syahdan Ubaidillah</div>
                        <div class="bullet"></div>
                        <div>6 hours ago</div>
                      </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                      View All <i class="fas fa-chevron-right"></i>
                    </a>
                  </div> -->
                <!-- </div> -->
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
  <script src="../assets/modules/jquery.sparkline.min.js"></script>
  <script src="../assets/modules/chart.min.js"></script>
  <script src="../assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="../assets/modules/summernote/summernote-bs4.js"></script>
  <script src="../assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index.js"></script>
  
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>
</html>