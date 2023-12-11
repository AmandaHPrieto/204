<?php
	
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

// Fonction pour afficher les résultats d'une recherche
function recherche(){
	// On rend la variable bdd globale
	global $bdd;
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ville'], $_POST['surface'], $_POST['budget'])) {
		$requete = $bdd->prepare('SELECT * FROM logements WHERE ville = ? AND surface > ? AND prix < ? ORDER BY prix ASC');
		$requete->execute(array($_POST['ville'], $_POST['surface'], $_POST['budget']));
		
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
		
		$requete->closeCursor();
	}
}


//fonction ajout fav
function ajoutFav(){
	// On rend la variable bdd globale
	global $bdd;
	if($_GET && count($_GET)){
	
		if(array_key_exists('logement', $_GET) && !empty($_GET['logement'])){
			$id=$_GET['logement'];
			$request = $bdd->query('SELECT * FROM logements WHERE id='.$id.'');
	
			while ($id = $request->fetch()){
				$adresse=$id['adresse'];
				$ville=$id['ville'];
				$type=$id['type'];
				$surface=$id['surface'].'m2';
				$prix=$id['prix'].'€';
	
				favorisInSession();
				addFavoriToSession( $adresse, $ville,$type, $surface, $prix);
	
				//adddMessageAlert("Produit ajouté !");
				header('Location: resultats.php');
				exit;
			}
		}
	}
}

?>