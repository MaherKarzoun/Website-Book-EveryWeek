
<?php require('../inc/header.php');?>

<img class="freeAccount" src="../img/free-account.png"/>
<form class="form-sinup" action="registration.php" method="POST">
	<table class="signUp">
		<tr>
		<td><label>First Name  </label></td>
		<td><input type="text" name="u_first" required></td>	
		</tr>
		<tr>
		<td><label>Last Name  </label></td>
			<td><input type="text" name="u_last" required></td>
		</tr>
		<tr>
		<td><label>Email  </label></td>
			<td><input type="text" name="u_email" required></td>
		</tr>
		<tr>
		<td><label>User name  </label></td>
			<td><input type="text" name="u_uid" required></td>
		</tr>
		<td><label>Password  </label></td>
			<td><input type="Password" name="u_pwd" requireds></td>
		</tr>
		<tr >
		<td colspan="2"><input type="submit" name="submit" value="Sign Up"></td>
		</tr>
	</table>
</form>
<script >
	
	
</script>

<?php require('../inc/footer.php');?>
