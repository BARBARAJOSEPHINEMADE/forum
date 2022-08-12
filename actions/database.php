<?php 
try {
     $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('Une erreur a ete trouvee : ' . $e->getMessage() );
}
?>