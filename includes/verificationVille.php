//Verification back que la ville fournie par l utilisateur est au format correct

<?php

//variables d inscription recuperee
    $login = htmlspecialchars($_POST['login']);
    $ville = htmlspecialchars($_POST['ville']);
    $i = 0;

//verification que le format est valide et le champ non vide
        if (!preg_match("#[a-z]#", $ville) || empty($ville)){
            $ville_erreur = "Votre ville n'a pas un format valide";
            $i++;
            echo $ville_erreur;
            echo "</br>";
        }
        
//si la ville est au format valide, proceder a l insertion en bdd
        $req = $bdd->prepare('INSERT INTO freeCitizenVilles(idMembre, ville) VALUES(:idMembre, :ville)');
        $req->execute(array(
                             'idMembre' => $login,
                             'ville' => $ville
                             ));
    echo "un mail de confirmation vous sera bientôt envoyé, pensez à vérifier vos spams";
?>



