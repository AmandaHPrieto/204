<?php	
    //démarrage session
    session_start();

    // On charge le fichier permettant de se connecter à la bdd et la page fonctions
    include 'inc.connexion.php';
    include '../inc.functions.php';

    

    //~ Lors de la soumission du formulaire
    if($_POST 
        && count($_POST) 
            && array_key_exists('login', $_POST) && array_key_exists('mdp', $_POST)
                && !empty($_POST['login']) && !empty($_POST['mdp'])){

                    // On défini les variables identifiant et mdp
                    $identifiant=$_POST['login'];
                    $mdp=$_POST['mdp'];

                    //Requête BDD
                    $requete=$bdd->prepare("SELECT id, identifiant, motdepasse FROM clients WHERE identifiant=:identifiant");

                    // Verif login et mdp. Source : https://www.plus2net.com/php_tutorial/php_login_script2.php
                    $requete->bindParam(":identifiant",$identifiant,PDO::PARAM_STR);
                    $requete->execute();
                    $row = $requete->fetch(PDO::FETCH_OBJ);
                    $hash = $row->motdepasse;
                    
                    // On compare le mdp entré au mdp hashé
                    if(password_verify($mdp, $hash)){
                        //~ Des données issues d'un formulaire de connexion sont transmises
                        setConnecte($_POST['login'], $hash);
                    } else {
                        adddMessageAlert("Identifiant ou mot de passe incorrect");
                    }


    // Fin de parcours de la BDD
    $requete->closeCursor();
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&family=Sniglet&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="bandeau ">
            <?php include('../menu.php'); ?>
        </header>

        <h1>AirPHP: On trouve la maison de vos rêves et ce ne sont pas des paroles en l'air!</h1>
        <h2 class="row around">Page de connexion</h2>
        <a href="../index.php" class="row around">Retour à l'accueil</a>
        
        <div id="#compte-existant">
            <p>Vous n'avez pas un compte chez nous ?</p>
            <a href="inscription.php" title="J'accède à la page d'inscription.">S'inscrire</a>
        </div>
        

        <?php lireEtSupprimeMessageSession();?>
            
            <?php if(!isConnecte()) : ?>
                <form method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Login" name="login" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mot de passe" name="mdp" required>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Se Connecter</button>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <p>Bonjour <?php echo $_SESSION['login']; ?> !</p>
                <a href="./deconnect.php" title="Deconnexion">Se déconnecter</a>                                          
            <?php endif; ?> 



    </body>
</html>
