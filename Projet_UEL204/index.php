<?php	
    //démarrage session
    session_start();
	include 'pages/inc.connexion.php';
	include './inc.functions.php';
	ini_set('display_errors', 'Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', dirname(__file__) . '/log_error_index_php.txt');

?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>AirPhP</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="png"/>
		<link href="assets/styles.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&family=Sniglet&display=swap" rel="stylesheet">
	</head>

	<body>


		<header class="bandeau ">
			<div class="row space align-center">

				<img class="header-logo" src="assets/images/logo.png" alt="logo-airphp">

				<nav>
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li><a href="pages/mes_favoris.php">Mes favoris</a></li>
						<li><a href="pages/connect.php">Me connecter</a></li>
						<li><a href="pages/inscription.php">M'inscrire</a></li>
					</ul>
				</nav>

			</div>

		</header>

		<section class="section-recherche">
	<h1>AirPHP: les bonnes bases pour votre maison!</h1>
	<div class="form ">
		<form class="form-search" method="POST" action="index.php">
			<fieldset>
		 	 	<legend class="form-legend">Que recherchez vous?</legend>
			<div class="form-box column align-around">
				<div class="form-top-line line space align-center row">
		  			<div class="form-type row">
						<div class="form-item type-item">
							<label for="cat-maison">Maison<input class="form-input" type="checkbox" name="categorie[]" id="cat-maison" value="maison"></br></label>
						</div>
						<div class="form-item type-item">
							<label for="cat-appartement">Appartement<input class="form-input" type="checkbox" name="categorie[]" id="cat-appartement" value="appartement" ></br></label>
						</div>
					</div>
					<div class="form-surface form-item row">
						<label for="surface">Surface en m2<input class="form-input small" type="text" name="surface" id="surface"></br></label>
					</div>
				</div>
				<div class="form-mid-line  space line row">
					<div class="form-city form-item  row">
						<label for="ville">Ville
							<select class="form-input med box" id="ville" name="ville" required>
								<option value=""></option>
								<option value="Limoges">Limoges</option>
								<option value="Panazol">Panazol</option>
								<option value="Couzeix">Couzeix</option>
								<option value="Feytiat">Feytiat</option>
								<option value="Condat-sur-Vienne">Condat-sur-Vienne</option>
								<option value="Le Vigen">Le Vigen</option>
								<option value="Verneuil-sur-Vienne">Verneuil-sur-Vienne</option>
								<option value="Rilhac-Rancon">Rilhac-Rancon</option>
								<option value="Boisseuil">Boisseuil</option>
							</select><br></label>
					</div>

					<div class="form-budget form-item row">
						<label for="budget">Budget
								<select class="form-input med box" id="budget" name="budget" required>
									<option value="">Votre budget max?</option>
									<option value="100000">100000€</option>
									<option value="150000">150000€</option>
									<option value="200000">200000€</option>
									<option value="250000">250000€</option>
									<option value="350000">350000€</option>
									<option value="500000€">500000€</option>
								</select><br></label>
					</div>
				</div>
				<div class="form-bottom-line justify-center line row">
					<input class="button big" type="submit" value="Trouver votre bonheur">
				</div>
			</div>	
			</fieldset>
		</form>
	</div>
		</div>
</section>

<section>
	<div>
		<fieldset class="resultats">
		<legend><strong>Résultats de vos recherches</strong></legend>

		<?php
			
			recherche();
			addFavori();



		?>
		</fielset>
	<div>

		<div class="connect">
			<a href="pages/connect.php">Connexion</a>
		</div>
			


	</body>
</html>
