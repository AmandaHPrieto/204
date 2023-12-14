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
                        addMessageAlert("<p>⚠️ Identifiant ou mot de passe incorrect !</p>");
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

    <body class="body-connect">
        <header class="bandeau ">
            <?php include('../menu.php'); ?>
        </header>

        <section class="section-inscription background-connexion">


            <?php if(!isConnecte()) : ?>

                <h1 class="h1-connect">On trouve la maison de vos rêves</h1>
                <h2 class="h2-connect"> Et ce ne sont pas des paroles en l'air</h2>


                <form method="POST">
                    <fieldset>
                    <legend class="inscription-form-legend"> Connectez-vous ! </legend>
                        
                    <p class="inscription-form-item">
                            
                                <input type="text" class="inscription-form-input" placeholder="Identifiant" name="login" required>
                            
                    </p>
                        
                    <p class="inscription-form-item">
                            
                                <input type="password" class="inscription-form-input" placeholder="Mot de passe" name="mdp" required>
                            
                    </p>
                        
                    <p class="inscription-form-item">
                            <button type="submit" class="button">Connexion</button>
                    </p>

                    <?php lireEtSupprimeMessageSession();?>
                    
                </fieldset>

                <div class="compte-existant">
                <p>Vous n'avez pas de compte chez nous ?</p>
                <a href="inscription.php" title="J'accède à la page d'inscription.">S'inscrire</a>
                </div>

                </form>
                

            <?php else: ?>
                

                <div class="white-background">
                <p class="inscription-form-legend">👋 Bonjour <?php echo $_SESSION['login']; ?> !</p>
                </div>
                <a class="bouton-deconnexion" href="./deconnect.php" title="Deconnexion">Se déconnecter</a>

            
            <?php endif; ?>

            </section>

        <?php include('../footer.php'); ?>

    </body>
</html>
