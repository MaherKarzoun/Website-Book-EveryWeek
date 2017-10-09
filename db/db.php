<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','maher123');
define('DB_NAME','mywebsite');

	$conn= mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if(mysqli_connect_errno()) { echo "Faild to Conn to BD".mysqli_connect_errno(); }



	
?>