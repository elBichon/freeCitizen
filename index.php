<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>indexFreeCitizen</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <header>
    </header>

    <h1>Free Citizen</h1>
    <h2>Réveille toi en un clic</h2>
        <?php // include("includes/connect.php"); ?>

    <section id="connexion">
        <h3>Connexion</h3></br>
        <div class="col-sm-12 col-xs-12 col-lg-12">
            <form action="connexion.php" method="post">
            <div class="col-lg-4 col-sm-4 col-xs-4">
            <label for="emailInputConnexion">Adresse Mail</label>
            <input type="email" class="form-control" id="emailConnexion" placeholder="Email">
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-4">
                <label for="passwordConnexion">Mot de passe</label>
                <input type="password" class="form-control" id="passwordConnexion" placeholder="Password">
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-4">
                <button type="submit" class="btn btn-default">Se connecter</button>
            </div>
            </form>
        </div>
    </section>

    <section id="inscription">
        <h3>Inscription</h3></br>
        <div class="col-sm-12 col-xs-12 col-lg-12">
            <form action="inscription.php" method="post">
            <div class="col-sm-12 col-xs-12">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" placeholder="login">
            </div>
            <div class="col-sm-12 col-xs-12">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" placeholder="ville">
            </div></br>
            <div class="col-sm-12 col-xs-12">
                <label for="emailInscription">Adresse Email</label>
                <input type="email" class="form-control" id="emailInscription" placeholder="Email">
            </div>
            <div class="col-sm-6 col-xs-6">
                <label for="passwordInscription">Mot de passe</label>
                <input type="password" class="form-control" id="passwordInscription1" placeholder="Password">
            </div></br>
            <div class="col-sm-6 col-xs-6">
                <label for="passwordInscription2">Vérification du mot de passe</label>
                <input type="password" class="form-control" id="passwordInscription2" placeholder="Password">
            </div>
            <div class="col-sm-12 col-xs-12"></br></br>
            <div class="cookies">
            <label>
                <input type="checkbox"> Se souvenir de moi
            </label>
        </div>
        <div class="cgu">
            <label>
                <input type="checkbox"> J'ai bien pris connaissance et accpete les conditions générales d'utilisation
            </label>
        </div></br>
            <div class="col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-default">Inscription</button>
            </div>
            </form>
        </div>
    </section>


    <footer>
    </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>