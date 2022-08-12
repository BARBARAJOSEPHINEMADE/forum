<?php require('actions/users/signupAction.php');  ?>
<!DOCTYPE html>
<html lang="en">
<?php  include("includes/head.php"); ?>
<body>
    <br><br>
    <form class="container" action="" method="POST">
        <?php  if(isset($errorMsg)){ echo '<p>' .$errorMsg. '</p>'; } ?> 

        <div class="mb-3">
            <label for="exampleInputEmail" class=" form-label" >Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label" >Nom</label>
            <input type="text" class="form-control" name="firstname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label" >Prenom</label>
            <input type="text" class="form-control" name="lastname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label" >Password</label>
            <input type="text" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
        <br> <br>
        <a href="login.php"> <p>J'ai deja un compte, je me connecte</p></a>
    </form>

</body>
</html>