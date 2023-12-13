<?php
session_start();
include '../inc.functions.php';
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title>Page d'inscription</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&family=Sniglet&display=swap" rel="stylesheet">
	</head>
	
<body>  
    <header class="bandeau ">
        <?php include('../menu.php'); ?>
    </header>
		
    <?php if(!isConnecte()) : ?>
	<section class="section-inscription">

        <form action="post_inscription.php" method="POST">
                <fieldset>
                    <legend class="inscription-form-legend">Inscrivez-vous ! </legend>
                    
                    <p class="inscription-form-item">
                        <label class="inscription-form-label" for="userMail">Mail</label>
                        <input class="inscription-form-input" type="email" name="userMail" id="userMail" placeholder="Saisissez votre mail">
                    </p>
                    <p class="inscription-form-item">
                        <label class="inscription-form-label" for="userId">Identifiant</label>
                        <input class="inscription-form-input" type="text" name="userId" id="userId" placeholder="6 caractères minimum" >
                    </p>
                    <p class="inscription-form-item">
                        <label class="inscription-form-label" for="userPassword">Mot de passe</label>
                        <input class="inscription-form-input" type="password" name="userPassword" id="userPassword" >
                    </p>
                    <p class="inscription-form-item">
                        <input class="inscription-form-submit button" type="submit" value="M'inscrire">
                    </p>                        
                                     
                </fieldset>
                 <div id="#compte-existant">
                <p>Vous avez déjà un compte chez nous ?</p>
                <a href="#" title="J'accède à la page de connexion.">Se connecter</a>
            </div>

            </form>



    </section><!-- eof .section-inscription -->

    <section class="mentions-legales">
        <div class="row">
        <p >L'agence AirPHP collecte et traite vos données à caractère personnel, en qualité de responsable de traitements, aux fins de gestion et de suivi de vos demandes de contact, de renseignements ou de réclamation, des fonctionnalités qui vous sont proposées via le site (cf. notamment création et accès à un compte en ligne accessible depuis la rubrique « Espace client »), et plus généralement de leurs relations avec vous au sens large, ou encore de leurs éventuels contentieux, pour la réalisation et l’élaboration d’études et de statistiques, ainsi que pour la réalisation d’opérations commerciales, de développement, de communication, de sollicitation, de prospection, de fidélisation ou de marketing sur tous supports et par tous moyens.
        <br>Vous pouvez sans motif retirer à tout moment votre consentement au traitement de vos données, vous opposer au traitement de vos données et exercer votre droit à la portabilité de vos données.</p>
    </div>
    </section>

    <?php else: ?>
                Bonjour <?php echo $_SESSION['login']; ?>, vous êtes déjà inscrit(e) et connecté(e).
            <?php endif; ?>
</body>
</html>
