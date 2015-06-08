<?php session_start();
require_once('../../db/database.php');
spl_autoload_register('loadClass');
//if(!isset($_SESSION['user']) || $_SESSION['username'] != "-error-") header('Location: accueil.php');
$user = unserialize($_SESSION['user']);
$level = getLevelByUser($user);
?>

<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 7 ]> <html lang="fr" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="fr" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="fr" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="fr"><!--<![endif]-->
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0">

    <meta name="description" content="Piano Keyboard developed with HTML, CSS and Javascript">
    <meta name="keywords" content="piano, css, html, javascript, front-end">

    <title>Piano Keyboard</title>

    <link type="text/css" rel="stylesheet" href="assets/css/style.css" />

</head>
<body>

    <!-- Piano -->
    <ul class="piano" id="piano">
        <li class="key" style="display: none" level="1">
            <span class="white-key" data-key="20" data-note="1C"></span>
            <span class="black-key" data-key="65" data-note="1Cs"></span>
        </li>
        <li class="key" style="display: none" level="1">
            <span class="white-key" data-key="81" data-note="1D"></span>
            <span class="black-key" data-key="90" data-note="1Ds"></span>
        </li>
        <li class="key" style="display: none" level="1">
            <span class="white-key" data-key="83" data-note="1E"></span>
        </li>
        <li class="key" style="display: none" level="1">
            <span class="white-key" data-key="68" data-note="1F"></span>
            <span class="black-key" data-key="82" data-note="1Fs"></span>
        </li>
        <li class="key" style="display: none" level="1">
            <span class="white-key" data-key="70" data-note="1G"></span>
            <span class="black-key" data-key="84" data-note="1Gs"></span>
        </li>
        <li class="key" style="display: none" level="1">
            <span class="white-key" data-key="71" data-note="2A"></span>
            <span class="black-key" data-key="89" data-note="2As"></span>
        </li>
        <li class="key" style="display: none" level="1">
            <span class="white-key" data-key="72" data-note="2B"></span>
        </li>
        <li class="key" level="3" style="display: none">
            <span class="white-key" data-key="74" data-note="2C"></span>
            <span class="black-key" data-key="73" data-note="2Cs"></span>
        </li>
        <li class="key" level="3" style="display: none">
            <span class="white-key" data-key="75" data-note="2D"></span>
            <span class="black-key" data-key="79" data-note="2Ds"></span>
        </li>
        <li class="key" level="3" style="display: none">
            <span class="white-key" data-key="76" data-note="2E"></span>
        </li>
        <li class="key" level="3" style="display: none">
            <span class="white-key" data-key="77" data-note="2F"></span>
            <span class="black-key" data-key="48" data-note="2Fs"></span>
        </li>
        <li class="key" level="3" style="display: none">
            <span class="white-key" data-key="192" data-note="2G"></span>
            <span class="black-key" data-key="219" data-note="2Gs"></span>
        </li>
        <li class="key" level="3" style="display: none">
            <span class="white-key" data-key="220" data-note="3A"></span>
            <span class="black-key" data-key="187" data-note="3As"></span>
        </li>
        <li class="key" level="3" style="display: none">
            <span class="white-key" data-key="13" data-note="3B"></span>
        </li>
    </ul>
    <!-- End Piano -->

    <!-- Subject -->
    <div id="enonce" class="col-md-12 enonce">

    </div>

    <div id="sujetExercice" class="container">

    </div>
    <!-- End Subject -->

    <!-- End Site -->

    <div id="niveauEtu">
    	<?php echo $level['Piano']['Exo3']; ?>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="assets/js/scripts.min.js"></script>
    <script type="text/javascript" src="./assets/js/_scripts/_jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="./assets/js/_scripts/data_notes.js"></script>
    <script type="text/javascript" src="./assets/js/_scripts/chrono.js"></script>
    <script type="text/javascript" src="./assets/js/_scripts/generatePiano.js"></script>
    <script type="text/javascript" src="./assets/js/_scripts/enonceEtBullesNotes.js"></script>
    <script type="text/javascript" src="assets/js/_scripts/cours.js"></script>
    <script type="text/javascript" src="assets/js/_scripts/exercice1.js"></script>
    <script type="text/javascript" src="assets/js/_scripts/exercice2.js"></script>
    <script type="text/javascript" src="assets/js/_scripts/exerciceChrono.js"></script>
    <script type="text/javascript" src="./assets/js/_scripts/enseignant.js"></script>
    <script type="text/javascript" src="./assets/js/_scripts/perso.js"></script>
    <script type="text/javascript" src="./assets/js/_scripts/_generalEx3.js"></script>
    <script type="text/javascript" src="./assets/js/_scripts/howler.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


</body>
</html>
