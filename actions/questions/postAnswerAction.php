<?php
require ('actions/database.php');
//verifier le formulaire
if (isset($_POST['validate'])) {

    //verifier si les champs sont remplis
    if(!empty($_POST['answer'])) {

        //les donnees a faire passer a la requete
       
        $user_answer= nl2br( htmlspecialchars($_POST['answer']));
      

        //insertion des reponses d'un auteur dans la bdd
        $insertAnswer = $bdd -> prepare ('INSERT INTO answers (id_auteur, pseudo_auteur, id_question, content)  VALUES (?,?,?,?) '); 
        $insertAnswer -> execute (array($_SESSION['id'], $_SESSION['pseudo'], $idOfTheQuestion, $user_answer ));


    } else {
        $errorMsg = "Veillez completer tous les champs...";
    }

}