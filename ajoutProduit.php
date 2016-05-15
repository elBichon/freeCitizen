//formulaire d ajout de produit
//possibilite de poster une recherche ou un ajout de produit

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

//verification que l utilisateur est connecte
if ($_SESSION['id'] != 0) {
    
    //si l utilisateur est connecte
    //appel aux scripts necessaires
            echo '<h1>proposer des nouveaux produits</h1></br>';
            require 'includes/connect.php';
            $mieuxNotes = "produit.php";
            $recherche = "rechercheProduit.php";
            $ajouter = "ajoutProduit.php";
            require 'includes/ville.php';
            require 'includes/menu.php';
            require 'includes/menuServices.php';
            require 'includes/menuInfos.php';

//affichage du formulaire
            echo '<form action="ajoutProduit.php" method="post">';
                echo '<label for="ville">ville</label> :  <input type="text" name="ville" id="ville" required/><br />';
                echo '<label for="titre">titre</label> :  <input type="text" name="titre" id="titre" required /><br />';
                echo '<label for="equipe">type</label> : <input type="text" name="type" id="type" required /><br />';                echo '<label for="descriptif">descriptif</label> :<textarea name="descriptif" rows="10" cols="50">votre produit ici</textarea><br />';
                echo '<select name="statut" id="statut">';
                    echo '<option value="proposition">proposition</option>';
                    echo '<option value="recherche">recherche</option>';
                echo '</select>';
               echo '<input type="hidden" name="idAuteur" value=" echo $idAuteur;" >';
                echo '<input type="hidden" name="vote" value=0 >';
               echo '<input type="submit" value="Envoyer" />';
            echo '</form>';
    
    //recuperation des champs du formulaire pour verification back
    $i = 0;
    $ville = htmlspecialchars($_POST['ville']);
    $titre = htmlspecialchars($_POST['titre']);
    $type = htmlspecialchars($_POST['type']);
    $descriptif = htmlspecialchars($_POST['descriptif']);
    $statut = htmlspecialchars($_POST['statut']);
    
    $query=$bdd->prepare('SELECT COUNT(*) FROM freeCitizenProduit WHERE titre =:titre');
    $query->bindValue(':titre',$titre, PDO::PARAM_STR);
    $query->execute();
    $titre_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    
    //verification que le titre est disponnible
    if(!$titre_free){
        $titre_erreur1 = "Votre titre est déjà utilisé";
        $i++;
        echo $titre_erreur1;
        echo "</br>";
    }

    //verification du format
    if (strlen($titre) < 3 || strlen($titre) > 300){
        $titre_erreur2 = "Votre titre est soit trop grand, soit trop petit";
        $i++;
        echo $titre_erreur2;
        echo "</br>";
    }
    
    //verification que les champs ne sont pas vides
    if (empty($ville) || empty($titre) || empty($type) || empty($statut)|| empty($descriptif)){
        $vide_erreur = "Des champs sont vides";
        $i++;
        echo $vide_erreur;
        echo "</br>";
    }
    
    //si tout est bon insertion dans la bdd
    else{
    $req = $bdd->prepare('INSERT INTO freeCitizenProduit (date, ville, titre, type, idAuteur, statut, descriptif) VALUES(NOW(),?,?,?,?,?,?)');
    $req->execute(array($_POST['ville'], $_POST['titre'], $_POST['type'], $_POST['idAuteur'], $_POST['statut'],$_POST['descriptif']));
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

