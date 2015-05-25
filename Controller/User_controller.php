<?php session_start();

require_once('../db/database.php'); 
spl_autoload_register('loadClass');

$user = unserialize($_SESSION['user']);
