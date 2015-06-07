<?php session_start();
require_once('../../../db/database.php');
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
<title>La musique par les plantes</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="../../../plugin/bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="../../../css/style.css" type="text/css" />
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
                <td>
                    <form method="post" action="../../Controller/Login_controller.php">
                    <input type="hidden" name="deconnexion" />
                    <input type="submit"class="btn btn-danger" value="Quitter" />
                    </form>
                </td>
            </tr>
        </table>
    </nav>
    <h2>Les exercices de la portée</h2>
</header>


<section id="panelExercices">
    <table>
    <tr>
        <td class="tdPanelLvl1">
           <a href="/LogEduc/Exercices/Portee/webapp/porteeExGen1.php"> <button class="btnInstru buttonPanel btn btn-success">Exercice 1 <br/> Clé de Sol<br>Niveau <?= $level['Portee']['Ex1Sol'] ?></button> </a>
                
        </td>
           <td class="tdPanelLvl1">
           <a href="/LogEduc/Exercices/Portee/webapp/porteeExGen2.php"> <button class="btnPortee buttonPanel btn btn-primary">Exercice 2 <br/> Clé de Sol<br>Niveau <?= $level['Portee']['Ex2Sol'] ?></button> </a>
                
        </td>
    </tr>
    <tr>
        <td class="tdPanelLvl1">
           <a href="/LogEduc/Exercices/Portee/webapp/porteeFaExGen1.php"> <button class="btnPiano buttonPanel btn btn-danger">Exercice 1 <br/> Clé de Fa<br>Niveau <?= $level['Portee']['Ex1Fa'] ?></button> </a>
                
        </td>
           <td class="tdPanelLvl1">
           <a href="/LogEduc/Exercices/Portee/webapp/porteeFaExGen2.php"> <button class="buttonPanel buttonPanel btn btn-warning">Exercice 2 <br/> Clé de Fa<br>Niveau <?= $level['Portee']['Ex2Fa'] ?></button> </a>
                
        </td>
    </tr>
        

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
