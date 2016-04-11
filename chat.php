<?php
    $nom = $_POST['nom'];                    
    $message = $_POST['message'];
    $ligne = $nom.' > '.$message.'<br>';
    $leFichier = file('ac.htm');
    array_unshift($leFichier, $ligne);
    file_put_contents('ac.htm', $leFichier);

    ?>
