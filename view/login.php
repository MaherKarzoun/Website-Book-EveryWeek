<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
if (isset($_SESSION['u_id'])) {
	$user = $_SESSION['u_uid'];
	header("Location: user.php?login=$user");
	exit();
}else{
require_once('../inc/header.php');
	if(isset($_POST['submit'])) {
		require('../db/db.php');
		$user = mysqli_real_escape_string($conn,$_POST['username']);
		$pass = mysqli_real_escape_string($conn,$_POST['password']);
		//check if username or password is empty !
		if( empty($pass) || empty($user) ) {
			header("Location: login.php?login=empty");
			exit();
		}
		else{
			$sql ="SELECT * FROM users WHERE user_uid='$user'";
			$result= mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
 
 			if($resultCheck < 1){
				header("Location: login.php?login=errorUsername");
				exit();
			}
			else{
				if($row = mysqli_fetch_assoc($result)) {
					//de-hashing the password
					$hashedPwdCheck= password_verify($pass,$row['user_pwd']);

					if( $hashedPwdCheck == false ){
						header("Location: login.php?login=errorPassword");
						exit();
					}elseif($hashedPwdCheck == true ){
						// log in the user here 
						$_SESSION['u_id']=$row['user_id'];
						$_SESSION['u_first']=$row['user_first'];
						$_SESSION['u_last']=$row['user_last'];
						$_SESSION['u_email']=$row['user_email'];
						$_SESSION['u_uid']=$row['user_uid'];
						header("Location: user.php?login=Success");
						exit();
					}
				}
			}
		}

	}
}
?>

<form class="login-form" action="" method="POST">
	<table id="login-table">
	<tr>
	<td><label>Username:</label></td>
	<td><input type="text" name="username" required></td>
	</tr><tr>
	<td><label>Password:</label></td>
	<td><input type="password" name="password" required></td>
	</tr>
	<td colspan="2"><input type="submit" name="submit" value="Login"></td>
	<tr >
	</tr>
	</table>
</form>

<?php require('../inc/footer.php');?>