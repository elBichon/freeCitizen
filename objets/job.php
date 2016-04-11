<?php
    class Job
    {
        private $_id;
        private $_nom;
        private $_idCompte;
        private $_dateEnvoi;
        private $_dateDisponnibilite;
        private $_competence;
        private $_taches;
        private $_descriptif;
        private $_ville;
        private $_statut; //employeur ou employe
        
        
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
        public function dateDisponnibilite()
        {
            return $this->_dateDisponnibilite;
        }
        public function competence()
        {
            return $this->_competence;
        }
        public function taches()
        {
            return $this->_taches;
        }
        public function descriptif()
        {
            return $this->_descriptif;
        }
        public function ville()
        {
            return $this->_ville;
        }
        public function statut()
        {
            return $this->_statut;
        }
    }
    ?>
