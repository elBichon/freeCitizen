
<form method="post" action="<?php echo $nomPage; ?>">
    <label for="ville">Ou allons-nous ?</label>
        <select name="ville" id="ville">
        <?php
            $reponse = $bdd->query("SELECT DISTINCT ville FROM freeCitizenProduit ORDER BY ville");
            while ($donnees = $reponse->fetch())
            {?>
            <option value="<?php echo $donnees['ville']; ?>"> <?php echo $donnees['ville']; ?></option>
            <?php
            }?>
        </select>

    <label for="type">Que cherchons-nous ?</label>
        <select name="type" id="type">
        <?php
            $reponse = $bdd->query("SELECT DISTINCT type FROM freeCitizenProduit ORDER BY ville");
            while ($donnees = $reponse->fetch())
            {?>
            <option value="<?php echo $donnees['type']; ?>"> <?php echo $donnees['type']; ?></option>
            <?php
            }?>
        </select>

    <label for="statut">Statut ?</label>
        <select name="statut" id="statut">
            <option value="proposition">proposition</option>
            <option value="recherche">recherche</option>
        </select>

    <div class="bouton"><input type="submit" class="text" value="aller"/></div>
</form>
