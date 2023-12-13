<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>AirPhP</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="png"/>
		<link href="assets/styles.css" rel="stylesheet">
	</head>

	<body>
		<h1>AirPHP: On trouve la maison de vos rêves et ce ne sont pas des paroles en l'air!</h1>


	<div class="form">
		<form method="POST" action="pages/resultats.php">
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

		<div class="connect">
			<a href="pages/connect.php">Connexion</a>
		</div>
			


	</body>
</html>