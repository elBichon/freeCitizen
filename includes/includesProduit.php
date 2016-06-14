<?php
$idArticle = $produit->id();
                        $idAuteur = $_SESSION['id'];
                        $tableCommentaire = "freeCitizenCommentairesProduit";
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
                        $idArticle = $produit->id();
                        $idAuteur = $_SESSION['id'];
                        $votes = $infos->votes();
                        $votesEnvoi = $votes + 1;
                        $tablePage = "freeCitizenProduit";
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
                            $idArticle = $produit->id();
                            $idAuteur = $_SESSION['id'];
                        echo "</br>";
                        echo "</br>";
                        //appel des commentaires
                        $request1 = $bdd->query('SELECT * FROM '.$tableCommentaire.' c, '.$tablePage.' i WHERE c.idArticle = i.id ORDER BY datePost DESC LIMIT 0, 10');
                        while ($donneesCommentaires = $request1->fetch(PDO::FETCH_ASSOC)){
                        //affichage des commentaires
                        $commentaire = new Commentaire($donneesCommentaires);
                        echo '<section id="afficherCommentaire">';
                            echo $commentaire->datePost();
                            echo " :";
                            $texte = $commentaire->commentaire();
                            echo $texte;
                            echo '</section>';}
    $request1->closeCursor();
?>