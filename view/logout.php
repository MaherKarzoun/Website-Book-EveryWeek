<?php 
require('../inc/header.php');

session_destroy();

header("Location: index.php");
 require('../inc/footer.php');
?>