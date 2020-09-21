<?php
ob_start();
session_start();  
if ($_GET['i']) 
{
 	echo '<script>alert("'.$_GET['i'].'");</script>';
 }
require("incfiles/config.php"); 
require("incfiles/head.php");
if ($_SESSION['idfb']) 
{
	require("pages/main.php");
}
else
{
	require("pages/home.php");
}
require("incfiles/footer.php");
?>