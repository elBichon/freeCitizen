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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/verificationLogin.js"></script>
        <script src="js/verificationInscription.js"></script>
    </head>

    <body>
    <header>
    </header>

    <h1>FREE CITIZEN</h1>

    <?php include("includes/connect.php"); ?>
    <section id="connexion">
        <h3>Connexion</h3></br>
        <div class="">
            <form action="connexion.php" method="post">
            <div id="loginConnexion">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="champLogin" placeholder="login" name="login" required>
            </div>
            <div class="error-message"></div></br>
            <div id="passwordConnexion">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" placeholder="password" id="champPassword" name="password" required>
            </div>
            <div class="error-message"></div></br>
            <div class="button">
                <button type="submit" id="envoyerConnexion" class="btn btn-default">Se connecter</button>
            </div>
            </form>
        </div>
    </section>

    <section id="inscription">
        <h3>Inscription</h3></br>
       <div class="">
            <form method="post" action="inscription.php">
            <div class="" id="loginInscription">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" placeholder="login" name="login" required>
            </div>
            <div class="error-message"></div></br>
            <div class="" id="emailInscription">
                <label for="email">Adresse Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
            <div class="error-message"></div></br>
            <div class="" id="passwordInscription">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
            <div class="error-message"></div></br></br>
        <div class="" id="passwordInscriptionCheck">
                <label for="password2">Vérification du mot de passe</label>
                <input type="password" class="form-control" id="password2" placeholder="Password" name="passwordVerification" required>
        </div>
        <div class="error-message"></div></br>
        <div id="cgu">
            <label>
                <input type="checkbox" name="cgu" value="ok" required> J'ai bien pris connaissance et accpete les <a href='cgu.php'>conditions générales d'utilisation</a>
            </label>
        </div></br>
            <div class="">
                <button type="submit" id="envoyerInscription" class="btn btn-default">Inscription</button>
            </div>
            </form>
        </div>
    </section>

    <footer>
            <?php  include("includes/footer.php"); ?>
    </footer>

    </body>
</html>
