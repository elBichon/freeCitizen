
//page des infos
//affichage par date des infos les mieux classées
//reste a ajouter le formulaire de commentaires
//ajouter notation
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
        
        //appel aux plugins et variables necessaires
            echo '<h1>Les dernières nouvelles</h1></br>';
            require 'includes/connect.php';
            $nomPage = "infos.php";
            require 'includes/ville.php';
            $ville = $_POST['ville'];
            $mieuxNotes="infos.php";
            $recherche="rechercheInfos.php";
            $ajouter="ajoutInfos.php";
            require 'includes/menu.php';
            require 'includes/menuServices.php';
            require 'includes/menuInfos.php';
            require 'objets/ObjetInfo.php';

      echo '<section id="voirInfos"><h2>Les dernières nouvelles dans cette ville</h2>';
            $request = $bdd->query('SELECT * FROM freeCitizenInfos WHERE ville = "'.$ville.'" ORDER BY date LIMIT 0, 10');
                while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
                    {
                        //constructeur de l objet info
                        $infos = new Info($donnees);
                        
                        //appel aux methodes et a la bdd
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
                            echo $infos->texte();
                    }
                    $request->closeCursor();
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

