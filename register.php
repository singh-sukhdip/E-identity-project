<?php
include '../E_identity project/masterpage.php';

function set_secret_question(){
	if(db_connect()){
		$query_3="SELECT `secret_questions` FROM `secret_ques` ";
		$query_3_run=mysql_query($query_3);
		while($query_3_row=mysql_fetch_assoc($query_3_run)){
			$var1=$query_3_row['secret_questions'];
			echo '<option value="'.$var1.'">'.$var1.'</option>';							
		}		
	}else{
		echo 'Could not connect';
	}	
	return $var1;
}	
	
if(db_connect()){
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['dob']) && 
			isset($_POST['sex']) && isset($_POST['secret_question1']) && isset($_POST['answer1']) && isset($_POST['secret_question2']) && isset($_POST['answer2']) &&
			isset($_POST['secret_question3']) && isset($_POST['answer3'])){
		$userid=rand(1,999);
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$dob=$_POST['dob'];
		$sex=$_POST['sex'];
		$describe_yourself=$_POST['describe_yourself'];
		$secret_question1=$_POST['secret_question1'];
		$secret_question2=$_POST['secret_question2'];
		$secret_question3=$_POST['secret_question3'];
		$answer1=$_POST['answer1'];
		$answer2=$_POST['answer2'];
		$answer3=$_POST['answer3'];
		$time_stamp=date('Y M D @ H:i:s',time());
		
		if(!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($dob) && !empty($sex) && 
			!empty($secret_question1) && !empty($answer1) && !empty($secret_question2) && !empty($answer2) && !empty($secret_question3) && !empty($answer3)){
			$query_1="select `username` from `users_info` where `username`='$username'";
			$query_1_run=mysql_query($query_1);
			if(mysql_num_rows($query_1_run)>=1){
				echo $username.' username already exists. Please select another one';
			}else{
			$query_2="INSERT INTO `users_info` VALUES('$userid','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password)."',
														'".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($lastname)."','".mysql_real_escape_string($dob)."','$sex',
														'$describe_yourself','$secret_question1','$answer1','$secret_question2','$answer2','$secret_question3','$answer3','$time_stamp',' ')";
			if(mysql_query($query_2)){
				echo 'Registered successfully';
				header('location:homepage.php');
			}else{
				echo 'Not able to register. Please try after some time.';
			}
			}	
		}else{
			echo 'please provide all the details';
		}
		
		}
}
?>

<body>
<div id="content">
	<h2>Register Yourself....please provide correct details</h2>
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
		Username: <input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>"><br><br>
		Password: <input type="password" name="password"><br><br>
		FirstName: <input type="text" name="firstname" value="<?php if(isset($firstname))echo $firstname; ?>"><br><br>
		LastName: <input type="text" name="lastname" value="<?php if(isset($lastname)) echo $lastname; ?>"><br><br>
		DOB: <input type="date" name="dob" value="<?php if(isset($dob))echo $dob; ?>"><br><br>
		Sex: <select name="sex" >
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select><br><br>
		Describe Yourself: <br><textarea name="describe_yourself" rows="5" cols="50" value="<?php if(isset($describe_yourself)) echo $describe_yourself; ?>"></textarea><br><br>
		Secret Question 1: <select name="secret_question1" ><?php set_secret_question();?></select>
			Answer 1:<input type="text" name="answer1"><br><br>
		Secret Question 2:<select name="secret_question2"><?php set_secret_question(); ?></select>
			Answer 2:<input type="text" name="answer2"><br><br>
		Secret Question 3:<select name="secret_question3"><?php set_secret_question(); ?></select>
			Answer 3:<input type="text" name="answer3"><br><br>
							
		<input type="submit" value="Register">
	
	</form>
</div>
</body>