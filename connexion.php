
//page d econnexion
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
        <?php include("includes/pluginRecherche.php"); ?>

    <section id="">
    <?php
    
    //echappement des champs recus
        $login = htmlspecialchars($_POST['login']);
        $pass_hache = sha1(htmlspecialchars($_POST['password']));
    
    //verification que les champs sont remplis
        if (empty($login) || empty($pass_hache)){
            $connexion_erreur = "Vous devez renseigner un login et un mot de passe";
            $retour = "Cliquez <a href='./index.php'>ici</a> pour revenir à la page d'accueil";
            echo $connexion_erreur;
            echo "</br>";
            echo $retour;
        }
        else{
            
            //verification que le compte existe
            $req = $bdd->prepare('SELECT id FROM freeCitizenMembres WHERE login = :login AND pass = :pass AND confirmation = 1');
            $req->execute(array(
                                'login' => $login,
                                'pass' => $pass_hache));
            $resultat = $req->fetch();
        
        if (!$resultat){
            
            //si le champ n existe pas
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else{
            
            //si le compte existe creation de la session 
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $id = $_SESSION['id'];
            $_SESSION['login'] = $login;
            echo 'Bonjour ' . $_SESSION['login'];
            require 'includes/menu.php';
            require 'includes/menuServices.php';
            require 'includes/ville.php';
            
            $req2=$bdd->prepare("UPDATE freeCitizenMembres SET connect = 1 WHERE id = :id" );
            $req2->bindParam(":id",$id);
            $req2->execute();
            
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
