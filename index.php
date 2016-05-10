
//page d index
<?php session_start();
    ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>indexFreeCitizen</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/verificationLogin.js"></script>
        <script src="js/verificationInscription.js"></script>
    </head>

    <body>
    <header>
    </header>

<?php

//si l utilisateur est deja connecte
    if (isset($_SESSION['login'])) {
    echo '<h1>FREE CITIZEN</h1>';
        echo 'Il y a eu un problème de connexion, vous ne devriez pas voir ceci';
        echo '</br>';
        echo 'rendez vous <a href="deconnexion.php">ICI</a>';

       }
       
       //formulaire de connexion
   else {
       require 'includes/connect.php';
    echo '<section id="connexion">';
        echo '<h3>Connexion</h3></br>';
        echo '<div class="">';
            echo '<form action="connexion.php" method="post">';
            echo '<div id="loginConnexion">';
                echo '<label for="login">Login</label>';
                echo '<input type="text" class="form-control" id="champLogin" placeholder="login" name="login" required>';
            echo '</div>';
            echo '<div class="error-message"></div></br>';
            echo '<div id="passwordConnexion">';
                echo '<label for="password">Mot de passe</label>';
                echo '<input type="password" class="form-control" placeholder="password" id="champPassword" name="password" required>';
            echo '</div>';
            echo '<div class="error-message"></div></br>';
            echo '<div class="button">';
                echo '<button type="submit" id="envoyerConnexion" class="btn btn-default">Se connecter</button>';
            echo '</div>';
            echo '</form>';
        echo '</div>';
    echo '</section>';

//formulaire d inscription
    echo '<section id="inscription">';
        echo '<h3>Inscription</h3></br>';
       echo '<div class="">';
            echo '<form method="post" action="inscription.php">';
            echo '<div class="" id="loginInscription">';
                echo '<label for="login">Login</label>';
                echo '<input type="text" class="form-control" id="login" placeholder="login" name="login" required>';
            echo '</div>';
            echo '<div class="error-message"></div></br>';
            echo '<div class="" id="emailInscription">';
                echo '<label for="email">Adresse Email</label>';
                echo '<input type="email" class="form-control" id="email" placeholder="Email" name="email" required>';
            echo '</div>';
            echo '<div class="error-message"></div></br>';
            echo '<div class="" id="passwordInscription">';
                echo '<label for="password">Mot de passe</label>';
                echo '<input type="password" class="form-control" id="password" placeholder="Password" name="password" required>';
            echo '</div>';
            echo '<div class="error-message"></div></br></br>';
        echo '<div class="" id="passwordInscriptionCheck">';
                echo '<label for="password2">Vérification du mot de passe</label>';
                echo '<input type="password" class="form-control" id="password2" placeholder="Password" name="passwordVerification" required>';
        echo '</div>';
        echo '<div class="error-message"></div></br>';
        echo '<div id="cgu">';
            echo '<label>';
                echo '<input type="checkbox" name="cgu" value="ok" required> J ai bien pris connaissance et accpete les <a href="cgu.php">conditions générales d utilisation</a>';
            echo '</label>';
        echo '</div></br>';
            echo '<div class="">';
                echo '<button type="submit" id="envoyerInscription" class="btn btn-default">Inscription</button>';
            echo '</div>';
            echo '</form>';
        echo '</div>';
    echo '</section>';
    }
    echo '<footer>';
            require 'includes/footer.php';
    echo '</footer>';
?>
    </body>
</html>
