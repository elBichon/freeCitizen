//formulaire de recherche de job
//recherche par ville 
//recherche par theme

<form method="post" action="<?php echo $nomPage; ?>">
    <label for="ville">Ou allons-nous ?</label></br>


    <select name="ville" id="ville">
    <?php
        $reponse = $bdd->query("SELECT DISTINCT ville FROM freeCitizenJob ORDER BY ville");
        while ($donnees = $reponse->fetch())
        {
            ?>
            <option value="<?php echo $donnees['ville']; ?>"> <?php echo $donnees['ville']; ?></option>
        <?php
            }
            ?>
    </select>
<label for="theme">Que cherchons-nous ?</label></br>
    <select name="theme" id="theme">
    <?php
        $reponse = $bdd->query("SELECT DISTINCT theme FROM freeCitizenJob ORDER BY theme");
        while ($donnees = $reponse->fetch())
        {
            ?>
            <option value="<?php echo $donnees['theme']; ?>"> <?php echo $donnees['theme']; ?></option>
        <?php
            }
            ?>
    </select>
<label for="statut">Statut</label></br>
    <select name="statut" id="statut">
        <option value="proposition">proposition</option>
        <option value="recherche">recherche</option>
    </select>

<div class="bouton"><input type="submit" class="text" value="aller"/></div>
</form>
