<?php
                        $idArticle = $infos->id();
                        $idAuteur = $_SESSION['id'];
                            echo '<section id = "envoiCommentaires">';
                                echo '<form action = commentaire.php method="post">';
                                    echo '<label for = "commentaire">Commentaire: </label>  <input type="text" name="commentaire" id="commentaire" required/></br>';
                                    echo '<input type = "hidden" name = "idAuteur" value = "'.$idAuteur.'" >';
                                    echo '<input type = "hidden" name = "idArticle" value = "'.$idArticle.'" >';
                                    echo '<input type = "hidden" name = "tableCommentaire" value = "'.$tableCommentaire.'" >';
                                    echo '<input type="submit" value="Envoyer" />';
                                echo '</form>';
                            echo '</section>';
                        echo '</section>';
                        echo '</br>';
                        //systeme pour voter pour un article
                        $votes = $infos->votes();
                        $votesEnvoi = $votes + 1;
                        echo '<section id = "envoiVotes">';
                                echo '<form action = commentaire.php method="post">';
                                        echo '<input type = "hidden" name = "idArticle" value = "'.$idArticle.'" >';
                                        echo '<input type = "hidden" name = "tablePage" value = "'.$tablePage.'" >';
                                        echo '<input type = "hidden" name = "votesEnvoi" value = "'.$votesEnvoi.'" >';
                                    echo '<input type="submit" value="voter" />';
                                echo '</form>';
                        echo '</section>';
                        //système de commentaires
                        require 'objets/ObjetCommentaire.php';
                        echo "</br>";
                        echo "</br>";
                           echo 'vos réactions';
                        //formulaire d ajout des commentaires
    
                        echo "</br>";
                        echo "</br>";
                        //appel des commentaires
                        $request1 = $bdd->query('SELECT datePost, commentaire FROM '.$tableCommentaire.' c, '.$tablePage.' i WHERE i.id = c.idArticle ORDER BY datePost DESC LIMIT 0, 10');
                        while ($donneesCommentaires = $request1->fetch(PDO::FETCH_ASSOC)){
                        //affichage des commentaires
                        $com = new Commentaire($donneesCommentaires);
                        echo '<section id="afficherCommentaire">';
                            echo $com->datePost();
                            echo " :";
                            $texte = $com->commentaire();
                            echo $texte;
                            echo '</section>';
                        }
                        $request1->closeCursor();
?>
