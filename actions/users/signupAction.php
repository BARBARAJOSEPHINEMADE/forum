<?php
 session_start ();
require('actions/database.php');
//Validation du formulaire
if(isset($_POST['validate'])){

    // Verifier si le user a complete tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['password'])) {

        //les donnees de l'user
        $user_speudo = htmlspecialchars ($_POST['pseudo']);
        $user_firstname = htmlspecialchars ($_POST['firstname']);
        $user_lastname = htmlspecialchars ($_POST['lastname']);
        $user_password = password_hash ($_POST['password'], PASSWORD_DEFAULT);

          //verifier si l'utilisateur existe deja sur le site
        $checkIfUserAlreadyExists = $bdd -> prepare ('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists -> execute (array ($user_speudo));

        if ($checkIfUserAlreadyExists -> rowCount () == 0) {

            //inserer l'utilisateur dans la bdd
            $insertUserOnWebsite = $bdd -> prepare ('INSERT INTO users (pseudo,first_name, last_name, passname) VALUES (?,?,?,?)');
           $insertUserOnWebsite -> execute (array ($user_speudo, $user_firstname, $user_lastname, $user_password));

           //recuperer les informations de l'utilisateur
           $getInfosOfThisUserReq = $bdd -> prepare ('SELECT id, pseudo, first_name, last_name  FROM users WHERE first_name = ? AND last_name = ? And pseudo = ?');
           $getInfosOfThisUserReq -> execute (array ($user_firstname, $user_lastname, $user_speudo));
           
        
           $usersInfo = $getInfosOfThisUserReq -> fetch ();

           //authentifier l'utilisateur sur le site et recuperere ses donnees dans des variables globales sessions
           $_SESSION ['auth'] = true;
           $_SESSION['id'] = $usersInfo ['id'];
           $_SESSION['firstname'] = $usersInfo ['first_name'];
           $_SESSION['lastname'] = $usersInfo ['last_name'];
           $_SESSION['pseudo'] = $usersInfo ['pseudo'];
           
           //rediriger l'utilisateur vers la page d'accueil
          header('Location: index.php');

        } else {
            $errorMsg = "L'utilisateur existe deja sur le site";
        }

    } else {
        $errorMsg = "Veillez completer tous les champs...";
     }
}
?>