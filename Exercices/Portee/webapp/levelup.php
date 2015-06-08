<?php 
session_start();
require_once('../../../db/database.php');
spl_autoload_register('loadClass');
//if(!isset($_SESSION['user']) || $_SESSION['username'] != "-error-") header('Location: accueil.php');
$news = getNews();
$user = unserialize($_SESSION['user']);
$level = getLevelByUser($user);



$ex = $_GET['exo'];

levelUp($user,$ex);
//echo "lala";


//header('Location: accueil.php');

?>
Level up !