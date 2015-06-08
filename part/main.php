<?php session_start();
require_once('../db/database.php');
spl_autoload_register('loadClass');
//if(!isset($_SESSION['user']) || $_SESSION['username'] != "-error-") header('Location: accueil.php');
$news = getNews();
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
    <table><tr>
        <td class="tdPanelLvl1">
            <button class="btnInstru buttonPanel btn btn-success">Instruments<br>Niveau <?= $level['Instruments'] ?></button>
                <table class="subTableExercice tableInstru"><tr>
                    <td><a href="coursInstruments.php"><button class="btn btn-success">Cours</button></a></td>
                    <td><a href="../Exercices/Instruments/quiz.php"><button class="btn btn-success">Exercices</button></a></td>
                </tr></table>
        </td>
        <td class="tdPanelLvl1">
            <button class="btnPortee buttonPanel btn btn-primary">Solfège</button>
                <table class="subTableExercice tablePortee"><tr>
                    <td><a href="../Exercices/Portee/webapp/CourPortee.php"><button class="btn btn-primary">Cours</button></a></td>
                    <td><a href="../Exercices/Portee/webapp/menuExo.php"><button class="btn btn-primary">Exercices</button></a></td>
                </tr></table>
        </td>
        </tr><tr>
        <td class="tdPanelLvl1">
            <button class="btnPiano buttonPanel btn btn-danger">Piano virtuel</button>
                <table class="subTableExercice tablePiano"><tr>
                    <td><button class="btn btn-danger">Cours</button></td>
                    <td><a href="../Exercices/Piano"><button class="btn btn-danger">Exercices</button></a></td>
                </tr></table>
        </td>
        <td class="tdPanelLvl1">
            <button class="buttonPanel btn btn-warning disabled">En construction...</button>
        </td>
    </tr></table>

</section>

<script type="text/javascript"  src="../plugin/jquery/jquery.min.js"> </script>
<script type="text/javascript"  src="../js/script.js"> </script>
<script>
    var instru = false, piano = false, portee = false;

    $(".btnInstru").click(function() {
        if(!instru) {
            $(".btnInstru").css("height", "80px");
            $(".tableInstru .btn").fadeIn(1500);
            $(".tableInstru .btn").css("height", "130px");
            instru = true;
        } else {
            $(".btnInstru").css("height", "220px");
            $(".tableInstru .btn").fadeOut(500);
            $(".tableInstru .btn").css("height", "0px");
            instru = false;
        }
    });
    $(".btnPiano").click(function() {
        if(!piano) {
            $(".btnPiano").css("height", "80px");
            $(".tablePiano .btn").fadeIn(1500);
            $(".tablePiano .btn").css("height", "130px");
            piano = true;
        } else {
            $(".btnPiano").css("height", "220px");
            $(".tablePiano .btn").fadeOut(500);
            $(".tablePiano .btn").css("height", "0px");
            piano = false;
        }
    });
    $(".btnPortee").click(function() {
        if(!portee) {
            $(".btnPortee").css("height", "80px");
            $(".tablePortee .btn").fadeIn(1500);
            $(".tablePortee .btn").css("height", "130px");            
            portee = true;
        } else {
            $(".btnPortee").css("height", "220px");
            $(".tablePortee .btn").fadeOut(500);
            $(".tablePortee .btn").css("height", "0px");   
            portee = false;
        }
    });
</script>
</body>
</html>
