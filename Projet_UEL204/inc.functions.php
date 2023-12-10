<?php
	include('pages/inc.connexion.php');
	
	/*fonction qui vérifie si l'utilisateur a déjà stocké des favoris*/ 
	function favorisInSession(){
		if($_SESSION 
			&& count($_SESSION) 
				&& array_key_exists('favoris', $_SESSION)
					&& gettype($_SESSION['favoris']) === 'array'
						&& count($_SESSION['favoris'])){
			return true;
		}
		else{
			return false;
		}
	}


	/* fonction permettant de créer une boite à favoris si elle n'existe pas déjà et d'ajouter un logement dedasn*/ 


	function addFavoriToSession( $adresse, $ville, $type, $surface, $prix){
		if(!favorisInSession()){
			$_SESSION['favoris'] = array();
		}
		$_favori = array(
			'adresse' =>	htmlspecialchars($adresse),
			'ville' =>	htmlspecialchars($ville),
			'type' =>	htmlspecialchars($type),
			'surface'=> htmlspecialchars($surface),
			'prix'  =>	htmlspecialchars($prix)
		);
	
		array_push($_SESSION['favoris'], $_favori);
	
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

	/*function getArticleInfoFromJson($id_article){
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
*/



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



	// Fonction pour afficher les résultats d'une recherche
	function recherche(){
	// On rend la variable bdd globale
	global $bdd;
	
	// Pour la récupération d'une partie de la BDD, on utilise la méthode des requêtes préparées permettant de se prémunir contre les injections SQL
	// On utilise la méthode "prepare" de l'extension PDO afin de préparer une requête à être lancée (http://php.net/manual/fr/pdo.prepare.php)
	// Puis la méthode "execute" de l'extension PDO pour lancer la requête après avoir inséré les paramètres (http://php.net/manual/fr/pdo.exec.php)

	$requete = $bdd -> prepare('SELECT * FROM logements WHERE ville = ? AND surface > ? AND prix < ? ORDER BY prix ASC'); // Les résultats seront triés par prix du - cher au + cher
	$requete->execute(array($_POST['ville'], $_POST[('surface')], $_POST['budget']));
	
	while ($data = $requete->fetch())
	{	
		echo 'Identifiant : '.$data['id'].' - Adresse : '.$data['adresse'].' - Type : '.$data['type'].' - Surface : '.$data['surface'].'m2 - Prix : '.$data['prix'].'€<br>';
	}
	$requete->closeCursor();
}



?>