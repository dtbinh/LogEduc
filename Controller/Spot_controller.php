<?php session_start();

require_once('../db/database.php'); 
spl_autoload_register('loadClass');


if(isset($_GET['key'])) {
 	$spot = getSpotByKey($_GET['key']);
 	$myLatLng = $spot->getLat().','. $spot->getLng();
}

if(isset($_POST['user_add_spot'])) {
	
	$spotUser = new Spot();


    $spotUser->setNom($_POST['nom_spot']);
    $spotUser->setLat($_POST['lat_spot']);
    $spotUser->setLng($_POST['lng_spot']);
    $spotUser->setDesc($_POST['desc_spot']);
    $spotUser->setType($_POST['type_spot']);
    $spotUser->setKey($_POST['key_spot']);
    $spotUser->setAdresse($_POST['adresse_spot']);
    $spotUser->setUserAdd($_POST['user_add_spot']);
    $spotUser->setChecked(false);

	 addSpotUser($spotUser);
	 header('Location: User_controller.php');
}

include('../part/spot.php');