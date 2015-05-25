<?php session_start();
require_once('../db/database.php');
spl_autoload_register('loadClass');
	
unset($_SESSION['loginError']);
unset($_SESSION['creationSuccess']);

		//CONNEXION
	if(isset($_POST['user_login']) && isset($_POST['user_pass'])) {

		$resConnect = checkUserConnexion($_POST['user_login'], $_POST['user_pass']);

		if($resConnect == 1) {

			$user = getUserByName($_POST['user_login']);

			$_SESSION['user'] = serialize($user);
			$_SESSION['username'] = $user->getUsername();
			header('Location: ../part/main.php');
		
			
		} else {
			if($resConnect == -2) {
				$_SESSION['loginError'] = "Nom d'utilisateur inconnu";
			} else if($resConnect == -1) {
				$_SESSION['loginError'] = "Mauvais mot de passe";
			}
			$_SESSION['username'] = '-errorConnexion-';
			header('Location: ../part/accueil.php');
		}

		//CREATION COMPTE
	} else if(isset($_POST['creation'])) {
		if(isset($_POST['user_login_c']) && isset($_POST['user_pass_c']) && $_POST['user_login_c']!= "" && $_POST['user_pass_c'] != "" ) {
			$user = new User();
			$user->setUsername($_POST['user_login_c']);
			$user->setPass($_POST['user_pass_c']);
			addUser($user);

			$_SESSION['creationSuccess'] = "Vous avez cr&eacute;e un nouveau compte: nom d'utilisateur : ".$user->getUsername().", mot de passe : ".$user->getPass();
			
			header('Location: ../part/accueil.php');
			//echo '<pre>';
			//var_dump($user);
			//echo '</pre>';
		} else {
			$_SESSION['loginError'] = "Merci de remplir tous les champs";
			$_SESSION['username'] = '-errorCreation-';
			header('Location: ../part/accueil.php');
		}
	
	} else if (isset($_POST['deconnexion'])) {
		echo 'Deconnexion';
		unset($_SESSION['username']);
		unset($_SESSION['user']);
		header('Location: ../part/accueil.php');
	}