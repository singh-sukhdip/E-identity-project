<?php
$redirectpage='homepage.php';

	//unset($_SESSION['name']);
	session_destroy();
	header('location:'.$redirectpage);
?>