<?php
    // création objet PDO
    try{
        $bdd= new PDO ('mysql:host=http://localhost/L204_GIT_projet/204/Projet_UEL204/assets/;dbname=BDD_agence_immobiliere;charset=utf8','root','root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "bdd connectée";
    }catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
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
    </head>

    <body>
        <h1>AirPHP: On trouve la maison de vos rêves et ce ne sont pas des paroles en l'air!</h1>
        <h2 class="row around">Page de connexion</h2>
        <a href="../index.php" class="row around">Retour à l'accueil</a>
        <div class="form">
            <fieldset>
				<legend>Connectez-vous !</legend>
                <div class="form-box">
                    <div class="form-top row around"> 
                        <div class="form-login row">
                            <label for="login">Identifiant</label>
                            <input type="text" name="login" id="login"></br>
                        </div>
                        <div class="form-login row">
                            <label for="pass">Mot de passe</label>
                            <input type="text" name="pass" id="pass"></br>
                        </div>

                        <div class=form-bottom >
                            <input type="submit" value="Me connecter" class="button">
                        </div>
                    </div>	

            </fieldset>
        </div>

        <?php
        /*
            // requête pour accéder au contenu de la BDD
            $requete = $bdd->query('SELECT * FROM bibliotheque');

            // fetch pour extraire les utilisateurs
            while ($data_identifiant = $requete->fetch()){
                $data_identifiant["identifiant"].'<br>';
            }
            var_dump ($data_identifiant);
            echo "pouet";
            */
        ?>
    </body>
</html>