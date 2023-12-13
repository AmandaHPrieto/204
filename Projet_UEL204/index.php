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

			<?php 
			include('menu.php');
			?>
		</header>
<section>
	<h1>AirPHP: les bonnes bases pour votre maison!</h1>
	<div class="form">
		<form method="POST" action="index.php">
			<fieldset>
		 	 	<legend>Que recherchez vous?</legend>
			<div class="form-box">
				<div class="form-top row around">
		  			<div class="form-type row">
						<label for="cat-maison">Maison</label>
						<input type="checkbox" name="categorie[]" id="cat-maison" value="maison"></br>
						<label for="cat-appartement">Appartement</label>
						<input type="checkbox" name="categorie[]" id="cat-appartement" value="appartement" ></br>
		  			</div>
					
					<div class="form-surface row">
						<label for="surface">Surface en m2</label>
						<input type="text" name="surface" id="surface"></br>
					</div>

					<div class="form-city row">
						<label for="ville">Saisissez la ville où vous recherchez</label>
							<select id="ville" name="ville">
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
							</select><br>
						</div>

						<div class="form-budget row">
							<label for="budget">Votre budget</label>
								<select id="budget" name="budget">
									<option value="">Veuillez indiquer votre budget</option>
									<option value="100000">100000€</option>
									<option value="150000">150000€</option>
									<option value="200000">200000€</option>
									<option value="250000">250000€</option>
									<option value="350000">350000€</option>
									<option value="500000€">500000€</option>
								</select><br>
						</div>
					</div>
					<div class=form-bottom >
						<input type="submit" value="Trouver mon bonheur" class="button">
					</div>
				</div>	
				</fieldset>
			</form>
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
