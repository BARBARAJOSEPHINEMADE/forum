<?php
session_start ();
if (!isset ($_SESSION['auth'])){
   header('Location: ../../login.php');
   
}

require ('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])) {
  
    //verifier si la question existe
    $idOfTheQuestion = $_GET['id'];
    $checkIfQuestionExists= $bdd -> prepare ('SELECT id_auteur FROM questions WHERE id = ?');
    $checkIfQuestionExists ->execute (array($idOfTheQuestion));

    if($checkIfQuestionExists -> rowCount() > 0) {

        //recuperer  les donnees de la question

         $theQuestionInfo = $checkIfQuestionExists -> fetch();
         if( $theQuestionInfo['id_auteur'] == $_SESSION['id']) {

              $deleteThisQuestion = $bdd -> prepare ('DELETE FROM  questions WHERE id = ?');
              $deleteThisQuestion -> execute (array($idOfTheQuestion));

              header('Location: ../../my-question.php');

         }else{
            $errorMsg = "Vous n'avez pas le droit de supprimer cette  question";
         }

    } else{
        $errorMsg = "Aucune question n'a ete trouve";
    }

} else{
    $errorMsg = "Aucune question n'a ete trouve";
}
