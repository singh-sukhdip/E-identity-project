<?php
	if(isset($_POST['newpassword']) && isset($_POST['confirmpassword'])){
		$newpassword=$_POST['newpassword'];
		$confirmpassword=$_POST['confirmpassword'];
		$confirmpassword_hash=md5($confirmpassword);
		if(!empty($newpassword) && !empty($confirmpassword) && $newpassword==$confirmpassword){
			if(db_connect()){
				$query_1="UPDATE `users_info` SET `password`='$confirmpassword_hash' WHERE `username`='$username' ";
				$query_1_run=mysql_query($query_1);
			    header('Location: welcome.php');
			}else{
				echo 'not able to connect to database';
			}
		}else{
			echo 'password doesn\'t match';
		}
	}else{
		echo 'please fill all the fields.';
	}

?>
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
	New Password: <input type="text" name="newpassword"><br><br>
	Confirm Password: <input type="text" name="confirmpassword"><br><br>
	<input type="submit" value="Reset">
	
</form>