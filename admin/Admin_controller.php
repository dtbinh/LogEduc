<?php  require_once('../db/database.php');
spl_autoload_register('loadClass');

if(isset($_POST['addSpot'])) {
	
	$spot = new Spot();
    $spot->setNom($_POST['nom_spot']);
    $spot->setLat($_POST['lat_spot']);
    $spot->setLng($_POST['lng_spot']);
    $spot->setDesc($_POST['desc_spot']);
    $spot->setKey($_POST['key_spot']);
    $spot->setAdresse($_POST['adresse_spot']);
    $spot->setUserAdd(1);
    $spot->setChecked(true);

	addSpot($spot);
    header("Location: .#showSpots");

} else if(isset($_POST['manageSpot'])) {
	
	if(isset($_POST['deleteSpot'])) {
		deleteSpot($_POST['deleteSpot']);
		header('Location: .#showSpotsUnchecked');
	} else if(isset($_POST['editSpot'])) {
	    //var_dump($_POST);
		$spot = new Spot();
	    $spot->setId($_POST['id_spot']);
	    $spot->setNom($_POST['nom_spot']);
	    $spot->setLat($_POST['lat_spot']);
	    $spot->setLng($_POST['lng_spot']);
	    $spot->setDesc($_POST['desc_spot']);
	    $spot->setKey($_POST['key_spot']);
	    $spot->setAdresse($_POST['adresse_spot']);
	    $spot->setUserAdd($_POST['user_add']);
	    $spot->setChecked(true);
	    //var_dump($spot);

		 editSpot($_POST['editSpot'], $spot);
	    header("Location: .#showSpotsUnchecked");
	}


} else if(isset($_POST['addUser'])) {

	$user = new User();
	$tok = strtok($_POST['mail_user'], "@");
	$user->setAka($tok);
	$user->setMail($_POST['mail_user']);
	$user->setPass($_POST['pass_user']);
	addUser($user);
	header('Location: .#showUsers');

} else if(isset($_POST['manageUser'])) {

	$user = new User();
	$user->setId($_POST['id']);
	$user->setAka($_POST['aka']);
	$user->setMail($_POST['mail']);
	$user->setPass($_POST['pass']);
	$user->setPix($_POST['pix']);
    $user->setDroits($_POST['droits']);
    $user->setDisc($_POST['disc']);
	editUser($_POST['manageUser'], $user);
	header('Location: .#showUsers');

} else if(isset($_POST['deleteUser'])) {

	deleteUser($_POST['deleteUser']);
	header('Location: .#showUsers');

} else if(isset($_POST['deleteSpot'])) {

	deleteSpot($_POST['deleteSpot']);
	header('Location: .#showSpots');

}