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
    </head>
    <body>
        <header>
        </header>
        <h1>Confirmation de ton inscription</h1>
            <?php  include("includes/connect.php"); ?>
        <section id="InscriptionSuiteConfirmation">
            <div class="col-sm-12 col-xs-12 col-lg-12">
            <form action="freeCitizenConfirmInscription.php" method="post">
                <button type="submit" class="btn btn-default">Confirmer</button>
            </form>
            </div>
        </section>



    <footer>
            <?php  include("includes/footer.php"); ?>
    </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>