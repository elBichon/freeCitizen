//page qui permet d'ajouter un nouvel événement à la liste des events

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
    
    //inclusion des modules necessaires
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

//formulaire d ajout des events
            echo '<form action="ajoutEvent.php" method="post">';
                echo '<label for="ville">ville</label> :  <input type="text" name="ville" id="ville" required/><br />';
                echo '<label for="theme">theme</label> :  <input type="text" name="theme" id="theme" required/><br />';
                echo '<label for="titre">titre</label> :  <input type="text" name="titre" id="titre" required/><br />';
                echo '<label for="equipe">equipe</label> :<textarea name="equipe" rows="10" cols="50" required>votre equipe ici</textarea><br />';
                echo '<label for="descriptif">descriptif</label> :<textarea name="descriptif" rows="10" cols="50" required>votre projet ici</textarea><br />';
               echo '<input type="hidden" name="idAuteur" value=" echo $idAuteur;" >';
                echo '<input type="hidden" name="participant" value="0" >';
               echo '<input type="submit" value="Envoyer" />';
            echo '</form>';
    
//verification back
    $i = 0;
    $ville = htmlspecialchars($_POST['ville']);
    $titre = htmlspecialchars($_POST['type']);
    $theme = htmlspecialchars($_POST['titre']);
    $theme = htmlspecialchars($_POST['statut']);
    $texte = htmlspecialchars($_POST['descriptif']);
    
    $query=$bdd->prepare('SELECT COUNT(*) FROM freeCitizenEvent WHERE titre =:titre');
    $query->bindValue(':titre',$titre, PDO::PARAM_STR);
    $query->execute();
    $titre_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    
//titre non utilisé
    if(!$titre_free){
        $titre_erreur1 = "Votre titre est déjà utilisé";
        $i++;
        echo $titre_erreur1;
        echo "</br>";
    }
    
    //taille du titre
    if (strlen($titre) < 3 || strlen($titre) > 300){
        $titre_erreur2 = "Votre titre est soit trop grand, soit trop petit";
        $i++;
        echo $titre_erreur2;
        echo "</br>";
    }
    
    //ville non vide
    if (empty($ville) || empty($titre) || empty($type) || empty($statut)|| empty($descriptif)){
        $vide_erreur = "Des champs sont vides";
        $i++;
        echo $vide_erreur;
        echo "</br>";
    }
    
    //si tout est bon proceder a l insertion
    else{
    $req = $bdd->prepare('INSERT INTO freeCitizenEvent (date, titre, dateDebut, theme, idAuteur, participant, descriptif) VALUES(NOW(),?,?,?,?,?,? )');
    $req->execute(array($_POST['ville'],$_POST['titre'] ,$_POST['theme'],$_POST['idAuteur'],$_POST['participant'],$_POST['descriptif']  ));
    }
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

