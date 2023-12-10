<?php
	include('pages/inc.connexion.php');
	
	/*
		Fonction hasArticleInSession
		Fonction permettant de déterminer si
		des articles sont présents en SESSION
	*/
	function hasArticleInSession(){
		if($_SESSION 
			&& count($_SESSION) 
				&& array_key_exists('articles', $_SESSION)
					&& gettype($_SESSION['articles']) === 'array'
						&& count($_SESSION['articles'])){
			return true;
		}else{
			return false;
		}
	}

	/*
		Fonction addArticleToSession
		Permet d'ajouter un article 
		en session
	*/
	function addArticleToSession($title, $image, $price, $ref){
		if(!hasArticleInSession()){
			$_SESSION['articles'] = array();
		}

		$_article = array(
			'title' =>	htmlspecialchars($title),
			'image' =>	htmlspecialchars($image),
			'price' =>	htmlspecialchars($price),
			'ref'   =>	htmlspecialchars($ref),
		);

		array_push($_SESSION['articles'], $_article);

	}

	/*
		Fonction deleteAllArticles
		Permet de supprimer les articles stockés en session
	*/
	function deleteAllArticles(){
		$_SESSION['articles'] = array();
	}

	/*
		Fonction isConnecte
		Permet de vérifier qu'un utilisateur est connecté
		à partir de la SESSION
	 */
	function isConnecte(){
		if($_SESSION 
			&& count($_SESSION) 
				&& array_key_exists('login', $_SESSION)
					&& !empty($_SESSION['login'])){
			return true;
		}else{
			return false;
		}
	}

	/*
		Fonction setConnecte
		Connecte un utilisateur selon les paramètres transmis
		et les stock dans la SESSION
	 */
	function setConnecte($login, $mdp){
		$_SESSION['login']	=	$login;
		$_SESSION['mdp']	=	$mdp;
	}

	/*
		Fonction setDeconnecte
		Déconnecte un utilisateur en supprimant 
		les données en SESSION
	 */	
	function setDeconnecte(){
		session_destroy();
		unset($_SESSION);
		header('Location: ../index.php');
		exit;
	}

	/*
		Fonction addMessageAlert
		Ajoute un message en session qui sera affiché 
	*/
	function adddMessageAlert($msg = ""){
		if(!array_key_exists('msg', $_SESSION)){
			$_SESSION['msg'] = "";
		}

		$_SESSION['msg'] .= $msg." ";
	}

	/*
		Fonction lireEtSupprimeMessageSession
		Affiche un message en session et le supprime 
		après affichage
	*/
	function lireEtSupprimeMessageSession(){
		if(array_key_exists('msg', $_SESSION)){
			echo '<div class="alert alert-info text-justify"><p>'.$_SESSION['msg'].'</p></div>';
			unset($_SESSION['msg']);
		}
	}

	function getArticleInfoFromJson($id_article){
		$contenu_fichier = file_get_contents('articles.json');
		$_articles       = json_decode($contenu_fichier, true);

		if($_articles && !is_null($_articles) && count($_articles) > 0){
			foreach($_articles as $article){
				if($article['ref'] == $id_article){
					return $article;
				}
			}
		}
		return false;
	}




	// Amanda
	// Fonction pour afficher tous les logements de la bdd

	function afficherTousLogements(){
		// On rend la variable bdd globale
		global $bdd;
	
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
				echo 'Identifiant : '.$data['id'].' - Adresse : '.$data['adresse'].' - Type : '.$data['type'].' - Surface : '.$data['surface'].'m² - Prix : '.$data['prix'].'€<br>';
			}
		}
		/* La requête fetch renvoie un booléen faux ('false') lorsqu'on est arrivé à la fin des données.
		   La boucle while s'arrête donc. 
		   La ligne ci-dessous indique qu'il faut "fermer le curseur qui parcourt les données".
		   Il est impératif de le faire afin d'éviter tout problème lors de la requête suivante. */
		$requete->closeCursor();
	}

	// Fonction pour afficher les résultats d'un recherche par ville
	function recherche(){
	// On rend la variable bdd globale
	global $bdd;
	
	// Pour la récupération d'une partie de la BDD, on utilise la méthode des requêtes préparées permettant de se prémunir contre les injections SQL
	// On utilise la méthode "prepare" de l'extension PDO afin de préparer une requête à être lancée (http://php.net/manual/fr/pdo.prepare.php)
	// Puis la méthode "execute" de l'extension PDO pour lancer la requête après avoir inséré les paramètres (http://php.net/manual/fr/pdo.exec.php)
	
	// Etape 1 : on prépare la requête (plusieurs exemples ci-dessous, testez chacune d'elles !)
	$requete = $bdd -> prepare('SELECT id, adresse, surface, ville, prix,  FROM logements WHERE ville = ?');
	// $requete = $bdd->prepare('SELECT identifiant, auteur, titre, annee, exemplaires FROM bibliotheque WHERE auteur = ? ORDER BY annee'); // Il est ici implicite que c'est un classement par ordre croissant.
	// $requete = $bdd -> prepare('SELECT identifiant, auteur, titre, annee, exemplaires FROM bibliotheque WHERE auteur = ? ORDER BY annee DESC'); // Pour un classement par ordre décroissant
	// $requete = $bdd -> prepare('SELECT identifiant, auteur, titre, annee, exemplaires FROM bibliotheque WHERE auteur = ? ORDER BY annee ASC LIMIT 0,2');
	// $requete = $bdd -> prepare('SELECT identifiant, auteur, titre, annee, exemplaires FROM bibliotheque WHERE auteur = ? AND annee > 1850');
	
	// Exécution de la requête via la méthode 'execute'
	//$requete->execute(array($_POST['ville'])); // Le paramètre indiqué va aller remplacer le '?' de la ligne précédente
	$requete->execute('Limoges'); // Le paramètre indiqué va aller remplacer le '?' de la ligne précédente
	
	/* 
	A noter que si on a besoin d'utiliser 2 paramètres, on fait par exemple comme ceci :
	$requete = $bdd -> prepare('SELECT identifiant, auteur, titre, annee, exemplaires FROM bibliotheque WHERE auteur = ? AND annee > ?');
	$requete->execute(array($_POST['nom_auteur'],$_POST['annee_minimum']));
	*/
	
	/* Une autre syntaxe évitant les '?' est possible (plus lisible lorsqu'il y a beaucoup de paramètres) :
	$requete = $bdd -> prepare('SELECT id, adresse, ville, surface, prix FROM logements WHERE ville = :ville AND prix > :prix');
	$requete->execute(array('ville' => $_POST['ville'], 'prix' => $_POST['prix_minimum'])); */
	
	while ($data = $requete->fetch())
	{	
		echo 'Identifiant : '.$data['id'].' - Adress : '.$data['adresse'].' - Type : '.$data['type'].' - Surface : '.$data['surface'].' - Prix : '.$data['prix'].'<br>';
	}
	$requete->closeCursor();
}

recherche()


?>