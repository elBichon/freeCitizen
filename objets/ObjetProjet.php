<?php
    class Projet
    {
        private $_id;
        private $_nom;
        private $_idCompte;
        private $_dateEnvoi;
        private $_equipe;
        private $_descriptif;
        private $_ville;
        private $_statut; //citoyen, écologie, technologie...
        
        public function id()
        {
            return $this->_id;
        }
        public function idCompte()
        {
            return $this->_idCompte;
        }
        public function nom()
        {
            return $this->_nom;
        }
        public function dateEnvoi()
        {
            return $this->_dateEnvoi;
        }
        public function equipe()
        {
            return $this->_equipe;
        }
        public function ville()
        {
            return $this->_ville;
        }
        public function descriptif()
        {
            return $this->_descriptif;
        }
        public function statut()
        {
            return $this->_statut;
        }
    }
    ?>