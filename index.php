<?php  session_start();
$_SESSION['errorLogin'] = "-first-";
$_SESSION['creationSuccess'] = "-first-";
header("Location: part/accueil.php");
?>