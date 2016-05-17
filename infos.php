<?php
    session_start();
        ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>mon compte</title>
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
    
            echo '<h1>Les dernières nouvelles</h1></br>';
            require 'includes/connect.php';
            $nomPage = "infos.php";
            require 'includes/ville.php';
            $ville = $_POST['ville'];
            $mieuxNotes = "infos.php";
            $recherche = "rechercheInfos.php";
            $ajouter = "ajoutInfos.php";
            $tableCommentaire = "freeCitizenCommentairesInfos";
            $tablePage = "freeCitizenInfos";
            require 'includes/menu.php';
            require 'includes/menuServices.php';
            require 'includes/menuInfos.php';
            require 'includes/themesInfo.php';
            require 'objets/ObjetInfo.php';
            require 'includes/bbcodeTexte.php';
    
      echo '<section id="voirInfos"><h2>Les dernières nouvelles dans cette ville</h2>';
            $request = $bdd->query('SELECT * FROM freeCitizenInfos WHERE ville = "'.$ville.'" AND date < CURDATE() ORDER BY votes LIMIT 0, 10');
                while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
                    {
                        $infos = new Info($donnees);
                        echo '<section id="afficherInfos">';
                            echo "identifiant: ";
                            echo $infos->id();
                            echo "</br>";
                            echo "titre: ";
                            echo $infos->titre();
                            echo "</br>";
                            echo "date: ";
                            echo $infos->date();
                            echo "</br>";
                            echo "ville: ";
                            echo $infos->ville();
                            echo "</br>";
                            echo "theme: ";
                            echo $infos->theme();
                            echo "</br>";
                            echo "Auteur: ";
                            echo $infos->idAuteur();
                            echo "</br>";
                            echo "votes: ";
                            echo $infos->votes();
                            echo "</br>";
                            $texte = $infos->texte();
                            echo "post: ";
                            echo $texte;
                            echo "</br>";
                            echo "</br>";
                        //formulaire d'envois de commentaire
                        $idArticle = $infos->id();
                        $idAuteur = $_SESSION['id'];
                            echo '<section id = "envoiCommentaires">';
                                echo '<form action = commentaire.php method="post">';
                                    echo '<label for = "commentaire">Commentaire: </label>  <input type="text" name="commentaire" id="commentaire" required/></br>';
                                    echo '<input type = "hidden" name = "idAuteur" value = "'.$idAuteur.'" >';
                                    echo '<input type = "hidden" name = "idArticle" value = "'.$idArticle.'" >';
                                    echo '<input type="submit" value="Envoyer" />';
                                echo '</form>';
                            echo '</section>';
                        echo '</section>';
                        //système de commentaires
                        require 'objets/ObjetCommentaire.php';
                        echo "</br>";
                        echo "</br>";
                           echo 'vos réactions';
                        //formulaire d ajout des commentaires
                            $idArticle = $infos->id();
                            $idAuteur = $_SESSION['id'];
                        echo "</br>";
                        echo "</br>";
                        //appel des commentaires
                        $request1 = $bdd->query('SELECT * FROM '.$tableCommentaire.' c, '.$tablePage.' i WHERE c.idArticle = i.id ORDER BY datePost DESC LIMIT 0, 10');
                        while ($donneesCommentaires = $request1->fetch(PDO::FETCH_ASSOC)){
                        //affichage des commentaires
                        $commentaire = new Commentaire($donneesCommentaires);
                        echo '<section id="afficherCommentaire">';
                            echo $commentaire->datePost();
                            echo " :";
                            $texte = $commentaire->commentaire();
                            echo $texte;
                        echo '</section>';
                        }
                        $request1->closeCursor();
                    }
    $request->closeCursor();
}
else {
    echo 'vous n\'etes pas connecté';
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

