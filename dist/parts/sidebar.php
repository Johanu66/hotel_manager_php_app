<?php

// Langues
include_once('../lang/fr-lang.php');
include_once('../lang/en-lang.php');

if ($_SESSION['lang'] == 'EN') {
    $label_hotel = HOTEL_SIDEBAR_EN;
    $label_gestion_principale = GESTION_PRINCIPALE_SIDEBAR_EN;
    $label_dashboard = DASHBOARD_SIDEBAR_EN;
    $label_journaux = JOURNAUX_SIDEBAR_EN;
    $label_reservation = RESERVATION_SIDEBAR_EN;
    $label_dispo = RESERV_DISPO_SIDEBAR_EN;
    $label_en_attente = RESERV_ATTENTE_SIDEBAR_EN;
    $label_confirme = RESERV_CONFIRME_SIDEBAR_EN;
    $label_termine = RESERV_TERMINE_SIDEBAR_EN;
    $label_annule = RESERV_ANNULE_SIDEBAR_EN;
    $label_hebergement = HEBERGEMENT_SIDEBAR_EN;
    $label_type_chambre = TYPE_CHAMBRE_SIDEBAR_EN;
    $label_carac_chambre = CARAC_CHAMBRE_SIDEBAR_EN;
    $label_chambre = CHAMBRE_SIDEBAR_EN;

    $label_type_plat = TYPE_PLAT_SIDEBAR_EN;
    $label_plat = PLAT_SIDEBAR_EN;
    $label_article_restau = ARTICLE_RESTAU_SIDEBAR_EN;
    $label_restaurant = RESTAURANT_SIDEBAR_EN;

    $label_transport = TRANSPORT_SIDEBAR_EN;
    $label_marque_voiture = MARQUE_VOITURE_SIDEBAR_EN;
    $label_voiture = VOITURE_SIDEBAR_EN;

    $label_boisson = BOISSON_SIDEBAR_EN;
    $label_bar = BAR_SIDEBAR_EN;

    $label_conference = CONF_SIDEBAR_EN;
    $label_location_conf = LOCATION_CONF_SIDEBAR_EN;
    $label_facture_conf = FACTURE_CONF_SIDEBAR_EN;
    $label_salle_conf = SALLE_CONF_SIDEBAR_EN;
    $label_carac_conf = CARAC_CONF_SIDEBAR_EN;
    $label_service_conf = SERVICE_CONF_SIDEBAR_EN;
    $label_stat_conf = STAT_CONF_SIDEBAR_EN;
} else {
    $label_hotel = HOTEL_SIDEBAR_FR;
    $label_gestion_principale = GESTION_PRINCIPALE_SIDEBAR_FR;
    $label_dashboard = DASHBOARD_SIDEBAR_FR;
    $label_journaux = JOURNAUX_SIDEBAR_FR;
    $label_reservation = RESERVATION_SIDEBAR_FR;
    $label_dispo = RESERV_DISPO_SIDEBAR_FR;
    $label_en_attente = RESERV_ATTENTE_SIDEBAR_FR;
    $label_confirme = RESERV_CONFIRME_SIDEBAR_FR;
    $label_termine = RESERV_TERMINE_SIDEBAR_FR;
    $label_annule = RESERV_ANNULE_SIDEBAR_FR;
    $label_hebergement = HEBERGEMENT_SIDEBAR_FR;
    $label_type_chambre = TYPE_CHAMBRE_SIDEBAR_FR;
    $label_carac_chambre = CARAC_CHAMBRE_SIDEBAR_FR;
    $label_chambre = CHAMBRE_SIDEBAR_FR;

    $label_type_plat = TYPE_PLAT_SIDEBAR_FR;
    $label_plat = PLAT_SIDEBAR_FR;
    $label_article_restau = ARTICLE_RESTAU_SIDEBAR_FR;
    $label_restaurant = RESTAURANT_SIDEBAR_FR;

    $label_transport = TRANSPORT_SIDEBAR_FR;
    $label_marque_voiture = MARQUE_VOITURE_SIDEBAR_FR;
    $label_voiture = VOITURE_SIDEBAR_FR;

    $label_boisson = BOISSON_SIDEBAR_FR;
    $label_bar = BAR_SIDEBAR_FR;

    $label_conference = CONF_SIDEBAR_FR;
    $label_location_conf = LOCATION_CONF_SIDEBAR_FR;
    $label_facture_conf = FACTURE_CONF_SIDEBAR_FR;
    $label_salle_conf = SALLE_CONF_SIDEBAR_FR;
    $label_carac_conf = CARAC_CONF_SIDEBAR_FR;
    $label_service_conf = SERVICE_CONF_SIDEBAR_FR;
    $label_stat_conf = STAT_CONF_SIDEBAR_EN;
}


if($_SESSION['type_compte'] == 1)
{
?>
    <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><?php echo $label_hotel ?></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Ht</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header"><?php echo $label_gestion_principale ?></li>

            <li class="<?php echo $tableau_de_bord; ?>"><a class="nav-link" href="tableau-de-bord-admin.php"><i class="fas fa-columns"></i> <span><?php echo $label_dashboard ?></span></a></li>
            
            <?php
                if($_SESSION['type_compte'] == 1){
            ?>
                <li class="<?php echo $journaux; ?>"><a class="nav-link" href="journaux.php"><i class="fas fa-columns"></i> <span><?php echo $label_journaux ?></span></a></li>
            <?php
                }
            ?>

            <!-- Accès Menu principal Réservation -->
            <?php
                if (($_SESSION['menu_reserv_dispo'] == 'Inactif') &&  
                ($_SESSION['menu_reserv_attente'] == 'Inactif') &&
                ($_SESSION['menu_reserv_confirme'] == 'Inactif') &&
                ($_SESSION['menu_reserv_termine'] == 'Inactif') &&
                ($_SESSION['menu_reserv_annule'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php echo $reservation; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php echo $label_reservation ?></span></a>
                <ul class="dropdown-menu">

                    <!-- Accès Menu reserv_dispo -->
                    <?php
                        if($_SESSION['menu_reserv_dispo'] == 'Actif'){
                    ?>
                        <li class="<?php echo $reserv_dispo; ?>"><a class="nav-link" href="reserv-dispo.php"><span><?php echo $label_dispo ?></span></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu reserv_attente -->
                    <?php
                        if($_SESSION['menu_reserv_attente'] == 'Actif'){
                    ?>
                        <li class="<?php echo $reserv_attente; ?>"><a class="nav-link" href="reserv-attente.php"><span><?php echo $label_en_attente ?></span></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu reserv_confirme -->
                    <?php
                        if($_SESSION['menu_reserv_confirme'] == 'Actif'){
                    ?>
                        <li class="<?php echo $reserv_confirme; ?>"><a class="nav-link" href="reserv-confirme.php"><?php echo $label_confirme ?></a></li>
                    <?php
                    }
                    ?>


                    <!-- Accès Menu reserv_termine -->
                    <?php
                        if($_SESSION['menu_reserv_termine'] == 'Actif'){
                    ?>
                        <li class="<?php echo $reserv_termine; ?>"><a class="nav-link" href="reserv-termine.php"><?php echo $label_termine ?></a></li>
                    <?php
                    }
                    ?>


                    <!-- Accès Menu reserv_annule -->
                    <?php
                        if($_SESSION['menu_reserv_annule'] == 'Actif'){
                    ?>
                        <li class="<?php echo $reserv_annule; ?>"><a class="nav-link" href="reserv-annule.php"><?php echo $label_annule ?></a></li>
                    <?php
                    }
                    ?>

                </ul>
            </li>
            <?php
                }
            ?>


            <!-- Accès Menu principal Hébergement -->
            <?php
                if (($_SESSION['menu_type_chambre'] == 'Inactif') &&  
                ($_SESSION['menu_carac_chambre'] == 'Inactif') &&
                ($_SESSION['menu_chambre'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php echo $hebergement; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php echo $label_hebergement ?></span></a>
                <ul class="dropdown-menu">

                    <!-- Accès Menu type_chambre -->
                    <?php
                        if($_SESSION['menu_type_chambre'] == 'Actif'){
                    ?>
                        <li class="<?php echo $type_chambre; ?>"><a class="nav-link" href="type-chambre.php"><span><?php echo $label_type_chambre ?></span></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu carac_chambre -->
                    <?php
                        if($_SESSION['menu_carac_chambre'] == 'Actif'){
                    ?>
                        <li class="<?php echo $carac_chambre; ?>"><a class="nav-link" href="carac-chambre.php"><?php echo $label_carac_chambre ?></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu chambre -->
                    <?php
                        if($_SESSION['menu_chambre'] == 'Actif'){
                    ?>
                        <li class="<?php echo $chambre; ?>"><a class="nav-link" href="chambre.php"><?php echo $label_chambre ?></a></li>
                    <?php
                    }
                    ?>

                </ul>
            </li>
            <?php
                }
            ?>




            <!-- Accès Menu principal Restaurant -->
            <?php
                if (($_SESSION['menu_type_plat'] == 'Inactif') &&  
                ($_SESSION['menu_plat'] == 'Inactif') &&
                ($_SESSION['menu_article'] == 'Inactif')) {

                } else {
            ?>

            <li class="dropdown <?php echo $restaurant; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php echo $label_restaurant ?></span></a>
                <ul class="dropdown-menu">
                    <!-- Accès Menu Type plat -->
                    <?php
                         if($_SESSION['menu_type_plat'] == 'Actif'){
                    ?>
                        <li class="<?php echo $type_plat; ?>"><a class="nav-link" href="type-plat.php"><span><?php echo $label_type_plat ?></span></a></li>
                    <?php
                     }
                    ?>
                    <!-- Accès Menu Plats -->
                    <?php
                         if($_SESSION['menu_plat'] == 'Actif'){
                    ?>
                        <li class="<?php echo $plat; ?>"><a class="nav-link" href="plat.php"><span><?php echo $label_plat ?></span></a></li>
                    <?php
                     }
                    ?>
                    <!-- Accès Menu article_restau -->
                    <?php
                          if($_SESSION['menu_article_restau'] == 'Actif'){
                    ?>
                        <li class="<?php echo $article_restau; ?>"><a class="nav-link" href="article-restau.php"><span><?php echo $label_article_restau ?></span></a></li>
                    <?php
                     }
                    ?>
                    <!-- Accès Menu statistiques -->
                    <?php
                        //  if($_SESSION['menu_statistique'] == 'Actif'){
                    ?>
                        <!-- <li class="<?php //echo $reserv_statistique; ?>"><a class="nav-link" href="#"><span><?php //echo $label_statistique ?>Statistiques</span></a></li> -->
                    <?php
                    //  }
                    ?>
                    
                </ul>
            </li>

            <?php
                 }
            ?>



            <!-- Accès bar -->
            <?php
                 if (($_SESSION['menu_boisson'] == 'Inactif')) {

                 } else {
            ?>

            <li class="dropdown <?php echo $bar; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php echo $label_bar ?></span></a>
                <ul class="dropdown-menu">

                    <!-- Accès menu boisson -->
                    <?php
                         if($_SESSION['menu_boisson'] == 'Actif'){
                    ?>
                        <li class="<?php echo $boisson; ?>"><a class="nav-link" href="boisson.php"><span><?php echo $label_boisson ?></span></a></li>
                    <?php
                    }
                    ?>

                </ul>
            </li>

        <?php
            }
        ?>




            <!-- Accès Menu principal Transport -->
            <?php
                 if (($_SESSION['menu_marque_voiture'] == 'Inactif') &&
                     ($_SESSION['menu_voiture'] == 'Inactif')
                 )  
                {} else {
            ?>

            <li class="dropdown <?php echo $transport; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php echo $label_transport ?></span></a>
                <ul class="dropdown-menu">

                    <!-- Accès Menu marque -->
                    <?php
                         if($_SESSION['menu_marque_voiture'] == 'Actif'){
                    ?>
                        <li class="<?php echo $marque_voiture; ?>"><a class="nav-link" href="marque-voiture.php"><span><?php echo $label_marque_voiture ?></span></a></li>
                    <?php
                     }
                    ?>                    

                    <!-- Accès Menu voiture -->
                    <?php
                         if($_SESSION['menu_voiture'] == 'Actif'){
                    ?>
                        <li class="<?php echo $voiture; ?>"><a class="nav-link" href="voiture.php"><span><?php echo $label_voiture ?></span></a></li>
                    <?php
                     }
                    ?>  
                    <!-- Accès Menu statistiques -->
                    <?php
                        // if($_SESSION['menu_reserv_dispo'] == 'Actif'){
                    ?>
                        <li class="<?php //echo $reserv_dispo; ?>"><a class="nav-link" href="#"><span><?php //echo $label_dispo ?>Statistiques</span></a></li>
                    <?php
                    // }
                    ?>

                    
                </ul>
            </li>

            <?php
                 }
            ?>



            <!-- Accès Menu principal Salle de conférence -->
            <?php
                if (($_SESSION['menu_location_conf'] == 'Inactif') &&
                ($_SESSION['menu_facture_conf'] == 'Inactif') &&
                ($_SESSION['menu_salle_conf'] == 'Inactif') &&
                ($_SESSION['menu_carac_conf'] == 'Inactif') &&
                ($_SESSION['menu_service_conf'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php echo $conference; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php echo $label_conference ?></span></a>
                <ul class="dropdown-menu">
                    <!-- Accès Menu Location de salle de conférence -->
                    <?php
                        if($_SESSION['menu_location_conf'] == 'Actif'){
                    ?>
                        <li class="<?php echo $location_conf; ?>"><a class="nav-link" href="location-conf.php"><span><?php echo $label_location_conf ?></span></a></li>
                    <?php
                    }
                    ?>
                    
                    <!-- Accès Menu Facture - Salle de conférence -->
                    <?php
                        if($_SESSION['menu_facture_conf'] == 'Actif'){
                    ?>
                        <li class="<?php echo $facture_conf; ?>"><a class="nav-link" href="facture-conf.php"><span><?php echo $label_facture_conf ?></span></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu Salles -->
                    <?php
                        if($_SESSION['menu_salle_conf'] == 'Actif'){
                    ?>
                        <li class="<?php echo $salle_conf; ?>"><a class="nav-link" href="salle-conf.php"><span><?php echo $label_salle_conf ?></span></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu Caractéristiques des salles de conférence -->
                    <?php
                        if($_SESSION['menu_carac_conf'] == 'Actif'){
                    ?>
                        <li class="<?php echo $carac_conf; ?>"><a class="nav-link" href="carac-conf.php"><span><?php echo $label_carac_conf ?></span></a></li>
                    <?php
                    }
                    ?>
                    
                    <!-- Accès Menu Services associés aux salles de conférence -->
                    <?php
                        if($_SESSION['menu_service_conf'] == 'Actif'){
                    ?>
                        <li class="<?php echo $service_conf; ?>"><a class="nav-link" href="service-conf.php"><span><?php echo $label_service_conf ?></span></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu statistiques -->
                    <?php
                        if($_SESSION['menu_stat_conf'] == 'Actif'){
                    ?>
                        <li class="<?php echo $stat_conf; ?>"><a class="nav-link" href="stat-conf.php"><span><?php echo $label_stat_conf ?></span></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>

            <?php
                }
            ?>







            <!-- Accès Menu principal SPA -->
            <?php
                if (($_SESSION['menu_soins_spa'] == 'Inactif') &&  
                ($_SESSION['menu_prestation_spa'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php echo $spa; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php //echo $label_reservation ?>SPA</span></a>
                <ul class="dropdown-menu">
                    <!-- Accès Menu Prestation - SPA -->
                    <?php
                        if($_SESSION['menu_prestation_spa'] == 'Actif'){
                    ?>
                        <li class="<?php echo $prestation_spa; ?>"><a class="nav-link" href="prestation-spa.php"><span><?php //echo $label_prestation_spa ?>Prestations</span></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu Facture - SPA -->
                    <?php
                        if($_SESSION['menu_facture_spa'] == 'Actif'){
                    ?>
                        <li class="<?php echo $facture_spa; ?>"><a class="nav-link" href="facture-spa.php"><span><?php //echo $label_facture_spa ?>Factures</span></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu Soins - Spa -->
                    <?php
                        if($_SESSION['menu_soins_spa'] == 'Actif'){
                    ?>
                        <li class="<?php echo $soins_spa; ?>"><a class="nav-link" href="soins-spa.php"><span><?php //echo $label_soins_spa ?>Soins</span></a></li>
                    <?php
                    }
                    ?>

                    <!-- Accès Menu Statistiques - Spa -->
                    <?php
                        if($_SESSION['menu_stat_spa'] == 'Actif'){
                    ?>
                        <li class="<?php echo $stat_spa; ?>"><a class="nav-link" href="stat-spa.php"><span><?php //echo $label_stat_spa ?>Statistiques</span></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>

            <?php
                }
            ?>














            <!-- Accès Menu principal Piscine -->
            <?php
                // if (($_SESSION['menu_reserv_dispo'] == 'Inactif') &&  
                // ($_SESSION['menu_reserv_attente'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_confirme'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_termine'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_annule'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php //echo $restaurant; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php //echo $label_reservation ?>Piscine</span></a>
                <ul class="dropdown-menu">

                    <!-- Accès Menu statistiques -->
                    <?php
                        // if($_SESSION['menu_reserv_dispo'] == 'Actif'){
                    ?>
                        <li class="<?php //echo $reserv_dispo; ?>"><a class="nav-link" href="#"><span><?php //echo $label_dispo ?>Statistiques</span></a></li>
                    <?php
                    // }
                    ?>
                </ul>
            </li>

            <?php
                // }
            ?>


            <!-- Accès Menu principal Blanchisserie -->
            <?php
                // if (($_SESSION['menu_reserv_dispo'] == 'Inactif') &&  
                // ($_SESSION['menu_reserv_attente'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_confirme'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_termine'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_annule'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php //echo $restaurant; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php //echo $label_reservation ?>Blanchisserie</span></a>
                <ul class="dropdown-menu">

                    <!-- Accès Menu statistiques -->
                    <?php
                        // if($_SESSION['menu_reserv_dispo'] == 'Actif'){
                    ?>
                        <li class="<?php //echo $reserv_dispo; ?>"><a class="nav-link" href="#"><span><?php //echo $label_dispo ?>Statistiques</span></a></li>
                    <?php
                    // }
                    ?>
                </ul>
            </li>

            <?php
                // }
            ?>


            <!-- Accès Menu principal Night Club -->
            <?php
                // if (($_SESSION['menu_reserv_dispo'] == 'Inactif') &&  
                // ($_SESSION['menu_reserv_attente'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_confirme'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_termine'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_annule'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php //echo $restaurant; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php //echo $label_reservation ?>Night Club</span></a>
                <ul class="dropdown-menu">

                    <!-- Accès Menu statistiques -->
                    <?php
                        // if($_SESSION['menu_reserv_dispo'] == 'Actif'){
                    ?>
                        <li class="<?php //echo $reserv_dispo; ?>"><a class="nav-link" href="#"><span><?php //echo $label_dispo ?>Statistiques</span></a></li>
                    <?php
                    // }
                    ?>
                </ul>
            </li>

            <?php
                // }
            ?>


            <!-- Accès Menu principal Salle de fêtes -->
            <?php
                // if (($_SESSION['menu_reserv_dispo'] == 'Inactif') &&  
                // ($_SESSION['menu_reserv_attente'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_confirme'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_termine'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_annule'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php //echo $restaurant; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php //echo $label_reservation ?>Salle de fêtes</span></a>
                <ul class="dropdown-menu">

                    <!-- Accès Menu statistiques -->
                    <?php
                        // if($_SESSION['menu_reserv_dispo'] == 'Actif'){
                    ?>
                        <li class="<?php //echo $reserv_dispo; ?>"><a class="nav-link" href="#"><span><?php //echo $label_dispo ?>Statistiques</span></a></li>
                    <?php
                    // }
                    ?>
                </ul>
            </li>

            <?php
                // }
            ?>


            <!-- Accès Menu principal Salle de jeux -->
            <?php
                // if (($_SESSION['menu_reserv_dispo'] == 'Inactif') &&  
                // ($_SESSION['menu_reserv_attente'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_confirme'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_termine'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_annule'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php //echo $restaurant; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php //echo $label_reservation ?>Salle de jeux</span></a>
                <ul class="dropdown-menu">

                    <!-- Accès Menu statistiques -->
                    <?php
                        // if($_SESSION['menu_reserv_dispo'] == 'Actif'){
                    ?>
                        <li class="<?php //echo $reserv_dispo; ?>"><a class="nav-link" href="#"><span><?php //echo $label_dispo ?>Statistiques</span></a></li>
                    <?php
                    // }
                    ?>
                </ul>
            </li>

            <?php
                // }
            ?>


            <!-- Accès Menu principal Gestion du personnel -->
            <?php
                // if (($_SESSION['menu_reserv_dispo'] == 'Inactif') &&  
                // ($_SESSION['menu_reserv_attente'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_confirme'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_termine'] == 'Inactif') &&
                // ($_SESSION['menu_reserv_annule'] == 'Inactif')) {} else {
            ?>

            <li class="dropdown <?php //echo $restaurant; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span><?php //echo $label_reservation ?>Gestion du personnel</span></a>
                <ul class="dropdown-menu">

                    <!-- Accès Menu statistiques -->
                    <?php
                        // if($_SESSION['menu_reserv_dispo'] == 'Actif'){
                    ?>
                        <li class="<?php //echo $reserv_dispo; ?>"><a class="nav-link" href="#"><span><?php //echo $label_dispo ?>Statistiques</span></a></li>
                    <?php
                    // }
                    ?>
                </ul>
            </li>

            <?php
                // }
            ?>




            <!--
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                    <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                    <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                    <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                    <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                    <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                    <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                    <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                    <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                    <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                    <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                    <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                    <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                    <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                    <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                    <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                    <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                    <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                    <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                    <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                </ul>
            </li>
            <li class="menu-header">Stisla</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="components-article.html">Article</a></li>                <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>                <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>                <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty State</a></li>                <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Hero</a></li>                <li><a class="nav-link" href="components-multiple-upload.html">Multiple Upload</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="components-pricing.html">Pricing</a></li>                <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>                <li><a class="nav-link" href="components-tab.html">Tab</a></li>
                    <li><a class="nav-link" href="components-table.html">Table</a></li>
                    <li><a class="nav-link" href="components-user.html">User</a></li>                <li><a class="nav-link beep beep-sidebar" href="components-wizard.html">Wizard</a></li>              </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                <ul class="dropdown-menu">
                    <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                    <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                    <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                    <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                    <li><a href="gmaps-marker.html">Marker</a></li>
                    <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                    <li><a href="gmaps-route.html">Route</a></li>
                    <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
            </li>            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                    <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                    <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                    <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                    <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                    <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                    <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                    <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                    <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                    <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                    <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                    <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                    <li><a href="auth-login.html">Login</a></li>
                    <li><a href="auth-register.html">Register</a></li>
                    <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="errors-503.html">503</a></li>
                    <li><a class="nav-link" href="errors-403.html">403</a></li>
                    <li><a class="nav-link" href="errors-404.html">404</a></li>
                    <li><a class="nav-link" href="errors-500.html">500</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                    <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                    <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                    <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                    <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                    <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                    <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li><a href="utilities-contact.html">Contact</a></li>
                    <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                    <li><a href="utilities-subscribe.html">Subscribe</a></li>
                </ul>
            </li>            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
            -->
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>        </aside>
</div>
<?php
}
?>