<?php
session_start();
include '../inc.functions.php';

/***************TRAITEMENT FORMULAIRE INSCRIPTION***************/

  //Verification transmission du formulaire
if(isset($_POST) && count($_POST)){

    //~ Tableau où l'on va stocker les différents messages à afficher !
  $_retours = array();

    // 1- On teste le mail
    // La variable est théoriquement contenue dans la variable superglobale $_POST
    // On va donc vérifier que le tableau $_POST est alimenté et contient notre occurence "userMail"
    //~
  if(array_key_exists('userMail', $_POST)){
      //~ Pour raccourcir la notation, on crée une autre variable
    $email = $_POST['userMail'];

      //~ On teste si la variable est vide
    if(!empty($email)){

        //~ On teste si le mail est bien une chaîne de caractère
      if(is_string($email)){

          //~ On test si le format du mail convient
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            //~ On sécurise le paramètre transmis et on le stocke dans une nouvelle variable
          $emailValide = strip_tags($email);
          //~On prépare le message final si le paramètre est incorrect
        }else{
          array_push($_retours, 'Votre mail n\'est pas considéré comme valide !');
        }
      }else{
        array_push($_retours, 'Votre mail n\'est pas une chaine de caractère !');
      }
    }else{
      array_push($_retours, 'Votre mail n\'a pas été renseigné !');
    }
  }else{
    array_push($_retours, 'La variable à transmettre n\'existe pas.');
  }

    //~
    // 2- On teste l'identifiant
    //~
  if(array_key_exists('userId', $_POST) && !empty($_POST['userId'])){
    $userId = $_POST['userId'];

      //~ On teste si le nom est bien une chaîne de caractère
    if(is_string($userId)){

        //~ Vérification de la taille de la chaine de caractère
      if(strlen($userId) >= 6 && strlen($userId) <= 20){

          //~ On sécurise le paramètre transmis et on le stocke dans une nouvelle variable
        $userIdValide = strip_tags($userId);
        //~On prépare le message final si le paramètre est incorrect
      }else{
        array_push($_retours, 'La taille de l\'identifiant doit être entre 6 et 20 caractères.');
      }
    }else{
      array_push($_retours, 'L\'identifiant n\'est pas une chaine de caractère !');
    }
  }else{
    array_push($_retours, 'L\'identifiant à transmettre n\'existe pas.');
  }

    //~
    // 3- On teste le mot de passe
    //~
  if(array_key_exists('userPassword', $_POST) && !empty($_POST['userPassword'])){
    $userPassword = $_POST['userPassword'];

      //verifie la taille du mot de passe
    if(strlen($userPassword) >= 8 && strlen($userPassword) <= 25){

        //verifie si le mot de passe contient au moins un chiffre
      if(preg_match('/[0-9]/', $userPassword)){

          //verifie si le mot de passe contient au moins une lettre en majuscule
        if(preg_match('/[A-Z]/', $userPassword)){

            //verifie si le mot de passe contient au moins une lettre en minuscule
          if(preg_match('/[a-z]/', $userPassword)){

              //verifie si le mot de passe contient au moins un caractère spécial et stockage du mot de passe hashé et sécurisé dans une nouvelle variable
            if(preg_match('/[!?+*,@#;]/', $userPassword)){
              $userPassword=strip_tags($userPassword);
              $userPasswordValide=password_hash($userPassword, PASSWORD_DEFAULT);

            }else{
              array_push($_retours, 'Le mot de passe ne contient pas un de ces caractères spéciaux:!?+*,@#;');
            }

          }else{
            array_push($_retours, 'Le mot de passe ne contient pas de lettre en minuscule.');
          }

        }else{
          array_push($_retours, 'Le mot de passe ne contient pas de lettre en majuscule.');
        }
      }else{
        array_push($_retours, 'Le mot de passe ne contient pas de chiffre.');
      }
    }else{
      array_push($_retours, 'La taille du mot de passe doit être entre 8 et 25 caractères.');
    }


  }else{
    array_push($_retours, 'Le mot de passe à transmettre n\'existe pas.');
  }

    //~ On fusionne et affiche les messages de notre tableau en une seule chaine de caractères.
  echo implode("<br>", $_retours);

}else{
  echo "<p>Aucun paramètre n'a été transmis.</p>";
}


/***************MANIPULATION DE LA BDD***************/
//connexion à la BDD
include_once("inc.connexion.php");


//on pose une condition pour que tous les paramètres soient corrects avant traitement avec la BDD
if(isset($emailValide) && isset($userIdValide) && isset($userPasswordValide)){

  //~On vérifie si l'utilisateur est déjà inscrit
    //Source du code =>UserContributedNotes de seanferd: https://www.php.net/manual/fr/pdostatement.fetchcolumn
    $requeteVerification=$bdd->prepare('SELECT COUNT(*)FROM clients WHERE mail = :mail'); //on compte le nombre de ligne qui correspond au mail fourni
    $requeteVerification->execute(array('mail' => $emailValide));
    $resultatVerification=$requeteVerification->fetchColumn();

    $requeteVerification->closeCursor();

    if($resultatVerification>0){ //si sup à 0 = existence d'une correspondance donc utilisateur déjà inscrit => arrêter script d'insertion avec exit
    echo'Un utilisateur avec cette adresse e-mail est déjà enregistré. Veuillez choisir une adresse e-mail différente ou connectez-vous.';
    exit;
    }

  //~On insert les données dans la BDD
    $requeteInsertion= $bdd->prepare('INSERT INTO clients(identifiant, motdepasse, mail) VALUES(:identifiant, :motdepasse, :mail)');

    $requeteInsertion->execute(array(
    'identifiant' =>$userIdValide ,
    'motdepasse'=>$userPasswordValide,
    'mail'=>$emailValide,
    ));
    echo '<br>Bonjour '. $userIdValide .', bienvenue chez AirPHP ! L\'inscription a été un succès. <br>Explorez notre sélection de biens immobiliers et ajoutez-les à vos favoris pour pouvoir les consultez plus tard.';
    $requeteInsertion->closeCursor();

}

/***************OUVERTURE DE SESSION***************/
 setConnecte($userId, $userPassword);




?>
