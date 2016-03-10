<?php
    $login = htmlspecialchars($_POST['login']);
    $ville = htmlspecialchars($_POST['ville']);
    $i = 0;
        if (!preg_match("#[a-z]#", $ville) || empty($ville)){
            $ville_erreur = "Votre ville n'a pas un format valide";
            $i++;
            echo $ville_erreur;
            echo "</br>";
        }
        $req = $bdd->prepare('INSERT INTO freeCitizenVilles(idMembre, ville) VALUES(:idMembre, :ville)');
        $req->execute(array(
                             'idMembre' => $login,
                             'ville' => $ville
                             ));
    echo "un mail de confirmation vous sera bientôt envoyé, pensez à vérifier vos spams";
?>
