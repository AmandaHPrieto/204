<!DOCTYPE html>
<html lang="en">
<head>
	<title>AirPhP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="png"/>
    <link href="../assets/styles.css" rel="stylesheet">
</head>

<body>
	<fieldset class="fieldset">
		<legend id="legend"><strong>Affichage du résultat de la requête</strong></legend>
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
	while ($data = $requete->fetch())
	{
		if (!$data) // On teste si la réponse à la requête est vide.
		{
			echo 'La BDD n\'existe pas ou est vide.';
			break;
		}
		else
		{
			// echo 'Adresse : '.$data['titre'].'<br>';
			echo 'Identifiant :'.$data['id'].' - Adresse : '.$data['adresse'].' - Surface : '.$data['surface'].'<br>';

			/*si le champs photo1 est renseigné, on affiche la photo associée avec <img>
        if (!empty($data['photo1'])) {
            // Affiche l'image avec la balise <img>
            echo 'Photo : <img class="photo1" src="' . $data['photo1'] . '" alt="Photo du logement"><br>';
        }
        */
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
			<input type="submit" value="Retour à la page d'accueil">
		</form>
	</fieldset>
</body>
</html>
