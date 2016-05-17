<?php
    class Commentaire
    {
        private $_id,
        $_idArticle,
        $_datePost,
        $_idAuteur,
        $_commentaire;
        
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
        public function datePost()
        {
            return $this->_datePost;
        }
        public function idAuteur()
        {
            return $this->_idAuteur;
        }
        public function commentaire()
        {
            return $this->_commentaire;
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
            $this->_idArticle = $idArticle;
        }
        public function setDatePost($datePost)
        {
            $this->_datePost = $datePost;
        }
        public function setAuteur($idAuteur)
        {
            $this->_idAuteur = $idAuteur;
        }
        public function setCommentaire($commentaire)
        {
            if (is_string($commentaire))
            {
                $this->_comentaire = $comentaire;
            }
        }
    }
?>