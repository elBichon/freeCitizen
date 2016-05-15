//page des jobs
//ajouter commentaire et note

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
        //appel aux plugins et variables
        echo '<h1>Les derniers jobs</h1></br>';
        require 'includes/connect.php';
        $nomPage = "job.php";
        $ville = $_POST['ville'];
        $type = $_POST['type'];
        $statut = $_POST['statut'];
        $mieuxNotes="job.php";
        $recherche="rechercheJob.php";
        $ajouter="ajoutJob.php";
        require 'includes/menu.php';
        require 'includes/menuServices.php';
        require 'includes/menuInfos.php';
        require 'includes/themesJob.php';
        require 'objets/ObjetJob.php';
        require 'includes/bbcodeTexte.php';

        echo '<section id="voirJobs"><h2>Les meilleures propostions et recherches d\'emplois dans cette ville</h2>';
        $request = $bdd->query('SELECT * FROM freeCitizenJob WHERE ville = "'.$ville.'" AND type = "'.$type.'" AND statut =  "'.$statut.'" ORDER BY votes LIMIT 0, 10');
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            
            $job = new Job($donnees);
            
                echo $job->id();
                echo "</br>";
                echo $job->titre();
                echo "</br>";
                echo $job->date();
                echo "</br>";
                echo $job->ville();
                echo "</br>";
                echo $job->type();
                echo "</br>";
                echo $job->statut();
                echo "</br>";
                echo $job->votes();
                echo "</br>";
                $texte = $job->descriptif();
                echo $texte;
            }
        $request->closeCursor();
        
        echo '</section>';
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
