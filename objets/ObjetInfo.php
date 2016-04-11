<?php
    class Info
    {
        private $_id;
        private $_nom;
        private $_idCompte;
        private $_dateEnvoi;
        private $_theme
        private $_taches;
        private $_texte;
        private $_ville; //employeur ou employe
        
        
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
        public function texte()
        {
            return $this->_texte;
        }
        public function ville()
        {
            return $this->_ville;
        }
    }
    ?>