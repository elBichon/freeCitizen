//objet symbolisant les events

<?php
    class Event
    {
        private $_id,
        $_titre,
        $_date,//date de publication de l article
        $_ville,//ville ou l info a lieu
        $_theme,//theme de l article, ecologie, politique, finance...
        $_idAuteur,//jointure avec la table membre et appel a l objet compte
        $_participant,
        $_votes,
        $_descriptif;
        
        
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
        public function titre()
        {
            return $this->_titre;
        }
        public function date()
        {
            return $this->_date;
        }
        public function ville()
        {
            return $this->_ville;
        }
        public function theme()
        {
            return $this->_theme;
        }
        public function idAuteur()
        {
            return $this->_idAuteur;
        }
        public function participant()
        {
            return $this->_participant;
        }
        public function votes()
        {
            return $this->_votes;
        }
        public function descriptif()
        {
            return $this->_descriptif;
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
        public function setTitre($titre)
        {
            if (is_string($titre))
            {
                $this->_titre = $titre;
            }
        }
        public function setDate($date)
        {
            $this->_date = $date;
        }
        public function setVille($ville)
        {
            if (is_string($ville))
            {
                $this->_ville = $ville;
            }
        }
        public function setTheme($theme)
        {
            if (is_string($theme))
            {
                $this->_theme = $theme;
            }
        }
        public function setIdAuteur($idAuteur)
        {
            $idAuteur = (int) $idAuteur;
            if ($idAuteur > 0)
            {
                $this->_idAuteur = $idAuteur;
            }
        }
        public function setParticipant($participant)
        {
            $participant = (int) $participant;
            if ($participant > 0)
            {
                $this->_participant = $participant;
            }
        }
        public function setVotest($votes)
        {
                $this->_votes = $votes;
        }
        public function setDescriptif($descriptif)
        {
            if (is_string($descriptif))
            {
                $this->_descriptif = $descriptif;
            }
        }
    }
?>
