<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>accueilFreeCitizen</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <header>
    </header>

    <h1>Free Citizen</h1>
    <h2>Réveille toi en un clic</h2>
        <?php include("includes/connect.php"); ?>

    <section id="">
    <?php
        $login = htmlspecialchars($_POST['login']);
        $pass_hache = md5(htmlspecialchars($_POST['password']));
    
        if (empty($login) || empty($pass_hache)){
            $connexion_erreur = "Vous devez renseigner un login et un mot de pass";
            $retour = "Cliquez <a href='./index.php'>ici</a> pour revenir à la page d'accueil";
            echo $connexion_erreur;
            echo "</br>";
            echo $retour;
        }
        else{
            $req = $bdd->prepare('SELECT id FROM freeCitizenMembres WHERE login = :login AND pass = :pass AND confirmation = 1');
            $req->execute(array(
                                'login' => $login,
                                'pass' => $pass_hache));
            $resultat = $req->fetch();
        
        if (!$resultat){
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else{
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['login'] = $login;
            echo 'Bonjour ' . $_SESSION['login'];
            require 'includes/menu.php';
        }
    }
    ?>
    </section>

    <footer>
        <?php include("includes/footer.php"); ?>
    </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>