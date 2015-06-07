<?php 
session_start();
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
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="indexStyle.css" type="text/css">
        <link rel="stylesheet" href="popup.css" type="text/css">
    </head>
<body>
<div class="row">
<div class="col-sm-12 titre">
	<H1 id="titreNiveau"><b>Retrouve les notes ! (Clé de Sol)</b></H1>
</div>
</div>
<div class = "row PersoPlugn">
	<div class="col-sm-2 col-sm-offset-3" id="persoContainer">
		<img id="perso" height="250" width = "250" src="Perso.jpeg"/>
	</div>
	<div class="col-sm-6" id="BulleText">
	<div id="TextContent"><p><FONT color='blue' >OK, maintenant place à un petit exercice ! <br/> Clique sur instructions pour voir les consignes et sur Go ! losque tu es prêt.</FONT><br/><br/><a href="#?w=500" rel="instruction" class="poplight">Instruction</a><br/><a  onmouseover="this.style.cursor='pointer'" onclick="choixNiveau()">Go !</a></p></div>
	
	</div>
</div>

<div class = "row">
	<div class="col-sm-3 col-sm-offset-1">
		<div class="row">
			<div class = "col-sm-10 col-sm-offset-1">
				<a	onmouseover="this.style.cursor='pointer'" onclick='donneSolution()'>Abandonner</a>
			</div>
		</div>
		<div class="row">
			<div class = "col-sm-10 col-sm-offset-1">
				<a href="CourPortee.html" onmouseover="this.style.cursor='pointer'">Retour à la leçon</a>
			</div>
		</div>
	</div>
	<div class="col-sm-7" id="noteContainer">
	<table id="noteContainer">
	<tr>
		<td class="caseImg" id="note1"><img class="imgNote" id="do" src="doImg.png"></td>
		<td class="caseImg" id="note2"><img class="imgNote" id="re" src="reImg.png"></td>
		<td class="caseImg" id="note3"><img class="imgNote" id="mi" src="miImg.png"></td>
		<td class="caseImg" id="note4"><img class="imgNote" id="fa" src="faImg.png"></td>
		<td class="caseImg" id="note5"><img class="imgNote" id="sol" src="solImg.png"></td>
		<td class="caseImg" id="note6"><img class="imgNote" id="la" src="laImg.png"></td>
		<td class="caseImg" id="note7"><img class="imgNote" id="si" src="siImg.png"></td>
	</tr>
	</table>
	</div>
</div>

<div class="row">
	
	<div class = "col-sm-10 col-sm-offset-1" id=porteeContainer>
		<table id='portee'>
		</table>	
	</div>
</div>


<div id="instruction" class="popup_block">
	<h2>Instruction</h2>
	<p> Le but de cet exercice est de replacer sur la portée les notes situées sous Rémi. Clique sur une de ces notes et fait la glisser au bon endroit sur la portée </p>
</div>
<div id="ExoFini" class="popup_block2">
	<h2>Bravo, tu as finis l'exercice !</h2>
	<p id=nbFaute></p>
</div>
<div id="niveauEtu">
	<?php echo $level['Portee']['Ex2Sol']; ?>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="popupExGen1.js"></script>	
<script src="perso.js"></script>
<script src="porteeExGen2.js"></script>


<script>
genererPortee(20,20);
gestionPerso();
</script>
</body>
</html>