

<form method="post" action="<?php echo $nomPage; ?>">
    <label for="ville">Ou allons-nous ?</label>


    <select name="ville" id="ville">
    <?php
        $reponse = $bdd->query("SELECT DISTINCT ville FROM freeCitizenProjet ORDER BY ville");
        while ($donnees = $reponse->fetch())
        {
            ?>
            <option value="<?php echo $donnees['ville']; ?>"> <?php echo $donnees['ville']; ?></option>
        <?php
            }
            ?>
    </select>
<label for="theme">Que cherchons-nous ?</label>
    <select name="theme" id="theme">
    <?php
        $reponse = $bdd->query("SELECT DISTINCT theme FROM freeCitizenProjet ORDER BY theme");
        while ($donnees = $reponse->fetch())
        {
            ?>
            <option value="<?php echo $donnees['theme']; ?>"> <?php echo $donnees['theme']; ?></option>
        <?php
            }
            ?>
    </select>


<div class="bouton"><input type="submit" class="text" value="aller"/></div>
</form>
