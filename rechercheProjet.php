//formulaire de recherche de projets

<?php
    session_start();
        ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>free citizen recherche de projets</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    </head>
    <body>
        <header>
        </header>

<?php
    if ($_SESSION['id'] != 0) {
        echo '<h1>Les dernières projets</h1></br>';
        require 'includes/connect.php';
        
        //appel aux variables necessaires
        $nomPage = "rechercheProjet.php";
        $ville = $_POST['ville'];
        $theme = $_POST['theme'];
        $idCommentateur=$_SESSION['id'];
        $mieuxNotes="projet.php";
        $recherche="rechercheProjet.php";
        $ajouter="ajoutProjet.php";
        
        //insertion des plugins necessaires
        require 'includes/menu.php';
        require 'includes/menuServices.php';
        require 'includes/menuInfos.php';
        require 'includes/themesProjet.php';
        require 'includes/bbcodeTexte.php';
        require 'objets/ObjetProjet.php';
        
        
        //appel à l objet projet
        echo '<section id="voirProjet"><h2>Tous les projets dans cette ville</h2>';
    
        $request = $bdd->query('SELECT * FROM freeCitizenProjet WHERE ville = "'.$ville.'" AND theme = "'.$theme.'" ORDER BY date DESC');
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            
            //appel au constructeur
            $projet = new Projet($donnees);
            
            //affichage du contenu de la bdd
            echo $projet->id();
            echo "</br>";
            echo $projet->titre();
            echo "</br>";
            echo $projet->date();
            echo "</br>";
            echo $projet->ville();
            echo "</br>";
            echo $projet->theme();
            echo "</br>";
            echo $projet->idAuteur();
            echo "</br>";
            echo $projet->equipe();
            echo "</br>";
            echo $projet->votes();
            echo "</br>";
            $texte = $projet->descriptif();
            echo $texte;
            echo "</br>";
            echo "</br>";
            //formulaire d'envois de commentaire
            require 'includes/includesProjet.php';
        }
        $request->closeCursor();
        echo'</section>';

        
        
        
        }
    else {
        echo "vous n'etes pas connecté";
    }
    echo '<footer>';
        require 'includes/footer.php';
    echo '</footer>';
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>
