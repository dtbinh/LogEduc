<?php

class User {
	private $_id;
  private $_username;
	private $_pass;


    //Contructeur
   public function __construct($id = -1, $user = "unknown", $pass = "unknown") {
    $this->_id = $id;
    $this->_username = $user;
		$this->_pass =  $pass;
	 }

   public function getId() {
   		 return $this->_id;
   }

   public function getPass() {
   		 return $this->_pass;
   }

   public function getUsername() {
       return $this->_username;
   }


   public function setId($id) {
   		 $this->_id = (int) $id;
   }

   public function setPass($pass) {
   		 $this->_pass = htmlspecialchars($pass);
   }

   public function setUsername($user) {
          $this->_username = htmlspecialchars($user);
   }
}

