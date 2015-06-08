<?php session_start();
require_once('../../db/database.php');
spl_autoload_register('loadClass');
//if(!isset($_SESSION['user']) || $_SESSION['username'] != "-error-") header('Location: accueil.php');
$user = unserialize($_SESSION['user']);
$level = getLevelByUser($user);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Accueil de la musique par les plantes</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="../../plugin/bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="../../css/style.css" type="text/css" />
</head>

<body id="main">

<header>
<nav>
        <table>
            <tr>
                <td>
                   <a href="/LogEduc/"><button class="btn btn-success">Menu</button></a>
                        </td>
                <td>
                    <form method="post" action="../../Controller/Login_controller.php">
                    <input type="hidden" name="deconnexion" />
                    <input type="submit"class="btn btn-danger" value="Quitter" />
                    </form>
                </td>
            </tr>
        </table>
    </nav>
    <h2>les exercices du piano virtuel</h2>
</header>

<section id="panelExercices">
    <table><tr>
        <td class="tdPanelLvl1">
			<a href="indexEx1.php">
				<button class="btnInstru buttonPanel btn btn-success">Exercice 1<br>Niveau <?= $level['Piano']['Exo1']; ?></button>
			</a>
        </td>
        <td class="tdPanelLvl1">
			<a href="indexEx2.php">
				<button class="btnPortee buttonPanel btn btn-primary">Exercice 2<br>Niveau <?= $level['Piano']['Exo2']; ?></button>
			</a>
        </td>
        </tr><tr>
        <td colspan="2" class="tdPanelLvl1">
			<a href="indexEx3.php">
				<button class="btnPiano buttonPanel btn btn-danger">Exercice 3<br>Niveau <?= $level['Piano']['Exo3']; ?></button>
			</a>
        </td>
    </tr></table>

</section>

<script type="text/javascript"  src="../../plugin/jquery/jquery.min.js"> </script>
<script type="text/javascript"  src="../../js/script.js"> </script>
</script>
</body>
</html>
