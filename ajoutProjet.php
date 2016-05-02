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
            echo '<h1>proposer des nouveaux projets</h1></br>';
            require 'includes/connect.php';
            $idAuteur=$_SESSION['id'];
            $mieuxNotes="projet.php";
            $recherche="rechercheProjet.php";
            $ajouter="ajoutProjet.php";
            require 'includes/ville.php';
            require 'includes/menu.php';
            require 'includes/menuServices.php';
            require 'includes/menuInfos.php';

            echo '<form action="ajoutProjet.php" method="post">';
                echo '<label for="ville">ville</label> :  <input type="text" name="ville" id="ville" /><br />';
                echo '<label for="theme">theme</label> :  <input type="text" name="theme" id="theme" /><br />';
                echo '<label for="equipe">equipe</label> :<textarea name="equipe" rows="10" cols="50">votre equipe ici</textarea><br />';
                echo '<label for="descriptif">descriptif</label> :<textarea name="descriptif" rows="10" cols="50">votre projet ici</textarea><br />';
               echo '<input type="hidden" name="idAuteur" value=" echo $idAuteur;" >';
               echo '<input type="submit" value="Envoyer" />';
            echo '</form>';
    
    $req = $bdd->prepare('INSERT INTO freeCitizenProjet (date, ville, theme, idAuteur, equipe, descriptif) VALUES(NOW(),?,?,?,?,? )');
    $req->execute(array($_POST['ville'], $_POST['theme'],$_POST['idAuteur'],$_POST['equipe'],$_POST['descriptif']  ));
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

