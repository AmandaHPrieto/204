<?php 
	session_start();
	include 'inc.connexion.php';
	include '../inc.functions.php';

	ini_set('display_errors', 'Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', dirname(__file__) . '/log_error_resultats_php.txt');

	
	
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>AirPhP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="png"/>
    <link href="styles.css" rel="stylesheet">
</head>

<body>

<?php

?>
	</fieldset>
	<br><br>
	<fieldset class="fieldset">
		<form method="post" action="../index.php">
			<input type="submit" value="Retour à la page d'accueil" >
		</form>
		<a class="button" href="mes_favoris.php" title="Voir mes favoris">Voir mes favoris</a>

	</fieldset>
</body>
</html>