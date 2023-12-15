<?php 
    //~ On initialise ou relaye la session
    session_start();
    //~ On va chercher notre fichier PHP contenant des définitions de fonctions utilisées plusieurs fois
   include '../inc.functions.php';
    /*création log erreur*/

	ini_set('display_errors', 'Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', dirname(__file__) . '/log_error_mes_favoris.txt');

    //~ Utilisateur non connecté : on redirige
   if(!isConnecte()){
        //~ Message de demande de connexion (à voir)
       header('Location: connect.php');
    }


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
	    <title>Mes favoris</title>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="../assets/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&family=Sniglet&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="bandeau ">
            <?php include('../menu.php'); ?>
        </header>

        <div class="row ">
           
                <img src="../assets/images/favoris.png" width="80rem"  alt="icone-favoris" >
            
                <h1 class="row">Vos annonces sauvegardées</h1>
                
        </div>
        <div class="resultats">
                <?php  
                
                if(!favorisInSession()){
                    echo "<div class='row column'><p>Vous n'avez ajouté aucun logement dans vos favoris pour l'instant.</p><br><img class='row' width='50' height='50' src='https://img.icons8.com/ios/50/sad.png' alt='sad'/></div>";
                 }
                 else {
                       foreach($_SESSION['favoris'] as $_favori){ 
                            echo '<div class="conteneur-maison">';
                            echo '<div class="card-fav"><img src="../assets/images/favoris.png" width="30px" alt="favoris "></br></div>';
                            echo '<div class="conteneur-infos-maison">';
                            foreach($_favori as $element) {
                                echo ''.$element.'</br>';
                            }
                            
                            echo '</div></div>';
                        }
                     };
                 ?>
                  
            
        
        </div>

        <fieldset class="fieldset">
		<form method="post" action="../index.php">
			<input type="submit" class="button" value="Retour à la page d'accueil" >
		</form>

	</fieldset>

    <?php include('../footer.php'); ?>
    </body>
</html>
