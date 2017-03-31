<?php
session_start();
$redirectpage='welcome.php';
$_SESSION['name']=$_POST['username'];
	if(isset($_SESSION['name'])){
		header('location:'.$redirectpage);
	}
	else
	{
		echo 'Please Login.';
	}

?>