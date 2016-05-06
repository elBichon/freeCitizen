//objet représentant les comptes

<?php
    class Compte
    {
        private $_id,
        $_login,
        $_email;
        
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
        public function login()
        {
            return $this->_login;
        }
        public function email()
        {
            return $this->_email;
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
        public function setLogin($login)
        {
            if (is_string($login))
            {
                $this->_login = $login;
            }
        }
        public function setEmail($Email)
        {
            if (is_string($email))
            {
                $this->_email = $email;
            }
        }
}
    ?>
