<?php
include '../E_identity project/masterpage.php';


?>

<body>
	<form action="unsetsession.php">
	<div id="content">
	
		<?php 
		if(!isset($_SESSION['name'])){
		
		echo 'Please login';
		echo '<a href="homepage.php">Click here to login</a>';
			die();
			
		}else			
		{
			echo 'Welcome '.strtoupper($_SESSION['name']);
		}
		?><br><br>
		<input type="submit" value="Logout">
		
	</div>
	</form>
</body>