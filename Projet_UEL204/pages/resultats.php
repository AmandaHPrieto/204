<?php
	session_start();
	include 'inc.connexion.php';
	include '../inc.functions.php';

if($_GET && count($_GET)){

	if(array_key_exists('logement', $_GET) && !empty($_GET['logement'])){
		$id=$_GET['logement'];
		$request = $bdd->query('SELECT * FROM logements WHERE id='.$id.'');

		while ($id = $request->fetch()){
			$adresse=$id['adresse'];
			$ville=$id['ville'];
			$type=$id['type'];
			$surface=$id['surface'];
			$prix=$id['prix'];

			favorisInSession();
			addFavoriToSession( $adresse, $ville,$type, $surface, $prix);

		}
//adddMessageAlert("Produit ajouté !");
	}
header('Location: resultats.php');
exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>AirPhP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="png"/>
    <link href="../assets/styles.css" rel="stylesheet">
</head>

<body>
	<fieldset class="fieldset">
		<legend><strong>Affichage du résultat de la requête</strong></legend>
		<legend><strong>Résultats de vos recherches</strong></legend>

		<?php
		// Affichage resultats

		//afficherTousLogements();

		recherche();

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
