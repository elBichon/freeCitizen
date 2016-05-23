<?php
    session_start();
        ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>free citizen page de commentaires</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
        </header>

<?php
    if ($_SESSION['id'] != 0) {
        echo '<h1>Insertion</h1></br>';
        require 'includes/connect.php';
        require 'includes/menu.php';
        require 'includes/menuServices.php';
        require 'includes/bbcodeTexte.php';
        
        echo '<section id="ajoutCommentaires"><h2>page de commentaires</h2>';
            $i = 0;
            $commentaire = htmlspecialchars($_POST['commentaire']);
            $idAuteur = htmlspecialchars($_POST['idAuteur']);
            $idArticle = htmlspecialchars($_POST['idArticle']);
            $tableCommentaire = htmlspecialchars($_POST['tableCommentaire']);
            $tablePage = htmlspecialchars($_POST['tablePage']);
            $votesEnvoi = htmlspecialchars($_POST['votesEnvoi']);
            $idEvent = htmlspecialchars($_POST['idEvent']);
            $participantEnvoi = htmlspecialchars($_POST['participantEnvoi']);
        
       
        
        //voter
        $reqVotes=$bdd->prepare('UPDATE '.$tablePage.' SET votes = '.$votesEnvoi.'  WHERE id = '.$idArticle.'');
            $reqVotes->bindParam(":votes",$_POST['votesEnvoi']);
            $reqVotes->bindParam(":id",$_POST['idArticle']);
        $reqVotes->execute();
        
        //participer
        $reqParticiper=$bdd->prepare('UPDATE '.$tablePage.' SET participant = '.$participantEnvoi.'  WHERE id = '.$idEvent.'');
            $reqParticiper->bindParam(":participant",$_POST['participantEnvoi']);
            $reqParticiper->bindParam(":id",$_POST['idEvent']);
        $reqParticiper->execute();
        
                if (strlen($commentaire) < 3 || strlen($commentaire) > 300){
                        //$titre_erreur2 = "Votre commentaire est soit trop grand, soit trop petit";
                        $i++;
                        echo $titre_erreur2;
                        echo "</br>";
                    }
                if (empty($commentaire) || empty($idAuteur) || empty($idArticle)){
                        //$vide_erreur = "Des champs sont vides";
                        $i++;
                        echo $vide_erreur;
                        echo "</br>";
                    }
                else{
                    $reponse = $bdd->prepare('INSERT INTO '.$tableCommentaire.' (datePost,idArticle,idAuteur,commentaire) VALUES(NOW(),?,?,?)');
                    $reponse->execute(array($_POST['idArticle'], $_POST['idAuteur'],$_POST['commentaire']));
                }
        $reponse->closeCursor();
        echo '</section>';
    }
    else {
        echo "vous n'etes pas connecté";
    }?>

<?php
    echo '<footer>';
    require 'includes/footer.php';
    echo '</footer>';
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>

