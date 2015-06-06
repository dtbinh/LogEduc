<?php

class User {
    private $_id;
    private $_username;
    private $_pass;
    private $_type;
    private $_level;


    //Contructeur
    public function __construct($id = -1, $user = "unknown", $pass = "unknown", $type= -1, $level = array()) {
        $this->_id = $id;
        $this->_username = $user;
        $this->_pass =  $pass;
        $this->_type = $type;
        $this->_level = $level;
    }

    public function getId() { return $this->_id; }
    public function getPass() { return $this->_pass; }
    public function getUsername() { return $this->_username; }
    public function getType() { return $this->_type; }
    public function getLevel() { return $this->_level; }
    public function getLevelInstru() { return $this->_level['Instru']; }
    public function getLevelPiano() { return $this->_level['Piano']; }
    public function getLevelPortee() { return $this->_level['Portee']; }
    
    public function setId($id) { $this->_id = (int) $id; }
    public function setPass($pass) { $this->_pass = htmlspecialchars($pass); }
    public function setUsername($user) { $this->_username = htmlspecialchars($user); }
    public function setType($type) { $this->_type = (int) $type; }
    public function setLevel($level) { $this->_level = $level; }
}

