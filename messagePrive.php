<?php
    session_start();
  
    $balises = true;
    $action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';
    
    ?>

<?php
    $action = (isset($_GET['action']))?htmlspecialchars($_GET['action']):'';
    switch($action)
    {
        case "consulter": // lire un mp
            //Ici on a besoin de la valeur de l'id du mp que l'on veut lire
                echo'<p><i>Vous êtes ici</i> : <a href="index.php">Index</a> --> <a href="messagesprives.php">Messagerie</a> --> Consulter un message</p>';
                $id_mess = (int) $_GET['id']; //On récupère la valeur de l'id
                echo '<h2>Consulter </h2><br /><br />';

    //La requête nous permet d'obtenir les infos sur ce message :
                    $query = $db->prepare('SELECT  *
                                          FROM mp
                                          LEFT JOIN freeCitizenMembres ON id = mp_expediteur
                                          WHERE mp_id = :id');
                                          $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
                                          $query->execute();
                                          $data=$query->fetch();

    // seul le destinataire peut lire le message
                if ($id != $data['mp_receveur']) erreur(ERR_WRONG_USER);
    // réponse
                    echo'<p><a href="./messagesprives.php?action=repondre&amp;dest='.$data['mp_expediteur'].'">
                    echo' <img src="images/repondre.png" alt="Répondre"
                                         echo'title="Répondre à ce message" /></a></p>';
                                         echo'<table>';
                                           echo'<tr>';
                                           echo'<th class="vt_auteur"><strong>Auteur</strong></th>';
                                           echo'<th class="vt_mess"><strong>Message</strong></th>';
                                           echo'</tr>';
                                           echo'<tr>';
                                           echo'<td>';
                                                echo'<strong>';
                                           echo'<a href="./voirprofil.php?m='.$data['membre_id'].'&amp;action=consulter">';
                                          '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'echo'</a></strong></td>';
                                           echo'<td>Posté à '.date('H\hi \l\e d M Y',$data['mp_time']).'</td>';

 echo'</tr>';
 echo'<tr>';
 echo'<td>';

    //Ici des infos sur le membre qui a envoyé le mp
    
     echo'<br />Membre inscrit le '.date('d/m/Y',$data['membre_inscrit']).'
     echo'<br />Messages : '.$data['membre_post'].'
     echo'<br />Localisation : '.stripslashes(htmlspecialchars($data['membre_localisation'])).'</p>
     echo'</td><td>';
    
    echo code(nl2br(stripslashes(htmlspecialchars($data['mp_text'])))).'
    <hr />'.code(nl2br(stripslashes(htmlspecialchars($data['membre_signature'])))).'
    </td></tr></table>';
     if ($data['mp_lu'] == 0) //Si le message n'a jamais été lu
    {
        $query->CloseCursor();
        $query=$db->prepare('UPDATE forum_mp 
        SET mp_lu = :lu
        WHERE mp_id= :id');
        $query->bindValue(':id',$id_mess, PDO::PARAM_INT);
        $query->bindValue(':lu','1', PDO::PARAM_STR);
        $query->execute();
        $query->CloseCursor();
    }
break;
            
        case "nouveau": // poster un nouveau mp
                            echo'<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> <a href="./messagesprives.php">Messagerie privée</a> --> Ecrire un message</p>';
                            echo '<h2>Nouveau message privé</h2><br /><br />';
                                echo '<form method="post" action="messagePrive.php" name="formulaire">';
                                    echo '<p>';
                                    echo '<label for="to">Envoyer à : </label>';
                                        echo '<input type="text" size="30" id="to" name="to" />';
                                    echo '<br />';
                                    echo '<label for="titre">Titre : </label>';
                                        echo '<input type="text" size="80" id="titre" name="titre" />';
                                echo '<br /><br />';
                                        echo '<input type="button" id="gras" name="gras" value="Gras" onClick="javascript:bbcode('[g]', '[/g]');return(false)" />';
                                        echo '<input type="button" id="italic" name="italic" value="Italic" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />';
                                        echo '<input type="button" id="souligné" name="souligné" value="Souligné" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />';
                                        echo '<input type="button" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />';
                                echo '<br /><br />';
                                        echo '<textarea cols="80" rows="8" id="message" name="message"></textarea>';
                                echo '<br />';
                                        echo '<input type="submit" name="submit" value="Envoyer" />';
                                        echo '<input type="reset" name="Effacer" value="Effacer" /></p>';
                            echo '</form>';
case "nouveaump": //On envoie un nouveau mp

    //On récupère le titre et le message
    $message = $_POST['message'];
    $titre = $_POST['titre'];
    $temps = time();
    $dest = $_POST['to'];

    //On récupère la valeur de l'id du destinataire
    //Il faut déja vérifier le nom

    $query=$db->prepare('SELECT membre_id FROM forum_membres
    WHERE LOWER(membre_pseudo) = :dest');
    $query->bindValue(':dest',strotolower($dest),PDO::PARAM_STR);
    $query->execute();
    if($data = $query->fetch())
    {
        $query=$db->prepare('INSERT INTO forum_mp
        (mp_expediteur, mp_receveur, mp_titre, mp_text, mp_time, mp_lu)
        VALUES(:id, :dest, :titre, :txt, :tps, :lu)'); 
        $query->bindValue(':id',$id,PDO::PARAM_INT);   
        $query->bindValue(':dest',(int) $data['membre_id'],PDO::PARAM_INT);   
        $query->bindValue(':titre',$titre,PDO::PARAM_STR);   
        $query->bindValue(':txt',$message,PDO::PARAM_STR);   
        $query->bindValue(':tps',$temps,PDO::PARAM_INT);   
        $query->bindValue(':lu','0',PDO::PARAM_STR);   
        $query->execute();
        $query->CloseCursor(); 

       echo'<p>Votre message a bien été envoyé!
       <br /><br />Cliquez <a href="./index.php">ici</a> pour revenir à l index du
       forum<br />
       <br />Cliquez <a href="./messagesprives.php">ici</a> pour retourner à
       la messagerie</p>';
    }
    //Sinon l'utilisateur n'existe pas !
    else
    {
        echo'<p>Désolé ce membre n existe pas, veuillez vérifier et
        réessayez à nouveau.</p>';
    }
break;

        case "repondre": //répondre à un mp reçu
            //Ici on a besoin de la valeur de l'id du membre qui nous a posté un mp
            $message = $_POST['message'];
            $titre = $_POST['titre'];
            $temps = time();
            $dest = (int) $_GET['dest'];

    $query=$db->prepare('INSERT INTO mp
    (mp_expediteur, mp_receveur, mp_titre, mp_text, mp_time, mp_lu)
    VALUES(:id, :dest, :titre, :txt, :tps, '0')'); 
    $query->bindValue(':id',$id,PDO::PARAM_INT);   
    $query->bindValue(':dest',$dest,PDO::PARAM_INT);   
    $query->bindValue(':titre',$titre,PDO::PARAM_STR);   
    $query->bindValue(':txt',$message,PDO::PARAM_STR);   
    $query->bindValue(':tps',$temps,PDO::PARAM_INT);   
    $query->execute();
    $query->CloseCursor(); 

    echo'<p>Votre message a bien été envoyé!<br />
    echo '<br />Cliquez <a href="./index.php">ici</a> pour revenir à l index du forum<br />';
    echo '<br />Cliquez <a href="./messagePrive.php">ici</a> pour retourner à la messagerie</p>';

break;
            
            
        default;
    }
?>
