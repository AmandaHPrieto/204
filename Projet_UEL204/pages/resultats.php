<?php 
	session_start();
	include 'inc.connexion.php';
	include '../inc.functions.php';

	if($_GET && count($_GET)){
	
		if(array_key_exists('logement', $_GET) && !empty($_GET['logement'])){
			$id=$_GET['logement'];
			$request = ('SELECT * FROM logements WHERE id='.$id.'');
	
			while ($id = $request->fetch()){
				$adresse=$id['adresse'];
				$ville=$id['ville'];
				$categorie=$id['categorie'];
				$surface=$id['surface'];
				$prix=$id['prix'];
	
				favorisInSession();
				addFavoriToSession( $adresse, $ville,$categorie, $surface, $prix);
				
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


$requete ='SELECT * FROM logements WHERE ville="'.$_POST['ville'].'" AND surface > "'.$_POST['surface'].'" AND prix < "'.$_POST['budget'].'"';

$param_categ = ''; //les checkbox porte le meme nom mais une valeur différente (appartement ou maison): leur nom est un déclaré comme un tableau. 
//ainsi les valeurs cochées seront transmises sous forme de tableau que l'on pourra parcourir pour les récupérer. (super pratique car tu peux avoir autant de valeurs que tu veux! On peut mettre des péniches et des yourtes aussi!)

	
	foreach($_POST['categorie'] as $valeur ) { //on parcourt les valeurs de notre tableau de retours checkbox.
		$param_categ .= 'categorie="'.$valeur.'" OR '; 
	}
	
	echo $param_categ; //je te laisse le echo comme ça tu vois l'apercu. 
	if($param_categ != '' ) $requete .= ' AND ('.substr($param_categ, 0, -4).')'; // on retire le OR qui va s'ajouter à la fin de la boucle
	
	echo $requete; // en faisant cela on peut récupérer la requete et la tester dans l'ongler sql de php my admin directement.
	
	$requete=$bdd->prepare($requete);
	$requete->execute();
	


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
			echo '<a href="?logement='.$logement['id'].'"><img src="../assets/images/favoris.png" width="30px" alt="favoris "></a>'; /*attention ici lien pour récupérer les données de chaque logement à l'ajout aux favoris */
			
			$adresse=$logement['adresse'];
			$ville=$logement['ville'];
			$categorie=$logement['categorie'];
			$surface=$logement['surface'];
			$prix=$logement['prix'];
			$logement=array();
			$logements=array();
			array_push($logement,  $adresse, $ville, $categorie,''.$surface.'m2, '.$prix.'€');
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