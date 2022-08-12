<?php

require('actions/database.php');
//Recuperer les questions par defaut sans recherche
$getAllQuestions = $bdd -> query('SELECT id, id_auteur, title, description, pseudo_auteur, date_publication FROM questions ORDER BY  id DESC LIMIT 0,5');

//verifier si la recherche a ete rentree par l'utilisateur
if(isset($_GET['search']) AND !empty($_GET['search'])) {

    //la recherche
    $usersSearch = $_GET['search'];


    //recuperer toutes les questions qui correspondent a la recherche
    $getAllQuestions = $bdd -> query('SELECT id, id_auteur, title, description, pseudo_auteur, date_publication FROM questions WHERE title LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    


}