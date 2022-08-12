<?php

require ('actions/database.php');
//verifier si l'id de l'utilisateur a ete rentree dans l'url
if (isset($_GET['id']) AND !empty($_GET['id'])) {

    //recuperer l'id de la question
      $idOfUser = $_GET['id'];

      //verifier si l'utilisateur existe 
      $checkIfUserExists = $bdd -> prepare ('SELECT pseudo, first_name, last_name FROM users WHERE id = ?');
      $checkIfUserExists-> execute (array($idOfUser));

      if($checkIfUserExists -> rowcount() > 0) {
 
        //recuperer toutes les datas de la question
        $usersInfos = $checkIfUserExists -> fetch();


        //stocker les datas de l'utilisateur dans les variables
        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['last_name'];
        $user_firstname = $usersInfos['first_name'];


        $getHisQuestions = $bdd -> prepare ('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
        $getHisQuestions -> execute (array($idOfUser));
        

      } else {
        $errorMsg = "Aucun utilisateur a ete trouvee";
      }

} else {
    $errorMsg = "Aucune utilisateur  a ete trouvee";
}
