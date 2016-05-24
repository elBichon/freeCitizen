
//suite et verifications de l inscription
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>confirmation de l'inscription'</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    </head>

    <body>
        <header>
        </header>
        <h1>Finalisation</h1>
            <?php  include("includes/connect.php"); ?>
        <section id="InscriptionSuiteConfirmation">
            <?php
            
            //appel aux variables et echappements des posts du formulaire
                $i = 0;
                $email = htmlspecialchars($_POST['email']);
                $query1=$bdd->prepare('SELECT COUNT(*) AS nbr FROM freeCitizenMembres WHERE email =:email');
                $query1->bindValue(':email',$email, PDO::PARAM_STR);
                $query1->execute();
                $mail_free=($query1->fetchColumn()==0)?1:0;
                $query1->CloseCursor();
                
                //verification que l adresse mail est libre
                if($mail_free){
                    $email_erreur1 = "Votre adresse email n'est pas enregistrée";
                    $i++;
                    echo $email_erreur1;
                    echo "</br>";
                }
                
                //verification que l adresse a un format valide
                if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email)){
                    $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
                    $i++;
                    echo $email_erreur2;
                    echo "</br>";
                }
                
                //confirmation que l adresse est vraie via le mail de verification
                else{
                    $req=$bdd->prepare("UPDATE freeCitizenMembres SET confirmation = 1 WHERE email = :email" );
                    $req->bindParam(":email",$_POST['email']);
                    $req->execute();
                    
                }
                ?>

        </section>

    <footer>
            <?php  include("includes/footer.php"); ?>
    </footer>
    </body>
</html>
