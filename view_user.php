<?php
require '../E_identity project/masterpage.php';
	
	if(isset($_GET['firstname']) || isset($_GET['lastname']) || isset($_GET['dob']) || 
		isset($_GET['sex']) || isset($_GET['describe_yourself']) ){
		$username=$_GET['username'];
		$firstname=$_GET['firstname'];
		$lastname=$_GET['lastname'];
		$dob=$_GET['dob'];
		$sex=$_GET['sex'];
		$describe_yourself=$_GET['describe_yourself'];
		
		$last_modified=date('Y M D @ H:i:s',time());
		
		if(!empty($firstname) || !empty($lastname) || !empty($dob) || !empty($sex) || !empty($describe_yourself) ){
			if(db_connect()){
				$query_1="UPDATE `users_info` SET firstname='$firstname',lastname='$lastname',dob='$dob',sex='$sex',describe_yourself='$describe_yourself' last_modified='$last_modified' WHERE `username`='$username' ";
				$query_1_run=mysql_query($query_1);
			    if($query_1_run){
					echo 'User profile updated successfully.';
					echo '<a href="'.header('Location: manage_page.php').'">Click here</a> to go to manage_page' ;
				}else{
					echo 'not able to update user profile';
				}
			}else{
				echo 'not able to connect to database';
			}
		
		}
    }else{
		header('Location: manage_page.php');
	}
	
?>

<body>
	<div id="content">
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
		Username: <?php if(isset($_GET['username']))  echo $_GET['username'] ; ?><input type="hidden" name="username" value="<?php if(isset($_GET['username']))  echo $_GET['username'] ; ?>"><br><br>
		FirstName: <input type="text" name="firstname" value="<?php if(isset($_GET['firstname']))echo $_GET['firstname']; ?>"><br><br>
		LastName: <input type="text" name="lastname" value="<?php if(isset($_GET['lastname'])) echo $_GET['lastname']; ?>"><br><br>
		DOB: <input type="date" name="dob" value="<?php if(isset($_GET['dob']))echo $_GET['dob']; ?>"><br><br>
		Sex: <select name="sex" >
				<option value="<?php echo $_GET['sex']; ?>"><?php if(isset($_GET['sex']))echo $_GET['sex']; ?></option>	
			</select><br><br>
		Describe Yourself: <br><textarea name="describe_yourself" rows="5" cols="50" value="<?php if(isset($_GET['describe_yourself'])) echo $_GET['describe_yourself']; ?>"></textarea><br><br>
		<input type="submit" value="Save/Cancel"> 
		</form>
	</div>
</body>