<?php 
session_start();
require_once('../../../db/database.php');
spl_autoload_register('loadClass');
//if(!isset($_SESSION['user']) || $_SESSION['username'] != "-error-") header('Location: accueil.php');
$news = getNews();
$user = unserialize($_SESSION['user']);




$do = $_GET['do'];
$re = $_GET['re'];
$mi = $_GET['mi'];
$fa = $_GET['fa'];
$sol = $_GET['sol'];
$la = $_GET['la'];
$si = $_GET['si'];

metAjourNoteFa($user,$do,$re,$mi,$fa,$sol,$la,$si);


?>