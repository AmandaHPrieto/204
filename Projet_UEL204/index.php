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
			<form method="POST" action="#">
				<fieldset>
					<legend>Que recherchez vous?</legend>
				<div class="form-box">
					<div class="form-top row around">
						<div class="form-type row">
							<label for="maison">Maison</label>
							<input type="checkbox" name="maison" id="maison" ></br>
							<label for="appartement">Appartement</label>
							<input type="checkbox" name="appartement" id="maison" ></br>
						</div>

						<div class="form-surface row">
							<label for="surface">Surface en m2</label>
							<input type="text" name="surface" id="surface"></br>
						</div>

						<div class="form-city row">
							<label for="ville">Saisissez la ville où vous recherchez</label>
								<select id="ville" name="ville">
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
									<option value="inferieur à 100000">Moins de 100000€</option>
									<option value="entre 100000 et 150000">100000 à 150000€</option>
									<option value="entre 150000 et 200000€">150000 à 200000€</option>
									<option value="entre 200000 et 250000€">200000 à 250000€</option>
									<option value="entre 250000 et 350000€">250000 à 350000€</option>
									<option value="Supérieur à 350000€">Au dessus de 350000€</option>
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