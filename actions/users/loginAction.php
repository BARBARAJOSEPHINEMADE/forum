<?php
 session_start ();
require ('actions/database.php');


//Validation du formulaire
if(isset($_POST['validate'])){

    // Verifier si le user a complete tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])) {

        //les donnees de l'user
        $user_speudo = htmlspecialchars ($_POST['pseudo']);
        $user_password = htmlspecialchars ($_POST['password']);
       
         //verifier si l'utilisateur existe et le pseudo existe
        $checkIfUserExists = $bdd -> prepare ('SELECT * FROM users WHERE pseudo = ?' );
        $checkIfUserExists -> execute (array($user_speudo));

        if ($checkIfUserExists -> rowCount()> 0) {
             
            // recuperer les donnees de l'utilisateur
            $usersInfo = $checkIfUserExists -> fetch();

            //verifier si le mot de passe est correct
            if (password_verify($user_password, $usersInfo ['passname'] )) {

         //authentifier l'utilisateur sur le site et recuperere ses donnees dans des variables globales sessions
           $_SESSION ['auth'] = true;
           $_SESSION['id'] = $usersInfo ['id'];
           $_SESSION['firstname'] = $usersInfo ['first_name'];
           $_SESSION['lastname'] = $usersInfo ['last_name'];
           $_SESSION['pseudo'] = $usersInfo ['pseudo'];
           
           //rediriger l'utilisateur vers la page d'accueil
          header('Location: index.php');


            } else {
                $errorMsg = "Votre mot de passe est incorrect";
            }

        } else {
            $errorMsg = "Votre pseudo est incorrect";
        }
         


    } else {
        $errorMsg = "Veillez completer tous les champs...";
     }
}