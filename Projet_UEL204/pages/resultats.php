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
    <link href="styles.css" rel="stylesheet">
</head>

<body>
	<fieldset class="fieldset">
		<legend><strong>Résultats de vos recherches</strong></legend>
	<?php
	// On charge le fichier permettant de se connecter à la bdd
	include 'inc.connexion.php';
	
	/* On peut lire la requête ci-dessous comme cela :
	   La requête ('query') est de sélectionner (SELECT) tout (=> *) ce qui est dans la table 'logements' 
	   de la BDD définie par $dbb et de stocker toute la réponse dans la variable $requete.
	   Ce qui est contenu dans la variable $requete n'est pas exploitable. Il faut aller plus loin. */
	$requete = $bdd->query('SELECT * FROM logements');
	
	/* On va traiter la réponse ($requete) entrée par entrée avec une boucle while.
	   On va aller chercher (=> fetch) chaque entrée de la table successivement et on va stocker les valeurs
	   dans un tableau associatif $data qui contient les valeurs de chaque champ pour toutes les entrées.
	   On accède alors aux identifiants de cette façon => $data['identifiant']. */
	while ($logement = $requete->fetch()){
		if (!$logement) // On teste si la réponse à la requête est vide.
		{
			echo 'La BDD n\'existe pas ou est vide.';
			break;
		}
		else
		{
			/*ajouter ici la condition if (isConnecte())*/
			echo '	<a href="?logement='.$logement['id'].'"><img src="../assets/images/favoris.png" width="30px" alt="favoris "></a>'; /*attention ici lien pour récupérer les données de chaque logement à l'ajout aux favoris */
			// echo 'Adresse : '.$data['titre'].'<br>';
			
			$adresse=$logement['adresse'];
			$ville=$logement['ville'];
			$type=$logement['type'];
			$surface=$logement['surface'];
			$prix=$logement['prix'];
			$logement=array();
			$logements=array();
			array_push($logement,  $adresse, $ville, $type,''.$surface.'m2, '.$prix.'€');
			array_push($logements, $logement);	
		}

		foreach($logements as $logement) {
			echo '</br>';
			foreach($logement as $element) {
				echo ''.$element.' </br>';
			}
		}

	}
	
	/* La requête fetch renvoie un booléen faux ('false') lorsqu'on est arrivé à la fin des données.
	   La boucle while s'arrête donc. 
	   La ligne ci-dessous indique qu'il faut "fermer le curseur qui parcourt les données".
	   Il est impératif de le faire afin d'éviter tout problème lors de la requête suivante. */
	$requete->closeCursor();
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