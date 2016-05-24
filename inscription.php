
//page d inscription
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>inscription</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="js/verificationVille.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <![endif]-->
    </head>
    <body>
        <header>
        </header>
        <h1>Inscription</h1>
            <?php  include("includes/connect.php"); ?>
        <section id="InscriptionCheck">
            
            //verification
            <?php  include("includes/verificationInscription.php"); ?>
        </section>

    <footer>
            <?php  include("includes/footer.php"); ?>
    </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>
