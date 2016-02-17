<?php
<form method="post" action="trait.php">
<label for="ville">Quelle ville recherchez-vous</label><br />
<select name="ville" id="ville">

<?php
    
    $reponse = $bdd->query("SELECT * FROM freeCitizenVilles ORDER BY ville");
    
    while ($donnees = $reponse->fetch())
    {
        ?>
<option value="<?php echo $donnees['ville']; ?>"> <?php echo $donnees['ville']; ?></option>
<?php
    }
    
    ?>
</select>
<div class="bouton"><input type="submit" class="text" value="envoyer"/></div>

</form>

?>
