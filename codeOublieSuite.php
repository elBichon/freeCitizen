
//suite du formulaire de code oublie
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>free citizen code oublié suite</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/verificationEmail.js"></script>

    </head>

    <body>
    <header>
    </header>

    <h1>FREE CITIZEN</h1>

    <?php include("includes/connect.php"); ?>
    <section id="codeOublie">
        <h3>Donnez votre adresse email pour recevoir votre code</h3></br>
        <div class="">

        </div>
    </section>

    <footer>
            <?php  include("includes/footer.php"); ?>
    </footer>

    </body>
</html>

<?php

//envoi du mail a l adresse fournie
$email = htmlspecialchars($_POST['email']);
$query1=$bdd->prepare('SELECT COUNT(*) AS nbr FROM freeCitizenMembres WHERE email =:email');
$query1->bindValue(':email',$email, PDO::PARAM_STR);
$query1->execute();
$mail_free=($query1->fetchColumn()==0)?1:0;
$query1->CloseCursor();

//verification que l adresse existe
if($mail_free){
    $email_erreur1 = "Votre adresse email n'est pas dans notre base de données";
    $i++;
    echo $email_erreur1;
    echo "</br>";
}

//verification que le champ n est pas vide et que l adresse est a un format correct
if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email)){
    $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
    $i++;
    echo $email_erreur2;
    echo "</br>";
}

//envoi du mail
else {
    echo "un mail contenant votre mot de passe vous a été envoyé, pensez à vérifier vos spams";
    $mdp=$bdd->prepare('SELECT pass FROM freeCitizenMembres WHERE email =:email');
    $message = "Bonjour, voici votre mot de passe";
    $titre = "confirmation d'inscription à FREE CITIZEN";
    mail($email, $titre, $message, $mdp);
    
    
}?>
