
//formulaire en cas de code oublie
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>free citizen code oublié</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/verificationEmail.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    </head>

    <body>
    <header>
    </header>

    <h1>FREE CITIZEN</h1>

    <?php include("includes/connect.php"); ?>
    <section id="codeOublie">
        <h3>Donnez votre adresse email pour recevoir votre code</h3></br>

//fournir son adresse mail
<div class="">
<form action="codeOublieSuite.php" method="post">
<div id="emailCodeOublie">
<label for="emailCodeOublie">Login</label>
<input type="text" class="form-control" id="champEmailCodeOublie" placeholder="login" name="login" required>
</div>
<div class="error-message"></div></br>
<div class="button">
<button type="submit" id="envoyerEmailCodeOublie" class="btn btn-default">Envoyer</button>
</div>
</form>
</div>



    </section>

    <footer>
            <?php  include("includes/footer.php"); ?>
    </footer>
    </body>
</html>
