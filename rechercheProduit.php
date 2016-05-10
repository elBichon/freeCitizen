//formulaire de recherche de produits

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
        
        //appel aux variables necessaires
        $nomPage = "rechercheProjet.php";
        $ville = $_POST['ville'];
        $theme = $_POST['theme'];
        $statut = $_POST['statut'];
        $idCommentateur=$_SESSION['id'];
        $mieuxNotes="projet.php";
        $recherche="rechercheProjet.php";
        $ajouter="ajoutProjet.php";
        
        //insertion des plugins necessaires
        require 'includes/menu.php';
        require 'includes/menuServices.php';
        require 'includes/menuInfos.php';
        require 'includes/themesProduit.php';
        require 'includes/bbcodeTexte.php';
        require 'objets/ObjetProduit.php';
        
        //appel a l objet produit
        echo '<section id="voirProjet"><h2>Toutes les propostions et recherches de produits dans cette ville</h2>';
        $request = $bdd->query('SELECT * FROM freeCitizenProduit WHERE ville = "'.$ville.'" AND theme = "'.$theme.'" AND statut =  "'.$statut.'"ORDER BY date DESC');
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            
            //appel au constructeur
                $produit = new Produit($donnees);
                $texte = $produit->descriptif();
                
                //affichage du contenu de la bdd
                echo $produit->id();
                echo "</br>";
                echo $produit->titre();
                echo "</br>";
                echo $produit->date();
                echo "</br>";
                echo $produit->dateDisponnibilite();
                echo "</br>";
                echo $produit->ville();
                echo "</br>";
                echo $produit->type();
                echo "</br>";
                echo $produit->statut();
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
