<?php 
require('db.php');
define('table', 'articles');

$sql = "SELECT * FROM ".table;
$heads  = mysqli_query($conn, $sql) ;
$result = mysqli_query($conn, $sql) ;
	if(empty($result)) {echo "Error sending query database: " .mysqli_error($conn);}

?>
