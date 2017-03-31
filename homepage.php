<?php
include '../E_identity project/masterpage.php';


				if(isset($_POST['username']) && isset($_POST['password']))
				{
					$username=htmlentities($_POST['username']);
					$password=htmlentities($_POST['password']);
					$password_hash=md5($password);
					$admin='god';
					if(!empty($username) && !empty($password)){
						if(db_connect()){
							if($admin!=strtolower($username)){	
							$query_1="SELECT `username`,`firstname`,`lastname` FROM users_info WHERE `username`='$username' && `password`='$password_hash'";
							$query_1_run=mysql_query($query_1);
							if(mysql_num_rows($query_1_run)>=1){
								$_SESSION['name']=$username;
								
								header('location:welcome.php');	
							}else{
								echo 'Invalid Username/Password';
							}
							}else{
								header('location: manage_page.php');
							}
						}else{
							echo 'not able to connect to database';
						}
					}
				else{
					echo 'please fill both username and password field';
				}
				}
			

?>

<body>

	<div id="content">
		<!--<?php echo '<h3>Hello '.strtoupper($_POST['username']).'</h3>'; ?>-->
	
	</div>
	
	<div id="sidebar">
		<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
			User Name: <input type="text" name="username">
			Password: <input type="password" name="password">
			<input type="submit" value="LogIn">
		</form>
			<br><br><br>
			Forgot Password <a href="../E_identity project/forgotpassword.php">Click Here</a>
			<br>
			New User<a href="../E_identity project/register.php"> Click Here </a>to create new account
		
	</div>
	
	<div id="footer">
		All Rights Reserved.
	</div>
</body>
