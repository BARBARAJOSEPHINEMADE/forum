<?php

require ('actions/database.php');

//verifier si l'idee de la question est bien passe en parametre
if(isset($_GET['id']) AND !empty($_GET['id'])) {
  
    //verifier si la question existe
    $idOfQuestion = $_GET['id'];
    $checkIfQuestionExists= $bdd -> prepare ('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists ->execute (array($idOfQuestion));

    if($checkIfQuestionExists -> rowCount() > 0) {

        //recuperer  les donnees de la question

         $questionInfo = $checkIfQuestionExists -> fetch();
         if($questionInfo['id_auteur'] == $_SESSION['id']) {

              $question_title = $questionInfo['title'];
              $question_description = $questionInfo['description'];
              $question_content = $questionInfo['content'];

              $question_description = str_replace('<br />', '', $question_description );
              $question_content = str_replace('<br />', '', $question_content  );
              

         }else{
            $errorMsg = "Vous n'etes pas l'auteur de cette question";
         }

    } else{
        $errorMsg = "Aucune question n'a ete trouve";
    }

} else{
    $errorMsg = "Aucune question n'a ete trouve";
}