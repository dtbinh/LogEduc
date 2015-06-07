<?php session_start();
require_once('../db/database.php');
spl_autoload_register('loadClass');
if(!isset($_SESSION['user']) || $_SESSION['username'] == "-error-") header('Location: accueil.php');
$user = unserialize($_SESSION['user']);

$level = $user->getLevel();
echo '<pre>';var_dump($user);echo '</pre>';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Accueil de la musique par les plantes</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../plugin/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <style type="text/css">
    body {
      padding-top: 15px;
      width: 80%;
      margin: auto;
    }
    </style>
  </head>
 
  <body id="profil">
  <a href="main.php"><button class="btn btn-primary">Retour à l'accueil</button></a>
  <h1>Profil de <?= $_SESSION['username'] ?></h1>

  <h2>Exercices instruments - Niveau <?= $level['Instruments'] ?></h2>

  <h2>Exercices portée</h2>
    <ul>
      <li>Exercice 1 Sol : <?= $level['Portee']['Ex1Sol']; ?></li>
      <li>Exercice 2 Sol : <?=$level['Portee']['Ex2Sol']; ?></li>
      <li>Exercice 1 Fa : <?= $level['Portee']['Ex1Fa']; ?></li>
      <li>Exercice 2 Fa : <?= $level['Portee']['Ex2Fa']; ?></li>
    </ul>

  <h2>Exercices Piano Virtuel</h2>
  <ul>
      <li>Exercice 1 : <?= $level['Piano']['Exo1']; ?></li>
      <li>Exercice 2 : <?= $level['Piano']['Exo2']; ?></li>
      <li>Exercice 3 : <?= $level['Piano']['Exo3']; ?></li>
    </ul>

<script type="text/javascript"  src="../plugin/jquery/jquery.min.js"> </script>
<script type="text/javascript"  src="../js/script.js"> </script>
</body>
</html>
