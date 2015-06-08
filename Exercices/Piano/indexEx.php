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
                <td><?php
                    if($user->getType() == 0) echo '<a href="panelEnseignant.php"><button class="btn btn-success">Panel enseignant</button></a>';
                    else echo '<a href="profil.php"><button class="btn btn-primary">Profil</button></a>';
                ?></td>
                <td>
                    <a href="../../part/main.php">
						<button class="btnInstru buttonPanel btn btn-success">Retour</button>
					</a>
                </td>
            </tr>
        </table>
    </nav>
    <h2>Bonjour <?= $_SESSION['username']; ?></h2>
</header>

<section id="panelExercices">
    <table><tr>
        <td class="tdPanelLvl1">
			<a href="indexEx1.php">
				<button class="btnInstru buttonPanel btn btn-success">Ex1<br>Niveau <?= $level['Piano']['Exo1']; ?></button>
			</a>
        </td>
        <td class="tdPanelLvl1">
			<a href="indexEx2.php">
				<button class="btnPortee buttonPanel btn btn-primary">Ex2<br>Niveau <?= $level['Piano']['Exo2']; ?></button>
			</a>
        </td>
        </tr><tr>
        <td class="tdPanelLvl1">
			<a href="indexEx3.php">
				<button class="btnPiano buttonPanel btn btn-danger">Ex3<br>Niveau <?= $level['Piano']['Exo3']; ?></button>
			</a>
        </td>
        <td class="tdPanelLvl1">
            <button class="buttonPanel btn btn-warning disabled">En construction...</button>
        </td>
    </tr></table>

</section>

<script type="text/javascript"  src="../../plugin/jquery/jquery.min.js"> </script>
<script type="text/javascript"  src="../../js/script.js"> </script>
</script>
</body>
</html>
