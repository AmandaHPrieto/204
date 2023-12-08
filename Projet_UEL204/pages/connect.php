<?php	
    //démarrage session
    session_start();

    //création d'un log erreurs
	ini_set('display_errors', 'Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', dirname(__file__) . '/log_error_get_php.txt');
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
            /* Accès à la BDD
            ******************************************************************************/
                // On charge le fichier permettant de se connecter à la bdd
                include 'inc.connexion.php';
            
                // requête pour accéder au contenu de la table CLIENTS
                $requete = $bdd->query('SELECT * FROM clients');
                $clients =  array();

                // fetch pour récupérer les infos des clients
                while ($data_utilisateurs = $requete->fetch()){
                    if (!$data_utilisateurs){ // On teste si la réponse à la requête est vide.
                        echo 'La BDD n\'existe pas ou est vide.';
                        break;
                    }
                    else {
                    $client=array(
                        'ID' => $data_utilisateurs['id'],
                        'Identifiant' => $data_utilisateurs['identifiant'],
                        'Motdepasse' => $data_utilisateurs['motdepasse'],
                    );

                    //print_r ($client);

                    array_push($clients, $client);

                    //echo 'Id : '.$data_utilisateurs['id'].' - Identifiant : '.$data_utilisateurs['identifiant'].' - Mot de passe : '.$data_utilisateurs['motdepasse'].'<br>';

                    }
                }

                // fin de parcours de la BDD
                $requete->closeCursor();

                print_r ($clients);
                echo "<br><br>";
                echo $clients[0]['Motdepasse'];
                echo "<br><br>";
                echo count($clients);


             /* Login
            ******************************************************************************/

                $_SESSION["Utilisateur"]=array();


                function fonctionVerifLoginMdp(){
                    //vérif de transmission du formulaire
                    if(isset($_GET) && count($_GET)>1){
                        $login = $_GET["login"];
                        echo $login;
                        $pass = $_GET["pass"];
                        echo $pass;

                        //vérifications login :
                        for ($i=0; $i<count($clients); $i++){
                            if ($login == $clients[$i]['Identifiant']){
                                // vérif mdp :
                                if ($pass == $clients[$i]['Mot de passe']){
                                    $utilisateur=array($login, $pass);
                                    array_push ($_SESSION["Utilisateur"], $utilisateur);
                                    echo "Vous êtes connecté";
                                }else{
                                    echo "Mot de passe incorrect.";
                                }
                            }
                        }

                    }
                }

        ?>
    </body>
</html>