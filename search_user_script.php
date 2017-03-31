<?php
if(isset($_POST['field'])){
	if(isset($_POST['search1']) || isset($_POST['search2']) || isset($_POST['search3'])){
		$search1=$_POST['search1'];
		$search2=$_POST['search2'];
		$search3=$_POST['search3'];
		if(!empty($search1) || !empty($search2) || !empty($search3)){
			if(db_connect()){
				$query_1="SELECT * FROM users_info WHERE username='$search1' || firstname='$search2' || lastname='$search3' ";
				$query_1_run=mysql_query($query_1);
				if(mysql_num_rows($query_1_run)>=1){
					$var1= mysql_fetch_assoc($query_1_run);
					$username=$var1['username'];
					$firstname=$var1['firstname'];
					$lastname=$var1['lastname'];
					$dob=$var1['dob'];
					$sex=$var1['sex'];
					$describe_yourself=$var1['describe_yourself'];
					$secret_question1=$var1['secret_ques_1'];
					$answer1=$var1['ans_1'];
					$secret_question2=$var1['secret_ques_2'];
					$answer2=$var1['ans_2'];
					$secret_question3=$var1['secret_ques_3'];
					$answer3=$var1['ans_3'];
					$time_stamp=$var1['time_stamp'];
					$last_modified=$var1['last_modified'];
					
					echo '<a href="view_user.php?username='.$username.'&firstname='.$firstname.'&lastname='.$lastname.'&dob='.$dob.'&sex='.$sex.'&describe_yourself='.$describe_yourself.'">'.$username.'</a>'.' | '.$firstname.' | '.$lastname.' | '.$dob.' | '.$sex.' | '.$describe_yourself.' | '.
							$secret_question1.' | '.$answer1.' | '.$secret_question2.' | '.$answer2.' | '.$secret_question3.' | '.$answer3.' | '.$time_stamp.' | '.$last_modified.' | '."\n";
				}else{
					echo 'No records found for this search';
				}
			
			}else{
				echo 'not able to connect to database.';
			}
		}else{
			echo 'nothing to display';
		}
		
	}else{
		if(db_connect()){
				$query_1="SELECT * FROM users_info ";
				$query_1_run=mysql_query($query_1);
				while($var1=mysql_fetch_assoc($query_1_run)){

					$username=$var1['username'];
					$firstname=$var1['firstname'];
					$lastname=$var1['lastname'];
					$dob=$var1['dob'];
					$sex=$var1['sex'];
					$describe_yourself=$var1['describe_yourself'];
					$secret_question1=$var1['secret_question1'];
					$answer1=$var1['answer1'];
					$secret_question2=$var1['secret_question2'];
					$answer2=$var1['answer2'];
					$secret_question3=$var['secret_question3'];
					$answer3=$var1['answer3'];
					$time_stamp=$var1['time_stamp'];
					$last_modified=$var1['last_modified'];
					
					echo '<a href="view_user.php?username=$username&firstname=$firstname&lastname=$lastname&dob=$dob&sex=$sex&describe_yourself=$describe_yourself">'.$username.'</a>|'.$firstname.'|'.$lastname.'|'.$dob.'|'.$sex.'|'.$describe_yourself.'|'.
							$secret_question1.'|'.$answer1.'|'.$secret_question2.'|'.$answer2.'|'.$secret_question3.'|'.$answer3.'|'.$time_stamp.'|'.$last_modified.'|'.'\n';
				}
			
			}else{
				echo 'not able to connect to database.';
			}
		
	}		
}
?>

<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
	Search options: <br>
	Username:<input type="text" name="search1"><br><br>
	Firstname:<input type="text" name="search2"><br><br>
	Lastname:<input type="text" name="search3"><br><br>
	<input type="hidden" name="field">
	<input type="submit" value="search">
</form>