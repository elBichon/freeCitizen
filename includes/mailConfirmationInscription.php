//envoi automatique d'un mail
//se connecter au site via le lien fourni
//confirmer son adresse mail
//éviter l'insertion de fausses adresses mails dans la bdd membres

<?php
$message = "Bienvenue à FREE CITIZEN, tu es à un seul clic de ton réveil, pour cela, il te suffit de http://localhost:8888/cassiopee/freeCitizen/freeCitizenConfirmInscription.php confirmer ton inscription";
        $titre = "confirmation d'inscription à FREE CITIZEN";
        mail($email, $titre, $message);
?>

