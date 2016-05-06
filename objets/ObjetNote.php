//objet symbolisant les commentaires

<?php
    class Commentaire
    {
        private $_id,
        $_idArticle,
        //date de publication de l article
        $_idCommentateur,//jointure avec la table membre et appel a l objet compte
        $_note;
        
        
        //construction
        public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }
        
        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value)
            {
                $method = 'set'.ucfirst($key);
                
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }
        
        
        // GETTERS //
        
        
        public function id()
        {
            return $this->_id;
        }
        public function idArticle()
        {
            return $this->_idArticle;
        }
        public function date()
        {
            return $this->_date;
        }
        public function idCommentateur()
        {
            return $this->_idCommentateur;
        }
        public function note()
        {
            return $this->_note;
        }
        
        //SETTERS
        
        public function setId($id)
        {
            $id = (int) $id;
            if ($id > 0)
            {
                $this->_id = $id;
            }
        }
        public function setIdArticle($idArticle)
        {
            $idArticle = (int) $idArticle;
            if ($idArticle > 0)
            {
                $this->_idArticle = $idArticle;
            }
            
            public function setDate($date)
            {
                $this->_date = $date;
            }
            public function setCommentateur($idCommentateur)
            {
                $idCommentateur = (int) $idCommentateur;
                if ($idCommentateur > 0)
                {
                    $this->_idCommentateur = $idCommentateur;
                }
            }
            public function setNote($note)
            {
                $note = (int) $note;
                if ($note >= 0)
                {
                    $this->_note = $note;
                }
            }
            //test objet
            public function retour()
            {
                echo "test retour Projet";
            }
        }
        ?>
