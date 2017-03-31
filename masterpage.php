<?php
//echo 'Welcome to E-Identity';
ob_start();
session_start();

function db_connect(){
	if(mysql_connect('localhost','root','') ){
		mysql_select_db('d_e_identity');
		return true;
	}else{
		echo 'Could not connect!!';
		return false;
	}

}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
	<title> E-Identity </title>
</head>
<body>
	<div id="banner">
	  <h1><a href ="homepage.php" >Welcome to E-Identity</a></h1>
	</div>
	
	
</body>
</html>
