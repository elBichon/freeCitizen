
//back du formulaire d upload
<?php
    
    //verification que le fichier est la
    if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
    {
        //verification de la taille
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
            //verification des noms et extension
            $infosfichier = pathinfo($_FILES['monfichier']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {
                //si le fichier est accepte insertion autorisee
                move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                echo "L'envoi a bien été effectué !";
            }
        }
    }
    ?>
