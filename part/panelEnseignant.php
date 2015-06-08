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
    <title>Panel enseignant</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../plugin/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <style>
    body {
    	padding-top: 15px;
    	width: 75%;
    	margin: auto;
    	}
    	header table .btn {
    		margin-left: 15px;
    	}
    	</style>
  </head>
 
  <body id="profil">
  <header>
	<table>
	<tr>
	<td>
	<form method="post" action="../Controller/Login_controller.php">
		<input type="hidden" name="deconnexion" />
		<input type="submit"class="btn btn-danger" value="Quitter" />
		</form>
	</td>
	<td>
			<a href="../Exercices/Piano/indexEnseignant.php"><button class="btn btn-danger">Créer un exercice de Piano</button></a>
	</td>
	</tr>
	</table>
	</header>


  	<h1>Panel de l'enseignant <?= $_SESSION['username'] ?></h1>

	<h2> Les étudiants</h2>
	<?php 
	foreach($students as $student) {
		$level = getLevelByUser($student);
		echo '<h3>'.$student->getUsername().'</h3>'; ?>
		
  <h4>Exercices instruments - Niveau <?= $level['Instruments'] ?></h4>

  <h4>Exercices portée</h4>
    <ul>
      <li>Exercice 1 Sol : <?= $level['Portee']['Ex1Sol']; ?></li>
      <li>Exercice 2 Sol : <?=$level['Portee']['Ex2Sol']; ?></li>
      <li>Exercice 1 Fa : <?= $level['Portee']['Ex1Fa']; ?></li>
      <li>Exercice 2 Fa : <?= $level['Portee']['Ex2Fa']; ?></li>
    </ul>

  <h4>Exercices Piano Virtuel</h4>
  <ul>
      <li>Exercice 1 : <?= $level['Piano']['Exo1']; ?></li>
      <li>Exercice 2 : <?= $level['Piano']['Exo2']; ?></li>
      <li>Exercice 3 : <?= $level['Piano']['Exo3']; ?></li>
    </ul>
	<br/>
	<br/>
	<?php } ?>
	
	<br/>
	<br/>
	
<script type="text/javascript"  src="../plugin/jquery/jquery.min.js"> </script>
<script type="text/javascript"  src="../js/script.js"> </script>
</body>
</html>
