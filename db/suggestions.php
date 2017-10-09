<?php
include 'db.php' ;

$sql = "  SELECT title From articles";
$result = mysqli_query($conn,$sql);
$data = array(); // create a variable to hold the database

if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) { array_push($data,$row['title']); }
	}

if (isset($_POST['suggestion'])) {
		$name =$_POST['suggestion'];
		$corresponded ='';
		foreach ($data as $suggestion) {
			if (stristr($suggestion, $name)) {
			 $corresponded .= $suggestion.",";
			}
		}
			if(strlen($corresponded)>0) {
				$OUT =substr($corresponded,0,strlen($corresponded)-2); 
					echo $OUT;
			
			}else{echo $corresponded ; }	
}
?>