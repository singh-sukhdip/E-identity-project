<?php
include '../E_identity project/masterpage.php';
include '../E_identity project/register.php';

if(isset($_POST['username']) && isset($_POST['secret_question1']) && isset($_POST['answer1']) && isset($_POST['secret_question2']) && isset($_POST['answer2']) &&
		isset($_POST['secret_question3']) && isset($_POST['answer3'])){
		$username=$_POST['username'];
		$secret_question1=$_POST['secret_question1'];
		$secret_question2=$_POST['secret_question2'];
		$secret_question3=$_POST['secret_question3'];
		$answer1=$_POST['answer1'];
		$answer2=$_POST['answer2'];
		$answer3=$_POST['answer3'];
		
		if(db_connect()){
			if(!empty($username) &&	!empty($secret_question1) && !empty($answer1) && !empty($secret_question2) && !empty($answer2) && !empty($secret_question3) && !empty($answer3)){
				$query_1="select `username` from `users_info` where `username`='$username',`secret_question1`='$secret_question1',`answer1`='$answer1',`secret_question2`='$secret_question2',`answer2`='$answer2',
																							`secret_question3`='$secret_question3',`answer3`='$answer3' ";
				$query_1_run=mysql_query($query_1);
				if($query_1_run){
					include '../E_identity project/password_reset_script.php';
					
				}else{
					echo 'please provide correct combination of secret questions and answers';
				}	
			}
		}else{
			echo 'not able to connect.';
		}
	}else{
		echo 'please provide all the details.';
	}

?>

<body>
	<div id="content">
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
		Username: <input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>"><br><br>
		
		Secret Question 1: <select name="secret_question1" ><?php set_secret_question();?></select>
			Answer 1:<input type="text" name="answer1"><br><br>
		Secret Question 2:<select name="secret_question2"><?php set_secret_question(); ?></select>
			Answer 2:<input type="text" name="answer2"><br><br>
		Secret Question 3:<select name="secret_question3"><?php set_secret_question(); ?></select>
			Answer 3:<input type="text" name="answer3"><br><br>
							
		<input type="submit" value="Submit">
	
	</form>
	</div>
</body>