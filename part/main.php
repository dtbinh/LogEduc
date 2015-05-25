<?php session_start();
require_once('../db/database.php');
spl_autoload_register('loadClass');
//if(!isset($_SESSION['user']) || $_SESSION['username'] != "-error-") header('Location: accueil.php');
$news = getNews();
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
 
  <body id="main">

	<header>
  <nav>
    <table>
        <tr>
          <td><a href="profil.php"><button class="btn btn-primary">Profil</button></a></td>
          <td>
          <form method="post" action="../Controller/Login_controller.php">
            <input type="hidden" name="deconnexion" />
            <input type="submit"class="btn btn-danger" value="Quitter" />
          </form>
          </td>
        </tr>
    </table>
  </nav>
    <h2>Bonjour <?= $_SESSION['username']; ?></h2>
	</header>

<section id="newsDuJour">
  <h3>News du jour</h3>
    <p><?php echo $news[rand(1, count($news))]; ?></p>
</section>

<section id="panelExercices">
  <table>
    <tr>
      <td><button class="btn btn-primary">Instruments</button></td>
      <td><a href="../Exercices/Portee/webapp/portee.html"><button class="btn btn-success">Portée</button></a></td>
    </tr>
    <tr>
      <td><a href="../Exercices/Piano"><button class="btn btn-danger">Piano virtuel</button></a></td>
      <td><button class="btn btn-warning disabled">En construction...</button></td>
    </tr>
  </table>
</section>

<script type="text/javascript"  src="../plugin/jquery/jquery.min.js"> </script>
<script type="text/javascript"  src="../js/script.js"> </script>

</body>
</html>
