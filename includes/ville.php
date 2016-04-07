<form method="post" action="<?php echo $nomPage; ?>">

<label for="ville">Ou allons-nous ?</label></br>
<select name="ville" id="ville">

<?php
    
    $reponse = $bdd->query("SELECT DISTINCT ville FROM freeCitizenVilles ORDER BY ville");
    
    while ($donnees = $reponse->fetch())
    {
        ?>
<option value="<?php echo $donnees['ville']; ?>"> <?php echo $donnees['ville']; ?></option>
<?php
    }
    
    ?>
</select>
<div class="bouton"><input type="submit" class="text" value="membres"/></div>
</form>


