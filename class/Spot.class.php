<?php

class Spot {
	private $_id;
	private $_nom;
	private $_lat;
	private $_lng;
	private $_adresse;
   private $_desc;
   private $_type;
	private $_key;
   private $_checked;
   private $_user_add;
   private $_aka_user_add;


    //Contructeur
    public function __construct($id = -1, $nom = "Nouveau spot", $lat = 0, $lng = 0, $adresse = "Adresse inconnue", $desc = "",$type = "", $key = "NEWSK8", $checked = false, $user_add = "unknown", $_aka_user_add = "unknown") {
		$this->_id = $id;
		$this->_nom = $nom;
		$this->_lat = (float) $lat;
		$this->_lng = (float) $lng;
		$this->_adresse = $adresse;
		$this->_desc = $desc;
      $this->_key = strtoupper($key);
      $this->_type = strtoupper($type);
      $this->_checked = $checked;
      $this->_user_add = $user_add;
	}

   public function getId() {
      return $this->_id;
   }
   public function getNom() {
   	return $this->_nom;
   }
   public function getAdresse() {
   	return $this->_adresse;
   }
   public function getLat() {
   	return $this->_lat;
   }
   public function getLng() {
   	return $this->_lng;
   }
   public function getDesc() {
   	return $this->_desc;
   }
   public function getKey() {
      return $this->_key;
   }
   public function getType() {
      return $this->_type;
   }
   public function getChecked() {
      return $this->_checked;
   }
   public function getUserAdd() {
      return $this->_user_add;
   }
   public function getAkaUserAdd() {
      return $this->_aka_user_add;
   }


   public function setId($id) {
   	$this->_id = (int) $id;
   }
   public function setNom($nom) {
   	$this->_nom = htmlspecialchars_decode(ucfirst($nom));
   }
   public function setAdresse($adresse) {
   	$this->_adresse = htmlspecialchars_decode($adresse);
   }
   public function setLat($lat) {
   	$this->_lat = (float) $lat;
   }
   public function setLng($lng) {
   	$this->_lng = (float) $lng;
   }
   public function setDesc($desc) {
   	$this->_desc = htmlspecialchars_decode($desc);
   }
   public function setKey($key) {
      $this->_key = strtoupper($key);
   }
   public function setType($type) {
      $this->_type = strtoupper($type);
   }
   public function setChecked($check) {
      $this->_checked = $check;
   }
   public function setUserAdd($user) {
      $this->_user_add = (int) $user;
   }
   public function setAkaUserAdd($user) {
      $this->_aka_user_add = htmlspecialchars_decode($user);
   }


}

