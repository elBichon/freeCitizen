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
        echo '<h1>Les dernières projets</h1></br>';
        require 'includes/connect.php';
        $nomPage = "rechercheEvent.php";
        $ville = $_POST['ville'];
        $theme = $_POST['theme'];
        $idCommentateur=$_SESSION['id'];
        $mieuxNotes="projet.php";
        $recherche="rechercheEvent.php";
        $ajouter="ajoutEvent.php";
        require 'includes/menu.php';
        require 'includes/menuServices.php';
        require 'includes/menuInfos.php';
        require 'includes/themesEvent.php';
        require 'includes/bbcodeTexte.php';
        require 'objets/ObjetEvent.php';
        
        echo '<section id="voirProjet"><h2>Tous les projets dans cette ville</h2>';
        $request = $bdd->query('SELECT * FROM freeCitizenEvent WHERE ville = "'.$ville.'" AND theme = "'.$theme.'" ORDER BY date DESC');
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
                $Event = new Event($donnees);
                $texte = $event->descriptif();
                echo $event->id();
                echo "</br>";
                echo $event->titre();
                echo "</br>";
                echo $event->date();
                echo "</br>";
                echo $event->dateDebut();
                echo "</br>";
                echo $event->ville();
                echo "</br>";
                echo $event->theme();
                echo "</br>";
                echo $event->idAuteur();
                echo "</br>";
                echo $event->participant();
                echo "</br>";
                echo $texte;
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
