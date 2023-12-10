<?php	
    //démarrage session
    session_start();
	// On charge le fichier permettant de se connecter à la bdd
	include 'inc.connexion.php';
	include '../inc.functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>AirPhP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="png"/>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
	<fieldset class="fieldset">
		<legend><strong>Affichage du résultat de la requête</strong></legend>
	<?php

	afficherTousLogements();
	
	?>
	</fieldset>
	<br><br>
	<fieldset class="fieldset">
		<form method="post" action="../index.php">
			<input type="submit" value="Retour à la page d'accueil">
		</form>
	</fieldset>
</body>
</html>