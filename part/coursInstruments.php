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
<title>Cours sur les instruments</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="../plugin/bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<style>
body {
	width: 75%;
	margin: auto;
}
h1 { 
	text-align: center;
}
#divTable {
	padding: 25px;
	width: 800px;
	margin: auto;
	border-radius: 15px;

}
header table {
	width: 750px;
	margin: auto;
}
header img {
	width: 170px;
	border-radius: 50px;
}
header td {
	font-size: 18px;
}
img {
	max-width: 450px;
	max-height: 350px;
}
p {
	font-size: 18px;
}
li {
	font-size: 16px;
}
td {
	padding: 5px;
}
.legende td {
	text-align: center;
}
</style>
</head>

<body id="coursInstruments">

<header>
<h1> Les instruments de musique</h1>
<div id="divTable" class="bg-success">
<table>
	<tr>
		<td><img src="../img/RemiFasol.jpeg" alt="Rémi Fasol" /></td>
		<td> Bienvenue sur le cours qui parle des instruments de musique. A la fin de ce cours, tu seras capable de différencier les différents types d'instruments et tu devrais être capable de faire les exercices sur les instruments facilement! Bonne chance et bonne lecture!</td>
	</tr>
</table>
</div>
</header>


<h3>Instruments à cordes</h3>
<p>Les <strong>instruments à cordes</strong> sont également appelés « cordophones ».</p>
<p>Comme leur nom l'indique, ils sont constitués de cordes qui créent un son lorsqu'elle sont frottées, pincées ou frappées. Il y a donc trois types d'instruments à corde différents</p>
<ul>
<li>les <strong> instruments à cordes frottées</strong>: le plus connu est le violon. La particularité de ces instruments est qu'ils sont joués à l'aide d'un archet qui permet de frotter les cordes. Un archet est un petit arc en bois reliés par des crins.</li>
<table>
	<tr>
		<td><img src="../img/violon.jpeg" alt="violon" /></td>
		<td><img src="../img/violonArtiste.jpeg" alt="violonArtiste" /></td>
	</tr>
	<tr class="legende">
		<td>Un violon</td>
		<td>Artiste jouant du violon</td>
	</tr>
</table><br><br>
<li>les <strong> instruments à cordes pincées</strong>: la guitare et la basse en sont les principaux. A la différences des instruments à corde frottées, ceux-ci se jouent sans archet, directement avec les doigts sur les cordes</li>
<table>
	<tr>
		<td><img src="../img/guitare.jpg" alt="guitare" /></td>
		<td><img src="../img/guitareArtiste.jpeg" alt="guitareArtiste" /></td>
	</tr>
	<tr class="legende">
		<td>Une guitare folk</td>
		<td>Artistes jouant de la guitaren</td>
	</tr>
</table><br><br>


<li>les <strong> instruments à cordes frappées</strong>, comme le piano. Ici, les cordes sont frappées manuellement ou mécaniquement, à mains nues ou à l'aide de marteaux ou baguettes.</li>
<table>
	<tr>
		<td><img src="../img/piano.jpeg" alt="piano" /></td>
		<td><img src="../img/pianoArtiste.jpeg" alt="pianoArtiste" /></td>
	</tr>
	<tr class="legende">
		<td>Un piano</td>
		<td>Artiste jouant du piano</td>
	</tr>
</table><br><br>


</ul>
<h3>Instruments à vent</h3>
<p>Les <strong>instruments à vent</strong>, également appelés « aérophones », sont tous les instruments nécessitant de souffler pour en jouer. Ils mettent en jeu une colonne d'air qui peut être produite par le souffle du musicien, par une soufflerie mécanique ou par une poche d'air. En voici quelques uns:</p>
<ul>
<li>la voix, qui exploite toutes les possibilités des membranes muqueuses du larynx cordes vocales</li>

<li>la flûte, qui se décompose en plusieurs instruments (flûte à bec, flûte traversière, clarinette ...)</li>
<table>
	<tr>
		<td><img src="../img/flutebec.jpeg" alt="fluteabec" /></td>
		<td><img src="../img/fluteArtiste.jpeg" alt="fluteArtiste" /></td>
	</tr>
	<tr class="legende">
		<td>Une flute à bec</td>
		<td>Artiste jouant de la flute traversièren</td>
	</tr>
</table><br><br>
<li>les cuivres, qui utilisent la vibration des lèvres dans une embouchure, comme les trompettes, le saxophone ou le didgeridoo</li>
<table>
	<tr>
		<td><img src="../img/saxophone.jpeg" alt="saxophone" /></td>
		<td><img src="../img/trompetteArtiste.jpeg" alt="trompetteArtiste" /></td>
		<td><img src="../img/didgeridooArtiste.jpeg" alt="digeridooArtiste" /></td>
	</tr>
	<tr class="legende">
		<td>Un saxophone></td>
		<td>Artiste jouant de la trompette</td>
		<td>Artiste jouant du didgeridoo</td>
	</tr>
</table><br><br>
</ul>

<h3>Instruments de percussion</h3>
<p>Les instruments de percussion englobent tout les instruments sur lequel on frappe, avec les mains ou baguettes.</p>
<ul>
<li>les <b>claviers</b>, constitués d'une série de lames accordées en bois ou en métal, frappées par des baguettes (comme le xylophone)</li>
<table>
	<tr>
		<td><img src="../img/xylophone.jpeg" alt="xylophone" /></td>
		<td><img src="../img/xylophoneArtiste.jpeg" alt="xylophoneArtiste" /></td>
	</tr>
</table>
<li>les <b>peaux</b>, naturelles ou synthétiques, elles sont constitués d'une membrane frappée par les mains ou par des baguettes, accordée ou non, comme le djembé ou la batterie</li>
<table>
	<tr>
		<td><img src="../img/batterie.JPG" alt="batterie" /></td>
		<td><img src="../img/batterieArtiste.jpeg" alt="batterieArtiste" /></td>
	</tr>
</table>

<li>les&#160;<b>accessoires</b>, c'est-à-dire toutes les autres percussions ne produisant généralement qu'un son, comme le triangle ou les maracas</li>
</ul>


<h3>Les instruments électroniques</h3>
<p>Aujourd'hui beaucoup d'instruments de musique sont électroniques et ne reposent plus sur la résonnance des vibrations des cordes, mais ces dernières sont captées par des micros et amplifiés à l'aide d'enceinte appelée amplificateur.</p>
<table>
	<tr>
		<td><img src="../img/batterieelec.jpeg" alt="batterieelec" /></td>
		<td><img src="../img/batterieelecArtiste.jpeg" alt="batterieelecArtiste" /></td>
	</tr>
</table>
<table>
	<tr>
		<td><img src="../img/guitareelec.jpeg" alt="guitareelec" /></td>
		<td><img src="../img/guitareelecArtiste.jpeg" alt="guitareelecArtiste" /></td>
	</tr>
</table>

<p>Il est même possible aujourd'hui de faire de la musique sans isntrument, juste avec un ordinateur. Il existe des logiciels qui permettent de reproduire les sons des instruments!</p>
<a href="main.php"><button class="btn btn-primary">Retour à l'accueil</button></a>
<a href="#coursInstruments"><button class="btn btn-primary">Remonter</button></a>
</body></html>