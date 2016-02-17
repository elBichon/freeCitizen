<?php
        $i = 0;
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']);
        $ville = htmlspecialchars($_POST['ville']);
        $pass_hache = md5(htmlspecialchars($_POST['password']));
        $confirm = md5(htmlspecialchars($_POST['passwordVerification']));
        $cookies = htmlspecialchars($_POST['cookies']);
        $cgu = htmlspecialchars($_POST['cgu']);
        $confirmation = 0;
    
    
        $query=$bdd->prepare('SELECT COUNT(*) FROM freeCitizenMembres WHERE login =:login');
        $query->bindValue(':login',$login, PDO::PARAM_STR);
        $query->execute();
        $login_free=($query->fetchColumn()==0)?1:0;
        $query->CloseCursor();
    
        if(!$login_free){
            $login_erreur1 = "Votre pseudo est déjà utilisé par un membre";
            $i++;
            echo $login_erreur1;
            echo "</br>";
        }
        if (strlen($login) < 3 || strlen($login) > 150){
            $login_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
            $i++;
            echo $login_erreur2;
            echo "</br>";
        }
        if ($pass_hache != $confirm || empty($confirm) || empty($pass_hache)){
            $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
            $i++;
            echo $mdp_erreur;
            echo "</br>";
        }
    
    
        $query1=$bdd->prepare('SELECT COUNT(*) AS nbr FROM freeCitizenMembres WHERE email =:email');
        $query1->bindValue(':email',$email, PDO::PARAM_STR);
        $query1->execute();
        $mail_free=($query1->fetchColumn()==0)?1:0;
        $query1->CloseCursor();
    
        if(!$mail_free){
            $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
            $i++;
            echo $email_erreur1;
            echo "</br>";
        }
        if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email)){
            $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
            $i++;
            echo $email_erreur2;
            echo "</br>";
        }
        if (!preg_match("#[a-z]#", $ville) || empty($ville)){
            $ville_erreur = "Votre ville n'a pas un format valide";
            $i++;
            echo $ville_erreur;
            echo "</br>";
        }
        if ($cgu!="ok"){
            $cgu_erreur = "Vous devez accepter les conditions générales d'utilisation";
            $i++;
            echo $cgu_erreur;
            echo "</br>";
        }
        if ($i!=0){
            echo "il y a eu un problème dans votre inscription. Rendez-vous <a href='index.php'>ici</a> pour réessayer s'il vous plaît";
        }
        else{
            $req = $bdd->prepare('INSERT INTO freeCitizenMembres(login, email, pass, cookies, cgu, confirmation) VALUES(:login, :email, :pass, :cookies, :cgu, :confirmation)');
            $req->execute(array(
                        'login' => $login,
                        'email' => $email,
                        'pass' => $pass_hache,
                        'cookies' => $cookies,
                        'cgu' => $cgu,
                        'confirmation' => $confirmation
                        ));
            $req2 = $bdd->prepare('INSERT INTO freeCitizenVilles(login, ville) VALUES(:login, :ville)');
            $req2->execute(array(
                            'login' => $login,
                            'ville' => $ville
                            ));
            echo "</br>";
            echo "votre inscription a bien été reçue, un mail de confirmation vous sera bientôt envoyé. S'il n'apparaît pas, pensez à vérifier vos spams.";
            echo "</br>";
        }
    echo $_COOKIE['login'];
    ?>
    

