<?php 
    //~ On initialise ou relaye la session
    session_start();
   include '../inc.functions.php';
    /*création log erreur*/

	ini_set('display_errors', 'Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', dirname(__file__) . '/log_error_mes_favoris.txt');
    
    //~ On va chercher notre fichier PHP contenant des définitions de fonctions utilisées plusieurs fois


    //~ Utilisateur non connecté : on redirige
   //if(!isConnecte()){
        //~ Message de demande de connexion
      //  adddMessageAlert("Vous devez d'abord vous connecter.");
       // header('Location: connect.php'); 
   // } s'agit il d'une redirection vers la page de connexion??*/ 



   if(!favorisInSession()){
       echo "Vous n'avez ajouté aucun logement dans vos favoris pour l'instant";
    }
    else {
        echo "cool ça marche";
    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
	    <title>Mes favoris</title>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    </head>

    <body>
        <div class="favoris-box row ">  
           
                <img src="../assets/images/favoris.png" width="100px" alt="icone-favoris" class="row" >
            
                <h1 class="favoris row">Vos annonces sauvegardées</h1>
                
        </div>
     <div>
                <?php  if(favorisInSession()){
                       foreach($_SESSION['favoris'] as $_favori){ 
                       echo '<div class="card-fav"><img src="../assets/images/favoris.png" width="30px" alt="favoris "></br></div>';
                       foreach($_favori as $element) {
                        echo ''.$element.'</br>';
                       }
                         }
                     };
                 ?>
                  
            
        
        </div>
    </body>
</html>
