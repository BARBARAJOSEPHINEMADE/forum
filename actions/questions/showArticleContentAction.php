<?php

require ('actions/database.php');
//verifier si l'id de la question a ete rentree dans l'url
if (isset($_GET['id']) AND !empty($_GET['id'])) {

    //recuperer l'id de la question
      $idOfTheQuestion = $_GET['id'];

      //verifier si la question existe 
      $checkIfQuestionExist = $bdd -> prepare ('SELECT * FROM questions WHERE id=?');
      $checkIfQuestionExist -> execute (array($idOfTheQuestion));

      if($checkIfQuestionExist -> rowcount() > 0) {
 
        //recuperer toutes les datas de la question
        $questionsInfos = $checkIfQuestionExist -> fetch();


        //stocker les datas de la question dans les variables
        $question_title = $questionsInfos ['title'];
        $question_description = $questionsInfos ['description'];
        $question_content = $questionsInfos ['content'];
        $question_id_auteur = $questionsInfos ['id_auteur'];
        $question_pseudo_auteur = $questionsInfos ['pseudo_auteur'];
        $question_publication_date = $questionsInfos ['date_publication'];

      } else {
        $errorMsg = "Aucune question n' a ete trouvee";
      }

} else {
    $errorMsg = "Aucune question n' a ete trouvee";
}
