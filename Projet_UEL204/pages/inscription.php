<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title>Page d'inscription</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles.css">
	</head>
	
<body>  
		
	<header>

     	<div class="">
        
        <nav id="main-nav">
            <ul class="row nowrap">                   
                <li class="main-nav-item">
                    <a href="#" class="main-nav-link" title="Séjours">Accueil</a>
                </li>

                <li class="main-nav-item">
                    <a href="#" class="main-nav-link" title="Circuits">Biens à vendre</a>
                </li>   

                <li class="main-nav-item">
                    <a href="#" class="main-nav-link" title="Réservations">Nos services</a>
                </li>

                <li class="main-nav-item">
                    <a href="#" class="main-nav-link" title="Notre agence">Notre agence</a>
                </li>             
                <li class="main-nav-item">
                    <a href="#" class="main-nav-link" title="Créez votre voyage">Espace client</a>
                </li>                    
            </ul>
         </nav><!-- eof .main-nav -->	        
	</header><!-- eof .header -->

	<section class="section-inscription">

        <form action="post_inscription.php" method="POST" class="">
                <fieldset>
                    <legend class="inscription-form-legend">Créer un compte </legend>
                    
                    <p class="inscription-form-item">
                        <label class="inscription-form-label" for="userMail">Mail</label>
                        <input class="inscription-form-input" type="email" name="userMail" id="userMail" placeholder="Saisissez votre mail">
                    </p>
                    <p class="inscription-form-item">
                        <label class="inscription-form-label" for="userId">Identifiant</label>
                        <input class="inscription-form-input" type="text" name="userId" id="userId" >
                    </p>
                    <p class="inscription-form-item">
                        <label class="inscription-form-label" for="userPassword">Mot de passe</label>
                        <input class="inscription-form-input" type="password" name="userPassword" id="userPassword" >
                    </p>
                    <p class="inscription-form-item">
                        <input class="inscription-form-submit button" type="submit" value="M'inscrire">
                    </p>                        
                                     
                </fieldset>
                 
            </form>

            <div id="#compte-existant">
                <p>Vous avez déjà un compte chez nous ?</p>
                <a href="#" title="J'accède à la page de connexion.">Se connecter</a>
            </div>
    </section><!-- eof .section-inscription -->

    <section class="mentions-legales">
        <br><br><br>
        <p><i>L'agence AirPHP collecte et traite vos données à caractère personnel, en qualité de responsable de traitements, aux fins de gestion et de suivi de vos demandes de contact, de renseignements ou de réclamation, des fonctionnalités qui vous sont proposées via le site (cf. notamment création et accès à un compte en ligne accessible depuis la rubrique « Espace client »), et plus généralement de leurs relations avec vous au sens large, ou encore de leurs éventuels contentieux, pour la réalisation et l’élaboration d’études et de statistiques, ainsi que pour la réalisation d’opérations commerciales, de développement, de communication, de sollicitation, de prospection, de fidélisation ou de marketing sur tous supports et par tous moyens.</i></p>
        <p><i>Vous pouvez sans motif retirer à tout moment votre consentement au traitement de vos données, vous opposer au traitement de vos données et exercer votre droit à la portabilité de vos données.</i></p>
    </section>

</body>
</html>
