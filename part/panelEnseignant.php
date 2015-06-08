<?php session_start();
require_once('../db/database.php');
spl_autoload_register('loadClass');
if(!isset($_SESSION['user']) || $_SESSION['username'] == "-error-") header('Location: accueil.php');
$user = unserialize($_SESSION['user']);
$students = getStudents();
$levels = array();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Accueil de la musique par les plantes</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../plugin/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
  </head>
 
  <body id="profil">

	<form method="post" action="../Controller/Login_controller.php">
	<input type="hidden" name="deconnexion" />
	<input type="submit"class="btn btn-danger" value="Quitter" />
	</form>
  	<h1>Panel de l'enseignant <?= $_SESSION['username'] ?></h1>

	<h2> Les étudiants</h2>
	<?php 
	foreach($students as $student) {
		$level = getLevelByUser($student);
		echo '<h3>'.$student->getUsername().'</h3>';
		foreach($level as $exo => $lvl) {
			echo 'Exo '.$exo.' : Level : '.$lvl.'<br>';
		}
	}
	?> 
	
	<br/>
	<br/>
	<a href="../Exercices/Piano/indexEnseignant.php"><button class="btn btn-danger">Créer un exercice de Piano</button></a>
<script type="text/javascript"  src="../plugin/jquery/jquery.min.js"> </script>
<script type="text/javascript"  src="../js/script.js"> </script>
</body>
</html>
