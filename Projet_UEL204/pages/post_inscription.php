<?php
session_start();
include_once("inc.connexion.php");

/***************TRAITEMENT DU FORMULAIRE D'INSCRIPTION***************/

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

            //~ On prépare le message final en supprimant les balises HTML et stockage info sécurisée dans variable
          array_push($_retours, 'Votre mail : '.strip_tags($email));
          $email = strip_tags($email);
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
    // La variable est théoriquement contenue dans la variable superglobale $_POST
    // On va donc vérifier que le tableau $_POST est alimenté et contient notre occurence "user-mail"
    //~
  if(array_key_exists('userId', $_POST) && !empty($_POST['userId'])){
      //~ Pour raccourcir la notation, on crée une autre variable
    $userId = $_POST['userId'];

      //~ On teste si le nom est bien une chaîne de caractère
    if(is_string($userId)){

        //~ Vérification de la taille de la chaine de caractère
      if(strlen($userId) >= 6 && strlen($userId) <= 20){

          //~ On prépare le message final en supprimant les balises HTML et stockage info sécurisée dans variable
        array_push($_retours, 'Identifiant : '.strip_tags($userId));
        $userId = strip_tags($userId);
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
      //~ Pour raccourcir la notation, on crée une autre variable
    $userPassword = $_POST['userPassword'];

      //verifie la taille du mot de passe
    if(strlen($userPassword) >= 8 && strlen($userPassword) <= 25){

        //verifie si le mot de passe contient au moins un chiffre
      if(preg_match('/[0-9]/', $userPassword)){

          //verifie si le mot de passe contient au moins une lettre en majuscule
        if(preg_match('/[A-Z]/', $userPassword)){

            //verifie si le mot de passe contient au moins une lettre en minuscule
          if(preg_match('/[a-z]/', $userPassword)){

              //verifie si le mot de passe contient au moins un caractère spécial et stockage info sécurisée dans variable
            if(preg_match('/[!?+*,@#;]/', $userPassword)){
              array_push($_retours, 'Mot de passe :'.strip_tags($userPassword));
              $userPassword=strip_tags($userPassword);

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
  echo '<br>Bonjour '. $userId .', bienvenue chez AirPHP ! L\'inscription a été un succès. Explorez notre sélection de biens immobiliers et ajoutez-les à vos favoris pour pouvoir les consultez plus tard.';

}else{
  echo "<p>Aucun paramètre n'a été transmis.</p>";
}


/***************INSERTION DANS LA BDD***************/
$requeteSQL='INSERT INTO clients(identifiant, motdepasse, mail) VALUES(:identifiant, :motdepasse, :mail)';

$insertClient = $bdd->prepare($requeteSQL);

$insertClient->execute([
'identifiant' =>'toto',
'motdepasse'=>'Toto25?to',
'mail'=>'toto@gmail.com',
]);







?>
