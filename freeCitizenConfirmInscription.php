
//page de confirmation de l inscription
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
        <script src="js/verificationInscription.js"></script>
    </head>

    <body>
        <header>
        </header>
        
        //formulaire de demande de confirmation de l adresse email
        <h1>Confirmation de ton inscription</h1>
            <?php  include("includes/connect.php"); ?>
        <section id="InscriptionSuiteConfirmation">
            <div class="">
            <form action="freeCitizenConfirmInscriptionSuite.php" method="post">
                <div id="emailConfirmation">
                    <label for="email">Confirmez votre adresse email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
                <div class="error-message"></div></br>
                <button type="submit" class="btn btn-default">Confirmer</button>
            </form>
            </div>
        </section>

    <footer>
            <?php  include("includes/footer.php"); ?>
    </footer>
    </body>
</html>
