<?php

    //~ On initialise ou transmet la session
    session_start(); 

    //~ On inclut la page PHP contenant nos fonctions
    include '../inc.functions.php';

    //~ Message de déconnexion
    addMessageAlert("Vous êtes correctement déconnecté.");

    setDeconnecte();
    
?>