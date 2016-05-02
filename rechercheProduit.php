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
        $nomPage = "rechercheProduit.php";
        $ville = $_POST['ville'];
        $theme = $_POST['theme'];
        $statut = $_POST['statut'];
        $idCommentateur=$_SESSION['id'];
        $mieuxNotes="produit.php";
        $recherche="rechercheProduit.php";
        $ajouter="ajoutProduit.php";
        require 'includes/menu.php';
        require 'includes/menuServices.php';
        require 'includes/menuInfos.php';
        require 'includes/themesProduit.php';
        require 'objets/ObjetProduit.php';
        
        echo '<section id="voirProjet"><h2>Tous les projets dans cette ville</h2>';
        $request = $bdd->query('SELECT * FROM freeCitizenProduit WHERE ville = "'.$ville.'" AND type = "'.$type.'" AND statut = "'.$statut.'" ORDER BY date DESC');
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
                $produit = new Produit($donnees);
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
                echo $projet->descriptif();
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