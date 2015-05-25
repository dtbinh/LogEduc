<?php session_start();
require_once('../db/database.php');
spl_autoload_register('loadClass');
if(!isset($_SESSION['user']) || $_SESSION['username'] == "-error-") header('Location: accueil.php');
$user = unserialize($_SESSION['user']);
$level = getLevelByUser($user);
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
  <h1>Profil de <?= $_SESSION['username'] ?></h1>

  <h2>Exercices instruments - Niveau <?= $level[1] ?></h2>

  <h2>Exercices portée - Niveau <?= $level[2] ?></h2>

  <h2>Exercices Piano Virtuel - Niveau <?= $level[3] ?></h2>

<script type="text/javascript"  src="../plugin/jquery/jquery.min.js"> </script>
<script type="text/javascript"  src="../js/script.js"> </script>
</body>
</html>
