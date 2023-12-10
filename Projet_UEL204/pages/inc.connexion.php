<?php
	// Paramètres de connexion
	$serveur  = "localhost:3306";
	$database = "BDD_agence_immobiliere";
	$user     = "ue_l204";
	$password = "airphp";
	
	
	// CONNEXION A LA BASE DE DONNEES mysql //
	/* 
		La structure try ... catch permet de r�aliser les actions suivantes :
		PHP essaie d'ex�cuter les instructions pr�sentes � l'int�rieur du bloc "try"
		En cas d'erreur, les instructions du bloc "catch" sont ex�cut�es.
		Dans ce cas, un message d'erreur est affich�.
	*/
	try
	{	
		/* 
			PDO est une extension "orientée objet". Il faut donc vérifier que l'extension PDO est bien activée sur votre version de PHP (cf cours)
		*/

		// Connexion à la base de données
		// $bdd est un objet correspondant à la connexion à la BDD
		$bdd=new PDO('mysql:host='.$serveur.';charset=utf8;dbname='.$database.'',$user,$password);
		
		
		/* La ligne ci-dessous permet d'activer les erreurs lors de la connexion à la BDD via PDO.
		Les messages d'erreur liés à des requêtes SQL comportant des erreurs seront plus clairs. */
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
		// On lance une fonction PHP qui permet de connaître l'erreur renvoyée lors de la connection à la base (en récupérant le message lié à l'exception)
		die('<strong>Erreur détectée !!! </strong> : ' . $e->getMessage());
	}
?>

