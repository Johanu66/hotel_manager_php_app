<?php
include('../database_connection.php');
include('../AddLogInclude.php');
// Fichiers Langues
include('../lang/fr-lang.php');
include('../lang/en-lang.php');
// functions
include('../scripts_php/fonctions_list.php');

// Renvoie à la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['type_compte'])) {
	header('location:connexion.php');
}

// Renvoie au tableau de bord si l'utilisateur n'a pas accès à stat_conf
if( isset($_SESSION['menu_stat_conf']) && ($_SESSION['menu_stat_conf'] == 'Inactif')) {
    header('location:tableau-de-bord-admin.php');
}

// Log
switch ($_SESSION['type_compte']) {
    case 1:
        addlog("Cons-01-stat-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 2:
        addlog("Cons-02-stat-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 3:
        addlog("Cons-03-stat-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 4:
        addlog("Cons-04-stat-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
    case 5:
        addlog("Cons-05-stat-conf", "", $_SESSION["prenom_personne"]." ".$_SESSION["nom_personne"]);
        break;
}

// menu et sous-menu actifs dans sidebar
$conference = 'active';
$stat_conf = 'active';

// variables langues
if ($_SESSION['lang'] == 'EN') {
    $page_name = TITRE_STAT_CONF_EN;
    $label_total_location = TOTAL_LOCATION_STAT_CONF_EN;
    $label_total_salle = TOTAL_SALLE_STAT_CONF_EN;
    $label_total_carac = TOTAL_CARAC_STAT_CONF_EN;
    $label_total_service = TOTAL_SERVICE_STAT_CONF_EN;
    $label_location_sans_facture = LOCATION_SANS_FACTURE_STAT_CONF_EN;
    $label_location_sans_prix = LOCATION_SANS_PRIX_STAT_CONF_EN;
    $label_salle_dispo = SALLE_DISPO_STAT_CONF_EN;
    $label_location_avec_service_addi = LOCATION_AVEC_SERVICE_ADDI_STAT_CONF_EN;
    $label_top_service_addi = TOP_SERVICE_ADDI_STAT_CONF_EN;
    $label_top_client = TOP_CLIENT_STAT_CONF_EN;
    $tooltip_total_salle = TOOLTIP_TOTAL_SALLE_STAT_CONF_EN;    
    $tooltip_salle_dispo = TOOLTIP_SALLE_DISPO_STAT_CONF_EN;
    $tooltip_total_carac = TOOLTIP_TOTAL_CARAC_STAT_CONF_EN;
    $tooltip_total_service = TOOLTIP_TOTAL_SERVICE_STAT_CONF_EN;
    $tooltip_total_location = TOOLTIP_TOTAL_LOCATION_STAT_CONF_EN;
    $tooltip_location_sans_facture = TOOLTIP_LOCATION_SANS_FACTURE_STAT_CONF_EN;
    $tooltip_location_sans_prix = TOOLTIP_LOCATION_SANS_PRIX_STAT_CONF_EN;
    $tooltip_location_avec_service_addi = TOOLTIP_LOCATION_AVEC_SERVICE_ADDI_STAT_CONF_EN;
    $tooltip_top_client = TOOLTIP_TOP_CLIENT_STAT_CONF_EN;
    $tooltip_top_service_addi = TOOLTIP_TOP_SERVICE_ADDI_STAT_CONF_EN;
} else {
    $page_name = TITRE_STAT_CONF_FR;
    $label_total_location = TOTAL_LOCATION_STAT_CONF_FR;
    $label_total_salle = TOTAL_SALLE_STAT_CONF_FR;
    $label_total_carac = TOTAL_CARAC_STAT_CONF_FR;
    $label_total_service = TOTAL_SERVICE_STAT_CONF_FR;
    $label_location_sans_facture = LOCATION_SANS_FACTURE_STAT_CONF_FR;
    $label_location_sans_prix = LOCATION_SANS_PRIX_STAT_CONF_FR;
    $label_salle_dispo = SALLE_DISPO_STAT_CONF_FR;
    $label_location_avec_service_addi = LOCATION_AVEC_SERVICE_ADDI_STAT_CONF_FR;
    $label_top_service_addi = TOP_SERVICE_ADDI_STAT_CONF_FR;
    $label_top_client = TOP_CLIENT_STAT_CONF_FR;
    $tooltip_total_salle = TOOLTIP_TOTAL_SALLE_STAT_CONF_FR;    
    $tooltip_salle_dispo = TOOLTIP_SALLE_DISPO_STAT_CONF_FR;
    $tooltip_total_carac = TOOLTIP_TOTAL_CARAC_STAT_CONF_FR;
    $tooltip_total_service = TOOLTIP_TOTAL_SERVICE_STAT_CONF_FR;
    $tooltip_total_location = TOOLTIP_TOTAL_LOCATION_STAT_CONF_FR;
    $tooltip_location_sans_facture = TOOLTIP_LOCATION_SANS_FACTURE_STAT_CONF_FR;
    $tooltip_location_sans_prix = TOOLTIP_LOCATION_SANS_PRIX_STAT_CONF_FR;
    $tooltip_location_avec_service_addi = TOOLTIP_LOCATION_AVEC_SERVICE_ADDI_STAT_CONF_FR;
    $tooltip_top_client = TOOLTIP_TOP_CLIENT_STAT_CONF_FR;
    $tooltip_top_service_addi = TOOLTIP_TOP_SERVICE_ADDI_STAT_CONF_FR;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $page_name; ?> - Hôtel</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="../assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="../assets/modules/summernote/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <style>
      #top_client .card-header {
        display: grid;
        grid-template-columns: auto auto auto;
      }
      #top_client .selectgroup {
        padding: 0px 15px;
      }
    </style>

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include '../parts/navbar.php';?>
            <?php include '../parts/sidebar.php';?>

            <!-- Main Content -->
            <div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1><?php echo $page_name; ?></h1>
					</div>

					<!-- Les cartes -->
					<div class="row">
						<?php echo carte_A("far fa-newspaper", "bg-danger", $label_total_salle, $tooltip_total_salle, fill_count_conf('total_salle'), "total_salle"); ?>
						<?php echo carte_A("fas fa-circle", "bg-primary", $label_salle_dispo, $tooltip_salle_dispo, fill_count_conf('salle_dispo'), "salle_dispo"); ?>
						<?php echo carte_A("far fa-file", "bg-warning", $label_total_carac, $tooltip_total_carac, fill_count_conf('total_carac'), "total_carac"); ?>
						<?php echo carte_A("fas fa-circle", "bg-success", $label_total_service, $tooltip_total_service, fill_count_conf('total_service'), "total_service"); ?>
					</div>
					<div class="row">
						<?php echo carte_A("far fa-user", "bg-primary", $label_total_location, $tooltip_total_location, fill_count_conf('total_location'), "total_location"); ?>
						<?php echo carte_A("far fa-newspaper", "bg-danger", $label_location_sans_facture, $tooltip_location_sans_facture, fill_count_conf('location_sans_facture'), "location_sans_facture"); ?>
						<?php echo carte_A("far fa-file", "bg-success", $label_location_sans_prix, $tooltip_location_sans_prix, fill_count_conf('location_sans_prix'), "location_sans_prix"); ?>
						<?php echo carte_A("far fa-file", "bg-warning", $label_location_avec_service_addi, $tooltip_location_avec_service_addi, fill_count_conf('location_avec_service_addi'), "location_avec_service_addi"); ?>
					</div>


					<div class="row">
						<!-- TOP CLIENTS -->
						<div class="col-lg-6 col-md-6 col-12" id="top_client">
							<div class="card">
								<div class="card-header">

									<h4 data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $tooltip_top_client; ?>"><?php echo $label_top_client; ?></h4>
									<!-- MODE SELECTION -->
									<div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="value" value="location" class="selectgroup-input" />
											<span class="selectgroup-button" data-toggle="tooltip" data-placement="top" title="" data-original-title="TOP 10 des clients ayant éffectué le plus grand nombre de locations">locations</span>
										</label>
										<label class="selectgroup-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="TOP 10 des clients ayant généré le plus de revenus" >
											<input type="radio" name="value" value="montant" class="selectgroup-input" checked />
											<span class="selectgroup-button">montant</span>
										</label>
									</div>

									<div class="card-header-action dropdown">
										<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Tout le temps</a>
										<ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
										<li class="dropdown-title">Choisissez une période</li>
										<li><a href="#" class="dropdown-item" data-periode="mois">Ce mois-ci</a></li>
										<li><a href="#" class="dropdown-item" data-periode="3_mois">3 mois</a></li>
										<li><a href="#" class="dropdown-item" data-periode="6_mois">6 mois</a></li>
										<li><a href="#" class="dropdown-item" data-periode="1_an">1 an</a></li>
										<li><a href="#" class="dropdown-item active" data-periode="all">Tout le temps</a></li>
										</ul>
									</div>


								<!-- <div class="card-header-action">
									<div class="btn-group">
									<a href="#" class="btn btn-primary">par Montant</a>
									<a href="#" class="btn">par Nbre de location</a>
									</div>
								</div> -->

								</div>                


								<div class="card-body">
									<?php echo fill_top_client_conf('montant', 'all'); ?>
								</div>
							</div>
						</div>

						<!-- TOP SERVICES ADDI -->
						<div class="col-lg-6 col-md-6 col-12" id="top_service_addi">
							<div class="card">
								<div class="card-header">
								<h4 data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $tooltip_top_service_addi; ?>"><?php echo $label_top_service_addi; ?></h4>
									<div class="card-header-action dropdown">
										<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Tout le temps</a>
										<ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
										<li class="dropdown-title">Choisissez une période</li>
										<li><a href="#" class="dropdown-item" data-periode="mois">Ce mois-ci</a></li>
										<li><a href="#" class="dropdown-item" data-periode="3_mois">3 mois</a></li>
										<li><a href="#" class="dropdown-item" data-periode="6_mois">6 mois</a></li>
										<li><a href="#" class="dropdown-item" data-periode="1_an">1 an</a></li>
										<li><a href="#" class="dropdown-item active" data-periode="all">Tout le temps</a></li>
										</ul>
									</div>
								</div>                


								<div class="card-body">
									<?php echo fill_top_service_addi('all'); ?>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<!-- General Chart: Revenu des locations / Nombre de location -->
						<div class="col-lg-8" id="general_chart">
							<div class="card">
								<div class="card-header">
								<h4 class="revenu actif" data-mode_selection="montant">Revenu des locations</h4>
								<h4 class="location" data-mode_selection="location">Nombre de location</h4>
								<a href="#" class="btn btn_graph revenu">Revenu des locations</a>
								<a href="#" class="btn btn_graph location">Nbre de location</a>

								<div class="card-header-action dropdown salles" style="margin-right:10px;">
									<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Toutes les salles</a>
									<ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
									<li class="dropdown-title">Choisissez les salles</li>
									<?php echo fill_salle_header_actions(); ?>
									<li><a href="#" class="dropdown-item active" data-id_salle="all">Toutes les salles</a></li>
									</ul>
								</div>

								<div class="card-header-action dropdown periode">
									<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Tout le temps</a>
									<ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
									<li class="dropdown-title">Choisissez une période</li>
									<li><a href="#" class="dropdown-item" data-periode="6_mois">6 mois</a></li>
									<li><a href="#" class="dropdown-item" data-periode="1_an">1 an</a></li>
									<li><a href="#" class="dropdown-item active" data-periode="all">Tout le temps</a></li>
									</ul>
								</div>
								</div>
								<div class="card-body">
								<center>No Data</center>
								<canvas id="general" height="158"></canvas>
								</div>
							</div>
						</div>

						<!-- Test Doughnut -->
						<div class="col-lg-4" id="test_doughnut">
							<div class="card">
								<div class="card-header">
									<h4>Doughnut</h4>
								</div>

								<div class="card-body">
									<!-- <center>No Data</center> -->
									<canvas id="doughnut"></canvas>
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
	<script src="../assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
	<script src="../assets/modules/chart.min.js"></script>
	<script src="../assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
	<script src="../assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
	<script src="../assets/modules/summernote/summernote-bs4.js"></script>
	<script src="../assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

	<!-- Page Specific JS File -->
	<!-- <script src="../assets/js/page/index-0.js"></script> -->
	
	<!-- Template JS File -->
	<script src="../assets/js/scripts.js"></script>
	<script src="../assets/js/custom.js"></script>

	<script type="text/javascript">

	new Chart($('#doughnut'), {
		type: 'doughnut',
		data: {
			labels: ['Red', 'Blue', 'Yellow'],
			datasets: [{
				label: 'Test Doughnut',
				data: [300, 50, 100],
				backgroundColor: [
					'rgb(255, 99, 132)',
					'rgb(54, 162, 235)',
					'rgb(255, 205,86)'
				],
				hoverOffset: 4
			}]
		},
	});






		// // // TOP SERVICES ADDI
		// action sélectionner période
		$('#top_service_addi .dropdown-item').click(function() {
			event.preventDefault();
			var item = $(this);
			console.log('periode: ' + item.data("periode"));

			$.ajax({
				url: "stat-conf-action.php",
				method: "POST",
				data: {action:"fill_top_service_addi", periode: item.data("periode")},
				dataType: "json",
				success: function(data) {
					$('#top_service_addi .card-body').html(data);
					$('#top_service_addi .dropdown-toggle').text(item.text());
					item.parent('li').siblings().find('a').removeClass('active');
					item.addClass("active");
				}
			})
		});

		// // // TOP CLIENT
		// action sélectionner période
		$('#top_client .dropdown-item').click(function() {
			event.preventDefault();
			var item = $(this);
			var mode_selection = $('#top_client .selectgroup-item input[checked]').val();
			console.log('periode: ' + item.data("periode"));
			console.log('mode_selection: ' + mode_selection);

			$.ajax({
				url: "stat-conf-action.php",
				method: "POST",
				data: {action:"fill_top_client", periode: item.data("periode"), mode_selection: mode_selection},
				dataType: "json",
				success: function(data) {
					$('#top_client .card-body').html(data);
					$('#top_client .dropdown-toggle').text(item.text());
					item.parent('li').siblings().find('a').removeClass('active');
					item.addClass("active");
				}
			})
		});

		// action selectionner mode de sélection
		$('#top_client .selectgroup-item input').click(function() {
			var item = $(this);
			var periode = $('#top_client .dropdown-item.active').data("periode");
			console.log('periode: ' + periode);
			console.log('mode_selection: ' + item.val());

			$.ajax({
				url: "stat-conf-action.php",
				method: "POST",
				data: {action: "fill_top_client", periode: periode, mode_selection: item.val()},
				dataType: "json",
				success: function(data) {
					$('#top_client .card-body').html(data);
					$('#top_client .selectgroup-item input[checked]').attr('checked', false);
					item.attr('checked', true);
				}
			})
		})


		// // // GENERAL CHART
		function customLineChart(ctx, label, labels, data, step_size) {
			return new Chart(ctx, {
				type: 'line',
				data: {
					labels: labels,
					datasets: [{
					label: label,
					data: data,
					borderWidth: 0,
					backgroundColor: 'rgba(63,82,227,.8)',
					borderWidth: 0,
					borderColor: 'transparent',
					pointBorderWidth: 2,
					pointRadius: 3.5,
					pointBackgroundColor: '#ffffff',
					pointBorderColor: 'rgba(63,82,227,.8)',
					pointHoverBackgroundColor: 'rgba(63,82,227,.5)',
					}]
				},
				options: {
					legend: {display:false},
					scales: {
					yAxes: [{
						gridLines: {
						drawBorder: false,
						color: '#f2f2f2',
						},
						ticks: {
						beginAtZero: true,
						stepSize: step_size,
						}
					}],
					xAxes: [{
						gridLines: {
						display: false,
						}
					}]
					}
				}
			})
		}

		function customBarChart(ctx, label, labels, data, step_size) {
			return new Chart(ctx, {
				type: 'bar',
				data: {
					labels: labels,
					datasets: [{
					label: label,
					data: data,
					borderWidth: 0,
					backgroundColor: 'rgba(63,82,227,.8)',
					borderWidth: 0,
					borderColor: 'transparent',
					// pointBorderWidth: 2,
					// pointRadius: 3.5,
					// pointBackgroundColor: '#ffffff',
					// pointBorderColor: 'rgba(63,82,227,.8)',
					// pointHoverBackgroundColor: 'rgba(63,82,227,.5)',
					}]
				},
				options: {
					legend: {display:false},
					scales: {
					yAxes: [{
						gridLines: {
						drawBorder: false,
						color: '#f2f2f2',
						},
						ticks: {
						beginAtZero: true,
						stepSize: step_size,
						}
					}],
					xAxes: [{
						gridLines: {
						display: false,
						}
					}]
					}
				}
			})
		}

		function generalChart(ctx, type, label, labels, data, step_size) {
			if (type == 'line') { return customLineChart(ctx, label, labels, data, step_size);}
			else if (type == 'bar') {return customBarChart(ctx, label, labels, data, step_size);}
		}

		function updateGeneralChart(type, label, labels, data, step_size) {
			$('#general').remove();
			$('#general_chart .card-body').append('<canvas id="general"></canvas>');
			var ctx = document.getElementById('general').getContext('2d');
			generalChart(ctx, type, label, labels, data, step_size);
		}

		// Etat initial
		$('#general_chart h4.location').hide();
		$('.btn_graph.revenu').hide();

		// load chart
		$.ajax({
			url: "stat-conf-action.php",
			method: "POST",
			data: {action: "fetch_general_chart", periode:"all", salles:'all', mode_selection:"montant"},
			dataType: "json",
			success: function(general_chart_parameters) {
				console.log(general_chart_parameters);
				if (general_chart_parameters == null) {
					$("#general_chart .card-body center").show();
					$('#general').hide();
				} else {
					$("#general_chart .card-body center").hide();
					$('#general').show();
					var ctx = document.getElementById("general").getContext('2d');
					general_chart = generalChart(ctx, ...general_chart_parameters);
				}
			}
		})

		// action sélectionner période
		$('#general_chart .periode .dropdown-item').click(function() {
			event.preventDefault();
			var item = $(this);
			var salles = $('#general_chart .salles .dropdown-item.active').data("id_salle");
			var mode_selection = $('#general_chart h4.actif').data("mode_selection");
			console.log('salles: ' + salles);
			console.log('periode: ' + item.data("periode"));
			console.log('mode_selection: ' + mode_selection);

			$.ajax({
				url: "stat-conf-action.php",
				method: "POST",
				data: {action: "fetch_general_chart", periode: item.data("periode"), salles:salles, mode_selection:mode_selection},
				dataType: "json",
				success: function(general_chart_parameters) {
					console.log(general_chart_parameters);
					if (general_chart_parameters == null) {
						$("#general_chart .card-body center").show();
						$('#general').hide();
					} else {
						$("#general_chart .card-body center").hide();
						$('#general').show();
						updateGeneralChart(...general_chart_parameters);
					}

					$('#general_chart .periode .dropdown-toggle').text(item.text());
					item.parent('li').siblings().find('a').removeClass('active');
					item.addClass("active");
				}
			})
		})

		// action sélectionner salles
		$('#general_chart .salles .dropdown-item').click(function() {
			event.preventDefault();
			var item = $(this);
			var periode = $('#general_chart .periode .dropdown-item.active').data("periode");
			var mode_selection = $('#general_chart h4.actif').data("mode_selection");
			console.log('salles: ' + item.data("id_salle"));
			console.log('periode: ' + periode);
			console.log('mode_selection: ' + mode_selection);

			$.ajax({
				url: "stat-conf-action.php",
				method: "POST",
				data: {action: "fetch_general_chart", periode:periode, salles:item.data("id_salle"), mode_selection:mode_selection},
				dataType: "json",
				success: function(general_chart_parameters) {
					console.log(general_chart_parameters);
					if (general_chart_parameters == null) {
						$("#general_chart .card-body center").show();
						$('#general').hide();
					} else {
						$("#general_chart .card-body center").hide();
						$('#general').show();
						updateGeneralChart(...general_chart_parameters);
					}

					$('#general_chart .salles .dropdown-toggle').text(item.text());
					item.parent('li').siblings().find('a').removeClass('active');
					item.addClass("active");
				}
			})
		})

		// afficher le graphe du nombre de location
		$('.btn_graph.location').click( function(){
			event.preventDefault();
			var periode = $('#general_chart .periode .dropdown-item.active').data("periode");
			var salles = $('#general_chart .salles .dropdown-item.active').data("id_salle");
			var mode_selection = 'location';
			console.log('salles: ' + salles);
			console.log('periode: ' + periode);
			console.log('mode_selection: ' + mode_selection);
		
			$.ajax({
				url: "stat-conf-action.php",
				method: "POST",
				data: {action: "fetch_general_chart", periode:periode, salles:salles, mode_selection:mode_selection},
				dataType: "json",
				success: function(general_chart_parameters) {
					console.log(general_chart_parameters);
					if (general_chart_parameters == null) {
						$("#general_chart .card-body center").show();
						$('#general').hide();
					} else {
						$("#general_chart .card-body center").hide();
						$('#general').show();
						updateGeneralChart(...general_chart_parameters);
					}

					$('#general_chart h4.revenu').hide();
					$('.btn_graph.location').hide();
					$('#general_chart h4.location').show();
					$('.btn_graph.revenu').show();
					$('#general_chart h4.revenu').removeClass('actif');
					$('#general_chart h4.location').addClass("actif");
				}
			})
		});

		// afficher le graphe des revenus des locations
		$('.btn_graph.revenu').click( function(){
			event.preventDefault();
			var periode = $('#general_chart .periode .dropdown-item.active').data("periode");
			var salles = $('#general_chart .salles .dropdown-item.active').data("id_salle");
			var mode_selection = 'montant';
			console.log('salles: ' + salles);
			console.log('periode: ' + periode);
			console.log('mode_selection: ' + mode_selection);

			$.ajax({
				url: "stat-conf-action.php",
				method: "POST",
				data: {action: "fetch_general_chart", periode:periode, salles:salles, mode_selection:mode_selection},
				dataType: "json",
				success: function(general_chart_parameters) {
					console.log(general_chart_parameters);
					if (general_chart_parameters == null) {
						$("#general_chart .card-body center").show();
						$('#general').hide();
					} else {
						$("#general_chart .card-body center").hide();
						$('#general').show();
						updateGeneralChart(...general_chart_parameters);
					}
					$('#general_chart h4.location').hide();
					$('.btn_graph.revenu').hide();
					$('#general_chart h4.revenu').show();
					$('.btn_graph.location').show();
					$('#general_chart h4.location').removeClass('actif');
					$('#general_chart h4.revenu').addClass("actif");
				}
			})
		});

	</script>

</body>
</html>