//formulaire pour la recherche des membres
//recherche front par le login


<div class="pluginRecherche">
    <form action="membresSuite.php" method="post">
        <div id="membresRecherche">
            <label for="login">rechercher un membre</label>
            <input type="text" class="form-control" id="champLogin" placeholder="login" name="login" required>
        </div>
        <div class="button">
            <button type="submit" id="envoyerRecherche" class="btn btn-default">aller</button>
        </div>
    </form>
</div>
