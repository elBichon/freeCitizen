<?php
    class Compte
    {
        private $_id;
        private $_login;
        private $_ville;
        private $_pass;
        private $_cookies;
        
        //constucteur
        public function __construct($id,$login,$ville,$pass,$cookies){
            echo "voici le constructeur";
            $this->setId($id);
            $this->setLogin($login);
            $this->setPass($pass);
            $this->setCookies($cookies);
            
        }
        
        //getters
        public function getId(){
            return $this->_id;
        }
        public function getVille(){
            return $this->_ville;
        }
        public function getLogin(){
            return $this->_login;
        }
        public function getMail(){
            return $this->_Mail;
        }
        
        //setters
        public function setId($id){
            $this->_id=$id;
        }
        public function setLogin($login){
            $this->_login=$login;
        }
        public function setPass($pass){
            $this->_pass=$pass;
        }
        public function setCookies($cookies){
            return $this->_cookies=$cookies;
        }
            }
    ?>
