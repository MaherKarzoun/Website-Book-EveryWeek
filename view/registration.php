
<?php
require_once('../inc/header.php');
	if(isset($_POST['submit'])) {
		require('../db/db.php');
		$first = mysqli_real_escape_string($conn,$_POST['u_first']);
		$last = mysqli_real_escape_string($conn,$_POST['u_last']);
		$email = mysqli_real_escape_string($conn,$_POST['u_email']);
		$user = mysqli_real_escape_string($conn,$_POST['u_uid']);
		$pass = mysqli_real_escape_string($conn,$_POST['u_pwd']);

		$sql_0="SELECT  * FROM users WHERE user_uid ='$user' or user_email='$email'";
		$result = mysqli_query($conn,$sql_0);
		$check = mysqli_num_rows($result);
		if ($check > 0) {
			header("Location:index.php?signup=UserOrEmailAreadyExists");
			exit();
		}
		else{

			if(!filter_var($email ,FILTER_VALIDATE_EMAIL)) {
				header("Location:index.php?signup=invalidEmail");exit(); }
			else{
				$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
				$sql_1="INSERT  INTO users(user_first,user_last,user_email,user_uid,user_pwd)
				VALUES('$first','$last','$email','$user','$hashedPassword');";
				if(mysqli_query($conn,$sql_1) == true){
					$result = mysqli_query($conn,$sql_0);
					if(mysqli_num_rows($result) == 1 ){
						$row = mysqli_fetch_assoc($result);
						$u_id =$row['user_id'];
						$sql_2="INSERT INTO users_picture(user_id) VALUES('$u_id');";
						mysqli_query($conn,$sql_2);
						header("Location:login.php?signup=success");
						exit();
					}

				}else{header("Location:index.php?signup=error");exit();}
			}
		}

	}
	else{header("Location:index.php");exit();}
?>