

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="containaer-fluid justifycontent" >
        <a class="navbar-brand " href="">Forum de discussion des medecins</a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
          <span  class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.html">Accueil</a>
                </li>
                <li class="nav-item">
                      <a class="nav-link " href="index.php">Les questions</a>
                </li>
                <li class="nav-item">
                      <a class="nav-link " href="publish-question.php">Publier une questions</a>
                </li>
                <li class="nav-item">
                       <a class="nav-link " href="my-question.php">Mes questions</a>
                </li>
                <?php
                     if(isset($_SESSION['auth'])){
                        ?>
                         <li class="nav-item">
                            <a class="nav-link " href="actions/users/logooutAction.php">Deconnexion</a>
                         </li>
                         <?php
                     }
                ?>
                
            </ul>
        </div>      
    </div>
              
</nav>