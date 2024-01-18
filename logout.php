<?php 
if (!isset($_SESSION['identity'])) { session_start(); }
$_SESSION = array(); 
session_destroy(); 
header("Location: http://localhost:81/machintell/"); // Or wherever you want to redirect
exit();
?>