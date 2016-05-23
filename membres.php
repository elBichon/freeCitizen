<?php
    session_start();
        ?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>free citizen membres</title>
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
            echo '<h1>Les Membres</h1></br>';
            require 'includes/connect.php';
            $ville = $_POST['ville'];
            require 'includes/ville.php';
            require 'includes/menu.php';
            require 'includes/menuService.php';
            require 'includes/pluginRecherche.php'; 
      echo '<section id="voirMembres"><h2>Tous les membres dans cette ville</h2>';
        $reponse = $bdd->query('SELECT DISTINCT m.login, m.email, v.ville FROM freeCitizenVilles v, freeCitizenMembres m WHERE v.idMembre = m.login AND ville = "'.$ville.'"');
        while ($donnees = $reponse->fetch())
        {
        echo '<p><strong><a href="membresSuite.php" id="link" value='. $donnees['login'] .'>'. $donnees['login'] .'</a>:   </strong>' . $donnees['email'] .'</br></p>';

    }
        echo '</section>';
        echo '<section id="membresConnectes"><h2>Tous les membres connectés dans cette ville</h2>';
        $reponse1 = $bdd->query('SELECT DISTINCT m.login, m.email, m.connect, v.ville FROM freeCitizenVilles v, freeCitizenMembres m WHERE v.idMembre = m.login AND ville = "'.$ville.'" AND connect = 1');
        while ($donnees = $reponse1->fetch())
        {
        echo '<p><strong><a href="membresSuite.php">'. $donnees['login'] .'</a>:   </strong>' . $donnees['email'] .'</br></p>';
    }

        echo '</section>';
        echo '<section id="">';
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

