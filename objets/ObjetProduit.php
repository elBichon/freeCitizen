<?php
    class Produit
    {
        private $_id,
        $_titre,
        $_date,//date de publication de l article
        $_dateDisponnibilite,
        $_ville,//ville ou l info a lieu
        $_type,//
        $_statut,//rechercher ou proposer
        $_idAuteur,//jointure avec la table membre et appel a l objet compte
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
        public function dateDisponnibilite()
        {
            return $this->_dateDisponnibilite;
        }
        public function ville()
        {
            return $this->_ville;
        }
        public function type()
        {
            return $this->_type;
        }
        public function statut()
        {
            return $this->_statut;
        }
        public function idAuteur()
        {
            return $this->_idAuteur;
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
        public function setDateDisponnibilité($dateDisponnibilite)
        {
            $this->_dateDisponnibilite = $dateDisponnibilite;
        }
        public function setVille($ville)
        {
            if (is_string($ville))
            {
                $this->_ville = $ville;
            }
        }
        public function setType($type)
        {
            if (is_string($type))
            {
                $this->_type = $type;
            }
        }
        public function setStatut($statut)
        {
            if (is_string($statut))
            {
                $this->_statut = $statut;
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
        public function setDescriptif($descriptif)
        {
            if (is_string($descriptif))
            {
                $this->_descriptif = $descriptif;
            }
        }
    }
?>
