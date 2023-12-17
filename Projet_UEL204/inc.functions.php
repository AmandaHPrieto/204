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


	function addFavoriToSession($photo, $adresse, $ville, $categorie, $surface, $prix  ){

		if(!favorisInSession()){
			$_SESSION['favoris']=array();
		}

		
			$_favori = array(	
				'photo' => ('<img class="img-maison" src="../assets/photos/'.$photo.'">'),
				'adresse' =>	($adresse),
				'ville' =>	('<span class="span-ville">'.$ville.'</span>'),
				'categorie' =>	('<span class="span-categorie">'.$categorie.'</span>'),
				'surface'=> ('<span class="span-surface">'.$surface.'</span>'),
				'prix'  =>	('<span class="span-prix">'.$prix.'</span>')
			);

array_push($_SESSION['favoris'], $_favori);	
	echo" Le logement a bien été ajouté à vos favoris";	
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
		}
		
		else{
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
		header('Location: ./connect.php');
		exit;
	}

	/*function addMessage () {
		header('Location: index.php');
		echo "Excellent choix : nous l'avons bien ajouté à vos favoris!";
	}*/

	/*
		Fonction addMessageAlert
		Ajoute un message en session qui sera affiché 
	*/
	function addMessageAlert($msg = ""){
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
	

// Fonction pour afficher les résultats d'une recherche
	function recherche(){
    // On rend la variable bdd globale
		global $bdd;

    // création d'un tableau pour stocker les conditions à insérer dans la requête
		$conditions = array();

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!empty($_POST['ville'])) {
				$conditions[] = 'ville="' . $_POST['ville'] . '"';
			}

			if (!empty($_POST['budget'])) {
				$conditions[] = 'prix < "' . $_POST['budget'] . '"';
			}

			if (!empty($_POST['surface']) && is_numeric($_POST['surface'])) {
				$conditions[] = 'surface > "' . $_POST['surface'] . '"';
			}

			if (!empty($_POST['categorie'])) {
				$conditions[] = 'categorie="' . $_POST['categorie'] . '"';
			}

			//si le tableau conditions n'est pas vide, on formule la requête SQL
			if (!empty($conditions)) {
				$requete = 'SELECT * FROM logements WHERE ' . implode(' AND ', $conditions);
				$requete = $bdd->prepare($requete);
				$requete->execute();

				$logements = array();

				while ($logement = $requete->fetch()) {

					echo '<div class="conteneur-maison">';
					if (isConnecte()) {
						echo '<a href="?logement=' . $logement['id'] . '"><img src="./assets/images/favoris.png" width="30px" alt="favoris "></a>';
					}
					$photo = '<img class="img-maison" src="assets/photos/' . $logement['photo'] . '">';
					$adresse = $logement['adresse'];
					$ville = '<span class="span-ville">' . $logement['ville'] . '</span>';
					$categorie = '<span class="span-categorie">' . $logement['categorie'] . '</span>';
					$surface = '<span class="span-surface">' . $logement['surface'] . ' m2</span>';
					$prix = '<span class="span-prix">' . $logement['prix'] . ' €</span>';

					$logementArray = array($photo, $adresse, $ville, $categorie, '' . $surface . $prix);
					array_push($logements, $logementArray);
				}
				$requete->closeCursor();

				echo '<div class="conteneur-infos-maison">';
				foreach ($logements as $logement) {
					foreach ($logement as $element) {
						echo '' . $element . ' </br>';

					}
				}
				echo '</div></div>';
			} else {
				echo '<p>Aucun paramètre de recherche a été transmis !</p>';
			}
		}
	}



function message($message){
	echo $message;
}
//fonction ajout fav
function addFavori(){ 
	// On rend la variable bdd globale
	global $bdd;
	
	if($_GET && count($_GET)){
		if(array_key_exists('logement', $_GET) && !empty($_GET['logement'])){
			$id=$_GET['logement'];
			$request =$bdd->query('SELECT * FROM logements WHERE id='.$id);
	
			while ($id = $request->fetch()){
				$photo=$id['photo'];
				$adresse=$id['adresse'];
				$ville=$id['ville'];
				$categorie=$id['categorie'];
				$surface=($id['surface']);
				$prix=$id['prix'];
		
			}
			
				favorisInSession();
				addFavoriToSession($photo, $adresse, $ville,$categorie, $surface, $prix);
			}
		$requete->closeCursor();
		}
	} 
;

  /* $file_write='mesfavoris.txt';
    $write=fopen($file_write, 'a');
    foreach ($_SESSION['favoris'] as $_favori)
        {
        file_put_contents($file_write, $_favori PHP_EOL, FILE_APPEND);
        }
     fclose($write);
                    
    $_file_read='mesfavoris.txt';
    $read=fopen($file_read,'r');
     $text= file_get_contents('mesfavoris.txt');
    echo $text;*/

?>
