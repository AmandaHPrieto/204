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
        <form method="POST" action="connect.php" class="form">
            <fieldset>
                <?php 
                    if ($_SESSION["connect"]==0){

                        echo '<legend>Connectez-vous !</legend>
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
                        </div>'	;
                    }
                    if ($_SESSION["connect"]==1){
                        echo 'Vous êtes connecté';
                        echo '<div class=form-bottom >
                        <input type="submit" value="Me déconnecter" class="button">
                        </div>';

                    }
                ?>

            </fieldset>
        </form>
        </div>
        <div id="#compte-existant">
            <p>Vous n'avez pas un compte chez nous ?</p>
            <a href="inscription.php" title="J'accède à la page de connexion.">S'inscrire</a>
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

                    array_push($clients, $client);

                    }
                }

                // fin de parcours de la BDD
                $requete->closeCursor();

                //print_r ($clients);
                //echo "<br><br>";
                //echo $clients[0]['Identifiant'];
                //echo "<br>";
                //echo $clients[0]['Motdepasse'];
                //echo "<br><br>";
                $nbclients= count($clients);
                //echo "nb clients : ".$nbclients;
                //echo "<br><br>";


             /* Login
            ******************************************************************************/

                $_SESSION["Utilisateur"]=array();

                $_SESSION["connect"];

                include 'inc.functions.php';

                function fonctionVerifLoginMdp($clients, $nbclients){
                    //vérif de transmission du formulaire
                    if(isset($_POST) && count($_POST) && $_SESSION["connect"]===0){
                        $login = $_POST["login"];
                        $pass = $_POST["pass"];
                        echo "bouton cliqué<br>";
                        echo $login;
                        echo "<br>";                       
                        echo $pass;
                        echo "<br>";
                        $passhache=password_hash($pass, PASSWORD_DEFAULT);

            
                        //vérifications login :
                        for ($i=0; $i<$nbclients; $i++){
                            if ($login === $clients[$i]['Identifiant']){
                                // vérif mdp :
                                if ($pass === $clients[$i]['Motdepasse']){
                                    //echo $clients[$i]['Motdepasse'];
                                    $utilisateur=array($login, $pass);
                                    array_push ($_SESSION["Utilisateur"], $utilisateur);
                                    echo "Vous êtes connecté";
                                    $_SESSION["connect"]=1;   
                                    //echo $_SESSION["connect"];                              
                                    break;
                                }else{
                                    echo "Mot de passe incorrect.";
                                    $_SESSION["connect"]=0;
                                }
                            }
                        }
                    }
                    if(isset($_POST) && count($_POST) && $_SESSION["connect"]===1){
                        //setDeconnecte();
                        session_destroy();
                        unset($_SESSION);
                        //header('Location: ../index.php');
                        exit;
                    }
                }
             
                fonctionVerifLoginMdp($clients, $nbclients) ;

                echo "<br>";
                echo($_SESSION["Utilisateur"][0][0]); 
                echo "<br>";
                echo($_SESSION["Utilisateur"][0][1]);
                echo "<br>";
                echo $_SESSION["connect"];

                // redirection vers la page index si connecté
                /*if ($_SESSION["connect"] === 1){
                    header('Location: ../index.php');
                    exit();
                }*/

                

                
                

        ?>
    </body>
</html>
