
//page des events
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
        
        //variables necessaires
        $nomPage = "event.php";
        $ville = $_POST['ville'];
        $theme = $_POST['theme'];
        $idCommentateur=$_SESSION['id'];
        $mieuxNotes="projet.php";
        $recherche="rechercheEvent.php";
        $ajouter="ajoutEvent.php";
        
        //appel aux plugins necessaires 
        require 'includes/menu.php';
        require 'includes/menuServices.php';
        require 'includes/menuInfos.php';
        require 'includes/themesEvent.php';
        require 'objets/ObjetEvent.php';
        
        echo '<section id="voirProjet"><h2>Tous les projets dans cette ville</h2>';
        $request = $bdd->query('SELECT * FROM freeCitizenEvent WHERE ville = "'.$ville.'" AND theme = "'.$theme.'" ORDER BY date LIMIT 0, 10');
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            
            //appel au constructeur
                $event = new event($donnees);
                
                //appel a la bdd
                echo $event->id();
                echo "</br>";
                echo $event->titre();
                echo "</br>";
                echo $event->date();
                echo "</br>";
                echo $event->ville();
                echo "</br>";
                echo $event->theme();
                echo "</br>";
                echo $event->idAuteur();
                echo "</br>";
                echo $event->votes();
                echo "</br>";
                echo $event->participant();
                echo "</br>";
                $texte = $event->descriptif();
                echo $texte;
            
            
                        $idEvent = $event->id();
                        $participant = $event->participant();
                        $participantEnvoi = $participant + 1;
                        $tablePage = "freeCitizenEvent";
                        echo '<section id = "envoiVotes">';
                                echo '<form action = commentaire.php method="post">';
                                        echo '<input type = "hidden" name = "idEvent" value = "'.$idEvent.'" >';
                                        echo '<input type = "hidden" name = "tablePage" value = "'.$tablePage.'" >';
                                        echo '<input type = "hidden" name = "participantEnvoi" value = "'.$participantEnvoi.'" >';
                                    echo '<input type="submit" value="participer" />';
                                echo '</form>';
                        echo '</section>';
            
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
