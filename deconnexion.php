//page de deconnexion

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Page de déconnexion</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
        </header>
        <h1>A bientôt sur FreeCitizen</h1>
        <p>Se <a href="index.php">reconnecter</a></p>
            <?php  include("includes/connect.php"); ?>
        <section id="deconnexion">

<?php
    session_start();
    
    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();
    
    // Suppression des cookies de connexion automatique
    setcookie('login', '');
    setcookie('pass_hache', '');




?>

        </section>



    <footer>
            <?php  include("includes/footer.php"); ?>
    </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>
