<?php
session_start();
session_destroy();
header('location: index.php?i=You Have Successfully Logout From Our System');
?>