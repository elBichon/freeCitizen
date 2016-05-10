//formulaire de recherche d infos

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
        
        //appel aux variables necessaires
        $nomPage = "rechercheInfos.php";
        $ville = $_POST['ville'];
        $theme = $_POST['theme'];
        $idCommentateur=$_SESSION['id'];
        $mieuxNotes="infos.php";
        $recherche="rechercheInfos.php";
        $ajouter="ajoutInfos.php";
        
         //insertion des plugins necessaires
        require 'includes/menu.php';
        require 'includes/menuServices.php';
        require 'includes/menuInfos.php';
        require 'includes/themesInfo.php';
        require 'objets/ObjetInfo.php';
        require 'includes/bbcodeTexte.php';
        require 'objets/ObjetCommentaire.php';
        
        echo '<section id="voirNouvelles"><h2>Toutes les nouvelles dans cette ville</h2>';
        $request = $bdd->query('SELECT * FROM freeCitizenInfos WHERE ville = "'.$ville.'" AND theme = "'.$theme.'" ORDER BY date DESC');
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            
            //appel au constructeur de l objet info
            $infos = new Info($donnees);
            $texte = $infos->texte();
            
            //azffichage de la bdd
            echo $infos->id();
            echo "</br>";
            echo $infos->titre();
            echo "</br>";
            echo $infos->date();
            echo "</br>";
            echo $infos->ville();
            echo "</br>";
            echo $infos->theme();
            echo "</br>";
            echo $infos->idAuteur();
            echo "</br>";
            echo $texte;
            
            echo "</br>";
            echo "</br>";
            
          echo '<section id="EnvoiCommentaire">';
            echo '<form action="'.$nomPage.'" method="post">';
            echo '<input type="text" name="texte" value="commenter" >';
            echo '<input type="hidden" name="idCommentateur" value="<?php echo $idCommentateur
          echo '<input type="hidden" name="idInfo" value="<?php echo $idInfo;
            echo '</br>';
            echo '<input type="submit" value="Envoyer" />';
            echo '</form>';
            echo'</section>';
            
            $req = $bdd->prepare('INSERT INTO freeCitizenCommentairesInfos (date, idArticle, idCommentateur, texte) VALUES(NOW(),?,?,?)');
            $req->execute(array($_POST['idInfo'],$_POST['idCommentateur'],$_POST['texte']));
            echo'</section>';
            
                echo '<section id="commentaire">';
                $request1 = $bdd->query('SELECT * FROM freeCitizenCommentairesInfos WHERE idArticle = "'.$idInfo.'" ORDER BY datePost DESC LIMIT 0, 10');
            while ($donneesCommentaire = $request1->fetch(PDO::FETCH_ASSOC)){
                $commentaire = new Commentaire($donneesCommentaire);
                echo $commentaire->idCommentateur();
                echo "  ";
                echo $commentaire->date();
                echo " :";
                echo "</br>";
                echo $commentaire->texte();
                echo "</br>";
            }
            $request1->closeCursor();
                echo'</section>';
        }
        echo '</section>';
    }
    else {
        echo "vous n'etes pas connecté";
    }
    ?>
    
<?php
    echo '<footer>';
    require 'includes/footer.php';
    echo '</footer>';
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>

