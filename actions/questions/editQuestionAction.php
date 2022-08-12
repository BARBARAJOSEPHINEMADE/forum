<?php

require ('actions/database.php');
//verifier le formulaire
if (isset($_POST['validate'])) {

    //verifier si les champs sont remplis
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])) {

        //les donnees a faire passer a la requete
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br( htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));

        //modifier les informations de la question qui possede l'id rentre en parametre
        $editQuestionOnWebsite = $bdd -> prepare ('UPDATE questions SET  title = ?, description = ?, content = ? WHERE id = ?');
        $editQuestionOnWebsite -> execute (array( $new_question_title ,  $new_question_description , $new_question_content,  $_GET['id']));

        //redirection vers la page d'affichage des questions de l'utilisateur
        header ('Location: my-question.php');

    } else {
        $errorMsg = "Veillez completer tous les champs...";
    }

}