
//page de compte personnel
<?php session_start();
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
<?php
    if ($_SESSION['id'] != 0) {
        echo '<header>';
        echo '</header>';
        
        //inclusion des plugins
        echo '<h1>Mon Compte</h1>';
        require 'includes/connect.php';
        include 'includes/ville.php';
        include 'includes/menu.php';
        require 'includes/menuServices.php';
        require 'objets/objetCompte.php';

        echo '<section id="voirCompte">';
            $id = $_SESSION['id'];
            $request = $bdd->query('SELECT * FROM freeCitizenMembres WHERE id ="'.$id.'"');
            while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
            {
                //appel au constructeur de l objet compte
                $compte = new Compte($donnees);
                
                //affichage des infos de la bdd
                echo "id: ";
                echo $compte->id();
                echo "</br>";
                echo "login: ";
                echo $compte->login();
                echo "</br>";
                echo "adresse mail: ";
                echo $compte->email();//problème d'affichage des mails
                echo "</br>";
            }
            $request->closeCursor();
        echo '</section>';

        echo '<section id="modifierCompte">';
        echo '</section>';

        echo '<section id="detruireCompte">';
            echo "</br>";
            echo "Attention, si vous faites cela, votre compte et toutes les informations qu'il contient seront perdues.";
            echo "</br>";
            echo "Cet acte est irréversible";
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
