<?php 
session_start();
require('actions/users/showOneUsersProfileAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php  include("includes/head.php"); ?>
<body>
<?php include 'includes/navbar.php' ; ?>
<br><br>


   
        <div class="container">
            <?php

             if(isset($errorMsg)){ echo $errorMsg; }
            
             if(isset( $getHisQuestions )){
                ?>

                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $user_pseudo; ?></h4>
                        <hr>
                        <p><?= $user_firstname . '  ' . $user_lastname; ?></p>
                    </div>
                </div>
                <br>
                
             <?php 
             while ($question = $getHisQuestions -> fetch()) {
                ?>

                <div class= "card">
                    <div class="card-header">
                        <?php $question['title']; ?>
                    </div>
                    <div class="card-body">
                        <?php $question['description']; ?>
                    </div>
                    <div class="card-footer">
                        <p>Par<?php $question['pseudo_auteur']; ?> le <?php $question['date_publication']; ?></p>
                    </div>
                </div>
                <?php
             }
              }
?>
</div>


</body>
</html>